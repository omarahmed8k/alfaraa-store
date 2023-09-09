@extends('adminlayouts.layout')
@section('title','سلايدر')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">سلايدر</h5>
                                <!-- <p>When using tables to display data, you will often wish to display column information in groups. DataTables fully supports colspan and rowspan in the table's header, assigning the required order listeners to the TH element suitable for that column.</p> -->
                                <a href="{{ route('createslide') }}"><button type="button" class="btn btn-primary m-b-xs" >Add slider</button></a>
                                <div class="table-responsive">
                                <table id="complex-header" class="display" style="width:100%">
                                    <thead>
                                    
                                        <tr>
                                            <th>العنوان عربي</th>
                                            <th>العنوان انجليزي</th>
                                            <th>عنوان 2 عربي</th>                             
                                            <th>عنوان 2 انجليزي</th>
                                            <th>الوصف عربي</th>
                                            <th>الوصف انجليزي en</th>
                                            <th>الصورة</th>
                                            <th>الحدث</th>

                                            <!-- <th>Nickname_main</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($slides as $slide ) 
                                        <tr>
                                            <td>{{ $slide->title_ar}}</td>
                                            <td>{{ $slide->title_en}}</td>
                                            <td>{{ $slide->spantitle_ar}}</td>
                                            <td>{{ $slide->spantitle_en}}</td>
                                            <td>{{ $slide->description_ar}}</td>
                                            <td>{{ $slide->description_en}}</td>
                                            <td><img src="{{asset('images/'.$slide->image)}}" height="75" width="75" alt="{{ $slide->image}}"></td>
                                            <td>
                                                <a href="{{route('destroy-slide',['id'=> $slide->id])}}" ><i class="fas fa-trash-alt"></i></a>    
                                                <a href="{{route('edit-slide',['id'=> $slide->id])}}"><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                     
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                      
                                            <th>العنوان عربي</th>
                                            <th>العنوان انجليزي</th>
                                            <th>عنوان 2 عربي</th>                             
                                            <th>عنوان 2 انجليزي</th>
                                            <th>الوصف عربي</th>
                                            <th>الوصف انجليزي en</th>
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