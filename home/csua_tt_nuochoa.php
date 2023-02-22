<?
include 'config.php';
$id_dm = getValue('id_dm', 'int', 'GET', 0);
$id_cs = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_cs != 0 && $id_dm != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $check_tind = new db_query("SELECT new_id FROM `new` WHERE `new_user_id` = $us_id AND `new_type` = $us_type AND `new_id` = $id_cs AND `new_cate_id` = $id_dm ");
    if (mysql_num_rows($check_tind->result) > 0) {
        $list_tt = new db_query("SELECT n.`new_title`, n.`new_money`, n.`gia_kt`, n.`new_cate_id`, n.`new_city`, n.`new_image`, n.`new_unit`, n.`new_tinhtrang`,
                                n.`chotang_mphi`, n.`quan_huyen`, n.`phuong_xa`, n.`new_sonha`, n.`dia_chi`, n.`new_video`,  n.`new_ctiet_dmuc`,
                                d.`new_description`, d.`loai_chung`, n.`new_phone`, n.`new_email`
                                FROM `new` AS n INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                                WHERE n.`new_user_id` = $us_id AND n.`new_type` = $us_type AND n.`new_id` = $id_cs AND  n.`new_cate_id` = $id_dm ");
        $row_tt = mysql_fetch_assoc($list_tt->result);
        $avt_dangtin = $row_tt['new_image'];
        $video_dangtin = $row_tt['new_video'];

        $tinh_thanh = $row_tt['new_city'];
        $quan_huyen = $row_tt['quan_huyen'];
        $phuong_xa = $row_tt['phuong_xa'];
        $so_nha = $row_tt['new_sonha'];

        $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm ");

        $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm ");
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
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Chỉnh sửa thời trang nước hoa </title>
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
                <div class="w-125">
                    <span>Cho tặng miễn phí</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi" <?= ($row_tt['chotang_mphi'] == 1) ? "checked" : "" ?>>
                        <span class="slider1 round1"></span>
                    </label>
                </div>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right" data="<?= $id_cs ?>">
                    <form class="form-dtin-cont" id="form_thoitrang_nuochoa" data="<?= $us_id ?>" data1="<?= $us_type ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" readonly name="san-pham-laptop" data="<?= $id_dm ?>" placeholder="Thời trang >> Nước hoa">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" placeholder="Nhập tiêu đề" value="<?= $row_tt['new_title'] ?>" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Loại sản phẩm <span class="color_red">*</span></p>
                            <select class="slect-hang hd_height36" name="loai_sanpham">
                                <option value="">Loại sản phẩm</option>
                                <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                                    <option value="<?= $row_loai['id'] ?>" <?= ($row_loai['id'] == $row_tt['loai_chung']) ? "selected" : "" ?>><?= $row_loai['ten_loai'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tình trạng <span class="color_red">*</span></p>
                            <select class="slect-hang hd_height36" name="tinhtrang">
                                <option value="">Tình trạng</option>
                                <option value="1" <?= ($row_tt['new_tinhtrang'] == 1) ? "selected" : "" ?>>Mới</option>
                                <option value="2" <?= ($row_tt['new_tinhtrang'] == 2) ? "selected" : "" ?>>Đã sử dụng</option>
                            </select>
                        </div>
                        <!-- giá người bán -->
                        <div class="row-tin-dang d_8-7_tclass1">
                            <p class="font-dam hd_font15-17 d_8-7_tclass2">Giá <span class="color_red">*</span></p>
                            <div class="d_themdiv_gia_7_8">
                                <div class="input-gia-cont d_8-7_tclass3">
                                    <div class="box_input_infor">
                                        <? if ($row_tt['chotang_mphi'] == 1) { ?>
                                            <input class="input_infor_tag error" type="text" name="td_gia_spham" id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" disabled>
                                        <? } else { ?>
                                            <input class="input_infor_tag error" type="text" name="td_gia_spham" value="<?= ($row_tt['new_money'] != 0) ? $row_tt['new_money'] : "" ?>" id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                        <? } ?>
                                    </div>
                                    <div class="money_div d_8-7_tclass5">
                                        <select class="dt-money-up" name="donvi_ban">
                                            <option value="1" <?= ($row_tt['new_unit'] == 1) ? "selected" : "" ?>>VND</option>
                                            <option value="2" <?= ($row_tt['new_unit'] == 2) ? "selected" : "" ?>>USD</option>
                                            <option value="3" <?= ($row_tt['new_unit'] == 3) ? "selected" : "" ?>>EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban d_8-7_tclass4">
                                    <? if ($row_tt['chotang_mphi'] == 1) { ?>
                                        <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban" disabled>
                                    <? } else { ?>
                                        <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban" <?= ($row_tt['new_money'] == 0 && $row_tt['new_money'] != "") ? "checked" : "" ?>>
                                    <? } ?>
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                        </div>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"><?= $row_tt['new_description'] ?></textarea>
                        </div>
                        <div class="box_input_infor">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
                                <option value="">Thêm chi tiết danh mục</option>
                                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                                    <option value="<?= $row_tags['tags_id'] ?>" <?= ($row_tags['tags_id'] == $row_tt['new_ctiet_dmuc']) ? "selected" : "" ?>><?= $row_tags['ten_tags'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" readonly value="<?= $row_tt['dia_chi'] ?>" placeholder="Địa chỉ" data-tt="<?= $tinh_thanh ?>" data-qh="<?= $quan_huyen ?>" data-px="<?= $phuong_xa ?>" data-sn="<?= $so_nha ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Số điện thoại liên hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $row_tt['new_phone'] ?>" placeholder="Nhập số điện thoại liên hệ" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Email liện hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $row_tt['new_email'] ?>" placeholder="Nhập email liên hệ" autocomplete="off">
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
                        <div class="row-tin-dang-btn cont-btn-sb hd-disflex hide-480-mobile">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold">XEM TRƯỚC</button>
                            <button type="button" class="btn-submit td-dang-tin nuochoa hd_cspointer font-bold">ĐĂNG TIN</button>
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
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript">
        $(".nuochoa").click(function() {
            var form_thoitrang_nuochoa = $("#form_thoitrang_nuochoa");
            form_thoitrang_nuochoa.validate({
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
                    tinhtrang: "required",
                    loai_sanpham: "required",

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
                        minlength: "Nhập ít nhất 40 ký tự",
                        maxlength: "Nhập nhiều nhất 70 ký tự",
                    },
                    tinhtrang: "Vui lòng chọn tình trạng",
                    loai_sanpham: "Vui lòng chọn loại sản phẩm",

                    td_gia_spham: "Vui lòng nhập giá sản phẩm",
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
            if (form_thoitrang_nuochoa.valid() === true) {
                var user_id = $(".form-dtin-cont").attr("data");
                var user_type = $(".form-dtin-cont").attr("data1");
                var id_dm = $(".dmuc-spham").attr("data");
                var id_cs = $(".tindang-col-right").attr("data");
                var tieu_de = $("input[name='tieu_de']").val();
                var tinh_trang = $("select[name='tinhtrang']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                if ($(".lien-he-ngban").is(":checked")) {
                    var td_gia_spham = '0';
                };
                var don_vi = $("select[name='donvi_ban']").val();
                var chitiet_dm = $("select[name='chitiet_dm']").val();
                var dia_chi = $("input[name='td_dia_chi']").val();
                var tinh_thanh = $("select[name='thanhpho']").val();
                var quan_huyen = $("select[name='quanhuyen']").val();
                var phuong_xa = $("select[name='phuongxa']").val();
                var so_nha = $("input[name='md_so_nha']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var tang_mphi = 0;
                if ($("#cho-tang-mphi").is(":checked")) {
                    tang_mphi = 1;
                };

                var loai_sanpham = $("select[name='loai_sanpham']").val();

                // lấy ảnh cữ
                var anh_dd = [];
                $(".anh_dadang").each(function() {
                    var anh_dang = $(this).children('img').attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
                    }
                });
                // lay video cu
                var video_cu = $(".avt_xoavideo").attr("data");
                // end

                var fd = new FormData();
                fd.append('user_id', user_id);
                fd.append('user_type', user_type);
                fd.append('id_dm', id_dm);
                fd.append('id_cs', id_cs);
                fd.append('tieu_de', tieu_de);
                fd.append('tinh_trang', tinh_trang);
                fd.append('gia_spham', td_gia_spham);
                fd.append('chitiet_dm', chitiet_dm);
                fd.append('dia_chi', dia_chi);
                fd.append('tinh_thanh', tinh_thanh);
                fd.append('quan_huyen', quan_huyen);
                fd.append('phuong_xa', phuong_xa);
                fd.append('so_nha', so_nha);
                fd.append('don_vi', don_vi);
                fd.append('mo_ta', mo_ta);
                fd.append('tang_mphi', tang_mphi);
                fd.append('loai_spham', loai_sanpham);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());

                // lấy ảnh cũ
                fd.append('anh_dd', anh_dd);
                // end
                fd.append('video_cu', video_cu);
                for (var i = 0; i < arr_anh.length; i++) {
                    if (arr_anh[i] != 'undefined') {
                        fd.append('files[]', arr_anh[i]);
                    }
                }

                var video = $("#cl-upload-video-file")[0].files;
                fd.append('file', video[0]);

                $.ajax({
                    type: 'POST',
                    url: '/ajax_thoitrang/csua_nuochoa.php',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data == "") {
                            tbao_csdtin_tcong();
                        } else {
                            alert(data);
                        }
                    }
                })
            }
        })

        $(".td-xem-truoc").click(function() {
            var form_thoitrang_nuochoa = $("#form_thoitrang_nuochoa");
            form_thoitrang_nuochoa.validate({
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
                    tinhtrang: "required",
                    loai_sanpham: "required",

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
                        minlength: "Nhập ít nhất 40 ký tự",
                        maxlength: "Nhập nhiều nhất 70 ký tự",
                    },
                    tinhtrang: "Vui lòng chọn tình trạng",
                    loai_sanpham: "Vui lòng chọn loại sản phẩm",

                    td_gia_spham: "Vui lòng nhập giá sản phẩm",
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
            if (form_thoitrang_nuochoa.valid() === false) {
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
            if (form_thoitrang_nuochoa.valid() === true) {
                var id_dm = $(".dmuc-spham").attr("data");
                var tieu_de = $("input[name='tieu_de']").val();
                var tinh_trang = $("select[name='tinhtrang']").val();
                var gia_spham = $("input[name='td_gia_spham']").val();
                if ($(".lien-he-ngban").is(":checked")) {
                    var gia_spham = '0';
                };
                var don_vi = $("select[name='donvi_ban']").val();
                var chitiet_dm = $("select[name='chitiet_dm']").val();
                var dia_chi = $("input[name='td_dia_chi']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var tang_mphi = 0;
                if ($("#cho-tang-mphi").is(":checked")) {
                    tang_mphi = 1;
                };

                var loai_sanpham = $("select[name='loai_sanpham']").val();

                var phan_biet = 1;
                var anh_dd = [];
                $(".anh_dadang").each(function() {
                    var anh_dang = $(this).children('img').attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
                    }
                });

                var fd = new FormData();
                fd.append('id_dmuc', id_dm);
                fd.append('tieu_de', tieu_de);
                fd.append('tinh_trang', tinh_trang);
                fd.append('gia_spham', gia_spham);
                fd.append('ctiet_dmuc', chitiet_dm);
                fd.append('dia_chi', dia_chi);
                fd.append('don_vi', don_vi);
                fd.append('mo_ta', mo_ta);
                fd.append('tang_mphi', tang_mphi);
                fd.append('loai_sp', loai_sanpham);

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
</body>

</html>