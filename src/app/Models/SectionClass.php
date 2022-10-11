<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *\
    |*                           PUBLIC                            *|
    \* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * */

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }
}
