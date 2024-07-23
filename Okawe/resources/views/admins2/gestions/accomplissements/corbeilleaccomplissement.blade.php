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

                    <div class="col-12 col-sm-12 col-md-12 col-ml-12 col-lg-12">
                        <div class="content-header pb-5">
                            <div class="col-md-12 col-lg-12 menus"  >
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
                                        <li class="breadcrumb-item active navhomet animate__animated animate__bounceInUp" aria-current="page" >Maitrise & Comptence</li>
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
                        <div class="card menus">
                            <div class="card-header">
                                <div class="container-fluid">
                                    <div class="row align-items-center">
                                        <div class="col-md-auto">

                                        </div>
                                        <div class="col-md">
                                            <div class="d-flex justify-content-end">
                                                <div class="form-group">
                                                    <label for="">
                                                        <a href="{{route('A-Accomplissements')}}" class="btn btnleft" id="" data-bs-toggle="tooltip" title="Accomplissments total">
                                                            <i class="fas fa-archive nav-link-heart btnleft" style=" font-size: 20px;"></i>
                                                        </a>
                                                        <sup class="btnleft" style="">{{$CompTotal}}</sup>
                                                    </label>
                                                    <label for="">
                                                        <a href="{{route('AC-Accomplissements')}}" class="btn btnleft" id="" data-bs-toggle="tooltip" data-placement="bottom" title="Accomplissments total en corbeille">
                                                            <i class="fa fa-trash nav-link-heart btnleft " style=" font-size: 20px;"></i>
                                                        </a>
                                                        <sup class="btnleft" >{{$CompTotalC}}</sup>
                                                    </label>
                                                </div>
                                                <a href="#" class="btn btnleft" id="A" data-bs-toggle="tooltip" title="Option">
                                                    <i class="fa fa-ellipsis-v nav-link-heart btnleft" style=" font-size: 20px;"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive">
                                <table id="example" class="display" style="width:100%">
                                    <thead class="text-center">
                                        <tr class="text-center">
                                            <th class="text-center">#</th>
                                            <th class="text-center">Icon</th>

                                            <th class="text-center">Nom</th>
                                            <th class="text-center">Progress</th>
                                            <th class="text-center">Type d'acomplissement</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($comps as $key => $value)
                                        <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                            <tr class="text-center">
                                                <td class="text-center">{{$key+1}}</td>

                                                <td class="text-center">
                                                    <i class="{{$value->icon}}"></i>
                                                </td>
                                                <td class="text-center">{{$value->nom}}</td>

                                                <td class="text-center">
                                                    <div class="progress" >
                                                        @if($value->level >= 80)
                                                            <div class="progress-bar" role="progressbar" style="width: {{$value->level}}%; background-color: #28a745;" aria-valuenow="{{$value->level}}" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-placement="bottom" title="{{$value->level}}%"></div>
                                                        @elseif($value->level >= 60)
                                                            <div class="progress-bar" role="progressbar" style="width: {{$value->level}}%; background-color: #007bff;" aria-valuenow="{{$value->level}}" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-placement="bottom" title="{{$value->level}}%"></div>
                                                        @elseif($value->level == 50)
                                                            <div class="progress-bar" role="progressbar" style="width: {{$value->level}}%; background-color: #17a2b8;" aria-valuenow="{{$value->level}}" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-placement="bottom" title="{{$value->level}}%"></div>
                                                        @elseif($value->level >= 45)
                                                            <div class="progress-bar" role="progressbar" style="width: {{$value->level}}%; background-color: #ffc107;" aria-valuenow="{{$value->level}}" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-placement="bottom" title="{{$value->level}}%"></div>
                                                        @else
                                                            <div class="progress-bar" role="progressbar" style="width: {{$value->level}}%; background-color: #dc3545;" aria-valuenow="{{$value->level}}" aria-valuemin="0" aria-valuemax="100" data-bs-toggle="tooltip" data-placement="bottom" title="{{$value->level}}%"></div>
                                                        @endif
                                                    </div>
                                                    {{-- {{$value->level}} --}}
                                                </td>
                                                <td class="text-center">

                                                    {{$value->type->libelle}}
                                                </td>

                                                <td style="" class="sorting_1 text-center">
                                                    <div class="btn-group">
                                                        <div style="">
                                                            <div class="">
                                                                <div class="btn-group btn-block">
                                                                <a type="button" class="btn btn-success nav-link-heart" data-bs-toggle="tooltip" title="Consulter" data-toggle="modal" data-target="#consulter{{$value->id}}"><i class="fas fa-eye" style="font-size: 20px; color:#050034;"></i></a>
                                                                <a type="button" class="btn btn-outline-warning nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Restorer" data-toggle="modal" data-target="#modifier{{$value->id}}"><i class="fas fa-recycle" style="font-size: 20px; color:#050034;"></i></a>
                                                                <a type="button" class="btn btn-danger nav-link-heart"  data-bs-toggle="tooltip" title="Supprimer" data-toggle="modal" data-target="#corbeille{{$value->id}}"><i class="fas fa-trash" style="font-size: 20px; color:#050034;"></i></a>
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
                                                    <div class="modal-dialog  modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header menus" >
                                                            <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-spinner"></i></span>&ensp;Consulter la Progression : {{$value->nom}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mdl">
                                                            <form>
                                                                @csrf
                                                                <!--corp du formulaire debut-->
                                                                <div>
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style="font-family: italic;"><i class="fas fa-text-height msicons" aria-hidden="true"></i>&ensp;Nom :</label>
                                                                                <input type="text" class="form-control"value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" name="nom" placeholder="Entrer le nom">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-icons" aria-hidden="true"></i>&ensp;Icon :</label>
                                                                                {{-- <i class="{{$value->icon}}"></i> --}}
                                                                                <input type="text" class="form-control" value="{{$value->icon}}" readonly id="consulter{{$value->id}}" name="icon" placeholder="Entrer le nom de l'icon">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fab fa-r-project" aria-hidden="true"></i>&ensp;Pourcentage :</label>
                                                                                <input type="number" min="1" max="100" class="form-control" value="{{$value->level}}" readonly id="consulter{{$value->id}}" name="level" placeholder="Entrer le pourcentage">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style="color: var(--color-t); font-family: italic;"><i class="fas fa-project-diagram" aria-hidden="true"></i>&ensp;Catégorie :</label>
                                                                                <select disabled class="js-example-basic-single w-100" name="type_id" >
                                                                                    <option selected>Choisir le type d'accomplissement</option>
                                                                                    @foreach ($types as $key => $tp)
                                                                                        <option class="text-start" value="{{$value->id}}" {{($tp->id==$value->type_id)?"selected":""}}>{{$tp->libelle}}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>


                                                                    </div>

                                                                </div>

                                                                <div class="">
                                                                    <div class="">
                                                                        <div class="modal-footer justify-content-between menus" >
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
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header menus" >
                                                                <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-chevron-circle-up"></i></span>&ensp;Restorer la Progression : {{$value->nom}}</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body mdl">
                                                                <form method="post" action="{{route('RecupAccomplissement')}}">
                                                                        @csrf
                                                                        <input type="hidden" name="id" value="{{$value->id}}">
                                                                        <!--corp du formulaire debut-->
                                                                        <div>
                                                                            <div class="row">
                                                                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex" style="font-family: italic;"><i class="fas fa-text-height msicons" aria-hidden="true"></i>&ensp;Nom :</label>
                                                                                        <input type="text" class="form-control"value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" name="nom" placeholder="Entrer le nom">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-icons" aria-hidden="true"></i>&ensp;Icon :</label>
                                                                                        {{-- <i class="{{$value->icon}}"></i> --}}
                                                                                        <input type="text" class="form-control" value="{{$value->icon}}" readonly id="consulter{{$value->id}}" name="icon" placeholder="Entrer le nom de l'icon">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fab fa-r-project" aria-hidden="true"></i>&ensp;Pourcentage :</label>
                                                                                        <input type="number" min="1" max="100" class="form-control" value="{{$value->level}}" readonly id="consulter{{$value->id}}" name="level" placeholder="Entrer le pourcentage">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                    <div class="form-group">
                                                                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;"><i class="fas fa-project-diagram" aria-hidden="true"></i>&ensp;Catégorie :</label>
                                                                                        <select disabled class="js-example-basic-single w-100" name="type_id" >
                                                                                            <option selected>Choisir le type d'accomplissement</option>
                                                                                            @foreach ($types as $key => $tp)
                                                                                                <option class="text-start" value="{{$value->id}}" {{($tp->id==$value->type_id)?"selected":""}}>{{$tp->libelle}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                </div>


                                                                            </div>

                                                                        </div>
                                                                    <div class="modal-footer justify-content-between menus" >
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
                                                    <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header menus" >
                                                            <h4 class="modal-title titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-trash"></i></span>&ensp;Supprimer le Progression : {{$value->nom}}</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mdl" >
                                                            <form method="post" action="{{route('SupprimerAccomplissement')}}">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$value->id}}">
                                                                    <!--corp du formulaire debut-->
                                                                    <div>
                                                                        <div class="row">
                                                                            <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style="font-family: italic;"><i class="fas fa-text-height msicons" aria-hidden="true"></i>&ensp;Nom :</label>
                                                                                    <input type="text" class="form-control"value="{{$value->libelle}}" readonly id="consulter{{$value->id}}" name="nom" placeholder="Entrer le nom">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-icons" aria-hidden="true"></i>&ensp;Icon :</label>
                                                                                    {{-- <i class="{{$value->icon}}"></i> --}}
                                                                                    <input type="text" class="form-control" value="{{$value->icon}}" readonly id="consulter{{$value->id}}" name="icon" placeholder="Entrer le nom de l'icon">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fab fa-r-project" aria-hidden="true"></i>&ensp;Pourcentage :</label>
                                                                                    <input type="number" min="1" max="100" class="form-control" value="{{$value->level}}" readonly id="consulter{{$value->id}}" name="level" placeholder="Entrer le pourcentage">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                <div class="form-group">
                                                                                    <label class="d-flex" style="color: var(--color-t); font-family: italic;"><i class="fas fa-project-diagram" aria-hidden="true"></i>&ensp;Catégorie :</label>
                                                                                    <select disabled class="js-example-basic-single w-100" name="type_id" >
                                                                                        <option selected>Choisir le type d'accomplissement</option>
                                                                                        @foreach ($types as $key => $tp)
                                                                                            <option class="text-start" value="{{$value->id}}" {{($tp->id==$value->type_id)?"selected":""}}>{{$tp->libelle}}</option>
                                                                                        @endforeach
                                                                                    </select>
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                    </div>
                                                                    <div class="modal-footer justify-content-between menus" >
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
                                                        <a href="{{route('D-All-A')}}" data-bs-toggle="tooltip" title="Tout Vider" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
                                                        <a href="{{route('R-All-A')}}" data-bs-toggle="tooltip" title="Tout Restorer" data-placement="bottom" class="btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fas fa-sync-alt" style="font-size: 20px; color:#3300ff;"></i></a>&emsp;
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
