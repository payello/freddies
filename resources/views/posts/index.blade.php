@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($posts as $post)
                    @include('posts.post')

                @if(Auth::check())


                        <a href="{{"/posts/".$post->id."/edit"}}" class="btn-danger">Edit Post</a>
                        <form action="{{action('PostController@destroy', $post['id']) }}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="_method" value="delete">
                            <button class="btn btn-danger" type="submit">DELETE</button>
                        </form>
                    @endif
                @endforeach


            </div>
        </div>
    </div>
@endsection
