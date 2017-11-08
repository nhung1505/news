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
        <div class="row">
            <div class="col-md-6">
                <img class="col-md-12 " src="{{asset('storage/'.$detail_song->image)}}">
                <audio class="col-md-12" controls>
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/ogg">
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/mpeg">
                </audio>
            </div>
            <div class="col-md-6">
                <h2 class="text-info">{{$detail_song->name}}
                    <small class="text-danger">
                        <sub>
                            <a class="text-success" href="{{route('song.showEdit_song', ['id' => $detail_song->id])}}">
                                <span class="glyphicon glyphicon-edit"></span>
                            </a>
                            <a data-toggle="modal" data-target="#confirmDelete-{{$detail_song->id}}">
                                <span class="glyphicon glyphicon-remove" ></span>
                            </a>
                            <form action="{{route('song.delete',$detail_song->id)}}" method="post">
                                {{ csrf_field() }}
                                <div class="modal fade" id="confirmDelete-{{$detail_song->id}}" role="dialog">
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
                        </sub>
                    </small>
                </h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <h2>Lyrics</h2>

                        <h5>Upload by: <span style="color:Tomato;">{{$detail_song->user->name}}</span></h5>
                        <div class="row">
                            @if(!isset($detail_song->lyric))
                                <pre class="col-md-6">Lyrics are updating</pre>
                            @else
                                <pre class="col-md-6">{{$detail_song->lyric}}</pre>
                            @endif
                        </div>
                        <h2>Description</h2>
                        <div class="row">
                            @if(!isset($detail_song->description))
                                <pre class="col-md-6">No description available</pre>
                            @else
                                <pre class="col-md-6">{{$detail_song->description}}</pre>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
