{{-- DERNIERRE CONNEXION DEBUT--}}
    <div>
        <div>
            <div class="row">
                <div class="col-sm-6">
                    @if (Route::has('login'))
                        @auth
                            <h3 class="mb-0 font-weight-bold"> {{Auth::user()->name}}  {{Auth::user()->prenom}}</h3>
                            <p>Votre dernière connexion remonte à : {{Auth::user()->last_login}} </p>
                        @else
                            <h3 class="mb-0 font-weight-bold">Kenneth Osborne</h3>
                            <p>Votre dernière connexion remonte à : maintenant </p>
                        @endauth
                    @endif
                </div>
                <div class="col-sm-6">
                <div class="d-flex align-items-center justify-content-md-end">
                    {{-- <div class="mb-3 mb-xl-0 pr-1">
                        <div class="dropdown">
                        <button class="btn bg-white btn-sm dropdown-toggle btn-icon-text border mr-2" type="button" id="dropdownMenu3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="typcn typcn-calendar-outline mr-2"></i>Last 7 days
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3" data-x-placement="top-start">
                            <h6 class="dropdown-header">Last 14 days</h6>
                            <a class="dropdown-item" href="#">Last 21 days</a>
                            <a class="dropdown-item" href="#">Last 28 days</a>
                        </div>
                        </div>
                    </div>
                    <div class="pr-1 mb-3 mr-2 mb-xl-0">
                    <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-arrow-forward-outline mr-2"></i>Export</button>
                    </div>
                    <div class="pr-1 mb-3 mb-xl-0">
                    <button type="button" class="btn btn-sm bg-white btn-icon-text border"><i class="typcn typcn-info-large-outline mr-2"></i>info</button>
                    </div> --}}
                </div>
                </div>
            </div>
        </div>
    </div>
{{-- DERNIERRE CONNEXION FIN --}}
