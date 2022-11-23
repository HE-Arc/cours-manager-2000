<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;
use App\Models\Period;
use App\Models\Lesson;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = [
            ['name' => 'Neuchâtel'],
            ['name' => 'St-Imier']
        ];

        foreach ($locations as $location) {
            Location::create(array(
                'name' => $location["name"]
            ));
        }
    }
}
