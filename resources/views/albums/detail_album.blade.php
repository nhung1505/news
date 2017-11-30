@extends('layouts.user')
@section('title')
    Detail Album
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
            @component('conponent/audio_player', ['songs'=>$detail_album->songs])
            @endcomponent
            <div class="text-center col-md-7">
                <h3>{{__('label.Album')}}: {{$detail_album->name}}</h3>
                <p class="col-md-12 text-left">{{__('label.Create by')}}:</p>
                <div class=" col-md-12 text-center mt-5">
                    @if($detail_album->description !=null)
                        <h5>{{$detail_album->description}}</h5>
                    @else
                        <h5>{{__('label.The Description does not exist')}}. {{__('label.Do you want to create')}} <a href="{{route('album.edit',$detail_album->id)}}">{{__('label.new description')}}</a></h5>
                    @endif
                </div>
            </div>
            @can('crud', $detail_album)
            <div class=" dropdown text-center">
                <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"></button>
                <ul class="dropdown-menu dropdown-action-detail-album pull-right text-center">
                    <li>
                        <a href="{{route('album.showEdit', ['id' => $detail_album->id])}}" >
                            <span class="glyphicon glyphicon-edit text-info"></span>
                        </a>
                    </li>
                    @endcan
                    @can('crud', $detail_album)
                    <li>
                        <a data-toggle="modal" data-target="#confirmDelete-{{$detail_album->id}}">
                            <span class="glyphicon glyphicon-remove text-danger"></span>
                        </a>
                    </li>
                </ul>
            </div>
            @endcan
        </div>
    </div>
    <div>
        <form action="{{route('album.delete',$detail_album->id)}}" method="post">
            {{ csrf_field() }}
            <div class="modal fade" id="confirmDelete-{{$detail_album->id}}" role="dialog">
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
    <div class="container mt-5 p-4">
         @can('crud',$detail_album)
        <div class="col-md-2 ">
            <a href="{{route('album.search_add', $detail_album->id)}}" class=" btn btn-success" role="button">{{__('label.Add Song')}}</a>
        </div>
        @endcan
        @can('crud',$detail_album)
        <div class="col-md-2 text-left">
            <a href="{{route('song.upload',['id'=>$detail_album->id])}}"  class="btn btn-default">
                <span class="glyphicon glyphicon-plus"></span> {{__('label.Upload Song')}}
            </a>
        </div>
         @endcan
        @if(Auth::id()===null)
        <div class="col-md-12">
            <div class="btn btn-info pull-right" role="button">Like</div>
            <p class="pr-1 pl-2 pt-1 pull-right">{{$detail_album->likes}}</p>
        </div>

        @else
        <a href="{{route('album.like',['id'=>$detail_album->id])}}" id="like" onclick="like()" class="btn btn-info" role="button">Like</a>
        <a href="#" id="unlike" onclick="unlike()"class="btn btn-info" role="button">Unlike</a>
        <p class="col-md-1 pl-2 pt-1 text-right">{{$detail_album->likes}}</p>
        @endif
    </div>
    <div class="container mt-5 p-4">
        <h3 class="col-md-2 text-left">{{__('label.Lyric')}}</h3>
        <h5 class=" col-md-8 text-center">{{__('label.The lyric does not exist')}}. {{__('label.Do you want to create')}} <a href="{{route('album.edit',$detail_album->id)}}">{{__('label.new lyric')}}</a> ?</h5>
    </div>
    <div class="container mt-5 p-4">
        <h3 class="col-md-2 text-left">Comment</h3>
        @if(Auth::id())
        <form class="col-md-12" method="post" action="{{route('album.comment.store',['album_id'=>$detail_album->id])}}">
            {{csrf_field()}}
            <div class="col-md-12 p-0 {{ ($errors->has('content')) ? 'has-error' : '' }}">
                <textarea class="form-control col-md-12" rows="2" name="content" ></textarea>
                @if($errors->has('content'))
                    <div class="has-feedback text-danger">
                        {{$errors->first('content')}}
                    </div>
                @endif
            </div>
            <input type="submit" value="Send" class="btn btn-success col-md-1 pull-right mt-2"></input>
        </form>
        @endif
        <div class="col-md-12 mt-5" id="itemComment">
            @foreach($commentAlbums as $comment)
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
                    <a href = "{{route('album.comment.delete',['album_id'=>$detail_album->id, 'comment_id'=>$comment->id])}}" class="col-md-1 text-right">
                        <span class="glyphicon glyphicon-remove text-danger"></span>
                    </a>
                    @endcan
                </div>
            @endforeach
            <span onclick="AllComment()" class="col-md-12 text-center btn text-info">All Comment</span>
        </div>
        <div class="col-md-12 mt-5" id="AllComment">
            @foreach($AllcommentAlbums as $comment)
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
                        <a href = "{{route('album.comment.delete',['album_id'=>$detail_album->id, 'comment_id'=>$comment->id])}}" class="col-md-1 text-right">
                            <span class="glyphicon glyphicon-remove text-danger"></span>
                        </a>
                    @endcan
                </div>
            @endforeach
            <span onclick="itemComment()" class="col-md-12 text-center btn text-info">Hiden</span>
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



