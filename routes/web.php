<?php

use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

// Route Home
Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

// Route User
Route::get('user/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
Route::put('user/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
Route::delete('user/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroyUser');
Route::get('user/editPassword/{user}', [App\Http\Controllers\UserController::class, 'editPassword'])->name('editPasswordUser');
Route::put('user/updatePassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePasswordUser');

// Route Menu
Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('createMenu');
Route::post('menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('storeMenu');
Route::get('menu/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('editMenu');
Route::put('menu/update/{idMenu}', [App\Http\Controllers\MenuController::class, 'update'])->name('updateMenu');
Route::delete('menu/destroy/{idMenu}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('destroyMenu');

//Route Meal
Route::post('meal/addRecipeMeal', [App\Http\Controllers\MealController::class, 'addRecipeMeal'])->name('addRecipeMeal');
Route::put('meal/updateRecipeMeal', [App\Http\Controllers\MealController::class, 'updateRecipeMeal'])->name('updateRecipeMeal');

// Route Recipe
Route::get('recipe/index', [App\Http\Controllers\RecipeController::class, 'index'])->name('indexRecipe');
Route::get('recipe/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('createRecipe');
Route::post('recipe/store', [App\Http\Controllers\RecipeController::class, 'store'])->name('storeRecipe');