@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="container">
                        @if (Session::has('success'))
                            <p class="alert {{ Session::get('alert-class', 'alert-success') }}">
                                {{ Session::get('success') }}</p>
                        @endif
                    </div>

                    <h3 class="card-title text-center">Your Post List</h3>
                    <a href="{{ route('create.post') }}" class="btn btn-primary mb-3 text-center float-right">Create
                        Post</a>

                    @if ($myPosts->count() == 0)
                        <h3>No posts to display</h3>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Publication Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($myPosts as $myPost)
                                    <tr>
                                        <td>{{ $myPost->title }}</td>
                                        <td>{{ $myPost->content }}</td>
                                        <td>{{ $myPost->publication_date }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
