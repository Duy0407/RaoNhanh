<?
include("config.php");
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    header('Location: /');
}
isset($_GET['type']) ? $type_p = $_GET['type'] : $type_p = "";
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

    <title>Quên mật khẩu</title>
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
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/forgot_password.css?v=<?= $version ?>">
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="content-forgot content-forgot_df content-login">
            <div class="box_title_forgot">
                <p class="title_forgot">Quên mật khẩu <span class="break"></span></p>
            </div>
            <div class="form_regis_buy">
                <form class="forgot_buy forgot_buy_df">
                    <p class="title_forgot2 title_forgot2_df">Quên mật khẩu</p>
                    <div class="form-control-mail" data="<?= $type_p ?>">
                        <label class="label_form label_form_df_qmk email">Số điện thoại/email </label>
                        <div class="input-email">
                            <input type="text" placeholder="Nhập số điên thoại hoặc email" id="Phone" name="phone" class="input_form input_mail">
                            <span class="error_sdt color_red"></span>
                        </div>
                    </div>
                    <div class="form-control-login">
                        <button type="button" id="successForgot" class="btn_regist_buy input_form input_login">Xác nhận</button>
                    </div>
                    <div class="form-return-login">
                        Có sự nhầm lẫn?
                        <? if ($type_p == 1) { ?>
                            <a href="/dang-nhap-tai-khoan-ca-nhan.html" class="forgot" name="forgot">Quay lại đăng nhập</a>
                        <? } else if ($type_p == 5) { ?>
                            <a href="/dang-nhap-tai-khoan-doanh-nghiep.html" class="forgot" name="forgot">Quay lại đăng nhập</a>
                        <? } else { ?>
                            <a href="/dang-nhap.html" class="forgot" name="forgot">Quay lại đăng nhập</a>
                        <? } ?>
                    </div>
                    <div class="form-register">
                        Chưa có tài khoản?
                        <? if ($type_p == 1) { ?>
                            <a href="/dang-ky-tai-khoan-ca-nhan.html" class="register" name="register"> Đăng ký</a>
                        <? } else if ($type_p == 5) { ?>
                            <a href="/dang-ky-tai-khoan-doanh-nghiep.html" class="register" name="register"> Đăng ký</a>
                        <? } else { ?>
                            <a href="/dang-ky.html" class="register" name="register"> Đăng ký</a>
                        <? } ?>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <? include("../includes/inc_new/inc_footer.php") ?>
</body>

</html>
<script type="text/javascript">
    $("#Phone").click(function() {
        $(".error_sdt").hide();
    })

    $.validator.addMethod("khoangtrang", function(value, element) {
        return this.optional(element) || /^\S*(?=\S*[\d])\S*$/i.test(value);
    }, "Số điện thoại không chứa khoảng trắng");

    $.validator.addMethod("validatePhone", function(value, element) {
        return this.optional(element) || /^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/i.test(value);
    }, "Hãy nhập đúng định dạng số điện thoại");

    $("#successForgot").click(function() {
        var forgot_buy = $(".forgot_buy");
        forgot_buy.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".input-email"));
                error.wrap("<span class='error'>");
                element.parents('.input-email').addClass('validate_input');
            },
            rules: {
                phone: {
                    required: true,
                    // validatePhone: true,
                    khoangtrang: true,
                },
            },
            messages: {
                phone: {
                    required: "Vui lòng nhập số điện thoại",
                },
            },
        });
        if (forgot_buy.valid() === true) {
            var type_p = $(".form-control-mail").attr("data");
            var sdt = $("input[name='phone']").val();

            $.ajax({
                url: '/ajax/quen_mkhau.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    type_p: type_p,
                    sdt: sdt,
                },
                success: function(data) {
                    if (data.result == true) {
                        window.location.href = '/otp-quen-mat-khau.html?type=' + data.type_data + '&sdt=' + sdt;
                    } else if (data.result == false) {
                        $(".error_sdt").text(data.msg);
                        $(".error_sdt").show();
                    }
                }
            })
        }
    })
</script>