@extends('admins.menus.menu')
@section('titre')
    Acceuil
@endsection
@section('header')
<style>
    .chart-container {
        width: 100%;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }
</style>

@endsection
@section('corps')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->

        <div class="content-header p-1" >
            <div class="content-header p-3 pb-5">
                <div class="col-md-12 col-lg-12 moncard entete"  >
                    <div class="title pt-2">
                        <h4 class="mb-0 bread entete animate__animated animate__bounceInDown" >
                            <img src="{{asset('glbal/icon/home.gif')}}" alt="" class="img img-circle" width="50" height="50" style="border-radius: 50%;">
                            &ensp;Acceuil
                        </h4>

                    </div>
                    <nav aria-label="breadcrumb" role="navigation" class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                        <div class="d-flex align-items-center mb-2 mb-md-0"> <!-- Utilisation de classes flex pour aligner horizontalement sur les petits écrans et verticalement sur les grands écrans -->
                            <span id="currentDateTime" class="date"></span> <!-- Élément pour afficher la date et l'heure -->
                        </div>
                        <ol class="breadcrumb naventete">
                            <li class="breadcrumb-item navhome nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Acceuil"><a href="{{route('HomeAdmin')}}" >Home</a></li>
                            {{-- <li class="breadcrumb-item active navhomeb" aria-current="page" >Accomplissements</li> --}}
                            {{-- <li class="breadcrumb-item active navhomet animate__animated animate__bounceInUp" aria-current="page" >Maitrise & Comptence</li> --}}
                        </ol>
                    </nav>




                </div>
            </div>
        </div>


        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                {{-- bievenu uitlisateur debut  --}}
                    <section class="section-2  p-2">
                        {{-- ANIMATION FADE UP DEBUT --}}
                            <div data-aos="fade-up">
                                <div class="card cardt pb ">
                                    <div class="card-body">
                                        <div class=" ">
                                            <div class="card-box pd-10 height-100 mb-10 " >
                                                <div class="row align-items-center" >
                                                    <div class="col-md-2">
                                                        @if (Route::has('login'))
                                                            @auth
                                                                @if(Auth::user()->photo !=null)
                                                                    <img src="{{asset(Auth::user()->le_profil)}}" alt="{{asset(Auth::user()->le_profil)}}" class="img img-fluid">
                                                                @else
                                                                    <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-fluid">
                                                                @endif
                                                            @else
                                                                <img src="{{asset('/glbal/autres/images.png')}}" alt="{{asset('/glbal/autres/images.png')}}" class="img img-fluid">
                                                            @endauth
                                                        @endif
                                                        {{-- <img src="{{asset(Auth::user()->le_profil)}}" alt="{{asset(Auth::user()->le_profil)}}" class="img img-fluid" > --}}
                                                    </div>
                                                    <div class="col-md-10">
                                                        <h4 class="font-20 weight-500 mb-10 text-capitalize" style="font-size : 30px;">
                                                            <span class="msicons" ><b class="fw-bold  comming">W</b><small class="fst-italic titre" style="color: var(--titre-couleur); font-family: italic;">elcome</small> <b class="fw-bold comming">B</b><small class="fst-italic titre" style="color: var(--titre-couleur); font-family: italic;">ack</small></span>
                                                            <div class="weight-600 font-30 " style="color: var(--titre-couleur);" >
                                                                @if (Route::has('login'))
                                                                @auth
                                                                {{Auth::user()->name}} {{Auth::user()->prenom}}
                                                                @else
                                                                    Nom-User et Prenom-User Connecté
                                                                @endauth
                                                                @endif
                                                            </div>
                                                        </h4>
                                                        <p class="font-18 max-width-600" style="font-size: 20px; color: var(--color-t); font-family : 'Times New Roman', Times, serif;">Vous
                                                            @if (Route::has('login'))
                                                            @auth
                                                                etes connecté en tant que
                                                                {{Auth::user()->profil->libelle}}
                                                            @else
                                                                n'etes pas connecté
                                                            @endauth
                                                            @endif
                                                            , et
                                                            @if (Route::has('login'))
                                                                @auth
                                                                    disposez donc tous les droits de {{Auth::user()->profil->libelle}} !
                                                                @else
                                                                    et ne disposez donc tous les d'aucun droits !
                                                                @endauth
                                                            @endif
                                                            <br> Alors Mr/Mdme
                                                            @if (Route::has('login'))
                                                            @auth
                                                                {{Auth::user()->name}} {{Auth::user()->prenom}} Par quoi commencons-nous ?
                                                                <p>Votre dernière connexion remonte à : {{Auth::user()->last_login}} </p>
                                                                @else
                                                                    Nom-User et Prenom-User Par quoi commencons-nous ?
                                                                    <p>Votre dernière connexion remonte à : maintenant </p>
                                                                @endauth
                                                            @endif


                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        {{-- ANIMATION FADE UP FIN --}}
                    </section>
                {{-- bienvenu utilisateur fin  --}}

                {{-- BOX TOTEAUX DEBUT  --}}
                    {{-- ANIMATION FADE-DOWN DEBUT --}}
                        <section class="section-3">
                            <div >
                                @include('admins.menus._homes.totaux')
                            </div>


                        </section>
                    {{-- ANIMATION FADE-DOWN DEBUT --}}
                {{-- BOX TOTEAUX DEBUT  --}}
                {{-- CARDS DETAIL DEBUT  --}}
                    <section class="section-4">
                        <div >
                            @include('admins.menus._homes.cards')
                        </div>
                    </section>
                {{-- CARDS DETAIL FIN  --}}
                {{-- CHARTS DEBUT  --}}
                    <section class="section-5">
                        <div>
                            @include('admins.menus._homes.charts')
                        </div>
                    </section>
                {{-- CHARTS FIN  --}}




            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
@section('footer')
    {{-- <script>
        // BAR CHART DEBUT
        // Récupérer les données depuis PHP
        var monthsData = {!! json_encode($data['monthsData']) !!};
        // Liste des mois avec leurs noms
        var months = Object.keys(monthsData);
        // Données pour les archives entrantes et sortantes empilées
        var stackedData = [];
        // Parcourir les données pour chaque mois
        months.forEach(function(month) {
            // Récupérer les données pour le mois en cours
            var monthData = monthsData[month];

            // Initialiser les totaux pour les archives entrantes et sortantes
            var entrantTotal = 0;
            var sortantTotal = 0;

            // Parcourir les données pour chaque sens
            monthData.forEach(function(sensData) {
                // Ajouter les totaux d'entrées et de sorties pour ce mois
                entrantTotal += sensData.entrant;
                sortantTotal += sensData.sortant;
            });

            // Ajouter les totaux au tableau de données empilées
            stackedData.push({ month: month, entrant: entrantTotal, sortant: sortantTotal });
        });
        // Créer le graphique à barres empilées
        var ctx = document.getElementById('stackedBarChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: months, // Utilisez les noms des mois comme libellés de l'axe des x
                datasets: [{
                    label: 'Archives entrantes',
                        data: stackedData.map(function(data) { return data.entrant; }),
                                backgroundColor: '#007bff' // Bleu AdminLTE
                            }, {
                                label: 'Archives sortantes',
                                data: stackedData.map(function(data) { return data.sortant; }),
                                backgroundColor: '#dc3545' // Rouge AdminLTE
                            }]
                        },
                        options: {
                            scales: {
                                x: {
                                    stacked: true
                                },
                                y: {
                                    stacked: true
                                }
                            },
                            plugins: {
                                legend: {
                                    display: true,
                                    labels: {
                                        font: {
                                            size: 12
                                        }
                                    }
                                }
                            }
                        }
            });

                // BAR CHART FIN
                // PIE CHART DEBUT
                // Récupérer les données depuis PHP
                    var pieData = {!! json_encode($data['pieCategorie']) !!};

                    // Récupérer les libellés des catégories
                    var labels = Object.keys(pieData);

                    // Récupérer les valeurs associées aux libellés
                    var data = Object.values(pieData);

                    // Générer des couleurs aléatoires pour les segments du pie chart
                    var colors = getRandomColors(labels.length);

                    // Créer le diagramme en secteurs (pie chart)
                    var ctx = document.getElementById('pieChart').getContext('2d');
                    var myPieChart = new Chart(ctx, {
                        type: 'pie',
                        data: {
                            labels: labels,
                            datasets: [{
                                data: data,
                                backgroundColor: colors
                            }]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'bottom'
                                },
                                title: {
                                    display: true,
                                    text: 'Répartition des archives par catégorie'
                                }
                            }
                        }
                    });

                    // Fonction pour générer des couleurs aléatoires
                    function getRandomColors(count) {
                        var colors = [];
                        for (var i = 0; i < count; i++) {
                            var color = '#' + Math.floor(Math.random() * 16777215).toString(16);
                            colors.push(color);
                        }
                        return colors;
                    }

                //PIE CHAR FIN




                // PREMIER CHART & CATHEGORIE ARCHIVE DU MOIS DEBUT
                        // Récupérer les données depuis PHP
                    var categories = {!! json_encode($data['categories']->pluck('libelle')->toArray()) !!};
                    var archivesCount = {!! json_encode($data['archivesByCategory']->pluck('total')->toArray()) !!};

                    // Convertir les nombres à l'entier inférieur
                    archivesCount = archivesCount.map(function(count) {
                        return Math.floor(count);
                    });

                    // Créer un graphique à barres
                        var ctx = document.getElementById('archivesByCategoryChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: categories,
                                datasets: [{
                                    label: 'Nombre d\'archives par catégorie',
                                    data: archivesCount,
                                    backgroundColor: 'rgba(54, 162, 235, 0.5)',
                                    borderColor: 'rgba(54, 162, 235, 1)',
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                }
                            }
                        });
                // PREMIER CHART & CATHEGORIE ARCHIVE DU MOIS FIN


    </script> --}}
    <!-- Script pour initialiser le chart -->
    {{--  DERNIER CHART A MODIFIER DEBUT--}}
    {{-- <script>
        var postes = {!! json_encode($data['postes']) !!};
        var totaux = {!! json_encode($data['totaux']) !!};

        // Création du dataset
        var dataset = {
            labels: postes,
            datasets: [{
                label: 'Total archives par poste',
                data: totaux,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Configuration du chart
        var config = {
            type: 'bar',
            data: dataset,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Initialisation du chart
        var myChart = new Chart(document.getElementById('archivesParPosteChart'), config);
    </script> --}}
    {{--  DERNIER CHART A MODIFIER FIN--}}

    {{-- ANIMATION DE COMPTE TOTAUX DEBUT --}}
    {{-- // animateCount('total_2', {{ $data['emmeteurtt'] }});
    // animateCount('total_3', {{ $data['quartiertt'] }});
    // animateCount('total_4', {{ $data['recepteurtt'] }});
    // animateCount('total_5', {{ $data['parametrett'] }});
    // animateCount('total_6', {{ $data['categoriett'] }});
    // animateCount('total_7', {{ $data['archivett'] }});
    // animateCount('total_8', {{ $data['usertt'] }});
    // animateCount('total_9', {{ $data['gestionnairett'] }});
    // animateCount('total_10', {{ $data['administrationtt'] }}); --}}
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                animateCount('total_1', {{ $typeparametrett }});
                animateCount('total_2', {{ $parametrett }});
                animateCount('total_3', {{ $utilisateurtt }});
                animateCount('total_4', {{ $habilitationtt }});
                animateCount('total_5', {{ $profiltt }});
                animateCount('total_6', {{ $admintt }});
                // Ajoutez des appels à la fonction animateCount pour chaque total
            });

            function animateCount(elementId, total) {
                var totalElement = document.getElementById(elementId);
                var count = 0;
                var interval = 55; // Intervalle en millisecondes entre chaque incrémentation
                var increment = Math.ceil(total / (1000 / interval)); // Incrément à ajouter à chaque intervalle

                var timer = setInterval(function() {
                    count += increment;
                    if (count >= total) {
                        count = total;
                        clearInterval(timer);
                    }
                    totalElement.innerText = count;
                }, interval);
            }
        </script>
    {{-- ANIMATION DE COMPTE TOTAUX FIN --}}




    {{-- LES WIDGETS % SCRIPT DEBUT --}}
        {{-- <script>
            $(document).ready(function() {
                // Fonction pour animer le pourcentage
                function animatePercentage(newPercentage) {
                    $({ percentage: 0 }).animate({ percentage: newPercentage }, {
                        duration: 1000, // Durée de l'animation en millisecondes
                        step: function (now) {
                            $('#task-percentage').html(`${Math.round(now)}<sup style="font-size: 20px">%</sup>`);
                        }
                    });
                }
                // Fonction pour mettre à jour le pourcentage des tâches
                function updateTaskPercentage() {
                    $.ajax({
                        url: '/TacheTermine', // URL de la route pour obtenir le pourcentage
                        type: 'GET',
                        success: function(data) {
                            // Animer le pourcentage avec la nouvelle valeur
                            animatePercentage(data.percentage);
                        },
                        error: function(xhr, status, error) {
                            console.error('Erreur lors de la récupération des données :', error);
                        }
                    });
                }
                // Appel initial pour mettre à jour le pourcentage lorsque la page se charge
                updateTaskPercentage();
                // Gestionnaire de clic pour le bouton d'actualisation
                $(document).on('click', '.termeneAjours', function(e) {
                    e.preventDefault(); // Empêche le comportement par défaut du lien
                    updateTaskPercentage(); // Met à jour le pourcentage lorsqu'on clique sur le bouton d'actualisation
                });
            });
        </script>
        <script>
            $(document).ready(function() {
                // Fonction pour animer le pourcentage
                function animatePercentage(newPercentage) {
                    $({ percentageAttente: 0 }).animate({ percentageAttente: newPercentage }, {
                        duration: 1000, // Durée de l'animation en millisecondes
                        step: function (now) {
                            $('#TacheAttente').html(`${Math.round(now)}<sup style="font-size: 20px">%</sup>`);
                        }
                    });
                }

                // Fonction pour mettre à jour le pourcentage des tâches en attente
                function updateTaskPercentage() {
                    $.ajax({
                        url: '/tache-attente', // URL de la route pour obtenir le pourcentage des tâches en attente
                        type: 'GET',
                        success: function(data) {
                            console.log('Données reçues:', data); // Vérifiez les données reçues
                            if (data.percentageAttente !== undefined) {
                                // Animer le pourcentage avec la nouvelle valeur
                                animatePercentage(data.percentageAttente);
                            } else {
                                console.error('La clé "percentageAttente" est manquante dans les données.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Erreur lors de la récupération des données :', error);
                        }
                    });
                }

                // Appel initial pour mettre à jour le pourcentage lorsque la page se charge
                updateTaskPercentage();

                // Gestionnaire de clic pour le bouton d'actualisation
                $(document).on('click', '.attenteAjours', function(e) {
                    e.preventDefault(); // Empêche le comportement par défaut du lien
                    updateTaskPercentage(); // Met à jour le pourcentage lorsqu'on clique sur le bouton d'actualisation
                });
            });
        </script> --}}
        <script>
            $(document).ready(function() {
                // Fonction pour animer le pourcentage des tâches terminées
                function animatePercentageTerminee(newPercentage) {
                    $({ percentageTerminee: 0 }).animate({ percentageTerminee: newPercentage }, {
                        duration: 1000, // Durée de l'animation en millisecondes
                        step: function (now) {
                            $('#task-percentage').html(`${Math.round(now)}<sup style="font-size: 20px">%</sup>`);
                        }
                    });
                }

                // Fonction pour mettre à jour le pourcentage des tâches terminées
                function updateTaskPercentageTerminee() {
                    $.ajax({
                        url: '/TacheTermine', // URL de la route pour obtenir le pourcentage des tâches terminées
                        type: 'GET',
                        success: function(data) {
                            animatePercentageTerminee(data.percentage);
                        },
                        error: function(xhr, status, error) {
                            console.error('Erreur lors de la récupération des données :', error);
                        }
                    });
                }

                // Fonction pour animer le pourcentage des tâches en attente
                function animatePercentageAttente(newPercentage) {
                    $({ percentageAttente: 0 }).animate({ percentageAttente: newPercentage }, {
                        duration: 1000, // Durée de l'animation en millisecondes
                        step: function (now) {
                            $('#TacheAttente').html(`${Math.round(now)}<sup style="font-size: 20px">%</sup>`);
                        }
                    });
                }

                // Fonction pour mettre à jour le pourcentage des tâches en attente
                function updateTaskPercentageAttente() {
                    $.ajax({
                        url: '/TacheAttente', // URL de la route pour obtenir le pourcentage des tâches en attente
                        type: 'GET',
                        success: function(data) {
                            console.log('Données reçues:', data); // Vérifiez les données reçues
                            if (data.percentageAttente !== undefined) {
                                animatePercentageAttente(data.percentageAttente);
                            } else {
                                console.error('La clé "percentageAttente" est manquante dans les données.');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Erreur lors de la récupération des données :', error);
                        }
                    });
                }
                // UUTILITATAIRE POUR LE WIDGET % STATUT DES TACHES REPORTE DEBUT
                    // Fonction pour animer le pourcentage des tâches reporté
                        function animatePercentageReporte(newPercentage) {
                            $({ percentageReporte: 0 }).animate({ percentageReporte: newPercentage }, {
                                duration: 1000, // Durée de l'animation en millisecondes
                                step: function (now) {
                                    $('#TacheReporte').html(`${Math.round(now)}<sup style="font-size: 20px">%</sup>`);
                                }
                            });
                        }
                    // Fonction pour mettre à jour le pourcentage des tâches reporté
                        function updateTaskPercentageReporte() {
                            $.ajax({
                                url: '/TacheReporte', // URL de la route pour obtenir le pourcentage des tâches en attente
                                type: 'GET',
                                success: function(data) {
                                    console.log('Données reçues:', data); // Vérifiez les données reçues
                                    if (data.percentageReporte !== undefined) {
                                        animatePercentageReporte(data.percentageReporte);
                                    } else {
                                        console.error('La clé "percentageReporte" est manquante dans les données.');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Erreur lors de la récupération des données :', error);
                                }
                            });
                        }
                // UUTILITATAIRE POUR LE WIDGET % STATUT DES TACHES REPORTE FIN
                
                // UUTILITATAIRE POUR LE WIDGET % STATUT DES TACHES EN COURS DEBUT
                    // Fonction pour animer le pourcentage des tâches en cours
                        function animatePercentageCours(newPercentage) {
                            $({ percentageCours: 0 }).animate({ percentageCours: newPercentage }, {
                                duration: 1000, // Durée de l'animation en millisecondes
                                step: function (now) {
                                    $('#TacheCours').html(`${Math.round(now)}<sup style="font-size: 20px">%</sup>`);
                                }
                            });
                        }
                    // Fonction pour mettre à jour le pourcentage des tâches en cours
                        function updateTaskPercentageCours() {
                            $.ajax({
                                url: '/TacheCours', // URL de la route pour obtenir le pourcentage des tâches en attente
                                type: 'GET',
                                success: function(data) {
                                    console.log('Données reçues:', data); // Vérifiez les données reçues
                                    if (data.percentageCours !== undefined) {
                                        animatePercentageCours(data.percentageCours);
                                    } else {
                                        console.error('La clé "percentageCours" est manquante dans les données.');
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.error('Erreur lors de la récupération des données :', error);
                                }
                            });
                        }
                // UUTILITATAIRE POUR LE WIDGET % STATUT DES TACHES EN COURS FIN
                

            // MISE AJOURS DES WIDGET A LA RECHARCHE DE LA PAGE DEBUT
                // Appels initiaux pour mettre à jour les pourcentages lorsque la page se charge
                updateTaskPercentageAttente();
                updateTaskPercentageReporte();
                updateTaskPercentageCours();
                updateTaskPercentageTerminee();
            // MISE AJOURS DES WIDGET A LA RECHARCHE DE LA PAGE FIN
                // Gestionnaire de clic pour le bouton d'actualisation des tâches terminées
                $(document).on('click', '.termeneAjours', function(e) {
                    e.preventDefault(); // Empêche le comportement par défaut du lien
                    updateTaskPercentageTerminee(); // Met à jour le pourcentage des tâches terminées
                });

                // Gestionnaire de clic pour le bouton d'actualisation des tâches en attente
                $(document).on('click', '.attenteAjours', function(e) {
                    e.preventDefault(); // Empêche le comportement par défaut du lien
                    updateTaskPercentageAttente(); // Met à jour le pourcentage des tâches en attente
                });
                // Gestionnaire de clic pour le bouton d'actualisation des tâches reporté
                $(document).on('click', '.reporteAjours', function(e) {
                    e.preventDefault(); // Empêche le comportement par défaut du lien
                    updateTaskPercentageReporte(); // Met à jour le pourcentage des tâches reporté
                });
                // Gestionnaire de clic pour le bouton d'actualisation des tâches en cours
                $(document).on('click', '.reporteCours', function(e) {
                    e.preventDefault(); // Empêche le comportement par défaut du lien
                    updateTaskPercentageCours(); // Met à jour le pourcentage des tâches en cours
                });
            });
        </script>


    {{-- LES WIDGETS % SCRIPT DEBUT --}}



{{-- SCRIPT RADAR POUR MES MAITRISE ET COMPETENCE DEBUT --}}
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const body = document.body;
            const userTheme = body.getAttribute('data-user-theme');

            // Fonction pour définir les couleurs en fonction du thème
            function getColors(theme) {
                if (theme === 'dark-mode') {
                    return {
                        backgroundColor: [
                            'rgb(41, 13, 255, 0.2)',
                            'rgba(153, 227, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgb(41, 13, 255)',
                            'rgba(153, 227, 255)'
                        ],
                        textColor: 'white'
                    };
                } else {
                    return {
                        backgroundColor: [
                            'rgba(0, 150, 0, 0.2)',
                            'rgba(108, 0, 204, 0.2)'
                        ],
                        borderColor: [
                            'rgba(0, 150, 0)',
                            'rgba(108, 0, 204)'
                        ],
                        textColor: 'black'
                    };
                }
            }

            // Initialisation des couleurs
            let { backgroundColor, borderColor, textColor } = getColors(userTheme);

            // Collecter toutes les compétences et maîtrises dans un seul tableau
            var allData = [];
            var labels = [];
            var dataCompetences = [];
            var dataMaitrises = [];

            // Ajout des compétences
            @foreach ($competences as $competence)
                allData.push({
                    type: 'competence',
                    nom: '{{ $competence->nom }}',
                    level: {{ $competence->level }}
                });
            @endforeach

            // Ajout des maîtrises
            @foreach ($maitrises as $maitrise)
                allData.push({
                    type: 'maitrise',
                    nom: '{{ $maitrise->nom }}',
                    level: {{ $maitrise->level }}
                });
            @endforeach

            // Création des labels et données uniques
            allData.forEach(function(item) {
                if (!labels.includes(item.nom)) {
                    labels.push(item.nom);
                }
            });

            labels.forEach(function(label) {
                var competence = allData.find(function(item) {
                    return item.nom === label && item.type === 'competence';
                });
                var maitrise = allData.find(function(item) {
                    return item.nom === label && item.type === 'maitrise';
                });

                dataCompetences.push(competence ? competence.level : 0);
                dataMaitrises.push(maitrise ? maitrise.level : 0);
            });

            var radarChart;

            function createRadarChart() {
                var ctx = document.getElementById('radarChart').getContext('2d');
                radarChart = new Chart(ctx, {
                    type: 'radar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Niveaux de compétence',
                            data: dataCompetences,
                            backgroundColor: backgroundColor[0],
                            borderColor: borderColor[0],
                            borderWidth: 1
                        }, {
                            label: 'Niveaux de maîtrise',
                            data: dataMaitrises,
                            backgroundColor: backgroundColor[1],
                            borderColor: borderColor[1],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            r: {
                                ticks: {
                                    beginAtZero: true,
                                    max: 100,
                                    color: textColor
                                },
                                pointLabels: {
                                    color: textColor,
                                    callback: function(value) {
                                        return value;
                                    }
                                }
                            }
                        },
                        plugins: {
                            legend: {
                                labels: {
                                    color: textColor // Définir la couleur du texte de la légende
                                }
                            }
                        }
                    }
                });
            }

            createRadarChart();

            // Ajouter un écouteur d'événement pour le changement de thème
            document.getElementById('mode-toggle').addEventListener('click', function () {
                const newTheme = body.classList.contains('dark-mode') ? 'light-mode' : 'dark-mode';
                ({ backgroundColor, borderColor, textColor } = getColors(newTheme));

                // Détruire l'ancien graphique et en créer un nouveau avec les nouvelles couleurs
                if (radarChart) {
                    radarChart.destroy();
                }
                createRadarChart();
            });
        });
    </script>
{{-- SCRIPT RADAR  POUR MES MAITRISE ET COMPETENCE FIN --}}
{{-- LES CDN DEBUT --}}
    {{-- CDN JQUERY-3.6.0 POUR LES LISTES DE TACHE ET AUTRE DEBUT--}}
        <script src="{{asset('glbal/jquery-3/jquery-3.6.0.min.js')}}"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    {{-- CDN JQUERY-3.6.0 POUR LES LISTES DE TACHE ET AUTRE FIN--}}
    {{-- CDN POUR LES CHARTS DEBUT--}}
        <script src="{{asset('glbal/charts/chart.js')}}"></script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    {{-- CDN POUR LES CHARTS FIN--}}

{{-- LES CDN FIN --}}



{{--  SCRIPT REALISATION PERSONNEL ET EQUIPE EN BARR : Réalisations stackedBarChart debt --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const body = document.body;
            const userTheme = body.getAttribute('data-user-theme');

            // Fonction pour définir les couleurs en fonction du thème
            function getColors(theme) {
                if (theme === 'dark-mode') {
                    return {
                        backgroundColor: [
                            'rgba(41, 13, 255, 0.2)',
                            'rgba(153, 227, 255, 0.2)'
                        ],
                        borderColor: [
                            'rgba(41, 13, 255)',
                            'rgba(153, 227, 255)'
                        ],
                        textColor: 'white'
                    };
                } else {
                    return {
                        backgroundColor: [
                            'rgba(32, 148, 197, 0.2)',
                            'rgba(114, 169, 179, 0.2)'
                        ],
                        borderColor: [
                            'rgba(32, 148, 197)',
                            'rgba(114, 169, 179)'
                        ],
                        textColor: 'black'
                    };
                }
            }

            // Initialisation des couleurs
            let { backgroundColor, borderColor, textColor } = getColors(userTheme);

            let chart;

            function createChart(data) {
                var stackedBarChartCanvas = document.getElementById('stackedBarChart').getContext('2d');
                var stackedBarChartOptions = {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        x: {
                            stacked: true,
                            ticks: {
                                color: textColor // Définir la couleur du texte des labels de l'axe X
                            }
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1, // Pour n'avoir que des entiers
                                color: textColor // Définir la couleur du texte des labels de l'axe Y
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            labels: {
                                color: textColor // Définir la couleur du texte de la légende
                            }
                        }
                    }
                };

                // Mettre à jour les couleurs du dataset
                data.datasets.forEach((dataset, index) => {
                    dataset.backgroundColor = backgroundColor[index];
                    dataset.borderColor = borderColor[index];
                });

                if (chart) {
                    chart.destroy();
                }

                chart = new Chart(stackedBarChartCanvas, {
                    type: 'bar',
                    data: data,
                    options: stackedBarChartOptions
                });
            }

            // Script du graphique
            fetch('/fetch-chart-data')
                .then(response => response.json())
                .then(data => {
                    console.log('Fetched Data:', data); // Pour débogage
                    createChart(data);
                })
                .catch(error => console.error('Error fetching chart data:', error));

            // Mettre à jour les couleurs du graphique lorsque le thème change
            document.getElementById('mode-toggle').addEventListener('click', function () {
                const newTheme = body.classList.contains('dark-mode') ? 'light-mode' : 'dark-mode';
                ({ backgroundColor, borderColor, textColor } = getColors(newTheme));

                fetch('/fetch-chart-data')
                    .then(response => response.json())
                    .then(data => {
                        createChart(data);
                    })
                    .catch(error => console.error('Error fetching chart data:', error));
            });
        });
    </script>
{{--  SCRIPT REALISATION PERSONNEL ET EQUIPE EN BARR : Réalisations stackedBarChart fn --}}
{{-- POST DONAUT DEBUT --}}
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            fetch('/chart-post')
                .then(response => response.json())
                .then(data => {
                    const labels = data.posts.map(post => post.title);
                    const commentCounts = data.posts.map(post => post.comments_count);

                    var ctx = document.getElementById('donutChart').getContext('2d');
                    var donutChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Number of Comments',
                                data: commentCounts,
                                backgroundColor: [
                                    '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
                                ],
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true
                        }
                    });
                });
        });
    </script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour définir les couleurs en fonction du thème
            function getColors(theme) {
                if (theme === 'dark-mode') {
                    return {
                        backgroundColor: [
                            '#54d7f5', '#296f85', '#093bed', '#c6c8cf', '#c099cc', '#04917a'
                        ],
                        borderColor: [
                            '#54d7f5', '#296f85', '#093bed', '#c6c8cf', '#c099cc', '#04917a'
                        ],
                        textColor: 'white'
                    };
                } else {
                    return {
                        backgroundColor: [
                            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
                        ],
                        borderColor: [
                            '#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'
                        ],
                        textColor: 'black'
                    };
                }
            }

            fetch('/chart-post')
                .then(response => response.json())
                .then(data => {
                    const labels = data.posts.map(post => post.title);
                    const commentCounts = data.posts.map(post => post.comments_count);

                    var ctx = document.getElementById('donutChart').getContext('2d');

                    // Récupérer le thème actuel du corps (body) de la page
                    const body = document.body;
                    const userTheme = body.getAttribute('data-user-theme');

                    // Obtenir les couleurs en fonction du thème actuel
                    const { backgroundColor, borderColor, textColor } = getColors(userTheme);

                    var donutChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Nombre de commentaires',
                                data: commentCounts,
                                backgroundColor: backgroundColor,
                                borderColor: borderColor,
                                hoverOffset: 4
                            }]
                        },
                        options: {
                            maintainAspectRatio: false,
                            responsive: true,
                            plugins: {
                                legend: {
                                    labels: {
                                        color: textColor // Couleur du texte de la légende
                                    }
                                }
                            }
                        }
                    });
                });
        });
    </script>

{{-- POST DONAUT FIN --}}
{{-- VISITEUR PAR MOIS DEBUT --}}
    <script>
        function getColors(theme) {
            if (theme === 'dark-mode') {
                return {
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(75, 192, 192, 1)',
                    textColor: 'white',
                    gridColor: 'rgba(204, 204, 204, 0.3)'
                };
            } else {
                return {
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    pointBackgroundColor: 'rgba(75, 192, 192, 1)',
                    pointBorderColor: '#fff',
                    pointHoverBackgroundColor: '#fff',
                    pointHoverBorderColor: 'rgba(75, 192, 192, 1)',
                    textColor: 'black',
                    gridColor: 'rgba(204, 204, 204, 0.3)'
                };
            }
        }

        document.addEventListener('DOMContentLoaded', (event) => {
            const theme = 'light-mode'; // Vous pouvez définir dynamiquement ce paramètre en fonction du thème de votre application

            fetch('/api/visitors')
                .then(response => response.json())
                .then(data => {
                    const labels = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                    const visitors = new Array(12).fill(0);

                    for (const [month, count] of Object.entries(data)) {
                        visitors[month - 1] = count;
                    }

                    const colors = getColors(theme);
                    const ctx = document.getElementById('visitorChart').getContext('2d');
                    const config = {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: '# of Visitors',
                                data: visitors,
                                backgroundColor: colors.backgroundColor,
                                borderColor: colors.borderColor,
                                borderWidth: 1,
                                pointBackgroundColor: colors.pointBackgroundColor,
                                pointBorderColor: colors.pointBorderColor,
                                pointHoverBackgroundColor: colors.pointHoverBackgroundColor,
                                pointHoverBorderColor: colors.pointHoverBorderColor,
                                fill: true
                            }]
                        },
                        options: {
                            plugins: {
                                title: {
                                    display: true,
                                    text: 'Visitor Chart',
                                    color: colors.textColor
                                },
                                subtitle: {
                                    display: true,
                                    text: 'Number of visitors per month',
                                    color: 'blue',
                                    font: {
                                        size: 12,
                                        family: 'tahoma',
                                        weight: 'normal',
                                        style: 'italic'
                                    },
                                    padding: {
                                        bottom: 10
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    ticks: {
                                        color: colors.textColor
                                    },
                                    grid: {
                                        color: colors.gridColor
                                    }
                                },
                                x: {
                                    ticks: {
                                        color: colors.textColor
                                    },
                                    grid: {
                                        color: colors.gridColor
                                    }
                                }
                            },
                            responsive: true,
                            maintainAspectRatio: false
                        }
                    };
                    new Chart(ctx, config);
                });
        });
    </script>
{{-- VISITEUR PAR MOIS FIN --}}
{{-- SCRIPT JQ POUR LA LISTE DES TACHES LA PAGINATION ET TOUT CE QUI VA AVEC LE BLOC DEBUT --}}
    <script>
        $(document).ready(function() {
            function loadTasks(page = 1) {
                $.ajax({
                    url: `/tasks?page=${page}`,
                    type: 'GET',
                    success: function(data) {
                        $('#todo-list').empty();
                        $('#pagination').empty();

                        data.data.forEach(task => {
                            // Vérifie si le statut est "termine" pour définir la case comme cochée et désactivée
                            const isChecked = task.status === 'termine' ? 'checked' : '';
                            const isDisabled = task.status === 'termine' ? 'disabled checkbox-disabled' : '';

                            // Affiche end_date si le statut est "termine", sinon start_date
                            const dateToDisplay = task.status === 'termine' && task.end_date ? task.end_date : task.start_date || 'No date';

                            // Applique la classe 'text-line-through' si le statut est "termine"
                            const textClass = task.status === 'termine' ? 'text-line-through' : '';

                            // Décide si l'icône d'édition doit être cachée ou non
                            const editIconClass = task.status === 'termine' ? 'd-none' : '';

                            $('#todo-list').append(`
                                <li>
                                    <span class="handle">
                                        <i class="fas fa-ellipsis-v"></i>
                                        <i class="fas fa-ellipsis-v"></i>
                                    </span>
                                    <div class="icheck-primary d-inline ml-2">
                                        <input type="checkbox" value="" name="todo${task.id}" id="todoCheck${task.id}" ${isChecked} ${isDisabled}>
                                        <label for="todoCheck${task.id}"></label>
                                    </div>
                                    <span class="text ${textClass}">${task.title} | ${task.status} &ensp;<i class="fas fa-hand-point-right msicons"></i> ${task.user ? task.user.name : 'N/A'}</span>
                                    <small class="badge badge-info"><i class="far fa-clock"></i> ${dateToDisplay}</small>
                                    <div class="tools">
                                        <i class="fas fa-edit ${editIconClass} bg-warning" data-id="${task.id}" data-toggle="modal" data-target="#editTaskModal"></i>
                                        <i class="fas fa-trash" data-id="${task.id}" data-toggle="modal" data-target="#deleteTaskModal"></i>
                                    </div>
                                </li>
                            `);
                        });

                        // Pagination
                        if (data.prev_page_url) {
                            $('#pagination').append(`<li class="page-item"><a href="#" class="page-link" data-page="${data.current_page - 1}">&laquo;</a></li>`);
                        }

                        for (let i = 1; i <= data.last_page; i++) {
                            $('#pagination').append(`<li class="page-item ${data.current_page == i ? 'active' : ''}"><a href="#" class="page-link" data-page="${i}">${i}</a></li>`);
                        }

                        if (data.next_page_url) {
                            $('#pagination').append(`<li class="page-item"><a href="#" class="page-link" data-page="${data.current_page + 1}">&raquo;</a></li>`);
                        }
                    }
                });
            }

            loadTasks();

            // Gestion du changement de page
            $(document).on('click', '#pagination .page-link', function(e) {
                e.preventDefault();
                const page = $(this).data('page');
                loadTasks(page);
            });

            // Ouvrir le modal d'édition et pré-remplir le formulaire
            $(document).on('click', '.fa-edit', function() {
                const taskId = $(this).data('id');
                const formAction = $('#editTaskForm').attr('action').replace(':id', taskId);

                // Prépare l'action du formulaire
                $('#editTaskForm').attr('action', formAction);
                $('#task_id').val(taskId);

                // Récupère les détails de la tâche pour pré-remplir le formulaire
                $.ajax({
                    url: `/tasks/${taskId}`,
                    type: 'GET',
                    success: function(task) {
                        $('#status').val(task.status);
                        $('#editTaskModal').modal('show');
                    }
                });
            });

            // Ouvrir le modal de suppression et configurer l'action du formulaire
            $(document).on('click', '.fa-trash', function() {
                const taskId = $(this).data('id');
                const formAction = `/tasks/${taskId}`;
                $('#deleteTaskForm').attr('action', formAction);
                $('#deleteTaskModal').modal('show');
            });
        });
    </script>
{{-- SCRIPT JQ POUR LA LISTE DES TACHES LA PAGINATION ET TOUT CE QUI VA AVEC LE BLOC FIN --}}


@endsection
