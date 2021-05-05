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
            <div><a href="{{ route('posts', 'cinema') }}">ΣΙΝΕΜΑ</a></div>
            <div><a href="{{ route('posts', 'theater') }}">ΘΕΑΤΡΟ</a></div>
            <div><a href="{{ route('posts', 'music') }}">ΜΟΥΣΙΚΗ</a></div>
            <div><a href="{{ route('posts', 'youtube') }}">YOUTUBE</a></div>
            <div><a href="{{ route('posts', 'books') }}">ΒΙΒΛΙΑ</a></div>
            <div><a href="{{ route('posts', 'podcasts') }}">PODCASTS</a></div>
        </div>
    </div>
</div>