@extends('layouts.app')

@section('title')
    Albums
@endsection

@section('content')
    <div class="container well">
        <div class="row">
            <div class="col-md-12 text-right">
                <a href="{{route('album.create')}}" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-plus"></span> {{__('label.Create')}}
                </a>
            </div>
        </div>
        @if(count($albums)==0)
            <p>{{__('label.No Album')}}. {{__('label.Would you like to create a ')}}<a href="{{route('album.create')}}"> {{__('label.new album')}}</a> ?</p>
        @else
        @foreach($albums as $album)
        <div class="col-md 12 text-center">
            <div class="col-md-3">
                <div class="img-rounded song-cover-img">
                    <a class="pl-3" href="{{route('album.detail_album', $album->id)}}"><img alt="Cinque Terre" src="{{asset('storage/'.$album->image)}}"></a>
                </div>
                <p>
                    <a href="{{route('album.detail_album', $album->id)}}">{{$album->name}}</a>
                </p>
            </div>
        </div>
        @endforeach
        @endif
        <div class="col-md-12 text-center">
            {!! $albums->render() !!}
        </div>
    </div>
@endsection
