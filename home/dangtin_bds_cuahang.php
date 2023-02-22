<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];
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
    <title>Đăng tin bất động sản cửa hàng</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
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
                    <form class="form-dtin-cont" id="form_bds_cuahang" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" data="33" readonly name="san-pham-laptop" placeholder="Bất động sản >> Cửa hàng">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Cần bán/Cho thuê <span class="color_red">*</span></p>
                            <select class="slect-hang banthue hd_height36" name="ban_thue">
                                <option disabled selected value="">Cần bán/Cho thuê</option>
                                <option value="1">Cần bán</option>
                                <option value="2">Cho thuê</option>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" autocomplete="off" type="text" name="tieu_de" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="row-tin-dang  box_input_infor">
                            <p class="font-dam hd_font15-17">Tên toà nhà/Khu dân cư</p>
                            <input class="input_infor_tag error" type="text" name="ten_toanha" placeholder="Tên toà nhà/Khu dân cư">
                        </div>
                        <div class="d_flex j_between mb20 d_so_sl_sotang">
                            <div class="row-tin-dang rowflex2">
                                <p class="font-dam hd_font15-17">Tổng số tầng </p>
                                <select class="slect-hang  hd_height36" name="so_tang">
                                    <option disabled selected value="">Tổng số tầng</option>
                                    <?
                                    $sql_tang = new db_query("SELECT `id`, `so_luong` FROM `tang_phong` WHERE  type_zoom = 1");
                                    $result_t = $sql_tang->result_array();
                                    ?>
                                    <? foreach ($result_t as $tang) : ?>
                                        <option value="<?= $tang['id'] ?>"><?= $tang['so_luong'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                            <div class="row-tin-dang rowflex2">
                                <p class="font-dam hd_font15-17">Hướng cửa chính</p>
                                <select class="slect-hang  hd_height36" name="huong_cua">
                                    <option disabled selected value="">Hướng cửa chính</option>
                                    <option value="1">Đông</option>
                                    <option value="2">Tây </option>
                                    <option value="3">Nam </option>
                                    <option value="4">Bắc </option>
                                    <option value="5">Đông bắc </option>
                                    <option value="6">Đông nam </option>
                                    <option value="7">Tây bắc </option>
                                    <option value="8">Tây nam </option>
                                </select>
                            </div>
                        </div>
                        <div class="d_flex j_between d_so_sl_sotang">
                            <div class="row-tin-dang rowflex2">
                                <p class="font-dam hd_font15-17">Giấy tờ pháp lý</p>
                                <select class="slect-hang  hd_height36" name="giayto">
                                    <option disabled selected value="">Giấy tờ pháp lý</option>
                                    <option value="1">Đã có sổ</option>
                                    <option value="2">Đang chờ sổ</option>
                                    <option value="3">Giấy tờ khác</option>
                                </select>
                            </div>
                            <div class="row-tin-dang rowflex2">
                                <p class="font-dam hd_font15-17">Tình trạng nội thất</p>
                                <select class="slect-hang  hd_height36" name="tinhtrang_nt">
                                    <option disabled selected value="">Tình trạng nội thất</option>
                                    <option value="1">Nội thất cao cấp</option>
                                    <option value="2">Nội thất đầy đủ</option>
                                    <option value="3">Hoàn thiện cơ bản</option>
                                    <option value="4">Bàn giao thô</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang position_ral  box_input_infor">
                            <p class="font-dam hd_font15-17">Diện tích <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="dientich" placeholder="Diện tích" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                            <span class="donvi_dt font-14">m<sup>2</sup></span>
                        </div>
                        <div class="d_flex j_between d_so_sl_sotang">
                            <div class="row-tin-dang rowflex2 position_ral">
                                <p class="font-dam hd_font15-17">Chiều dài</p>
                                <input type="text" name="chieudai" placeholder="Chiều dài" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                <span class="donvi_dt font-14">m</span>
                            </div>
                            <div class="row-tin-dang rowflex2 position_ral">
                                <p class="font-dam hd_font15-17">Chiều ngang</p>
                                <input type="text" name="chieungang" placeholder="Chiều ngang" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                <span class="donvi_dt font-14">m</span>
                            </div>
                        </div>

                        <div class="row-tin-dang d_8-7_tclass1">
                            <p class="font-dam hd_font15-17 d_8-7_tclass2">Giá <span style="color:#ff0000">*</span></p>
                            <div class="d_themdiv_gia_7_8">
                                <div class="input-gia-cont d_8-7_tclass3">
                                    <div class="box_input_infor">
                                        <input class="input_infor_tag error" onkeyup="format_gtri(this)" type="text" name="td_gia_spham" placeholder="" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
                                    </div>
                                    <div class="money_div d_8-7_tclass5">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1">VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban d_8-7_tclass4">
                                    <input type="checkbox" name="td-lienhe_ngban" placeholder="" class="lien-he-ngban">
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor d_none">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select id="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
                                <option disabled selected value="">Thêm chi tiết danh mục</option>

                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input readonly type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" placeholder="Địa chỉ">
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
                        <div class="row-tin-dang cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold" onclick="xem_trc_tin()">XEM TRƯỚC</button>
                            <button type="button" id="xoa_tddang_tin" class="btn-submit dang_tin td-dang-tin hd_cspointer font-bold">ĐĂNG TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <? include '../modals/md_danh_muc_tin_dang.php' ?>
        <? include '../modals/md_dia_chi.php' ?>
        <? include '../modals/tbao_tcong.php' ?>
    </section>
    <?
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>

</body>
<script type="text/javascript">
    $('.banthue').on('change', function() {
        var id_nhucau = $("select[name='ban_thue']").val();
        var id_dm = $(".dmuc-spham").attr("data");
        if (id_nhucau != "") {
            $("#chitiet_dm").parents(".box_input_infor").removeClass("d_none");
        } else {
            $("#chitiet_dm").parents(".box_input_infor").addClass("d_none");
        }
        $.ajax({
            type: 'POST',
            url: '/render/render_bdsdat_tag.php',
            data: {
                id_nhucau: id_nhucau,
                id_dm: id_dm,
            },
            success: function(data) {
                $("#chitiet_dm").html(data);
            }
        })
    });


    $(".td-dang-tin").click(function() {
        var form_bds_cuahang = $("#form_bds_cuahang");
        form_bds_cuahang.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                ban_thue: "required",
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                dientich: "required",
                td_gia_spham: "required",
                chitiet_dm: "required",
                td_dia_chi: "required",
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
                ban_thue: "Vui lòng chọn nhu cầu",
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "tiêu đề ít nhất 40 ký tự",
                    maxlength: "tiêu đề nhiều nhất 70 ký tự",
                },
                dientich: "Vui lòng nhập diện tích",
                td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
                chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                td_dia_chi: "Vui lòng nhập địa chỉ",
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
        if (form_bds_cuahang.valid() === false) {
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
        if (form_bds_cuahang.valid() === true) {
            $("#xoa_tddang_tin").removeClass("td-dang-tin");
            var user_id = $("#form_bds_cuahang").attr("data");
            var user_type = $("#form_bds_cuahang").attr("data1");
            var ban_thue = $("select[name='ban_thue']").val();
            var tieu_de = $("input[name='tieu_de']").val();
            var ten_toanha = $("input[name='ten_toanha']").val();
            var huong_cua = $("select[name='huong_cua']").val();
            var so_tang = $("select[name='so_tang']").val();
            var giayto = $("select[name='giayto']").val();
            var giayto = $("select[name='giayto']").val();
            var tinhtrangnt = $("select[name='tinhtrang_nt']").val();
            var dientich = $("input[name='dientich']").val();
            var chieudai = $("input[name='chieudai']").val();
            var chieungang = $("input[name='chieungang']").val();
            if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                var td_gia_spham = 0;
            } else {
                var td_gia_spham = $("input[name='td_gia_spham']").val();
            };
            var dvi_tien = $("select[name='dvi_tien']").val();
            var mo_ta = $("textarea[name='mota']").val();
            var ctiet_dmuc = $("select[name='chitiet_dm']").val();
            var tinh_thanh = $("select[name='thanhpho']").val();
            var quan_huyen = $("select[name='quanhuyen']").val();
            var phuong_xa = $("select[name='phuongxa']").val();
            var so_nha = $("input[name='md_so_nha']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            // alert(user_id);
            var fd = new FormData();
            fd.append('user_id', user_id);
            fd.append('user_type', user_type);
            fd.append('ban_thue', ban_thue);
            fd.append('tieu_de', tieu_de);
            fd.append('ten_toanha', ten_toanha);
            fd.append('huong_cua', huong_cua);
            fd.append('so_tang', so_tang);
            fd.append('giayto', giayto);
            fd.append('tinhtrangnt', tinhtrangnt);
            fd.append('dientich', dientich);
            fd.append('chieudai', chieudai);
            fd.append('chieungang', chieungang);
            fd.append('td_gia_spham', td_gia_spham);
            fd.append('dvi_tien', dvi_tien);
            fd.append('mo_ta', mo_ta);
            fd.append('ctiet_dmuc', ctiet_dmuc);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('dia_chi', dia_chi);
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
                url: '/ajax_bds/dangtin_bdscuahang.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.dang_tin').prop('disabled', true);
                },
                success: function(data) {
                    if (data == "") {
                        tbao_dtin_tcong();
                    } else {
                        alert(data);
                        $('#xoa_tddang_tin').addClass('td-dang-tin');
                        $('.dang_tin').prop('disabled', false);
                    }
                }
            })
        }
    })
    //xem trước
    function xem_trc_tin() {
        var form_bds_cuahang = $(".form-dtin-cont");
        form_bds_cuahang.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                ban_thue: "required",
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                dientich: "required",
                td_gia_spham: "required",
                chitiet_dm: "required",
                td_dia_chi: "required",
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
                ban_thue: "Vui lòng chọn nhu cầu",
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "tiêu đề ít nhất 40 ký tự",
                    maxlength: "tiêu đề nhiều nhất 70 ký tự",
                },
                dientich: "Vui lòng nhập diện tích",
                td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
                chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                td_dia_chi: "Vui lòng nhập địa chỉ",
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
        if (form_bds_cuahang.valid() === false) {
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
        if (form_bds_cuahang.valid() === true) {
            var ban_thue = $("select[name='ban_thue']").val();
            var tieu_de = $("input[name='tieu_de']").val();
            var id_dm = $(".dmuc-spham").attr('data');
            var ten_toanha = $("input[name='ten_toanha']").val();

            var huong_cua = $("select[name='huong_cua']").val();
            var so_tang = $("select[name='so_tang']").val();
            var giayto = $("select[name='giayto']").val();
            var tinhtrangnt = $("select[name='tinhtrang_nt']").val();
            var dientich = $("input[name='dientich']").val();
            var chieudai = $("input[name='chieudai']").val();
            var chieungang = $("input[name='chieungang']").val();
            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                var td_gia_spham = 0;
            };
            var mo_ta = $("textarea[name='mota']").val();
            var ctiet_dmuc = $("select[name='chitiet_dm']").val();
            var tinh_thanh = $("select[name='thanhpho']").val();
            var quan_huyen = $("select[name='quanhuyen']").val();
            var phuong_xa = $("select[name='phuongxa']").val();
            var so_nha = $("input[name='md_so_nha']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
            // alert(user_id);
            var phan_biet = 2;
            var donvi_ban = $(".donvi_ban").val();
            var donvi_mua = $(".donvi_mua").val();

            var fd = new FormData();
            fd.append("id_dmuc", id_dm);
            fd.append('loai_sp', ban_thue);
            fd.append('tieu_de', tieu_de);
            fd.append('loai_sp3', ten_toanha);
            fd.append('loai_sp7', so_tang);
            fd.append('loai_sp8', huong_cua);
            fd.append('loai_sp9', giayto);
            fd.append('loai_sp10', tinhtrangnt);
            fd.append('loai_sp11', dientich);
            fd.append('loai_sp12', chieudai);
            fd.append('loai_sp13', chieungang);
            fd.append('gia_spham', td_gia_spham);
            fd.append('mo_ta', mo_ta);
            fd.append('ctiet_dmuc', ctiet_dmuc);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('dia_chi', dia_chi);
            fd.append('avt_anh', arr_src);
            fd.append('phan_biet', phan_biet);
            fd.append('donvi_ban', donvi_ban);
            fd.append('donvi_mua', donvi_mua);


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
    }
</script>

</html>