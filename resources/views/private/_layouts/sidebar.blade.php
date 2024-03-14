<nav class="sidebar sidebar-offcanvas" id="sidebar">

    @if (auth()->user()->role == "admin")
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('private.admin-tableaudebord') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Admin Tableau de bord</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../../pages/evenement/evenement.html">
                <i class="mdi mdi-application menu-icon"></i>
                <span class="menu-title">Evènements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../pages/utilisateurs/utilisateurs.html">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Utilisateurs</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../../pages/categorie/categories.html">
                <i class="mdi mdi-equal-box menu-icon"></i>
                <span class="menu-title">Catgories</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../../pages/profil/profil.html">
                <i class="mdi mdi-account-box-outline menu-icon"></i>
                <span class="menu-title">Profil</span>
            </a>
        </li>
    </ul>
    @endif

    @if (auth()->user()->role == "promoteur")
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('private.promoteur-tableaudebord') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Promoteur Tableau de bord</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../../pages/evenement/evenement.html">
                <i class="mdi mdi-application menu-icon"></i>
                <span class="menu-title">Evènements</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../pages/utilisateurs/utilisateurs.html">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Abonnés</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../../pages/profil/profil.html">
                <i class="mdi mdi-account-box-outline menu-icon"></i>
                <span class="menu-title">Paramètre</span>
            </a>
        </li>
    </ul>
    @endif

    @if (auth()->user()->role == "abonne")
    <ul class="nav">

        <li class="nav-item">
            <a class="nav-link" href="{{ route('private.abonne-tableaudebord') }}">
                <i class="mdi mdi-home menu-icon"></i>
                <span class="menu-title">Abonné Tableau de bord</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../../pages/evenement/evenement.html">
                <i class="mdi mdi-application menu-icon"></i>
                <span class="menu-title">Favoris</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../../pages/utilisateurs/utilisateurs.html">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Mes amis</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="../../pages/profil/profil.html">
                <i class="mdi mdi-account-box-outline menu-icon"></i>
                <span class="menu-title">Profil</span>
            </a>
        </li>
    </ul>
    @endif
</nav>