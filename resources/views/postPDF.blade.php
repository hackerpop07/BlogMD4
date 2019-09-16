<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Standard Post - Wordsmith</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/vendor.css">
    <link rel="stylesheet" href="css/main.css">
    <style type="text/css">
        body {
            font-family: DejaVu Sans;
        }
    </style>

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- preloader
================================================== -->
<div id="preloader">
    <div id="loader" class="dots-fade">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>


<!-- s-content
================================================== -->
<section class="s-content s-content--top-padding s-content--narrow">

    <article class="row entry format-standard">

        <div class="entry__media col-full">
            <div class="entry__post-thumb">
                <img src="{{'storage/image/'.$post->image}}"
                     style="width: 500px" alt="">
            </div>
        </div>

        <div class="entry__header col-full">
            <h1 class="entry__header-title display-1" style="text-align: center">
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
        <div>
            {{$post->description}}
        </div>
        <div class="col-full entry__main">

            {!! $post->content !!}
        </div>
        <!-- END respond-->

        </div> <!-- end comment-respond -->

        </div> <!-- end comments-wrap -->

</section> <!-- end s-content -->


<!-- Java Script
================================================== -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/main.js"></script>

</body>

</html>
