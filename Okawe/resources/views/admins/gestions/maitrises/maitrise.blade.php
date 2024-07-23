{{-- @php
    $droits = array();

    foreach(Auth::user()->profil->profil_habilitations as $key => $value){
        $droits[$key] = $value->habilitation->code;
    }
@endphp --}}


@extends('admins.menus.menu')
@section('titre')
Parametre
@endsection
@section('header')
{{-- MON CSS DEBUT --}}
<style>
    .notification2 {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50;
        color: white;
        padding: 4px;
        border-radius: 5px;
        display: none;
    }
    .notification3 {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #4CAF50;
        color: white;
        padding: 4px;
        border-radius: 5px;
        display: none;
    }

    .icon-card {
        cursor: pointer;
        text-align: center;
        border: 1px solid #ddd;
        padding: 10px;
        border-radius: 2px;
        transition: box-shadow 0.3s ease;
    }

    .icon-card:active {
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }

    .icon-card:hover {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

</style>
{{-- MON CSS FIN --}}

   {{-- SCRIPT POUR LA RECHERCHE ET LA COPIE DES ICÔNES DE LA PROGRESSION DÉBUT --}}
   <script>
    document.addEventListener('DOMContentLoaded', function () {
        const iconContainer = document.getElementById('iconContainer');
        const notification2 = document.getElementById('notification2');
        const iconSearch = document.getElementById('iconSearch');
        const searchButton = document.getElementById('searchButton');

        const icons = @json($icons);

        searchButton.addEventListener('click', function () {
            const searchValue = iconSearch.value.toLowerCase();
            filterIcons(searchValue);
        });

        iconSearch.addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            filterIcons(searchValue);
        });

        function filterIcons(searchValue) {
            iconContainer.innerHTML = ''; // Clear previous results
            const filteredIcons = icons.filter(icon => icon.toLowerCase().includes(searchValue));
            if (filteredIcons.length === 0) {
                showNotification2('Aucun résultat trouvé');
            } else {
                const row = document.createElement('div');
                row.classList.add('row');
                filteredIcons.forEach(icon => {
                    const iconCard = document.createElement('div');
                    iconCard.classList.add('col-6', 'col-sm-6', 'col-md-3', 'col-ml-3', 'col-lg-3','m-3', 'icon-card');
                    iconCard.setAttribute('data-icon', icon);
                    iconCard.innerHTML = `<div><i class="${icon}"></i><p>${icon}</p></div>`;
                    row.appendChild(iconCard);

                    // Ajouter un écouteur d'événement pour copier l'icône
                    iconCard.addEventListener('click', function () {
                        const iconText = iconCard.querySelector('p').textContent;
                        copyToClipboard(iconText);
                    });
                });
                iconContainer.appendChild(row);
            }
        }

        function showNotification2(message) {
            notification2.textContent = message;
            notification2.style.display = 'block';
            setTimeout(() => {
                notification2.style.display = 'none';
            }, 3000);
        }

        function copyToClipboard(text) {
            navigator.clipboard.writeText(text).then(() => {
                showNotification2('Icône copiée : ' + text);
            }).catch(err => {
                console.error('Erreur lors de la copie de l\'icône : ', err);
            });
        }
    });
</script>
{{-- SCRIPT POUR LA RECHERCHE ET LA COPIE DES ICÔNES DE LA PROGRESSION FIN --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Fonction pour initialiser les modals de modification
        function initializeModifierModal(modifierId) {
            const iconContainer3 = document.getElementById(`iconContainer${modifierId}`);
            const notification3 = document.getElementById(`notification${modifierId}`);
            const iconSearch3 = document.getElementById(`iconSearch${modifierId}`);
            const searchButton3 = document.getElementById(`searchButton${modifierId}`);

            const icons = @json($icons); // Assurez-vous que $icons est correctement défini dans votre contrôleur

            searchButton3.addEventListener('click', function () {
                const searchValue = iconSearch3.value.toLowerCase();
                filterIcons(searchValue, iconContainer3, notification3);
            });

            iconSearch3.addEventListener('input', function () {
                const searchValue = this.value.toLowerCase();
                filterIcons(searchValue, iconContainer3, notification3);
            });

            function filterIcons(searchValue, container, notificationElement) {
                container.innerHTML = ''; // Clear previous results
                const filteredIcons = icons.filter(icon => icon.toLowerCase().includes(searchValue));
                if (filteredIcons.length === 0) {
                    showNotification('Aucun résultat trouvé', notificationElement);
                } else {
                    const row = document.createElement('div');
                    row.classList.add('row');
                    filteredIcons.forEach(icon => {
                        const iconCard = document.createElement('div');
                        iconCard.classList.add('col-6', 'col-sm-6', 'col-md-3', 'col-ml-3', 'col-lg-3', 'm-3', 'icon-card');
                        iconCard.setAttribute('data-icon', icon);
                        iconCard.innerHTML = `<div><i class="${icon}"></i><p>${icon}</p></div>`;
                        row.appendChild(iconCard);

                        // Ajouter un écouteur d'événement pour copier l'icône
                        iconCard.addEventListener('click', function () {
                            const iconText = iconCard.querySelector('p').textContent;
                            copyToClipboard(iconText);
                        });
                    });
                    container.appendChild(row);
                }
            }

            function showNotification(message, notificationElement) {
                notificationElement.textContent = message;
                notificationElement.style.display = 'block';
                setTimeout(() => {
                    notificationElement.style.display = 'none';
                }, 3000);
            }

            function copyToClipboard(text) {
                navigator.clipboard.writeText(text).then(() => {
                    showNotification('Icône copiée : ' + text, notification3);
                }).catch(err => {
                    console.error('Erreur lors de la copie de l\'icône : ', err);
                });
            }
        }

        // Initialiser chaque modal de modification avec un suffixe numérique pour éviter les conflits
        @foreach ($comps as $value)
            initializeModifierModal('{{ $value->id }}');
        @endforeach
    });
</script>





@endsection
@section('corps')

    <div class="content-wrapper lebody masection pb-5">
        <div class="content-header p-3 pb-5">
            <div class="col-md-12 col-lg-12 moncard entete"  >
                <div class="title pt-2">
                    <h4 class="mb-0 bread entete animate__animated animate__bounceInDown" >
                        <img src="{{asset('glbal/icon/planning.gif')}}" alt="" class="img img-circle" width="50" height="50" style="border-radius: 50%;">
                        &ensp;Accomplissements
                    </h4>

                </div>
                <nav aria-label="breadcrumb" role="navigation" class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="d-flex align-items-center mb-2 mb-md-0"> <!-- Utilisation de classes flex pour aligner horizontalement sur les petits écrans et verticalement sur les grands écrans -->
                        <span id="currentDateTime" class="date"></span> <!-- Élément pour afficher la date et l'heure -->
                    </div>
                    <ol class="breadcrumb naventete">
                        <li class="breadcrumb-item navhome nav-link-heart" data-bs-toggle="tooltip" data-placement="bottom" title="Acceuil"><a href="{{route('HomeAdmin')}}" >Home</a></li>
                        <li class="breadcrumb-item active navhomeb" aria-current="page" >Gestions</li>
                        <li class="breadcrumb-item active navhomet animate__animated animate__bounceInUp" aria-current="page" >Maitrise & Comptence</li>
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
                                                <label for=""><a href="{{route('A-Accomplissements')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" title="Accomplissments total" ><i class=" fas fa-chalkboard-teacher msicons" ></i></a><sup>{{$CompTotal}}</sup></label>
                                                <label for=""><a href="{{route('AC-Accomplissements')}}" class="btn nav-link-heart" id="" data-bs-toggle="tooltip" data-placement="bottom" title="Accomplissments total en corbeille"><i class="fa fa-trash msicons" ></i></a><sup >{{$CompTotalC}}</sup></label>
                                            </div>

                                            <a href="#" class="btn nav-link-heart" id="A" data-bs-toggle="tooltip" title="Option"><i class="fa fa-ellipsis-v msicons" ></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade animated-modal" id="modal-default">
                                    <div class="modal-dialog  modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header moncard" >
                                                <h4 class="modal-title fw-bold " style="font-size : 35px; font-weight: 900; ">
                                                    <span><i class="fas fas fa-star-of-david mesicons"></i></span>&ensp;
                                                    <span class="comming" style="font-weight: 900;">A</span>jouter une <span class="comming">A</span>ccomplissement
                                                </h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body" >
                                                <form method="POST" action="{{ route('AjouterAccomplissement') }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="container-fluid">
                                                        <div class="row">
                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-5 col-lg-5">
                                                                <div class="container-fluid pt-2">
                                                                    <div class="row">
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style="font-family: italic;"><i class="fas fa-text-height msicons" aria-hidden="true"></i>&ensp;Nom :</label>
                                                                                <input type="text" class="form-control" id="" name="nom" placeholder="Entrer le nom">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-icons" aria-hidden="true"></i>&ensp;Icon :</label>
                                                                                <input type="text" class="form-control" id="" name="icon" placeholder="Entrer le nom de l'icon">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fab fa-r-project" aria-hidden="true"></i>&ensp;Pourcentage :</label>
                                                                                <input type="number" min="1" max="100" class="form-control" id="" name="level" placeholder="Entrer le pourcentage">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="d-flex" style="color: var(--color-t); font-family: italic;"><i class="fas fa-project-diagram" aria-hidden="true"></i>&ensp;Catégorie :</label>
                                                                                <select class="form-control select2" name="type_id" style="width: 100%;" required>
                                                                                    @foreach ($types as $value)
                                                                                        <option value="{{ $value->id }}">{{ $value->libelle }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-sm-12 col-md-12 col-ml-7 col-lg-7">
                                                                <div class="container-fluid">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <h1 class="text-center">Icônes</h1>
                                                                        </div>
                                                                        <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6 m-auto">
                                                                            <!-- Barre de recherche d'icônes -->
                                                                            <div class="input-group mb-3">
                                                                                <input type="text" id="iconSearch" class="form-control" placeholder="Rechercher une icône" aria-label="Rechercher une icône">
                                                                                <div class="input-group-append">
                                                                                    <button class="btn btn-sm btn-primary nav-link-heart" type="button" id="searchButton">Rechercher</button>
                                                                                </div>
                                                                                <br>

                                                                            </div>
                                                                            <div class="notification2" id="notification2">Icône copiée!</div>

                                                                        </div>
                                                                        <div class="container-fluid ">
                                                                            <div class="row">
                                                                                <!-- Contenu des icônes -->
                                                                                <div class="col-12 col-sm-12 col-md-12 col-ml-12 pr-4 m-auto" id="iconContainer">
                                                                                    <!-- Les icônes correspondant à la recherche seront chargées ici -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped ">
                                    <thead>
                                        <tr class="text-center">
                                            <th >#</th>
                                            <th >Icon</th>
                                            <th >Nom</th>
                                            <th >Progress</th>
                                            <th >Type d'acomplissement</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                        <tbody >
                                            @foreach($comps as $key => $value)
                                                <tr>
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
                                                                            <span class="comming" style="font-weight: 900;">C</span>onsulter l'Accomplissement : {{$value->nom}}
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
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fas fa-text-height msicons" aria-hidden="true"></i>&ensp;Nom :</label>
                                                                                                <input type="text" class="form-control"value="{{$value->nom}}" readonly id="consulter{{$value->id}}" name="nom" placeholder="Entrer le nom">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="  font-family: italic;"><i class="fas fa-icons" aria-hidden="true"></i>&ensp;Icon :</label>
                                                                                                {{-- <i class="{{$value->icon}}"></i> --}}
                                                                                                <input type="text" class="form-control" value="{{$value->icon}}" readonly id="consulter{{$value->id}}" name="icon" placeholder="Entrer le nom de l'icon">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="  font-family: italic;"><i class="fab fa-r-project" aria-hidden="true"></i>&ensp;Pourcentage :</label>
                                                                                                <input type="number" min="1" max="100" class="form-control" value="{{$value->level}}" readonly id="consulter{{$value->id}}" name="level" placeholder="Entrer le pourcentage">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-project-diagram" aria-hidden="true"></i>&ensp;Catégorie :</label>

                                                                                                <select class="form-control select2" disabled name="type_id" style="width: 100%;" required>
                                                                                                    @foreach ($types as $tp)
                                                                                                    <option value="{{$tp->id}}" {{($tp->id==$value->type_id)?"selected":""}}>{{$tp->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
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
                                                                    <div class="modal-header moncard">
                                                                        <h4 class="modal-title" style="font-size: 35px; font-weight: 900;">
                                                                            <span><i class="fas fa-chevron-circle-up msicons"></i></span>&ensp;
                                                                            <span class="comming" style="font-weight: 900;">M</span>odifier l'Accomplissement : {{$value->nom}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="{{route('ModifierAccomplissement')}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-12 col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style="font-family: italic;">
                                                                                                <i class="fas fa-text-height msicons" aria-hidden="true"></i>&ensp;Nom :
                                                                                            </label>
                                                                                            <input type="text" class="form-control" value="{{$value->nom}}" name="nom" placeholder="Entrer le nom">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                                                <i class="fas fa-icons" aria-hidden="true"></i>&ensp;Icon :
                                                                                            </label>
                                                                                            <input type="text" class="form-control" value="{{$value->icon}}" name="icon" placeholder="Entrer le nom de l'icon">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                                                <i class="fab fa-r-project" aria-hidden="true"></i>&ensp;Pourcentage :
                                                                                            </label>
                                                                                            <input type="number" min="1" max="100" class="form-control" value="{{$value->level}}" name="level" placeholder="Entrer le pourcentage">
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12 col-md-6">
                                                                                        <div class="form-group">
                                                                                            <label class="d-flex" style="color: var(--color-t); font-family: italic;">
                                                                                                <i class="fas fa-project-diagram" aria-hidden="true"></i>&ensp;Catégorie :
                                                                                            </label>
                                                                                            <select class="form-control select2" name="type_id" style="width: 100%;" required>
                                                                                                @foreach ($types as $tp)
                                                                                                    <option value="{{$tp->id}}" {{($tp->id==$value->type_id) ? "selected" : ""}}>{{$tp->libelle}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-12">
                                                                                        <h1 class="text-center">Icônes</h1>
                                                                                        <div class="input-group mb-3">
                                                                                            <input type="text" id="iconSearch3" class="form-control" placeholder="Rechercher une icône">
                                                                                            <div class="input-group-append">
                                                                                                <button class="btn btn-sm btn-primary" type="button" id="searchButton3">Rechercher</button>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="notification3" id="notification3">Icône copiée!</div>
                                                                                        <div id="iconContainer3"></div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer justify-content-between moncard">
                                                                                <button type="button" class="btn btn-outline-danger btn-round" data-dismiss="modal" style="font-family: italic msicons">
                                                                                    <i class="fas fa-exclamation-triangle"></i>&ensp;Fermer
                                                                                </button>
                                                                                <button type="submit" class="btn btn-outline-success btn-round" style="font-family: italic;">
                                                                                    <i class="fas fa-save msicons"></i>&ensp;Modifier et Fermer
                                                                                </button>
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
                                                                            <span class="comming" style="font-weight: 900;">S</span>upprimer l'Accomplissement : {{$value->nom}}
                                                                        </h4>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" action="{{route('CorbeilleAccomplissement')}}" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <input type="hidden" name="id" value="{{$value->id}}">
                                                                            <!-- Reste du formulaire -->
                                                                            <div>
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="font-family: italic;"><i class="fas fa-text-height msicons" aria-hidden="true"></i>&ensp;Nom :</label>
                                                                                                <input type="text" class="form-control"value="{{$value->nom}}" readonly id="consulter{{$value->id}}" name="nom" placeholder="Entrer le nom">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="  font-family: italic;"><i class="fas fa-icons" aria-hidden="true"></i>&ensp;Icon :</label>
                                                                                                {{-- <i class="{{$value->icon}}"></i> --}}
                                                                                                <input type="text" class="form-control" value="{{$value->icon}}" readonly id="consulter{{$value->id}}" name="icon" placeholder="Entrer le nom de l'icon">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style="  font-family: italic;"><i class="fab fa-r-project" aria-hidden="true"></i>&ensp;Pourcentage :</label>
                                                                                                <input type="number" min="1" max="100" class="form-control" value="{{$value->level}}" readonly id="consulter{{$value->id}}" name="level" placeholder="Entrer le pourcentage">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                                                                            <div class="form-group">
                                                                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-project-diagram" aria-hidden="true"></i>&ensp;Catégorie :</label>
                                                                                                <select class="form-control select2" disabled name="type_id" style="width: 100%;" required>
                                                                                                    @foreach ($types as $tp)
                                                                                                    <option value="{{$tp->id}}" {{($tp->id==$value->type_id)?"selected":""}}>{{$tp->libelle}}</option>
                                                                                                    @endforeach
                                                                                                </select>
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
                                                        <a href="{{route('C-All-A')}}" data-bs-toggle="tooltip" title="Tout Supprimer" class="nav-link-heart btn btn-sm code-copy pull-left" data-clipboard-target="#basic-table-code"><i class="fa fa-trash" style="font-size: 20px; color:#ff0000;"></i></a>&emsp;
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








