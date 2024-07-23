{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}


@extends('admins.menus.menu')
@section('titre')
Réalisations
@endsection
@section('header')
    <style>
        /* Désactive l'affichage par défaut du fond de la modal de Bootstrap */
        .modal-backdrop {
            display: none;
        }
        /* Ajoute une perspective 3D à la boîte de dialogue de la modal */
        .modal-content {
            perspective: 1000px;
        }
    </style>
@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header p-3 pb-5">
            <div class="col-md-12 col-lg-12 moncard entete"  >
                <div class="title pt-2">
                    <h4 class="mb-0 bread entete animate__animated animate__bounceInDown" >
                        <img src="{{asset('glbal/icon/archive.gif')}}" alt="" class="img img-circle" width="50" height="50" style="border-radius: 50%;">
                        &ensp;Rélisations
                    </h4>

                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-2 mb-md-0"> <!-- Utilisation de classes flex pour aligner horizontalement sur les petits écrans et verticalement sur les grands écrans -->
                        <span id="currentDateTime" class="date"></span> <!-- Élément pour afficher la date et l'heure -->
                    </div>
                    <ol class="breadcrumb naventete">
                        <li class="breadcrumb-item navhome nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Acceuil"><a href="{{route('HomeAdmin')}}" >Home</a></li>
                        <li class="breadcrumb-item active navhomeb" aria-current="page" >Rélisations</li>
                        <li class="breadcrumb-item active navhomet animate__animated animate__bounceInUp" aria-current="page" >Rélisation</li>
                    </ol>
                </nav>




            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header moncard" >
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn nav-link-heart" data-bs-toggle="tooltip" title="Ajouter" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" style="font-size: 30px; color:#7bff00;"></i></button>



                                        </div>


                                        <div class="col-md-9 pt-4 d-flex nav justify-content-end">
                                            <div class="form-group">
                                                <label for=""><a href="{{route('R-Realisations')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" title="rélisations total" ><i class="fa fa-list msicons" ></i></a><sup>{{$RealisationTotal}}</sup></label>
                                                <label for=""><a href="{{route('RC-Realisations')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" data-placement="bottom" title="réalisations total en corbeille"><i class="fa fa-trash msicons" ></i></a><sup >{{$RealisationTotalC}}</sup></label>
                                            </div>

                                            <a href="#" class="btn nav-link-heart" id="A" data-bs-toggle="tooltip" title="Option"><i class="fa fa-ellipsis-v msicons" ></i></a>
                                        </div>
                                    </div>
                                {{-- MODAL AJOUTER DEBUT --}}
                                    <div class="modal fade animated-modal" id="modal-default">
                                        <div class="modal-dialog  modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header moncard" >
                                                    <h4 class="modal-title fw-bold " style="font-size : 35px; font-weight: 900; ">
                                                        <span><i class="fas fa-clipboard-check mesicons"></i></span>&ensp;
                                                        <span class="comming" style="font-weight: 900;">A</span>jouter une <span class="comming">R</span>éalisation
                                                    </h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body" >
                                                    <form method="POST" action="{{ route('AjouterRealisation') }}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="container-fluid">
                                                            <div class="row">
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="font-family: italic;">
                                                                            <i class="fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Nom de la Réalisation
                                                                        </label>
                                                                        <input type="text" class="form-control" name="titre" placeholder="Entrer le nom du projet" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-project-diagram msicons" aria-hidden="true"></i>&ensp;Catégorie de la Réalisation
                                                                        </label>
                                                                        <select class="form-control select2" name="categorie_id" style="width: 100%;" required>
                                                                            @foreach ($categories as $categorie)
                                                                                <option value="{{ $categorie->id }}">{{ $categorie->libelle }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-file" aria-hidden="true"></i>&ensp;Image à l'affiche
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="photo1" name="photo1" accept=".png,.jpg,.jpeg,.avif" required>
                                                                                <label class="custom-file-label" for="photo1">Selectionnez le fichier</label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">Upload</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-file" aria-hidden="true"></i>&ensp;Image 1
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="photo2" name="photo2" accept=".png,.jpg,.jpeg,.avif" required>
                                                                                <label class="custom-file-label" for="photo2">Selectionnez le fichier</label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">Upload</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-audio-description" aria-hidden="true"></i>&ensp;Description de la Réalisation
                                                                        </label>
                                                                        <textarea class="form-control" name="description1"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-audio-description" aria-hidden="true"></i>&ensp;Description de l'image 1
                                                                        </label>
                                                                        <textarea class="form-control" name="description2"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-file" aria-hidden="true"></i>&ensp;Image 2
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="photo3" name="photo3" accept=".png,.jpg,.jpeg,.avif" required>
                                                                                <label class="custom-file-label" for="photo3">Selectionnez le fichier</label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">Upload</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-file" aria-hidden="true"></i>&ensp;Image 3
                                                                        </label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input" id="photo4" name="photo4" accept=".png,.jpg,.jpeg,.avif" required>
                                                                                <label class="custom-file-label" for="photo4">Selectionnez le fichier</label>
                                                                            </div>
                                                                            <div class="input-group-append">
                                                                                <span class="input-group-text">Upload</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-audio-description" aria-hidden="true"></i>&ensp;Description de l'image 2
                                                                        </label>
                                                                        <textarea class="form-control" name="description3"></textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12 col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                            <i class="fas fa-audio-description" aria-hidden="true"></i>&ensp;Description de l'image 3
                                                                        </label>
                                                                        <textarea class="form-control" name="description4"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer justify-content-between moncard">
                                                            <button type="button" class="btn btn-outline-danger btn-round nav-link-heart" data-dismiss="modal">
                                                                <i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer
                                                            </button>
                                                            <button type="submit" class="btn btn-outline-success btn-round nav-link-heart" >
                                                                <i class="fas fa-save msicons"></i>&ensp;Enregistrer
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- MODAL AJOUTER FIN --}}
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>Probleme rencontré dans {{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif





                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th class="text-center">Affiche</th>

                                            <th>Titre</th>
                                            <th >Description</th>
                                            <th >Type de réalisation</th>
                                            <th >Action</th>
                                        </tr>
                                    </thead>
                                        <tbody >
                                            @foreach($realisations as $key => $value)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center">
                                                        <center>
                                                            <img src="{{asset($value->le_profil1)}}" alt="" class=" img-circle" width="50" height="50">
                                                        </center>

                                                    </td>


                                                    <td class="text-center">{{$value->titre}}</td>

                                                    <td class="text-center">{{$value->description1}}</td>
                                                    <td class="text-center">{{$value->categorie->libelle}}</td>


                                                    <td style="" class="sorting_1 text-center">
                                                        <div class="btn-group">
                                                            <div style="">
                                                                <div class="">
                                                                    <div class="btn-group btn-block">
                                                                    <a type="button" class="btn btn-success nav-link-heart" data-bs-toggle="tooltip" title="Consulter" data-toggle="modal" data-target="#consulter{{$value->id}}"><i class="fas fa-eye voir" style="font-size: 20px; "></i></a>
                                                                    <a type="button" class="btn btn-outline-warning nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Modifier" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fas fa-edit modif" style="font-size: 20px;"></i></a>
                                                                    <a type="button" class="btn btn-danger nav-link-heart"  data-bs-toggle="tooltip" title="Supprimer" data-toggle="modal" data-target="#corbeille{{$value->id}}"><i class="fas fa-trash supp" style="font-size: 20px; "></i></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <div class="s">
                                                        <!--CONSULTER-->
                                                        <div class="modal fade animated-modal" id="consulter{{$value->id}}">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header moncard" >
                                                                        <h4 class="modal-title " style="font-size : 35px; font-weight: 900; ">
                                                                            <span><i class="fas fa-spinner msicons"></i></span>&ensp;
                                                                            <span class="comming" style="font-weight: 900;">C</span>onsulter la Réalisation : {{$value->titre}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" style="background: var(--c-color2);">
                                                                        <form method="post" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <!--corp du formulaire debut-->
                                                                            <div>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;">
                                                                                                    <i class="fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Nom de la Réalisation
                                                                                                </label>
                                                                                                <input type="text" class="form-control" value="{{$value->titre}}" readonly id="consulter{{$value->id}}" name="titre" placeholder="Entrer le Nom">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                                                    <i class="fas fa-project-diagram msicons" aria-hidden="true"></i>&ensp;Catégorie de la Réalisation
                                                                                                </label>
                                                                                                <select class="form-control select2" disabled name="categorie_id" style="width: 100%;" required>
                                                                                                    @foreach ($categories as $cat)
                                                                                                    <option value="{{$cat->id}}" {{($cat->id==$value->categorie_id)?"selected":""}}>{{$cat->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image d'ffiche</label>
                                                                                                <img src="{{asset($value->le_profil1)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 1</label>
                                                                                                <img src="{{asset($value->le_profil2)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de la réalisation</label>
                                                                                                <textarea class="form-control"value="{{$value->description1}}" readonly id="consulter{{$value->id}}" name="description1">{{$value->description1}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 1</label>
                                                                                                <textarea class="form-control"value="{{$value->description2}}" readonly id="consulter{{$value->id}}" name="description2">{{$value->description2}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 2</label>
                                                                                                <img src="{{asset($value->le_profil3)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 3</label>
                                                                                                <img src="{{asset($value->le_profil4)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 2</label>
                                                                                                <textarea class="form-control"value="{{$value->description3}}" readonly id="consulter{{$value->id}}" name="description3">{{$value->description3}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 3</label>
                                                                                                <textarea class="form-control"value="{{$value->description4}}" readonly id="consulter{{$value->id}}" name="description4">{{$value->description4}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>

                                                                            <div class="modal-footer justify-content-between moncard" >
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--MODIFFIER-->
                                                        <div class="modal fade animated-modal" id="modifier{{$value->id}}">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header moncard" >
                                                                        <h4 class="modal-title " style="font-size : 35px; font-weight: 900; ">
                                                                            <span><i class="fas  fa-chevron-circle-up msicons"></i></span>&ensp;
                                                                            <span class="comming" style="font-weight: 900;">M</span>odifier la Réalisation : {{$value->titre}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" >
                                                                        <form method="post" action="{{route('ModifierRealisation')}}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="id" value="{{$value->id}}">
                                                                                <!--corp du formulaire debut-->
                                                                                <div>
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;">
                                                                                                        <i class="fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Nom de la Réalisation
                                                                                                    </label>
                                                                                                    <input type="text" class="form-control" value="{{$value->titre}}" id="consulter{{$value->id}}" name="titre" placeholder="Entrer le Nom">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                                                        <i class="fas fa-project-diagram msicons" aria-hidden="true"></i>&ensp;Catégorie de la Réalisation
                                                                                                    </label>
                                                                                                    <select class="form-control select2"  name="categorie_id" style="width: 100%;" required>
                                                                                                        @foreach ($categories as $cat)
                                                                                                        <option value="{{$cat->id}}" {{($cat->id==$value->categorie_id)?"selected":""}}>{{$cat->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image d'ffiche</label>
                                                                                                    <img src="{{asset($value->le_profil1)}}" alt="" class="img img-thumbnail ">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 1</label>
                                                                                                    <img src="{{asset($value->le_profil2)}}" alt="" class="img img-thumbnail ">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="input-group">
                                                                                                    <div class="custom-file">
                                                                                                        <input type="file" class="custom-file-input" id="photo1" name="photo1" accept=".png,.jpg,.jpeg,.avif" >
                                                                                                        <label class="custom-file-label" for="photo1">Selectionnez le fichier</label>
                                                                                                    </div>
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text">Upload</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="input-group">
                                                                                                    <div class="custom-file">
                                                                                                        <input type="file" class="custom-file-input" id="photo2" name="photo2" accept=".png,.jpg,.jpeg,.avif" >
                                                                                                        <label class="custom-file-label" for="photo2">Selectionnez le fichier</label>
                                                                                                    </div>
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text">Upload</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de la réalisation</label>
                                                                                                    <textarea class="form-control"value="{{$value->description1}}"  id="consulter{{$value->id}}" name="description1">{{$value->description1}}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 1</label>
                                                                                                    <textarea class="form-control"value="{{$value->description2}}"  id="consulter{{$value->id}}" name="description2">{{$value->description2}}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 2</label>
                                                                                                    <img src="{{asset($value->le_profil3)}}" alt="" class="img img-thumbnail ">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 3</label>
                                                                                                    <img src="{{asset($value->le_profil4)}}" alt="" class="img img-thumbnail ">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="input-group">
                                                                                                    <div class="custom-file">
                                                                                                        <input type="file" class="custom-file-input" id="photo3" name="photo3" accept=".png,.jpg,.jpeg,.avif" >
                                                                                                        <label class="custom-file-label" for="photo3">Selectionnez le fichier</label>
                                                                                                    </div>
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text">Upload</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="input-group">
                                                                                                    <div class="custom-file">
                                                                                                        <input type="file" class="custom-file-input" id="photo4" name="photo4" accept=".png,.jpg,.jpeg,.avif" >
                                                                                                        <label class="custom-file-label" for="photo4">Selectionnez le fichier</label>
                                                                                                    </div>
                                                                                                    <div class="input-group-append">
                                                                                                        <span class="input-group-text">Upload</span>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 2</label>
                                                                                                    <textarea class="form-control"value="{{$value->description3}}"  id="consulter{{$value->id}}" name="description3">{{$value->description3}}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 3</label>
                                                                                                    <textarea class="form-control"value="{{$value->description4}}" id="consulter{{$value->id}}" name="description4">{{$value->description4}}</textarea>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            <div class="modal-footer justify-content-between moncard" >
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic msicons"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                                <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style=" font-family: italic ;"><i class="fas fa-save msicons"></i>&ensp;Modifier et Fermer</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--CORBEILLE-->
                                                        <div class="modal fade animated-modal" id="corbeille{{$value->id}}">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header moncard">
                                                                        <h4 class="modal-title" style="font-size: 35px; font-weight: 900;">
                                                                            <span><i class="fas fa-trash msicons"></i></span>&ensp;
                                                                            <span class="comming" style="font-weight: 900;">S</span>upprimer la Réalisation : {{$value->titre}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="{{route('CorbeilleRealisation')}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <!-- Reste du formulaire -->
                                                                            <div>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;">
                                                                                                    <i class="fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Nom de la Réalisation
                                                                                                </label>
                                                                                                <input type="text" class="form-control" value="{{$value->titre}}" readonly id="consulter{{$value->id}}" name="titre" placeholder="Entrer le Nom">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                                                    <i class="fas fa-project-diagram msicons" aria-hidden="true"></i>&ensp;Catégorie de la Réalisation
                                                                                                </label>
                                                                                                <select class="form-control select2" disabled name="categorie_id" style="width: 100%;" required>
                                                                                                    @foreach ($categories as $cat)
                                                                                                    <option value="{{$cat->id}}" {{($cat->id==$value->categorie_id)?"selected":""}}>{{$cat->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image d'ffiche</label>
                                                                                                <img src="{{asset($value->le_profil1)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 1</label>
                                                                                                <img src="{{asset($value->le_profil2)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de la réalisation</label>
                                                                                                <textarea class="form-control"value="{{$value->description1}}" readonly id="consulter{{$value->id}}" name="description1">{{$value->description1}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 1</label>
                                                                                                <textarea class="form-control"value="{{$value->description2}}" readonly id="consulter{{$value->id}}" name="description2">{{$value->description2}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 2</label>
                                                                                                <img src="{{asset($value->le_profil3)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 3</label>
                                                                                                <img src="{{asset($value->le_profil4)}}" alt="" class="img img-thumbnail ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 2</label>
                                                                                                <textarea class="form-control"value="{{$value->description3}}" readonly id="consulter{{$value->id}}" name="description3">{{$value->description3}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 3</label>
                                                                                                <textarea class="form-control"value="{{$value->description4}}" readonly id="consulter{{$value->id}}" name="description4">{{$value->description4}}</textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-between moncard">
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart" data-dismiss="modal" style="font-family: italic;">
                                                                                    <i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer
                                                                                </button>
                                                                                <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style="font-family: italic;">
                                                                                    <i class="fas fa-trash-alt msicons"></i>&ensp;Supprimer et Fermer
                                                                                </button>
                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                <tfoot>
                                {{-- <tr>
                                  <th>Rendering engine</th>
                                  <th>Browser</th>
                                  <th>Platform(s)</th>
                                  <th>Engine version</th>
                                  <th>CSS grade</th>
                                </tr> --}}
                                </tfoot>
                              </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="sumenu card-footer moncard" id="" >
                                <hr class="text-dander">
                                <div class="code-box" >
                                    <div class="clearfix p-1">
                                        <div class="container-fluid pt-2">
                                            <div class="row">
                                                    <div class="col" >
                                                        <a href="{{route('C-All-R')}}" data-bs-toggle="tooltip" title="Tout Supprimer" class="nav-link-heart btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
                                                        {{-- <a href="userspdf" data-bs-toggle="tooltip" title="Imprimer" data-placement="bottom" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-print" style="font-size: 20px; color:#0682dab4;"></i></a> --}}
                                                    </div>
                                                <div class="col d-flex nav justify-content-end">
                                                    <a href="#basic-table" data-bs-toggle="tooltip" title="fermer" id="T" class="btn btn-sm pull-right nav-link-heart" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash msicons" style="font-size: 20px;"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
 @endsection
 @section('footer')


 @endsection








