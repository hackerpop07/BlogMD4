<!-- featured
================================================== -->
<section class="s-featured">
    <div class="row">
        <div class="col-full">

            <div class="featured-slider featured" data-aos="zoom-in">
                @forelse($postsSlide as $key => $value)
                    <div class="featured__slide">
                        <div class="entry">
                            <div class="entry__background"
                                 style="background-image:url({{"storage/image/".$value->image}});"></div>
                            <div class="entry__content">
                                <span class="entry__category"><a href="#0"></a></span>

                                <h1><a href="{{route('page.detail',$value->id)}}" title="">{{$value->title}}</a></h1>

                                <div class="entry__info">
                                    <a href="#0" class="entry__profile-pic">
                                        @if($value->user->provider)
                                            <img src="{{$value->user->image}}" class="avatar">
                                        @else
                                            <img src="{{'storage/image/'.$value->user->image}}" class="avatar">
                                        @endif
                                    </a>
                                    <ul class="entry__meta">
                                        <li><a href="#0">{{$value->user->name}}</a></li>
                                        <li>{{date_format($value->updated_at,"d-m-Y")}}</li>
                                    </ul>
                                </div>
                            </div> <!-- end entry__content -->
                        </div> <!-- end entry -->
                    </div> <!-- end featured__slide -->
                @empty
                    Không có giá trị nào
                @endforelse


            </div> <!-- end featured -->

        </div> <!-- end col-full -->
    </div>
</section> <!-- end s-featured -->
