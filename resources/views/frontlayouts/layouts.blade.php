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
    <link rel="stylesheet" href="{{asset('assetsfront/css/stylee.css')}}">
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
    <div id="content">
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
                                    <a class="logo" href="{{ route('veiwhome') }}"><img src="{{asset('assetsfront/images/logo/logo-light.png')}}"></a>
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
                                            <a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img class="user-sub-menu-in-icon" src="{{asset('assetsfront/images/icon/32.png')}}" alt="" width=25px> English</a>
                                            @else
                                            <a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img class="user-sub-menu-in-icon" src="{{asset('assetsfront/images/icon/32s.png')}}" alt="" width=25px> العربية</a>
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
                                    <img src="{{asset('assetsfront/images/logo/logo.png')}}" alt="" width="50%" class="mobile-logo-img">
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
                    <form action="{{ route('front-product') }}" method="get">
                        <div class="header-search-box default-search-style d-flex">
                            <input class="default-search-style-input-box border-around border-right-none" name="name" type="search" placeholder="@Lang('main.Enter your search words')" required>
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
                            <li><a href="{{ LaravelLocalization::getLocalizedURL('en') }}"><img class="user-sub-menu-link-icon" src="{{asset('assetsfront/images/icon/32.png')}}" alt="" width=25px> English</a></li>
                            @else
                            <li><a href="{{ LaravelLocalization::getLocalizedURL('ar') }}"><img class="user-sub-menu-link-icon" src="{{asset('assetsfront/images/icon/32s.png')}}" alt="" width=25px> العربية</a></li>
                            @endif
                        </ul>
                    </div> <!-- End Mobile Menu Nav -->

                </div> <!-- End Mobile Menu Bottom -->
            </div> <!-- End Offcanvas Mobile Menu Wrapper -->
        </div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

        <!-- ...:::: Start Offcanvas Addcart Section :::... -->
        <div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
            <!-- Start Offcanvas Header -->
            <div class="offcanvas-header text-end">
                <button class="offcanvas-close"><i class="fa fa-times"></i></button>
            </div> <!-- End Offcanvas Header -->

            <!-- Start  Offcanvas Addcart Wrapper -->
            <!-- End  Offcanvas Addcart Wrapper -->

        </div> <!-- ...:::: End  Offcanvas Addcart Section :::... -->

        <!-- ...:::: Start Offcanvas Mobile Menu Section:::... -->
        <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
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
                                    <a href="{{route('veiwhome')}}"><img src="{{asset('images/'.$general->image)}}" alt="" class="img-fluid"></a>
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
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche2')</li>
                                    <li><a href="https://maps.app.goo.gl/RQ1WqJBHKE89pgeQA" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche2Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche2Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche2Phone')</span></a></li>
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
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche4')</li>
                                    <li><a href="https://maps.app.goo.gl/HxvppHccMUJeqMp17" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche4Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche4Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche4Phone')</span></a></li>
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
                                </ul>
                            </div>
                            <div class="footer-menu">
                                <ul class="footer-menu-nav">
                                    <li>@Lang('main.branche6')</li>
                                    <li><a href="https://maps.app.goo.gl/UGdnYyeybPd4Le427" target="_blank"><i class="fa fa-map-marker"></i><span class="px-1">@Lang('main.branche6Address')</span></a></li>
                                    <li><a href="tel:@Lang('main.branche6Phone')" target="_blank"><i class="fa fa-phone"></i><span class="px-1">@Lang('main.branche6Phone')</span></a></li>
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
    @include('sweetalert::alert')
</body>

</html>