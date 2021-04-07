@extends('layouts.app')

@section('content')
        <div class="container-sm">
            <h2>My Posts</h2>
            @foreach ($posts as $post)
                @include('includes.post')
            @endforeach
        </div>
@endsection