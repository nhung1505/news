
@extends('layouts.user')

@section('title')
    {{$detail_song->name}}
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

    <div class="container">
        @if(session('announcement'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('announcement')}}!</strong>
            </div>
        @endif
        <div class="row mt-5">
            <div class="col-md-5 mb-0 p-0"><div class="song-cover-img-detail-song"><img class="col-md-12 p-0 mr-5" src="{{asset('storage/'.$detail_song->image)}}">
                </div>
                <audio id="myAudio" class="col-md-11 p-0" controls="controls" loop="loop" preload="auto">
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/ogg">
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/mpeg">
                </audio>
                <h6 class="col-md-6">{{__('label.Upload by')}}: <span class="text-danger">{{$detail_song->user->name}}</span></h6>
                @if(Auth::id())
                    <a href="{{route('song.like',['id'=>$detail_song->id])}}" id="like" onclick="like()" class=" mt-3 mb-1 pull-right" role="button"><span class="glyphicon glyphicon-thumbs-up text-info"></a>
                    {{--<a href="#" id="unlike" onclick="unlike()"class="btn btn-info mt-3 mb-1" role="button">Unlike</a>--}}
                    <p class="col-md-1  pull-right pt-3">{{$detail_song->likes}}</p>
                @else
                    <a class=" mt-3 mb-1 pull-right"><span class="glyphicon glyphicon-thumbs-up"></a>
                    <p class="col-md-1  pull-right pt-3">{{$detail_song->likes}}</p>
                @endif
                @if(Auth::id())
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
                @endif
                <div class="col-md-12 mt-5 p-0">
                    <h3 class="col-md-12 text-left">{{__('label.Lyrics')}}</h3>
                    @if(!isset($detail_song->lyric))
                        <h5 class="col-md-12 text-center p-0">{{__('label.No Lyrics are available. Do you want to create')}}
                            <a href="{{route('song.edit_song',['id'=>$detail_song->id])}}"> {{__('label.new lyric')}} </a>?
                        </h5>
                    @else
                        <pre class="col-md-12 border-0 p-0"  id="lyric-song">
                    <h5 class="text-center">{{$lyric}}<span class="text-primary" role="button" onclick="seeAlllyric()">{{__('label.See all')}}</span></h5>
                </pre>
                        <pre class="col-md-12 border-0 p-0"  id="lyric-song-full">
                    <h5 class="text-center">{{$detail_song->lyric}}</h5><span class="text-primary col-md-12 text-center" role="button" onclick="back_lyricsong()">{{__('label.Hidden')}}</span>
                </pre>
                    @endif
                </div>
            </div>
            <div class=" col-md-7 pr-0 pl-5 ">
                <h2 class="text-info col-md-11 text-left">{{$detail_song->name}} -
                    @if(isset($detail_song->artist->id))
                    <span class="text-danger">
                    <a href="{{route('artist.detail',['artist'=>$detail_song->artist->id])}}">{{$detail_song->artist->name}}</a>
                    </span>
                    @else
                    <span class="text-danger">{{ __('label.No Artist') }}</span>
                    @endif
                </h2>
                @can('crud',$detail_song)
                    <div class="col-md-1 pl-0">
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
                <div class="col-md-12">
                    @if(!isset($detail_song->description))
                        <h5 class="col-md-8 text-left pl-0">{{__('label.No description available. Do you want to create')}} <a href="{{route('song.edit_song',['id'=>$detail_song->id])}}"> {{__('label.new description')}} </a>?</h5>
                    @else
                        <h5 class="col-md-8 text-left pl-0">{{$detail_song->description}}</h5>
                    @endif
                </div>
                <div class="col-md-12 mt-5 p-0">
                    <h3 class="col-md-2 text-left">Comment</h3>
                    @if(Auth::id())
                        <form class="col-md-12 pr-0" method="post" action="{{route('song.comment.store',['id'=>$detail_song->id])}}">
                            {{csrf_field()}}
                            <div class="col-md-12 p-0">
                                <textarea class="form-control col-md-12" rows="2" id="content" name="content" ></textarea>
                            </div>
                            <input type="submit" value="Send" class="btn btn-success col-md-2 pull-right mt-2"></input>
                        </form>
                    @endif
                    <div class="col-md-12 mt-5" id="itemComment">
                        @foreach($comments as $comment)
                            <div class="col-md-12">
                                @if($comment->user->name === null)
                                    <p class="col-md-12 text-danger pl-0">no name</p>
                                @else
                                    <p class="col-md-12 text-danger pl-0">{{$comment->user->name}}</p>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <p class="col-md-7 pl-0">{{$comment->content}}</p>
                                <p class="col-md-4 text-right">{{$comment->created_at}}</p>
                                @can('editor')
                                    <a href = "{{route('song.comment.delete',['song_id'=>$detail_song->id, 'comment_id'=>$comment->id])}}" class="col-md-1 text-right">
                                        <span class="glyphicon glyphicon-remove text-danger"></span>
                                    </a>
                                @endcan
                            </div>
                        @endforeach
                        <span onclick="AllComment()" class="col-md-12 text-center btn text-info">All Comment</span>
                    </div>
                    <div class="col-md-12 mt-5" id="AllComment">
                        @foreach($Allcomment as $comment)
                            <div class="col-md-12">
                                @if($comment->user->name === null)
                                    <p class="col-md-12 text-danger pl-0">no name</p>
                                @else
                                    <p class="col-md-12 text-danger pl-0">{{$comment->user->name}}</p>
                                @endif
                            </div>
                            <div class="col-md-12">
                                <p class="col-md-7 pl-0">{{$comment->content}}</p>
                                <p class="col-md-4 text-right">{{$comment->created_at}}</p>
                                @can('editor')
                                    <a href = "{{route('song.comment.delete',['album_id'=>$detail_song->id, 'comment_id'=>$comment->id])}}" class="col-md-1 text-right">
                                        <span class="glyphicon glyphicon-remove text-danger"></span>
                                    </a>
                                @endcan
                            </div>
                        @endforeach
                        <span onclick="itemComment()" class="col-md-12 text-center btn text-info">Hiden</span>
                    </div>
                </div>
            </div>
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
