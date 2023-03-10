<?
include("../includes/icon.php");
include("config.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow" /> 
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/select2.min.css?v='<?= $version ?>'" as="style">
    <link href="/css/select2.min.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />

    <link rel="preload" href="/css/newCss/header.css?v=<?= $version ?>" as="style">
    <link rel="stylesheet" href="/css/newCss/header.css?v=<?= $version ?>" type="text/css" />

    <link rel="preload" href="/css/newCss/home_new.css" as="style">
    <link rel="stylesheet" href="/css/newCss/home_new.css" type="text/css">

    <link type="text/css" href="/css/style_new/style.css" rel="stylesheet">
    <link type="text/css" href="/css/style_new/footer.css" rel="stylesheet">
    <link type="text/css" href="/css/style_new/giai_dap.css" rel="stylesheet">

</head>

<body>
    <?

    //----------------
    include("../includes/common/inc_header.php");
    include("../classes/Mobile_Detect.php");
    $detect = new Mobile_Detect();
    $count_ghang = 20;
    $count_nbat = 12;
    $count_hdan = 12;
    if ($detect->isMobile()) {
        $count_ghang = 8;
        $count_nbat = 6;
        $count_hdan = 6;
    }
    if ($detect->isTablet()) {
        $count_ghang = 16;
        $count_nbat = 12;
        $count_hdan = 12;
    }
    ?>

    <section>
        <div class="ctn_wapper w_100 fl_left tin_tuc">
            <div class="ctn_banner w_100 fl_left">
                <div class="ctn_noidung_bn tex_center w_100 fl_left">
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">QUY TR??NH GIAO D???CH</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">1. Quy tr??nh giao d???ch d??nh cho ng?????i mua h??ng.</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    ????ng nh???p t??i kho???n Raonhanh365.vn <br>
                                    - T??m ki???m, tham kh???o th??ng tin s???n ph???m, d???ch v???, khuy???n m???i m?? Ng?????i Mua ??ang quan t??m.<br>
                                    - Tham kh???o th??ng tin gi?? v?? ch??nh s??ch h??? tr??? c???a b??n b??n s???n ph???m, d???ch v??? m?? Ng?????i Mua
                                    ??ang c?? nhu c???u mua (c?? th??? tham kh???o m???t h??ng t????ng t??? c???a nh???ng Ng?????i B??n kh??c tr??n
                                    website Raonhanh365.vn ????? ????a ra quy???t ?????nh mua s???n ph???m, d???ch v??? ????)</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td w_100 fl_left sh_clr_two cr_weight mb_10">2.Quy tr??nh giao d???ch d??nh cho Ng?????i B??n</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">3.Quy Tr??nh Giao Nh???n V???n Chuy???n:</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two w_100 fl_left cr_weight mb_10">4.Quy Tr??nh X??c Nh???n/H???y ????n H??ng.</h4>
                                <p class="w_100 fl_left sh_clr_five cr_weight sh_size_six mb_10">
                                    Ng?????i mua v???i ng?????i b??n t??? x??c nh???n c??ch th???c ?????t h??ng v?? h???y ????n h??ng,
                                    Raonhanh365.vn kh??ng tham gia v??o quy tr??nh x??c nh???n v?? h???y ????n h??ng.
                                </p>
                                <p class="w_100 fl_left cr_weight sh_clr_five sh_size_four mb_10">C??c quy tr??nh kh??c:</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?
    include("../includes/inc_new/inc_footer.php")
    ?>
</body>
<script type="text/javascript" src="/js/jquery-3.4.1.min.js"></script>
<script type="text/javascript" src="/js/select2.min.js"></script>
<script type="text/javascript" src="/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="/js/ref_jquery_validation.js"></script>
<script src="/js/lazysizes.min.js"></script>

</html>