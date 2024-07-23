{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}

@extends('admins.menus.menu')
@section('titre')
    Profils
@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header p-3 pb-5">
            <div class="col-md-12 col-lg-12 moncard entete"  >
                <div class="title pt-2">
                    <h4 class="mb-0 bread entete animate__animated animate__bounceInDown" >
                        <img src="{{asset('glbal/icon/password.gif')}}" alt="" class="img img-circle" width="50" height="50" style="border-radius: 50%;">
                        &ensp;Profils
                    </h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-2 mb-md-0"> <!-- Utilisation de classes flex pour aligner horizontalement sur les petits écrans et verticalement sur les grands écrans -->
                        <span id="currentDateTime" class="date"></span> <!-- Élément pour afficher la date et l'heure -->
                    </div>
                    <ol class="breadcrumb naventete">
                        <li class="breadcrumb-item navhome nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Acceuil"><a href="{{route('HomeAdmin')}}" >Home</a></li>
                        <li class="breadcrumb-item active navhomeb" aria-current="page" >Gestions</li>
                        <li class="breadcrumb-item active navhomet animate__animated animate__bounceInUp" aria-current="page" >Profil</li>
                    </ol>
                </nav>
            </div>
        </div>
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header moncard">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn nav-link-heart" data-bs-toggle="tooltip" title="Ajouter" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus" style="font-size: 30px; color:#7bff00;"></i></button>
                                        </div>
                                        <div class="col-md-9 pt-4 d-flex nav justify-content-end">
                                            <div class="form-group">
                                                <label for=""><a href="{{route('P-Profils')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" title="profils total" ><i class=" fab fa-500px msicons" ></i></a><sup>{{$ProfilT}}</sup></label>
                                                <label for=""><a href="{{route('PC-Profils')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" data-placement="bottom" title="profils total en corbeille"><i class="fa fa-trash msicons" ></i></a><sup >{{$ProfilTC}}</sup></label>
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
                                                            <span><i class="fas fas fa-star-of-david mesicons"></i></span>&ensp;
                                                            <span class="comming" style="font-weight: 900;">A</span>jouter un <span class="comming">P</span>rofil
                                                        </h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <form method="POST" action="{{ route('AjouterProfil') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div>
                                                                <div class="row">
                                                                    <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Code</label>
                                                                        <input type="text" class="form-control" id="" name="code" placeholder="Entrer le code">
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                    <div class="form-group">
                                                                        <label class="d-flex" style="font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Libelle</label>
                                                                        <input type="text" class="form-control" id="" name="libelle" placeholder="Entrer le Libelle">
                                                                    </div>
                                                                    </div>
                                                                    <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                        <div class="form-group">
                                                                            <label class="d-flex" style=" font-family: italic;"><i class="fas fa-comment-alt msicons" aria-hidden="true"></i>&ensp;Description</label>
                                                                            <textarea class="form-control" name="description"></textarea>
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
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Code</th>
                                        <th>Libelle</th>
                                        <th>Description</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody >
                                    @foreach($profils as $key => $value)
                                        <tr>
                                            <td class="text-center">{{$key+1}}</td>
                                            <td class="text-center"> {{$value->code}}</td>
                                            <td class="text-center">{{$value->libelle}}</td>
                                            @if($value->description !=null)
                                                <td class="text-center">{{$value->description}}</td>
                                            @else
                                                <td class="text-center">Aucune observation</td>
                                            @endif
                                            <td style="" class="sorting_1 text-center">
                                                <div class="btn-group">
                                                    <div style="">
                                                        <div class=" ">
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
                                                                    <span class="comming" style="font-weight: 900;">C</span>onsulter le Profil : {{$value->libelle}}
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
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Code</label>
                                                                                    <input type="text" class="form-control" value="{{$value->code}}" readonly id="consulter{{$value->id}}" name="code" placeholder="Entrer le code">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Libelle</label>
                                                                                    <input type="text" class="form-control" value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" name="libelle" placeholder="Entrer le libellé">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment-alt" aria-hidden="true"></i>&ensp;Description</label>
                                                                                    @if($value->description !=null)
                                                                                        <textarea class="form-control" disabled name="description" value="{{$value->description}}">{{$value->description}}</textarea>
                                                                                    @else
                                                                                        <textarea class="form-control" disabled name="description" value="{{$value->description}}">Aucune Description</textarea>
                                                                                    @endif
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
                                                                    <span class="comming" style="font-weight: 900;">M</span>odifier le Profil : {{$value->libelle}}
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body" >
                                                                <form method="post" action="{{route('ModifierProfil')}}" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                                        <!--corp du formulaire debut-->
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col-md-6">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex" style=" font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Code</label>
                                                                                        <input type="text" class="form-control" value="{{$value->code}}"  id="consulter{{$value->id}}" name="code" placeholder="Entrer le code">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Libelle</label>
                                                                                        <input type="text" class="form-control" value="{{$value->libelle}}"  id="consulter{{$value->id}}" name="libelle" placeholder="Entrer le libellé">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment-alt" aria-hidden="true"></i>&ensp;Description</label>
                                                                                        @if($value->description !=null)
                                                                                            <textarea class="form-control"  name="description" value="{{$value->description}}">{{$value->description}}</textarea>
                                                                                        @else
                                                                                            <textarea class="form-control"  name="description" value="{{$value->description}}">Aucune Description</textarea>
                                                                                        @endif
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
                                                                    <span class="comming" style="font-weight: 900;">S</span>upprimer le Profil : {{$value->libelle}}
                                                                </h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post" action="{{route('CorbeilleProfil')}}" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                                    <!-- Reste du formulaire -->
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Code</label>
                                                                                    <input type="text" class="form-control" value="{{$value->code}}" readonly id="consulter{{$value->id}}" name="code" placeholder="Entrer le code">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Libelle</label>
                                                                                    <input type="text" class="form-control" value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" name="libelle" placeholder="Entrer le libellé">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment-alt" aria-hidden="true"></i>&ensp;Description</label>
                                                                                    @if($value->description !=null)
                                                                                        <textarea class="form-control" disabled name="description" value="{{$value->description}}">{{$value->description}}</textarea>
                                                                                    @else
                                                                                        <textarea class="form-control" disabled name="description" value="{{$value->description}}">Aucune Description</textarea>
                                                                                    @endif
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
                                                    <a href="{{route('C-All-PU')}}" data-bs-toggle="tooltip" title="Tout Supprimer" class="nav-link-heart btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
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








