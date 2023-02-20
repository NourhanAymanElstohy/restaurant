<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\MailController;
use App\Services\Mapbox\MapboxGeocoding;
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
    // $mapbox = new MapboxGeocoding();

    // // Nasr City infomraiton from name
    // $nasrCity = $mapbox->forward('nasr city', ['language' => 'ar']);

    // // Nasr City infomraiton from coords
    // $nasrCityCoords = $nasrCity->center;
    // $nasrCityFromName = $mapbox->reverse($nasrCityCoords[1], $nasrCityCoords[0], ['language' => 'ar']);

    // dd($nasrCity, $nasrCityFromName);
});
