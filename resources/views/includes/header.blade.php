<header>
    <div class="container d-flex justify-content-between align-items-center" id="header">
        <div class="d-flex justify-content-between align-items-center links-1">
            <div>LIFO</div><div class="header-divider"></div>
            <div>IN.GR</div><div class="header-divider"></div>
            <div>ZOUGLA</div><div class="header-divider"></div>
            <div>NETFLIX</div><div class="header-divider"></div>
            <div>FACEBOOK</div>
        </div>
            
        <div style="font-size: 1.8rem; font-family:'Times New Roman', Times, serif;">Athens</div>

        <div class="d-flex justify-content-between align-items-center links-1">
            <div>CINEMAGAZINE</div><div class="header-divider"></div>
            <div>ATHINORAMA</div>
            
            <div class="d-flex justify-content-between align-items-center">
                    @guest
                        @if (Route::has('login'))
                            <div>
                                <a href="{{ route('login') }}">{{ __('Login') }}</a>
                            </div>   
                        @endif

                        <div class="divider"></div>

                        @if (Route::has('register'))
                            <div>
                                <a href="{{ route('register') }}">{{ __('Register') }}</a>
                            </div>  
                        @endif

                    @else
                        <a>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="divider"></div>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    @endguest
                {{-- <div><strong>Subscribe </strong></div><div class="divider"></div>
                <div><strong> Sign In</strong></div> --}}
            </div>
        </div>
    </div>
</header>