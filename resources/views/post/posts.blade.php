<!DOCTYPE html>
<html lang="en-US">
<head>
    @include('includes.head')
    @stack('css')
    <!-- font-awsome  cdn -->
        <script src="https://kit.fontawesome.com/c5b4a348d0.js" crossorigin="anonymous"></script>
        <!-- bootstrap css -->
{{--        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">--}}
        <!-- custom nav.css -->
        <link rel="stylesheet" href="{{ asset('frontend_assets/css/nav.css') }}">
</head>

<body>

<!-- preloader -->
@include('includes.preloader')

<!-- site wrapper -->
<div class="site-wrapper">

    <div class="main-overlay"></div>

    <!-- header -->
@include('includes.header')
    <div class="nav_container">
        <div class="nav_top_container">
            <div class="nav_top">
                <div class="nav_top_leftText">
                    <h4 style="color:whitesmoke;"><span>Stay Connected</span> | <span>We Report to You</span>  </h4>
                </div>
                <div class="nav_top_icons">
{{--                    <span class="search_icon"><i class="fas fa-search"></i></span>--}}
                    <span><i class="fab fa-facebook-f"></i></span>
{{--                    <span><i class="fab fa-twitter"></i></span>--}}
{{--                    <span><i class="fab fa-vimeo-v"></i></span>--}}
                    <span><i class="fab fa-youtube"></i></span>
                </div>
            </div>
        </div>

        <br>
        <div class="nav_logo_date">
            <div class="nav_logo_contianer">

                <a href="{{ route('welcome') }}"><img src="{{$logo->getMedia('site_logo')->first()->getUrl()}}" alt="logo"></a>
            </div>

            <div class="nav_date_container" style="margin-top: 10px;">
                <p id="date_time"></p>
            </div>
        </div>

        <div class="nav_bottom_container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('about') }}">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('contact') }}">Contact-Us</a>
                            </li>
                          @foreach ($categories as $category)
                           <li class="nav-item dropdown" >
                               <a class="nav-link dropdown-toggle" href="{{route('get.category',$category->id)}}" id="{{$category->id}}" role="button"  >
                                    {{$category->category_name}}
                               </a>
                               <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                             </ul>
                         </li>
                          @endforeach
{{--                            <li class="nav-item">
{{--                                <a class="nav-link" href="#">Video</a>--}}
{{--                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">Latest</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">The Reel</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">The Field</a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="#">Trending</a>--}}
{{--                            </li>--}}
{{--

                        </ul>

{{--                        <div id="bottom_nav_icon" class="d-flex">--}}
{{--                            <input class="input_search" id="search_box" placeholder="Search" type="text">--}}
{{--                            <span class="search_icon"><i class="fas fa-search"></i></span>--}}
{{--                            <span><i class="fas fa-cog"></i></span>--}}
{{--                        </div>--}}

                    </div>
                </div>
            </nav>
        </div>

    </div>
    <br>
<!-- hero section -->


    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-12">


                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">
                            @if ($subcategorie->category_name)
                            {{$subcategorie->category_name}} News
                            @else
                            All News
                            @endif
                            </h3>
                        {{-- <h3>All News</h3> --}}
                        <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            @foreach($posts as $post)

                            <div class="col-sm-4">
                                <!-- post large -->
                                <div class="post">
                                    <div class="thumb rounded">
{{--                                        <a href="category.html" class="category-badge position-absolute">Culture</a>--}}
{{--                                        <span class="post-format">--}}
{{--											<i class="icon-picture"></i>--}}
{{--										</span>--}}
                                        <a href="{{ route('secure.news.show',$post->id) }}">
                                            <div class="inner">
                                                <img src="{{ $post->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
{{--                                        <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>--}}
                                        <li class="list-inline-item">{{ $post->created_at->diffForhumans() }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">{{ $post->heading }}</a></h5>
                                    <p class="excerpt mb-0">{!! \Illuminate\Support\Str::limit($post->description,100) !!}</p>

                                </div>

                            </div>
                            @endforeach

                        </div>




                    </div>
                    <!--new design -->
                    <div class="row gy-4">
                        <div class="col-lg-8">

                            <!-- section header -->
                            <div class="section-header">
                                <h3 class="section-title">Editor’s Pick</h3>
                                <img src="images/wave.svg" class="wave" alt="wave">
                            </div>

                            <div class="padding-30 rounded bordered">
                                <div class="row gy-5">
                                    <div class="col-sm-6">
                                        <!-- post -->
                                        <div class="post">
                                            <div class="thumb rounded">
                                                <a href="category.html" class="category-badge position-absolute">Lifestyle</a>
                                                <span class="post-format">
                                                    <i class="icon-picture"></i>
                                                </span>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/editor-lg.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <ul class="meta list-inline mt-4 mb-0">
                                                <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author">Katen Doe</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h5>
                                            <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- post -->
                                        <div class="post post-list-sm square">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/editor-sm-1.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-list-sm square">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/editor-sm-2.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-list-sm square">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/editor-sm-3.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">10 Ways To Immediately Start Selling Furniture</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-list-sm square">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/editor-sm-4.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">15 Unheard Ways To Achieve Greater Walker</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="spacer" data-height="50" style="height: 50px;"></div>

                            <!-- horizontal ads -->
                            <div class="ads-horizontal text-md-center">
                                <span class="ads-title">- Sponsored Ad -</span>
                                <a href="#">
                                    <img src="images/ads/ad-750.png" alt="Advertisement">
                                </a>
                            </div>

                            <div class="spacer" data-height="50" style="height: 50px;"></div>

                            <!-- section header -->
                            <div class="section-header">
                                <h3 class="section-title">Trending</h3>
                                <img src="images/wave.svg" class="wave" alt="wave">
                            </div>

                            <div class="padding-30 rounded bordered">
                                <div class="row gy-5">
                                    <div class="col-sm-6">
                                        <!-- post large -->
                                        <div class="post">
                                            <div class="thumb rounded">
                                                <a href="category.html" class="category-badge position-absolute">Culture</a>
                                                <span class="post-format">
                                                    <i class="icon-picture"></i>
                                                </span>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/trending-lg-1.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <ul class="meta list-inline mt-4 mb-0">
                                                <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author">Katen Doe</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">Facts About Business That Will Help You Success</a></h5>
                                            <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/trending-sm-1.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">3 Easy Ways To Make Your iPhone Faster</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/trending-sm-2.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">An Incredibly Easy Method That Works For All</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <!-- post large -->
                                        <div class="post">
                                            <div class="thumb rounded">
                                                <a href="category.html" class="category-badge position-absolute">Inspiration</a>
                                                <span class="post-format">
                                                    <i class="icon-earphones"></i>
                                                </span>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/trending-lg-2.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <ul class="meta list-inline mt-4 mb-0">
                                                <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author">Katen Doe</a></li>
                                                <li class="list-inline-item">29 March 2021</li>
                                            </ul>
                                            <h5 class="post-title mb-3 mt-3"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                                            <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/trending-sm-3.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">Here Are 8 Ways To Success Faster</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- post -->
                                        <div class="post post-list-sm square before-seperator">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/trending-sm-4.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details clearfix">
                                                <h6 class="post-title my-0"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h6>
                                                <ul class="meta list-inline mt-1 mb-0">
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="spacer" data-height="50" style="height: 50px;"></div>

                            <!-- section header -->
                            <div class="section-header">
                                <h3 class="section-title">Inspiration</h3>
                                <img src="images/wave.svg" class="wave" alt="wave">
                                <div class="slick-arrows-top">
                                    <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                    <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                                </div>
                            </div>

                            <div class="row post-carousel-twoCol post-carousel slick-initialized slick-slider">
                                <!-- post -->
                                <div aria-live="polite" class="slick-list draggable"><div class="slick-track" role="listbox" style="opacity: 1; width: 2660px; transform: translate3d(-760px, 0px, 0px);"><div class="post post-over-content col-md-6 slick-slide slick-cloned" data-slick-index="-2" id="" aria-hidden="true" tabindex="-1" style="width: 356px;">
                                    <div class="details clearfix">
                                        <a href="category.html" class="category-badge" tabindex="-1">Inspiration</a>
                                        <h4 class="post-title"><a href="blog-single.html" tabindex="-1">Feel Like A Pro With The Help Of These 7 Tips</a></h4>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#" tabindex="-1">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <a href="blog-single.html" tabindex="-1">
                                        <div class="thumb rounded">
                                            <div class="inner">
                                                <img src="images/posts/inspiration-2.jpg" alt="thumb">
                                            </div>
                                        </div>
                                    </a>
                                </div><div class="post post-over-content col-md-6 slick-slide slick-cloned" data-slick-index="-1" id="" aria-hidden="true" tabindex="-1" style="width: 356px;">
                                    <div class="details clearfix">
                                        <a href="category.html" class="category-badge" tabindex="-1">Inspiration</a>
                                        <h4 class="post-title"><a href="blog-single.html" tabindex="-1">Your Light Is About To Stop Being Relevant</a></h4>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#" tabindex="-1">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <a href="blog-single.html" tabindex="-1">
                                        <div class="thumb rounded">
                                            <div class="inner">
                                                <img src="images/posts/inspiration-3.jpg" alt="thumb">
                                            </div>
                                        </div>
                                    </a>
                                </div><div class="post post-over-content col-md-6 slick-slide slick-current slick-active" data-slick-index="0" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00" style="width: 356px;">
                                    <div class="details clearfix">
                                        <a href="category.html" class="category-badge" tabindex="0">Inspiration</a>
                                        <h4 class="post-title"><a href="blog-single.html" tabindex="0">Want To Have A More Appealing Tattoo?</a></h4>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#" tabindex="0">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <a href="blog-single.html" tabindex="0">
                                        <div class="thumb rounded">
                                            <div class="inner">
                                                <img src="images/posts/inspiration-1.jpg" alt="thumb">
                                            </div>
                                        </div>
                                    </a>
                                </div><div class="post post-over-content col-md-6 slick-slide slick-active" data-slick-index="1" aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide01" style="width: 356px;">
                                    <div class="details clearfix">
                                        <a href="category.html" class="category-badge" tabindex="0">Inspiration</a>
                                        <h4 class="post-title"><a href="blog-single.html" tabindex="0">Feel Like A Pro With The Help Of These 7 Tips</a></h4>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#" tabindex="0">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <a href="blog-single.html" tabindex="0">
                                        <div class="thumb rounded">
                                            <div class="inner">
                                                <img src="images/posts/inspiration-2.jpg" alt="thumb">
                                            </div>
                                        </div>
                                    </a>
                                </div><div class="post post-over-content col-md-6 slick-slide" data-slick-index="2" aria-hidden="true" tabindex="-1" role="option" aria-describedby="slick-slide02" style="width: 356px;">
                                    <div class="details clearfix">
                                        <a href="category.html" class="category-badge" tabindex="-1">Inspiration</a>
                                        <h4 class="post-title"><a href="blog-single.html" tabindex="-1">Your Light Is About To Stop Being Relevant</a></h4>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#" tabindex="-1">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <a href="blog-single.html" tabindex="-1">
                                        <div class="thumb rounded">
                                            <div class="inner">
                                                <img src="images/posts/inspiration-3.jpg" alt="thumb">
                                            </div>
                                        </div>
                                    </a>
                                </div><div class="post post-over-content col-md-6 slick-slide slick-cloned" data-slick-index="3" id="" aria-hidden="true" tabindex="-1" style="width: 356px;">
                                    <div class="details clearfix">
                                        <a href="category.html" class="category-badge" tabindex="-1">Inspiration</a>
                                        <h4 class="post-title"><a href="blog-single.html" tabindex="-1">Want To Have A More Appealing Tattoo?</a></h4>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#" tabindex="-1">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <a href="blog-single.html" tabindex="-1">
                                        <div class="thumb rounded">
                                            <div class="inner">
                                                <img src="images/posts/inspiration-1.jpg" alt="thumb">
                                            </div>
                                        </div>
                                    </a>
                                </div><div class="post post-over-content col-md-6 slick-slide slick-cloned" data-slick-index="4" id="" aria-hidden="true" tabindex="-1" style="width: 356px;">
                                    <div class="details clearfix">
                                        <a href="category.html" class="category-badge" tabindex="-1">Inspiration</a>
                                        <h4 class="post-title"><a href="blog-single.html" tabindex="-1">Feel Like A Pro With The Help Of These 7 Tips</a></h4>
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href="#" tabindex="-1">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <a href="blog-single.html" tabindex="-1">
                                        <div class="thumb rounded">
                                            <div class="inner">
                                                <img src="images/posts/inspiration-2.jpg" alt="thumb">
                                            </div>
                                        </div>
                                    </a>
                                </div></div></div>
                                <!-- post -->

                                <!-- post -->

                            </div>

                            <div class="spacer" data-height="50" style="height: 50px;"></div>

                            <!-- section header -->
                            <div class="section-header">
                                <h3 class="section-title">Latest Posts</h3>
                                <img src="images/wave.svg" class="wave" alt="wave">
                            </div>

                            <div class="padding-30 rounded bordered">

                                <div class="row">

                                    <div class="col-md-12 col-sm-6">
                                        <!-- post -->
                                        <div class="post post-list clearfix">
                                            <div class="thumb rounded">
                                                <span class="post-format-sm">
                                                    <i class="icon-picture"></i>
                                                </span>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/latest-sm-1.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details">
                                                <ul class="meta list-inline mb-3">
                                                    <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author">Katen Doe</a></li>
                                                    <li class="list-inline-item"><a href="#">Trending</a></li>
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                                <h5 class="post-title"><a href="blog-single.html">The Next 60 Things To Immediately Do About Building</a></h5>
                                                <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                                <div class="post-bottom clearfix d-flex align-items-center">
                                                    <div class="social-share me-auto">
                                                        <button class="toggle-button icon-share"></button>
                                                        <ul class="icons list-unstyled list-inline mb-0">
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-button float-end">
                                                        <a href="blog-single.html"><span class="icon-options"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-6">
                                        <!-- post -->
                                        <div class="post post-list clearfix">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/latest-sm-2.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details">
                                                <ul class="meta list-inline mb-3">
                                                    <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author">Katen Doe</a></li>
                                                    <li class="list-inline-item"><a href="#">Lifestyle</a></li>
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                                <h5 class="post-title"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
                                                <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                                <div class="post-bottom clearfix d-flex align-items-center">
                                                    <div class="social-share me-auto">
                                                        <button class="toggle-button icon-share"></button>
                                                        <ul class="icons list-unstyled list-inline mb-0">
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-button float-end">
                                                        <a href="blog-single.html"><span class="icon-options"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-6">
                                        <!-- post -->
                                        <div class="post post-list clearfix">
                                            <div class="thumb rounded">
                                                <span class="post-format-sm">
                                                    <i class="icon-camrecorder"></i>
                                                </span>
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/latest-sm-3.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details">
                                                <ul class="meta list-inline mb-3">
                                                    <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author">Katen Doe</a></li>
                                                    <li class="list-inline-item"><a href="#">Fashion</a></li>
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                                <h5 class="post-title"><a href="blog-single.html">Facts About Business That Will Help You Success</a></h5>
                                                <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                                <div class="post-bottom clearfix d-flex align-items-center">
                                                    <div class="social-share me-auto">
                                                        <button class="toggle-button icon-share"></button>
                                                        <ul class="icons list-unstyled list-inline mb-0">
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-button float-end">
                                                        <a href="blog-single.html"><span class="icon-options"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-6">
                                        <!-- post -->
                                        <div class="post post-list clearfix">
                                            <div class="thumb rounded">
                                                <a href="blog-single.html">
                                                    <div class="inner">
                                                        <img src="images/posts/latest-sm-4.jpg" alt="post-title">
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="details">
                                                <ul class="meta list-inline mb-3">
                                                    <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author">Katen Doe</a></li>
                                                    <li class="list-inline-item"><a href="#">Politic</a></li>
                                                    <li class="list-inline-item">29 March 2021</li>
                                                </ul>
                                                <h5 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being Relevant</a></h5>
                                                <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings</p>
                                                <div class="post-bottom clearfix d-flex align-items-center">
                                                    <div class="social-share me-auto">
                                                        <button class="toggle-button icon-share"></button>
                                                        <ul class="icons list-unstyled list-inline mb-0">
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                                            <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="more-button float-end">
                                                        <a href="blog-single.html"><span class="icon-options"></span></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <!-- load more button -->
                                <div class="text-center">
                                    <button class="btn btn-simple">Load More</button>
                                </div>

                            </div>

                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                {{ $posts->links() }}

            </div>

        </div>
        </div>
    </section>

    <!-- footer -->
    @include('includes.footer')

</div><!-- end site wrapper -->

<!-- search popup area -->
<div class="search-popup">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>
    <!-- content -->
    <div class="search-content">
        <div class="text-center">
            <h3 class="mb-4 mt-0">Press ESC to close</h3>
        </div>
        <!-- form -->
        <form class="d-flex search-form">
            <input class="form-control me-2" type="search" placeholder="Search and press enter ..." aria-label="Search">
            <button class="btn btn-default btn-lg" type="submit"><i class="icon-magnifier"></i></button>
        </form>
    </div>
</div>

<!-- canvas menu -->
<div class="canvas-menu d-flex align-items-end flex-column">
    <!-- close button -->
    <button type="button" class="btn-close" aria-label="Close"></button>

    <!-- logo -->
    <div class="logo">
        <img src="images/logo.svg" alt="Katen" />
    </div>

    <!-- menu -->
    <nav>
        <ul class="vertical-menu">
            <li class="active">
                <a href="index.html">Home</a>
                <ul class="submenu">
                    <li><a href="index.html">Magazine</a></li>
                    <li><a href="personal.html">Personal</a></li>
                    <li><a href="personal-alt.html">Personal Alt</a></li>
                    <li><a href="minimal.html">Minimal</a></li>
                    <li><a href="classic.html">Classic</a></li>
                </ul>
            </li>
            <li><a href="category.html">Lifestyle</a></li>
            <li><a href="category.html">Inspiration</a></li>
            <li>
                <a href="#">Pages</a>
                <ul class="submenu">
                    <li><a href="category.html">Category</a></li>
                    <li><a href="blog-single.html">Blog Single</a></li>
                    <li><a href="blog-single-alt.html">Blog Single Alt</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>
            </li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </nav>

    <!-- social icons -->
    <ul class="social-icons list-unstyled list-inline mb-0 mt-auto w-100">
        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
        <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
    </ul>
</div>

<!-- JAVA SCRIPTS -->
@include('includes.scripts')

</body>
@stack('js')
<!-- bootstrap bundle.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<!-- custom js -->
<script src="{{ asset('frontend_assets/js/nav_date.js') }}"></script>
<script>
    $(document).ready(function() {
            $('.nav-link').mouseover(function(){
                var category_id = $(this).attr('id');
                    // alert(category_id);

                    //ajax start here
                $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });
                //custom ajax code start here
                $.ajax({
                    type:'POST',
                    url:'/get/home/subcategory',
                    data:{category_id:category_id},

                    success: function(data){
                        // alert(data);
                        $('.dropdown-menu').html(data);
                    },
                 });
                //end ajax
            });



        });
</script>
</html>
