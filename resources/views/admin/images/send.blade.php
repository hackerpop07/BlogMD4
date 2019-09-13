@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Send
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{route('send.gmail',$id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if(session('error'))
                            <div class="alert alert-danger">
                                <strong>{{session('error')}}</strong>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success">
                                <strong>{{session('success')}}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Tên Người Gửi</label>
                            <input class="form-control" type="text" name="name_user" value="{{ old('name_user') }}"/>
                        </div>
                        @error('name_user')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <div class="form-group">
                            <label>Email Tài Khoản Cần Gửi</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email') }}"/>
                        </div>
                        @error('email')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror
                        <input type="hidden" value="{{$id}}" name="post_id">

                        <button type="submit" class="btn btn-default">Gửi</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
