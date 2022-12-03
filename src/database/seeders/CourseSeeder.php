<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = [
            ['name' => 'COMP', 'weighting' => '2', 'minimal_avg' => '3.75', 'module_id' => '1'],
            ['name' => 'CRYP', 'weighting' => '2', 'minimal_avg' => '3.75', 'module_id' => '1'],
            ['name' => 'INTEA_I', 'weighting' => '2', 'minimal_avg' => '3.75', 'module_id' => '1'],
            ['name' => 'PARAPA', 'weighting' => '2', 'minimal_avg' => '3.75', 'module_id' => '2'],
            ['name' => 'DEVEMOB_I', 'weighting' => '2', 'minimal_avg' => '3.75', 'module_id' => '2'],
            ['name' => 'DEVEWEB_I', 'weighting' => '2', 'minimal_avg' => '3.75', 'module_id' => '2']
        ];

        foreach ($courses as $course) {
            Course::create(array(
                'module_id' => $course["module_id"],
                'name'=> $course["name"],
                'weighting' => $course["weighting"],
                'minimal_avg'=> $course["minimal_avg"]
            ));
        }
    }
}
