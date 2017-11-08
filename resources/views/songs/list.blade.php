@extends('layouts.app')

@section('title')
    List Song Upload
@endsection

@section('content')
    <div class="container">

        @if(session('announcement'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('announcement')}}!</strong>
            </div>
        @endif

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

                <tr>
                    <td>{{++$key}}</td>
                    <td class="edit-width"><a href="{{route('song.details_song', $song->id)}}"><img class="img-rounded song-cover-img-large"  src="{{asset('storage/'.$song->image)}}"/></a></td>
                    <td><a href="{{route('song.details_song', $song->id)}}">{{$song->name}}</a></td>
                    <td>
                        <a href="{{route('song.showEdit_song', ['id' => $song->id])}}">
                            <button class="btn  btn-primary btn-sm">
                                <span class="glyphicon glyphicon-edit"></span> Edit
                            </button>
                        </a>
                    </td>
                    <td>
                        <form action="{{route('song.delete',$song->id)}}" method="post">
                            {{ csrf_field() }}
                            <button data-toggle="modal" data-target="#confirmDelete-{{$song->id}}" type="button" class="btn btn-danger btn-sm" >
                                <span class="glyphicon glyphicon-remove" ></span> Remove
                            </button>
                            <div class="modal fade" id="confirmDelete-{{$song->id}}" role="dialog">
                                <div class="modal-dialog modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title text-danger text-center">Confim Delete</h4>
                                        </div>
                                        <div class="modal-body text-danger text-center">
                                            <p>Are you sure ?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger col-md-6" >Yes</button>
                                            <button type="button" class="btn btn-default col-md-6" data-dismiss="modal">No</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
            @endforeach
            @endif
            </tbody>
        </table>
        <div class="location-next-previous-list-song">
            {!! $songs->render() !!}
        </div>
    </div>
    @endsection
