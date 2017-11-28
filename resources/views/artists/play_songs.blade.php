@extends('layouts.app')

@section('title')
    {{__('label.Playlist')}} {{$artist->name}}
@endsection

@section('content')
    <div class="container well">
        <div class="well col-md-12">
            <div class="col-md-12" style="overflow: hidden ; height: 300px">
                <img width="100%"  src="https://kenh14cdn.com/thumb_w/600/dpA6uSv3GtBzvbRT7Y4EBtfN37yCA/Image/2014/10/mt3-08c79.jpg">
            </div>
            <form class="col-md-12">
                @foreach($songs as $song)
                <h4 class="col-md-8 text-left pl-5 pb-2">{{$song->name}}</h4>
                @endforeach
            </form>
        </div>
    </div>
@endsection
