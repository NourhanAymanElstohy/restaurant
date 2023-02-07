<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use App\Services\MapboxGeocoding;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// <--- Users --->
Route::group(['prefix' => 'users'], function () {
    // Show Register Form
    Route::get('/register', [UserController::class, 'register'])->middleware('guest');
    // Create a New User
    Route::post('/authenticate', [UserController::class, 'authenticate']);
    Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware('auth');
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/', [UserController::class, 'store']);

});
Route::group(['prefix' => 'menus'], function () {
    // Create a Dish
    Route::get('/create', [MenuController::class, 'create'])->name('show-create-dish');
    Route::post('/', [MenuController::class, 'store'])->name('store-dish');
    // Read Dishes
    Route::get('/', [MenuController::class, 'index'])->name('get-dishes');
    // Manage Dishes
    Route::get('/manage', [MenuController::class, 'manage'])->name('manage-dishes');
    // Update a Dish
    Route::get('/{dish}/edit', [MenuController::class, 'edit'])->name('show-edit-dish');
    Route::put('/{dish}', [MenuController::class, 'update'])->name('update-dish');
    // Delete a Dish
    Route::delete('/{dish}', [MenuController::class, 'destroy'])->name('delete-dish');
    // Read a Dish
    Route::get('/{dish}', [MenuController::class, 'show'])->name('get-dish');
});

Route::get('/', function () {
    $mapbox = new MapboxGeocoding();
    // dd("as");
    // dd(auth(), auth()->guard());
    dd($mapbox->geocoding('cairo'));
});
