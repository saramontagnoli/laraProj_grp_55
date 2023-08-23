<?php

namespace App\Http\Controllers;

use App\Models\Auto;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\Array_;

class UserController extends Controller {

    public function index() {
        return view('home');
    }

    public function profilo() {
        return view('profilo');
    }

    // Ottenimento dati personali del Cliente, per la pagina Modifica dati personali del Cliente.
    function getDatiPersonali1(){
        $username = Auth::user()->username;
        $data = User::where('username', $username)->first();

        return view('modificaDati', ['dati'=>$data]);
    }

    // Modifica dei dati personali del cliente.
    function updateDatiPersonali1(Request $request)
    {
        // questo è lo username dell'utente che si è loggato
        $username = Auth::user()->username;

        // Validazione dei dati inviati dalla form di registrazione
        $request->validate([
            'nome' => ['required','string','max:20'],
            'cognome' => ['required','string','max:20'],
            'data_nascita' => ['required', 'date_format:Y-m-d'],
            'email' => ['string','email','max:30'],
            'password' => ['required','string','min:8']
        ]);

        if (!($request->input('password')))
        {
            User::where('username', $username)->update(
                [
                    'nome'=>$request->input('nome'),
                    'cognome'=>$request->input('cognome'),
                    'data_nascita'=>$request->input('data_nascita'),
                    'email'=>$request->input('email')
                ]);
        }
        else
        {
            $request->validate([
                'password' => ['required','string','min:8']
            ]);
            User::where('username', $username)->update(
                [
                    'nome'=>$request->input('nome'),
                    'cognome'=>$request->input('cognome'),
                    'data_nascita'=>$request->input('data_nascita'),
                    'password'=>Hash::make($request->input('password')),
                    'email'=>$request->input('email')
                ]);
        }

        return redirect()->route('user/profilo');
    }

    function noleggioAuto($codice_auto){
        $username=Auth::user()->username;
        $query = Auto::join("modello", "auto.modello_ref", "=", "modello.codice_modello")
            ->join("marca", "modello.marca_ref", "=", "marca.codice_marca")
            ->where ('codice_auto', $codice_auto)
            ->get();

        $auto = Array();
        $auto["auto"] = $query;


        return view('noleggio', $auto);

    }

}
