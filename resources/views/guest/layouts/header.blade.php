<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Vampire</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <base href="{{asset('')}}">
    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="storage/wordsmith/css/base.css">
    <link rel="stylesheet" href="storage/wordsmith/css/vendor.css">
    <link rel="stylesheet" href="storage/wordsmith/css/main.css">


    <!-- script
    ================================================== -->
    <script src="storage/wordsmith/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="storage/wordsmith/favicon.ico" type="image/x-icon">
    <link rel="icon" href="storage/wordsmith/favicon.ico" type="image/x-icon">

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


<!-- header
================================================== -->
<header class="s-header header">

    <div class="header__logo">
        <a class="logo" href="/">
            <img src="storage/wordsmith/images/logo.svg" alt="Homepage">
        </a>
    </div> <!-- end header__logo -->

    <a class="header__search-trigger" href="#0"></a>

    <div class="header__search">

        <form role="search" method="post" class="header__search-form" action="{{route('page.search')}}">
            @csrf
            <label>
                <span class="hide-content">Search for:</span>
                <input type="search" class="search-field" placeholder="Type Keywords" value="" name="keywords"
                       title="Search for:" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="Search">
        </form>

        <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

    </div>  <!-- end header__search -->

    <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
    <nav class="header__nav-wrap">

        <h2 class="header__nav-heading h6">Navigate to</h2>

        <ul class="header__nav">
            <li class="current"><a href="/" title="">Home</a></li>
            <li><a href="{{route('page.images')}}">Album Ảnh</a></li>
            {{--            <li><a href="style-guide.html" title="">Styles</a></li>--}}
            <li><a href="{{route('page.about')}}" title="">About</a></li>
            <li><a href="{{route('page.contact')}}" title="">Contact</a></li>
            @if (Route::has('login'))
                @auth
                    <li class="has-children">

                        <a href="#0" title="">{{Auth::user()->name}}</a>
                        <ul class="sub-menu">

                            <li><a href="{{ url('/home') }}">Setting</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a></li>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            @endif

        </ul> <!-- end header__nav -->

        <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

    </nav> <!-- end header__nav-wrap -->
</header> <!-- s-header -->

