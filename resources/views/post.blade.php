@extends('layouts.app')

@section('content')
        <div class="container-sm post-item">
            <div class="row">
                    <div class="col-12 post-headers">
                        <div>{{ $post->created_at->format('d/m/Y') }}</div>
                        <h1>{{ $post->title }}</h1>
                        <p>Συντάκτης: {{ $post->user->fullname }}</p>
                    </div>
            </div>

            <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                        @if ($post->image)
                            <img src="/storage/images/{{ $post->image }}" alt="">
                        @endif
                        <p>Κατηγορία: {{ $post->category->title }}</p>
                        <p>{!! $post->body !!}</p>
                    </div>
            </div>
        </div>
@endsection