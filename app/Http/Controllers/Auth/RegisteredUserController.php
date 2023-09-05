<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comuni;
use App\Models\Occupazione;
use App\Models\Province;
use App\Models\Regioni;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\Stato;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function getOccupazione(){
        $occupazioni = Occupazione::get();
        return view('auth.register', ['occupazioni' => $occupazioni]);
    }

    public function getStato(){
        $stati= Stato::all();
        return view('auth.register', ['stati' => $stati]);
    }

    public function getRegione(){
        $regioni= Regioni::select('regioni.*', 'stato.nome_stato')
            ->join("stato", "stato.codice_stato", "=", "regioni.stato_ref")

            ->get();
        return view('auth.register', ['regioni' => $regioni]);
    }

    public function getProvincia(){
        $province=Province::select('province.*', 'regioni.nome')
            ->join("regioni", "regioni.id", "=", "regioni.id_regione")

            ->get();
        return view('auth.register', ['province' => $province]);
    }

    public function getComune(){
        $comuni=Comuni::select('comuni.*', 'province.nome')
            ->join("regioni", "regioni.id", "=", "comuni.id_regione")
            ->join("province", "province.id", "=", "comuni.id_regione")

            ->get();
        return view('auth.register', ['province' => $comuni]);
    }

    public function store(Request $request, $nome_stato, $nome_regione, $nome_provincia)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:50'],
            'cognome' => ['required', 'string', 'max:70'],
            'data_nascita' => ['required', 'date'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email'=>['required', 'email'],
            'occupazione'=>['required'],
            'stato'=>['required'],
            'regione'=>['required'],
            'provincia'=>['required'],
            'citta'=>['required'],
            'indirizzo'=>['required', 'string']
        ]);

        $user = User::create([

            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'data_nascita' => $request->input('data_nascita'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email'=>$request->input('email'),
            'occupazione'=>$request->input('occupazione'),
            'stato'=>$request->input('stato'),
            'regione'=>$request->input('regione'),
            'provincia'=>$request->input('provincia'),
            'citta'=>$request->input('citta'),
            'indirizzo'=>$request->input('indirizzo'),

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('login'));
    }


}
