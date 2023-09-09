@extends('adminlayouts.layout')
@section('title',' اضافة  ')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">اضافة  </h5>
                              <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                              <form class="row g-3 needs-validation" novalidate action="{{ route('store-general') }}" 
                              method="post" enctype="multipart/form-data">
                              @csrf 
                              <div >
                                  <label for="validationCustom01" class="form-label">عنوان المتجر</label>
                                  <input name="title" type="text" class="form-control" id="validationCustom01"  required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                              
                                <div >
                                  <label for="validationCustom02" class="form-label">وصف المتجر </label>
                                  <textarea name="description" class="form-control" id="validationCustom02" cols="30" rows="5" ></textarea>

                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>

                               

                              


                                <div class="col-md-4">
                                  <label for="validationCustom02" class="form-label">شعار المتجر</label>
                                  <input type="file" name="image" class="form-control" id="validationCustom02" required >
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