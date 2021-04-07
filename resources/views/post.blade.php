@extends('layouts.app')

@section('content')
        <div class="container-sm">
            <h2>{{ $post->title }}</h2>
            <p>{{ $post->body }}</p>
            <a href="{{ route('post.edit', $post) }}"><button class="btn btn-primary">Edit Post</button></a>
            <a href="{{ route('post.delete', $post) }}"><button class="btn btn-danger">Delete Post</button></a>
        </div>
@endsection