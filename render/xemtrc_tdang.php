<?
include("config.php");


include('../functions/xemtr_tdang.php');

include('../functions/xemtrx1.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_type = $_COOKIE['UT'];

    $id_dm        = $_POST['id_dmuc'];
    $tieu_de      = $_POST['tieu_de'];
    $gia_sp       = $_POST['gia_spham'];
    $donvi_ban    = $_POST['donvi_ban'];
    $mo_ta        = $_POST['mo_ta'];
    $dia_chi      = $_POST['dia_chi'];
    $tang_mphi    = $_POST['tang_mphi'];
    $gia_bd       = $_POST['gia_bd'];
    $gia_kt       = $_POST['gia_kt'];
    $avt_anh      = $_POST['avt_anh'];
    $url_vd       = $_POST['url_vd'];
    $donvi_mua    = $_POST['donvi_mua'];
    $ctiet_dmuc   = $_POST['ctiet_dmuc'];
    $tinh_trang   = $_POST['tinh_trang'];
    $td_diachi_nha = $_POST['td_diachi_nha'];

    $loai_sp    = $_POST['loai_sp'];
    $loai_sp2   = $_POST['loai_sp2'];
    $loai_sp3   = $_POST['loai_sp3'];
    $loai_sp4   = $_POST['loai_sp4'];
    $loai_sp5   = $_POST['loai_sp5'];
    $loai_sp6   = $_POST['loai_sp6'];
    $loai_sp7   = $_POST['loai_sp7'];
    $loai_sp8   = $_POST['loai_sp8'];
    $loai_sp9   = $_POST['loai_sp9'];
    $loai_sp10  = $_POST['loai_sp10'];
    $loai_sp11  = $_POST['loai_sp11'];
    $loai_sp12  = $_POST['loai_sp12'];
    $loai_sp13  = $_POST['loai_sp13'];
    $loai_sp14  = $_POST['loai_sp14'];
    $loai_sp15  = $_POST['loai_sp15'];
    $loai_sp16  = $_POST['loai_sp16'];


    $phan_biet = $_POST['phan_biet'];
    if ($phan_biet == 1) {
        echo xemtrc_tdang("$us_type", "$id_dm", "$tieu_de", "$gia_sp", "$gia_bd", "$gia_kt", "$donvi_ban","$donvi_mua", "$tang_mphi", "$mo_ta", "$ctiet_dmuc", "$dia_chi", "$avt_anh", "$url_vd", "$tinh_trang", "$loai_sp", "$loai_sp2", "$loai_sp3", "$loai_sp4", "$loai_sp5", "$loai_sp6", "$loai_sp7", "$loai_sp8", "$loai_sp9", "$loai_sp10", "$loai_sp11");
    } else if ($phan_biet == 2) {
        echo xemtrc_tdang1("$us_type", "$id_dm", "$tieu_de", "$gia_sp", "$gia_bd", "$gia_kt", "$donvi_ban","$td_diachi_nha" ,"$donvi_mua", "$tang_mphi", "$mo_ta", "$ctiet_dmuc", "$dia_chi", "$avt_anh", "$url_vd", "$tinh_trang", "$loai_sp", "$loai_sp2", "$loai_sp3", "$loai_sp4", "$loai_sp5", "$loai_sp6", "$loai_sp7", "$loai_sp8", "$loai_sp9", "$loai_sp10", "$loai_sp11", "$loai_sp12", "$loai_sp13", "$loai_sp14", "$loai_sp15","$loai_sp16");
    }
} ?>
<script>
    $(".quay_lai").click(function() {
        $(".v_container").addClass("d_none");
        $(".v_container").html('');
        $(".form_bds_chung").removeClass("d_none");
    });

    $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        Accessibility: true,
        adaptiveHeight: false,
        asNavFor: '.slider-nav',
        arrows: true,
        autoplay: true,
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
        verticalSwiping: true,
        centerMode: true,
    });

    // $(".dang_tindi").click(function() {
    //     $(".td-dang-tin").click();
    // });
</script>