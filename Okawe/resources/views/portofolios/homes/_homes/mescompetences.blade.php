{{-- MES COMPETENCES DEBUT --}}
<style>


</style>
<div class=" pb-4">
    <div data-aos="fade-up" data-aos-duration="3000">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">
                    <div data-aos="fade-right" class="blog-image mesImages">
                        <img src="{{asset('portofolios/images/competence.jpg')}}" alt="Photo de Jeremy" class="img-thumbnail"/>
                    </div>
                </div>
                
                <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6">
                    <div class="skills">
                        <div data-aos="fade-down" data-aos-duration="1500" data-aos-delay="200">
                            <h3 class="text-center pt-4 mesTitre">
                                <span>M</span><span>e</span><span>s</span> <span>c</span><span>o</span><span>m</span><span>p</span><span>é</span><span>t</span><span>e</span><span>n</span><span>c</span><span>e</span><span>s</span>
                            </h3>
                        </div>
                        
                        @foreach($competences as $key => $comp)
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="group" data-aos="fade-left">
                                <p class="competence-text" >
                                    <i class="{{$comp->icon}}"></i>&ensp;{{$comp->nom}}
                                </p>
                                <div class="progress" role="progressbar" aria-valuenow="{{$comp->level}}" aria-valuemin="0" aria-valuemax="100">
                                    <div class="progress-bar" data-level="{{$comp->level}}" style="width: 0%;" data-bs-toggle="tooltip" data-placement="bottom" title="{{$comp->nom}} : {{$comp->level}}%"></div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="container-fluid">
                <div class="row">
                    @foreach($suitecompetences as $key => $suite)
                    <div class="col-12 col-sm-12 col-md-12 col-ml-6 col-lg-6 pr-4 pl-4">
                        <div class="group" data-aos="fade-up">
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
</div>
{{-- MES COMPETENCES FIN --}}



