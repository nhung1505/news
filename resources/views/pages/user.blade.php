@extends('layouts.index')
@section('content')

    <!-- Page Content -->
	<div class="container" style="margin-top: 80px">

    	<!-- slider -->
    	<div class="row carousel-holder">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
				  	<div class="panel-heading">Thông tin tài khoản</div>
				  	<div class="panel-body">
				  		@if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{$err}}<br>
                                @endforeach
                            </div>
                        @endif
                        @if(session('thongbao'))
                            <div class="alert alert-success">
                                {{session('thongbao')}}
                            </div>
                        @endif
                        @if(session('loi'))
                            <div class="alert alert-danger">
                                {{session('loi')}}
                            </div>
                        @endif
				    	<form action="user" method="post">
				    		<input type="hidden" name="_token" value="{{csrf_token()}}">
				    		<div>
				    			<label>Họ tên</label>
							  	<input value="{{Auth::user()->name}}" type="text" class="form-control" placeholder="Username" name="name" aria-describedby="basic-addon1">
							</div>
							<br>
							<div>
				    			<label>Email</label>
							  	<input value="{{Auth::user()->email}}" readonly="" type="email" class="form-control" placeholder="Email" name="email" aria-describedby="basic-addon1"
							  	disabled
							  	>
							</div>
							<br>	
							<div>
								<input type="checkbox" class="" name="check_password" id="changePassword">
				    			<label>Đổi mật khẩu</label>
							  	<input  type="password" class="form-control password" name="password" aria-describedby="basic-add_on" >
							</div>
							<br>
							<div>
				    			<label>Nhập lại mật khẩu</label>
							  	<input type="password" class="form-control password" name="password_again" aria-describedby="basic-add_on" >
							</div>
							<br>
							<button type="submit" class="btn btn-primary">Sửa
							</button>

				    	</form>
				  	</div>
				</div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
        <!-- end slide -->
    </div>
    <!-- end Page Content -->

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