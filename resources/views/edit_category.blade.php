@extends('layouts.admin')

@section('content')
        <div class="container-sm">
            <h2>Επεξεργασία κατηγορίας</h2>
            <form action="" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title">Όνομα</label>
                    <input class="form-control" type="text" name="title" value="{{ $category->title }}">
                </div>
                <div class="mb-3">
                    <label for="url">URL</label>
                    <input class="form-control" type="text" name="url" value="{{ $category->url }}">
                </div>
                <button class="btn btn-primary mb-3" type="submit">Αποθήκευση</button>
            </form>
        </div>
@endsection