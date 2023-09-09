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
                <form class="row g-3 needs-validation" novalidate action="{{ route('update_general',$general->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="_method"  value="put">
                    
                    <div class="col-md-12">
                      <label for="validationCustom01" class="form-label">عنوان المتجر</label>
                      <input name="title" type="text" class="form-control" id="validationCustom01"  value="{{$general->title}}">
                      <div class="valid-feedback">
                        Looks good!
                      </div>
                    </div>
              
                    <div class="col-md-12">
                        <label for="validationCustom02" class="form-label">وصف المتجر </label>
                        <textarea name="description" class="form-control" id="validationCustom02" cols="30" rows="5" >{{$general->description}}</textarea>
    
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label for="validationCustom03" class="form-label">شعار المتجر</label>
                        <input type="file" name="image" class="form-control" id="validationCustom03" value="{{asset('images/'.$general->image)}}" >
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">نص السلايدر 1</label>
                        <input name="slider_txt1" type="text" class="form-control" id="validationCustom04"  max="255" value="{{$general->slider_txt1}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">نص السلايدر 2</label>
                        <input name="slider_txt2" type="text" class="form-control" id="validationCustom04"  max="255" value="{{$general->slider_txt2}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-8">
                        <label for="validationCustom05" class="form-label">صورة السلايدر</label>
                        <input type="file" name="slider" class="form-control" id="validationCustom05" value="{{asset('images/'.$general->slider)}}" >
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                    
                    <div class="col-md-6">
                        <label for="" class="form-label">قسم الأصناف الجديدة والأكثر مبيعا</label>
                        <div>
                            <label>
                                <input type="radio" value="yes" {{$general->products == 'yes' ? 'checked' : ''}} name="products">نعم
                            </label>
                            <label>
                                <input type="radio" value="no" {{$general->products == 'no' ? 'checked' : ''}} name="products" >لا
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="" class="form-label">روابط الاقسام والمنتجات</label>
                        <div>
                            <label>
                                <input type="radio" value="yes" {{$general->links == 'yes' ? 'checked' : ''}} name="links">نعم
                            </label>
                            <label>
                                <input type="radio" value="no" {{$general->links == 'no' ? 'checked' : ''}} name="links" >لا
                            </label>
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