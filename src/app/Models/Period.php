<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'location_id',
        'start_time',
        'end_time',
    ];

    /* * * * * * * * * * * * * * * *\
    |*           GETTERS           *|
    \* * * * * * * * * * * * * * * */

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function startTime()
    {
        $intDate = strtotime($this->start_time);
        return date('H:i', $intDate);
    }

    public function endTime()
    {
        $intDate = strtotime($this->end_time);
        return date('H:i', $intDate);
    }
}
