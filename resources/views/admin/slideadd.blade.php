@extends('adminlayouts.layout')
@section('title',' اضافة سلايد ')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">اضافة سلايد </h5>
                              <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                              <form class="row g-3 needs-validation" novalidate action="{{ route('store-slide') }}" 
                              method="post" enctype="multipart/form-data">
                              @csrf 
                              <div class="col-md-6">
                                  <label for="validationCustom01" class="form-label">العنوان عربي </label>
                                  <input name="title_ar" type="text" class="form-control" id="validationCustom01"  required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">العنوان انجليزي </label>
                                  <input type="text" name="title_en" class="form-control" id="validationCustom02"  required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">عنوان 2 عربي </label>
                                  <input type="text"name="spantitle_ar" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">عنوان 2 انجليزي </label>
                                  <input type="text" name="spantitle_en" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <label for="validationCustom02" class="form-label">الوصف عربي </label>
                                  <input type="text" name="description_ar" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>

                                <div class="col-md-4">
                                  <label for="validationCustom02" class="form-label">الوصف انجليزي </label>
                                  <input type="text" name="description_en" class="form-control" id="validationCustom02" >
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