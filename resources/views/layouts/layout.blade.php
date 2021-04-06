<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <script src="/js/app.js"></script>
    <title>Document</title>
</head>
<body>
    @include('includes.nav')

    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
        <div class="container">
            <a class="navbar-brand" href="#">Larablog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('posts') }}">Posts</a>
                </li>
                @if (Auth::check())
                <li class="nav-item">
                <a class="nav-link" href="{{ route('newpost') }}">New Post</a>
                </li>
                @endif
            </ul>
            <form class="d-flex" method="GET" action="{{ route('search') }}">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="q">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            </div>
        </div>
    </nav>
    @yield('content')
</body>
</html>  
