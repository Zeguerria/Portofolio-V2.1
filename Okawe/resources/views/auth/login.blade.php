{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}
@include('sweetalert::alert')
@extends('auth.animationlayouts')
 <!-- LINEARICONS -->
 <link rel="stylesheet" href="{{ asset('registers/fonts/linearicons/style.css') }}">
 <link rel="stylesheet" href="{{ asset('logins/css/font.css') }}">
 <link rel="stylesheet" href="{{ asset('logins/css/icon.css') }}">
 <link rel="stylesheet" href="{{asset('portofolios/font-awesome/css/font-awesome.min.css')}}" />
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>



	<link rel="stylesheet" href="{{asset('logins/css/style.css')}}">

@section('content')

    <style>
       /* Classes pour contrôler la visibilité */
.connConnexion, .exionConnexion {
    visibility: hidden; /* Cache les éléments initialement */
}

/* Styles d'animation spécifiques */
.animate__animated {
    visibility: visible !important; /* Rend les éléments visibles une fois les animations déclenchées */
}

    </style>


    <section class="ftco-section">
		<div class="container">

			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex ">
						<div class="img" id="backgroundImage" >
			            </div>
						<div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100 mb-4">
                                    <h3 class="mb-4">
                                        <span id="connConnexion" class="connConnexion">CONN</span><span id="exionConnexion" class="exionConnexion">EXION</span>
                                    </h3>


                                </div>
                                <div class="w-100">
                                    <p class="social-media d-flex justify-content-end">
                                        <a href="{{route('Portofolio')}}" class="social-icon d-flex align-items-center justify-content-center trigger-animation" data-toggle="tooltip" data-placement="bottom" title="Acceuil"><span class="fa fa-home"></span></a>
                                        <a href="#" class="social-icon d-flex align-items-center justify-content-center" data-toggle="tooltip" data-placement="bottom" title="Contact"><span class="fa fa-phone"></span></a>
                                    </p>
                                </div>
                            </div>
							<form method="POST" action="{{ route('login') }}" class="signin-form">
                                @csrf
                                <div class="alert-window" id="alert-window">
                                    <p id="alert-message"></p>
                                </div>
                                <div class="form-holder form-group mb-3">
                                    <span class="lnr lnr-envelope"></span>
                                    <input type="email" class="form-control" placeholder="Mail" id="email" name="email" :value="old('email')" required autocomplete="username">
                                </div>
                                <div class="form-holder form-group mb-3">
                                    <span class="lnr lnr-lock"></span>
                                    <input type="password" id="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
                                </div>
                                <div class="button-container">
                                    <button id="login-button" type="submit">Valider</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                                <input type="checkbox" checked id="remember_me" name="remember">
                                                <span class="checkmark"></span>
										</label>
									</div>
									<div class="w-50 text-md-right">
                                        @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="trigger-animation">Mot de passe oblié</a>
                                        @endif
									</div>
		                        </div>
		                    </form>
		                    <p class="text-center">Vous n'avez pas de compte ? Créer un <a class="trigger-animation" href="{{route('register')}}" data-toggle="tooltip" data-placement="bottom" title="Creer un compte">Compte</a></p>
		                </div>
                        <div class="cover-wrap">

                        </div>
		            </div>
				</div>
			</div>
		</div>
	</section>


    <script src="{{asset('logins/js/jquery.min.js')}}"></script>
  <script src="{{asset('logins/js/popper.js')}}"></script>
  <script src="{{asset('logins/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('logins/js/main.js')}}"></script>
  <script>
    // Fonction pour changer l'image de fond en fonction de la largeur de la fenêtre
    function changeBackgroundImage() {
        // Sélectionne la div avec l'id 'backgroundImage'
        const imgDiv = document.getElementById('backgroundImage');

        // Vérifie si la largeur de la fenêtre est inférieure à 768 pixels
        if (window.innerWidth < 768) {
            // Si oui, change l'image de fond pour 'bg-2.png'
            imgDiv.style.backgroundImage = 'url("{{ asset('logins/images/bg-2.jpg') }}")';
        } else {
            // Sinon, utilise 'bg-1.png' comme image de fond
            imgDiv.style.backgroundImage = 'url("{{ asset('logins/images/bg-1.png') }}")';
        }
    }

    // Appelle la fonction pour changer l'image de fond lors du chargement de la page
    changeBackgroundImage();

    // Ajoute un écouteur d'événements pour appeler la fonction chaque fois que la fenêtre est redimensionnée
    window.addEventListener('resize', changeBackgroundImage);
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    const connConnexion = document.getElementById('connConnexion');
    const exionConnexion = document.getElementById('exionConnexion');

    // Ajoutez un délai pour que les animations soient visibles et synchronisées
    setTimeout(function() {
        connConnexion.classList.add('animate__animated', 'animate__backInLeft');
        exionConnexion.classList.add('animate__animated', 'animate__backInRight');
    }, 100); // Ajustez ce délai si nécessaire
});

</script>


{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const loginButton = document.getElementById('login-button');
        const alertWindow = document.getElementById('alert-window');
        const alertMessage = document.getElementById('alert-message');

        function isPasswordValid() {
            return passwordField.value.length >= 8;
        }

        function validatePassword() {
            if (passwordField.value.length === 0) {
                loginButton.disabled = true;
                alertWindow.style.display = 'none';
            } else if (!isPasswordValid()) {
                loginButton.disabled = true;
                alertWindow.style.display = 'block';
                alertMessage.innerText = 'Le mot de passe doit comporter au moins 8 caractères.';
            } else {
                loginButton.disabled = false;
                alertWindow.style.display = 'none';
            }
        }

        // Validate password on input change
        passwordField.addEventListener('input', validatePassword);

        // Validate password on page load
        validatePassword();

        // Animation d'entrée pour le lien "Already have an account?"
        const alreadyAccount = document.getElementById('already-account');
        setTimeout(() => {
            alreadyAccount.style.opacity = '1';
            alreadyAccount.style.transition = 'opacity 0.5s';
        }, 500);
    });
</script> --}}
<script>
   document.addEventListener('DOMContentLoaded', function() {
    const connConnexion = document.getElementById('connConnexion');
    const exionConnexion = document.getElementById('exionConnexion');

    // Ajoutez un délai pour que les animations soient visibles et synchronisées
    setTimeout(function() {
        connConnexion.classList.add('animate__animated', 'animate__backInLeft');
        exionConnexion.classList.add('animate__animated', 'animate__backInRight');
    }, 100); // Ajustez ce délai si nécessaire
});

</script>
@endsection
