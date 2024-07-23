<div class="modal fade" id="modal-default">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                <h4 class="modal-title fw-bold titre-grandiant" style="font-size : 35px; font-weight: 900; "><span><i class="fas fa-university"></i></span>&ensp;Ajouter un Accomplissement</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #B460B5;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body my-custom-modal" {{--style="background: #B460B5;"--}}>
                <form method="post" action="{{ route('AjouterAccomplissement') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6 m-auto">
                                    <h1 class="text-center">Icônes</h1>

                                    <div class="input-group mb-3">
                                        <input type="text" id="iconSearch" class="form-control" placeholder="Rechercher une icône" aria-label="Rechercher une icône">
                                        <div class="input-group-append">
                                            <button class="btn btn-sm btn-primary" type="button" id="searchButton">Rechercher</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($icons as $icon)
                                    <div class="col-6 col-sm-6 col-md-3 col-ml-3 col-lg-3 mb-3">
                                        <div class="icon-card" data-icon="{{ $icon }}">
                                            <i class="{{ $icon }}" ></i>
                                            <p>{{ $icon }}</p>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Pagination -->
                                <div class="pagination">
                                    {{ $icons->links() }}
                                </div>
                                
                            </div>
                        </div>
                        <!-- Notification -->
                        <div class="notification" id="notification">Icône copiée!</div>
                        {{-- Formulaire --}}
                        <div class="container-fluid pt-2">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="d-flex" style="font-family: italic;"><i class="fa fa-code msicons" aria-hidden="true"></i>&ensp;Nom :</label>
                                        <input type="text" class="form-control" id="" name="nom" placeholder="Entrer le nom">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment-alt" aria-hidden="true"></i>&ensp;Icon :</label>
                                        <input type="text" class="form-control" id="" name="icon" placeholder="Entrer le nom de l'icon">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="d-flex" style=" color: var(--color-t); font-family: italic;"><i class="fas fa-comment-alt" aria-hidden="true"></i>&ensp;Pourcentage :</label>
                                        <input type="number" min="1" max="100" class="form-control" id="" name="level" placeholder="Entrer le pourcentage">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-6 col-ml-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="d-flex" style="color: var(--color-t); font-family: italic;"><i class="fa fa-crosshairs msicons" aria-hidden="true"></i>&ensp;Catégorie :</label>
                                        <select class="js-example-basic-single w-100" name="type_id" >
                                            <option selected>Choisir le type d'accomplissement</option>
                                            @foreach ($types as $key => $value)
                                                <option class="text-start" value="{{$value->id}}">{{$value->libelle}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer justify-content-between bgnav" style="background-image: url({{asset('glbal/theme/t7.jpg')}}) ;  background-size: cover; background-repeat: no-repeat;">
                        <button type="button" class="btn btn-md btn-rounded btn-outline-danger "  data-dismiss="modal" style=" font-family: italic ;"><i class="typcn typcn-times-outline"></i>&ensp;Fermer</button>
                        <button type="submit" class="btn btn-md btn-rounded btn-outline-success " style=" font-family: italic ;"><i class="typcn typcn-input-checked"></i>&ensp; Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>