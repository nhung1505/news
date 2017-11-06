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
                <h2><span class="text-info">{{$detail_song->name}}</span></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <form>
                    <div class="form-group">
                        <h2>Lyrics</h2>
                        <h5>Upload by: <span style="color:Tomato;">{{$detail_song->user->name}}</span></h5>
                        <div class="row">
                            <pre class="col-md-6">{{$detail_song->lyric}}</pre>
                        </div>
                        <h2>Description</h2>
                        <div class="row">
                            <pre class="col-md-6">{{$detail_song->description}}</pre>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
