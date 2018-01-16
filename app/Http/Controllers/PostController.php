<?php

namespace App\Http\Controllers;

use App\Post;
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




    //show the blog posts


    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

}

