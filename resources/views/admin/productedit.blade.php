@extends('adminlayouts.layout')
@section('title','تعديل منتج')

@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">تعديل منتج </h5>
                <!-- <p>Provide valuable, actionable feedback to your users with HTML5 form validation.</p> -->
                <form class="row g-3 needs-validation" novalidate action="{{ route('update_product',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_method"  value="put" >
                    {{-- Name Ar --}}
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">الاسم بالعربي </label>
                        <input name="name_ar" type="text" class="form-control" id="validationCustom01" value="{{$product->name_ar}}" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    {{-- Name En --}}
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الاسم بالانجليزي</label>
                        <input type="text" name="name_en" class="form-control" id="validationCustom02" value="{{$product->name_en}}" required>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    {{-- Descrption Ar --}}
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الوصف عربي</label>
                        <textarea name="dese_ar" class="form-control" id="validationCustom02" cols="30" rows="5" >{{$product->dese_ar}}</textarea>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    {{-- Descrption En --}}
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الوصف انجليزي </label>
                        <textarea name="dese_en" class="form-control" id="validationCustom02" cols="30" rows="5" >{{$product->dese_en}}</textarea>
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    {{-- Nickname Text --}}
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> رقم الشهرة نص</label>
                        <input type="text" name="nickname_st" class="form-control" id="validationCustom02" value="{{$product->nickname_st}}" >
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    {{-- Nickname Number --}}
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label"> رقم الشهرة عدد</label>
                        <input type="text" name="nickname_num" class="form-control" id="validationCustom02" value="{{$product->nickname_num}}" >
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    {{-- Nickname Main Number --}}
                    <div class="col-md-4">
                        <label for="validationCustom02" class="form-label">الرقم الاصلي </label>
                        <input type="text" name="nickname_main" class="form-control" id="validationCustom02" value="{{$product->nickname_main}}" >
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    {{-- Extra Data --}}
                    <div class="row" id="field_wrapper">

                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">key</label>
                            <input type="text" name="extra_data[0][key]" class="form-control" id="validationCustom02"
                            value="{{is_array($product->extra_data) ? $product->extra_data[0]['key'] : ''}}"
                            >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="validationCustom02" class="form-label">Value</label>
                            <input type="text" name="extra_data[0][value]" class="form-control" id="validationCustom02"
                            value="{{is_array($product->extra_data) ? $product->extra_data[0]['value'] : ''}}"
                            >
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>

                        @if(is_array($product->extra_data) && count($product->extra_data) >= 2 )
                            @foreach ($product->extra_data as $data)
                                @if($loop->index == 0)
                                    @continue
                                @endif
                                <div class="row">

                                    <div class="col-md-5">
                                        <label for="validationCustom02" class="form-label">key</label>
                                        <input type="text" name="extra_data[{{$loop->index}}][key]" class="form-control" id="validationCustom02"
                                        value="{{$data['key']}}"
                                        >
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>

                                    <div class="col-md-5">
                                        <label for="validationCustom02" class="form-label">Value</label>
                                        <input type="text" name="extra_data[{{$loop->index}}][value]" class="form-control" id="validationCustom02"
                                        value="{{$data['value']}}"
                                        >
                                        <div class="valid-feedback">Looks good!</div>
                                    </div>

                                    <div class="col-md-2 text-left h4" style="align-self: end">
                                        <a href="javascript:void(0);" class="remove_button">
                                            <i class="fa fa-minus-circle"></i>
                                        </a>
                                    </div>

                                </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="col-12">
                        <a class="btn btn-primary" id="add_field">أضف حقل</a>
                    </div>

                    {{-- Price --}}
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">السعر</label>
                        <input type="text" name="price" class="form-control" id="validationCustom02" value="{{$product->price}}" >
                        <div class="valid-feedback">
                        Looks good!
                        </div>
                    </div>
                    {{-- Category --}}
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">القسم</label>
                        <select class="form-control" name="category_id">
                            @if (count($categories) > 0)
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : ''}}>
                                        {{$category->name_ar}}
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    {{-- Status --}}
                    <div class="col-md-6">
                        <label for="" class="form-label">مخزون المنتج</label>
                        <div>
                            <label>
                                <input type="radio" value="inactive" {{$product->status == 'inactive' ? 'checked' : ''}}  name="status" required>غير متوفر
                            </label>
                            <label>
                                <input type="radio" value="active" {{$product->status == 'active' ? 'checked' : ''}} name="status" required>متوفر
                            </label>
                        </div>
                    </div>
                    {{-- Feature --}}
                    <div class="col-md-6">
                        <label for="" class="form-label">أكثر مبيعا</label>
                        <div>
                            <label>
                                <input type="radio" value="yes" {{$product->feature == 'yes' ? 'checked' : ''}} name="feature">نعم
                            </label>
                            <label>
                                <input type="radio" value="no" {{$product->feature == 'no' ? 'checked' : ''}} name="feature" >لا
                            </label>
                        </div>
                    </div>
                    {{-- Main Image --}}
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">الصورة</label>
                        <input type="file" name="image" class="form-control" id="validationCustom02" value="{{asset('images/'.$product->image)}}">
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    {{-- Gallery Images --}}
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">معرض الصور</label>
                        <input type="file" name="gallery[]" multiple class="form-control" id="validationCustom02" >
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="thumbnail">
                        <a href="{{asset('images/'.$product->image)}}" target="_blank">
                            <img src="{{asset('images/'.$product->image)}}" alt="Lights" style="width:100%">
                        </a>
                        </div>
                    </div>

                    @if($product->images->count() > 0)
                        @foreach ($product->images as $img)
                            <div class="col-md-2 {{$loop->index == 0 ? 'offset-md-2' : ''}}">
                                <div class="thumbnail">
                                <a href="{{asset('storage/'.$img->path)}}" target="_blank">
                                    <img src="{{asset('storage/'.$img->path)}}" alt="Nature" style="width:100%">
                                </a>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    {{-- Save Button --}}
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script>
        var x = {{is_array($product->extra_data) && count($product->extra_data) > 1 ? count($product->extra_data) - 1 : 0}}; //Initial field counter is 1
        function getInputs(){
            // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="remove-icon.png"/></a></div>'; //New input field html
            var fieldHTML = '<div class="row">';
            fieldHTML += '<div class="col-md-5">'; // start key
            fieldHTML += '<label for="validationCustom02" class="form-label">key</label>';
            fieldHTML += `<input type="text" name="extra_data[${x}][key]" class="form-control" id="validationCustom02">`;
            fieldHTML += '<div class="valid-feedback">Looks good!</div>';
            fieldHTML += '</div>'; // end key
            fieldHTML += '<div class="col-md-5">'; // start value
            fieldHTML += '<label for="validationCustom02" class="form-label">Value</label>';
            fieldHTML += `<input type="text" name="extra_data[${x}][value]" class="form-control" id="validationCustom02">`;
            fieldHTML += '<div class="valid-feedback">Looks good!</div>';
            fieldHTML += '</div>'; // end value
            fieldHTML += '<div class="col-md-2 text-left h4" style="align-self: end">'; // start remove button
            fieldHTML += '<a href="javascript:void(0);" class="remove_button"><i class="fa fa-minus-circle"></i></a>';
            fieldHTML += '</div>'; // end remove button
            fieldHTML += '</div>';
            return fieldHTML;
        }
        $(document).ready(function(){
            var maxField = 10; //Input fields increment limitation
            var addButton = $('#add_field'); //Add button selector
            var wrapper = $('#field_wrapper'); //Input field wrapper

            //Once add button is clicked
            $(addButton).click(function(){
                //Check maximum number of input fields
                if(x < maxField){
                    x++; //Increment field counter
                    $(wrapper).append(getInputs()); //Add field html
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e){
                e.preventDefault();
                $(this).parent('div').parent('div').remove(); //Remove field html
                x--; //Decrement field counter
            });
        });
    </script>
@endsection
