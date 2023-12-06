<?php

namespace App\Http\Controllers;


use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $meal_id = $request->meal_id;
        $users = User::get();
        $recipes = Recipe::where('checkedRecipe', '=', true)->get();
        return view('recipe/index', compact('recipes', 'meal_id'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::get();
        return view('recipe/create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            
        $users = User::get();
        
        $request->validate([
            'nameRecipe' => 'required|max:150',
            'photoRecipe' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contentRecipe' => 'required'
        ]);

        $photoRecipe = time() . '.' . $request['photoRecipe']->extension();
        $request['photoRecipe']->move(public_path('photos_des_recettes'), $photoRecipe);

        $recipes = Recipe::create([
            'nameRecipe' => $request->nameRecipe,        
            'photoRecipe' => $photoRecipe,
            'contentRecipe' => $request->contentRecipe,
            'checkedRecipe' => false,
            'user_id' => auth::user()->id 
        ]);
        return redirect()->route('indexRecipe')->with('message', 'Votre recette a bien été créée, elle est en attente de validation !');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $recipes = Recipe::where("id", "=", $request->recipe_id)->get();
        return view('recipe/show', compact('recipes'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
