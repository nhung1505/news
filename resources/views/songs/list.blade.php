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
            @foreach($songs as $key=>$song)
            <tbody>
            <tr>
                <td>{{++$key}}</td>
                <td class="edit-width"><img class="img-rounded song-cover-img-large"  src="{{asset('storage/'.$song->image)}}"/></td>
                <td><a href="{{route('song.details_song', $song->id)}}">{{$song->name}}</a></td>
                <td>
                    <a href="">
                        <button type="button" class="btn  btn-primary btn-sm">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                    </a>
                </td>
                <td>
                    <a href="">
                        <button type="button" class="btn btn-danger btn-sm" onclick="return myFunction()">
                            <span class="glyphicon glyphicon-remove" ></span> Remove
                        </button>
                    </a>
                </td>
            </tr>

            </tbody>
                @endforeach
        </table>
        <div class="location-next-previous-list-song">
            <a href="#" class="previous round">&#8249;</a>
            <a href="#" class="next round">&#8250;</a>
        </div>
    </div>
    @endsection
