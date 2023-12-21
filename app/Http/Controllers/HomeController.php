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


        $mealsLundi = [];
        $mealsMardi = [];
        $mealsMercredi = [];
        $mealsJeudi = [];
        $mealsVendredi = [];
        $mealsSamedi = [];
        $mealsDimanche = [];
        foreach ($menus as $menu) {
            foreach ($menu->meals as $meal) {
                switch ($meal) {
                    case str_contains($meal->nameMeal, 'lundi'):
                        array_push($mealsLundi, $meal);
                        break;
                    case str_contains($meal->nameMeal, 'mardi'):
                        array_push($mealsMardi, $meal);
                        break;
                    case str_contains($meal->nameMeal, 'mercredi'):
                        array_push($mealsMercredi, $meal);
                        break;
                    case str_contains($meal->nameMeal, 'jeudi'):
                        array_push($mealsJeudi, $meal);
                        break;
                    case str_contains($meal->nameMeal, 'vendredi'):
                        array_push($mealsVendredi, $meal);
                        break;
                    case str_contains($meal->nameMeal, 'samedi'):
                        array_push($mealsSamedi, $meal);
                        break;
                    case str_contains($meal->nameMeal, 'dimanche'):
                        array_push($mealsDimanche, $meal);
                        break;
                }
            }
        }

        return view('home', compact('menus', 'user', 'mealsMidi', 'mealsSoir', 'mealsLundi', 'mealsMardi', 'mealsMercredi', 'mealsJeudi', 'mealsVendredi', 'mealsSamedi', 'mealsDimanche'));
    }
}
