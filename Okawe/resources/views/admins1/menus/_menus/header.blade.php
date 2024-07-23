<style>
    /* CSS */
        #backgroundDiv {
            background-size: cover; /* Pour que l'image de fond couvre toute la div */
            background-repeat: no-repeat; /* Pour éviter la répétition de l'image de fond */
        }







        .mprofil {
            position: absolute;
            top: 100%; /*Affiche le menu déroulant juste en dessous du bouton*/
            /* left: 0; */
            z-index: 1000;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
            display: none; /* Cache le menu déroulant par défaut */
        }

        /* Style pour afficher le menu déroulant au survol */
        #profil:hover .mprofil {
            display: block;
        }


</style>
<div class="" >
    <div class="" >
        <div class="">
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                <div class="container-fluid py-1 px-3" >
                  {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                      <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                      <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder text-white mb-0">Dashboard</h6>
                  </nav> --}}
                  <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                      <div class="input-group">
                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" placeholder="Type here...">
                      </div>
                    </div>&ensp;

                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                              <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                                <i class="sidenav-toggler-line bg-white"></i>
                              </div>
                            </a>
                          </li>&ensp;
                        <!-- Votre style pour le menu déroulant -->
                        <li class="nav-item d-flex align-items-center">
                            <a id="profil" href="#" class="nav-link text-white font-weight-bold px-0">
                                <img src="{{asset('admins/assets/img/curved-images/curved-6.jpg')}}" alt="user" class="img img-circle rounded-circle" width="30" height="30">
                                <span class="d-sm-inline d-none bg-color1">Okawe Jeremy</span>
                            </a>
                            <div class=" mprofil dropdown-menu dropdown-menu-right dropdown-menu-icon-list ">
                                <a class="dropdown-item" href="./profilAdmin" style="color: var(--titre-couleur); font-family: italic;"><i class="fa fa-user msicons"></i>&ensp; Profil</a>
                                <a class="dropdown-item" href="./help" style="color: var(--titre-couleur); font-family: italic;"><i class="fa fa-lightbulb msicons"></i>&ensp;  Help</a>
                                @csrf
                                <!-- Utilisation d'un lien pour soumettre le formulaire -->
                                <a href="#" class="dropdown-item" id="logoutLink" style="color: var(--titre-couleur); font-family: italic;">
                                    <i class="fa fa-sign-out-alt msicons"></i>&ensp; Log Out
                                </a>
                            </div>
                        </li>

                        <!-- Bouton de basculement du mode sombre/clair -->
                        &ensp;
                        <li class="nav-item d-flex align-items-center">
                            <a href="javascript:;" id="modeToggle" class="nav-link text-white p-0">
                                <i id="moonIcon" class="fas fa-moon"></i>
                            </a>
                        </li>

                        <!-- Bouton de notification -->
                        &ensp;
                        <li class="nav-item dropdown pe-2 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fa fa-bell cursor-pointer"></i>
                            </a>
                            <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
                              <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                  <div class="d-flex py-1">
                                    <div class="my-auto">
                                      <img src="./assets/img/team-2.jpg" class="avatar avatar-sm  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">New message</span> from Laur
                                      </h6>
                                      <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        13 minutes ago
                                      </p>
                                    </div>
                                  </div>
                                </a>
                              </li>
                              <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                  <div class="d-flex py-1">
                                    <div class="my-auto">
                                      <img src="./assets/img/small-logos/logo-spotify.svg" class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="text-sm font-weight-normal mb-1">
                                        <span class="font-weight-bold">New album</span> by Travis Scott
                                      </h6>
                                      <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        1 day
                                      </p>
                                    </div>
                                  </div>
                                </a>
                              </li>
                              <li>
                                <a class="dropdown-item border-radius-md" href="javascript:;">
                                  <div class="d-flex py-1">
                                    <div class="avatar avatar-sm bg-gradient-secondary  me-3  my-auto">
                                      <svg width="12px" height="12px" viewBox="0 0 43 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <title>credit-card</title>
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                          <g transform="translate(-2169.000000, -745.000000)" fill="#FFFFFF" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                              <g transform="translate(453.000000, 454.000000)">
                                                <path class="color-background" d="M43,10.7482083 L43,3.58333333 C43,1.60354167 41.3964583,0 39.4166667,0 L3.58333333,0 C1.60354167,0 0,1.60354167 0,3.58333333 L0,10.7482083 L43,10.7482083 Z" opacity="0.593633743"></path>
                                                <path class="color-background" d="M0,16.125 L0,32.25 C0,34.2297917 1.60354167,35.8333333 3.58333333,35.8333333 L39.4166667,35.8333333 C41.3964583,35.8333333 43,34.2297917 43,32.25 L43,16.125 L0,16.125 Z M19.7083333,26.875 L7.16666667,26.875 L7.16666667,23.2916667 L19.7083333,23.2916667 L19.7083333,26.875 Z M35.8333333,26.875 L28.6666667,26.875 L28.6666667,23.2916667 L35.8333333,23.2916667 L35.8333333,26.875 Z"></path>
                                              </g>
                                            </g>
                                          </g>
                                        </g>
                                      </svg>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                      <h6 class="text-sm font-weight-normal mb-1">
                                        Payment successfully completed
                                      </h6>
                                      <p class="text-xs text-secondary mb-0">
                                        <i class="fa fa-clock me-1"></i>
                                        2 days
                                      </p>
                                    </div>
                                  </div>
                                </a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </nav>

        </div>
    </div>
</div>
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const modeToggle = document.getElementById('modeToggle'); // Sélectionnez le bouton de basculement du mode
    const moonIcon = document.getElementById('moonIcon'); // Sélectionnez l'icône moon
    const backgroundDiv = document.getElementById('backgroundDiv'); // Sélectionnez le div contenant l'image de fond

    // Vérifiez si l'utilisateur a déjà choisi un mode sombre ou clair précédemment
    const isDarkMode = localStorage.getItem('darkMode') === 'true';

    // Chemin de l'image de fond par défaut en fonction du mode choisi
    const defaultBackgroundImage = isDarkMode ? "{{ asset('glbal/theme/t-1-dark.jpg') }}" : "{{ asset('glbal/theme/t-1-light.png') }}";

    // Chemin de l'icône du thème par défaut en fonction du mode choisi
    const defaultIcon = isDarkMode ? "fa-sun" : "fa-moon";

    // Définir l'image de fond par défaut
    backgroundDiv.style.backgroundImage = `url(${defaultBackgroundImage})`;

    // Définir l'icône du thème par défaut
    moonIcon.classList.add(defaultIcon);

    // Ajoutez un gestionnaire d'événements au clic sur le bouton de basculement du mode
    modeToggle.addEventListener('click', function() {
        const isDarkMode = document.body.classList.toggle('dark-mode'); // Basculer entre les modes sombre et clair

        // Enregistrez l'état du mode choisi par l'utilisateur dans le stockage local
        localStorage.setItem('darkMode', isDarkMode);

        // Vérifiez quelle classe est actuellement appliquée à l'icône
        if (moonIcon.classList.contains('fa-moon')) {
            // Si l'icône est en mode sombre (moon), changez-la en mode clair (sun)
            moonIcon.classList.remove('fa-moon');
            moonIcon.classList.add('fa-sun');
            backgroundDiv.style.backgroundImage = `url({{ asset('glbal/theme/t-1-dark.jpg') }})`;
        } else {
            // Sinon, l'icône est en mode clair (sun), changez-la en mode sombre (moon)
            moonIcon.classList.remove('fa-sun');
            moonIcon.classList.add('fa-moon');
            backgroundDiv.style.backgroundImage = `url({{ asset('glbal/theme/t-1-light.png') }})`;
        }
    });
});


</script>
