@extends('adminlayouts.layout')
@section('title','المنتجات')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">
<style>
    .dataTables_paginate,
    .dataTables_info,
    .dataTables_filter,
    .dataTables_length {
        display: none !important;
    }
</style>
@endsection
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">المنتجات</h5>
                <a href="{{ route('createproduct') }}"><button type="button" class="btn btn-primary m-b-xs">Add Product</button></a>
                <div class="table-responsive">
                    <table id="complex-header" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>الاسم عربي</th>
                                <th>الاسم انجليزي</th>
                                <th>القسم</th>
                                <th>الأكثر مبيعا</th>
                                <th>الرقم الأصلي</th>
                                <th>الصورة</th>
                                <th>الحدث</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product )
                            <tr>
                                <td>
                                    <a href="{{route('show-product',['id'=> $product->id])}}">{{ $product->name_ar}}</a>
                                </td>
                                <td>{{ $product->name_en}}</td>
                                <td>{{ @$product->Category->name_en}}</td>
                                <td>
                                    @if($product->feature == 'yes')
                                    <span class="badge bg-success">نعم</span>
                                    @else
                                    <span class="badge bg-danger">لا</span>
                                    @endif
                                </td>
                                <td>{{ $product->nickname_main}}</td>
                                <td>
                                    <img src="{{asset('images/'.$product->image)}}" height="75" width="75" alt="{{ $product->image}}">
                                </td>
                                <td>
                                    <a href="{{route('destroy-product',['id'=> $product->id])}}"><i class="fas fa-trash-alt"></i></a>
                                    <a href="{{route('edit-product',['id'=> $product->id])}}"><i class="fas fa-edit"></i></a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>الاسم عربي</th>
                                <th>الاسم انجليزي</th>
                                <th>القسم</th>
                                <th>الأكثر مبيعا</th>
                                <th>الرقم الأصلي</th>
                                <th>الصورة</th>
                                <th>الحدث</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                    {!! $products->appends(request()->except('page'))->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('js')
<script src="{{asset('assets/js/pages/datatables.js')}}"></script>
<script src="{{asset('assets/plugins/DataTables/datatables.min.js')}}"></script>

@endsection