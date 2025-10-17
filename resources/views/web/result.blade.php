@extends('web.layouts.layout')
@section('result')
    
    <section class="header-title">
        <div class="container">
            <h2 class="title">Result</h2>
            <span class="sub-title">Home / Result</span>
        </div>
    </section> <!-- header-title -->

    <div class="kingster-body-outer-wrapper ">
        <div class="kingster-body-wrapper clearfix  kingster-with-frame">
            <div class="kingster-page-wrapper" id="kingster-page-wrapper">
                <div class="kingster-content-container kingster-container">
                    <div class=" kingster-sidebar-wrap clearfix kingster-line-height-0 kingster-sidebar-style-right">
                        <div class=" kingster-sidebar-center kingster-column-40 kingster-line-height">
                            <div class="gdlr-core-page-builder-body">
                                <div class="gdlr-core-pbf-wrapper ">
                                    <div class="gdlr-core-pbf-wrapper-content gdlr-core-js ">
                                        <div class="gdlr-core-pbf-wrapper-container clearfix gdlr-core-container">
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-title-item gdlr-core-item-pdb clearfix  gdlr-core-left-align gdlr-core-title-item-caption-top gdlr-core-item-pdlr" style="padding-bottom: 40px ;">
                                                    <div class="gdlr-core-title-item-title-wrap clearfix">
                                                        <h3 class="gdlr-core-title-item-title gdlr-core-skin-title " style="font-size: 20px ;font-weight: 600 ;">COURSE RESULTS</h3></div>
                                                </div>
                                            </div>
                                            <div class="gdlr-core-pbf-element">
                                                <div class="gdlr-core-course-item gdlr-core-item-pdlr gdlr-core-item-pdb gdlr-core-course-style-list" style="padding-bottom: 45px ;">
                                                    @foreach ($results as $item)
                                                    <div class="gdlr-core-course-item-list"><a class="gdlr-core-course-item-link" href="{{ $item->link }}"><span class="gdlr-core-course-item-id gdlr-core-skin-caption" >{{ $item->code }}</span><span class="gdlr-core-course-item-title gdlr-core-skin-title" >{{ $item->title }}</span><i class="gdlr-core-course-item-icon gdlr-core-skin-icon fa fa-long-arrow-right" ></i></a></div>
                                                    @endforeach
                                                    {{-- route('student-login') --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=" kingster-sidebar-right kingster-column-20 kingster-line-height kingster-line-height">
                            <div class="kingster-sidebar-area kingster-item-pdlr">
                                <div id="text-18" class="widget widget_text kingster-widget">
                                    <div class="textwidget">
                                        <div class="gdlr-core-widget-box-shortcode " style="color: #ffffff ;padding: 30px 45px;background-color: #192f59 ;">
                                            <div class="gdlr-core-widget-box-shortcode-content">
                                                </p>
                                                <h3 style="font-size: 20px; color: #fff; margin-bottom: 25px;">Smart-X-Kerala Contact Info</h3>
                                                <p><span style="color: #3db166; font-size: 16px; font-weight: 600;">KERALA INSTITUTE OF FASHION DESTENING VOCATIONAL TRAINING ORGANIZATION, <br> Govt. of Kerala RCA 143/10, <br>IlI" Floor, Jas Tower, Mannarkkad,<br> Palakkad, Kerala - 678 582</span>
                                                    <br /> <span style="font-size: 15px;"><br /> support@smartxkerala.com<br /> info@smartxkerala.com</span></p>
                                                <p><span style="font-size: 15px;"> +91 9847399815<br /> </span></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection