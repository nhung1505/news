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
                        <a data-toggle="modal" data-target="#confirmDelete-{{$artist->id}}">
                            <span class="glyphicon glyphicon-remove text-danger"></span>
                        </a>
                    </li>
                </ul>
            </div>
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
