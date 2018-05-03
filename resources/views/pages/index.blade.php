    @extends('layouts.index')

    @section('content')
    <div class="container">

    	<!-- slider -->
		@include('layouts.slide')
        <!-- end slide -->

		<div class="container" >


        <div class="row main-left">
			@include('layouts.menu')
            <div class="col-md-9">
	            <div class="panel panel-primary">
	            	<div class="panel-heading " style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Tin Tức</h2>
	            	</div>

	            	<div class="panel-body">
	            		@foreach($categories as $category)
							@if(count($category->types) > 0)
		            			<!-- item -->
							    <div class="row-item row">
				                	<h3>
				                		<a href="category">{{$category->name}}</a> |
				                		@foreach($category->types as $type)
				                			<small><a href="types/{{$type->id}}/{{$type->unsigned_name}}"><i>{{$type->name}}</i></a>/</small>
				                		@endforeach
				                	</h3>
				                	<?php 

				                		$data =$category->posts->where('hot',1)->sortByDesc('created_at')->take(5);
				                		$new = $data->shift();

				                	?>
				                	<div class="col-md-8 border-right">
				                		<div class="col-md-5">
					                        <a href="posts/{{$new->id}}/{{$new->unsigned_title}}">
												<img class="img-responsive" src="{{asset('storage/'.$new->image)}}" >

											</a>
					                    </div>

					                    <div class="col-md-7">
					                        <h3>{{$new->title}}</h3>
					                        <p>{{$new->summary}}</p>
					                        @if(Auth::user())
					                        	@if(Auth::user()->role==0)
					                        <a class="btn btn-primary" href="posts/{{$new->id}}/{{$new->unsigned_title}}">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
					                        @else
					                         <a class="btn btn-primary" href="posts/create/{{$new->id}}/{{$new->unsigned_title}}">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
					                         @endif
					                         @else
												<a class="btn btn-primary" href="posts/{{$new->id}}/{{$new->unsigned_title}}">Xem thêm<span class="glyphicon glyphicon-chevron-right"></span></a>
					                          @endif
										</div>

				                	</div>
				                    
									
									<div class="col-md-4">
										@foreach($data->all() as $post)
											<a href="posts/{{$post->id}}/{{$post->unsigned_title}}">
												<h4>
													<span class="glyphicon glyphicon-list-alt"></span>
													{{$post->title}}
												</h4>
											</a>
										@endforeach
									</div>
									
									<div class="break"></div>
				                </div>
				                <!-- end item -->
				            @endif
		                @endforeach
					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
	</div>
    @endsection