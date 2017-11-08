@extends('layouts.app')

@section('title')
    Album List
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-7">
                <h2>Albums</h2>
            </div>
            <div class="col-xs-5 text-right ">
                <a href="{{route('album.create')}}" class="btn btn-default btn-lg">
                    <span class="glyphicon glyphicon-plus"></span> Create
                </a>
            </div>
        </div>
        @if(count($albums)==0)
            <p>No Album. Would you like to create a <a href="{{route('album.create')}}"> new album</a> ?</p>
        @else
        @foreach($albums as $album)
        <div class="col-md 12">
            <div class="col-md-3">
                <a>
                    <div>
                        <a href="{{route('album.detail_album', $album->id)}}"><img class="img-rounded song-cover-img-large" src="{{asset('storage/'.$album->image)}}"></a>
                    </div>
                </a>
                <p>
                    <a href="#">{{$album->name}}</a>
                </p>
            </div>
        </div>
        @endforeach
        @endif
        <div class="col-md-2 text-center">
            {!! $albums->render() !!}
        </div>
    </div>
@endsection
