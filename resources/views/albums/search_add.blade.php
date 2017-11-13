@extends('layouts.app')

@section('content')
    <div class="container">
        <h4>Search Song</h4>
        <form class="form-inline" method="post"
              action="{{ route('album.addSong', ['id'=>$album->id])}}">
            {{ csrf_field() }}
            <input type="hidden" id="song_id" name="song_id"/>
            <input type="hidden" id="album_id" value="{{$album->id}}"/>
            <div class="form-group">
                <div>
                    <input class="form-control" type="text" id="q" placeholder="search name song" >
                    <input class="btn btn-success" type="submit" value="Add" >
                </div>
            </div>
        </form>

        <table class="table table-striped">
            <h5>The songs you have added</h5>
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
                                <button class ="glyphicon glyphicon-remove text-danger btn pull-right" type="submit" onclick=" return myFunction()" ></button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{route('album.detail_album',['id'=>$album->id])}}" class="btn btn-default" role="button">Go to Album</a>
    </div>
@endsection
