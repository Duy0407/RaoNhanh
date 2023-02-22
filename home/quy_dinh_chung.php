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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">QUY ĐỊNH CHUNG</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">1.Người bán</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    Raonhanh365.vn sẽ giải đáp trong vòng 10 trừ ngày nghỉ hoặc lễ sau khi khách hàng sử dụng dịch vụ.
                                    Sau thời gian trên Raonhanh365.vn có quyền từ chối hỗ trợ/ giải đáp. <br>
                                    - Chú ý: Thành viên đăng ký trên Raonhanh365.vn không được phép sử dụng những nick giả dạng Ban quản trị,
                                    tên các chính trị gia sẽ dễ gây hiểu nhầm, kích động như: Raonhanh365.vn, admin,moderator… làm tên tài
                                    khoản của mình. Tất cả những thành viên cố tình đăng ký sẽ bị xóa.</p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">2.Nghiêm cấm</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    - Không được đăng tải thông tin rao vặt mà pháp luật Việt Nam nghiêm cấm
                                    - Không đăng tải thông tin rao vặt trái với đạo đức xã hội việt nam

                                    - Không đăng tải sex, crack, hack, chính trị, tôn giáo, mua bán động vật hoang dã và các sản phẩm của chúng.
                                    - Không đăng tải thông tin rao vặt bán rượu, ngoại tệ, thuốc lá, súng, vật liệu nổ, vũ khí, ma túy, đồ chơi nguy hiểm...
                                </p>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">3. Quyền hạn của của Raonhanh365.vn</h4>
                            </div>
                            <div class="muc_quyd w_100 fl_left mb_30">
                                <h4 class="quydinh_td sh_clr_two cr_weight mb_10">4. Vi phạm một trong những lý do sau sẽ bị xóa mà không báo trước:</h4>
                                <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                    - Tiêu đề không dấu, có ký tự đặc biệt, viết hoa, tiêu đề quá dài hoặc copy nguyên nội dung của tin đăng, tiêu đề để số tel, tên web, giá tiền ngoại tệ...
                                    - Tin rao sai chuyên mục(Ví dụ:Rao bán điện thoại trong mục Du lịch).
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