<nav class="bg-white">
    <div class="container">

        <div  class="d-flex justify-content-center align-items-center" id="navbar1">
                <a href="/cinema">
                   ΣΙΝΕΜΑ</a>
                <div class="nav-divider"></div>
                <a href="/theater">
                    ΘΕΑΤΡΟ</a>
                <div class="nav-divider"></div>
                <a href="/music">
                    ΜΟΥΣΙΚΗ</a>
                <div class="nav-divider"></div>
                <a href="/youtube">
                    YOUTUBE</a>
                <div class="nav-divider"></div>
                <a href="/books">
                    ΒΙΒΛΙΑ</a>
                <div class="nav-divider"></div>
                <a href="/podcasts">
                    PODCASTS</a>

                @if (Auth::check())
                <a href="{{ route('posts') }}">My Posts</a>
                <a href="{{ route('post.new') }}">New Post</a>
                <a href="{{ route('category.new') }}">New Category</a>
                @endif

            {{-- <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                    
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul> --}}
        </div>
    </div>
</nav>