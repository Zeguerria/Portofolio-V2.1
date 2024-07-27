<aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="{{route('HomeAdmin')}}" class="brand-link ">
        <img id="logo" src="" alt="logo" class="brand-image img-circle elevation-3 nav-link-heart" style="opacity: 0.8">
        <span class="brand-text font-weight-light nav-link-heart " ><strong class="application" style="" >A</strong><label class="application_suite" for="" >dmin</label><strong class="application" style="" >P</strong><label class="application_suite" for="" >ortofolio</label></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        @if (Route::has('login'))
            @auth
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                @if(Auth::user()->photo !=null)
                    <div class="image">
                        <img src="{{asset(Auth::user()->le_profil)}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                @else
                    <div class="image">
                        <img src="{{asset('/glbal/autres/images.png')}}" class="img-circle elevation-2" alt="User Image">
                    </div>
                @endif
                {{-- <div class="image">
                <img src="{{asset(Auth::user()->le_profil)}}" class="img-circle elevation-2" alt="User Image">
                </div> --}}
                <div class="info">
                <a href="./monprofil" class="d-block nav-link-heart " id="user">{{Auth::user()->name}} {{Auth::user()->prenom}}</a>
                </div>
            </div>

        @else
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                <img src="{{asset('/glbal/autres/images.png')}}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                <a href="#" class="d-block nav-link-heart titre-grandiant" id="user">Alexander Pierce</a>
                </div>
            </div>
        @endauth
        @endif
        <!-- Sidebar user panel (optional) -->
        <!-- SidebarSearch Form -->
        <div class="form-inline" >
            <div class="form-inline" >
                <form action="" method="GET" class="form-inline mb-3">
                    <div class="input-group  ">
                        <input class="form-control form-control-sidebar serch" type="search" name="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append ">
                            <button class="btn btn-sidebar larecherche"  id="monicon">
                                <i class="fas fa-search fa-fw nav-link-heart "></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="{{route('HomeAdmin')}}" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-home msicons"></i>
                            <p class="mesliens">
                                Home
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link  nav-link-heart">
                            <i class="nav-icon fas  fa-folder msicons"></i>
                            <p class="mesliens">
                                Réalisations
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview ">
                            <li class="nav-item mesliens">
                                <a href="{{route('R-Realisations')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Réalisation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-sliders-h msicons"></i>
                            <p class="mesliens">
                                Gestions
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{(route('A-Accomplissements'))}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Maitrises & Competences</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('E-Entreprises')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Entreprise</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('PT-Posts')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Post</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('P-Projets')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Projet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('TS-Tasks')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Tache</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./ParametreCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Parametre</p>
                                </a>
                            </li>
                        </ul>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-map-marker-alt msicons"></i>
                            <p class="mesliens">
                                Localisations
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./Payss" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Pays</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Provinces" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Province</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Communes" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Commune</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Arrondissements" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Arrondissment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Quartiers" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Quartier</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fas fa-toolbox msicons"></i>
                            <p class="mesliens">
                                Paramétrages
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('P-Parametres')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Paramètre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('T-TypeDeParametres')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Type de Paramètre</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="./Postes" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Poste</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Statuts" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Statut</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./Types" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Type</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="{{route('P-Profils')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('H-Habilitations')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Habilitation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('PH-ProfilHabilitations')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Profil Habilitation</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-id-badge msicons"></i>
                            <p class="mesliens">
                                Profils
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./monprofil" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">profil</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link nav-link-heart">
                        <i class="nav-icon fas fa-users msicons"></i>
                        <p class="mesliens">
                            Users
                            <i class="fas fa-angle-left right msicons"></i>
                        </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./Users" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">User</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <hr style="background-color: rgb(250, 250, 255);">
                        <a href="#" class="nav-link nav-link-heart">
                            <i class="nav-icon fas fa-trash msicons"></i>
                            <p class="mesliens">
                                Corbeille
                                <i class="fas fa-angle-left right msicons"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{route('PC-Projets')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Projet</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('PC-Parametres')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Paramètre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('TSC-Tasks')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Tache</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./CommuneCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Commune</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./ArrondissementCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Arrondissment</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./QuartierCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Quartier</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./PosteCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Poste</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./StatutCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Statut</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./TypeCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./PaysCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Pays</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('PC-Profils')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Profil</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('HC-Habilitations')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Habilitation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('PHC-ProfilHabilitations')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Profil Habilitation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('PTC-Posts')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Post</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./EmmeteurCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Emmeteur</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('EC-Entreprises')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Entreprise</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('AC-Accomplissements')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Maitrise et Competence</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('RC-Realisations')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p  class="liens">Réalisation</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('TC-TypeDeParametres')}}" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Type de Paramètre</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="./UserCorbeilles" class="nav-link">
                                <i class="far fa-circle nav-icon msicons"></i>
                                <p class="liens">Users</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <hr style="background-color: rgb(250, 250, 255);">

                        <form action="{{route('logout')}}" method="POST">@csrf
                            <button type="submit" class="btn nav-link d-flex nav-link-heart">
                                <i class="nav-icon fas fa-power-off msicons"></i>
                            </button>
                        </form>

                    </li>
            </ul>
        </nav>
    </div>
</aside>
