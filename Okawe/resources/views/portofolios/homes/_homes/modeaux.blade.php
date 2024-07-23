{{-- MODEAUX DEBUT --}}
    <div>
        <div class="modal fade animated-modal" id="mentionlegale" tabindex="-1" aria-labelledby="mentionlegale" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center exceptional-modal-header">
                        <h1 class="modal-title fs-5 text-center exceptional-modal-title" id="mentionlegale">Mention Legale</h1>
                        <button type="button" class="btn-close exceptional-btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-description">
                            <div class="modal-bodydescription">
                                <div class="container-fluid">
                                    <div class="row">
                                        <section>
                                            <div class="row">
                                                <div class="col-12 col-md-12">
                                                    <div class="modal-content">
                                                        <div class="modal-content-titre">
                                                            <h3 class="text-center">
                                                                Mention Legale
                                                            </h3>
                                                        </div>
                                                        <div class="modal-content-description">
                                                            <div class="modal-description-text">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut quae asperiores quis eveniet magnam, blanditiis quam excepturi perferendis cumque optio expedita, odit itaque ipsa tenetur totam cupiditate nihil et deserunt porro tempore velit. Fugit nam, illum totam laboriosam fugiat quibusdam!</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer exceptional-modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary exceptional-btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
                        {{-- <button type="button" class="btn btn-primary exceptional-btn-save">Save changes</button> --}}
                    </div>
                </div>
            </div>
        </div>
        @foreach($personnelle as $key => $pers)
            <div class="modal fade animated-modal" id="consulter{{ $pers->id }}" tabindex="-1" aria-labelledby="consulterLabel{{ $pers->id }}" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header text-center exceptional-modal-header">
                            <h1 class="modal-title fs-5 text-center exceptional-modal-title" id="consulterLabel{{ $pers->id }}">{{$pers->titre}}</h1>
                            <button type="button" class="btn-close exceptional-btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-description">
                                <div class="modal-bodydescription">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <section>
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="modal-content">
                                                            <div class="modal-content-titre">
                                                                <h3 class="text-center">
                                                                    Description : {{$pers->description1}}
                                                                </h3>
                                                            </div>
                                                            <div class="modal-content-description">
                                                                <div class="modal-description-text">
                                                                    <div class="owl-carousel owl-1">

                                                                        <div class="media-29121 overlay" style="background-image: url('{{ asset($pers->le_profil2) }}');">
                                                                            <div class="container">
                                                                                <div class="row justify-content-center align-items-center text-center">
                                                                                    <div class="col-md-7">
                                                                                        <h2 class="text-center">{{$pers->description2}}</h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> <!-- .item -->
                                                                        <div class="media-29121 overlay" style="background-image: url('{{ asset($pers->le_profil3) }}');">
                                                                            <div class="container">
                                                                                <div class="row justify-content-center align-items-center text-center">
                                                                                <div class="col-md-7">
                                                                                    <h2 class="text-center">{{$pers->description3}}</h2>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> <!-- .item -->
                                                                        <div class="media-29121 overlay" style="background-image: url('{{ asset($pers->le_profil4) }}');">
                                                                            <div class="container">
                                                                                <div class="row justify-content-center align-items-center text-center">
                                                                                <div class="col-md-7">
                                                                                    <h2 class="text-center">{{$pers->description4}}</h2>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> <!-- .item -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer exceptional-modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary exceptional-btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
                            {{-- <button type="button" class="btn btn-primary exceptional-btn-save">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        @foreach($equipe as $key => $eqR)

            <div class="modal fade animated-modal" id="consulter{{ $eqR->id }}" tabindex="-1" aria-labelledby="consulterLabel{{ $eqR->id }}" aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header text-center exceptional-modal-header">
                            <h1 class="modal-title fs-5 text-center exceptional-modal-title" id="consulterLabel{{ $eqR->id }}">{{$eqR->titre}}</h1>
                            <button type="button" class="btn-close exceptional-btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                        </div>
                        <div class="modal-body">
                            <div class="modal-description">
                                <div class="modal-bodydescription">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <section>
                                                <div class="row">
                                                    <div class="col-12 col-md-12">
                                                        <div class="modal-content">
                                                            <div class="modal-content-titre">
                                                                <h3 class="text-center">
                                                                    Description : {{$eqR->description1}}
                                                                </h3>
                                                            </div>
                                                            <div class="modal-content-description">
                                                                <div class="modal-description-text">
                                                                    <div class="owl-carousel owl-1">

                                                                        <div class="media-29121 overlay" style="background-image: url('{{ asset($eqR->le_profil2) }}');">
                                                                            <div class="container">
                                                                                <div class="row justify-content-center align-items-center text-center">
                                                                                    <div class="col-md-7">
                                                                                        <h2 class="text-center">{{$eqR->description2}}</h2>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> <!-- .item -->
                                                                        <div class="media-29121 overlay" style="background-image: url('{{ asset($eqR->le_profil3) }}');">
                                                                            <div class="container">
                                                                                <div class="row justify-content-center align-items-center text-center">
                                                                                <div class="col-md-7">
                                                                                    <h2 class="text-center">{{$eqR->description3}}</h2>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> <!-- .item -->
                                                                        <div class="media-29121 overlay" style="background-image: url('{{ asset($eqR->le_profil4) }}');">
                                                                            <div class="container">
                                                                                <div class="row justify-content-center align-items-center text-center">
                                                                                <div class="col-md-7">
                                                                                    <h2 class="text-center">{{$eqR->description4}}</h2>
                                                                                </div>
                                                                                </div>
                                                                            </div>
                                                                        </div> <!-- .item -->
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer exceptional-modal-footer justify-content-between">
                            <button type="button" class="btn btn-secondary exceptional-btn-close" data-bs-dismiss="modal"><i class="fas fa-times"></i>&ensp;Close</button>
                            {{-- <button type="button" class="btn btn-primary exceptional-btn-save">Save changes</button> --}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        

    </div>
{{-- MODEAUX FIN --}}
