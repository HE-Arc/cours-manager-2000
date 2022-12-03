<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [
            ['class_id' => '1', 'day' => '1', 'period_id' => '1', 'nb_periods' => '3', 'course_id' => '1', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '2', 'day' => '1', 'period_id' => '6', 'nb_periods' => '2', 'course_id' => '2', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '3', 'day' => '2', 'period_id' => '2', 'nb_periods' => '2', 'course_id' => '3', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '4', 'day' => '2', 'period_id' => '5', 'nb_periods' => '3', 'course_id' => '4', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '1', 'day' => '3', 'period_id' => '1', 'nb_periods' => '2', 'course_id' => '1', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '2', 'day' => '3', 'period_id' => '6', 'nb_periods' => '4', 'course_id' => '2', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '3', 'day' => '4', 'period_id' => '4', 'nb_periods' => '5', 'course_id' => '3', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '4', 'day' => '4', 'period_id' => '10', 'nb_periods' => '2', 'course_id' => '4', 'professor' => 'FTG', 'classroom' => 'NE369'],
            ['class_id' => '3', 'day' => '5', 'period_id' => '16', 'nb_periods' => '3', 'course_id' => '3', 'professor' => 'FTG', 'classroom' => 'NE369']
        ];

        foreach ($lessons as $lesson) {
            Lesson::create(array(
                'class_id' => $lesson["class_id"],
                'day'=> $lesson["day"],
                'period_id' => $lesson["period_id"],
                'nb_periods'=> $lesson["nb_periods"],
                'professor'=> $lesson["professor"],
                'classroom'=> $lesson["classroom"],
                'course_id'=> $lesson["course_id"]
            ));
        }
    }
}
