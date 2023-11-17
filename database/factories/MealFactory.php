<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $meals = ['lundi midi', 'lundi soir', 'mardi midi', 'mardi soir', 'mercredi midi', 'mercredi soir', 'jeudi midi', 'jeudi soir', 'vendredi midi', 'vendredi soir', 'samedi midi', 'samedi soir', 'dimanche midi', 'dimanche soir'];
        
        return [
            'nameMeal' => $meals[array_rand($meals)],
        ];
    }
}
