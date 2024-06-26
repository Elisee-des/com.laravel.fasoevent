<?php

use App\Http\Controllers\private\Abonne\AbonneTableaudebordController;
use App\Http\Controllers\private\Admin\AdminTableaudebordController;
use App\Http\Controllers\private\Admin\TableaudebordController;
use App\Http\Controllers\private\Admin\CategorieController;
use App\Http\Controllers\private\ProfilController;
use App\Http\Controllers\private\Promoteur\PromoteurTableaudebordController;
use App\Http\Controllers\public\AuthController;
use App\Http\Controllers\public\EvenementController;
use App\Http\Controllers\public\PublicController;
use Illuminate\Support\Facades\Route;


################################ Public parts #################################

Route::get('/', [PublicController::class, 'index'])->name('public.accueil');
Route::get('/evenements', [EvenementController::class, 'index'])->name('public.evenements-index');

#Auth Controller
Route::get('/inscription/promoteur', [AuthController::class, 'inscriptionPromoteur'])->name('public.inscription-promoteur');
Route::get('/inscription/abonne', [AuthController::class, 'inscriptionAbonne'])->name('public.inscription-abonne');
Route::get('/inscription/option', [AuthController::class, 'inscriptionOption'])->name('public.inscription-option');
Route::post('/inscription/promteur/action', [AuthController::class, 'inscriptionPromoteurAction'])->name('public.inscription-promoteur-action');
Route::post('/inscription/abonne/action', [AuthController::class, 'inscriptionAbonneAction'])->name('public.inscription-abonne-action');
Route::get('/connexion', [AuthController::class, 'connexion'])->name('public.connexion');
Route::post('/connexion/action', [AuthController::class, 'connectionAction'])->name('public.connexion-action');
Route::post('/deconnexion', [AuthController::class, 'deconnexion'])->name('deconnexion');
#End Auth Controller


################################ Private parts #################################
#Admin routes
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin-tableaudebord', [AdminTableaudebordController::class, 'admintableaudebord'])->name('private.admin-tableaudebord');
    Route::resource('categories', CategorieController::class);
});


#Promoteur routes
Route::middleware(['auth', 'role:promoteur'])->group(function () {
    Route::get('/promoteur-tableaudebord', [PromoteurTableaudebordController::class, 'promoteurtableaudebord'])->name('private.promoteur-tableaudebord');
});


#Abonne routes
Route::middleware(['auth', 'role:abonne'])->group(function () {
    Route::get('/abonne-tableaudebord', [AbonneTableaudebordController::class, 'abonnetableaudebord'])->name('private.abonne-tableaudebord');
});

Route::middleware(['auth'])->group(function () {
Route::get('/mon-profil', [ProfilController::class, 'profil'])->name('profil');
Route::put('/mon-profil/edition/action', [ProfilController::class, 'ediProfilAction'])->name('private.profil-edition');
Route::put('/mon-profil/edition mot de passe', [ProfilController::class, 'editPassword'])->name('private.edit-password');
Route::put('/mon-profil/edition image', [ProfilController::class, 'profil_edition_image_action'])->name('private.edit-image');
});
