<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function inscription()
    {
        return view('public.auth.inscription');
    }

    public function connexion()
    {
        return view('public.auth.connexion');
    }
}
