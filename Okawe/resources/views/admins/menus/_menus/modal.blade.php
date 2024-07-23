<div>
    {{-- MODAL NOTIFICATION DEBUT --}}
        <div>
            @if (Route::has('login'))
                @auth
                @forelse ($notifications as $notification)
                    <div class="modal fade" id="repondre{{ $notification->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                    <h5 class="modal-title titre-grandiant" style="font-size : 20px; font-weight: 900; "><span><i class="fas fa-comment-dots"></i></span>&ensp;Commentaire de {{ $notification->data['comment_name'] ?? 'N/A' }} {{ $notification->data['comment_prenom'] ?? 'N/A' }} au post {{ $notification->data['comment_post'] ?? 'N/A' }}</h5>
                                    <button type="button" class="close nav-link-heart" data-dismiss="modal" aria-label="Close">
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
                                                <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                                                    <button type="button" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-danger btn-round nav-link-heart"  data-dismiss="modal" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-exclamation-triangle msicons"></i>&ensp;Fermer</button>
                                                    <button type="submit" class="btn mr-md-2 mb-md-0 mb-2 btn-outline-success btn-round nav-link-heart" style=" font-family: italic ;color:#D9B8F7;"><i class="fas fa-paper-plane"></i>&ensp; Envoyer</button>

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
</div>
