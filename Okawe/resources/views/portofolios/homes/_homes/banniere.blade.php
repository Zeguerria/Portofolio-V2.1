<div class="container-fluid">
    <div class="row pb-5">
        <div>
            <div>
                <div>
                    <span>
                        <label for="" id="entreprise"></label>
                    </span>
                </div>
            </div>
            <div class="titre">
               
                <h3 class="text-center my-3 mesTitre pb-2">
                    <span>e</span><span>n</span><span>t</span><span>r</span><span>e</span><span>p</span><span>r</span><span>i</span><span>s</span><span>e</span><span>s</span> <span>f</span><span>r</span><span>é</span><span>q</span><span>u</span><span>e</span><span>n</span><span>t</span><span>é</span><span>e</span><span>s</span>
                </h3>
            </div>
            <div>
                <div class="banner-section">
                    <div class="banner-wrapper">
                        <div class="container-fluid">
                            <div class="row mb-n5">

                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-6">
                                    @foreach($dernierreentreprises as $key => $cour)
                                        <!-- Start Banner Single Item -->
                                        <div class="banner-single-item banner-style-1 banner-animation img-responsive aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                            <div class="image">
                                                <img src="{{ asset($cour->le_profil) }}" alt="">
                                            </div>
                                            <div class="content">
                                                <h4 class="title">{{$cour->nom}}</h4>
                                                <h5 class="sub-title">{{$cour->responsable}} <br>{{$cour->phone}}</h5>
                                                <a href="#" class="btn btn-lg btn-outline-golden icon-space-left"><span class="d-flex align-items-center">{{$cour->periode}}<i class="ion-ios-arrow-thin-right"></i></span></a>
                                            </div>
                                        </div>
                                        <!-- End Banner Single Item -->
                                    @endforeach

                                </div>

                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-6">
                                    <div class="row mb-n6">
                                        @foreach($entreprises as $key => $entr)
                                            <!-- Start Banner Single Item -->
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-6">
                                                <div class="banner-single-item banner-style-2 banner-animation img-responsive aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                                    <div class="image">
                                                        <img src="{{ asset($entr->le_profil) }}" alt="">
                                                    </div>
                                                    <div class="content">
                                                        <h4 class="title">{{$entr->nom}}</h4>
                                                        <h5 class="sub-title">{{$entr->responsable}} <br>{{$entr->phone}}</h5>
                                                        <a href="#" class="link-text"><span>{{$entr->periode}}</span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-12">
                                    <div class="container-fluid">
                                        <div class="row">
                                            @foreach($suiteentreprises as $key => $suit)
                                                <!-- Start Banner Single Item -->
                                                <div class="col-12 col-sm-12 col-md-6 col-lg-6 mb-6">
                                                    <div class="banner-single-item banner-style-2 banner-animation img-responsive aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                                                        <div class="image">
                                                            <img src="{{ asset($suit->le_profil) }}" alt="">
                                                        </div>
                                                        <div class="content">
                                                            <h4 class="title">{{$suit->nom}}</h4>
                                                            <h5 class="sub-title">{{$suit->responsable}} <br>{{$suit->phone}}</h5>
                                                            <a href="#" class="link-text"><span>{{$suit->periode}}</span></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End Banner Single Item -->
                                            @endforeach


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
</div>

<style>

    .banner-section {
        /* Styles pour la section des bannières */
    }

    .banner-wrapper {
        /* Styles pour l'enveloppe des bannières */
    }

    .banner-single-item {
        position: relative;
        overflow: hidden;
        margin-bottom: 35px; /* Espacement entre chaque bannière */
    }

    .banner-single-item .image {
        position: relative;
        overflow: hidden;
    }

    .banner-single-item .image::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5); /* Couleur de l'overlay */
        opacity: 0;
        transition: opacity 0.3s ease; /* Transition pour une animation fluide */
    }

    .banner-single-item:hover .image::before {
        opacity: 1; /* Opacité maximale au survol */
    }

    .banner-single-item .content {
        position: absolute;
        bottom: 20px; /* Espacement par rapport au bas de la bannière */
        left: 20px; /* Espacement par rapport à gauche */
        color: #fff; /* Couleur du texte */
        z-index: 1; /* Place le contenu au-dessus de l'overlay */
        opacity: 0;
        transition: opacity 0.3s ease; /* Transition pour une animation fluide */
    }

    .banner-single-item:hover .content {
        opacity: 1; /* Opacité maximale au survol */
    }

    .banner-single-item .content h4,
    .banner-single-item .content h5,
    .banner-single-item .content a {
        transition: transform 0.3s ease; /* Transition pour une animation fluide */
    }

    .banner-single-item:hover .content h4,
    .banner-single-item:hover .content h5,
    .banner-single-item:hover .content a {
        transform: translateY(0); /* Déplacement vers le haut au survol */
    }

    /* Ajoutez d'autres styles CSS au besoin pour personnaliser davantage les bannières */


</style>
