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
                                d.`new_description`, d.`bovi_xuly`, d.`ram`, d.`o_cung`, d.`loai_o_cung`, d.`man_hinh`, d.`kich_co`, n.`new_phone`, n.`new_email`
                                FROM `new` AS n
                                INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                                WHERE n.`new_user_id` = $us_id AND n.`new_type` = $us_type AND n.`new_id` = $id_cs AND  n.`new_cate_id` = $id_dm ");
        $row_tt = mysql_fetch_assoc($list_tt->result);

        $avt_dangtin = $row_tt['new_image'];

        $video_dangtin = $row_tt['new_video'];

        $tinh_thanh = $row_tt['new_city'];
        $quan_huyen = $row_tt['quan_huyen'];
        $phuong_xa = $row_tt['phuong_xa'];
        $so_nha = $row_tt['new_sonha'];

        $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm ");

        $bivi_xuly = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id_danhmuc` = $id_dm ");

        $list_ram = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 1 ");

        $list_ocung = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 2 ");

        $card_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 1 ");

        $kich_co = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 2 ");

        $bao_hanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
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
    <title>????ng tin ????? ti???n t??? m??y t??nh</title>

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
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
                    <?php include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right" data="<?= $id_cs ?>">
                    <form class="form-dtin-cont" id="form_dt_pc" data="<?= $us_id ?>" data1="<?= $us_type ?>">
                        <div class="row-tin-dang-dau">
                            <p class="font-dam hd_font15-17">Danh m???c s???n ph???m <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" readonly name="dmuc_spham_mtinh" data="<?= $id_dm ?>" placeholder="????? ??i???n t??? >> M??y t??nh ????? b??n">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Ti??u ????? <span class="color_red">*</span></p>
                            <input class="input_infor_tag tieu-de-dang-tin error" type="text" name="tieude_pc" value="<?= $row_tt['new_title'] ?>" placeholder="Nh???p ti??u ?????" autocomplete="off">
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">B??? vi x??? l??</p>
                            <select class="slect-hang  hd_height36" name="bovi_xuly">
                                <option value="">B??? vi x??? l??</option>
                                <? while ($row_bv = mysql_fetch_assoc($bivi_xuly->result)) { ?>
                                    <option value="<?= $row_bv['bovi_id'] ?>" <?= ($row_bv['bovi_id'] == $row_tt['bovi_xuly']) ? "selected" : "" ?>><?= $row_bv['bovi_ten'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">RAM</p>
                            <select class="slect-hang  hd_height36" name="ram_pc">
                                <option value="">RAM</option>
                                <? while ($row_ram = mysql_fetch_assoc($list_ram->result)) { ?>
                                    <option value="<?= $row_ram['id_dl'] ?>" <?= ($row_ram['id_dl'] == $row_tt['ram']) ? "selected" : "" ?>><?= $row_ram['ten_dl'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="tt-o-cung hd-disflex">
                            <div class="row-tin-dang row-o-cung">
                                <p class="font-dam hd_font15-17">??? c???ng</p>
                                <select class="slect-hang  hd_height36" name="o_cung">
                                    <option value="">??? c???ng</option>
                                    <? while ($row_oc = mysql_fetch_assoc($list_ocung->result)) { ?>
                                        <option value="<?= $row_oc['id_dl'] ?>" <?= ($row_oc['id_dl'] == $row_tt['o_cung']) ? "selected" : "" ?>><?= $row_oc['ten_dl'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="row-tin-dang row-loai-o-cung">
                                <p class="font-dam hd_font15-17">Lo???i ??? c???ng</p>
                                <select class="slect-hang  hd_height36" name="loai_ocung">
                                    <option value="">Lo???i ??? c???ng</option>
                                    <option value="1" <?= ($row_tt['loai_o_cung'] == 1) ? "selected" : "" ?>>HDD</option>
                                    <option value="2" <?= ($row_tt['loai_o_cung'] == 2) ? "selected" : "" ?>>SSD</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Card m??n h??nh</p>
                            <select class="slect-hang  hd_height36" name="card_mhinh">
                                <option value="">Card m??n h??nh</option>
                                <? while ($row_card = mysql_fetch_assoc($card_mhinh->result)) { ?>
                                    <option value="<?= $row_card['id_manhinh'] ?>" <?= ($row_card['id_manhinh'] == $row_tt['man_hinh']) ? "selected" : "" ?>><?= $row_card['ten_manhinh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">K??ch c??? m??n h??nh</p>
                            <select class="slect-hang  hd_height36" name="kich_co">
                                <option value="">K??ch c??? m??n h??nh </option>
                                <? while ($row_kc = mysql_fetch_assoc($kich_co->result)) { ?>
                                    <option value="<?= $row_kc['id_manhinh'] ?>" <?= ($row_kc['id_manhinh'] == $row_tt['kich_co']) ? "selected" : "" ?>><?= $row_kc['ten_manhinh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">B???o h??nh</p>
                            <select class="slect-hang  hd_height36" name="bao_hanh">
                                <option value="">B???o h??nh</option>
                                <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                    <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $row_tt['bao_hanh']) ? "selected" : "" ?>><?= $row_bh['tgian_baohanh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">T??nh tr???ng <span class="color_red">*</span></p>
                            <select name="tinhtrang_pc" class="slect-hang hd_height36">
                                <option value="">T??nh tr???ng</option>
                                <option value="1" <?= ($row_tt['new_tinhtrang'] == 1) ? "selected" : "" ?>>M???i</option>
                                <option value="2" <?= ($row_tt['new_tinhtrang'] == 2) ? "selected" : "" ?>>???? s??? d???ng (ch??a s???a ch???a)</option>
                                <option value="3" <?= ($row_tt['new_tinhtrang'] == 3) ? "selected" : "" ?>>???? s??? d???ng (qua s???a ch???a)</option>
                            </select>
                        </div>
                        <!-- gi?? ng?????i mua -->
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Gi?? <span class="color_red">*</span></p>
                            <div class="fig_gia_nguoiban">
                                <div class="input-gia-cont">
                                    <div class="box_input_infor">
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" id="gia-ban-sp" autocomplete="off" oninput="<?= $oninput ?>" onkeyup="format_gtri(this)" <?= ($row_tt['new_money'] > 0) ? "value=" . $row_tt['new_money'] : "disabled" ?>>
                                    </div>
                                    <div class="money_div arrow_none">
                                        <select class="dt-money-up" name="donvi_ban">
                                            <option value="1" selected>VND</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban fig_gia_nguoiban_lienhe">
                                    <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban" <?= ($row_tt['new_money'] > 0) ? "" : "checked" ?>>
                                    <label class="color-blk">Li??n h??? ng?????i b??n ????? h???i gi??</label>
                                </span>
                            </div>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">M?? t??? <span class="color_red">*</span></p>
                            <textarea name="mota" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nh???p m?? t???"><?= $row_tt['new_description'] ?></textarea>
                        </div>
                        <div class="box_input_infor">
                            <p class="font-dam hd_font15-17">Chi ti???t danh m???c <span class="color_red">*</span></p>
                            <select name="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width: 100%;">
                                <option value="">Chi ti???t danh m???c</option>
                                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                                    <option value="<?= $row_tags['tags_id'] ?>" <?= ($row_tags['tags_id'] == $row_tt['new_ctiet_dmuc']) ? "selected" : "" ?>><?= $row_tags['ten_tags'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">?????a ch??? <span class="color_red">*</span></p>
                            <input type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" value="<?= $row_tt['dia_chi'] ?>" placeholder="?????a ch???" readonly data-tt="<?= $tinh_thanh ?>" data-qh="<?= $quan_huyen ?>" data-px="<?= $phuong_xa ?>" data-sn="<?= $so_nha ?>">
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
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer background-none font-bold">XEM TR?????C</button>
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
<script type="text/javascript">
    $(".td-dang-tin").click(function() {
        var form_pc = $("#form_dt_pc");
        form_pc.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieude_pc: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                tinhtrang_pc: "required",
                td_gia_spham: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                chitiet_dm: "required",
                td_dia_chi: "required",
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
                tieude_pc: {
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                tinhtrang_pc: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
                td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                mota: {
                    required: "Vui l??ng nh???p m?? t???",
                    minlength: "M?? t??? ??t nh???t 10 k?? t???",
                    maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                },
                chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                td_dia_chi: "Vui l??ng nh???p ?????a ch???",
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
        if (form_pc.valid() === true) {
            var user_id = $(".form-dtin-cont").attr("data");
            var user_type = $(".form-dtin-cont").attr("data1");
            var id_dm = $(".dmuc-spham").attr("data");
            var id_cs = $(".tindang-col-right").attr("data");
            var tieu_de = $("input[name='tieude_pc']").val();
            var tinh_trang_ban = $("select[name='tinhtrang_pc']").val();
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
            }

            var bovi_xuly = $("select[name='bovi_xuly']").val();
            var ram_pc = $("select[name='ram_pc']").val();
            var o_cung = $("select[name='o_cung']").val();
            var card_mhinh = $("select[name='card_mhinh']").val();
            var loai_ocung = $("select[name='loai_ocung']").val();
            var kich_co = $("select[name='kich_co']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();

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
            fd.append('tinh_trang', tinh_trang_ban);
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

            fd.append('bovi_xuly', bovi_xuly);
            fd.append('ram_pc', ram_pc);
            fd.append('o_cung', o_cung);
            fd.append('card_mhinh', card_mhinh);
            fd.append('loai_ocung', loai_ocung);
            fd.append('kich_co', kich_co);
            fd.append('bao_hanh', bao_hanh);
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
                url: '/ajax_ddtu/csua_maytinh_dban.php',
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
        var form_pc = $(".form-dtin-cont");
        form_pc.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieude_pc: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                tinhtrang_pc: "required",
                td_gia_spham: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                chitiet_dm: "required",
                td_dia_chi: "required",
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
                tieude_pc: {
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                tinhtrang_pc: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
                td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                mota: {
                    required: "Vui l??ng nh???p m?? t???",
                    minlength: "M?? t??? ??t nh???t 10 k?? t???",
                    maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                },
                chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                td_dia_chi: "Vui l??ng nh???p ?????a ch???",
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
        if (form_pc.valid() === false) {
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
        if (form_pc.valid() === true) {
            var id_dm = $(".dmuc-spham").attr("data");
            var tieu_de = $("input[name='tieude_pc']").val();
            var tinh_trang = $("select[name='tinhtrang_pc']").val();
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
            }

            var bovi_xuly = $("select[name='bovi_xuly']").val();
            var ram_pc = $("select[name='ram_pc']").val();
            var o_cung = $("select[name='o_cung']").val();
            var card_mhinh = $("select[name='card_mhinh']").val();
            var loai_ocung = $("select[name='loai_ocung']").val();
            var kich_co = $("select[name='kich_co']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();

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
            fd.append('gia_spham', td_gia_spham);
            fd.append('ctiet_dmuc', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('donvi_ban', don_vi);
            fd.append('mo_ta', mo_ta);
            fd.append('tang_mphi', tang_mphi);

            fd.append('loai_sp', bovi_xuly);
            fd.append('loai_sp2', ram_pc);
            fd.append('loai_sp3', o_cung);
            fd.append('loai_sp4', card_mhinh);
            fd.append('loai_sp5', loai_ocung);
            fd.append('loai_sp6', kich_co);
            fd.append('loai_sp7', bao_hanh);

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
    });
</script>

</html>