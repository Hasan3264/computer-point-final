$(function () {
    'use strict'

    $('.slider').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '00px',
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1,
                }
            }
        ]
    });
    // $('.sells').slick({
    //     centerMode: true,
    //     centerPadding: '0px',
    //     slidesToShow: 7,
    //     autoplay: true,
    //     autoplaySpeed: 1500,
    //     arrows: true,
    //     nextArrow: '<i id="next" onclick="next()" class="bi bi-arrow-left net-arrow"></i>',
    //     prevArrow: '<i id="prev" onclick="prev()" class="bi bi-arrow-right pre-arrow"></i>',
    //     responsive: [{
    //             breakpoint: 992,
    //             settings: {
    //                 arrows: false,
    //                 centerMode: true,
    //                 centerPadding: '00px',
    //                 slidesToShow: 6,
    //             }
    //         },
    //         {
    //             breakpoint: 768,
    //             settings: {
    //                 arrows: false,
    //                 centerMode: true,
    //                 centerPadding: '0px',
    //                 slidesToShow: 4,
    //             }
    //         },
    //         {
    //             breakpoint: 480,
    //             settings: {
    //                 arrows: false,
    //                 centerMode: true,
    //                 centerPadding: '0px',
    //                 slidesToShow: 2,
    //                 arrows: true,
    //             }
    //         }
    //     ]
    // });
    $('.sdfdsdsf').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 5,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: true,
        nextArrow: '<i id="next" onclick="next()" class="bi bi-arrow-left net-arrow"></i>',
        prevArrow: '<i id="prev" onclick="prev()" class="bi bi-arrow-right pre-arrow"></i>',
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '00px',
                    slidesToShow: 4,

                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 2,
                    arrows: true,
                }
            }
        ]
    });
    $('.p-s-c-1').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 1,
        arrows: false,
        dots: true,
        autoplay: true,
        autoplaySpeed: 1500,
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '00px',
                    slidesToShow: 1,
                    dots: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1,
                    dots: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centermargin: '20px',
                    slidesToShow: 1,
                    dots: true,
                }
            }
        ]
    });
    $('.kjuh').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 5,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 1500,
        dots: false,
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '00px',
                    slidesToShow: 4,
                    dots: false,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 3,
                    dots: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 2,
                    dots: false,
                }
            }
        ]
    });
    $('.com-logo').slick({
        centerMode: true,
        centerPadding: '30px',
        slidesToShow: 6,
        autoplay: true,
        autoplaySpeed: 1500,
        arrows: false,
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '00px',
                    slidesToShow: 4,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 3,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 2,
                }
            }
        ]
    });
    $('.content').slick({
        centerMode: true,
        centerPadding: '0px',
        slidesToShow: 2,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 1500,
        dots: true,
        responsive: [{
                breakpoint: 992,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '00px',
                    slidesToShow: 2,
                    dots: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 2,
                    dots: true,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 1,
                    dots: true,
                }
            }
        ]
    });
    //product dtails slidre
    $('#slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav',
    });
    $('.slider-nav').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        asNavFor: '#slider-for',
        dots: false,
        centerPadding: '0px',
        centerMode: false,
        arrows: false,
        focusOnSelect: true
    });


    var navOff = $('.navigation').offset().top;

    $(window).scroll(function () {

        var scrolling = $(this).scrollTop();

        if (scrolling > 198) {
             $('#navbar').addClass('menu_fix');
        } else {
             $('#navbar').removeClass('menu_fix');
        }
    });
    //

    //     //back to top
    $('.back-to-top').click(function () {
        $('html,body').animate({
            scrollTop: 0,
        }, 500);
    });

    $(window).scroll(function () {
        var scrolling2 = $(this).scrollTop();

        if (scrolling2 > 500) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut()
        }
    });

});
