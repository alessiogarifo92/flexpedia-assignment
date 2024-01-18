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

                        <h3 class="card-title text-center">Home Posts</h3>

                    @if ($posts->count() == 0)
                        <h3>No posts to display</h3>
                    @else
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Posted By</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Content</th>
                                    <th scope="col">Publication Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (isset($posts))
                                    @foreach ($posts as $post)
                                        <tr>
                                            <th scope="row">{{ $post->user->name }}</th>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->content }}</td>
                                            <td>{{ $post->publication_date }}</td>

                                        </tr>
                                    @endforeach
                                @else
                                    @foreach ($myPosts as $myPost)
                                        <tr>
                                            <th scope="row">{{ $myPost->user->name }}</th>
                                            <td>{{ $myPost->title }}</td>
                                            <td>{{ $myPost->content }}</td>
                                            <td>{{ $myPost->publication_date }}</td>

                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
