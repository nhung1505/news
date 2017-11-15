@extends('layouts.app')
@section('title')
    {{__('label.Create Album')}}
    @endsection
@section('content')
    <div class="container well">
        <h2>{{__('label.Create Album')}}</h2>
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                <label class="control-label col-sm-2 text-left">{{__('label.Name')}}<span style="color:red;"> *</span></label>
                <div class="col-sm-10">
                    <input  type='text' class="form-control" name = 'name'value="{{old('name')}}">
                    @if($errors->has('name'))
                        <div class="has-feedback text-danger">
                            {{$errors->first('name')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group {{ ($errors->has('image')) ? 'has-error' : '' }}">
                <label class="control-label col-sm-2 text-left">{{__('label.Image')}}<span style="color:white;"> *</span></label>
                <div class=" col-sm-8">
                    <input type="file" name="image" value="{{old('image')}}">
                    @if($errors->has('image'))
                        <div class="has-feedback text-danger">
                            {{$errors->first('image')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">{{__('label.Description')}}</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">{{__('label.Create')}}</button>
                    @if(isset($song))
                        <a class="btn btn-default" href="{{route('song.details_song',['id'=>$song->id])}}">Cancel</a>
                    @else
                    <a class="btn btn-default" href="{{route('album.list')}}">{{__('label.Cancel')}}</a>
                    @endif
                </div>
            </div>
        </form>
        <h5 class="text-danger">{{__('label.Note')}}: * {{__('label.not be empty')}}</h5>
    </div>
@endsection
