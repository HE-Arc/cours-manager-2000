<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Period;
use App\Models\SectionClass;
use App\Models\Day;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();

        return view('lessons.index', ['lessons' => $lessons]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $classes = SectionClass::all();
        $periods = Period::all();
        $courses = Course::all();
        $days = Day::buisnessDays();

        return view('lessons.create', ['classes' => $classes, 'periods' => $periods, 'courses' => $courses, 'days' => $days]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "day" => "required|integer|lt:8",
            "nb_periods" => "required|integer|gt:0|lt:10",
            "professor" => "required|min:3|max:50",
            "classroom" => "required|min:3|max:10",
            "class_id" => "required|integer|exists:section_classes,id",
            "period_id" => "required|integer|exists:periods,id",
            "course_id" => "required|integer|exists:courses,id"
        ]);

        $lesson = new Lesson();
        $lesson->day = $request->day;
        $lesson->nb_periods = $request->nb_periods;
        $lesson->professor = $request->professor;
        $lesson->classroom = $request->classroom;
        $lesson->class_id = $request->class_id;
        $lesson->period_id = $request->period_id;
        $lesson->course_id = $request->course_id;
        $lesson->save();

        return redirect()
            ->route("lessons.index")
            ->with("success", "Lesson created successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('lessons.show', ['lesson' => $lesson]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lesson = Lesson::findOrFail($id);
        $classes = SectionClass::all();
        $periods = Period::all();
        $courses = Course::all();
        $days = Day::buisnessDays();

        return view('lessons.edit', ['lesson' => $lesson, 'classes' => $classes, 'periods' => $periods, 'courses' => $courses, 'days' => $days]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lesson = Lesson::findOrFail($id);

        $lesson->day = $request->day;
        $lesson->nb_periods = $request->nb_periods;
        $lesson->professor = $request->professor;
        $lesson->classroom = $request->classroom;
        $lesson->class_id = $request->class_id;
        $lesson->period_id = $request->period_id;
        $lesson->course_id = $request->course_id;
        $lesson->save();

        return redirect()
            ->route("lessons.index")
            ->with("success", "Lesson updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lesson::findOrFail($id)->delete();

        return redirect()
            ->route("lessons.index")
            ->with("success", "Lesson deleted successfully");
    }
}
