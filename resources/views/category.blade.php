@extends('layouts.admin')

@section('content')
        <div class="container-sm">
            <div style="display: flex">
                @foreach ($posts as $post)
                    @include('includes.post')
                @endforeach
            </div>
        </div>
@endsection