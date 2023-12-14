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

Route::get('/', [App\Http\Controllers\WelcomeController::class,'index'])->name('welcome');

Auth::routes();

// Route Home
Route::get('/home',[App\Http\Controllers\HomeController::class,'index'])->name('home');

// Routes Contact
Route::get('/contact', [App\Http\Controllers\ContactController::class,'editForm'])->name('editFormContact');
Route::post('/contact/submitForm', [App\Http\Controllers\ContactController::class,'submitForm'])->name('submitFormContact');

// Routes User
Route::get('user/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
Route::put('user/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
Route::delete('user/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroyUser');
Route::get('user/editPassword/{user}', [App\Http\Controllers\UserController::class, 'editPassword'])->name('editPasswordUser');
Route::put('user/updatePassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePasswordUser');
Route::get('user/recipeByUser/{id}', [App\Http\Controllers\UserController::class, 'recipeByUser'])->name('recipeByUser');

// Routes Menu
Route::get('menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('createMenu');
Route::post('menu/store', [App\Http\Controllers\MenuController::class, 'store'])->name('storeMenu');
Route::get('menu/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('editMenu');
Route::put('menu/update/{idMenu}', [App\Http\Controllers\MenuController::class, 'update'])->name('updateMenu');
Route::delete('menu/destroy/{idMenu}', [App\Http\Controllers\MenuController::class, 'destroy'])->name('destroyMenu');

// Routes Meal
Route::post('meal/addRecipeMeal', [App\Http\Controllers\MealController::class, 'addRecipeMeal'])->name('addRecipeMeal');
Route::put('meal/updateRecipeMeal', [App\Http\Controllers\MealController::class, 'updateRecipeMeal'])->name('updateRecipeMeal');

// Routes Recipe
Route::get('recipe/index', [App\Http\Controllers\RecipeController::class, 'index'])->name('indexRecipe');
Route::get('recipe/create', [App\Http\Controllers\RecipeController::class, 'create'])->name('createRecipe');
Route::post('recipe/store', [App\Http\Controllers\RecipeController::class, 'store'])->name('storeRecipe');
Route::get('recipe/show/{id}', [App\Http\Controllers\RecipeController::class, 'show'])->name('showRecipe');
Route::get('recipe/edit/{id}', [App\Http\Controllers\RecipeController::class, 'edit'])->name('editRecipe');
Route::put('recipe/update/{id}', [App\Http\Controllers\RecipeController::class, 'update'])->name('updateRecipe');
Route::delete('recipe/destroy/{id}', [App\Http\Controllers\RecipeController::class, 'destroy'])->name('destroyRecipe');


// Route BackOffice
Route::get('BackOffice/index', [App\Http\Controllers\BackOffice\BackOfficeController::class, 'index'])->name('indexBackOffice')->middleware('CheckRole');

// Routes UserBackOffice 
Route::get('UserBackOffice/index', [App\Http\Controllers\BackOffice\UserBackOfficeController::class, 'index'])->name('indexUserBackOffice')->middleware('CheckRole');
Route::put('UserBackOffice/update/{id}', [App\Http\Controllers\BackOffice\UserBackOfficeController::class, 'update'])->name('updateUserBackOffice')->middleware('CheckRole');
Route::delete('UserBackOffice/destroy/{id}', [App\Http\Controllers\BackOffice\UserBackOfficeController::class, 'destroy'])->name('destroyUserBackOffice')->middleware('CheckRole');

// Routes RecipeBackOffice
Route::get('RecipeBackOffice/index', [App\Http\Controllers\BackOffice\RecipeBackOfficeController::class, 'index'])->name('indexRecipeBackOffice')->middleware('CheckRole');
Route::get('RecipeBackOffice/edit/{id}', [App\Http\Controllers\BackOffice\RecipeBackOfficeController::class, 'edit'])->name('editRecipeBackOffice')->middleware('CheckRole');
Route::put('RecipeBackOffice/update/{id}', [App\Http\Controllers\BackOffice\RecipeBackOfficeController::class, 'update'])->name('updateRecipeBackOffice')->middleware('CheckRole');
Route::delete('RecipeBackOffice/destroy/{id}', [App\Http\Controllers\BackOffice\RecipeBackOfficeController::class, 'destroy'])->name('destroyRecipeBackOffice')->middleware('CheckRole');
Route::put('RecipeBackOffice/checked/{id}', [App\Http\Controllers\BackOffice\RecipeBackOfficeController::class, 'checked'])->name('checkedRecipeBackOffice')->middleware('CheckRole');

// Route Mentions Légales et RGPD
Route::get('/mentionsLegales', function () { return view('legal.mentionsLegales'); });
Route::get('/rgpd', function () { return view('legal.rgpd'); });


