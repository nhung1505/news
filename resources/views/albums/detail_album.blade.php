@extends('layouts.app')
@section('title')
    Detail Album
@endsection
@section('content')
    <div>
        <div class="container alert">
            <div class="row well">
                <div class="col-md-4 song-cover-img-detail-album img-rounded">
                    <img src="{{asset('storage/'.$detail_album->image)}}">
                </div>
                <div class="col-md-6">
                    <h3>{{__('label.Album')}}: {{$detail_album->name}}</h3>
                    <p class="col-md-12">{{__('label.Create by')}}:</p>
                    <div class="well text-center mt-5">
                        @if($detail_album->description !=null)
                            <h5>{{$detail_album->description}}</h5>
                        @else
                            <h5>{{__('label.The Description does not exist')}}. {{__('label.Do you want to create')}} <a href="{{route('album.edit',$detail_album->id)}}">{{__('label.new description')}}</a></h5>
                        @endif
                    </div>
                </div>
                @can('crud', $detail_album)
                <div class="col-md-2 dropdown text-center">
                    <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu dropdown-action-detail-album text-center">
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
    <div>
        <div class="container well">
            <div class="row">
                <div style="overflow: hidden ; height: 300px" class="col-md-12">
                    <img width="100%"  src="https://kenh14cdn.com/thumb_w/600/dpA6uSv3GtBzvbRT7Y4EBtfN37yCA/Image/2014/10/mt3-08c79.jpg">
                </div>
            </div>
                <div class="well">
                    <table class="table">
                        <tbody>
                        @if($detail_album->songs->all()==[])
                        <td class="text-center text-danger">{{__('label.There are no songs in the album')}}. {{__('label.Please, add song or create song')}}!</td>
                        @else
                        @foreach($detail_album->songs as $key=>$song)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$song->name}}</td>
                            <td>
                                <sub>
                                    @can('crud', $detail_album)
                                    <a data-toggle="modal" data-target="#confirmDelete-{{$song->id, $detail_album->id}}">
                                        <span class="glyphicon glyphicon-remove text-danger btn pull-right" ></span>
                                    </a>
                                    @endcan
                                    <form action="{{route('album.remove',[$detail_album->id,'song'=>$song->id])}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal fade" id="confirmDelete-{{$song->id, $detail_album->id}}" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger text-center">{{__('label.Confim Remove')}}</h4>
                                                    </div>
                                                    <div class="modal-body text-danger text-center">
                                                        <p>{{__('label.Are you sure ?')}} </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger col-md-6" >{{__('label.Yes')}}</button>
                                                        <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">{{__('label.No')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </sub>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    @can('crud',$detail_album)
                    <div class="col-md-2">
                        <a href="{{route('album.search_add', $detail_album->id)}}" class=" btn btn-success" role="button">{{__('label.Add Song')}}</a>
                    </div>
                    @endcan
                    @can('crud',$detail_album)
                    <div class="col-md-8 text-left">
                        <a href="{{route('song.upload',['id'=>$detail_album->id])}}"  class="btn btn-default">
                            <span class="glyphicon glyphicon-plus"></span> {{__('label.Upload Song')}}
                        </a>
                    </div>
                    @endcan
                    <button class="col-md-1 text-left p-0 mb-3 btn-info">
                        <span class="glyphicon glyphicon-thumbs-up text-right pl-3 pt-0"> Likes</span>
                    </button>
                    <p class="col-md-1 pt-2">11111</p>
                </div>
            </div>
        </div>
        <div class="container well">
            <h3 class="col-md-2 text-center">{{__('label.Lyric')}}</h3>
            <h5 class=" col-md-8 text-center">{{__('label.The lyric does not exist')}}. {{__('label.Do you want to create')}} <a href="{{route('album.edit',$detail_album->id)}}">{{__('label.new lyric')}}</a> ?</h5>
        </div>
        <div class="container p-0">
            <form class="col-md-12 well" method="post" action="{{route('album.comment.store',['album_id'=>$detail_album->id])}}">
                <h2 class="col-md-2 text-center">Comment</h2>
                {{csrf_field()}}
                <div class="col-md-12 pr-0 {{ ($errors->has('content')) ? 'has-error' : '' }}">
                    <textarea class="form-control col-md-12" rows="2" name="content" ></textarea>
                    @if($errors->has('content'))
                        <div class="has-feedback text-danger">
                            {{$errors->first('content')}}
                        </div>
                    @endif
                </div>
                <input type="submit" value="Send" class="btn btn-success col-md-1 pull-right mt-2"></input>
            </form>
            <div class="col-md-12 well">
                @foreach($commentAlbums as $comment)
                    <div class="col-md-12">
                        <p class="col-md-12 text-danger pl-0">{{$comment->user->name}}</p>
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
            </div>
        </div>
    </div>
@endsection



