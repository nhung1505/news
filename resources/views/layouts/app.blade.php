<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-static-top bg-faded pb-0 mb-0">
            <div class="container">
                <div class="collapse navbar-collapse pt-2 " id="app-navbar-collapse">
                    <ul class="nav navbar-left col-md-2">
                        <h2 class="mt-4">Logo</h2>
                    </ul>
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav text-center col-md-8 pt-3">
                        <form class="form-inline  text-center col-md-12 p-0">
                            <div class="form-group text-center col-md-10">
                                <input type="password" class="form-control"  style="width: 100%" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-faded">Search</button>
                        </form>&nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right col-md-2 p-4">

                        <!-- Authentication Links -->
                        @guest
                            <ul>
                                <li class="nav navbar-left "><a href="{{ route('login') }}">Login</a></li>
                                <li class=" nav navbar-right"><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle btn btn-outline-success my-1 my-sm-0 p-1" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }}
                                </a>

                                <ul class="dropdown-menu">
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
                                </ul>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-toggleable-md  navbar-default navbar-light ">
            <div class="container">
                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="/list">Song</a>
                    <a class="navbar-brand" href="#">Album</a>
                    <a class="navbar-brand" href="#">Singer</a>
                    <a class="navbar-brand" href="#">Hit</a>
                </div>
                    <a href="/upload" class="btn btn-success" role="button">Upload</a>
            </div>
        </nav>


        @yield('content')

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
