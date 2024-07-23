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
                        <img src="{{asset('glbal/icon/bin-file.gif')}}" alt="" class="img img-circle" width="50" height="50" style="border-radius: 50%;">
                        &ensp;Corbeilles
                    </h4>

                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-2 mb-md-0"> <!-- Utilisation de classes flex pour aligner horizontalement sur les petits écrans et verticalement sur les grands écrans -->
                        <span id="currentDateTime" class="date"></span> <!-- Élément pour afficher la date et l'heure -->
                    </div>
                    <ol class="breadcrumb naventete">
                        <li class="breadcrumb-item navhome nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Acceuil"><a href="{{route('HomeAdmin')}}" >Home</a></li>
                        <li class="breadcrumb-item active navhomeb" aria-current="page" >Corbeille</li>
                        <li class="breadcrumb-item active navhomet animate__animated animate__bounceInUp" aria-current="page" >Profil Habilitation</li>
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
                                            {{-- <button class="btn nav-link-heart" data-bs-toggle="tooltip" title="Ajouter" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" style="font-size: 30px; color:#7bff00;"></i></button> --}}
                                        </div>
                                        <div class="col-md-9 pt-4 d-flex nav justify-content-end">
                                            <div class="form-group">
                                                <label for=""><a href="{{route('PH-ProfilHabilitations')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" title="profils total" ><i class=" fas fa-paste msicons" ></i></a><sup>{{$ProfilHabilitationT}}</sup></label>
                                                <label for=""><a href="{{route('PHC-ProfilHabilitations')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" data-placement="bottom" title="profils total en corbeille"><i class="fa fa-trash msicons" ></i></a><sup >{{$ProfilHabilitationTC}}</sup></label>
                                            </div>
                                            <a href="#" class="btn nav-link-heart" id="A" data-bs-toggle="tooltip" title="Option"><i class="fa fa-ellipsis-v msicons" ></i></a>
                                        </div>
                                    </div>
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
                                            <th>Profil</th>
                                            <th>Habilitation</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                        <tbody >
                                            @foreach($profilhabilitations as $key => $value)
                                                <tr>
                                                    <td class="text-center">{{$key+1}}</td>
                                                    <td class="text-center"> {{$value->profil->libelle}}</td>
                                                    <td class="text-center">{{$value->habilitation->libelle}}</td>
                                                    <td style="" class="sorting_1 text-center">
                                                        <div class="btn-group">
                                                            <div style="">
                                                                <div class="">
                                                                    <div class="btn-group btn-block">
                                                                    <a type="button" class="btn btn-success nav-link-heart" data-bs-toggle="tooltip" title="Consulter" data-toggle="modal" data-target="#consulter{{$value->id}}"><i class="fas fa-eye voir" style="font-size: 20px; "></i></a>
                                                                    <a type="button" class="btn btn-outline-warning nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Restorer" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fas fa-recycle modif" style="font-size: 20px;"></i></a>
                                                                    <a type="button" class="btn btn-danger nav-link-heart"  data-bs-toggle="tooltip" title="Supprimer" data-toggle="modal" data-target="#supprimer{{$value->id}}"><i class="fas fa-trash supp" style="font-size: 20px; "></i></a>
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
                                                                            <span class="comming" style="font-weight: 900;">C</span>onsulter le Profil Habilitation : {{$value->profil->libelle}}
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
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style=" font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Porfil</label>
                                                                                            <select class="form-control select2 text-start" disabled name="profil_id" style="width: 100%;">
                                                                                                @foreach ($profils as $key => $pfl)
                                                                                                <option class="text-start" value="{{$pfl->id}}"{{($pfl->id==$value->profil_id)?"selected":""}}>{{$pfl->libelle}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Libelle</label>
                                                                                            <select class="form-control select2 text-start" disabled name="habilitation_id" style="width: 100%;">
                                                                                                @foreach ($habilitations as $key => $hbl)
                                                                                                <option class="text-start" value="{{$hbl->id}}"{{($hbl->id==$value->habilitation_id)?"selected":""}}>{{$hbl->libelle}}</option>
                                                                                                @endforeach
                                                                                            </select>
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
                                                                            <span><i class="fas  fa-retweet msicons"></i></span>&ensp;
                                                                            <span class="comming" style="font-weight: 900;">R</span>estorer le Profil Habilitation : {{$value->profil->libelle}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" >
                                                                        <form method="post" action="{{route('RecupProfilHabilitation')}}" enctype="multipart/form-data">
                                                                                @csrf
                                                                                <input type="hidden" name="id" value="{{$value->id}}">
                                                                                <!--corp du formulaire debut-->
                                                                                <div>
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Porfil</label>
                                                                                                <select class="form-control select2 text-start" disabled name="profil_id" style="width: 100%;">
                                                                                                    @foreach ($profils as $key => $pfl)
                                                                                                    <option class="text-start" value="{{$pfl->id}}"{{($pfl->id==$value->profil_id)?"selected":""}}>{{$pfl->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Libelle</label>
                                                                                                <select class="form-control select2 text-start" disabled name="habilitation_id" style="width: 100%;">
                                                                                                    @foreach ($habilitations as $key => $hbl)
                                                                                                    <option class="text-start" value="{{$hbl->id}}"{{($hbl->id==$value->habilitation_id)?"selected":""}}>{{$hbl->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            <div class="modal-footer justify-content-between moncard" >
                                                                                <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round"  data-dismiss="modal" style=" font-family: italic msicons"><i class="fas fa-exclamation-triangle "></i>&ensp;Fermer</button>
                                                                                <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round" style=" font-family: italic ;"><i class="fas fa-retweet msicons"></i>&ensp;Restorer et Fermer</button>
                                                                            </div>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!--CORBEILLE-->
                                                        <div class="modal fade animated-modal" id="supprimer{{$value->id}}">
                                                            <div class="modal-dialog modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header moncard">
                                                                        <h4 class="modal-title" style="font-size: 35px; font-weight: 900;">
                                                                            <span><i class="fas fa-trash msicons"></i></span>&ensp;
                                                                            <span class="comming" style="font-weight: 900;">S</span>upprimer le Profil Habilitation : {{$value->profil->libelle}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="{{route('SupprimerProfilHabilitation')}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <!-- Reste du formulaire -->
                                                                            <div>
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style=" font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Porfil</label>
                                                                                            <select class="form-control select2 text-start" disabled name="profil_id" style="width: 100%;">
                                                                                                @foreach ($profils as $key => $pfl)
                                                                                                <option class="text-start" value="{{$pfl->id}}"{{($pfl->id==$value->profil_id)?"selected":""}}>{{$pfl->libelle}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Libelle</label>
                                                                                            <select class="form-control select2 text-start" disabled name="habilitation_id" style="width: 100%;">
                                                                                                @foreach ($habilitations as $key => $hbl)
                                                                                                <option class="text-start" value="{{$hbl->id}}"{{($hbl->id==$value->habilitation_id)?"selected":""}}>{{$hbl->libelle}}</option>
                                                                                                @endforeach
                                                                                            </select>
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
                                                        <a href="{{route('D-All-PHU')}}" data-bs-toggle="tooltip" title="Tout Vider" class="nav-link-heart btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
                                                        <a href="{{route('R-All-PHU')}}" data-bs-toggle="tooltip" title="Tout Restorer" data-placement="bottom" class="nav-link-heart btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fas fa-sync-alt" style="font-size: 20px; color:#3300ff;"></i></a>&emsp;
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








