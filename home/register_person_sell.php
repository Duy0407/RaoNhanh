<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    header('Location: /');
}

$time = date('Y-m-d', time());

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

    <title>Đăng ký tài khoản cá nhân</title>
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
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/register.css?v=<?= $version ?>">

</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <section class="register_buy_container">
        <div class="content-register">
            <div class="box_title_register">
                <p class="title_register">Đăng ký tài khoản <span class="break">cá nhân</span></p>
            </div>
            <div class="form_regis_buy">
                <form class="register_buy" id="register_sell" data="<?= $time ?>">
                    <div class="form-control title_form">
                        <p class="title_register">ĐĂNG KÝ TÀI KHOẢN CÁ NHÂN</p>
                    </div>
                    <div class="form-control box_input_infor">
                        <label class="label_form">Số điện thoại <i class="sao">*</i></label>
                        <input class="numbersOnly2 input_form input_infor_tag error" type="text" placeholder="Nhập số điện thoại" id="Phone" name="Phone" value="">
                        <div class='noti-error error_phone'></div>
                    </div>

                    <div class="form-control form_pass box_input_infor">
                        <label class="label_form">Mật khẩu <i class="sao">*</i></label>
                        <div class="form-control_position">
                            <input placeholder="**********" id="password" name="password" type="password" class="input_form input_infor_tag error">
                            <span class="eye_pass">
                                <img class="lazyload" width="20" height="20" src="../images/newImages/icon_hide_eye.svg" onclick="showHidePass(this)" data-src="../images/newImages/icon_hide_eye.svg" alt="">
                            </span>
                        </div>
                        <div class='noti-error error_password'></div>
                    </div>
                    <div class="form-control form_pass box_input_infor">
                        <label class="label_form">Nhập lại mật khẩu <i class="sao">*</i></label>
                        <div class="form-control_position">
                            <input placeholder="**********" id="repassword" name="repassword" type="password" class="input_form input_infor_tag error">
                            <span class="eye_pass"><img class="lazyload" width="20" height="20" src="../images/newImages/icon_hide_eye.svg" onclick="showHidePass(this)" data-src="../images/newImages/icon_hide_eye.svg" alt=""></span>
                        </div>
                        <div class='noti-error error_repassword'></div>
                    </div>
                    <div class="form-control box_input_infor">
                        <label class="label_form">Họ và tên <i class="sao">*</i></label>
                        <input type="text" placeholder="Nhập họ tên" id="Hoten" name="Hoten" value="" class="input_form input_infor_tag error viethoa_cdau">
                        <div class='noti-error error_hoten'></div>
                    </div>

                    <div class="form-control box_input_infor">
                        <label class="label_form">Email</label>
                        <input type="text" placeholder="Nhập email" id="Email" name="Email" value="" class="input_form input_infor_tag error">
                        <span class='noti-error error_email'></span>
                    </div>
                    <div class="form-control dangky_nban">
                        <input type="button" class="btn_regist_buy input_form btn_regist_sell" id="dangKyNguoiBan" value="Đăng ký" name="postok">
                    </div>
                </form>
            </div>
        </div>
    </section>
    <? include '../includes/inc_new/inc_footer.php'; ?>
</body>

</html>
<script type="text/javascript" src="/js/style_new/js_quang.js"></script>
<script type="text/javascript" src="/js/newJs/admin.main.js"></script>
<!-- end -->
<script type="text/javascript">
    $('#gender,#city').select2();

    $('#Hoten').click(function() {
        $('.error_hoten').hide();
    });

    $("#Phone").click(function() {
        $(".error_phone").hide();
    });

    $("#Email").click(function() {
        $(".error_email").hide();
    });


    $.validator.addMethod("validatePassword", function(value, element) {
        return this.optional(element) || /^\S*(?=\S{6,32})(?=\S*[a-zA-Z])(?=\S*[0-9])(?=\S*[\d])\S*$/i.test(value);
    }, "Hãy nhập mật khẩu từ 6 ký tự trở lên bao gồm ít nhất một chữ cái, ít nhất một chữ số và không chứa khoảng trắng");

    $.validator.addMethod("khoangtrang", function(value, element) {
        return this.optional(element) || /^\S*(?=\S*[\d])\S*$/i.test(value);
    }, "Số điện thoại không chứa khoảng trắng");

    $.validator.addMethod("validatePhone", function(value, element) {
        return this.optional(element) || /^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/i.test(value);
    }, "Hãy nhập đúng định dạng số điện thoại");

    $(".btn_regist_sell").click(function() {
        var register_sell = $("#register_sell");
        register_sell.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 32,
                    validatePassword: '#password',
                },
                repassword: {
                    required: true,
                    equalTo: "#password",
                },
                Hoten: "required",
                Phone: {
                    required: true,
                    validatePhone: true,
                    khoangtrang: true,
                },
            },
            messages: {
                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Độ dài mật khẩu trên 6 ký tự",
                    maxlength: "Độ dài mật khẩu phải ít hơn 32 ký tự",
                },
                repassword: {
                    required: "Vui lòng nhập lại mật khẩu",
                    equalTo: "Mật khẩu chưa khớp! vui lòng nhập lại",
                },
                Hoten: "Vui lòng nhập họ tên",
                Phone: {
                    required: "Vui lòng nhập số điện thoại",
                },
            },
        });
        if (register_sell.valid() === true) {
            var email = $("input[name='Email']").val();
            var password = $("input[name='password']").val();
            var name_user = $("input[name='Hoten']").val();
            var Phone = $("input[name='Phone']").val();
            var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
            var check = function(string) {
                for (i = 0; i < specialChars.length; i++) {
                    if (string.indexOf(specialChars[i]) > -1) {
                        return true
                    }
                }
                return false;
            };
            var hovaten = $("input[name='Hoten']").val();
            if (check(hovaten) == false) {
                $.ajax({
                    url: "/ajax/dangky_nbcn.php",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        email: email,
                        password: password,
                        name_user: name_user,
                        Phone: Phone,
                    },
                    success: function(data) {
                        if (data.result == true) {
                            alert("Bạn đăng ký tài khoản thành công");
                            window.location.href = "/";
                        } else if (data.result == false) {
                            if (data.error == 1) {
                                $(".error_phone").text(data.msg);
                                $(".error_phone").show();
                            } else if (data.error == 2) {
                                $(".error_email").text(data.msg);
                                $(".error_email").show();
                            } else if (data.error == 3) {
                                alert(data);
                            }
                        }
                    }
                })
            } else {
                $('.error_hoten').text("Họ và tên không thể chứa kí tự đặc biệt");
                $('.error_hoten').show();
            }
        }
    });
</script>