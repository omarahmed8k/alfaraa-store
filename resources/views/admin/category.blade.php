@extends('adminlayouts.layout')
@section('title','Category')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">فئات المنتجات</h5>
                <p></p>
                <a href="{{ route('createcategory') }}"><button type="button" class="btn btn-primary m-b-xs" >Add Category</button></a>
                <div class="table-responsive">
                    <table id="complex-header" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th>الاسم بالعربي</th>
                            <th>الاسم بالانجليزي</th>
                            <th>الصورة</th>
                            <th>الحدث</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $categor )
                            <tr>
                                <td>{{ $categor->name_ar}}</td>
                                <td>{{ $categor->name_en}}</td>
                                <td><img src="{{asset('images/'.$categor->image)}}" height="75" width="75" alt="{{ $categor->image}}"></td>
                                <td>
                                    <a href="{{route('destroy-category',['id'=> $categor->id])}}" ><i class="fas fa-trash-alt"></i></a>
                                    <a href="{{route('edit-category',['id'=> $categor->id])}}" ><i class="fas fa-edit"></i></td></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>الاسم بالعربي</th>
                            <th>الاسم بالانجليزي</th>
                            <th>الصورة</th>
                            <th>الحدث</th>
                        </tr>
                    </tfoot>
                </table>
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
