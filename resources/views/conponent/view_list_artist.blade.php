@extends('layouts.app')

@section('title')
    Artist
@endsection

@section('content')
    <div class="container well">
        <div class="row">
            <div class="col-xs-7">
            </div>
            <div class="col-xs-5 text-right ">
                <a href="" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-plus"></span> {{__('label.Create')}}
                </a>
            </div>
        </div>
        @if(count($artists)==0)
            <p>{{__('label.No Artist')}}. {{__('label.Would you like to create a ')}}<a href=""> {{__('label.new artist')}}</a> ?</p>
        @else
            @foreach($artists as $artist)
                <div class="col-md 12 text-center">
                    <div class="col-md-3 well">
                        <div class="img-rounded song-cover-img-large">
                            {{--{{route('album.detail_album', $album->id)}}--}}
                            <a class="pl-3" href="{{route('artist.detail',['artist'=>$artist->id])}}"><img   alt="Cinque Terre" width="304" height="236" src="{{asset('storage/'.$artist->image)}}"></a>
                        </div>
                        <p>
                            <a href="{{route('artist.detail',['artist'=>$artist->id])}}">{{$artist->name}}</a>
                        </p>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-md-12 text-center">
            {!! $artists->links() !!}
        </div>
    </div>
@endsection
