        @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Slide
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
                                <th>Tên</th>
                                <th>Nội dung</th>
                                <th>Hình</th>
                                <th>link</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($slides as $slide)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$slide->id}}</td>
                                    <td>{{$slide->name}}</td>
                                    <td>{{$slide->description}}</td>
                                    <td>
                                        <img width="300px" src="{{asset('storage/'.$slide->image)}}">
                                    </td>
                                    <td>{{$slide->link}}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#confirmDelete-{{$slide->id}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                    </td>
                                    <form action="{{route('slides.update',[$slide->id])}}" method="post">
                                        {{ csrf_field() }}
                                        <div class="modal fade" id="confirmDelete-{{$slide->id}}" role="dialog">
                                            <div class="modal-dialog modal-sm">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title text-danger text-center">{{__('Confim Delete')}}</h4>
                                                    </div>
                                                    <div class="modal-body text-danger text-center">
                                                        <p>{{__('Are you sure you wish to delete this Slides?')}}</p>
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
                                    <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('slides.edit', [$slide->id])}}">Edit</a></td>
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