@extends('adminlayouts.layout')
@section('title','معلومات عامة')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">معلومات عامة</h5>
                                <p></p>
                                {{--<a href="{{ route('creategeneral') }}"><button type="button" class="btn btn-primary m-b-xs" >اضافة</button></a>--}}
                                <div class="table-responsive">
                                    <table id="complex-header" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>الحدث</th>
                                            <th> عنوان المتجر</th>
                                            <th> وصف المتجر</th>
                                            <th>الشعار</th>
                                            <th>نص السلايدر 1</th>
                                            <th>نص السلايدر 2</th>
                                            <th>صورة السلايدر</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        @foreach ($general as $gener ) 
                                        <tr>
                                            <td>
                                                {{--<a href="{{route('destroy-general',['id'=> $gener->id])}}" ><i class="fas fa-trash-alt"></i></a>--}}    
                                                <a href="{{route('edit-general',['id'=> $gener->id])}}" ><i class="fas fa-edit"></i></a> 
                                            </td>
                                            <td>{{ $gener->title}}</td>
                                            <td>{{ $gener->description}}</td>
                                            <td><img src="{{asset('images/'.$gener->image)}}" height="150" width="150" style="object-fit: contain;" alt="{{ $gener->image}}"></td>
                                            <td>{{ $gener->slider_txt1}}</td>
                                            <td>{{ $gener->slider_txt2}}</td>
                                            <td><img src="{{asset('images/'.$gener->slider)}}" height="150" width="150" style="object-fit: contain;" alt="{{ $gener->slider}}"></td>
                                        </tr>
                                       
                                       
                                        @endforeach
                                    </tbody>
                                    
                                    <tfoot>
                                        <tr>
                                            <th>الحدث</th>
                                            <th> عنوان المتجر</th>
                                            <th> وصف المتجر</th>
                                            <th>الشعار</th>
                                            <th>نص السلايدر 1</th>
                                            <th>نص السلايدر 2</th>
                                            <th>صورة السلايدر</th>
                                        </tr>
                                    </tfoot>
                                </table>
                                </div>
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