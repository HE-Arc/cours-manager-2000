<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\SectionClass;
use App\Models\Period;
use App\Models\Day;
use App\Models\Lesson;
use App\Models\Timetable;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Show the form for authentificate a user.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('user.login');
    }

    public function timetable()
    {
        // Request :
        //     SELECT l.id FROM lessons AS l
        //     INNER JOIN courses AS c ON l.course_id = c.id
        //     INNER JOIN module_user AS m ON c.module_id = m.module_id
        //     INNER JOIN users AS u ON m.user_id = u.id
        //     WHERE u.section_classe_id = l.class_id;

        $lessons = DB::table('lessons')
            ->join('courses', 'lessons.course_id', '=', 'courses.id')
            ->join('module_user', 'courses.module_id', '=', 'module_user.module_id')
            ->join('users', 'module_user.user_id', '=', 'users.id')
            ->join('periods', 'lessons.period_id', '=', 'periods.id')
            ->select(['lessons.id', 'periods.start_time'])
            ->orderBy('periods.start_time')
            ->get();

        $days = Day::cases();
        $timetable = $this->generateTimetable($lessons);

        return view('user.timetable', [
            'days' => $days,
            'timetable' => $timetable,
        ]);
    }

    /**
     * Show the form for creating a new user.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sectionClasses = SectionClass::all();

        return view('user.register', [
            'section_classes' => $sectionClasses
        ]);
    }

    /**
     * This code is from laravel start kit breeze
     *
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function authentificate(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->route('home')->with("success", "Connexion réussie !");
    }

    public function logout()
    {
        Session::flush();

        Auth::logout();

        return redirect('');
    }

    /**
     * This code is from laravel start kit breeze
     *
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'section_classe_id' => $request->section_class,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect()->route('home')->with("success", "Création d'un nouvel utilisateur réussie !");
    }

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PRIVATE                           *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    private function generateTimetable($lessons)
    {
        $timetable = [];

        $LAST_PERIOD_ID_NE = Period::all()->where('location_id', '1')->last()->id;
        $LAST_PERIOD_ID_STI = Period::all()->where('location_id', '2')->last()->id;

        foreach (Day::cases() as $day) {
            $key = strval($day->value);
            $timetable[$key] = [];

            $last_period_id = 0;

            foreach ($lessons as $lesson) {
                $lesson = Lesson::findOrFail($lesson->id);

                // Checks if the day is the same
                if ($lesson->day === $day->value) {

                    // Checks if the current lesson doesn't follow last
                    if ($lesson->period_id - $last_period_id > 1) {
                        if ($lesson->period_id > $LAST_PERIOD_ID_NE && $last_period_id === 0) {
                            $last_period_id = $LAST_PERIOD_ID_NE;
                        }

                        $period_start = Period::findOrFail($last_period_id + 1);
                        $period_end = Period::findOrFail($lesson->period_id - 1);

                        $nb_periods = $period_end->id - $period_start->id + 1;

                        $pause = new Timetable($period_start->id, $period_start->startTime(), $nb_periods, '', '', '', $period_end->endTime());
                        array_push($timetable[$key], $pause);
                    }

                    // $course_name = $lesson->course->module->id . '.' . $lesson->course->indicator . ' ' . $lesson->course->name;
                    $course_name = $lesson->course->name;
                    $lessonModel = new Timetable($lesson->period_id, $lesson->start_period(), $lesson->nb_periods, $course_name, $lesson->professor, $lesson->classroom, $lesson->end_period());

                    array_push($timetable[$key], $lessonModel);

                    $last_period_id = $lesson->end_period_id();
                }
            }

            if ($last_period_id < $LAST_PERIOD_ID_NE) {
                $period_start = Period::findOrFail($last_period_id + 1);
                $period_end = Period::findOrFail($LAST_PERIOD_ID_NE);

                $nb_periods = $period_end->id - $period_start->id + 1;

                $pause = new Timetable($period_start->id, $period_start->startTime(), $nb_periods, '', '', '', $period_end->endTime());

                array_push($timetable[$key], $pause);
            } else if ($last_period_id < $LAST_PERIOD_ID_STI) {
                $period_start = Period::findOrFail($last_period_id + 1);
                $period_end = Period::findOrFail($LAST_PERIOD_ID_STI);

                $nb_periods = $period_end->id - $period_start->id + 1;

                $pause = new Timetable($period_start->id, $period_start->startTime(), $nb_periods, '', '', '', $period_end->endTime());

                array_push($timetable[$key], $pause);
            }
        }

        return $timetable;
    }
}
