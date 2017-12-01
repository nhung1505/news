@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container well">
        <h2 class="col-md-12">Role User</h2>
        <form class="form-horizontal" action="" method="post">
            {{ csrf_field() }}
            <div class="col-md-12">
                <label class=" col-md-2">Name</label>
                <p class="col-md-2 text-left">{{$user->name}}</p>
            </div>
            <div class="col-md-12">
                <label class=" col-md-2">Email</label>
                <p class="col-md-2 text-left">{{$user->email}}</p>
            </div>
            <div class="col-md-12">
                <label class="col-md-2">Role</label>
                <select class="col-md-2" name="role">
                    <option class="form-control" value="{{null}}">Choose Role
                    @foreach($roles as $role)
                        <option  class="form-control" value="{{$role->roles}}">{{$role->roles}}
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success mt-5">Save</button>
                    <a href="{{route('menu')}}" class="btn btn-default mt-5 ml-3">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection
