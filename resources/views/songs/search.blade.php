@extends('layouts.app')

@section('title')
    Kết quả tìm kiếm của từ {{$key}}
    @endsection

@section('content')
    <div class="container">

        <h4>Tìm thấy {{count($songs)}} cuốn sách theo từ khóa: {{$key}}</h4>

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
                        <td class="edit-width"><img class="img-rounded song-cover-img-large"  src="{{asset('storage/'.$song->image)}}"/></td>
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
                                <button data-toggle="modal" data-target="#myModal-{{$song->id}}" type="button" class="btn btn-danger btn-sm" >
                                    <span class="glyphicon glyphicon-remove" ></span> Remove
                                </button>

                                <div class="modal fade" id="myModal-{{$song->id}}" role="dialog">
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