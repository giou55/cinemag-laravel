@extends('layouts.admin')

@section('content')
        <div class="container-sm" class="admin-users">
            <h2 class="mb-5">Χρήστες</h2>
            <div class="row mb-2">
                <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                    <h4>ID</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <h4>Ονοματεπώνυμο</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <h4>Ψευδώνυμο</h4>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <h4>Email</h4>
                </div>
                @if (Auth::user()->email == "aaa@gmail.com")
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <h4>Κατάσταση</h4>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                    </div>
                @endif
            </div>
            
            @foreach ($users as $user)
            <div class="row" style="height: 35px">
                <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                    {{ $user->id }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    {{ $user->fullname }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    {{ $user->nickname }}
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    {{ $user->email }}
                </div>
                @if (Auth::user()->email == "aaa@gmail.com")
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        @if ($user->email !== "aaa@gmail.com")
                            <form action="" method="POST" id="myForm{{ $user->id }}">
                                @csrf
                                <label class="switch">
                                    <input class="status" type="checkbox" name="status" {{ ($user->is_activated) ? ' checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                            </form>
                        @endif
                        @if ($user->email == "aaa@gmail.com") ΕΝΕΡΓΟΣ
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                        @if ($user->email !== "aaa@gmail.com")
                            <button class="btn btn-primary btn-sm" type="submit" form="myForm{{ $user->id }}">Αποθήκευση</button>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                        @if ($user->email !== "aaa@gmail.com")
                            <a href="{{ route('user.delete', $user) }}"><button class="btn btn-danger btn-sm">Διαγραφή</button></a>
                        @endif
                    </div>
                @endif    
            </div>
            
            @endforeach

            
        </div>
         
@endsection
