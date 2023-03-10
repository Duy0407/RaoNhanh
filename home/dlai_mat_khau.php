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
        <div class="ctn_wapper w_100 fl_left dlai_mk">
            <div class="ctn_content w_100 fl_left">
                <div class="content_mk content_mk-df2 w_100 fl_left">
                    <h3 class="dmk_left dmk_left--df fl_left tex_center sh_clr_one cr_bold">?????T L???I M???T KH???U</h3>
                    <div class="dmk_right fl_left">
                        <form class="form_dlmk form_dlmk-df1 fl_left sh_bgr_one">
                            <h3 class="d_showhd_1024">?????T L???I M???T KH???U</h3>
                            <div class="form-group w_100 fl_left mb_20">
                                <label class="w_100 fl_left sh_clr_two sh_size_three cr_weight mb_5">M???t kh???u m???i</label>
                                <input type="password" name="mk_moi" class="form-control w_100 fl_left sh_border_rdu sh_clr_five sh_size_five" placeholder="M???t kh???u m???i">
                                <span class="see_pass"></span>
                            </div>
                            <div class="form-group w_100 fl_left mb_30">
                                <label class="w_100 fl_left sh_clr_two sh_size_three cr_weight mb_5">Nh???p l???i m???t kh???u m???i</label>
                                <input type="password" name="rf_mk_moi" class="form-control w_100 fl_left sh_border_rdu sh_clr_five sh_size_five" placeholder="Nh???p l???i m???t kh???u m???i">
                                <span class="see_pass"></span>
                            </div>
                            <div class="butt_sb_mk w_100 fl_left">
                                <input type="button" name="luu_dmk" value="?????t l???i m???t kh???u" class="luu_form sh_cursor w_100 fl_left sh_clr_one sh_size_three sh_border_rdu_two">
                            </div>
                        </form>
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
<script type="text/javascript">
    $(".see_pass").click(function() {
        $(this).toggleClass("active");
        var input = $($(this).parent().find(".form-control"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>