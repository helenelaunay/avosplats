<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'pseudo' => 'nullable|max:40',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //on modifie les infos de l'utilisateur
        $user->pseudo = $request->input('pseudo');

        if ($request->hasFile('photo') && $request->has('photo')) {

            // on supprime l'image actuelle si elle existe avant de stocker la nouvelle
            if (public_path($user->photo)) {
                unlink(public_path('photos_de_profil' . '/' . $user->photo));
            }

            $photoName = time() . '.' . $request['photo']->extension();
            $user->photo = $photoName;
            $request['photo']->move(public_path('photos_de_profil'), $photoName);
        }

        //on sauvegarde les changement en db
        $user->save();

        //on redirige sur la page précédente
        return back()->with('message', 'Le compte a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // on vérifie que c'est bien l'utilisateur connecté qui fait la demande de suppression 
        // les id doivent être identiques
        if (Auth::user()->id == $user->id) {
            $user->delete(); // on réalise la suppression de l'utilisateur
            unlink(public_path('photos_de_profil' . '/' . $user->photo)); // on supprime aussi la photo de l'utilisateur
            return redirect()->route('welcome')->with('message', 'Le compte a bien été supprimé.');
        } else {
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible.']);
        }
    }

    public function editPassword(User $user)
    {
        return view('user/editPassword', ['user' => $user]);
    }

    public function updatePassword(Request $request, User $user)
    {
        // on vérifie que c'est bien l'utilisateur connecté qui fait la demande de modification de mot de passe 
        // les id doivent être identiques
        if (Auth::user()->id == $user->id) {


            $request->validate([
                'password' => 'required',
                'new_password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
                'confirm_new_password' => ['required', Password::min(8)->letters()->mixedCase()->numbers()->symbols()],
            ]);


            // Vérifier que le mot de passe actuel est correct
            if (Hash::check($request->input('password'), $user->password)) {

                // Vérifie que le nouveau mot de passe est différent de l'ancien
                if ($request->input('password') !== $request->input('new_password')) {

                    // Vérifie que le nouveau mot de passe correspond à la confirmation
                    if ($request->input('new_password') === $request->input('confirm_new_password')) {

                        // Mettre à jour le mot de passe de l'utilisateur
                        $user->update([
                            'password' => Hash::make($request->new_password),
                        ]);

                        // Rediriger avec un message de succès
                        return back()->with('message', 'Le mot de passe a bien été mis à jour.');
                    } else {

                        // Rediriger avec un message d'erreur si le nouveau mot de passe ne correspond pas avec la confirmation
                        return redirect()->back()->withErrors(['erreur' => 'Le nouveau mot de passe ne correspond pas avec la confirmation !']);
                    }
                } else {

                    // Rediriger avec un message d'erreur si le nouveau mot de passe est identique à l'ancien
                    return redirect()->back()->withErrors(['erreur' => 'Le nouveau mot de passe est identique avec l\'ancien.']);
                }
            } else {

                // Rediriger avec un message d'erreur si le mot de passe actuel est incorrect
                return redirect()->back()->withErrors(['erreur' => 'Le mot de passe actuel est incorrect.']);
            }
        }
    }

    public function recipeByUser(User $user, $id)
    {

        if (Auth::user()->id == $id) {

            $recipes = Recipe::where('user_id', '=', $id)->where('checkedRecipe', '=', true)->get();

            return view('user/recipeByUser', compact('recipes'));
        }
    }

}
