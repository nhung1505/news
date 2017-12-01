@extends('layouts.user')

@section('title')
        {{$artist->name}}
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
        <div>
            <div class="col-md-12" style="overflow: hidden ; height: 300px">
                <img width="100%" hight="300px" src="https://kenh14cdn.com/thumb_w/600/dpA6uSv3GtBzvbRT7Y4EBtfN37yCA/Image/2014/10/mt3-08c79.jpg">
                <div class="text-image text-white col-md-4 text-center">
                    <h1>{{$artist->name}}</h1>
                    <h2>{{$artist->stage_name}}</h2>
                    <h2>{{$artist->dob}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-5">
            <ul class="nav nav-tabs col-md-6">
                <li class="active"><a href="">{{__('label.Description')}}</a></li>
                <li><a href="{{route('artist.detail_artist_song',['detail_artist'=>$artist->id])}}">{{__('label.Song')}}</a></li>
            </ul>
            @can('crud',$artist)
            <div class="col-md-6 dropdown text-right">
                <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"></button>
                <ul class="dropdown-menu dropdown-action-detail-album text-center pull-right">
                    <li>
                        <a href="{{route('artist.showEdit', ['id' =>$artist->id])}}">
                            <span class="glyphicon glyphicon-edit text-info"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#confirmDelete-{{$artist->id}}">
                            <span class="glyphicon glyphicon-remove text-danger"></span>
                        </a>
                    </li>
                </ul>
            </div>
            @endcan
            <form action="{{route('artist.delete',$artist->id)}}" method="post">
                {{ csrf_field() }}
                <div class="modal fade" id="confirmDelete-{{$artist->id}}" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-danger text-center">{{__('label.Confim Delete')}}</h4>
                            </div>
                            <div class="modal-body text-danger text-center">
                                <p>{{__('label.Are you sure ?')}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger col-md-6" >{{__('label.Yes')}}</button>
                                <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">{{__('label.No')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-12 well">
                <h3 class="col-md-2 text-center">{{__('label.Description')}}</h3>
                <div class=" col-md-10">
                    @if(!isset($artist->description))
                        <h5 class="text-center">No description. Do you want create <a href="">new description</a></h5>
                    @else
                    <h5 class="text-left">
                        {{$artist->description}}
                    </h5>
                    @endif
                </div>
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
