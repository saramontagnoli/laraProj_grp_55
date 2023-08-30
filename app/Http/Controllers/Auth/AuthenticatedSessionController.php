<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller {

    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create() {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request) {

        //si esegue l'autenticazione
        $request->authenticate();

        //si genera la sessione relativa all'utente che si sta autenticando
        $request->session()->regenerate();

        /**
         * Redirezione su diverse Home Page in base alla classe d'utenza.
         */
//        return redirect()->intended(RouteServiceProvider::HOME);

        $role = auth()->user()->role;
        switch ($role) {
            case 'admin': return redirect()->route('admin');
                break;
            case 'staff': return redirect()->route('staff');
                break;
            case 'user': return redirect()->route('user');
                break;
            default: return redirect('/');
        }
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request) {

        //si esegue il logout
        Auth::guard('web')->logout();

        //la sessione attiva viene distrutta, viene resa invalida
        $request->session()->invalidate();

        //si rigenera il token CSRF così che ce ne sia uno nuovo per la prossima sessione
        $request->session()->regenerateToken();

        //redirect alla home del sito
        return redirect('/');
    }

}
