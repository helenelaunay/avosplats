<?php

namespace App\Http\Controllers\BackOffice;

use auth;
use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class RecipeBackOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::orderBy('nameRecipe', 'asc')->get();
        $recipesToCheck = Recipe::where('checkedRecipe', '=', 0)->get();
        $clickedRecipeLink = true;
        return view('BackOffice/index', compact('recipes', 'clickedRecipeLink', 'recipesToCheck'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        return view('BackOffice/editRecipe', compact('recipe'));
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

        $recipe->checkedRecipe = true;

        $recipe->save();

        return redirect()->route('indexBackOffice')->with('message', 'La recette a bien été modifiée.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe, $id)
    {
        $recipe = Recipe::find($id);
        $user = User::find($recipe->user_id);
        $recipe->delete();
        //suppression de la photo de la recette si elle n'est pas 'default_recipe.jpg'
        if ($recipe->photo !== 'default_recipe.jpg') {
            unlink(public_path('photos_des_recettes' . '/' . $recipe->photoRecipe));
        }
        //vérification que l'utilisateur existe
        if ($user) {

        // Envoi d'e-mail
            Mail::to($user->email)->send(new \App\Mail\DeniedRecipeMail());
        }
       

        return redirect()->route('indexBackOffice')->with('message', 'La recette a bien été supprimée.');
    }

    public function checked($id)
    {
        $recipe = Recipe::find($id);
        $recipe->checkedRecipe = true;

        $recipe->save();

        return redirect()->route('indexBackOffice')->with('message', 'La recette a bien été validée.');
    }
}
