@extends('adminlayouts.layout')
@section('title','الأسئلة الشائعة')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">الأسئلة الشائعة</h5>
                                <p></p>
                                <a href="{{ route('createfaq') }}"><button type="button" class="btn btn-primary m-b-xs" >Add Question</button></a>
                                
                                <table id="complex-header" class="display" style="width:100%">
                                    <thead>
                                      
                                        <tr>
                                            <th>السؤال</th>
                                            <th>الجواب</th>
                                            <th>الحدث</th>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($question as $quest ) 
                                        <tr>
                                            <td>{{ $quest->question}}</td>
                                            <td>{{ $quest->answer}}</td>
                                            <td>
                                            <a href="{{route('destroy-faq',['id'=> $quest->id])}}" ><i class="fas fa-trash-alt"></i></a>    
                                            <a href="{{route('edit-faq',['id'=> $quest->id])}}" ><i class="fas fa-edit"></i></td></a>    
    
                                        </tr>
                                       
                                       
                                      @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <th>السؤال</th>
                                            <th>الجواب</th>
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