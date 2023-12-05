<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nameRecipe',
        'photoRecipe',
        'emailUser',
        'contentRecipe',
        'checkedRecipe',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
    
}
