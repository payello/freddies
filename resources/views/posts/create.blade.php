@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Create a New Blog Post</h1>

        <form action="{{url('posts')}}" method="post">
            {{csrf_field()}}
            <label for="title">Title</label>
            <input type="text" class="form-control" placeholder="title" name="title">
            <label for="content">Content</label>
            <textarea name="content" id="content" cols="30" rows="10" placeholder="content" class="form-control"></textarea>
            <button class="btn-primary" type="submit">Create the Post!</button>

        </form>

        
    </div>
@endsection