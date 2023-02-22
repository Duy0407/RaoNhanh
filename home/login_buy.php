<?
include("config.php");
if (isset($_COOKIE['UID']) || isset($_COOKIE['UT'])) {
    header('Location: /');
};

$login = getValue('login', 'int', 'GET', 0);
if ($login == 0) {
    header("Location: /");
} else {
    if ($login == 1) {
        $text1 = "tài khoản";
        $text2 = "cá nhân";
    }
    if ($login == 5) {
        $text1 = "tài khoản";
        $text2 = "doanh nghiệp";
    }
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <link rel="preload" href="/css/newCss/css_common.css?v='<?= $version ?>'" as="style">
    <link href="/css/newCss/css_common.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css">
    <link rel="stylesheet" href="../css/style_new/style.css?v='<?= $version ?>'">

    <link href="/css/newCss/login.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />

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

    <title>Đăng nhập tài khoản <?= $text2 ?></title>
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
    <meta name="robots" content="noindex, nofollow,noodp" />
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
    <!-- <link rel="canonical" href="https://raonhanh365.vn" /> -->
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="content-register content-login">
            <div class="box_title_register">
                <p class="title_register">Đăng nhập <?= $text1 ?> <span class="break"><?= $text2 ?></span></p>
            </div>
            <div class="form_regis_buy">
                <form class="register_buy" id="register_buy">
                    <div>
                        <p class="title_login">ĐĂNG NHẬP <?= $text1 ?> <?= $text2 ?></p>
                    </div>
                    <div class="form-control mail">
                        <label class="label_form email">Số điện thoại/email/tên đăng nhập</label>
                        <input type="hidden" name="userType" value="<?= $login ?>">
                        <div class="input1">
                            <input type="text" placeholder="Nhập số điện thoại hoặc email hoặc tên đăng nhập" id="phone" name="phone" class="input_form input_mail">
                        </div>
                    </div>
                    <div class="form-control form_pass">
                        <label class="label_form">Mật khẩu</label>
                        <div class="input2">
                            <input placeholder="Mật khẩu" maxlength="16" id="password" name="password" type="password" class="input_form input_pass">
                            <span class="eye_pass"><img class="lazyload" width="20" height="20" src="../images/newImages/icon_hide_eye.svg" onclick="showHidePass(this)" data-src="../images/newImages/icon_hide_eye.svg" alt=""></span>
                            <div class='noti-error error_password'></div>
                        </div>
                    </div>
                    <div class="form-control-login">
                        <input type="button" class="btn_regist_buy input_form input_login" value="Đăng nhập" id="login_buy" name="postok">
                    </div>
                    <div class="form-forgot">
                        <? if ($login == 1) { ?>
                            <a href="/quen-mat-khau-ca-nhan.html" class="forgot-password" name="forgot-password">Quên mật khẩu ?</a>
                        <? } else if ($login == 5) { ?>
                            <a href="/quen-mat-khau-doanh-nghiep.html" class="forgot-password" name="forgot-password">Quên mật khẩu ?</a>
                        <? } ?>
                    </div>
                    <div class="form-register">
                        Chưa có tài khoản?
                        <? if ($login == 1) { ?>
                            <a href="/dang-ky-tai-khoan-ca-nhan.html" class="register" name="register"> Đăng ký</a>
                        <? } else if ($login == 5) { ?>
                            <a href="/dang-ky-tai-khoan-doanh-nghiep.html" class="register" name="register"> Đăng ký</a>
                        <? } ?>
                    </div>
                </form>
            </div>
        </div>
        <div class="modal popup_dnhap_nham">
            <div class="modal-content">
                <div class="tbao_dnhap_ttuc">
                    <div class="ctbao_dnhap_tiep">
                        <p class="tieptuchk">Tài khoản của bạn được xác minh là tài khoản <span class="cr_weight"></span> Bạn có muốn tiếp tục đăng nhập?</p>
                    </div>
                    <div class="ttuc_hay_dlai d_flex">
                        <button type="button" class="tieptuc sh_cursor sh_bgr_one" data="">Tiếp tục</button>
                        <button type="button" class="ktieptuc sh_cursor sh_clr_one">Không</button>
                    </div>
                </div>
            </div>
    </section>
    <? include("../includes/inc_new/inc_footer.php") ?>
</body>

</html>

<script>
    $("#phone, #password").click(function() {
        $(".error_password").hide();
    });

    $(document).keypress(function(event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            $("#login_buy").click();
            event.preventDefault();
        }
    });

    $(".ttuc_hay_dlai .tieptuc").click(function() {
        var us_type = $(this).attr("data");
        $("input[name='userType']").val(us_type);
        $("#login_buy").click();
    });

    $(".ttuc_hay_dlai .ktieptuc").click(function() {
        $(".popup_dnhap_nham").hide();
    });

    $("#login_buy").click(function() {
        var login_buy = $(".register_buy");
        login_buy.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form-control"));
                error.wrap("<span class='error'>");
                element.parents('.form-control').addClass('validate_input');
            },
            rules: {
                phone: {
                    required: true,
                },
                password: {
                    required: true,
                }
            },
            messages: {
                phone: {
                    required: "Số điện thoại (Email) không được để trống",
                },
                password: {
                    required: "Mật khẩu không được để trống",
                }
            }
        });
        if (login_buy.valid() === true) {
            var type = $("input[name='userType']").val();
            var phone = $("input[name='phone']").val();
            var pass = $("input[name='password']").val();

            $.ajax({
                url: '/ajax/login_all.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    type: type,
                    phone: phone,
                    pass: pass,
                },
                success: function(data) {
                    if (data.result == true) {
                        if (data.data == 0) {
                            window.location.href = '/';
                        } else if (data.data == 1) {
                            $(".popup_dnhap_nham .tieptuchk").find("span").text('cá nhân.');
                            $(".popup_dnhap_nham .ttuc_hay_dlai").find(".tieptuc").attr("data", data.data);
                            $(".popup_dnhap_nham").show();
                        } else if (data.data == 5) {
                            $(".popup_dnhap_nham .tieptuchk").find("span").text('doanh nghiệp.');
                            $(".popup_dnhap_nham .ttuc_hay_dlai").find(".tieptuc").attr("data", data.data);
                            $(".popup_dnhap_nham").show();
                        }
                    } else if (data.result == false) {
                        $(".error_password").text(data.msg);
                        $(".error_password").show();
                    }
                }
            })
        }
    })
</script>