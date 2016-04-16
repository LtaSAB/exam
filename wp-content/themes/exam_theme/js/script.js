(function ($, undefined) {

})(jQuery);
$(window).load(function() {
    $('.flexslider').flexslider({
        animation: "slide"
    });
});
$(window).load(function() {
    $('.our-parthners .flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5
    });
});