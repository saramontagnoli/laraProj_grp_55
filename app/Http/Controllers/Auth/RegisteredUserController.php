<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Comuni;
use App\Models\Occupazione;
use App\Models\Province;
use App\Models\Regioni;
use App\Models\Stato;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */

    public function create(Request $request)
    {
        $occupazioni = Occupazione::all();
        $stati= Stato::all();
        $regioni= Regioni::select('regioni.*', 'stato.codice_stato')
            ->join("stato", "stato.codice_stato", "=", "regioni.stato_ref")
            ->get();
        $province=Province::select('province.*', 'regioni.id')
            ->join("regioni", "regioni.id", "=", "province.id_regione")
            ->get();
        $comuni=Comuni::select('comuni.*', 'province.id')
            ->join("regioni", "regioni.id", "=", "comuni.id_regione")
            ->join("province", "province.id", "=", "comuni.id_provincia")
            ->get();

        return view('auth.register', ['occupazioni' => $occupazioni],
            ['stati' => $stati,
            'regioni' => $regioni,
            'province'=>$province,
            'comuni'=>$comuni]);
    }

    // Altre funzioni del controller...

    // Altre funzioni del controller...


/**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)
    {
        $request->validate([
            'nome' => ['required', 'string', 'max:50'],
            'cognome' => ['required', 'string', 'max:70'],
            //la data di nascita non può essere dopo il giorno odierno
            'data_nascita' => ['required', 'date', 'before_or_equal:today'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required'],
            'email' => ['required', 'email', 'unique:users'],
            'occupazione'=>['required']
        ]);

        $user = User::create([

            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'data_nascita' => $request->input('data_nascita'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'email'=>$request->input('email'),
            'occupazione_ref'=>$request->input('occupazione'),
            'role'=>'user'

        ]);

        event(new Registered($user));

        return redirect(route('login'));
    }


}
