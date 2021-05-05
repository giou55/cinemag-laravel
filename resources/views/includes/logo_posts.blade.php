<div class="container d-flex justify-content-between align-items-center logo-category">

    @include('includes.menu_popup')

    <div class="logo">
        <a href="{{ route('home') }}"><img src="{{ asset('images/logo-title.png') }}" alt=""></a>
    </div>

    @include('includes.search_popup')
    
</div>