<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
         $menus = Menu::where("user_id", "=", $user->id)->latest()->take(2)->get();
        //$menus = [$user->menu[0],$user->menu[1]];
   
        $mealsMidi = [];
        $mealsSoir = [];
        foreach ($menus as $menu) {
            foreach ($menu->meals as $meal) {
                if (str_contains($meal->nameMeal, 'midi')) {
                    array_push($mealsMidi, $meal);
                } else {
                    array_push($mealsSoir, $meal);
                }
            }
        }
        // dd($mealsMidi); 

        return view('home', compact('menus', 'user', 'mealsMidi', 'mealsSoir'));
    }
}
