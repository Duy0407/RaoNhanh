

$('.slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    Accessibility: true,
    adaptiveHeight: false,
    asNavFor: '.slider-nav',
    arrows: true,
    // autoplay: true,
    respondTo: '.slider',
    nextArrow: '<div class="slide_control next_slide"><i class="ic-next"></i></div>',
    prevArrow: '<div class="slide_control prev_slide"><i class="ic-prev"></i></div>'
});

$('.slider-nav').slick({
    asNavFor: '.slider',
    slidesToShow: 3,
    slidesToScroll: 1,
    focusOnSelect: true,
    slide: '.anh_ben',
    vertical: true,
    verticalSwiping:true,
    // centerPadding: '50px',
    centerMode: true,
});



function like_news(x){
    $(x).parent().find('i').toggleClass('active');
    var id = $(x).attr('data-id');
    // $.ajax({
    //
    // })
}



jQuery.fn.visibilityToggle = function() {
    return this.css('visibility', function(i, visibility) {
        return (visibility == 'visible') ? 'hidden' : 'visible';
    });
}

!(function($) {
    var toggle = $.fn.toggle;
    $.fn.toggle = function() {
        var args = $.makeArray(arguments),
            lastArg = args.pop();

        if (lastArg == 'visibility') {
            return this.visibilityToggle();
        }

        return toggle.apply(this, arguments);
    };
})(jQuery);
