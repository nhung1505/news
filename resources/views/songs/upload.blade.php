@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Upload Song</h2>
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group">
                <label class="control-label col-sm-2">Name </label>
                <div class="col-sm-10">
                    <input  type='text' class="form-control" name = 'name'>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Select Image </label>
                <div class=" col-sm-8">
                    <input type="file" name="image">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Select Audio </label>
                <div class=" col-sm-8">
                    <input type="file" name="audio">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" >lyric </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="lyric"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2">Description </label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description"></textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Upload</button>
                    <a class="btn btn-default" href="">Cancel</a>
                </div>
        </form>
@endsection
