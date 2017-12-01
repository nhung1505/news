@extends('layouts.user')

@section('title')
    Edit Song
@endsection
@section('app.css')
    <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css"
          integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('content')
    <div class="container mt-5 well">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">{{__('label.Name')}}<span style="color:red;"> *</span></label>
                <div class="col-sm-10">
                    <label class="sr-only">Name</label>
                    <input  type='text' class="form-control" name = 'name' value="{{$song->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">{{__('label.Image')}}<span style="color:white;"> *</span></label>
                <div class=" col-sm-8">
                    <div class="edit-width pb-3"><img class="img-rounded song-cover-img-large"  src="{{asset('storage/'.$song->image)}}"/></div>
                    <input type="file" name="image" value="{{old('image')}}">
                </div>
            </div>
            <div class="form-group {{ ($errors->has('artist')) ? 'has-error' : '' }}"">
                <label class="control-label col-sm-2 text-left">{{__('label.Artist')}}</label>
                <div class="col-sm-10">
                    @if(isset($song->artist->name))
                    <textarea class="form-control" rows="1" name="artist" >{{$song->artist->name}}</textarea>
                    @else
                        <textarea class="form-control" rows="1" name="artist" ></textarea>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left" >{{__('label.Lyric')}} <span style="color:white;"> *</span> </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="lyric" >{{$song->lyric}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">{{__('label.Description')}} <span style="color:white;"> *</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description">{{$song->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">{{__('label.Save')}}</button>
                    <a class="btn btn-default" href="{{redirect()->getUrlGenerator()->previous()}}">{{__('label.Cancel')}}</a>
                </div>
            </div>
        </form>
    </div>
@endsection
@section('myjs')
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('js/myJs.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
@endsection
