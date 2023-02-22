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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">QUY ĐỊNH THANH TOÁN</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">1.Quy định đăng tin khách hàng</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Người bán Thanh toán theo thỏa thuận hợp đồng đã ký với Hưng Hà thông qua 2 hình thức:
                                    - Quý khách đến văn phòng Công ty Hưng Hà tại: Số 5B, ngõ 245/116/35, Phố Định Công, Quận Hoàng Mai,
                                    Thành Phố Hà Nội để thực hiện thanh toán, nhân viên của chúng tôi sẽ hướng dẫn quý khách.
                                    Quý khách chú ý khi thanh toán phải có phiếu thu của Công ty TNHH dịch vụ và phát triển Hưng Hà,
                                    con dấu và chữ ký của Kế toán trưởng hoặc Giám đốc Trung tâm.
                                    - Thanh toán chuyển khoản cho công ty.</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">2. Người Mua</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_size_four cr_weight mb_15">Cách 1: Thanh toán trực tiếp:</p>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_size_four cr_weight mb_15">Cách 2:Thanh toán sau (COD – giao hàng và thu
                                    tiền tận nơi. Cách này được ban quản trị Raonhanh365.vn khuyến khích)</p>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_size_four cr_weight">Cách 3:Thanh toán online qua thẻ tín dụng,
                                    chuyển khoản</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">3. Đảm bảo an toàn giao dịch</h4>
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