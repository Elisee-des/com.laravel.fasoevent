<?php

use App\Http\Controllers\api\private\admin\ActiviteController;
use App\Http\Controllers\api\public\AuthController;
use Illuminate\Http\Request;
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

Route::controller(AuthController::class)->group(function() {
    Route::post('/inscription-promoteur', 'inscriptionPromoteur');
    Route::post('/inscription-abonne', 'inscriptionAbonne');
    Route::post('/connexion', 'connexion');
});

Route::middleware('auth:sanctum')->group( function () {
    Route::ApiResource('activites',ActiviteController::class);

    // Route::middleware(['role:admin'])->group(function () {
    // });

    Route::post('/deconnexion', [AuthController::class, 'logout']);
});