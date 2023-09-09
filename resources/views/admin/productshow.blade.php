@extends('adminlayouts.layout')
@section('title','المنتج')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
    <div class="col-md-6 col-xl-6">
        <div class="card stat-widget">
            <div class="card-body">
                <h4 class="card-title">{{ $product->name_ar}}</h4>
                <h4 class="card-title">{{ $product->name_en}}</h4>
                <h4 class="card-title">{{ $product->price}}</h4>
                <h4 class="card-title">{{ $product->dese_ar}}</h4>
                <h4 class="card-title">{{ $product->dese_en}}</h4>
                <h4 class="card-title">{{ $product->nickname_st}}</h4>
                <h4 class="card-title">{{ $product->nickname_num}}</h4>
                <h4 class="card-title">{{ $product->nickname_main}}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-xl-6 text-center">
        <div class="card stat-widget">
            <div class="card-body">
                <h5 class="card-title">Image</h5>
                <img src="{{asset('images/'.$product->image)}}" height="250" width="250" alt="{{ $product->image}}" >
            </div>
        </div>
    </div>

    <div class="col-md-12 col-xl-12">
        <div class="card stat-widget">
            <div class="card-body">
                <div class="row">
                    @foreach($product->images as $image)
                        <div class="col-md-3 text-center">
                            <img src="{{$image->path_url}}" height="200" width="200"  alt="{{ $image->path_url}}" >
                            <a  href="{{route('destroy-product-image',['id'=> $image->id])}}" class="btn btn-danger mt-2">&times;</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>

@endsection
