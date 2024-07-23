{{-- MES MAITRES DEBUT --}}
    <div class="las pb-3">
        <div>
            <div>
                <span>
                    <label for="" id="maitrise"></label>
                </span>
            </div>
        </div>
        <div data-aos="fade-up-left">
            <div class="container-fluid">
                <div class="row"> <!-- Utilisez Flexbox pour aligner les colonnes -->
                    <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6 d-flex flex-column justify-content-between" style="height: 100%;"> <!-- Fixez la hauteur de la colonne gauche -->
                        <div data-aos="zoom-in-up">
                            <h3 class="text-center my-3 mesTitre">
                                <span>M</span><span>e</span><span>s</span> <span>M</span><span>a</span><span>i</span><span>t</span><span>r</span><span>i</span><span>s</span><span>e</span><span>s</span>
                            </h3>
                        </div>
                        
                        
                        <div>
                            @foreach($maitrises as $key => $maitrise)
                                <div class="group" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                                    <p class="competence-text" >
                                        <i class="{{$maitrise->icon}}"></i>&ensp;{{$maitrise->nom}}
                                    </p>
                                    <div class="progress" role="progressbar" aria-valuenow="{{$maitrise->level}}" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar" data-level="{{$maitrise->level}}" style="width: 0%;" data-bs-toggle="tooltip" data-placement="bottom" title="{{$maitrise->nom}} : {{$maitrise->level}}%"></div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6  mesImages">
                        <img src="{{asset('portofolios/images/skills.jpg')}}" class="img-fluid" />
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container-fluid">
                <div class="row">
                    @foreach($suitemaitrises as $key => $suite)
                    <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">

                        <div class="group" data-aos="fade-up" >
                            <p class="competence-text" >
                                <i class="{{$suite->icon}}"></i>&ensp;{{$suite->nom}}
                            </p>
                            <div class="progress" role="progressbar" aria-valuenow="{{$suite->level}}" aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar" data-level="{{$suite->level}}" style="width: 0%;" data-bs-toggle="tooltip" data-placement="bottom" title="{{$suite->nom}} : {{$suite->level}}%"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
{{-- MES MAITRES FIN --}}
