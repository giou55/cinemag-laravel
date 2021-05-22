@extends('layouts.app')

@section('content')
        <div class="container-sm post-item">
            <div class="row">
                    <div class="col-12 post-headers">
                        <div class="info">
                            <span class="category">{{ $post->category->title }}</span>
                            <div class="divider"></div> 
                            <span class="date">{{ $post->created_at->format('d/m/Y') }}</span> 
                        </div>
                        <h1>{{ $post->title }}</h1>
                        <p class="editor">{{ $post->user->fullname }}</p>
                    </div>
            </div>

            <div class="row">
                    <div class="col-12 col-lg-8">
                        @if ($post->image)
                            <img class="img-fluid mb-3" src="/storage/images/{{ $post->image }}" alt="">
                        @endif
                        <div class="post-body">{!! $post->body !!}</div>
                    </div>
            </div>
        </div>
@endsection