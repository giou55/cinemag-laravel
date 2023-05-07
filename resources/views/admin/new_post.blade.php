@extends('layouts.admin')

@section('content')
    <div class="container-sm">

            <div class="row header-border mb-3">
                <div class="col-md-6">
                    <h2>Νέο άρθρο</h2>
               </div>
            </div>

            <div class="row">
                @include('includes.message')
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form action="" id="new_post_form" action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title">Τίτλος</label>
                            <input class="form-control" type="text" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="subtitle">Υπότιτλος</label>
                            <input class="form-control" type="text" name="subtitle">
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
                            <label for="photo">Εικόνα</label>
                            <input class="form-control" type="file" name="photo">
                        </div>
                    </form>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="body">Κείμενο</label>
                        <textarea form="new_post_form" class="form-control textarea1" name="body" rows="20" cols="30"></textarea>
                    </div>
                    <button form="new_post_form" class="btn btn-primary mb-3" type="submit">Υποβολή</button>
                </div>
            </div>

    </div>
@endsection
