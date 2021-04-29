@extends('layouts.admin')

@section('content')
        <div class="container-sm">

            <div class="row header-border mb-3">
                <div class="col-md-6">
                    <h2>Νέα κατηγορία άρθρων</h2>
               </div>
            </div>

            <div class="row">
                <div class="col-md-6">
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
            </div>

        </div>
@endsection
