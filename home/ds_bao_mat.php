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
        <div class="ctn_wapper ctn_wapper_df w_100 fl_left tin_tuc">
            <div class="ctn_banner w_100 fl_left">
                <div class="ctn_noidung_bn tex_center w_100 fl_left">
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">CHÍNH SÁCH BẢO MẬT</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h3 class="quydinh_td sh_clr_two cr_weight w_100 fl_left mb_10">Chính sách bảo vệ thông tin cá nhân</h3>
                                <h4 class="sh_clr_two sh_size_four cr_weight w_100 fl_left mb_15">
                                    Mục đích và phạm vi thu thập<br>
                                </h4>
                                <h4 class="sh_clr_two w_100 cr_weight fl_left sh_size_four mb_15">Phạm vi sử dụng thông tin</h4>
                                <h4 class="sh_clr_two w_100 cr_weight fl_left sh_size_four mb_15">Thời gian lưu trữ thông tin</h4>
                                <p class="sh_clr_five w_100 fl_left w_100 fl_left mb_10 sh_size_one">Công ty TNHH dịch vụ và phát triển Hưng Hà </p>
                                <p class="sh_clr_five w_100 fl_left w_100 fl_left mb_10 sh_size_one"> Trụ sở chính: Số nhà 5B, ngõ 245/116/35, phố Định Công, Phường Định Công, Quận Hoàng Mai,
                                    Thành Phố Hà Nội </p>
                                <p class="sh_clr_five w_100 fl_left w_100 fl_left mb_10 sh_size_one"> Email: congtytnhh.hungha@gmail.com</p>
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