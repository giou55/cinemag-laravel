@extends('layouts.admin')

@section('content')
        <div class="container-sm" class="admin-users">
            <h2 class="mb-5">Χρήστες</h2>
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <h4>Ονοματεπώνυμο</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <h4>Ψευδώνυμο</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <h4>Email</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <h4>Κατάσταση</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                </div>
            </div>
            
            @foreach ($users as $user)
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    {{ $user->fullname }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    {{ $user->nickname }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    {{ $user->email }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    {{-- {{ $user->is_activated }} --}}

                    <form action="" method="POST" id="myForm">
                        @csrf
                        <label class="switch">
                            <input class="status" type="checkbox" name="status" {{ ($user->is_activated) ? ' checked' : '' }}>
                            {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
                            <span class="slider round"></span>
                        </label>
                    </form>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-2">
                    <button class="btn btn-primary btn-sm" type="submit" form="myForm">Αποθήκευση</button>
                </div>
                    
            </div>
            
            @endforeach

            
        </div>
         
@endsection
