<!DOCTYPE HTML>
<html>
<head>
    <title>A music</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Mosaic Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="{{asset('css/css/bootstrap.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/css/jplayer.blue.monday.min.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/css/font-awesome.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/css/icon-font.css')}}" type='text/css' />
    <link href="{{asset('css/css/popuo-box.css')}}" rel="stylesheet" type="text/css" media="all">
    <script src="{{asset('js/js/jquery-2.1.4.js')}}"></script>
</head>
<body class="sticky-header left-side-collapsed"  onload="initMap()">
<section>
    <div class="left-side sticky-left-side">
        <div class="logo">
            <h1><a href="home.blade.php">Amusic</a></h1>
        </div>
        <div class="logo-icon text-center">
            <a href="home.blade.php">M </a>
        </div>
        <div class="left-side-inner">
            <ul class="nav nav-pills nav-stacked custom-nav">
                <li class="active"><a href="home.blade.php"><i class="lnr lnr-home"></i><span>Home</span></a></li>
                <li><a href="radio.html"><i class="lnr lnr-users"></i> <span>Artists</span></a></li>
                <li><a href="browse.html"><i class="lnr lnr-music-note"></i> <span>Albums</span></a></li>
                <li class="menu-list"><a href="#"><i class="lnr lnr-heart"></i>  <span>Songs</span></a>
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
                                    <a href="#"><img src="/storage/images/1.png" alt=""></a>
                                    <a href="#"><img src="/storage/images/2.png" alt=""></a>
                                    <div class="clearfix"> </div>
                                </div>
                            </div>
                            <div class="col-md-7 app-image">
                                <img src="/storage/images/apps.png" alt="">
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-info">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body modal-spa">
                    <div class="sign-grids">
                        <div class="sign">
                            <div class="sign-left">
                                <ul>
                                    <li><a class="fb" href="#"><i></i>Sign in with Facebook</a></li>
                                    <li><a class="goog" href="#"><i></i>Sign in with Google</a></li>
                                    <li><a class="linkin" href="#"><i></i>Sign in with Linkedin</a></li>
                                </ul>
                            </div>
                            <div class="sign-right">
                                <form action="#" method="post">

                                    <h3>Create your account </h3>
                                    <input type="text" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}" required="">
                                    <input type="text" value="Mobile number" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Mobile number';}" required="">
                                    <input type="text" value="Email id" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email id';}" required="">
                                    <input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">

                                    <input type="submit" value="CREATE ACCOUNT" >
                                </form>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <p>By logging in you agree to our <span>Terms and Conditions</span> and <span>Privacy Policy</span></p>
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
                    <div class="col-md-4 serch-part">
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
                    <div class="col-md-4 player">
                        <div class="audio-player">
                            <audio id="audio-player"  controls="controls">
                                <source src="storage/media/Blue Browne.ogg" type="audio/ogg"></source>
                                <source src="/storage/media/Blue Browne.mp3" type="audio/mpeg"></source>
                                <source src="/storage/media/Georgia.ogg" type="audio/ogg"></source>
                                <source src="/storage/media/Georgia.mp3" type="audio/mpeg"></source></audio>
                        </div>
                        <!---->
                        <script type="text/javascript">
                            $(function(){
                                $('#audio-player').mediaelementplayer({
                                    alwaysShowControls: true,
                                    features: ['playpause','progress','volume'],
                                    audioVolume: 'horizontal',
                                    iPadUseNativeControls: true,
                                    iPhoneUseNativeControls: true,
                                    AndroidUseNativeControls: true
                                });
                            });
                        </script>
                        <!--audio-->
                        <link rel="stylesheet" type="text/css" media="all" href="{{asset('css/css/audio.css')}}">
                        <script type="text/javascript" src="{{asset('js/js/mediaelement-and-player.min.js')}}"></script>
                        <!---->


                        <!--//-->
                        <ul class="next-top">
                            <li><a class="ar" href="#"> <img src="../storage/images/arrow.png" alt=""/></a></li>
                            <li><a class="ar2" href="#"><img src="../storage/images/arrow2.png" alt=""/></a></li>

                        </ul>
                    </div>
                    <div class="col-md-4 login-pop">
                        <li class="dropdown col-md-6">
                            <a href="#" class="dropdown-toggle my-1 my-sm-0 p-1"
                               data-toggle="dropdown" aria-expanded="false"
                               aria-haspopup="true">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu">
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
                        <div class=" text-right col-md-6">
                            <form action="{{route("postLang")}}" class="form-lang" method="post">
                                {{ csrf_field() }}
                                <select class="custom-select" name="locale" onchange='this.form.submit();'>
                                    <option selected value="en" >EN</option>
                                    <option  value="vn"{{ Lang::locale() === 'vn' ? 'selected' : '' }} >VI</option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!-------->
            </div>
            <div class="clearfix"></div>
        </div>
        <!--notification menu end -->
        <!-- //header-ends -->
        <!-- /w3l-agileits -->
        <!-- //header-ends -->

    @yield('content')
    <div class="footer">
        <div class="footer-grid">
            <h3>Navigation</h3>
            <ul class="list1">
                <li><a href="home.blade.php">Home</a></li>
                <li><a href="radio.html">All Songs</a></li>
                <li><a href="browse.html">Albums</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </div>
        <div class="footer-grid footer-grid_last">
            <h3>About Us</h3>
            <p class="footer_desc">Diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat enim ad minim veniam,.</p>
            <p class="f_text">Phone:  &nbsp;&nbsp;&nbsp;00-250-2131</p>
            <p class="email">Email : &nbsp;<span><a href="mailto:mail@example.com">info(at)mailing.com</a></span></p>
        </div>
        <div class="clearfix"> </div>
    </div>
    </div>

</section>
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
<script type="text/javascript" src="{{asset('js/jplayer.playlist.min.js')}}"></script>



</body>
</html>