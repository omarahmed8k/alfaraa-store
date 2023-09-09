@extends('frontlayouts.layouts')
@section('content')


<!-- ...::::Start Contact Section:::... -->
<div class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <!-- Start Contact Details -->
                    @foreach($info as $inf)
                    <div class="contact-details-wrapper section-top-gap-100" data-aos="fade-up"  data-aos-delay="0">
                        <div class="contact-details">
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                                <div class="contact-details-icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <a href="tel:{{$inf->phone}}" style="direction: ltr;">{{$inf->phone}}</a>
                                
                                </div>
                            </div> <!-- End Contact Details Single Item -->
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                                <div class="contact-details-icon">
                                    <i class="fa fa-globe"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                  <span> {{$inf->email}}</span> 
                                </div>
                            </div> <!-- End Contact Details Single Item -->
                            <!-- Start Contact Details Single Item -->
                            <div class="contact-details-single-item">
                                <div class="contact-details-icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <div class="contact-details-content contact-phone">
                                    <span>{{$inf->address}}</span>
                                </div>
                            </div> <!-- End Contact Details Single Item -->
                        </div>
                        <!-- Start Contact Social Link -->
                        <div class="contact-social">
                            <h4>@Lang('main.Follow Us')</h4>
                            <ul>
                                <li><a href="{{$inf->facebook}}" target = "_ blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{$inf->snapchat}}" target = "_ blank"><i class="fa fa-snapchat"></i></a></li>
                                <li><a href="{{$inf->instagram}}" target = "_ blank"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="https://wa.me/{{$inf->whatsapp}}?text=مرحبا" target = "_ blank"><i class="fa fa-whatsapp"></i></a></li>

                            </ul>
                        </div> <!-- End Contact Social Link -->
                    </div>
                    @endforeach <!-- End Contact Details -->
                </div>

                <div class="col-lg-8">
                    <div class="contact-form section-top-gap-100" data-aos="fade-up"  data-aos-delay="200">
                        <h3>@Lang('main.Get In Touch')</h3>

                        <form class="row g-3 needs-validation" novalidate action="{{ route('front-store-contact') }}" 
                              method="post" enctype="multipart/form-data">
                              @csrf 
                              <div class="col-md-6">
                                  <label for="validationCustom01" class="form-label">@Lang('main.Name')</label>
                                  <input name="name" type="text" class="form-control" id="validationCustom01"  required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>
                                <div class="col-md-6">
                                  <label for="validationCustom02" class="form-label">@Lang('main.Phone')</label>
                                  <input type="text" name="phone" class="form-control" id="validationCustom02"  required>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <label for="validationCustom02" class="form-label">@Lang('main.Subject')</label>
                                  <input type="text"name="subject" class="form-control" id="validationCustom02" >
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <label for="validationCustom02" class="form-label">@Lang('main.Your Message')</label>
                                  <textarea name="message" class="form-control" id="validationCustom02" cols="30" rows="10"></textarea>
                                  <div class="valid-feedback">
                                    Looks good!
                                  </div>
                                </div>                          
                            
                                <div class="col-12">
                                  <button class="contact-submit-btn" type="submit">@Lang('main.Save')</button>
                                </div>
                              </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ...::::ENd Contact Section:::... -->

@endsection