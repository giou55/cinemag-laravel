@extends('layouts.app')

@section('content')
        <div class="container-sm">
            <h2>Νέα κατηγορία άρθρων</h2>
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="title" placeholder="Category here...">
                </div>
                <button class="btn btn-primary mb-3" type="submit">Υποβολή</button>
            </form>
            <h2>{{ $text }}</h2>
            <h2>Κατηγορίες άρθρων</h2>
            <ul>
                @foreach ($categories as $category)
                    <li>{{ $category->title }}</li>
                @endforeach
            </ul>
            
        </div>
         
@endsection
