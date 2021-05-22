@extends('layouts.app')

@section('content')
        <div class="container p-5" style="position: relative;">
            <div class="posts-title-container">
                <h1 class="posts-title">{{ $title }}</h1>
            </div>

            <div class="row">
                        @foreach ($posts as $post)
                            <div class="col-12 search-post">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <div class="search-info">
                                            <span class="category">{{ $post->category->title }}</span>
                                            <div class="divider"></div> 
                                            <span class="date">{{ $post->created_at->format('d/m/Y') }}</span> 
                                        </div>
                                        <div class="search-title">
                                            <a href="{{ route('post', $post) }}">{{ $post->title }}</a>
                                        </div>
                                        <div class="search-body">
                                            <?php $pos=strpos($post->body, ' ', 1500); echo substr($post->body, 0, $pos ) . '....'; ?>
                                        </div>
                                        <p class="search-editor">{{ $post->user->fullname }}</p>
                                    </div>
                                    @if ($post->image)
                                        <div class="col-12 col-md-4">
                                            <img src="/storage/images/{{ $post->image }}" class="img-fluid" alt="">
                                        </div>
                                    @endif
                                    <div class="search-divider"></div>
                                </div> 
                            </div> 
                        @endforeach
            </div>
        </div>
@endsection