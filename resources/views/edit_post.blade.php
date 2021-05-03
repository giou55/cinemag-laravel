@extends('layouts.admin')

@section('content')
    <div class="container-sm">

        <div class="row header-border mb-3">
            <div class="col-md-6">
                <h2>Επεξεργασία άρθρου</h2>
            </div>
        </div>

        <div class="row">
            @if ($post->image)
                <div class="col-md-6 post-image">
                    <div> 
                        <img src="/storage/images/{{ $post->image }}" alt="">
                    </div>
                </div>
            @endif

            <div class="col-md-6">
                @if (isset($text))
                    <p id="edit-message">{{ $text }}</p>
                @endif
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title">ID</label>
                        <input class="form-control" type="text" name="title" value="{{ $post->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="title">Τίτλος</label>
                        <input class="form-control" type="text" name="title" value="{{ $post->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="category">Κατηγορία</label>
                        <select class="form-control" name="category">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ ($post->category_id == $category->id) ? ' selected' : '' }}>
                                    {{ $category->title}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="body">Κείμενο</label>
                        <textarea class="form-control" name="body" rows="10" cols="30" required>
                            {{ $post->body }}
                        </textarea>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="file" name="photo">
                    </div>
                    <button class="btn btn-primary mb-3" type="submit">Αποθήκευση</button>
                </form>
            </div>
        </div>

    </div>
@endsection