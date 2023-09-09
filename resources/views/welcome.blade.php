@extends('frontlayouts.layouts')

@section('css')
    <style>
        @media (min-width: 768px) {
            .slick-list.draggable {
                max-height: 450px;
            }
            .hero-content {
                top: 45%
            }
            .hero-img {
                max-height: 400px;
            }
        }
    </style>
@endsection

@section('content')
<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Hero Area Section:::... -->
<div class="hero-area">

    <div class="hero-area-wrapper hero-slider-dots fix-slider-dots" >
        <!-- Start Hero Slider Single -->
        @foreach($sliders as $slider)
        <div class="hero-area-single" >
            <div class="hero-area-bg">
                <img class="hero-img" src="{{asset('images/'.$slider->image)}}" alt=""
                 style="background: white; opacity: 40%;">
            </div>
            <div class="hero-content">
                <div class="container">
                    <div class="row">
                        <div class="col-10 col-md-8 col-xl-6">
                            <h5>{{ $slider['title_'.app()->getLocale()] }}</h5>
                            <h2>{{ $slider['spantitle_'.app()->getLocale()] }}</h2>
                            <p>{{ $slider['description_'.app()->getLocale()] }}</p>
                            @if($general->links == 'yes')
                                <a href="{{ route('front-product') }}"  class="hero-button"> @Lang('main.Shop now')</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- End Hero Slider Single -->
    </div>
</div> <!-- ...:::: End Hero Area Section:::... -->

<!-- ...:::: Start Product Catagory Section:::... -->
<div class="product-catagory-section section-top-gap-100"></div> <!-- ...:::: End Product Catagory Section:::... -->

<div class="banner-section section-top-gap-100">
    <!-- Start Banner Wrapper -->
    <div class="banner-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <!-- Start Header Search -->
                    <div class="header-search">
                        <form action="{{ route('front-product') }}" method="get">
                            <div class="header-search-box default-search-style d-flex">
                                <input name="name" class="default-search-style-input-box border-around border-right-none" type="search" placeholder="ابحث عن المنتج هنا برقم او اسم المنتج" required>
                                <button class="default-search-style-input-btn" type="submit"><i class="icon-search"></i></button>
                            </div>
                        </form>
                    </div> <!-- End Header Search -->
                </div>
            </div>
        </div>
    </div>
</div>

@if($general->products == 'yes')
<!-- ...:::: Start Banner Section:::... -->
<div class="banner-section section-top-gap-100">
    <!-- Start Banner Wrapper -->
    <div class="banner-wrapper">
        <div class="container">
            <div class="row">
            @foreach($category as $categ)

                <div class="col-lg-3 col-md-6 col-12">
                    <!-- Start Banner Single -->
                    <div class="banner-single" data-aos="fade-up"  data-aos-delay="0">
                        <a href="{{route('front-show-category',['id'=> $categ->id])}}" class="banner-img-link">
                            <img class="banner-img" src="{{asset('images/'.$categ->image)}}" height="230" alt="">
                        </a>
                        <div class="banner-content">
                            <span class="banner-text-tiny" style="background-color: #ffffff73;color:black;font-size: 20px;"> {{ $categ['name_'.app()->getLocale()] }}</span>
                            <!-- <h3 class="banner-text-large">30% خصم</h3> -->
                            <a href="{{route('front-show-category',['id'=> $categ->id])}}" class="banner-link"> @Lang('main.Shop now')</a>
                        </div>
                    </div> <!-- End Banner Single -->

                </div>
                @endforeach

            </div>
        </div>
    </div> <!-- End Banner Wrapper -->
</div> <!-- ...:::: End Banner Section:::... -->
@endif

@if($general->products == 'yes')
<!-- ...:::: Start Product Tab Section:::... -->
<div class="product-tab-section section-top-gap-100">
    <!-- Start Section Content -->
    <div class="section-content-gap">
        <div class="container">
            <div class="row">
                <div class="section-content text-center d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                    <h3 class="section-title text-center" data-aos="fade-up"  data-aos-delay="0">@Lang('main.New items')</h3>
                    <!-- <ul class="tablist nav product-tab-btn" data-aos="fade-up"  data-aos-delay="400">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#car_and_drive">محرك السيارة </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#motorcycle">عجلات السيارة</a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#truck_drive">قطع غيار</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div> <!-- End Section Content -->

    <!-- Start Tab Wrapper -->
    <div class="product-tab-wrapper" data-aos="fade-up"  data-aos-delay="50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content tab-animate-zoom">
                        <div class="tab-pane show active" id="car_and_drive">
                            <div class="product-default-slider product-default-slider-4grids-1row">
                                <!-- Start Product Defautlt Single -->
                                @foreach($products as $product)
                                <div class="product-default-single border-around text-center">
                                    <div class="product-img-warp">
                                        <a href="{{route('front-show-product',['id'=> $product->id])}}" class="product-default-img-link">
                                            <img src="{{asset('images/'.$product->image)}}" alt="" class="product-default-img img-fluid">
                                        </a>
                                        <div class="product-action-icon-link">
                                            <ul>

                                                <!-- <li><a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-eye"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product-default-content">
                                        <h6 class="product-default-link"><a href="{{route('front-show-product',['id'=> $product->id])}}">{{ $product['name_'.app()->getLocale()] }}</a></h6>

                                        @foreach($info as $inf)
                                        @php
                                            $link = "https://wa.me/{$inf->whatsapp}?text=";
                                            $link .= "السلام عليكم";
                                            $link .= "%0a";
                                            $link .= "عندي استفسار بخصوص المنتج";
                                            $link .= "%0a";
                                            $link .= $product['name_'.app()->getLocale()];
                                            $link .= "%0a";
                                            $link .= $product->nickname_main;
                                            $link .= "%0a";
                                            $link .= route('front-show-product',$product->id);
                                        @endphp
                                            {{--<a href="https://wa.me/{{$inf->whatsapp}}?text=من فضلك اريد هذا {{ $product['name_'.app()->getLocale()] }}" class="hero-button">  @Lang('main.request product')</a>--}}
                                            <a href="{{$link}}" class="hero-button">  @Lang('main.request product')</a>

                                        @endforeach
                                        <!-- <span class="product-default-price"><del class="product-default-price-off">$30.12</del> $25.12</span> -->
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Product Defautlt Single -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Catagory Wrapper -->

</div> <!-- ...:::: End Product Tab Section:::... -->
    </div>
</div>
@endif

<!-- ...:::: Start Product Catagory Section:::... -->
<div class="banner-section section-top-gap-100">
    <!-- Start Banner Wrapper -->
    <div class="banner-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Banner Single -->
                    <div class="banner-single" data-aos="fade-up"  data-aos-delay="0">
                        <a href="#" class="banner-img-link">
                            <img class="banner-img banner-img-big" src="{{asset('images/'.$general->slider)}}" alt="">
                        </a>
                        <div class="banner-content">
                            <span class="banner-text-small">{{$general->slider_txt1}}</span>
                            <!--<h2 class="banner-text-big"><span class="banner-text-big-highlight">-40%</span> خصم على جميع المنتجات</h2>-->
                            <h2 class="banner-text-big">{{$general->slider_txt2}}</h2>
                        </div>
                    </div> <!-- End Banner Single -->
                </div>
            </div>
        </div>
    </div> <!-- End Banner Wrapper -->
</div> <!-- ...:::: End Product Catagory Section:::... -->

@if($general->products == 'yes')
<!-- ...:::: Start Product Tab Section:::... -->
<div class="product-tab-section section-top-gap-100">
    <!-- Start Section Content -->
    <div class="section-content-gap">
        <div class="container">
            <div class="row">
                <div class="section-content d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column">
                    <h3 class="section-title" data-aos="fade-up" data-aos-delay="0">@Lang('main.Best selling items')</h3>
                    <!-- <ul class="tablist nav product-tab-btn" data-aos="fade-up"  data-aos-delay="400">
                        <li><a class="nav-link active" data-bs-toggle="tab" href="#car_and_drive">محرك السيارة </a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#motorcycle">عجلات السيارة</a></li>
                        <li><a class="nav-link" data-bs-toggle="tab" href="#truck_drive">قطع غيار</a></li>
                    </ul> -->
                </div>
            </div>
        </div>
    </div> <!-- End Section Content -->

    <!-- Start Tab Wrapper -->
    <div class="product-tab-wrapper" data-aos="fade-up"  data-aos-delay="50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content tab-animate-zoom">
                        <div class="tab-pane show active" id="car_and_drive">
                            <div class="product-default-slider product-default-slider-4grids-1row">
                                <!-- Start Product Defautlt Single -->
                                @foreach($best as $product)
                                <div class="product-default-single border-around text-center">
                                    <div class="product-img-warp">
                                        <a href="{{route('front-show-product',['id'=> $product->id])}}" class="product-default-img-link">
                                            <img src="{{asset('images/'.$product->image)}}" alt="" class="product-default-img img-fluid">
                                        </a>
                                        <div class="product-action-icon-link">
                                            <ul>

                                                <!-- <li><a href="#" data-bs-toggle="modal" data-bs-target="#modalQuickview"><i class="icon-eye"></i></a></li> -->
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="product-default-content">
                                        <h6 class="product-default-link"><a href="{{route('front-show-product',['id'=> $product->id])}}">{{ $product['name_'.app()->getLocale()] }}</a></h6>
                                        @foreach($info as $inf)
                                        @php
                                            $link = "https://wa.me/{$inf->whatsapp}?text=";
                                            $link .= "السلام عليكم";
                                            $link .= "%0a";
                                            $link .= "عندي استفسار بخصوص المنتج";
                                            $link .= "%0a";
                                            $link .= $product['name_'.app()->getLocale()];
                                            $link .= "%0a";
                                            $link .= $product->nickname_main;
                                            $link .= "%0a";
                                            $link .= route('front-show-product',$product->id);
                                        @endphp
                                            {{--<a href="https://wa.me/{{$inf->whatsapp}}?text=من فضلك اريد هذا {{ $product['name_'.app()->getLocale()] }}" class="hero-button">  @Lang('main.request product')</a>--}}
                                            <a href="{{$link}}" class="hero-button">  @Lang('main.request product')</a>
                                        @endforeach                                        <!-- <span class="product-default-price"><del class="product-default-price-off">$30.12</del> $25.12</span> -->
                                    </div>
                                </div>
                                @endforeach
                                <!-- End Product Defautlt Single -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Catagory Wrapper -->


</div> <!-- ...:::: End Product Tab Section:::... -->
    </div>
</div>
@endif

<!-- ...:::: Start Company Logo Section:::... -->
<div class="company-logo-section section-top-gap-100">
    <!-- Start Company Logo Wrapper -->
    <div class="company-logo-wrapper" data-aos="fade-up"  data-aos-delay="50">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="company-logo-slider" data-slick='{ "slidesToShow": {{isset($company) ? ( count($company) >= 6 ? count($company) -2 : count($company) ) : 0 }},"slidesToScroll": {{isset($company) ? 1 : 0 }} }'>
                        <!-- Start Company logo Single -->
                        @foreach($company as $comp)
                        <div class="company-logo-single">
                            <img src="{{asset('images/'.$comp->image)}}" alt="" width="120"  class="img-fluid company-logo-image">
                        </div> <!-- End Company logo Single -->
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Company Logo Wrapper -->
</div> <!-- ...:::: End Company Logo Section:::... -->


@endsection
