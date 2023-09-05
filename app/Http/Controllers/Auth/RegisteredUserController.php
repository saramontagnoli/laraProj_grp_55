<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Occupazione;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


        return view('auth.register', ['occupazioni' => $occupazioni]);
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
            'data_nascita' => ['required', 'date'],
            'username' => ['required', 'string', 'min:8', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'email'=>['required', 'email'],
            'occupazione'=>['required']
        ]);

        $user = User::create([

            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'data_nascita' => $request->input('data_nascita'),
            'username' => $request->input('username'),
            'password' => $request->input('password'),
            'email'=>$request->input('email'),
            'occupazione'=>$request->input('occupazione')

        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('login'));
    }


}
