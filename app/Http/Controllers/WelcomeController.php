<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $latestRecipes = Recipe::latest()->take(4)->get();
        return view('welcome', compact('latestRecipes'));
    }
}
