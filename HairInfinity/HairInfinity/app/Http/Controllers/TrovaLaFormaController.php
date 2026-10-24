<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrovaLaFormaController extends Controller
{
    public function index()
    {
        return view('/SitoWeb/trova_la_forma'); // Deve corrispondere al nome del file "contact.blade.php"
    }
}
