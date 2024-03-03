<?php

namespace App\Http\Controllers\private\Abonne;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AbonneTableaudebordController extends Controller
{
    public function abonnetableaudebord()
    {
        return view('private.abonne.tableaudebord');
    }
}
