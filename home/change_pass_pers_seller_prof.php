<?
include('config.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    if ($_COOKIE['UT'] == 1) {
        $us_id = $_COOKIE['UID'];
        $us_type = $_COOKIE['UT'];
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="dns-prefetch" href="https://www.google.com.vn">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.google.com.vn">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

    <!--------------->

    <title>Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN</title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn, là cầu nối tốt nhất giữa người mua và người bán." />
    <meta property="og:title" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN" />
    <meta property="og:description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn. Raonhanh365 'đăng tin miễn phí - mua bán tức thì, nơi kết nối giữa người mua kẻ bán.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow,noodp" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/change_pass_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />
</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="change_pas_pers">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <div class="box-right">
            <div class="title-inf">
                <div class="box-chu">
                    <p class="chu-change">Đổi mật khẩu</p>
                </div>
            </div>
            <form class="form-change" id="from_repasswork">
                <div class="form-control box_input_infor">
                    <label class="label_form">Mật khẩu hiện tại <span class="color_error">*</span></label>
                    <input placeholder="Mật khẩu hiện tại" id="iputPassword1" name="mk_hientaiu" type="password" class="input_form input_infor_tag">
                    <div class='noti-error error_current_password'></div>
                    <span class="show_pass hd_cspointer" id="showPassword"></span>
                </div>
                <div class="form-control box_input_infor">
                    <label class="label_form">Mật khẩu mới <span class="color_error">*</span></label>
                    <input placeholder="Mật khẩu mới" id="iputPassword2" name="mk_moiu" type="password" class="input_form input_infor_tag">
                    <div class='noti-error error_password'></div>
                    <span class="show_pass hd_cspointer" id="showPassword"></span>
                </div>
                <div class="form-control box_input_infor">
                    <label class="label_form">Nhập lại mật khẩu mới <span class="color_error">*</span></label>
                    <input placeholder="Nhập lại mật khẩu mới" id="iputPassword3" name="mk_nhapmoiu" type="password" class="input_form input_infor_tag">
                    <div class='noti-error error_repassword'></div>
                    <span class="show_pass hd_cspointer" id="showPassword"></span>
                </div>
                <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                    <label class="label_form">Mã xác nhận <span class="color_error">*</span></label>
                    <div class="khung_input_capcha">
                        <div class="div_bao_ma_xacnhan">
                            <input id="captcha_input" type="text" name="captcha_confirm" class="input_infor_tag" placeholder="Mã xác nhận" autocomplete="off" oninput="<?= $oninput ?>" class="ma_capcha">
                        </div>
                        <div class="bao_p_capcha">
                            <!-- <p class="ht_so_capcha"></p> -->
                            <input readonly type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                            <div class="img_df">
                                <img src="../images/anh_moi/new_capcha.svg" class="xoay360">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-control">
                    <input type="button" id="btn-change" class="input_form-color" value="Đổi mật khẩu">
                </div>
            </form>
        </div>
    </section>

    <!-- POPUP ĐỔI MẬT KHẨU THÀNH CÔNG -->
    <div class="popup_doimk_tc d_none">
        <!-- <div class="popup_doimk_tc_overlay"></div> -->
        <div class="popup_doimk_tc_padding_to">
            <div class="popup_doimk_tc_padding">
                <div class="popup_doimk_tc_padding_img">
                    <img src="../images/anh_moi/doimk_ok.svg" alt="">
                </div>
                <div class="popup_doimk_tc_padding_text">Đổi mật khẩu thành công!</div>
                <div class="popup_doimk_tc_padding_btn">Đóng</div>
            </div>
        </div>
    </div>


    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript">
        $('.btn-mui-ten').click(function() {
            $('.menu-bot').toggle(500)
        })
        $('#change_password').addClass('menu_active');

        $(".popup_doimk_tc_padding_btn").click(function() {
            $(".popup_doimk_tc").hide();
            window.location.href = "/ho-so-nguoi-ban-ca-nhan.html";
        });

        $(".show_pass").click(function() {
            $(this).toggleClass("active");
            var input = $($(this).parent().find(".input_form"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
        $.validator.addMethod("validatePassword", function(value, element) {
            return this.optional(element) || /^\S*(?=\S{6,32})(?=\S*[a-zA-Z])(?=\S*[0-9])(?=\S*[\d])\S*$/i.test(value);
        }, "Hãy nhập mật khẩu từ 6 ký tự trở lên bao gồm ít nhất một chữ cái, ít nhất một chữ số và không chứa khoảng trắng");
        $("#btn-change").click(function() {
            // alert('duy')
            var from_repasswork = $("#from_repasswork");
            from_repasswork.validate({
                errorPlacement: function(error, element) {
                    error.appendTo(element.parents(".box_input_infor"));
                    error.wrap("<span class='error'>");
                    element.parents('.box_input_infor').addClass('validate_input');
                },
                rules: {
                    mk_hientaiu: {
                        required: true,
                    },
                    mk_moiu: {
                        required: true,
                        minlength: 6,
                        maxlength: 32,
                        validatePassword: true,
                    },
                    mk_nhapmoiu: {
                        required: true,
                        equalTo: '#iputPassword2',
                    },
                    captcha_confirm: {
                        required: true,
                        equalTo: "#captcha",
                    },
                },
                messages: {
                    mk_hientaiu: {
                        required: "Vui lòng nhập mật khẩu hiện tại",
                    },
                    mk_moiu: {
                        required: "Vui lòng nhập mật khẩu mới",
                        minlength: "Mật khẩu tối thiểu 6 ký tự",
                        maxlength: "Độ dài mật khẩu phải ít hơn 32 ký tự",
                    },
                    mk_nhapmoiu: {
                        required: "Vui lòng nhập lại mật khẩu mới",
                        equalTo: "Mật khẩu nhập lại không đúng",

                    },
                    captcha_confirm: {
                        required: "Vui lòng nhập mã xác nhận",
                        equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                    }
                },
            });
            if (from_repasswork.valid() === true) {
                var mk1 = $("input[name='mk_hientaiu']").val();
                var mk2 = $("input[name='mk_moiu']").val();
                $.ajax({
                    type: 'POST',
                    url: "../ajax/doi_mk.php",
                    data: {
                        mk1: mk1,
                        mk2: mk2,
                    },
                    success: function(data) {
                        if (data != '') {
                            alert(data);
                        } else {
                            $('.popup_doimk_tc').show();
                        }
                    }
                })
            }
        })
    </script>
</body>

</html>