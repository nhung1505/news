@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
               <img  class="col-md-12 " src="{{asset('storage/'.$detail_song->image)}}">
                <audio class="col-md-12" controls>
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/ogg">
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/mpeg">
                </audio>
            </div>
            <div class="col-md-6">
                <h2>Song: <span class="text-info">{{$detail_song->name}}</span></h2>
                <h2>Size: {{$size_mb}} Mb</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <h2>Lyrics</h2>
                        <h5>Upload by: <span style="color:Tomato;">{{$detail_song->user->name}}</span></h5>
                        <textarea class="form-control" rows="5">{{$detail_song->lyric}}</textarea>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
