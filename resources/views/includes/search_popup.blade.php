<div class="search">
    <div class="open-search">
        <img class="active" src="{{ asset('images/search-icon-active.jpg') }}" alt="">
        <img src="{{ asset('images/search-icon-inactive.jpg') }}" alt="">
    </div>
    <div class="search-content">
        <div class="close-search">X</div>
        <div class="search-form">
            <form class="d-flex" method="GET" action="{{ route('search') }}">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        </div>
    </div>
</div>