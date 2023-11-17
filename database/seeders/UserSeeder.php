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
        'pseudoUser' => 'administrateur',
        'photoUser' => 'photo.jpg',
        'emailUser' => 'admin@test.fr',
        'email_verified_at' => now(),
        'passwordUser' => Hash::make('Administrateur'),
        'remember_token' => Str::random(10),
        'role_id' => 2
        ]);

        // Création d'un utilisateur test
        User::create([ 
            'pseudoUser' => 'utilisateur',
            'photoUser' => 'photo.jpg',
            'emailUser' => 'utilisateur@test.fr',
            'email_verified_at' => now(),
            'passwordUser' => Hash::make('Utilisateur'),
            'remember_token' => Str::random(10),
            'role_id' => 2
        ]);

        // Création de 8 users aléatoires
        User::factory(8)->create();
    }
}
