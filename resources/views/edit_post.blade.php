@extends('layouts.admin')

@section('content')
        <div class="container-sm">
            <h2>Επεξεργασία άρθρου</h2>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title">Τίτλος</label>
                    <input class="form-control" type="text" name="title" value="{{ $post->title }}">
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
                    <textarea class="form-control" name="body" rows="10" cols="30">{{ $post->body }}
                    </textarea>
                </div>
                <div class="mb-3 row">
                    <div class="col-md-4">
                        @if ($post->image)
                            <img src="/storage/post_images/{{ $post->image }}" class="card-img-top" alt="">
                        @endif
                    </div>
                </div>
                <button class="btn btn-primary mb-3" type="submit">Αποθήκευση</button>
            </form>
        </div>
@endsection