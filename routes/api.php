<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// <--- Users --->
// signup and login
Route::group(['prefix' => 'users'], function () {
    // Signup & Login
    Route::post('/register', [UserController::class, 'register']);
    Route::post('/login', [UserController::class, 'login']);
    Route::post('/forgetPassword', [UserController::class, 'forgetPassword']);
    // Protected Routes
    Route::group(['middleware' => 'auth:sanctum'], function () {
        Route::post('/logout', [UserController::class, 'logout']);
    });
});
