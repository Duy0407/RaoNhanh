<?
include 'config.php';

$id_dm = getValue('id_dm', 'int', 'GET', 0);
$id_cs = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_cs != 0 && $id_dm != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $check_tind = new db_query("SELECT new_id FROM `new` WHERE `new_user_id` = $us_id AND `new_type` = $us_type AND `new_id` = $id_cs AND  `new_cate_id` = $id_dm ");
    if (mysql_num_rows($check_tind->result) > 0) {
        $list_tt = new db_query("SELECT n.`new_title`, n.`new_money`, n.`gia_kt`, n.`new_cate_id`, n.`new_city`, n.`new_image`, n.`new_unit`, n.`new_tinhtrang`,
                                n.`chotang_mphi`, n.`quan_huyen`, n.`phuong_xa`, n.`new_sonha`, n.`dia_chi`, n.`new_video`,  n.`new_ctiet_dmuc`, n.`new_baohanh`,
                                d.`new_description`, d.`thiet_bi`, d.`link_kien_phu_kien`, d.`loai_linhphu_kien`, n.`new_phone`, n.`new_email` FROM `new` AS n
                                INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                                WHERE n.`new_user_id` = $us_id AND n.`new_type` = $us_type AND n.`new_id` = $id_cs AND  n.`new_cate_id` = $id_dm ");
        $row_tt = mysql_fetch_assoc($list_tt->result);
        $linhphu_kien = $row_tt['link_kien_phu_kien'];

        $loai_lpk = $row_tt['loai_linhphu_kien'];

        $thiet_bi = $row_tt['thiet_bi'];
        $avt_dangtin = $row_tt['new_image'];

        $video_dangtin = $row_tt['new_video'];

        $tinh_thanh = $row_tt['new_city'];
        $quan_huyen = $row_tt['quan_huyen'];
        $phuong_xa = $row_tt['phuong_xa'];
        $so_nha = $row_tt['new_sonha'];


        $querypk = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm and `id_cha`= 0");

        $querylk = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_danhmuc` = $id_dm and `id_cha`= 1");

        $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $loai_lpk ");

        $bao_hanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");

        $query_tbi = new db_query("SELECT * FROM `nhom_sanpham_chatlieu` where `id_cha` = $loai_lpk AND `id_danhmuc` = $id_dm ");
        $tb_tbi = $query_tbi->result_array();
    } else {
        header('Location: /');
    }
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
    <title>????ng tin ????? ti???n t??? ph??? linh ki???n</title>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
</head>

<body>
    <? include("../includes/common/inc_header.php") ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">????ng tin</p>
                <div class="w-125">
                    <span>Cho t???ng mi???n ph??</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi" <?= ($row_tt['chotang_mphi'] == 1) ? "checked" : "" ?>>
                        <span class="slider1 round1"></span>
                    </label>
                </div>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include("../includes/inc_new/up-media-dang-tin.php"); ?>
                </div>
                <div class="tindang-col-right" data="<?= $id_cs ?>">
                    <form class="form-dtin-cont" id="form_dt_phukien" data="<?= $us_id ?>" data1="<?= $us_type ?>">
                        <div class="row-tin-dang-dau">
                            <p class="font-dam hd_font15-17">Danh m???c s???n ph???m<span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" readonly data="<?= $id_dm ?>" name="danhmucsanpham_dt" placeholder="????? ??i???n t??? >> Ph??? ki???n, Linh ki???n">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Ti??u ????? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" value="<?= $row_tt['new_title'] ?>" placeholder="Nh???p ti??u ?????" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Linh ki???n/ Ph??? ki???n <span class="color_red">*</span></p>
                            <select name="linhkien" class="slect-thietbi slect-thietbi-pkien hd_height36" data="<?= $id_dm ?>">
                                <option disabled selected value="">Linh ki???n/ Ph??? ki???n</option>
                                <option value="1" <?= ($row_tt['link_kien_phu_kien'] == 1) ? "selected" : "" ?>>Ph??? ki???n</option>
                                <option value="2" <?= ($row_tt['link_kien_phu_kien'] == 2) ? "selected" : "" ?>>Linh ki???n</option>
                            </select>
                        </div>
                        <!-- phu kien -->
                        <? if ($linhphu_kien == 1) { ?>
                            <div class="row-tin-dang box_input_infor box_loai_pk">
                                <p class="font-dam hd_font15-17">Lo???i ph??? ki???n <span class="color_red">*</span></p>
                                <select name="loai_pk" class="loai_chung slect-thietbi slect-thietbi-m-anh hd_height36" data="<?= $id_dm ?>" onchange="lpkien_doi(this)">
                                    <option value="">Lo???i ph??? ki???n</option>
                                    <? while ($value1 = mysql_fetch_assoc($querypk->result)) { ?>
                                        <option value="<?= $value1['id'] ?>" <?= ($value1['id'] == $loai_lpk) ? "selected" : "" ?>><?= $value1['ten_loai'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                        <? } else if ($linhphu_kien == 2) { ?>
                            <div class="row-tin-dang box_input_infor box_loai_pk">
                                <p class="font-dam hd_font15-17">Lo???i linh ki???n <span class="color_red">*</span></p>
                                <select name="loai_pk" class="loai_chung slect-thietbi slect-thietbi-m-anh hd_height36" data="<?= $id_dm ?>" onchange="lpkien_doi(this)">
                                    <option value="">Lo???i linh ki???n</option>
                                    <? while ($value = mysql_fetch_assoc($querylk->result)) { ?>
                                        <option value="<?= $value['id'] ?>" <?= ($value['id'] == $loai_lpk) ? "selected" : "" ?>><?= $value['ten_loai'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                        <? } ?>
                        <div class="row-tin-dang box_input_infor append_nhom">
                            <? if ($row_tt['loai_linhphu_kien'] != 4340) { ?>
                                <p class="font-dam hd_font15-17">Thi???t b??? <span class="color_red">*</span></p>
                                <select name="thietbi1" class="slect-thietbi slect-thietbi-m-anh hd_height36">
                                    <option value="">Thi???t b???</option>
                                    <?php foreach ($tb_tbi as $key => $value) : ?>
                                        <option value="<?= $value['id'] ?>" <?= ($value['id'] == $thiet_bi) ? "selected" : ""  ?>><?= $value['name'] ?></option>
                                    <?php endforeach ?>
                                </select>
                            <? } ?>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">B???o h??nh</p>
                            <select name='baohanh' class="slect-hang hd_height36">
                                <option value="">B???o h??nh</option>
                                <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                    <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $row_tt['new_baohanh']) ? "selected" : "" ?>><?= $row_bh['tgian_baohanh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">T??nh tr???ng <span class="color_red">*</span></p>
                            <select name="tinh_trang" class="slect-hang hd_height36">
                                <option disabled value="">T??nh tr???ng</option>
                                <option value="1" <?= ($row_tt['new_tinhtrang'] == 1) ? "selected" : "" ?>>M???i</option>
                                <option value="2" <?= ($row_tt['new_tinhtrang'] == 2) ? "selected" : "" ?>>???? s??? d???ng (ch??a s???a ch???a)</option>
                                <option value="3" <?= ($row_tt['new_tinhtrang'] == 3) ? "selected" : "" ?>>???? s??? d???ng (qua s???a ch???a)</option>
                            </select>
                        </div>
                        <!-- gi?? ng?????i b??n -->
                        <div class="row-tin-dang ">
                            <p class="font-dam hd_font15-17">Gi?? <span class="color_red">*</span></p>
                            <div class="input-gia-cont">
                                <div class="box_input_infor">
                                    <? if ($row_tt['chotang_mphi'] == 1) { ?>
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" disabled>
                                    <? } else { ?>
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" value="<?= ($row_tt['new_money'] != 0) ? number_format($row_tt['new_money']) : "" ?>" <?= ($row_tt['new_money'] == 0) ? 'disabled' : "" ?> id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>">
                                    <? } ?>
                                </div>
                                <div class="money_div arrow_none">
                                    <select class="dt-money-up" name="donvi_ban">
                                        <option value="1" <?= ($row_tt['new_unit'] == 1) ? "selected" : "" ?>>VND</option>
                                        <option value="2" <?= ($row_tt['new_unit'] == 2) ? "selected" : "" ?>>USD</option>
                                        <option value="3" <?= ($row_tt['new_unit'] == 3) ? "selected" : "" ?>>EURO</option>
                                    </select>
                                </div>
                            </div>
                            <span class="sp-lienhe-nban">
                                <? if ($row_tt['chotang_mphi'] == 1) { ?>
                                    <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban" disabled>
                                <? } else { ?>
                                    <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban" <?= ($row_tt['new_money'] == 0 && $row_tt['new_money'] != "") ? "checked" : "" ?>>
                                <? } ?>
                                <label class="color-blk">Li??n h??? ng?????i b??n ????? h???i gi??</label>
                            </span>
                        </div>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">M?? t??? <span class="color_red">*</span></p>
                            <textarea name="mota" class="texa-mo-ta input_infor_tag error" placeholder="Nh???p m?? t???"><?= $row_tt['new_description'] ?></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor tags_dmuc">
                            <? if ($row_tt['loai_linhphu_kien'] != 4340) { ?>
                                <p class="font-dam hd_font15-17">Chi ti???t danh m???c <span class="color_red">*</span></p>
                                <select class="slect-hang hd_height36 chitiet_dm" name="chitiet_dm">
                                    <option value="">Th??m chi ti???t danh m???c</option>
                                    <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                                        <option value="<?= $row_tags['tags_id'] ?>" <?= ($row_tags['tags_id'] == $row_tt['new_ctiet_dmuc']) ? "selected" : "" ?>><?= $row_tags['ten_tags'] ?></option>
                                    <? } ?>
                                </select>
                            <? } ?>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">?????a ch??? <span class="color_red">*</span></p>
                            <input type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" value="<?= $row_tt['dia_chi'] ?>" readonly placeholder="?????a ch???" data-tt="<?= $tinh_thanh ?>" data-qh="<?= $quan_huyen ?>" data-px="<?= $phuong_xa ?>" data-sn="<?= $so_nha ?>">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">S??? ??i???n tho???i li??n h??? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $row_tt['new_phone'] ?>" placeholder="Nh???p s??? ??i???n tho???i li??n h???" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Email li???n h??? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $row_tt['new_email'] ?>" placeholder="Nh???p email li??n h???" autocomplete="off">
                        </div>
                        <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                            <p class="font-dam hd_font15-17">M?? x??c nh???n <span class="color_red">*</span></p>
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
                        <div class="row-tin-dang-btn cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold background-none">XEM TR?????C</button>
                            <button type="button" class="btn-submit td-dang-tin hd_cspointer font-bold">????NG TIN</button>
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
<script type="text/javascript">
    $(".slect-thietbi-pkien").change(function() {
        var pkien_lkien = $(this).val();
        var id_dm = $(this).attr("data");
        if (pkien_lkien != "") {
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
        var form_dt_phukien = $("#form_dt_phukien");
        form_dt_phukien.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieude_phukien: {
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
                tieude_phukien: {
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                linhkien: "Vui l??ng ch???n lo???i linh ki???n/ph??? ki???n",
                loai_pk: "Kh??ng ???????c ????? tr???ng",
                thietbi1: "Vui l??ng ch???n thi???t b???",
                tinh_trang: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
                td_gia_spham: "Vui l??ng nh???p ????? gi?? s???n ph???m",
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
            var user_id = $(".form-dtin-cont").attr("data");
            var user_type = $(".form-dtin-cont").attr("data1");
            var id_dm = $(".dmuc-spham").attr("data");
            var id_cs = $(".tindang-col-right").attr("data");
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

            // l???y ???nh c???
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            // end

            var fd = new FormData();
            fd.append('user_id', user_id);
            fd.append('user_type', user_type);
            fd.append('id_dm', id_dm);
            fd.append('id_cs', id_cs);
            fd.append('tieu_de', tieu_de);
            fd.append('linh_kien', linh_kien);
            fd.append('loai_pk', loai_pk);
            fd.append('thiet_bi', thietbi);
            fd.append('bao_hanh', baohanh);
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
            // l???y ???nh c??
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
                url: '/ajax_ddtu/csua_linh_phukien.php',
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
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                linhkien: "Vui l??ng ch???n lo???i linh ki???n/ph??? ki???n",
                loai_pk: "Kh??ng ???????c ????? tr???ng",
                thietbi1: "Vui l??ng ch???n thi???t b???",
                tinh_trang: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
                td_gia_spham: "Vui l??ng nh???p ????? gi?? s???n ph???m",
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