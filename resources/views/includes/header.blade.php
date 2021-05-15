<header>
    <div class="container d-flex justify-content-between align-items-center" id="header">
        <div class="d-flex justify-content-between align-items-center links-1">
            <div><a href="https://www.in.gr" target="_blank">IN.GR</a></div>
            <div class="divider"></div>
            <div><a href="https://www.zougla.gr" target="_blank">ZOUGLA</a></div>
            <div class="divider"></div>
            <div><a href="https://www.athensvoice.gr" target="_blank">ATHENS VOICE</a></div>
            <div class="divider"></div>
            <div><a href="https://www.oneman.gr" target="_blank">ONEMAN</a></div>
            
        </div>
            
        <div>
            <span style="font-size: 1.4rem; font-family: 'Mystery Quest', cursive;">ATHENS</span>
        </div>

        <div class="d-flex justify-content-between align-items-center links-1">
            <div><a href="https://www.lifo.gr" target="_blank">LIFO</a></div>
            <div class="divider"></div>
            <div><a href="https://www.cinemagazine.gr" target="_blank">CINEMAGAZINE</a></div>
            <div class="divider"></div>
            <div><a href="https://www.athinorama.gr" target="_blank">ATHINORAMA</a></div>
            
            <div class="d-flex justify-content-between align-items-center links-2">
                @guest
                    @if (Route::has('login'))
                        {{-- <a href="{{ route('login') }}">{{ __('Login') }}</a>  --}}
                        <a class="modal_link" data-toggle="modal" data-target="#loginModal">{{ __('Login') }}</a>
                    @endif

                    <div class="divider"></div>

                    @if (Route::has('register'))
                        {{-- <a href="{{ route('register') }}">{{ __('Register') }}</a> --}}
                        <a class="modal_link" data-toggle="modal" data-target="#registerModal">{{ __('Register') }}</a>
                    @endif

                    @else
                        <a>{{ Auth::user()->nickname }}</a>
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
            </div>
        </div>

        @include('includes.login_modal')
        @include('includes.register_modal')

    </div>

    <div class="container d-flex justify-content-end align-items-center" id="subscription">
        <span>Less than $5 per month</span>
    </div>
</header>