@extends('guest.layouts.master')
@section('content')

    <!-- s-content
================================================== -->
    <section class="s-content">
        <br>
        <br>
        <div class="row entries-wrap wide">
            <div class="entries">
                @forelse($users as $key => $value)
                    <article class="col-block">

                        <div class="item-entry" data-aos="zoom-in">
                            <div class="item-entry__thumb">
                                <a href="{{route('page.images.detail',$value->id)}}" class="item-entry__thumb-link">
                                    @foreach($value->images as $image)
                                        @if($image->status == 1)
                                            <img src="{{'storage/image/'.$image->path}}"
                                                 style="width: 315px;height: 210px"
                                                 alt="">
                                            @break
                                        @endif
                                    @endforeach
                                </a>
                            </div>

                            <div class="item-entry__text">
                                <div class="item-entry__cat">
                                    {{--                                    <a href="category.html">Design</a>--}}
                                </div>

                                <h1 class="item-entry__title"><a
                                        href="{{route('page.images.detail',$value->id)}}">{{$value->name}}</a></h1>
                                <label>Album Ảnh</label>
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
                    {{--                    {{$users->links()}}--}}
                </nav>
            </div>
        </div>

    </section> <!-- end s-content -->

@endsection

