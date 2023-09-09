@extends('adminlayouts.layout')
@section('title','اضافة معلومات')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">إضافة ملعومات </h5>
                              <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                              <form class="row g-3 needs-validation" novalidate action="{{ route('store-info') }}" method="post" enctype="multipart/form-data">
                              @csrf 
                                <div class="col-md-6">
                                  <label for="validationCustom01" class="form-label">واتس اب</label>
                                  <input name="whatsapp" type="text" class="form-control" id="validationCustom01" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">فيس بوك</label>
                                  <input name="facebook" type="text" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">انستقرام</label>
                                  <input name="instagram" type="text" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">سناب شات</label>
                                  <input name="snapchat" type="text" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">الهاتف</label>
                                  <input name="phone" type="text" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">الايميل</label>
                                  <input name="email" type="text" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">العنوان</label>
                                  <input name="address" type="text" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                             
                                <!-- <div class="col-md-4">
                                  <label for="validationCustom02" class="form-label">الصورة</label>
                                  <input type="file" name="image" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div> -->
                              
                                <div class="col-12">
                                  <button class="btn btn-primary" type="submit">حفظ</button>
                                </div>
                              </form>
                          </div>
                      </div>
                      </div>
                    </div>
@endsection