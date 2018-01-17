<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Illuminate\Http\Request;

class PostController extends Controller
{
//1. Users will need to register an account to create blog posts.
// created using the auth scaffolding.

//2. Once a user has logged into their account, they can create, edit or delete their blog posts. A
//blog post needs the following fields:

// Title (input field)
// Content (textbox field)

// Also need to link the database to the comments and the user. - user_id & comment_id;

// Migrate a posts database with the Posts class(model); create the CRUD functionality. Create the views for the posts.

//3. All users can view a list of blog posts currently available on the website. Users can view each
//blog post and see a list of submitted comments below.
//4. Only registered users can submit a comment for blog post, however users can’t submit a
//comment on their own blog post.


    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    //show all the blog posts on page
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    // create new posts
    public function create()
    {
        return view('posts.create');
    }
    // storing new posts to database
    public function store(Request $request)
    {
        $this->validate($request, [
           'title'=> 'required',
            'content'=>'required'
        ]);

        $post = Post::create([
           'title'=>request('title'),
            'content'=>request('content'),
            'user_id' => auth()->id(),
        ]);

        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    public function show(Post $post)
    {
        return view ('posts.show', compact('post'));
    }
    public function edit($id)
    {
        if (Auth::user()->id == Post::find($id)->user->id)
        {

            $post = Post::find($id);

            return view('posts.edit', compact('post', 'id'));

        }

        else

        {

            return redirect()->back()->withErrors('You can only edit your own posts');

        }
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->user_id = auth()->id();

        $post->save();

        return redirect()->route('posts.show', $post->id);
    }

    public function destroy($id)
    {
        if (Auth::user()->id == Post::find($id)->user->id)
        {
            $post = Post::find($id);

            $post->delete();
        }

        return redirect('posts')->with('success', 'Your Post has been deleted');
    }

}

