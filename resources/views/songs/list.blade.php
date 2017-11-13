@extends('layouts.app')

@section('title')
    Songs
@endsection

@section('content')
    <div class="container">
        @if(session('announcement'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('announcement')}}!</strong>
            </div>
        @endif
        <h2>Songs</h2>
        <table class="table table-striped">
            <tbody>
            @if(count($songs) == 0)
                <tr>
                    <td><p class="text-center">No song. Would you like to create a <a href="{{route('song.upload')}}"> new song </a>?</p></td>
                </tr>
            @else
            @foreach($songs as $song)
                <tr>
                    <td class="edit-width">
                        <div class="img-rounded song-cover-img-large" >
                            <a href="{{route('song.details_song', $song->id)}}">
                                <img src="{{asset('storage/'.$song->image)}}"/>
                            </a>
                        </div>
                    </td>
                    <td><a href="{{route('song.details_song', $song->id)}}">{{$song->name}}</a></td>
                    <td>
                        <a href="{{route('song.showEdit_song', ['id' => $song->id])}}">
                            <button class="btn  btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('song.delete',$song->id)}}" method="post">
                            {{ csrf_field() }}
                            <button data-toggle="modal" data-target="#confirmDelete-{{$song->id}}" type="button" class="btn btn-danger btn-sm" >
                                <span class="glyphicon glyphicon-remove" ></span> Remove
                            </button>
                            <div class="modal fade" id="confirmDelete-{{$song->id}}" role="dialog">
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
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
        <div class="col-md-12 text-center">
            {!! $songs->render() !!}
        </div>
    </div>
    @endsection
