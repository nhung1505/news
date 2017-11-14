@extends('layouts.app')

@section('title')
   {{__('label.Upload Song')}}
@endsection

@section('content')
    <div class="container well">
        @if(session('announcement'))
            <div class="alert alert-success alert-dismissable">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&time</a>
                <strong>{{session('announcement')}}!</strong>
            </div>
        @endif
        <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
            {{csrf_field()}}
            @if(isset($album))
                <input type="hidden" name="album_id" value="{{$album->id}}">
            @endif
            <div class="form-group {{ ($errors->has('name')) ? 'has-error' : '' }}">
                <label class="control-label col-sm-2 text-left">{{__('label.Name')}}<span style="color:red;"> *</span></label>
                <div class="col-sm-10">
                    <input  type='text' class="form-control" name = 'name' value="{{old('name')}}">
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
            <div class="form-group {{ ($errors->has('audio')) ? 'has-error' : '' }}">
                <label class="control-label col-sm-2 text-left"> {{__('label.Audio')}}<span style="color:red;">*</span></label>
                <div class=" col-sm-8">
                    <input type="file" name="audio" value="{{old('audio')}}">
                    @if($errors->has('audio'))
                        <div class="has-feedback text-danger">
                            {{$errors->first('audio')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left" >{{__('label.Lyric')}}</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="lyric" >{{old('lyric')}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">{{__('label.Description')}}</label>
                <div class="col-sm-10">
                    <textarea class="form-control" rows="3" name="description">{{old('description')}}</textarea>
                </div>
            </div>
            @if(!isset($album))
            <div class="form-group">
                <label class="sr-only">Check Upload</label>
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="checkbox" value="1" name="check" > {{__('label.Do you want to upload more song')}}?
                </div>
            </div>
            @else
            @endif
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">{{__('label.Upload')}}</button>
                    @if(isset($album))
                        <a class="btn btn-default" href="{{route('album.detail_album',['id'=>$album->id])}}">{{__('label.Cancel')}}</a>
                    @else
                    <a class="btn btn-default" href="{{route('song.list')}}">{{__('label.Cancel')}}</a>
                    @endif
                </div>
            </div>
        </form>
        <h5 class="text-danger">{{__('label.Note')}}: * {{__('label.not be empty')}} </h5>
    </div>
@endsection
