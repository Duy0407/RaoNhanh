<?
include("config.php");
$id_sksd = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];
    $query = new db_query("SELECT `new_title`,`link_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`, `new_unit`, `new_name`,
                        `new_phone`, `new_email`, `new_address`, `chotang_mphi`,
                        `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`
                        FROM `new` WHERE new_id = $id_sksd");
    $sql_nd = mysql_fetch_assoc($query->result);
    $query_des = new db_query("SELECT `new_description`,`loai_sanpham`,`hang` FROM `new_description` WHERE new_id = $id_sksd");
    $sql_des = mysql_fetch_assoc($query_des->result);
    $avt_dangtin = $sql_nd['new_image'];
    $video_dangtin = $sql_nd['new_video'];
    $tinh_thanh = $sql_nd['new_city'];
    $quan_huyen = $sql_nd['quan_huyen'];
    $phuong_xa = $sql_nd['phuong_xa'];
    $so_nha = $sql_nd['new_sonha'];
    $id_cat_parent = 209;
    $query_lsp = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$id_cat_parent'");
    $result = $query_lsp->result_array();

    $query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = '$id_cat_parent'");
    $sql_hang = $query_hang->result_array();
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
    <title>Chỉnh sửa tin sức khỏe sắc đẹp Dụng cụ - Phụ kiện làm đẹp</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Chỉnh sửa tin</p>
                <div class="w-125">
                    <span>Cho tặng miễn phí</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi" name="free_gift" <?= ($sql_nd['chotang_mphi'] == 1) ? "checked" : "" ?>>
                        <span class="slider1 round1"></span>
                    </label>
                </div>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont" id="form_pk_lamdep" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_sksd ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" data="<?= $sql_nd['new_cate_id'] ?>" class="dmuc-spham" readonly name="san-pham-laptop" placeholder="Sức khỏe - Sắc đẹp >> Dụng cụ - Phụ kiện làm đẹp">
                        </div>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" autocomplete="off" name="tieu_de" placeholder="Nhập tiêu đề" value="<?= $sql_nd['new_title'] ?>">
                        </div>


                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Loại phụ kiện <span class="color_red">*</span></p>
                            <select id="loai_pk" class="slect-hang  hd_height36" name="loai_phukien">
                                <option disabled selected value="">Loại phụ kiện</option>
                                <? foreach ($result as $rows) : ?>
                                    <option <?= ($rows['id'] == $sql_des['loai_sanpham']) ? "selected" : "" ?> value="<?= $rows['id'] ?>"><?= $rows['ten_loai'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="d_flex j_between mb20">
                            <div class="row-tin-dang rowflex2">
                                <p class="font-dam hd_font15-17">Hãng</p>
                                <select class="slect-hang  hd_height36" name="hang">
                                    <option disabled selected value="">Hãng</option>
                                    <? foreach ($sql_hang as $tr) : ?>
                                        <option <?= ($tr['id'] == $sql_des['hang']) ? "selected" : "" ?> value="<?= $tr['id'] ?>"><?= $tr['ten_hang'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                            <div class="row-tin-dang rowflex2 box_input_infor">
                                <p class="font-dam hd_font15-17">Tình trạng <span class="color_red">*</span></p>
                                <select class="slect-hang  hd_height36" name="tinhtrang">
                                    <option disabled selected value="">Tình trạng</option>
                                    <option value="1" <? if ($sql_nd['new_tinhtrang'] == 1) echo 'selected' ?>>mới 100%</option>
                                    <option value="2" <? if ($sql_nd['new_tinhtrang'] == 2) echo 'selected' ?>>Đã qua sử dụng</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Giá <span style="color:#ff0000">*</span></p>
                            <div class="input-gia-cont">
                                <div class="box_input_infor">
                                    <? if ($sql_nd['chotang_mphi'] == 1) { ?>
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" disabled id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                    <? } else { ?>
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" value="<?= ($sql_nd['new_money'] != 0) ? number_format($sql_nd['new_money']) : "" ?>" <?= ($sql_nd['new_money'] != 0) ? '' : 'disabled' ?> id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                    <? } ?>
                                </div>
                                <div class="div_select_dv arrow_none">
                                    <select class="dt-money-up" name="dvi_tien">
                                        <option value="1" <? if ($sql_nd['new_unit'] == 1) echo 'selected' ?>>VNĐ</option>
                                        <option value="2" <? if ($sql_nd['new_unit'] == 2) echo 'selected' ?>>USD</option>
                                        <option value="3" <? if ($sql_nd['new_unit'] == 3) echo 'selected' ?>>EURO</option>
                                    </select>
                                </div>
                            </div>
                            <span class="sp-lienhe-nban">
                                <? if ($sql_nd['chotang_mphi'] == 1) { ?>
                                    <input type="checkbox" name="td_lienhe_ngban" class="lien-he-ngban" disabled>
                                <? } else { ?>
                                    <input type="checkbox" name="td_lienhe_ngban" class="lien-he-ngban" <?= ($sql_nd['new_money'] == 0 && $sql_nd['new_money'] != "") ? "checked" : "" ?>>
                                <? } ?>
                                <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                            </span>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"><?= $sql_des['new_description'] ?></textarea>
                        </div>
                        <div class="box_input_infor danhmuc_tag">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select id="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
                                <option disabled selected value="">Thêm chi tiết danh mục</option>
                                <?
                                $query_dm = new db_query("SELECT `tags_id`, `ten_tags`, `id_parent` FROM `key_tags` WHERE id_parent = '" . $sql_des['loai_sanpham'] . "'");
                                ?>
                                <? while ($ctiet = mysql_fetch_assoc($query_dm->result)) { ?>
                                    <option value="<?= $ctiet['tags_id'] ?>" <? if ($ctiet['tags_id'] == $sql_nd['new_ctiet_dmuc']) {
                                                                                    echo 'selected';
                                                                                } ?>><?= $ctiet['ten_tags'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input readonly type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" autocomplete="off" placeholder="Địa chỉ" value="<?= $sql_nd['dia_chi'] ?>" data-tt="<?= $tinh_thanh ?>" data-qh="<?= $quan_huyen ?>" data-px="<?= $phuong_xa ?>" data-sn="<?= $so_nha ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Số điện thoại liên hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $sql_nd['new_phone'] ?>" placeholder="Nhập số điện thoại liên hệ" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Email liện hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $sql_nd['new_email'] ?>" placeholder="Nhập email liên hệ" autocomplete="off">
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
                        <div class="row-tin-dang cont-btn-sb hd-disflex hide-480-mobile">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold" onclick="xem_trc_tin()">XEM TRƯỚC</button>
                            <button type="button" class="btn-submit td-dang-tin pk_lamdep hd_cspointer font-bold">CHỈNH SỬA</button>
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
<script>
    $('#loai_pk').on('change', function() {
        var id_pk = $("select[name='loai_phukien']").val();
        if (id_pk == 199) {
            $('.danhmuc_tag').hide();
        } else {
            $('.danhmuc_tag').show();
        }
        $.ajax({
            type: 'POST',
            url: '/render/render_phukiensacdep.php',
            data: {
                id_pk: id_pk,
            },
            success: function(data) {
                $("#chitiet_dm").html(data);

            }
        })
    });


    $(".pk_lamdep").click(function() {
        var form_pk_lamdep = $("#form_pk_lamdep");
        form_pk_lamdep.validate({
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
                loai_phukien: "required",
                tinhtrang: "required",

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
                loai_phukien: "Vui lòng chọn loại phụ kiện",
                tinhtrang: "Vui lòng chọn tình trạng",

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
        if (form_pk_lamdep.valid() === true) {
            var user_id = $("#form_pk_lamdep").attr("data");
            var user_type = $("#form_pk_lamdep").attr("data1");
            var id_sksd = $("#form_pk_lamdep").attr("data2");
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            } else {
                var free_gift = 0;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var loai_phukien = $("select[name='loai_phukien']").val();
            var tinhtrang = $("select[name='tinhtrang']").val();
            var hang = $("select[name='hang']").val();
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
            fd.append('id_sksd', id_sksd);
            fd.append('free_gift', free_gift);
            fd.append('tieu_de', tieu_de);
            fd.append('loai_phukien', loai_phukien);
            fd.append('tinhtrang', tinhtrang);
            fd.append('hang', hang);
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
            // lay video cu
            var video_cu = $(".avt_xoavideo").attr("data");
            fd.append('video_cu', video_cu);
            // end
            var video = $("#cl-upload-video-file")[0].files;
            fd.append('file', video[0]);
            $.ajax({
                url: '/ajax_sksd/chinhsua_sksd_pklamdep.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == "") {
                        tbao_csdtin_tcong();
                    } else {
                        alert(data);
                    }
                    // console.log(data);
                }
            })
        }
    })

    //xem trước
    function xem_trc_tin() {
        var form_pk_lamdep = $(".form-dtin-cont");
        form_pk_lamdep.validate({
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
                loai_phukien: "required",
                tinhtrang: "required",

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
            },
            messages: {
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Nhập ít nhất 40 ký tự",
                    maxlength: "Nhập nhiều nhất 70 ký tự",
                },
                loai_phukien: "Vui lòng chọn loại phụ kiện",
                tinhtrang: "Vui lòng chọn tình trạng",

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
                }
            },
        });
        if (form_pk_lamdep.valid() === false) {
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
        if (form_pk_lamdep.valid() === true) {
            var free_gift = 0;
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var id_dm = $(".dmuc-spham").attr('data');
            var loai_phukien = $("select[name='loai_phukien']").val();
            var tinhtrang = $("select[name='tinhtrang']").val();
            var hang = $("select[name='hang']").val();
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
            var phan_biet = 2;
            var donvi_ban = $(".donvi_ban").val();
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var fd = new FormData();
            fd.append("id_dmuc", id_dm);
            fd.append('free_gift', free_gift);
            fd.append('tieu_de', tieu_de);
            fd.append('loai_sp', loai_phukien);
            fd.append('loai_sp2', tinhtrang);
            fd.append('loai_sp3', hang);
            fd.append('gia_spham', td_gia_spham);
            fd.append('mo_ta', mo_ta);
            fd.append('ctiet_dmuc', ctiet_dmuc);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('dia_chi', dia_chi);
            fd.append('avt_anh', arr_src.concat(anh_dd));
            fd.append('phan_biet', phan_biet);
            fd.append('donvi_ban', donvi_ban);

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