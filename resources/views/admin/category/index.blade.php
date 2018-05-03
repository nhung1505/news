            @extends('admin.layout.index')
        @section('content')
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Thể loại
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
                                <th>Tên không dấu</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)

                            <tr class="odd gradeX" align="center">
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->unsigned_name}}</td>
                                <td>
                                   <a data-toggle="modal" data-target="#confirmDelete-{{$category->id}}"><i class="fa fa-trash fa-fw"></i> Delete</a>
                                </td>
                                <form action="{{route('categories.update',[$category->id])}}" method="post">
                                    {{ csrf_field() }}
                                    <div class="modal fade" id="confirmDelete-{{$category->id}}" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title text-danger text-center">{{__('Confim Delete')}}</h4>
                                                </div>
                                                <div class="modal-body text-danger text-center">
                                                    <p>{{__('Are you sure you wish to delete this Categoty?')}}</p>
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
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('categories.edit', [$category->id])}}">Edit</a></td>
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