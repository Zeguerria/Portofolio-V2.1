{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}

@extends('admins.menus.menu')
@section('titre')
    Profil
@endsection
@section('corps')
    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header pb-5">
            <div class="col-md-12 moncard" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                <div class="title pt-2">
                    <h4 class="mb-0 bread tit" ><img src="{{asset('glbal/icon/password.gif')}}" alt="" class="img img-circle " width="50" height="50">&ensp;Profil</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex justify-content-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item nav-link-heart ti"><a href="/dashboard"  >Home</a></li>
                        <li class="breadcrumb-item active t" aria-current="page">Profils</li>
                        <li class="breadcrumb-item active ti" aria-current="page"  >Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- Partie 1 -->
                    <div class="col-12 col-md-3 col-ml-3 col-lg-3">
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <!-- Image de profil -->
                                    @if(isset(Auth::user()->photo) && Auth::user()->photo !== "")
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset(Auth::user()->le_profil)}}"
                                            alt="User profile picture">
                                    @else
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="{{asset('/glbal/autres/images.png')}}"
                                            alt="User profile picture">
                                    @endif
                                    <!-- Nom et prénom de l'utilisateur -->
                                    <h3 class="profile-username text-center">{{Auth::user()->name}}&ensp;{{Auth::user()->prenom}}</h3>
                                    <!-- Détails utilisateur -->
                                    <ul class="list-group list-group-unbordered mb-3">
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Profil</b><a class="">{{ Auth::user()->profil->libelle }}</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Telephone</b> <a class="float-right">{{Auth::user()->phone}}</a>
                                        </li>
                                        <li class="list-group-item d-flex justify-content-between">
                                            <b>Quartier</b> <a class="float-right">{{Auth::user()->quartier->libelle}}</a>
                                        </li>
                                        <!-- Bouton de modification -->
                                        <li class="list-group-item cardt">
                                            <div class="d-flex justify-content-center">
                                                <!-- Bouton de modification -->
                                                @foreach($users as $key => $value)
                                                    <a class=" btn btn-warning nav-link-heart" type="button" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fa fa-edit msicons">&ensp;Modifier</i></a>
                                                    <!-- Modal de modification -->
                                                    <div class="modal fade" id="modifier{{$value->id}}">
                                                        <div class="modal-dialog modal-lg">
                                                            <div class="modal-content">
                                                                <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                    <h4 class="modal-title  titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-user-edit"></i></span>&ensp;Modifier mon profil </h4>
                                                                    <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close" style="color :#B460B5;">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" {{--style="background: #B460B5;"--}}>
                                                                    <form method="post" action="{{route('ModifierUser')}}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <!--corp du formulaire debut-->
                                                                            <div class="row">
                                                                                <div class="col-12 col-md-12 col-ml-8 col-lg-8">
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-signature msicons"></i>&ensp;Nom </label>
                                                                                            <input type="text" class="form-control" value="{{$value->name}}"  id="" name="name" placeholder="Entrer le nom">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-user-edit msicons"></i>&ensp;Prenom </label>
                                                                                            <input type="text" class="form-control" id="" value="{{$value->prenom}}"  name="prenom" placeholder="Entrer le Prenom">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-paper-plane msicons"></i>&ensp;Email</label>
                                                                                            <input type="email" class="form-control" id="" value="{{$value->email}}"  name="email" placeholder="Entrer l'email">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12  col-ml-12 col-lg-12">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-mobile-alt"></i>&ensp;Phone</label>
                                                                                            <input type="text" class="form-control" id="" value="{{$value->phone}}"  name="phone" placeholder="Entrer le phone">
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
                                                                                                    <select class="form-control"  id="" name="quartier_id">
                                                                                                        @foreach ($quartiers as $key => $quar)
                                                                                                        <option value="{{$quar->id}}" {{($quar->id==$value->quartier_id)?"selected":""}}>{{$quar->libelle}}</option>
                                                                                                        @endforeach
                                                                                                    </select>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-6  col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex " style=" color: var(--color-t); font-family: italic;"><i class="fas fa-id-badge"></i>&ensp;Profil</label>
                                                                                                <select class="form-control"  id="" name="profil_id">
                                                                                                    @foreach ($profils as $key => $val)
                                                                                                    <option value="{{$val->id}}" {{($val->id==$value->profil_id)?"selected":""}}>{{$val->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-6  col-ml-6 col-lg-6">
                                                                                            <label class=" d-flex">
                                                                                                <i class="fas fa-camera-retro msicons"></i>&ensp;Photo de Profil</label>
                                                                                            <div class="form-group">
                                                                                                <div class="custom-file">
                                                                                                <input type="file" class="custom-file-input" name="photo" id="customFile" accept=".png,.gpg,.gpeg, .jpg,.avif">
                                                                                                <label class="custom-file-label  d-flex" for="customFile" style=" color: var(--color-t); font-family: italic;"> <i class="fas fa-image"></i>&ensp;</label>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                                <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-save"></i>&ensp;Modifier et Fermer</button>
                                                                            </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </li>
                                    </ul>
                                    <!-- Bouton de déconnexion -->
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <div class="d-flex justify-content-center col-md-7">
                                            <button type="submit" class="btn btn-danger btn-block ">
                                                <i class="nav-icon fas fa-power-off msicons">&ensp;<b>Se deconnecter</b></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Partie 2 -->
                    <div class="col-12 col-md-9 col-ml-9 col-lg-9">
                        <div class="card cardt">
                            <div class="card-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="timeline" >
                                        <div class="d-flex justify-content-center">
                                            <!-- Image occupant toute la largeur -->
                                            <div class="col-12 d-flex justify-content-center">
                                                <img src="{{ asset('glbal/autres/compte.png') }}" alt="login form" class="img-thumbnail w-100" style="height: 80vh;" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->
        </section> <!-- /.content -->

    </div>
@endsection
@section('footer')
@endsection








