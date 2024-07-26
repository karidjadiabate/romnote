<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemandeInscriptionController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\UserController;
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


Route::get('/',[ClientController::class,'home'])->name('home');
Route::get('/nos-tarifs',[ClientController::class,'nostarifs'])->name('nostarifs');
Route::get('/demandeinscription',[ClientController::class,'demandeinscription'])->name('demandeinscription');
Route::post('/demandeinscription',[DemandeInscriptionController::class,'store'])->name('demandeinscription.store');

Route::resource('user', UserController::class)->except(['create','show','edit']);

//Route superUSer
Route::prefix('superadmin')->middleware('SuperUtilisateur')->group(function () {

    Route::get('/',[DashboardController::class,'dashboard']);
    Route::get('/listedemandeinscription',[DemandeInscriptionController::class,'index'])->name('listedemandeinscription');
    Route::get('/administrateur',[UserController::class,'administrateur'])->name('administrateur');
    Route::resource('etablissement',EtablissementController::class);

});


 //ADMIN
 Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/',[DashboardController::class,'dashboard']);

});
