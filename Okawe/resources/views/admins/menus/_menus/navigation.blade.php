<nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav d-flex justify-content-center">
        <li class="nav-item">
            <a  class="nav-link nav-link-heart " data-widget="pushmenu" href="#" role="button" id="monicon" ><i  class="fas fa-bars "></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block monicon">
            <a href="{{route('HomeAdmin')}}" class="nav-link  nav-link-heart "  id="monicon">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block monicon">
            <a href="{{route('Portofolio')}}" class="nav-link  nav-link-heart" id="monicon">Portofolio</a>
        </li>
    </ul>
    <!-- Right navbar links ui -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <a class="nav-link nav-link-heart" data-widget="navbar-search" href="#" role="button" id="monicon">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
            <form class="form-inline" action="" method="GET">
                <div class="input-group input-gruop-sm">
                <input class="form-control form-control-navbar serch" type="search" name="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
            </form>
            </div>
        </li>
        <li class="nav-item">
            <a class="btn nav-link " href="#" id="mode-toggle" style="font-size: 16px; font-family : 'Arial';">
                <i id="icon" class=" fas nav-link-heart" ></i>
            </a>

          </li>
        <li class="nav-item">
            @if (Route::has('login'))
                @auth
                    <a class="nav-link nav-link-heart" id="profil" href="#" id="monicon">
                        <span class="">
                            @if(Auth::user()->photo !=null)
                                <img src="{{asset(Auth::user()->le_profil)}}" alt="{{asset(Auth::user()->le_profil)}}" class="img img-circle" width="30" height="30">
                            @else
                                <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-circle" width="30" height="30">
                            @endif
                        </span>

                    </a>
                @else
                    <a class="nav-link" id="profil" href="#" id="monicon">
                        <span class="">
                            <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-circle" width="30" height="30">
                        </span>
                    </a>
                @endauth
            @endif
        </li>
        <div class=" mprofil dropdown-menu dropdown-menu-right dropdown-menu-icon-list ">
            <a class="dropdown-item" href="./monprofil" id="monicon"><i class="fa fa-user " ></i>&ensp; Profil</a>
            <a class="dropdown-item" href="./aide" id="monicon"><i class="fa fa-lightbulb"></i>&ensp;  Help</a>

            <form action="{{route('logout')}}" method="POST">
                @csrf

                <button class="dropdown-item btn" type="submit" id="monicon"><i class="fa fa-sign-out-alt "></i>&ensp; Log Out</button>
            </form>
        </div>

        <li class="nav-item dropdown">
            @if (Route::has('login'))
            @auth
                    @if(Auth::user()->profil_id == 3 || Auth::user()->profil_id == 2)
                        <div>
                            <a class="nav-link nav-link-heart" data-toggle="dropdown" href="#" id="monicon">
                                <i class="far fa-comments"></i>
                                @if($notifications->count() > 0)
                                    <span class="badge badge-danger navbar-badge">{{ $notifications->count() }}</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                @forelse ($notifications as $notification)
                                    <div class="dropdown-item-wrapper p-2">
                                        <div class="media">
                                            <img src="{{ $notification->data['comment_photo'] ?? asset('/glbal/autres/images.png') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                            <div class="media-body">
                                                <h3 class="dropdown-item-title">
                                                    <button type="button" class="btn p-0 m-0 align-baseline repondre" data-bs-toggle="tooltip" data-placement="bottom" title="Répondre" data-toggle="modal" data-target="#repondre{{ $notification->id }}">
                                                        {{ $notification->data['comment_name'] ?? 'N/A' }} {{ $notification->data['comment_prenom'] ?? 'N/A' }}
                                                    </button>
                                                    <span class="float-right text-sm text-danger">
                                                        <form action="{{ route('admin.notifications.read', $notification->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('PUT')
                                                            <button type="submit" class="btn repondre p-0 m-0 align-baseline" data-bs-toggle="tooltip" data-placement="left" title="marquer comme vu">
                                                                <i class="fas fa-star"></i>
                                                            </button>
                                                        </form>
                                                    </span>
                                                </h3>
                                                <p class="text-sm message">{{ Str::limit($notification->data['comment_body'] ?? 'No content', 30) }}</p>
                                                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> {{ $notification->created_at->diffForHumans() }}</p>
                                            </div>
                                        </div>
                                    </div>

                                @empty
                                    <div class="dropdown-item">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-sm">Pas de nouvelles notifications</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforelse
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">Voir tous les commentaires</a>
                            </div>
                        </div>
                    @else
                        <div>
                            <a class="nav-link nav-link-heart" data-toggle="dropdown" href="#" style="font-size: 16px; color: #000; font-family: 'Arial';">
                                <i class="far fa-comments"></i>
                                <span class="badge badge-danger navbar-badge">0</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <div class="media">
                                    <div class="media-body">
                                        <p class="text-sm p-4">Vous n'avez pas le droit de gérer les commentaires</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                    <div>
                        <a class="nav-link nav-link-heart" data-toggle="dropdown" href="#" style="font-size: 16px; color: #000; font-family: 'Arial';">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge">0</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-sm p-4">Pas de nouvelles notifications</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            @endif

        </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
            <a class="nav-link nav-link-heart" data-toggle="dropdown" href="#" id="monicon">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" >
                <i class="fas fa-envelope mr-2"></i> 4 new messages
                <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 8 friend requests
                <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
                <i class="fas fa-file mr-2"></i> 3 new reports
                <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      {{-- <li class="nav-item">
        <a class="nav-link nav-link-heart" data-widget="fullscreen" href="#" role="button" id="monicon">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li> --}}
    </ul>
</nav>
