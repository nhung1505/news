@extends('layouts.app')

@section('title')
        {{$artist->name}}
@endsection

@section('content')
    <div class="container well">
        <div>
            <div class="col-md-12 well" style="overflow: hidden ; height: 300px">
                <img width="100%" hight="300px" src="https://kenh14cdn.com/thumb_w/600/dpA6uSv3GtBzvbRT7Y4EBtfN37yCA/Image/2014/10/mt3-08c79.jpg">
                <div class="text-image text-white col-md-4 text-center">
                    <h1>{{$artist->name}}</h1>
                    <h2>{{$artist->stage_name}}</h2>
                    <h2>{{$artist->dob}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 well mt-0">
            <ul class="nav nav-tabs col-md-6">
                <li class="active"><a href="">{{__('label.Description')}}</a></li>
                <li><a href="{{route('artist.detail_artist_song',['detail_artist'=>$artist->id])}}">{{__('label.Song')}}</a></li>
            </ul>
            <div class="col-md-6 dropdown text-right">
                <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"></button>
                <ul class="dropdown-menu dropdown-action-detail-album text-center pull-right">
                    <li>
                        <a href="" >
                            <span class="glyphicon glyphicon-edit text-info"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#confirmDelete-">
                            <span class="glyphicon glyphicon-remove text-danger"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-md-12 well">
                <h3 class="col-md-2 text-center">{{__('label.Description')}}</h3>
                <div class=" col-md-10">
                    <h5 class="'text-left">
                        {{$artist->description}}
                    </h5>
                </div>
            </div>
        </div>
    </div>
@endsection
