{{-- LIENS CSS DEBUT --}}
<link rel="stylesheet" href="{{asset('portofolios/swipers/swiper-bundle-min.css')}}">
<link rel="stylesheet" href="{{asset('portofolios/swipers/animate.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
<link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
  />
<style>
    /* Styles pour le carrousel et ses éléments */
            .swiper-container {
                width: 100%;
                max-width: 1200px; /* Limiter la largeur du carrousel à 1200px */
                margin: 0 auto; /* Centrer le carrousel horizontalement */
                overflow: hidden; /* Cacher le débordement du carrousel */
                position: relative; /* Position relative pour les boutons de navigation */
            }

            .swiper-slide {
                width: calc(100% / 3); /* Afficher trois slides par ligne par défaut */
                box-sizing: border-box;
                padding: 0 10px; /* Espacement entre les slides */
            }

            .blog-item {
                margin-bottom: 20px;
                background-color: #f8f9fa;
                border-radius: 5px;
                padding: 20px;
            }

            .blog-img img {
                max-width: 100%;
                height: auto;
                border-radius: 5px;
            }

            .blog-title {
                font-size: 18px;
                font-weight: bold;
                margin-bottom: 10px;
            }

            .blog-description {
                font-size: 14px;
                margin-bottom: 10px;
            }


            .swiper-button-next {
                right: 5px;
            }
            .swiper-button-prev,
            .swiper-button-next {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                width: 50px;
                height: 50px;
                background-color: rgba(0, 0, 0, 0.5);
                color: #ffffff;
                border-radius: 50%;
                /* z-index: 1000; */
                cursor: pointer;
                display: flex;
                justify-content: center;
                align-items: center;
            }
        .custom-carousel-button {
            width: 40px;
            height: 40px;
            background-color: rgba(0, 0, 0, 0.5);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            font-size: 24px; /* Ajustez la taille de la flèche */
        }
        .custom-carousel-button:hover {
         /* Styles au survol */
            background-color: rgba(0, 0, 0, 0.7); /* Nouvelle couleur de fond au survol */
        }

        .custom-carousel-button::before {
            content: ""; /* Flèche vers la gauche */
        }

        .custom-carousel-button::after {
            content: ""; /* Flèche vers la droite */
        }

    /* Styles pour le bouton précédent */
        .swiper-button-prev {
            left: 5px; /* Définir une marge à gauche pour positionner le bouton précédent */
        }

    /* Styles pour le bouton suivant */
        .swiper-button-next {
            right: 5px; /* Définir une marge à droite pour positionner le bouton suivant */
        }






    /* Styles pour la réactivité */
        @media (max-width: 992px) {
            .swiper-slide {
                width: calc(100% / 2); /* Afficher deux slides par ligne sur les écrans de taille moyenne */
            }
        }

        @media (max-width: 576px) {
            .swiper-slide {
                width: 100%; /* Afficher un seul slide par ligne sur les écrans encore plus petits */
            }
        }

    /* CSS DU EN CONTNU DU BLOG  DEBUT */


        .blog-title {
            padding-top: 4px;
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
            color: #333333;
        }

        .blog-description {
            font-size: 16px;
            margin-bottom: 15px;
            color: #666666;
        }
        .read-more-btn {
            background-color: transparent;
            border: none;
            color: #030303;
            cursor: pointer;
            font-size: 16px;
            font-weight: 500;
            line-height: 1.5;
            padding: 0;
            position: relative;
            transition: color 0.3s ease-in-out;
        }

        .read-more-btn:before {
            background-color: #007bff;
            bottom: 0;
            content: "";
            height: 2px;
            left: 0;
            position: absolute;
            transition: width 0.3s ease-in-out;
            width: 0;
        }

        .read-more-btn:hover:before {
            width: 100%;
        }

        .read-more-btn:hover {
            color: #007bff;
        }

        .read-more-btn:after {
            background-color: #007bff;
            bottom: 0;
            content: "";
            height: 2px;
            position: absolute;
            transition: width 0.3s ease-in-out;
            width: 100%;
        }
    /* CSS DU EN CONTNU DU BLOG  FIN */

    /* LES IMAGE FORCRRRRRRRRRRRRRRRRRRRRR */

    .fixed-size-img {
    width: 200px;  /* Ajustez la largeur selon vos besoins */
    height: 200px; /* Ajustez la hauteur selon vos besoins */
    object-fit: cover; /* Assure que l'image couvre entièrement les dimensions spécifiées sans être déformée */
}



</style>
{{-- LIEN CSS FIN --}}
<div class="container-fluid pt-4 pb-1">
    <div>
        <div>
            <span>
                <label for="" id="blog"></label>
            </span>
        </div>
    </div>
    <div class="row" >
        <div>
            <div class="titre" data-aos="fade-up">
                <h3 class="text-center my-3 mesTitre pb-2">
                    <span>d</span><span>e</span><span>r</span><span>n</span><span>i</span><span>e</span><span>r</span><span>s</span> <span>b</span><span>l</span><span>o</span><span>g</span><span>s</span>
                </h3>

            </div>
            <div data-aos="flip-down pt-3">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Slide 1 -->
                        @foreach($posts as $key => $val)
                            <div class="swiper-slide">
                                <div class="blog-item" style="background-color: #eae4e4;">
                                    <div class="blog-image image-box">
                                        <a href="{{ route('CHAT', $val->id) }}" class="image-link">
                                            <center>
                                            <img class="img-fluid" id="blog-image" src="{{ asset($val->le_profil) }}" alt="{{ asset($val->le_profil) }}" {{--class="fixed-size-img"--}} style="width: auto;  height: 200px; object-fit: cover;">


                                            </center>
                                        </a>
                                    </div>
                                    <div class="blog-content">
                                        <h3 class="blog-title">{{$val->title}}</h3>
                                        <p class="blog-description">{{ Str::limit($val->content, 50) }}</p>
                                        <a href="{{ route('CHAT', $val->id) }}" class="btn read-more-btn">Lire la suite&ensp;<i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>

                            </div>
                        @endforeach
                        <!-- Slide 2 -->
                        {{-- <div class="swiper-slide">
                            <div class="blog-item">
                                <div class="blog-image image-box">
                                    <a href="blog-single-sidebar-left.html" class="image-link">
                                        <img class="img-fluid" id="blog-image" src="{{asset('portofolios/images/moi1.jpg')}}" alt="Blog Post 1">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title">Blog Post 2</h3>
                                    <p class="blog-description">Description du blog post 2</p>
                                    <a href="#" class="btn read-more-btn">Lire la suite&ensp;<i class="fas fa-arrow-right"></i></a>

                                </div>
                            </div>
                        </div> --}}
                        <!-- Slide 3 -->
                        {{-- <div class="swiper-slide">
                            <div class="blog-item">
                                <div class="blog-image image-box">
                                    <a href="blog-single-sidebar-left.html" class="image-link">
                                        <img class="img-fluid" id="blog-image" src="{{asset('portofolios/images/moi1.jpg')}}" alt="Blog Post 1">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title">Blog Post 3</h3>
                                    <p class="blog-description">Description du blog post 3</p>
                                    <a href="#" class="btn read-more-btn">Lire la suite&ensp;<i class="fas fa-arrow-right"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item">
                                <div class="blog-image image-box">
                                    <a href="blog-single-sidebar-left.html" class="image-link">
                                        <img class="img-fluid" id="blog-image" src="{{asset('portofolios/images/moi1.jpg')}}" alt="Blog Post 1">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title">Blog Post 4</h3>
                                    <p class="blog-description">Description du blog post 5</p>
                                    <a href="#" class="btn read-more-btn">Lire la suite&ensp;<i class="fas fa-arrow-right"></i></a>

                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item">
                                <div class="blog-image image-box">
                                    <a href="blog-single-sidebar-left.html" class="image-link">
                                        <img class="img-fluid" id="blog-image" src="{{asset('portofolios/images/moi1.jpg')}}" alt="Blog Post 1">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title">Blog Post 6</h3>
                                    <p class="blog-description">Description du blog post 6</p>
                                    <a href="#" class="btn btn-primary">Lire la suite</a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="blog-item">
                                <div class="blog-image image-box">
                                    <a href="blog-single-sidebar-left.html" class="image-link">
                                        <img class="img-fluid" id="blog-image" src="{{asset('portofolios/images/moi1.jpg')}}" alt="Blog Post 1">
                                    </a>
                                </div>
                                <div class="blog-content">
                                    <h3 class="blog-title">Blog Post 5</h3>
                                    <p class="blog-description">Description du blog post 5</p>
                                    <a href="#" class="btn read-more-btn">Lire la suite&ensp;<i class="fas fa-arrow-right"></i></a>

                                </div>
                            </div>
                        </div> --}}
                        <!-- Add more slides as needed -->
                    </div>
                    <!-- Bouton précédent -->
                    <div class="swiper-button-prev custom-carousel-button "><i class="fas fa-arrow-left"></i></div>
                    <div class="swiper-button-next custom-carousel-button"><i class="fas fa-arrow-right"></i></div>
                </div>

            </div>
        </div>
    </div>
</div>



{{-- @extends('portofolios.menus.menu')
@section('titre')
Blog-{{ $post->title }}
@endsection
@section('header')
    <style>
        .card-header {
            position: relative;
            height: 80vh; /* Hauteur à 80% de la hauteur de l'écran */
            overflow: hidden; /* Pour cacher le contenu qui dépasse */
            padding: 0; /* Retirer le padding pour que l'image occupe toute la hauteur */
            text-align: center; /* Centrer le contenu horizontalement */
            color: white; /* Couleur du texte */
        }

        .card-header .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5); /* Fond semi-transparent */
            z-index: 1; /* Assure que l'overlay est au-dessus de l'image */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }

        .card-header img {
            width: 100%; /* Image prend 100% de la largeur du card-header */
            height: 100%; /* Image prend 100% de la hauteur du card-header */
            object-fit: cover; /* Pour ajuster l'image tout en conservant les proportions */
            position: relative; /* Position relative pour s'assurer que l'image est au-dessous de l'overlay */
            z-index: 0; /* Z-index inférieur à l'overlay pour le positionnement correct */
        }

        .card-title {
            font-size: 2.5rem; /* Taille du titre */
            margin-bottom: 20px; /* Marge inférieure pour l'espacement */
        }

        #chat2 .form-control {
            border-color: transparent;
        }

        #chat2 .form-control:focus {
            border-color: transparent;
            box-shadow: inset 0px 0px 0px 1px transparent;
        }

        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }
        .comment-right {
            text-align: right;
        }

        .comment-right .bg-primary {
            background-color: #007bff;
            color: white;
        }

        .comment-left .bg-secondary {
            background-color: #f5f6f7;
        }

        .comment-left {
            text-align: left;
        }

        .reply-form {
            margin-left: 50px;
            margin-top: 10px;
        }

        .replies {
            display: none;
            margin-left: 50px;
        }
    </style>
@endsection

@section('corps')
    <div class="container-fluid pt-4 pb-4">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card" id="chat2">
                    <div class="card-header">
                        <img src="{{ asset($post->le_profil) }}" alt="Image-blog">
                        <div class="overlay">
                            <h1 class="card-title">{{ $post->title }}</h1>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="container-fluid">
                            <h4 class="text-center">
                                Description
                            </h4>
                            <div class="row pt-2">
                                <div class="col-md-12 col-lg-12 col-xl-12">
                                    <label for="">
                                        {{ $post->content }}
                                    </label>
                                    <p class="card-text"><small class="text-muted">Publié par {{ $post->user->name }} en {{ $post->created_at->format('M d, Y') }}</small></p>
                                </div>
                            </div>
                        </div>
                        <hr>

                        @forelse ($post->comments as $comment)
                        <div class="comment-box {{ $comment->user->id === auth()->user()->id ? 'comment-right justify-content-end' : 'comment-left justify-content-start' }} d-flex mb-4">
                            @if($comment->user->id !== auth()->user()->id)
                                <img src="{{ $comment->user->avatar_url ?? 'default-avatar.png' }}" alt="avatar 1">
                            @endif
                            <div>
                                <p class="small p-2 mb-1 {{ $comment->user->id === auth()->user()->id ? 'bg-primary' : 'bg-secondary' }} rounded-3">
                                    {{ $comment->body }}
                                </p>
                                <p class="small text-muted {{ $comment->user->id === auth()->user()->id ? 'd-flex justify-content-end' : '' }}">
                                    Par : {{ $comment->user->name }} le {{ $comment->created_at->format('M d, Y') }}&ensp; <a class="btn toggle-replies" data-target="#replies-{{ $comment->id }}">Repondre</a>
                                </p>

                                <div id="replies-{{ $comment->id }}" class="replies">
                                    @foreach ($comment->replies as $reply)
                                        <div class="comment-box {{ $reply->user->id === auth()->user()->id ? 'comment-right justify-content-end' : 'comment-left justify-content-start' }} d-flex mb-4">
                                            @if($reply->user->id !== auth()->user()->id)
                                                <img src="{{ $reply->user->avatar_url ?? 'default-avatar.png' }}" alt="avatar 1">
                                            @endif
                                            <div>
                                                <p class="small p-2 mb-1 {{ $reply->user->id === auth()->user()->id ? 'bg-primary' : 'bg-secondary' }} rounded-3">
                                                    {{ $reply->body }}
                                                </p>
                                                <p class="small text-muted {{ $reply->user->id === auth()->user()->id ? 'd-flex justify-content-end' : '' }}">
                                                    Par {{ $reply->user->name }} le {{ $reply->created_at->format('M d, Y') }}
                                                </p>
                                            </div>
                                            @if($reply->user->id === auth()->user()->id)
                                                <img src="{{ $reply->user->avatar_url ?? 'default-avatar.png' }}" alt="avatar 1">
                                            @endif
                                        </div>
                                    @endforeach
                                    <!-- Reply Form -->
                                    <form action="{{ route('comments.reply', $comment->id) }}" method="POST" class="reply-form">
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" name="reply_body" class="form-control" placeholder="Type your reply">
                                            <button type="submit" class="btn btn-primary">Envoyer</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            @if($comment->user->id === auth()->user()->id)
                                <img src="{{ $comment->user->avatar_url ?? 'default-avatar.png' }}" alt="avatar 1">
                            @endif
                        </div>
                    @empty
                        <p>No comments yet.</p>
                    @endforelse

                        <div class="d-flex flex-row justify-content-end mb-4">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">That's awesome!</p>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">I will meet you Sandon Square sharp at 10 AM</p>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Is that okay?</p>
                                <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:09</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>
                        <div class="d-flex flex-row justify-content-start mb-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Okay I will meet you on Sandon Square</p>
                                <p class="small ms-3 mb-3 rounded-3 text-muted">00:11</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-end mb-4">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Do you have pictures of Matley Marriage?</p>
                                <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:11</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>
                        <div class="d-flex flex-row justify-content-start mb-4">
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                            <div>
                                <p class="small p-2 ms-3 mb-1 rounded-3" style="background-color: #f5f6f7;">Sorry I don't have. I changed my phone.</p>
                                <p class="small ms-3 mb-3 rounded-3 text-muted">00:13</p>
                            </div>
                        </div>
                        <div class="d-flex flex-row justify-content-end">
                            <div>
                                <p class="small p-2 me-3 mb-1 text-white rounded-3 bg-primary">Okay then see you on Sunday!!</p>
                                <p class="small me-3 mb-3 rounded-3 text-muted d-flex justify-content-end">00:15</p>
                            </div>
                            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava4-bg.webp"
                                alt="avatar 1" style="width: 45px; height: 100%;">
                        </div>
                    </div>
                    <div class="card-footer text-muted d-flex justify-content-start align-items-center p-3">
                        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3-bg.webp"
                            alt="avatar 3" style="width: 40px; height: 100%;">
                        <input type="text" class="form-control form-control-lg" id="exampleFormControlInput1"
                            placeholder="Type message">
                        <a class="ms-1 text-muted" href="#!"><i class="fas fa-paperclip"></i></a>
                        <a class="ms-3 text-muted" href="#!"><i class="fas fa-smile"></i></a>
                        <a class="ms-3" href="#!"><i class="fas fa-paper-plane"></i></a>
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
                button.textContent = 'Repondre';
            }
        });
    });
</script>
@endsection --}}

