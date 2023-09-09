@extends('adminlayouts.layout')
@section('title',' التواصل الاجتماعي ')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">معلومات عامة</h5>
                                {{--<p></p>
                                <a href="{{ route('createinfo') }}"><button type="button" class="btn btn-primary m-b-xs" >Add Info</button></a>--}}
                                <div class="table-responsive">
                                <table id="complex-header" class="display" style="width:100%">
                                    <thead>
                                      
                                        <tr>
                                            <th>الحدث</th>
                                            <th>واتس اب</th>
                                            <th>فيس بوك</th>
                                            <th>انستقرام</th>
                                            <th>سناب شات</th>
                                            <th>هاتف</th>
                                            <th>الايميل</th>
                                            <th>العنوان</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($info as $inf ) 
                                            <tr>
                                                <td>
                                                    {{--<a href="{{route('destroy-info',['id'=> $inf->id])}}" ><i class="fas fa-trash-alt"></i></a>--}} 
                                                    <a href="{{route('edit-info',['id'=> $inf->id])}}" ><i class="fas fa-edit"></i></a>    
                                                </td>
                                                <td>{{$inf->whatsapp}}</td>
                                                <td>{{$inf->facebook}}</td>
                                                <td>{{$inf->instagram}}</td>
                                                <td>{{$inf->snapchat}}</td>
                                                <td>{{$inf->phone}}</td>
                                                <td>{{$inf->email}}</td>
                                                <td>{{$inf->address}}</td>
                                                <!-- <td><img src="{{asset('images/'.$inf->image)}}" height="75" width="75" alt="{{ $inf->image}}"></td> -->
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>الحدث</th>
                                            <th>واتس اب</th>
                                            <th>فيس بوك</th>
                                            <th>انستقرام</th>
                                            <th>سناب شات</th>
                                            <th>هاتف</th>
                                            <th>الايميل</th>
                                            <th>العنوان</th>
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
<script src="{{asset('assets/plugins/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('assets/js/pages/datatables.js')}}"></script>

@endsection