<?
include 'config.php';
$id_cs = getValue('id', 'int', 'GET', 0);
$id = 79;
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
    $query = new db_query("SELECT `new_title`,`link_title`, `new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                                    `new_create_time`, `new_type`, `new_active`, `new_unit`, `new_name`, `new_phone`, `new_email`, `new_address`,
                                    `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`,`new_buy_sell`,
                                    `new_update_time` FROM `new` WHERE `new_id` = $id_cs ");
    $sql_nd = mysql_fetch_assoc($query->result);
    $query_des = new db_query("SELECT `new_description`,`nhom_sanpham`,`loai_sanpham`,`chat_lieu`,`hinhdang` FROM `new_description` WHERE new_id = $id_cs");
    $sql_des = mysql_fetch_assoc($query_des->result);
    $nhom = $sql_des['nhom_sanpham'];
    $query_dm = new db_query("SELECT `tags_id`, `ten_tags`, `id_danhmuc`, `type_tags`, `id_parent` FROM `key_tags` WHERE id_danhmuc = $id AND id_parent = '$nhom'");
    $avt_dangtin = $sql_nd['new_image'];
    $video_dangtin = trim($sql_nd['new_video']);
    $tinh_thanh = $sql_nd['new_city'];
    $quan_huyen = $sql_nd['quan_huyen'];
    $phuong_xa = $sql_nd['phuong_xa'];
    $so_nha = $sql_nd['new_sonha'];
    $list_ktag_query = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id ");
    $query = new db_query("SELECT *  FROM `nhom_sanpham` WHERE `id_danhmuc` = $id ");
    $list_nhom = $query->result_array();
    $list_ktag = $list_ktag_query->result_array();
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
    <title>Chỉnh sửa tin nội thất phòng ngủ</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Chỉnh sửa tin</p>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont" id="form_noithatphongngu" data2="<?= $id_cs ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" data="<?= $id ?>" class="dmuc-spham" readonly name="san-pham-laptop" placeholder="Nội thất - Ngoại thất >> Nội thất phòng ngủ">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" placeholder="Nhập tiêu đề" value="<?= $sql_nd['new_title'] ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Nhóm sản phẩm <span class="color_red">*</span></p>
                            <select class="slect-hang nhomsanpham hd_height36" name="nhomsanpham" data="<?= $id ?>" onchange="tags_doi(this)">
                                <option value="">Nhóm sản phẩm</option>
                                <?php foreach ($list_nhom as $key => $value) : ?>
                                    <option <?= ($value['id'] == $sql_des['nhom_sanpham']) ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="append_nhom">
                            <?php if ($nhom == 8 || $nhom == 9 || $nhom == 12 || $nhom == 13 || $nhom == 14 || $nhom == 15) :
                                $query = new db_query("SELECT * FROM loai_chung WHERE id_cha=" . $nhom . " AND id_danhmuc= " . $id . " ");
                                $loai = $query->result_array();
                            ?>
                                <div class="row-tin-dang box_input_infor">
                                    <p class="font-dam hd_font15-17">Loại sản phẩm<span class="color_red">*</span></p>
                                    <select class="slect-hang  hd_height36" name="loai_sanpham">
                                        <option value="">Chọn loại sản phẩm</option>
                                        <?php foreach ($loai as $key => $value) : ?>
                                            <option <?= ($value['id'] == $sql_des['loai_sanpham']) ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            <?php endif ?>

                            <?php if ($nhom == 8 || $nhom == 9 || $nhom == 11 || $nhom == 12 || $nhom == 13) :
                                $query = new db_query("SELECT * FROM nhom_sanpham_chatlieu WHERE id_cha=" . $nhom . "  AND id_danhmuc=" . $id . "");
                                $chat = $query->result_array();
                            ?>
                                <div class="row-tin-dang box_input_infor">
                                    <p class="font-dam hd_font15-17">Chất liệu <span class="color_red">*</span></p>
                                    <select class="slect-hang  hd_height36" name="chat_lieu">
                                        <option value="">Chọn chất liệu</option>
                                        <?php foreach ($chat as $key => $value) : ?>
                                            <option <?= ($value['id'] == $sql_des['chat_lieu']) ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            <?php endif ?>

                            <?php if ($nhom == 14) :
                                $query = new db_query("SELECT * FROM nhom_sanpham_hinhdang WHERE id_cha=" . $nhom . "  AND id_danhmuc=" . $id . "");
                                $hinhdang = $query->result_array();
                            ?>
                                <div class="row-tin-dang box_input_infor">
                                    <p class="font-dam hd_font15-17">Hình dáng <span class="color_red">*</span></p>
                                    <select class="slect-hang  hd_height36" name="hinh_dang">
                                        <option value="">Hình dáng</option>
                                        <?php foreach ($hinhdang as $key => $value) : ?>
                                            <option <?= ($value['id'] == $sql_des['hinhdang']) ? "selected" : "" ?> value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            <?php endif ?>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tình trạng <span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="tinhtrang">
                                <option disabled selected value="">Tình trạng</option>
                                <option value="1" <? if ($sql_nd['new_tinhtrang'] == 1) echo 'selected' ?>>Mới </option>
                                <option value="2" <? if ($sql_nd['new_tinhtrang'] == 2) echo 'selected' ?>>Đã sử dụng </option>
                            </select>
                        </div>
                        <!-- giá người bán -->
                        <div class="row-tin-dang d_8-7_tclass1">
                            <p class="font-dam hd_font15-17 d_8-7_tclass2">Giá <span style="color:#ff0000">*</span></p>
                            <div class="d_themdiv_gia_7_8">
                                <div class="input-gia-cont d_8-7_tclass3">
                                    <div class="box_input_infor">
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" value="<?= ($sql_nd['new_money'] != 0) ? number_format($sql_nd['new_money']) : "" ?>" <?= ($sql_nd['new_money'] != 0) ? '' : 'disabled' ?> id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                    </div>
                                    <div class="money_div d_8-7_tclass5">
                                        <select class="dt-money-up" name="donvi_ban">
                                            <option value="1" <? if ($sql_nd['new_unit'] == 1) echo 'selected' ?>>VND</option>
                                            <option value="2" <? if ($sql_nd['new_unit'] == 2) echo 'selected' ?>>USD</option>
                                            <option value="3" <? if ($sql_nd['new_unit'] == 3) echo 'selected' ?>>EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban d_8-7_tclass4">
                                    <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban" <?= ($sql_nd['new_money'] == 0 && $sql_nd['new_money'] != "") ? "checked" : "" ?>>
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                        </div>
                        <!--  hết giá người bán -->

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"><?= $sql_des['new_description'] ?></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor tags_doi">
                            <?php if ($nhom != 11 && $nhom != 14) { ?>
                                <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                                <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
                                    <option disabled selected value="">Thêm chi tiết danh mục</option>
                                    <? while ($ctiet = mysql_fetch_assoc($query_dm->result)) { ?>
                                        <option value="<?= $ctiet['tags_id'] ?>" <? if ($ctiet['tags_id'] == $sql_nd['new_ctiet_dmuc']) {
                                                                                        echo 'selected';
                                                                                    } ?>><?= $ctiet['ten_tags'] ?></option>
                                    <? } ?>
                                </select>
                            <? } ?>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" autocomplete="off" placeholder="Địa chỉ" value="<?= $sql_nd['dia_chi'] ?>" data-tt="<?= $tinh_thanh ?>" data-qh="<?= $quan_huyen ?>" data-px="<?= $phuong_xa ?>" data-sn="<?= $so_nha ?>">
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
                        <div class="row-tin-dang-btn cont-btn-sb hd-disflex hide-480-mobile">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold">XEM TRƯỚC</button>
                            <button type="button" class="btn-submit td-dang-tin noithatphongngu hd_cspointer font-bold">CHỈNH SỬA</button>
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

    <script type="text/javascript" src="../js/style_new/chien_js.js"></script>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script>
        $('#city_search ,#cate_search').select2();
    </script>
</body>

</html>
<script>
    $('.nhomsanpham').change(function() {
        var id_nhom = $("select[name='nhomsanpham']").val();
        if (id_nhom == 14) {
            $('.tags_doi').hide()
        }
    })
    $(document).on('change', '.nhomsanpham', function() {
        var nhom = $(this).val();
        var id_dm = <?= $id ?>;
        $.ajax({
            url: "../render/dangtinphongngu.php",
            type: 'GET',
            data: {
                nhom: nhom,
                id_dm: id_dm
            },

            success: function(data) {
                $('.append_nhom').html(data);
                $('.slect-hang').select2();
            },
            error: function(data) {}
        });
    })
    $(".noithatphongngu").click(function() {
        var form_noithatphongngu = $("#form_noithatphongngu");
        form_noithatphongngu.validate({
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
                nhomsanpham: "required",
                loai_sanpham: "required",
                chat_lieu: "required",
                hinh_dang: "required",
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
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                nhomsanpham: "Vui lòng chọn nhóm sản phẩm",
                loai_sanpham: "Vui lòng chọn loại sản phẩm",
                chat_lieu: "Vui lòng chọn chất liệu",
                hinh_dang: "Vui lòng chọn hình dáng",
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
        if (form_noithatphongngu.valid() === true) {
            var id_cs = $("#form_noithatphongngu").attr("data2");
            var chatlieu = 0;
            var hinhdang = 0;
            var tieu_de = $("input[name='tieu_de']").val();
            var nhom = $("select[name='nhomsanpham']").val();
            var loai = $("[name='loai_sanpham']").val();
            if (nhom == 8 || nhom == 9 || nhom == 11 || nhom == 12 || nhom == 13) chatlieu = $("select[name='chat_lieu']").val();
            if (nhom == 14) hinhdang = $("select[name='hinh_dang']").val();
            var tinh_trang_ban = $("select[name='tinhtrang']").val();

            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var td_gia_spham = '0';
            };

            var don_vi = $("select[name='donvi_ban']").val();

            var mo_ta = $("textarea[name='mota']").val();
            var chitiet_dm = $("select[name='chitiet_dm']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();

            var tinh_thanh = $("select[name='thanhpho']").val();
            var quan_huyen = $("select[name='quanhuyen']").val();
            var phuong_xa = $("select[name='phuongxa']").val();
            var so_nha = $("input[name='md_so_nha']").val();

            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var fd = new FormData();

            fd.append('id_cs', id_cs);
            fd.append('tieu_de', tieu_de);
            fd.append('nhom', nhom);
            fd.append('loai', loai);
            fd.append('chatlieu', chatlieu);
            fd.append('hinhdang', hinhdang);
            fd.append('tinh_trang_ban', tinh_trang_ban);
            fd.append('chitiet_dm', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('mo_ta', mo_ta);
            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            fd.append('gia_tpham', td_gia_spham);
            fd.append('don_vi', don_vi);
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
                type: 'POST',
                url: '/ajax_noithat_ngoaithat/edit_phongngu.php',
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
    });

    $(".td-xem-truoc").click(function() {
        var form_noithatphongngu = $("#form_noithatphongngu");
        form_noithatphongngu.validate({
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
                nhomsanpham: "required",
                loai_sanpham: "required",
                chat_lieu: "required",
                hinh_dang: "required",
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
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                nhomsanpham: "Vui lòng chọn nhóm sản phẩm",
                loai_sanpham: "Vui lòng chọn loại sản phẩm",
                chat_lieu: "Vui lòng chọn chất liệu",
                hinh_dang: "Vui lòng chọn hình dáng",
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
        if (form_noithatphongngu.valid() === false) {
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
        if (form_noithatphongngu.valid() === true) {
            var id_dm = $(".dmuc-spham").attr("data");
            var loai = 0;
            var chatlieu = 0;
            var hinhdang = 0;
            var tieu_de = $("input[name='tieu_de']").val();
            var nhom = $("select[name='nhomsanpham']").val();
            if (nhom == 8 || nhom == 9 || nhom == 12 || nhom == 13 || nhom == 14 || nhom == 15) loai = $("select[name='loai_sanpham']").val();
            if (nhom == 8 || nhom == 9 || nhom == 11 || nhom == 12 || nhom == 13) chatlieu = $("select[name='chat_lieu']").val();
            if (nhom == 14) hinhdang = $("select[name='hinh_dang']").val();
            var tinh_trang = $("select[name='tinhtrang']").val();

            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var td_gia_spham = '0';
            };

            var don_vi = $("select[name='donvi_ban']").val();
            var mo_ta = $("textarea[name='mota']").val();
            var chitiet_dm = $("select[name='chitiet_dm']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
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
            fd.append('loai_sp', nhom);
            fd.append('loai_sp2', loai);
            fd.append('loai_sp3', chatlieu);
            fd.append('loai_sp4', hinhdang);
            fd.append('tinh_trang', tinh_trang);
            fd.append('ctiet_dmuc', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('mo_ta', mo_ta);

            fd.append('gia_spham', td_gia_spham);
            fd.append('donvi_ban', don_vi);

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