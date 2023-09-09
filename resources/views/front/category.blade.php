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
                    <h3 class="breadcrumb-title">@Lang('main.Products')</h3>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Product Catagory Section:::... -->
<div class="product-catagory-section section-top-gap-100">
</div> <!-- ...:::: End Product Catagory Section:::... -->

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
                            <span class="banner-text-tiny" style="background-color: #ffffff73;color:black;font-size: 20px;">
                                {{ $categ['name_'.app()->getLocale()] }}
                            </span>
                            <!-- <h3 class="banner-text-large">30% خصم</h3> -->
                            <a href="{{route('front-show-category',['id'=> $categ->id])}}" class="banner-link"> @Lang('main.Shop now')</a>
                        </div>
                    </div> <!-- End Banner Single -->

                </div>
                @endforeach

                <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                    {{$category->links()}}
                </div>

            </div>
        </div>
    </div> <!-- End Banner Wrapper -->
</div> <!-- ...:::: End Banner Section:::... -->





@endsection
