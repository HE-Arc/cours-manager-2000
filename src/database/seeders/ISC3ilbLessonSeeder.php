<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ISC3ilbLessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lessons = [
            // Lundi
            ['class_id' => 1, 'day' => 1, 'period_id' => 16, 'nb_periods' => 3, 'course_id' => 11, 'professor' => 'OHU', 'classroom' => 'SI2F40'],
            ['class_id' => 1, 'day' => 1, 'period_id' => 20, 'nb_periods' => 4, 'course_id' => 17, 'professor' => '-', 'classroom' => 'SI2E50'],
            // Mardi
            ['class_id' => 1, 'day' => 2, 'period_id' => 1, 'nb_periods' => 4, 'course_id' => 4, 'professor' => 'FRT', 'classroom' => 'NE104'],
            ['class_id' => 1, 'day' => 2, 'period_id' => 6, 'nb_periods' => 2, 'course_id' => 5, 'professor' => 'NMA', 'classroom' => 'NE120'],
            ['class_id' => 1, 'day' => 2, 'period_id' => 8, 'nb_periods' => 3, 'course_id' => 13, 'professor' => 'CBI', 'classroom' => 'NE306'],
            // Mercredi
            ['class_id' => 1, 'day' => 3, 'period_id' => 1, 'nb_periods' => 2, 'course_id' => 3, 'professor' => 'MSA_X', 'classroom' => 'NE126'],
            ['class_id' => 1, 'day' => 3, 'period_id' => 3, 'nb_periods' => 2, 'course_id' => 14, 'professor' => 'CHE_X', 'classroom' => 'NE110'],
            ['class_id' => 1, 'day' => 3, 'period_id' => 6, 'nb_periods' => 2, 'course_id' => 9, 'professor' => 'DGR', 'classroom' => 'NE120'],
            ['class_id' => 1, 'day' => 3, 'period_id' => 8, 'nb_periods' => 4, 'course_id' => 9, 'professor' => 'DGR', 'classroom' => 'NE128'],
            // Jeudi
            ['class_id' => 1, 'day' => 4, 'period_id' => 1, 'nb_periods' => 3, 'course_id' => 6, 'professor' => 'FAL', 'classroom' => 'NE013'],
            ['class_id' => 1, 'day' => 4, 'period_id' => 6, 'nb_periods' => 2, 'course_id' => 8, 'professor' => 'ARI', 'classroom' => 'NE120'],
            ['class_id' => 1, 'day' => 4, 'period_id' => 8, 'nb_periods' => 2, 'course_id' => 7, 'professor' => 'ARI', 'classroom' => 'NE128'],
            // Vendredi
            ['class_id' => 1, 'day' => 5, 'period_id' => 1, 'nb_periods' => 3, 'course_id' => 1, 'professor' => 'CHE', 'classroom' => 'NE112'],
            ['class_id' => 1, 'day' => 5, 'period_id' => 4, 'nb_periods' => 2, 'course_id' => 2, 'professor' => 'CHE', 'classroom' => 'NE112'],
            ['class_id' => 1, 'day' => 5, 'period_id' => 7, 'nb_periods' => 3, 'course_id' => 12, 'professor' => 'STG', 'classroom' => 'NE316']
        ];

        foreach ($lessons as $lesson) {
            Lesson::create(array(
                'class_id' => $lesson["class_id"],
                'day' => $lesson["day"],
                'period_id' => $lesson["period_id"],
                'nb_periods' => $lesson["nb_periods"],
                'professor' => $lesson["professor"],
                'classroom' => $lesson["classroom"],
                'course_id' => $lesson["course_id"]
            ));
        }
    }
}
