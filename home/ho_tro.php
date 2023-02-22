<?
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

    <link rel="preload" href="/css/restyle.css" as="style">
    <link rel="preload" href="/css/newCss/home_new.css" as="style">
    <link rel="stylesheet" href="/css/restyle.css" type="text/css">
    <link rel="stylesheet" href="/css/newCss/home_new.css" type="text/css">

    <link type="text/css" href="../css/style_new/style.css" rel="stylesheet">
    <link type="text/css" href="../css/style_new/giai_dap.css" rel="stylesheet">

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
        <div class="ctn_wapper w_100 fl_left">
            <div class="ctn_banner w_100 fl_left">
                <div class="ctn_noidung_bn tex_center w_100 fl_left">
                    <h1 class="sh_clr_one cr_weight w_100 fl_left tieu_de tieu_de_df">BẠN CẦN TRỢ GIÚP?</h1>
                    <div class="tim_kiem w_100 fl_left">
                        <div class="them_div_inp">
                            <input type="text" class="search_tk search_tk_tg fl_left sh_size_one sh_clr_four" name="serach" placeholder="Tìm kiếm vấn đề của bạn ">
                            <span class="tk_inp fl_left"><img src="../images/anh_moi/tk_inp.svg"/></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ctn_content w_100 fl_left">
                <div class="ctn_trogiup ctn_chung ctn_chung_tg_df">
                    <div class="content_trgiup w_100 fl_left">
                        <?php for ($i=0; $i < 5; $i++):?>
                            <div class="cauhoi_tg w_100 fl_left">
                                <div class="choi_tgap w_100 fl_left">
                                    <h4 class="cauh_one cauh_one_df sh_bgr_one w_100 sh_clr_two fl_left sh_cursor">Hướng dẫn đăng ký tài khoản</h4>
                                    <div class="themimg_375">
                                        <img src="../images/anh_moi/down_375.svg" alt="">
                                    </div>
                                </div>
                                <div class="trloi_tgap w_100 fl_left">
                                    <p class="w_100 fl_left sh_size_one sh_clr_two tex_jus">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                                        labore et dolore magna aliqua. Sit amet consectetur adipiscing elit. Sapien et ligula ullamcorper
                                        malesuada. In tellus integer feugiat s
                                        celerisque varius morbi enim nunc faucibus. Blandit massa enim nec dui nunc mattis enim ut. Enim tortor at auctor urna nunc id. Ut aliquam purus sit amet luctus venenatis lectus. Pulvinar pellentesque habitant morbi tristique
                                        senectus. Cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris.
                                    </p>
                                </div>
                            </div>
                        <?php endfor;?>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?
        include("../includes/inc_new/inc_footer.php")
    ?>

   
</body>
<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
        $(".choi_tgap").click(function() {
            $(this).parents(".cauhoi_tg").find(".trloi_tgap").toggle(500);
        });
    </script>
</html>