<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // a revoir !!!
        return [
            "nameMenu" => $this->faker->sentence(rand(3,6),true),
            'user_id' => rand(1, User::count()), 
        ];
    }
}
