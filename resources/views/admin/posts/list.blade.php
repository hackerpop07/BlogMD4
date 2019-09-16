@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>List</small>
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
                        <th>Tên</th>
                        <th>Mô Tả</th>
                        <th>Nội Dung</th>
                        <th>Ảnh</th>
                        <th>Tag</th>
                        <th>Trạng Thái</th>
                        <th>Xóa</th>
                        <th>Chỉnh Sửa</th>
                    </tr>
                    </thead>
                    @forelse($posts as $key => $value)
                        <tbody>
                        <tr class="odd gradeX" align="center">
                            <td>{{++$key}}</td>
                            <td><a href="{{route('post.show',['id'=>$value->id])}}">{{$value->title}}</a></td>
                            <td>{{ str_limit($value->description,20) }}</td>
                            <td>{!! str_limit($value->content,20) !!}</td>
                            <td><img src="storage/image/{{$value->image}}" style="height: 50px"></td>
                            <td>@foreach ($value->tags as $singleTag)
                                    <span class="label label-info label-many">{{ $singleTag->name }}</span>
                                @endforeach</td>
                            @if($value->status==1)
                                <td>Công Khai</td>
                            @else
                                <td>Riêng Tư</td>
                            @endif
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i>
                                <a href="{{route('post.destroy',$value->id)}}"
                                   onclick="return confirm('Bạn có muốn xóa danh mục này không?')">
                                    Delete</a>
                            </td>
                            <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                    href="{{route('post.edit',$value->id)}}">Edit</a></td>
                        </tr>
                        </tbody>
                    @empty
                        Không có giá trị nào !!!
                    @endforelse
                </table>
            </div>
            <div class="row">{{$posts->links()}}</div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
