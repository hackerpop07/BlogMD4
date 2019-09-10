@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Users
                        <small>List</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <form action="{{route('admin.user.search')}}" method="POST">
                    @csrf
                    <li class="sidebar-search col-md-3" style="list-style: none; float: right; margin-bottom: 10px;">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="keyword" placeholder="Search...">
                            <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                        </div>
                    </li>
                </form>
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    @foreach($user as $key => $value)
                        <tbody>
                        <tr class="odd gradeX" align="center">
                            <td>{{++$key}}</td>
                            <td>{{$value->name}}</td>
                            <td>{{$value->email}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                @if($value->id !=4)
                                    <a href="{{route('admin.user.destroy',$value->id)}}"
                                       onclick="return confirm('Bạn sẽ xóa userLogin này!')">
                                        Delete</a>
                                @else
                                    <a></a>
                                @endif
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="{{route('admin.user.edit',$value->id)}}">Edit</a></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="row">{{$user->links()}}</div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
