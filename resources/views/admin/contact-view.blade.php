@extends('adminlayouts.layout')
@section('title','تواصل معنا')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">تواصل معنا</h5>
                                <!-- <p>When using tables to display data, you will often wish to display column information in groups. DataTables fully supports colspan and rowspan in the table's header, assigning the required order listeners to the TH element suitable for that column.</p> -->
                                <div class="table-responsive">
                                <table id="complex-header" class="display" style="width:100%">
                                    <thead>
                                    
                                        <tr>
                                            <th>الاسم</th>
                                            <th>الهاتف</th>
                                            <th>الموضوع</th>
                                            <th>الرسالة</th>
                                            <th>الحدث</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contact as $cont ) 
                                    <tr>
                                                                               
                                            <td>{{ $cont->name}}</td>
                                            <td>{{ $cont->phone}}</td>
                                            <td>{{ $cont->subject}}</td>
                                            <td>{{ $cont->message}}</td>
                     
                                            <td>
                                            <a href="{{route('destroy-contact',['id'=> $cont->id])}}" ><i class="fas fa-trash-alt"></i></a>    
                                            </td>
                                            

                                        </tr>
                                        @endforeach
                                     
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                      
                                        <th>الاسم</th>
                                            <th>الهاتف</th>
                                            <th>الموضوع</th>
                                            <th>الرسالة</th>
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