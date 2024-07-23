<style>
   
</style>








{{-- MENU DEBUT --}}
<section>
    <div class="">
        <div class="">
            <nav class="navbar navbar-expand-md fixed-top" id="navbar">
                <!-- Contenu de la barre de navigation -->
                <div class="container-fluid manav">
                    <!-- Supprimez cet élément -->
                    <!-- <div class="navbar navbar-expand-md"> -->
                    <a class="navbar-brand text-uppercase fw-bold" href="/PortoT.html"><span class="bg-info bg-gradient p-1 rounded-3 text-light">Okawe </span>Jeremy</a>
                    <button class="navbar-toggler nav-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link fw-bold" aria-current="page" href="#okawejeremy"  ><i class="fas fa-thumbtack"></i>&ensp;Qui je suis ?</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link fw-bold" href="#competence" ><i class="fas fa-clipboard"></i>&ensp;Competences</a>
                            </li> --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold dropdown-toggle" href="#" id="ProgressionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-award"></i>&ensp;Progressions
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="ProgressionDropdown">
                                    <li><a class="dropdown-item" href="#competence"><i class="fas fa-clipboard"></i>&ensp;Competences</a></li>
                                    <li><a class="dropdown-item" href="#maitrise"><i class="fas fa-user"></i>&ensp;Maitrises</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#entreprise"><i class="far fa-building"></i>&ensp;Entreprises fréquenté</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold dropdown-toggle" href="#" id="realisationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-tags"></i>&ensp;Réalisations
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="realisationDropdown">
                                    <li><a class="dropdown-item" href="#equipe"><i class="fab fa-slideshare"></i>&ensp;Équipe</a></li>
                                    <li><a class="dropdown-item" href="#perso"><i class="fas fa-user"></i>&ensp;Personnelles</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#blog"><i class="fab fa-rocketchat"></i>&ensp;Blog</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold" href="#contact"><i class="fas fa-paper-plane"></i>&ensp;Contact</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link fw-bold dropdown-toggle" href="#" id="realisationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-door-closed"></i>&ensp;Connexion
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="realisationDropdown">
                                    @if (Route::has('login'))
                                    @auth
                                        @if(Auth::user()->profil_id == 3 || Auth::user()->profil_id == 2)
                                            <li><a class="dropdown-item trigger-animation"  href="{{route('HomeAdmin')}}"><i class="fas fa-tachometer-alt"></i>&ensp;Admin</a></li>
                                            <li><a class="dropdown-item"  href="#">
                                                <form action="{{route('logout')}}" method="POST" class="d-flex align-items-center  p-0 pl-4">@csrf
                                                    <button type="submit" class="btn nav-link fw-bold d-flex align-items-center " style="background: none; border: none; diplay: flex; font-size : 16px;">
                                                        <span class="" style="font-size: 12px">
                                                            <i class="fas fa-door-closed"></i>&ensp;Logout
                                                        </span>
                                                    </button>
                                                </form>
                                                </a>
                                            </li>
                                        @else
                                            <li>
                                                <a class="dropdown-item"  href="#">
                                                    <form action="{{route('logout')}}" method="POST" class="d-flex align-items-center  p-0 pl-4">@csrf
                                                        <button type="submit" class="btn nav-link fw-bold d-flex align-items-center " style="background: none; border: none; diplay: flex; font-size : 16px;">
                                                            <span class="" style="font-size: 12px">
                                                                <i class="fas fa-door-closed"></i>&ensp;Logout
                                                            </span>
                                                        </button>
                                                    </form>
                                                </a>
                                            </li>
                                        @endif
                                    @else
                                        <li><a class="dropdown-item trigger-animation" href="{{route('login')}}"><i class="fas fa-door-open"></i>&ensp;Login</a></li>
                                    @endauth
                                @endif
                                   
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</section>
{{-- MENU FIN --}}
