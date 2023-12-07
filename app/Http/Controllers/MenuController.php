<?php

namespace App\Http\Controllers;


use App\Models\Meal;
use App\Models\Menu;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = auth::user();
        return view('menu/create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nameMenu' => 'required|max:150',
        ]);

        $menu = Menu::create([
            'nameMenu' => $request->nameMenu,
            'user_id' => auth::user()->id, 
        ]);

        $meals = Meal::get();
        foreach ($meals as $meal) {
            DB::table('meals_menus')->insert([
                'meal_id' => $meal->id,
                'menu_id' => $menu->id
            ]);            
            
        }
        return redirect()->route('home')->with('message', 'Votre menu a bien été créé !');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $menu = Menu::find($request->idMenu);
        return view('menu/edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nameMenu' => 'required|max:150',
        ]);

        //on modifie le nom du Menu
        $menu->nameMenu = $request->input('nameMenu'); 
        $menu->user_id = Auth::user()->id;  

        //on sauvegarde les changement en db
        $menu->save();

        //on redirige sur la page précédente
        return redirect()->route('home')-> with('message', 'Le nom du menu a bien été modifié.');            
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, $id)
    {
        if (Auth::user()->id == $request->user_id) {
            $menu = Menu::find($id);
            $menu->delete(); // on réalise la suppression du menu
            return redirect()->route('home')->with('message', 'Le menu a bien été supprimé.');
        } else {
            return redirect()->back()->withErrors(['erreur'=> 'Suppression du menu impossible.']);
        }
    }
}
