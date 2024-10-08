<?php

use App\Http\Controllers\CalendrierController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DemandeInscriptionController;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\FiliereController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\NiveauController;
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


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nos-tarifs',[ClientController::class,'nostarifs'])->name('nostarifs');
Route::get('/demandeinscription',[ClientController::class,'demandeinscription'])->name('demandeinscription');
Route::post('/demandeinscription',[DemandeInscriptionController::class,'store'])->name('demandeinscription.store');
Route::post('/demo',[DemoController::class,'store'])->name('demo.store');
Route::get('/moncompte',[UserController::class,'moncompte'])->name('moncompte');

Route::resource('user', UserController::class)->except(['create','show','edit']);

//Route superUSer
Route::prefix('superadmin')->middleware('SuperUtilisateur')->group(function () {

    Route::get('/',[DashboardController::class,'dashboard'])->name('superadmin.dashboard');
    Route::get('/listedemandeinscription',[DemandeInscriptionController::class,'index'])->name('listedemandeinscription');
    Route::get('/listedemandedemo',[DemoController::class,'index'])->name('listedemandedemo');
    Route::get('/administrateur',[UserController::class,'administrateur'])->name('administrateur');
    Route::resource('etablissement',EtablissementController::class);

    Route::post('/accept/{id}', [DemoController::class, 'accept'])->name('demo.accept');
    Route::post('/reject/{id}', [DemoController::class, 'reject'])->name('demo.reject');

    Route::get('/listedemandedemo/{notification}',[DemoController::class,'demonotification'])->name('demo.notification');
    Route::get('/listedemandeinscription/{notification}',[DemandeInscriptionController::class,'demandeinscriptionnotification'])->name('demandeinscription.notification');


    Route::post('/accept/{id}', [DemandeInscriptionController::class, 'accept'])->name('demandeinscription.accept');
    Route::post('/reject/{id}', [DemandeInscriptionController::class, 'reject'])->name('demandeinscription.reject');


    /* Route::post('/accept/{id}', [DemandeInscriptionController::class, 'accept'])->name('demande.accept');
    Route::post('/reject/{id}', [DemandeInscriptionController::class, 'reject'])->name('demande.reject'); */

});


 //ADMIN
 Route::prefix('admin')->middleware('admin')->group(function () {

    Route::get('/',[DashboardController::class,'dashboard'])->name('admin.dashboard');;
    Route::resource('matiere', MatiereController::class);
    Route::resource('filiere', FiliereController::class);
    Route::resource('classe', ClasseController::class);
    Route::resource('niveau', NiveauController::class);
    Route::get('/professeur',[UserController::class,'professeur'])->name('professeur');
    Route::get('/etudiant',[UserController::class,'etudiant'])->name('etudiant');
    Route::get('/calendrier',[CalendrierController::class,'index'])->name('calendrier');

});


//Professeur
Route::prefix('professeur')->middleware('professeur')->group(function () {

    Route::get('/',[DashboardController::class,'dashboard'])->name('professeur.dashboard');;

});
