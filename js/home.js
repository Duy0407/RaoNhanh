$(document).ready(function () {
    $('.box-content-tdnb').slick({
        dots: true,
    });
    $('.box-content-tdhd').slick({
        dots: true,
    });
    $('.box-content-ghnb').slick({
        dots: true,
    });
    $('.btn-tim').click(function () {
        var src = $(this).find('img').attr('src');
        if (src == "/images/newImages/trai-tim-trang.png") {
            $(this).find('img').attr('src', '/images/newImages/trai-tim-cam.png');
        } else {
            $(this).find('img').attr('src', '/images/newImages/trai-tim-trang.png');
        }
    });
    $('.prev-step').click(function(){
        var leftPos = $('.box-content-qt').scrollLeft();
        $(".box-content-qt").animate({scrollLeft: leftPos - 200}, 800);
    });
    $('.next-step').click(function(){
        var leftPos = $('.box-content-qt').scrollLeft();
        $(".box-content-qt").animate({scrollLeft: leftPos + 200}, 800);
    });

});

