<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login'); // Deve corrispondere al nome del file "login.blade.php"
    }

    // Metodo per gestire l'invio del form
    public function login(Request $request)
    {

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if (Auth::guard('employee')->attempt($credentials)) {
            $request->session()->regenerate();
            if (Auth::check()) {
                dd('Utente autenticato:', Auth::user());
            } else {
                dd('Utente non autenticato');
            }
            return redirect()->intended('/dashboard')->with('success', 'Login effettuato con successo!');
        }

        return back()->withErrors([
            'username' => 'Le credenziali fornite non sono corrette.',
        ])->onlyInput('username');
    }


}
