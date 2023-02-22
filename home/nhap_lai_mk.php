<?
include("config.php");
isset($_GET['type']) ? $type_p = $_GET['type'] : $type_p = "";
isset($_GET['sdt']) ? $sdt = $_GET['sdt'] : $sdt = "";
isset($_GET['otp']) ? $ma_otp = $_GET['otp'] : $ma_otp = "";

if ($type_p == "" || $sdt == "" || $ma_otp == "") {
    header('Location: /');
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

    <title>Nhập lại mật khẩu</title>
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
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="content-register content-login">
            <div class="box_title_register">
                <p class="title_register">Nhập lại mật khẩu</p>
            </div>
            <div class="form_regis_buy" data="<?= $ma_otp ?>">
                <form class="register_buy" id="register_buy" data="<?= $sdt ?>" data1="<?= $type_p ?>">
                    <div class="box_title_forgot_pass">
                        <p class="title_login">Nhập lại mật khẩu</p>
                    </div>
                    <div class="form-control form_pass">
                        <label class="label_form">Mật khẩu mới</label>
                        <div class="input2">
                            <input placeholder="Nhập mật khẩu mới" maxlength="32" id="password" name="password" type="password" class="input_form input_pass">
                            <span class="eye_pass"><img class="lazyload" width="20" height="20" src="../images/newImages/icon_hide_eye.svg" onclick="showHidePass(this)" data-src="../images/newImages/icon_hide_eye.svg" alt=""></span>
                        </div>
                    </div>
                    <div class="form-control form_pass">
                        <label class="label_form">Nhập lại mật khẩu</label>
                        <div class="input2">
                            <input placeholder="Nhập lại mật khẩu" maxlength="32" id="rf_password" name="rf_password" type="password" class="input_form input_pass">
                            <span class="eye_pass"><img class="lazyload" width="20" height="20" src="../images/newImages/icon_hide_eye.svg" onclick="showHidePass(this)" data-src="../images/newImages/icon_hide_eye.svg" alt=""></span>
                        </div>
                    </div>
                    <span class="error_password color_red"></span>
                    <div class="form-control-login">
                        <input type="button" class="btn_regist_buy input_form input_login" value="Xác nhận" id="login_buy" name="postok">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <? include("../includes/inc_new/inc_footer.php") ?>
</body>

</html>

<script>
    $.validator.addMethod("validatePassword", function(value, element) {
        return this.optional(element) || /^\S*(?=\S{6,32})(?=\S*[a-zA-Z])(?=\S*[0-9])(?=\S*[\d])\S*$/i.test(value);
    }, "Hãy nhập mật khẩu từ 6 ký tự trở lên bao gồm ít nhất một chữ cái, ít nhất một chữ số và không chứa khoảng trắng");

    $("#login_buy").click(function() {
        var login_buy = $(".register_buy");
        login_buy.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".form-control"));
                error.wrap("<span class='error'>");
                element.parents('.form-control').addClass('validate_input');
            },
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 32,
                    validatePassword: true,
                },
                rf_password: {
                    required: true,
                    equalTo: "#password",
                },
            },
            messages: {
                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Độ dài mật khẩu trên 6 ký tự",
                    maxlength: "Độ dài mật khẩu dưới 32 ký tự",
                },
                rf_password: {
                    required: "Vui lòng nhập lại mật khẩu",
                    equalTo: "Mật khẩu chưa khớp! vui lòng nhập lại",
                },
            }
        });
        if (login_buy.valid() === true) {
            var type = $("#register_buy").attr("data1");
            var phone = $("#register_buy").attr("data");
            var pass = $("input[name='password']").val();
            var ma_otp = $(".form_regis_buy").attr("data");

            $.ajax({
                url: '/ajax/rf_matkhau.php',
                type: 'POST',
                data: {
                    type: type,
                    phone: phone,
                    pass: pass,
                    ma_otp: ma_otp,
                },
                success: function(data) {
                    if (data != "") {
                        alert(data);
                    } else {
                        alert("Bạn đổi mật khẩu thành công");
                        if (type == 1) {
                            window.location.href = '/dang-nhap-tai-khoan-ca-nhan.html';
                        } else {
                            window.location.href = '/dang-nhap-tai-khoan-doanh-nghiep.html';
                        }

                    }
                }
            })
        }
    })
</script>