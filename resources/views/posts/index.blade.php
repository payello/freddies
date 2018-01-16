@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($posts as $post)
                    @include('posts.post')
                @endforeach
                @if (Auth::isModerator()){
                    <button class="btn-warning" ></button>
                    }


            </div>
        </div>
    </div>
@endsection
