@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Post
                        <small>Add</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('images.update',['id'=>$image->id])}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <select name="status" class="form-control">
                                @if($image->status == 1)
                                    <option value="1">Công Khai</option>
                                    <option value="0">Riêng Tư</option>
                                @else
                                    <option value="0">Riêng Tư</option>
                                    <option value="1">Công Khai</option>
                                @endif
                            </select>
                        </div>
                        @error('status')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror


                        <button type="submit" class="btn btn-default"> Chỉnh Sửa </button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
