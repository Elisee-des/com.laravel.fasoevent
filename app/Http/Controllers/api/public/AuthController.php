<?php

namespace App\Http\Controllers\api\public;

use App\Http\Controllers\api\BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseController
{
    public function inscription(Request $request)
    {
        try {
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
                return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
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

            return $this->sendResponse(['user' => $promoteur], 'Inscription reussis !');

            
        } catch (\Throwable $th) {
            return $this->sendError('Une erreur est survenue lors de l\'inscription.', $th->getMessage(), 400);
        }
    }

    public function connexion(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
        }

        $loginData = request(['email', 'password']);

        if (!Auth::attempt($loginData)) {
            return $this->sendError('Nom autorisé. Données invalides', 'Le nom d\'utilisateur ou le mot de passe est incorrecte', 401);
        }
        if (auth()->attempt($loginData)) {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;
            return $this->sendResponse(['infos_user' => Auth::user(), 'access_token' => $accessToken], 'Avec succès');
        } else {
            return $this->sendError('Unauthorised. Invalid credentials.', 'Le nom d\'utilisateur ou le mot de passe est incorrecte', 401);
        }
    }
}
