@extends('layouts.app')

@section('content')
        <div class="container" style="position: relative;">
            <div class="posts-title-container">
                <h1 class="posts-title">{{ $title }}</h1>
            </div>
                
            <div class="row pt-5">
                @foreach ($posts as $post)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 post-container">
                        <div class="mb-3">
                        @if ($post->image)
                            <img src="/storage/images/{{ $post->image }}" class="img-fluid mb-2" alt="">
                        @endif
                            <a href="{{ route('post', $post) }}">{{ $post->title }}</></a>
                            <div class="post-body">
                                <?php $pos=strpos($post->body, ' ', 1000); echo substr($post->body, 0, $pos ) . '....'; ?>
                            </div>
                            <p class="post-editor">{{ $post->user->fullname }}</p>
                            <p>Κατηγορία: {{ $post->category->title }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
@endsection