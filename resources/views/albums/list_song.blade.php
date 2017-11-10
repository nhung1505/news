@extends('layouts.app')
@section('header')
    <h2>Album List Song</h2>
@endsection
@section('content')
    <div class="container">
        <h3>List Song</h3>
        <form class="form-inline" method="post"
              action="{{ route('album.addSong', ['id'=>$album->id])}}">
            {{ csrf_field() }}
            <input type="hidden" id="song_id" name="song_id"/>
            <input type="hidden" id="album_id" value="{{$album->id}}"/>
            <div class="form-group">
                <div>
                    <input class="form-control" type="text" id="q" placeholder="Enter Name" >
                    <input class="btn btn-success" type="submit" value="Add" >
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($album->songs as $key=>$song)
                <tr>
                    <td>{{++$key}}</td>
                    <td>{{$song->name}}</td>
                    <td>
                        @if(!empty($song))
                            <form method="post" action="{{route('album.removeSong',['id'=>$album->id])}}">
                                {{csrf_field()}}
                                <input type="hidden" name="song_id" value="{{$song->id}}">
                                <input class ="btn btn-danger" type="submit" onclick=" return myFunction()" value="Remove"/>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
