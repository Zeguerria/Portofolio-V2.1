{{-- CSS POUR LA PHOTO DE PROFIL ET LA VIDEO DERRIERRE DEBUT--}}
    <style>
        /* Styles pour l'image et la vidéo */
        .image-profil {
            position: relative;
            overflow: hidden;
            border-radius: 10px; /* Coins arrondis */
            perspective: 1000px; /* Profondeur de la perspective pour l'effet 3D */
            cursor: pointer;
        }

        .image-profil img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 1s cubic-bezier(0.2, 0.8, 0.2, 1); /* Transition pour la rotation */
            backface-visibility: hidden; /* Évite les effets indésirables sur les faces arrière */
        }

        .image-profil:hover img {
            transform: rotateY(180deg); /* Rotation de l'image au survol */
        }

        .video-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            transition: opacity 0.3s ease; /* Transition pour l'opacité */
            background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .video {
            width: 100%;
            height: auto;
        }

        .image-profil:hover .video-overlay {
            opacity: 1; /* Afficher la vidéo au survol */
        }
    </style>
{{-- CSS POUR LA PHOTO DE PROFIL ET LA VIDEO DERRIERRE FIN--}}
{{--CSS POUR MODAL ANIMATION DEBUT --}}
    <style>

        /* Global Styles */
        /* body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
        } */

        /* Modal Specific Styles */
        /* Styles spécifiques pour le modal header exceptionnel */
        .exceptional-modal-header {
            background: linear-gradient(135deg, #E5E3E2, #F6F7F9);
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            position: relative;
            overflow: hidden;
        }

        .exceptional-modal-header::before,
        .exceptional-modal-header::after {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            transition: all 0.5s ease-in-out;
            border-radius: 50%;
        }

        .exceptional-modal-header::after {
            top: -60%;
            left: -60%;
            width: 220%;
            height: 220%;
            background: rgba(255, 255, 255, 0.2);
        }

        .exceptional-modal-header:hover::before,
        .exceptional-modal-header:hover::after {
            top: -40%;
            left: -40%;
            width: 180%;
            height: 180%;
        }

        .exceptional-modal-title {
            color: #eae4e4;
            font-size: 30px;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: titleAnimation 1s ease-in-out infinite alternate;
        }

        .exceptional-btn-close {
            background: #fff;
            border-radius: 50%;
            border: 2px solid #eae4e4;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .exceptional-btn-close:hover {
            background: #F6F7F9;
            border-color: #fff;
            color: #fff;
            transform: rotate(90deg);
        }
        /* Styles spécifiques pour le modal footer exceptionnel */
        .exceptional-modal-footer {
            background: linear-gradient(135deg, #E5E3E2, #F6F7F9);
            padding: 20px;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
            position: relative;
            overflow: hidden;
        }

        .exceptional-modal-footer::before,
        .exceptional-modal-footer::after {
            content: '';
            position: absolute;
            bottom: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(45deg);
            transition: all 0.5s ease-in-out;
            border-radius: 50%;
        }

        .exceptional-modal-footer::after {
            bottom: -60%;
            right: -60%;
            width: 220%;
            height: 220%;
            background: rgba(255, 255, 255, 0.2);
        }

        .exceptional-modal-footer:hover::before,
        .exceptional-modal-footer:hover::after {
            bottom: -40%;
            right: -40%;
            width: 180%;
            height: 180%;
        }

        .exceptional-btn-close {
            background: #fff;
            border: 2px solid #6c757d;
            color: #6c757d;
            transition: all 0.3s ease;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .exceptional-btn-close:hover {
            background: #6c757d;
            color: #fff;
            transform: scale(1.1);
        }

        .exceptional-btn-save {
            background: #6610f2;
            border: 2px solid #6610f2;
            color: #fff;
            transition: all 0.3s ease;
            padding: 10px 20px;
            border-radius: 25px;
            font-weight: bold;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .exceptional-btn-save:hover {
            background: #fff;
            color: #6610f2;
            transform: scale(1.1);
        }


        /* Keyframes pour l'animation du titre */
        @keyframes titleAnimation {
            0% {
                transform: scale(1);
                text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            }
            100% {
                transform: scale(1.1);
                text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.7);
            }
        }

        .modal-body{
            background-color: #f0eaea;
        }
        .modal-description {
            padding: 20px;
            background: #eae4e4;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            animation: fadeIn 0.5s ease-in-out;
        }

        .modal-bodydescription .modal-content {
            background: linear-gradient( 90deg, #E5E3E2, #F6F7F9, #E5E3E2);
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .modal-bodydescription .modal-content:hover {
            transform: scale(1.05);
        }

        .modal-bodydescription .modal-content-titre h3 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #01070f;
            transition: color 0.3s ease;
        }

        .modal-bodydescription .modal-content-description {
            margin-top: 15px;
        }

        .modal-bodydescription .modal-description-text p {
            color: #01070f;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .modal-bodydescription .modal-description-text ul {
            list-style-type: disc;
            padding-left: 20px;
        }

        .modal-bodydescription .modal-description-text ul li {
            margin-bottom: 10px;
        }

        /* Button Styles */
        .btn {
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .btn-outline-fb {
            border: 2px solid #3b5998;
            color: #3b5998;
        }

        .btn-outline-fb:hover {
            background-color: #3b5998;
            color: #fff;
            transform: translateY(-3px);
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .modal-bodydescription .modal-content {
                margin-bottom: 20px;
            }

            .modal-bodydescription .modal-content-titre h3 {
                font-size: 20px;
            }

            .modal-bodydescription .modal-description-text p {
                font-size: 14px;
            }

            .btn {
                font-size: 16px;
            }
        }

        /* Keyframes for Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }


    </style>
{{--CSS POUR MODAL ANIMATION FIN --}}
<link rel="stylesheet" href="{{asset('glbal/animecss/animate.min.css')}}">
{{-- CSS TEX BIENVENU PRESENTATION DEBUT --}}
    <style>
        .plusUltra {
            font-size: 1.25em; /* Augmente légèrement la taille des lettres */
            font-weight: 900;
            color: #0d4140;
        }
        .bienvenu, .qui, .monNom, .metier {
            visibility: hidden; /* Cache les éléments initialement */
        }

        .animate__visibility {
            visibility: visible !important; /* Rend les éléments visibles une fois les animations déclenchées */
        }

        .bienvenu.animate__animated.animate__backInDown {
            animation-delay: 0s; /* Délai pour commencer l'animation backInDown */
        }

        .bienvenu.animate__animated.animate__swing {
            animation-delay: 0.7s; /* Délai pour commencer l'animation hinge après backInDown */
        }
        .bienvenu.animate__animated.animate__hinge {
            animation-delay: 0.6s; /* Délai pour commencer l'animation hinge après backInDown */
        }

        .qui.animate__animated.animate__bounceInLeft {
            animation-delay: 3s; /* Délai pour commencer l'animation bounceInLeft */
        }

        .qui.animate__animated.animate__fadeOutRight {
            animation-delay: 3s; /* Délai pour commencer l'animation fadeOutRight */
        }

        .monNom.animate__animated.animate__bounceInRight {
            animation-delay: 6s; /* Délai pour commencer l'animation bounceInRight */
        }

        .metier.animate__animated.animate__bounceInLeft {
            animation-delay: 7s; /* Délai pour commencer l'animation bounceInLeft */
        }


        @media (min-width: 769px) and (max-width: 992px) {
            .bienvenu,.telecharger {
                font-size: 1.25rem; /* Ajuste la taille de police pour les écrans moyens */
            }
            .qui, .monNom, .metier {
                font-size: 1.75rem; /* Ajuste la taille de police pour les écrans moyens */
            }
        }

        @media (min-width: 993px) {
            .bienvenu, .telecharger {
                font-size: 1.5rem; /* Ajuste la taille de police pour les grands écrans */
            }
            .qui, .monNom, .metier {
                font-size: 2rem; /* Ajuste la taille de police pour les grands écrans */
            }
        }

    </style>
{{-- CSS TEX BIENVENU PRESENTATION FIN --}}
{{-- CSS DES BOUTON DE LA SECTION QUI JE SUIS DEBUT --}}
    <style>
        .btnCustom.btn-outline-primary {
            position: relative;
            overflow: hidden;
            border: 2px solid #007bff;
            color: #007bff;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .btnCustom.btn-outline-primary:hover {
            background-color: #007bff;
            color: #ffffff;
        }
        
        .btnCustom.btn-outline-primary i {
            margin-right: 10px;
            transition: transform 0.3s, color 0.3s;
        }
        
        .btnCustom.btn-outline-primary:hover i {
            animation: bounce 1s infinite;
            color: #ff5733;
        }
        
        .btnCustom.btn-outline-primary span {
            background: linear-gradient(90deg, #007bff, #ff5733);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: gradient 3s infinite;
        }
        
        .btnCustom.btn-outline-primary:before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 300%;
            height: 300%;
            background: rgba(0, 123, 255, 0.2);
            transition: transform 0.5s;
            transform: translate(-50%, -50%) scale(0);
        }
        
        .btnCustom.btn-outline-primary:hover:before {
            transform: translate(-50%, -50%) scale(1);
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-15px);
            }
            60% {
                transform: translateY(-10px);
            }
        }
        
        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }
        
        
    </style>
{{-- CSS DES BOUTON DE LA SECTION QUI JE SUIS FIN --}}


{{-- QUI JE SUIS DEBUT --}}
    <div>
        <div class="row align-items-center gy-4 my-2">
            <div >
                {{-- data-aos="zoom-out-down" --}}
                <div class="container pt-4">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">
                            <div class="animation pt">
                                <div class="text row">
                                    <!-- Bienvenue -->
                                    <h5 class="text-start fs-5 bienvenu animate__animated animate__backInDown">
                                        <span>Soyez Salué, Bienvenue sur</span><span>mon portfolio !</span>
                                    </h5>
                                    <!-- Qui je suis -->
                                    <h5 class="text-center fs-3 qui animate__animated animate__bounceInLeft">Je suis :</h5>
                                    <!-- Nom -->
                                    <h3 class="text-center fs-3 monNom animate__animated animate__bounceInRight"><b class="plusUltra">O</b>kawe <b class="plusUltra">K</b  class="plusUltra">oumakpayi <b  class="plusUltra">J</b  class="plusUltra">eremy <b  class="plusUltra">Y</b>olas</h3>
                                    <!-- Métier -->
                                    <h4 class="text-center fs-4 metier animate__animated animate__bounceInLeft">Développeur Full-stack | Licence 3 Analyste Programmeur</h4>
                                </div>
                            </div>




                            <div>
                                <button type="button" class="btn btnCustom mr-md-2 mb-md-0 mb-2 btn-outline-primary btn-md btn-lg mt-3" id="propos" data-bs-toggle="modal" data-bs-target="#apropos">
                                    <i class="fas fa-info-circle"></i>&ensp;A propos de Moi
                                </button>


                                <h5 class="pt-3 telecharger">
                                    Vous êtes prêts ?<br />
                                    Pas de problème, téléchargez directement mon CV.
                                </h5>
                                <div class="text-end">
                                    <a type="button" class="btn btnCustom mr-md-2 mb-md-0 mb-2 btn-outline-primary" href="{{asset('portofolios/cvs/okawe.pdf')}}" download="Okawe-Jeremy">Mon CV&ensp;<i class="fas fa-file-download"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                            <div class="image-container">
                                {{-- data-aos="fade-right" --}}
                                <div class="image-profil" onmouseover="playVideo()" onmouseout="pauseVideo()">
                                    <img src="{{ asset('portofolios/images/moi1.jpg') }}" alt="Photo de Jeremy" class="img-thumbnail image-ronde" />
                                    <div class="video-overlay">
                                        <video id="videoPlayer" class="video" controls>
                                            <source src="{{asset('glbal/mag.mp4')}}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <span>
                                <label for="" id="competences"></label>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade animated-modal" id="apropos" tabindex="-1" aria-labelledby="apropos" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header text-center exceptional-modal-header">
                    <h1 class="modal-title fs-5 text-center exceptional-modal-title" id="apropos">A propos de Moi</h1>
                    <button type="button" class="btn-close exceptional-btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>

                <div class="modal-body">
                    <div class="modal-description">
                        <div class="modal-bodydescription">
                            <div class="container-fluid">
                                <div class="row">
                                    <section>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="modal-content">
                                                    <div class="modal-content-titre">
                                                        <h3 class="text-center">
                                                            Moi
                                                        </h3>
                                                    </div>
                                                    <div class="modal-content-description">
                                                        <div class="modal-description-text">
                                                            <p>Bonjour/Bonsoir,<br> Je m'appelle OKAWE KOUMAKPAY Jeremy Yolas et j'ai 27 ans. Passionné par le développement depuis mon plus jeune âge, je suis aujourd'hui développeur full-stack, travaillant aussi bien en freelance qu'en entreprise.</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-content-titre">
                                                        <h3 class="text-center">
                                                            Ce que je Fais
                                                        </h3>
                                                    </div>
                                                    <div class="modal-content-description">
                                                        <div class="modal-description-text">
                                                            <p>En tant que développeur full-stack, je maîtrise un large éventail de technologies et de langages de programmation. Que ce soit pour la conception de sites web, le développement d'applications mobiles, ou la gestion de bases de données complexes, je suis capable de répondre à tous vos besoins. Mon expertise s'étend également à la création de chartes graphiques et d'animations spectaculaires pour rendre vos projets encore plus attractifs.</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-content-titre">
                                                        <h3 class="text-center">
                                                            Mon Expérience
                                                        </h3>
                                                    </div>
                                                    <div class="modal-content-description">
                                                        <div class="modal-description-text">
                                                            <p>Au fil des années, j'ai eu l'opportunité de collaborer avec diverses entreprises et startups, ce qui m'a permis d'affiner mes compétences et d'enrichir mon portfolio de réalisations variées. Chaque projet est pour moi une nouvelle occasion de relever des défis et de démontrer mon savoir-faire.</p>
                                                        </div>
                                                    </div>
                                                    <div class="modal-content-titre">
                                                        <h3 class="text-center">
                                                            Pourquoi Me Choisir?
                                                        </h3>
                                                    </div>
                                                    <div class="modal-content-description">
                                                        <div class="modal-description-text">
                                                            <p>
                                                                <ul>
                                                                    <li>
                                                                        Polyvalence : Grâce à ma formation et à mon expérience, je suis à même de gérer toutes les étapes d'un projet de développement, de la conception à la mise en ligne.
                                                                    </li>
                                                                    <li>
                                                                        Innovation : Toujours à la recherche de nouvelles tendances, je propose des solutions modernes et adaptées à vos besoins.
                                                                    </li>
                                                                    <li>
                                                                        Engagement : Mon objectif est de garantir la satisfaction de mes clients en fournissant des produits de haute qualité dans les délais impartis.
                                                                    </li>
                                                                </ul>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="modal-content">
                                                    <div class="modal-content-titre">
                                                        <h3 class="text-center">
                                                            MON PARCOURS
                                                        </h3>
                                                    </div>
                                                    <div class="modal-content-description">
                                                        <div class="modal-description-text">
                                                            <p>Après avoir obtenu ma licence en Analyse et Programmation à l'Institut de Management et des Sciences Appliquées, je n'ai cessé de me former et d'acquérir de nouvelles compétences pour rester à la pointe de la technologie. Cette quête constante de perfectionnement me permet de proposer des solutions innovantes et efficaces à mes clients. <br>Vous trouverez ci-dessous, un tableau OpenClassroom récapitulatif de ma progression :</p>
                                                            <div class="modal-openclassroom">
                                                                <img
                                                                    src="{{asset('portofolios/images/open.png')}}"
                                                                    alt=""
                                                                    class="img-fluid"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-content-titre">
                                                        <h3 class="text-center">
                                                            Contact
                                                        </h3>
                                                    </div>
                                                    <div class="modal-content-description">
                                                        <div class="modal-description-text">
                                                            <p>
                                                                N'hésitez pas à me contacter pour discuter de vos projets. Ensemble, nous pouvons créer quelque chose d'extraordinaire ! <br> Vous trouverez ci-dessous quelques moyens de me joindre :
                                                            </p>
                                                            <p>
                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-fb btn-round">
                                                                    <i class="fa  fa-phone-alt" style="color: #01070f"></i>
                                                                </button>
                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-fb btn-round">
                                                                    <i class="fab fa-whatsapp" style="color: #00ac2e"></i>
                                                                </button>
                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-fb btn-round">
                                                                    <i class="fab fa-facebook" style="color: #4800ff"></i>
                                                                </button>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer exceptional-modal-footer justify-content-between">
                    <button type="button" class="btn btn-secondary exceptional-btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
                    {{-- <button type="button" class="btn btn-primary exceptional-btn-save">Save changes</button> --}}
                </div>

            </div>
        </div>
    </div>
{{-- QUI JE SUIS FIN --}}
{{-- SCRIPT POUR LA VIDEO EN ARRIERRE PLAN DEBUT --}}
    <script>
        // Fonction pour démarrer la vidéo
        function playVideo() {
            var video = document.getElementById('videoPlayer');
            video.play();
        }

        // Fonction pour mettre en pause la vidéo
        function pauseVideo() {
            var video = document.getElementById('videoPlayer');
            video.pause();
        }
    </script>
{{-- SCRIP¨T POUR LA VIEDO EN ARRIERRE LAN FIN --}}
{{-- SRIPT PRESENTATION DE ANIMECSS DEBUT --}}
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Attendez que le DOM soit chargé pour afficher les animations
            document.querySelectorAll('.animate__animated').forEach(function(element) {
                element.style.visibility = 'visible';
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const elements = document.querySelectorAll('.animate__animated');

            elements.forEach(function(element, index) {
                setTimeout(function() {
                    element.classList.add('animate__visibility');
                }, index * 1000); // Délai de 1 seconde entre chaque élément
            });

            const bienvenuElement = document.querySelector('.bienvenu');
            const quiElement = document.querySelector('.qui');

        bienvenuElement.addEventListener('animationend', function() {
            if (bienvenuElement.classList.contains('animate__backInDown')) {
                bienvenuElement.classList.remove('animate__backInDown');
                bienvenuElement.classList.add('animate__swing');
            } else if (bienvenuElement.classList.contains('animate__swing')) {
                bienvenuElement.classList.remove('animate__swing');
                bienvenuElement.classList.add('animate__hinge');
            }
        });

            quiElement.addEventListener('animationend', function() {
                if (quiElement.classList.contains('animate__bounceInLeft')) {
                    quiElement.classList.remove('animate__bounceInLeft');
                    quiElement.classList.add('animate__fadeOutRight');
                }
            });
        });
    </script>
{{-- SCRIPT PRESENTATION DE ANIMECSS FIN --}}
