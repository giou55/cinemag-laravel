<div id="admin">

    <nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top">

        <div class="container">

            <div class="mr-5">Πίνακας Ελέγχου</div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts.all') }}">Άρθρα</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories') }}">Κατηγορίες</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.new') }}">Νέο άρθρο</a>
                    </li>  
                    @if (Auth::user()->email == env('ADMIN_EMAIL'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.new') }}">Νέα κατηγορία</a>
                        </li>
                    @endif   
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users') }}">Χρήστες</a>
                    </li>   
                </ul>
            </div>  

        </div>

    </nav>

</div>
