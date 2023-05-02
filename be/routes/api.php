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

Route::post('user', [UserController::class, 'store']);
Route::get('palette', [PaletteController::class, 'index']);

Route::middleware(['auth:api', 'verified'])->group(function () {
    Route::get('auth', [UserController::class, 'auth']);
    Route::post('palette', [PaletteController::class, 'store']);
});
