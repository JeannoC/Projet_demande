<?php
use App\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\ActualiteController;
use App\Http\Controllers\ActiviteController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\TemoignageController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\MailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/mail/{id}', [MailController::class, 'index'])->name('mailing');




//les contrsollers pour le fronted
Route::group(["namespace" => "front"], function(){
    Route::get('/', [FrontedController::class, 'index'])->name("front.index");
    Route::get('/front/propos', [FrontedController::class, 'about'])->name("front.presentation.propos");
    Route::get('/actualites', [FrontedController::class, 'actualites'])->name("front.actualites.index");
    Route::get('/actualites/{id}', [FrontedController::class, 'actualites_show'])->name("front.actualites.show");
    Route::get('/activites', [FrontedController::class, 'activites'])->name("front.activites.index");
    Route::get('/activites/{id}', [FrontedController::class, 'activites_show'])->name("front.activites.show");
});

Route::group(["namespace" => "admins"], function(){
    Route::get('/dashboard', [DashbordController::class, 'index'])->name("dashbord.index")->middleware("auth");

    Route::get('/presentation', [PresentationController::class, 'index'])->name("admins.presentation")->middleware("auth");
    Route::get('/presentation/{id}', [PresentationController::class, 'show'])->name("admins.presentation.show")->middleware("auth");
    Route::post('/presentation', [PresentationController::class, 'store'])->name("admins.presentation.store")->middleware("auth");
    Route::delete('/presentation/{id}', [PresentationController::class, 'destroy'])->name("admins.presentation.destroy")->middleware("auth");
    Route::put('/presentation/{id}', [PresentationController::class, 'update'])->name("admins.presentation.update")->middleware("auth");

    Route::get('/demandes', [DemandeController::class, 'index'])->name("admins.demande")->middleware("auth");
    Route::get('admin/demande/liste', [DemandeController::class, 'liste'])->name("admins.demande.liste")->middleware("auth");
    Route::get('/demande/{id}', [DemandeController::class, 'show'])->name("admins.demande.show")->middleware("auth");
    Route::put('/demande/{id}', [DemandeController::class, 'update'])->name("admins.demande.update")->middleware("auth");



    Route::get('/users', [UtilisateurController::class, 'index'])->name("admins.utilisateur")->middleware("auth");

    Route::put('suspendre/{id}',[UtilisateurController::class,'suspendre'])->middleware("auth");
    Route::put('desuspendre/{id}',[UtilisateurController::class,'desuspendre'])->middleware("auth");
    Route::post('/users/store',[UtilisateurController::class,'store'])->name('users.store')->middleware("auth");
    Route::put('users/{id}',[UtilisateurController::class,'update'])->middleware("auth");
    Route::delete('users/{id}',[UtilisateurController::class,'delete'])->middleware("auth");
});



Route::group(["namespace" => "Auth"], function(){
    Route::get('/authentification', [AuthController::class, 'loginForm'])->name("login")->middleware("guest");
    Route::post('/authentification',[AuthController::class,'login'])->name('login');
    Route::get('/register',[UtilisateurController::class, 'inscription'])->name('register.incription');
    Route::post('/register',[AuthController::class,'create'])->name('register');
    Route::get('/logout',[AuthController::class,'logout'])->name('logout')->middleware("auth");
    Route::get('/profile',[FrontedController::class,'file'])->name('profile')->middleware("auth");
    Route::post('/createdemande/{id}', [AuthController::class, 'create_demande'])->name("create_demande")->middleware("auth");
});
