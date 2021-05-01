@extends('layouts.admin')

@section('content')
        <div class="container-sm">

            <div class="row header-border mb-3">
                <div class="col-md-4">
                    <h2>Κατηγορίες</h2>
                </div>  
            </div>

            <div class="row">
                <div class="col-md-8">
                    <table class="table table-borderless table-sm">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Όνομα</th>
                            <th scope="col">URL</th>
                            <th scope="col"></th>
                            <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td scope="row">{{ $category->id }}</td>
                                    <td>{{ $category->title }}</td>
                                    <td>{{ $category->url }}</td>
                                    <td>
                                        @if (Auth::user()->email == env('ADMIN_EMAIL'))
                                            <a href="{{ route('category.edit', $category) }}"><button class="btn btn-primary btn-sm">Επεξεργασία</button></a>
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->email == env('ADMIN_EMAIL'))
                                            <a href="{{ route('category.delete', $category) }}"><button class="btn btn-danger btn-sm">Διαγραφή</button></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>  
@endsection
