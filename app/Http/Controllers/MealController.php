<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use Illuminate\Http\Request;

class MealController extends Controller
{
public function addRecipeMeal(Request $request) {
$meal = Meal::find($request->meal_id);

$meal->update([
    'recipe_id' => $request->recipe_id
]);
$meal->save();

return redirect()->route('home')->with('message', 'Recette ajoutée');
}
}
