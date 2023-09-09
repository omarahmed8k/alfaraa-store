@extends('adminlayouts.layout')
@section('title','تعديل السلايد')
@section('css')
<link href="{{asset('assets/plugins/DataTables/datatables.min.css')}}" rel="stylesheet">

@endsection
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">تعديل السلايد</h5>
                <form class="row g-3 needs-validation" novalidate action="{{ route('update-slide',$slide->id) }}"  method="post" enctype="multipart/form-data">
                    @csrf 
                    <input type="hidden" name="_method"  value="put" >
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">العنوان عربي </label>
                        <input name="title_ar" type="text" class="form-control" id="validationCustom01"  required value="{{$slide->title_ar}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">العنوان انجليزي </label>
                        <input type="text" name="title_en" class="form-control" id="validationCustom02"  required value="{{$slide->title_en}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">عنوان 2 عربي </label>
                        <input type="text"name="spantitle_ar" class="form-control" id="validationCustom02" value="{{$slide->spantitle_ar}}" >
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">عنوان 2 انجليزي </label>
                        <input type="text" name="spantitle_en" class="form-control" id="validationCustom02" value="{{$slide->spantitle_en}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الوصف عربي </label>
                        <input type="text" name="description_ar" class="form-control" id="validationCustom02" value="{{$slide->description_ar}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الوصف انجليزي </label>
                        <input type="text" name="description_en" class="form-control" id="validationCustom02" value="{{$slide->description_en}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
    
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الصورة</label>
                        <input type="file" name="image" class="form-control" id="validationCustom02" >
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <img src="{{asset('/images/'.$slide->image)}}" height="200" style="width: -webkit-fill-available;" />
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