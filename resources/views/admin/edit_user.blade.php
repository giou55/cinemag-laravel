@extends('layouts.admin')

@section('content')
    <div class="container-sm">

        <div class="row header-border mb-3">
            <div class="col-md-6">
                <h2>Επεξεργασία χρήστη</h2>
            </div>
        </div>

        <div class="row">
            @include('includes.message')
        </div>

        <div class="row">
            <div class="col-md-6">
                <form action="" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="id">ID</label>
                        <input class="form-control" type="text" name="id" value="{{ $user->id }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="fullname">Ονοματεπώνυμο</label>
                        <input class="form-control" type="text" name="fullname" value="{{ $user->fullname }}">
                    </div>
                     <div class="mb-3">
                        <label for="nickname">Ψευδώνυμο</label>
                        <input class="form-control" type="text" name="nickname" value="{{ $user->nickname }}">
                    </div>
                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input class="form-control" type="text" name="email" value="{{ $user->email }}" {{ ($user->email == env('ADMIN_EMAIL')) ? ' readonly' : '' }}>
                    </div>
                    <div class="mb-3">
                        {{-- <label for="status">Κατάσταση</label>
                        <input class="form-control" type="text" name="status" value="{{ $user->is_activated }}"> --}}

                        {{-- <label class="switch">
                            <input class="status" type="checkbox" name="status" {{ ($user->is_activated) ? ' checked' : '' }} {{ (Auth::user()->email == env('ADMIN_EMAIL')) ? ' disabled' : '' }}>
                            <span class="slider round"></span>
                        </label> --}}
                        
                        <label for="status">Κατάσταση</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="1" name="status" id="flexRadioDefault1" {{ ($user->is_activated) ? ' checked' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Ενεργοποιημένος
                            </label>
                            </div>
                            <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="status" id="flexRadioDefault2" {{ (!$user->is_activated) ? ' checked' : '' }} {{ ($user->email == env('ADMIN_EMAIL')) ? ' disabled' : '' }}>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Απενεργοποιημένος
                            </label>
                        </div>

                    </div>
                    <button class="btn btn-primary mb-3" type="submit">Αποθήκευση</button>
                </form>
            </div>
        </div>

    </div>
@endsection