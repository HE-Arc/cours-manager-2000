<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Timetable
{
    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                     PRIVATE ATTRIBUTES                      *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    private string $period_id;
    private string $start_time;
    private int $nb_periods;
    private string $course_name;
    private string $course_professor;
    private string $course_classroom;
    private string $end_time;

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                        CONSTRUCTORS                         *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function __construct($period_id, $start_time, $nb_periods, $course_name, $course_professor, $course_classroom, $end_time)
    {
        $this->period_id = $period_id;
        $this->start_time = $start_time;
        $this->nb_periods = $nb_periods;
        $this->course_name = $course_name;
        $this->course_professor = $course_professor;
        $this->course_classroom = $course_classroom;
        $this->end_time = $end_time;
    }

    /* * * * * * * * * * * * * * * *\
    |*           GETTERS           *|
    \* * * * * * * * * * * * * * * */

    public function getPeriodId()
    {
        return $this->period_id;
    }

    public function getStartTime()
    {
        return $this->start_time;
    }

    public function getNbPeriods()
    {
        return $this->nb_periods;
    }

    public function getCourseName()
    {
        return $this->course_name;
    }

    public function getCourseProfessor()
    {
        return $this->course_professor;
    }

    public function getCourseClassroom()
    {
        return $this->course_classroom;
    }

    public function getEndTime()
    {
        return $this->end_time;
    }
}
