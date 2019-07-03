/* ===================================================================

Author       	: Droitthemes
Template Name	: Chaos - Multi Purpose WordPress Theme
Version      	: 1.0

* ================================================================= */



/* ===== LOADER OVERLAY ===== */

(function ($) {
    'use strict';

    (function(){
        if( document.cookie.indexOf('device_pixel_ratio') == -1
            && 'devicePixelRatio' in window
            && window.devicePixelRatio == 2 ){

            var date = new Date();
            date.setTime( date.getTime() + 3600000 );

            document.cookie = 'device_pixel_ratio=' + window.devicePixelRatio + ';' +  ' expires=' + date.toUTCString() +'; path=/';
            //if cookies are not blocked, reload the page
            if(document.cookie.indexOf('device_pixel_ratio') != -1) {
                window.location.reload();
            }
        }
    })();


    function wc_review_tab() {
        $('.pr_description-tab .nav-tabs li').removeClass('active');
        $('.tab-content>.tab-pane').removeClass('active');
        $('.pr_description-tab .nav-tabs li:last-child').addClass('active');
        $('.tab-content>.tab-pane:last-child').addClass('active');
    }



    $('.ar_top').on('click', function () {
        var getID = $(this).next().attr('id');
        var result = document.getElementById(getID);
        var qty = result.value;
        $('.proceed_to_checkout .update-cart').removeAttr('disabled');
        if( !isNaN( qty ) ) {
            result.value++;
        }else{
            return false;
        }
    });

    $('.ar_down').on('click', function () {
        var getID = $(this).prev().attr('id');
        var result = document.getElementById(getID);
        var qty = result.value;
        $('.proceed_to_checkout .update-cart').removeAttr('disabled');
        if( !isNaN( qty ) && qty > 0 ) {
            result.value--;
        }else {
            return false;
        }
    });

    $(document).ready(function ($) {

        /* ===== PRELOADER  ===== */

        // Page loader
        $("#loader-overlay").delay(500).fadeOut();
        $(".loader").delay(1000).fadeOut("slow");



        $(window).trigger("scroll");
        $(window).trigger("resize");


        /*--------- cart-menu js-----------*/
        function cartActivitor(){
            if($(window).width()< 768){
                $('.cart-menu').on('click', function(){
                    if( $(this).hasClass('open') ){
                        $(this).removeClass('open')
                    }
                    else{
                        $(this).addClass('open')
                    }
                    return false
                });
            }
        }
        cartActivitor();

        /* ===== CBP PORTFOLIO ===== */
        var wow = new WOW({
                offset: 100,
                mobile: true
            }
        );
        wow.init();



        /* ===== Sliders ===== */

        $('.slider_wrap').slick({
            dots: false,
            infinite: true,
            slidesToShow: 1,
            autoplay: true,
            arrows: true,
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>",
            fade: true
        });


        /* ~~~ Testimonial Slider Two ~~~ */
        function testimonialSliderTwo() {
            $(".testimonial-two").slick({
                dots: true,
                infinite: true,
                slidesToShow: 2,
                slidesToScroll: 2,
                centerPadding: '0',
                autoplay: true,
                autoplaySpeed: 2000,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2,
                            infinite: true,
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        }
        testimonialSliderTwo();

        /* ===== One page Scroller ===== */

        $('a.page-scroll').on('click', function(event) {
            var $anchor = $(this);
            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 50
            }, 1000, 'easeInOutExpo');
            event.preventDefault();
        });



        /* ===== Search Overlay ===== */

        var wHeight = window.innerHeight;
        //search bar middle alignment
        $('#fullscreen-searchform').css('top', wHeight / 2);
        //reform search bar
        jQuery(window).resize(function() {
            wHeight = window.innerHeight;
            $('#fullscreen-searchform').css('top', wHeight / 2);
        });
        // Search
        $('#search-button').on('click', function () {
            $("div.fullscreen-search-overlay").addClass("fullscreen-search-overlay-show");
        });
        $('a.fullscreen-close').on('click', function () {
            $("div.fullscreen-search-overlay").removeClass("fullscreen-search-overlay-show");
        });



        /* ===== SKILLS BAR ===== */

        $('.skillbar').each(function(){
            $(this).find('.skillbar-bar').animate({
                width:jQuery(this).attr('data-percent')
            },6000);
        });

        /* ===== CONTACT FORM ===== */
        // $('#contact-form').validator();




    });

    /*===========Portfolio isotope js===========*/
    function portfolioMasonry(){
        var portfolio = $("#work-portfolio,#blog_masonry");
        if( portfolio.length ){
            portfolio.imagesLoaded( function() {
                // images have loaded
                // Activate isotope in container
                portfolio.isotope({
                    itemSelector: ".work-item,.blog_item",
                    layoutMode: 'masonry',
                    transformsEnabled: true,
                    transitionDuration: "700ms",
                    masonry: {
                        // use element for option
                        columnWidth: '.grid-sizer'
                    }
                });

                // Add isotope click function
                $("#chaos_gallery_filter div").on('click',function(){
                    $("#chaos_gallery_filter div").removeClass("active");
                    $(this).addClass("active");

                    var selector = $(this).attr("data-filter");
                    portfolio.isotope({
                        filter: selector,
                        animationOptions: {
                            animationDuration: 750,
                            easing: 'linear',
                            queue: false
                        }
                    })
                    return false;
                });
            });
        }
    }
    portfolioMasonry();




    /*=============================================== 
      tooltip js
    ================================================*/
    $('[data-toggle="tooltip"]').tooltip();


    // Closes responsive menu when a scroll trigger link is clicked
    $('.navbar .nav li > a:not(.dropdown-toggle)').on('click', function() {
        $('.navbar-default .navbar-collapse').collapse('hide');
    });


    // $(function(){
	// 	$('#slick_mneu').slicknav();
	// });



})(jQuery);

/*End Jquery*/
