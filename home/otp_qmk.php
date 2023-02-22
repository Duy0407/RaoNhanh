<?
include("config.php");
isset($_GET['type']) ? $type_p = $_GET['type'] : $type_p = "";
isset($_GET['sdt']) ? $sdt = $_GET['sdt'] : $sdt = "";

$regex_email = ("/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/");
$regex_sdt = ("/^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/");
if (preg_match($regex_sdt, $sdt) == true) {
    $tk_es = "Đổi số khác";
    $text_g = "số điện thoại";
} else if (preg_match($regex_email, $sdt) == true) {
    $tk_es = "Đổi email khác";
    $text_g = "email";
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

    <title>OTP QUÊN MẬT KHẨU</title>
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
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css" />
    <link type="text/css" href="/css/newCss/forgot_password.css" rel="stylesheet">
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="content-forgot content-forgot_df content-login">
            <div class="box_title_forgot">
                <p class="title_forgot">OTP QUÊN MẬT KHẨU <span class="break"></span></p>
            </div>
            <div class="form_regis_buy">
                <form class="forgot_buy forgot_buy_df" data="<?= $sdt ?>">
                    <div class="form-control-mail" data="<?= $type_p ?>">
                        <label class="label_form_df_qmk email">Bạn hãy nhập mã OTP được gửi về <?= $text_g ?>: <span class="cr_weight"><?= $sdt ?></span>
                            <? if ($type_p == 1) { ?>
                                <a href="/quen-mat-khau-ca-nhan.html" class="sh_clr_six doi_sdt_khac" style="margin-left: 4px;"><?= $tk_es ?></a>
                            <? } else if ($type_p == 5) { ?>
                                <a href="/quen-mat-khau-doanh-nghiep.html" class="sh_clr_six doi_sdt_khac" style="margin-left: 4px;"><?= $tk_es ?></a>
                            <? } ?></label>
                        <div class="input-email">
                            <input id="partitioned" maxlength="6" name="ma_otp" oninput="<?= $oninput ?>" />
                            <span class="error_sdt color_red"></span>
                        </div>
                    </div>
                    <div class="form-control-login">
                        <button type="button" id="successForgot" class="btn_regist_buy input_form input_login">Xác nhận</button>
                    </div>
                    <div class="gui_laiotp">
                        <p class="guilai_otp" id="gui_lai" onclick="guilai_otp()">Gửi lại OTP <span class="so_giay"></span><span class="don_vi"></span></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <? include("../includes/inc_new/inc_footer.php") ?>
</body>

</html>
<script type="text/javascript">
    $.validator.addMethod("khoangtrang", function(value, element) {
        return this.optional(element) || /^\S*(?=\S*[\d])\S*$/i.test(value);
    }, "Mã không chứa khoảng trắng");

    $("#successForgot").click(function() {
        var forgot_buy = $(".forgot_buy");
        forgot_buy.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".input-email"));
                error.wrap("<span class='error'>");
                element.parents('.input-email').addClass('validate_input');
            },
            rules: {
                ma_otp: {
                    required: true,
                    khoangtrang: true,
                    number: true,
                    maxlength: 6,
                },
            },
            messages: {
                ma_otp: {
                    required: "Mã otp không được để trống",
                    number: "Nhập chữ số",
                },

            },
        });
        if (forgot_buy.valid() === true) {
            var ma_otp = $("#partitioned").val();
            var sdt = $(".forgot_buy_df").attr("data");
            var type_p = $(".form-control-mail").attr("data");
            $.ajax({
                url: '/ajax/otp_qmk.php',
                type: 'POST',
                data: {
                    ma_otp: ma_otp,
                    sdt: sdt,
                    type: type_p,
                },
                success: function(data) {
                    if (data == "") {
                        window.location.href = '/nhap-lai-mat-khau.html?sdt=' + sdt + '&type=' + type_p + '&otp=' + ma_otp;
                    } else {
                        alert(data);
                    }
                }
            })

        }
    });

    function gui_lai() {
        var html = `<p class="guilai_otp">Gửi lại OTP <span class="so_giay">60</span><span class="don_vi">s</span></p>`;
        $(".gui_laiotp").html(html);
        var sec = $(".gui_laiotp .so_giay").text();
        var timer = setInterval(function() {
            $('.so_giay').text(--sec);
            if (sec == 0) {
                $('.so_giay').text('');
                $('.don_vi').text('');
                clearInterval(timer);
                var html1 = `<p class="guilai_otp" id="gui_lai" onclick="guilai_otp()">Gửi lại OTP </p>`;
                $(".gui_laiotp").html(html1);
            }
        }, 1000);
    }

    function guilai_otp() {
        var sdt = $(".forgot_buy_df").attr("data");
        var type_p = $(".form-control-mail").attr("data");
        $.ajax({
            url: '/ajax/gui_lai_otp.php',
            type: 'POST',
            data: {
                sdt: sdt,
                type: type_p,
            },
            success: function(data) {
                if (data == "") {
                    alert("Gửi lại otp thành công");
                    gui_lai();
                } else {
                    alert(data);
                }
            }
        })
    }
</script>