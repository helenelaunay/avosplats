<?php

namespace Database\Factories;

use App\Models\Meal;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nameRecipe' => $this->faker->sentence(rand(3,6),true),
            'photoRecipe' => 'image_recipe_' . rand(1,9) . '.jpg',
            'contentRecipe' => $this->faker->paragraph(rand(3,7)),
            'checkedRecipe' => true, // Toujours définir comme validée,
            'user_id' => rand(1, User::count()), 
        ];
    }
}
