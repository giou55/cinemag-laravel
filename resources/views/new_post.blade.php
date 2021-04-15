@extends('layouts.app')

@section('content')
        <div class="container-sm">
            <h2>Νέο άρθρο</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="title" placeholder="Title here...">
                </div>
                <div class="mb-3">
                    <select class="form-control" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="body" rows="10" cols="30"></textarea>
                </div>
                <div class="mb-3">
                     <input class="form-control" type="file" name="photo">
                </div>
                <button class="btn btn-primary mb-3" type="submit">Υποβολή</button>
            </form>
            <h2>{{ $text }}</h2>
        </div>
@endsection
