/*=================================================================

Template name: Rdsto App Landing HTML Template
Version: 1.0.0
Author: Design Expert      
Author url: https://themeforest.net/user/designexpart260
Developer: Najmul Huda Eimon

[Table of Content]

01: Background image
02: Menu
03: Preloader
04: Sticky menu
05: Scroll to top button
06: odometer
07: Project filtering
08: directional hover
09: custom cursor
10: Venobox video play
11: client slider
12: screen-shot slider
13: pricing hover active
14: Smooth scroll
15: scroll animation
16: contact page Google Map
 
====================================================================*/

$(function(){
    "use strict";

    
    
    /*=====================================================================
        01: Background image
    ======================================================================*/
   let imageTarget = $('[data-img]');
   imageTarget.css('background', function(){
       return 'url('+this.getAttribute('data-img')+') no-repeat center'
   });
   imageTarget.css('backgroundSize', 'cover');

    /*=====================================================================
        02: Menu
    ======================================================================*/
    $('.header-menu a[href="#"]').on("click", function (e) {
        e.preventDefault();
    });

    $(".header-menu").menumaker({ title: '<i class="fas fa-bars"></i>', format: "multitoggle" });

    /*================================================================
      03: Preloader
    =================================================================*/
    $( document ).ready(function() {
        setTimeout(()=>{
            $('.preloader').fadeOut();
        }, 250)
    });

    /*=====================================================================
        04: Sticky menu
    ======================================================================*/
    function menuSticky (){
        var $scroll = $(window).scrollTop();
        if($scroll > 120){
            $('.menubar').addClass('sticky');
        }else{
            $('.menubar').removeClass('sticky');
        }
     }
     menuSticky ()
     $(window).on('scroll',function(){
        menuSticky ()

    });

    /*=====================================================================
        05: Scroll to top button
    =======================================================================*/

    $('.top-btn').on('click',function(){
        $('html').animate({
            scrollTop: 0
        },1000);
    });

    $(window).on('scroll',function(){
        var $scroll = $(this).scrollTop();

        if($scroll > 300){
            $('.top-btn').addClass('show');
        }else{
            $('.top-btn').removeClass('show');
        }
    });

    /*=====================================================================
        06: odometer
    =======================================================================*/
    if ($(".odometer").length) {
        $('.odometer').appear();
        $(document.body).on('appear', '.odometer', function(e) {
            var odo = $(".odometer");
            odo.each(function() {
                var countNumber = $(this).attr("data-count");
                $(this).html(countNumber);
            });
        });
    }

    /*=====================================================================
        07: Project filtering
    ======================================================================*/
    let mixer =  document.querySelector('.filters');
    if(mixer){
        mixitup('.filters',{
            selectors: {
                control: '[data-mixitup-control]'
            }
        })
    }


    $('.project-menu li').click(function(event){
    $(this).siblings('.active').removeClass('active');
    $(this).addClass('active');
    event.preventDefault();
    });

   /*=====================================================================
        08: directional hover
    ======================================================================*/

        
	$('.home1.portfolio .item').directionalHover({
        overlay: "overlay",
        easing: "swing",
        speed: 400
      });
    /*=====================================================================
        09: custom cursor
    ======================================================================*/

      var e = {x: 0, y: 0}, t = {x: 0, y: 0}, n = .25, o = !1, a = document.getElementById("cursor"),
      i = document.getElementById("cursor-ball");
      TweenLite.set(a, {xPercent: -50, yPercent: -50}), document.addEventListener("mousemove", function (t) {
        var n = window.pageYOffset || document.documentElement.scrollTop;
        e.x = t.pageX, e.y = t.pageY - n
      }), TweenLite.ticker.addEventListener("tick", function () {
        o || (t.x += (e.x - t.x) * n, t.y += (e.y - t.y) * n, TweenLite.set(a, {x: t.x, y: t.y}))
      });

    /*=====================================================================
        10: Venobox video play
    ======================================================================*/
        $('.venobox').venobox();

    /*=====================================================================
        11: client slider
    ======================================================================*/
    var clientSwiper = new Swiper('.client-img-slider', {
        observer: true,
        observeParents: true,
        loop: true,
        centeredSlides: false,
        spaceBetween: 30,
        autoPlay: 3000,
        breakpoints: {
            1920: {
            slidesPerView: 1,
            },
            992: {
            slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1,
            },
            320: {
                slidesPerView: 1,
            }
        },
        controller: {
            control: clientImgSwiper,
          }
    });
    var clientImgSwiper = new Swiper('.client-slider', {
        observer: true,
        observeParents: true,
        loop: true,
        centeredSlides: false,
        spaceBetween: 30,
        autoPlay: 3000,
        breakpoints: {
            1920: {
            slidesPerView: 1,
            },
            992: {
            slidesPerView: 1,
            },
            768: {
                slidesPerView: 1,
            },
            576: {
                slidesPerView: 1,
            },
            320: {
                slidesPerView: 1,
            }
        },
        controller: {
            control: clientSwiper,
          },
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
        
    });
    /*=====================================================================
        12: screen-shot slider
    ======================================================================*/
    var clientSwiper = new Swiper('.ss-slider', {
        observer: true,
        observeParents: true,
        loop: true,
        centeredSlides: true,
        spaceBetween: 20,
        speed: 1000,
        autoplay: {
            delay: 5000,
          },
        breakpoints: {
            1920: {
            slidesPerView: 5,
            },
            992: {
            slidesPerView: 4,
            },
            768: {
                slidesPerView: 3,
            },
            576: {
                slidesPerView: 2,
            },
            320: {
                slidesPerView: 1,
            }
        },
    });

    /*=============================================================
        13: pricing hover active
    ==============================================================*/

    $(".pricing").find(".item").on("mouseenter", function () {
        $(".pricing").find(".item").removeClass("active");
            $(this).addClass("active");
        });

    /*=====================================================================
        14: Smooth scroll
    ======================================================================*/
    $(".scroll-down").on("click", function (t) {
        t.preventDefault();
    var i = this.hash;
        $("html,body").animate({ scrollTop: $(i).offset().top }, 700);
    });

    /*=====================================================================
        15: scroll animation
    ======================================================================*/
    
    var wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: false,
        live: true,
        scrollContainer: null
    });
    wow.init();

    /*=========================================================
        16: contact page Google Map
    ==========================================================*/

    if($('#map').length !==0){
            
        var googleMapSelector = $('#map');
        var latitude = $('.google-map-wrapper').attr('data-latitude');
        var longitude = $('.google-map-wrapper').attr('data-longitude');
        var zoome = $('.google-map-wrapper').attr('data-zoom');
        var zoomtoNum = Number(zoome);
        var mapmarker = $('.google-map-wrapper').attr('data-marker');
        var myCenter = new google.maps.LatLng(latitude, longitude);
  
        function initialize() {
            var mapProp = {
                center: myCenter,
                zoom: zoomtoNum,
                scrollwheel: false,
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                styles: [
                        {
                            "featureType": "landscape.man_made",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#f7f1e0"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#d0e3b4"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape.natural.terrain",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.business",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.medical",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#fbd3da"
                                }
                            ]
                        },
                        {
                            "featureType": "poi.park",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#bde6ab"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffe36f"
                                }
                            ]
                        },
                        {
                            "featureType": "road.highway",
                            "elementType": "geometry.stroke",
                            "stylers": [
                                {
                                    "color": "#efd151"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#ffffff"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "black"
                                }
                            ]
                        },
                        {
                            "featureType": "transit.station.airport",
                            "elementType": "geometry.fill",
                            "stylers": [
                                {
                                    "color": "#cfb2db"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "color": "#a2daf2"
                                }
                            ]
                        }
                    ]
            };
            var map = new google.maps.Map( document.getElementById('map'), mapProp );
            var marker = new google.maps.Marker({
                position: myCenter,
                icon: mapmarker,
            });
            marker.setMap(map);
  
           
        }
        if (googleMapSelector.length) {
            google.maps.event.addDomListener(window, 'load', initialize);
        }
    }
    

});