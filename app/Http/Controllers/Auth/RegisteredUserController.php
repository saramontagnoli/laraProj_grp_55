<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
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
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
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
        $stati = Stati::all();
        $regioni= Regioni
        ->join("stato", "stato.codice_stato", "=", "regioni.id_stato")
        all();
        $province=Province::all();
        $comuni=Comuni::all();
        $occupazioni=Occupazione::all();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }


}
