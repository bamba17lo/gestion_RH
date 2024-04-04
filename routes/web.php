<?php

use App\Http\Controllers\ContratController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DonneeProfessionelleController;
use App\Http\Controllers\UserController;
use App\Models\Departement;
use App\Models\Donnee_Professionelle;
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

Route::get('/',[UserController::class,'connexion'])->name('login');
Route::post('login',[UserController::class,'login'])->name('post.login');

Route::middleware('auth')->group(function(){

    Route::get('/demande-conge-absence',[UserController::class,'demande'])->name('demande');
    Route::post('/demande-conge-absence',[UserController::class,'storeDemande'])->name('store.demande');
    
    Route::get('/index',[UserController::class,'index_view'])->name('index.view');
    Route::put('update',[UserController::class,'updatePassword'])->name('put.password');
    
    Route::get('logout',[UserController::class,'logout'])->name('logout');
    Route::get('compte',[UserController::class,'compte'])->name('compte');

    // Route pour les administrateurs
    Route::middleware('role:admin')->group(function(){
    
        Route::get('index-admin',[UserController::class,'index'])->name('admin.index');
        Route::get('admin-delete/{admin}',[UserController::class,'deleteAdmin'])->name('admin.delete');

        Route::get('index-departement',[DepartementController::class,'index'])->name('departement.index');
        Route::get('create-departement',[DepartementController::class,'create'])->name('departements.create');
        Route::post('create-departement',[DepartementController::class,'store'])->name('departement.post');
    
        Route::get('create-user',[UserController::class,'create_user'])->name('user.create');
        Route::post('create-user',[UserController::class,'store_user'])->name('user.post.user');

        Route::get('create-data',[UserController::class,'create_data'])->name('user.create_data');
        Route::post('create-data',[UserController::class,'store_data'])->name('user.post.data');

        Route::get('create-contrat',[ContratController::class,'create_contrat'])->name('user.create_contrat');
        Route::post('create-contrat',[ContratController::class,'store_contrat'])->name('user.post.contrat');

        Route::get('create-dataPro',[DonneeProfessionelleController::class,'create_dataPro'])->name('user.create_dataPro');
        Route::post('create-dataPro',[DonneeProfessionelleController::class,'store_dataPro'])->name('user.post.dataPro');
    });

    // Routes pour les gestionnaires
    Route::middleware(['role:gestionnaire,admin'])->group(function(){
        
        Route::get('index-gestionnaire',[UserController::class,'index_gestio'])->name('gestionnaire.index');
        Route::get('delete-gestionnaire/{gestionnaire}',[UserController::class,'delete'])->name('gestionnaire.delete');
        Route::get('index-departement',[DepartementController::class,'index'])->name('departement.index');
        Route::get('notifications',[UserController::class,'notifications'])->name('notifications');
        Route::put('notifications/{notification}',[UserController::class,'updateNotifications'])->name('notification.put');
        Route::get('delete-departement/{departement}',[DepartementController::class,'delete'])->name('departements.delete');

        Route::get('edit-departement/{departement}',[DepartementController::class,'edit'])->name('departements.edit');
        Route::put('edit-departement/{departement}',[DepartementController::class,'update'])->name('departement.put');
        
        

    });

    // ROutes pour les utilisateur
    Route::middleware('role:utilisateur,admin,gestionnaire')->group(function(){

        Route::get('index-utilisateur',[UserController::class,'index_utilisateur'])->name('utilisateur.index');
        Route::get('utilisateur-delete/{utilisateur}',[UserController::class,'deleteUtilisateur'])->name('utilisateur.delete');
        Route::get('index-departement',[DepartementController::class,'index'])->name('departement.index');
        Route::get('listes-des-demandes',[UserController::class,'liste_des_demandes'])->name('liste_des_demandes');


    });

});