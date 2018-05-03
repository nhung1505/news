        @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Tin tức
                            <small>Danh sách</small>
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
                                <th>Tiêu đề</th>
                                <th>Tóm tắt</th>
                                <th>Thể loại</th>
                                <th>Loại tin</th>
                                <th>Số lượt xem</th>
                                <th>Nổi bật</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$post->id}}</td>
                                    <td>
                                        <p>{{$post->title}}</p>
                                        <img width="100px" src="{{asset('storage/'.$post->image)}}" >
                                    </td>
                                    <td>{{$post->summary}}</td>
                                    <td>{{$post->type->category->name}}</td>
                                    <td>{{$post->type->name}}</td>
                                    <td>{{$post->view_count}}</td>
                                    <td>
                                        @if($post->hot == 0)
                                            {{"Không"}}
                                        @else
                                            {{"Có"}}
                                        @endif
                                    </td>
                                    <td>
                                        <a data-toggle="modal" data-target="#confirmDelete-{{$post->id}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                    </td>
                                    <form action="{{route('posts.update',[$post->id])}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal fade" id="confirmDelete-{{$post->id}}" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger text-center">{{__('Confim Delete')}}</h4>
                                                    </div>
                                                    <div class="modal-body text-danger text-center">
                                                        <p>{{__('Are you sure you wish to delete this Post?')}}</p>
                                                    </div>
                                                    <input type="hidden" name="_method" value="delete">
                                                    <div class="modal-footer ">
                                                        <button type="submit"  class="btn btn-danger col-md-5 col-lg-5 col-sm-5 pull-left " >{{__('Yes')}}</button>
                                                        <button type="button"  class="btn btn-default col-md-5 col-lg-5 col-sm-5 pull-right" data-dismiss="modal">{{__('No')}}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('posts.edit', [$post->id])}}">Edit</a></td>
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