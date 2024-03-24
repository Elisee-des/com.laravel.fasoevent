<?php

namespace App\Http\Controllers\api\public;

use App\Http\Controllers\api\BaseController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // public function inscription(Request $request)
    // {
    //     try {
    //         $validator = Validator::make(
    //             $request->all(),
    //             [
    //                 'nomcomplet' => 'required',
    //                 'email' => 'required|email|max:255|unique:users',
    //                 'siege' => 'required',
    //                 'activites' => 'required',
    //                 'telephone' => 'required',
    //                 'password' => 'required|min:4',
    //             ],
    //             [
    //                 'nomcomplet.required' => 'Le champ nom et prénom est requis.',
    //                 'email.required' => 'Le champ email est requis.',
    //                 'email.email' => 'Veuillez entrer une adresse email valide.',
    //                 'email.max' => 'L\'adresse email ne doit pas dépasser :max caractères.',
    //                 'email.unique' => 'Cette adresse email est déjà utilisée.',
    //                 'password.required' => 'Le champ mot de passe est requis.',
    //                 'password.min' => 'Le mot de passe doit contenir au moins :min caractères.',
    //                 'siege.required' => 'Le champ siege est requis.',
    //                 'telephone.required' => 'Le champ telephone est requis.',
    //                 'activites.required' => 'Le champ domaines d\'activites est requis.',
    //             ]
    //         );
    //         if ($validator->fails()) {
    //             return $this->sendError('Erreur de validation des champs.', $validator->errors(), 400);
    //         }

    //         $promoteur = User::create([
    //             'nomcomplet' => $request->nomcomplet,
    //             'email' => $request->email,
    //             'password' => $request->password,
    //             'siege' => $request->siege,
    //             'telephone' => $request->telephone,
    //             'activites' => $request->activites,
    //             'role' => "promoteur",
    //             'status' => "attente",
    //         ]);

    //         $promoteur->save();

    //         return $this->sendResponse(['user' => $promoteur], 'Inscription reussis !');


    //     } catch (\Throwable $th) {
    //         return $this->sendError('Une erreur est survenue lors de l\'inscription.', $th->getMessage(), 400);
    //     }
    // }


    public function inscriptionPromoteur(Request $request)
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
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Erreur de validation du formulaire!',
                    'data' => $validator->errors(),
                ], 422);
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

            $data['user'] = $promoteur;

            $response = [
                'status' => 'success',
                'message' => 'Inscription reuissi avec succès.',
                'data' => $data,
            ];

            return response()->json($response, 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Erreur serveur ! ' . $th->getMessage()
            ], 500);
        }
    }

    public function inscriptionAbonne(Request $request)
    {
        try {
            $validator = Validator::make(
                $request->all(),
                [
                    'nom' => 'required',
                    'prenom' => 'required',
                    'email' => 'required|email|max:255|unique:users',
                    'preferences' => 'required',
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
                    'telephone.required' => 'Le champ telephone est requis.',
                    'activites.required' => 'Le champ domaines d\'activites est requis.',
                ]
            );

            if ($validator->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Erreur de validation du formulaire!',
                    'data' => $validator->errors(),
                ], 422);
            }

            $promoteur = User::create([
                'nom' => $request->nom,
                'prenom' => $request->prenom,
                'email' => $request->email,
                'password' => $request->password,
                'telephone' => $request->telephone,
                'preferences' => $request->preferences,
                'role' => "abonne",
            ]);

            $data['user'] = $promoteur;

            $response = [
                'status' => 'success',
                'message' => 'Inscription reuissi avec succès. ',
                'data' => $data,
            ];

            return response()->json($response, 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Erreur serveur ! ' . $th->getMessage()
            ], 500);
        }
    }

    public function connexion(Request $request)
    {
        try {
            $validate = Validator::make($request->all(), [
                'email' => 'required|string|email',
                'password' => 'required|string'
            ]);

            if ($validate->fails()) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Erreur de validation du formulaire!',
                    'data' => $validate->errors(),
                ], 403);
            }

            // On verifie si l'email existe ou les donné ne sont pas correct
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Email ou mot de passe incorrect !'
                ], 401);
            }

            $data['token'] = $user->createToken($request->email)->plainTextToken;
            $data['user'] = $user;

            $response = [
                'status' => 'success',
                'message' => 'Connexion reussis !!!.',
                'data' => $data,
            ];

            return response()->json($response, 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Erreur serveur ! ' . $th->getMessage()
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => "Vous etes deconnecter avec succès !"
        ], 200);
    }
}
