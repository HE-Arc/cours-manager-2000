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

    public function class()
    {
        return $this->belongsTo(SectionClass::class);
    }

    public function start_period()
    {
        return $this->belongsTo(Period::class);
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
