@extends('admins.menus.menu')
@section('titre')
Corbeilles
@endsection
@section('header')
@endsection
@section('corps')



<div>



        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="content-header pb-5">
                            <div class="col-md-12 col-lg-12 " style="background-image: url({{asset('glbal/theme/p3.png')}}) ;  background-size: cover; background-repeat: no-repeat;" >
                                <div class="title pt-2">
                                    <h4 class="mb-0 bread " style="color:#D9B8F7;"><img src="{{asset('glbal/icon/bin-file.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Corbeilles</h4>
                                </div>
                                <nav aria-label="breadcrumb" role="navigation" class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                                    <div class="d-flex align-items-center mb-2 mb-md-0"> <!-- Utilisation de classes flex pour aligner horizontalement sur les petits écrans et verticalement sur les grands écrans -->
                                        <span id="currentDateTime" style="color: #FCF2E9;"></span> <!-- Élément pour afficher la date et l'heure -->
                                    </div>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('HomeAdmin')}}" style="color: #60528A;">Home</a></li>
                                        <li class="breadcrumb-item active" aria-current="page" style="color:#D097BF;">Corbeilles</li>
                                        <li class="breadcrumb-item active" aria-current="page" style="color:#FCF2E9;">Réalisation</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-12"> <!-- Utilisez col-lg-6 pour que la carte occupe la moitié de l'écran sur les écrans larges -->
                        <div class="card">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                        </div>
                                        <div class="col-md-9 pt-4 d-flex nav justify-content-end">
                                            <div class="form-group">
                                                <label for=""><a href="{{route('R-Realisations')}}" class="btn " id="" data-bs-toggle="tooltip" title="rélisations total" ><i class="fa fa-list" style="color :#D9B8F7; font-size: 20px;"></i></a><sup style="color :#D9B8F7;">{{$RealisationTotal}}</sup></label>
                                                <label for=""><a href="{{route('RC-Realisations')}}" class="btn " id="" data-bs-toggle="tooltip" data-placement="bottom" title="réalisations total en corbeille"><i class="fa fa-trash msicons" style="color :#D9B8F7; font-size: 20px;"></i></a><sup style="color :#D9B8F7;">{{$RealisationTotalC}}</sup></label>
                                            </div>

                                            <a href="#" class="btn " id="A" data-bs-toggle="tooltip" title="Option"><i class="fa fa-ellipsis-v" style="color :#D9B8F7; font-size: 20px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example" class="display" style="width:100%">
                                    <thead class="text-center">
                                        <tr >
                                            <th class="text-center">#</th>
                                            <th class="text-center">Affiche</th>

                                            <th class="text-center">Titre</th>
                                            <th class="text-center">Desc</th>
                                            <th class="text-center">Img-1</th>
                                            <th class="text-center">Desc-1</th>
                                            <th class="text-center">Img-2</th>
                                            <th class="text-center">Desc-2</th>
                                            {{-- <th class="text-center">Img-3</th>
                                            <th class="text-center">Desc-3</th> --}}
                                            <th class="text-center" >Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($realisations as $key => $value)
                                        <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                            <tr class="text-center">
                                                <td class="text-center">{{$key+1}}</td>
                                                <td class="text-center">
                                                    <center>
                                                        <img src="{{asset($value->le_profil1)}}" alt="" class="img img-fluid" width="50" height="50">
                                                    </center>

                                                </td>


                                                <td class="text-center">{{$value->titre}}</td>

                                                <td class="text-center">{{$value->description1}}</td>
                                                <td class="text-center">
                                                    <center>
                                                        <img src="{{asset($value->le_profil2)}}" alt="" class="img img-fluid" width="50" height="50">
                                                    </center>

                                                </td>
                                                <td class="text-center">{{$value->description2}}</td>
                                                <td class="text-center">
                                                    <center>
                                                        <img src="{{asset($value->le_profil3)}}" alt="" class="img img-fluid" width="50" height="50">
                                                    </center>

                                                </td>
                                                <td class="text-center">{{$value->description3}}</td>
                                                {{-- <td class="text-center">
                                                    <center>
                                                        <img src="{{asset($value->le_profil4)}}" alt="" class="img img-fluid" width="50" height="50">
                                                    </center>

                                                </td>
                                                <td class="text-center">{{$value->description4}}</td> --}}
                                                <td style="" class="sorting_1 text-center">
                                                    <div class="btn-group">
                                                        <div style="">
                                                            <div class="">
                                                                <div class="btn-group btn-block">
                                                                <a type="button" class="btn btn-success" data-bs-toggle="tooltip" title="Consulter" data-toggle="modal" data-target="#consulter{{$value->id}}"><i class="fas fa-eye" style="font-size: 20px; color:#050034;"></i></a>
                                                                <a type="button" class="btn btn-outline-warning" data-bs-toggle="tooltip" data-placement="bottom" title="Restorer" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fas fa-recycle" style="font-size: 20px; color:#050034;"></i></a>
                                                                <a type="button" class="btn btn-danger"  data-bs-toggle="tooltip" title="Supprimer" data-toggle="modal" data-target="#corbeille{{$value->id}}"><i class="fas fa-trash" style="font-size: 20px; color:#050034;"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>

                                            </tr>
                                        </div>
                                            <div class="">
                                                <!--CONSULTER-->
                                                <div class="modal fade" id="consulter{{$value->id}}">
                                                    <div class="modal-dialog  modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/p3.png')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                            <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-spinner"></i></span>&ensp;Consulter la Réalisation: {{$value->titre}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form>
                                                                @csrf
                                                                <!--corp du formulaire debut-->
                                                                <div>
                                                                    <div class="container-fluid">
                                                                        <div class="row">
                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class=" fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Nom de la Réalisation :</label>
                                                                                                <input type="text" class="form-control" value="{{$value->titre}}" readonly id="consulter{{$value->id}}" name="titre" placeholder="Entrer le Nom">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image d'ffiche :</label>
                                                                                                <img src="{{asset($value->le_profil1)}}" alt="" class="img img-fluid ">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de la réalisation :</label>
                                                                                                <input type="text" class="form-control" value="{{$value->description1}}" readonly id="consulter{{$value->id}}" name="description1" placeholder="Entrer le code">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-project-diagram msicons" aria-hidden="true"></i>&ensp;Catégorie de la Réalisation :</label>
                                                                                                <select class="js-example-basic-single w-100" disabled name="categorie_id" >
                                                                                                    <div class="container-fluid">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                                <option selected class="w-100">Choisir la Catégorie</option>

                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    @foreach ($categories as $key => $cat)
                                                                                                        <option class="text-start" value="{{$cat->id}}" {{($cat->id==$value->categorie_id)?"selected":""}}>{{$cat->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 1 :</label>
                                                                                                <img src="{{asset($value->le_profil2)}}" alt="" class="img img-fluid" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 1 :</label>
                                                                                                <input type="text" class="form-control" value="{{$value->description2}}" readonly id="consulter{{$value->id}}" name="description2" placeholder="Entrer le code">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 2 :</label>
                                                                                                <img src="{{asset($value->le_profil3)}}" alt="" class="img img-fluid" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 2:</label>
                                                                                                <input type="text" class="form-control" value="{{$value->description3}}" readonly id="consulter{{$value->id}}" name="description3" placeholder="Entrer le code">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 3 :</label>
                                                                                                <img src="{{asset($value->le_profil4)}}" alt="" class="img img-fluid" >
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 3 :</label>
                                                                                                <input type="text" class="form-control" value="{{$value->description4}}" readonly id="consulter{{$value->id}}" name="description4" placeholder="Entrer le code">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="">
                                                                    <div class="">
                                                                        <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/p3.png')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                            <button type="button" class="btn btn-md btn-rounded btn-outline-danger "  data-dismiss="modal" style=" font-family: italic ;"><i class="typcn typcn-times-outline"></i>&ensp;Fermer</button>
                                                                            {{-- <button type="submit" class="btn btn-md btn-rounded btn-outline-success " style=" font-family: italic ;"><i class="typcn typcn-input-checked"></i>&ensp; Enregistrer</button> --}}
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </form>

                                                        </div>

                                                    </div>
                                                    </div>
                                                </div>
                                                <!--MODIFFIER-->
                                                <div class="modal fade" id="modifier{{$value->id}}">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                        <div class="modal-content">
                                                            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/p3.png')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-chevron-circle-up"></i></span>&ensp;Restorer la Réalisation : {{$value->titre}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" style="background: var(--c-color2);">
                                                                <form method="post" action="{{route('RecupRealisation')}}">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                                        <!--corp du formulaire debut-->
                                                                        <div>
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                        <div class="container-fluid">
                                                                                            <div class="row">
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class=" fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Nom de la Réalisation :</label>
                                                                                                        <input type="text" class="form-control" value="{{$value->titre}}" readonly id="consulter{{$value->id}}" name="titre" placeholder="Entrer le Nom">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image d'ffiche :</label>
                                                                                                        <img src="{{asset($value->le_profil1)}}" alt="" class="img img-fluid ">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de la réalisation :</label>
                                                                                                        <input type="text" class="form-control" value="{{$value->description1}}" readonly id="consulter{{$value->id}}" name="description1" placeholder="Entrer le code">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                        <div class="container-fluid">
                                                                                            <div class="row">
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-project-diagram msicons" aria-hidden="true"></i>&ensp;Catégorie de la Réalisation :</label>
                                                                                                        <select class="js-example-basic-single w-100" disabled name="categorie_id" >
                                                                                                            <div class="container-fluid">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                                        <option selected class="w-100">Choisir la Catégorie</option>
        
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            @foreach ($categories as $key => $cat)
                                                                                                                <option class="text-start" value="{{$cat->id}}" {{($cat->id==$value->categorie_id)?"selected":""}}>{{$cat->libelle}}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 1 :</label>
                                                                                                        <img src="{{asset($value->le_profil2)}}" alt="" class="img img-fluid" >
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 1 :</label>
                                                                                                        <input type="text" class="form-control" value="{{$value->description2}}" readonly id="consulter{{$value->id}}" name="description2" placeholder="Entrer le code">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                        <div class="container-fluid">
                                                                                            <div class="row">
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 2 :</label>
                                                                                                        <img src="{{asset($value->le_profil3)}}" alt="" class="img img-fluid" >
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 2:</label>
                                                                                                        <input type="text" class="form-control" value="{{$value->description3}}" readonly id="consulter{{$value->id}}" name="description3" placeholder="Entrer le code">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
        
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                        <div class="container-fluid">
                                                                                            <div class="row">
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 3 :</label>
                                                                                                        <img src="{{asset($value->le_profil4)}}" alt="" class="img img-fluid" >
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 3 :</label>
                                                                                                        <input type="text" class="form-control" value="{{$value->description4}}" readonly id="consulter{{$value->id}}" name="description4" placeholder="Entrer le code">
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
        
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/p3.png')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                        <button type="button" class="btn btn-md btn-rounded btn-outline-danger "  data-dismiss="modal" style=" font-family: italic ;"><i class="typcn typcn-times-outline"></i>&ensp;Fermer</button>
                                                                        <button type="submit" class="btn btn-md btn-rounded btn-outline-success " style=" font-family: italic ;"><i class=" fas fa-recycle"></i>&ensp; Restorer</button>
                                                                    </div>
                                                                </form>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <!--CORBEILLE-->

                                                <div class="modal fade" id="corbeille{{$value->id}}">
                                                    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content">
                                                        <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/p3.png')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                            <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-trash"></i></span>&ensp;Supprimer la Réalisation: {{$value->titre}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body" style="background: var(--c-color2);">
                                                            <form method="post" action="{{route('SupprimerRealisation')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                                    <!--corp du formulaire debut-->
                                                                    <div>
                                                                        <div class="container-fluid">
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class=" fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Nom de la Réalisation :</label>
                                                                                                    <input type="text" class="form-control" value="{{$value->titre}}" readonly id="consulter{{$value->id}}" name="titre" placeholder="Entrer le Nom">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image d'ffiche :</label>
                                                                                                    <img src="{{asset($value->le_profil1)}}" alt="" class="img img-fluid ">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de la réalisation :</label>
                                                                                                    <input type="text" class="form-control" value="{{$value->description1}}" readonly id="consulter{{$value->id}}" name="description1" placeholder="Entrer le code">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-project-diagram msicons" aria-hidden="true"></i>&ensp;Catégorie de la Réalisation :</label>
                                                                                                    <select class="js-example-basic-single w-100" disabled name="categorie_id" >
                                                                                                        <div class="container-fluid">
                                                                                                            <div class="row">
                                                                                                                <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                                    <option selected class="w-100">Choisir la Catégorie</option>
    
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        @foreach ($categories as $key => $cat)
                                                                                                            <option class="text-start" value="{{$cat->id}}" {{($cat->id==$value->categorie_id)?"selected":""}}>{{$cat->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 1 :</label>
                                                                                                    <img src="{{asset($value->le_profil2)}}" alt="" class="img img-fluid" >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 1 :</label>
                                                                                                    <input type="text" class="form-control" value="{{$value->description2}}" readonly id="consulter{{$value->id}}" name="description2" placeholder="Entrer le code">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 2 :</label>
                                                                                                    <img src="{{asset($value->le_profil3)}}" alt="" class="img img-fluid" >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 2:</label>
                                                                                                    <input type="text" class="form-control" value="{{$value->description3}}" readonly id="consulter{{$value->id}}" name="description3" placeholder="Entrer le code">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
    
                                                                                </div>
                                                                                <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Image 3 :</label>
                                                                                                    <img src="{{asset($value->le_profil4)}}" alt="" class="img img-fluid" >
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-audio-description msicons" aria-hidden="true"></i>&ensp;Description de l'image 3 :</label>
                                                                                                    <input type="text" class="form-control" value="{{$value->description4}}" readonly id="consulter{{$value->id}}" name="description4" placeholder="Entrer le code">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/p3.png')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                        <button type="button" class="btn btn-md btn-rounded btn-outline-danger "  data-dismiss="modal" style=" font-family: italic ;"><i class="typcn typcn-times-outline"></i>&ensp;Fermer</button>
                                                                        <button type="submit" class="btn btn-md btn-rounded btn-outline-success " style=" font-family: italic ;"><i class="fas fa-trash"></i>&ensp; Supprimer</button>
                                                                    </div>

                                                                </form>
                                                        </div>

                                                    </div>
                                                    </div>
                                                </div>

                                            </div>
                                        @endforeach
                                        <!-- Autres lignes de données -->
                                    </tbody>
                                    {{-- <tfoot class="text-center">
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>Code</th>
                                            <th>Libelle</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot> --}}
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
                                                        <a href="{{route('D-All-R')}}" data-bs-toggle="tooltip" title="Tout Vider" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
                                                        <a href="{{route('R-All-R')}}" data-bs-toggle="tooltip" title="Tout Restorer" data-placement="bottom" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fas fa-sync-alt" style="font-size: 20px; color:#3300ff;"></i></a>&emsp;
                                                    </div>
                                                <div class="col d-flex nav justify-content-end">
                                                    <a href="#basic-table" data-bs-toggle="tooltip" title="fermer" id="T" class="btn btn-sm pull-right" rel="content-y" data-toggle="collapse" role="button"><i class="fa fa-eye-slash" style="font-size: 20px; color:#D9B8F7;"></i></a>
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
