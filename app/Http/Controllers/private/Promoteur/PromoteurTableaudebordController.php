<?php

namespace App\Http\Controllers\private\Promoteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PromoteurTableaudebordController extends Controller
{
    public function promoteurtableaudebord()
    {
        return view('private.promoteur.tableaudebord');
    }
}
