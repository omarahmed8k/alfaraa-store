@extends('frontlayouts.layouts')
@section('content')


<div class="offcanvas-overlay"></div>

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex justify-content-between justify-content-md-between  align-items-center flex-md-row flex-column">
                        <h3 class="breadcrumb-title">@Lang('main.FAQ')</h3>
                        <div class="breadcrumb-nav">
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...::::Start About Us Center Section:::... -->
    <div class="faq-section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="faq-content" data-aos="fade-up"  data-aos-delay="0">
                        <h5>@Lang('main.faq_note')</h5>
                    </div>
                </div>
            </div>
            <div class="faq-wrapper">
                <div class="row">
                    <div class="col-12">
                        <div class="faq-accordian">
                            @foreach($question as $ques)
                            <div class="faq-accordian-single-item" data-aos="fade-up"  data-aos-delay="0">
                                <input id="item-{{$ques->id}}" name="accordian-item" type="radio" checked="">
                                <label for="item-{{$ques->id}}">{{$ques->question}}</label>
                                <div class="item-content">
                                    <p>{{$ques->answer}}</p>
                                </div>
                            </div>
                            @endforeach
                         
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...::::End  About Us Center Section:::... -->
@endsection