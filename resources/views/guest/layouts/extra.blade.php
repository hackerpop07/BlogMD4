<!-- s-extra
================================================== -->
<section class="s-extra">

    <div class="row">

        <div class="col-seven md-six tab-full popular">
            <h3>Popular Posts</h3>

            <div class="block-1-2 block-m-full popular__posts">
                @forelse($topPosts as $key => $value)
                    <article class="col-block popular__post">
                        <a href="{{route('page.detail',$value->id)}}" class="popular__thumb">
                            <img src="{{'storage/image/'.$value->image}}" alt="">
                        </a>
                        <h5>{{$value->title}}</h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#0">{{$value->user->name}}</a></span>
                            <span class="popular__date"><span>on</span> <time>{{date_format($value->updated_at,"d-m-Y")}}</time></span>
                        </section>
                    </article>
                @empty
                @endforelse
            </div> <!-- end popular_posts -->
        </div> <!-- end popular -->

        <div class="col-four md-six tab-full end">
            <div class="row">
                <div class="col-six md-six mob-full categories">
                    <h3>Categories</h3>

                    <ul class="linklist">
                        <li><a href="#0">Lifestyle</a></li>
                        <li><a href="#0">Travel</a></li>
                        <li><a href="#0">Recipes</a></li>
                        <li><a href="#0">Management</a></li>
                        <li><a href="#0">Health</a></li>
                        <li><a href="#0">Creativity</a></li>
                    </ul>
                </div> <!-- end categories -->

                <div class="col-six md-six mob-full sitelinks">
                    <h3>Site Links</h3>

                    <ul class="linklist">
                        <li><a href="#0">Home</a></li>
                        <li><a href="#0">Blog</a></li>
                        <li><a href="#0">Styles</a></li>
                        <li><a href="#0">About</a></li>
                        <li><a href="#0">Contact</a></li>
                        <li><a href="#0">Privacy Policy</a></li>
                    </ul>
                </div> <!-- end sitelinks -->
            </div>
        </div>
    </div> <!-- end row -->

</section> <!-- end s-extra -->
