<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/cinema"><h3>ΣΙΝΕΜΑ</h3></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/theater"><h3>ΘΕΑΤΡΟ</h3></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/music"><h3>ΜΟΥΣΙΚΗ</h3></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/youtube"><h3>YOUTUBE</h3></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/books"><h3>ΒΙΒΛΙΑ</h3></a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/podcasts"><h3>PODCASTS</h3></a>
                </li>

                @if (Auth::check())
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('posts') }}">My Posts</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('post.new') }}">New Post</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('category.new') }}">New Category</a>
                </li>
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
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
            </ul>
        </div>
    </div>
</nav>