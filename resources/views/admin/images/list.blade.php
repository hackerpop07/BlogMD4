@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Album Ảnh
                        <small>List</small>
                    </h1>
                </div>
                @if (session('success'))
                    <label class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </label>
            @endif
            <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                    <tr align="center">
                        <th>STT</th>
                        <th>Ảnh</th>
                        <th>Trạng Thái</th>
                        <th>Xóa</th>
                        <th>Chỉnh Sửa</th>
                    </tr>
                    </thead>
                    @forelse($images as $key => $value)
                        <tbody>
                        <tr class="odd gradeX" align="center">
                            <td>{{++$key}}</td>
                            <td><img src="storage/image/{{$value->path}}" style="height: 50px"></td>
                            @if($value->status==1)
                                <td>Công Khai</td>
                            @else
                                <td>Riêng Tư</td>
                            @endif
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="{{route('images.destroy',$value->id)}}"
                                   onclick="return confirm('Bạn có muốn xóa danh mục này không?')">
                                    Delete</a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="{{route('images.edit',$value->id)}}">Edit</a></td>
                        </tr>
                        </tbody>
                    @empty
                        Không có giá trị nào !!!
                    @endforelse
                </table>
            </div>
            <div class="row">{{$images->links()}}</div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
