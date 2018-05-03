        
        @extends('admin.layout.index')
        @section('content')
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>{{$post->title}}</small>
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
                            <form action="{{route('posts.update', [$post->id])}}" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="put">

                                <div class="form-group">
                                <label>Thể loại</label>
                                <select class="form-control" name="id_category" id="id_category">
                                    @foreach($categories as $category)
                                        <option 
                                            @if($post->type->category->id == $category->id)
                                                {{'selected'}} 
                                            @endif 
                                            value="{{$category->id}}">{{$category->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Loại tin</label>
                                <select class="form-control" name="id_type" id="id_type">
                                    @foreach($types as $type)
                                        <option 
                                            @if($post->type->id == $type->id)
                                                {{'selected'}} 
                                            @endif
                                            value="{{$type->id}}">{{$type->name}}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tiêu đề</label>
                                <input class="form-control" name="title" placeholder="Nhập tiêu đề" value="{{$post->title}}" />
                            </div>
                            <div class="form-group">
                                <label>Tóm tắt</label>
                                <textarea name="summary" id="demo" class="form-control ckeditor" rows="3">{{$post->summary}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea name="description" id="demo" class="form-control ckeditor" rows="5">{{$post->description}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <p>
                                    <img width="400px" src="{{asset('storage/'.$post->image)}}">
                                </p>
                                <input type="file" name="image" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nổi bật</label>
                                <label class="radio-inline">
                                    <input name="hot" value="0" @if($post->hot==0)
                                                                    {{'checked'}}
                                                                    @endif
                                             type="radio">Không
                                </label>
                                <label class="radio-inline">
                                    <input name="hot" value="1" @if($post->hot==1)
                                                                    {{'checked'}}
                                                                    @endif
                                             type="radio">Có
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">Post Edit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        </form>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Bình luận</small>
                        </h1>
                    </div>
                    <!-- /.col-lg-12 -->
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($post->comments as $comment)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$comment->id}}</td>
                                    <td>
                                        {{$comment->user->name}}
                                    </td>
                                    <td>{{$comment->description}}</td>
                                    <td>{{$comment->created_at}}</td>
                                    <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/comments/delete/{{$comment->id}}/{{$post->id}}"> Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
                    $("#id_category").change(function(){
                        var id_category = $(this).val();
                        //alert(idTheLoai);
                        $.get("admin/ajax/types/"+id_category,function(data){
                            $("#id_type").html(data);
                        });
                    });
                });
            </script>
        @endsection