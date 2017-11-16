@extends('layouts.app')

@section('title')
    {{$artist->name}}
@endsection

@section('content')
    <div class="container well">
        <div>
            <div class="col-md-12 well" style="overflow: hidden ; height: 300px">
                <img width="100%" hight="300px" src="https://kenh14cdn.com/thumb_w/600/dpA6uSv3GtBzvbRT7Y4EBtfN37yCA/Image/2014/10/mt3-08c79.jpg">
                <div class="text-image text-white col-md-4 text-center">
                    <h1>{{$artist->name}}</h1>
                    <h2>{{$artist->stage_name}}</h2>
                    <h2>{{$artist->dob}}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-12 well mt-0">
            <ul class="nav nav-tabs col-md-6">
                <li><a href="{{route('artist.detail',['artist_id'=>$artist->id])}}">{{__('label.Description')}}</a></li>
                <li class="active"><a href="">{{__('label.Song')}}</a></li>
            </ul>
            <div class="col-md-6 dropdown text-right">
                <button class="btn btn-default dropdown-toggle glyphicon glyphicon-cog" data-toggle="dropdown"></button>
                <ul class="dropdown-menu dropdown-action-detail-album text-center pull-right">
                    <li>
                        <a href="" >
                            <span class="glyphicon glyphicon-edit text-info"></span>
                        </a>
                    </li>
                    <li>
                        <a data-toggle="modal" data-target="#confirmDelete-">
                            <span class="glyphicon glyphicon-remove text-danger"></span>
                        </a>
                    </li>
                </ul>
            </div>
            <form action="" method="post">
                {{ csrf_field() }}
                <div class="modal fade" id="confirmDelete-" role="dialog">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-danger text-center">{{__('label.Confim Delete')}}</h4>
                            </div>
                            <div class="modal-body text-danger text-center">
                                <p>{{__('label.Are you sure ?')}}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-danger col-md-6" >{{__('label.Yes')}}</button>
                                <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">{{__('label.No')}}</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <div class="col-md-12 well">
                <div class="col-md-2">
                    <h3 class="col-md-12 text-center">{{__('label.Song')}}
                        <span class="glyphicon glyphicon-arrow-right pull-right"></span>
                    </h3>
                    @if($artist->songs->all()==[])
                    @else
                    <a href="{{route('artist.songs.play',['artist_id'=>$artist->id])}}" class="btn btn-default col-md-12 text-center" role="button">Play All
                        <span class="glyphicon glyphicon-play-circle"></span>
                    </a>
                    @endif
                </div>
                <div class=" col-md-10 well">
                    @if($artist->songs->all()==[])
                        <div class="text-center text-danger">No Songs</div>
                    @else
                        @foreach($songs as $song)
                            <div class="col-md-10">{{$song->name}}</div>
                            <a hefr="" class="text-right col-md-1">
                                <span class="glyphicon glyphicon-edit text-info"></span>
                            </a>
                            <a href="" class="text-right col-md-1 " data-toggle="modal" data-target="#confirmDelete-">
                                <span class="glyphicon glyphicon-remove text-danger" ></span>
                            </a>
                        @endforeach
                    @endif
                        <div class="col-md-12 text-center paginate_artist_songs">
                            {!! $songs->links() !!}
                        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
