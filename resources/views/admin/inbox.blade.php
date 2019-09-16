@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Hộp Thư
                    </h1>
                </div>
                @if (session('success'))
                    <label class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </label>
            @endif
            <!-- /.col-lg-12 -->
                <form action="{{route('post.search')}}" method="POST">
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
                        <th>Đường Dẫn Bài Viết</th>
                        <th>Người Gửi</th>
                        <th>Xóa</th>
                    </tr>
                    </thead>
                    @forelse($arrayInboxs as $key => $value)

                        <tbody>
                        <tr class="odd gradeX" align="center">
                            <td>{{++$key}}</td>
                            <td><a href="{{$value[3]}}">{{$value[3]}}</a>
                            </td>
                            <td>{{$value[1]->name}} <br> {{$value[1]->email}}</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="{{route('inbox.delete',$value[2])}}"
                                   onclick="return confirm('Bạn có muốn xóa danh mục này không?')">
                                    Delete</a>
                            </td>
                        </tr>
                        </tbody>
                    @empty
                        Không có giá trị nào !!!
                    @endforelse
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
