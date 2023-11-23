<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
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
            'pseudo' => 'required|max:40',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //on modifie les infos de l'utilisateur
        $user->pseudo = $request->input('pseudo');
        
        if ($request->hasFile('photo') && $request->has('photo')){

            // on supprime l'image actuelle si elle existe avant de stocker la nouvelle
            if(public_path($user->photo)){
                unlink(public_path('photos_de_profil' . '/' . $user->photo));
            }

            $photoName = time() . '.' . $request['photo']->extension();
            $user->photo = $photoName;
            $request['photo']->move(public_path('photos_de_profil'), $photoName);
        } 

        //on sauvegarde les changement en db
        $user->save();

        //on redirige sur la page précédente
        return back()-> with('message', 'Le compte a bien été modifié.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // on vérifie que c'est bien l'utilisateur connecté qui fait la demande de suppression 
        // les id doivent être identiques
        if (Auth::user()->id == $user->id) {
            $user->delete(); // on réalise la suppression
            return redirect()->route('welcome')->with('message', 'Le compte a bien été supprimé.');
        } else {
            return redirect()->back()->withErrors(['erreur'=> 'Suppression du compte impossible.']);
        }
    }
}

