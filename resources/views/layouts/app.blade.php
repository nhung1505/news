<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 p-0">
            <div id="app">
                <nav class="navbar navbar-static-top bg-faded pb-0 mb-0">
                    <div class="container">
                        <div class="collapse navbar-collapse pt-2 " id="app-navbar-collapse">
                            <ul class="nav navbar-left col-md-2 pt-3 mr-5">
                                <a href="{{route('song.list')}}"><img class="logo" src="{{asset('storage/amusic.png')}}"/></a>
                            </ul>
                            <!-- Left Side Of Navbar -->
                            <ul class="nav navbar-nav col-md-8 pt-3">
                                <form class="form-inline text-right col-md-10 p-0" action="{{route('song.search')}}">
                                    <div class="form-group col-md-10">
                                        <input type="text" class="form-control" style="width: 100%"
                                               placeholder="{{__('label.Search')}}" name="key">
                                    </div>
                                    <button type="submit" class="btn btn-faded">{{__('label.Search')}}</button>
                                </form>&nbsp;
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">

                                <!-- Authentication Links -->
                                @guest
                                    <ul class="pl-0">
                                        <li class="nav navbar-left "><a href="{{ route('login') }}">{{__('label.login')}}</a></li>
                                        <li class=" nav navbar-right"><a href="{{ route('register') }}">{{__('label.Register')}}</a>
                                        </li>
                                    </ul>
                                    @else
                                         <li class="nav-item menu-select text-right col-md-12">
                                            <form action="{{route("postLang")}}" class="form-lang" method="post">
                                            {{ csrf_field() }}
                                               <select class="custom-select" name="locale" onchange='this.form.submit();'>
                                                  <option selected value="en" >EN</option>
                                                   <option  value="vn"{{ Lang::locale() === 'vn' ? 'selected' : '' }} >VI</option>
                                               </select>
                                             </form>
                                         </li>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle btn btn-outline-success my-1 my-sm-0 p-1"
                                               data-toggle="dropdown" role="button" aria-expanded="false"
                                               aria-haspopup="true">
                                                {{ Auth::user()->name }}
                                            </a>

                                            <ul class="dropdown-menu">
                                                <li>
                                                    <a class="text-center" href="{{ route('logout') }}"
                                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{__('label.logout')}}
                                                    </a>

                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                          style="display: none;">
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
                            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                                    data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a class="navbar-brand" href="{{route('song.list')}}">{{__('label.Song')}}</a>
                            <a class="navbar-brand" href="{{route('album.list')}}">{{__('label.Album')}}</a>
                            <a class="navbar-brand" href="#">{{__('label.Singer')}}</a>
                            <a class="navbar-brand" href="#">Hit</a>
                        </div>
                            <a href="{{ route('song.create') }}" class="btn btn-success" role="button">{{__('label.Upload Song')}}</a>
                    </div>
                </nav>
            </div>
            @yield('content')
        </div>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/autocomplete.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/myJs.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@yield('footer')
</body>
</html>
