<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Recipe;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class BackOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::get();
        $recipes = Recipe::get();
        return view('BackOffice/index', compact('users', 'recipes'));
    }
}
