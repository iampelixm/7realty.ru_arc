require("owl.carousel");
require("slick-carousel");
require("./common");


$(".item-image-slider").slick({
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

$(".partners__slider").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: false,
    infinite: true,
    centerMode: true,
    variableWidth: true
});

$(".items-slider").owlCarousel(getOwlParams('.items-slider'));
$(".items-slider .owl-prev").html('<img src="/users/image/slider_left.png">');
$(".items-slider .owl-next").html('<img src="/users/image/slider_right.png">');

$(".slidethis").each(function(eli, el)
{
    var settings=getOwlParams(el);
    $(el).owlCarousel(settings);
    $(el).find(".owl-prev").html('<img src="/users/image/slider_left.png">');
    $(el).find(".owl-next").html('<img src="/users/image/slider_right.png">');
});
