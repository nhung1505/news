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
        <h2 class="col-md-12">Create User</h2>
        <form class="form-horizontal" action="" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label class="control-label col-sm-2 text-left" >Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left" for="email">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">Password</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" name="password">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2 text-left">Role</label>
                <select class="col-sm-2 ml-3" name="role">
                    <option class="form-control" value="{{null}}">Choose Role
                    @foreach($roles as $role)
                    <option  class="form-control" value="{{$role->roles}}">{{$role->roles}}
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="{{route('menu')}}" class="btn btn-default">Cancel</a>
                </div>
            </div>
        </form>
    </div>
@endsection