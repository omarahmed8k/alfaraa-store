@extends('adminlayouts.layout')
@section('title','تعديل')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">تعديل السؤال</h5>
                              <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                              <form class="row g-3 needs-validation" novalidate action="{{ route('update_faq',$question->id)}}" 
                              method="POST" enctype="multipart/form-data">
                              @csrf 
                              <input type="hidden" name="_method"  value="put" >
                                <div class="col-md-12">
                                  <label for="validationCustom01" class="form-label">السؤال</label>
                                  <input name="question" type="text" class="form-control" id="validationCustom01" value="{{$question->question}}" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  <label for="validationCustom02" class="form-label">الجواب</label>
                                  <textarea name="answer" class="form-control" id="validationCustom02" cols="30" rows="5" >{{$question->answer}}</textarea>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                             
                               
                              
                                <div class="col-12">
                                  <button class="btn btn-primary" type="submit">حفظ</button>
                                </div>
                              </form>
                          </div>
                      </div>
                      </div>
                    </div>
@endsection