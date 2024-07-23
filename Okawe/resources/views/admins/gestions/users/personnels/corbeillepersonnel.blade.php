{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}


@extends('admins.menus.menu')
@section('titre')
Corbeilles
@endsection
@section('header')
@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header pb-5">
            <div class="col-md-6 col-md-12 bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                <div class="title pt-2">
                    <h4 class="mb-0 bread tit" ><img src="{{asset('glbal/icon/bin-file.gif')}}" alt="" class="img img-circle" width="50" height="50">&ensp;Corbeilles</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item nav-link-heart ti"><a href="./dashboard"  >Home</a></li>
                        <li class="breadcrumb-item active t" aria-current="page"  >Corbeilles</li>
                        <li class="breadcrumb-item active ti" aria-current="page" >User</li>
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

                                        </div>
                                        <div class="col-md-9 pt-4 d-flex nav justify-content-end">
                                            <div class="form-group">
                                                <label for=""><a href="./Users" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" title="total users" ><i class="fa fa-user msicons" style=" font-size: 20px;"></i></a><sup >{{$UserTotal}}</sup></label>
                                            <label for=""><a href="./UserCorbeilles" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" data-placement="bottom" title="total users en corbeille"><i class="fa fa-trash msicons" style=" font-size: 20px;"></i></a><sup>{{$UserTotalC}}</sup></label>
                                            </div>

                                            <a href="#" class="btn " id="A" data-bs-toggle="tooltip" title="Option"><i class="fa fa-ellipsis-v mesicons" style=" font-size: 20px;"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr class="text-center">
                                            <th>#</th>
                                            <th>photo</th>
                                            <th>Noms & Prenoms</th>
                                            <th>Profil</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Quartier</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        @foreach($users as $key => $value)
                                            <tr>
                                                <td class="text-center">{{$key+1}}</td>
                                                @if(isset($value->photo) && $value->photo !== "")
                                                <td class="text-center">
                                                    <center>
                                                        <img src="{{asset($value->le_profil)}}" alt="" class="img img-circle" width="50" height="50">
                                                    </center>
                                                </td>
                                                @else
                                                <td class="text-center">
                                                    <span class="text-danger">
                                                        Cette utilisateur n'a pas de photo
                                                    </span>
                                                </td>

                                                @endif

                                                <td class="text-center"> {{$value->name}}  {{$value->prenom}}</td>


                                                <td class="text-center">{{$value->profil->libelle}}</td>
                                                <td class="text-center">{{$value->phone}}</td>
                                                <td class="text-center">{{$value->email}}</td>
                                                <td class="text-center">{{$value->quartier->libelle}}</td>
                                                <td style="" class="sorting_1 text-center">
                                                    <div class="btn-group">
                                                        <div style="">
                                                            <div class="">
                                                                <div class="btn-group btn-block">
                                                                    <a type="button" class="btn btn-success nav-link-heart" data-bs-toggle="tooltip" title="Consulter" data-toggle="modal" data-target="#consulter{{$value->id}}"><i class="fas fa-eye" style="font-size: 20px; color:#050034;"></i></a>
                                                                    <a type="button" class="btn btn-outline-warning nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Restorer" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fas fa-recycle" style="font-size: 20px; color:#050034;"></i></a>
                                                                    <a type="button" class="btn btn-danger nav-link-heart"  data-bs-toggle="tooltip" title="Supprimer" data-toggle="modal" data-target="#supprimer{{$value->id}}"><i class="fas fa-trash" style="font-size: 20px; color:#050034;"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <div class="s">
                                                    <!--CONSULTER-->
                                                    <div class="modal fade" id="consulter{{$value->id}}">
                                                        <div class="modal-dialog  modal-lg">
                                                            <div class="modal-content"><i class="">
                                                                <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                    <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900;"><span><i class="fas fa-book-reader"></i></span>&ensp;Consulter l'utilisateur : {{$value->name}} {{$value->prenom}}</h4>
                                                                    <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color: #B460B5">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                    <form>
                                                                        @csrf
                                                                        <div class="row">
                                                                            <div class="col-12 col-md-12 col-ml-8 col-lg-8">
                                                                                <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                        <input type="text" class="form-control" value="{{$value->name}}" readonly id="" name="name" placeholder="Entrer le nom">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Prenom </label>
                                                                                        <input type="text" class="form-control" id="" value="{{$value->prenom}}" readonly name="prenom" placeholder="Entrer le Prenom">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane msicons"></i>&ensp;Email</label>
                                                                                        <input type="email" class="form-control" id="" value="{{$value->email}}" readonly name="email" placeholder="Entrer l'email">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                        <input type="text" class="form-control" id="" value="{{$value->phone}}" readonly name="phone" placeholder="Entrer le phone">
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                            {{-- @if($value->photo!=null)
                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6 p-1" style="background-image: url({{asset($value->le_profil)}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                            </div>
                                                                            @else
                                                                            <div class="col-12 col-md-12 col-ml-6 col-lg-6 p-1" style="background-image: url({{asset('/glbal/autres/images.png')}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                            </div>

                                                                            @endif --}}

                                                                            <div class="col-12 col-md-12 col-ml-4 col-lg-4">
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                            @if(isset($value->photo) && $value->photo !== "")
                                                                                                <img src="{{asset($value->le_profil)}}" alt="" srcset="" class="img img-thumbnail pt-4">
                                                                                            @else
                                                                                                <img src="{{asset('/glbal/autres/images.png')}}" alt="" srcset="" class="img img-thumbnail pt-4">
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="col-md-12 col-ml-12 col-lg-12 pt-4">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                                <input type="text" class="form-control" id="" value="{{$value->quartier->libelle}}" readonly name="quartier" placeholder="Entrer le quartier">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>


                                                                            </div>
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-id-badge"></i>&ensp;Profil</label>
                                                                                            <select class="form-control" disabled id="" name="profil_id">
                                                                                                @foreach ($profils as $key => $val)
                                                                                                <option value="{{$val->id}}" {{($val->id==$value->profil_id)?"selected":""}}>{{$val->libelle}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                    <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
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
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                    <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-user-edit"></i></span>&ensp;Restorer l'utilisateur : {{$value->name}} {{$value->prenom}}</h4>
                                                                    <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color :#B460B5;">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                    <form method="post" action="{{route('recupUser')}}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <!--corp du formulaire debut-->
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 col-ml-8 col-lg-8">
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                            <input type="text" class="form-control" value="{{$value->name}}" readonly id="" name="name" placeholder="Entrer le nom">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Prenom </label>
                                                                                            <input type="text" class="form-control" id="" value="{{$value->prenom}}" readonly name="prenom" placeholder="Entrer le Prenom">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane msicons"></i>&ensp;Email</label>
                                                                                            <input type="email" class="form-control" id="" value="{{$value->email}}" readonly name="email" placeholder="Entrer l'email">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                            <input type="text" class="form-control" id="" value="{{$value->phone}}" readonly name="phone" placeholder="Entrer le phone">
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                                {{-- @if($value->photo!=null)
                                                                                <div class="col-12 col-md-12 col-ml-6 col-lg-6 p-1" style="background-image: url({{asset($value->le_profil)}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                                </div>
                                                                                @else
                                                                                <div class="col-12 col-md-12 col-ml-6 col-lg-6 p-1" style="background-image: url({{asset('/glbal/autres/images.png')}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                                </div>

                                                                                @endif --}}

                                                                                <div class="col-12 col-md-12 col-ml-4 col-lg-4">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                @if(isset($value->photo) && $value->photo !== "")
                                                                                                    <img src="{{asset($value->le_profil)}}" alt="" srcset="" class="img img-thumbnail pt-4">
                                                                                                @else
                                                                                                    <img src="{{asset('/glbal/autres/images.png')}}" alt="" srcset="" class="img img-thumbnail pt-4">
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="col-md-12 col-ml-12 col-lg-12 pt-4">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                                    <input type="text" class="form-control" id="" value="{{$value->quartier->libelle}}" readonly name="quartier" placeholder="Entrer le quartier">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>


                                                                                </div>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-id-badge"></i>&ensp;Profil</label>
                                                                                                <select class="form-control" disabled id="" name="profil_id">
                                                                                                    @foreach ($profils as $key => $val)
                                                                                                    <option value="{{$val->id}}" {{($val->id==$value->profil_id)?"selected":""}}>{{$val->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
                                                                                <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-retweet"></i>&ensp;Restorer et Fermer</button>
                                                                            </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--CORBEILLE-->

                                                    <div class="modal fade" id="supprimer{{$value->id}}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header bg-danger bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                    <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-user-slash"></i></span>&ensp;Supprimer l'utilisateur : {{$value->name}} {{$value->prenom}}</h4>
                                                                    <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color :#B460B5;">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                    <form method="post" action="{{route('SupprimerUser')}}" nctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <div class="">
                                                                                <div>
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-8 col-lg-8">
                                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                                    <input type="text" class="form-control" value="{{$value->name}}" readonly id="" name="name" placeholder="Entrer le nom">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Prenom </label>
                                                                                                    <input type="text" class="form-control" id="" value="{{$value->prenom}}" readonly name="prenom" placeholder="Entrer le Prenom">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane msicons"></i>&ensp;Email</label>
                                                                                                    <input type="email" class="form-control" id="" value="{{$value->email}}" readonly name="email" placeholder="Entrer l'email">
                                                                                                </div>
                                                                                            </div>
                                                                                            <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                                <div class="form-group">
                                                                                                    <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                                    <input type="text" class="form-control" id="" value="{{$value->phone}}" readonly name="phone" placeholder="Entrer le phone">
                                                                                                </div>
                                                                                            </div>

                                                                                        </div>
                                                                                        {{-- @if($value->photo!=null)
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6 p-1" style="background-image: url({{asset($value->le_profil)}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                                        </div>
                                                                                        @else
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6 p-1" style="background-image: url({{asset('/glbal/autres/images.png')}});  background-position: center; background-size: cover; background-repeat: no-repeat;">
                                                                                        </div>

                                                                                        @endif --}}

                                                                                        <div class="col-12 col-md-12 col-ml-4 col-lg-4">
                                                                                            <div class="container-fluid">
                                                                                                <div class="row">
                                                                                                    <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                                        @if(isset($value->photo) && $value->photo !== "")
                                                                                                            <img src="{{asset($value->le_profil)}}" alt="" srcset="" class="img img-thumbnail pt-4">
                                                                                                        @else
                                                                                                            <img src="{{asset('/glbal/autres/images.png')}}" alt="" srcset="" class="img img-thumbnail pt-4">
                                                                                                        @endif
                                                                                                    </div>
                                                                                                    <div class="col-md-12 col-ml-12 col-lg-12 pt-4">
                                                                                                        <div class="form-group">
                                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-map-marker-alt"></i>&ensp;Quartier</label>
                                                                                                            <input type="text" class="form-control" id="" value="{{$value->quartier->libelle}}" readonly name="quartier" placeholder="Entrer le quartier">
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>


                                                                                        </div>
                                                                                        <div class="container-fluid">
                                                                                            <div class="row">
                                                                                                <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                                    <div class="form-group">
                                                                                                        <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-id-badge"></i>&ensp;Profil</label>
                                                                                                        <select class="form-control" disabled id="" name="profil_id">
                                                                                                            @foreach ($profils as $key => $val)
                                                                                                            <option value="{{$val->id}}" {{($val->id==$value->profil_id)?"selected":""}}>{{$val->libelle}}</option>
                                                                                                            @endforeach
                                                                                                        </select>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                    <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                                    <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-trash-alt"></i>&ensp;Supprimer et Fermer</button>
                                                                                </div>
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
                                                    <a href="./deleteAlluser" data-bs-toggle="tooltip" title="Tout Vider" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
                                                    <a href="./recupAlluser" data-bs-toggle="tooltip" title="Tout Restorer" data-placement="bottom" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fas fa-sync-alt" style="font-size: 20px; color:#3300ff;"></i></a>&emsp;
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








