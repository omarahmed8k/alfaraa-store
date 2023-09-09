@extends('adminlayouts.layout')
@section('title','اضافة شركة')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                              <h5 class="card-title">إضافة شركة</h5>
        
                              <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                              <form class="row g-3 needs-validation" novalidate action="{{ route('store-company') }}" method="post" enctype="multipart/form-data">
                              @csrf 
                            
                                
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