@extends('web.layouts.layout')
@section('contact')
    
    <section class="header-title">
        <div class="container">
            <h2 class="title">Contact Us</h2>
            <span class="sub-title">Home / Contact</span>
        </div>
    </section> <!-- header-title -->    

    <section class="contact-section section-padding">
        <div class="container text-center">
            <div class="section-title">
                <h2>Contact Us</h2>
                <p>We’re here to help! Reach out to us for any inquiries, support, or collaborations.<br> Our team is ready to assist you.</p>
            </div> <!-- section-title -->   
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="contact-wrapper">
                            <span class="caption"><img src="{{asset('Frontend-assets/images/contact/i1.png')}}" alt=""></span>
                            <h4>Address</h4>
                            <span class="contact">KERALA INSTITUTE OF FASHION DESIGNING VOCATIONAL TRAINING ORGANIZATION, <br>  IlI" Floor, Jas Tower, Mannarkkad</span>
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <div class="contact-wrapper">
                            <span class="caption"><img src="{{asset('Frontend-assets/images/contact/i2.png')}}" alt=""></span>
                            <h4>Email</h4>
                            <span class="contact">support@smartxkerala.com <br>director@smartxkerala.com</span>
                        </div>
                    </div>  
                    <div class="col-sm-4">
                        <div class="contact-wrapper">
                            <span class="caption"><img src="{{asset('Frontend-assets/images/contact/i3.png')}}" alt=""></span>
                            <h4>Phone</h4>
                            <span class="contact"> +91 9847399815</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> <!-- contact-section --> 

    <section class="map-section">
    <div style="display: flex; justify-content: center; align-items: center; height: 40vh;">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d291.1005389271759!2d76.43736566290798!3d10.996065080311666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba7d58a6e2a0855%3A0xcc35bd13499192d3!2sGOVT%20INSTITUTE%20OF%20FASHION%20DESIGNING%20COLLEGE%20MANNARKKAD!5e0!3m2!1sen!2sin!4v1741320024320!5m2!1sen!2sin" width="1150" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>

        <div class="container">
            <div class="form-section">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="section-title text-center">
                            <h2>Leave Us a Message</h2>
                            {{-- <hr> --}}
                            <div class="row justify-content-center">
                                @if ($message = session()->get('message'))
                                    <div class="alert alert-success text-center w-75">
                                        <h6 class="text-center fw-bold">{{ $message }}...</h6>
                                    </div>
                                @endif  
                            </div>
                        </div> <!-- section-title -->   
                        <form class="support-form text-left" method="POST" action="{{ route('contact-us.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputName15" placeholder="Name" name="name">
                                    </div>
                                </div>  
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        {{-- <input class="domainSearchBar form-control" value="Email address.." onblur="if(this.value=='')this.value='Email address..'" onfocus="if(this.value=='Email address..')this.value=''" id="domainSearchBar" name="email" type="email"> --}}
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">

                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputName15" placeholder="District" name="district" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="inputName15" placeholder="Panchayath" name="panchayath" required>
                                    </div>
                                </div>   
                            </div>  
                            <div class="form-group">
                                <input type="text" class="form-control" id="inputName" placeholder="Subject" name="subject">
                            </div>  
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Write here.." rows="6" name="message"></textarea>
                            </div>  
                            <div class="form-group text-center">
                                <button class="btn btn-primary subscribeBtn" type="submit">Contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> <!-- mail-section -->
        </div> 
    </section> <!-- map-section -->

@endsection