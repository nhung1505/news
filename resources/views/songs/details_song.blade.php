
@extends('layouts.app')

@section('title')
    {{$detail_song->name}}
@endsection

@section('content')
    <div class="container">
        @if(session('announcement'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('announcement')}}!</strong>
            </div>
        @endif
        <div class="row well">
            <div class="col-md-6 well mb-0"><div class=" song-cover-img-detail-song"><img class="col-md-12 p-0 mr-5" src="{{asset('storage/'.$detail_song->image)}}">
                </div>
                <audio id="myAudio" class="col-md-12 p-0" controls="controls" loop="loop" preload="auto">
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/ogg">
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/mpeg">
                </audio>
            </div>
            <div class=" col-md-5">
                <h2 class="text-info col-md-12 text-center">{{$detail_song->name}}</h2>
                @if(isset($detail_song->artist->id))
                <h4 class="col-md-12 text-center"><a href="{{route('artist.detail',['artist'=>$detail_song->artist->id])}}">{{$detail_song->artist->name}}</a></h4>
                @else
                <h4 class="col-md-12 text-center">{{ __('label.No Artist') }}</h4>
                @endif
            </div>
            @can('crud',$detail_song)
            <div class="col-md-1">
                <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" type="button" data-toggle="dropdown"></button>
                <ul class="dropdown-menu dropdown-action-detail-song">
                    <li class="col-md-6">
                        <a class="text-success" href="{{route('song.showEdit_song', ['id' => $detail_song->id])}}">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                    </li>
                    <li  class="col-md-6">
                        <a data-toggle="modal" data-target="#confirmDelete-{{$detail_song->id}}">
                            <span class="glyphicon glyphicon-remove text-danger" ></span>
                        </a>
                    </li>
                </ul>
            </div>
            @endcan
            <form action="{{route('song.delete',$detail_song->id)}}" method="post">
                {{ csrf_field() }}
                <div class="modal fade" id="confirmDelete-{{$detail_song->id}}" role="dialog">
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
            <h6 class="col-md-6">{{__('label.Upload by')}}: <span class="text-danger">{{$detail_song->user->name}}</span></h6>
            <form class="col-md-12">
                <span class="glyphicon glyphicon-pushpin btn btn-default" onclick="openAlbum()"> {{__('label.Add')}}</span>
                <div style="display:none;" id="myAlbum">
                    <div class="btn text-danger text-left col-md-12" onclick="closeAlbum()">&times; {{__('label.close')}}</div>
                    @if(isset($albums))
                        @foreach($albums as $album)
                            @can('crud',$album)
                            <form method="post" action="{{route('album_song.add',['album_id'=>$album->id,'id'=>$detail_song->id])}}">
                                {{csrf_field()}}
                                <input type="hidden" name="id" value="{{$detail_song->id}}">
                                <button name="album_id" type="submit" class="btn btn-default col-md-6" value="{{$album->id}}">{{$album->name}}</button>
                            </form>
                            @endcan
                        @endforeach
                    @endif
                    <div class="text-center">
                        <span>{{__('label.Do you want to create a')}} <a href="{{route('album.create',['id'=>$detail_song->id])}}"> {{__('label.new album')}}</a> ?</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="row well">
            <h3 class="col-md-2 text-center">{{__('label.Lyrics')}}</h3>
            @if(!isset($detail_song->lyric))
                <h5 class="col-md-8 text-center">{{__('label.No Lyrics are available. Do you want to create')}}
                    <a href="{{route('song.edit_song',['id'=>$detail_song->id])}}"> {{__('label.new lyric')}} </a>?
                </h5>
            @else
                <pre class="col-md-8 border-0"  id="lyric-song">
                    <h5 class="text-center">{{$lyric}}<span class="text-primary" role="button" onclick="seeAlllyric()">{{__('label.See all')}}</span></h5>
                </pre>
                <pre class="col-md-8 border-0"  id="lyric-song-full">
                    <h5 class="text-center">{{$detail_song->lyric}}</h5><span class="text-primary col-md-12 text-center" role="button" onclick="back_lyricsong()">{{__('label.Hidden')}}</span>
                </pre>
            @endif
        </div>
        <div class="row well">
            <h3 class="col-md-2 text-center">{{__('label.Description')}}</h3>
            @if(!isset($detail_song->description))
                <h5 class="col-md-8 text-center">{{__('label.No description available. Do you want to create')}} <a href="{{route('song.edit_song',['id'=>$detail_song->id])}}"> {{__('label.new description')}} </a>?</h5>
            @else
                <h5 class="col-md-8 text-center">{{$detail_song->description}}</h5>
            @endif
        </div>
    </div>
@endsection
