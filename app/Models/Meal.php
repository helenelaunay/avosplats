<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    use HasFactory;

    protected $with = ['recipe'];

    protected $fillable = [
        'nameMeal',
        'menu_id',
        'recipe_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menus()
    {
        return $this->belongsToMany(Menu::class, 'meals_menus');
    }

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
