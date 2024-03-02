<?php

use App\Http\Controllers\private\Admin\TableaudebordController;
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

Route::get('/admin-tableaudebord', [TableaudebordController::class, 'index'])->name('private.admin-tableaudebord');
