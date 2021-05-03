<div class="menu">
    <div class="open-button">
        <img class="active" src="{{ asset('images/menu-icon-active.jpg') }}" alt="">
        <img src="{{ asset('images/menu-icon-inactive.jpg') }}" alt="">
    </div>
    <div class="menu-content">
        <div class="close-button">
            <img class="active" src="{{ asset('images/menu-icon-close-active.jpg') }}" alt="">
            <img src="{{ asset('images/menu-icon-close-inactive.jpg') }}" alt="">
        </div>
        <div class="menu-links">
            <div><a href="{{ route('category', 'cinema') }}">ΣΙΝΕΜΑ</a></div>
            <div><a href="{{ route('category', 'theater') }}">ΘΕΑΤΡΟ</a></div>
            <div><a href="{{ route('category', 'music') }}">ΜΟΥΣΙΚΗ</a></div>
            <div><a href="{{ route('category', 'youtube') }}">YOUTUBE</a></div>
            <div><a href="{{ route('category', 'books') }}">ΒΙΒΛΙΑ</a></div>
            <div><a href="{{ route('category', 'podcasts') }}">PODCASTS</a></div>
        </div>
    </div>
</div>