<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_id',
        'name',
        'weighting',
        'minimal_avg',
    ];

    /* * * * * * * * * * * * * * * *\
    |*           GETTERS           *|
    \* * * * * * * * * * * * * * * */

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function grades()
    {
        return $this->hasMany(Grade::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function mean()
    {
        $sum = 0;
        $total = 0;

        if (count($this->grades) === 0) return 0;

        foreach ($this->grades as $grade) {
            $total += $grade->coeff;
            $sum += $grade->coeff * $grade->value;
        }

        return round($sum / $total, 2);
    }

    public function isPassed()
    {
        $mean = $this->mean();

        return $mean >= $this->minimal_avg || $mean === 0;
    }
}
