@extends('web.layouts.layout')
@section('home')
<style>
    .slide-overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.3); /* Black overlay */
}
</style>
    
    <!-- slider-section start-->
    <section class="slider-section">
        <h2 class="hidden">title</h2>
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7">
                        <!-- MAIN IMAGE -->
                        <div class="slide-overlay"></div>
                        <img src="{{ asset('Frontend-assets/images/slider/computer_course.webp') }}"  alt="SlideOne"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption medium-text lfb ltt tp-resizeme"
                            data-x="10"
                            data-y="250"
                            data-speed="600"
                            data-start="900"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 2;">
                            നിങ്ങളുടെ കരിയറിന് പുതിയ ദിശ: SMART-X & KIFD ക്ക്‌ ഒപ്പം മുന്നേറാം!
                        </div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption large-text lfb ltt tp-resizeme"
                            data-x="10" 
                            data-y="300"
                            data-speed="600"
                            data-start="1200"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 3;  font-size: 48px;">
                            നിങ്ങളുടെ കരിയർ തിരിയുന്നിടത്ത്<br>
 SMART-X & KIFD
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption small-text lfb ltt tp-resizeme"
                            data-x="10" 
                            data-y="470"
                            data-speed="600"
                            data-start="1500"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 3;">
                            കേരളത്തിലെ വനിതകൾക്ക് തൊഴിൽപുത്തൻ സാധ്യതകൾ <br> ഒരുക്കുന്ന നിങ്ങളുടെ പ്രവർത്തനഭാരിതം!
                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption link-button lfb ltt tp-resizeme"
                            data-x="10" 
                            data-y="600"
                            data-speed="600"
                            data-start="1800"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 4;">
                            <a href="{{ route('contact') }}" class="btn btn-primary">Register Now</a>
                        </div>
                    </li>
                    <!-- SLIDE  -->
    
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7">
                        <!-- MAIN IMAGE -->
                        <div class="slide-overlay"></div>
                        <img src="{{ asset('Frontend-assets/images/slider/slider-2.webp') }}"  alt="SlideOne"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat">
                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption medium-text lfb ltt tp-resizeme"
                            data-x="10"
                            data-y="250"
                            data-speed="600"
                            data-start="900"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 2;">
നിങ്ങളുടെ കരിയർ തിരിയുന്നിടത്ത് SMART-X & KIFD
</div>
                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption large-text lfb ltt tp-resizeme"
                            data-x="10" 
                            data-y="300"
                            data-speed="600"
                            data-start="1200"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 3; font-size: 39px;">
                            സ്ത്രീശാക്തീകരണത്തിന് ശിൽപം ചാർത്തൂ: <br> ഫാഷൻ ഡിസൈനിങ്ങിൽ അവസരങ്ങളുടെ ലോകം
                        </div>
                        <!-- LAYER NR. 3 -->
                        <div class="tp-caption small-text lfb ltt tp-resizeme"
                            data-x="10" 
                            data-y="470"
                            data-speed="600"
                            data-start="1500"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 3;">
                            ഫാഷൻ ഡിസൈനിംഗ്, കമ്പ്യൂട്ടർ കോഴ്‌സുകൾ, ഹോസ്പിറ്റൽ അഡ്മിനിസ്ട്രേഷൻ എന്നിവയിൽ പരിശീലനം                        </div>
                        <!-- LAYER NR. 4 -->
                        <div class="tp-caption link-button lfb ltt tp-resizeme"
                            data-x="10" 
                            data-y="600"
                            data-speed="600"
                            data-start="1800"
                            data-easing="Power4.easeOut"
                            data-splitin="none"
                            data-splitout="none"
                            data-elementdelay="0.01"
                            data-endelementdelay="0.1"
                            data-endspeed="500"
                            data-endeasing="Power4.easeIn"
                            style="z-index: 4;">
                            <a href="{{ route('contact') }}" class="btn btn-primary">Register now</a>
                        </div>
                    </li>
                    <!-- SLIDE  -->
                </ul>
            </div>
        </div>
    </section><!-- slider-section end-->
    
    <!-- Intro-->
    <section class="about-section section-padding">
        <div class="container text-center">
        <div class="section-title">
            <h2>About Smart X Kerala</h2>
            <p>SMART-X & KIFD (കേരള ഇൻസ്റ്റിറ്റ്യൂട്ട് ഓഫ് ഫാഷൻ ഡിസൈൻ) — സ്ത്രീശാക്തീകരണം മുഖാന്തരം സമൂഹത്തിന്റെ പുരോഗതി ലക്ഷ്യമാക്കി പ്രവർത്തിക്കുന്ന ഒരു അതുല്യ പ്രൊജക്ട്.
<br>ISO 9001:2015 സർട്ടിഫിക്കേഷനും കേന്ദ്ര സർക്കാർ അംഗീകൃത എഡ്യൂക്കേഷണൽ ബോർഡ് ഓഫ് വൊക്കേഷണൽ ട്രെയിനിംഗ് ആന്റ് റിസർച്ച് (EBVTR) അംഗീകാരവും നേടിയ ഈ സ്ഥാപനം, കേരളത്തിലെ 14 ജില്ലകളിലായി വ്യാപിച്ച 850+ അംഗീകൃത പരിശീലന കേന്ദ്രങ്ങൾ വഴി ഫാഷൻ ഡിസൈനിങ്ങ് ഉൾപ്പെടെ വിവിധ തൊഴിൽ അധിഷ്ഠിത കോഴ്‌സുകൾ വാഗ്ദാനം ചെയ്യുന്നു.
</p>

        </div>
 <!-- section-title -->
            <div class="row">
                <div class="col-md-4 col-sm-6">
                <div class="about-wrapper">
    <span class="caption">
        <img src="{{asset('Frontend-assets/images/about/a1.jpg')}}" alt="">
    </span>
    <div class="wrapper-content">
        <h4>Fashion Designing Courses</h4>
        <p>
            പുതിയ കാലത്തെ ട്രെൻഡുകൾ പിന്തുടരാൻ ആഗ്രഹിക്കുന്നവർക്കായി 25 വ്യത്യസ്ത ഫാഷൻ ഡിസൈനിംഗ് കോഴ്‌സുകൾ.
            <br>വിലകുറഞ്ഞ രജിസ്ട്രേഷൻ, സൗജന്യ പരിശീലനം!
        </p>
    </div>
</div>
 <!-- about-wrapper -->
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="about-wrapper">
                        <span class="caption"><img src="{{asset('Frontend-assets/images/about/a2.jpg')}}" alt=""></span>
                        <div class="wrapper-content">
                            <h4>Computer Courses</h4>
                            തൊഴിൽ സാധ്യതകളേറി വരുന്ന 15+ കമ്പ്യൂട്ടർ കോഴ്‌സുകൾ, അടിസ്ഥാന സ്കിൽസ് മുതൽ അഡ്വാൻസ്ഡ് ട്രെയിനിംഗ് വരെ.
<br>സൗജന്യ പരിശീലനം, കുറഞ്ഞ ചിലവിൽ സർട്ടിഫിക്കറ്റ്!
                        </div>
                    </div> <!-- about-wrapper -->
                </div>
                <div class="col-md-4 col-md-offset-0 col-sm-6 col-sm-offset-3">
                    <div class="about-wrapper">
                        <span class="caption"><img src="{{asset('Frontend-assets/images/about/a3.jpg')}}" alt=""></span>
                        <div class="wrapper-content">
                            <h4>Placement Assistance</h4>
പഠനത്തിനുശേഷം പ്രൊഫഷണൽ കരിയർ ആരംഭിക്കാൻ Smart-X Placement Service വഴി തൊഴിലവസരങ്ങൾ.
<br>കേരളത്തിലെ വിവിധ മേഖലകളിൽ ഇന്റർവ്യൂ അവസരങ്ങൾ!

                        </div>
                    </div> <!-- about-wrapper -->
                </div>
            </div>
        </div>
    </section> <!-- about-section -->

    <section class="course-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="course-left-bar">
                        <div class="contact">
                            <h4>Can’t Decide the Right Course? Don’t Worry!</h4>
                            <h5>Call Us: +91 9847399815</h5>
                        </div>
                    </div> <!-- course-left-bar -->
                </div>
                <div class="col-md-7">
                    <div class="course-right-bar">
                        <div class="panel-group" id="promote-accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a class="collapsed" data-toggle="collapse" data-parent="#promote-accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                          Computer Courses
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#promote-accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Fashion Designing Courses
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#promote-accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                         Pre Primary Teachers Training Courses
                                        </a>
                                    </h4>
                                </div>
                            </div>
                             <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#promote-accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Montessori Teachers Training Course
                                        </a>
                                    </h4>
                                </div>
                            </div>
                             <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#promote-accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Hospital Administration Courses
                                        </a>
                                    </h4>
                                </div>
                            </div>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#promote-accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                         Beautician Courses 
                                        </a>
                                    </h4>
                                </div>
                            </div>   
                        </div> <!-- promote-accordion -->
                    </div> <!-- course-right-bar -->
                </div>
            </div>
        </div>
    </section> 
    <!-- course-search-section -->

    <section class="subject-section section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Courses</h2>
                <span class="small-text">All Courses</span>
            </div> <!-- section-title -->

            <div class="subject-carousel owl-carousel owl-theme">
    @foreach ($course_main as $course)
        <div class="item">
            <div class="card custom-card">
                <!-- Image with Hover Button -->
                <div class="image-container">
                    <img src="{{ env('STORAGE_URL') . '/' . $course['image'] }}" alt="{{ $course['name'] }}">
                    <a href="{{ $course['category'] }}" class="hover-btn">View Course</a>
                </div>

                <div class="card-body">
                    <!-- Course Title (h3) -->
                    <h3 class="card-title fw-bold">{{ $course['name'] }}</h3>

                    <!-- Duration -->
                    <p>
                        <i class="fas fa-clock text-primary"></i> Duration: {{ $course['duration'] }}
                    </p>

                    <!-- Batches Info -->
                    @if (count($course['batches']) > 0)
                        <p>
                            <i class="fas fa-users text-success"></i> Batches: {{ implode(", ", $course['batches']) }}
                        </p>
                    @endif

                    <!-- Holiday Batches -->
                    @if (count($course['holiday_batches']) > 0)
                        <p>
                            <i class="fas fa-calendar-alt text-danger"></i> Holiday Batches: {{ implode(", ", $course['holiday_batches']) }}
                        </p>
                    @endif

                    @if (count($course['batches']) == 0 && count($course['holiday_batches']) == 0)
                        <p class="text-muted">
                            <i class="fas fa-exclamation-circle"></i> No batches scheduled.
                        </p>
                    @endif

                    <!-- Fee Information -->
                    <p class="fw-bold">
                        <i class="fas fa-indian-rupee-sign text-warning"></i> {{ $course['total_fee'] }}/-
                        @if (!is_null($course['bank_fee']))
                            <span class="small text-muted">(+{{ $course['bank_fee'] }} Bank Charge)</span>
                        @elseif (!is_null($course['service_fee']))
                            <span class="small text-muted">(+{{ $course['service_fee'] }} Service Charge)</span>
                        @endif

                    </p>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
    </section> <!-- course-section -->

    <section class="event-section section-padding">
        <div class="container">
            <div class="section-title">
                <h2>Quick Links</h2>
                <span class="small-text" style="color: #0a68ca;">All Quick Links</span>
            </div> <!-- section-title -->
            <div class="row">
                @foreach ($quicklinks as $item)
                    <div class="col-md-6">
                        <div class="event-wrapper">
                            <!--<div class="date pull-left text-center"><img src="{{ env('APP_URL') . '/' . str_replace('public/', '', $item->image) }}" alt="" class="event-image"></div>-->
                            <div class="date pull-left text-center"><img src="{{ env('STORAGE_URL') . '/' . $item->image}}" alt="" class="event-image"></div>

                            <div class="wrapper-content">
                                <h4><a href="{{ $item->link }}" style="padding-left: 20px;" target="_blank">{{ $item->title }}</a></h4>
                                <span class="time small-text" style="padding-left: 20px;">{{ $item->subtitle }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section> <!-- quicklink-section -->

    <style>
        .card-body p {
        margin-bottom: 5px; /* Adjust this value as needed */
                    }
        .custom-card {
        border-radius: 10px;
        overflow: hidden;
        transition: 0.3s ease-in-out;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
        position: relative;
    }
    .card-body {
    padding: 20px; /* Adjust the padding as needed */
}

    .custom-card:hover {
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Stronger shadow on hover */
        transform: translateY(-5px);
    }

    /* Ensures image fits properly */
    .image-container {
        position: relative;
        width: 100%;
        height: 200px;
        overflow: hidden;
    }

    .image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* Ensures image fits without distortion */
    }

    /* Button is hidden by default */
    .hover-btn {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        background-color: rgba(0, 0, 0, 0.7); /* Semi-transparent background */
        color: white;
        border-radius: 5px;
        padding: 10px 20px;
        text-decoration: none;
    }

    /* When hovering anywhere on the card, show the button */
    .custom-card:hover .hover-btn {
        opacity: 1;
    }
        .event-wrapper .date {
            height: 93px; 
            width: 32%;   
            overflow: hidden; 
            display: flex;
            justify-content: center;
            align-items: center;
            
        }       
        .event-image {
            width: 100%;         
            height: 100%;        
            object-fit: cover;   
        }

        .wrapper-content {
    /* border: 1px solid #ddd; */
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    /* box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); */
    background-color: #fff; /* White background */
}

.wrapper-content h3 {
    color: #333;
    margin-bottom: 10px;
}

.wrapper-content p { /* Target all paragraphs inside wrapper-content */
    margin-bottom: 8px;
    color: #555;
}

.batch-info { /* Style the container for batches */
    margin-bottom: 10px; /* Add some spacing below batches */
}

.batch-info p { /* Style paragraphs within batch-info */
    display: flex;
    align-items: center;
    margin-bottom: 5px; /* Reduce spacing between batch lines */
}

.info-icon {
    width: 16px;
    height: 16px;
    margin-right: 8px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
}

.batch-icon,
.holiday-batch-icon,
.fee-icon {
    width: 16px; /* Or your desired size */
    height: 16px;
    margin-right: 8px;
    border-radius: 3px;
    display: inline-block;
    background-size: contain; /* Or cover if you want the icons to fill the entire space */
    background-position: center;
    background-color: transparent;
}
 .batch-icon {
     background-image: url('{{ asset('Frontend-assets/images/square.jpeg') }}');
 }
 
 .holiday-batch-icon {
     background-image: url('{{ asset('Frontend-assets/images/square.jpeg') }}'); 
 }

 .fee-icon {
     background-image: url('{{ asset('Frontend-assets/images/star.jpeg') }}'); 
 }

.small {
    display: flex;
    align-items: center; /* Align fee and charge vertically */
}

.fee {
    font-weight: bold;
    margin-right: 5px; /* Space between fee and charge */
}

.charge {
    color: #777;
}

    </style>

@endsection