@extends('includes.master')
@section('content')
    <!-- hero section -->
    <section id="hero">

        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- featured post large -->
                    <div class="post featured-post-lg">
                        <a href="{{route('news.details',$news->id)}}">
                            <div class="thumb rounded">
                                <div class="inner data-bg-image" data-bg-image="{{ $news->getFirstMediaUrl('banner') }}"></div>
                            </div>
                        </a>
                    </div>

                    <div class="details clearfix">
                        {{-- <a href="category.html" class="category-badge">Inspiration</a> --}}
                        <a href="{{route('news.details',$news->id)}}"><h2 class="post-title">{{$news->heading}}</h2></a>
                        <ul class="meta list-inline mb-0">
                            {{-- <li class="list-inline-item"><a href="#">Katen Doe</a></li> --}}
                            <li class="list-inline-item">{{ $news->updated_at->diffForHumans()}}</li>
                        </ul>
                    </div>

                </div>

                <div class="col-lg-4">

                    <!-- post tabs -->
                    <div class="post-tabs rounded bordered">
                        <!-- tab navs -->
                        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
                            <li class="nav-item" role="presentation"><button aria-controls="popular" aria-selected="true" class="nav-link active" data-bs-target="#popular" data-bs-toggle="tab" id="popular-tab" role="tab" type="button">Popular</button></li>
                            <li class="nav-item" role="presentation"><button aria-controls="recent" aria-selected="false" class="nav-link" data-bs-target="#recent" data-bs-toggle="tab" id="recent-tab" role="tab" type="button">Recent</button></li>
                        </ul>
                        <!-- tab contents -->
                        <div class="tab-content" id="postsTabContent">
                            <!-- loader -->
                            <div class="lds-dual-ring"></div>
                            <!-- popular posts -->
                            <div aria-labelledby="popular-tab" class="tab-pane fade show active" id="popular" role="tabpanel">
                                <!-- post -->
                                @foreach($post_randoms as $post_random)
                                <div class="post post-list-sm circle">
                                    <div class="thumb ">
                                        <a href="{{route('posts.details',$post_random->id)}}">
                                            <div class="inner">
                                                <img src="{{ $post_random->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$post_random->id)}}">{{ $post_random->heading }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $post_random->created_at->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <!-- recent posts -->
                            <div aria-labelledby="recent-tab" class="tab-pane fade" id="recent" role="tabpanel">
                                <!-- post -->
                                @foreach($post_recents as $post_recent)
                                    <div class="post post-list-sm circle">
                                        <div class="thumb ">
                                            <a href="{{route('posts.details',$post_recent->id)}}">
                                                <div class="inner">
                                                    <img src="{{ $post_recent->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="{{route('posts.details',$post_recent->id)}}">{{ $post_recent->heading }}</a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{ $post_recent->created_at->diffForHumans() }}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>
    <!-- section main content -->
    <section class="main-content">
        <div class="container-xl">

            <div class="row gy-4">

                <div class="col-lg-8">

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">Latest News</h3>

                        <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post">
                                    <div class="thumb rounded">
{{--                                        <a href="category.html" class="category-badge position-absolute">Lifestyle</a>--}}
{{--                                        <span class="post-format">--}}
{{--											<i class="icon-picture"></i>--}}
{{--										</span>--}}
                                        <a href="{{route('posts.details',$lfivepost[0]->id)}}">
                                            <div class="inner">
                                                <img src="{{ $lfivepost[0]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
{{--                                        <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li>--}}
                                        <li class="list-inline-item">{{ $lfivepost[0]['created_at']->diffForHumans() }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{route('posts.details',$lfivepost[0]->id)}}">{{ $lfivepost[0]['heading'] }}</a></h5>
                                    <p class="excerpt mb-0">A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- post -->
                                <div class="post post-list-sm square">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$lfivepost[1]->id)}}">
                                            <div class="inner">
                                                <img src="{{ $lfivepost[1]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$lfivepost[1]->id)}}">{{ $lfivepost[1]['heading'] }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $lfivepost[1]['created_at']->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$lfivepost[2]->id)}}">
                                            <div class="inner">
                                                <img src="{{ $lfivepost[2]->getFirstMediaUrl('post_img')}}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$lfivepost[2]->id)}}">{{ $lfivepost[2]['heading'] }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $lfivepost[2]['created_at']->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$lfivepost[3]->id)}}">
                                            <div class="inner">
                                                <img src="{{ $lfivepost[3]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$lfivepost[3]->id)}}">{{ $lfivepost[3]['heading'] }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $lfivepost[3]['created_at']->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$lfivepost[4]->id)}}">
                                            <div class="inner">
                                                <img src="{{ $lfivepost[4]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$lfivepost[4]->id)}}">{{ $lfivepost[4]['heading'] }}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $lfivepost[4]['created_at']->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- horizontal ads -->
                    <div class="ads-horizontal text-md-center">
                        <span class="ads-title">- Sponsored Ad -</span>
                        <a href="#">
                            <img src="images/ads/ad-750.png" alt="Advertisement" />
                        </a>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">{{$fivecategories[0]['category_name']}}</h3>
                        {{-- <img src="images/wave.svg" class="wave" alt="wave" /> --}}
                    </div>

                    {{-- {{$fivecategories[0]->relationtoposts[0]->heading}} --}}
                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            <div class="col-sm-6">
                                <!-- post large -->
                                <div class="post">
                                    <div class="thumb rounded">
                                        {{-- <a href="category.html" class="category-badge position-absolute">Culture</a> --}}
                                        {{-- <span class="post-format">
											<i class="icon-picture"></i>
										</span> --}}
                                        <a href="{{route('posts.details',$facategories_zero[0]->id)}}">
                                            <div class="inner">
                                                <img src="{{ $facategories_zero[0]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        {{-- <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li> --}}
                                        <li class="list-inline-item">{{ $facategories_zero[0]['created_at']->diffForHumans() }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{route('posts.details',$facategories_zero[0]->id)}}">{{$facategories_zero[0]->heading}}</a></h5>
                                    <p class="excerpt mb-0">{!! $facategories_zero[0]->description !!}</p>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$facategories_zero[1]->id)}}">
                                            <div class="inner">
                                                <img src="{{ $facategories_zero[1]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$facategories_zero[1]->id)}}">{{$facategories_zero[1]->heading}}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                             <li class="list-inline-item">{{ $facategories_zero[1]['created_at']->diffForHumans() }}</li>
                                            {{-- <li class="list-inline-item">

                                                {{-- {!!$facategories_zero[1]->description !!} --}}
                                                We have to initiate another mass upsurge’, BNP Secretary General MIrza Fakhrul Islam Alamgir made this comment and said that we could
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$facategories_zero[2]->id) }}">
                                            <div class="inner">
                                                <img src="{{ $facategories_zero[2]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$facategories_zero[2]->id) }}">{{$facategories_zero[2]->heading}}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $facategories_zero[2]['created_at']->diffForHumans() }}</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <!-- post large -->
                                <div class="post">
                                    <div class="thumb rounded">
                                        {{-- <a href="category.html" class="category-badge position-absolute">Inspiration</a> --}}
                                        {{-- <span class="post-format">
											<i class="icon-earphones"></i>
										</span> --}}
                                        <a href="{{route('posts.details',$facategories_zero[3]->id) }}">
                                            <div class="inner">
                                                <img src="{{ $facategories_zero[3]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        {{-- <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li> --}}
                                        <li class="list-inline-item">{{ $facategories_zero[3]['created_at']->diffForHumans() }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{route('posts.details',$facategories_zero[3]->id) }}">{{$facategories_zero[3]->heading}}</a></h5>
                                    <p class="excerpt mb-0">
                                        {{-- {{!!$facategories_zero[3]->description !!}} --}}
                                        A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy</p>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$facategories_zero[4]->id) }}">
                                            <div class="inner">
                                                <img src="{{ $facategories_zero[4]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$facategories_zero[4]->id) }}">{{$facategories_zero[4]->heading}}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                             <li class="list-inline-item">{{ $facategories_zero[4]['created_at']->diffForHumans() }}</li>
                                            {{-- <li class="list-inline-item">

                                                {{-- {{!!$facategories_zero[1]->description !!}} --}}
                                                {{-- We have to initiate another mass upsurge’, BNP Secretary General MIrza Fakhrul Islam Alamgir made this comment and said that we could --}}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- post -->
                                <div class="post post-list-sm square before-seperator">
                                    <div class="thumb rounded">
                                        <a href="{{route('posts.details',$facategories_zero[5]->id) }}">
                                            <div class="inner">
                                                <img src="{{ $facategories_zero[5]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details clearfix">
                                        <h6 class="post-title my-0"><a href="{{route('posts.details',$facategories_zero[5]->id) }}">{{$facategories_zero[5]->heading}}</a></h6>
                                        <ul class="meta list-inline mt-1 mb-0">
                                            <li class="list-inline-item">{{ $facategories_zero[5]['created_at']->diffForHumans() }}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="spacer" data-height="50"></div>
                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">{{ $fivecategories[1]['category_name'] }}</h3>
                        {{-- <img src="images/wave.svg" class="wave" alt="wave" /> --}}
                    </div>

                    <div class="padding-30 rounded bordered">
                        <div class="row gy-5">
                            <div class="col-sm-6">
                                <!-- post large -->
                                <div class="post">
                                    <div class="thumb rounded">
                                        {{-- <a href="category.html" class="category-badge position-absolute">Culture</a>
                                        <span class="post-format">
											<i class="icon-picture"></i>
										</span> --}}
                                        <a href="{{route('posts.details',$facategories_one[0]->id) }}">
                                            <div class="inner">
                                                <img src="{{ $facategories_one[0]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        {{-- <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li> --}}
                                        <li class="list-inline-item">{{ $facategories_one[0]['created_at']->diffForHumans() }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{route('posts.details',$facategories_one[0]->id) }}">{{$facategories_one[0]->heading}}</a></h5>
                                    <p class="excerpt mb-0">
                                        {{-- {{!!$facategories_one[0]->description !!}} --}}
                                        A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy
                                    </p>
                                </div>
                                <!-- post -->

                                <!-- post -->

                            </div>
                            <div class="col-sm-6">
                                <!-- post large -->
                                <div class="post">
                                    <div class="thumb rounded">
                                        {{-- <a href="category.html" class="category-badge position-absolute">Culture</a>
                                        <span class="post-format">
											<i class="icon-picture"></i>
										</span> --}}
                                        <a href="{{route('posts.details',$facategories_one[1]->id) }}">
                                            <div class="inner">
                                                <img src="{{ $facategories_one[1]->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <ul class="meta list-inline mt-4 mb-0">
                                        {{-- <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li> --}}
                                        <li class="list-inline-item">{{ $facategories_one[1]['created_at']->diffForHumans() }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{route('posts.details',$facategories_one[1]->id) }}">{{$facategories_one[1]->heading}}</a></h5>
                                    <p class="excerpt mb-0">
                                        {{-- {{!!$facategories_one[1]->description !!}} --}}
                                        A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring which I enjoy
                                    </p>
                                </div>
                                <!-- post -->

                                <!-- post -->

                            </div>
                        </div>
                    </div>


                    <div class="spacer" data-height="50"></div>
                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">{{ $fivecategories[2]['category_name'] }}</h3>
                        <img src="{{ $facategories_two[0]->getFirstMediaUrl('post_img') }}" class="wave" alt="wave" />
                        {{-- <div class="slick-arrows-top">
                            <button type="button" data-role="none" class="carousel-topNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                            <button type="button" data-role="none" class="carousel-topNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                        </div> --}}
                    </div>

                    <div class="row post-carousel-twoCol post-carousel">
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                {{-- <a href="category.html" class="category-badge">Inspiration</a> --}}
                                <h4 class="post-title"><a href="{{route('posts.details',$facategories_two[0]->id) }}">{{$facategories_two[0]->heading}}</a></h4>
                                <ul class="meta list-inline mb-0">
                                    {{-- <li class="list-inline-item"><a href="#">Katen Doe</a></li> --}}
                                    <li class="list-inline-item">{{ $facategories_two[0]['created_at']->diffForHumans() }}</li>
                                </ul>
                            </div>
                            <a href="{{route('posts.details',$facategories_two[0]->id) }}">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="{{ $facategories_two[0]->getFirstMediaUrl('post_img') }}" alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                {{-- <a href="category.html" class="category-badge">Inspiration</a> --}}
                                <h4 class="post-title"><a href="{{route('posts.details',$facategories_two[1]->id) }}">{{$facategories_two[1]->heading}}</a></h4>
                                <ul class="meta list-inline mb-0">
                                    {{-- <li class="list-inline-item"><a href="#">Katen Doe</a></li> --}}
                                    <li class="list-inline-item">{{ $facategories_two[1]['created_at']->diffForHumans() }}</li>
                                </ul>
                            </div>
                            <a href="{{route('posts.details',$facategories_two[1]->id) }}">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="{{ $facategories_two[1]->getFirstMediaUrl('post_img') }}" alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- post -->
                        <div class="post post-over-content col-md-6">
                            <div class="details clearfix">
                                <a href="category.html" class="category-badge">Inspiration</a>
                                <h4 class="post-title"><a href="blog-single.html">Your Light Is About To Stop Being Relevant</a></h4>
                                <ul class="meta list-inline mb-0">
                                    <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                    <li class="list-inline-item">29 March 2021</li>
                                </ul>
                            </div>
                            <a href="blog-single.html">
                                <div class="thumb rounded">
                                    <div class="inner">
                                        <img src="images/posts/inspiration-3.jpg" alt="thumb" />
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="spacer" data-height="50"></div>

                    <!-- section header -->
                    <div class="section-header">
                        <h3 class="section-title">{{ $fivecategories[3]['category_name'] }}</h3>
                        {{-- <img src="images/wave.svg" class="wave" alt="wave" /> --}}
                    </div>

                    <div class="padding-30 rounded bordered">

                        <div class="row">
                            @forelse ($facategories_three as $facategories_three_post)
                            <div class="col-md-12 col-sm-6">
                                <!-- post -->
                                <div class="post post-list clearfix">
                                    <div class="thumb rounded">
										{{-- <span class="post-format-sm">
											<i class="icon-picture"></i>
										</span> --}}
                                        <a href="{{route('posts.details',$facategories_three_post->id)}}">
                                            <div class="inner">
                                                <img src="{{$facategories_three_post->getFirstMediaUrl('post_img')}}" alt="post-title" />
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-3">
                                            {{-- <li class="list-inline-item"><a href="#"><img src="images/other/author-sm.png" class="author" alt="author"/>Katen Doe</a></li> --}}
                                            {{-- <li class="list-inline-item"><a href="#">Trending</a></li> --}}
                                            <li class="list-inline-item">{{$facategories_three_post->created_at->diffForHumans()}}</li>
                                        </ul>
                                        <h5 class="post-title"><a href="{{route('posts.details',$facategories_three_post->id)}}">{{$facategories_three_post->heading}}</a></h5>
                                        <p class="excerpt mb-0">
                                            {{-- {!!$facategories_three_post->description!!} --}}
                                            A wonderful serenity has taken possession of
                                        </p>
                                        {{-- <div class="post-bottom clearfix d-flex align-items-center">
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
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                            @empty
                                <span>No Data</span>
                            @endforelse



                        </div
                        >
                        <!-- load more button -->
                        <div class="text-center">
                            <button class="btn btn-simple">Load More</button>
                        </div>

                    </div>

                </div>
                <div class="col-lg-4">

                    <!-- sidebar -->
                    <div class="sidebar">
                        <!-- widget about -->
                        <div class="widget rounded">
                            <div class="widget-about data-bg-image text-center" data-bg-image="images/map-bg.png">
                                <img src="images/logo.svg" alt="logo" class="mb-4" />
                                <p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
                                <ul class="social-icons list-unstyled list-inline mb-0">
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
                                    <li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- widget popular posts -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Popular Posts</h3>
                                <img src="{{ $post_randoms[0]->getFirstMediaUrl('post_img') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                @forelse ($post_randoms as $post_random)
                                {{-- {{$post_random}} --}}
                                     <!-- post -->
                                    <div class="post post-list-sm circle">
                                        <div class="thumb circle">
                                            {{-- <span class="number">1</span> --}}
                                            <a href="{{route('posts.details',$post_random->id)}}">
                                                <div class="inner">
                                                    <img src="{{ $post_random->getFirstMediaUrl('post_img') }}" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="details clearfix">
                                            <h6 class="post-title my-0"><a href="blog-single.html">{{$post_random->heading}} </a></h6>
                                            <ul class="meta list-inline mt-1 mb-0">
                                                <li class="list-inline-item">{{$post_random->created_at->diffForHumans()}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                @empty
                                    <span class="badge badge-danger">No Data</span>
                                @endforelse

                            </div>
                        </div>

                        <!-- widget categories -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Other Categories</h3>
                                <img src="{{ asset('frontend_assets/images/wave.svg') }}" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <ul class="list">
                                    @foreach($categories as $category)
                                    <li><a href="#">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>

                        </div>

                        {{-- <!-- widget newsletter -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Newsletter</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <span class="newsletter-headline text-center mb-3">Join 70,000 subscribers!</span>
                                <form>
                                    <div class="mb-2">
                                        <input class="form-control w-100 text-center" placeholder="Email address…" type="email">
                                    </div>
                                    <button class="btn btn-default btn-full" type="submit">Sign Up</button>
                                </form>
                                <span class="newsletter-privacy text-center mt-3">By signing up, you agree to our <a href="#">Privacy Policy</a></span>
                            </div>
                        </div> --}}

                        {{-- <!-- widget post carousel -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Celebration</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <div class="post-carousel-widget">
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">Trending</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-2.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">Master The Art Of Nature With These 7 Tips</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                    <!-- post -->
                                    <div class="post post-carousel">
                                        <div class="thumb rounded">
                                            <a href="category.html" class="category-badge position-absolute">How to</a>
                                            <a href="blog-single.html">
                                                <div class="inner">
                                                    <img src="images/widgets/widget-carousel-1.jpg" alt="post-title" />
                                                </div>
                                            </a>
                                        </div>
                                        <h5 class="post-title mb-0 mt-4"><a href="blog-single.html">5 Easy Ways You Can Turn Future Into Success</a></h5>
                                        <ul class="meta list-inline mt-2 mb-0">
                                            <li class="list-inline-item"><a href="#">Katen Doe</a></li>
                                            <li class="list-inline-item">29 March 2021</li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- carousel arrows -->
                                <div class="slick-arrows-bot">
                                    <button type="button" data-role="none" class="carousel-botNav-prev slick-custom-buttons" aria-label="Previous"><i class="icon-arrow-left"></i></button>
                                    <button type="button" data-role="none" class="carousel-botNav-next slick-custom-buttons" aria-label="Next"><i class="icon-arrow-right"></i></button>
                                </div>
                            </div>
                        </div> --}}

                        <!-- widget advertisement -->
                        <div class="widget no-container rounded text-md-center">
                            <span class="ads-title">- Sponsored Ad -</span>
                            <a href="#" class="widget-ads">
                                <img src="images/ads/ad-360.png" alt="Advertisement" />
                            </a>
                        </div>

                        <!-- widget tags -->
                        <div class="widget rounded">
                            <div class="widget-header text-center">
                                <h3 class="widget-title">Tag Clouds</h3>
                                <img src="images/wave.svg" class="wave" alt="wave" />
                            </div>
                            <div class="widget-content">
                                <a href="#" class="tag">#Trending</a>
                                <a href="#" class="tag">#Video</a>
                                <a href="#" class="tag">#Featured</a>
                                <a href="#" class="tag">#Gallery</a>
                                <a href="#" class="tag">#Celebrities</a>
                            </div>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </section>
@endsection
