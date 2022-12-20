<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ISC3ilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $modules = [
            ['id' => 3222, 'name' => 'Compétences Professionnelles', 'minimal_avg' => 3.75],
            ['id' => 3250, 'name' => 'Environnement Logiciel', 'minimal_avg' => 3.75],
            ['id' => 3251, 'name' => 'Applications Logicielles', 'minimal_avg' => 3.75],
            ['id' => 3290, 'name' => 'Imagerie', 'minimal_avg' => 3.75],
            ['id' => 3291, 'name' => 'Informatique Spécifique', 'minimal_avg' => 3.75],
            ['id' => 3281, 'name' => 'Projet P3 HES', 'minimal_avg' => 3.75],
            ['id' => 3282, 'name' => 'Projet P3', 'minimal_avg' => 3.75]
        ];

        $courses = [
            ['indicator' => 1, 'name' => 'Entreprises et innovations', 'weighting' => 1, 'minimal_avg' => 2.95, 'module_id' => 3222],
            ['indicator' => 2, 'name' => 'Communication et gestion d\'équipe', 'weighting' => 1, 'minimal_avg' => 2.95, 'module_id' => 3222],
            ['indicator' => 3, 'name' => 'Qualité du logiciel', 'weighting' => 1, 'minimal_avg' => 2.95, 'module_id' => 3222],

            ['indicator' => 1, 'name' => 'Compilateurs', 'weighting' => 4, 'minimal_avg' => 2.95, 'module_id' => 3250],
            ['indicator' => 2, 'name' => 'Cryptographie', 'weighting' => 2, 'minimal_avg' => 2.95, 'module_id' => 3250],
            ['indicator' => 3, 'name' => 'Intelligence Artificielle I', 'weighting' => 3, 'minimal_avg' => 2.95, 'module_id' => 3250],

            ['indicator' => 1, 'name' => 'Paradigmes de programmations avancées', 'weighting' => 2, 'minimal_avg' => 2.95, 'module_id' => 3251],
            ['indicator' => 2, 'name' => 'Développement mobile I', 'weighting' => 2, 'minimal_avg' => 2.95, 'module_id' => 3251],
            ['indicator' => 3, 'name' => 'Développement web I', 'weighting' => 4, 'minimal_avg' => 2.95, 'module_id' => 3251],
            ['indicator' => 4, 'name' => 'Oral PDPA & Web', 'weighting' => 3, 'minimal_avg' => 2.95, 'module_id' => 3251],

            ['indicator' => 1, 'name' => 'Traitement d\'images I', 'weighting' => 1, 'minimal_avg' => 2.95, 'module_id' => 3290],
            ['indicator' => 2, 'name' => 'Modèles d\'infographie', 'weighting' => 1, 'minimal_avg' => 2.95, 'module_id' => 3290],

            ['indicator' => 1, 'name' => 'Traitement parallèle de données I', 'weighting' => 3, 'minimal_avg' => 2.95, 'module_id' => 3291],
            ['indicator' => 2, 'name' => 'JEE / Spring I', 'weighting' => 2, 'minimal_avg' => 2.95, 'module_id' => 3291],
            ['indicator' => 3, 'name' => 'Oral TPD', 'weighting' => 2, 'minimal_avg' => 2.95, 'module_id' => 3291],

            ['indicator' => 1, 'name' => 'Projet P3 HES', 'weighting' => 1, 'minimal_avg' => 2.95, 'module_id' => 3281],

            ['indicator' => 1, 'name' => 'Projet P3', 'weighting' => 1, 'minimal_avg' => 2.95, 'module_id' => 3282]
        ];

        foreach ($modules as $module) {
            Module::create(array(
                'id' => $module['id'],
                'name' => $module['name'],
                'minimal_avg' => $module['minimal_avg']
            ));
        }

        foreach ($courses as $course) {
            Course::create(array(
                'indicator' => $course['indicator'],
                'name' => $course['name'],
                'weighting' => $course['weighting'],
                'minimal_avg' => $course['minimal_avg'],
                'module_id' => $course['module_id']
            ));
        }

        User::create(array(
            'first_name' => 'Admin',
            'last_name' => "HE-ARC",
            'admin' => true,
            'email' => 'admin.hearc@he-arc.ch',
            'password' => Hash::make('admin.hearc1234')
        ));
    }
}
