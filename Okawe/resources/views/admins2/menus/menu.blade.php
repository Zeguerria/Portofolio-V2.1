<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Zeguerria->@yield('titre')</title>
    {{-- CHART JS DEBUT --}}
    <script src="{{asset('charts/chart.js')}}"></script>

    {{-- CHART JS FIN --}}
    <link href="{{asset('nouveauautres.style.css')}}" rel="stylesheet">
    <link href="{{asset('nouveauautres.animate.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">


    <!-- base:css -->


    <link rel="stylesheet" href="{{asset('admins/vendors/typicons.font/font/typicons.css')}}">
    <link rel="stylesheet" href="{{asset('admins/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('admins/css/vertical-layout-light/style.css')}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{asset('admins/images/favicon.png')}}" />
    <!-- plugin css for this page -->
  <link rel="stylesheet" href="{{asset('admins/vendors/select2/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('admins/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
  <!-- End plugin css for this page -->

    {{-- AOS LIENS DEBUT --}}
        <link rel="stylesheet" href="{{asset('portofolios/aos-master/dist/aos.css')}}" />
    {{-- AOS LIENS FIN --}}
    {{-- Tableau debut --}}
    <link rel="stylesheet" href="{{asset('admins/datas/dataTables.css')}}">
    <link rel="stylesheet" href="{{asset('admins/datas/buttons.dataTables.css')}}">


    <link rel="stylesheet" href="{{ asset('fontawsome/fontawesome-free-5.15.4-web/css/all.min.css') }}">
    <link rel="shortcut icon" href="{{asset('admins/images/favicon.png')}}" />
    {{-- MON CSS DEBUT --}}
        <style>
            .notification {
                position: fixed;
                top: 20px;
                right: 20px;
                background-color: #4CAF50;
                color: white;
                padding: 4px;
                border-radius: 5px;
                display: none;
            }

            .icon-card {
                cursor: pointer;
                text-align: center;
                border: 1px solid #ddd;
                padding: 10px;
                border-radius: 2px;
                transition: box-shadow 0.3s ease;
            }

            .icon-card:active {
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            }

            .icon-card:hover {
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
            }

        </style>
    {{-- MON CSS FIN --}}

    {{-- THEME DEBUT --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            /* LOgo */
            #logo, #logo1 {
            width: 40px; /* Ajustez la taille selon vos besoins */
            height: 40px; /* Assurez-vous que la hauteur et la largeur sont égales */
            border-radius: 50%; /* Cela rendra l'image circulaire */
            object-fit: cover; /* Assurez que l'image couvre bien le cadre circulaire */
        }
            /* CARD TOTAUX DEBUT */
            .cardtd {
                        border: 1px solid #d2d6de;
                        border-radius: 4px;
                        /* background-color: #fff; */
                        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.125);
                        margin-bottom: 20px;
                        padding: 10px;
                    }

                    .info-box-icon {
                        /* background: #f4f6f9; */
                        border-radius: 50%;
                        /* color: #666; */
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 60px;
                        width: 60px;
                        margin: 0 auto; /* Centrer horizontalement */
                    }

                    .info-box-content {
                        padding: 10px;
                    }

                    .info-box-text {
                        font-size: 18px;
                        font-weight: bold;
                        /* color: #333; */
                    }

                    .info-box-number {
                        font-size: 24px;
                        font-weight: bold;
                        /* color: #007bff; */
                    }
            /* CARD TOTAUX FIN */
            /* Annimation de battement de coeur */
                .nav-link-heart {
                    position: relative;
                    display: inline-block;
                }
                .nav-link-heart {
                    position: relative;
                    display: inline-block;
                    transition: transform 0.3s ease; /* Ajoutez cette ligne pour une transition fluide */
                }
                .nav-link-heart:hover {
                    transform: scale(1.1); /* Ajustez cette valeur selon vos besoins */
                }

                @keyframes heartbeat {
                    0% {
                        transform: scale(1);
                    }
                    50% {
                        transform: scale(1.1);
                    }
                    100% {
                        transform: scale(1);
                    }
                }
            /* Styles communs */
                body {
                    transition: background-color 0.3s, color 0.3s;
                }
            /* MODE CLAIR DEBUT */

            /* Thème clair */
                body.light-mode {
                    background-color: #ffffff;
                    color: #000000;
                }
                body.light-mode .mdl {
                    background-color: #ffffff;
                    color: #000000;
                }
                body.light-mode .headers {
                    background: linear-gradient(to right, #fefefe, #e0e0e0, #b0b0b0, #6a6a6a);
                }
                body.light-mode .themes{
                    color: #EAF6FF;

                }
                body.light-mode .as{
                    color: #12232E;

                }
                body.light-mode .menus{
                    background: linear-gradient(to bottom, #fefefe, #e0e0e0, #b0b0b0, #6a6a6a);


                }
                body.light-mode .mas{
                    color: #12232E;

                }
                body.light-mode .mesicon{
                    color: #12232E;
                }

                body.light-mode .entete{
                    color: #12232E;
                    font-family: 'Montserrat', sans-serif;
                     font-weight: 700;
                     display: flex;
                    align-items: center;
                    /* margin: 20px; */
                }
                body.light-mode .date{
                    color: #12232E;
                    font-weight: 400;
                    display: flex;
                    align-items: center;
                }
                body.light-mode .naventete{
                    display: flex;
                    font-weight: 400;
                    align-items: center;
                }
                body.light-mode .navhome{
                    color: #12232E;
                    text-decoration: none;
                }
                body.light-mode .navhomeb{
                    color: #12232E;
                }
                body.light-mode .btnleft{
                    color: #12232E;
                }
                body.light-mode .navhomet{
                    color: #12232E;
                }
                body.light-mode .bntplus{
                    /* color: #12232E; */
                    font-size: 30px;
                    color:#7bff00;
                }
            /* MODE CLAIR FIN */

            /* MODE SOMBRE DEBUT */

            /* Thème sombre */
                body.dark-mode {
                    background-color: #1a1a1a;
                    color: #cccccc;
                }
                body.dark-mode .mdl {
                    background-color: #1a1a1a;
                    color: #cccccc;
                }
                body.dark-mode .headers {
                    background: linear-gradient(to right, #12232E, #1B3B4B, #265367, #4A7396);
                }
                body.dark-mode .themes{
                    color: #f5e609;
                }
                body.dark-mode .as{
                    color: #e0e0e0;
                }
                body.dark-mode .menus{
                    background: linear-gradient(to bottom, #12232E, #1B3B4B, #265367, #4A7396);

                }
                 body.dark-mode .as{
                    color: #e0e0e0;
                }

                body.dark-mode .mesicons{
                    color: #1B3B4B;
                }
                body.dark-mode .entete{
                    color: red;
                    font-family: 'Montserrat', sans-serif;
                     font-weight: 700;
                     display: flex;
                    align-items: center;
                    /* margin: 20px; */
                }
                body.dark-mode .date{
                    color: #e0e0e0;
                    font-weight: 400;
                    display: flex;
                    align-items: center;

                }
                body.dark-mode .naventete{
                    display: flex;
                    font-weight: 400;
                    align-items: center;

                }
                body.dark-mode .navhome{
                    color: #e0e0e0;
                    text-decoration: none;

                }
                body.dark-mode .navhomeb, .btnleft{
                    color: #e0e0e0;

                }
                body.dark-mode .navhomet{
                    color: red;

                }
                body.dark-mode .bntplus{
                    font-size: 30px;
                    color:#1b8700;

                }


            /* MODE SOMBRE DEBUT */
            /* Styles par défaut pour l'image */
                .entete img {
                    width: 50px;
                    height: 50px;
                    transition: width 0.3s ease, height 0.3s ease;
                }

                /* Media query pour les tablettes */
                @media (max-width: 768px) {
                    .entete {
                        padding-top: 2px;
                        font-size: 1.2em; /* Ajuste la taille du texte */
                    }
                    .date,.naventete {
                        font-size: 1em; /* Ajuste la taille du texte */
                    }


                    .entete img {
                        width: 40px;
                        height: 40px;
                    }
                }

                /* Media query pour les téléphones */
                @media (max-width: 480px) {
                    .entete {
                        font-size: 1em; /* Ajuste encore la taille du texte */
                    }
                    .date,.naventete {
                        padding-top: 2px;
                        font-size: 0.8em; /* Ajuste encore la taille du texte */
                    }

                    .entete img {
                        width: 30px;
                        height: 30px;
                    }
                }

                /* Media query pour les petits téléphones */
                    @media (max-width: 320px) {
                        .entete {
                            font-size: 0.9em; /* Ajuste encore la taille du texte */
                        }
                        .date, .naventete {
                            padding-top: 2px;
                            font-size: 0.7em; /* Ajuste encore la taille du texte */
                        }

                        .entete img {
                            width: 25px;
                            height: 25px;
                        }
                    }


        </style>
    {{-- THEME FIN --}}

    @yield('header')
  </head>
  <body data-user-theme="{{ Auth::user()->theme ?? '' }}">
    {{-- <div class="row" id="proBanner">
      <div class="col-12">
        <span class="d-flex align-items-center purchase-popup">
          <p>Get tons of UI components, Plugins, multiple layouts, 20+ sample pages, and more!</p>
          <a href="https://www.bootstrapdash.com/product/celestial-admin-template/?utm_source=organic&utm_medium=banner&utm_campaign=free-preview" target="_blank" class="btn download-button purchase-button ml-auto">Upgrade To Pro</a>
          <i class="typcn typcn-delete-outline" id="bannerClose"></i>
        </span>
      </div>
    </div> --}}

    <div class="container-scroller principal">
        <!-- partial:partials/_navbar.html -->
        {{-- HEADER DEBUT --}}
            @include('admins.menus._menus.header')

        {{-- HEADER FIN --}}

      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
          <div id="settings-trigger"><i class="typcn typcn-cog-outline"></i></div>
          <div id="theme-settings" class="settings-panel">
            <i class="settings-close typcn typcn-delete-outline"></i>
            <p class="settings-heading">SIDEBAR SKINS</p>
            <div class="sidebar-bg-options" id="sidebar-light-theme">
              <div class="img-ss rounded-circle bg-light border mr-3"></div>
              Light
            </div>
            <div class="sidebar-bg-options selected" id="sidebar-dark-theme">
              <div class="img-ss rounded-circle bg-dark border mr-3"></div>
              Dark
            </div>
            <p class="settings-heading mt-2">HEADER SKINS</p>
            <div class="color-tiles mx-0 px-4">
              <div class="tiles success"></div>
              <div class="tiles warning"></div>
              <div class="tiles danger"></div>
              <div class="tiles primary"></div>
              <div class="tiles info"></div>
              <div class="tiles dark"></div>
              <div class="tiles default border"></div>
            </div>
          </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
            {{-- MENUS DEBUT --}}
                @include('admins.menus._menus.menu')
            {{-- MENUS FIN --}}
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                @yield('corps')
            </div>
            {{-- FOOTER DEBUT --}}
                @include('admins.menus._menus.footer')
            {{-- FOOTER FIN --}}

        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- base:js -->
    <script src="{{asset('admins/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="{{asset('admins/js/off-canvas.js')}}"></script>
    <script src="{{asset('admins/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('admins/js/template.js')}}"></script>
    <script src="{{asset('admins/js/settings.js')}}"></script>
    <script src="{{asset('admins/js/todolist.js')}}"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{asset('admins/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('admins/vendors/chart.js/Chart.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('admins/js/dashboard.js')}}"></script>
    <!-- End custom js for this page-->
    <!-- plugin js for this page -->
    <script src="{{asset('admins/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <script src="{{asset('admins/vendors/select2/select2.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- Custom js for this page-->
    <script src="{{asset('admins/js/file-upload.js')}}"></script>
    <script src="{{asset('admins/js/typeahead.js')}}"></script>
    <script src="{{asset('admins/js/select2.js')}}"></script>
    <!-- End custom js for this page-->
    {{-- JQUERY DEBUT --}}
        <script src="{{asset('jquery/jqury.js')}}"></script>
    {{-- JQUERY FIN --}}

    {{-- OUVRIR/FERMER OPTION DES CARD DEBUT --}}
        <script>
            // Exécuter le script lorsque le DOM est chargé
            document.addEventListener('DOMContentLoaded', function() {
                // Cacher les éléments avec la classe 'sumenu' au chargement de la page
                $('.sumenu').hide();
                // Gérer le clic sur les éléments avec les ID 'A' et 'T'
                $('#A, #T').on('click', function (){
                    $(".sumenu").fadeToggle();
                });
            });
        </script>
    {{-- OUVRIR/FERMER OPTION DES CARD FIN --}}
    {{-- TABLEAU DEBUT --}}
        <script src="{{asset('admins/datas/dataTables.js')}}"></script>
        <script src="{{asset('admins/datas/dataTables.buttons.js')}}"></script>
        <script src="{{asset('admins/datas/buttons.dataTables.js')}}"></script>
        <script src="{{asset('admins/datas/jszip.min.js')}}"></script>
        <script src="{{asset('admins/datas/pdfmake.min.js')}}"></script>
        <script src="{{asset('admins/datas/vfs_fonts.js')}}"></script>
        <script src="{{asset('admins/datas/buttons.html5.js')}}"></script>
        <script>
            $('#example').DataTable({
                layout: {
                    topStart: {
                        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5']
                    }
                }
            });
        </script>
    {{-- TABLEAU FIN --}}
    {{-- HEURES ET DATES DEBUT --}}
        <script>
            // Fonction pour formater l'heure sur 24 heures
            function formatTime(date) {
                const hour = String(date.getHours()).padStart(2, '0'); // Ajoute un zéro devant si nécessaire
                const minute = String(date.getMinutes()).padStart(2, '0');
                const second = String(date.getSeconds()).padStart(2, '0');
                return `${hour}:${minute}:${second}`;
            }

            // Fonction pour formater la date
            function formatDate(date) {
                const day = String(date.getDate()).padStart(2, '0'); // Ajoute un zéro devant si nécessaire
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Les mois commencent à 0, donc on ajoute 1
                const year = date.getFullYear();
                return `${day}/${month}/${year}`;
            }

            // Obtenir la date et l'heure actuelles avec le décalage horaire du Gabon (UTC+1)
            function getCurrentDateTimeInGabon() {
                const currentTime = new Date();
                const utcOffset = currentTime.getTimezoneOffset() / 60; // Convertir le décalage horaire en heures
                const gabonTime = new Date(currentTime.getTime() + (utcOffset + 1) * 60 * 60 * 1000); // Ajouter l'offset du Gabon (1 heure)
                return gabonTime;
            }

            // Fonction pour mettre à jour la date et l'heure toutes les secondes
            function updateDateTime() {
                const gabonDateTime = getCurrentDateTimeInGabon();
                document.getElementById('currentDateTime').textContent = `Date et heure : ${formatDate(gabonDateTime)} ${formatTime(gabonDateTime)}`;
            }

            // Mettre à jour la date et l'heure initiales
            updateDateTime();

            // Mettre à jour la date et l'heure toutes les secondes
            setInterval(updateDateTime, 1000);
        </script>
    {{-- HEURES ET DATES FIN --}}
    <script src="{{asset('portofolios/aos-master/dist/aos.js')}}"></script>

    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
        // TOOLTIP
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        AOS.init();
    </script>



    {{-- THEME DEBUT --}}
        {{-- <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toggleButton = document.getElementById('mode-toggle');
                const icon = document.getElementById('icon');

                // Fetch the user's theme
                fetch('/user-theme')
                    .then(response => response.json())
                    .then(data => {
                        const userTheme = data.theme;
                        document.body.classList.add(userTheme);

                        // Set icon based on initial theme
                        if (userTheme === 'dark-mode') {
                            icon.classList.add('fa-sun');
                            icon.classList.remove('fa-moon');
                        } else {
                            icon.classList.add('fa-moon');
                            icon.classList.remove('fa-sun');
                        }
                    })
                    .catch(error => console.error('Erreur lors de la récupération du thème de l\'utilisateur', error));

                toggleButton.addEventListener('click', function () {
                    let newTheme;

                    if (document.body.classList.contains('light-mode')) {
                        document.body.classList.replace('light-mode', 'dark-mode');
                        newTheme = 'dark-mode';
                    } else {
                        document.body.classList.replace('dark-mode', 'light-mode');
                        newTheme = 'light-mode';
                    }

                    // Set icon based on new theme
                    if (newTheme === 'dark-mode') {
                        icon.classList.add('fa-sun');
                        icon.classList.remove('fa-moon');
                    } else {
                        icon.classList.add('fa-moon');
                        icon.classList.remove('fa-sun');
                    }

                    // Save new theme to localStorage
                    localStorage.setItem('theme', newTheme);

                    // If the user is authenticated, update the theme on the server
                    fetch('/update-theme', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ theme: newTheme })
                    }).then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error('Erreur lors de la mise à jour du thème', error));
                });
            });
        </script> --}}
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const toggleButton = document.getElementById('mode-toggle');
                const icon = document.getElementById('icon');
                const logo = document.getElementById('logo');
                const logo1 = document.getElementById('logo1');

                // Function to update the logos based on theme
                function updateLogos(theme) {
                    if (theme === 'dark-mode') {
                        logo.src = '/glbal/theme/lnb.png';
                        logo1.src = '/glbal/theme/lnb.png';
                    } else {
                        logo.src = '/glbal/theme/lnn.png';
                        logo1.src = '/glbal/theme/lnn.png';
                    }
                }

                // Fetch the user's theme
                fetch('/user-theme')
                    .then(response => response.json())
                    .then(data => {
                        const userTheme = data.theme;
                        document.body.classList.add(userTheme);
                        updateLogos(userTheme);

                        // Set icon based on initial theme
                        if (userTheme === 'dark-mode') {
                            icon.classList.add('fa-sun');
                            icon.classList.remove('fa-moon');
                        } else {
                            icon.classList.add('fa-moon');
                            icon.classList.remove('fa-sun');
                        }
                    })
                    .catch(error => console.error('Erreur lors de la récupération du thème de l\'utilisateur', error));

                toggleButton.addEventListener('click', function () {
                    let newTheme;

                    if (document.body.classList.contains('light-mode')) {
                        document.body.classList.replace('light-mode', 'dark-mode');
                        newTheme = 'dark-mode';
                    } else {
                        document.body.classList.replace('dark-mode', 'light-mode');
                        newTheme = 'light-mode';
                    }

                    // Update the logos based on new theme
                    updateLogos(newTheme);

                    // Set icon based on new theme
                    if (newTheme === 'dark-mode') {
                        icon.classList.add('fa-sun');
                        icon.classList.remove('fa-moon');
                    } else {
                        icon.classList.add('fa-moon');
                        icon.classList.remove('fa-sun');
                    }

                    // Save new theme to localStorage
                    localStorage.setItem('theme', newTheme);

                    // If the user is authenticated, update the theme on the server
                    fetch('/update-theme', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({ theme: newTheme })
                    }).then(response => response.json())
                    .then(data => console.log(data))
                    .catch(error => console.error('Erreur lors de la mise à jour du thème', error));
                });
            });
        </script>
    {{-- THEME FIN --}}
    <script src="{{ mix('js/app.js') }}"></script>


    @include('sweetalert::alert')
    @yield('footer')
  </body>
</html>
