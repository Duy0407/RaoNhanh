<?
include("config.php");
$id_tc = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_tc != 0) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];
    $query = new db_query("SELECT `new_title`, `new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                        `new_unit`, `new_phone`, `new_email`, `chotang_mphi`, `quan_huyen`,
                        `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc` FROM `new` WHERE `new_id` = $id_tc ");
    $sql_nd = mysql_fetch_assoc($query->result);

    $query_des = new db_query("SELECT `new_description`,`nhom_sanpham`, `giong_thu_cung`,`han_su_dung`,
                    `khoiluong`,`the_tich` FROM `new_description` WHERE new_id = $id_tc");
    $sql_des = mysql_fetch_assoc($query_des->result);
    $id_thucung = $sql_des['giong_thu_cung'];

    $query_dm_tc = new db_query("SELECT `id_danhmuc` FROM `giong_thu_cung` WHERE id = $id_thucung");
    $id_dm = mysql_fetch_assoc($query_dm_tc->result);
    $query_dm = new db_query("SELECT `tags_id`, `ten_tags`, `id_danhmuc`, `type_tags`, `id_parent` FROM `key_tags` WHERE id_danhmuc =" . $id_dm['id_danhmuc']);
    $avt_dangtin = $sql_nd['new_image'];
    $video_dangtin = trim($sql_nd['new_video']);
    $tinh_thanh = $sql_nd['new_city'];
    $quan_huyen = $sql_nd['quan_huyen'];
    $phuong_xa = $sql_nd['phuong_xa'];
    $so_nha = $sql_nd['new_sonha'];

    $query_nsp = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE id_danhmuc = 114");
    $result_nsp = $query_nsp->result_array();

    $sql = new db_query("SELECT `id`, `giong_thucung` FROM `giong_thu_cung` WHERE id_cha = 0");
    $result = $sql->result_array();
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
    <title>Ch???nh s???a tin th?? c??ng- ????? ??n, ph??? ki???n, d???ch v???</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Ch???nh s???a tin</p>
                <div class="w-125">
                    <span>Cho t???ng mi???n ph??</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi" name="free_gift" <?= ($sql_nd['chotang_mphi'] == 1) ? "checked" : "" ?>>
                        <span class="slider1 round1"></span>
                    </label>
                </div>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <?php include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right" data="<?= date('Y-m-d', time()) ?>">
                    <form class="form-dtin-cont" id="form_pk_thucung" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_tc ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh m???c s???n ph???m <span class="color_red">*</span></p>
                            <input type="text" data="<?= $sql_nd['new_cate_id'] ?>" class="dmuc-spham" readonly name="san-pham-laptop" placeholder="Th?? c??ng >> ????? ??n, ph??? ki???n, d???ch v???">
                        </div>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Ti??u ????? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" autocomplete="off" placeholder="Nh???p ti??u ?????" value="<?= $sql_nd['new_title'] ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Nh??m s???n ph???m <span class="color_red">*</span></p>
                            <select id="nhom_sp" class="slect-hang nhomsanpham hd_height36" name="nhomsanpham">
                                <option disabled selected value="">Nh??m s???n ph???m</option>
                                <?
                                foreach ($result_nsp as $nsp) : ?>
                                    <option <?= ($nsp['id'] == $sql_des['nhom_sanpham']) ? "selected" : "" ?> value="<?= $nsp['id'] ?>"><?= $nsp['name'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Gi???ng th?? c??ng <span class="color_red">*</span></p>
                            <select id="giong_thucung" class="slect-hang  hd_height36" name="giong_thucung">
                                <option disabled selected value="">Gi???ng th?? c??ng</option>
                                <? foreach ($result as $rows) : ?>
                                    <option <?= ($rows['id'] == $sql_des['giong_thu_cung']) ? "selected" : "" ?> value="<?= $rows['id'] ?>"><?= $rows['giong_thucung'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="append_nhom">

                        </div>

                        <!-- gi?? ng?????i b??n -->
                        <div class="row-tin-dang ">
                            <p class="font-dam hd_font15-17">Gi?? <span style="color:#ff0000">*</span></p>
                            <div class="input-gia-cont">
                                <div class="box_input_infor">
                                    <? if ($sql_nd['chotang_mphi'] == 1) { ?>
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" disabled id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                    <? } else { ?>
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" value="<?= ($sql_nd['new_money'] != 0) ? number_format($sql_nd['new_money']) : "" ?>" <?= ($sql_nd['new_money'] != 0) ? '' : 'disabled' ?> id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                    <? } ?>
                                </div>
                                <div class="div_select_dv arrow_none">
                                    <select class="dt-money-up" name="donvi_ban">
                                        <option value="1" <? if ($sql_nd['new_unit'] == 1) echo 'selected' ?>>VND</option>
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
                                <label class="color-blk">Li??n h??? ng?????i b??n ????? h???i gi??</label>
                            </span>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">M?? t??? <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nh???p m?? t???" name="mota"><?= $sql_des['new_description'] ?></textarea>
                        </div>
                        <div class="box_input_infor">
                            <p class="font-dam hd_font15-17">Chi ti???t danh m???c <span class="color_red">*</span></p>
                            <select id="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
                                <option value="">Th??m chi ti???t danh m???c</option>
                                <? while ($ctiet = mysql_fetch_assoc($query_dm->result)) { ?>
                                    <option value="<?= $ctiet['tags_id'] ?>" <?= ($ctiet['tags_id'] == $sql_nd['new_ctiet_dmuc']) ? "selected" : "" ?>><?= $ctiet['ten_tags'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">?????a ch??? <span class="color_red">*</span></p>
                            <input readonly type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" autocomplete="off" placeholder="?????a ch???" value="<?= $sql_nd['dia_chi'] ?>" data-tt="<?= $tinh_thanh ?>" data-qh="<?= $quan_huyen ?>" data-px="<?= $phuong_xa ?>" data-sn="<?= $so_nha ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">S??? ??i???n tho???i li??n h??? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $sql_nd['new_phone'] ?>" placeholder="Nh???p s??? ??i???n tho???i li??n h???" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Email li???n h??? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $sql_nd['new_email'] ?>" placeholder="Nh???p email li??n h???" autocomplete="off">
                        </div>
                        <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                            <p class="font-dam hd_font15-17">M?? x??c nh???n <span style="color:#ff0000">*</span></p>
                            <div class="khung_input_capcha">
                                <div class="div_bao_ma_xacnhan">
                                    <input id="captcha_input" type="text" name="captcha_confirm" class="input_infor_tag error" placeholder="M?? x??c nh???n" autocomplete="off" oninput="<?= $oninput ?>" class="ma_capcha">
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
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold" onclick="xem_trc_tin()">XEM TR?????C</button>
                            <button type="button" class="btn-submit td-dang-tin pk_thucung hd_cspointer font-bold">CH???NH S???A</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <?php include '../modals/md_danh_muc_tin_dang.php' ?>
        <?php include '../modals/md_dia_chi.php' ?>
        <? include '../modals/tbao_tcong.php' ?>
    </section>
    <?php
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script>
    $(document).on('change', '.nhomsanpham', function() {
        var nhom = $(this).val();
        var id_type = $("#form_pk_thucung").attr("data1");
        if (nhom == 58) {
            $.ajax({
                url: "../render/dangtinthucung.php",
                type: 'POST',
                data: {
                    nhom: nhom,
                    id_type: id_type,
                },
                success: function(data) {
                    $('.append_nhom').html(data);
                    $('.slect-hang').select2();
                },
                error: function(data) {}
            });
        } else {
            $('.append_nhom').html('');
        }
    })

    $('#nhom_sp,#giong_thucung').on('change', function() {
        var id_sp = $("select[name='nhomsanpham']").val();
        var giong = $("select[name='giong_thucung']").val();
        // alert(giong);
        $.ajax({
            type: 'POST',
            url: '/ajax/render_pkthucung_tag.php',
            data: {
                id_sp: id_sp,
                giong: giong,
            },
            success: function(data) {
                $("#chitiet_dm").html(data);
                // rf_select2();
            }
        })
    });

    $(".pk_thucung").click(function() {
        var form_pk_thucung = $("#form_pk_thucung");
        form_pk_thucung.validate({
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
                giong_thucung: "required",
                nhomsanpham: "required",
                han_sd: "required",
                trong_luong: "required",
                thetich: "required",
                td_gia_spham: "required",
                chitiet_dm: "required",
                td_dia_chi: "required",
                mota: {
                    required: true,
                    minlength: 50,
                    maxlength: 1500,
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
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                giong_thucung: "Vui l??ng ch???n gi???ng th?? c??ng",
                nhomsanpham: "Vui l??ng ch???n nh??m s???n ph???m",
                han_sd: "Vui l??ng nh???p h???n s??? d???ng",
                trong_luong: "Vui l??ng nh???p tr???ng l?????ng",
                thetich: "Vui l??ng nh???p th??? t??ch",
                td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                td_dia_chi: "Vui l??ng nh???p ?????a ch???",
                mota: {
                    required: "Vui l??ng nh???p m?? t???",
                    minlength: "M?? t??? ??t nh???t 10 k?? t???",
                    maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                },
                captcha_confirm: {
                    required: "Vui l??ng nh???p m?? x??c nh???n",
                    equalTo: 'M?? x??c nh???n sai! Vui l??ng nh???p l???i',
                },
                sdt_lienhe: {
                    required: "Nh???p s??? ??i???n tho???i li??n h???",
                },
                email_lienhe: {
                    required: "Nh???p email li??n h???",
                },
            },
        });
        if (form_pk_thucung.valid() === true) {
            var user_id = $("#form_pk_thucung").attr("data");
            var user_type = $("#form_pk_thucung").attr("data1");
            var id_tc = $("#form_pk_thucung").attr("data2");
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            } else {
                var free_gift = 0;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var nhomsanpham = $("select[name='nhomsanpham']").val();
            var giong_thucung = $("select[name='giong_thucung']").val();
            var han_sd = $("input[name='han_sd']").val();
            var trong_luong = $("input[name='trong_luong']").val();
            var thetich = $("input[name='thetich']").val();

            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                td_gia_spham = 0;
            }

            var donvi_ban = $("select[name='donvi_ban']").val();
            var donvi_mua = $("select[name='donvi_mua']").val();
            var mo_ta = $("textarea[name='mota']").val();
            var ctiet_dmuc = $("select[name='chitiet_dm']").val();
            var tinh_thanh = $("select[name='thanhpho']").val();
            var quan_huyen = $("select[name='quanhuyen']").val();
            var phuong_xa = $("select[name='phuongxa']").val();
            var so_nha = $("input[name='md_so_nha']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
            // alert(id_tc);
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
            fd.append('id_tc', id_tc);
            fd.append('free_gift', free_gift);
            fd.append('tieu_de', tieu_de);
            fd.append('nhomsanpham', nhomsanpham);
            fd.append('giong_thucung', giong_thucung);
            fd.append('han_sd', han_sd);
            fd.append('trong_luong', trong_luong);
            fd.append('thetich', thetich);
            fd.append('td_gia_spham', td_gia_spham);
            fd.append('donvi_ban', donvi_ban);
            fd.append('donvi_mua', donvi_mua);
            fd.append('mo_ta', mo_ta);
            fd.append('ctiet_dmuc', ctiet_dmuc);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('dia_chi', dia_chi);
            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            // l???y ???nh c??
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
                url: '/ajax_thucung/edit_thucanphukien.php',
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

    //xem tr?????c
    function xem_trc_tin() {
        var form_pk_thucung = $(".form-dtin-cont");
        form_pk_thucung.validate({
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
                giong_thucung: "required",
                nhomsanpham: "required",
                han_sd: "required",
                trong_luong: "required",
                thetich: "required",
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
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                giong_thucung: "Vui l??ng ch???n gi???ng th?? c??ng",
                nhomsanpham: "Vui l??ng ch???n nh??m s???n ph???m",
                han_sd: "Vui l??ng nh???p h???n s??? d???ng",
                trong_luong: "Vui l??ng nh???p tr???ng l?????ng",
                thetich: "Vui l??ng nh???p th??? t??ch",
                td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                td_dia_chi: "Vui l??ng nh???p ?????a ch???",
                mota: {
                    required: "Vui l??ng nh???p m?? t???",
                    minlength: "M?? t??? ??t nh???t 10 k?? t???",
                    maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                },
                captcha_confirm: {
                    required: "Vui l??ng nh???p m?? x??c nh???n",
                    equalTo: 'M?? x??c nh???n sai! Vui l??ng nh???p l???i',
                },
                sdt_lienhe: {
                    required: "Nh???p s??? ??i???n tho???i li??n h???",
                },
                email_lienhe: {
                    required: "Nh???p email li??n h???",
                },
            },
        });
        if (form_pk_thucung.valid() === false) {
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
        if (form_pk_thucung.valid() === true) {
            var free_gift = 0;
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var id_dm = $(".dmuc-spham").attr('data');
            var nhomsanpham = $("select[name='nhomsanpham']").val();
            var giong_thucung = $("select[name='giong_thucung']").val();
            var han_sd = $("input[name='han_sd']").val();
            var trong_luong = $("input[name='trong_luong']").val();
            var thetich = $("input[name='thetich']").val();
            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                var td_gia_spham = 0;
            };
            var dvi_tien = $("select[name='dvi_tien']").val();
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
            fd.append('loai_sp', nhomsanpham);
            fd.append('loai_sp2', giong_thucung);
            fd.append('loai_sp3', han_sd);
            fd.append('loai_sp4', trong_luong);
            fd.append('loai_sp5', thetich);
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