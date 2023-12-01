<?php

namespace Database\Seeders;

use App\Models\Meal;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MealsMenusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=1; $i <= Meal::count() ; $i++) { 
            DB::table('meals_menus')->insert([
                'meal_id' => $i,
                'menu_id' => 1
            ]);            
        }
    }
}
