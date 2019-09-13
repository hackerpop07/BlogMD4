@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header" style="text-align: center">Album Ảnh
                    </h1>

                </div>
                <div class="entry__media col-full">
                    <div class="entry__post-thumb">
                        @forelse($images as $image)
                            <img src="{{"storage/image/".$image->path}}"
                                 class="img-thumbnail" alt="Cinque Terre"
                                 alt="" style="width: 352px">
                        @empty
                            Không Có Ảnh
                        @endforelse
                    </div>
                </div>
                <br>


                <div class="social-buttons" style="font-size: 30px">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}"
                       target="_blank">
                        <i class="fab fa-facebook-square"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}"
                       target="_blank">
                        <i class="fa fa-twitter-square"></i>
                    </a>
                    <a href="https://plus.google.com/share?url={{ urlencode(request()->fullUrl()) }}"
                       target="_blank">
                        <i class="fa fa-google-plus-square"></i>
                    </a>
                    {{--                    <a href="{{route('page.pdf',$images->id)}}">--}}
                    {{--                        <i class="fas fa-print"></i>--}}
                    {{--                    </a>--}}
                    {{--                    <a href="{{route('get.shareLink',$images->id)}}">--}}
                    {{--                        <i class="fas fa-share-alt-square"></i>--}}
                    {{--                    </a>--}}
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection
