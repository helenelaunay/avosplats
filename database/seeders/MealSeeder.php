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
        'nameMeal' => 'lundi_midi',
        'recipe_id' => null 
       ]);

       Meal::create([
        'nameMeal' => 'lundi_soir',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'mardi_midi',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'mardi_soir',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'mercredi_midi',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'mercredi_soir',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'jeudi_midi',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'jeudi_soir',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'vendredi_midi',
        'recipe_id' => null   
       ]);

       Meal::create([
        'nameMeal' => 'vendredi_soir',
        'recipe_id' => null   
       ]);

       Meal::create([
        'nameMeal' => 'samedi_midi',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'samedi_soir',
        'recipe_id' => null  
       ]);

       Meal::create([
        'nameMeal' => 'dimanche_midi',
        'recipe_id' => null   
       ]);

       Meal::create([
        'nameMeal' => 'dimanche_soir',
        'recipe_id' => null  
       ]);
    }
}
