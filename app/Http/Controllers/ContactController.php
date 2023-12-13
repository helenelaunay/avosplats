<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function editForm()
    {
        return view('/contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function submitForm(Request $request)
    {
        // Validation des données
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Envoi d'e-mail
        $data = [
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Mail::to('contact@avosplats.fr')->send(new \App\Mail\ContactMail($data));

        return redirect()->route('editFormContact')->with('message', 'Votre message a bien été envoyé.');   
    }
}
