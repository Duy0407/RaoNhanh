<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    if ($_COOKIE['UT'] == 1 || $_COOKIE['UT'] == 5) {
        $acc_id = $_COOKIE['UID'];
        $acc_type = $_COOKIE['UT'];
        $query_lhh = new db_query("SELECT `id`, `ten_loai`, `id_cha` FROM `loai_chung` WHERE id_cha= 0 AND id_danhmuc = 19");
        $result_lhh = $query_lhh->result_array();
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
    <title>Đăng tin ship</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Đăng tin</p>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont fid_gia_mb" id="form_ship" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" data="19" readonly name="san-pham-laptop" placeholder="Ship">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class=" input_infor_tag error" type="text" name="tieu_de" autocomplete="off" placeholder="Nhập tiêu đề">
                        </div>

                        <div class="d_flex j_between mt20 item_end df_fl_decs_7_9">
                            <div class="row-tin-dang rowflex2 box_input_infor fid_gia_mt0">
                                <p class="font-dam hd_font15-17">Khu vực nhận giao hàng <span class="color_red">*</span></p>
                                <select class="slect-hang  hd_height36" name="thanhpho" onchange="tinh_tp(this)">
                                    <option disabled selected value="">Tỉnh/thành phố</option>
                                    <? foreach ($arrcity as $row_cty) { ?>
                                        <option value="<?= $row_cty['cit_id'] ?>"><?= $row_cty['cit_name'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="row-tin-dang rowflex2 box_input_infor fid_gia_mt0">
                                <p class="font-dam hd_font15-17"></p>
                                <select class="md_quan_huyen" name="quanhuyen">
                                    <option value="">Quận/huyện</option>

                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang mt20">
                            <p class="font-dam hd_font15-17">Thời gian làm việc <span class="color_red">*</span></p>
                            <div class="div_d_them_thoigian">
                                <div class="df_khoithoigian1">
                                    <div class="df_khoithoigian1_sub box_input_infor">
                                        <input type="time" class="input_infor_tag error time_work" name="time_lamviec">
                                    </div>
                                    <div class="df_khoithoigian1_sub box_input_infor">
                                        <input type="time" class="input_infor_tag error time_work" name="time_ketthuc">
                                    </div>
                                    <div class="thanh_ke_center_time">
                                        <p class="thanh_ke_center_time_sub"></p>
                                    </div>
                                </div>
                                <div class="df_khoithoigian2">
                                    <input type="checkbox" name="checkbox_time" placeholder="" class="all_day">
                                    <p class="color_text label_time">Cả ngày</p>
                                </div>
                            </div>
                        </div>
                        <div class="d_flex j_between mt20 df_fl_decs_7_9 fif_mr_b">
                            <div class="row-tin-dang rowflex2">
                                <p class="font-dam hd_font15-17">Loại xe</p>
                                <select class="slect-hang  hd_height36" name="loaixe">
                                    <option disabled selected value="">Loại xe</option>
                                    <?
                                    $sql_lx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = 52 ");
                                    $result_lx = $sql_lx->result_array();
                                    ?>
                                    <? foreach ($result_lx as $lx) : ?>
                                        <option value="<?= $lx['id'] ?>"><?= $lx['ten_loai'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                            <div class="row-tin-dang rowflex2">
                                <p class="font-dam hd_font15-17">Loại hàng hoá giao</p>
                                <select class="slect-hang  hd_height36" name="loai_hanghoa">
                                    <option disabled selected value="">Loại hàng hoá giao</option>
                                    <? foreach ($result_lhh as $lhh) : ?>
                                        <option value="<?= $lhh['id'] ?>"><?= $lhh['ten_loai'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang d_8-7_tclass1 mt20">
                            <p class="font-dam hd_font15-17 d_8-7_tclass2">Giá <span style="color:#ff0000">*</span></p>
                            <div class="d_themdiv_gia_7_8">
                                <div class="input-gia-cont d_8-7_tclass3">
                                    <div class="box_input_infor">
                                        <input class="input_infor_tag error" type="text" onkeyup="format_gtri(this)" name="td_gia_spham" placeholder="" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
                                    </div>
                                    <div class="money_div d_8-7_tclass5">
                                        <select class="dt-money-up" name="dvi_tien">
                                            <option value="1">VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban d_8-7_tclass4">
                                    <input type="checkbox" name="td_lienhe_ngban" placeholder="" class="lien-he-ngban">
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                        </div>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Số điện thoại liên hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $usc_phone ?>" placeholder="Nhập số điện thoại liên hệ" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Email liện hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $usc_email ?>" placeholder="Nhập email liên hệ" autocomplete="off">
                        </div>
                        <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                            <p class="font-dam hd_font15-17">Mã xác nhận <span class="color_red">*</span></p>
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
                        <div class="row-tin-dang cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold">XEM TRƯỚC</button>
                            <button type="button" id="xoa_tddang_tin" class="btn-submit dangtin_ship td-dang-tin hd_cspointer font-bold">ĐĂNG TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <? include '../modals/md_danh_muc_tin_dang.php' ?>
        <? include '../modals/tbao_tcong.php' ?>
    </section>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="/js/newJs/admin.main.js"></script>

</body>
<script type="text/javascript">
    $('.all_day').click(function() {
        if ($('.all_day').prop('checked')) {
            var rong = '';
            $('.time_work').val(rong);
            $('.time_work').prop('disabled', true);
        } else {
            $('.time_work').prop('disabled', false);
        }
    });

    $(".td-dang-tin").click(function() {
        var form_ship = $("#form_ship");
        form_ship.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tinh: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                huyen: "required",
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                time_lamviec: "required",
                time_ketthuc: "required",
                td_gia_spham: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                captcha_confirm: {
                    required: true,
                    equalTo: "#captcha",
                },
                sdt_lienhe: {
                    required: true,
                    vali_phone: true,
                },
                email_lienhe: {
                    required: true,
                    vali_email: true,
                },
            },
            messages: {
                tinh: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Nhập ít nhất 40 ký tự",
                    maxlength: "Nhập nhiều nhất 70 ký tự",
                },
                huyen: "Vui lòng chọn quận huyện",
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                time_lamviec: "Chọn thời gian",
                time_ketthuc: "Chọn thời gian",
                td_gia_spham: "Vui lòng nhập giá sản phẩm",
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 10 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
            },
        });
        if (form_ship.valid() === false) {
            event.preventDefault();
            event.stopPropagation();
            var errorElements = $("span.error");
            for (let index = 0; index < errorElements.length; index++) {
                if ($(errorElements[index]).find("label").text() != "") {
                    const element = errorElements[index];
                    $('html, body').animate({
                        scrollTop: $(errorElements[index]).offset().top - 80
                    }, 1000);
                    return false;
                }
            }
        };
        if (form_ship.valid() === true) {
            $("#xoa_tddang_tin").removeClass("td-dang-tin");
            var user_id = $("#form_ship").attr("data");
            var user_type = $("#form_ship").attr("data1");

            var tieu_de = $("input[name='tieu_de']").val();
            
            var thanhpho = $("select[name='thanhpho']").val();
            var quanhuyen = $("select[name='quanhuyen']").val();
            if ($("input[name='checkbox_time']").is(":checked")) {
                var ca_ngay = 1;
                var time_lamviec = 0;
                var time_ketthuc = 0;

            } else {
                var ca_ngay = 0;
                var time_lamviec = $("input[name='time_lamviec']").val();
                var time_ketthuc = $("input[name='time_ketthuc']").val();
            };
            var loaixe = $("select[name='loaixe']").val();
            var loai_hanghoa = $("select[name='loai_hanghoa']").val();
            if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                var td_gia_spham = 0;
            } else {
                var td_gia_spham = $("input[name='td_gia_spham']").val();
            };
            var dvi_tien = $("select[name='dvi_tien']").val();
            var mo_ta = $("textarea[name='mota']").val();
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var fd = new FormData();
            fd.append('user_id', user_id);
            fd.append('user_type', user_type);
            fd.append('tieu_de', tieu_de);
            fd.append('thanhpho', thanhpho);
            fd.append('quanhuyen', quanhuyen);
            fd.append('time_lamviec', time_lamviec);
            fd.append('time_ketthuc', time_ketthuc);
            fd.append('ca_ngay', ca_ngay);
            fd.append('loaixe', loaixe);
            fd.append('loai_hanghoa', loai_hanghoa);
            fd.append('td_gia_spham', td_gia_spham);
            fd.append('dvi_tien', dvi_tien);
            fd.append('mo_ta', mo_ta);
            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            // lấy ảnh cũ
            fd.append('anh_dd', anh_dd);
            // end
            for (var i = 0; i < arr_anh.length; i++) {
                if (arr_anh[i] != 'undefined') {
                    fd.append('files[]', arr_anh[i]);
                }
            }
            var video = $("#cl-upload-video-file")[0].files;
            fd.append('file', video[0]);
            $.ajax({
                url: '/ajax/dangtin_shipp.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.dangtin_ship').prop('disabled', true);
                },
                success: function(data) {
                    if (data == "") {
                        tbao_dtin_tcong();
                    } else {
                        alert(data);
                        $('#xoa_tddang_tin').addClass('td-dang-tin');
                        $('.dangtin_ship').prop('disabled', false);
                    }
                }
            })
        }
    });

    $(".td-xem-truoc").click(function() {
        var form_ship = $("#form_ship");
        form_ship.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tinh: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                huyen: "required",
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                time_lamviec: "required",
                time_ketthuc: "required",
                td_gia_spham: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                captcha_confirm: {
                    required: true,
                    equalTo: "#captcha",
                },
                sdt_lienhe: {
                    required: true,
                    vali_phone: true,
                },
                email_lienhe: {
                    required: true,
                    vali_email: true,
                },
            },
            messages: {
                tinh: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Nhập ít nhất 40 ký tự",
                    maxlength: "Nhập nhiều nhất 70 ký tự",
                },
                huyen: "Vui lòng chọn quận huyện",
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                time_lamviec: "Chọn thời gian",
                time_ketthuc: "Chọn thời gian",
                td_gia_spham: "Vui lòng nhập giá sản phẩm",
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 10 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
            },
        });
        if (form_ship.valid() === false) {
            event.preventDefault();
            event.stopPropagation();
            var errorElements = $("span.error");
            for (let index = 0; index < errorElements.length; index++) {
                if ($(errorElements[index]).find("label").text() != "") {
                    const element = errorElements[index];
                    $('html, body').animate({
                        scrollTop: $(errorElements[index]).offset().top - 80
                    }, 1000);
                    return false;
                }
            }
        }
        if (form_ship.valid() === true) {
            var id_dmuc = $(".dmuc-spham").attr("data");
            var tieu_de = $("input[name='tieu_de']").val();
            var thanhpho = $("select[name='thanhpho']").val();
            var quanhuyen = $("select[name='quanhuyen']").val();
            var ca_ngay = 0;
            var time_lamviec = $("input[name='time_lamviec']").val();
            var time_ketthuc = $("input[name='time_ketthuc']").val();
            if ($("input[name='checkbox_time']").is(":checked")) {
                var ca_ngay = 1;
                var time_lamviec = 0;
                var time_ketthuc = 0;
            };
            var loaixe = $("select[name='loaixe']").val();
            var loai_hanghoa = $("select[name='loai_hanghoa']").val();

            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                var td_gia_spham = 0;
            };

            var dvi_tien = $("select[name='dvi_tien']").val();
            var mo_ta = $("textarea[name='mota']").val();

            var phan_biet = 1;
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });

            var fd = new FormData();
            fd.append('id_dmuc', id_dmuc);
            fd.append('tieu_de', tieu_de);
            fd.append('loai_sp', thanhpho);
            fd.append('loai_sp2', quanhuyen);
            fd.append('loai_sp3', time_lamviec);
            fd.append('loai_sp4', time_ketthuc);
            fd.append('loai_sp5', ca_ngay);
            fd.append('loai_sp6', loaixe);
            fd.append('loai_sp7', loai_hanghoa);
            fd.append('gia_spham', td_gia_spham);
            fd.append('donvi_ban', dvi_tien);
            fd.append('mo_ta', mo_ta);
            fd.append('avt_anh', arr_src.concat(anh_dd));
            fd.append('phan_biet', phan_biet);

            $.ajax({
                url: '/render/xemtrc_tdang.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(".v_container").removeClass("d_none");
                    $(".v_container").html(data);
                    $(".tindang-container").addClass("d_none");
                }
            })
        }
    })
</script>

</html>