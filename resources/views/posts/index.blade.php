@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach($posts as $post)
                    @include('posts.post')
                @endforeach
            </div>
        </div>
    </div>
@endsection
