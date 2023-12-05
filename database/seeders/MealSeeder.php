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
        'recipe_id' => rand(1,60) 
       ]);

       Meal::create([
        'nameMeal' => 'lundi soir',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'mardi midi',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'mardi soir',
        'recipe_id' => rand(1,60)  
       ]);

       Meal::create([
        'nameMeal' => 'mercredi midi',
        'recipe_id' => rand(1,60)  
       ]);

       Meal::create([
        'nameMeal' => 'mercredi soir',
        'recipe_id' => rand(1,60)  
       ]);

       Meal::create([
        'nameMeal' => 'jeudi midi',
        'recipe_id' => rand(1,60)  
       ]);

       Meal::create([
        'nameMeal' => 'jeudi soir',
        'recipe_id' => rand(1,60)  
       ]);

       Meal::create([
        'nameMeal' => 'vendredi midi',
        'recipe_id' => null   
       ]);

       Meal::create([
        'nameMeal' => 'vendredi soir',
        'recipe_id' => null   
       ]);

       Meal::create([
        'nameMeal' => 'samedi midi',
        'recipe_id' => rand(1,60)  
       ]);

       Meal::create([
        'nameMeal' => 'samedi soir',
        'recipe_id' => rand(1,60)  
       ]);

       Meal::create([
        'nameMeal' => 'dimanche midi',
        'recipe_id' => null   
       ]);

       Meal::create([
        'nameMeal' => 'dimanche soir',
        'recipe_id' => rand(1,60)  
       ]);
    }
}
