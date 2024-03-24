<?php

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/inscription-promoteur', [AuthController::class, 'inscriptionPromoteur']);
Route::post('/inscription-abonne', [AuthController::class, 'inscriptionAbonne']);

Route::post('/connexion', [AuthController::class, 'connexion'])->middleware(['api-login', 'throttle']);


// Route::middleware(['auth:api'])->group(function () {
// });
