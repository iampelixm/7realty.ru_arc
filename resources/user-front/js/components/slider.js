require("owl.carousel");
require("slick-carousel");
require("../common");

$(".slider-custom__one.owl-carousel").owlCarousel({
    items: 1,
    loop: false,
    margin: 0,
    nav: true,
    dots: false
});
$(".slide-image-div").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    infinite: true,
    _prevArrow:
        '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    prevArrow:
        `
        <button class="slick-prev">
            <img src="/users/image/slider_left.png">
        </button>
        `,
    _nextArrow:
        '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    nextArrow:
        `
        <button class="slick-next">
            <img src="/users/image/slider_right.png">
        </button>
        `
});
$(".slider-custom__three.owl-carousel").owlCarousel({
    items: 3,
    loop: false,
    nav: true,
    margin: 30,
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 2
        },
        992: {
            items: 3
        }
    }
});
$(".slider-custom__four.owl-carousel").owlCarousel({
    items: 4,
    loop: false,
    margin: 30,
    nav: false,
    responsive: {
        0: {
            items: 1
        },
        576: {
            items: 2
        },
        992: {
            items: 3
        },
        1200: {
            items: 4
        }
    }
});

$(".mainpage_slider").owlCarousel({
    items: 1,
    autoplay:true,
    autoplayTimeout: 6000,
    autoplaySpeed: 1000,
    loop: false,
    margin: 30,
    nav: true,
    dots: false
});

$(".mainpage_slider .owl-prev").html('<img src="/users/image/slider_left.png">');
$(".mainpage_slider .owl-next").html('<img src="/users/image/slider_right.png">');



// $(".items-slider").owlCarousel(getOwlParams('.items-slider'));
// $(".items-slider .owl-prev").html('<img src="/users/image/slider_left.png">');
// $(".items-slider .owl-next").html('<img src="/users/image/slider_right.png">');


$(".slidethis, .items-slider").each(function(eli, el)
{
    var settings=getOwlParams(el);
    $(el).owlCarousel(settings);
    $(el).find(".owl-prev").html('<img src="/users/image/slider_left.png">');
    $(el).find(".owl-next").html('<img src="/users/image/slider_right.png">');
});
