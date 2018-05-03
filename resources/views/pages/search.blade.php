@extends('layouts.index')
@section('content')
	<div class="container" style="margin-top: 80px">
        <div class="row">
 		@include('layouts.menu')
 		<?php 
			function color($str,$key){
 			return str_replace($key, "<span style='color:red;'>$key</span>",$str );
 		}

 		 ?>
				<div class="col-md-9 ">
                <div class="panel panel-primary">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>TÌm kiếm: {{$key}}</b></h4>
                    </div>
					@foreach($posts as $post)
	                    <div class="row-item row">
	                        <div class="col-md-3">

	                            <a href="posts/{{$post->id}}/{{$post->unsigned_title}}">
	                                <br>
	                                <img width="200px" height="200px" class="img-responsive" src="{{asset('storage/posts/'.$post->image)}}" alt="">
	                            </a>
	                        </div>

	                        <div class="col-md-9">
	                            <h3>{!! color($post->title,$key) !!}</h3>
	                            <p>{!! color($post->summary,$key) !!}</p>
	                            <a class="btn btn-primary" href="posts/{{$post->id}}/{{$post->unsigned_title}}">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
	                        </div>
	                        <div class="break"></div>
	                    </div>
					@endforeach

                    <!-- Pagination -->
                    <div style="text-align: center;">
                    	{{$posts->links()}}
                    </div>
						
                    <!-- /.row -->

                </div>
            </div> 

        </div>

    </div>
@endsection