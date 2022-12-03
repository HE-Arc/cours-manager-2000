<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ['name' => '3250_Environ_logiciel_SA', 'minimal_avg' => '3.75'],
            ['name' => '3251_App_logicielles_SA', 'minimal_avg' => '3.75']
        ];

        foreach ($modules as $module) {
            Module::create(array(
                'name' => $module["name"],
                'minimal_avg'=> $module["minimal_avg"]
            ));
        }
    }
}
