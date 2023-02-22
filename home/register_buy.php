<?php
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

    <title>Đăng ký tài khoản người mua</title>
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
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style.css">
    <link rel="stylesheet" type="text/css" href="../css/newCss/register.css">
</head>

<body>
    <?php include("../includes/common/inc_header.php"); ?>
    <section class="register_buy_container">
        <div class="content-register">
            <div class="box_title_register">
                <p class="title_register">Đăng ký tài khoản <span class="break">người mua</span></p>
            </div>
            <div class="form_regis_buy">
                <form class="register_buy" id="register_buy" data="<?= $time ?>">
                    <div class="form-control title_form">
                        <p class="title_register">Đăng ký tài khoản người mua</p>
                    </div>
                    <div class="form-control form_pass box_input_infor">
                        <label class="label_form">Số điện thoại<i class="sao">*</i></label>
                        <input class="numbersOnly2 input_form input_infor_tag error" type="text" placeholder="Nhập số điện thoại" id="Phone" name="Phone" value="">
                        <div class='noti-error error_phone'></div>
                    </div>

                    <div class="form-control form_pass box_input_infor">
                        <label class="label_form">Mật khẩu<i class="sao">*</i></label>
                        <div class="form-control_position">
                            <input placeholder="**********" maxlength="16" id="password" name="password" type="password" class="input_form input_infor_tag error">
                            <span class="eye_pass">
                                <img class="lazyload" width="20" height="20" src="../images/newImages/icon_hide_eye.svg" onclick="showHidePass(this)" data-src="../images/newImages/icon_hide_eye.svg" alt="">
                            </span>
                        </div>
                        <div class='noti-error error_password'></div>
                    </div>
                    <div class="form-control form_pass box_input_infor">
                        <label class="label_form">Nhập lại mật khẩu<i class="sao">*</i></label>
                        <div class="form-control_position">
                            <input placeholder="**********" maxlength="16" id="repassword" name="repassword" type="password" class="input_form input_infor_tag error">
                            <span class="eye_pass"><img class="lazyload" width="20" height="20" src="../images/newImages/icon_hide_eye.svg" onclick="showHidePass(this)" data-src="../images/newImages/icon_hide_eye.svg" alt=""></span>
                        </div>
                        <div class='noti-error error_repassword'></div>
                        <div class='noti-error success_repassword'></div>
                    </div>
                    <div class="form-control form_pass box_input_infor">
                        <label class="label_form">Họ và tên<i class="sao">*</i></label>
                        <input type="text" placeholder="Nhập họ tên" id="Hoten" name="Hoten" value="" class="input_form input_infor_tag error">
                        <div class='noti-error error_hoten'></div>
                    </div>
                    <!-- <div class="form-control control_birth_gender">
                        <div class="control_input">
                            <label class="label_form">Ngày sinh</label>
                            <input type="date" id="birthday" name="birthday" placeholder="dd/mm/YYYY" class="input_form">
                            <div class='noti-error error_birth'></div>
                        </div>
                        <div class="control_input">
                            <label class="label_form">Giới tính</label>
                            <div class="khung_input">
                                <select name="gender" id="gender" class="input_form">
                                    <option value="">Giới tính</option>
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </div>
                        </div>
                    </div> -->
                    <div class="form-control box_input_infor">
                        <label class="label_form">Email</label>
                        <input type="text" placeholder="Nhập email" id="Email" name="Email" value="" class="input_form input_infor_tag error">
                        <div class='noti-error error_email'></div>
                    </div>
                    <div class="form-control form_pass box_input_infor">
                        <label class="label_form">Khu vực<i class="sao">*</i></label>
                        <select id="city" name="city" class="input_form">
                            <option value="">Chọn thành phố</option>
                            <?php foreach ($arrcity as $key => $value) : ?>
                                <option value="<?= $value['cit_id'] ?>"><?= $value['cit_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class='noti-error error_city'></div>
                    </div>
                    <!-- <div class="form-control box_input_infor">
                        <label class="label_form">Địa chỉ liên hệ</label>
                        <input type="text" placeholder="Nhập địa chỉ" id="address" name="address" value="" class="input_form input_infor_tag error">
                        <div class='noti-error error_address'></div>
                    </div> -->
                    <div class="form-control box_input_infor">
                        <label class="label_form">Danh mục sản phẩm bạn quan tâm<i class="sao">*</i></label>
                        <select id="list_product" name="list_product[]" class="input_form " multiple>
                            <?php foreach ($db_cat1 as $rows) : ?>
                                <option value="<?= $rows['cat_id'] ?>"><?= $rows['cat_name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <div class='noti-error error_list_product'></div>
                    </div>
                    <div class="form-control box_input_infor">
                        <label class="label_form">Loại sản phẩm bạn quan tâm</label>
                        <select id="product_type" name="product_type[]" class="input_form" multiple>
                            <option disabled value="">Chọn loại sản phẩm</option>
                        </select>
                        <div class='noti-error error_product_type'></div>
                    </div>
                    <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                        <p class="font-dam hd_font15-17">Mã xác nhận <span style="color:#ff0000">*</span></p>
                        <div class="khung_input_capcha">
                            <div class="div_bao_ma_xacnhan">
                                <input id="captcha_input" type="text" name="captcha_confirm" class="input_infor_tag error" placeholder="Mã xác nhận" autocomplete="off" oninput="<?= $oninput ?>" class="ma_capcha">
                            </div>
                            <div class="bao_p_capcha">
                                <input readonly type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                                <div class="img_df">
                                    <img src="../images/anh_moi/new_capcha.svg" class="xoay360">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-control">
                        <button type="button" class="btn_regist_buy input_form" name="btn_regist_buy"> Đăng ký</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <? include '../includes/inc_new/inc_footer.php'; ?>
</body>

</html>
<script type="text/javascript" src="/js/style_new/js_quang.js"></script>
<script type="text/javascript" src="../js/newJs/admin.main.js"></script>

<script>
    $('#list_product').select2({
        placeholder: "Chọn danh mục sản phẩm",
        maximumSelectionLength: 5,
    });

    $('#product_type').select2({
        placeholder: "Chọn loại sản phẩm",
        maximumSelectionLength: 5,
    });

    $('#Hoten').click(function() {
        $('.error_hoten').hide();
    });

    $("#birthday").click(function() {
        $(".error_birth").hide();
    });

    $("#address").click(function() {
        $(".error_address").hide();
    })

    $(document).ready(function() {
        var do_xuay = 0;
        $(".reset-icon").click(function() {
            do_xuay += 360;
            xoay($(this), do_xuay);
        });

        function xoay(img, deg) {
            img.css("transform", "rotate(" + deg + "deg)");
            img.css("transition", "0.3s");
        };
    });


    $('#city,#gender').select2();

    $.validator.addMethod("validatePassword", function(value, element) {
        return this.optional(element) || /^\S*(?=\S{6,})(?=\S*[a-zA-Z])(?=\S*[0-9])(?=\S*[\d])\S*$/i.test(value);
    }, "Hãy nhập mật khẩu từ 6 ký tự trở lên bao gồm ít nhất một chữ cái, ít nhất một chữ số và không chứa khoảng trắng");

    $.validator.addMethod("khoangtrang", function(value, element) {
        return this.optional(element) || /^\S*(?=\S*[\d])\S*$/i.test(value);
    }, "Số điện thoại không chứa khoảng trắng");

    $.validator.addMethod("validatePhone", function(value, element) {
        return this.optional(element) || /^(032|033|034|035|036|037|038|039|086|096|097|098|081|082|083|084|085|088|091|094|056|058|092|070|076|077|078|079|089|090|093|099|059)+([0-9]{7})$/i.test(value);
    }, "Hãy nhập đúng định dạng số điện thoại");

    $(".btn_regist_buy").click(function() {
        var register_buy = $("#register_buy");
        register_buy.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {

                password: {
                    required: true,
                    minlength: 6,
                    validatePassword: true,
                },
                repassword: {
                    required: true,
                    equalTo: "#password",
                },
                Hoten: {
                    required: true,
                    minlength: 6,
                },
                Phone: {
                    required: true,
                    validatePhone: true,
                },
                city: "required",

                "list_product[]": "required",
                captcha_confirm: {
                    required: true,
                    equalTo: "#captcha",
                },
            },
            messages: {

                password: {
                    required: "Vui lòng nhập mật khẩu",
                    minlength: "Độ dài mật khẩu trên 6 ký tự",
                },
                repassword: {
                    required: "Vui lòng nhập lại mật khẩu",
                    equalTo: "Mật khẩu chưa khớp! vui lòng nhập lại",
                },
                Hoten: {
                    required: "Vui lòng nhập họ tên",
                    minlength: "Nhập ít nhất 6 ký tự",
                },
                Phone: {
                    required: "Vui lòng nhập số điện thoại",
                },
                city: "Vui lòng chọn tỉnh thành ",

                "list_product[]": "Vui lòng chọn danh sách sản phẩm",
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                }
            },
        });
        if (register_buy.valid() === true) {
            var email = $("input[name='Email']").val();
            var password = $("input[name='password']").val();
            var name_user = $("input[name='Hoten']").val();
            // var birthday = $("input[name='birthday']").val();
            // var gender = $("select[name='gender']").val();
            var Phone = $("input[name='Phone']").val();
            var city = $("select[name='city']").val();
            // var address = $("input[name='address']").val();
            var list_product = $("select[name='list_product[]']").val();
            var product_type = $("select[name='product_type[]']").val();
            var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-=";

            var check = function(string) {
                for (i = 0; i < specialChars.length; i++) {
                    if (string.indexOf(specialChars[i]) > -1) {
                        return true
                    }
                }
                return false;
            }
            var check_diachi = "<>@!#$%^&*()_+[]{}?:;|'\"\\~`=";
            var dchi_check = function(string) {
                for (i = 0; i < check_diachi.length; i++) {
                    if (string.indexOf(check_diachi[i]) > -1) {
                        return true
                    }
                }
                return false;
            }
            var hovaten = $("input[name='Hoten']").val();
            if (check(hovaten) == false) {
                $.ajax({
                    url: "/ajax/dangky_tknm.php",
                    type: "POST",
                    data: {
                        email: email,
                        password: password,
                        name_user: name_user,
                        Phone: Phone,
                        city: city,
                        list_product: list_product,
                        product_type: product_type,
                    },
                    success: function(data) {
                        if (data == "") {
                            alert("Bạn đăng ký tài khoản thành công");
                            window.location.href = "/";
                        } else {
                            alert(data);
                        }
                    }
                });
            } else {
                $('.error_hoten').text("Họ và tên không thể chứa kí tự đặc biệt");
                $('.error_hoten').show();
            }
        }
    });

    $('#list_product').change(function() {
        var listPr = $(this).val()
        $.ajax({
            type: 'POST',
            url: '/ajax/product_dk.php',
            data: {
                listPr: listPr
            },
            success: function(data) {
                $('#product_type').html(data)
            }
        })
    })
</script>