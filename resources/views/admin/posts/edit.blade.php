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
                    <form action="{{route('post.update',['id'=>$post->id])}}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tiêu đề</label>
                            <input class="form-control" name="title" value="{{ $post->title }}"/>
                        </div>
                        @error('title')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <div class="form-group">
                            <label>Trạng Thái</label>
                            <select name="status" class="form-control">
                                @if($post->status===1)
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

                        <div class="form-group">
                            <label>Ảnh</label>
                            <input type="file"
                                   onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])"
                                   class="form-control-file"
                                   name="image"
                                   value="{{$post->image}}"
                            >
                            <img id="image" src=""
                                 style="height: 50px"/>
                        </div>
                        @error('image')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <div class="form-group">
                            <label>Mô Tả</label>
                            <textarea class="form-control" rows="3"
                                      name="description">{{ $post->description }}</textarea>
                        </div>
                        @error('description')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <div class="form-group">
                            <label>Nội Dung</label>
                            <textarea class="form-control" rows="3"
                                      name="content" id="editor">{{ $post->content }}</textarea>
                        </div>
                        @error('content')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror

                        <div class="form-group">
                            <label>TAG</label>
                            <input class="form-control" name="tag" data-role="tagsinput"
                                   value="@foreach($post->tags as $tag)
                                   {{$tag->name}},
                                            @endforeach"/>
                        </div>
                        @error('tag')
                        <div class="alert alert-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                        @enderror


                        <button type="submit" class="btn btn-default"> Chỉnh Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
