@extends('layouts.app')

@section('title')
    {{__('label.Search results for')}} {{$key}}
    @endsection

@section('content')
    <div class="container">

        <h4>{{__('label.Found')}} {{count($songs)}} {{__('label.keyword results')}}: {{$key}}</h4>

        <table class="table well">
            <tbody>
            @if(count($songs) == 0)
                <tr>
                    <td colspan="4" class="text-center">{{__('label.No Data')}}</td>
                </tr>
            @else
                @foreach($songs as $key=>$song)
                    <tr>
                        <td>{{++$key}}</td>
                        <td class="edit-width col-md-3 well">
                            <div class="img-rounded song-cover-img" >
                                <a href="{{route('song.details_song', $song->id)}}">
                                    <img src="{{asset('storage/'.$song->image)}}"/>
                                </a>
                            </div>
                        </td>
                        <td class="col-md-7 text-center"><a href="{{route('song.details_song', $song->id)}}">{{$song->name}}</a></td>
                        <td class="col-md-1">
                            <a href="{{route('song.showEdit_song', ['id' => $song->id])}}">
                                <span class="glyphicon glyphicon-edit text-info"></span>
                            </a>
                        </td>
                        <td class="col-md-1">
                            <a data-toggle="modal" data-target="#confirmDelete-{{$song->id}}" >
                                <span class="glyphicon glyphicon-remove text-danger" ></span>
                                <a/>
                        </td>
                    </tr>
                    <form action="{{route('song.delete',$song->id)}}" method="post">
                        {{ csrf_field() }}
                        <div class="modal fade" id="confirmDelete-{{$song->id}}" role="dialog">
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
                @endforeach
            @endif
            </tbody>
        </table>
        <div class="col-md-12 text-center">
            {!! $songs->render() !!}
        </div>
    </div>
    @endsection