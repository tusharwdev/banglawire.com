<div class="nav_container">
    <div class="nav_top_container">
        <div class="nav_top">
            <div class="nav_top_leftText">
                <h4 style="color:whitesmoke;"><span>Stay Connected</span> | <span>We Report to You</span>  </h4>
            </div>
            <div class="nav_top_icons">
                {{--                    <span class="search_icon"><i class="fas fa-search"></i></span>--}}
                <a href="https://www.facebook.com/banglawire.net" style="color: white"><span><i class="fab fa-facebook-f"></i></span></a>
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

        <div class="nav_date_container" style="margin-top: 10px;background-color: white">
            <p id="date_time" style="color: black;margin-left: -75px;"></p>
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


                        @foreach ($categories as $category)
                        <li class="nav-item dropdown" >
                                <a class="nav-link dropdown-toggle" style="color: black" href="{{route('get.category',$category->id)}}" id="{{$category->id}}" role="button"  >
                                    {{$category->category_name}}
                                </a>
                                @if ($category->relationtosubcategory->count()!=0)

                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        @foreach ($category->relationtosubcategory as $subcategory)
                                            <li><a class='dropdown-item' style="color: black" href="{{route('get.subcategory',$subcategory->id)}}">{{$subcategory->subcategory_name}}{{$subcategory->id}}</a></li>
                                            {{-- "<li><a class='dropdown-item' href="{{route('get.subcategory')}}">".hello."</a></li>" --}}
                                        @endforeach
                                    </ul>
                                @endif
                        </li>
                    @endforeach
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="{{ route('about') }}">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" style="color: black" href="{{ route('contact') }}">Contact-Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

</div>
<br>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js" integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g==" crossorigin="anonymous"></script>
<script>

</script>
