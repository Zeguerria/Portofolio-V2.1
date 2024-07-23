{{-- MES REALISATIONS DEBUT --}}

<div>
    <div>
        <div>
            <span>
                <label for="" id="equipe"></label>
            </span>
        </div>
    </div>
    <div data-aos="flip-left" data-aos-easing="ease-out-cubic" data-aos-duration="2000">
        <div class="container">
            <div class="pt-4">
                <div class="row">
                    <div class="col-12">
                        <!-- Réalisations en équipe -->
                        <div class="equipe">
                            <div data-aos="fade-out" data-aos-anchor-placement="center-bottom">
                                <h3 class="text-center my-3 mesTitre ">
                                    <span>M</span><span>e</span><span>s</span> <span>r</span><span>é</span><span>a</span><span>l</span><span>i</span><span>s</span><span>a</span><span>t</span><span>i</span><span>o</span><span>n</span><span>s</span> <span>e</span><span>n</span> <span>é</span><span>q</span><span>u</span><span>i</span><span>p</span><span>e</span>
                                </h3>
                                <div class="row pt-3">
                                    @foreach($equipe as $key => $eqR)
                                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                                            <div class="card ">
                                                <img class="card-img-top" src="{{ asset($eqR->le_profil1) }}" alt="Card image cap"/>
                                                <div class="card-body" style="background-color: #eae4e4;">
                                                    <div class="la">
                                                        <p class="card-text text-center" style="color: #000;">{{ $eqR->titre }}</p>
                                                        <a class="btn btn-outline-primary btn-md btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#consulter{{ $eqR->id }}">Détail...</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal -->

                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <section>
                            <div class="container-fluid">
                                <div class="row">
                                    @include('portofolios.homes._homes.banniere')
                                </div>
                            </div>
                        </section>
                        <div>
                            <div>
                                <span>
                                    <label for="" id="perso"></label>
                                </span>
                            </div>
                        </div>
                        <!-- Réalisations personnelles -->
                        <div class="personnelle">
                            <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <h3 class="text-center my-3 mesTitre">
                                    <span>M</span><span>e</span><span>s</span> <span>r</span><span>é</span><span>a</span><span>l</span><span>i</span><span>s</span><span>a</span><span>t</span><span>i</span><span>o</span><span>n</span><span>s</span> <span>p</span><span>e</span><span>r</span><span>s</span><span>o</span><span>n</span><span>n</span><span>e</span><span>l</span><span>l</span><span>e</span><span>s</span>
                                </h3>
                                <div class="row pt-3">
                                    @foreach($personnelle as $key => $pers)
                                        <div class="col-12 col-md-6 col-lg-4 mb-4">
                                            <div class="card">
                                                <img class="card-img-top" src="{{ asset($pers->le_profil1) }}" alt="{{ asset($pers->le_profil1) }}"/>
                                                <div class="card-body" style="background-color: #eae4e4;">
                                                    <div class="la">
                                                        <p class="card-text text-center" style="color: #000;">{{ $pers->titre }}</p>
                                                        <a class="btn btn-outline-primary btn-md btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#consulter{{ $pers->id }}">Détail...</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- .personnelle div fermeture -->
                    </div> <!-- .col-12 fermeture -->
                </div> <!-- .row fermeture -->
            </div> <!-- .pt-4 fermeture -->
        </div> <!-- .container-fluid fermeture -->
    </div> <!-- [data-aos] fermeture -->
</div> <!-- [data-aos] fermeture -->
{{-- MES REALISATIONS FIN --}}
