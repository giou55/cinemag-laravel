@extends('layouts.app')

@section('content')
        <div class="container p-5">
            <div class="row mb-3">
                <div class="col-6">
                    <div>Εμφανίζονται όλα τα αποτελέσματα για:</div>
                    <form class="d-flex" method="GET" action="{{ route('search') }}">
                        <input class="form-control form-control-lg mr-2" type="search" aria-label="Search" value="{{ $q }}" name="q">
                        <button class="btn btn-outline-primary btn-lg" type="submit">Υποβολή</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-8">
                    @foreach ($posts as $post)
                    <div class="d-flex">
                        <div class="col-6">
                        @if ($post->image)
                            <img src="/storage/images/{{ $post->image }}" class="img-fluid" alt="">
                        @endif
                        </div>
            
                        <div class="col-6">
                            <p>Κατηγορία: {{ $post->category->title }}</p>
                            <h5><a href="{{ route('post', $post) }}">{{ $post->title }}</a></h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <p class="card-text">Συντάκτης: {{ $post->user->name }}</p>
                        </div>
                    </div>
                    <br><hr><br>
                    @endforeach
                </div>
            </div>
        </div>
@endsection