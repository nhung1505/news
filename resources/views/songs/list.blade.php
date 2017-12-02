@extends('layouts.user')

@section('title')
    Songs
@endsection
@section('app.css')
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('content')
    <h1 class="col-md-12 mt-5">Songs</h1>
    <div class="container mt-5">
        @if(count($songs)==0)
            <p class="text-center">{{__('label.No Song')}}</p>
        @else
            @foreach($songs as $song)
                <div class="col-md 12 text-center">
                    <div class="col-md-3">
                        <div class="img-rounded song-cover-img">
                            <a class="pl-3" href="{{route('song.details_song', $song->id)}}"><img alt="Cinque Terre" src="{{asset('storage/'.$song->image)}}"></a>
                        </div>
                        <p>
                            <a href="{{route('song.details_song', $song->id)}}">{{$song->name}}</a>
                        </p>
                    </div>
                </div>
            @endforeach
        @endif
        <div class="col-md-12 text-center">
            {!! $songs->links() !!}
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

