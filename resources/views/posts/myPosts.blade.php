@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <div class="container">
                        @if (Session::has('success'))
                            <p class="alert alert-success">
                                {{ Session::get('success') }}</p>
                        @endif
                        @if (Session::has('error'))
                            <p class="alert alert-danger">
                                {{ Session::get('error') }}</p>
                        @endif
                    </div>

                    <h3 class="card-title text-center">Your Post List</h3>
                    <a href="{{ route('post.create') }}" class="btn btn-primary mb-3 text-center float-right">Create
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
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($myPosts as $myPost)
                                    <tr>
                                        <td>{{ $myPost->title }}</td>
                                        <td>{{ $myPost->content }}</td>
                                        <td>{{ $myPost->publication_date }}</td>
                                        <td>
                                            <a href="{{ route('post.edit', $myPost->id) }}"
                                                class="btn btn-warning text-white text-center ">Edit
                                            </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('post.delete', $myPost->id) }}"
                                                class="btn btn-danger  text-center ">Delete
                                            </a>
                                        </td>
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
