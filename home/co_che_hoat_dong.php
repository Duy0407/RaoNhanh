<?
include("../includes/icon.php");
include("config.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport"
        content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2"
        crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/select2.min.css?v='<?= $version ?>'" as="style">
    <link href="/css/select2.min.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />

    <link rel="preload" href="/css/newCss/header.css?v=<?= $version ?>" as="style">
    <link rel="stylesheet" href="/css/newCss/header.css?v=<?= $version ?>" type="text/css" />

    <link rel="preload" href="/css/newCss/home_new.css" as="style">
    <link rel="stylesheet" href="/css/newCss/home_new.css" type="text/css">

    <link type="text/css" href="/css/style_new/footer.css" rel="stylesheet">
    <link type="text/css" href="/css/style_new/style.css" rel="stylesheet">
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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">C?? CH??? HO???T ?????NG</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h1 class="cchd_dc">WEBSITE CUNG C???P D???CH V??? TM??T [RAONHANH365.VN]</h1>
                                <h4 class="cchd_dc_tieude">I. Nguy??n t???c chung</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    S??n giao d???ch TM??T Raonhanh365.vn do C??ng ty C??? ph???n Thanh to??n H??ng H?? l??m ch??? s???
                                    h???u.
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">II. Quy ?????nh chung</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Website Raonhanh365.vn (sau ????y g???i l?? Raonhanh365.vn) l?? m???t website cung c???p d???ch
                                    v??? th????ng m???i ??i???n t??? thi???t l???p b???i C??ng ty C??? ph???n Thanh to??n H??ng H??
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">III. Quy tr??nh giao d???ch</h4>
                                <div class="cchd_dc_tieude_2">
                                    <p>1. Quy tr??nh giao d???ch d??nh cho ng?????i mua h??ng</p>
                                    <p>2. Quy tr??nh giao d???ch d??nh cho Ng?????i B??n</p>
                                    <p>3. Quy Tr??nh Giao Nh???n V???n Chuy???n:</p>
                                </div>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">IV. Quy tr??nh thanh to??n</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">V. ?????m b???o an to??n giao d???ch</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">VI. B???o v??? th??ng tin c?? nh??n kh??ch h??ng</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">VII. Qu???n l?? th??ng tin x???u</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    1 . Tin ????ng <br>
                                    - Kh??ng ????ng s???n ph???m ????ng danh m???c ,th????ng hi???u ng??nh h??ng Kh??ng duy???t X??a tin ????ng
                                    & kh??a T??i Kho???n (vi???t t???t l?? TK) 5 ng??y Ti??u ????? tin ????ng kh??ng c?? d???u, k?? t??? l??? ,
                                    in hoa h???t, tr??ng l???p ??i l???p l???i, t??? ng??? nh???y c???m ... Kh??ng duy???t X??a tin ????ng &
                                    kh??a TK 5 ng??y <br>
                                    - ???nh b??n h??ng l?? logo, l???y h??nh ???nh ?????i di???n kh??c v???i s???n ph???m b??n, ???nh nh???y c???m,
                                    ???nh kh??ng ????ng v???i sp b??n <br>
                                    - H??nh ???nh, ti??u ????? v?? n???i dung kh??ng li??n quan ?????n nhau Kh??ng duy???t X??a tin ????ng &
                                    kh??a TK 5 ng??y
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">VIII. Tr??ch nhi???m trong tr?????ng h???p ph??t sinh l???i k??? thu???t
                                </h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">IX.Quy???n v?? ngh??a v??? c???a Ban qu???n l?? website TM??T
                                    [Raonhanh365.vn]</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">X. Quy???n v?? tr??ch nhi???m th??nh vi??n tham gia S??n giao
                                    d???ch/website</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">XI. ??i???u kho???n ??p d???ng</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">XII. ??i???u kho???n cam k???t</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    M???i th??nh vi??n v?? ?????i t??c/ng?????i b??n h??ng khi s??? d???ng Raonhanh365.vn l??m giao d???ch
                                    mua b??n tr???c tuy???n th?? ?????ng ngh??a vi???c c??c b??n c?? li??n quan ???? ch???p thu???n tu??n theo
                                    quy ch??? n??y. M???i th???c m???c c???a kh??ch h??ng xin vui l??ng li??n h??? v???i Raonhanh365.vn
                                    theo th??ng tin d?????i ????y ????? ???????c gi???i ????p: H??? tr??? kh??ch h??ng S??n giao d???ch/Website
                                    Th????ng m???i ??i???n t??? [Raonhanh365.vn] C??ng ty/T??? ch???c: C??ng ty TNHH d???ch v??? v?? ph??t
                                    tri???n H??ng H??. ?????a ch???: S??? nh?? 5B, ng?? 245/116/35, Ph??? ?????nh C??ng, Ph?????ng ?????nh C??ng,
                                    Qu???n Ho??ng Mai, Th??nh ph??? H?? N???i, Vi???t Nam Tel: 0466.871.323 Email:
                                    hotro@Raonhanh365.vn
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