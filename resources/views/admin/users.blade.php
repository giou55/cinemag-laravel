@extends('layouts.admin')

@section('content')      
        
        <div class="container-sm">

            <div class="row header-border mb-3">
                <div class="col-md-4">
                    <h2>Χρήστες</h2>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    @include('includes.message')

                    <div class="table-responsive">
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
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>

        </div>  

@endsection
