@extends('layouts.admin')

@section('content')
    <div class="container-sm">

            <div class="row header-border mb-3">
                <div class="col-md-6">
                    <h2>Νέο άρθρο</h2>
               </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title">Τίτλος</label>
                            <input class="form-control" type="text" name="title" required>
                        </div>
                        <div class="mb-3">
                            <label for="category">Κατηγορία</label>
                            <select class="form-control" name="category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="body">Κείμενο</label>
                            <textarea class="form-control" name="body" rows="10" cols="30" required></textarea>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="photo">
                        </div>
                        <button class="btn btn-primary mb-3" type="submit">Υποβολή</button>
                    </form>
                </div>
            </div>

    </div>
@endsection
