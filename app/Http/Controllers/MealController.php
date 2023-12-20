<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
    public function addRecipeMeal(Request $request)
    {
        $meal = Meal::find($request->meal_id);

        $meal->recipe_id = $request->recipe_id;

        $meal->save();

        return redirect()->route('home')->with('message', 'Votre recette a été ajoutée');
    }

    public function updateRecipeMeal(Request $request)
    {
        $meal = Meal::find($request->meal_id);

        $meal->recipe_id = null;

        $meal->save();

        return redirect()->route('home')->with('message', 'Votre recette a été retirée');
    }
}
