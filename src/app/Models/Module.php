<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'minimal_avg',
    ];

    /* * * * * * * * * * * * * * * *\
    |*           GETTERS           *|
    \* * * * * * * * * * * * * * * */

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function mean()
    {
        $sum = 0;
        $total = 0;

        foreach ($this->courses as $course) {
            $mean = $course->mean();

            if ($mean === 0) continue;

            $total += $course->weighting;
            $sum += $course->weighting * $course->mean();
        }

        if ($sum == 0) return 0;

        return round($sum / $total, 2);
    }

    public function isPassed()
    {
        $mean = $this->mean();

        return $mean >= $this->minimal_avg || $mean === 0;
    }
}
