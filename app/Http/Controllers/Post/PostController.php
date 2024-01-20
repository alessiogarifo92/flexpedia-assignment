<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the posts from other users.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all posts excluding the ones from the authorized user
        // Order by publication date in descending order and limit to 10
        $posts = BlogPost::where('user_id', '!=', Auth::user()->id)
            ->orderBy('publication_date', 'desc')
            ->limit(10)
            ->get();

        // Return the 'home' view with the posts data
        return view('home', compact('posts'));
    }

    /**
     * Show the form for creating a new post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('posts.createPost');
    }

    /**
     * Store a newly created post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required | max:100',
            'content' => 'required | max:255',
        ]);

        // Create a new blog post with the request data and current timestamp
        $blogPost = BlogPost::create([
            'user_id' => Auth::user()->id,
            'title' => $request->get('title'),
            'content' => $request->get('content'),
            'publication_date' => date('Y-m-d H:i:s')
        ]);

        // Check if the blog post was created successfully
        if ($blogPost) {
            return redirect()->route('post.show')->with('success', 'New Post added successfully!');
        }

        return redirect()->route('post.show')->with('error', 'Error while trying to add new post. Try again in a few minutes!');
    }

    /**
     * Display the user posts.
     *
     * @return \Illuminate\View\View
     */
    public function showMyPosts()
    {
        // Retrieve all the posts of the authorized user
        // Order by creation date in descending order
        $myPosts = BlogPost::where('user_id', Auth::user()->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('posts.myPosts', compact('myPosts'));
    }

    /**
     * Show the form for editing the specified post.
     *
     * @param  string  $id
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(string $id)
    {
        // Find the post by its ID or fail
        $post = BlogPost::findOrFail($id);

        // Check if the post was found
        if ($post) {
            return view('posts.editPost', compact('post'));
        }

        return redirect()->route('post.show')->with(['error' => 'Post selected not found. Try again later!']);
    }

    /**
     * Update the specified post in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, string $id)
    {
        //Another way to manage validation
        // Personalized messages for the validation attributes
        $messages = [
            'required' => 'The :attribute field is required.',
            'title.max' => 'The :attribute may not be greater than 100 characters.',
            'content.max' => 'The :attribute may not be greater than 255 characters.',
        ];

        // Validate the request data
        $validator = Validator::make($request->all(), [
            'title' => 'required | max:100',
            'content' => 'required | max:255',
        ], $messages);

        //if validation fails, return to edit page with the input fields errors
        if ($validator->fails()) {
            return redirect()
                ->route('post.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        // Find the post by its ID or fail
        $post = BlogPost::findOrFail($id);

        // Update the post's title and content
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        return redirect()->route('post.show')->with(['success' => 'Post updated successfully!']);

    }

    /**
     * Remove the specified post from storage.
     *
     * @param  string  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(string $id)
    {
        // Delete the post by its ID
        $postToDelete = BlogPost::where('id', $id)->delete();

        // Check if the post was deleted successfully
        if ($postToDelete) {
            return redirect()->route('post.show')->with(['success' => 'Post deleted from your posts list successfully!']);
        }

        return redirect()->route('post.show')->with(['error' => 'Post delete failed. Try again later!']);

    }
}
