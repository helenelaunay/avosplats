<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Menu::create([
            'nameMenu' => 'Mon menu du lundi 27/11 au dimanche 03/12',
            'user_id' => 2,
        ]);
    }
}
