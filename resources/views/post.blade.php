@extends('layouts.admin')

@section('content')
        <div class="container-sm">
            <div class="card" style="width: 50%;">
                @if ($post->image)
                <img src="/storage/post_images/{{ $post->image }}" class="card-img-top" alt="">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">Κατηγορία: {{ $post->category->title }}</p>
                    <p class="card-text">{{ $post->body }}</p>
                    @if (Auth::check() && Auth::user()->id == $post->user->id)
                    <a href="{{ route('post.edit', $post) }}"><button class="btn btn-primary">Edit Post</button></a>
                    <a href="{{ route('post.delete', $post) }}"><button class="btn btn-danger">Delete Post</button></a>
                    @endif
                </div>
            </div>
        </div>
@endsection