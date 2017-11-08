@extends('layouts.app')
@section('title')
    Create Album
    @endsection
@section('content')
    <div class="container">
        <h2>Create Album</h2>
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                <label class="control-label col-sm-2 text-left">Name<span style="color:red;"> *</span></label>
                <div class="col-sm-10">
                    <input  type='text' class="form-control" name = 'name'>
                    @if($errors->has('name'))
                        <div class="has-feedback text-danger">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">Image<span style="color:white;"> *</span></label>
                <div class=" col-sm-8">
                    <input type="file" name="image">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">Description</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Create</button>
                    <a class="btn btn-default" href="{{route('album.list')}}">Cancel</a>
                </div>
            </div>
        </form>
        <h5 class="text-danger">Note: * not be empty </h5>
    </div>
@endsection
