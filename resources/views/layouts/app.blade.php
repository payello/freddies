<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">


    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-light">
            <ul class="nav navbar">
            <a id="logo" href="/">Peter's Blog</a>
                <!-- Authentication Links -->
                @guest
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li class="navbar-link"><a href="{{route('posts.create')}}">Create a new Post</a></li>

                    <li> {{ Auth::user()->name }} <span class="caret"></span></li>

                    <li>
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                    @endguest
            </ul>

        </nav>



        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{asset("https://code.jquery.com/jquery-3.2.1.slim.min.js")}}"></script>
    <script src="{{asset("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js")}}"></script>
    <script src="{{asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js")}}"></script>

</body>
</html>
