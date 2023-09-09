@extends('adminlayouts.layout')
@section('title','اعلمني عند التوفر ')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">اعلمني عند التوفر</h5>
                                <!-- <p>When using tables to display data, you will often wish to display column information in groups. DataTables fully supports colspan and rowspan in the table's header, assigning the required order listeners to the TH element suitable for that column.</p> -->
                                <table id="complex-header" class="display" style="width:100%">
                                    <thead>
                                    
                                        <tr>
                                            <th>الاسم</th>
                                            <th>الايميل</th>
                                         
                                            <th>الحدث</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($inactive as $inact ) 
                                    <tr>
                                                                               
                                            <td>{{ $inact->name}}</td>
                                            <td>{{ $inact->email}}</td>
                                          
                                           
                     
                                            <td>
                                            <a href="{{route('destroy-inactive',['id'=> $inact->id])}}" ><i class="fas fa-trash-alt"></i></a>    
                                            </td>
                                            

                                        </tr>
                                        @endforeach
                                     
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                      
                                            <th>الاسم</th>
                                            <th>الايميل</th>
                                      
                                            <th>الحدث</th>
                                           
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


@endsection

@section('js')
<script src="{{asset('assets/js/pages/datatables.js')}}"></script>
<script src="{{asset('assets/plugins/DataTables/datatables.min.js')}}"></script>

@endsection