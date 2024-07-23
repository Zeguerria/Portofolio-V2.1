{{-- MENU DEBUT --}}
<nav class="sidebar sidebar-offcanvas menus" id="sidebar">
    <ul class="nav">
    <li class="nav-item">
        <div class="d-flex sidebar-profile">
            @if (Route::has('login'))
                @auth
                @if(Auth::user()->photo !=null)
                <div class="sidebar-profile-image nav-link-heart">
                    <img src="{{asset(Auth::user()->le_profil)}}" alt="image">
                    <span class="sidebar-status-indicator"></span>
                </div>
                @else
                    <div class="sidebar-profile-image nav-link-heart as">
                        <img src="{{asset('admins/images/faces/face29.png')}}" alt="image">
                        <span class="sidebar-status-indicator"></span>
                    </div>
                @endif
                <div class="sidebar-profile-name">
                    <p class="sidebar-name nav-link-heart mas">
                        {{Auth::user()->name}}
                    </p><br>
                    <p class="sidebar-designation nav-link-heart mas">
                        Welcome
                    </p>
                </div>
            @else
            <div class="sidebar-profile-image nav-link-heart">
                <img src="{{asset('admins/images/faces/face29.png')}}" alt="image">
                <span class="sidebar-status-indicator"></span>
            </div>
            <div class="sidebar-profile-name">
                <p class="sidebar-name nav-link-heart mas">
                Kenneth Osborne
                </p>
                <p class="sidebar-designation Welcome mas">
                Welcome
                </p>
            </div>
                @endauth

            @endif

        </div>
        <div class="nav-search nav-link-heart">
        <div class="input-group ">
            <input type="text" class="form-control" placeholder="Type to search..." aria-label="search" aria-describedby="search">
            <div class="input-group-append">
            <span class="input-group-text" id="search">
                <i class="typcn typcn-zoom as"></i>
            </span>
            </div>
        </div>
        </div>
        {{-- <p class="sidebar-menu-title">Admin-DashBoard</p> --}}
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{route('HomeAdmin')}}">
        <i class="typcn typcn-home menu-icon as nav-link-heart"></i>
            <span class="menu-title nav-link-heart as">Home {{--<span class="badge badge-primary ml-3">New</span>--}}</span>
        </a>
    </li>


    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
        <i class="typcn typcn-tag menu-icon nav-link-heart as"></i>
        <span class="menu-title nav-link-heart as">Accomplissements</span>
        <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="charts">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item btnleft"> <a class="nav-link btnleft" href="{{route('A-Accomplissements')}}">Accomplissement</a></li>
        </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <i class="typcn typcn-document-text menu-icon  nav-link-heart as"></i>
            <span class="menu-title  nav-link-heart as">Entreprises</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link btnleft" href="{{route('E-Entreprises')}}">Entreprise</a></li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="typcn typcn-briefcase menu-icon"></i>
        <span class="menu-title">Paramètrages</span>
        <i class="typcn typcn-chevron-right menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('P-Parametres')}}">Paramètre</a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('T-TypeDeParametres')}}">Type de Paramètre</a></li>
            {{-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> --}}
        </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
        <i class="typcn typcn-film menu-icon"></i>
        <span class="menu-title">Réalisations</span>
        <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="form-elements">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"><a class="nav-link" href="{{route('R-Realisations')}}">Réalisation</a></li>
        </ul>
        </div>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
        <i class="typcn typcn-compass menu-icon"></i>
        <span class="menu-title">Icons</span>
        <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="icons">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Mdi icons</a></li>
        </ul>
        </div> --}}
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="typcn typcn-user-add-outline menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
        </ul>
        </div>
    </li> --}}
    <hr>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="typcn typcn-globe-outline menu-icon"></i>
        <span class="menu-title">Corbeilles</span>
        <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="{{route('AC-Accomplissements')}}">Accomplissement </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('EC-Entreprises')}}">Accomplissement </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('PC-Parametres')}}">Paramètre </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('RC-Realisations')}}">Réalisation </a></li>
            <li class="nav-item"> <a class="nav-link" href="{{route('TC-TypeDeParametres')}}">Type de Paramètre  </a></li>
        </ul>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="pages/documentation/documentation.html">
        <i class="typcn typcn-document-text menu-icon"></i>
        <span class="menu-title">Documentation</span>
        </a>
    </li>
    </ul>
    <ul class="sidebar-legend">
    <li>
        <p class="sidebar-menu-title">Category</p>
    </li>
    <li class="nav-item"><a href="#" class="nav-link">#Sales</a></li>
    <li class="nav-item"><a href="#" class="nav-link">#Marketing</a></li>
    <li class="nav-item"><a href="#" class="nav-link">#Growth</a></li>
    </ul>
</nav>
{{-- MENU FIN --}}
