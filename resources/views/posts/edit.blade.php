@extends('layouts.app')

@section('content')

    <div class="container">
        <h2>Edit a Post</h2>

        @if(Auth::check())

                <form method="post" action="{{action('PostController@update', $id)}}">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="patch">
                <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{$post->title}}">

                <label for="content">Content</label>
                <textarea name="content" class="form-control" cols="30" rows="10"></textarea>

                    <button type="submit" class="btn-success">Update Post</button>
            </form>

            @endif


    </div>