@extends('private._layouts.app')

@section('titre', 'Inscription')

@section('contenu')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                <div class="auth-form-transparent text-left p-3">
                    <div class="brand-logo">
                        <a href="{{ route('public.accueil') }}"><img src="{{ asset('assets_private/images/logo.svg') }}"
                                alt="logo"></a>
                    </div>
                    <h4>Bienvenu cher(è) abonné !!!</h4>
                    <h6 class="font-weight-light">Inscriver vous en tant que abonné en suivant ces etapes.</h6>
                    <form action="{{route('public.inscription-abonne-action')}}" class="pt-3" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Nom</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="nom" class="form-control form-control-lg border-left-0"
                                    placeholder="Nom">
                                @if ($errors->has('nom'))
                                <span class="text-danger">{{ $errors->first('nom') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Prénom</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="prenom" class="form-control form-control-lg border-left-0"
                                    placeholder="Prénom">
                                @if ($errors->has('prenom'))
                                <span class="text-danger">{{ $errors->first('prenom') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-email-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="email" name="email" class="form-control form-control-lg border-left-0"
                                    placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Mot de passe</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" name="password"
                                    class="form-control form-control-lg border-left-0" id="exampleInputPassword"
                                    placeholder="Password">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Telephone</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="telephone" max="8"
                                    class="form-control form-control-lg border-left-0" id="exampleInputTelephone"
                                    placeholder="Telephone">
                                @if ($errors->has('telephone'))
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Préférences</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                    </span>
                                </div>
                                <!-- Remplacez la balise <input> par <textarea> -->
                                <textarea name="preferences" class="form-control form-control-lg border-left-0"
                                    id="exampleInputPreferences" placeholder="Vos préferences"></textarea>
                                @if ($errors->has('preferences'))
                                <span class="text-danger">{{ $errors->first('preferences') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="mb-4">
                            <div class="form-check">
                                <label class="form-check-label text-muted">
                                    <input type="checkbox" class="form-check-input">
                                    J'accepte les conditions d'utilisation
                                </label>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit"
                                class="btn btn-block btn-primary w-100 text-white btn-lg font-weight-medium auth-form-btn">Je
                                m'inscris</button>
                        </div>
                        <div class="text-center mt-4 font-weight-light">
                            Vous avez déja un compte ? <a href="{{ route('public.connexion') }}" class="text-primary">Se
                                connecter</a>
                        </div>

                        <div class="text-center mt-4 font-weight-light">
                            S'inscrire en tant que promoteur ? <a href="{{ route('public.inscription-promoteur') }}"
                                class="text-primary">
                                Inscription promoteur</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 register-half-bg d-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2020 All
                    rights reserved.</p>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

@endsection