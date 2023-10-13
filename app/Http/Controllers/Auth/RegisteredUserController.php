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

    public function create()
    {
        $occupazioni = Occupazione::all();
        $comuni=Comuni::select('comuni.id','comuni.nome')->get();

        return view('auth.register',
            ['occupazioni' => $occupazioni],
            ['comuni'=>$comuni]);
    }


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
            'data_nascita' => ['required', 'date', 'before_or_equal:today'],
            'username' => ['required', 'string', 'max:50', 'unique:users'],
            'password' => ['required', 'min:8'],
            'conferma_password' => ['required', 'same:password'], // Aggiungi questa regola
            'email' => ['required', 'email', 'unique:users'],
            'occupazione' => ['required'],
            'indirizzo'=>['required']
        ], [
            'conferma_password.same' => 'Le password non corrispondono.'
        ]);

        $user = User::create([

            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'data_nascita' => $request->input('data_nascita'),
            'username' => $request->input('username'),
            'password' => Hash::make($request->input('password')),
            'conferma_password' => Hash::make($request->input('conferma_password')),
            'email'=>$request->input('email'),
            'occupazione_ref'=>$request->input('occupazione'),
            'indirizzo'=>$request->input('indirizzo'),
            'comune_ref'=>$request->input('comune_ref'),
            'role'=>'user'
        ]);

        event(new Registered($user));
        return redirect()->route('login')->with('message', 'Registrazione effettuata.');
    }


}
