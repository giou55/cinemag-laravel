@extends('layouts.admin')

@section('content')
    <div class="container-sm mb-3">
        <div class="row header-border mb-3">
            <div class="col-md-4">
                <h2>Άρθρα</h2>
            </div>

            <div class="col-md-8">
                <form action="">
                    <label for="category"><h4>Κατηγορία:</h4></label>
                    <select id="" name="category" onchange="top.location.href = this.options[this.selectedIndex].value">
                        <option value="{{ route('posts.all') }}">Όλες</option>
                        @if ($selectedCat !== '') 
                            <option value="" selected>
                                {{ $selectedCat->title }}
                            </option>
                        @endif
                        @foreach ($categories as $category)
                            @if ($selectedCat == '')
                                <option value="{{ route('posts.category', $category->url) }}">
                                    {{ $category->title }}
                                </option>
                            @endif
                            @if ($selectedCat !== '' && $selectedCat->url !== $category->url)
                                <option value="{{ route('posts.category', $category->url) }}">
                                    {{ $category->title }}
                                </option>
                            @endif
                        @endforeach
                    </select>
                </form>  
            </div>
        </div>

                {{-- <div class="col-md-4">
                    <form action="">
                        <label for="category"><h4>Συντάκτης:</h4></label>
                        <select id="" name="category" onchange="top.location.href = this.options[this.selectedIndex].value">
                            <option value="{{ route('posts.all') }}">Όλοι</option>
                            @if ($selectedCat !== '') 
                                <option value="" selected>
                                    {{ $selectedCat->title }}
                                </option>
                            @endif
                            @foreach ($users as $users)
                                @if ($selectedCat == '')
                                    <option value="{{ route('posts.category', $category->url) }}">
                                        {{ $category->title }}
                                    </option>
                                @endif
                                @if ($selectedCat !== '' && $selectedCat->url !== $category->url)
                                    <option value="{{ route('posts.category', $category->url) }}">
                                        {{ $category->title }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
                    </form>  
                </div> --}}


        {{-- <div class="container-sm">
            <div class="d-flex flex-row flex-wrap">
            <div class="card-columns">
                @foreach ($posts as $post)
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                        <div class="mb-3 card">
                        @if ($post->image)
                        <img src="/storage/post_images/{{ $post->image }}" class="card-img-top" alt="">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                            <a href="{{ route('post', $post) }}">{{ $post->title }}</a>
                            </h5>
                            <p class="card-text">Κατηγορία: {{ $post->category->title }}</p>
                            <p class="card-text">Συντάκτης: {{ $post->user->fullname }}</p>
                            <p class="card-text">{{ $post->body }}</p>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div> --}}


        <div class="row">
            <div class="col-md-12">
                <table class="table table-borderless">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Εικόνα</th>
                        <th scope="col">Τίτλος</th>
                        <th scope="col">Κατηγορία</th>
                        <th scope="col">Κείμενο</th>
                        <th scope="col">Συντάκτης</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td scope="row">{{ $post->id }}</td>
                                <td>
                                    @if ($post->image)
                                        <img style="height: 150px" src="/storage/post_images/{{ $post->image }}" alt="">
                                    @endif
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->title }}</td>
                                <td><?php echo substr($post->body, 0, 200) . '....'; ?></td>
                                <td>{{ $post->user->fullname }}</td>
                                <td><a href="{{ route('post.edit', $post) }}"><button class="btn btn-primary btn-sm">Επεξεργασία</button></a></td>
                                <td><a href="{{ route('post.delete', $post) }}"><button class="btn btn-danger btn-sm">Διαγραφή</button></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection


