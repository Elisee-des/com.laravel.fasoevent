<?php

namespace App\Http\Controllers\public;

use App\Http\Controllers\Controller;
use App\Models\Promoteur;
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
                'email' => 'required|email|max:255|unique:promoteurs',
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

        $promoteur = Promoteur::create([
            'nomcomplet' => $request->nomcomplet,
            'email' => $request->email,
            'password' => $request->password,
            'siege' => $request->siege,
            'telephone' => $request->telephone,
            'activites' => $request->activites,
        ]);

        $promoteur->save();
        // Connectez l'abonné si nécessaire
        // auth()->login($abonne);

        return redirect()->route('public.connexion')->withMessage('Inscription réussie ! Connectez-vous maintenant.');
    }

    public function inscriptionAbonne()
    {
        return view('public.auth.inscription-abonne');
    }

    public function connexion()
    {
        return view('public.auth.connexion');
    }

    public function connecionAction(Request $request)
    {
        //On valide si c'est bon ou pas
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

        $user = Auth::user();
        $redirectRoute = '';

        if ($user->role == 'ADMIN') {
            $redirectRoute = 'private.admin-tableaudebord';
        }
        if ($user->role == "PROMOTEUR") {
            $redirectRoute = 'private.promoteur-tableaudebord';
        } elseif ($user->role == 'ABONNE') {
            $redirectRoute = 'private.abonne-tableaudebord';
        }

        if (!empty($redirectRoute)) {
            return redirect()->route($redirectRoute)->withMessage("Connexion réussie ! Bienvenue, {$user->nomcomplet}");
        }
    }
}
