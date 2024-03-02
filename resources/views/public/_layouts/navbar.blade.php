<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="bi bi-envelope d-flex align-items-center"><a
                    href="mailto:contact@example.com">fasoevent@gmail.com</a></i>
            <i class="bi bi-phone d-flex align-items-center ms-4"><span>+22662815688</span></i>
        </div>

        <div class="cta d-none d-md-flex align-items-center gap-2">
            <a href="{{ route('public.inscription') }}" class="scrollto">Inscription</a>
            <a href="{{ route('public.connexion') }}" class="scrollto">Connexion</a>
            <a href="{{ route('private.admin-tableaudebord') }}" class="scrollto">Mon Compte</a>
        </div>
    </div>
</section>

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="/">FasoEvent</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets_public/img/logo.png" alt="" class="img-fluid"></a>-->
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto {{ request()->routeIs('public.accueil') ? 'active' : '' }}"
                        href="{{ route('public.accueil') }}">Accueil</a></li>

                @if(!request()->routeIs('public.evenements-index'))
                <li><a class="nav-link scrollto" href="#about">A propos</a></li>
                <li><a class="nav-link scrollto" href="#portfolio">Portfolio</a></li>
                <li><a class="nav-link scrollto" href="#team">Equipe</a></li>
                <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
                @endif

                <li><a class="nav-link scrollto {{ request()->routeIs('public.evenements-index') ? 'active' : '' }}"
                        href="{{ route('public.evenements-index') }}">Evenements</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->


    </div>
</header><!-- End Header -->