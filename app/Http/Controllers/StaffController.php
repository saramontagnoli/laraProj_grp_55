<?php

namespace App\Http\Controllers;

class StaffController extends Controller
{
    public function index() {
        return view('home');
    }
    //funzione che gestisce le azioni CRUD per le auto
    function gestioneAuto(){}

    //funzione che gestisce la visualizzazione dei noleggi in base al mese e in base all'utente
    function visualizzanoleggi(){}
}
