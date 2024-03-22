<?php

namespace App\Http\Controllers\private;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function editPassword(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'new_password' => 'required|min:4|confirmed',
            ],
            [
                'new_password.required' => 'Le champ mot de passe est requis.',
                'new_password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
                'new_password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            ]
        );

        //On retourn tout les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user = Auth()->user();
        $user->password = $request->new_password;
        $user->save();

        return redirect()->back()->with('success', 'Mot de passe modifié avec succès');
    }

}
