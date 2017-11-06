@extends('layouts.app')

@section('title')
    Upload Song
@endsection

@section('content')
    <div class="container">

        @if(session('announcement'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>{{session('announcement')}}!</strong>
            </div>
        @endif

        <h2>Upload Song</h2>
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
                <label class="control-label col-sm-2"></span>Name<span style="color:red;"> *</label>
                <div class="col-sm-10">
                    <input  type='text' class="form-control" name = 'name' value="{{old('name')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Image<span style="color:white;"> *</span></label>
                <div class=" col-sm-8">
                    <input type="file" name="image" value="{{old('image')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2"> Audio<span style="color:red;"> *</span></label>
                <div class=" col-sm-8">
                    <input type="file" name="audio" value="{{old('audio')}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >Lyric <span style="color:white;"> *</span> </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="lyric" >{{old('lyric')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Description <span style="color:white;"> *</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <a class="btn btn-default" href="/home">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
