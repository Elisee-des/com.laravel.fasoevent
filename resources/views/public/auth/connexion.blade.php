@extends('private._layouts.app')

@section('titre', 'Connection')

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
                    <h4>Bienvenu !!!</h4>
                    <h6 class="font-weight-light">Entrez vos coordonnés pour vous connecté.</h6>
                    @if($errors->has('login'))
                    <div class="alert alert-danger form-login">
                        {{ $errors->first('login') }}
                    </div>
                    @endif
                    <form class="pt-3" action="{{ route('public.connexion-action') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail">Email</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-account-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" name="email" class="form-control form-control-lg border-left-0"
                                    id="exampleInputEmail" placeholder="Email">
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword">Mot de passe</label>
                            <div class="input-group">
                                <div class="input-group-prepend bg-transparent">
                                    <span class="input-group-text bg-transparent border-right-0">
                                        <i class="mdi mdi-lock-outline text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" class="form-control form-control-lg border-left-0"
                                    id="exampleInputPassword" placeholder="Mot de passe">
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="mt-3">
                            <button
                                class="btn btn-block btn-primary text-white w-100 btn-lg font-weight-medium auth-form-btn">Connexion</button>
                        </div>

                        <div class="text-center mt-4 font-weight-light">
                            Vous n'avez pas de compte ? <a href="{{ route('public.inscription-option') }}"
                                class="text-primary">S'inscrire</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 login-half-bg d-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2024 Tout
                    droit reservé. Developper par SABIDANI.</p>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

@endsection