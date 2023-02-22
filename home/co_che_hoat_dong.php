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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">CƠ CHẾ HOẠT ĐỘNG</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h1 class="cchd_dc">WEBSITE CUNG CẤP DỊCH VỤ TMĐT [RAONHANH365.VN]</h1>
                                <h4 class="cchd_dc_tieude">I. Nguyên tắc chung</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Sàn giao dịch TMĐT Raonhanh365.vn do Công ty Cổ phần Thanh toán Hưng Hà làm chủ sở
                                    hữu.
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">II. Quy định chung</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Website Raonhanh365.vn (sau đây gọi là Raonhanh365.vn) là một website cung cấp dịch
                                    vụ thương mại điện tử thiết lập bởi Công ty Cổ phần Thanh toán Hưng Hà
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">III. Quy trình giao dịch</h4>
                                <div class="cchd_dc_tieude_2">
                                    <p>1. Quy trình giao dịch dành cho người mua hàng</p>
                                    <p>2. Quy trình giao dịch dành cho Người Bán</p>
                                    <p>3. Quy Trình Giao Nhận Vận Chuyển:</p>
                                </div>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">IV. Quy trình thanh toán</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">V. Đảm bảo an toàn giao dịch</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">VI. Bảo vệ thông tin cá nhân khách hàng</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">VII. Quản lý thông tin xấu</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    1 . Tin đăng <br>
                                    - Không đăng sản phẩm đúng danh mục ,thương hiệu ngành hàng Không duyệt Xóa tin đăng
                                    & khóa Tài Khoản (viết tắt là TK) 5 ngày Tiêu đề tin đăng không có dấu, ký tự lạ ,
                                    in hoa hết, trùng lặp đi lặp lại, từ ngữ nhạy cảm ... Không duyệt Xóa tin đăng &
                                    khóa TK 5 ngày <br>
                                    - Ảnh bán hàng là logo, lấy hình ảnh đại diện khác với sản phẩm bán, ảnh nhậy cảm,
                                    ảnh không đúng với sp bán <br>
                                    - Hình ảnh, tiêu đề và nội dung không liên quan đến nhau Không duyệt Xóa tin đăng &
                                    khóa TK 5 ngày
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">VIII. Trách nhiệm trong trường hợp phát sinh lỗi kỹ thuật
                                </h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">IX.Quyền và nghĩa vụ của Ban quản lý website TMĐT
                                    [Raonhanh365.vn]</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">X. Quyền và trách nhiệm thành viên tham gia Sàn giao
                                    dịch/website</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">XI. Điều khoản áp dụng</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="cchd_dc_tieude">XII. Điều khoản cam kết</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Mọi thành viên và đối tác/người bán hàng khi sử dụng Raonhanh365.vn làm giao dịch
                                    mua bán trực tuyến thì đồng nghĩa việc các bên có liên quan đã chấp thuận tuân theo
                                    quy chế này. Mọi thắc mắc của khách hàng xin vui lòng liên hệ với Raonhanh365.vn
                                    theo thông tin dưới đây để được giải đáp: Hỗ trợ khách hàng Sàn giao dịch/Website
                                    Thương mại điện tử [Raonhanh365.vn] Công ty/Tổ chức: Công ty TNHH dịch vụ và phát
                                    triển Hưng Hà. Địa chỉ: Số nhà 5B, ngõ 245/116/35, Phố Định Công, Phường Định Công,
                                    Quận Hoàng Mai, Thành phố Hà Nội, Việt Nam Tel: 0466.871.323 Email:
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