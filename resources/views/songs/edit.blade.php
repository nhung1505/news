@extends('layouts.app')

@section('title')
    Edit Song
@endsection

@section('content')
    <div class="container well">
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
                <label class="control-label col-sm-2 text-left">{{__('label.Artist')}}<span style="color:red;"> *</span></label>
                <div class="col-sm-8">
                    <select name="artist_id" class="col-md-4">
                        <option>{{__('label.Choose Artist')}}</option>
                        @foreach($artists as $artist)
                            <option @if($song->artist_id == $artist->id) selected @endif value="{{$artist->id}}">{{$artist->name}}</option>
                        @endforeach
                    </select>
                    @if($errors->has('artist'))
                        <div class="has-feedback text-danger">
                            {{$errors->first('artist')}}
                        </div>
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