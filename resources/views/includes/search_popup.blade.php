<div class="search">
    <div class="open-search">
        <img class="active" src="{{ asset('images/search-icon-active.jpg') }}" alt="">
        <img src="{{ asset('images/search-icon-inactive.jpg') }}" alt="">
    </div>

    <div class="search-container">
        <div class="search-content">
            <div class="search-form">
                <form class="d-flex" method="GET" action="{{ route('search') }}">
                    <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" name="q">
                </form>
            </div>
            <div class="close-search">
                <svg aria-labelledby="nav-search-button-close-icon" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 11 11">
                    <title id="nav-search-button-close-icon">Close</title>
                    <polygon points="0.44 1.22 9.78 10.56 10.56 9.78 1.22 0.44 0.44 1.22"></polygon>
                    <polygon points="1.22 10.56 10.56 1.22 9.78 0.44 0.44 9.78 1.22 10.56"></polygon>
                </svg>
            </div>
        </div>

        <div class="search-line"></div>
    </div>


</div>