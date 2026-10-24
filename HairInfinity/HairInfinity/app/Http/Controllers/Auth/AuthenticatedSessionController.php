<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('SitoWeb.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse{
    $credentials = $request->only('email', 'password');
    $guardRedirects = [
        'employee' => route('home2.index'),
        'owner' => route('home.index'),
    ];

    // Pulisci la sessione prima di tentare una nuova autenticazione
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    // Tenta l'autenticazione per ciascun guard
    foreach ($guardRedirects as $guard => $redirectRoute) {
        if (Auth::guard($guard)->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Reindirizza alla dashboard corretta ignorando l'URL precedente
            return redirect($redirectRoute);
        }
    }

    // Se l'autenticazione fallisce
    return back()->withErrors([
        'email' => 'Le credenziali fornite non sono valide.',
    ]);
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('employee')->logout(); // Disconnette dipendenti
        Auth::guard('owner')->logout();    // Disconnette proprietari
        Auth::logout();                    // Disconnette eventuale default

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
