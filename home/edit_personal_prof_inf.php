<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_name`,`usc_type`,`usc_phone`,`usc_money`, `usc_address`, `email_ht`, `usc_tax_code`,`usc_logo`, `usc_time`
                                FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_time = $kn_tt['usc_time'];
        $usc_money = $kn_tt['usc_money'];
        $usc_logo = $kn_tt['usc_logo'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'cá nhân', 5 => "doanh nghiệp");
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $email_ht = $kn_tt['email_ht'];

        $usc_tax_code = $kn_tt['usc_tax_code'];

        $time = date('Y-m-d', time());
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
    <meta name="robots" content="noindex, nofollow" />
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
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/edit_personal_prof_inf.css?v=<?= $version ?>" />

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="edit_infor_account">
        <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <div class="box-right edit_pers">
            <div class="acc-inf">
                <div class="title-inf">
                    <div class="anh">
                        <img src="/images/newImages/tttk.png" class="img-prf" data-src="/images/newImages/tttk.png">
                    </div>
                    <div class="chu">
                        <p class="chu-prf">Chỉnh sửa thông tin tài khoản</p>
                    </div>
                </div>
            </div>
            <div class="box-content-edit" data="<?= $time ?>">
                <form class="register_buy" id="register_buy" data="<?= $id_user ?>" data1="<?= $type_user ?>">
                    <div class="box-content-edit-tong d_flex">
                        <div class="avt_daidien" data="<?= $usc_logo ?>">

                            <!-- <div class="img-edit img_edit_df anh_df_dl"> -->
                            <!-- <img src="../images/anh_moi/anh010.png" class="lazyload img-ava-edit" id="img-ava-edit"> -->
                            <!-- <img class="fake-img-edit" src="/images/newImages/gallery-edit.png"> -->
                            <!-- </div> -->
                            <!-- <input type="file" id="img_ava-edit" class="tab_df" name="img-edit"> -->

                        </div>
                        <div class="prf-edit">
                            <div class="form-control box_input_infor">
                                <label class="label_form">Số điện thoại<i class="sao">*</i></label>
                                <input class="numbersOnly2 input_form input_infor_tag error" type="number" placeholder="Nhập số điện thoại" name="Phone" value="<?= $usc_phone; ?>" readonly>
                            </div>
                            <div class="form-control box_input_infor">
                                <label class="label_form">Họ và tên<i class="sao">*</i></label>
                                <input type="text" placeholder="Họ và tên" name="Hoten" class="input_form input_infor_tag error viethoa_cdau" value="<?= $usc_name; ?>">
                                <div class='noti-error error_hoten'></div>
                            </div>
                            <div class="form-control box_input_infor">
                                <label class="label_form">Email</label>
                                <input type="text" placeholder="Nhập email" name="email" class="input_form input_infor_tag error" value="<?= $email_ht ?>">
                                <div class='noti-error error_email'></div>
                            </div>
                            <div class="form-control box_input_infor">
                                <label class="label_form">Địa chỉ liên hệ</label>
                                <input type="text" placeholder="Nhập địa chỉ" name="address" value="<?= $usc_address; ?>" class="input_form input_infor_tag error">
                                <div class='noti-error error_address'></div>
                            </div>
                            <div class="form-btn">
                                <div class="btn-edit">
                                    <button id="edit_prof" type="button" class="edit-prof">Lưu</button>
                                </div>
                                <div class="btn-cancel">
                                    <button id="cancel_prof" type="button" class="cancel-prof">Huỷ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?
    include("../modals/tbao_sua.php");
    include("../includes/inc_new/inc_footer.php");
    ?>
    <script type="text/javascript" src="../js/style_new/app.js"></script>
    <script type="text/javascript">
        var user_logo = $('.avt_daidien').attr("data");
        if (user_logo == '') {
            var img_us = "/images/anh_moi/dai_dien_avt.png";
        } else {
            var img_us = user_logo;
        }

        $('.avt_daidien').append(
            '<div class="img-edit img_edit_df anh_df_dl" onclick="check_vt()"><img src="' + img_us + '" class="lazyload img-ava-edit" id="img-ava-edit"><img class="fake-img-edit" src="/images/newImages/gallery-edit.png"></div><input type="file" id="img_ava-edit" class="file_chon d_none" name="img-edit" onchange="loadFile()">'
        );

        function check_vt() {
            $(".file_chon").click();
        }

        function loadFile() {
            var match = ["image/gif", "image/png", "image/jpg", "image/jpeg", "image/jfif", "image/PNG"];
            var file_data = $('.file_chon').prop('files')[0];
            var type = file_data.type;
            if ($.inArray(type, match) == -1) {
                alert("kho")
            } else {
                var usc_id = <?= $id_user ?>;
                var type_user = <?= $type_user ?>;
                var fd = new FormData();

                fd.append('user_id', usc_id);
                fd.append('user_type', type_user);
                fd.append('files', file_data);

                $.ajax({
                    type: 'POST',
                    url: "../ajax/update_img.php",
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        window.location.reload();
                    }
                });
            }
        }

        $('#overview').addClass('menu_active')

        $('.huy_bo_df').click(function() {
            $('.tbao_sua').hide();
        })

        $('.btn-cancel').click(function() {
            $('.tbao_sua').show();
        })

        $('.btn-mui-ten').click(function() {
            $('.menu-bot').toggle(500)
            $(this).toggleClass('rotate_icon')
        });

        $(".input_form").click(function() {
            $(this).parents(".form-control").find(".noti-error").text('');
        });

        $("#edit_prof").click(function() {
            var register_buy = $("#register_buy");
            register_buy.validate({
                errorPlacement: function(error, element) {
                    error.appendTo(element.parents(".box_input_infor"));
                    error.wrap("<span class='error'>");
                    element.parents('.box_input_infor').addClass('validate_input');
                },
                rules: {
                    Hoten: {
                        required: true,
                    },
                },
                messages: {
                    Hoten: {
                        required: "Họ tên không được để trống",
                    },
                },
            });
            if (register_buy.valid() === true) {
                var user_id = $("#register_buy").attr("data");
                var user_type = $("#register_buy").attr("data1");

                var ho_ten = $("input[name='Hoten']").val();
                var email = $("input[name='email']").val();
                var address = $("input[name='address']").val();

                var specialChars = "<>@!#$%^&*()_+[]{}?:;|'\"\\,./~`-="
                var check = function(string) {
                    for (i = 0; i < specialChars.length; i++) {
                        if (string.indexOf(specialChars[i]) > -1) {
                            return true
                        }
                    }
                    return false;
                };

                var check_diachi = "<>@!#$%^&*()_+[]{}?:;|'\"\\~`=";
                var dchi_check = function(string) {
                    for (i = 0; i < check_diachi.length; i++) {
                        if (string.indexOf(check_diachi[i]) > -1) {
                            return true
                        }
                    }
                    return false;
                };

                if (check(ho_ten) == true) {
                    $('.error_hoten').text("Họ và tên không thể chứa kí tự đặc biệt");
                    return false;
                };

                if (dchi_check(address) == true) {
                    $(".error_address").text("Địa chỉ không chứa các ký tự đặc biệt trừ các ký tự  ,  .  /  - ");
                    return false;
                };

                var hom_nay = $(".box-content-edit").attr("data");

                var err_te = [];
                $(".noti-error").each(function() {
                    if ($(this).text() != "") {
                        var err = 1;
                        err_te.push(err);
                    }
                });
                var b = 1;

                var fd = new FormData();
                fd.append('user_id', user_id);
                fd.append('user_type', user_type);
                fd.append('ho_ten', ho_ten);
                fd.append('email', email);
                fd.append('address', address);

                if ($.inArray(b, err_te) == -1) {
                    $.ajax({
                        type: "POST",
                        url: "/ajax/chinhsua_tt_nguoimua.php",
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            if (data == '') {
                                $('.tbao_tcong').show();
                            } else {
                                alert(data);
                            }
                        },
                    });
                }


            }
        });
    </script>
</body>

</html>