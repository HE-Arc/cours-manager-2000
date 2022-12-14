<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'day',
        'period_id',
        'nb_periods',
        'professor',
        'classroom',
        'course_id'
    ];

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function start_period()
    {
        $intDate = strtotime($this->period->start_time);
        return date('H:i', $intDate);
    }

    public function end_period()
    {
        $id = $this->end_period_id();
        return date('H:i', strtotime(Period::find($id)->end_time));
    }

    public function end_period_id()
    {
        return $this->period_id + $this->nb_periods - 1;
    }

    public function string_day()
    {
        return Day::from($this->day)->stringDay();
    }

    /* * * * * * * * * * * * * * * *\
    |*           GETTERS           *|
    \* * * * * * * * * * * * * * * */

    /**
     * Be careful the method name must be the same as the class name.
     */
    public function sectionClass()
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
