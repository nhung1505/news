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
                <li><a href="{{route('artist.detail',['artist_id'=>$artist->id])}}">{{__('label.Description')}}</a></li>
                <li class="active"><a href="">{{__('label.Song')}}</a></li>
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
                <div class="col-md-2">
                    <h3 class="col-md-12 text-center">{{__('label.Song')}}
                        <span class="glyphicon glyphicon-arrow-right text-right"></span>
                    </h3>
                    <button class='col-md-12 pull-center text-success' style="font-size:15px">Play All <i class="fa fa-play-circle-o"></i>
                </div>
                <div class=" col-md-10 well">
                    @if($artist->songs->all()==[])
                        <div class="text-center text-danger">No Songs</div>
                    @else
                        @foreach($artist->songs as $song)
                            <div class="col-md-10">{{$song->name}}</div>
                            <a class="text-right col-md-1">
                                <span class="glyphicon glyphicon-edit text-info"></span>
                            </a>
                            <a class="text-right col-md-1">
                                <span class="glyphicon glyphicon-remove text-danger" ></span>
                            </a>
                            @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
