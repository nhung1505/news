@extends('layouts.user')
@section('content')
<div id="page-wrapper">
	<div class="inner-content">
		<div class="music-left">
			<div class="banner-section">
				<div class="banner">
					<div class="callbacks_container">
						<ul class="rslides callbacks callbacks1" id="slider4">
							<li>
								<div class="banner-img">
									<img  src="{{asset('storage/AMusic.png')}}"  class="img-responsive" alt="">
								</div>
							</li>
							<li>
								<div class="banner-img">
									<img  src="{{asset('storage/AMusic.png')}}" class="img-responsive" alt="">
								</div>
							</li>
							<li>
								<div class="banner-img">
									<img  src="{{asset('storage/AMusic.png')}}" class="img-responsive" alt="">
								</div>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="albums">
				<div class="tittle-head">
					<h3 class="tittle">Songs</h3>
					<a href="{{route('song.list')}}"><h4 class="tittle">See all</h4></a>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-12">
					<div class="row">
						@foreach($songs as $song)
						<div class="col-md-3 content-grid">
							<div class="css-image">
								<a href="{{route('song.details_song', $song->id)}}"><img src="{{asset('storage/'.$song->image)}}" title="{{$song->name}} class="img-thumbnail"></a>
							</div>
							<a href="{{route('song.details_song', $song->id)}}">{{$song->name}}</a>
						</div>
						@endforeach
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="albums">
				<div class="tittle-head">
					<h3 class="tittle">Albums</h3>
					<a href="{{route('album.list')}}"><h4 class="tittle">See all</h4></a>
					<div class="clearfix"></div>
				</div>
				<div class="col-md-12">
					<div class="row">
						@foreach($albums as $album)
							<div class="col-md-3 content-grid">
								<div class="css-image">
									<a href="{{route('album.detail_album', $album->id)}}"><img src="{{asset('storage/'.$album->image)}}" title="{{$album->name}} class="img-thumbnail"></a>
								</div>
								<a href="{{route('album.detail_album', $album->id)}}">{{$album->name}}</a>
							</div>
						@endforeach
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		@component('/conponent/audio_player',['songs'=>$songs])
		@endcomponent
		<div class="clearfix"></div>
	</div>
</div>
<div class="review-slider">
	<div class="tittle-head">
		<h3 class="tittle col-md-2 text-center">Artists</h3>
		<a href="{{route('artist.list')}}"><h4 class="tittle">See all</h4></a>
		<div class="clearfix"> </div>
	</div>
	<ul id="flexiselDemo1">
		@foreach($artists as $artist)
			<li>
				<a href="{{route('artist.detail',$artist->id)}}"><img src="{{asset('storage/'.$artist->image)}}" alt=""/></a>
				<div class="slide-title"><h4>{{$artist->name}}</h4> </div>
				<div class="date-city">
					<h5>{{$artist->dob}}</h5>
					<div class="buy-tickets">
						<a href="{{route('artist.detail',$artist->id)}}">READ MORE</a>
					</div>
				</div>
			</li>
		@endforeach
	</ul>
</div>
<div class="clearfix"></div>
@endsection