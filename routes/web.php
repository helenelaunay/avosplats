<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route User
Route::get('users/edit/{user}', [App\Http\Controllers\UserController::class, 'edit'])->name('editUser');
Route::put('users/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('updateUser');
Route::delete('users/destroy/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('destroyUser');
Route::get('users/editPassword/{user}', [App\Http\Controllers\UserController::class, 'editPassword'])->name('editPasswordUser');
Route::put('users/updatePassword/{user}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('updatePasswordUser');