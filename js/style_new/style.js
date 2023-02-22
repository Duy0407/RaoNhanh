$(".gia_donvi").click(function () {
    $(this).parents(".dvi_gia").find(".item_gia").toggleClass("active");
});

$(".item_gia_ch").click(function () {
    var giatri = $(this).text();
    $(".gia_donvi").text(giatri);
    $(this).parent().removeClass("active");
});

$("input[name='lien_he_nban']").click(function () {
    if ($("input[name='lien_he_nban']").is(":checked")) {
        var rong = '';
        $("input[name='gia_spham']").val(rong);
        $("input[name='gia_spham']").attr("readonly", true);
    } else {
        $("input[name='gia_spham']").attr("readonly", false);
    }
});

// lam ma capcha



var do_xuay = 0;
$(".avt_icon_lh_cp").click(function () {
    do_xuay += 360;
    xoay($(this), do_xuay);
});

function xoay(img, deg) {
    img.css("transform", "rotate(" + deg + "deg)");
    img.css("transition", "0.3s");
};

function ramdumso(length) {
    var result = '';
    var characters = '0123456789';
    var charactersLength = characters.length;
    for (var i = 0; i < length; i++) {
        result += characters.charAt(Math.floor(Math.random() *
            charactersLength));
    }
    return result;
};
var ran = ramdumso(6);
$(".ma_cpch").val(ran)
$(".ma_dcap").html(ran);

$(".avt_icon_lh_cp").click(function () {
    var ran = ramdumso(6);
    $(this).parent().find(".ma_cpch").val(ran)
    $(this).parent().find(".ma_dcap").html(ran);
});

function xoay_cp(id) {
    do_xuay += 360;
    xoay($(id), do_xuay);
    var ran1 = ramdumso(6);
    $(id).parent().find(".ma_cpch").val(ran1)
    $(id).parent().find(".ma_dcap").html(ran1);
}
