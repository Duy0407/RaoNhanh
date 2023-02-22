<?
include 'config.php';
include('../includes/inc_new/icon.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 5 || $type_user == 1) {
        $ht_tt = new db_query("SELECT `usc_name`, `usc_logo`, `usc_money`, `usc_type`, `usc_time` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_logo = $kn_tt['usc_logo'];
        $usc_time = $kn_tt['usc_time'];
        $usc_money = $kn_tt['usc_money'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
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
    <title>Hồ sơ gian hàng - đổi mật khẩu</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b_quang.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_quang.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section class="change_password_stall gianhang_dnghiep">
        <div class="gianhang_container">
            <div class="d_flex j_between">
                <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
                <div class="khoiphai_quanly">
                    <div class="modal_dangtin d_flex">
                        <div class="doimatkhau pt10 ">Đổi mật khẩu</div>
                    </div>
                    <form class="cha_row_dmk" id="from_repasswork">
                        <div class="chas_row_dmk">
                            <div class="row_dmk box_input_infor">
                                <p class="title_row_dmk color-blk font-bold font-15-18 mb5">Mật khẩu hiện tại</p>
                                <input type="password" name="mk_hientaiu" placeholder="Nhập mật khẩu hiện tại" id="iputPassword1" class="cl_chung_pw form-control sh_clr_five input_infor_tag error">
                                <span class="show_pass hd_cspointer" id="showPassword"></span>
                            </div>
                            <div class="row_dmk box_input_infor">
                                <p class="title_row_dmk color-blk font-bold font-15-18 mb5">Mật khẩu mới</p>
                                <input type="password" name="mk_moiu" placeholder="Nhập mật khẩu mới" id="iputPassword2" class="cl_chung_pw form-control sh_clr_five input_infor_tag error">
                                <span class="show_pass hd_cspointer" id="showPassword"></span>
                            </div>
                            <div class="row_dmk box_input_infor">
                                <p class="title_row_dmk color-blk font-bold font-15-18 mb5">Nhập lại mật khẩu mới</p>
                                <input type="password" name="mk_nhapmoiu" placeholder="Nhập lại mật khẩu mới" id="iputPassword3" class="cl_chung_pw form-control sh_clr_five input_infor_tag error">
                                <span class="show_pass hd_cspointer" id="showPassword"></span>
                            </div>
                            <div class="row_dmk div-ma-xac-nhan box_input_infor">
                                <p class="title_row_dmk color-blk font-bold font-15-18 mb5">Mã xác nhận</p>
                                <div class="password__capcha">
                                    <input type="text" name="captcha_confirm" placeholder="Mã xác nhận" class="ma-xac-nhan sh_clr_five form-control input_infor_tag error">
                                    <div class="ma-captcha-cont">
                                        <span class="avt_icon_lh_cp">
                                            <img src="../images/hd-refresh-captcha.svg" alt="tải lại mã captch" class="hd_cspointer xoay360" style="transform: rotate(2880deg); transition: all 0.2s ease 0s;">
                                        </span>
                                        <input readonly type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                                    </div>
                                </div>
                            </div>

                            <div class="row-rtbm">
                                <button type="button" class="btn-doi-mk hd_cspointer font-bold hd-clor-white font-15-18 doi_mk">Đổi mật khẩu</button>
                            </div>
                        </div>
                    </form>

                </div>
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

    <?
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/style_new/style.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
</body>

</html>
<script type="text/javascript">
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

    $('.arrow_show_768').click(function() {
        $(this).toggleClass('rotate');
        $('.menu_hoso_768').toggle(500);
    })

    $(".show_pass").click(function() {
        $(this).toggleClass("active");
        var input = $($(this).parent().find(".cl_chung_pw"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    $(".form-control").click(function() {
        $(".row_dmk").removeClass("active");
        $(this).parents(".row_dmk").addClass("active");
    });
    var form_control = $(".form-control");
    $(window).click(function(e) {
        if (!form_control.is(e.target)) {
            $(".row_dmk").removeClass("active");
        }
    });
</script>