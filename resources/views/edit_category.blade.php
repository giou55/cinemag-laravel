@extends('layouts.admin')

@section('content')
    <div class="container-sm">

        <div class="row header-border mb-3">
            <div class="col-md-6">
                <h2>Επεξεργασία κατηγορίας</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                @if (isset($text))
                    <p id="edit-message">{{ $text }}</p>
                @endif
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id">ID</label>
                        <input class="form-control" type="text" name="id" value="{{ $category->id }}">
                    </div>
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
        </div>

    </div>
@endsection