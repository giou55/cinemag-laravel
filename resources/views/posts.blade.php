@extends('layouts.app')

@section('content')
        <div class="container-sm">
            <h2>Τα άρθρα μου</h2>
            <div style="display: flex">
                @foreach ($posts as $post)
                    @include('includes.post')
                @endforeach
            </div>
        </div>
@endsection