@extends('layouts.app')

@section('content')

    <div class="container">

        <h1>{{$post->title}}</h1>
        <p>{{$post->content}}</p>
    </div>

    <div class="container">
        <ul class="list-group">
            @foreach($post->comments as $comment)
                <li class="list-group-item">
                    {{$comment->body}} -

                    {{$comment->created_at->diffForHumans()}}

                </li>
            @endforeach
        </ul>

    </div>

    @if(Auth::check())
        <div class="card-block">
            <form method="POST" action="/posts/{{ $post-> id}}/comments">
                {{csrf_field()}}
                <div class="form-group">
                    <textarea name="body"  class="form-control" id="" cols="30" rows="10"></textarea>
                    <button type="submit" class="btn-primary">Add a Comment</button>


            </form>
            @else
                <p>To create a comment, please log in!</p>
                @endif
        </div>

    @endsection