<header>
    <div class="container d-flex justify-content-between align-items-center" id="header">
        <div class="d-flex justify-content-between align-items-center links-1">
            <div>LIFO</div><div class="divider"></div>
            <div>IN.GR</div><div class="divider"></div>
            <div>ZOUGLA</div><div class="divider"></div>
            <div>NETFLIX</div><div class="divider"></div>
            <div>FACEBOOK</div>
        </div>
            
        <div style="font-size: 1.8rem; font-family:'Times New Roman', Times, serif;">Athens</div>

        <div class="d-flex justify-content-between align-items-center links-1">
            <div>CINEMAGAZINE</div><div class="divider"></div>
            <div>ATHINORAMA</div>
            
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