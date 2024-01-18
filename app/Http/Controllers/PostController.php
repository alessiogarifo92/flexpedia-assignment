<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the posts from other users.
     */
    public function index()
    {
        //show all posts, but not the ones from the authorized user
        $posts = BlogPost::where('user_id', '!=', Auth::user()->id)->orderBy('publication_date', 'desc')->limit(10)->get();

        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        return view('posts.createPost');
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required | max:100',
            'content' => 'required | max:255',
        ]);

        $blogPost = BlogPost::create([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'publication_date' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('show.my.posts')->with('success', 'New Post added successfully!');
    }

    /**
     * Display the user posts.
     */
    public function showMyPosts()
    {

        //get all the posts of the authorized user
        $myPosts = BlogPost::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('posts.myPosts', compact('myPosts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
