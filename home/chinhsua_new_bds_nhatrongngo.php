<?
include("config.php");
$id_nd = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_nd != 0) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];

    $list_tin = new db_query("SELECT `new`.`new_id`, `new_title`,`link_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                            `new_unit`, `new_phone`, `new_email`, `new_address`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`,
                            `new_ctiet_dmuc`, `datcoc`,`dc_unit`, `new_description`,`can_ban_mua`, `ten_toa_nha`,
                            `tong_so_tang`,`huong_chinh`, `so_pngu`,`so_pve_sinh`, `giay_to_phap_ly`, `tinh_trang_noi_that`,`dac_diem`,
                            `dien_tich`, `chieu_dai`, `chieu_rong`,`ten_phan_khu`,`td_macanho`,`td_htmch_rt`,`dientichsd`, `canhan_moigioi` FROM `new`
                            LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                            WHERE `new`.`new_id` = $id_nd AND `new_user_id` = $acc_id ");
    if (mysql_num_rows($list_tin->result) > 0) {
        $item_td = mysql_fetch_assoc($list_tin->result);
        $avt_dangtin = $item_td['new_image'];
        $video_dangtin = $item_td['new_video'];
        $tinh_thanh = $item_td['new_city'];
        $quan_huyen = $item_td['quan_huyen'];
        $phuong_xa = $item_td['phuong_xa'];
        $so_nha = $item_td['new_sonha'];

        // tag danh muc
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 26 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
        $result_ban = ($ban->result_array());
    } else {
        header('Location: /');
    }
} else {
    header("Location: / ");
}
?>
<!DOCTYPE html>
<html lang="VI">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Ch???nh s???a b????t ??????ng sa??n nha?? trong ngo??</title>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_new_dangtin_chung.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_new_dangtin.css?v=<?= $version ?>">
</head>

<body>
    <!-- header -->
    <? include "../includes/common/inc_header.php"; ?>
    <!-- content -->
    <section id="m_dangtin_bds_nhatrongngo">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">????ng tin</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_bds_nhatrongngo" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh m???c ????ng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="26" data1="<?= $id_nd ?>">
                                B???t ?????ng s???n <span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" alt="" class="img_16">
                                </span> Nha?? trong ngo??
                            </p>
                        </div>
                    </div>
                    <div class="ctn_ct_b1_fr3 d_flex fl_row al_ct">
                        <label class="b1_fr3_btn1" onclick="checked_input(this)">
                            <input name="ban_thue" type="radio" class="b1_fr3_ip1 fr3_ipmuaban_chothue check_mb_ct" value="1" <?= ($item_td['can_ban_mua'] == 1) ? 'checked' : '' ?>>
                            <p class="b1_fr3_lb2 b1_fr3_lb p_400_s14_l17 <?= ($item_td['can_ban_mua'] == 1) ? 'active_mb_ct' : '' ?>">Mua ba??n</p>
                        </label>
                        <label class="b1_fr3_btn2" onclick="checked_input(this)">
                            <input name="ban_thue" type="radio" class="b1_fr3_ip2 fr3_ipmuaban_chothue check_mb_ct" value="2" <?= ($item_td['can_ban_mua'] == 2) ? 'checked' : '' ?>>
                            <p class="b1_fr3_lb2 b1_fr3_lb p_400_s14_l17 <?= ($item_td['can_ban_mua'] == 2) ? 'active_mb_ct' : '' ?>" data="2" id="">Cho thu??</p>
                        </label>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ---------------------------------------box3 --------------------------------------------------------------------->
                <div class="ctn_ct_box3">
                    <p class="ctn_ct_b3_title p_600_s16_l19 cl_cam">
                        Ti??u ????? v?? m?? t???
                    </p>
                    <div class="ctn_ct_b3_fr">
                        <div class="ctn_ct_b3_fr1 box_input_infor">
                            <p class="b3_fr1_title p_400_s15_l18">Ti??u ????? <span class="cl_red">*</span></p>
                            <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nh???p ti??u ??????" autocomplete="off">
                            <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">l???n h??n 40, nh??? h??n 70 k?? t???</p>
                        </div>
                        <div class="ctn_ct_b3_fr2 d_flex fl_cl">
                            <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                                <div class="b3_fr2_gia box_input_infor <?= ($item_td['can_ban_mua'] == 2) ? 'active_gia' : '' ?>">
                                    <p class="b3_fr2_gia_tt p_400_s15_l18">Gi?? <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" name="td_gia_spham" value="<?= ($item_td['new_money'] != 0) ? number_format($item_td['new_money']) : '' ?>" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Gia??" autocomplete="off" <?= ($item_td['new_money'] == 0) ? 'disabled' : '' ?>>
                                        <div class="donvitien p_400_s14_l17">
                                            <select class="dt-money-up donvi_ban" name="dvi_tien">
                                                <option value="1" <?= ($item_td['new_unit'] == 1) ? 'selected' : '' ?>>VN??</option>
                                                <option value="2" <?= ($item_td['new_unit'] == 2) ? 'selected' : '' ?>>USD</option>
                                                <option value="3" <?= ($item_td['new_unit'] == 3) ? 'selected' : '' ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="b3_fr2_datcoc box_input_infor" <?= ($item_td['can_ban_mua'] == 2) ? "style='display: block'" : "style='display: none'" ?>>
                                    <p class="b3_fr2_datcoc_tt p_400_s15_l18">?????t co??c <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_datcoc_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" name="td_gia_datcoc" value="<?= ($item_td['datcoc'] != 0) ? number_format($item_td['datcoc']) : '' ?>" class="b3_fr2_datcoc_input p_400_s14_l17" placeholder="Gia??" autocomplete="off">
                                        <div class="donvitien p_400_s14_l17">
                                            <select class="dt-money-up donvi_ban" name="dc_new_unit">
                                                <option value="1" <?= ($item_td['dc_unit'] == 1) ? 'selected' : '' ?>>VN??</option>
                                                <option value="2" <?= ($item_td['dc_unit'] == 2) ? 'selected' : '' ?>>USD</option>
                                                <option value="3" <?= ($item_td['dc_unit'] == 3) ? 'selected' : '' ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                                <input name="td_lienhe_ngban" type="checkbox" <?= ($item_td['new_money'] == 0) ? 'checked' : '' ?> class="b3_fr2_lhhg_input m_lienhenguoiban_cb img24 cursor_Pt">
                                <p class="b3_fr2_lhhg_text pdl_10">Li??n h??? ng?????i b??n ????? h???i gi??</p>
                            </div>
                        </div>
                        <div class="ctn_ct_b3_fr3 box_input_infor">
                            <p class="b3_fr3_title p_400_s15_l18">
                                M?? t??? <span class="cl_red">*</span>
                            </p>
                            <textarea rows="6" placeholder="Nh???p m?? ta??" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"><?= nl2br($item_td['new_description']) ?></textarea>
                            <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                                <input type="text" name="count" id="count" value="<?= strlen($item_td['new_description']) ?>"> / 10000 k?? t???
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box4--------------------------------------------------------------------- -->
                <div class="ctn_ct_box4 d_flex fl_cl">
                    <p class="ctn_ct_b4_title p_600_s16_l19 cl_cam">
                        T??n, ?????a ch??? b???t ?????ng s???n
                    </p>
                    <div class="ctn_ct_b4_fr d_flex fl_row al_ct">
                        <div class="ctn_ct_b4_fr1">
                            <p class="b4_fr1_title p_400_s15_l18">
                                T??n to?? nh??/Khu d??n c??
                            </p>
                            <input type="text" name="ten_toanha" class="b4_fr1_input p_400_s14_l17" value="<?= $item_td['ten_toa_nha'] ?>" placeholder="T??n to?? nh??/Khu d??n c??" autocomplete="off">
                        </div>
                        <div class="ctn_ct_b4_fr2 box_input_infor">
                            <p class="b4_fr2_title p_400_s15_l18">
                                ?????a ch??? nh?? <span class="cl_red">*</span>
                            </p>
                            <input type="text" name="td_diachi_nha" class="td_ttin_diachi b4_fr2_input p_400_s14_l17" value="<?= $item_td['dia_chi'] ?>" data-tt="<?= $item_td['new_city'] ?>" data-qh="<?= $item_td['quan_huyen'] ?>" data-px="<?= $item_td['phuong_xa'] ?>" data-sn="<?= $item_td['so_nha'] ?>" placeholder="?????a ch??? nh??" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box5--------------------------------------------------------------------- -->
                <div class="ctn_ct_box5 d_flex fl_cl">
                    <p class="ctn_ct_b5_title p_600_s16_l19 cl_cam">
                        V??? tr?? b???t ?????ng s???n
                    </p>
                    <div class="ctn_ct_b5_fr d_flex fl_row al_ct">
                        <div class="b5_fr1">
                            <p class="b5_fr1_title p_400_s15_l18">
                                M?? c??n
                            </p>
                            <input type="text" name="td_macan" class="b5_fr1_input p_400_s14_l17" value="<?= $item_td['td_macanho'] ?>" placeholder="M?? c??n" autocomplete="off">
                        </div>
                        <div class="b5_fr2">
                            <p class="b5_fr2_title p_400_s15_l18">
                                T??n ph??n khu/l??
                            </p>
                            <input type="text" name="td_tenpk_lo" class="b5_fr2_input p_400_s14_l17" value="<?= $item_td['ten_phan_khu'] ?>" placeholder="T??n ph??n khu/l??" autocomplete="off">
                        </div>
                    </div>
                    <div class="ctn_ct_b5_ft d_flex fl_row al_ct">
                        <input name="td_htmch_rt" value="1" type="checkbox" class="b5_ft_input img24 cursor_Pt" <?= ($item_td['td_htmch_rt'] == 1) ? 'checked' : '' ?> autocomplete="off">
                        <p class="b5_ft_title p_400_s14_l17 pdl_10">
                            Hi???n th??? m?? c??n h??? rao tin
                        </p>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box6--------------------------------------------------------------------- -->
                <div class="ctn_ct_box6 d_flex fl_cl">
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">
                        Chi ti???t b???t ?????ng s???n
                    </p>
                    <div class="ctn_ct_b6_fr d_flex fl_row al_ct">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">
                                S??? ph??ng ng??? <span class="cl_red">*</span>
                            </p>
                            <select class="b6_fr1_select slect-hang" name="so_phongngu">
                                <option value="" disabled>Ch???n</option>
                                <? foreach ($db_tangphong as $so_pn) {
                                    if ($so_pn['type_zoom'] == 2) { ?>
                                        <option value="<?= $so_pn['id'] ?>" <?= ($so_pn['id'] == $item_td['so_pngu']) ? 'selected' : '' ?>><?= $so_pn['so_luong']; ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl">
                            <p class="b6_fr2_title p_400_s15_l18">
                                S??? nh?? v??? sinh
                            </p>
                            <select class="b6_fr2_select slect-hang" name="so_nhavs">
                                <option value="" class="p_400_s14_l17">Ch???n</option>
                                <? foreach ($db_tangphong as $so_pvs) {
                                    if ($so_pvs['type_zoom'] == 3) { ?>
                                        <option value="<?= $so_pvs['id'] ?>" <?= ($so_pvs['id'] == $item_td['so_pve_sinh']) ? 'selected' : '' ?>><?= $so_pvs['so_luong']; ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_ft d_flex fl_row al_ct">
                        <div class="b6_ft1 d_flex fl_cl">
                            <p class="b6_ft1_title p_400_s15_l18">
                                T???ng s??? t???ng
                            </p>
                            <select class="slect-hang  hd_height36" name="so_tang">
                                <option selected value="">T???ng s??? t???ng</option>
                                <? foreach ($db_tangphong as $tso_tang) {
                                    if ($tso_tang['type_zoom'] == 1) { ?>
                                        <option value="<?= $tso_tang['id'] ?>" <?= ($tso_tang['id'] == $item_td['tong_so_tang']) ? 'selected' : '' ?>><?= $tso_tang['so_luong']; ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_ft2 d_flex fl_cl">
                            <p class="b6_ft2_title p_400_s15_l18">
                                H?????ng c???a ch??nh
                            </p>
                            <select class="b6_ft2_select slect-hang" name="huong_cua">
                                <option value="">H?????ng c???a ch??nh</option>
                                <option value="1" <?= ($item_td['huong_chinh'] == 1) ? 'selected' : '' ?>>????ng</option>
                                <option value="2" <?= ($item_td['huong_chinh'] == 2) ? 'selected' : '' ?>>T??y </option>
                                <option value="3" <?= ($item_td['huong_chinh'] == 3) ? 'selected' : '' ?>>Nam </option>
                                <option value="4" <?= ($item_td['huong_chinh'] == 4) ? 'selected' : '' ?>>B???c </option>
                                <option value="5" <?= ($item_td['huong_chinh'] == 5) ? 'selected' : '' ?>>????ng b???c </option>
                                <option value="6" <?= ($item_td['huong_chinh'] == 6) ? 'selected' : '' ?>>????ng nam </option>
                                <option value="7" <?= ($item_td['huong_chinh'] == 7) ? 'selected' : '' ?>>T??y b???c </option>
                                <option value="8" <?= ($item_td['huong_chinh'] == 8) ? 'selected' : '' ?>>T??y nam </option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box7--------------------------------------------------------------------- -->
                <div class="ctn_ct_box7 d_flex fl_cl">
                    <p class="ctn_ct_b7_title p_600_s16_l19 cl_cam">
                        Kh??c
                    </p>
                    <div class="ctn_ct_b7_fr d_flex fl_row">
                        <div class="b7_fr1 d_flex fl_cl al_ct">
                            <p class="b7_fr1_title p_400_s15_l18">
                                Gi???y t??? ph??p l??
                            </p>
                            <select name="giayto" id="" class="b7_fr1_select slect-hang">
                                <option value="">Cho??n</option>
                                <option value="1" <?= ($item_td['giay_to_phap_ly'] == 1) ? 'selected' : '' ?>>???? c?? s???</option>
                                <option value="2" <?= ($item_td['giay_to_phap_ly'] == 2) ? 'selected' : '' ?>>??ang ch??? s???</option>
                                <option value="3" <?= ($item_td['giay_to_phap_ly'] == 3) ? 'selected' : '' ?>>Gi???y t??? kh??c</option>
                            </select>
                        </div>
                        <div class="b7_fr2 d_flex fl_cl al_ct">
                            <p class="b7_fr2_title p_400_s15_l18">
                                T??nh tr???ng n???i th???t
                            </p>
                            <select name="tinhtrang_nt" id="" class="b7_fr2_select slect-hang">
                                <option value="">Cho??n</option>
                                <option value="1" <?= ($item_td['tinh_trang_noi_that'] == 1) ? 'selected' : '' ?>>N???i th???t cao c???p</option>
                                <option value="2" <?= ($item_td['tinh_trang_noi_that'] == 2) ? 'selected' : '' ?>>N???i th???t ?????y ?????</option>
                                <option value="3" <?= ($item_td['tinh_trang_noi_that'] == 3) ? 'selected' : '' ?>>Ho??n thi???n c?? b???n</option>
                                <option value="4" <?= ($item_td['tinh_trang_noi_that'] == 4) ? 'selected' : '' ?>>B??n giao th??</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b7_ft d_flex fl_cl">
                        <p class="b7_ft_title p_400_s15_l18">?????c ??i???m nh?? ?????t</p>
                        <div class="b7_ft d_flex fl_row">
                            <div class="b7_ft1 d_flex fl_row al_ct">
                                <input name="dacdiem" value="1" <?= (in_array(1, explode(',', $item_td['dac_diem']))) ? 'checked' : '' ?> type="checkbox" class="b7_ft1_input img24 cursor_Pt checkbox_dacdiem">
                                <p class="b7_ft1_p p_400_s14_l17 pdl_10">H???m xe h??i</p>
                            </div>
                            <div class="b7_ft2 d_flex fl_row al_ct">
                                <input name="dacdiem" value="2" <?= (in_array(2, explode(',', $item_td['dac_diem']))) ? 'checked' : '' ?> type="checkbox" class="b7_ft2_input img24 cursor_Pt checkbox_dacdiem">
                                <p class="b7_ft2_p p_400_s14_l17 pdl_10">N??? h???u</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box8--------------------------------------------------------------------- -->
                <div class="ctn_ct_box8 d_flex fl_cl">
                    <p class="ctn_ct_b8_title p_600_s16_l19 cl_cam">
                        Di???n t??ch
                    </p>
                    <div class="ctn_ct_b8_fr d_flex fl_row">
                        <div class="b8_fr1 d_flex fl_cl box_input_infor">
                            <p class="b8_fr1_title p_400_s15_l18">
                                Di???n t??ch ?????t <span class="cl_red">*</span>
                            </p>
                            <div class="b8_fr1_content d_flex fl_row jtf_spb">
                                <input name="dientich" type="text" class="b8_fr1_input p_400_s14_l17" value="<?= $item_td['dien_tich'] ?>" autocomplete="off" placeholder="Di???n t??ch ?????t" oninput="<?= $oninput ?>">
                                <p class="b8_fr1_donvido">m<sup>2</sup></p>
                            </div>
                        </div>
                        <div class="b8_fr2 d_flex fl_cl">
                            <p class="b8_fr2_title p_400_s15_l18">
                                Di???n t??ch s??? d???ng
                            <div class="b8_fr2_content d_flex fl_row jtf_spb">
                                <input name="dientichsd" type="text" class="b8_fr2_input p_400_s14_l17" value="<?= ($item_td['dientichsd'] != 0) ? $item_td['dientichsd'] : '' ?>" autocomplete="off" placeholder="Di???n t??ch s??? d???ng" oninput="<?= $oninput ?>">
                                <p class="b8_fr2_donvido">m<sup>2</sup></p>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b8_ft d_flex fl_row">
                        <div class="b8_ft1 d_flex fl_cl">
                            <p class="b8_ft1_title p_400_s15_l18">
                                Chi???u d??i
                            <div class="b8_ft1_content d_flex fl_row jtf_spb">
                                <input name="chieudai" type="text" class="b8_ft1_input p_400_s14_l17" value="<?= $item_td['chieu_dai'] ?>" autocomplete="off" placeholder="Chi???u d??i" oninput="<?= $oninput ?>">
                                <p class="b8_ft1_donvido">m</p>
                            </div>
                        </div>
                        <div class="b8_ft2 d_flex fl_cl">
                            <p class="b8_ft2_title p_400_s15_l18">
                                Chi???u ngang
                            <div class="b8_ft2_content d_flex fl_row jtf_spb">
                                <input name="chieungang" type="text" class="b8_ft2_input p_400_s14_l17" value="<?= $item_td['chieu_rong'] ?>" autocomplete="off" placeholder="Chi???u ngang" oninput="<?= $oninput ?>">
                                <p class="b8_ft2_donvido">m</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
                <? include("../includes/inc_new/bottom_dangtin.php"); ?>

            </div>
        </form>
        <div class="v_container d_none"></div>
    </section>

    <? include '../modals/md_danh_muc_tin_dang.php' ?>
    <? include '../modals/md_dia_chi.php' ?>
    <? include '../modals/tbao_tcong.php' ?>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <!-- footer -->
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script src="/js/m_raonhanh_new.js"></script>
    <script>
        // dem so ki tu trong textarea
        function textCounter(e, cnt) {
            var id_input_dem = document.getElementById(cnt);
            id_input_dem.value = e.value.length;
        }
        //
        $('.check_mb_ct').click(function() {
            var id_nhucau = $("input[name='ban_thue']:checked").val();
            var id_dm = $(".b1_fr2_title_p").attr("data");
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
        $(".b11_btn_dangtin").click(function() {
            $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
            $("#xoa_tddang_tin").addClass("b11dc_btn_dangtin");
            var form_bds_nhatrongngo = $("#form_bds_nhatrongngo");
            form_bds_nhatrongngo.validate({
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
                    td_diachi_nha: "required",
                    td_gia_datcoc: "required",
                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    so_phongngu: "required",
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                },
                messages: {
                    ban_thue: "Vui l??ng ch???n nhu c???u",
                    tieu_de: {
                        required: "Vui l??ng nh???p ti??u ?????",
                        minlength: "ti??u ????? ??t nh???t 40 k?? t???",
                        maxlength: "ti??u ????? nhi???u nh???t 70 k?? t???",
                    },
                    dientich: "Vui l??ng nh???p di???n t??ch",
                    td_gia_spham: "Vui l??ng nh???p ????? gi?? s???n ph???m",
                    chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                    td_diachi_nha: "Vui lo??ng nh???p ??i??a chi?? to??a nha??",
                    td_gia_datcoc: "Vui l??ng nh???p gia?? ?????t co??c",
                    mota: {
                        required: "Vui l??ng nh???p m?? t???",
                        minlength: "M?? t??? ??t nh???t 10 k?? t???",
                        maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                    },
                    so_phongngu: "Vui l??ng ch???n s??? ph??ng ng???",
                    sdt_lienhe: {
                        required: "Nh???p s??? ??i???n tho???i li??n h???",
                    },
                },
            });
            if (form_bds_nhatrongngo.valid() === false) {
                $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
                $("#xoa_tddang_tin").addClass("b11_btn_dangtin");
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
            if (form_bds_nhatrongngo.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                $("#xoa_tddang_tin").addClass("b11dc_btn_dangtin");
                var user_id = $("#form_bds_nhatrongngo").attr("data");
                var user_type = $("#form_bds_nhatrongngo").attr("data1");
                var id_nd = $(".b1_fr2_title_p").attr("data1");
                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var ten_toanha = $("input[name='ten_toanha']").val();
                var tongso_tang = $("select[name='so_tang']").val();
                var huong_cua = $("select[name='huong_cua']").val();
                var so_phongngu = $("select[name='so_phongngu']").val();
                var so_phong_vs = $("select[name='so_nhavs']").val();
                var giayto = $("select[name='giayto']").val();
                var tinhtrangnt = $("select[name='tinhtrang_nt']").val();
                var arr_dacdiem = [];
                $('.checkbox_dacdiem').each(function() {
                    if ($(this).is(":checked")) {
                        var a = $(this).val();
                        arr_dacdiem.push(a);
                    }
                })
                var dientich = $("input[name='dientich']").val();
                var dientichsudung = $("input[name='dientichsd']").val();
                var chieudai = $("input[name='chieudai']").val();
                var chieungang = $("input[name='chieungang']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                } else {
                    var td_gia_spham = $("input[name='td_gia_spham']").val();
                };
                var dvi_tien = $("select[name='dvi_tien']").val();
                var td_gia_datcoc = $("input[name='td_gia_datcoc']").val();
                var dc_new_unit = $("select[name='dc_new_unit']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var ctiet_dmuc = $("select[name='chitiet_dm']").val();
                var tinh_thanh = $("select[name='thanhpho']").val();
                var quan_huyen = $("select[name='quanhuyen']").val();
                var phuong_xa = $("select[name='phuongxa']").val();
                var so_nha = $("input[name='md_so_nha']").val();
                var dia_chi = $("input[name='td_diachi_nha']").val();
                // tr??????ng m????i
                var td_diachi_nha = $("input[name='td_dia_chi']").val();
                var td_macan = $("input[name='td_macan']").val();
                var td_htmch_rt = $("input[name='td_htmch_rt']:checked").val();
                var td_tenpk_lo = $("input[name='td_tenpk_lo']").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();

                // l???y ???nh cu??
                var anh_dd = [];

                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
                    }
                });
                var fd = new FormData();
                fd.append('user_id', user_id);
                fd.append('user_type', user_type);
                fd.append('id_nd', id_nd);
                fd.append('ban_thue', ban_thue);
                fd.append('tieu_de', tieu_de);
                fd.append('ten_toanha', ten_toanha);
                fd.append('tongso_tang', tongso_tang);
                fd.append('huong_cua', huong_cua);
                fd.append('so_phongngu', so_phongngu);
                fd.append('so_phong_vs', so_phong_vs);
                fd.append('giayto', giayto);
                fd.append('tinhtrangnt', tinhtrangnt);
                fd.append('dacdiem', arr_dacdiem);
                fd.append('dientich', dientich);
                fd.append('dientichsudung', dientichsudung)
                fd.append('chieudai', chieudai);
                fd.append('chieungang', chieungang);
                fd.append('td_gia_spham', td_gia_spham);
                fd.append('dvi_tien', dvi_tien);
                fd.append('td_gia_datcoc', td_gia_datcoc);
                fd.append('dc_new_unit', dc_new_unit);
                fd.append('mo_ta', mo_ta);
                fd.append('ctiet_dmuc', ctiet_dmuc);
                fd.append('tinh_thanh', tinh_thanh);
                fd.append('quan_huyen', quan_huyen);
                fd.append('phuong_xa', phuong_xa);
                fd.append('so_nha', so_nha);
                fd.append('dia_chi', dia_chi);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
                fd.append('td_diachi_nha', td_diachi_nha);
                fd.append('td_macan', td_macan);
                fd.append('td_tenpk_lo', td_tenpk_lo);
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('td_htmch_rt', td_htmch_rt);
                // l???y ???nh c??
                fd.append('anh_dd', anh_dd);
                // end


                for (var i = 0; i < m_arr_anh.length; i++) {
                    if (m_arr_anh[i] != 'undefined') {
                        fd.append('files[]', m_arr_anh[i]);
                    }
                };
                var video = $("#cl-upload-video-file")[0].files;
                fd.append('file', video[0]);
                // lay video cu
                var video_cu = $(".avt_xoavideo").attr("data");
                fd.append('video_cu', video_cu);
                // end
                $.ajax({
                    url: '/ajax_bds/chinhsua_bds_nhatrongngo.php',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == "") {
                            tbao_dtin_tcong();
                        } else {
                            alert(data);
                            $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
                            $("#xoa_tddang_tin").addClass("b11_btn_dangtin");
                        }
                    }
                })
            }
        })
    </script>
    <script>
        function xem_trc_tin() {
            var form_bds_nhatrongngo = $(".form-dtin-cont");
            form_bds_nhatrongngo.validate({
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
                    td_diachi_nha: "required",
                    td_gia_datcoc: "required",
                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    so_phongngu: "required",
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                },
                messages: {
                    ban_thue: "Vui l??ng ch???n nhu c???u",
                    tieu_de: {
                        required: "Vui l??ng nh???p ti??u ?????",
                        minlength: "ti??u ????? ??t nh???t 40 k?? t???",
                        maxlength: "ti??u ????? nhi???u nh???t 70 k?? t???",
                    },
                    dientich: "Vui l??ng nh???p di???n t??ch",
                    td_gia_spham: "Vui l??ng nh???p ????? gi?? s???n ph???m",
                    chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                    td_diachi_nha: "Vui lo??ng nh???p ??i??a chi?? to??a nha??",
                    td_gia_datcoc: "Vui l??ng nh???p gi?? ?????t co??c",
                    mota: {
                        required: "Vui l??ng nh???p m?? t???",
                        minlength: "M?? t??? ??t nh???t 10 k?? t???",
                        maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                    },
                    so_phongngu: "Vui l??ng ch???n s??? ph??ng ng???",
                    sdt_lienhe: {
                        required: "Nh???p s??? ??i???n tho???i li??n h???",
                    },
                },
            });
            if (form_bds_nhatrongngo.valid() === false) {
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
            if (form_bds_nhatrongngo.valid() === true) {

                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var ten_toanha = $("input[name='ten_toanha']").val();
                var tongso_tang = $("select[name='so_tang']").val();
                var huong_cua = $("select[name='huong_cua']").val();
                var so_phongngu = $("select[name='so_phongngu']").val();
                var so_phong_vs = $("select[name='so_nhavs']").val();
                var giayto = $("select[name='giayto']").val();
                var tinhtrangnt = $("select[name='tinhtrang_nt']").val();
                var dientich = $("input[name='dientich']").val();
                var chieudai = $("input[name='chieudai']").val();
                var chieungang = $("input[name='chieungang']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                var td_gia_datcoc = $("input[name='td_gia_datcoc']").val();
                var td_diachi_nha = $("input[name='td_diachi_nha']").val();
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
                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
                    }
                });
                var fd = new FormData();
                fd.append("id_dmuc", id_dm);
                fd.append('loai_sp', ban_thue);
                fd.append('tieu_de', tieu_de);
                fd.append('loai_sp3', ten_toanha);
                fd.append('loai_sp5', tongso_tang);
                fd.append('loai_sp6', huong_cua);
                fd.append('loai_sp7', so_phongngu);
                fd.append('loai_sp8', so_phong_vs);
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
                fd.append('avt_anh', arr_src.concat(anh_dd));
                fd.append('phan_biet', phan_biet);
                fd.append('donvi_ban', donvi_ban);
                fd.append('td_diachi_nha', td_diachi_nha);
                fd.append('loai_sp16', td_gia_datcoc);
                fd.append('td_diachi_nha', td_diachi_nha);
                fd.append('loai_sp16', td_gia_datcoc);


                $.ajax({
                    url: '/render/xemtrc_tdang.php',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        $(".v_container").removeClass("d_none");
                        $(".v_container").html(data);
                        $(".form_bds_chung").addClass("d_none");
                    }
                })
            }
        }
    </script>

</body>

</html>