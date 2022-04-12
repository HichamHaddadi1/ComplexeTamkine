<?php

use App\Http\Controllers\MailController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SponsoringController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use App\Salle;
use App\User;
use Illuminate\Support\Facades\Auth;

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



Route::get('/testP' , [PaymentController::class , 'index'])->name('test');
Route::post('/confirm-cmi' , [PaymentController::class , 'cmi'])->name('cmi');
Route::post('/validate' , function(){
dd(request('Response') );
})->withoutMiddleware(\App\Http\Middleware\VerifyCsrfToken::class);;

Route::get('/sponsoring-jpov' , [SponsoringController::class , 'index'])->name('sponsorIndex');
Route::get('/sponsor' , [SponsoringController::class , 'sponsor'])->name('sponsor');
Route::get('/ambassador' , [SponsoringController::class , 'ambassador'])->name('ambassador');
Route::get('/sponsor-form' , [SponsoringController::class , 'sponsorForm'])->name('sponsorForm');

Route::get('/mot', function () {
    return Hash::make("khadija.sysinfo@gmail.com");
});

Route::get('/getNationalUniversity/{id}/', [SiteController::class, 'getNationalUniversity'])->name('getNationalUniversity');

//Site
Route::get('/', 'SiteController@index')->name('front.home');
Route::get('/salle-orientation', 'SiteController@salle')->name('front.salle');
Route::get('/program', 'SiteController@programs')->name('front.download');
Route::get('/program/{slug}', 'SiteController@edition')->name('front.edition');
//Route::get('/program/{slug}', function (){
//    return 'aaa';
//})->name('front.edition');
//Route::get('/programs', 'SiteController@programs')->name('front.programs');
//Route::get('/download/orientation-ar', 'SiteController@downloadAR')->name('front.downloadAR');
//Route::get('/download/orientation-fr', 'SiteController@downloadFR')->name('front.downloadFR');
//Route::get('/download/edition_2021/download', 'SiteController@download_2021')->name('front.download_now');
//Route::get('/download/edition_2020', 'SiteController@programme_2020')->name('front.program_2020');
//Route::get('/download/edition_2021', 'SiteController@programme_2021')->name('front.program_2021');
Route::get('/contact', 'SiteController@contact')->name('front.contact');
Route::post('/contact', 'SiteController@contactSubmit')->name('front.contactSubmit');
Route::get('/ot-admin', 'admin\LoginController@showLoginForm')->name('admin.showLoginForm');
Route::post('/ot-admin', 'admin\LoginController@login')->name('admin.login');

//Register
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', 'register\RegisterController@redirctTo')->name('profile.dashboard');
    Route::get('/profile', 'register\RegisterController@index')->name('profile.info');
    Route::post('/profile/{id}', 'register\RegisterController@modifier')->name('profile.modifier');
    Route::get('/dashboard-register', 'register\RegisterController@redirctToRegister')->name('profile.dashboard.register');

    //Orientateur
    Route::get('/orientateur/salle/rejoindre/{id}', 'orientateurs\OrientateurController@rejoindre_salle_pleniere')
        ->name('orientateur.rejoindre.salle.pleniere')->middleware('can:salle-pleniere');

    Route::middleware('can:role-orientateur')->group(function () {
        Route::get('/orientateur/salle', 'orientateurs\OrientateurController@index')->name('orientateur.salle');
        Route::post('/orientateur/salle/{id}', 'orientateurs\OrientateurController@modifier')->name('orientateur.salle.modifier');
        Route::get('/orientateur/salle/demarrer', 'orientateurs\OrientateurController@demarrer')->name('orientateur.salle.demarrer');
        Route::get('/orientateur/salle/pleniere', 'orientateurs\OrientateurController@salle_pleniere')->name('orientateur.salle.pleniere');
    });
    Route::get('/logout/bbb/{id}', 'orientateurs\OrientateurController@logout_bbb')->name('logout.bbb');

    //Participant
    Route::middleware('can:role-participant')->group(function () {
        Route::get('/participant/salles/ouverts', 'participants\ParticipantController@salles_ouverts')->name('participant.salle_ouvert');
        Route::get('/participant/salles', 'participants\ParticipantController@salles')->name('participant.salles');
        Route::get('/participant/salles/rejoindre/{id}', 'participants\ParticipantController@rejoindre')->name('participant.rejoidre');

        Route::any('/rehercher/salle/fermees/globale', 'participants\ParticipantController@recherche_salles_fermees_globale')->name('participant.recherche_salles_fermees_globale');
        Route::any('/rehercher/salle/fermees/regions', 'participants\ParticipantController@recherche_salles_fermees_regions')->name('participant.recherche_salles_fermees_regions');

        Route::any('/rehercher/salle/ouverts/globale', 'participants\ParticipantController@recherche_salles_ouverts_globale')->name('participant.recherche_salles_ouverts_globale');
        Route::any('/rehercher/salle/ouverts/regions', 'participants\ParticipantController@recherche_salles_ouverts_regions')->name('participant.recherche_salles_ouverts_regions');
    });
    //Admin
    Route::middleware('can:role-admin')->group(function () {
        Route::prefix('admin')->namespace('admin')->group(function () {
            Route::get(
                '/salle/ajouter',
                'OrientateurController@create'
            )->name('create.salle.view');
            Route::post('/create_salle', 'OrientateurController@store')->name('orientateur.create');
            Route::get('/orientateur', 'OrientateurController@listeorientateur')->name('orintateur.liste');
            Route::get('/editerorientateur/{id}', 'OrientateurController@edit')->name('orientateur.edit');
            Route::put('/updateorientateur/{id}', 'OrientateurController@update')->name('orientateur.update');
            Route::delete('/supprimerorientateur/{id}', 'OrientateurController@destroy')->name('orintateur.destroy');
            // Start Meeting
            Route::get('/startMetting/{id}', 'OrientateurController@startMetting')->name('startmeeting');
            Route::resource('users', UserController::class);
            Route::resource('salles', SalleController::class);

            Route::get('/enregistrements', 'SalleController@enregistrements')->name('admin.enregistrements');
            Route::get('/orientateur/rechercher', 'OrientateurController@rechercher')->name('admin.orientateur.recherche');
            Route::post('/orientateur/export', 'OrientateurController@export')->name('admin.orientateur.export');
            Route::get('/orientateur/salles/ouvertes', 'OrientateurController@salle_ouvertes')->name('admin.orientateur.salle_ouvertes');
            Route::get('/orientateur/filter/edition', 'OrientateurController@filter_edition')->name('admin.filter.orientateur.edition');

            Route::get('/participant/rechercher', 'UserController@rechercher')->name('admin.participant.recherche');
            Route::post('/participant/export', 'UserController@export')->name('admin.participant.export');

            Route::get('/programmes', 'ProgrammeController@index')->name('admin.programmes.index');
            Route::get('/programmes/action/{id}', 'ProgrammeController@action')->name('admin.programme.action');
            Route::get('/programmes/rechercher', 'ProgrammeController@rechercher')->name('admin.programme.recherche');
            Route::post('/programmes/creation', 'ProgrammeController@store')->name('admin.programme.create');
            Route::get('/programmes/supprimer/{id}', 'ProgrammeController@destroy')->name('admin.programme.supprimer');
            Route::post('/programmes/modifier/{id}', 'ProgrammeController@update')->name('admin.programme.modifier');
            //***les intervenants***
            Route::get('/intervenants', 'IntervenantController@index')->name('admin.intervenants.index'); //list
            Route::get('/intervenants/action/{id}', 'IntervenantController@action')->name('admin.intervenants.action'); //l'action
            Route::post('/intervenants/creation', 'IntervenantController@store')->name('admin.intervenants.create'); //l'ajout
            Route::post('/intervenants/modifier/{id}', 'IntervenantController@update')->name('admin.intervenants.modifier'); //la modification
            Route::get('/intervenants/supprimer/{id}', 'IntervenantController@destroy')->name('admin.intervenants.supprimer'); //la supprission
            Route::get('/intervenants/rechercher', 'IntervenantController@rechercher')->name('admin.intervenants.recherche'); //la recherche
            Route::post('/intervenants/export', 'IntervenantController@export')->name('admin.intervenants.export'); //l'exportation
            //***les intervenants***
            Route::get('/editions', 'EditionController@index')->name('admin.editions.index'); //list
            Route::get('/editions/action/{id}', 'EditionController@action')->name('admin.edition.action'); //l'action
            Route::post('/editions/creation', 'EditionController@store')->name('admin.edition.create'); //l'ajout
            Route::post('/editions/modifier/{id}', 'EditionController@update')->name('admin.edition.modifier'); //la modification
            Route::get('/editions/supprimer/{id}', 'EditionController@destroy')->name('admin.edition.supprimer'); //la supprission
            Route::get('/editions/rechercher', 'EditionController@rechercher')->name('admin.edition.recherche'); //la recherche
            //les enregistrements
            Route::get('/enregistrements', 'SalleController@enregistrements')->name('admin.enregistrements');
            Route::get('/enregistrements/supprimer/{id}', 'SalleController@destroyEng')->name('admin.enregistrements.supprimer');
            //les statistiques
            Route::get('/analytics', 'UserController@testGoogleAnalytics')->name('google.test');

            Route::get('/sendmail/{id}', [MailController::class, 'sendMail'])->name('admin.sendmail');
        });
    });
    Route::get('/test', function () {
    })->name('google.test');
});
Auth::routes();

//
Route::get('/intervenant/salle/rejoindre/{id}', 'intervenants\IntervenantController@rejoindre_salle_pleniere')
    ->name('intervenant.rejoindre.salle.pleniere')->middleware('can:salle-pleniere');
Route::middleware('can:role-intervenant')->group(function () {
    Route::get('/intervenant/salle/pleniere', 'intervenants\IntervenantController@salle_pleniere')->name('intervenant.salle.pleniere');
});

Route::get('etat/salle', function () {
    $salles = Salle::all();
    foreach ($salles as $sal) {
        if (\Bigbluebutton::isMeetingRunning($sal->id)) {
            $sal->is_running = true;
            $sal->save();
        } else {
            $sal->is_running = false;
            $sal->save();
        }
    }

    return back();
})->name('fermer.salles');


Route::get('/test', function () {
    print_r("Bonjour !");
});
