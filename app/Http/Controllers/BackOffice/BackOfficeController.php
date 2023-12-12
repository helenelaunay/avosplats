<?php

namespace App\Http\Controllers\BackOffice;

use App\Models\Role;
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
        $roles = Role::get();
        $recipesToCheck = Recipe::where('checkedRecipe', '=', 0)->get();
        return view('BackOffice/index', compact('users', 'recipes', 'roles','recipesToCheck'));
    }
}
