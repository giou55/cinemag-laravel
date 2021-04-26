@extends('layouts.admin')

@section('content')
        <div class="container-sm header-border mb-3">
            <h2>Κατηγορίες</h2>
        </div>

        <div class="container-sm" class="admin-users">
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                    <h4>ID</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <h4>Όνομα</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <h4>URL</h4>
                </div>
            </div>
            
            @foreach ($categories as $category)
            <div class="row" style="height: 35px">
                <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                    {{ $category->id }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    {{ $category->title }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    {{ $category->url }}
                </div>
                @if (Auth::user()->email == "aaa@gmail.com")
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                        <a href="{{ route('category.edit', $category) }}"><button class="btn btn-primary btn-sm">Επεξεργασία</button></a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                        <a href="{{ route('category.delete', $category) }}"><button class="btn btn-danger btn-sm">Διαγραφή</button></a>
                    </div>
                @endif    
            </div>
            
            @endforeach

            
        </div>
         
@endsection
