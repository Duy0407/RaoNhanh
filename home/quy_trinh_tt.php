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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">QUY ?????NH THANH TO??N</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">1.Quy ?????nh ????ng tin kh??ch h??ng</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Ng?????i b??n Thanh to??n theo th???a thu???n h???p ?????ng ???? k?? v???i H??ng H?? th??ng qua 2 h??nh th???c:
                                    - Qu?? kh??ch ?????n v??n ph??ng C??ng ty H??ng H?? t???i: S??? 5B, ng?? 245/116/35, Ph??? ?????nh C??ng, Qu???n Ho??ng Mai,
                                    Th??nh Ph??? H?? N???i ????? th???c hi???n thanh to??n, nh??n vi??n c???a ch??ng t??i s??? h?????ng d???n qu?? kh??ch.
                                    Qu?? kh??ch ch?? ?? khi thanh to??n ph???i c?? phi???u thu c???a C??ng ty TNHH d???ch v??? v?? ph??t tri???n H??ng H??,
                                    con d???u v?? ch??? k?? c???a K??? to??n tr?????ng ho???c Gi??m ?????c Trung t??m.
                                    - Thanh to??n chuy???n kho???n cho c??ng ty.</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">2. Ng?????i Mua</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_size_four cr_weight mb_15">C??ch 1: Thanh to??n tr???c ti???p:</p>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_size_four cr_weight mb_15">C??ch 2:Thanh to??n sau (COD ??? giao h??ng v?? thu
                                    ti???n t???n n??i. C??ch n??y ???????c ban qu???n tr??? Raonhanh365.vn khuy???n kh??ch)</p>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_size_four cr_weight">C??ch 3:Thanh to??n online qua th??? t??n d???ng,
                                    chuy???n kho???n</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">3. ?????m b???o an to??n giao d???ch</h4>
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