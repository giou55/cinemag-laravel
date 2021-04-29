@extends('layouts.admin')

@section('content')
    <div class="container-sm">

        <div class="row header-border mb-3">
            <div class="col-md-6">
                <h2>Επεξεργασία άρθρου</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST" enctype="multipart/form-data">
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
                    <div class="mb-3">
                        <div class="col-md-4">
                            @if ($post->image)
                                <img src="/storage/images/{{ $post->image }}" class="card-img-top" alt="">
                            @endif
                        </div>
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