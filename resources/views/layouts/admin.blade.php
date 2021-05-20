<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="https://cdn.tiny.cloud/1/9jrmsfhz6djteofpubudrfjih581sj9zx2pbzz8kccjd1y23/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="{{ asset('js/admin-app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @if (Auth::check())
            @include('includes.admin')
        @endif

        <div class="container d-flex justify-content-center align-items-center">
            <div id="admin-logo">
                <a href="{{ route('home') }}"><img src="{{ asset('images/logo-title.png') }}" alt=""></a>
            </div>
        </div>

        <main class="py-4" id="admin-content">
            @yield('content')
        </main>
    </div>

    <script>
        tinymce.init({
        selector: '#textarea1'
        });
    </script>
</body>
</html>
