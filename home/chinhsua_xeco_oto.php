<?
include("config.php");
$id_xc = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_xc != 0) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];
    $query = new db_query("SELECT `new_title`, `link_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
            `new_unit`, `new_phone`, `new_email`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`,
            `new_video`, `new_ctiet_dmuc`,`new_tinhtrang`,`new_baohanh` FROM `new` WHERE `new_id` = $id_xc ");
    $sql_nd = mysql_fetch_assoc($query->result);

    $query_des = new db_query("SELECT `new_description`,`hang`,`dong_xe`,`so_km_da_di`,`nam_san_xuat`,
                    `hop_so`,`nhien_lieu`,`xuat_xu`,`so_cho`,`mau_sac`,`kieu_dang` FROM `new_description` WHERE new_id = $id_xc");
    $sql_des = mysql_fetch_assoc($query_des->result);
    $hang = $sql_des['hang'];
    $tinhtrang = $sql_nd['new_tinhtrang'];
    $query_dm = new db_query("SELECT `tags_id`, `ten_tags`, `id_danhmuc`, `type_tags`, `id_parent` FROM `key_tags` WHERE  id_danhmuc = 10 ");
    $avt_dangtin = $sql_nd['new_image'];
    $video_dangtin = trim($sql_nd['new_video']);

    $tinh_thanh = $sql_nd['new_city'];
    $quan_huyen = $sql_nd['quan_huyen'];
    $phuong_xa = $sql_nd['phuong_xa'];
    $so_nha = $sql_nd['new_sonha'];
    $query = new db_query("SELECT `usc_id`, `usc_type` FROM `user` WHERE usc_id = '$acc_id'");
    $result = mysql_fetch_assoc($query->result);

    $query_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE id_parent = 10");
    $result_hang = $query_hang->result_array();

    $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $hang ");
    $result_dong = $list_dong->result_array();

    $query_nsx = new db_query("SELECT `id`, `nam_san_xuat`, `id_cha`, `id_danhmuc` FROM `nam_san_xuat` WHERE id_danhmuc = 2");
    $result_nsx  = $query_nsx->result_array();

    $query_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE id_parents = 8");
    $sql_xx = $query_xx->result_array();

    $sql_sc = new db_query("SELECT `id`, `so_luong` FROM `number_content` WHERE id_parents = 10");
    $result_sc = $sql_sc->result_array();

    $query_mx = new db_query("SELECT `id_color`, `mau_sac` FROM `mau_sac` WHERE id_dm = 2");
    $sql_mx = $query_mx->result_array();

    $query_kd = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_hinhdang` WHERE id_cha = 10");
    $result_kd = $query_kd->result_array();

    $query_bh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`FROM `bao_hanh` WHERE id_parents = 10");
    $result_bh = $query_bh->result_array();
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
    <title>Ch???nh s???a tin ?? t??</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">

</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Ch???nh s???a tin</p>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <?php include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont" id="form_xeco_car" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_xc ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh m???c s???n ph???m <span class="color_red">*</span></p>
                            <input type="text" data="<?= $sql_nd['new_cate_id'] ?>" class="dmuc-spham" readonly name="san-pham-laptop" placeholder="Xe c???  >>  ?? t??">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Ti??u ????? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" autocomplete="off" name="tieu_de" placeholder="Nh???p ti??u ?????" value="<?= $sql_nd['new_title'] ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">H??ng xe<span class="color_red">*</span></p>
                            <select id="hangxe" class="slect-hang  hd_height36" name="hang_xe" onchange="hang_doi(this)" data="10">
                                <option disabled selected value="">H??ng xe</option>
                                <? foreach ($result_hang as $rows) : ?>
                                    <option <?= ($rows['id'] == $sql_des['hang']) ? "selected" : "" ?> value="<?= $rows['id'] ?>"><?= $rows['ten_hang'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="row-tin-dang dong_doi box_input_infor">
                            <p class="font-dam hd_font15-17">D??ng xe<span class="color_red">*</span></p>
                            <select id="dongxe" class="slect-hang  hd_height36" name="dong_xe">
                                <option disabled selected value="">D??ng xe</option>
                                <? foreach ($result_dong as $dong) { ?>
                                    <option <?= ($dong['id'] == $sql_des['dong_xe']) ? "selected" : "" ?> value="<?= $dong['id'] ?>"><?= $dong['ten_loai'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">N??m s???n xu???t<span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="nam_san_xuat">
                                <option disabled selected value="">N??m s???n xu???t</option>
                                <? foreach ($result_nsx as $rows) : ?>
                                    <option <?= ($rows['id'] == $sql_des['nam_san_xuat']) ? "selected" : "" ?> value="<?= $rows['id'] ?>"><?= $rows['nam_san_xuat'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <!-- h???p s??? ng?????i b??n -->
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">H???p s??? <span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="hop_so">
                                <option disabled value="">H???p s???</option>
                                <option value="1" <? if ($sql_des['hop_so'] == 1) echo 'selected' ?>>T??? ?????ng</option>
                                <option value="2" <? if ($sql_des['hop_so'] == 2) echo 'selected' ?>>S??? s??n</option>
                                <option value="3" <? if ($sql_des['hop_so'] == 3) echo 'selected' ?>>B??n t??? ?????ng</option>
                            </select>
                        </div>
                        <!-- h???t h???p s??? ng?????i b??n -->
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Nhi??n li???u<span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="nhien_lieu">
                                <option disabled value="">Nhi??n li???u</option>
                                <option value="1" <? if ($sql_des['nhien_lieu'] == 1) echo 'selected' ?>>x??ng</option>
                                <option value="2" <? if ($sql_des['nhien_lieu'] == 2) echo 'selected' ?>>d???u</option>
                                <option value="3" <? if ($sql_des['nhien_lieu'] == 3) echo 'selected' ?>>?????ng c?? Hybird</option>
                                <option value="4" <? if ($sql_des['nhien_lieu'] == 4) echo 'selected' ?>>??i???n</option>
                            </select>
                        </div>
                        <!-- xuat xu, socho , mausac,kieu dang, bao hanh ng?????i b??n -->
                        <div class="nhom-tin-dang ">
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Xu???t x???</p>
                                <select class="slect-hang  hd_height36" name="xuat_xu">
                                    <option disabled selected value="">Xu???t x???</option>
                                    <? foreach ($sql_xx as $xx) : ?>
                                        <option <?= ($xx['id_xuatxu'] == $sql_des['xuat_xu']) ? "selected" : "" ?> value="<?= $xx['id_xuatxu'] ?>"><?= $xx['noi_xuatxu'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">S??? ch???</p>
                                <select class="slect-hang  hd_height36" name="so_cho">
                                    <option disabled selected value="">S??? ch???</option>
                                    <? foreach ($result_sc as $sc) : ?>
                                        <option <?= ($sc['id'] == $sql_des['so_cho']) ? "selected" : "" ?> value="<?= $sc['id'] ?>"><?= $sc['so_luong'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">M??u s???c</p>
                            <select class="slect-hang  hd_height36" name="mau_sac">
                                <option disabled selected value="">M??u s???c</option>
                                <? foreach ($sql_mx as $mx) : ?>
                                    <option <?= ($mx['id_color'] == $sql_des['mau_sac']) ? "selected" : "" ?> value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Ki???u d??ng</p>
                            <select class="slect-hang  hd_height36" name="kieu_dang">
                                <option disabled selected value="">Ki???u d??ng</option>
                                <? foreach ($result_kd as $kd) : ?>
                                    <option <?= ($kd['id'] == $sql_des['kieu_dang']) ? "selected" : "" ?> value="<?= $kd['id'] ?>"><?= $kd['name'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">B???o h??nh</p>
                            <select class="slect-hang  hd_height36" name="bao_hanh">
                                <option disabled selected value="">B???o h??nh</option>
                                <? foreach ($result_bh as $tr) : ?>
                                    <option <?= ($tr['id_baohanh'] == $sql_nd['new_baohanh']) ? "selected" : "" ?> value="<?= $tr['id_baohanh'] ?>"><?= $tr['tgian_baohanh'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <!-- h???t socho, mausac ng?????i mua -->
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">T??nh tr???ng <span class="color_red">*</span></p>
                            <select id="tinhtrangxe" class="slect-hang  hd_height36" name="tinhtrang">
                                <option disabled selected value="">T??nh tr???ng</option>
                                <option value="1" <? if ($sql_nd['new_tinhtrang'] == 1) echo 'selected' ?>>M???i</option>
                                <option value="2" <? if ($sql_nd['new_tinhtrang'] == 2) echo 'selected' ?>>C?? (Ch??a s???a ch???a)</option>
                                <option value="3" <? if ($sql_nd['new_tinhtrang'] == 3) echo 'selected' ?>>C?? (???? s???a ch???a)</option>
                            </select>
                        </div>
                        <? if ($tinhtrang == 2 || $tinhtrang == 3) { ?>
                            <div class="sokm_show">
                                <div class="row-tin-dang">
                                    <p class="font-dam hd_font15-17">S??? Km ???? ??i</p>
                                    <input class="so_km_di" type="text" name="km_di" placeholder="S??? km ???? ??i" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'" value="<?= $sql_des['so_km_da_di'] ?>">
                                </div>
                            </div>
                        <? } ?>
                        <!-- gi?? ng?????i b??n -->
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Gi?? <span class="color_red">*</span></p>
                            <div class="input-gia-cont">
                                <div class="box_input_infor">
                                    <input class="input_infor_tag error" type="text" name="td_gia_spham" value="<?= ($sql_nd['new_money'] != 0) ? number_format($sql_nd['new_money']) : "" ?>" <?= ($sql_nd['new_money'] == 0) ? 'disabled' : "" ?> id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                </div>
                                <div class="money_div arrow_none">
                                    <select class="dt-money-up" name="dvi_tien">
                                        <option value="1" <? if ($sql_nd['new_unit'] == 1) echo 'selected' ?>>VND</option>
                                        <option value="2" <? if ($sql_nd['new_unit'] == 2) echo 'selected' ?>>USD</option>
                                        <option value="3" <? if ($sql_nd['new_unit'] == 3) echo 'selected' ?>>EURO</option>
                                    </select>
                                </div>
                            </div>
                            <span class="sp-lienhe-nban">
                                <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban" <?= ($sql_nd['new_money'] == 0 && $sql_nd['new_money'] != "") ? "checked" : "" ?>>
                                <label class="color-blk">Li??n h??? ng?????i b??n ????? h???i gi??</label>
                            </span>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">M?? t??? <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nh???p m?? t???" name="mota"><?= $sql_des['new_description'] ?></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Chi ti???t danh m???c <span class="color_red">*</span></p>
                            <select class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
                                <option disabled selected value="">Th??m chi ti???t danh m???c</option>
                                <? while ($ctiet = mysql_fetch_assoc($query_dm->result)) { ?>
                                    <option value="<?= $ctiet['tags_id'] ?>" <?= ($ctiet['tags_id'] == $sql_nd['new_ctiet_dmuc']) ? 'selected' : "" ?>><?= $ctiet['ten_tags'] ?></option>
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
                        <div class="row-tin-dang cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold" onclick="xem_trc_tin()">XEM TR?????C</button>
                            <button type="button" class="btn-submit dangtin_oto td-dang-tin hd_cspointer font-bold">CH???NH S???A</button>
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
<script>
    $('#tinhtrangxe').on('change', function() {
        var val_tt = $("select[name='tinhtrang']").val();
        if (val_tt == 2 || val_tt == 3) {
            $('.sokm_show').show();
        } else {
            $('.sokm_show').hide();
        }
    });

    $(".dangtin_oto").click(function() {
        var form_xeco_car = $("#form_xeco_car");
        form_xeco_car.validate({
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
                hang_xe: "required",
                dong_xe: "required",
                loai_xe: "required",
                nam_san_xuat: "required",
                tinhtrang: "required",
                hop_so: "required",
                nhien_lieu: "required",
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
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                hang_xe: "Vui l??ng ch???n h??ng xe",
                dong_xe: "Vui l??ng kh??ng ????? tr???ng tr?????ng n??y",
                loai_xe: "Vui l??ng ch???n lo???i xe",
                nam_san_xuat: "Vui l??ng ch???n n??m s???n xu???t",
                tinhtrang: "Vui l??ng ch???n t??nh tr???ng xe",
                hop_so: "Vui l??ng ch???n h???p s??? xe",
                nhien_lieu: "Vui l??ng ch???n nhi??n li???u s??? d???ng",
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
        if (form_xeco_car.valid() === false) {
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
        if (form_xeco_car.valid() === true) {
            var user_id = $("#form_xeco_car").attr("data");
            var user_type = $("#form_xeco_car").attr("data1");
            var id_xc = $("#form_xeco_car").attr("data2");
            var tieu_de = $("input[name='tieu_de']").val();
            var hang_xe = $("select[name='hang_xe']").val();
            var dong_xe = $("[name='dong_xe']").val();
            var nam_san_xuat = $("select[name='nam_san_xuat']").val();
            var hop_so = $("select[name='hop_so']").val();
            var nhien_lieu = $("select[name='nhien_lieu']").val();
            var xuat_xu = $("select[name='xuat_xu']").val();
            var so_cho = $("select[name='so_cho']").val();
            var mau_sac = $("select[name='mau_sac']").val();
            var kieu_dang = $("select[name='kieu_dang']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();
            var tinhtrang = $("select[name='tinhtrang']").val();
            var km_di = $("input[name='km_di']").val();

            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                td_gia_spham = '0';
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
            fd.append('id_xc', id_xc);
            fd.append('tieu_de', tieu_de);
            fd.append('hang_xe', hang_xe);
            fd.append('dong_xe', dong_xe);
            fd.append('nam_san_xuat', nam_san_xuat);
            fd.append('hop_so', hop_so);
            fd.append('nhien_lieu', nhien_lieu);
            fd.append('xuat_xu', xuat_xu);
            fd.append('so_cho', so_cho);
            fd.append('mau_sac', mau_sac);
            fd.append('kieu_dang', kieu_dang);
            fd.append('bao_hanh', bao_hanh);
            fd.append('tinhtrang', tinhtrang);
            fd.append('km_di', km_di);
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
                url: '/ajax_xeco/edit_xeco_oto.php',
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
                }
            })
        }
    })

    //Xem tr?????c
    function xem_trc_tin() {
        var form_xeco_car = $(".form-dtin-cont");
        form_xeco_car.validate({
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
                hang_xe: "required",
                dong_xe: "required",
                loai_xe: "required",
                nam_san_xuat: "required",
                tinhtrang: "required",
                hop_so: "required",
                nhien_lieu: "required",
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
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                hang_xe: "Vui l??ng ch???n h??ng xe",
                dong_xe: "Vui l??ng kh??ng ????? tr???ng tr?????ng n??y",
                loai_xe: "Vui l??ng ch???n lo???i xe",
                nam_san_xuat: "Vui l??ng ch???n n??m s???n xu???t",
                tinhtrang: "Vui l??ng ch???n t??nh tr???ng xe",
                hop_so: "Vui l??ng ch???n h???p s??? xe",
                nhien_lieu: "Vui l??ng ch???n nhi??n li???u s??? d???ng",
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
        if (form_xeco_car.valid() === false) {
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
        if (form_xeco_car.valid() === true) {
            var tieu_de = $("input[name='tieu_de']").val();
            var id_dm = $(".dmuc-spham").attr('data');
            var hang_xe = $("select[name='hang_xe']").val();
            var dong_xe = $("[name='dong_xe']").val();
            var nam_san_xuat = $("select[name='nam_san_xuat']").val();
            var hop_so = $("select[name='hop_so']").val();
            var nhien_lieu = $("select[name='nhien_lieu']").val();
            var xuat_xu = $("select[name='xuat_xu']").val();
            var so_cho = $("select[name='so_cho']").val();
            var mau_sac = $("select[name='mau_sac']").val();
            var kieu_dang = $("select[name='kieu_dang']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();
            var tinhtrang = $("select[name='tinhtrang']").val();
            var km_di = $("input[name='km_di']").val();
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
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var fd = new FormData();
            fd.append("id_dmuc", id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('loai_sp', hang_xe);
            fd.append('loai_sp2', dong_xe);
            fd.append('loai_sp3', nam_san_xuat);
            fd.append('loai_sp4', hop_so);
            fd.append('loai_sp5', nhien_lieu);
            fd.append('loai_sp6', xuat_xu);
            fd.append('loai_sp7', so_cho);
            fd.append('loai_sp8', mau_sac);
            fd.append('loai_sp9', kieu_dang);
            fd.append('loai_sp10', bao_hanh);
            fd.append('tinh_trang', tinhtrang);
            fd.append('loai_sp11', km_di);
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