@extends('frontlayouts.layouts')
@section('content')


<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-8 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                    <h3 class="breadcrumb-title">@Lang('main.Products')</h3>
                </div>
                
                  <div class="col-3 text-end">
                        <!-- Start Header Action Icon -->
                        <ul class="header-action-icon">
                            {{--<a href="{{ route('front-category') }}" class="hero-button">@Lang('main.Categories')</a>--}}

                        </ul> <!-- End Header Action Icon -->
                    </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-12">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section" data-aos="fade-up"  data-aos-delay="0">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-center flex-wrap">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist">
                                    <ul class="tablist nav sort-tab-btn">
                                        <!-- <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-4-grid"><img src="assets/images/icon/bkg_grid.png" alt=""></a></li> -->
                                        <!-- <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img src="assets/images/icon/bkg_list.png" alt=""></a></li> -->
                                    </ul>
                                </div> <!-- End Sort tab Button -->
                
                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content tab-animate-zoom">
                                    <!-- Start Grid View Product -->
                                   
                                    <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                        <div class="row">
                                        @foreach($products as $product)
                                            <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                <!-- Start Product Defautlt Single -->
                                                <div class="product-default-single border-around" data-aos="fade-up"  data-aos-delay="0">
                                                    <div class="product-img-warp">
                                                        <a href="{{route('front-show-product',['id'=> $product->id])}}" class="product-default-img-link">
                                                            <img src="{{asset('images/'.$product->image)}}" alt="" class="product-default-img img-fluid">
                                                        </a>
                                                        <div class="product-action-icon-link">
                                                          
                                                        </div>
                                                    </div>
                                                    <div class="product-default-content">
                                                        <h6 class="product-default-link">
                                                            <a href="{{route('front-show-product',['id'=> $product->id])}}">{{ $product['name_'.app()->getLocale()] }}</a></h6>
                                                            @foreach($info as $inf)
                                                            {{--<a href="https://wa.me/{{$inf->whatsapp}}?text=من فضلك اريد هذا {{ $product['name_'.app()->getLocale()] }}" class="hero-button">  @Lang('main.request product')</a>--}}
                                                            
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
                                                            <a href="{{$link}}" class="hero-button" target="_blank" rel="nofollow">
                                                                @Lang('main.request product')
                                                            </a>
                                                            @endforeach
                                                    </div>
                                                </div>                                
                                                <!-- End Product Defautlt Single -->
                                            </div>
                                            @endforeach
                                            <div class="page-pagination text-center" data-aos="fade-up"  data-aos-delay="0">
                                            {{$products->links()}}
                                            </div>
                                          
                                        </div>
                                    </div> <!-- End Grid View Product -->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

            
            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div> <!-- ...:::: End Shop Section:::... -->


@endsection