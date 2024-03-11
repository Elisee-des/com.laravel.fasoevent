<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function inscriptionOption()
    {
        return view('public.auth.inscription-option');
    }

    public function inscriptionPromoteur()
    {
        return view('public.auth.inscription-promoteur');
    }

    public function inscriptionPromoteurAction(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nomcomplet' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'siege' => 'required',
                'activites' => 'required',
                'telephone' => 'required',
                'password' => 'required|min:4',
            ],
            [
                'nomcomplet.required' => 'Le champ nom et prénom est requis.',
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.required' => 'Le champ mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
                'siege.required' => 'Le champ siege est requis.',
                'telephone.required' => 'Le champ telephone est requis.',
                'activites.required' => 'Le champ domaines d\'activites est requis.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $promoteur = User::create([
            'nomcomplet' => $request->nomcomplet,
            'email' => $request->email,
            'password' => $request->password,
            'siege' => $request->siege,
            'telephone' => $request->telephone,
            'activites' => $request->activites,
            'role' => "promoteur",
            'status' => "attente",
        ]);

        $promoteur->save();

        return redirect()->route('public.connexion')->withMessage('Inscription réussie ! Connectez-vous maintenant.');
    }

    public function inscriptionAbonne()
    {
        return view('public.auth.inscription-abonne');
    }

    public function inscriptionAbonneAction(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nom' => 'required',
                'prenom' => 'required',
                'email' => 'required|email|max:255|unique:users',
                'password' => 'required',
                'telephone' => 'required',
                'preferences' => 'required',
            ],
            [
                'nom.required' => 'Le champ nom et prénom est requis.',
                'prenom.required' => 'Le champ nomcomplet et prénom est requis.',
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
                'email.unique' => 'Cette adresse email est déjà utilisée.',
                'password.required' => 'Le champ mot de passe est requis.',
                'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
                'telephone.required' => 'Le champ telephone est requis.',
                'preferences.required' => 'Le champ preferences est requis.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $abonne = User::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'password' => $request->password,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'preferences' => $request->preferences,
            'role' => "abonne",
        ]);

        $abonne->save();

        return redirect()->route('public.connexion')->withMessage('Inscription réussie ! Connectez-vous maintenant.');
    }

    public function connexion()
    {
        return view('public.auth.connexion');
    }

    public function connectionAction(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ],
            [
                'email.required' => 'Le champ email est requis.',
                'email.email' => 'Veuillez entrer une adresse email valide.',
                'password.required' => 'Le champ mot de passe est requis.',
            ]
        );

        //On retourn tout les erreurs
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Vérifier si un utilisateur avec cet email existe
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return redirect()->back()
                ->withErrors(['login' => "Cet email n'a pas de compte"])
                ->withInput();
        }

        //On le connecte ici
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return redirect()->back()
                ->withErrors(['login' => 'Mot de passe est incorrect'])
                ->withInput();
        }

        $request->session()->regenerate();

        //On voie sur quel page on dois le redirigé
        $user = Auth::user();
        $redirectRoute = '';

        if ($user->role == 'admin') {
            $redirectRoute = 'private.admin-tableaudebord';
        } elseif ($user->role == 'promoteur') {
            $redirectRoute = 'private.promoteur-tableaudebord';
        } elseif ($user->role == 'abonne') {
            $redirectRoute = 'private.abonne-tableaudebord';
        }

        if (!empty($redirectRoute)) {
            return redirect()->route($redirectRoute)->withMessage("Connexion réussie !");
        }
    }
}
