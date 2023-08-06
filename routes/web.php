<?php

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

//Rotta di definizione delle faq
Route::get('/faq', function () {
    return view('faq');
});

//Rotta di definizione della pagina chi siamo
Route::get('/chisiamo', function () {
    return view('chisiamo');
});

//Rotta di definizione della pagina catalogoauto
Route::get('/catalogo', function () {
    return view('catalogoauto');
});
