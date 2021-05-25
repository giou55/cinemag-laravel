@extends('layouts.app')

@section('content')
        <div class="container p-5">
            <div class="row mb-5">
                <div class="col-12 col-md-8 col-lg-6">
                    <div>Εμφανίζονται όλα τα αποτελέσματα για:</div>
                    <form class="d-flex" method="GET" action="{{ route('search') }}">
                        <input class="form-control form-control-lg mr-2" type="search" aria-label="Search" value="{{ $q }}" name="q">
                        <button class="btn btn-outline-primary btn-lg" type="submit">Υποβολή</button>
                    </form>
                </div>
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
                                            <?php $pos=strpos($post->body, ' ', 600); echo substr($post->body, 0, $pos ) . '....'; ?>
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