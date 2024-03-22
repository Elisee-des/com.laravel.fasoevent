<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function profil()
    {
        return view('private.profil.index');
    }

    public function ediProfilAction(Request $request)
    {
        $user = Auth()->user();

        $user->nomcomplet = $request->nomcomplet;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->telephone = $request->telephone;
        $user->siege = $request->siege;
        $user->adresse = $request->adresse;
        $user->activites = $request->activites;
        $user->preferences = $request->preferences;

        $user->save();

        return redirect()->back()->with('success', 'Profil edité avec succès');
    }
}
