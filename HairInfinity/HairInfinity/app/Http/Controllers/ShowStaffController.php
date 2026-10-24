<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShowStaffController extends Controller
{
    public function index(){
        return view('/SitoWeb/show_staff');
    }
    
}
