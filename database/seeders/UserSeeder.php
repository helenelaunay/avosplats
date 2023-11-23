<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Création de l'administrateur
        User::create([ 
        'pseudo' => 'administrateur',
        'photo' => 'photo.jpg',
        'email' => 'admin@test.fr',
        'email_verified_at' => now(),
        'password' => Hash::make('Administrateur'),
        'remember_token' => Str::random(10),
        'role_id' => 2
        ]);

        // Création d'un utilisateur test
        User::create([ 
            'pseudo' => 'utilisateur',
            'photo' => 'photo.jpg',
            'email' => 'utilisateur@test.fr',
            'email_verified_at' => now(),
            'password' => Hash::make('Utilisateur'),
            'remember_token' => Str::random(10),
            'role_id' => 1
        ]);

        // Création de 8 users aléatoires
        User::factory(8)->create();
    }
}
