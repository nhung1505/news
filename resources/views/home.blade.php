@extends('layouts.user')

@section('content')
<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">
			  <!--banner-section-->
			<div class="banner-section">
				<div class="banner">
					<div class="callbacks_container">
						<ul class="rslides callbacks callbacks1" id="slider4">
							<li>
								<div class="banner-img">
									<img src="/storage/images/11.jpg" class="img-responsive" alt="">
								</div>
								<div class="banner-info">
									<a class="trend" href="single.html">TRENDING</a>
									<h3>Let Your Home</h3>
									<p>Album by <span>Rock star</span></p>
								</div>
							</li>
							<li>
								<div class="banner-img">
									<img src="/storage/images/22.jpg" class="img-responsive" alt="">
								</div>
								<div class="banner-info">
									<a class="trend" href="single.html">TRENDING</a>
									<h3>Charis Brown feet</h3>
									<p>Album by <span>Rock star</span></p>
								</div>
							</li>
							<li>
								<div class="banner-img">
									<img src="/storage/images/33.jpg" class="img-responsive" alt="">
								</div>
								<div class="banner-info">
									<a class="trend" href="single.html">TRENDING</a>
									<h3>Let Your Home</h3>
									<p>Album by <span>Rock star</span></p>
								</div>
							</li>
						</ul>
					</div>
							<!--banner-->
					<script src="js/js/responsiveslides.min.js"></script>
					 <script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider4").responsiveSlides({
							auto: true,
							pager:true,
							nav:true,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });

						});
					  </script>
					<div class="clearfix"> </div>
				</div>
			</div>
	<!--//End-banner-->
		<!--albums-->
		<!-- pop-up-box -->
			<link href="css/css/popuo-box.css" rel="stylesheet" type="text/css" media="all">
			<script src="css/js/jquery.magnific-popup.js" type="text/javascript"></script>
			 <script>
					$(document).ready(function() {
					$('.popup-with-zoom-anim').magnificPopup({
						type: 'inline',
						fixedContentPos: false,
						fixedBgPos: true,
						overflowY: 'auto',
						closeBtnInside: true,
						preloader: false,
						midClick: true,
						removalDelay: 300,
						mainClass: 'my-mfp-zoom-in'
					});
					});
			</script>
		<!--//pop-up-box -->
			<div class="albums">
				<div class="tittle-head">
					<h3 class="tittle">New Releases <span class="new">New</span></h3>
					<a href="home.blade.php"><h4 class="tittle">See all</h4></a>
					<div class="clearfix"> </div>
				</div>
				@foreach($songs as $song)
					<div class="col-md-3 content-grid">
					<div class="css-image">
						<img src="{{asset('storage/'.$song->image)}}" title="song-name">
					</div>
					<a class="button play-icon popup-with-zoom-anim" href="#small-dialog">{{$song->name}}</a>
					</div>
				@endforeach
				<div class="clearfix"></div>
			</div>
		<!--//End-albums-->
			<!--//discover-view-->
			<div class="albums second col-md-12">
				<div class="tittle-head">
					<h3 class="tittle">Discover <span class="new">View</span></h3>
					<a href="home.blade.php"><h4 class="tittle two">See all</h4></a>
					<div class="clearfix"></div>
				</div>
				@foreach($albums as $album)
					<div class="col-md-3 content-grid">
						<div class="css-image">
							<img src="{{asset('storage/'.$album->image)}}" title="allbum-name">
						</div>
						<div class="inner-info">
							<a href="single.html">
							<h5>{{$album->name}}</h5>
							</a>
						</div>
					</div>
				@endforeach
				<div class="clearfix"> </div>
			</div>
<!--//discover-view-->
		</div>
				<!--//music-left-->
		@component('/conponent/audio_player',['songs'=>$songs])
		@endcomponent
		<div class="clearfix"></div>
	 <!-- /w3l-agile-its -->
	</div>
			<!--body wrapper start-->

<div class="review-slider">
	<div class="tittle-head">
		<h3 class="tittle">Featured Albums <span class="new"> New</span></h3>
		<div class="clearfix"> </div>
	</div>
	<ul id="flexiselDemo1">
		@foreach($artists as $artist)
			<li>
				<a href="single.html"><img src="{{asset('storage/'.$artist->image)}}" alt=""/></a>
				<div class="slide-title"><h4>{{$artist->name}}</h4> </div>
				<div class="date-city">
					<h5>{{$artist->dob}}</h5>
					<div class="buy-tickets">
						<a href="single.html">READ MORE</a>
					</div>
				</div>
			</li>
		@endforeach
	</ul>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: false,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint:480,
						visibleItems: 2
					},
					landscape: {
						changePoint:640,
						visibleItems: 3
					},
					tablet: {
						changePoint:800,
						visibleItems: 4
					}
				}
			});
		});
	</script>
</div>
<script type="text/javascript" src="js/js/jquery.flexisel.js"></script>

<div class="clearfix"></div>
<!--body wrapper end-->
<!-- /w3l-agile -->
<!--body wrapper end-->

<!--footer section start-->

<!--footer section end-->
<!-- /w3l-agile -->
<!-- main content end-->
</section>
<script src="js/js/jquery.nicescroll.js"></script>
<script src="js/js/scripts.js"></script>
<script src="js/js/bootstrap.js"></script>
</div>
</body>
@endsection