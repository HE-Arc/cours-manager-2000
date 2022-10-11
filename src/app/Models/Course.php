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

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function module()
    {
        return $this->belongsTo(Module::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
