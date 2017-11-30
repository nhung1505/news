@extends('layouts.user')

@section('title')
    {{__('label.Playlist')}} {{$artist->name}}
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
    <div class="container mt-5">
        <div class="">
            @component('conponent/audio_player', ['songs'=>$artist->songs])
            @endcomponent
            <div class="text-center col-md-7">
                <h3>{{$artist->name}}</h3>
            </div>
            @can('crud', $artist)
                <div class=" dropdown text-center">
                    <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu dropdown-action-detail-album pull-right text-center">
                        <li>
                            <a href="{{route('album.showEdit', ['id' => $artist->id])}}" >
                                <span class="glyphicon glyphicon-edit text-info"></span>
                            </a>
                        </li>
                        @endcan
                        @can('crud', $artist)
                        <li>
                            <a data-toggle="modal" data-target="#confirmDelete-{{$artist->id}}">
                                <span class="glyphicon glyphicon-remove text-danger"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            @endcan
            <div class="col-md-8 text-center mt-5">
                <h3 class="text-left pl-3">Comment</h3>
                @if(Auth::id())
                <form class="col-md-12" method="post" action=">
                    {{csrf_field()}}
                        <div class="col-md-12 p-0 {{ ($errors->has('content')) ? 'has-error' : '' }}">
                <textarea class="form-control col-md-12" rows="2" name="content" ></textarea>
                @if($errors->has('content'))
                    <div class="has-feedback text-danger">
                        {{$errors->first('content')}}
                    </div>
                @endif
                <input type="submit" value="Send" class="btn btn-success col-md-1 pull-right mt-2"></input>
                </form>
                @endif
            </div>
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

