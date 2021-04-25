@extends('layouts.admin')

@section('content')
        <div class="container-sm">
            <h2>Τα άρθρα μου</h2>
            {{-- <div class="d-flex flex-row flex-wrap"> --}}
            <div class="card-columns">
                @foreach ($posts as $post)
                    {{-- <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="mb-3 card">
                        @if ($post->image)
                        <img src="/storage/post_images/{{ $post->image }}" class="card-img-top" alt="">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                            <a href="{{ route('post', $post) }}">{{ $post->title }}</a>
                            </h5>
                            <p class="card-text">Κατηγορία: {{ $post->category->title }}</p>
                            <p class="card-text">Συντάκτης: {{ $post->user->fullname }}</p>
                            <p class="card-text">{{ $post->body }}</p>
                        </div>
                        </div>
                    </div> --}}
                    <div class="card">
                        @if ($post->image)
                            <img class="card-img-top" src="/storage/post_images/{{ $post->image }}" alt="">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('post', $post) }}">{{ $post->title }}</a>
                            </h5>
                            <p class="card-text">{{ $post->body }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection


