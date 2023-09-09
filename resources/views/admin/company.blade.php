@extends('adminlayouts.layout')
@section('title','الشركات')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">الشركات</h5>
                                <p></p>
                                <a href="{{ route('createcompany') }}"><button type="button" class="btn btn-primary m-b-xs" >اضافة شركة</button></a>
                                
                                <table id="complex-header" class="display" style="width:100%">
                                    <thead>
                                      
                                        <tr>
                                           
                                            <th>الصورة</th>
                                            <th>الحدث</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($company as $comp ) 
                                        <tr>
                        
                                            <td><img src="{{asset('images/'.$comp->image)}}" height="75" width="75" alt="{{ $comp->image}}"></td>

                                            <td>
                                                <a href="{{route('destroy-company',['id'=> $comp->id])}}" ><i class="fas fa-trash-alt"></i></a>    
                                            </td>
                                            
                                        </tr>
                                       
                                       
                                      @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                       
                                        <th>الصورة</th>

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