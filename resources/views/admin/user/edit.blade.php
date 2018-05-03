        
        @extends('admin.layout.index')
        @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>{{$user->name}}</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                        @if(session('error'))
                            <div class="alert alert-danger">
                                {{session('error')}}
                            </div>
                        @endif
                            <form action="{{route('users.update', [$user->id])}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">
                            <div class="form-group">
                                <label>Họ tên</label>
                                <input class="form-control" name="name" placeholder="nhập tên" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="nhập email" value="{{$user->email}}" readonly="" />
                            </div>
                            <div class="form-group">
                                <input type="checkbox" id="change_password" name="change_password" >
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="form-control password" name="password" placeholder="Nhập mật khẩu"  />
                            </div>
                             <div class="form-group">

                                <label>Nhập lại Password</label>
                                <input type="password" class="form-control password" name="password_again" placeholder="Nhập lại mật khẩu"  />
                            </div>
                            <div class="form-group">
                                <label>Quyền người dùng</label>
                                <label class="radio-inline">
                                    <input name="role" value="1" checked="" type="radio"
                                        @if($user->role==1)
                                            {{'checked'}}
                                        @endif
                                    >Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="role" value="0" type="radio"
                                        @if($user->role==0)
                                            {{'checked'}}
                                        @endif
                                    >Thường
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->
        @endsection
        @section('script')
            <script type="text/javascript">
                $(document).ready(function(){
                    $("#changePassword").change(function(){
                        if($(this).is(":checked")){
                            $(".password").removeAttr('disabled');
                        }else{
                            $(".password").attr('disabled','');
                        }
                    });
                });
            </script>
        @endsection