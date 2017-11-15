@extends('layouts.app')
@section('title')
    Detail Album
@endsection
@section('content')
    <div>
        <div class="container alert">
            <div class="row well">
                <div class="col-md-4">
                    <img src="{{asset('storage/'.$detail_album->image)}}" width="100%">
                </div>
                <div class="col-md-6">
                    <h3>Album : {{$detail_album->name}}</h3>
                    <div class="well text-center">
                        @if($detail_album->description !=null)
                            <h5>{{$detail_album->description}}</h5>
                        @else
                            <h5>The Description does not exist. Do you want to create <a href="{{route('album.edit',$detail_album->id)}}">new description</a> ?</h5>
                        @endif
                    </div>
                </div>
                <div class="col-md-2 dropdown text-center">
                    <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"></button>
                    <ul class="dropdown-menu dropdown-action-detail-album text-center">
                        <li>
                            <a href="{{route('album.showEdit', ['id' => $detail_album->id])}}" >
                                <span class="glyphicon glyphicon-edit text-info"></span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#confirmDelete-{{$detail_album->id}}">
                                <span class="glyphicon glyphicon-remove text-danger"></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <form action="{{route('album.delete',$detail_album->id)}}" method="post">
            {{ csrf_field() }}
            <div class="modal fade" id="confirmDelete-{{$detail_album->id}}" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title text-danger text-center">Confim Delete</h4>
                        </div>
                        <div class="modal-body text-danger text-center">
                            <p>Are you sure ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-danger col-md-6" >Yes</button>
                            <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">No</button>
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
                            <td class="text-center text-danger"><h3>There are no songs in the album. Please, add song or create song!</h3></td>
                        @else
                        @foreach($detail_album->songs as $key=>$song)
                        <tr>
                            <td>{{++$key}}</td>
                            <td>{{$song->name}}</td>
                            <td>
                                <sub>
                                    <a data-toggle="modal" data-target="#confirmDelete-{{$song->id, $detail_album->id}}">
                                        <span class="glyphicon glyphicon-remove text-danger btn pull-right" ></span>
                                    </a>
                                    <form action="{{route('album.remove',[$detail_album->id,'song'=>$song->id])}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal fade" id="confirmDelete-{{$song->id, $detail_album->id}}" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger text-center">Confim Remove</h4>
                                                    </div>
                                                    <div class="modal-body text-danger text-center">
                                                        <p>Are you sure ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger col-md-6" >Yes</button>
                                                        <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">No</button>
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
                    <div class="col-md-2">
                        <a href="{{route('album.search_add', $detail_album->id)}}" class=" btn btn-success" role="button">Add Song</a>
                    </div>
                    <div class="col-md-2">
                        <a href="{{route('song.upload',['id'=>$detail_album->id])}}"  class="btn btn-default">
                            <span class="glyphicon glyphicon-plus"></span> Upload Song
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container well">
            <h3 class="col-md-2 text-center">Lyric</h3>
            <h5 class=" col-md-8 text-center">The lyric does not exist. Do you want to create <a href="{{route('album.edit',$detail_album->id)}}">new lyric</a> ?</h5>
        </div>
    </div>
@endsection



