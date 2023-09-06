<?php

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ControllerCatalogoAuto;
use App\Http\Controllers\ControllerFaq;
use App\Http\Controllers\GestioneAutoController;
use App\Http\Controllers\StaffController;

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
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

//Rotta di definizione della home
Route::get('/', function () {
    return view('home');
});

//Rotta di definizione delle faq al quale è associato il controller ControllerFaq
Route::get('/faq', [ControllerFaq::class, 'showFaq']);

//Rotta di definizione della pagina chi siamo
Route::get('/chisiamo', function () {
    return view('chisiamo');
});

//Rotta di definizione della pagina catalogoauto
Route::get('/catalogoauto', [ControllerCatalogoAuto::class, 'showCatalogoAuto'])->name('catalogoauto');

// Rotta per la ricerca di un'azienda dalla barra di ricerca apposita.
Route::post('/catalogoauto', [ControllerCatalogoAuto::class, 'showCatalogoAutoFiltri']);

//Rotta di definizione della singola pagina di un auto
Route::get('/catalogoauto/{codice_auto}', [ControllerCatalogoAuto::class, 'showAutoSpec']);

//Rotta di definizione della pagina comenoleggiare
Route::get('/comenoleggiare', function () {
    return view('comenoleggiare');
});

//Rotta di definizione per la visualizzazione delle auto noleggiate (staff)
Route::get('/visualizzanoleggi', [GestioneAutoController::class, 'visualizzanoleggi'])
    ->name('visualizzanoleggi');

//Rotta di definizione per la visualizzazione delle auto noleggiate (staff)
Route::post('/visualizzanoleggi', [GestioneAutoController::class, 'visualizzanoleggi'])
    ->name('visualizzanoleggi');


//Rotta di definizione per la gestione delle auto (staff)
Route::get('/gestioneauto', [GestioneAutoController::class, 'gestioneAuto'])
    ->name('gestioneauto');

//Rotta per la modifica delle auto (staff)
Route::put('/modificadatiauto', [GestioneAutoController::class, 'modificaAuto']);

//Rotta per la modifica dei dati delle auto per la modifica (staff)
Route::get('/gestioneauto/modificadatiauto/{codice_auto}', [GestioneAutoController::class, 'getDatiAuto'])
    ->name('getdatiauto');


//Rotta per l'eliminazione delle auto (staff)
Route::get('/gestioneauto/{codice_auto}', [GestioneAutoController::class, 'eliminaAuto'])
    ->name('eliminaauto');

//Rotta per eliminare un auto (staff)
Route::put('/gestioneauto/{codice_auto}', [GestioneAutoController::class, 'eliminaAuto'])
    ->name('eliminaauto');


//Rotta per l'aggiunta di un'auto (staff)
Route::put('/aggiuntaAuto', [GestioneAutoController::class, 'aggiuntaAuto'])
    ->name('aggiuntaAuto');

Route::view('/aggiuntaAuto', 'staff.aggiungiAuto')
    ->name('aggiuntaAuto');

Route::get('/aggiuntaAuto', [GestioneAutoController::class, 'getModello'])
    ->name('getModello');


/*
 * ROTTE ADMIN
 */
//Rotte di definizione dell'utente di livello 4 (admin)
Route::get('/homeadmin', [UserController::class, 'index'])
    ->name('admin')->middleware('can:isAdmin');

//Rotte di definizione dell'utente di livello 4 (admin)
Route::get('/homeadmin/gestioneFaq', [ControllerFaq::class, 'gestioneFaq'])
    ->name('gestioneFaq')->middleware('can:isAdmin');

//Rotta per l'eliminazione di una F.A.Q. (admin)
Route::get('/homeadmin/gestioneFaq/{codice_faq}', [ControllerFaq::class, 'eliminaFaq'])
    ->name('eliminaFaq')->middleware('can:isAdmin');

//Rotta per la modifica dei dati delle F.A.Q. (admin)
Route::get('/homeadmin/gestioneFaq/modificatadatiFaq/{codice_faq}', [ControllerFaq::class, 'getDatiFaq'])
    ->name('modificadatiFaq')->middleware('can:isAdmin');

//Rotta per la modifica delle F.A.Q. (admin)
Route::put('/modificadatiFaq', [ControllerFaq::class, 'modificaFaq'])->middleware('can:isAdmin');

//Rotte di definizione del riepilogo annuo dell'admin (admin)
Route::get('/homeadmin/riepilogoannuo', [GestioneAutoController::class, 'riepilogoannuo'])
    ->name('riepilogoannuo')->middleware('can:isAdmin');

//Rotte di definizione dell'utente di livello 4 (admin)
Route::get('/homeadmin/gestioneClienti', [UserController::class, 'gestioneClienti'])
    ->name('gestioneClienti')->middleware('can:isAdmin');

//Rotta per l'eliminazione di una F.A.Q. (admin)
Route::get('/homeadmin/gestioneClienti/{id}', [UserController::class, 'eliminaCliente'])
    ->name('eliminaCliente')->middleware('can:isAdmin');

//Rotta di definizione per la gestione dello staff (admin)
Route::get('/homeadmin/gestionestaff', [UserController::class, 'gestioneStaff'])
    ->name('gestionestaff')->middleware('can:isAdmin');

//Rotta per l'aggiunta di uno staff (admin)
Route::view('/aggiuntaStaff', 'aggiungiStaff')
    ->name('aggiuntaStaff')->middleware('can:isAdmin');

//Rotta per l'aggiunta di una F.A.Q. (admin)
Route::put('/aggiuntaStaff', [UserController::class, 'aggiungiStaff'])
    ->name('aggiuntaStaff')->middleware('can:isAdmin');

//Rotta per la modifica delle auto (staff)
Route::put('/modificadatistaff', [UserController::class, 'modificaStaff'])
    ->middleware('can:isAdmin');

//Rotta per la modifica dei dati delle auto per la modifica (staff)
Route::get('/homeadmin/gestionestaff/modificadatistaff/{id}', [UserController::class, 'getDatiStaff'])
    ->name('getdatistaff')->middleware('can:isAdmin');

//Rotta per l'eliminazione di una F.A.Q. (admin)
Route::get('/homeadmin/gestionestaff/{id}', [UserController::class, 'eliminaStaff'])
    ->name('eliminaStaff')->middleware('can:isAdmin');

//Rotta per l'aggiunta di una F.A.Q. (admin)
Route::get('/aggiuntaFaq', [ControllerFaq::class, 'vistafaq'] )
   ->middleware('can:isAdmin');

//Rotta per l'aggiunta di una F.A.Q. (admin)
Route::post('/aggiuntaFaq', [ControllerFaq::class, 'aggiuntaFaq'])
    ->name('aggiuntaFaq')->middleware('can:isAdmin');



/*
 * ROTTE STAFF
 */
//Rotte di definizione dell'utente di livello 3 (staff)
Route::get('/homestaff', [UserController::class, 'index'])
    ->name('staff')->middleware('can:isStaff');


/*
 * ROTTE CLIENTE
 */
//Rotte di definizione dell'utente di livello 2 (cliente)
Route::get('/home', [UserController::class, 'index'])
    ->name('user')->middleware('can:isUser');

//Rotta di definizione per la visualizzazione delle informazioni del profilo
Route::get('/home/profilo', [UserController::class, 'profilo'])
    ->name('user/profilo')->middleware('can:isUser');

// Rotta per accedere alla modifica dei dati personali (livello 1).
Route::get('/home/profilo/dati', [UserController::class, 'getDatiPersonali1'])
    ->name('modificaDatiUtente')->middleware('can:isUser');

// Rotta che aggiorna i dati.
Route::put('/modificaDatiUtente', [UserController::class, 'updateDatiPersonali1'])->middleware('can:isUser');

// Rotta per accedere alla pagina di conferma del noleggio dell'auto scelta.
Route::post('/catalogoauto/{codice_auto}/noleggio', [UserController::class, 'noleggioAuto'])->middleware('can:isUser');

require __DIR__.'/auth.php';

