<?
include 'config.php';
$id = getValue('id', 'int', 'GET', '');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $list_ktag_query = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id ");
    $list_ktag = $list_ktag_query->result_array();

    $querypk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = $id and `id_cha`=0");
    $list_phukien = $querypk->result_array();

    $querylk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = $id and `id_cha`=1");
    $list_linhkien = $querylk->result_array();

    $bao_hanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
} else {
    header('Location: /');
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Đăng tin đồ tiện tử phụ linh kiện</title>

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">

    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
</head>

<body>
    <? include("../includes/common/inc_header.php") ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Đăng tin</p>
                <div class="w-125">
                    <span>Cho tặng miễn phí</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi">
                        <span class="slider1 round1"></span>
                    </label>
                </div>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include("../includes/inc_new/up-media-dang-tin.php"); ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont" id="form_dt_phukien">
                        <div class="row-tin-dang-dau">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm<span class="color_red">*</span></p>
                            <input data="<?= $id ?>" type="text" class="dmuc-spham" readonly name="danhmucsanpham_dt" placeholder="Đồ điện tử >> Phụ kiện, Linh kiện">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Linh kiện/ Phụ kiện <span class="color_red">*</span></p>
                            <select name="linhkien" class="slect-thietbi slect-thietbi-pkien hd_height36" data="<?= $id ?>">
                                <option value="">Linh kiện/ Phụ kiện</option>
                                <option value="1">Phụ kiện</option>
                                <option value="2">Linh kiện</option>
                            </select>
                        </div>
                        <!-- phu kien -->
                        <div class="row-tin-dang box_input_infor box_loai_pk">

                        </div>
                        <div class="row-tin-dang box_input_infor append_nhom">

                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Bảo hành</p>
                            <select name='baohanh' class="slect-hang hd_height36">
                                <option value="">Bảo hành</option>
                                <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                    <option value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tình trạng <span class="color_red">*</span></p>
                            <select name="tinh_trang" class="slect-hang hd_height36">
                                <option disabled selected value="">Tình trạng</option>
                                <option value="1">Mới</option>
                                <option value="2">Đã sử dụng (chưa sửa chữa)</option>
                                <option value="3">Đã sử dụng (qua sửa chữa)</option>
                            </select>
                        </div>
                        <div class="row-tin-dang ">
                            <p class="font-dam hd_font15-17">Giá <span class="color_red">*</span></p>
                            <div class="fig_gia_nguoiban">
                                <div class="input-gia-cont">
                                    <div class="box_input_infor">
                                        <input onkeyup="format_gtri(this)" class="input_infor_tag error" type="text" name="td_gia_spham" placeholder="" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
                                    </div>
                                    <div class="money_div arrow_none">
                                        <select class="dt-money-up" name="donvi_ban">
                                            <option value="1" selected>VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban fig_gia_nguoiban_lienhe">
                                    <input type="checkbox" name="td-lienhe_ngban" placeholder="" class="lien-he-ngban">
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea name="mota" class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor tags_dmuc d_none">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
                                <option value="">Thêm chi tiết danh mục</option>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" readonly placeholder="Địa chỉ">
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
                        <div class="row-tin-dang-btn cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold background-none">XEM TRƯỚC</button>
                            <button type="button" id="xoa_tddang_tin" class="btn-submit td-dang-tin hd_cspointer font-bold">ĐĂNG TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <? include('../modals/md_danh_muc_tin_dang.php') ?>
        <? include('../modals/md_dia_chi.php') ?>
        <? include '../modals/tbao_tcong.php' ?>
    </section>
    <? include('../includes/inc_new/inc_footer.php') ?>
</body>
<script type="text/javascript" src="/js/newJs/admin.main.js"></script>

</html>
<script>
    $(".slect-thietbi-pkien").change(function() {
        var pkien_lkien = $(this).val();
        var id_dm = $(this).attr("data");
        if (pkien_lkien != "") {
            $('.tags_dmuc').removeClass("d_none");
            $.ajax({
                url: '/render/pkien_lkien.php',
                type: 'POST',
                data: {
                    pkien_lkien: pkien_lkien,
                    id_dm: id_dm,
                },
                success: function(data) {
                    $(".box_loai_pk").html(data);
                    $(".slect-thietbi").select2();
                }
            });
        } else {
            $('.tags_dmuc').addClass("d_none");
            $('.tags_dmuc').html('');
            $(".box_loai_pk").html('');
            $('.append_nhom').html('');
        }

    });

    function lpkien_doi(id) {
        var lkien_pkien = $(id).val();
        var id_dm = $(id).attr("data");
        var id_loai = $(".slect-thietbi-pkien").val();

        $.ajax({
            url: "/render/select_delivery.php",
            method: 'POST',
            data: {
                id_lkp: lkien_pkien,
                id_dm: id_dm,
                id_loai: id_loai,
            },
            success: function(data) {
                $('.tags_dmuc').html(data);
                rf_select2();
            }
        });

        $.ajax({
            url: "/render/dangtin_phukien_linhkien.php",
            type: 'POST',
            data: {
                id_lkp: lkien_pkien,
                id_dm: id_dm
            },
            success: function(data) {
                $('.append_nhom').html(data);
                $('.slect-thietbi').select2();
            },
        });
    };

    $(".td-dang-tin").click(function() {
        $("#xoa_tddang_tin").removeClass("td-dang-tin");
        var form_dt_phukien = $("#form_dt_phukien");
        form_dt_phukien.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                linhkien: "required",
                loai_pk: "required",
                thietbi1: "required",
                tinh_trang: "required",
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
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                linhkien: "Vui lòng chọn loại linh kiện/phụ kiện",
                loai_pk: "Không được để trống",
                thietbi1: "Vui lòng chọn thiết bị",
                tinh_trang: "Vui lòng chọn tình trạng sản phẩm",
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
        if (form_dt_phukien.valid() === false) {
            $("#xoa_tddang_tin").addClass("td-dang-tin");
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
        if (form_dt_phukien.valid() === true) {
            $("#xoa_tddang_tin").removeClass("td-dang-tin");
            var id_dm = $(".dmuc-spham").attr("data");
            var tieu_de = $("input[name='tieu_de']").val();
            var linh_kien = $("select[name='linhkien']").val();
            var loai_pk = $("select[name='loai_pk']").val();
            var thietbi = $("select[name='thietbi1']").val();
            var baohanh = $("select[name='baohanh']").val();
            var tinh_trang = $("select[name='tinh_trang']").val();
            var gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var gia_spham = '0';
            };
            var don_vi = $("select[name='donvi_ban']").val();
            var mo_ta = $("textarea[name='mota']").val();
            var chitiet_dm = $("select[name='chitiet_dm']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
            var tinh_thanh = $("select[name='thanhpho']").val();
            var quan_huyen = $("select[name='quanhuyen']").val();
            var phuong_xa = $("select[name='phuongxa']").val();
            var so_nha = $("input[name='md_so_nha']").val();
            var tang_mphi = 0;
            if ($("#cho-tang-mphi").is(":checked")) {
                tang_mphi = 1;
            }
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });

            var fd = new FormData();

            fd.append('id_dm', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('linh_kien', linh_kien);
            fd.append('loai_pk', loai_pk);
            fd.append('thietbi', thietbi);
            fd.append('baohanh', baohanh);
            fd.append('tinh_trang', tinh_trang);
            fd.append('gia_spham', gia_spham);
            fd.append('chitiet_dm', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('mo_ta', mo_ta);
            fd.append('don_vi', don_vi);
            fd.append('tang_mphi', tang_mphi);
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
                type: 'POST',
                url: '/ajax_ddtu/dtin_linh_phukien.php',
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.td-dang-tin').prop('disabled', true);
                },
                success: function(data) {
                    if (data == "") {
                        tbao_dtin_tcong();
                    } else {
                        alert(data);
                        $('#xoa_tddang_tin').addClass('td-dang-tin');
                        $('.td-dang-tin').prop('disabled', false);
                    }
                }
            })
        }
    });

    $(".td-xem-truoc").click(function() {
        var form_dt_phukien = $("#form_dt_phukien");
        form_dt_phukien.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                linhkien: "required",
                loai_pk: "required",
                thietbi1: "required",
                tinh_trang: "required",
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
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                linhkien: "Vui lòng chọn loại linh kiện/phụ kiện",
                loai_pk: "Không được để trống",
                thietbi1: "Vui lòng chọn thiết bị",
                tinh_trang: "Vui lòng chọn tình trạng sản phẩm",
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
        if (form_dt_phukien.valid() === false) {
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
        if (form_dt_phukien.valid() === true) {
            var id_dm = $(".dmuc-spham").attr("data");
            var tieu_de = $("input[name='tieu_de']").val();
            var linh_kien = $("select[name='linhkien']").val();
            var loai_pk = $("select[name='loai_pk']").val();
            var thietbi = $("select[name='thietbi1']").val();
            var baohanh = $("select[name='baohanh']").val();
            var tinh_trang = $("select[name='tinh_trang']").val();
            var gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var gia_spham = '0';
            };
            var don_vi = $("select[name='donvi_ban']").val();
            var mo_ta = $("textarea[name='mota']").val();
            var chitiet_dm = $("select[name='chitiet_dm']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
            var tang_mphi = 0;
            if ($("#cho-tang-mphi").is(":checked")) {
                tang_mphi = 1;
            }
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var phan_biet = 1;
            var fd = new FormData();

            fd.append('id_dmuc', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('tinh_trang', tinh_trang);
            fd.append('gia_spham', gia_spham);
            fd.append('ctiet_dmuc', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('mo_ta', mo_ta);
            fd.append('donvi_ban', don_vi);
            fd.append('tang_mphi', tang_mphi);

            fd.append('loai_sp', linh_kien);
            fd.append('loai_sp2', loai_pk);
            fd.append('loai_sp3', thietbi);
            fd.append('loai_sp4', baohanh);
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