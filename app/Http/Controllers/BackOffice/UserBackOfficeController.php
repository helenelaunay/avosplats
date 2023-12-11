<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserBackOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        $clickedUserLink = true;
        return view('BackOffice/index', compact('users', 'clickedUserLink'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $user = User::find($id);

        if ($user) {

            $user->delete(); // on réalise la suppression de l'utilisateur
            unlink(public_path('photos_de_profil' . '/' . $user->photo)); // on supprime aussi la photo de l'utilisateur
            return redirect()->route('indexBackOffice')->with('message', 'Le compte a bien été supprimé.');
        } else {
            return redirect()->back()->withErrors(['erreur' => 'Suppression du compte impossible.']);
        }
    }
}
