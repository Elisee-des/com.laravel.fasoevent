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
                    <h4>Bienvenu !!!</h4>
                    <h6 class="font-weight-light">Choisissez une option d'inscription</h6>
                    <form action="" class="pt-3" method="POST">
                        <div class="mt-3">
                            <a href="{{ route('public.inscription-promoteur') }}"
                                class="btn btn-block btn-primary w-100 text-white btn-lg font-weight-medium auth-form-btn">
                                Inscription en tant que promoteur</a>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('public.inscription-abonne') }}"
                                class="btn btn-block btn-primary w-100 text-white btn-lg font-weight-medium auth-form-btn">
                                Inscription en tant que abonné</a>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('public.connexion') }}"
                                class="btn btn-block btn-primary w-100 text-white btn-lg font-weight-medium auth-form-btn">
                                Connexion</a>
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-6 register-half-bg d-flex flex-row">
                <p class="text-white font-weight-medium text-center flex-grow align-self-end">Copyright &copy; 2024 tout
                    droit reservé.</p>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
</div>

@endsection