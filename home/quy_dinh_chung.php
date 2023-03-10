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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">QUY ?????NH CHUNG</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">1.Ng?????i b??n</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Raonhanh365.vn s??? gi???i ????p trong v??ng 10 tr??? ng??y ngh??? ho???c l??? sau khi kh??ch h??ng s??? d???ng d???ch v???.
                                    Sau th???i gian tr??n Raonhanh365.vn c?? quy???n t??? ch???i h??? tr???/ gi???i ????p. <br>
                                    - Ch?? ??: Th??nh vi??n ????ng k?? tr??n Raonhanh365.vn kh??ng ???????c ph??p s??? d???ng nh???ng nick gi??? d???ng Ban qu???n tr???,
                                    t??n c??c ch??nh tr??? gia s??? d??? g??y hi???u nh???m, k??ch ?????ng nh??: Raonhanh365.vn, admin,moderator??? l??m t??n t??i
                                    kho???n c???a m??nh. T???t c??? nh???ng th??nh vi??n c??? t??nh ????ng k?? s??? b??? x??a.</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">2.Nghi??m c???m</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    - Kh??ng ???????c ????ng t???i th??ng tin rao v???t m?? ph??p lu???t Vi???t Nam nghi??m c???m
                                    - Kh??ng ????ng t???i th??ng tin rao v???t tr??i v???i ?????o ?????c x?? h???i vi???t nam

                                    - Kh??ng ????ng t???i sex, crack, hack, chi??nh tri??, t??n gia??o, mua b??n ?????ng v???t hoang d?? v?? c??c s???n ph???m c???a ch??ng.
                                    - Kh??ng ????ng t???i th??ng tin rao v???t b??n r?????u, ngo???i t???, thu???c l??, s??ng, v???t li???u n???, v?? kh??, ma t??y, ????? ch??i nguy hi???m...
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">3. Quy???n h???n c???a c???a Raonhanh365.vn</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">4. Vi ph???m m???t trong nh???ng l?? do sau s??? b??? x??a m?? kh??ng b??o tr?????c:</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    - Ti??u ????? kh??ng d???u, c?? k?? t??? ?????c bi???t, vi???t hoa, ti??u ????? qu?? d??i ho???c copy nguy??n n???i dung c???a tin ????ng, ti??u ????? ????? s??? tel, t??n web, gi?? ti???n ngo???i t???...
                                    - Tin rao sai chuy??n m???c(V?? d???:Rao b??n ??i???n tho???i trong m???c Du l???ch).
                                </p>
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