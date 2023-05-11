<?php

use App\Http\Controllers\Api\PaletteController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::name('user')->prefix('user')->controller(UserController::class)->group(function () {
        Route::get('auth', 'auth');
        Route::get('{user}', 'show');
        Route::put('/', 'update');
        Route::delete('/', 'destroy');
    });

    Route::name('palette')->prefix('palette')->controller(PaletteController::class)->group(function () {
        Route::post('/', 'store');
        Route::put('{palette}', 'update');
        Route::delete('{palette}', 'destroy');
        Route::patch('{palette}/like', 'like');
        Route::get('likes', 'likes');
    });
});

Route::post('user', [UserController::class, 'store']);
Route::resource('palette', PaletteController::class)->only('index', 'show');
