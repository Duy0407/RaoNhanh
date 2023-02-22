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
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de_df">GIẢI QUYẾT TRANH CHẤP</h1>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe w_100 fl_left ctn_ttuc">
                        <div class="tranh_chap w_100 fl_left">
                            <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">Người cung cấp tự chịu trách nhiệm về việc cung cấp thông tin lên webite, nếu chủ thể thông
                                tin vi phạm chúng tôi sẻ ngừng cung cấp dịch vụ. Việc giao dịch mua bán thì người cung cấp
                                và khách hàng tự chịu trách nhiệm. Chúng tôi không tham gia vào việc mua bán. Chúng tôi chỉ
                                Công khai cơ chế giải quyết các tranh chấp phát sinh trong quá trình giao dịch trên sàn giao
                                dịch thương mại điện tử Raonhanh365.vn. Khi người tiêu dùng mua hàng hóa hoặc dịch vụ phát
                                sinh mâu thuẫn với người cung cấp hoặc bị tổn hại lợi ích hợp pháp, Raonhanh365.vn sẽ cung
                                cấp cho người tiêu dùng thông tin đăng ký của người bán ngay sau khi nhận được yêu cầu của
                                khách hàng, tích cực hỗ trợ khách hàng bảo vệ quyền và lợi ích hợp pháp của bản thân.</p>
                            <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                Raonhanh365.vn không chịu trách nhiệm và không giải quyết các khiếu nại, tranh chấp
                                của người mua và người bán liên quan chất lượng hàng hóa, dịch vụ của người bán đã
                                mua/bán trên Raonhanh365.vn.
                            </p>
                            <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                Raonhanh365.vn chỉ giải quyết các khiếu nại của người bán hoặc người mua
                                liên quan tới dịch vụ mà Raonhanh365.vn cung cấp (nếu có).
                            </p>
                            <p class="inf_trchap tex_jus w_100 fl_left sh_clr_five">
                                Bước 1: Tiếp nhận khiếu nại của người bán hoặc người mua qua mail hotro@Raonhanh365.vn
                                hoặc qua 0466.871.323. <br>
                                Bước 2: Chuyển cho phòng ban chịu trách nhiệm giải quyết <br>
                                Bước 3: Trong thời hạn 10 ngày làm việc kể từ ngày nhận được khiếu nại của người khiếu nại,
                                Raonhanh365.vn trả lời cho người khiếu nại về kết quả giải quyết khiếu nại.
                            </p>
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