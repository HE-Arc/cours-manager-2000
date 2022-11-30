<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $fillable = [
        'day',
        'nb_periods',
        'professor',
        'classroom',
    ];

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function start_period()
    {
        $intDate = strtotime($this->period->start_time);
        return date('H:i', $intDate);
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
}
