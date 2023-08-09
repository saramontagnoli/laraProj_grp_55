<?php

use App\Http\Controllers\ControllerCatalogoAuto;
use App\Http\Controllers\ControllerFaq;
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
