<?php
include('../includes/inc_new/icon.php');
include 'config.php';
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 2) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_logo`,`hien_thi`,`usc_name`,`usc_type`,`usc_time` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_logo = $kn_tt['usc_logo'];
        $hien_thi = $kn_tt['hien_thi'];
        $usc_time = $kn_tt['usc_time'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'người bán', 2 => 'người mua', 3 => "doanh nghiệp");
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">
<!--link meta seo-->

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Riêng tư và bảo mật</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?$ver=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?$ver=<?= $version ?>">

</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="chinhsua-container hd-disflex authorities_private">
            <div class="cs-col-left">
                <div class="cs-header-right hd-disflex">
                    <div class="img-left-tt">
                        <div class="avatar-img-left hd_cspointer df">
                            <? if ($usc_logo != '') { ?>
                                <img src="/pictures/avt_dangtin/<?= $usc_logo ?>" class="avatar-img-left-tt" alt="anh">
                            <? } else { ?>
                                <img src="/images/anh_moi/anh004.png" class="avatar-img-left-tt" alt="anh">
                            <? } ?>
                        </div>
                    </div>
                    <div class="name">
                        <div class="name_left_375">
                            <p class="font-16-1875 color-blk font-bold"><?= $usc_name; ?></p>
                            <div class="edit_detail_account">
                                <p class="font-13-1523 font-dam">Tài khoản <?= $arr_type[$usc_type]; ?></p>
                                <p class="font-13-1523 font-dam">Tham gia: <?= $usc_time; ?></p>

                            </div>
                        </div>
                        <div class="name_right_375" onclick="edit_list(this)">
                            <img src="/images/icon/arrow-down.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="list_danhmuc list_danhmuc-hidden">
                    <? include('../includes/inc_new/sidebar_nguoimua.php') ?>
                </div>
            </div>
            <div class="khung_rtbm">
                <p class="title-rtbm mr30">Quyền riêng tư</p>
                <div class="rtbm-header-right hd-disflex">
                    <div class="header-right-rtbm">
                        <label class="switch-125" for="cho-phep-nb-truy-cap-rtbm">
                            <input type="checkbox" id="cho-phep-nb-truy-cap-rtbm" class="" <?= ($hien_thi == 0) ? "checked" : ""; ?>>
                            <span class="slider2 round2"></span>
                        </label>
                    </div>
                    <div class="header-right-ri-tong d_flex">
                        <div class="d_flex">
                            <div class="header-right-ri font-15-18 d_block">Cho phép người bán truy cập thông tin tài khoản
                                <span class="question_img">
                                    <img src="/images/icon/question.svg" alt="">
                                </span>
                            </div>

                        </div>
                    </div>
                    <div class="dauhoi hd_cspointer hidden">
                        <div class="tb_dauhoi ">
                            <p class="ct_dauhoi">
                                Cho phép người bán truy cập các thông tin như sản phẩm muốn mua, số điện thoại, tên tuổi
                                để được nhận tư vấn từ người bán
                            </p>
                        </div>
                    </div>
                </div>
                <p class="title-rtbm mr30">Đổi mật khẩu</p>

                <form class="cha_row-rtbm" id="from_repasswork" data="<?= $id_user ?>" data2="<?= $type_user ?>">
                    <div class="row-rtbm box_input_infor">
                        <p class="title_row_rtbm color-blk font-bold hd_font15-17">Mật khẩu hiện tại </p>
                        <input type="password" name="mk_hientaiu" placeholder="Nhập mật khẩu hiện tại" id="iputPassword1" class="cl_chung_pw form-control input_infor_tag error">
                        <span class="show_pass hd_cspointer"></span>
                    </div>
                    <div class="row-rtbm box_input_infor">
                        <p class="title_row_rtbm color-blk font-bold hd_font15-17">Mật khẩu mới</p>
                        <input type="password" name="mk_moiu" placeholder="Nhập mật khẩu mới" id="iputPassword2" class="cl_chung_pw form-control input_infor_tag error">
                        <span class="show_pass hd_cspointer"></span>
                    </div>
                    <div class="row-rtbm box_input_infor">
                        <p class="title_row_rtbm color-blk font-bold hd_font15-17">Nhập lại mật khẩu mới</p>
                        <input type="password" name="mk_nhapmoiu" placeholder="Nhập lại mật khẩu mới" id="iputPassword3" class="cl_chung_pw form-control input_infor_tag error">
                        <span class="show_pass hd_cspointer"></span>
                    </div>
                    <div class="row-rtbm div-ma-xac-nhan box_input_infor">
                        <p class="title_row_rtbm color-blk font-bold hd_font15-17">Mã xác nhận</p>
                        <div class="d_flex">
                            <input type="text" name="captcha_confirm" placeholder="Mã xác nhận" class="ma-xac-nhan form-control input_infor_tag error">
                            <div class="ma-captcha-cont ma-captcha-cont-df">
                                <span class="avt_icon_lh_cp">
                                    <img src="../images/hd-refresh-captcha.svg" alt="tải lại mã captch" class="hd_cspointer xoay360" style="transform: rotate(2880deg); transition: all 0.2s ease 0s;">
                                </span>
                                <input readonly type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                            </div>
                        </div>
                    </div>
                    <div class="row-rtbm">
                        <button type="button" class="btn-doi-mk hd_cspointer font-bold doi_mk">Đổi mật khẩu</button>
                    </div>`
                </form>
            </div>
        </div>


        <!-- POPUP ĐỔI MẬT KHẨU THÀNH CÔNG -->
        <div class="popup_doimk_tc">
            <div class="popup_doimk_tc_overlay"></div>
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

    </section>
    <?php include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    $("#cho-phep-nb-truy-cap-rtbm").click(function() {
        var check_ht = 1;
        if ($(this).is(":checked")) {
            var check_ht = 0;
        }
        $.ajax({
            type: 'POST',
            url: "/ajax/chophepvao.php",
            data: {
                check_ht: check_ht
            },
            success: function(data) {
                window.location.reload();
            }
        })
    });

    $(".popup_doimk_tc_padding_btn").click(function() {
        $(".popup_doimk_tc").hide();
        window.location.reload();
    });

    $.validator.addMethod("validatePassword", function(value, element) {
        return this.optional(element) || /^\S*(?=\S{6,})(?=\S*[a-zA-Z])(?=\S*[0-9])(?=\S*[\d])\S*$/i.test(value);
    }, "Hãy nhập mật khẩu từ 6 ký tự trở lên bao gồm ít nhất một chữ cái, ít nhất một chữ số và không chứa khoảng trắng");

    $(".doi_mk").click(function() {
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
                    validatePassword: true,
                },
                mk_moiu: {
                    required: true,
                    minlength: 6,
                    validatePassword: true,
                },
                mk_nhapmoiu: {
                    required: true,
                    minlength: 6,
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
                },
                mk_nhapmoiu: {
                    required: "Vui lòng nhập lại mật khẩu mới",
                    equalTo: "Mật khẩu nhập lại không đúng",
                    minlength: "Mật khẩu tối thiểu 6 ký tự",

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


    function edit_list(a) {
        $('.list_danhmuc').toggleClass('list_danhmuc-hidden')
        $(a).toggleClass('rotate_icon')
    }
    $(".show_pass").click(function() {
        $(this).toggleClass("active");
        var input = $($(this).parent().find(".cl_chung_pw"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

    $(".dauhoi").click(function() {
        $('.tb_dauhoi').toggleClass('hidden')
    });

    $(".form-control").click(function() {
        $(".row-rtbm").removeClass("active");
        $(this).parents(".row-rtbm").addClass("active");
    });
    var form_control = $(".form-control");

    $(window).click(function(e) {
        if (!form_control.is(e.target)) {
            $(".row-rtbm").removeClass("active");
        }
    });
    $('.question_img').click(function() {
        $('.dauhoi').toggleClass('hidden')
    })
</script>