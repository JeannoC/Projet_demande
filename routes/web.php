<?php
use App\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontedController;
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\DemandeursController;
use App\Http\Controllers\DocumentDemandeurController;
use App\Http\Controllers\UtilisateurController;
use App\Http\Controllers\MailController;
use App\Models\Demande;

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

Route::get('/tpl', function(){
    $app_name = env('APP_NAME','');
    return view('layout.app')->with('app_name',$app_name );
});




//les contrsollers pour le fronted
Route::group(["namespace" => "front"], function(){
    Route::get('/', [FrontedController::class, 'index'])->name("front.index");
    Route::get('/front/propos', [FrontedController::class, 'about'])->name("front.presentation.propos");
    Route::get('/profile/laisser-passer', [DemandeursController::class,'index'])->name("profile.laisser-passer")->middleware("auth");
    Route::get('/profile/attestations', [DemandeursController::class,'index'])->name("profile.attestations")->middleware("auth");
    Route::get('/laisserPasser', [FrontedController::class,'laisserpasser'])->name("laisserpasser")->middleware("auth");
    Route::get('/attestation', [FrontedController::class,'attestation'])->name("attestation")->middleware("auth");
    Route::post('/completprofil', [DemandeursController::class,'store'])->name("demandeursoumis")->middleware("auth");
    Route::get('/completprofil', [DemandeursController::class,'completprofil'])->name("completprofil")->middleware("auth");
    Route::post('/demande/attestation', [DemandeController::class,'store'])->name("demande.attestation")->middleware("auth");
    Route::post('/demande/laisserpasser', [DemandeController::class,'storepasser'])->name("demande.laisserpasser")->middleware("auth");
    Route::post('/demande/document', [DocumentDemandeurController::class,'store'])->name("demande.document")->middleware("auth");
    Route::get('/demande/detail/document', [DocumentDemandeurController::class,'show'])->name("demande.detail.document")->middleware("auth");
    Route::get('/document',[DocumentDemandeurController::class,'voirdocument'])->name("document.attestation.pdf")->middleware("auth");;
});

Route::group(["namespace" => "admins"], function(){
    Route::get('/dashboard', [DashbordController::class, 'index'])->name("dashbord.index")->middleware("auth");
    Route::get('/demandes/nouveaux', [DemandeController::class, 'index'])->name("admins.demande.nouvelle")->middleware("auth");
    Route::get('demandes/traiter', [DemandeController::class, 'index'])->name("admins.demande.traites")->middleware("auth");
    Route::get('demandes/utilisateur', [DemandeController::class, 'demandeutilisateur'])->name("admins.demande.utilisateur")->middleware("auth");
    Route::get('/demande/{id}', [DemandeController::class, 'show'])->name("admins.demande.show")->middleware("auth");
    Route::put('/demandevalide/{id}', [DemandeController::class, 'update'])->name("admins.demande.update")->middleware("auth");
    Route::put('/demanderejeter/{id}', [DemandeController::class, 'rejeterupdate'])->name("admins.demande.rejeterupdate")->middleware("auth");
    Route::put('/demandevalidation/{id}', [DemandeController::class, 'updatevalidation'])->name("admins.demande.updatevalidation")->middleware("auth");
    Route::get('/preValidation',[DemandeController::class, 'preValidation'])->name('admins.preValidation')->middleware("auth");

    Route::get('/modifier_profile/{id}', [FrontedController::class, 'modifier_profile'])->name("modifier_profile")->middleware("auth");

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
    Route::get('/adddemande',[AuthController::class,'adddemande'])->name('adddemande')->middleware("auth");
});



