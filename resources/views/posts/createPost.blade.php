@extends('layouts.app')

@section('content')
    <div class="container text-center">
        <h1>Create New Post</h1>
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group ">
                    <label for="title">Title:</label><br>
                    <input class="form-control" type="text" id="title" name="title"><br>

                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
            </div>

            <div class="form-group col-xs-4">
                <label for="body">Content:</label><br>
                <textarea class="form-control" id="body" name="content"></textarea><br>

                @error('content')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>
        </form>
    </div>
@endsection
