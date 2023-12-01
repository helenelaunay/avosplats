<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $with = ['meals'];

    protected $fillable = [
        'nameMenu',
        'user_id'
    ];


    public function meals()
    {
        return $this->belongsToMany(Meal::class, 'meals_menus');
    }
}
