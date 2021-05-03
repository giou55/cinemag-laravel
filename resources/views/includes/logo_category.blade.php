<div class="container d-flex justify-content-between align-items-center logo-category">

    @include('includes.menu')

    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo-title.png') }}" alt=""></a>
    </div>

    <div class="search">
        <img class="active" src="{{ asset('images/search-icon-active.jpg') }}" alt="">
        <img src="{{ asset('images/search-icon-inactive.jpg') }}" alt="">
        {{-- <form class="d-flex" method="GET" action="{{ route('search') }}">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
    </div>
    
</div>