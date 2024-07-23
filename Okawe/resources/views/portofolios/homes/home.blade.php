@extends('portofolios.menus.menu')
@section('titre')
Portofolio
@endsection
@section('header')
    <!-- Si tu as des éléments à inclure dans le header, tu peux les ajouter ici -->
    <style>
        .modal-fullscreen {
            width: 100vw;
            height: 100vh;
            max-width: 100%;
            max-height: 100%;
            margin: 0;
        }

        .modal-fullscreen .modal-dialog {
            width: 100%;
            height: 100%;
            margin: 0;
        }

    </style>
@endsection

@section('corps')
<header>
    @include('portofolios.menus._menus.menu')
</header>

    <div>
        @include('portofolios.homes._homes.modeaux')

        <div class="container-fluid pt-4">

            <section class="Qui-Je-Suis">
                <div class="container" id="okawejeremy" style="background-color: #f0eaea">
                    @include('portofolios.homes._homes.quijesuis')
                </div>
            </section>
            <section class="Mes-Competences">
                <div class="containair-fluid" id="competence" style="background-color: #eae4e4">
                    @include('portofolios.homes._homes.mescompetences')
                </div>
            </section>
            <section class="Mes-Realisations">
                <div class="container-fluid" id="portofolio" style="background-color: #f0eaea">
                    @include('portofolios.homes._homes.mesrealisations')
                </div>
            </section>
            <section class="Mes-Maitrises">
                <div class="container-fluid" style="background-color: #eae4e4" id="">
                    @include('portofolios.homes._homes.mesmaitrises')
                </div>
            </section>
            <section class="Me-Contacter">
                <div class="container-fluid" style="background-color: #f0eaea" id="contact">
                    @include('portofolios.homes._homes.blog')
                </div>
            </section>
            <section class="Me-Contacter">
                <div class="container-fluid" style="background-color: #f0eaea" id="contact">
                    @include('portofolios.homes._homes.mecontacter')
                </div>
            </section>
        </div>
    </div>
@endsection

@section('footer')
<!-- Si tu as des éléments à inclure dans le footer, tu peux les ajouter ici -->
@endsection


   {{-- <div class="card">
                <div class="card-body">
                    <h1>{{ $post->title }}</h1>
                    <p class="card-text">{{ $post->content }}</p>
                    <p class="card-text"><small class="text-muted">Published by {{ $post->user->name }} on {{ $post->created_at->format('M d, Y') }}</small></p>
                </div>
            </div>

            <div class="card mt-3">
                <div class="card-body">
                    <h2>Comments</h2>
                    @forelse ($post->comments as $comment)
                        <div class="mb-3">
                            <p>{{ $comment->body }}</p>
                            <p class="text-muted">By {{ $comment->user->name }} on {{ $comment->created_at->format('M d, Y') }}</p>
                            @foreach ($comment->replies as $reply)
                                <div class="ml-3">
                                    <p>{{ $reply->body }}</p>
                                    <p class="text-muted">By {{ $reply->user->name }} on {{ $reply->created_at->format('M d, Y') }}</p>
                                </div>
                            @endforeach
                        </div>
                    @empty
                        <p>No comments yet.</p>
                    @endforelse

                    <form action="{{ route('comments.store', $post) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="body">Add a comment:</label>
                            <textarea class="form-control" id="body" name="body" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div> --}}
