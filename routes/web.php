<?php

use App\Http\Controllers\MenuController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'menus'], function () {
    // Create Operation
    Route::get('/create', [MenuController::class, 'create'])->name('menus.create');
    Route::post('/', [MenuController::class, 'store'])->name('menus.store');
    // Read Operation
    Route::get('/', [MenuController::class, 'index'])->name('menus.show');
    // Update Operation
    Route::get('/{menu}/edit', [MenuController::class, 'edit'])->name('menus.edit');
    Route::put('/{menu}', [MenuController::class, 'update'])->name('menus.update');
    // Delete Operation
    Route::get('/{menu}', [MenuController::class, 'show'])->name('menus.show');
    Route::delete('/{menu}', [MenuController::class, 'destroy'])->name('menus.delete');
});
