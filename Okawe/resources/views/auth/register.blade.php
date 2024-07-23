{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}



{{-- <!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Formulaire d'Inscription avec Animation de Bouton</title>
<style>
    body {
        font-family: "Arial", sans-serif;
        background-color: #f0f0f0;
    }
    .wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .form-container {
        width: 400px;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        position: relative;
    }
    .form-control {
        width: 100%;
        height: 40px;
        margin-bottom: 15px;
        padding: 0 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    .button-container {
        text-align: center;
        position: relative;
        height: 50px; /* Height of the button container */
    }
    button {
        width: 100px;
        height: 40px;
        background-color: #4CAF50;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        position: absolute;
        left: calc(50% - 50px); /* Start at the center */
        transition: left 0.1s ease;
    }
</style>
</head>
<body>
<div class="wrapper">
    <div class="form-container">
        <h2>Formulaire d'Inscription</h2>
        <form id="registration-form">
            <input type="password" id="password" class="form-control" placeholder="Mot de passe">
            <input type="password" id="confirm_password" class="form-control" placeholder="Confirmer le mot de passe">
            <div class="button-container">
                <button id="register-button">Valider</button>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    const registerButton = document.getElementById('register-button');
    let animationInterval = null;
    let moveRight = true;

    function isPasswordValid() {
        return passwordField.value.length >= 8 && confirmPasswordField.value.length >= 8;
    }

    function moveButton() {
        if (!animationInterval) {
            animationInterval = setInterval(() => {
                const buttonWidth = registerButton.offsetWidth;
                const containerWidth = registerButton.parentNode.offsetWidth;
                const maxLeft = containerWidth - buttonWidth;

                let currentLeft = parseInt(window.getComputedStyle(registerButton).left, 10);

                if (isNaN(currentLeft)) {
                    currentLeft = containerWidth / 2 - buttonWidth / 2;
                }

                if (!isPasswordValid()) {
                    if (moveRight) {
                        currentLeft += 20; // Increase the movement distance to make it faster
                        if (currentLeft >= maxLeft) {
                            currentLeft = maxLeft;
                            moveRight = false;
                        }
                    } else {
                        currentLeft -= 20; // Increase the movement distance to make it faster
                        if (currentLeft <= 0) {
                            currentLeft = 0;
                            moveRight = true;
                        }
                    }
                    registerButton.style.left = currentLeft + 'px';
                } else {
                    clearInterval(animationInterval);
                    animationInterval = null;
                    registerButton.style.left = 'calc(50% - 50px)';
                }
            }, 50); // Decrease the interval time to make it faster
        }
    }

    registerButton.addEventListener('mouseenter', moveButton);
    registerButton.addEventListener('mouseleave', () => {
        if (!isPasswordValid()) {
            moveButton();
        } else {
            clearInterval(animationInterval);
            animationInterval = null;
            registerButton.style.left = 'calc(50% - 50px)';
        }
    });
});
</script>
</body>
</html> --}}


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ asset('registers/fonts/linearicons/style.css') }}">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('registers/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <style>

    </style>
</head>
<body>

<div class="wrapper">
    <div class="inner">
        <img src="{{ asset('registers/images/image-1.png') }}" alt="" class="image-1">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <h3>New Account?</h3>
            <!-- Alert window for password validation -->
            <div class="alert-window" id="alert-window">
                <p id="alert-message"></p>
            </div>
            <div class="form-holder">
                <span class="lnr lnr-user"></span>
                <input type="text" class="form-control" placeholder="Noms" name="name" :value="old('name')" required autofocus autocomplete="name">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-sort-alpha-asc"></span>
                <input type="text" class="form-control" placeholder="Prénoms" name="prenom" :value="old('prenom')" autocomplete="prenom">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-envelope"></span>
                <input type="email" class="form-control" placeholder="Mail" id="email" name="email" :value="old('email')" required autocomplete="username">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-holder">
                <div class="file-upload">
                    <div class="file-select">
                        <div class="file-select-button" name="photo" id="fileName">Photo</div>
                        <div class="file-select-name" name="photo" id="noFile">Aucun fichier</div>
                        <input type="file" name="photo" id="chooseFile" accept=".png,.jpg,.jpeg,.avif">
                    </div>
                </div>
            </div>
            <div class="form-holder">
                <div class="terms-container">
                    <label class="checkbox-container">
                        <input type="checkbox" id="terms-checkbox" name="terms" >
                        <span class="checkmark"></span>
                    </label>
                    <div class="terms-label-container">
                        <label for="terms-checkbox" class="terms-label">I agree</label> to the
                        <a href="#">Terms</a> and <a href="#">Conditions</a>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button id="register-button" type="submit">Valider</button>
            </div>
            <div class="already-account" id="already-account">
                <p>Already have an account? <a href="{{ route('login') }}" class="login">Sign in</a></p>
            </div>
        </form>
        <img src="{{ asset('registers/images/image-2.png') }}" alt="" class="image-2">
    </div>
</div>

<script src="{{ asset('registers/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('registers/js/main.js') }}"></script>
<script>
   
</script>

</body>
</html> --}}

@extends('auth.animationlayouts')
 <!-- LINEARICONS -->
 <link rel="stylesheet" href="{{ asset('registers/fonts/linearicons/style.css') }}">
 <!-- STYLE CSS -->
 <link rel="stylesheet" href="{{ asset('registers/css/style.css') }}">

@section('content')
<div class="wrapper">
    <div class="inner">
        <img src="{{ asset('registers/images/image-1.png') }}" alt="" class="image-1">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
            <h3>CREER UN COMPTE</h3>
            <!-- Alert window for password validation -->
            <div class="alert-window" id="alert-window">
                <p id="alert-message"></p>
            </div>
            <div class="form-holder">
                <span class="lnr lnr-user"></span>
                <input type="text" class="form-control" placeholder="Noms" name="name" :value="old('name')" required autofocus autocomplete="name">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-sort-alpha-asc"></span>
                <input type="text" class="form-control" placeholder="Prénoms" name="prenom" :value="old('prenom')" autocomplete="prenom">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-envelope"></span>
                <input type="email" class="form-control" placeholder="Mail" id="email" name="email" :value="old('email')" required autocomplete="username">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" id="password" class="form-control" placeholder="Password" name="password" required autocomplete="new-password">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" class="form-control" placeholder="Confirm Password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
            </div>
            <div class="form-holder">
                <div class="file-upload">
                    <div class="file-select">
                        <div class="file-select-button" name="photo" id="fileName">Photo</div>
                        <div class="file-select-name" name="photo" id="noFile">Aucun fichier</div>
                        <input type="file" name="photo" id="chooseFile" accept=".png,.jpg,.jpeg,.avif">
                    </div>
                </div>
            </div>
            <div class="form-holder">
                <div class="terms-container">
                    <label class="checkbox-container">
                        <input type="checkbox" id="terms-checkbox" name="terms" >
                        <span class="checkmark"></span>
                    </label>
                    <div class="terms-label-container">
                        <label for="terms-checkbox" class="terms-label">I agree</label> to the
                        <a href="#">Terms</a> and <a href="#">Conditions</a>
                    </div>
                </div>
            </div>
            <div class="button-container">
                <button id="register-button" type="submit">Valider</button>
            </div>
            <div class="already-account" id="already-account">
                <p>Avez-vous déjà un compte ? <a href="{{ route('login') }}" class="login trigger-animation">Sign in</a></p>
            </div>
        </form>
        <img src="{{ asset('registers/images/image-2.png') }}" alt="" class="image-2">
    </div>
</div>
<script src="{{ asset('registers/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('registers/js/main.js') }}"></script>
<script>
   
</script>
@endsection



{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Animated Button with Password Validation</title>
    <!-- LINEARICONS -->
    <link rel="stylesheet" href="{{ asset('registers/fonts/linearicons/style.css') }}">
    <!-- STYLE CSS -->
    <link rel="stylesheet" href="{{ asset('registers/css/style.css') }}">
    <style>
        .alert-window {
            margin-top: 20px;
            background-color: rgba(255, 0, 0, 0.8);
            color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            display: none; /* Hidden by default */
            animation: fadeInOut 0.5s ease-in-out;
        }

        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: scale(0.8);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
    </style>
    @livewireStyles
</head>
<body>

<div class="wrapper">
    <div class="inner">
        <img src="{{ asset('registers/images/image-1.png') }}" alt="" class="image-1">
        <form id="registration-form" onsubmit="return validateFormBeforeSubmit(event)">
            <h3>New Account?</h3>
            <div class="alert-window" id="alert-window">
                <p id="alert-message"></p>
            </div>
            <div class="form-holder">
                <span class="lnr lnr-user"></span>
                <input type="text" class="form-control" placeholder="Username">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-phone-handset"></span>
                <input type="text" class="form-control" placeholder="Phone Number">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-envelope"></span>
                <input type="text" id="email" class="form-control" placeholder="Mail">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" id="password" class="form-control" placeholder="Password">
            </div>
            <div class="form-holder">
                <span class="lnr lnr-lock"></span>
                <input type="password" id="confirm_password" class="form-control" placeholder="Confirm Password">
            </div>
            <div class="button-container">
                <button id="register-button" disabled>Valider</button>
            </div>
        </form>
        <img src="{{ asset('registers/images/image-2.png') }}" alt="" class="image-2">
    </div>
</div>

<script src="{{ asset('registers/js/jquery-3.3.1.min.js') }}"></scrip>
<script src="{{ asset('registers/js/main.js') }}"></script>
@livewireScripts
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm_password');
        const emailField = document.getElementById('email');
        const registerButton = document.getElementById('register-button');
        const alertWindow = document.getElementById('alert-window');
        const alertMessage = document.getElementById('alert-message');
        let animationInterval = null;
        let moveRight = true;

        function isPasswordValid() {
            return passwordField.value.length >= 8 && confirmPasswordField.value.length >= 8;
        }

        function arePasswordsMatching() {
            return passwordField.value === confirmPasswordField.value;
        }

        function showAlert(message) {
            alertMessage.innerText = message;
            alertWindow.style.display = 'block';
        }

        function hideAlert() {
            alertWindow.style.display = 'none';
        }

        async function checkEmailExists() {
            const response = await fetch('/check-email', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ email: emailField.value })
            });
            const data = await response.json();
            return data.exists;
        }

        async function validateFormBeforeSubmit(event) {
            event.preventDefault();
            hideAlert();
            const emailExists = await checkEmailExists();
            if (emailExists) {
                showAlert('Cette adresse e-mail est déjà utilisée.');
                registerButton.disabled = true;
                return false;
            } else if (!isPasswordValid()) {
                showAlert('Le mot de passe doit comporter au moins 8 caractères.');
                registerButton.disabled = true;
                return false;
            } else if (!arePasswordsMatching()) {
                showAlert('Les mots de passe ne correspondent pas.');
                registerButton.disabled = true;
                return false;
            } else {
                hideAlert();
                registerButton.disabled = false;
                document.getElementById('registration-form').submit();
            }
            return false;
        }

        passwordField.addEventListener('input', validatePasswords);
        confirmPasswordField.addEventListener('input', validatePasswords);
        emailField.addEventListener('input', validatePasswords);
    });
</script>

</body>
</html> --}}

