@extends('admin.layout.index')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header" style="text-align: center">{{$post->title}}
                        <small>{{$post->description}}</small>
                    </h1>

                </div>
                <div class="entry__media col-full">
                    <div class="entry__post-thumb">
                        <img src="{{"storage/image/".$post->image}}"
                             srcset="{{"storage/image/".$post->image}} 2000w,
                                 {{"storage/image/".$post->image}} 1000w,
                                 {{"storage/image/".$post->image}} 500w"
                             sizes="(max-width: 2000px) 100vw, 2000px" class="img-thumbnail" alt="Cinque Terre" alt="">
                    </div>
                </div>
                <br>
                <div class="col-full entry__main">
                    {!! $post->content !!}
                </div>

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
                    <a href="{{route('page.pdf',$post->id)}}">
                        <i class="fas fa-print"></i>
                    </a>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>

@endsection
