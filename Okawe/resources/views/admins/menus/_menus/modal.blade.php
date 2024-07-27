<div>
    {{-- MODAL NOTIFICATION DEBUT --}}
        <div>
            @if (Route::has('login'))
                @auth
                @forelse ($notifications as $notification)
                    <div class="modal fade animated-modal" id="repondre{{ $notification->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header moncard" >
                                    <h4 class="modal-title fw-bold " style="font-size : 35px; font-weight: 900; ">
                                        <span><i class="fas fa-comment-dots mesicons"></i></span>&ensp;
                                        <span class="comming" style="font-weight: 900;">C</span>ommentaire de <span class="comming">{{ $notification->data['comment_name'] ?? 'N/A' }} {{ $notification->data['comment_prenom'] ?? 'N/A' }} </span>au post {{ $notification->data['comment_post'] ?? 'N/A' }}
                                    </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    @if($notification->data['comment_p'] != '' && $notification->data['comment_p']==null)
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                    <img src="{{ $notification->data['comment_p'] }}" alt="" class="img-thumbnail">
                                                </div>
                                            </div>
                                        </div>
                                        @else
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                    <p class="text-center">Ce commentaire n'a pas de d'image joint</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="pb-3 col-12 col-md-12 col-ml-12 col-lg-12">
                                                <span>{{ $notification->data['comment_body'] ?? 'No content' }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('comments.admin-reply', $notification->data['comment_id']) }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                    <div class="form-group">
                                                        <label for="replyBody" class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fa fas fa-keyboard msicons" aria-hidden="true"></i>&ensp;Réponse</label>
                                                        <textarea class="form-control" id="replyBody" name="body" rows="3" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                                    <label><i class="fas fa-camera-retro msicons"></i>&ensp;Ajouter un fichier</label>
                                                    <div class="form-group">
                                                        <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="photo" id="customFile" accept=".png,.gpg,.gpeg, .jpg,.avif">
                                                        <label class="custom-file-label" for="customFile" style=" color: var(--color-t); font-family: italic;"> <i class="fas fa-image"></i>&ensp;</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="modal-footer justify-content-between moncard">
                                                    <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart" data-dismiss="modal" style="font-family: italic;">
                                                        <i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer
                                                    </button>
                                                    <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style="font-family: italic;">
                                                        <i class="fas fa-paper-plane msicons"></i>&ensp;Répondre
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                @endforelse
                    @else

                    @endauth
                @endif

        </div>
    {{-- MODAL NOTIFICATION FIN --}}
    <!-- Modal HTML -->

</div>

<section>
    {{-- CONSULTER LA TACHE DEPUIS LE CALENDRIER DEBUT --}}
        <div class="modal fade animated-modal" id="taskModal" tabindex="-1" aria-labelledby="taskModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header moncard">
                        <h4 class="modal-title fw-bold " style="font-size : 35px; font-weight: 900; ">
                            <span><i class="fas fa-tasks mesicons"></i></span>&ensp;
                            <span class="comming" style="font-weight: 900;">D</span>étails de la <span class="comming">T</span>ache
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong><i class="fas fa-file-signature msicons" aria-hidden="true"></i>&ensp;Titre :&ensp;</strong> <span id="modalTitle"></span></p>
                        <p><strong><i class="fas fa-comment-alt msicons"></i>&ensp;Description :&ensp;</strong> <span id="modalDescription"></span></p>
                        <p><strong><i class="fas fa-cog msicons"></i>&ensp;Status :&ensp;</strong> <span id="modalStatus"></span></p>
                        <p><strong><i class="fas fa-calendar-alt msicons"></i>&ensp;Date de début :&ensp;</strong> <span id="modalStartDate"></span></p>
                        <p><strong><i class="fas fa-calendar-alt msicons"></i>&ensp;Date de fin :&ensp;</strong> <span id="modalEndDate"></span></p>
                        <p><strong><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Projet :&ensp;</strong> <span id="modalProject"></span></p>
                        <p><strong><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Qui doit éffectuer la tache :&ensp;</strong> <span id="modalEffectuant"></span></p>

                        <div class="modal-footer justify-content-between moncard">
                            <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart" data-dismiss="modal" style="font-family: italic;">
                                <i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer
                            </button>
                            {{-- <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style="font-family: italic;">
                                <i class="fas fa-trash-alt msicons"></i>&ensp;Supprimer et Fermer
                            </button> --}}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    {{-- CONSULTER LA TACHE DEPUIS LE CALENDRIER FIN --}}
    {{-- MODIFIER LE STATUT DE LA TACHE DEPUIS LE HOME DEBUT --}}
        <div class="modal fade animated-modal" id="editTaskModal" tabindex="-1" role="dialog" aria-labelledby="editTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header moncard">
                        <h4 class="modal-title fw-bold " style="font-size : 35px; font-weight: 900; ">
                            <span><i class="fas fa-tasks mesicons"></i></span>&ensp;
                            <span class="comming" style="font-weight: 900;">M</span>difier la <span class="comming">T</span>ache
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="editTaskForm" action="{{ route('tasks.updateStatus', ':id') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="task_id" id="task_id">

                            <div class="form-group">
                                <label for="status">Statut</label>
                                <select class="form-control select2 text-start" id="status" name="status">
                                    <option value="attente">En attente</option>
                                    <option value="cours">En cours</option>
                                    <option value="termine">Terminée</option>
                                    <option value="reporte">Reportée</option>
                                </select>
                            </div>

                            {{-- <button type="submit" class="btn btn-primary">Enregistrer les modifications</button> --}}
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
    {{-- MODIFIER LE STATUT DE LA TACHE DEPUIS LE HOME FIN --}}
    {{-- SUPPRIMER LA TACHE DEPUIS LE HOME DEBUT --}}
        <div class="modal fade animated-modal" id="deleteTaskModal" tabindex="-1" role="dialog" aria-labelledby="deleteTaskModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header moncard">
                        <h4 class="modal-title fw-bold " style="font-size : 35px; font-weight: 900; ">
                            <span><i class="fas fa-tasks mesicons"></i></span>&ensp;
                            <span class="comming" style="font-weight: 900;">S</span>upprimer la <span class="comming">T</span>ache
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                    </div>
                    <div class="">
                        <form id="deleteTaskForm" method="POST" action="">
                            <span class="text-danger tex-center d-flex justify-content-center pb-4 w-100 bold">
                                Êtes-vous sûr de vouloir supprimer cette tâche ?
                            </span>
                            @csrf
                            @method('DELETE')
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
    {{-- SUPPRIMER LA TACHE DEPUIS LE HOME FIN --}}
    {{-- AJOUTER UNE TACHE DEPUIS LE HOME DEBUT --}}
        {{-- MODAL AJOUTER DEBUT --}}
            <div class="modal fade animated-modal" id="modal-default">
                <div class="modal-dialog  modal-lg">
                    <div class="modal-content">
                        <div class="modal-header moncard" >
                            <h4 class="modal-title fw-bold " style="font-size : 35px; font-weight: 900; ">
                                <span><i class="fas fa-tasks mesicons"></i></span>&ensp;
                                <span class="comming" style="font-weight: 900;">A</span>jouter une <span class="comming">T</span>ache
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" >
                            <form method="POST" action="{{ route('AjouterTask') }}" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <div class="row">
                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-file-signature msicons" aria-hidden="true"></i>&ensp;Nom de la tache</label>
                                                <input type="text" class="form-control" id="" name="title" placeholder="Entrer le nome de la tache">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex" style=" font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Nom du Projet</label>
                                                <select class="form-control select2 text-start" name="project_id" style="width: 100%;">
                                                    @foreach ($projets as $key => $value)
                                                        <option class="text-start" value="{{$value->id}}">{{$value->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-cog msicons"></i>&ensp;Assigner à</label>
                                                <select class="form-control select2 text-start" name="assigned_to" style="width: 100%;">
                                                    @foreach ($users as $key => $value)
                                                        <option class="text-start" value="{{$value->id}}">{{$value->name}} {{$value->prenom}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex" style=" font-family: italic;"><i class="fas fa-cog msicons"></i>&ensp;Assigner à</label>
                                                <select class="form-control select2 text-start"  id="status" name="status" required style="width: 100%;">
                                                    {{-- <option  value="{{$value->id}}">{{$value->name}} {{$value->prenom}}</option> --}}
                                                    <option class="text-start" value="attente">En attente</option>
                                                    <option class="text-start" value="cours">En cours</option>
                                                    <option class="text-start" value="termine">Terminé</option>
                                                    <option class="text-start" value="reporte">Reporté</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex" style="font-family: italic;">
                                                    <i class="fas fa-calendar-alt msicons"></i>&ensp;Date de début
                                                </label>
                                                <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $value->start_date) }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-ml-6 col-lg-6">
                                            <div class="form-group">
                                                <label class="d-flex" style="font-family: italic;">
                                                    <i class="fas fa-calendar-alt msicons"></i>&ensp;Date de fin
                                                </label>
                                                <input type="date" class="form-control"  name="end_date" value="{{ old('end_date', $value->end_date) }}">
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-12 col-ml-12 col-lg-12">
                                            <div class="form-group">
                                                <label class="d-flex" style="font-family: italic;"><i class="fas fa-comment-alt msicons"></i>&ensp;Description</label>
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

    {{-- AJOUTER UNE TACHE DEPUIS LE HOME FIN --}}
</section>

