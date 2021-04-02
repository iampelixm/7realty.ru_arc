var flag = false;
var sync01 = $(".slider");
var sync02 = $(".thumbnails");
var slides = sync01
    .owlCarousel({
        margin: 10,
        items: 1,
        nav: true,
        dots: false
    })
    .on("change.owl.carousel", function(e) {
        if (e.namespace && e.property.name === "position" && !flag) {
            flag = true;
            thumbs.to(e.relatedTarget.relative(e.property.value), 300, true);
            flag = false;
        }
    })
    .data("owl.carousel");
var thumbs = sync02
    .owlCarousel({
        nav: false,
        dots: true,
        margin: 25,
        responsive: {
            0: {
                items: 3
            },
            768: {
                items: 4
            },
            992: {
                items: 5
            },
            1200: {
                items: 7
            }
        }
    })
    .on("click", ".item", function(e) {
        e.preventDefault();
        sync01.trigger("to.owl.carousel", [
            $(e.target)
                .parents(".owl-item")
                .index(),
            300,
            true
        ]);
    })
    .on("change.owl.carousel", function(e) {
        if (e.namespace && e.property.name === "position" && !flag) {
            //nsole.log('...');
        }
    })
    .data("owl.carousel");

var sync1 = $(".slider1");
var sync2 = $(".thumbnails1");
var slides = sync1
    .owlCarousel({
        margin: 10,
        items: 1,
        nav: true,
        dots: false
    })
    .on("change.owl.carousel", function(e) {
        if (e.namespace && e.property.name === "position" && !flag) {
            flag = true;
            thumbs.to(e.relatedTarget.relative(e.property.value), 300, true);
            flag = false;
        }
    })
    .data("owl.carousel");
var thumbs = sync2
    .owlCarousel({
        items: 5,
        nav: false,
        dots: true,
        margin: 25,
        responsive: {
            0: {
                items: 3
            },
            768: {
                items: 4
            }
        }
    })
    .on("click", ".item", function(e) {
        e.preventDefault();
        sync1.trigger("to.owl.carousel", [
            $(e.target)
                .parents(".owl-item")
                .index(),
            300,
            true
        ]);
    })
    .on("change.owl.carousel", function(e) {
        if (e.namespace && e.property.name === "position" && !flag) {
            //nsole.log('...');
        }
    })
    .data("owl.carousel");

//$(".owl-prev").html('<i class="fas fa-chevron-left">asda</i>');
//$(".owl-next").html('<i class="fas fa-chevron-right">asd</i>');

$(".slider1 .owl-prev").html('<img src="/users/image/slider_left.png">');
$(".slider1 .owl-next").html('<img src="/users/image/slider_right.png">');

$(".slider .owl-prev").html('<i class="fas fa-chevron-left">asda</i>');
$(".slider .owl-next").html('<i class="fas fa-chevron-right">asd</i>');

