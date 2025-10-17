@extends('web.layouts.layout')
@section('courses')
    
    <section class="header-title">
        <div class="container">
            <h2 class="title">Courses</h2>
            <span class="sub-title">Home / Academics / Courses Details</span>
        </div>
    </section> 

    <div class="kingster-body-outer-wrapper ">
        <div class="kingster-body-wrapper clearfix  kingster-with-frame">
            <div class="kingster-page-wrapper" id="kingster-page-wrapper">
                <div class="gdlr-core-page-builder-body">
                    @foreach ($course_main as $item)
                        
                        <div class="gdlr-core-pbf-sidebar-wrapper " style="margin: 0px 0px 30px 0px;">
                            <div class="gdlr-core-pbf-sidebar-container gdlr-core-line-height-0 clearfix gdlr-core-js gdlr-core-container">
                                <div class="gdlr-core-pbf-sidebar-content  gdlr-core-column-40 gdlr-core-pbf-sidebar-padding gdlr-core-line-height gdlr-core-column-extend-left" style="padding: 35px 0px 20px 0px;">
                                    <div class="gdlr-core-pbf-sidebar-content-inner">
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr">
                                                <img src="{{ asset('storage/' . $item['image']) }}" alt="" style="width: 84rem; height: 47rem;">
                                                <div class="gdlr-core-title-item-title-wrap clearfix">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 27px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ; margin-top: 20px;">{{ $item['name'] }}</h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align">
                                                <div class="gdlr-core-text-box-item-content" style="font-size: 16px ;text-transform: none ;">
                                                    <p>{{ $item['description'] }}.</p>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 40px ;">
                                                <div class="gdlr-core-title-item-title-wrap clearfix">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #223d71 ;margin-right: 30px ;">Majors</h3>
                                                    <div class="gdlr-core-title-item-divider gdlr-core-right gdlr-core-skin-divider" style="font-size: 22px ;border-bottom-width: 3px ;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20 gdlr-core-column-first">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px -7px 0px 0px;">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                            <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                                <div class="gdlr-core-feature-box-background" style="background-image: url(upload/shutterstock_327174593.jpg) ;opacity: 0.14 ;"></div>
                                                                <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                                                                    <h3 class="gdlr-core-feature-box-item-title" style="font-size: 16px ;font-weight: 600 ;">Business Regulation</h3></div>
                                                                <a class="gdlr-core-feature-box-link" href="business-regulation/index.html" target="_self"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px -3px 0px -3px;">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                            <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                                <div class="gdlr-core-feature-box-background" style="background-image: url(upload/shutterstock_339364214.jpg) ;opacity: 0.14 ;"></div>
                                                                <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                                                                    <h3 class="gdlr-core-feature-box-item-title" style="font-size: 16px ;font-weight: 600 ;">International Tax</h3></div>
                                                                <a class="gdlr-core-feature-box-link" href="international-taxation/index.html" target="_self"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-column gdlr-core-column-20">
                                            <div class="gdlr-core-pbf-column-content-margin gdlr-core-js " style="margin: 0px 0px 0px -7px;padding: 0px 0px 45px 0px;">
                                                <div class="gdlr-core-pbf-column-content clearfix gdlr-core-js ">
                                                    <div class="gdlr-core-pbf-element">
                                                        <div class="gdlr-core-feature-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-center-align">
                                                            <div class="gdlr-core-feature-box gdlr-core-js gdlr-core-feature-box-type-outer" style="background-color: #3db166 ;border-width: 0px 0px 0px 0px;border-radius: 3px;-moz-border-radius: 3px;-webkit-border-radius: 3px;">
                                                                <div class="gdlr-core-feature-box-background" style="background-image: url(upload/shutterstock_547272460.jpg) ;opacity: 0.14 ;"></div>
                                                                <div class="gdlr-core-feature-box-content gdlr-core-sync-height-content">
                                                                    <h3 class="gdlr-core-feature-box-item-title" style="font-size: 16px ;font-weight: 600 ;">Corporate Law</h3></div>
                                                                <a class="gdlr-core-feature-box-link" href="#" target="_self"></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-left-align" style="padding-bottom: 15px ;">
                                                <div class="gdlr-core-text-box-item-content" style="font-size: 21px ;text-transform: none ;color: #3db166 ;">
                                                    <p>If you&#8217;re an educational professional who are looking to progress into management and consultancy, or an educational planning or development role, this is the best degree for you.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-divider-item gdlr-core-divider-item-normal gdlr-core-item-pdlr gdlr-core-center-align">
                                                <div class="gdlr-core-divider-line gdlr-core-skin-divider" style="border-color: #3db166 ;border-bottom-width: 3px ;"></div>
                                            </div>
                                        </div>--}}
                                        <div class="gdlr-core-pbf-element" style="padding-left: 20px;">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdb gdlr-core-left-align">
                                                <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;text-transform: none ;">
                                                    <p>{{ $item['shortdescription'] }}</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="gdlr-core-pbf-element">
                                            <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 40px ;">
                                                <div class="gdlr-core-title-item-title-wrap clearfix">
                                                    <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 22px ;font-weight: 600 ;letter-spacing: 0px ;text-transform: none ;color: #223d71 ;margin-right: 30px ;">Syllabus</h3>
                                                    <div class="gdlr-core-title-item-divider gdlr-core-right gdlr-core-skin-divider" style="font-size: 22px ;border-bottom-width: 3px ;"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="gdlr-core-pbf-element" style="padding-left: 20px;">
                                            <div class="gdlr-core-text-box-item gdlr-core-item-pdb gdlr-core-left-align">
                                                <div class="gdlr-core-text-box-item-content" style="font-size: 17px ;text-transform: none ;">
                                                    <p>{!! nl2br(e($item['syllabus'])) !!}</p>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="gdlr-core-pbf-element" style="padding-left: 20px;">
                                            <div class="gdlr-core-icon-list-item gdlr-core-item-pdb clearfix " style="padding-bottom: 25px ;">
                                                <ul>
                                                    <li class=" gdlr-core-skin-divider" style="margin-bottom: 18px ;"><span class="gdlr-core-icon-list-icon-wrap" style="margin-top: 5px ;"><i class="gdlr-core-icon-list-icon fa fa-dot-circle-o" style="color: #192f59 ;font-size: 18px ;width: 18px ;" ></i></span>
                                                        <div class="gdlr-core-icon-list-content-wrap"><span class="gdlr-core-icon-list-content" style="font-size: 18px ;">Duration :    {{ $item['duration'] }}</span></div>
                                                    </li>
                                                    <li class="gdlr-core-skin-divider" style="margin-bottom: 18px;">
                                                        <span class="gdlr-core-icon-list-icon-wrap" style="margin-top: 5px;">
                                                            <i class="gdlr-core-icon-list-icon fa fa-dot-circle-o" style="color: #192f59; font-size: 18px; width: 18px;"></i>
                                                        </span>
                                                        <div class="gdlr-core-icon-list-content-wrap">
                                                            <span class="gdlr-core-icon-list-content" style="font-size: 18px;">
                                                                Batches:      
                                                                @if (!empty($item['batches'])) 
                                                                    <span class="batch-icon"></span>
                                                                    {{ implode(", ", $item['batches']) }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <li class="gdlr-core-skin-divider" style="margin-bottom: 18px;">
                                                        <span class="gdlr-core-icon-list-icon-wrap" style="margin-top: 5px;">
                                                            <i class="gdlr-core-icon-list-icon fa fa-dot-circle-o" style="color: #192f59; font-size: 18px; width: 18px;"></i>
                                                        </span>
                                                        <div class="gdlr-core-icon-list-content-wrap">
                                                            <span class="gdlr-core-icon-list-content" style="font-size: 18px;">
                                                                Holiday Batches:       
                                                                @if (!empty($item['holiday_batches'])) 
                                                                    <span class="batch-icon"></span>
                                                                    {{ implode(", ", $item['holiday_batches']) }}
                                                                @endif
                                                            </span>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="gdlr-core-pbf-sidebar-right gdlr-core-column-extend-right  kingster-sidebar-area gdlr-core-column-20 gdlr-core-pbf-sidebar-padding  gdlr-core-line-height" style="padding: 35px 0px 30px 0px;">
                                    <div class="gdlr-core-sidebar-item gdlr-core-item-pdlr">
                                        <div id="text-23" class="widget widget_text kingster-widget">
                                            <div class="textwidget">
                                                <div class="gdlr-core-widget-box-shortcode " style="color: #ffffff ;padding: 30px 45px;background-color: #192f59 ;">
                                                    <div class="gdlr-core-widget-box-shortcode-content">
                                                        </p>
                                                        <h3 style="font-size: 20px; color: #fff; margin-bottom: 25px;"> Course Fee Structure</h3>
                                                        <p style="font-size: 15px;">Course Code: <span style="color: #3db166; font-size: 16px; font-weight: 600;">{{ $item['code'] }}</span>
                                                            <br /> 
                                                            <span style="font-size: 15px;">
                                                                <br /> Registration Fee : {{ $item['registration_fee'] }}/-
                                                                <br />  Practical Exam Fee : {{ $item['practical_exam_fee'] }}/-
                                                                <br /> Written Exam Fee : {{ $item['written_exam_fee'] }}/-
                                                                <br />  Bank Fee : {{ $item['bank_fee'] }}/-
                                                                <br />  Service Fee : {{ $item['service_fee'] }}/-
                                                            </span>
                                                        </p>
                                                        <p><span style="font-size: 16px; color: #3db166;"> Total Fee :  {{ $item['total_fee'] }}/-</span></p> <span class="gdlr-core-space-shortcode" style="margin-top: 40px ;"></span>
                                                        <p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
       
@endsection