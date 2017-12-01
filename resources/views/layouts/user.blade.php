<!DOCTYPE HTML>
<html>
<head>
    <title>A music</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{asset('css/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/css/jplayer.blue.monday.min.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/css/icon-font.css')}}" type='text/css' />
    <link href="{{asset('css/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all">
    <script src="{{asset('js/js/jquery-2.1.4.js')}}"></script>
    <link href="css/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
    @yield('app.css')
</head>
<body class="sticky-header left-side-collapsed"  onload= "initMap()">
<section>
    <div class="left-side sticky-left-side">
        <div class="logo">
            <a href="{{route('home')}}"><h1 style="margin-top: 5px;">Amusic</h1></a>
        </div>
        <div class="logo-icon text-center">
            <a href="{{route('home')}}">M </a>
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="{{route('home')}}"><i class="lnr lnr-home"></i><span>Home</span></a></li>
                <li><a href="{{route('artist.list')}}"><i class="lnr lnr-users"></i> <span>Artists</span></a></li>
                <li><a href="{{route('song.list')}}"><i class="lnr lnr-music-note"></i> <span>Songs</span></a></li>
                <li><a href="{{route('album.list')}}"><i class="lnr lnr-indent-increase"></i> <span>Albums</span></a></li>
                <li class="menu-list"><a href="#"><i class="lnr lnr-heart"></i>  <span>My Favourities</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="radio.html"> Songs</a></li>
                        <li><a href="radio.html"> Albums</a></li>
                        <li><a href="radio.html"> Artists</a></li>
                    </ul>
                </li>
                <li class="menu-list"><a href="contact.html"><i class="fa fa-thumb-tack"></i><span>Contact</span></a>
                    <ul class="sub-menu-list">
                        <li><a href="contact.html">Location</a> </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog facebook" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="app-grids">
                        <div class="app">
                            <div class="col-md-5 app-left mpl">
                                <h3>Mosaic mobile app on your smartphone!</h3>
                                <p>Download and Avail Special Songs Videos and Audios.</p>
                                <div class="app-devices">
                                    <h5>Gets the app from</h5>
                                    <a href="#"><img src="/images/1.png" alt=""></a>
                                    <a href="#"><img src="/images/2.png" alt=""></a>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-md-7 app-image">
                                <img src="/images/apps.png" alt="">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content">
        <div class="header-section">
            <!--toggle button start-->
            <a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
            <!--toggle button end-->
            <!--notification menu start -->
            <div class="menu-right">
                <div class="profile_details">
                    <div class="col-md-5 serch-part">
                        <div id="sb-search" class="sb-search">
                            <form action="#" method="post">
                                <input class="sb-search-input" placeholder="Search" type="search" name="search" id="search">
                                <input class="sb-search-submit" type="submit" value="">
                                <span class="sb-icon-search"> </span>
                            </form>
                        </div>
                    </div>
                    <!-- search-scripts -->
                    <script src="{{asset('js/js/classie.js')}}"></script>
                    <script src="{{asset('js/js/uisearch.js')}}"></script>
                    <script>
                        new UISearch( document.getElementById( 'sb-search' ) );
                    </script>
                    <!-- //search-scripts -->
                    <!---->
                    {{--<div class="col-md-4 player">--}}
                        {{--<div class="audio-player">--}}
                            {{--<audio id="audio-player"  controls="controls">--}}
                                {{--<source src="storage/media/Blue Browne.ogg" type="audio/ogg"></source>--}}
                                {{--<source src="/media/Blue Browne.mp3" type="audio/mpeg"></source>--}}
                                {{--<source src="/media/Georgia.ogg" type="audio/ogg"></source>--}}
                                {{--<source src="/media/Georgia.mp3" type="audio/mpeg"></source></audio>--}}
                        {{--</div>--}}
                        {{--<!---->--}}
                        {{--<script type="text/javascript">--}}
                            {{--$(function(){--}}
                                {{--$('#audio-player').mediaelementplayer({--}}
                                    {{--alwaysShowControls: true,--}}
                                    {{--features: ['playpause','progress','volume'],--}}
                                    {{--audioVolume: 'horizontal',--}}
                                    {{--iPadUseNativeControls: true,--}}
                                    {{--iPhoneUseNativeControls: true,--}}
                                    {{--AndroidUseNativeControls: true--}}
                                {{--});--}}
                            {{--});--}}
                        {{--</script>--}}
                        {{--<!--audio-->--}}
                        {{--<link rel="stylesheet" type="text/css" media="all" href="{{asset('css/css/audio.css')}}">--}}
                        {{--<script type="text/javascript" src="{{asset('js/js/mediaelement-and-player.min.js')}}"></script>--}}
                        {{--<!---->--}}
                        {{--<!--//-->--}}
                        {{--<ul class="next-top">--}}
                            {{--<li><a class="ar" href="#"> <img src="../images/arrow.png" alt=""/></a></li>--}}
                            {{--<li><a class="ar2" href="#"><img src="../images/arrow2.png" alt=""/></a></li>--}}
                        {{--</ul>--}}
                    {{--</div>--}}
                    @guest
                    <div class="col-md-6 login-pop ">
                        <div class="registerr">
                            <a href="{{ route('register') }}" class="col-md-2 btn ">Register</a>

                        </div>
                        <div id="loginpop"> <a href="" id="loginButton"><span>Login <i class="arrow glyphicon glyphicon-chevron-right"></i></span></a>
                            <div id="loginBox">
                                <form action="{{ route('login') }}" method="post" id="loginForm">
                                    {{ csrf_field() }}
                                    <fieldset id="body">
                                        <fieldset>
                                            <label for="email">Email Address</label>
                                            <input type="text" name="email" id="email">
                                        </fieldset>
                                        <fieldset>
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password">
                                        </fieldset>
                                        <input type="submit" id="login" value="Sign in">
                                        <label for="checkbox"><input type="checkbox" id="checkbox"> <i>Remember me</i></label>
                                    </fieldset>
                                    <span><a href="{{ route('password.request') }}">Forgot your password?</a></span>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="registerr">
                    @else
                        @can('upload')
                            <a href="{{ route('song.create') }}" class=" col-md-1 mt-3 text-right location-upload" role="button"><i class="fa fa-upload" aria-hidden="true"></i></a>
                        @endcan
                        <li class="dropdown col-md-1 text-right" style="list-style-type:none; padding:15px;">
                            <a href="#" class="dropdown-toggle btn btn-outline-success my-1 my-sm-0 p-1 text-danger"
                               data-toggle="dropdown" role="button" aria-expanded="false"
                               aria-haspopup="true">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu col-md-12 text-right">
                                <li>
                                    @if(Auth::user()->role == 'admin')
                                        <a href="{{route('menu')}}" class='text-center'>{{__('label.Admin page')}}</a>
                                    @elseif( Auth::user()->role == 'editor')
                                        <a href="{{route('menu')}}" class='text-center'>Editor page</a>
                                    @else
                                        <a href="{{route('menu')}}" class="text-center">{{__('label.Personal page')}}</a>
                                    @endif
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
                        <li class="nav-item menu-select pull-right col-md-1 mt-3" style="list-style-type:none; margin-top:24px;">
                            <form action="{{route("postLang")}}" class="form-lang" method="post">
                                {{ csrf_field() }}
                                <select class="custom-select" name="locale" onchange='this.form.submit();'>
                                    <option selected value="en" >EN</option>
                                    <option  value="vn"{{ Lang::locale() === 'vn' ? 'selected' : '' }} >VI</option>
                                </select>
                            </form>
                        </li>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        <div class="footer">
            <div class="footer-grid">
                <h3>Navigation</h3>
                <ul class="list1">
                    <li><a href="home.blade.php">Home</a></li>
                    <li><a href="radio.html">All Songs</a></li>
                    <li><a href="browse.html">Albums</a></li>
                    <li><a href="browse.html">Artists</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </div>
            <div class="footer-grid footer-grid_last">
                <h3>About Us</h3>
                <p class="footer_desc"></p>
                <p class="f_text">Phone:  &nbsp;&nbsp;&nbsp;</p>
                <p class="email">Email : &nbsp;<span><a href="mailto:mail@example.com"></a></span></p>
            </div>
            <div class="clearfix"> </div>
        </div>
    </div>
</section>
</body>



<script src="{{ asset('js/myJs.js') }}"></script>
<script src="{{asset('js/js/responsiveslides.min.js')}}"></script>
<script src="{{asset('js/js/jquery.magnific-popup.js')}}"></script>
<script src="{{asset('js/js/bootstrap.js')}}"></script>
<script src="{{asset('js/js/jplayer.playlist.js')}}"></script>
<script src="{{asset('js/js/jquery.jplayer.js')}}"></script>
<script src="{{asset('js/js/classie.js')}}"></script>
<script src="{{asset('js/js/easyResponsiveTabs.js')}}"></script>
<script src="{{asset('js/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('js/scripts.js')}}"></script>
<script src="{{asset('js/js/jquery.flexisel.js')}}"></script>
<script src="{{asset('js/js/mediaelement-and-player.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/jquery.jplayer.min.js')}}"></script>
<script src="js/js/responsiveslides.min.js"></script>
<script src="css/js/jquery.magnific-popup.js" type="text/javascript"></script>
<script type="text/javascript" src="js/js/jquery.flexisel.js"></script>
<script src="js/js/jquery.nicescroll.js"></script>
<script src="js/js/scripts.js"></script>
<script src="js/js/bootstrap.js"></script>
@yield('app.js')

</html>
