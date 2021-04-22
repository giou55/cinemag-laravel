<div class="container d-flex justify-content-between align-items-center logo-category">

    <div id="menu">
        <img class="active" src="{{ asset('images/menu-icon-active.jpg') }}" alt="">
        <img src="{{ asset('images/menu-icon-inactive.jpg') }}" alt="">
        
    </div>

    <div id="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo-title.png') }}" alt=""></a>
    </div>

    <div id="search">
        <img class="active" src="{{ asset('images/search-icon-active.jpg') }}" alt="">
        <img src="{{ asset('images/search-icon-inactive.jpg') }}" alt="">
        {{-- <form class="d-flex" method="GET" action="{{ route('search') }}">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> --}}
    </div>
    
</div>