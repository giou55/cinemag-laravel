@extends('layouts.layout')

@section('content')
        <div class="container-sm">
            <h2>New Post</h2>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="title" placeholder="Title here...">
                </div>
                <div class="mb-3">
                    <textarea class="form-control" name="body" rows="10" cols="30"></textarea>
                </div>
                <button class="btn btn-primary mb-3" type="submit">Submit</button>
            </form>
            <h2>{{ $text }}</h2>
        </div>
@endsection
