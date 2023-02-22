<?
include("config.php");
$id_nd = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_nd != 0) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];

    $list_tin = new db_query("SELECT `new`.`new_id`, `new_title`,`link_title`,`new_money`, `new_cate_id`, `new_city`, `new_user_id`, `new_image`,
                            `new_unit`, `new_phone`, `new_email`, `new_address`, `quan_huyen`, `phuong_xa`, `new_sonha`, `datcoc`, `dc_unit`,
                            `dia_chi`, `new_video`, `new_ctiet_dmuc`, `new_description`, `can_ban_mua`, `ten_toa_nha`,
                            `loai_hinh_canho`, `tang_so`, `so_pngu`,`so_pve_sinh`,`huong_chinh`, `huong_ban_cong`, `tinh_trang_bds`, `giay_to_phap_ly`,
                            `tinh_trang_noi_that`, `dien_tich`, `chieu_dai`, `chieu_rong`, `cangoc`, `td_block_thap`, `canhan_moigioi`,
                            `td_macanho`, `td_htmch_rt` FROM `new`
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
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 27 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
        $result_ban = ($ban->result_array());
    } else {
        header('Location: /');
    }
} else {
    header("Location: / ");
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa bất động sản chung cư</title>
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
    <section id="m_dangtin_bds_chungcu">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Chỉnh sửa tin đăng</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_bds_chungcu" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục đăng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="27" data1="<?= $id_nd ?>">
                                Bất động sản <span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> Căn hộ, chung cư
                            </p>
                        </div>
                    </div>
                    <div class="ctn_ct_b1_fr3 d_flex fl_row al_ct">
                        <label class="b1_fr3_btn1" onclick="checked_input(this)">
                            <input name="ban_thue" type="radio" class="b1_fr3_ip1 fr3_ipmuaban_chothue check_mb_ct" value="1" <?= ($item_td['can_ban_mua'] == 1) ? 'checked' : '' ?>>
                            <p class="b1_fr3_lb2 b1_fr3_lb p_400_s14_l17 <?= ($item_td['can_ban_mua'] == 1) ? 'active_mb_ct' : '' ?>">Mua bán</p>
                        </label>
                        <label class="b1_fr3_btn2" onclick="checked_input(this)">
                            <input name="ban_thue" type="radio" class="b1_fr3_ip2 fr3_ipmuaban_chothue check_mb_ct" value="2" <?= ($item_td['can_ban_mua'] == 2) ? 'checked' : '' ?>>
                            <p class="b1_fr3_lb2 b1_fr3_lb p_400_s14_l17 <?= ($item_td['can_ban_mua'] == 2) ? 'active_mb_ct' : '' ?>" data="2" id="">Cho thuê</p>
                        </label>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ---------------------------------------box3 --------------------------------------------------------------------->
                <div class="ctn_ct_box3">
                    <p class="ctn_ct_b3_title p_600_s16_l19 cl_cam">Tiêu đề và mô tả</p>
                    <div class="ctn_ct_b3_fr">
                        <div class="ctn_ct_b3_fr1 box_input_infor">
                            <p class="b3_fr1_title p_400_s15_l18">Tiêu đề <span class="cl_red">*</span></p>
                            <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tiêu đề" autocomplete="off">
                            <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">lớn hơn 40, nhỏ hơn 70 ký tự</p>
                        </div>
                        <div class="ctn_ct_b3_fr2 d_flex fl_cl">
                            <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                                <div class="b3_fr2_gia box_input_infor <?= ($item_td['can_ban_mua'] == 2) ? 'active_gia' : '' ?>">
                                    <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" name="td_gia_spham" value="<?= ($item_td['new_money'] != 0) ? number_format($item_td['new_money']) : '' ?>" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off" <?= ($item_td['new_money'] == 0) ? 'disabled' : '' ?>>
                                        <div class="donvitien p_400_s14_l17">
                                            <select class="dt-money-up donvi_ban" name="dvi_tien">
                                                <option value="1" <?= ($item_td['new_unit'] == 1) ? 'selected' : '' ?>>VNĐ</option>
                                                <option value="2" <?= ($item_td['new_unit'] == 2) ? 'selected' : '' ?>>USD</option>
                                                <option value="3" <?= ($item_td['new_unit'] == 3) ? 'selected' : '' ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="b3_fr2_datcoc box_input_infor" <?= ($item_td['can_ban_mua'] == 2) ? "style='display: block'" : "style='display: none'" ?>>
                                    <p class="b3_fr2_datcoc_tt p_400_s15_l18">Đặt cọc <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_datcoc_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" name="td_gia_datcoc" value="<?= ($item_td['datcoc'] != 0) ? number_format($item_td['datcoc']) : '' ?>" class="b3_fr2_datcoc_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                                        <div class="donvitien p_400_s14_l17">
                                            <select class="dt-money-up donvi_ban" name="dc_new_unit">
                                                <option value="1" <?= ($item_td['dc_unit'] == 1) ? 'selected' : '' ?>>VNĐ</option>
                                                <option value="2" <?= ($item_td['dc_unit'] == 2) ? 'selected' : '' ?>>USD</option>
                                                <option value="3" <?= ($item_td['dc_unit'] == 3) ? 'selected' : '' ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                                <input name="td_lienhe_ngban" type="checkbox" <?= ($item_td['new_money'] == 0) ? 'checked' : '' ?> class="b3_fr2_lhhg_input m_lienhenguoiban_cb img24 cursor_Pt">
                                <p class="b3_fr2_lhhg_text pdl_10">Liên hệ người bán để hỏi giá</p>
                            </div>
                        </div>
                        <div class="ctn_ct_b3_fr3 box_input_infor">
                            <p class="b3_fr3_title p_400_s15_l18">Mô tả <span class="cl_red">*</span></p>
                            <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"><?= nl2br($item_td['new_description']) ?></textarea>
                            <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                                <input type="text" name="count" id="count" value="<?= strlen($item_td['new_description']) ?>"> / 10000 ký tự
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box4--------------------------------------------------------------------- -->
                <div class="ctn_ct_box4 d_flex fl_cl">
                    <p class="ctn_ct_b4_title p_600_s16_l19 cl_cam">Tên, địa chỉ bất động sản</p>
                    <div class="ctn_ct_b4_fr d_flex fl_row al_ct">
                        <div class="ctn_ct_b4_fr1">
                            <p class="b4_fr1_title p_400_s15_l18">Tên toà nhà/Khu dân cư</p>
                            <input type="text" name="ten_toanha" value="<?= $item_td['ten_toa_nha'] ?>" class="b4_fr1_input p_400_s14_l17" placeholder="Tên toà nhà/Khu dân cư" autocomplete="off">
                        </div>
                        <div class="ctn_ct_b4_fr2 box_input_infor">
                            <p class="b4_fr2_title p_400_s15_l18">Địa chỉ căn hộ <span class="cl_red">*</span></p>
                            <input type="text" name="td_diachi_nha" class="td_ttin_diachi b4_fr2_input p_400_s14_l17" value="<?= $item_td['dia_chi'] ?>" data-tt="<?= $tinh_thanh ?>" data-qh="<?= $quan_huyen ?>" data-px="<?= $phuong_xa ?>" data-sn="<?= $so_nha ?>" placeholder="Địa chỉ căn hộ" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box5--------------------------------------------------------------------- -->
                <div class="ctn_ct_box5 d_flex fl_cl">
                    <p class="ctn_ct_b5_title p_600_s16_l19 cl_cam">Vị trí bất động sản</p>
                    <div class="ctn_ct_b5_fr d_flex fl_cl">
                        <div class="ctn_ct_b5_fr_child d_flex fl_row al_ct">
                            <div class="b5_fr1">
                                <p class="b5_fr1_title p_400_s15_l18">Mã căn</p>
                                <input type="text" name="td_macan" class="b5_fr1_input p_400_s14_l17" value="<?= $item_td['td_macanho'] ?>" placeholder="Mã căn" autocomplete="off">
                            </div>
                            <div class="b5_fr2">
                                <p class="b5_fr2_title p_400_s15_l18">Block/Tháp</p>
                                <input type="text" name="td_block_thap" class="b5_fr2_input p_400_s14_l17" value="<?= $item_td['td_block_thap'] ?>" placeholder="Block/Tháp" autocomplete="off">
                            </div>
                        </div>
                        <div class="b5_fr3">
                            <p class="b5_fr3_title p_400_s15_l18">Tầng số</p>
                            <input type="text" name="tangso" class="b5_fr3_input p_400_s14_l17" value="<?= $item_td['tang_so'] ?>" placeholder="Tầng số" autocomplete="off" oninput="<?= $oninput ?>">
                        </div>
                    </div>
                    <div class="ctn_ct_b5_ft d_flex fl_row al_ct">
                        <label for="" class="b5_ft_label">
                            <input name="td_htmch_rt" type="checkbox" value="1" class="b5_ft_input img24 cursor_Pt" <?= ($item_td['td_htmch_rt'] == 1) ? 'checked' : '' ?> autocomplete="off">
                            <span class="b5_ft_span"></span>
                        </label>
                        <p class="b5_ft_title p_400_s14_l17 pdl_10">
                            Hiển thị mã căn hộ rao tin
                        </p>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box6--------------------------------------------------------------------- -->
                <div class="ctn_ct_box6 d_flex fl_cl">
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">Chi tiết bất động sản</p>
                    <p class="ctn_ct_box6_tinhtrangbds p_400_s15_l18">Tình trạng bất động sản <span class="cl_red">*</span></p>
                    <div class="ctn_ct_b6_box2 box_input_infor">
                        <div class="d_flex fl_row al_ct w100">
                            <div class="b6_box2_dabangiao d_flex fl_row al_ct">
                                <input type="radio" name="tinh_trang" value="1" class="b6_box2_dabangiao_ip img20" <?= ($item_td['tinh_trang_bds'] == 1) ? 'checked' : '' ?>>
                                <p class="b6_box2_dabangiao_text pdl_10 p_400_s14_l17">
                                    Đã bàn giao
                                </p>
                            </div>
                            <div class="b6_box2_chuabangiao d_flex fl_row al_ct">
                                <input type="radio" name="tinh_trang" value="2" class="b6_box2_chuabangiao_ip img20" <?= ($item_td['tinh_trang_bds'] == 2) ? 'checked' : '' ?>>
                                <p class="b6_box2_chuabangiao_text pdl_10 p_400_s14_l17">
                                    Chưa bàn giao
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_box">
                        <div class="b6_box d_flex fl_cl box_input_infor">
                            <p class="b6_box_title p_400_s15_l18">Loại hình căn hộ <span class="cl_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="loaihinh">
                                <option disabled value="">Loại hình căn hộ</option>
                                <option value="1" <?= ($item_td['loai_hinh_canho'] == 1) ? 'selected' : '' ?>>Chung cư</option>
                                <option value="2" <?= ($item_td['loai_hinh_canho'] == 2) ? 'selected' : '' ?>>Duplex</option>
                                <option value="3" <?= ($item_td['loai_hinh_canho'] == 3) ? 'selected' : '' ?>>Penthouse</option>
                                <option value="4" <?= ($item_td['loai_hinh_canho'] == 4) ? 'selected' : '' ?>>Căn hộ dịch vụ, mini</option>
                                <option value="5" <?= ($item_td['loai_hinh_canho'] == 5) ? 'selected' : '' ?>>Tập thể, cư xá</option>
                                <option value="6" <?= ($item_td['loai_hinh_canho'] == 6) ? 'selected' : '' ?>>Officetel</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row al_ct">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Số phòng ngủ <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang" name="so_phongngu">
                                <option value="" disabled>Chọn</option>
                                <? foreach ($db_tangphong as $so_pn) {
                                    if ($so_pn['type_zoom'] == 2) { ?>
                                        <option value="<?= $so_pn['id'] ?>" <?= ($so_pn['id'] == $item_td['so_pngu']) ? 'selected' : '' ?>><?= $so_pn['so_luong']; ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl">
                            <p class="b6_fr2_title p_400_s15_l18">Số nhà vệ sinh</p>
                            <select class="b6_fr2_select slect-hang" name="so_nhavs">
                                <option value="" class="p_400_s14_l17">Chọn</option>
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
                            <p class="b6_ft1_title p_400_s15_l18">Hướng ban công</p>
                            <select class="slect-hang hd_height36" name="huong_ban_cong">
                                <option value="">Chọn</option>
                                <option value="1" <?= ($item_td['huong_ban_cong'] == 1) ? 'selected' : '' ?>>Đông</option>
                                <option value="2" <?= ($item_td['huong_ban_cong'] == 2) ? 'selected' : '' ?>>Tây </option>
                                <option value="3" <?= ($item_td['huong_ban_cong'] == 3) ? 'selected' : '' ?>>Nam </option>
                                <option value="4" <?= ($item_td['huong_ban_cong'] == 4) ? 'selected' : '' ?>>Bắc </option>
                                <option value="5" <?= ($item_td['huong_ban_cong'] == 5) ? 'selected' : '' ?>>Đông bắc </option>
                                <option value="6" <?= ($item_td['huong_ban_cong'] == 6) ? 'selected' : '' ?>>Đông nam </option>
                                <option value="7" <?= ($item_td['huong_ban_cong'] == 7) ? 'selected' : '' ?>>Tây bắc </option>
                                <option value="8" <?= ($item_td['huong_ban_cong'] == 8) ? 'selected' : '' ?>>Tây nam </option>
                            </select>
                        </div>
                        <div class="b6_ft2 d_flex fl_cl">
                            <p class="b6_ft2_title p_400_s15_l18">Hướng của chính</p>
                            <select class="b6_ft2_select slect-hang" name="huong_cua">
                                <option value="">Hướng cửa chính</option>
                                <option value="1" <?= ($item_td['huong_chinh'] == 1) ? 'selected' : '' ?>>Đông</option>
                                <option value="2" <?= ($item_td['huong_chinh'] == 2) ? 'selected' : '' ?>>Tây </option>
                                <option value="3" <?= ($item_td['huong_chinh'] == 3) ? 'selected' : '' ?>>Nam </option>
                                <option value="4" <?= ($item_td['huong_chinh'] == 4) ? 'selected' : '' ?>>Bắc </option>
                                <option value="5" <?= ($item_td['huong_chinh'] == 5) ? 'selected' : '' ?>>Đông bắc </option>
                                <option value="6" <?= ($item_td['huong_chinh'] == 6) ? 'selected' : '' ?>>Đông nam </option>
                                <option value="7" <?= ($item_td['huong_chinh'] == 7) ? 'selected' : '' ?>>Tây bắc </option>
                                <option value="8" <?= ($item_td['huong_chinh'] == 8) ? 'selected' : '' ?>>Tây nam </option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box7--------------------------------------------------------------------- -->
                <div class="ctn_ct_box7 d_flex fl_cl">
                    <p class="ctn_ct_b7_title p_600_s16_l19 cl_cam">Khác</p>
                    <div class="ctn_ct_b7_fr d_flex fl_row">
                        <div class="b7_fr1 d_flex fl_cl al_ct">
                            <p class="b7_fr1_title p_400_s15_l18">Giấy tờ pháp lý</p>
                            <select name="giayto" class="b7_fr1_select slect-hang">
                                <option value="">Chọn</option>
                                <option value="1" <?= ($item_td['giay_to_phap_ly'] == 1) ? 'selected' : '' ?>>Đã có sổ</option>
                                <option value="2" <?= ($item_td['giay_to_phap_ly'] == 2) ? 'selected' : '' ?>>Đang chờ sổ</option>
                                <option value="3" <?= ($item_td['giay_to_phap_ly'] == 3) ? 'selected' : '' ?>>Giấy tờ khác</option>
                            </select>
                        </div>
                        <div class="b7_fr2 d_flex fl_cl al_ct">
                            <p class="b7_fr2_title p_400_s15_l18">
                                Tình trạng nội thất
                            </p>
                            <select name="tinhtrangnt" class="b7_fr2_select slect-hang">
                                <option value="">Chọn</option>
                                <option value="1" <?= ($item_td['tinh_trang_noi_that'] == 1) ? 'selected' : '' ?>>Nội thất cao cấp</option>
                                <option value="2" <?= ($item_td['tinh_trang_noi_that'] == 2) ? 'selected' : '' ?>>Nội thất đầy đủ</option>
                                <option value="3" <?= ($item_td['tinh_trang_noi_that'] == 3) ? 'selected' : '' ?>>Hoàn thiện cơ bản</option>
                                <option value="4" <?= ($item_td['tinh_trang_noi_that'] == 4) ? 'selected' : '' ?>>Bàn giao thô</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b7_ft d_flex fl_cl">
                        <p class="b7_ft_title p_400_s15_l18">Căn góc</p>
                        <div class="b7_ft d_flex fl_row">
                            <div class="b7_ft1 d_flex fl_row al_ct">
                                <input name="td_cangoc" type="radio" value="1" class="b7_ft1_input img20 cursor_Pt" <?= ($item_td['cangoc'] == 1) ? 'checked' : '' ?>>
                                <p class="b7_ft1_p p_400_s14_l17 pdl_10">Có</p>
                            </div>
                            <div class="b7_ft2 d_flex fl_row al_ct">
                                <input name="td_cangoc" type="radio" value="2" class="b7_ft2_input img20 cursor_Pt" <?= ($item_td['cangoc'] == 2) ? 'checked' : '' ?>>
                                <p class="b7_ft2_p p_400_s14_l17 pdl_10">Không</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box8--------------------------------------------------------------------- -->
                <div class="ctn_ct_box8 d_flex fl_cl box_input_infor">
                    <p class="ctn_ct_b8_title p_600_s16_l19 cl_cam">Diện tích</p>
                    <div class="ctn_ct_b8_fr d_flex fl_row">
                        <div class="b8_fr1 d_flex fl_cl">
                            <p class="b8_fr1_title p_400_s15_l18">Diện tích <span class="cl_red">*</span></p>
                            <div class="b8_fr1_content d_flex fl_row jtf_spb">
                                <input name="dientich" type="text" class="b8_fr1_input p_400_s14_l17" value="<?= $item_td['dien_tich'] ?>" autocomplete="off" placeholder="Diện tích" oninput="<?= $oninput ?>">
                                <p class="b8_fr1_donvido">m<sup>2</sup></p>
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
            });

            if (id_nhucau == 1) {
                $(this).parents(".container_content").find(".b3_fr2_datcoc").hide();
                $(this).parents(".container_content").find(".b3_fr2_gia").removeClass('active_gia');
            } else {
                $(this).parents(".container_content").find(".b3_fr2_datcoc").show();
                $(this).parents(".container_content").find(".b3_fr2_gia").addClass('active_gia');
            }
        });
        $(".b11_btn_dangtin").click(function() {
            $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
            $("#xoa_tddang_tin").addClass("b11dc_btn_dangtin");
            var form_bds_chungcu = $("#form_bds_chungcu");
            form_bds_chungcu.validate({
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
                    loaihinh: "required",
                    tinh_trang: "required",
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
                    ban_thue: "Vui lòng chọn nhu cầu",
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "tiêu đề ít nhất 40 ký tự",
                        maxlength: "tiêu đề nhiều nhất 70 ký tự",
                    },
                    dientich: "Vui lòng nhập diện tích",
                    td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
                    chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                    td_diachi_nha: "Vui lòng nhập địa chỉ tòa nhà",
                    td_gia_datcoc: "Vui lòng nhập giá đặt cọc",
                    loaihinh: "Vui lòng chọn loại hình căn hộ",
                    tinh_trang: "Vui lòng chọn tình trạng căn hộ",
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    so_phongngu: "Vui lòng chọn số phòng ngủ",
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                },
            });
            if (form_bds_chungcu.valid() === false) {
                $("#xoa_tddang_tin").addClass("b11_btn_dangtin");
                $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
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
            if (form_bds_chungcu.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                $("#xoa_tddang_tin").addClass("b11dc_btn_dangtin");
                var user_id = $("#form_bds_chungcu").attr("data");
                var user_type = $("#form_bds_chungcu").attr("data1");
                var id_cc = $(".b1_fr2_title_p").attr("data1");
                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var ten_toanha = $("input[name='ten_toanha']").val();
                var huong_cua = $("select[name='huong_cua']").val();
                var so_phongngu = $("select[name='so_phongngu']").val();
                var so_phong_vs = $("select[name='so_nhavs']").val();
                var giayto = $("select[name='giayto']").val();
                var tinhtrangnt = $("select[name='tinhtrangnt']").val();
                var dientich = $("input[name='dientich']").val();
                var chieudai = $("input[name='chieudai']").val();
                var chieungang = $("input[name='chieungang']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                } else {
                    var td_gia_spham = $("input[name='td_gia_spham']").val();
                };
                var dvi_tien = $("select[name='dvi_tien']").val();
                var td_gia_datcoc = $("input[name='td_gia_datcoc']").val();
                var dvi_dc = $("select[name='dc_new_unit']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var ctiet_dmuc = $("select[name='chitiet_dm']").val();
                var tinh_thanh = $("select[name='thanhpho']").val();
                var quan_huyen = $("select[name='quanhuyen']").val();
                var phuong_xa = $("select[name='phuongxa']").val();
                var so_nha = $("input[name='md_so_nha']").val();
                var dia_chi = $("input[name='td_diachi_nha']").val();
                var huong_ban_cong = $("select[name='huong_ban_cong']").val();
                // trường mới
                var td_diachi_nha = $("input[name='td_dia_chi']").val();
                var td_macan = $("input[name='td_macan']").val();
                var td_htmch_rt = $("input[name='td_htmch_rt']:checked").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var loai_hinh = $("select[name='loaihinh']").val();
                var tinh_trang = $("input[name='tinh_trang']:checked").val();
                var td_cangoc = $("input[name='td_cangoc']:checked").val();
                var td_block_thap = $("input[name='td_block_thap']").val();
                var tang_so = $("input[name='tangso']").val();

                // lấy ảnh cũ
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
                fd.append('id_cc', id_cc);
                fd.append('ban_thue', ban_thue);
                fd.append('tieu_de', tieu_de);
                fd.append('ten_toanha', ten_toanha);
                fd.append('huong_cua', huong_cua);
                fd.append('so_phongngu', so_phongngu);
                fd.append('so_phong_vs', so_phong_vs);
                fd.append('giayto', giayto);
                fd.append('tinhtrangnt', tinhtrangnt);
                fd.append('dientich', dientich);
                fd.append('chieudai', chieudai);
                fd.append('chieungang', chieungang);
                fd.append('td_gia_spham', td_gia_spham);
                fd.append('dvi_tien', dvi_tien);
                fd.append('td_gia_datcoc', td_gia_datcoc);
                fd.append('dvi_dc', dvi_dc);
                fd.append('mo_ta', mo_ta);
                fd.append('ctiet_dmuc', ctiet_dmuc);
                fd.append('tinh_thanh', tinh_thanh);
                fd.append('quan_huyen', quan_huyen);
                fd.append('phuong_xa', phuong_xa);
                fd.append('so_nha', so_nha);
                fd.append('dia_chi', dia_chi);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
                fd.append('huong_ban_cong', huong_ban_cong);
                // truong moi
                fd.append('td_diachi_nha', td_diachi_nha);
                fd.append('td_macan', td_macan);
                fd.append('td_block_thap', td_block_thap);
                fd.append('tang_so', tang_so);
                fd.append('td_htmch_rt', td_htmch_rt);
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('loai_hinh', loai_hinh);
                fd.append('tinh_trang', tinh_trang);
                fd.append('td_cangoc', td_cangoc);
                // lấy ảnh cũ
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
                    url: '/ajax_bds/chinhsua_bdschungcu.php',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    // beforeSend: function() {
                    //     $('.td-dang-tin').prop('disabled', true);
                    // },
                    success: function(data) {
                        if (data == "") {
                            tbao_dtin_tcong();
                        } else {
                            alert(data);
                            $("#xoa_tddang_tin").addClass("b11_btn_dangtin");
                            $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
                        }
                    }
                })
            }
        });

        function xem_trc_tin() {
            var form_bds_chungcu = $(".form-dtin-cont");
            form_bds_chungcu.validate({
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
                    loaihinh: "required",
                    tinh_trang: "required",
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
                    ban_thue: "Vui lòng chọn nhu cầu",
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "tiêu đề ít nhất 40 ký tự",
                        maxlength: "tiêu đề nhiều nhất 70 ký tự",
                    },
                    dientich: "Vui lòng nhập diện tích",
                    td_gia_spham: "Vui lòng nhập đủ giá sản phẩm",
                    chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                    td_diachi_nha: "Vui lòng nhập địa chỉ tòa nhà",
                    td_gia_datcoc: "Vui lòng nhập giá đặt cọc",
                    loaihinh: "Vui lòng chọn loại hình căn hộ",
                    tinh_trang: "Vui lòng chọn tình trạng căn hộ",
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    so_phongngu: "Vui lòng chọn số phòng ngủ",
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                },
            });
            if (form_bds_chungcu.valid() === false) {
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
            if (form_bds_chungcu.valid() === true) {
                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var ten_toanha = $("input[name='ten_toanha']").val();
                var tang_so = $("input[name='tangso']").val();
                var loai_hinh = $("input[name='loaihinh']:checked").val();
                var huong_cua = $("select[name='huong_cua']").val();
                var so_phongngu = $("select[name='so_phongngu']").val();
                var so_phong_vs = $("select[name='so_nhavs']").val();
                var giayto = $("select[name='giayto']").val();
                var tinhtrangnt = $("select[name='tinhtrangnt']").val();
                var dientich = $("input[name='dientich']").val();
                var chieudai = $("input[name='chieudai']").val();
                var chieungang = $("input[name='chieungang']").val();
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
                var td_gia_datcoc = $("input[name='td_gia_datcoc']").val();
                var td_diachi_nha = $("input[name='td_diachi_nha']").val();
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
                fd.append('loai_sp6', loai_hinh);
                fd.append('loai_sp7', tang_so);
                fd.append('loai_sp8', huong_cua);
                fd.append('loai_sp10', so_phong_vs);
                fd.append('loai_sp9', so_phongngu);
                fd.append('loai_sp11', giayto);
                fd.append('loai_sp12', tinhtrangnt);
                fd.append('loai_sp13', dientich);
                fd.append('loai_sp14', chieudai);
                fd.append('loai_sp15', chieungang);
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