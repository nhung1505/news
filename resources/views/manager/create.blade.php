@extends('layouts.app')
@section('content')
    <div class="container well">
        <form action="" method="post">
            {{csrf_field()}}
            <div class="form-group col-md-12">
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
            <div class="form-group col-md-12">
                <label class="control-label col-sm-2 text-left">Link<span style="color:red;"> *</span></label>
                <div class="col-sm-10">
                    <input  type='text' class="form-control" name = 'link'value="{{old('link')}}">
                    @if($errors->has('link'))
                        <div class="has-feedback text-danger">
                            {{$errors->first('link')}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group col-md-12">
                <label class="control-label col-sm-2 text-left">Oder<span style="color:red;"> *</span></label>
                <div class="col-sm-10">
                    <input type="number" name="oder" value="{{old('oder')}}">
                </div>
            </div>
            <div class="form-group col-md-12">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">{{__('label.Create')}}</button>
                    <a class="btn btn-default" href="{{route('menu')}}">{{__('label.Cancel')}}</a>
                </div>
            </div>
        </form>
        <h5 class="text-danger col-md-12 text-left">{{__('label.Note')}}: * {{__('label.not be empty')}}</h5>
@endsection
