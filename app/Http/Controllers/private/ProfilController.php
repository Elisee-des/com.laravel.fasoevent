<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function profil()
    {
        return view('private.profil.index');
    }
}
