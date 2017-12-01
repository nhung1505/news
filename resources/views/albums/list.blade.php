@extends('layouts.user')

@section('title')
    Albums
@endsection
@section('app.css')
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('content')
    <h1 class="col-md-12 mt-5">Albums</h1>
    <div class="container mt-5">
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

@section('myjs')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/myJs.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection
