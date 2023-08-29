<?php

use App\Http\Controllers\ControllerCatalogoAuto;
use App\Http\Controllers\ControllerFaq;
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

//Rotte di definizione dell'utente di livello 2 (utente registrato che può noleggiare le auto)
Route::get('/home', [UserController::class, 'index'])
    ->name('user')->middleware('can:isUser');

//Rotte di definizione dell'utente di livello 3 (staff)
Route::get('/home', [StaffController::class, 'index'])
    ->name('staff')->middleware('can:isStaff');

//Rotta di definizione per la visualizzazione delle informazioni del profilo
Route::get('/home/profilo', [UserController::class, 'profilo'])
    ->name('user/profilo')->middleware('can:isUser');

//Rotta di definizione per la gestione delle auto (staff)
Route::get('/home/gestioneauto', [StaffController::class, 'gestioneAuto'])
    ->name('user/gestioneauto')->middleware('can:isStaff');

//Rotta di definizione per la visualizzazione delle auto noleggiate (staff)
Route::get('/home/visualizzanoleggi', [StaffController::class, 'visualizzaNoleggi'])
    ->name('user/visualizzanoleggi')->middleware('can:isStaff');

// Rotta per accedere alla modifica dei dati personali (livello 1).
Route::get('/home/profilo/dati', [UserController::class, 'getDatiPersonali1'])
    ->name('modificaDatiL1');
// Rotta che aggiorna i dati.
Route::put('/modificaDatiL1', [UserController::class, 'updateDatiPersonali1']);

// Rotta per accedere alle auto noleggiate.

Route::post('/catalogoauto/{codice_auto}/noleggio', [UserController::class, 'noleggioAuto']);

require __DIR__.'/auth.php';
