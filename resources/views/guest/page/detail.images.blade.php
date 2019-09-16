@extends('guest.layouts.master')
@section('content')


    <!-- s-content
    ================================================== -->
    <section class="s-content s-content--top-padding s-content--narrow">

        <article class="row entry format-standard">

            <div class="entry__media col-full">
                <div class="entry__post-thumb">
                    <img src="{{'/storage/image/'.$post->image}}"
                         style="width: 2000px"
                         alt="">
                </div>
            </div>

            <div class="entry__header col-full">
                <h1 class="entry__header-title display-1">
                    {{$post->title}}
                </h1>
                <ul class="entry__header-meta">
                    <li class="date">{{date_format($post->updated_at,"d-m-Y")}}</li>
                    <li class="byline">
                        By
                        <a href="#0">{{$post->user->name}}</a>
                    </li>
                </ul>
            </div>

            <div class="col-full entry__main">

                {!! $post->content !!}
                <div class="social-buttons" style="font-size: 30px">
                    @include('guest.layouts.share', [
                                                'url' => request()->fullUrl(),
                                                'description' => 'This is really cool link',
                                                'image' => 'https://placehold.it/300x300?text=Cool+link'
                                            ])
                </div>
                <div class="entry__taxonomies">
                    <div class="entry__cat">
                        <h5>Posted In: </h5>
                        <span class="entry__tax-list">
                            <a href="#0">Lifestyle</a>
                            <a href="#0">Management</a>
                        </span>
                    </div> <!-- end entry__cat -->
                    @if(isset($post->tags))
                        <div class="entry__tags">
                            <h5>Tags: </h5>
                            <span class="entry__tax-list entry__tax-list--pill">
                            @foreach($post->tags as $tag)
                                    <a href="{{route('page.tag',$tag->name)}}">{{$tag->name}}</a>
                                @endforeach
                        </span>
                        </div> <!-- end entry__tags -->
                    @endif
                </div> <!-- end s-content__taxonomies -->

                <div class="entry__author">
                    @if($post->user->provider)
                        <img src="{{$post->user->image}}" class="rounded-circle"
                             alt="Cinque Terre"
                             width="40"
                             height="40">
                    @else
                        <img src="{{'storage/image/'.$post->user->image}}" class="rounded-circle"
                             alt="Cinque Terre"
                             width="40"
                             height="40">
                    @endif

                    <div class="entry__author-about">
                        <h5 class="entry__author-name">
                            <span>Posted by</span>
                            <a href="#0">{{$post->user->name}}</a>
                        </h5>

                        <div class="entry__author-desc">
                            <p>
                                {{$post->description}}
                            </p>
                        </div>
                    </div>
                </div>

            </div> <!-- s-entry__main -->

        </article> <!-- end entry/article -->

        <div class="comments-wrap" style="margin: auto; text-align: center">

            <div id="fb-root"></div>
            <script async defer crossorigin="anonymous"
                    src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v4.0&appId=477917442758636&autoLogAppEvents=1"></script>
            <div class="fb-comments" data-href="http://localhost:8000/detail/{{$post->id}}"
                 data-width="960" data-numposts="5"></div>
        </div> <!-- end comments-wrap -->

    </section> <!-- end s-content -->


@endsection
