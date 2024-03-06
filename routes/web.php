<?php

use App\Http\Controllers\private\Abonne\AbonneTableaudebordController;
use App\Http\Controllers\private\Admin\AdminTableaudebordController;
use App\Http\Controllers\private\Admin\TableaudebordController;
use App\Http\Controllers\private\Promoteur\PromoteurTableaudebordController;
use App\Http\Controllers\public\AuthController;
use App\Http\Controllers\public\EvenementController;
use App\Http\Controllers\public\PublicController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PublicController::class, 'index'])->name('public.accueil');

Route::get('/evenements', [EvenementController::class, 'index'])->name('public.evenements-index');

Route::get('/inscription/promoteur', [AuthController::class, 'inscriptionPromoteur'])->name('public.inscription-promoteur');
Route::get('/inscription/abonne', [AuthController::class, 'inscriptionAbonne'])->name('public.inscription-abonne');
Route::get('/inscription/option', [AuthController::class, 'inscriptionOption'])->name('public.inscription-option');
Route::post('/inscription/action', [AuthController::class, 'inscriptionPromoteurAction'])->name('public.inscription-action');
Route::get('/connexion', [AuthController::class, 'connexion'])->name('public.connexion');

Route::get('/admin-tableaudebord', [AdminTableaudebordController::class, 'admintableaudebord'])->name('private.admin-tableaudebord');
Route::get('/promoteur-tableaudebord', [PromoteurTableaudebordController::class, 'promoteurtableaudebord'])->name('private.promoteur-tableaudebord');
Route::get('/abonne-tableaudebord', [AbonneTableaudebordController::class, 'abonnetableaudebord'])->name('private.abonne-tableaudebord');
