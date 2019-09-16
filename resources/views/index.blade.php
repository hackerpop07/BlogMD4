@extends('guest.layouts.master')
@section('content')

    @include('guest.layouts.slide')

    <!-- s-content
================================================== -->
    <section class="s-content">
        <div style="text-align: center">
            @if(!$total)
                Có {{$total}} Giá Trị
            @endif
        </div>
        <div class="row entries-wrap wide">
            <div class="entries">
                @forelse($posts as $key => $value)
                    <article class="col-block">

                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="{{route('page.detail',$value->id)}}" class="item-entry__thumb-link">
                                    <img src="{{'storage/image/'.$value->image}}"
                                         style="width: 315px;height: 210px"
                                         alt="">
                                </a>
                            </div>

                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    {{--                                    <a href="category.html">Design</a>--}}
                                </div>

                                <h1 class="item-entry__title"><a
                                        href="{{route('page.detail',$value->id)}}">{{$value->title}}</a></h1>
                                <small>{{$value->description}}</small>
                                <div class="item-entry__date">
                                    <a href="{{route('page.detail',$value->id)}}">{{date_format($value->updated_at,"d-m-Y")}}</a>
                                </div>
                            </div>
                        </div> <!-- item-entry -->

                    </article> <!-- end article -->
                @empty
                    Không có giá trị nào !!!
                @endforelse

            </div> <!-- end entries -->
        </div> <!-- end entries-wrap -->

        <div class="row pagination-wrap">
            <div class="col-full">
                <nav class="pgn" data-aos="fade-up">
                    <ul>
                        <li><a class="pgn__prev" href="#0">Prev</a></li>
                        <li><a class="pgn__num" href="#0">1</a></li>
                        <li><span class="pgn__num current">2</span></li>
                        <li><a class="pgn__num" href="#0">3</a></li>
                        <li><a class="pgn__num" href="#0">4</a></li>
                        <li><a class="pgn__num" href="#0">5</a></li>
                        <li><span class="pgn__num dots">…</span></li>
                        <li><a class="pgn__num" href="#0">8</a></li>
                        <li><a class="pgn__next" href="#0">Next</a></li>
                    </ul>
                    {{$posts->links()}}
                </nav>
            </div>
        </div>

    </section> <!-- end s-content -->
    @include('guest.layouts.extra')
@endsection

