@extends('layouts.layout')

@section('content')
        <div class="container-sm">
            <h2>Write something</h2>
            <form action="" method="GET">
                @csrf
                <div class="mb-3">
                    <input class="form-control" type="text" name="q">
                </div>
                <button class="btn btn-primary mb-3" type="submit">Submit</button>
            </form>

            <h2>Πληκτρολογήσατε: {{ $q }}</h2>
        </div>
@endsection
