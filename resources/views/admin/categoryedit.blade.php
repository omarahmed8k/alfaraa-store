@extends('adminlayouts.layout')
@section('title','تعديل قسم')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">تعديل قسم</h5>

                <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                <form class="row g-3 needs-validation" novalidate action="{{ route('update_category',$category->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method"  value="put">
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">الاسم بالعربي</label>
                        <input name="name_ar" type="text" class="form-control" id="validationCustom01" value="{{$category->name_ar}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الاسم بالانجليزي</label>
                        <input name="name_en" type="text" class="form-control" id="validationCustom02" value="{{$category->name_en}}" required>
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
                    <div class="col-md-3">
                        <div class="thumbnail">
                        <a href="{{asset('images/'.$category->image)}}" target="_blank">
                            <img src="{{asset('images/'.$category->image)}}" alt="Lights" style="width:100%">
                        </a>
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
