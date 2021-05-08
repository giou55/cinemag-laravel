@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-3" id="feed">

            <div class="d-flex flex-column">
                @foreach ($posts as $post)
                    <div class="blog">
                        @if ($post->image)
                            <img src="/storage/images/{{ $post->image }}" class="rounded-circle" alt="">
                        @endif
                        <div class="blog-caption">
                            {{ $post->title }} 
                            <div class="caption-divider"></div>
                            <span>{{ $post->created_at->format('d/m/Y') }}</span>
                        </div>
                        <div class="blog-body">
                            <a href="{{ route('post', $post) }}">{{ $post->body }}</a>
                        </div>
                        <div class="blog-divider">

                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <div class="col-md-9 row">

            <div class="col-md-8">
                @foreach ($first as $f)
                    <div class="first">
                        @if ($f->image)
                            <img src="/storage/images/{{ $f->image }}" alt="">
                        @endif
                        <h2>
                            <a href="{{ route('post', $f) }}">
                                <span>{{ $f->title }}</span>
                            </a>
                        </h2>
                        <div>
                            {{ $f->body }}
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-4 pb-3">
                @foreach ($right as $r)
                    <div class="right">
                        @if ($r->image)
                            <img src="/storage/images/{{ $r->image }}" alt="">
                        @endif
                        <h4>
                            <a href="{{ route('post', $r) }}">
                                <span>{{ $r->title }}</span>
                            </a>
                        </h4>
                        <div>
                            {{ $r->body }}
                        </div>
                        <div class="wave-hr">
                            <img src="{{ asset('images/wave-hr.svg') }}" alt="">
                        </div>
                        
                    </div>
                @endforeach
            </div>

            
            <div class="col-md-12 featured-title">
                <div class="svg-container">
                    <svg viewBox="0 0 400 91" xmlns="http://www.w3.org/2000/svg">
                    <path fill="#231f20" d="M.3 0h48l3.6 23.6H23.6V33H42v23.6H23.6v33H.3V0zM104.8 83.1c-4 2.4-13.3 8-27 8-10.6 0-32-6.8-32-33.6 0-23.1 18.9-33.8 33.7-33.8 21.1 0 26.1 14.8 28.6 22.8l-32.5 23c1.1.7 4.4 1.7 7.5 1.7 7.3 0 16-4.8 20.1-9.2l1.6 21.1zM84.6 44.5c-1.4-1.7-5.3-2.2-7.1-2.2-6 0-10.9 4.2-10.9 11.9 0 1.1.2 2.2.5 3.5l17.5-13.2zM116.4 26c5.8-.4 11.8-.9 17.7-.9 17 0 26.4 3.1 26.4 20.3v44.1h-18.7v-4.7h-.2c-.7 1.4-5.2 6.2-13.9 6.2-10.7 0-20-8.1-20-22.6 0-11.1 7.8-21.9 22.3-21.9 3.9 0 7.5.7 9.5 1.7 0-6.5-2.1-8.5-11.7-8.5-6.7 0-9.8.9-13.8 1.5l2.4-15.2zm11.8 41c0 3.6 3 6.6 6.6 6.6 3.6 0 6.6-3 6.6-6.6s-3-6.6-6.6-6.6c-3.6 0-6.6 3-6.6 6.6zM168.5 17.2l21.6-12.4v20.4h8v18.7h-8v17.7c0 3.1 0 6.5 6.3 6.5 1.9 0 2.5-.2 3.2-.5l-3.2 22.1c-18.3 0-28 0-28-16.3V43.8H164V25.1h4.5v-7.9zM259.3 89.5h-21.6v-6c-4.2 4.6-9.3 7.5-15.8 7.5-9 0-18.7-4.8-18.7-18.5V25.1h21.6v35.3c0 4.1.7 9 6.6 9 5.3 0 6.2-4.8 6.2-9V25.1h21.6v64.4zM263.7 25.1h21.6v6.5h.2c2.7-5 6.3-6.5 13.9-6.5v21.6c-12.1 0-14.2 4.2-14.2 11.6v31.2h-21.6V25.1zM358.4 83.1c-4 2.4-13.3 8-27 8-10.6 0-32-6.8-32-33.6 0-23.1 18.9-33.8 33.7-33.8 21.1 0 26.1 14.8 28.6 22.8l-32.5 23c1.1.7 4.4 1.7 7.5 1.7 7.3 0 16-4.8 20.1-9.2l1.6 21.1zm-20.3-38.6c-1.4-1.7-5.3-2.2-7.1-2.2-6 0-10.9 4.2-10.9 11.9 0 1.1.2 2.2.5 3.5l17.5-13.2zM364.2 69.5c1 .5 3.5 1.6 6.5 1.6 2.7 0 5.7-1 5.7-4 0-5.3-13.3-9.1-13.3-24 0-13.9 9.3-19.5 22.3-19.5 5.8 0 10.2.2 12.6.5v20.4c-1.9-1.2-4.5-2.2-7.3-2.2-2.5 0-4.8 1.6-4.8 4.4 0 4.7 14.1 10.3 14.1 25 0 12.3-7.5 19.4-23.8 19.4-1.9 0-5 0-11.8-1.5V69.5z"></path>
                    <path fill="#00bcf1" d="M242.7 53.1s8.5-1.6 9.5-1.9c1-.2 1.3.7.7 1.2-1 1-21.7 24.4-21.7 24.4s-20.7-23.4-21.7-24.4c-.6-.6-.2-1.5.7-1.2l9.5 1.9V36.2c0-10.1 5-13.4 11.5-13.4h17.6c2.5 0 2.8 2.3 2.8 2.3h-2c-5.5 0-6.9 3.5-6.9 9.4v18.6z"></path>
                    </svg>
                </div>
            </div>

            @foreach ($featured as $f)
                <div class="col-md-6 featured-post">
                    @if ($f->image)
                        <img src="/storage/images/{{ $f->image }}" alt="">
                    @endif
                    <h2>
                        <a href="{{ route('post', $f) }}">
                            <span>{{ $f->title }}</span>
                        </a>
                    </h2>
                    <div>
                        {{ $f->body }}
                    </div>
                </div>
            @endforeach
           
        </div>

    </div>
</div>
@endsection
