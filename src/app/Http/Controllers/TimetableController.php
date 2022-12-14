<?php

namespace App\Http\Controllers;

use App\Models\Lesson;
use App\Models\Day;
use App\Models\User;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */
    public function index() {
        $lessons = User::findOrFail(0)->lessons;

        return view("timetable.show", ["timetable" => self::parseLessons($lessons),
                                       "lessons"   => $lessons]);
    }


    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                          PRIVATE                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    private static function parseLessons($lessons)
    {
        // CSS Classes
        $css_class_div = "class=\"timetable\" style=\"display:flex; flex-direction: row; justify-content: center; align-items: center\"";
        $css_class_day_name = "class=\"dayname\"";
        $css_class_day_cell = "class=\"daycell\"";
        $css_class_lesson_row = "class=\"lesson\"";
        $css_class_lesson_tile = "class=\"tile\"";

        // Table parameters
        $table_params = "class=\"day\" border=\"1\" cellspacing=\"1\" align=\"center\"";

        // Schedule is in div
        $schedule = "";
        $schedule .= "<div " . $css_class_div . ">";

        foreach(Day::cases() as $day)
        {
            // Every day is one table filled with the days lessons
            // Static part of table
            $day_table = "";
            $day_table .= "<table " . $table_params . ">";
            // Row for day name
            $day_table .= "<tr " . $css_class_day_name . ">";
            $day_table .= "<td " . $css_class_day_cell . ">";
            $day_table .= $day->stringDay();
            $day_table .= "</td>";
            $day_table .= "</tr>";

            // Adding lessons rows

            $lesson_row = "";
            $previous_period = 0; // first lesson checks for start of day

            foreach($lessons as $lesson)
            {
                $lesson_row = "";
                if($lesson->string_day() == $day->stringDay())
                {
                    if($lesson->period_id - $previous_period > 1) // the lesson isn't starting when the last ended
                    {
                        $lesson_row .= "<td> ";
                        $lesson_row .= self::createNSpaces($lesson->period_id - $previous_period - 1);
                        $lesson_row .= "</td>";
                    }
                    $lesson_row .= "<tr " . $css_class_lesson_row . ">";

                    $lesson_td = "";
                    $lesson_td .= "<td " . $css_class_lesson_tile . ">";
                    $lesson_td .= $lesson->start_period() . "<br>";
                    $lesson_td .= $lesson->class->name . "<br>";
                    $lesson_td .= $lesson->course->name . "<br>";
                    $lesson_td .= $lesson->professor . "<br>";
                    $lesson_td .= $lesson->classroom . "<br>";

                    $lesson_td .= self::createNSpaces($lesson->nb_periods - 2);

                    $lesson_td .= $lesson->end_period() . "<br>" ;

                    $lesson_row .= $lesson_td;
                    $lesson_row .= "</tr>";
                    $day_table .= $lesson_row;

                    $previous_period = $lesson->end_period_id();
                }
            }

            if($previous_period != 14 or $previous_period != 25)
            {
                $lesson_row = "";
                if($previous_period < 14)
                {
                    $lesson_row .= "<tr><td>";
                    $lesson_row .= self::createNSpaces(14 - $previous_period);
                    $lesson_row .= "</td></tr>";
                }
                else if ($previous_period < 25)
                {
                    $lesson_row .= "<tr><td>";
                    $lesson_row .= self::createNSpaces(25 - $previous_period);
                    $lesson_row .= "</td></tr>";
                }

                $day_table .= $lesson_row;
            }

            $day_table .= "</table>";
            $schedule .= $day_table;
        }

        $schedule .= "</div>";

        return $schedule;
    }

    private static function createNSpaces($n)
    {
        $html = "";
        if($n > 0)
        {
            for($i = 0; $i < $n % 14; $i++)
            {
                $html .= "<br>"; // adding space for length visualisation
            }
        }
        return $html;
    }

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                   PRIVATE ATTRIBUTES                        *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

}

