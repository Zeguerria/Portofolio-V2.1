




@extends('portofolios.menus.menu')
@section('titre')
Blog - {{ $post->title }}
@endsection
@section('header')
    <style>
        .card {
            border: 1px solid #ccc;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: border-color 0.3s ease; /* Transition de la couleur de la bordure */
        }
        hr{
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            border: 1px solid #ccc;
            transition: border-color 0.3s ease; /* Transition de la couleur de la bordure */
        }
        .card-header {
            position: relative;
            height: 80vh; /* Hauteur ajustée à 80% de la hauteur de la vue */
            overflow: hidden;
            padding: 0;
            text-align: center;
            color: white;
        }

        .card-header .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Overlay semi-transparent */
            z-index: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            opacity: 0;
            transition: opacity 0.3s ease, transform 0.3s ease; /* Transition de l'opacité et de la transformation */
            transform: translateY(20px); /* Décalage initial du texte */
        }

        .card-header:hover .overlay {
            opacity: 1;
            transform: translateY(0); /* Translation du texte au survol */
        }

        .card-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            position: relative;
            z-index: 0;
            transition: transform 1.5s ease; /* Transition du transform */
        }

        .card-header:hover .card-image {
            transform: scale(1.1); /* Agrandissement au survol */
        }

        .card-title {
            margin-bottom: 20px;
            font-size: 3em; /* Taille de police ajustée */
            text-transform: uppercase;
            font-family: "ElMessiri-SemiBold", sans-serif; /* Nom de police ajusté */
            transition: opacity 2s ease, transform 1s ease, color 4s ease; /* Transition de l'opacité et de la transformation */
            opacity: 0; /* Texte initialement invisible */
            transform: translateY(40px); /* Décalage initial du texte */
        }

        .card-header:hover .card-title {
            opacity: 1; /* Texte visible au survol */
            transform: translateY(0); /* Translation du texte au survol */
            color: #eae4e4; /* Couleur de texte au survol */
        }

        .card h4,
        .card p {
            font-family: "Montserrat-Medium", sans-serif; /* Nom de police ajusté */
        }

        .card:hover {
            border-color: #0d4140; /* Couleur de bordure au survol */
        }
        hr:hover {
            border-color: #0d4140; /* Couleur de bordure au survol */
        }
        /* Ajoutez ces styles à votre fichier CSS existant */
        .description {
            margin-top: 2px;
            padding: 20px;
        }

        .description h4 {
            color: #333;
            font-size: 2em;
            margin-bottom: 10px;
        }

        .description label {
            display: block;
            font-size: 1.2em;
            line-height: 1.6;
        }

        .description .card-text {
            margin-top: 10px;
            font-size: 0.9em;
            color: #888;
        }
        /* Styles pour l'animation avancée */

        .animated-text-container {
            overflow: hidden;
            position: relative;
            display: inline-block;
        }

        .animated-text {
            position: relative;
            display: inline-block;
            opacity: 0;
            transform: translateY(50px); /* Initial position for entrance */
            animation: textFadeIn 1s forwards cubic-bezier(0.25, 0.46, 0.45, 0.94); /* Animation definition */
        }

        @keyframes textFadeIn {
            0% {
                opacity: 0;
                transform: translateY(50px); /* Start position */
            }
            100% {
                opacity: 1;
                transform: translateY(0); /* End position */
            }
        }
        .card-text {
            opacity: 0;
            animation: fadeIn 1s forwards 0.5s ease-out; /* Delayed fade-in for additional info */
        }
        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }
        /* Additional styles for layout and aesthetics */
        #chat2 .form-control {
            border-color: transparent;
        }

        #chat2 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .comment-box {
            display: flex;
            width: 52%;
            margin-bottom: 1rem;
        }

        .comment-right {
            margin-left: auto;
            justify-content: flex-end;
            text-align: left;
        }

        .comment-left {
            justify-content: flex-start;
            text-align: left;
        }

        .comment-box img {
            width: 45px;
            height: 100%;
        }

        .comment-content {
            flex: 1;
            margin-left: 10px;
        }

        .comment-content.right {
            margin-left: 0;
            margin-right: 10px;
        }

        .comment-right img {
            margin-left: 10px;
        }

        .reply-form {
            margin-left: 50px;
            margin-top: 10px;
            width: 100%; /* Adapter la largeur sur les petits écrans */
        }

        .replies {
            display: none;
            margin-left: 50px;
            width: 100%; /* Adapter la largeur sur les petits écrans */
        }

        /* Pour tous les écrans, ajuste la taille du paragraphe de texte */
        .card-text {
            font-size: 0.9em;
        }

        .comment-body {
            font-size: 1.2em; /* Augmenter la taille de la police */
            line-height: 1.5; /* Augmenter la hauteur de ligne */
            transition: all 0.3s ease-in-out; /* Transition pour une animation fluide */
        }
        /* Animation au survol */
        .comment-body:hover {
            font-size: 1.3em; /* Augmenter encore plus la taille de la police au survol */
            line-height: 1.6; /* Ajuster la hauteur de ligne au survol */
            color: #333; /* Changer la couleur du texte au survol */
            background-color: rgba(0, 0, 0, 0.1); /* Changer la couleur de fond au survol */
        }

        .comment-meta {
            font-size: 0.9em; /* Taille de police par défaut */
        }

        .comment-meta .actions {
            display: flex;
            justify-content: space-between;
        }
        .btn-action {
            flex: 1; /* Make each button take an equal share of the available space */
            margin: 5px; /* Add margin for spacing between buttons */
        }

        .comment-meta a.btn,
        .comment-meta button.btn {
            font-size: 8px;
            width: auto; /* Laisser les boutons ajuster leur propre largeur */
            text-align: center; /* Centrer le texte dans les boutons */
            margin-top: 5px; /* Ajouter un espace au-dessus des boutons */
        }
        @media (max-width: 992px) {
            .animated-text {
                font-size: 1.2em; /* Ajustement de la taille du texte pour une meilleure lisibilité */
            }
        }


        @media (max-width: 768px) {

            .card-title {
                font-size: 2em; /* Réduire la taille de police pour les petits écrans */
            }
            .comment-box {
                width: 50%; /* Pour occuper toute la largeur sur les petits écrans */
                /* flex-direction: column; */
            }
            /* .small {
            font-size: 40%;
            font-weight: 200;} */
            .comment-meta span {
                width: 100%; /* Prendre toute la largeur */
                margin-bottom: 10px; /* Espacement en bas */
            }



            .comment-right {
                margin-left: 0;
                /* justify-content: flex-start;
                text-align: left; */

                margin-left: auto;
                justify-content: flex-end;
                text-align: left;
            }
            .comment-left {
                margin-left: 0;
                justify-content: flex-start;
                text-align: left;
            }

            .comment-right img,
            .comment-left img {
                margin-left: 0;
                margin-top: 10px;
            }

            .comment-content {
                margin-left: 0;
                margin-top: 10px;
            }

            .reply-form,
            .replies {
                margin-left: 0;
                width: 100%;
            }
            .comment-meta {
                font-size: 0.9em; /* Taille de police par défaut */
                display: flex; /* Utiliser Flexbox pour alignement */
                justify-content: space-between; /* Espacement entre les éléments */
                align-items: center; /* Centrer verticalement */
                flex-wrap: wrap; /* Permet de passer à la ligne sur petits écrans */
            }



            .comment-meta a.btn,
            .comment-meta button .actions {
                font-size: 8px;
                flex-direction: row; /* Ensure buttons are displayed in a row */
                flex-wrap: wrap; /* Allow buttons to wrap to the next line if necessary */
            }

            .comment-meta a.btn, .comment-meta button. .btn-action {
                font-size: 8px;
                flex: 1 1 48%; /* Adjust flex-basis to ensure buttons fit in two columns */
                max-width: 48%; /* Ensure buttons do not exceed 48% width */
            }


        }
        @media (max-width: 576px) {
            .animated-text {
                font-size: 1em; /* Ajustement supplémentaire pour une lisibilité maximale */
            }
            .comment-body {
                font-size: 1em; /* Taille de police pour les écrans plus petits */
            }
            .comment-meta a.btn,
            .comment-meta button .actions {
                font-size: 8px;
                flex-direction: row; /* Ensure buttons are displayed in a row */
                flex-wrap: wrap; /* Allow buttons to wrap to the next line if necessary */
            }

            .comment-meta a.btn, .comment-meta button. .btn-action {
                font-size: 8px;
                flex: 1 1 28%; /* Adjust flex-basis to ensure buttons fit in two columns */
                max-width: 28%; /* Ensure buttons do not exceed 48% width */
            }
        }

        @media screen and (max-width: 480px) {
            .card-header {
                height: 60vh; /* Réduire la hauteur pour une meilleure visibilité sur les petits écrans */
            }

            .card-title {
                font-size: 1.5em; /* Réduire encore la taille de police pour les écrans très petits */
            }
            .comment-meta a.btn,
            .comment-meta button .actions {
                font-size: 8px;
                flex-direction: row; /* Ensure buttons are displayed in a row */
                flex-wrap: wrap; /* Allow buttons to wrap to the next line if necessary */
            }

            .comment-meta a.btn, .comment-meta button. .btn-action {
                font-size: 4px;
                flex: 1 1 20%; /* Adjust flex-basis to ensure buttons fit in two columns */
                max-width: 20%; /* Ensure buttons do not exceed 48% width */
            }
        }

        .replies {
            display: none;
            margin-left: 50px;
        }





    </style>
    {{-- file --}}
    <style>

.file-upload{display:block;text-align:center;font-family: Helvetica, Arial, sans-serif;font-size: 12px;}
.file-upload .file-select{display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select .file-select-button{background:#dce4ec;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
.file-upload .file-select:hover{border-color:#34495e;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select:hover .file-select-button{background:#34495e;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select{border-color:#3fa46a;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload.active .file-select .file-select-button{background:#3fa46a;color:#FFFFFF;transition:all .2s ease-in-out;-moz-transition:all .2s ease-in-out;-webkit-transition:all .2s ease-in-out;-o-transition:all .2s ease-in-out;}
.file-upload .file-select input[type=file]{z-index:100;cursor:pointer;position:absolute;height:100%;width:100%;top:0;left:0;opacity:0;filter:alpha(opacity=0);}
.file-upload .file-select.file-select-disabled{opacity:0.65;}
.file-upload .file-select.file-select-disabled:hover{cursor:default;display:block;border: 2px solid #dce4ec;color: #34495e;cursor:pointer;height:40px;line-height:40px;margin-top:5px;text-align:left;background:#FFFFFF;overflow:hidden;position:relative;}
.file-upload .file-select.file-select-disabled:hover .file-select-button{background:#dce4ec;color:#666666;padding:0 10px;display:inline-block;height:40px;line-height:40px;}
.file-upload .file-select.file-select-disabled:hover .file-select-name{line-height:40px;display:inline-block;padding:0 10px;}
    </style>
@endsection

@section('corps')
    <div style="">
        {{-- MENU DEBUT --}}
            <section>
                <div class="">
                    <div class="">
                        <nav class="navbar navbar-expand-md fixed-top" id="navbar">
                            <!-- Contenu de la barre de navigation -->
                            <div class="container-fluid manav">
                                <!-- Supprimez cet élément -->
                                <!-- <div class="navbar navbar-expand-md"> -->
                                <a class="navbar-brand text-uppercase fw-bold" href="/PortoT.html"><span class="bg-info bg-gradient p-1 rounded-3 text-light">Okawe </span>Jeremy</a>
                                <button class="navbar-toggler nav-button" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link fw-bold trigger-animation" href="{{route('Portofolio')}}"><i class="fas fa-home"></i>&ensp;Retour</a>
                                        </li>
                                        <li class="nav-item dropdown">
                                            <a class="nav-link fw-bold dropdown-toggle" href="#" id="realisationDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-door-closed"></i>&ensp;Connexion
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="realisationDropdown">
                                                @if (Route::has('login'))
                                                @auth
                                                    @if(Auth::user()->profil_id == 3 || Auth::user()->profil_id == 2)
                                                        <li><a class="dropdown-item trigger-animation"  href="{{route('HomeAdmin')}}"><i class="fas fa-tachometer-alt"></i>&ensp;Admin</a></li>
                                                        <li><a class="dropdown-item"  href="#">
                                                            <form action="{{route('logout')}}" method="POST" class="d-flex align-items-center  p-0 pl-4">@csrf
                                                                <button type="submit" class="btn nav-link fw-bold d-flex align-items-center " style="background: none; border: none; diplay: flex; font-size : 16px;">
                                                                    <span class="" style="font-size: 12px">
                                                                        <i class="fas fa-door-closed"></i>&ensp;Logout
                                                                    </span>
                                                                </button>
                                                            </form>
                                                            </a>
                                                        </li>
                                                    @else
                                                        <li>
                                                            <a class="dropdown-item"  href="#">
                                                                <form action="{{route('logout')}}" method="POST" class="d-flex align-items-center  p-0 pl-4">@csrf
                                                                    <button type="submit" class="btn nav-link fw-bold d-flex align-items-center " style="background: none; border: none; diplay: flex; font-size : 16px;">
                                                                        <span class="" style="font-size: 12px">
                                                                            <i class="fas fa-door-closed"></i>&ensp;Logout
                                                                        </span>
                                                                    </button>
                                                                </form>
                                                            </a>
                                                        </li>
                                                    @endif
                                                @else
                                                    <li><a class="dropdown-item trigger-animation" href="{{route('login')}}"><i class="fas fa-door-open"></i>&ensp;Login</a></li>
                                                @endauth
                                            @endif
                                            
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </section>
        {{-- Menu FIN --}}
        <div class="container-fluid pt-4 pb-4" >
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 col-lg-12 col-xl-12">
                    <div class="card" id="chat2" style="background-color: #f0eaea">
                        <div class="card-header">
                            <img src="{{ asset($post->le_profil) }}" alt="Image-blog" class="card-image">
                            <div class="overlay">
                                <h1 class="card-title">{{ $post->title }}</h1>
                            </div>
                        </div>
                        <div class="card-body" >
                            <div class="container-fluid description">
                                <h4 class="text-center">Description</h4>
                                <div class="row pt-2">
                                    <div class="col-md-12">
                                        <div class="animated-text-container">
                                            <label for="post-content" class="animated-text">
                                                {{ $post->content }}
                                            </label>
                                        </div>
                                        <p class="card-text"><small class="text-muted">Publié par {{ $post->user->name }} en {{ $post->created_at->format('M d, Y') }}</small></p>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            @if (Route::has('login'))
                            @auth
                                {{-- Affichage des commentaires --}}
                                @forelse ($post->comments->where('parent_id', null) as $comment)
                                <div class="comment-box {{ Auth::id() == $comment->user_id ? 'comment-right' : 'comment-left' }} d-flex mb-4">
                                    @if(Auth::id() != $comment->user_id)
                                        <img src="{{ $comment->user->le_profil ?? 'default-avatar.png' }}" alt="avatar 1">
                                    @endif
                                    <div class="comment-content {{ Auth::id() == $comment->user_id ? 'right' : '' }}">
                                        <p class="small p-2 mb-1 comment-body {{ Auth::id() == $comment->user_id ? 'bg-primary justify-content-end' : 'bg-secondary justify-content-start' }} rounded-3">{{ $comment->body }}</p>

                                        <!-- Afficher la valeur de $comment->le_profil pour vérifier son contenu -->
                                        <p class="small p-1 mb-1 rounded-3">
                                            @if(!empty($comment->le_profil) && trim($comment->le_profil) !== '')
                                                <img src="{{ $comment->le_profil }}" alt="Image commentaire" style="width: 100px; height: 100px; object-fit: cover;">
                                            @endif
                                        </p>

                                        <p class="small text-muted d-flex justify-content-between align-items-center comment-meta">
                                            <span>
                                                Par : {{ $comment->user->name }} le {{ $comment->created_at->format('M d, Y') }}
                                            </span>
                                            <div class="actions ">
                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-link-fb ml-2 mesaction">
                                                    <i class="fas fa-edit mesactionicon mr-1"></i> Modifier
                                                </button>
                                                <form action="" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-link-fb ml-2 mesaction">
                                                        <i class="fas fa-trash-alt mesactionicon  mr-1"></i> Supprimer
                                                    </button>
                                                </form>
                                                <button  class="btn mr-md-2 mb-md-0 mb-2 btn-link-fb ml-2 mesaction toggle-replies" data-target="#replies-{{ $comment->id }}">
                                                    <i class="fas fa-reply-all mesactionicon mr-1"></i> Répondre<sup>({{ $comment->replies->count() }})</sup>
                                                </button>

                                            </div>
                                        </p>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                    <div id="replies-{{ $comment->id }}" class="replies" style="background-color: #eae4e4">
                                                        {{-- {{ Auth::id() == $reply->user_id ? 'comment-right' : 'comment-left' }} --}}
                                                        {{-- {{ Auth::id() == $comment->user_id ? 'bg-primary justify-content-end' : 'bg-secondary justify-content-start' }} --}}
                                                        @foreach ($comment->replies as $reply)
                                                            <div class="comment-box {{ Auth::id() == $reply->user_id ? 'comment-right' : 'comment-left' }} d-flex mb-4 p-3">
                                                                @if(Auth::id() != $reply->user_id)
                                                                    <img src="{{ $reply->user->le_profil ?? 'admins/dist/img/avatar.png' }}" alt="avatar 1">
                                                                @endif
                                                                <div class="comment-content ">
                                                                    <p class="small p-2 mb-1 rounded-3 {{ Auth::id() == $reply->user_id ? 'bg-primary justify-content-end' : 'bg-secondary justify-content-start' }}">{{ $reply->body }}</p>
                                                                    <p class="small text-muted">
                                                                            @if(!empty($reply->le_profil) && trim($reply->le_profil) !== '')
                                                                                <img src="{{ $reply->le_profil }}" alt="Image commentaire" style="width: 100px; height: 100px; object-fit: cover;">
                                                                            @endif
                                                                    </p>
                                                                    <p class="small text-muted">Par {{ $reply->user->name }} le {{ $reply->created_at->format('M d, Y') }}</p>
                                                                </div>
                                                                @if(Auth::id() == $reply->user_id)
                                                                    <img src="{{ $reply->user->le_profil ?? 'admins/dist/img/avatar.png' }}" alt="avatar 1">
                                                                @endif
                                                            </div>
                                                        @endforeach
                                                        <!-- Formulaire de réponse -->
                                                        <div class="container-fluid">
                                                                <div class="row">
                                                                    <div class="col-md-11 mx-auto">
                                                                        <form action="{{ route('comments.reply', $comment->id) }}" method="POST" class="reply-form" enctype="multipart/form-data" style="width: 60%;">
                                                                            @csrf
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for="replyBody" class="form-label"><i class="fa fas fa-keyboard msicons"></i>&ensp;Réponse</label>
                                                                                            <textarea class="form-control" id="replyBody" name="reply_body" rows="2" required placeholder="Répondre à ce commentaire"></textarea>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div>
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label for="customFile"><i class="fas fa-camera-retro msicons"></i>&ensp;Ajouter un fichier</label>
                                                                                                <div class="file-upload">
                                                                                                    <div class="file-select">
                                                                                                        <div class="file-select-button"  name="photo" id="fileName">Fichier</div>
                                                                                                        <div class="file-select-name"  name="photo" id="noFile">Aucun fichier</div>
                                                                                                        <input type="file" name="photo" id="chooseFile" accept=".png,.jpg,.jpeg,.avif">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="d-flex justify-content-center pb-4">
                                                                                <button type="submit" class="btn btnCustom mr-md-2 mb-md-0 mb-2 btn-outline-primary" >Envoyer&ensp;<i class="fas fa-file-download"></i></button>

                                                                                {{-- <button type="submit" class="btn btn-outline-primary mt-3">Envoyer</button> --}}


                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>




                                    </div>
                                    @if(Auth::id() == $comment->user_id)
                                        <img src="{{ $comment->user->le_profil ?? 'default-avatar.png' }}" alt="avatar 1">
                                    @endif
                                </div>

                                @empty
                                <p>Il n'y a aucun commentaire disponible !!!</p>
                                @endforelse
                            @else

                            @forelse ($post->comments->where('parent_id', null) as $comment)
                            <div class="comment-box {{ Auth::id() == $comment->user_id ? 'comment-right' : 'comment-left' }} d-flex mb-4">
                                @if(Auth::id() != $comment->user_id)
                                    <img src="{{ $comment->user->le_profil ?? 'default-avatar.png' }}" alt="avatar 1">
                                @endif
                                <div class="comment-content {{ Auth::id() == $comment->user_id ? 'right' : '' }}">
                                    <p class="small p-2 mb-1 comment-body {{ Auth::id() == $comment->user_id ? 'bg-primary justify-content-end' : 'bg-secondary justify-content-start' }} rounded-3">{{ $comment->body }}</p>

                                    <!-- Afficher la valeur de $comment->le_profil pour vérifier son contenu -->
                                    <p class="small p-1 mb-1 rounded-3">
                                        @if(!empty($comment->le_profil) && trim($comment->le_profil) !== '')
                                            <img src="{{ $comment->le_profil }}" alt="Image commentaire" style="width: 100px; height: 100px; object-fit: cover;">
                                        @endif
                                    </p>

                                    <p class="small text-muted d-flex justify-content-between align-items-center comment-meta">
                                        <span>
                                            Par : {{ $comment->user->name }} le {{ $comment->created_at->format('M d, Y') }}
                                        </span>
                                        <div class="actions ">
                                            <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-link-fb ml-2 mesaction">
                                                <i class="fas fa-edit mesactionicon mr-1"></i> Modifier
                                            </button>
                                            <form action="" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-link-fb ml-2 mesaction">
                                                    <i class="fas fa-trash-alt mesactionicon  mr-1"></i> Supprimer
                                                </button>
                                            </form>
                                            <button  class="btn mr-md-2 mb-md-0 mb-2 btn-link-fb ml-2 mesaction toggle-replies" data-target="#replies-{{ $comment->id }}">
                                                <i class="fas fa-reply-all mesactionicon mr-1"></i> Répondre<sup>({{ $comment->replies->count() }})</sup>
                                            </button>

                                        </div>
                                    </p>
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                <div id="replies-{{ $comment->id }}" class="replies" style="background-color: #eae4e4">
                                                    {{-- {{ Auth::id() == $reply->user_id ? 'comment-right' : 'comment-left' }} --}}
                                                    {{-- {{ Auth::id() == $comment->user_id ? 'bg-primary justify-content-end' : 'bg-secondary justify-content-start' }} --}}
                                                    @foreach ($comment->replies as $reply)
                                                        <div class="comment-box {{ Auth::id() == $reply->user_id ? 'comment-right' : 'comment-left' }} d-flex mb-4 p-3">
                                                            @if(Auth::id() != $reply->user_id)
                                                                <img src="{{ $reply->user->le_profil ?? 'admins/dist/img/avatar.png' }}" alt="avatar 1">
                                                            @endif
                                                            <div class="comment-content ">
                                                                <p class="small p-2 mb-1 rounded-3 {{ Auth::id() == $reply->user_id ? 'bg-primary justify-content-end' : 'bg-secondary justify-content-start' }}">{{ $reply->body }}</p>
                                                                <p class="small text-muted">
                                                                        @if(!empty($reply->le_profil) && trim($reply->le_profil) !== '')
                                                                            <img src="{{ $reply->le_profil }}" alt="Image commentaire" style="width: 100px; height: 100px; object-fit: cover;">
                                                                        @endif
                                                                </p>
                                                                <p class="small text-muted">Par {{ $reply->user->name }} le {{ $reply->created_at->format('M d, Y') }}</p>
                                                            </div>
                                                            @if(Auth::id() == $reply->user_id)
                                                                <img src="{{ $reply->user->le_profil ?? 'admins/dist/img/avatar.png' }}" alt="avatar 1">
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                    <!-- Formulaire de réponse -->
                                                    <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-md-11 mx-auto">
                                                                    <form action="{{ route('comments.reply', $comment->id) }}" method="POST" class="reply-form" enctype="multipart/form-data" style="width: 60%;">
                                                                        @csrf
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label for="replyBody" class="form-label"><i class="fa fas fa-keyboard msicons"></i>&ensp;Réponse</label>
                                                                                        <textarea class="form-control" id="replyBody" name="reply_body" rows="2" required placeholder="Répondre à ce commentaire"></textarea>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div>
                                                                                    <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label for="customFile"><i class="fas fa-camera-retro msicons"></i>&ensp;Ajouter un fichier</label>
                                                                                            <div class="file-upload">
                                                                                                <div class="file-select">
                                                                                                    <div class="file-select-button"  name="photo" id="fileName">Fichier</div>
                                                                                                    <div class="file-select-name"  name="photo" id="noFile">Aucun fichier</div>
                                                                                                    <input type="file" name="photo" id="chooseFile" accept=".png,.jpg,.jpeg,.avif">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="d-flex justify-content-center pb-4">
                                                                            <button type="submit" class="btn btnCustom mr-md-2 mb-md-0 mb-2 btn-outline-primary" >Envoyer&ensp;<i class="fas fa-file-download"></i></button>

                                                                            {{-- <button type="submit" class="btn btn-outline-primary mt-3">Envoyer</button> --}}


                                                                        </div>
                                                                    </form>

                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>




                                </div>
                                @if(Auth::id() == $comment->user_id)
                                    <img src="{{ $comment->user->le_profil ?? 'admins/dist/img/avatar.png' }}" alt="avatar 1">
                                @endif
                            </div>

                            @empty
                                <p>Il n'y a aucun commentaire disponible !!!</p>
                            @endforelse
                            @endauth
                        @endif

                        </div>
                        <div class="card-footer text-muted d-flex justify-content-start align-items-center p-1 pl-4 pb-4">
                            <form action="{{ route('comments.store', $post) }}" method="POST" class="d-flex flex-wrap align-items-center w-100 pl-4 p-3" enctype="multipart/form-data">
                                <div class="d-flex align-items-center me-2 mb-2 mb-md-0">
                                    @if (Route::has('login'))
                                        @auth
                                            <img src="{{ auth()->user()->le_profil ?? 'admins/dist/img/avatar.png' }}" alt="avatar 3" style="width: 40px; height: 40px; object-fit: cover;">
                                        @else
                                            <img src="{{asset('admins/dist/img/avatar.png')}}" alt="avatar 3" style="width: 40px; height: 40px; object-fit: cover;">
                                        @endauth
                                    @endif
                                </div>
                                @csrf
                                <div class="d-flex flex-grow-1 me-2 mb-2 mb-md-0">
                                    <input type="text" name="body" class="form-control form-control-lg" placeholder="Type message">
                                </div>
                                <div class="d-flex align-items-center ms-1 mb-2 mb-md-0">
                                    <label for="photo" style="cursor: pointer;" class="mb-0">
                                        <i class="fas fa-paperclip"></i>
                                    </label>
                                    <input type="file" name="photo" id="photo" class="d-none">
                                </div>
                                <div class="d-flex align-items-center ms-2 mb-2 mb-md-0">
                                    <button type="submit" class="btn ">
                                        <i class="fas fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>




                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
<script>
    document.querySelectorAll('.toggle-replies').forEach(button => {
        button.addEventListener('click', () => {
            const target = document.querySelector(button.getAttribute('data-target'));
            if (target.style.display === 'none' || target.style.display === '') {
                target.style.display = 'block';
                button.textContent = 'Fermer';
            } else {
                target.style.display = 'none';
                button.textContent = 'Répondre (' + target.querySelectorAll('.comment-box').length + ')';
            }
        });
    });
</script>


{{-- file --}}
<script>
    $('#chooseFile').bind('change', function () {
    var filename = $("#chooseFile").val();
    if (/^\s*$/.test(filename)) {
        $(".file-upload").removeClass('active');
        $("#noFile").text("No file chosen...");
    }
    else {
        $(".file-upload").addClass('active');
        $("#noFile").text(filename.replace("C:\\fakepath\\", ""));
    }
    });
</script>
@endsection
