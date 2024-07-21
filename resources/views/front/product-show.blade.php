@extends('frontlayouts.layouts')

@section('title') {{$product['name_'.app()->getLocale()] . ' - ' . $product->nickname_num."".$product->nickname_st . ' - ' . $product->nickname_main}} @endsection
@section('keywords') {{$product['name_'.app()->getLocale()] . ',' . $product->nickname_num."".$product->nickname_st . ',' . $product->nickname_main}} @endsection
@section('description') {{ $product['dese_'.app()->getLocale()] ? $product['dese_'.app()->getLocale()] . ' - ' . $product->nickname_num."".$product->nickname_st . ' - ' . $product->nickname_main . ' - ' . $product->nickname_st : $general->description . ' - ' .$product->nickname_num.''.$product->nickname_st . ' - ' . $product->nickname_main}} @endsection
@section('meta')
<meta property="og:site_name" content="{{$general->title}}" />

<meta property="og:url" content="{{request()->url()}}" />
<meta property="og:type" content="website" />
<meta property="og:title" content="{{ $product['name_'.app()->getLocale()] . ' - ' . $product->nickname_num.''.$product->nickname_st . ' - ' . $product->nickname_main }}" />
<meta property="og:description" content="{{ $product['dese_'.app()->getLocale()] ?  $product['dese_'.app()->getLocale()] . ' - ' . $product->nickname_num.''.$product->nickname_st . ' - ' . $product->nickname_main : $general->description . ' - ' . $product->nickname_num.''.$product->nickname_st . ' - ' . $product->nickname_main }}" />
<meta property="og:image" itemprop="image" content="{{asset('images/'.$product->image)}}" />
<meta property='og:locale' content='{{app()->getLocale() == "ar" ? "ar_EG" : "en_US"}}' />

<meta property="og:image:secure_url" itemprop="image" content="{{asset('images/'.$product->image)}}" />
<meta property="og:image:width" content="300" />
<meta property="og:image:height" content="300" />
<meta property="og:image:type" content="image/{{pathinfo(asset('images/'.$product->image), PATHINFO_EXTENSION) == 'jpg' ? 'jpeg' : pathinfo(asset('images/'.$product->image), PATHINFO_EXTENSION)}}" />

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:domain" content="{{request()->getHost()}}" />
<meta name="twitter:url" content="{{request()->url()}}" />
<meta name="twitter:title" content="{{ $product['name_'.app()->getLocale()] }}" />
<meta name="twitter:description" content="{{ $product['dese_'.app()->getLocale()] ?  $product['dese_'.app()->getLocale()] . ' - ' . $product->nickname_num.''.$product->nickname_st . ' - ' . $product->nickname_main : $general->description . ' - ' .$product->nickname_num.''.$product->nickname_st . ' - ' . $product->nickname_main }}" />
<meta name="twitter:image" content="{{asset('images/'.$product->image)}}" />

<meta property="og:country-name" content="Saudi Arabia" />
@endsection

@section('css')
<style>
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
@endsection

@section('content')


<link itemprop="thumbnailUrl" href="{{asset('images/'.$product->image)}}">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
    <link itemprop="url" href="{{asset('images/'.$product->image)}}">
</span>

<span itemprop="image" itemscope itemtype="image/{{pathinfo(asset('images/'.$product->image), PATHINFO_EXTENSION) == 'jpg' ? 'jpeg' : pathinfo(asset('images/'.$product->image), PATHINFO_EXTENSION)}}">
    <link itemprop="url" href="{{asset('images/'.$product->image)}}">
</span>


<div class="offcanvas-overlay"></div>

<!-- ...:::: Start Breadcrumb Section:::... -->
<div class="breadcrumb-section">
    <div class="breadcrumb-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                    <h3 class="breadcrumb-title">{{ $product['name_'.app()->getLocale()] }}</h3>
                </div>
            </div>
        </div>
    </div>
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
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- Start Product Details Section -->
<div class="product-details-section section-top-gap-100">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                    <div class="product-large-image product-large-image-horaizontal">
                        <div class="product-image-large-single zoom-image-hover">
                            <img loading="lazy" src="{{asset('images/'.$product->image)}}" alt="product image">
                        </div>
                        @foreach($product->images as $image)
                        <div class="product-image-large-single zoom-image-hover">
                            <img loading="lazy" src="{{$image->path_url}}" alt="product image">
                        </div>
                        @endforeach
                    </div>
                    <div class="product-image-thumb product-image-thumb-horizontal pos-relative">
                        <div class="zoom-active product-image-thumb-single">
                            <img loading="lazy" class="img-fluid" src="{{asset('images/'.$product->image)}}" alt="product image">
                        </div>
                        @foreach($product->images as $image)
                        <div class="product-image-thumb-single">
                            <img loading="lazy" class="img-fluid" src="{{$image->path_url}}" alt="product image">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="product-details-content-area" data-aos="fade-up" data-aos-delay="200">
                    <!-- Start  Product Details Text Area-->
                    <div class="product-details-text">
                        @if($product->nickname_num || $product->nickname_st)
                        <div class="price">{{ $product->nickname_st}}{{ $product->nickname_num}}</div>
                        @endif
                        <h4 class="title">{{ $product['name_'.app()->getLocale()] }} {{ $product->nickname_main}}</h4>
                        <div class="price">@Lang('main.priceOnRequest')</div>
                    </div>
                    <!-- End  Product Details Text Area-->
                    <div class="price">
                        <div id="add-to-cart" class="hero-button offcanvas-toggle w-100 text-center" data-id="{{$product->id}}" data-name="{{$product['name_'.app()->getLocale()]}}" data-image="{{asset('images/'.$product->image)}}" data-nickname-main="{{$product->nickname_main}}" data-nickname-st="{{$product->nickname_st}}" data-nickname-num="{{$product->nickname_num}}" data-quantity="1">
                            @Lang('main.addToCart')
                        </div>
                        @if($product->status == 'active')
                        <div class="product-default-content">
                            @foreach($info as $inf)
                            @php
                            $link = "https://wa.me/{$inf->whatsapp}?text=";
                            $link .= "السلام عليكم شركة الفارع عندي استفسار بخصوص المنتج";
                            $link .= "%0a%0a";
                            $link .= $product['name_'.app()->getLocale()];
                            $link .= "%0a%0a";
                            $link .= $product->nickname_main;
                            $link .= "%0a%0a";
                            $link .= request()->url();
                            @endphp
                            <a href="{{$link}}" class="hero-button" target="_blank" rel="nofollow">
                                @Lang('main.request product')
                            </a>
                            @endforeach
                        </div>
                        @else
                        <div>
                            <form class="row g-3 needs-validation" novalidate action="{{ route('front-store-inactive') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h3>@Lang('main.Tell me when its available')</h3>
                                <div class="row">

                                    <div class="col-lg-8 mb-20">
                                        <div class="default-form-box">
                                            <label>@Lang('main.Name') <span>*</span></label>
                                            <input name="name" type="text" class="form-control" id="validationCustom01" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 mb-20">
                                        <div class="default-form-box">
                                            <label>@Lang('main.Email') <span>*</span></label>
                                            <input name="email" type="text" class="form-control" id="validationCustom01" required>
                                        </div>
                                    </div>

                                    {{-- <div>
                                            <div class="default-form-box">
                                                <label>@Lang('main.phone') <span>*</span></label>
                                                <input name="phone" type="text" class="form-control" id="validationCustom01"  required>
                                            </div>
                                        </div> --}}

                                    <div class="col-12 mb-20">
                                        <button class="contact-submit-btn" type="submit">@Lang('main.Save')</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Product Details Section -->

@if(is_array($product->extra_data) && count($product->extra_data) > 0 )
<div class="product-details-content-tab-section section-top-gap-20">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-details-content-tab-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
                    <!-- Start Product Details Tab Button -->
                    <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                        <li>
                            <a class="nav-link active" data-bs-toggle="tab" href="#description">
                                <h5> @Lang('main.Alternative numbers')</h5>
                            </a>
                        </li>
                    </ul> <!-- End Product Details Tab Button -->

                    <!-- Start Product Details Tab Content -->
                    <div class="product-details-content-tab">
                        <div class="tab-content">
                            <!-- Start Product Details Tab Content Singel -->
                            <div class="product-variable-group table-responsive">
                                @if(is_array($product->extra_data) && count($product->extra_data) > 0 )
                                <table class="table table-bordered">
                                    <tbody>
                                        @foreach ($product->extra_data as $data)
                                        <tr class="tr-vertical-middle">
                                            <td>
                                                <div class="product-price">
                                                    <span class="product-price-reg">{{ $data['key'] }}</span>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="product-price">
                                                    <span class="product-price-reg">{{ $data['value'] }}</span>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @else
                                <div class="text-center h4">@Lang('main.Alternative numbers Not Available Now')</div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- End Product Details Tab Content -->

                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection