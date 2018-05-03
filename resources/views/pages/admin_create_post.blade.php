@extends('layouts.index')
@section('content')
    <!-- Page Content -->
    <div class="container" style="margin-top: 80px">
        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-9">

                <!-- Blog Post -->
                <form action="posts/create/{{$post->id}}/{{$post->unsigned_title}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}

                    {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                    <!-- Title -->
                    <h1><input required="" type="text" name="title" value="{{$post->title}}" style="width: 800px;"></h1>

                    <!-- Author -->
                    <p class="lead">
                        by <a href="#">Admin</a>
                    </p>

                    <!-- Preview Image -->
                    <img class="img-responsive" height="100px" width="100px" src="{{asset('storage/'.$post->image)}}" alt=""><br>
                    <input type="file" name="image" value="{{asset('storage/'.$post->image)}}">
                    <!-- Date/Time -->
                    <p><span class="glyphicon glyphicon-time"></span> Posted on {{$post->created_at}}</p>
                    <hr>

                    <!-- Post Content -->

                    <textarea name="description"   rows="5" style="width: 800px; height: 300px;">{!!$post->description!!}</textarea>


                    <hr>
                    {{--<input  type="submit" name="" value="Sửa">--}}
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
                <!-- Blog Comments -->

                <!-- Comments Form -->
                @if(Auth::user())
                    <div class="well">
                        <h4>Viết bình luận ...<span class="glyphicon glyphicon-pencil"></span></h4>
                        <form action="comments/{{$post->id}}" role="form" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <textarea class="form-control" name="description" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Comment</button>
                        </form>
                    </div>
                @endif
                <hr>

                <!-- Posted Comments -->

                <div class="panel-body">
                    <ul class="media-list">
                        @foreach($post->comments as $comment)
                            <li class="media">
                                <div class="media-left">
                                    <img src="http://placehold.it/60x60" class="img-circle">
                                </div>
                                <div class="media-body">
                                    <h4 class="media-heading">
                                        <small>
                                            <a href="users/{{$comment->user->id}}">
                                                {{$comment->user->name}}
                                            </a>
                                            <br/>
                                            commented on {{$comment->created_at}}
                                        </small>
                                    </h4>
                                    {{$comment->description}}
                                </div>

                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-3">

                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Tin liên quan</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($related_news as $related_new)
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="posts/{{$related_new->id}}/{{$related_new->unsigned_title}}">
                                        <img class="img-responsive" src="{{asset('storage/posts/'.$related_new->image)}}" >

                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="posts/{{$related_new->id}}/{{$related_new->unsigned_title}}"><b>{{$related_new->title}}</b></a>
                                </div>
                                <p style="padding-left: 2px;">{{$related_new->summary}}</p>
                                <div class="break"></div>
                            </div>
                    @endforeach
                    <!-- end item -->

                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading"><b>Tin nổi bật</b></div>
                    <div class="panel-body">

                        <!-- item -->
                        @foreach($hots as $hot)
                            <div class="row" style="margin-top: 10px;">
                                <div class="col-md-5">
                                    <a href="posts/{{$hot->id}}/{{$hot->unsigned_title}}">
                                        <img class="img-responsive" src="{{asset('storage/posts/'.$hot->image)}}" >

                                    </a>
                                </div>
                                <div class="col-md-7">
                                    <a href="posts/{{$hot->id}}/{{$hot->unsigned_title}}"><b>{{$hot->title}}</b></a>
                                </div>
                                <p style="padding-left: 2px;">{{$hot->summary}}</p>
                                <div class="break"></div>
                            </div>
                    @endforeach
                    <!-- end item -->
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection