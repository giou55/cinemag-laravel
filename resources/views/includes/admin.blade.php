<div id="admin" class="d-flex justify-content-between align-items-center">

    <div class="d-flex justify-content-start align-items-center">
        <span>Πίνακας Ελέγχου</span>
        <a href="{{ route('posts.all') }}">Άρθρα</a>
        <a href="{{ route('categories') }}">Κατηγορίες</a>
        <a href="{{ route('post.new') }}">Νέο άρθρο</a>
        <a href="{{ route('category.new') }}">Νέα κατηγορία</a>
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

</div>
