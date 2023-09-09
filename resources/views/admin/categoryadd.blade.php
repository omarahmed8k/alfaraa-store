@extends('adminlayouts.layout')
@section('title','اضافة قسم')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">إضافة قسم</h5>
        
                              <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                              <form class="row g-3 needs-validation" novalidate action="{{ route('store-category') }}" method="post" enctype="multipart/form-data">
                              @csrf 
                                <div class="col-md-6">
                                  <label for="validationCustom01" class="form-label">الاسم بالعربي</label>
                                  <input name="name_ar" type="text" class="form-control" id="validationCustom01" value="Arabic name" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">الاسم بالانجليزي</label>
                                  <input name="name_en" type="text" class="form-control" id="validationCustom02" value="English name" required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <label for="validationCustom02" class="form-label">الصورة</label>
                                  <input type="file" name="image" class="form-control" id="validationCustom02" >
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