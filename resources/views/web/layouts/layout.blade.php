<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>SmartXKerala</title>
        <!-- fav icon -->
        <link href="{{ asset('logo/logo1.png') }}" rel="shortcut icon" type="image/png"> 
           
        <!-- Bootstrap -->
        <link href="{{ asset('Frontend-assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- animated-css -->
        <link href="{{ asset('Frontend-assets/css/animate.min.css') }}" rel="stylesheet" type="text/css">

        <!-- font-awesome-css -->
        <link href="{{ asset('Frontend-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

        <!-- owl-carrosel-css -->
        <link href="{{ asset('Frontend-assets/owl-carrosel/owl.carousel.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('Frontend-assets/owl-carrosel/owl.theme.default.min.css') }}" rel="stylesheet" type="text/css">

        <!-- Revulation Slider CSS -->
        <link href="{{ asset('Frontend-assets/rs-plugin/css/settings.css') }}" rel="stylesheet" type="text/css" media="screen" />

        <!-- offcanvas-menu-css -->
        <link href="{{ asset('Frontend-assets/css/offcanvas-menu.css') }}" rel="stylesheet" type="text/css">

        <!-- style-css -->
        <link href="{{ asset('Frontend-assets/css/style.css') }}" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

        
        <!-- template-->
        <link rel='stylesheet' href="{{ asset('Frontend-assets/demo/css/style.css') }}" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset('Frontend-assets/demo/css/page-builder.css') }}" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset('Frontend-assets/demo/css/settings.css') }}" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset('Frontend-assets/demo/css/style-core.css') }}" type='text/css' media='all' />
        <link rel='stylesheet' href="{{ asset('Frontend-assets/demo/css/kingster-style-custom.css') }}" type='text/css' media='all' />
    
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet" property="stylesheet" type="text/css" media="all">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3' type='text/css' media='all' />
        
        <style>
            .navbar-nav .active a {
                color: #0a68ca;
                background-color: transparent; 
            }
            @media (min-width: 300px) and (max-width: 767px) {
                .navbar-logo {
                     height: 40px !important;
                }
                .menu-toggle.sticky::before {
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 64px;
                    left: 119px;
                    right: 0;
                    top: 19%;
                    margin: -15px auto 0;
	           	    background: url("../../../../public/logo/logo-white.png") no-repeat;
                }
            }
            @media (min-width: 768px) and (max-width: 991px) {
                .navbar-logo {
                    height: 40px !important;
                }
                .menu-toggle.sticky::before {
                    content: "";
                    position: absolute;
                    width: 100%;
                    height: 64px;
                    left: 119px;
                    right: 0;
                    top: 19%;
                    margin: -15px auto 0;
	           	    background: url("../../../../public/logo/logo-white.png") no-repeat;
                }
            }
            @media (max-width: 768px) {
                .menu-wrapper {
                    display: block;
                }

                .dropdown-menu {
                    display: none; /* Hide dropdown by default */
                    position: absolute;
                    background: white;
                    width: 100%;
                    left: 0;
                    top: 100%;
                    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
                }

                .dropdown:hover .dropdown-menu,
                .dropdown.active .dropdown-menu {
                    display: block; /* Show when dropdown is active */
                }
            }
            .filter-section {
                margin-left: 0;
                justify-content: flex-start; 
                margin-top: 45px;
            }
        </style>

        <!-- Google Tag Manager -->
        <script>
            (function(w,d,s,l,i){
                w[l]=w[l]||[];
                w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});
                var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';
                j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })
            (window,document,'script','dataLayer','GTM-5BZ2H828');
            </script>
            <!-- End Google Tag Manager -->

    </head>
    <body class="homePageOne login-box">
        <!-- start preloader -->
        <div id="preloader">
            <div class="preloader-inner">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <!-- end preloader -->
        <header class="header-section" style="height: 59px;">
        {{-- <header class="header-section"> --}}
            <div class="top-bar hidden-sm hidden-xs">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="header-left-bar">
                                <ul class="contact-wrapper">
                                    <li><i class="fa fa-phone" aria-hidden="true"></i> +91 98473 99815 </li>
                                    <li><i class="fa fa-envelope" aria-hidden="true"></i> support@smartxkerala.com</li>
                                </ul>
                            </div> <!-- header-left-bar -->
                        </div>  
                        <div class="col-sm-6">
                            <div class="header-right-bar text-right">
                                <ul class="social-icon inline-block">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul>   
                            </div> <!-- header-right-bar -->
                        </div>
                    </div> <!-- top-bar -->
                </div>
            </div> <!-- top-bar -->

            <nav class="navbar navbar-inverse hidden-sm hidden-xs">
                <div class="container">
                    <div class="navbar-header">
                        <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('logo/logo1.png') }}"  class="navbar-logo" alt="image" style=" height: auto; width: 71px;"></a>
                    </div>  
                    <div class="collapse navbar-collapse navbar-right">
                        <ul class="nav navbar-nav">
                            <li class="{{ request()->routeIs('index') ? 'active' : '' }}">
                                <a href="{{ route('index') }}" style="z-index: 1000 !important;">Home</a>
                            </li>
                        
                            <li class="{{ request()->routeIs('about') ? 'active' : '' }}">
                                <a href="{{ route('about') }}">About Us</a>
                            </li>
                        
                            {{-- <li class="{{ request()->routeIs('courses') ? 'active' : '' }}"> --}}
                                {{-- <a href="{{ route('courses') }}">Courses</a> --}}
                            {{-- </li> --}}
                            <li class="dropdown {{ request()->routeIs('courses') ? 'active' : '' }}">
                                <a href="#">Course <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                                <ul class="dropdown-menu">
                                  @if($categories)
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('courses', $category->category_id) }}">{{ $category->name }} </a>
                                        </li>
                                    @endforeach
                                    @else 
                                        <li>
                                            <a href="#">Not Available</a>
                                        </li>
                                  @endif
                                </ul>
                            </li>

                            <li class="{{ request()->routeIs('training-centers') ? 'active' : '' }}">
                                <a href="{{ route('training-centers') }}">Training Centers</a>
                            </li>
                        
                            <li class="{{ request()->routeIs('placements') ? 'active' : '' }}">
                                <a href="{{ route('placements') }}">Placement Cell</a>
                            </li>
                        
                            <li class="{{ request()->routeIs('results') ? 'active' : '' }}">
                                <a href="{{ route('results') }}">Result</a>
                            </li>
                        
                            <li class="{{ request()->routeIs('gallery') ? 'active' : '' }}">
                                <a href="{{ route('gallery') }}">Gallery</a>
                            </li>
                        
                            <li class="{{ request()->routeIs('contact') ? 'active' : '' }}">
                                <a href="{{ route('contact') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div><!--/.nav-collapse -->
                </div> <!-- container -->
            </nav>  
            <div class="navbar-header inline-block visible-sm visible-xs">
                <a class="navbar-brand" href="{{ route('index') }}"><img src="{{ asset('logo/logo-white.png') }}" class="navbar-logo" alt="image"></a>
            </div>
        </header> <!-- header-section -->   

        @yield('home')
        @yield('about')
        @yield('courses')
        @yield('placements')
        @yield('training')
        @yield('result')
        @yield('gallery')
        @yield('contact')

        <footer class="footer-section">
            <div class="footer-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-12">
                            <div class="footer-wrapper">
                                <span class="footer-logo"><img src="{{asset('logo/logo-white.png')}}" alt="image"></span>  

                                <p>Empowering women with skills for a brighter future through expert training. </p>   

                                <ul class="social-icon" style="margin-left: 0;">
                                    <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                </ul> <!-- social-icon -->
                            </div> <!-- footer-wrapper -->
                        </div>  

                        <div class="col-sm-6 col-md-4 clearfix">
                            <div class="footer-wrapper last-wrapper">
                                <h3>Recent Courses</h3>  
                                <ul class="wrapper-option" style="margin-left: 0;">
                                    @foreach ($courses as $course)
                                        <li style="padding-bottom: 10px">
                                            <a style="font-size: 18px; line-height: 16px; color: #FFFFFF; letter-spacing: 0.5px;" href="{{ route('course.view/{id}', $course['course_id']) }}">{{ $course->name }}</a> <br>
                                            
                                            
                                        </li>
                                    @endforeach
                                </ul> <!-- wrapper-option -->
                            </div> <!-- footer-wrapper -->

                        </div>  

                        <div class="col-sm-6 col-md-2">
                            <div class="footer-wrapper last-wrapper">
                                <h3>Links</h3>  

                                <ul class="wrapper-option" style="margin-left: 0;">
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li><a href="{{ route('about') }}">About</a></li>
                                    <!--<li class="dropdown {{ request()->routeIs('courses') ? 'active' : '' }}">-->
                                    <!--    <a href="#">Course <i class="fa fa-angle-down" aria-hidden="true"></i></a>-->
                                    <!--    <ul class="dropdown-menu">-->
                                    <!--        @if($categories)-->
                                    <!--            @foreach ($categories as $category)-->
                                    <!--                <li>-->
                                    <!--                    <a href="{{ route('courses', $category->category_id) }}">{{ $category->name }} </a>-->
                                    <!--                </li>-->
                                    <!--            @endforeach-->
                                    <!--        @else -->
                                    <!--            <li>-->
                                    <!--                <a href="#">Not Available</a>-->
                                    <!--            </li>-->
                                    <!--        @endif-->
                                    <!--    </ul>-->
                                    <!--</li>-->
                                    <li><a href="{{ route('training-centers') }}">Training Centers</a></li>
                                    <li><a href="{{ route('placements') }}">Placement Cell</a></li>
                                    <li><a href="{{ route('results') }}">Result</a></li>
                                    <li><a href="{{ route('gallery') }}">Gallery</a></li>
                                    <li><a href="{{ route('contact') }}">Contact</a></li>
                                </ul> <!-- wrapper-option -->
                            </div> <!-- footer-wrapper -->
                        </div>  

                        <div class="col-sm-12 col-md-3">
                            <div class="footer-wrapper last-wrapper">
                                <h3>Categories</h3>  

                                <ul class="wrapper-option" style="margin-left: 0;">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="{{ route('courses', $category->category_id) }}">{{ $category->name }} </a>
                                        </li>
                                    @endforeach
                                </ul> <!-- wrapper-option -->
                            </div> <!-- footer-wrapper -->

                        </div>
                    </div>
                </div>
            </div> <!-- footer-container -->    

            <div class="copy-right">
                <div class="container">
                    <p>2025 &copy; All Rights Reserved by <a href="https://innerix.co/" target="_blank">Innerix Technologies</a></p>   

                    {{-- <ul class="pull-right">
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">SItemap</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul> --}}
                </div>
            </div> <!-- copy-right -->
        </footer> <!-- footer-section -->   

        <!-- Off-Canvas View Only -->
        <span class="menu-toggle navbar visible-xs visible-sm"><i class="fa fa-bars" aria-hidden="true"></i></span> 

        <div id="offcanvas-menu" class="visible-xs visible-sm">

            <span class="close-menu"><i class="fa fa-times" aria-hidden="true"></i></span>  

            <ul class="menu-wrapper" style="margin-left:0px">
                <li><a href="{{ route('index') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li class="dropdown {{ request()->routeIs('courses') ? 'active' : '' }}">
                    <a href="#" class="dropdown-toggle" >Course <i class="fa fa-angle-down" aria-hidden="true"></i></a>
                    <ul class="dropdown-menu" style="margin-left: -25px;background-color: black;width: 120%;">
                        @if($categories)
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('courses', $category->category_id) }}">{{ $category->name }} </a>
                                </li>
                            @endforeach
                        @else 
                            <li>
                                <a href="#">Not Available</a>
                            </li>
                        @endif
                    </ul>
                </li>
                <li><a href="{{ route('training-centers') }}">Training Centers</a></li>
                <li><a href="{{ route('placements') }}">Placement Cell</a></li>
                <li><a href="{{ route('results') }}">Result</a></li>            
                <li><a href="{{ route('gallery') }}">Gallery</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
             </ul> <!-- menu-wrapper -->      
        </div>
        <!-- Off-Canvas View Only -->   

        <div id="toTop" class="hidden-xs">
            <i class="fa fa-chevron-up"></i>
        </div> <!-- totop -->   

        <script src="{{ asset('Frontend-assets/js/jquery.js') }}"></script>
        <script src="{{ asset('Frontend-assets/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('Frontend-assets/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
        <script src="{{ asset('Frontend-assets/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
        <script src="{{ asset('Frontend-assets/js/jquery.inview.min.js') }}"></script>
        <script src="{{ asset('Frontend-assets/js/wow.js') }}"></script>
        <script src="{{ asset('Frontend-assets/js/lightbox.js') }}"></script>
        <script src="{{ asset('Frontend-assets/owl-carrosel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('Frontend-assets/js/script.js') }}"></script>
        <script src="{{ asset('Frontend-assets/js/portfolio.js') }}"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

        <!--template -->
        {{-- <script type='text/javascript' src="{{ asset('Frontend-assets/demo/js/jquery.js')}}"></script> --}}
        <script type='text/javascript' src="{{ asset('Frontend-assets/demo/js/jquery-migrate.min.js')}}"></script>
        <script type='text/javascript' src="{{ asset('Frontend-assets/demo/js/script.js')}}"></script>
        <script type='text/javascript'>
            var gdlr_core_pbf = {
                "admin": "",
                "video": {
                    "width": "640",
                    "height": "360"
                },
                "ajax_url": "#"
            };
        </script>
        <script type='text/javascript' src="{{ asset('Frontend-assets/demo/js/page-builder.js')}}"></script>
        <script type='text/javascript' src="{{ asset('Frontend-assets/demo/js/effect.min.js')}}"></script>
        <script type='text/javascript'>
            var kingster_script_core = {
                "home_url": "{{ route('index') }}"
            };
        </script>
        <script type='text/javascript' src="{{ asset('Frontend-assets/demo/js/plugins.min.js')}}"></script>

        <script>
            $(document).ready(function(){
                $('.panel-title a').click(function(e){
                    e.preventDefault();  // Prevent default anchor click behavior
                    
                    var target = $(this).attr('href');
                    
                    // If the target panel is already expanded, collapse it with animation
                    if ($(target).hasClass('in')) {
                        $(target).slideUp('300').removeClass('in');  // Collapse with animation
                    } else {
                        // Collapse all other panels with animation
                        $('.panel-collapse').slideUp('300').removeClass('in');
                        
                        // Expand the clicked panel with animation
                        $(target).slideDown('300').addClass('in');
                    }
                });
            });
        </script>
                
         <script>
            $(document).ready(function(){
                $(".dropdown > a").click(function(e){
                    e.preventDefault(); // Prevents default link action

                    let $dropdownMenu = $(this).next(".dropdown-menu");

                    if ($dropdownMenu.is(":visible")) {
                        $dropdownMenu.slideUp(); // Close if already open
                        $(this).parent().removeClass("open");
                    } else {
                        $(".dropdown-menu").slideUp(); // Close any other open dropdowns
                        $(".dropdown").removeClass("open");

                        $dropdownMenu.slideDown(); // Open this one
                        $(this).parent().addClass("open");
                    }
                });

                // Close dropdown if clicking outside
                $(document).click(function(e) {
                    if (!$(e.target).closest(".dropdown").length) {
                        $(".dropdown-menu").slideUp();
                        $(".dropdown").removeClass("open");
                    }
                });
            });

        </script>

        <!-- Google Tag Manager (noscript) -->
        <noscript>
            <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5BZ2H828" height="0" width="0" style="display:none;visibility:hidden"></iframe>
        </noscript>
        <!-- End Google Tag Manager (noscript) -->
    
    </body> 

</html>