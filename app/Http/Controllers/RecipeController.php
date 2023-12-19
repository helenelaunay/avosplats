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
        $recipes = Recipe::where('checkedRecipe', '=', true)->orderBy('nameRecipe', 'asc')->get();
        return view('recipe/index', compact('recipes', 'meal_id', 'users'));
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
    public function show(Recipe $recipe, $id)
    {

        $recipe = Recipe::find($id);

        return view('recipe/show', compact('recipe'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe, $id)
    {
        $recipe = Recipe::find($id);
        return view('recipe/edit', compact('recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'nameRecipe' => 'required|max:150',
            'photoRecipe' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'contentRecipe' => 'required'
        ]);

        $recipe = Recipe::find($id);
        $recipe->nameRecipe = $request->input('nameRecipe');
        $recipe->contentRecipe = $request->input('contentRecipe');

        if ($request->hasFile('photoRecipe')) {

            // on supprime l'image actuelle si ce n'est pas celle par défaut 
            if (public_path('photos_des_recettes' . '/' . $recipe->photoRecipe)) {
                if ($request->file('photoRecipe') !== 'default_recipe.jpg') {
                    $photoRecipe = time() . '.' . $request['photoRecipe']->extension();
                    $recipe->photoRecipe = $photoRecipe;
                    $request['photoRecipe']->move(public_path('photos_des_recettes'), $photoRecipe);
                } else {
                    unlink(public_path('photos_des_recettes' . '/' . $recipe->photoRecipe));
                }
            }
        }

        $recipe->checkedRecipe = false;
        $recipe->user_id = auth::user()->id;

        $recipe->save();

        return redirect()->route('home')->with('message', 'Votre recette a bien été modifiée, elle est en attente de validation.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe, $id)
    {

        $recipe = Recipe::find($id);
        $recipe->delete();
        //suppression de la photo de la recette si elle n'est pas 'default_recipe.jpg'
        if ($recipe->photo !== 'default_recipe.jpg') {
            unlink(public_path('photos_des_recettes' . '/' . $recipe->photoRecipe));
        }
        return redirect()->route('home')->with('message', 'La recette a bien été supprimée.');
    }
}
