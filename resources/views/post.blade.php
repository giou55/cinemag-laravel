@extends('layouts.app')

@section('content')
        <div class="container-sm">
            <h2>{{ $post->title }}</h2>
            <p>Κατηγορία: {{ $post->category }}</p>
            <p>{{ $post->body }}</p>
            @if (Auth::check() && Auth::user()->id == $post->user->id)
                <a href="{{ route('post.edit', $post) }}"><button class="btn btn-primary">Edit Post</button></a>
                <a href="{{ route('post.delete', $post) }}"><button class="btn btn-danger">Delete Post</button></a>
            @endif
        </div>
@endsection