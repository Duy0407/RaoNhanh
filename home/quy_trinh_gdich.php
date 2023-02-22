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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">QUY TRÌNH GIAO DỊCH</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">1. Quy trình giao dịch dành cho người mua hàng.</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Đăng nhập tài khoản Raonhanh365.vn <br>
                                    - Tìm kiếm, tham khảo thông tin sản phẩm, dịch vụ, khuyến mại mà Người Mua đang quan tâm.<br>
                                    - Tham khảo thông tin giá và chính sách hỗ trợ của bên bán sản phẩm, dịch vụ mà Người Mua
                                    đang có nhu cầu mua (có thể tham khảo mặt hàng tương tự của những Người Bán khác trên
                                    website Raonhanh365.vn để đưa ra quyết định mua sản phẩm, dịch vụ đó)</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td w_100 fl_left sh_clr_two cr_weight mb_10">2.Quy trình giao dịch dành cho Người Bán</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">3.Quy Trình Giao Nhận Vận Chuyển:</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two w_100 fl_left cr_weight mb_10">4.Quy Trình Xác Nhận/Hủy Đơn Hàng.</h4>
                                <p class="w_100 fl_left sh_clr_five cr_weight sh_size_six mb_10">
                                    Người mua với người bán tự xác nhận cách thức đặt hàng và hủy đơn hàng,
                                    Raonhanh365.vn không tham gia vào quy trình xác nhận và hủy đơn hàng.
                                </p>
                                <p class="w_100 fl_left cr_weight sh_clr_five sh_size_four mb_10">Các quy trình khác:</p>
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