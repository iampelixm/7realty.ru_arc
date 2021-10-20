getOwlParams=function(selector)
{
    var defaults={
        items: 5,
        autoplay: true,
        autoplayTimeout: 6000,
        autoplaySpeed: 1000,
        autoWidth:true,
        loop: true,
        margin: 30,
        nav: false,
        dots: false
    }
    settings = $.extend(false, defaults, $(selector).data());
    return settings;
}
