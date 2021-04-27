@extends('layouts.admin')

@section('content')
        <div class="container-sm header-border mb-3">
            <h2>Νέα κατηγορία άρθρων</h2>
        </div>

        <div class="container-sm">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title">Όνομα</label>
                    <input class="form-control" type="text" name="title">
                </div>
                 <div class="mb-3">
                     <label for="url">URL</label>
                    <input class="form-control" type="text" name="url">
                </div>
                <button class="btn btn-primary mb-3" type="submit">Υποβολή</button>
            </form>
            <h2>{{ $text }}</h2>
            <h2>Κατηγορίες άρθρων</h2>
            <ul>
                @foreach ($categories as $category)
                    <li>{{ $category->title }} (id: {{ $category->id }}, url: {{ $category->url }})</li>
                @endforeach
            </ul>
            
        </div>
         
@endsection
