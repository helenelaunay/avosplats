<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Création des différents repas
       Meal::create([
        'nameMeal' => 'lundi midi', 
       ]);

       Meal::create([
        'nameMeal' => 'lundi soir', 
       ]);

       Meal::create([
        'nameMeal' => 'mardi midi', 
       ]);

       Meal::create([
        'nameMeal' => 'mardi soir', 
       ]);

       Meal::create([
        'nameMeal' => 'mercredi midi', 
       ]);

       Meal::create([
        'nameMeal' => 'mercredi soir', 
       ]);

       Meal::create([
        'nameMeal' => 'jeudi midi', 
       ]);

       Meal::create([
        'nameMeal' => 'jeudi soir', 
       ]);

       Meal::create([
        'nameMeal' => 'vendredi midi', 
       ]);

       Meal::create([
        'nameMeal' => 'vendredi soir', 
       ]);

       Meal::create([
        'nameMeal' => 'samedi midi', 
       ]);

       Meal::create([
        'nameMeal' => 'samedi soir', 
       ]);

       Meal::create([
        'nameMeal' => 'dimanche midi', 
       ]);

       Meal::create([
        'nameMeal' => 'dimanche soir', 
       ]);
    }
}
