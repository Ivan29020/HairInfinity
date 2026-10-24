<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChiSiamoController extends Controller
{
    public function index()
    {
        return view('/SitoWeb/about_us_page');
    }
}
