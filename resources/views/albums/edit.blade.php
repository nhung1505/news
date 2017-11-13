@extends('layouts.app')

@section('title')
    Edit Song
@endsection

@section('content')
    <div class="container well">
        <h2>Edit Album</h2>
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
                <label class="control-label col-sm-2">Name<span style="color:red;"> *</span></label>
                <div class="col-sm-10">
                    <label class="sr-only">Name</label>
                    <input  type='text' class="form-control" name = 'name' value="{{$album->name}}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Image<span style="color:white;"> *</span></label>
                <div class=" col-sm-8">
                    <div class="edit-width pb-3"><img class="img-rounded song-cover-img-large"  src="{{asset('storage/'.$album->image)}}"/></div>
                    <input type="file" name="image" value="{{old('image')}}">
                </div>
            </div>

            <div class="form-group">
                <label class="control-label col-sm-2">Description <span style="color:white;"> *</span></label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description">{{$album->description}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a class="btn btn-default" href="{{redirect()->getUrlGenerator()->previous()}}">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
