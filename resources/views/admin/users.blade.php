@extends('layouts.admin')

@section('content')
        {{-- <div class="container-sm header-border mb-3">
            <h2>Χρήστες</h2>
        </div>

        <div class="container-sm" class="admin-users">
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
        </div> --}}
        
        
        <div class="container-sm">

            <div class="row header-border mb-3">
                <div class="col-md-4">
                    <h2>Χρήστες</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('includes.message')
                    <table class="table table-borderless admin-users">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ονοματεπώνυμο</th>
                            <th scope="col">Ψευδώνυμο</th>
                            <th scope="col">Email</th>
                            <th scope="col">Κατάσταση</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)
                                <tr>
                                    <td scope="row">{{ $user->id }}</td>
                                    <td>{{ $user->fullname }}</td>
                                    <td>{{ $user->nickname }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ ($user->is_activated) ? ' Ενεργοποιημένος' : 'Απενεργοποιημένος' }}</td>
                                    <td>
                                        @if (Auth::user()->email == env('ADMIN_EMAIL'))
                                            <a href="{{ route('user.edit', $user) }}"><button class="btn btn-primary btn-sm">Επεξεργασία</button></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->email == env('ADMIN_EMAIL') && Auth::user()->email !== $user->email)
                                            <a href="{{ route('user.delete', $user) }}"><button class="btn btn-danger btn-sm">Διαγραφή</button></a>
                                        @endif
                                    </td>

                                    {{-- @if (Auth::user()->email == "aaa@gmail.com")
                                        <td>
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
                                        </td>

                                        <td>
                                            @if ($user->email !== "aaa@gmail.com")
                                                <button class="btn btn-primary btn-sm" type="submit" form="myForm{{ $user->id }}">Αποθήκευση</button>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($user->email !== "aaa@gmail.com")
                                                <a href="{{ route('user.delete', $user) }}"><button class="btn btn-danger btn-sm">Διαγραφή</button></a>
                                            @endif
                                        </td>
                                    @endif     --}}
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>  
@endsection
