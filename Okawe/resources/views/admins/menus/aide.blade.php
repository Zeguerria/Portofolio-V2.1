{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}


@extends('admins.menus.menu')
@section('titre')
    Aide
@endsection
@section('header')
@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header pb-5">
            <div class="col-md-12 moncard" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                <div class="title pt-2">
                    <h4 class="mb-0 bread tit" ><img src="{{asset('glbal/icon/support.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Aides</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item nav-link-heart ti"><a href="/dashboard" >Home</a></li>
                        <li class="breadcrumb-item active t" aria-current="page" >menu</li>
                        <li class="breadcrumb-item active ti" aria-current="page"  >Aide</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <!-- Introduction Section -->
                    <section class="container my-5">
                        <h2>Bienvenue dans l'aide de l'application de gestion d'archive</h2>
                        <p>Cette page fournit des informations et des instructions pour utiliser les fonctionnalités de l'application.</p>
                    </section>


                    <!-- Fonctionnalités Section -->
                    <section class="container">


                        <h3>Fonctionnalités principales</h3>


                        <div class="row">
                            <div class="col-md-6">
                                <h4>Ajouter un fichier</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero. Sed cursus ante dapibus diam.</p>
                                <button class="btn btn-primary">Ajouter un fichier</button>
                            </div>
                            <div class="col-md-6">
                                <h4>Recherche Par mot clé</h4>
                                <p>Nulla quis sem at nibh elementum imperdiet. Duis sagittis ipsum. Praesent mauris. Fusce nec tellus sed augue semper porta.</p>
                                <div class="input-group mb-3">
                                    <input id="searchInput" type="text" class="form-control" placeholder="Rechercher un fichier" aria-label="Rechercher un fichier" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button id="searchButton" class="btn btn-outline-secondary" type="button">Rechercher</button>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="searchResults" class="col-md-6">
                                <!-- Ici seront affichés les résultats de la recherche -->
                            </div>
                            
                        </div>
                    </section>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection
 @section('footer')
 {{-- <script>
    $(document).ready(function() {
    $('#searchButton').click(function() {
        var searchText = $('#searchInput').val().trim();
        if (searchText !== '') {
            $.ajax({
                url: '/search',
                method: 'POST',
                data: { searchText: searchText },
                success: function(response) {
                    $('#searchResults').html(response);
                }
            });
        }
    });
});

 </script> --}}
 @endsection








