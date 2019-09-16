@extends('guest.layouts.master')
@section('content')


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">
            @forelse($user->images as $image)
                @if($image->status == 1)
                    <div class="entry__media col-full">
                        <div class="entry__post-thumb">
                            <img src="{{'/storage/image/'.$image->path}}"
                                 style="width: 2000px"
                                 alt="">
                        </div>
                    </div>
                @endif
            @empty
                Không có ảnh !!!
            @endforelse
            <div class="col-full entry__main">
                <div class="social-buttons" style="font-size: 30px">
                    @include('guest.layouts.share', [
                                                'url' => request()->fullUrl(),
                                                'description' => 'This is really cool link',
                                                'image' => 'https://placehold.it/300x300?text=Cool+link'
                                            ])
                </div>

                <div class="entry__author">
                    @if($user->provider)
                        <img src="{{$user->image}}" class="rounded-circle"
                             alt="Cinque Terre"
                             width="40"
                             height="40">
                    @else
                        <img src="{{'storage/image/'.$user->image}}" class="rounded-circle"
                             alt="Cinque Terre"
                             width="40"
                             height="40">
                    @endif

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="#0">{{$user->name}}</a>
                        </h5>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->

        <div class="comments-wrap" style="margin: auto; text-align: center">

            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=477917442758636&autoLogAppEvents=1"></script>
            <div class="fb-comments" data-href="http://localhost:8000/images/detail/{{$user->id}}"
                 data-width="960" data-numposts="5"></div>
        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->


@endsection
