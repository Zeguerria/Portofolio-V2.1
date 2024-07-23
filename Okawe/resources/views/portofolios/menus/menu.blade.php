<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- MODAL ANIMATION ULTIME DEBUT --}}
    <link rel="stylesheet" href="{{asset('glbal/animationmodalultimes/modal.css')}}"/>

    {{-- MODAL ANIMATION ULTIME FIN --}}
    {{-- BOOTSTRAP LIENS DEBUT --}}
        <link rel="stylesheet" href="{{asset('portofolios/bootstrap-5.3.3-dist/css/bootstrap.min.css')}}"/>
        <link rel="stylesheet" href="{{asset('portofolios/bootstrap-5.3.3-dist/css/ionicons.min.css')}}">
    {{-- BOOTSTRAP LIENS FIN --}}
    {{-- AOS LIENS DEBUT --}}
        <link rel="stylesheet" href="{{asset('portofolios/aos-master/dist/aos.css')}}" />
    {{-- AOS LIENS FIN --}}
    {{-- FONT AWESOME DEBUT --}}
    <link rel="stylesheet" href="{{asset('portofolios/font-awesome/css/font-awesome.min.css')}}" />
    {{-- FONT AWSOME FIN --}}
    {{-- BOUTON DEBUT --}}
    <link rel="stylesheet" href="{{asset('portofolios/bootstrap-buttons-12/css/style.css')}}" />
    <title>Astral->@yield('titre')</title>
    {{-- CAROUSEL DEBUT --}}
        <link rel="stylesheet" href="{{asset('portofolios/carousels/fonts/icomoon/style.css')}}">

        <link rel="stylesheet" href="{{asset('portofolios/carousels/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('portofolios/carousels/css/style.css')}}">
    {{-- CAROUSEL FIN  --}}
        <style>
            body {
                margin: 0;
                padding: 0;
                width: 100%;
                height: 100%;
                overflow-x: hidden;
            }
            /* SNAVBAR DEBUT */
                .navbar {
                position: fixed; /* Assurez-vous que la barre de navigation reste fixe en haut de la page */
                    top: 0;
                    left: 0;
                    width: 100%;
                    z-index: 1000; /* Assurez-vous que le z-index de votre barre de navigation est supérieur à celui des autres éléments */
                    transition: background-color 0.3s ease-in-out;
                    width: 100%;
                    background-color: transparent; /* Barre de navigation transparente par défaut */
                }

                /* Styles pour la barre de navigation après le défilement */
                .navbar.scrolled {
                    position: fixed; /* Définir la position fixe */
                    top: 0;
                    left: 0;
                    width: 100%; /* Occupera toute la largeur de l'écran */
                    height: 70px; /* Ajustez la hauteur selon vos besoins */
                    background: linear-gradient(
                        90deg,
                        #E5E3E2,
                        #F6F7F9,
                        #E5E3E2

                    );
                    /* background: linear-gradient(
                        90deg,
                        #0d4140,
                        #eae4e4,
                        #f0eaea
                    ); */
                    /* Couleur de fond solide après le défilement */
                    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                    z-index: 1000; /* Ajoutez un z-index élevé pour garantir que la barre de navigation est au-dessus des autres éléments */
                }
                .image-ronde {
                    border: none;
                    -moz-border-radius: 45px;
                    -webkit-border-radius: 45px;
                    border-radius: 500px;
                }

                .manav {
                    width: 100%; /* Assurez-vous que le conteneur de la barre de navigation prend toute la largeur */
                    margin-top: 0; /* Supprimez la marge supérieure */
                    padding-top: 0;
                    transition: background-color 0.3s ease-in-out;

                    background-color: transparent; /* Barre de navigation transparente par défaut */
                    /**background: linear-gradient(90deg, #0d4140, #eae4e4, #f0eaea);*/
                }
                /* Style normal du bouton de navigation */
                .nav-button {
                    color: #fff; /* Couleur du texte */
                    background: linear-gradient(
                        90deg,
                        #0d4140,
                        #eae4e4
                    ); /* Couleur de fond transparente */
                    border-color: #0d4140; /* Couleur de la bordure */
                }
                /* Style du bouton de navigation lors du défilement */
                .navbar.scrolled .nav-button {
                    color: #000000; /* Couleur du texte lors du défilement */
                    background-color: #f0f1f1; /* Couleur de fond lors du défilement */
                    border-color: #000; /* Couleur de la bordure lors du défilement */
                }
                /* Style du bouton de bascule de la barre de navigation */
                .navbar-collapse.show {
                    padding: 10px;
                    background: #eae4e4; /* Couleur de fond du menu déplié */
                    width: 100% !important; /* Définit la largeur à 100% */
                }

                .navbar-nav .nav-link:hover {
                    animation: heartbeat 1s infinite; /* Applique l'animation au survol */
                }

                @keyframes heartbeat {
                    0% {
                        transform: scale(1);
                        color: #0B0B0B; /* Couleur initiale */
                    }
                    50% {
                        transform: scale(1.1);
                        color: #0652eb; /* Couleur mi-chemin */
                    }
                    100% {
                        transform: scale(1);
                        color: #0B0B0B; /* Couleur initiale */
                    }
                }
                /* DROPDOWN DE LA BRARRE DE NAVIGATION FIN */
                    /* Style du dropdown */
                    .dropdown-menu {
                        background-color: #343a40;
                        border: none;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                        transition: all 0.6s ease-in-out;
                        opacity: 0;
                        visibility: hidden;
                    }

                    .dropdown-menu.show {
                        background: linear-gradient( 90deg, #eae4e4, #f0eaea );
                        opacity: 1;
                        visibility: visible;
                        animation: dropdownFadeIn 0.6s ease-in-out;
                    }

                    .dropdown-item {
                        color: #ffffff;
                        transition: transform 0.4s ease, opacity 0.4s ease;
                        opacity: 0;
                        transform: translateY(-20px) rotateX(-90deg);
                    }

                    .dropdown-menu.show .dropdown-item {
                        opacity: 1;
                        transform: translateY(0) rotateX(0);
                        animation: dropdownItemFadeIn 0.6s ease-in-out forwards;
                    }

                    .dropdown-item:hover {
                        background-color: #495057;
                        color: #ffffff;
                    }

                    /* Animation du dropdown */
                    @keyframes dropdownFadeIn {
                        0% {
                            opacity: 0;
                            transform: translateY(-20px) rotateX(-90deg);
                        }
                        100% {
                            opacity: 1;
                            transform: translateY(0) rotateX(0);
                        }
                    }

                    @keyframes dropdownItemFadeIn {
                        0% {
                            opacity: 0;
                            transform: translateY(-20px) rotateX(-90deg);
                        }
                        100% {
                            opacity: 1;
                            transform: translateY(0) rotateX(0);
                        }
                    }

                    /* Ajout d'animation sur le hover */
                    .nav-item.dropdown:hover .dropdown-menu {
                        background: linear-gradient( 90deg, #eae4e4, #f0eaea );
                        display: block;
                        margin-top: 0;
                        opacity: 1;
                        visibility: visible;
                    }

                    .nav-item.dropdown:hover .dropdown-item {
                        opacity: 1;
                        transform: translateY(0) rotateX(0);
                    }
                /* DROPDOWN DE LA BRARRE DE NAVIGATION FIN */
            /* NAVBAR FIN  */
            /* ANIMATION DES IMAGE EN FADIN DU BLOG ET AUTRES DEBUT */
                .blog-image img {
                    transition: transform 0.3s ease;
                }

                .blog-image:hover img {
                    transform: scale(1.11);
                }
            /* ANIMATION DES IMAGE EN FADIN DU BLOG ET AUTRES FIN */
            /* FOOTER DEBUT */
                .monfooter{
                    background: linear-gradient(
                    90deg,
                    #F6F7F9,
                    #E5E3E2
                    #F6F7F9
                ); /* Couleur de fond solide après le défilement */
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
                }
            /* FOOTER FIN */
            /* CSS BARRE DE PROGRESSION MAITRISE ET COMPETENCES DEBUT */
                /* CSS pour les barres de progression */
                .progress {
                    height: 2.5vw; /* Utilisation d'unités relatives pour la hauteur */
                    background: #e0e0e0;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.2);
                    margin-bottom: 1rem;
                }

                @media (min-width: 576px) {
                    .progress {
                        height: 2vw;
                    }
                }

                @media (min-width: 768px) {
                    .progress {
                        height: 1.5vw;
                    }
                }

                @media (min-width: 992px) {
                    .progress {
                        height: 1.2vw;
                    }
                }

                @media (min-width: 1200px) {
                    .progress {
                        height: 1vw;
                    }
                }

                .progress-bar {
                    height: 100%;
                    background: linear-gradient(to right, #00b4db, #0083b0);
                    border-radius: 10px;
                    color: #fff;
                    font-weight: bold;
                    transition: width 1.5s ease-in-out; /* Animation de la largeur */
                    display: flex;
                    align-items: center; /* Centrer le texte verticalement */
                    justify-content: center; /* Centrer le texte horizontalement */
                    font-size: 1vw; /* Utilisation d'unités relatives pour la taille du texte */
                }

                @media (min-width: 576px) {
                    .progress-bar {
                        font-size: 0.9vw;
                    }
                }

                @media (min-width: 768px) {
                    .progress-bar {
                        font-size: 0.8vw;
                    }
                }

                @media (min-width: 992px) {
                    .progress-bar {
                        font-size: 0.7vw;
                    }
                }

                @media (min-width: 1200px) {
                    .progress-bar {
                        font-size: 0.6vw;
                    }
                }

                .competence-text {
                    font-size: 1.5vw; /* Utilisation d'unités relatives pour la taille du texte */
                    font-weight: bold;
                    color: #333;
                    display: flex;
                    align-items: center;
                    margin-bottom: 0.5rem;
                    cursor: pointer;
                }

                @media (min-width: 576px) {
                    .competence-text {
                        font-size: 1.3vw;
                    }
                }

                @media (min-width: 768px) {
                    .competence-text {
                        font-size: 1.2vw;
                    }
                }

                @media (min-width: 992px) {
                    .competence-text {
                        font-size: 1.1vw;
                    }
                }

                @media (min-width: 1200px) {
                    .competence-text {
                        font-size: 1vw;
                    }
                }

                .competence-text i {
                    font-size: 2vw; /* Utilisation d'unités relatives pour la taille de l'icône */
                    margin-right: 10px;
                    color: #007bff;
                    transition: transform 0.3s ease, color 0.3s ease;
                }

                @media (min-width: 576px) {
                    .competence-text i {
                        font-size: 1.8vw;
                    }
                }

                @media (min-width: 768px) {
                    .competence-text i {
                        font-size: 1.6vw;
                    }
                }

                @media (min-width: 992px) {
                    .competence-text i {
                        font-size: 1.4vw;
                    }
                }

                @media (min-width: 1200px) {
                    .competence-text i {
                        font-size: 1.2vw;
                    }
                }

                .competence-text:hover {
                    color: #007bff;
                }

                .competence-text:hover i {
                    transform: scale(1.2);
                    color: #0056b3;
                }

                /* Animation fadeInUp */
                @keyframes fadeInUp {
                    0% {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    100% {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                /* AOS custom styles */
                [data-aos="fade-left"] {
                    opacity: 0;
                    transform: translate3d(-50px, 0, 0);
                    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
                }

                [data-aos="fade-left"].aos-animate {
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                }
            /* CSS BARRE DE PROGRESSION MAITRISE ET COMPETENCES FIN */
            /* CSS POUR LES TITRE ET LEUR ANIMATION DEBUT */
                .mesTitre {
                    /* font-family: 'Arial', sans-serif; */
                    font-weight: bold;
                    color: #333;
                    text-transform: uppercase;
                    letter-spacing: 0.1rem;
                    margin-bottom: 1rem;
                    position: relative;
                    overflow: hidden;
                    padding: 0.5rem;
                    transition: all 0.3s ease-in-out;
                    opacity: 0;
                    animation: fadeIn 2s forwards;
                    font-size: 4vw; /* Responsive font size */
                    cursor: pointer;
                }

                @media (min-width: 576px) {
                    .mesTitre {
                        font-size: 3vw;
                    }
                }

                @media (min-width: 768px) {
                    .mesTitre {
                        font-size: 2.5vw;
                    }
                }

                @media (min-width: 992px) {
                    .mesTitre {
                        font-size: 2vw;
                    }
                }

                @media (min-width: 1200px) {
                    .mesTitre {
                        font-size: 1.5vw;
                    }
                }

                @keyframes fadeIn {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .mesTitre::after {
                    content: '';
                    display: block;
                    width: 50px;
                    height: 5px;
                    background: #3498db;
                    margin: 0.5rem auto 0;
                    border-radius: 2.5px;
                    animation: slideIn 1s forwards 2s, shrink 1s forwards 3s; /* Slide in and then shrink */
                }

                @keyframes slideIn {
                    from {
                        transform: translateX(-50px);
                        opacity: 0;
                    }
                    to {
                        transform: translateX(0);
                        opacity: 1;
                    }
                }

                @keyframes shrink {
                    from {
                        width: 50px;
                    }
                    to {
                        width: 25px;
                    }
                }

                .mesTitre span {
                    display: inline-block;
                    opacity: 0;
                    transform: scale(0) rotate(360deg);
                    animation: letterFadeIn 0.5s forwards;
                }

                .mesTitre.animate-letters span {
                    animation: letterComplexAnimation 2s ease-in-out forwards;
                }

                @keyframes letterFadeIn {
                    from {
                        opacity: 0;
                        transform: scale(0) rotate(360deg);
                    }
                    to {
                        opacity: 1;
                        transform: scale(1) rotate(0);
                    }
                }

                @keyframes letterComplexAnimation {
                    0% {
                        color: #3498db;
                        transform: scale(1) rotate(0);
                        text-shadow: 0 0 5px rgba(52, 152, 219, 0.5);
                    }
                    25% {
                        color: #e74c3c;
                        transform: scale(1.5) rotate(15deg);
                        text-shadow: 0 0 20px rgba(231, 76, 60, 0.7);
                    }
                    50% {
                        color: #f1c40f;
                        transform: scale(1.2) rotate(-15deg);
                        text-shadow: 0 0 15px rgba(241, 196, 15, 0.6);
                    }
                    75% {
                        color: #2ecc71;
                        transform: scale(1.8) rotate(10deg);
                        text-shadow: 0 0 25px rgba(46, 204, 113, 0.8);
                    }
                    100% {
                        color: #9b59b6;
                        transform: scale(1) rotate(0);
                        text-shadow: 0 0 30px rgba(155, 89, 182, 0.9);
                    }
                }

                .mesTitre:hover span {
                    animation: letterHover 0.5s forwards;
                }

                @keyframes letterHover {
                    0%, 100% {
                        color: #3498db;
                        transform: scale(1) rotate(0);
                    }
                    50% {
                        color: #e74c3c;
                        transform: scale(1.2) rotate(10deg);
                    }
                }

            /* CSS POUR LES TITRE ET LEUR ANIMATION DEBUT */
            /*  ANIMATION MES IMAGES ET CSS FULL DEBUT*/
                /* CSS DESIGN ET ANIMATIONS DES IMAGES */

                /* Conteneur de l'image */
                .mesImages {
                    overflow: hidden; /* Assurez-vous que l'image ne déborde pas */
                    border-radius: 15px; /* Arrondir les coins */
                    transition: transform 0.5s ease-in-out, box-shadow 0.5s ease-in-out; /* Transition pour les effets */
                    position: relative;
                }

                .mesImages img {
                    width: 100%; /* Assurez-vous que l'image prend toute la largeur du conteneur */
                    height: auto; /* Conserve les proportions de l'image */
                    border-radius: 15px; /* Arrondir les coins */
                    transition: transform 0.5s ease-in-out, filter 0.5s ease-in-out; /* Transition pour les effets */
                    transform-origin: center center; /* L'origine de transformation */
                }

                /* Effet de filtre au survol */
                .mesImages:hover img {
                    filter: brightness(1.2) saturate(1.5); /* Appliquer un filtre de luminosité et de saturation */
                }

                /* Effet de shadow au survol */
                .mesImages:hover {
                    transform: scale(1.1) translateY(-10px); /* Agrandit légèrement l'image et la déplace vers le haut */
                    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2); /* Ajoute une ombre */
                }

                /* Animation personnalisée pour l'apparition */
                @keyframes customFadeInRight {
                    0% {
                        opacity: 0;
                        transform: translateX(-100px) rotate(-10deg);
                    }
                    50% {
                        opacity: 0.5;
                        transform: translateX(50px) rotate(10deg);
                    }
                    100% {
                        opacity: 1;
                        transform: translateX(0) rotate(0deg);
                    }
                }

                /* Animation au survol */
                @keyframes zoomAndRotate {
                    0% {
                        transform: scale(1) rotate(0deg);
                    }
                    50% {
                        transform: scale(1.1) rotate(5deg);
                    }
                    100% {
                        transform: scale(1) rotate(0deg);
                    }
                }

                /* Animation supplémentaire au survol */
                @keyframes changeColor {
                    0% {
                        filter: hue-rotate(0deg);
                    }
                    100% {
                        filter: hue-rotate(360deg);
                    }
                }

                /* Animation de transition de taille et de position au survol */
                @keyframes transitionSizeAndPosition {
                    0% {
                        transform: translate(0) scale(1);
                    }
                    50% {
                        transform: translate(-10px, -10px) scale(1.05);
                    }
                    100% {
                        transform: translate(0) scale(1);
                    }
                }

                /* AOS custom styles */
                [data-aos="fade-right"] {
                    opacity: 0;
                    transform: translate3d(-100px, 0, 0);
                    transition: opacity 0.8s ease-out, transform 0.8s ease-out;
                }

                [data-aos="fade-right"].aos-animate {
                    opacity: 1;
                    transform: translate3d(0, 0, 0);
                    animation: customFadeInRight 1.5s ease-out; /* Appliquer l'animation personnalisée d'apparition */
                }

                /* Appliquer l'animation de zoom et rotation au survol */
                .mesImages:hover img {
                    animation: zoomAndRotate 1s ease-in-out, changeColor 1s linear; /* Ajouter une animation de zoom et de rotation et une animation de changement de couleur au survol */
                }

                /* Appliquer l'animation de transition de taille et de position au survol */
                .mesImages:hover {
                    animation: transitionSizeAndPosition 1s ease-in-out; /* Ajouter une animation de transition de taille et de position au survol */
                }

            /*  ANIMATION MES IMAGES ET CSS FULL FIN*/
        </style>
    {{-- CONTACT DEBUT --}}
        <link rel="stylesheet" href="{{asset('portofolios/contacts/css/style.css')}}">
        <!-- MATERIAL DESIGN ICONIC FONT -->
        <link rel="stylesheet" href="{{asset('portofolios/contacts/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css')}}">
    {{-- CONTACT FIN --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawsome/fontawesome-free-5.15.4-web/css/all.min.css') }}">
    @yield('header')
</head>
<body style="background-color: #f0eaea">
    @extends('auth.animationlayouts')
    @section('content')

        <main style="background-color: #f0eaea">
            @yield('corps')
            {{-- <header>
                @include('portofolios.menus._menus.menu')
            </header> --}}

            {{-- FOOTER DEBUT --}}
                <section class="footer">
                    <div>
                        <div>
                            @include('portofolios.menus._menus.footer')
                        </div>
                    </div>
                </section>
            {{-- FOOTER FIN --}}
        </main>
        <!-- Contenu de votre application -->

        <!-- Scripts JavaScript -->
        <!-- Inclure jQuery -->
    <script src="{{asset('jquery/jquery.js')}}"></script>

    <!-- Inclure Popper.js -->
    <script src="{{asset('jquery/popper.js')}}"></script>

    <!-- Inclure Bootstrap JS -->
    <script src="{{asset('portofolios/bootstrap-5.3.3-dist/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Inclure les autres scripts JavaScript nécessaires -->
    <script src="{{asset('portofolios/contacts/js/main.js')}}"></script>
    <script src="{{asset('portofolios/aos-master/dist/aos.js')}}"></script>

        <!-- Votre propre script personnalisé -->
        <script>
            //SCRIPT INTITIALISAATION DES ANIMATION SCROLL AOS DEBUT
                AOS.init();
            //SCRIPT INTITIALISAATION DES ANIMATION SCROLL AOS FIN
            // SCRIPT DE LA NAVBAR QUI PRENDS FORMS AU SCROOOOL:: QUI RETIRE LE TRANSPAARENT DEBUT
                window.addEventListener("scroll", function () {
                    const navbar = document.getElementById("navbar");
                    if (window.scrollY > 70) {
                        // Ajoute la classe après avoir défilé de 50 pixels
                        navbar.classList.add("scrolled");
                    } else {
                        navbar.classList.remove("scrolled");
                    }
                });
            // SCRIPT DE LA NAVBAR QUI PRENDS FORMS AU SCROOOOL:: QUI RETIRE LE TRANSPAARENT FIN
            // TOOLTIP DEBUT
                const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
                const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
            // TOOLTIP DEBUT

        </script>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modals = document.querySelectorAll('.modal');

            modals.forEach(function (modal) {
                modal.addEventListener('shown.bs.modal', function () {
                    modal.querySelector('.modal-dialog').classList.add('modal-fullscreen');
                });
            });
        });
    </script> --}}
        <script src="{{asset('portofolios/carousels/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('portofolios/carousels/js/main.js')}}"></script>
        {{-- SCRIPT CAROUSEL SECTION BLOG DEBUT --}}
            <script src="{{asset('portofolios/swipers/swiper-bundle-min.js')}}"></script>
            <script>
                var swiper = new Swiper('.swiper-container', {
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    slidesPerView: 'auto', /* Afficher autant de slides que possible en fonction de la largeur de l'écran */
                    spaceBetween: 10, /* Espacement entre les slides */
                });
            </script>
        {{-- SCRIPT CAROUSEL SECTION BLOG FIN --}}



        {{-- BARRES DE PROGRESSION MAITRISES ET COMPETENCES DEBUT --}}
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    // Initialisation d'AOS pour les animations de défilement
                    // Fonction pour animer les barres de progression
                    function animateProgressBars() {
                        const progressBars = document.querySelectorAll('.progress-bar');
                        progressBars.forEach(bar => {
                            const level = parseInt(bar.getAttribute('data-level'));
                            animateProgress(bar, level);
                        });
                    }

                    // Fonction pour animer une barre de progression spécifique
                    function animateProgress(bar, level) {
                        let count = 0;
                        const interval = 20; // Intervalle en millisecondes entre chaque incrémentation
                        const increment = Math.ceil(level / (1000 / interval)); // Incrément à ajouter à chaque intervalle

                        const timer = setInterval(function() {
                            count += increment;
                            if (count >= level) {
                                count = level;
                                clearInterval(timer);
                            }
                            bar.style.width = count + '%';
                            bar.textContent = count + '%';
                        }, interval);
                    }

                    // Écouter l'événement AOS lorsque les éléments deviennent visibles
                    document.addEventListener('aos:in', function(event) {
                        const progressBar = event.detail.querySelector('.progress-bar');
                        if (progressBar) {
                            const level = parseInt(progressBar.getAttribute('data-level'));
                            animateProgress(progressBar, level);
                        }
                    });

                    // Appeler la fonction pour animer les barres de progression initialement
                    animateProgressBars();

                    // Optionnel : Initialiser les tooltips si vous utilisez Bootstrap
                    const tooltips = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                    tooltips.forEach(tooltip => new bootstrap.Tooltip(tooltip));
                });

            </script>
        {{-- BARRE DE PROGRESSION MAITRISES ET COMPETENCES FIN --}}
        {{--  SCRIPT POUR LES ANIMATIONS DES TITRE DEBUT--}}
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    document.querySelectorAll('.mesTitre').forEach(function(element) {
                        element.addEventListener('animationend', function() {
                            if (this.style.animationName === 'fadeIn') {
                                this.classList.add('animate-letters');
                            }
                        });
                    });
                });
            </script>
        {{--  SCRIPT POUR LES ANIMATIONS DES TITRE FIN--}}


        {{-- GSAP DEBUT --}}
        <script src="{{asset('glbal/gsap/gsap.min.js')}}"></script>
        <script>
            // Animation à l'ouverture de la modal
            $('.animated-modal').on('show.bs.modal', function (e) {
                console.log("Opening modal...");

                // Sélectionne la boîte de dialogue de la modal
                var modal = $(this).find('.modal-dialog');
                // Crée un élément de fond pour la modal
                var backdrop = $('<div class="modal-backdrop fade"></div>');
                // Ajoute l'élément de fond au corps du document
                $('body').append(backdrop);

                // Initialise les propriétés CSS de la modal avec GSAP
                gsap.set(modal, { opacity: 0, scale: 0.5, rotationY: 90, x: 200, transformOrigin: "50% 50%" });
                gsap.set(backdrop, { opacity: 0 });

                // Crée une timeline pour l'animation
                gsap.timeline()
                    // Anime le fond de la modal
                    .to(backdrop, { duration: 0.5, opacity: 0.5, ease: 'power2.out' })
                    // Anime l'apparition de la modal
                    .to(modal, { duration: 0.7, opacity: 1, scale: 1.2, rotationY: 0, x: 0, ease: 'back.out(1.7)' })
                    // Réduit légèrement l'échelle de la modal pour un effet de rebondissement
                    .to(modal, { duration: 0.3, scale: 1, ease: 'elastic.out(1, 0.3)' }, "-=0.2")
                    // Ajoute une ombre à la modal pour plus de profondeur
                    .to(modal, { duration: 0.5, boxShadow: '0 0 20px rgba(0,0,0,0.5)', ease: 'power2.out' }, "-=0.5");
            });

            // Animation à la fermeture de la modal
            $('.animated-modal').on('hide.bs.modal', function (e) {
                console.log("Closing modal...");

                // Sélectionne la boîte de dialogue de la modal
                var modal = $(this).find('.modal-dialog');
                // Sélectionne l'élément de fond
                var backdrop = $('.modal-backdrop');

                // Crée une timeline pour l'animation de fermeture
                gsap.timeline()
                    // Anime la disparition de la modal
                    .to(modal, { duration: 0.5, opacity: 0, scale: 0.5, rotationY: -90, x: 200, ease: 'power2.in' })
                    // Anime la disparition du fond de la modal
                    .to(backdrop, { duration: 0.5, opacity: 0, ease: 'power2.in' }, "-=0.5")
                    // Réinitialise les propriétés de la modal après la fermeture
                    .set(modal, { scale: 1, rotationY: 0, x: 0 })
                    // Retire le fond de la modal après une courte pause
                    .set(backdrop, { display: 'none' });
            });
        </script>
    {{-- GSAP FIN --}}

    <!-- Footer -->
    @endsection
@include('sweetalert::alert')
@yield('footer')

</body>
</html>
