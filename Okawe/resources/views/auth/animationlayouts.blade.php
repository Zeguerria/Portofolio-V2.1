<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('glbal/animecss/animate.min.css') }}">
    <style>
        /* Styles pour l'animation trou noir */
        .blackhole {
            position: fixed;
            top: 50%;
            left: 50%;
            width: 10px;
            height: 10px;
            background: black;
            border-radius: 50%;
            transform: translate(-50%, -50%) scale(0);
            transition: transform 1s ease-in-out;
            z-index: 1000;
        }
        .blackhole.expand {
            transform: translate(-50%, -50%) scale(500);
        }

        .blackhole.shrink {
            transform: translate(-50%, -50%) scale(0);
        }
        /* ANIMATION CSS POUR LE TEXTE DEBUT */
        /* Classes pour contrôler la visibilité */
/* Classes pour contrôler la visibilité */
.connConnexion, .exionConnexion {
    visibility: hidden; /* Cache les éléments initialement */
}

/* Styles d'animation spécifiques */
.animate__animated {
    visibility: visible !important; /* Rend les éléments visibles une fois les animations déclenchées */
}
 

        /* ANIMATION CSS POUR LE TEXTE FIN */

    </style>
</head>
<body>

<div class="blackhole-wrapper">
    <div id="blackhole" class="blackhole"></div>
</div>

@yield('content')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const blackhole = document.getElementById('blackhole');
        const triggerButtons = document.querySelectorAll('.trigger-animation');

        triggerButtons.forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                const href = this.getAttribute('href');

                // Début de l'animation de transition
                blackhole.classList.add('expand');

                setTimeout(() => {
                    // Redirection après l'animation de rétraction
                    window.location.href = href;
                }, 1000); // Durée de l'animation d'expansion
            });
        });

        window.addEventListener('pageshow', function () {
            blackhole.classList.remove('expand', 'shrink');
        });

        // 
        // 
        


    });
</script>


</body>
</html>
