<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('/SitoWeb/contact'); // Deve corrispondere al nome del file "contact.blade.php"
    }

    // Metodo per gestire l'invio del form
    public function send(Request $request)
    {
        // Validazione del form
        $request->validate([
            'nome' => 'required|string|max:255',
            'cognome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'tipo_richiesta' => 'required|string',
            'messaggio' => 'required|string|max:5000',
            'telefono' => 'nullable|string|max:15',
            'privacy' => 'accepted', // Campo obbligatorio per accettare la privacy
        ]);

        // Puoi elaborare i dati qui, ad esempio salvandoli nel database o inviando un'email

        return back()->with('success', 'Grazie per averci contattato! Ti risponderemo al più presto.');
    }
}
