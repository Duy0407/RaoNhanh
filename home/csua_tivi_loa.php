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
                                d.`new_description`, d.`hang`, d.`thiet_bi`, d.`knoi_internet`, d.`do_phan_giai`, d.`cong_suat`, d.`loai_chung`, d.`man_hinh`,
                                n.`new_phone`, n.`new_email` FROM `new` AS n INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                                WHERE n.`new_user_id` = $us_id AND n.`new_type` = $us_type AND n.`new_id` = $id_cs AND  n.`new_cate_id` = $id_dm ");
        $row_tt = mysql_fetch_assoc($list_tt->result);

        $thiet_bi = $row_tt['thiet_bi'];

        $avt_dangtin = $row_tt['new_image'];
        $video_dangtin = $row_tt['new_video'];

        $tinh_thanh = $row_tt['new_city'];
        $quan_huyen = $row_tt['quan_huyen'];
        $phuong_xa = $row_tt['phuong_xa'];
        $so_nha = $row_tt['new_sonha'];

        $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $thiet_bi ");

        $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $id_dm ");

        $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $thiet_bi AND `id_danhmuc` = $id_dm ");

        if ($thiet_bi == 52) {
            $list_mh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $thiet_bi ");
            $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $thiet_bi AND `id_danhmuc` = $id_dm ");
            $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $thiet_bi ");
        } else if ($thiet_bi == 53) {
            $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $thiet_bi AND `id_danhmuc` = $id_dm ");
            $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $thiet_bi ");
        } else if ($thiet_bi == 54) {
            $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $thiet_bi ");
        } else if ($thiet_bi == 57) {
            $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $thiet_bi ");
        }

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
    <title>????ng tin ????? ti???n t??? ??m ly - tivi - loa - m??y nghe nh???c</title>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <!-- <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>"> -->
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">

    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">

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
                    <? include("../includes/inc_new/up-media-dang-tin.php") ?>
                </div>
                <div class="tindang-col-right" data="<?= $id_cs ?>">
                    <form class="form-dtin-cont" id="form_dt_amly" data="<?= $us_id ?>" data1="<?= $us_type ?>">
                        <div class="row-tin-dang-dau">
                            <p class="font-dam hd_font15-17">Danh m???c s???n ph???m <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" readonly name="danhmucsanpham_dt" data="<?= $id_dm ?>" placeholder="????? ??i???n t??? >> Tivi, Loa, Amply, M??y nghe nh???c">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Ti??u ????? <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" value="<?= $row_tt['new_title'] ?>" name="danhmucsanpham_dt1" placeholder="Nh???p ti??u ?????" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Thi???t b??? <span class="color_red">*</span></p>
                            <select name="thietbi" class="slect-thietbi hd_height36 rn-select2 thietbi_doi" data="<?= $id_dm ?>" onchange="hang_doi(this)">
                                <option disabled selected value="">Thi???t b???</option>
                                <? while ($row_tbi = mysql_fetch_assoc($list_tbi->result)) { ?>
                                    <option value="<?= $row_tbi['id'] ?>" <?= ($row_tbi['id'] == $thiet_bi) ? "selected" : "" ?>><?= $row_tbi['name'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor dong_doi">
                            <p class="font-dam hd_font15-17">H??ng <span class="color_red">*</span></p>
                            <select name="hang_sp" class="slect-hang  hd_height36 rn-select2">
                                <option disabled value="">H??ng</option>
                                <? while ($row_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                                    <option value="<?= $row_hang['id'] ?>" <?= ($row_hang['id'] == $row_tt['hang']) ? "selected" : "" ?>><?= $row_hang['ten_hang'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang phan_chia">
                            <? if ($thiet_bi == 52) { ?>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">K??ch th?????c</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="kich_thuoc">
                                        <option value="">K??ch th?????c</option>
                                        <? while ($row_mh = mysql_fetch_assoc($list_mh->result)) { ?>
                                            <option value="<?= $row_mh['id_manhinh'] ?>" <?= ($row_mh['id_manhinh'] == $row_tt['man_hinh']) ? "selected" : ""  ?>><?= $row_mh['ten_manhinh'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">K???t n???i internet</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="ketnoi_inter">
                                        <option value="" disabled selected>K???t n???i internet</option>
                                        <option value="1" <?= ($row_tt['knoi_internet'] == 1) ? "selected" : ""  ?>>C??</option>
                                        <option value="2" <?= ($row_tt['knoi_internet'] == 2) ? "selected" : ""  ?>>Kh??ng</option>
                                    </select>
                                </div>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">Lo???i TV</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="loai_tv">
                                        <option value="">Lo???i TV</option>
                                        <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                                            <option value="<?= $row_loai['id'] ?>" <?= ($row_loai['id'] == $row_tt['loai_chung']) ? "selected" : "" ?>><?= $row_loai['ten_loai'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">????? ph??n gi???i</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="do_phangiai">
                                        <option value="">????? ph??n gi???i</option>
                                        <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                                            <option value="<?= $row_dl['id_dl'] ?>" <?= ($row_dl['id_dl'] == $row_tt['do_phan_giai']) ? "selected" : "" ?>><?= $row_dl['ten_dl'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            <? } else if ($thiet_bi == 53) { ?>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">Lo???i loa</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="loai_loa">
                                        <option value="">Lo???i loa</option>
                                        <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                                            <option value="<?= $row_loai['id'] ?>" <?= ($row_loai['id'] == $row_tt['loai_chung']) ? "selected" : "" ?>><?= $row_loai['ten_loai'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">C??ng su???t</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="cong_suat">
                                        <option value="">C??ng su???t</option>
                                        <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                                            <option value="<?= $row_dl['id_dl'] ?>" <?= ($row_dl['id_dl'] == $row_tt['cong_suat']) ? "selected" : "" ?>><?= $row_dl['ten_dl'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            <? } else if ($thiet_bi == 54) { ?>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">C??ng su???t ??m thanh</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="am_thanh_cs">
                                        <option value="">C??ng su???t ??m thanh</option>
                                        <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                                            <option value="<?= $row_dl['id_dl'] ?>" <?= ($row_dl['id_dl'] == $row_tt['cong_suat']) ? "selected" : "" ?>><?= $row_dl['ten_dl'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            <? } else if ($thiet_bi == 57) { ?>
                                <div class="row-tin-dang for-hang-rd">
                                    <p class="font-dam hd_font15-17">C??ng su???t ??m thanh</p>
                                    <select class="slect-hang hd_height36 rn-select2" name="kara_cs">
                                        <option value="">C??ng su???t ??m thanh</option>
                                        <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                                            <option value="<?= $row_dl['id_dl'] ?>" <?= ($row_dl['id_dl'] == $row_tt['cong_suat']) ? "selected" : "" ?>><?= $row_dl['ten_dl'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            <? } ?>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">B???o h??nh</p>
                            <select class="slect-baohanh hd_height36 rn-select2" name="bao_hanh">
                                <option value="">B???o h??nh</option>
                                <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                    <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $row_tt['new_baohanh']) ? "selected" : "" ?>><?= $row_bh['tgian_baohanh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">T??nh tr???ng <span class="color_red">*</span></p>
                            <select name="tinh_trang" class="slect-ttrang hd_height36 rn-select2">
                                <option value="">T??nh tr???ng</option>
                                <option value="1" <?= ($row_tt['new_tinhtrang'] == 1) ? "selected" : "" ?>>M???i</option>
                                <option value="2" <?= ($row_tt['new_tinhtrang'] == 2) ? "selected" : "" ?>>???? s??? d???ng (ch??a s???a ch???a)</option>
                                <option value="3" <?= ($row_tt['new_tinhtrang'] == 3) ? "selected" : "" ?>>???? s??? d???ng (qua s???a ch???a)</option>
                            </select>
                        </div>
                        <!-- gi?? ng?????i b??n -->
                        <div class="row-tin-dang">
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
                        <div class="row-tin-dang box_input_infor tags_doi">
                            <p class="font-dam hd_font15-17">Chi ti???t danh m???c<span class="color_red">*</span></p>
                            <select name="chitiet_dm" class="slect-hang rn-select2">
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

<script type="text/javascript">
    $(".thietbi_doi").change(function() {
        var id_dm = $(this).attr("data");
        var id_tbi = $(this).val();
        var us_type = $("#form_dt_amly").attr("data1");
        $.ajax({
            url: '/render/ttin_thietbi.php',
            type: 'POST',
            data: {
                id_dm: id_dm,
                id_tbi: id_tbi,
                us_type: us_type,
            },
            success: function(data) {
                $(".phan_chia").html(data);
                rf_select2();
            }
        });

        $.ajax({
            url: '/render/select_delivery.php',
            type: 'POST',
            data: {
                id_dm: id_dm,
                id_lkp: id_tbi,
            },
            success: function(data) {
                $(".tags_doi").html(data);
                rf_select2();
            }
        })
    });

    $(".td-dang-tin").click(function() {
        var form_amly = $("#form_dt_amly");
        form_amly.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                danhmucsanpham_dt1: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                thietbi: "required",
                hang_sp: "required",
                tinh_trang: "required",
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
                danhmucsanpham_dt1: {
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                thietbi: "Vui l??ng ch???n thi???t b???",
                hang_sp: "Vui l??ng ch???n h??ng s???n ph???m",
                tinh_trang: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
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
        if (form_amly.valid() === false) {
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
        if (form_amly.valid() === true) {
            var user_id = $(".form-dtin-cont").attr("data");
            var user_type = $(".form-dtin-cont").attr("data1");
            var id_dm = $(".dmuc-spham").attr("data");
            var id_cs = $(".tindang-col-right").attr("data");
            var tieu_de = $("input[name='danhmucsanpham_dt1']").val();
            var tinh_trang = $("select[name='tinh_trang']").val();
            var gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var gia_spham = '0';
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
            var hang = $("select[name='hang_sp']").val();

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
            var thiet_bi = $("select[name='thietbi']").val();
            if (thiet_bi == 52) {
                var loai = $("select[name='loai_tv']").val();
                var kich_thuoc = $("select[name='kich_thuoc']").val();
                var ketnoi_inter = $("select[name='ketnoi_inter']").val();
                var do_phangiai = $("select[name='do_phangiai']").val();

                fd.append('kich_thuoc', kich_thuoc);
                fd.append('ketnoi_inter', ketnoi_inter);
                fd.append('do_phangiai', do_phangiai);
            } else if (thiet_bi == 53) {
                var loai = $("select[name='loai_loa']").val();
                var cong_suat = $("select[name='cong_suat']").val();
            } else if (thiet_bi == 54) {
                var cong_suat = $("select[name='am_thanh_cs']").val();
            } else if (thiet_bi == 57) {
                var cong_suat = $("seelct[name='kara_cs']").val();
            };

            fd.append('user_id', user_id);
            fd.append('user_type', user_type);
            fd.append('id_dm', id_dm);
            fd.append('id_cs', id_cs);
            fd.append('tieu_de', tieu_de);
            fd.append('tinh_trang', tinh_trang);
            fd.append('gia_spham', gia_spham);
            fd.append('chitiet_dm', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('don_vi', don_vi);
            fd.append('mo_ta', mo_ta);
            fd.append('tang_mphi', tang_mphi);

            fd.append('thiet_bi', thiet_bi);
            fd.append('hang', hang);
            fd.append('loai', loai);
            fd.append('cong_suat', cong_suat);
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
                url: '/ajax_ddtu/csua_amly.php',
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
        var form_amly = $(".form-dtin-cont");
        form_amly.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                danhmucsanpham_dt1: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                thietbi: "required",
                hang_sp: "required",
                tinh_trang: "required",
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
                danhmucsanpham_dt1: {
                    required: "Vui l??ng nh???p ti??u ?????",
                    minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                    maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                },
                thietbi: "Vui l??ng ch???n thi???t b???",
                hang_sp: "Vui l??ng ch???n h??ng s???n ph???m",
                tinh_trang: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
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
        if (form_amly.valid() === false) {
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
        if (form_amly.valid() === true) {
            var id_dm = $(".dmuc-spham").attr("data");
            var tieu_de = $("input[name='danhmucsanpham_dt1']").val();
            var tinh_trang = $("select[name='tinh_trang']").val();
            var gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var gia_spham = '0';
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
            var hang = $("select[name='hang_sp']").val();

            var bao_hanh = $("select[name='bao_hanh']").val();

            var phan_biet = 1;
            var fd = new FormData();
            var thiet_bi = $("select[name='thietbi']").val();
            if (thiet_bi == 52) {
                var loai = $("select[name='loai_tv']").val();
                var kich_thuoc = $("select[name='kich_thuoc']").val();
                var ketnoi_inter = $("select[name='ketnoi_inter']").val();
                var do_phangiai = $("select[name='do_phangiai']").val();

                fd.append('loai_sp6', kich_thuoc);
                fd.append('loai_sp7', ketnoi_inter);
                fd.append('loai_sp8', do_phangiai);
            } else if (thiet_bi == 53) {
                var loai = $("select[name='loai_loa']").val();
                var cong_suat = $("select[name='cong_suat']").val();
            } else if (thiet_bi == 54) {
                var cong_suat = $("select[name='am_thanh_cs']").val();
            } else if (thiet_bi == 57) {
                var cong_suat = $("select[name='kara_cs']").val();
            };

            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            fd.append('id_dmuc', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('tinh_trang', tinh_trang);
            fd.append('gia_spham', gia_spham);
            fd.append('ctiet_dmuc', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('donvi_ban', don_vi);
            fd.append('mo_ta', mo_ta);
            fd.append('tang_mphi', tang_mphi);

            fd.append('loai_sp', thiet_bi);
            fd.append('loai_sp2', hang);
            fd.append('loai_sp3', loai);
            fd.append('loai_sp4', cong_suat);
            fd.append('loai_sp5', bao_hanh);

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