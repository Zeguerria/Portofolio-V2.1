@extends('admins.menus.menu')
@section('titre')
    Acceuil
@endsection
@section('corps')
    <div class="container-fluid">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="./home">Home</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">Dashboard</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">Home</h6>
        </nav>
        <div class="block pt-3">
            <div class="row">
                {{-- TOTAUX DEBUT --}}
                    <section class="section-1">
                        <div>
                            @include('admins.homes._homes.totaux')
                        </div>

                    </section>
                {{-- TOTAUX DEBUT --}}
            </div>
            <div class="row mt-4">
                {{-- CHARTS DEBUT --}}
                    <section class="section-2">
                        <div>
                            @include('admins.homes._homes.charts')
                        </div>

                    </section>
                {{-- CHARTS FIN --}}
            </div>
            <div class="row mt-4">
                {{-- AUTRES DEBUT --}}
                    <section class="section-3">
                        <div>
                            @include('admins.homes._homes.autres')
                        </div>

                    </section>
                {{-- AUTRES FIN --}}
            </div>
        </div>
    </div>
@endsection
@section('footer')

@endsection
