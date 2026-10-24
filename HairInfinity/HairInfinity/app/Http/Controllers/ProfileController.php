<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    // Mostra il form per modificare il profilo
    public function edit()
    {
        return view('profile.edit.css');
    }

    // Aggiorna le informazioni del profilo
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::id()],
        ]);

        Auth::user()->update($request->only(['name', 'email']));

        return redirect()->route('profile.edit.css')->with('success', 'Profilo aggiornato con successo!');
    }

    // Aggiorna la password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'confirmed', Password::defaults()],
        ]);

        Auth::user()->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('profile.edit.css')->with('success', 'Password aggiornata con successo!');
    }

    // Elimina l'account
    public function destroy(Request $request)
    {
        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        Auth::user()->delete();

        return redirect('/')->with('success', 'Account eliminato con successo!');
    }
}
