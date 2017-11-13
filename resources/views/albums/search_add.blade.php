@extends('layouts.app')

@section('content')
    <div class="container well">
        <h4>Search Song</h4>
        <form class="form-inline well" method="post"
              action="{{ route('album.addSong', ['id'=>$album->id])}}">
            {{ csrf_field() }}
            <input type="hidden" id="song_id" name="song_id"/>
            <input type="hidden" id="album_id" value="{{$album->id}}"/>
            <input class="form-control col-md-8" type="text" id="q" placeholder="search name song" >
            <input class="btn btn-success col-md-0.5" type="submit" value="Add" >
        </form>
        <table class="table table-striped">
            <h5>New songs have been added</h5>
            @if(!isset($songAdd))
                <td class=" text-center">No songs added yet</td>
            @endif
            @if(isset($songAdd))
                <tr>
                    <td class="text-center"><span class="text-danger">{{$user->name}}</span> have <span class="text-success">successfully</span> added the song <span class="text-info">{{$songAdd->name}}</span></td>
                    <td>
                        <form method="post" action="{{route('album.removeSong',['id'=>$album->id])}}">
                            {{csrf_field()}}
                            <input type="hidden" name="songAdd_id" value="{{$songAdd->id}}">
                            <button class ="glyphicon glyphicon-remove text-danger btn pull-right" type="submit" onclick=" return myFunction()" ></button>
                        </form>
                    </td>
                </tr>
            @endif
        </table>
    </div>
    <div class="container">
        <a href="{{route('album.detail_album',['id'=>$album->id])}}" class="btn btn-default" role="button">Go to Album</a>
    </div>
@endsection
