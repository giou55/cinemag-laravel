{{-- <div id="admin" class="d-flex justify-content-between align-items-center">

    <div class="d-flex justify-content-start align-items-center">
        <span>Πίνακας Ελέγχου</span>
        <a href="{{ route('posts.all') }}">Άρθρα</a>
        <a href="{{ route('categories') }}">Κατηγορίες</a>
        <a href="{{ route('post.new') }}">Νέο άρθρο</a>
        @if (Auth::user()->email == env('ADMIN_EMAIL'))
            <a href="{{ route('category.new') }}">Νέα κατηγορία</a>
        @endif
        <a href="{{ route('users') }}">Χρήστες</a>
    </div>

    <div>
        <a>{{ Auth::user()->fullname }}</a>

        <a href="{{ route('logout') }}"
            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </div>

</div> --}}

<div id="admin">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 col-lg-2 col-xl-2">Πίνακας Ελέγχου</div>
            
            <div class="col-12 col-lg-8 col-xl-7">
                <a href="{{ route('posts.all') }}">Άρθρα</a>
                <a href="{{ route('categories') }}">Κατηγορίες</a>
                <a href="{{ route('post.new') }}">Νέο άρθρο</a>
                @if (Auth::user()->email == env('ADMIN_EMAIL'))
                    <a href="{{ route('category.new') }}">Νέα κατηγορία</a>
                @endif
                <a href="{{ route('users') }}">Χρήστες</a>
            </div>

            <div class="col-12 col-lg-2 col-xl-3">
                <a>{{ Auth::user()->fullname }}</a>

                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>

        </div>
    </div>
</div>
