
<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div > <!-- Suppression de la classe 'di' -->
        <div class="sidenav-header d-flex justify-content-center align-items-center" id="sidenavHeader">
            <!-- Contenu du sidenav-header pour les grands écrans -->
            <a id="toggleMenuButton" class="navbar-brand m-0" href="#">
                <span id="menuIcon" class="menu-icon">☰</span> <!-- Icône de fermeture au départ -->
                <span id="openIcon" class="open-icon">X</span> <!-- Icône hamburger -->
                <span id="menuText" class="ms-1 font-weight-bold" data-state="open">X Fermer</span> <!-- "X Fermer" au départ -->
            </a>

        </div>
        <hr class="horizontal dark mt-0">
        <div class="sidenav-content">
            <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">

                <ul class="navbar-nav">
                      <!-- Bouton pour fermer le menu en petit écran -->
                      <div class="d-flex justify-content-end p-1">

                            <button id="closeMenuButton" class="btn d-xl-none">x</button>

                      </div>
                    <li class="nav-item">
                        <a class="nav-link active" href="./home">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-shop text-primary text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Home</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" id="tablesDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                                <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                            </div>
                            <span class="nav-link-text ms-1">Parametrages&ensp;</span>
                        </a>
                        <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="tablesDropdown">
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="./Categories">
                                    Categorie
                                </a>
                            </li>
                            <li class="mb-2">
                                <a class="dropdown-item border-radius-md" href="./Parametres">
                                    Parametre
                                </a>
                            </li>
                            <li>
                                <a class="dropdown-item border-radius-md" href="./TypeParametres">
                                    Type de Parametre
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- Autres éléments de menu -->
                </ul>
            </div>
        </div>
    </div>
</aside>

{{-- MENU FIN --}}
{{-- SCRIPT POUR LE _MENU / OUVERTURE:FERMETURE ET PETIT ECRAN DEBUT --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Récupérer l'état du menu depuis la session actuelle du navigateur
            var isMenuCollapsed = sessionStorage.getItem('isCollapsed');
            if (isMenuCollapsed === 'true') {
                var sideNav = document.getElementById('sidenav-main');
                var toggleMenuButton = document.getElementById('toggleMenuButton');
                var menuText = document.getElementById('menuText');
                // Rétracter le menu si nécessaire
                sideNav.classList.add('collapsed');
                toggleMenuButton.classList.add('collapsed');
                menuText.textContent = '☰ Ouvrir';
                menuText.setAttribute('data-state', 'open');
            }
        });

        // Sélectionnez le bouton de basculement du menu et la barre latérale
        var toggleMenuButton = document.getElementById('toggleMenuButton');
        var sideNav = document.getElementById('sidenav-main');
        var menuText = document.getElementById('menuText');

        // Ajoutez un gestionnaire d'événements pour le clic sur le bouton de basculement
        toggleMenuButton.addEventListener('click', function(event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            // Vérifiez si la barre latérale est actuellement rétractée
            if (sideNav.classList.contains('collapsed')) {
                // Si la barre latérale est rétractée, l'agrandir
                sideNav.classList.remove('collapsed');
                toggleMenuButton.classList.remove('collapsed');
                // Changer le texte du bouton en "Fermer"
                menuText.textContent = 'X Fermer';
                menuText.setAttribute('data-state', 'close'); // Mettre à jour l'attribut data-state
                // Enregistrer l'état du menu dans la session actuelle du navigateur
                sessionStorage.setItem('isCollapsed', 'false');
            } else {
                // Si la barre latérale est déjà étendue, la rétracter
                sideNav.classList.add('collapsed');
                toggleMenuButton.classList.add('collapsed');
                // Changer le texte du bouton en "Ouvrir"
                menuText.textContent = 'Ouvrir';
                menuText.setAttribute('data-state', 'open'); // Mettre à jour l'attribut data-state
                // Enregistrer l'état du menu dans la session actuelle du navigateur
                sessionStorage.setItem('isCollapsed', 'true');
            }
        });


        // Sélectionner le sidenav-header
        var sidenavHeader = document.getElementById('sidenavHeader');

        // Vérifier la taille de l'écran lors du chargement de la page
        window.addEventListener('load', function() {
            if (window.innerWidth <=768) {
                // Si l'écran est petit, vider le contenu du sidenav-header
                sidenavHeader.innerHTML = '<li class="nav-item d-xl-none ps-3 d-flex align-items-center"><a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav"><div class="sidenav-toggler-inner"><i class="sidenav-toggler-line bg-white"></i><i class="sidenav-toggler-line bg-white"></i><i class="sidenav-toggler-line bg-white"></i></div></a></li>';
            }
        });

        // Vérifier la taille de l'écran lors du redimensionnement
        window.addEventListener('resize', function() {
            if (window.innerWidth <=768) {
                // Si l'écran est petit, vider le contenu du sidenav-header
                sidenavHeader.innerHTML = '<li class="nav-item d-xl-none ps-3 d-flex align-items-center"><a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav"><div class="sidenav-toggler-inner"><i class="sidenav-toggler-line bg-white"></i><i class="sidenav-toggler-line bg-white"></i><i class="sidenav-toggler-line bg-white"></i></div></a></li>';
            } else {
                // Sinon, restaurer le contenu initial du sidenav-header pour les grands écrans
                sidenavHeader.innerHTML = '<a id="toggleMenuButton" class="navbar-brand m-0" href="#"><span id="menuIcon" class="menu-icon">☰</span><span id="openIcon" class="open-icon">X</span><span id="menuText" class="ms-1 font-weight-bold" data-state="open">X Fermer</span></a>';
            }
        });
        // Sélectionner le bouton de fermeture du menu
        var closeMenuButton = document.getElementById('closeMenuButton');
        // Ajouter un gestionnaire d'événements pour le clic sur le bouton de fermeture du menu
        closeMenuButton.addEventListener('click', function() {
            // Sélectionner le sidenav-main et le toggleMenuButton
            var sideNav = document.getElementById('sidenav-main');
            var toggleMenuButton = document.getElementById('toggleMenuButton');

            // Si le sidenav-main est rétracté, l'agrandir
            if (sideNav.classList.contains('collapsed')) {
                sideNav.classList.remove('collapsed');
                toggleMenuButton.classList.remove('collapsed');
            }
        });

    </script>
{{-- SCRIPT POUR LE _MENU / OUVERTURE:FERMETURE ET PETIT ECRAN FIN --}}






