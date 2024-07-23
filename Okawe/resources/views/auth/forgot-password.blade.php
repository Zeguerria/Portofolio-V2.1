{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


@extends('auth.animationlayouts')
    <!-- LINEARICONS -->
    {{-- <link rel="stylesheet" href="{{ asset('registers/fonts/linearicons/style.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('logins/css/font.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('logins/css/icon.css') }}"> --}}
    <link rel="stylesheet" href="{{asset('portofolios/font-awesome/css/font-awesome.min.css')}}" />
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> --}}
	{{-- <link rel="stylesheet" href="{{asset('logins/css/style.css')}}"> --}}
    <style>
        /* Styles spécifiques pour la carte exceptionnelle */
       /* Global styles */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color:linear-gradient(90deg,#E5E3E2,#F6F7F9, #E5E3E2);
            font-family: Arial, sans-serif;
        }

        button,a {
            text-decoration: none;
        }

        /* Exceptional card styles */
        .exceptional-card {
            width: 90%;
            max-width: 300px;
            background: #fff;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .exceptional-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.3);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            font-size: 1.25rem;
        }

        .card-body {
            padding: 20px;
        }

        .card-text {
            margin-bottom: 20px;
            font-size: 1rem;
        }

        .form-outline {
            position: relative;
            margin-bottom: 20px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 2px solid #007bff;
            border-radius: 25px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #6610f2;
            box-shadow: 0 0 10px rgba(102, 16, 242, 0.5);
            outline: none;
        }

        .form-label {
            position: absolute;
            top: -10px;
            left: 15px;
            background: white;
            padding: 0 5px;
            color: #007bff;
            font-size: 0.75rem;
            pointer-events: none;
        }

        button.btn {
            display: inline-block;
            width: 100%;
            padding: 10px 20px;
            border: none;
            border-radius: 25px;
            background: linear-gradient(135deg, #007bff, #6610f2);
            color: white;
            font-weight: bold;
            text-align: center;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .btn:hover {
            background: linear-gradient(135deg, #6610f2, #007bff);
            transform: scale(1.05);
        }

        .links {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .link {
            color: #007bff;
            transition: color 0.3s ease, text-decoration 0.3s ease;
        }

        .link:hover {
            color: #6610f2;
            text-decoration: underline;
        }

        /* Responsive Styles */
        @media (min-width: 576px) {
            .exceptional-card {
                max-width: 400px;
            }
        }

        @media (min-width: 768px) {
            .exceptional-card {
                max-width: 500px;
            }
        }

        @media (min-width: 992px) {
            .exceptional-card {
                max-width: 600px;
            }
        }

        @media (min-width: 1200px) {
            .exceptional-card {
                max-width: 700px;
            }
        }

    </style>

@section('content')
<div class="exceptional-card">
    <div class="card-header">Réinitialisation du mot de passe</div>
    <div class="card-body">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <p class="card-text">
                Enter votre adresse email et nous vous enverrons des instruction a suivre pour réinitialiser votre mot de passe.
            </p>
            <div class="form-outline">
                <input type="email" id="typeEmail" class="form-control" name="email"  required autofocus autocomplete="email" />
                <label class="form-label" for="typeEmail"><i class="fa fa-unlock-alt"></i>&ensp;Email</label>
            </div>
            <button type="submit" class="btn">Réinitialiser</button>
            <div class="links">
                <a href="{{route('register')}}" class="link trigger-animation">Connexion</a>
                <a href="{{route('register')}}" class="link trigger-animation">Créer un compte</a>
            </div>
        </form>
    </div>
</div>
{{-- <script src="{{asset('logins/js/jquery.min.js')}}"></script>
<script src="{{asset('logins/js/popper.js')}}"></script>
<script src="{{asset('logins/js/bootstrap.min.js')}}"></script>
<script src="{{asset('logins/js/main.js')}}"></script> --}}
@endsection