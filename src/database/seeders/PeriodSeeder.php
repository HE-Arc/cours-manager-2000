<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periods = [
            ['location_id' => '1', 'start_time' => '8:15:00', 'end_time' => '9:00:00'],
            ['location_id' => '1', 'start_time' => '9:00:00', 'end_time' => '9:45:00'],
            ['location_id' => '1', 'start_time' => '10:00:00', 'end_time' => '10:45:00'],
            ['location_id' => '1', 'start_time' => '10:50:00', 'end_time' => '11:35:00'],
            ['location_id' => '1', 'start_time' => '11:40:00', 'end_time' => '12:25:00'],
            ['location_id' => '1', 'start_time' => '12:30:00', 'end_time' => '13:15:00'],
            ['location_id' => '1', 'start_time' => '13:15:00', 'end_time' => '14:00:00'],
            ['location_id' => '1', 'start_time' => '14:05:00', 'end_time' => '14:50:00'],
            ['location_id' => '1', 'start_time' => '15:05:00', 'end_time' => '15:50:00'],
            ['location_id' => '1', 'start_time' => '15:55:00', 'end_time' => '16:40:00'],
            ['location_id' => '1', 'start_time' => '16:40:00', 'end_time' => '17:25:00'],
            ['location_id' => '1', 'start_time' => '17:25:00', 'end_time' => '18:10:00'],
            ['location_id' => '1', 'start_time' => '18:10:00', 'end_time' => '18:55:00'],
            ['location_id' => '1', 'start_time' => '18:55:00', 'end_time' => '19:40:00'],
            ['location_id' => '2', 'start_time' => '8:30:00', 'end_time' => '9:15:00'],
            ['location_id' => '2', 'start_time' => '9:15:00', 'end_time' => '10:00:00'],
            ['location_id' => '2', 'start_time' => '10:15:00', 'end_time' => '11:00:00'],
            ['location_id' => '2', 'start_time' => '11:00:00', 'end_time' => '11:45:00'],
            ['location_id' => '2', 'start_time' => '11:45:00', 'end_time' => '12:30:00'],
            ['location_id' => '2', 'start_time' => '12:45:00', 'end_time' => '13:30:00'],
            ['location_id' => '2', 'start_time' => '13:30:00', 'end_time' => '14:15:00'],
            ['location_id' => '2', 'start_time' => '14:30:00', 'end_time' => '15:15:00'],
            ['location_id' => '2', 'start_time' => '15:15:00', 'end_time' => '16:00:00'],
            ['location_id' => '2', 'start_time' => '16:05:00', 'end_time' => '16:50:00'],
            ['location_id' => '2', 'start_time' => '16:50:00', 'end_time' => '17:35:00'],
            ['location_id' => '2', 'start_time' => '17:35:00', 'end_time' => '18:20:00']

        ];

        foreach ($periods as $period) {
            Period::create(array(
                'location_id' => $period["location_id"],
                'start_time' => $period["start_time"],
                'end_time' => $period["end_time"]
            ));
        }
    }
}
