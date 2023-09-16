@extends('frontlayouts.layouts')
@section('content')
    <div class="offcanvas-overlay"></div>
    <div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                    <h3 class="breadcrumb-title">@Lang('main.Categories')</h3>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Banner Section:::... -->
<div class="category-banner banner-section my-5">
    <!-- Start Banner Wrapper -->
    <div class="banner-wrapper">
        <div class="container">
            <div class="row">
                @foreach($category as $categ)
                <div class="col-lg-6 col-md-6 col-12">
                    <!-- Start Banner Single -->
                    <div class="banner-single" data-aos="fade-up" data-aos-delay="0">
                        <a href="{{route('front-show-category',['id'=> $categ->id])}}" class="banner-img-link">
                            <img class="banner-img" src="{{asset('images/'.$categ->image)}}" alt="">
                        </a>
                        <div class="banner-content">
                            <span class="banner-text-tiny"> {{ $categ['name_'.app()->getLocale()] }}</span>
                            <a href="{{route('front-show-category',['id'=> $categ->id])}}" class="banner-link"> @Lang('main.Shop now')</a>
                        </div>
                    </div>
                    <!-- End Banner Single -->
                </div>
                @endforeach
            </div>
        </div>
    </div> <!-- End Banner Wrapper -->
</div> <!-- ...:::: End Banner Section:::... -->
@endsection
