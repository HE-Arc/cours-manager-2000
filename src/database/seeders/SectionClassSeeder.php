<?php

namespace Database\Seeders;

use App\Models\SectionClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $section_classes = [
            ['name' => 'ISC3il-b'],
            ['name' => 'ISC3id'],
            ['name' => 'ISC3ie'],
            ['name' => 'ISC3il-a']
        ];

        foreach ($section_classes as $section_class) {
            SectionClass::create(array(
                'name' => $section_class["name"]
            ));
        }
    }
}
