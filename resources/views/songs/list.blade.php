@extends('layouts.app')

@section('content')
    <div class="container">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            </thead>

            <tbody>
            @if(count($songs) == 0)
                <tr>
                    <td colspan="4" class="text-center">{{'No data'}}</td>
                </tr>
            @else
            @foreach($songs as $key=>$song)

                <form action="{{route('song.delete',$song->id)}}" method="post">
                    {{ csrf_field() }}
            <tr>
                <td>{{++$key}}</td>
                <td class="edit-width"><img class="img-rounded song-cover-img-large"  src="{{asset('storage/'.$song->image)}}"/></td>
                <td><a href="{{route('song.details_song', $song->id)}}">{{$song->name}}</a></td>
                <td>
                    <a href="{{route('song.edit', ['id' => $song->id])}}">
                        <button class="btn  btn-primary btn-sm">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                    </a>
                </td>
                <td>
                        <button data-toggle="modal" data-target="#myModal-{{$song->id}}" type="button" class="btn btn-danger btn-sm" >
                            <span class="glyphicon glyphicon-remove" ></span> Remove
                        </button>

                        <div class="modal fade" id="myModal-{{$song->id}}" role="dialog">
                            <div class="modal-dialog modal-sm">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Are you sure delete.</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-default" >Yes</button>
                                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </td>
            </tr>
            </form>
            @endforeach
                @endif
            </tbody>
        </table>
        <div class="location-next-previous-list-song">
            {!! $songs->render() !!}
        </div>
    </div>
    @endsection
