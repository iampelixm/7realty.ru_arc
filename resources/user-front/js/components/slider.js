require('owl.carousel');
require('slick-carousel');

$('.slider-custom__one.owl-carousel').owlCarousel({
    items: 1,
    loop: false,
    margin:0,
    nav: true,
    dots: false
});
$('.slide-image-div').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    dots: true,
    infinite: true,
    prevArrow: '<button class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button class="slick-next"><i class="fas fa-chevron-right"></i></button>'
});
$('.slider-custom__three.owl-carousel').owlCarousel({
    items: 3,
    loop: false,
    nav: true,
    margin: 30,
    responsive: {
        0 : {
            items: 1,
        },
        576 : {
            items: 2,
        },
        992 : {
            items: 3,
        }
    }
});
$('.slider-custom__four.owl-carousel').owlCarousel({
    items: 4,
    loop: false,
    margin: 30,
    nav: true,
    responsive: {
        0 : {
            items: 1,
        },
        576 : {
            items: 2,
        },
        992 : {
            items: 3,
        },
        1200 : {
            items: 4
        }
    }
});

$( ".owl-prev").html('<i class="fas fa-chevron-left"></i>');
$( ".owl-next").html('<i class="fas fa-chevron-right"></i>');