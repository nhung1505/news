@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
               <img  src="https://baomoi-photo-1-td.zadn.vn/17/09/08/139/23227992/1_59236.jpg">
                <audio controls>
                    <source src="{{asset('storage/'.$detail_song->audio)}}" type="audio/mpeg">
                </audio>
            </div>
            <div class="col-md-6">
                <h2>Name: {{$detail_song->name}}</h2>
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