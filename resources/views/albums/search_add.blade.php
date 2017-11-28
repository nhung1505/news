@extends('layouts.app')

@section('content')
    <div class="container well">
        <h4>{{__('label.Search Song')}}</h4>
        <form class="form-inline" method="post"
              action="{{ route('album.addSong', ['id'=>$album->id])}}">
            {{ csrf_field() }}
            <input type="hidden" id="song_id" name="song_id"/>
            <input type="hidden" id="album_id" value="{{$album->id}}"/>
            <input class="form-control col-md-11    " type="text" id="q" placeholder="{{__('label.search name song')}}" >
            <input class="btn btn-success col-md-1 mb-0" type="submit" value="{{__('label.Add')}}" >
        </form>
        @if(isset($songAdd))
        <p class="text-center col-md-11 mt-3">Add  successful song {{$songAdd->name}} to the album {{$album->name}}</p>
        <form class="col-md-1 text-left" method="post" action="{{route('album.removeSong',['id'=>$album->id])}}">
            {{csrf_field()}}
            <input type="hidden" name="songAdd_id" value="{{$songAdd->id}}">
            <button data-toggle="tooltip" title="do not add" class ="glyphicon glyphicon-remove text-danger pull-right mt-3" type="submit"  onclick=" return myFunction()" ></button>
        </form>
        @endif
    </div>
    <div class="container">
        <a href="{{route('album.detail_album',['id'=>$album->id])}}" class="btn btn-default" role="button">{{__('label.Go to Album')}}</a>
    </div>
@endsection
