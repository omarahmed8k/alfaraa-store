@php
$info = \App\Models\Info::first();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ __('main.dir') }}">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="google-site-verification" content="SbJJEspZ0PfZS9VtQPkbi4FXIEpfdRupsUUL75nnpgc" />
    <title>@yield('title',$general->title)</title>
    <meta name="description" content="@yield('description',$general->description)">

    @yield('meta')

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{asset('assetsfront/images/favicon.svg')}}" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{asset('assetsfront/css/vendor/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsfront//css/vendor/plaza-icon.css')}}">
    <link rel="stylesheet" href="{{asset('assetsfront//css/vendor/jquery-ui.min.css')}}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{asset('assetsfront/css/plugins/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assetsfront/css/plugins/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsfront/css/plugins/aos.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsfront/css/plugins/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('assetsfront/css/plugins/venobox.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assetsfront/css/styles.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@700;800&display=swap" rel="stylesheet">

    @if(request()->route()->named('veiwhome'))
    {{--<link rel="stylesheet" href="{{asset('assetsfront/ramadan/particles.css')}}?v=1.02" id="particles-link">--}}
    {{--<script src="{{asset('assetsfront/ramadan/particles.js')}}?v=1" id="particles-script"></script>--}}
    {{--<script src="{{asset('assetsfront/ramadan/confetti.js')}}?v=1.01"></script>--}}
    @endif

    {{--
    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <link rel="stylesheet" href="assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="{{asset('assetsfront/css/plugins/plugins.min.css')}}">
    <link rel="stylesheet" href="{{asset('assetsfront/css/style.min.css')}}"> -->
    --}}

    @if( __('main.dir') == 'rtl' )
    <style>
        .offcanvas-menu-expand::after {
            right: auto;
            left: 0;
        }

        .sub-menu>li>a:hover {
            transform: translateX(-10px);
        }

        .sub-menu>li>a {
            text-align: right;
        }

        .sub-menu>li>a::after {
            left: auto;
            right: 0;
        }

        .sub-menu>li>a:hover:after {
            transform: translate(10px, -50%);
        }

        .faq-accordian {
            text-align: right;
        }

        .contact-details-icon {
            margin-left: 20px;
        }
    </style>
    @endif

    <style>
        .footer-social>li {
            margin-right: 10px;
        }

        .footer-social>li:last-child {
            margin-right: 10px;
        }

        .page-pagination li:last-child {
            margin-right: 15px;
        }

        .product-default-link a {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .product-default-link a:hover {
            color: #ec2029;
            overflow: unset !important;
            white-space: unset !important;
        }

        .product-default-img {
            object-fit: contain;
            max-height: 273px;
        }

        .search-image {
            display: inline-block;
            position: absolute;
            left: 70px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .search-image input {
            width: 60px;
            height: 60px;
            position: absolute;
            left: 0px;
            top: -30px;
            opacity: 0;
            cursor: pointer;
            z-index: 2;
        }

        .browse-file-img {
            position: absolute;
            top: -20px;
            left: 0;
            cursor: pointer;
            z-index: 1;
        }

        .search-image img {
            cursor: pointer;
        }

        .search-image::after {
            content: 'new';
            position: absolute;
            top: 20px;
            left: 12.5px;
            background: #46b590;
            color: #ffffff;
            padding: 0px 5px;
            border-radius: 5px;
            z-index: 99999;
        }
    </style>

    @yield('css')

    @if(request()->route()->named('veiwhome'))
    {{--<style>
        #loader {
          position: fixed;
          width: 100%;
          height: 100vh !important;
          z-index: 999999;
          overflow: visible;
          /*background: #fff url('https://store.alfaraaonline.com.sa/assetsfront/ramadan/Grand-Opening-Invitation-Instagram-Post.gif') no-repeat center center;*/
          background: #fff url('{{asset("assetsfront/ramadan/Grand-Opening2.png")}}') no-repeat center center;
    }

    #loader > button {
    padding: 15px 10px;
    background-color: #c40e0e;
    border-radius: 8px;
    color: white;
    font-weight: bolder;
    font-size: 20px;
    position: absolute;
    bottom: 93px;
    left: 643px;
    }
    @media (max-width: 740px) {
    #loader {
    background-size: contain;
    background-attachment: fixed;
    }

    #loader > button {
    font-size: 15px;
    position: absolute;
    bottom: 30%;
    left: 35%;
    }
    }
    </style>--}}
    @endif
</head>

<body>
    <!--
    <div class="elwatany-fixed">
        <div class="container">
            <div class="row">
                <h4>
                    @Lang('main.elwatany')
                </h4>
            </div>
        </div>
    </div>
    -->

    <div id="content">

        <div id="cart-icon" class="offcanvas-toggle cart-icon">
            <i class="icon-shopping-cart"></i>
            <span class="count-style" id="cart-count">0</span>
        </div>
        <!-- ...:::: Start Header Section:::... -->
        <header class="header-section d-lg-block d-none">
            <!-- Start Bottom Area -->
            <div class="header-bottom sticky-header">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <!-- Header Main Menu -->
                            <div class="main-menu">
                                <nav>
                                    <a class="logo" href="{{ route('veiwhome') }}"><img src="{{asset('assetsfront/images/logo/logo-light.png')}}" alt="logo"></a>
                                    <ul>
                                        <li>
                                            <a class="{{Route::current()->getName() == 'veiwhome' ? 'active main-menu-link' : '' }}" href="{{ route('veiwhome') }}">@Lang('main.Home')</a>
                                        </li>
                                        @if(\App\Models\Category::count() > 0)
                                        <li class="has-dropdown">
                                            <a class=" main-menu-link {{Route::current()->getName() == 'front-category' ? 'active main-menu-link' : '' }}" href="{{ route('front-category') }}">
                                                @Lang('main.Categories')
                                                <i class="fa fa-angle-down" style="margin-{{ __('main.dir') == 'rtl' ? 'right' : 'left' }}: 3px "></i>
                                            </a>
                                            <ul class="sub-menu">
                                                @foreach (\App\Models\Category::all() as $category)
                                                <li>
                                                    <a href="{{route('front-show-category',$category->id)}}">{{$category['name_'.app()->getLocale()]}}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                        @endif
                                        <li>
                                            <a class="{{Route::current()->getName() == 'front-product' ? 'active main-menu-link' : '' }}" href="{{ route('front-product') }}">@Lang('main.Products')</a>
                                        </li>
                                        <li>
                                            <a href="https://alfaraaonline.com.sa/" target="_blank">@Lang('main.Website')</a>
                                        </li>
                                        <li>
                                            <a class="{{Route::current()->getName() == 'front-contact' ? 'active main-menu-link' : '' }}" href="{{route('front-contact')}}">@Lang('main.Contact us')</a>
                                        </li>
                                        <li>
                                            @if(app()->getLocale() == 'ar')
                                            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img class="user-sub-menu-in-icon" src="{{asset('assetsfront/images/icon/32.png')}}" alt="language" width=25px> English</a>
                                            @else
                                            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img class="user-sub-menu-in-icon" src="{{asset('assetsfront/images/icon/32s.png')}}" alt="language" width=25px> العربية</a>
                                            @endif
                                        </li>
                                    </ul>
                                </nav>
                            </div> <!-- Header Main Menu Start -->
                        </div>
                    </div>
                </div>
            </div> <!-- End Bottom Area -->
        </header> <!-- ...:::: End Header Section:::... -->

        <!-- ...:::: Start Mobile Header Section:::... -->
        <div class="mobile-header-section d-block d-lg-none">
            <!-- Start Mobile Header Wrapper -->
            <div class="mobile-header-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between align-items-center">
                            <div class="mobile-header--left">
                                <a href="{{ route('veiwhome') }}" class="mobile-logo-link">
                                    <img src="{{asset('assetsfront/images/logo/logo.png')}}" alt="logo" width="50%" class="mobile-logo-img">
                                </a>
                            </div>
                            <div class="mobile-header--right">
                                <a href="#mobile-menu-offcanvas" class="mobile-menu offcanvas-toggle">
                                    <span class="mobile-menu-dash"></span>
                                    <span class="mobile-menu-dash"></span>
                                    <span class="mobile-menu-dash"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Mobile Header Wrapper -->
        </div> <!-- ...:::: Start Mobile Header Section:::... -->

        <!-- ...:::: Start Offcanvas Mobile Menu Section:::... -->
        <div id="mobile-menu-offcanvas" class="offcanvas offcanvas-leftside offcanvas-mobile-menu-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header d-flex justify-content-end">
                <button class="offcanvas-close"><i class="fa fa-times"></i></button>
            </div> <!-- End Offcanvas Header -->
            <!-- Start Offcanvas Mobile Menu Wrapper -->
            <div class="offcanvas-mobile-menu-wrapper">
                <!-- Start Mobile Menu User Center -->
                <div class="mobile-menu-center">
                    <form class="hero-search" action="{{ route('front-product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="header-search-box default-search-style d-flex">
                            <input name="name" class="default-search-style-input-box" type="search" placeholder="@Lang('main.searchBy')" value="{{ request()->name }}">
                            <div class="search-image">
                                <input type="file" name="image" accept="image/*">
                                <div class="browse-file-img">
                                    <img src="{{asset('assetsfront/images/search-image.png')}}" alt="search" style="width: 40px; height: 40px; margin-left: 10px; margin-right: 10px;">
                                </div>
                            </div>
                            <button class="default-search-style-input-btn" type="submit"><i class="icon-search"></i></button>
                        </div>
                    </form>

                </div> <!-- End Mobile Menu User Center -->
                <!-- Start Mobile Menu Bottom -->
                <div class="mobile-menu-bottom">
                    <!-- Start Mobile Menu Nav -->
                    <div class="offcanvas-menu">
                        <ul>
                            <li><a href="{{ route('veiwhome') }}">@Lang('main.Home')</a></li>
                            @if(\App\Models\Category::count() > 0)
                            <li class="">
                                <div class="offcanvas-menu-expand"></div>
                                <a href="{{ route('front-category') }}"><span>@Lang('main.Categories')</span></a>
                                <ul class="mobile-sub-menu" style="display: none;">
                                    @foreach (\App\Models\Category::all() as $category)
                                    <li>
                                        <a href="{{route('front-show-category',$category->id)}}">{{$category['name_'.app()->getLocale()]}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            @endif
                            <li><a href="{{ route('front-product') }}">@Lang('main.Products')</a></li>
                            <li><a href="https://alfaraaonline.com.sa/" target="_blank">@Lang('main.Website')</a></li>
                            <li><a href="{{route('front-contact')}}">@Lang('main.Contact us')</a></li>
                            @if(app()->getLocale() == 'ar')
                            <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img class="user-sub-menu-link-icon" src="{{asset('assetsfront/images/icon/32.png')}}" alt="language" width=25px> English</a></li>
                            @else
                            <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img class="user-sub-menu-link-icon" src="{{asset('assetsfront/images/icon/32s.png')}}" alt="language" width=25px> العربية</a></li>
                            @endif
                        </ul>
                    </div> <!-- End Mobile Menu Nav -->

                </div> <!-- End Mobile Menu Bottom -->
            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!-- ...:::: Start Offcanvas Addcart Section :::... -->
        <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
            <div class="offcanvas-header text-end">
                <button class="offcanvas-close"><i class="fa fa-times"></i></button>
            </div>

            <h4>
                @Lang('main.Cart')
            </h4>

            <ul class="cart-items" id="cart-items" class="offcanvas-add-cart-wrap">
            </ul>

            <a id="cart-order-whatsapp" href="" class="hero-button mt-5 text-center" target="_blank" rel="nofollow">
                <i class="fa fa-whatsapp"></i>
                @Lang('main.Order')
            </a>

        </div>

        @yield('content')

        <!-- ...:::: Start Footer Section:::... -->
        <footer class="footer-section">
            <!-- Start Footer Top Area -->
            <div class="footer-top section-inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12 col-sm-12">
                            <div class="footer-widget footer-widget-contact" data-aos="fade-up" data-aos-delay="0">
                                <div class="footer-logo">
                                    <a href="{{route('veiwhome')}}"><img src="{{asset('images/'.$general->image)}}" alt="logo" class="img-fluid"></a>
                                </div>
                                <div class="footer-contact">
                                    <p>{{$general->description}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                            <h3 class="footer-widget-title">@lang('main.branches')</h3>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche1')</li>
                                    <li><a href="https://maps.app.goo.gl/4rsxMAiozGxB7a9c6" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche1Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche1Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche1Phone')</span></a></li>
                                    <li><a href="@Lang('main.branche1Whatsapp')" target="_blank"><i class="fa fa-whatsapp"></i><span class="px-1">@Lang('main.whatsapp')</span></a></li>
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche2')</li>
                                    <li><a href="https://maps.app.goo.gl/RQ1WqJBHKE89pgeQA" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche2Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche2Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche2Phone')</span></a></li>
                                    <li><a href="@Lang('main.branche2Whatsapp')" target="_blank"><i class="fa fa-whatsapp"></i><span class="px-1">@Lang('main.whatsapp')</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                            <h3 class="footer-widget-title"> &nbsp;</h3>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche3')</li>
                                    <li><a href="https://maps.app.goo.gl/6vXnw5rXc5RfeVTS8" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche3Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche3Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche3Phone')</span></a></li>
                                    <li><a href="@Lang('main.branche3Whatsapp')" target="_blank"><i class="fa fa-whatsapp"></i><span class="px-1">@Lang('main.whatsapp')</span></a></li>
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche4')</li>
                                    <li><a href="https://maps.app.goo.gl/HxvppHccMUJeqMp17" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche4Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche4Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche4Phone')</span></a></li>
                                    <li><a href="@Lang('main.branche4Whatsapp')" target="_blank"><i class="fa fa-whatsapp"></i><span class="px-1">@Lang('main.whatsapp')</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 mt-5">
                            <h3 class="footer-widget-title"> &nbsp;</h3>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche5')</li>
                                    <li><a href="https://alfaraaonline.com.sa/" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche5Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche5Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche5Phone')</span></a></li>
                                    <li><a href="@Lang('main.branche5Whatsapp')" target="_blank"><i class="fa fa-whatsapp"></i><span class="px-1">@Lang('main.whatsapp')</span></a></li>
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche6')</li>
                                    <li><a href="https://maps.app.goo.gl/UGdnYyeybPd4Le427" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche6Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche6Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche6Phone')</span></a></li>
                                    <li><a href="@Lang('main.branche6Whatsapp')" target="_blank"><i class="fa fa-whatsapp"></i><span class="px-1">@Lang('main.whatsapp')</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom Area -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="footer-rights">
                                <p class="copyright-area-text" style="display: inline-block;">
                                    @Lang('main.rights')
                                    <script>
                                        document.write(new Date().getFullYear());
                                    </script>
                                    <a class="copyright-link" href="https://www.alfaraaonline.com.sa/" target="_blank">الفارع-ALFARAA</a>
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <ul class="footer-social">
                                <li><a href="{{$info->facebook}}" target="_ blank" class="facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$info->snapchat}}" target="_ blank" class="youtube"><i class="fa fa-snapchat"></i></a></li>
                                <li><a href="https://wa.me/{{$info->whatsapp}}?text=مرحبا" target="_ blank" class="pinterest"><i class="fa fa-whatsapp"></i></a></li>
                                <li><a href="{{$info->instagram}}" target="_ blank" class="instagram"><i class="fa fa-instagram"></i></a></li>
                                <li>
                                    <a href="https://www.tiktok.com/@alfaraa00" target="_ blank" class="tiktok">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                            <path d="M448,209.91a210.06,210.06,0,0,1-122.77-39.25V349.38A162.55,162.55,0,1,1,185,188.31V278.2a74.62,74.62,0,1,0,52.23,71.18V0l88,0a121.18,121.18,0,0,0,1.86,22.17h0A122.18,122.18,0,0,0,381,102.39a121.43,121.43,0,0,0,67,20.14Z" />
                                        </svg>
                                    </a>
                                </li>
                                <li><a href="https://twitter.com/alfaraa0" target="_ blank" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- End Footer Bottom Area -->
        </footer>
        <!-- ...:::: End Footer Section:::... -->
    </div>

    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->

    @if(request()->route()->named('veiwhome'))
    {{--<script>
            // function backNormal(){
            //     const element = document.getElementById('loader');
            //     element.style.display = 'none';
            // }
            // setTimeout(function() { backNormal(); }, 4500);
            document.getElementById('start-page').addEventListener('click',function(e){
                const element = document.getElementById('loader');
                element.style.display = 'none';
                startConfetti();
                setTimeout(function() { stopConfetti(); }, 4000);
                const element2 = document.getElementById('content');
                element2.style.display = 'block';
            });
        </script>--}}
    @endif

    <script src="{{asset('assetsfront/js/vendor/modernizr-3.11.2.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/vendor/jquery-ui.min.js')}}"></script>

    <!--Plugins JS-->
    <script src="{{asset('assetsfront/js/plugins/slick.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/plugins/material-scrolltop.js')}}"></script>
    <script src="{{asset('assetsfront/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/plugins/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/plugins/venobox.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/plugins/aos.min.js')}}"></script>
    <script src="{{asset('assetsfront/js/plugins/ajax-mail.js')}}"></script>

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->
    <!-- <script src="assets/js/vendor.min.js"></script>
    <script src="assets/js/plugins.min.js"></script> -->

    <!-- Main JS -->
    <script>
        window.lang = "{{app()->getLocale()}}";
    </script>
    <script src="{{asset('assetsfront/js/main.js?v2.06')}}"></script>

    <script>
        const addToCartButtons = document.querySelectorAll('#add-to-cart');
        const toggleCart = document.getElementById('offcanvas-add-cart');
        const cartIcon = document.getElementById('cart-icon');
        const cartItems = document.getElementById('cart-items');
        const cartOrderWhatsapp = document.getElementById('cart-order-whatsapp');
        const cartCount = document.getElementById('cart-count');

        let products = JSON.parse(localStorage.getItem('products')) || [];

        function updateCartUI() {
            cartCount.textContent = products.length;
            cartOrderWhatsapp.style.display = products.length > 0 ? 'block' : 'none';
        }

        function renderProducts() {
            cartItems.innerHTML = ''; // Clear existing items
            products.forEach(renderProduct);
        }

        function renderProduct(product) {
            const li = document.createElement('li');
            li.classList.add('offcanvas-add-cart-list');
            li.innerHTML =
                `
                    <div class="cart-item">
                        <img src="${product.image}" alt="Cart Product Image" onclick="viewProduct(${product.id})" style="cursor: pointer;">
                        <div class="info">
                            <span onclick="viewProduct(${product.id})" style="cursor: pointer;">
                                ${product.name} ${product.data_nickname_main}
                            </span>
                            <br>
                            ${product.data_nickname_st}${product.data_nickname_num}
                            <br>
                            <button type="button" onclick="adjustQuantity(${product.id}, 1)" class="btn btn-sm btn-primary">+</button>
                            <span class="cart-quantity">${product.quantity || 1}</span>
                            <button type="button" onclick="adjustQuantity(${product.id}, -1)" class="btn btn-sm btn-danger">-</button>
                        </div>
                        <div onclick="removeFromCart(${product.id})" class="cart-remove">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                `;
            cartItems.appendChild(li);
        }

        function addToCart(product) {
            const foundProduct = products.find((p) => p.id == product.id);
            if (foundProduct) {
                foundProduct.quantity += 1;
            } else {
                product.quantity = 1;
                products.push(product);
            }
            localStorage.setItem('products', JSON.stringify(products));
            updateCartUI();
            renderProducts();
        }

        cartIcon.addEventListener('click', () => {
            toggleCart.classList.add('offcanvas-open');
        });

        cartOrderWhatsapp.addEventListener('click', () => {
            // Build the message content with the products in the cart
            const baseUrl = window.location.origin;
            const productsMessage = products.map((p) => ` الكمية:${p.quantity} ${p.name} ${p.data_nickname_main} ${baseUrl}/product/${p.id}`).join('\n');
            const whatsappMessage =
                `مرحبًا أريد طلب المنتجات التالية:
${productsMessage}
`;

            // Construct the WhatsApp link with the message content
            const whatsappUrl = `https://wa.me/{{$info->whatsapp}}?text=${encodeURI(whatsappMessage)}`;
            // Open a new window to send the WhatsApp message
            window.open(whatsappUrl, '_blank');
        });

        addToCartButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const product = {
                    id: button.getAttribute('data-id') || '',
                    name: button.getAttribute('data-name') || '',
                    image: button.getAttribute('data-image') || '',
                    data_nickname_main: button.getAttribute('data-nickname-main') || '',
                    data_nickname_st: button.getAttribute('data-nickname-st') || '',
                    data_nickname_num: button.getAttribute('data-nickname-num') || '',
                    data_quantity: button.getAttribute('data-quantity') || 1,
                };
                addToCart(product);
                toggleCart.classList.add('offcanvas-open');
            });
        });

        function adjustQuantity(id, change) {
            console.log(id, change)
            products = products.map((p) => {
                console.log(p)
                if (p.id == id) {
                    p.quantity += change;
                }
                return p;
            }).filter((p) => p.quantity > 0);

            localStorage.setItem('products', JSON.stringify(products));
            renderProducts();
            updateCartUI();
        }

        function removeFromCart(id) {
            products = products.filter((p) => p.id != id);
            localStorage.setItem('products', JSON.stringify(products));
            renderProducts();
            updateCartUI();
            console.log(products)
        }

        function viewProduct(id) {
            window.location.href = `/product/${id}`;
        }

        renderProducts();
        updateCartUI();
    </script>


    @include('sweetalert::alert')
</body>

</html>