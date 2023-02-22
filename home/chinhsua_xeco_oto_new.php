<?
include("config.php");
$id_nd = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_nd != 0) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];

    $list_tin = new db_query("SELECT `new`.`new_id`, `new_title`,`link_title`,`new_money`, `new_cate_id`, 
                                `new_city`, `new_user_id`, `new_image`, `new_create_time`,
                                `new_type`,`new_active`,`new_unit`, `new_name`, `new_phone`, 
                                `new_email`, `new_address`, `da_ban`,`chotang_mphi`, `quan_huyen`, 
                                `phuong_xa`, `new_sonha`,`dia_chi`, `new_video`, `new_ctiet_dmuc`,
                                `new_tinhtrang`,`new_baohanh`,`new_buy_sell`,`new_update_time`,
                                `new_description`,`hang`,`dong_xe`,`so_km_da_di`,`nam_san_xuat`,`hop_so`,
                                `nhien_lieu`,`xuat_xu`,`so_cho`,`mau_sac`,`kieu_dang`,
                                `td_bien_soxe`,`td_phien_ban`,`canhan_moigioi`,
                                `thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`   
                            FROM `new`LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                            WHERE `new`.`new_id` = $id_nd AND `new_user_id` = $acc_id LIMIT 1");

    if (mysql_num_rows($list_tin->result) > 0) {
        $item_td = mysql_fetch_assoc($list_tin->result);
        $avt_dangtin = $item_td['new_image'];
        $video_dangtin = $item_td['new_video'];
        $tinh_thanh = $item_td['new_city'];
        $quan_huyen = $item_td['quan_huyen'];
        $phuong_xa = $item_td['phuong_xa'];

        $hang = $item_td['hang'];
        if ($hang != 1286) {
            $query_dx = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_cha = $hang");
            $result_dx = $query_dx->result_array();
        }
        // tag danh muc
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 10 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
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
    <title>Chỉnh sửa xe cộ ô tô</title>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_new_dangtin_chung.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_new_dangtin.css?v=<?= $version ?>">
</head>

<body>
    <!-- header -->
    <? include "../includes/common/inc_header.php"; ?>
    <!-- content -->
    <section id="m_dangtin_xc_oto" class="xeco">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Chỉnh sửa tin</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_xeco_car" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>" data3="<?= $xacthuc_lket ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục chỉnh sửa <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="10">
                                Xe cộ<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" alt="" class="img_16">
                                </span> Ô tô
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ---------------------------------------box3 --------------------------------------------------------------------->
                <div class="ctn_ct_box3">
                    <p class="ctn_ct_b3_title p_600_s16_l19 cl_cam">
                        Tiêu đề và mô tả
                    </p>
                    <div class="ctn_ct_b3_fr">
                        <div class="ctn_ct_b3_fr1 box_input_infor">
                            <p class="b3_fr1_title p_400_s15_l18">Tiêu đề <span class="cl_red">*</span></p>
                            <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tiêu đề" autocomplete="off">
                            <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">lớn hơn 40, nhỏ hơn 70 ký tự</p>
                        </div>
                        <div class="ctn_ct_b3_fr2 d_flex fl_cl">
                            <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                                <div class="b3_fr2_gia box_input_infor">
                                    <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" value="<?= ($item_td['new_money'] != 0) ? number_format($item_td['new_money']) : "" ?>" <?= ($item_td['new_money'] == 0) ? 'disabled' : "" ?> id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                                        <div class="donvitien p_400_s14_l17">
                                            <select class="dt-money-up donvi_ban" name="dvi_tien">
                                                <option value="1" <? if ($item_td['new_unit'] == 1) echo 'selected' ?>>VNĐ</option>
                                                <option value="2" <? if ($item_td['new_unit'] == 2) echo 'selected' ?>>USD</option>
                                                <option value="3" <? if ($item_td['new_unit'] == 3) echo 'selected' ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box_lhhg_ctmp">
                                <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                                    <input name="td_lienhe_ngban" type="checkbox" value="0" class="b3_fr2_lhhg_input b3_fr2_input m_lienhenguoiban_cb img24 cursor_Pt" <?= ($item_td['chotang_mphi'] == 1) ? 'checked' : '' ?>>
                                    <p class="b3_fr2_lhhg_text pdl_10">Liên hệ người bán để hỏi giá</p>
                                </div>
                            </div>
                        </div>
                        <div class="ctn_ct_b3_fr3 box_input_infor">
                            <p class="b3_fr3_title p_400_s15_l18">
                                Mô tả <span class="cl_red">*</span>
                            </p>
                            <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"><?= $item_td['new_description'] ?></textarea>
                            <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                                <input type="text" name="count" id="count" value="0"> / 10000 ký tự
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box6--------------------------------------------------------------------- -->
                <div class="ctn_ct_box6 d_flex fl_cl">
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">
                        Chi tiết sản phẩm
                    </p>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">
                                Hãng xe <span class="cl_red">*</span>
                            </p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="hang_xe" onchange="m_hang_doi(this)" data="10">
                                <option value="" disabled selected>Chọn</option>
                                <? foreach ($db_hang as $rows) {
                                    if ($rows['id_parent'] == 10) { ?>
                                        <option <?= ($rows['id'] == $item_td['hang']) ? "selected" : "" ?> value="<?= $rows['id'] ?>"><?= $rows['ten_hang'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor">
                            <p class="b6_fr2_title p_400_s15_l18">
                                Năm sản xuất <span class="cl_red">*</span>
                            </p>
                            <div class="xc_nam_xs">
                                <select class="slect-hang  hd_height36" name="nam_san_xuat">
                                    <option value="" selected disabled>Chọn</option>
                                    <? foreach ($db_nsanxuat as $rows) : ?>
                                        <option <?= ($rows['id'] == $item_td['nam_san_xuat']) ? "selected" : "" ?> value="<?= $rows['id'] ?>"><?= $rows['nam_san_xuat'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_ft d_flex fl_row fl_st">
                        <div class="b6_ft1 m_dongxe d_flex fl_cl box_input_infor">
                            <? if ($hang == 1286) { ?>
                                <p class="b6_fr2_title p_400_s15_l18">
                                    Dòng xe <span class="cl_red">*</span>
                                </p>
                                <input type="text" name="dong_xe" class="dong_may input_infor_tag" autocomplete="off" placeholder="Nhập dòng xe" value="<?= $item_td['dong_xe'] ?>">
                            <? } else { ?>
                                <p class="b6_ft1_title p_400_s15_l18">
                                    Dòng xe <span class="cl_red">*</span>
                                </p>
                                <select id="dongxe" class="slect-hang  hd_height36" name="dong_xe">
                                    <? foreach ($result_dx as $dx) { ?>
                                        <option <?= ($dx['id'] == $item_td['dong_xe']) ? "selected" : "" ?> value="<?= $dx['id'] ?>"><?= $dx['ten_loai'] ?></option>
                                    <? } ?>
                                </select>
                            <? } ?>
                        </div>

                        <div class="b6_ft2 d_flex fl_cl box_input_infor">
                            <p class="b6_ft2_title p_400_s15_l18">
                                Phiên bản
                            </p>
                            <select class="b6_ft2_select slect-hang hd_height36" name="td_phien_ban">
                                <option selected value="" class="p_400_s14_l17 ">Chọn</option>

                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_hs d_flex fl_cl box_input_infor">
                        <p class="b6_hs_title">Hộp số <span class="cl_red">*</span> </p>
                        <div class="b6_hs_fr d_flex fl_row">
                            <div class="b6_hs_child b6_hs_td d_flex fl_row al_ct ">
                                <input type="radio" name="hop_so" value="1" class="img20 cursor_Pt b6_hs_td_input b6_hs_input" <?= ($item_td['hop_so'] == 1) ? "checked" : "" ?>>
                                <p class="b6_hs_td_text pdl_10">Tự động</p>
                            </div>
                            <div class="b6_hs_child b6_hs_san d_flex fl_row al_ct ">
                                <input type="radio" name="hop_so" value="2" class="img20 cursor_Pt b6_hs_san_input b6_hs_input" <?= ($item_td['hop_so'] == 2) ? "checked" : "" ?>>
                                <p class="b6_hs_san_text pdl_10">Số sàn</p>
                            </div>
                            <div class="b6_hs_child b6_hs_btd d_flex fl_row al_ct ">
                                <input type="radio" name="hop_so" value="3" class="img20 cursor_Pt b6_hs_btd_input b6_hs_input" <?= ($item_td['hop_so'] == 3) ? "checked" : "" ?>>
                                <p class="b6_hs_btd_text pdl_10">Bán tự động</p>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_nl d_flex fl_cl box_input_infor">
                        <p class="b6_nl_title">Nhiên liệu <span class="cl_red">*</span></p>
                        <div class="b6_nl_fr d_flex fl_row">
                            <div class="b6_nl_child b6_nl_xang d_flex fl_row al_ct ">
                                <input type="radio" name="nhien_lieu" value="1" class="img20 cursor_Pt b6_nl_xang_input b6_nl_input" <?= ($item_td['nhien_lieu'] == 1) ? "checked" : "" ?>>
                                <p class="b6_nl_xang_text pdl_10">Xăng</p>
                            </div>
                            <div class="b6_nl_child b6_nl_dau d_flex fl_row al_ct ">
                                <input type="radio" name="nhien_lieu" value="2" class="img20 cursor_Pt b6_nl_dau_input b6_nl_input" <?= ($item_td['nhien_lieu'] == 2) ? "checked" : "" ?>>
                                <p class="b6_nl_dau_text pdl_10">Dầu</p>
                            </div>
                            <div class="b6_nl_child b6_nl_hybrid d_flex fl_row al_ct ">
                                <input type="radio" name="nhien_lieu" value="3" class="img20 cursor_Pt b6_nl_hybrid_input b6_nl_input" <?= ($item_td['nhien_lieu'] == 3) ? "checked" : "" ?>>
                                <p class="b6_nl_hybrid_text pdl_10">Động cơ Hybrid</p>
                            </div>
                            <div class="b6_nl_child b6_nl_dien d_flex fl_row al_ct ">
                                <input type="radio" name="nhien_lieu" value="4" class="img20 cursor_Pt b6_nl_dien_input b6_nl_input" <?= ($item_td['nhien_lieu'] == 4) ? "checked" : "" ?>>
                                <p class="b6_nl_dien_text pdl_10">Điện</p>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_xxkd d_flex fl_row fl_st">
                        <div class="b6_xxkd_xuatxu d_flex fl_cl ">
                            <p class="b6_xxkd_xuatxu_title mgbt_5">
                                Xuất xứ
                            </p>
                            <select class="b6_xxkd_xuatxu_select slect-hang hd_height36" name="xuat_xu">
                                <option selected value="" class="p_400_s14_l17 ">Chọn</option>
                                <? foreach ($db_xuatxu as $xx) {
                                    if ($xx['id_parents'] == 8) {
                                ?>
                                        <option <?= ($xx['id_xuatxu'] == $item_td['xuat_xu']) ? 'selected' : '' ?> value="<?= $xx['id_xuatxu'] ?>"><?= $xx['noi_xuatxu'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_xxkd_kieudang d_flex fl_cl ">
                            <p class="b6_xxkd_kieudang_title mgbt_5">
                                Kiểu dáng
                            </p>
                            <select class="b6_xxkd_kieudang_select slect-hang hd_height36" name="kieu_dang">
                                <option selected value="" class="p_400_s14_l17 ">Chọn</option>
                                <? foreach ($db_nsp_hdang as $kd) {
                                    if ($kd['id_cha'] == 10) {
                                ?>
                                        <option <?= ($kd['id'] == $item_td['kieu_dang']) ? "selected" : "" ?> value="<?= $kd['id'] ?>"><?= $kd['name'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_scms d_flex fl_row fl_st">
                        <div class="b6_scms_socho d_flex fl_cl">
                            <p class="b6_scms_socho_title mgbt_5">
                                Số chỗ
                            </p>
                            <select class="b6_scms_socho_select slect-hang hd_height36" name="so_cho">
                                <option selected value="" class="p_400_s14_l17 ">Chọn</option>
                                <? foreach ($db_soluong as $sc) {
                                    if ($sc['id_parents'] == 10) {
                                ?>
                                        <option <?= ($sc['id'] == $item_td['so_cho']) ? "selected" : "" ?> value="<?= $sc['id'] ?>"><?= $sc['so_luong'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_scms_mausac d_flex fl_cl">
                            <p class="b6_scms_mausac_title mgbt_5">
                                Màu sắc
                            </p>
                            <select class="b6_scms_mausac_select slect-hang hd_height36" name="mau_sac">
                                <option selected value="" class="p_400_s14_l17 ">Chọn</option>
                                <? foreach ($db_mausac as $ms) {
                                    if ($ms['id_dm'] == 2) {
                                ?>
                                        <option <?= ($ms['id_color'] == $item_td['mau_sac']) ? "selected" : "" ?> value="<?= $ms['id_color'] ?>"><?= $ms['mau_sac'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_bs">
                        <div class="b6_bs_biensoxe">
                            <p class="b6_bs_biensoxe_title mgbt_5">
                                Biển số xe
                            </p>
                            <input type="text" name="td_bien_soxe" value="<?= $item_td['td_bien_soxe'] ?>" class="b6_bs_biensoxe_input" placeholder="Biển số xe">
                        </div>
                    </div>
                    <div class="ctn_ct_b6_tinhtrang d_flex fl_cl">
                        <p class="b6_tinhtrang_title">Tình trạng <span class="cl_red">*</span></p>
                        <div class="b6_tinhtrang_fr d_flex fl_row">
                            <div class="b6_tinhtrang_cu d_flex fl_row">
                                <input type="radio" name="cu_moi" value="2" class="img20 cursor_Pt b6_tinhtrang_cu_input b6_tinhtrang_chung" <?= ($item_td['new_tinhtrang'] == 2) ? "checked" : "" ?>>
                                <p class="b6_tinhtrang_cu_text pdl_10">Cũ</p>
                            </div>
                            <div class="b6_tinhtrang_moi d_flex fl_row">
                                <input type="radio" name="cu_moi" value="1" class="img20 cursor_Pt b6_tinhtrang_moi_input b6_tinhtrang_chung" <?= ($item_td['new_tinhtrang'] == 1) ? "checked" : "" ?>>
                                <p class="b6_tinhtrang_moi_text pdl_10">Mới</p>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_sokmdadi">
                        <div class="b6_sokmdadi d_flex fl_cl flex_start box_input_infor">
                            <p class="b6_sokmdadi_title mgbt_5">
                                Số Km đã đi <span class="cl_red">*</span>
                            </p>
                            <input type="text" class="b6_sokmdadi_input" value="<?= $item_td['so_km_da_di'] ?>" placeholder="Số Km đã đi" name="km_di" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                        </div>
                    </div>
                </div>
                <!-- ---------------------------------------------------------------------Thong tin ban hang------------------------------------------------------------------------- -->
                <? include("../includes/inc_new/thongtinbanhang.php"); ?>

                <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
                <? include("../includes/inc_new/bottom_dangtin_chung.php"); ?>

            </div>
        </form>
        <div class="v_container d_none"></div>
    </section>

    <? include '../modals/md_danh_muc_tin_dang.php' ?>
    <? include '../modals/md_dia_chi.php' ?>
    <? include '../modals/tbao_tcong.php' ?>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <!-- footer -->
    <script src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script src="/js/m_raonhanh_new.js"></script>

    <script>
        $(".b11_btn_chinhsua").click(function() {
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
                    nam_san_xuat: "required",
                    cu_moi: "required",
                    hop_so: "required",
                    nhien_lieu: "required",
                    td_gia_spham: "required",
                    chitiet_dm: "required",
                    km_di: "required",

                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                    so_luong_kho: "required",
                    soluong_min: "required",
                    soluong_max: "required",
                    loai_khuyenmai: "required",
                    giatri_khuyenmai: "required",
                    ngay_bat_dau: "required",
                    ngay_ket_thuc: "required",
                    phi_van_chuyen: "required",
                    van_chuyen: "required",
                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Tiêu đề ít nhất 40 ký tự",
                        maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    },
                    hang_xe: "Vui lòng chọn hãng xe",
                    dong_xe: "Vui lòng không để trống trường này",
                    nam_san_xuat: "Vui lòng chọn năm sản xuất",
                    cu_moi: "Vui lòng chọn tình trạng xe",
                    hop_so: "Vui lòng chọn hộp số xe",
                    nhien_lieu: "Vui lòng chọn nhiên liệu sử dụng",
                    td_gia_spham: "Vui lòng nhập giá sản phẩm",
                    chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                    km_di: "Vui lòng nhập số km đã đi",
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                    so_luong_kho: "Vui lòng nhập số lượng kho",
                    soluong_min: "Vui lòng nhập số lượng tối thiểu",
                    soluong_max: "Vui lòng nhập số lượng tối đa",
                    loai_khuyenmai: "Vui lòng chọn loại khuyến mại",
                    giatri_khuyenmai: "Vui lòng nhập giá trị khuyến mại",
                    ngay_bat_dau: "Vui lòng chọn ngày bắt đầu",
                    ngay_ket_thuc: "Vui lòng chọn ngày kết thúc",
                    phi_van_chuyen: "Vui lòng nhập phí vận chuyển",
                    van_chuyen: "Vui lòng chọn lọai phí vận chuyển",
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
            };
            if (form_xeco_car.valid() === true) {
                var user_id = $("#form_xeco_car").attr("data");
                var user_type = $("#form_xeco_car").attr("data1");
                var id_nd = $("#form_xeco_car").attr("data2");
                var tieu_de = $("input[name='tieu_de']").val();
                var hang_xe = $("select[name='hang_xe']").val();
                var dong_xe = $(".dong_may").val();
                var nam_san_xuat = $("select[name='nam_san_xuat']").val();
                var hop_so = $("input[name='hop_so']:checked").val();
                var nhien_lieu = $("input[name='nhien_lieu']:checked").val();
                var xuat_xu = $("select[name='xuat_xu']").val();
                var so_cho = $("select[name='so_cho']").val();
                var mau_sac = $("select[name='mau_sac']").val();
                var kieu_dang = $("select[name='kieu_dang']").val();
                var bao_hanh = $("select[name='bao_hanh']").val();
                var tinhtrang = $("input[name='cu_moi']:checked").val();
                var km_di = $("input[name='km_di']").val();
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
                var arr_diachi = [];
                $('.m_diachi_xc').each(function() {
                    var dia_chi = $(this).val();
                    arr_diachi.push(dia_chi + ";");
                })
                // truong moi
                var td_bien_soxe = $("input[name='td_bien_soxe']").val();
                var td_phien_ban = $("select[name='td_phien_ban']").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var td_lienhe_ngban = $("input[name='td_lienhe_ngban']:checked").val();
                // -------------------------da xac thuc thanh toan----------------------------------------------
                var xac_thuc = $("#form_xeco_car").attr("data3");
                var loai_khuyenmai = $("select[name='loai_khuyenmai']").val();
                var giatri_khuyenmai = $("input[name='giatri_khuyenmai']").val();
                var ngay_bat_dau = $("input[name='ngay_bat_dau']").val();
                var ngay_ket_thuc = $("input[name='ngay_ket_thuc']").val();
                var soluong_min = $("input[name='soluong_min']").val();
                var soluong_max = $("input[name='soluong_max']").val();
                var van_chuyen = $("input[name='van_chuyen']:checked").val();
                var phi_van_chuyen = $("input[name='phi_van_chuyen']").val();

                var donvi_gia_vc = $("select[name='dvi_tien_vc']").val();
                var sl_kho_don = $("input[name='sl_kho_don']").val();
                //  nhom phan loai san pham
                var arr_nhomplsp = [];
                $('.nhomphanloaisp_select').each(function() {
                    var nhompl_sp = $(this).val();
                    if (nhompl_sp != "") {
                        arr_nhomplsp.push(nhompl_sp + ";");
                    }
                })
                // cac loai san pham
                var arr_plsp = [];
                $('.phanloaisp_select').each(function() {
                    var pl_sp = $(this).val();
                    if (pl_sp != "") {
                        arr_plsp.push(pl_sp + ";");
                    }
                })
                // loai
                var arr_lsp = [];
                $('.footer_bpl_loai').each(function() {
                    var loai_sp = $(this).text();
                    if (loai_sp != "") {
                        arr_lsp.push(loai_sp + ";");
                    }
                })
                // so luong kho
                var arr_slk = [];
                $('.ft_bpl_slk').each(function() {
                    var slk = $(this).val();
                    if (slk != "") {
                        arr_slk.push(slk + ";");
                    }
                })
                // don vi tien xac thuc
                var arr_dvtxt = [];
                $('.donvitien_xt').each(function() {
                    var dvtxt = $(this).val();
                    if (dvtxt != "") {
                        arr_dvtxt.push(dvtxt + ";");
                    }
                })
                // gia ban
                var arr_gia = [];
                $('.txt_gia_bpl').each(function() {
                    var gia_sp = $(this).val();
                    if (gia_sp != "") {
                        arr_gia.push(gia_sp + ";");
                    }

                })
                // -------------------------end da xac thuc thanh toan----------------------------------------------
                // lấy ảnh cũ
                var anh_dd = [];

                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
                    }
                });

                // alert(user_id);
                var fd = new FormData();
                fd.append('user_id', user_id);
                fd.append('user_type', user_type);
                fd.append('id_nd', id_nd);
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
                fd.append('dia_chi', arr_diachi);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
                // truong moi
                fd.append('td_bien_soxe', td_bien_soxe);
                fd.append('td_phien_ban', td_phien_ban);
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('td_lienhe_ngban', td_lienhe_ngban);
                // -------------------------da xac thuc thanh toan----------------------------------------------
                fd.append('xac_thuc', xac_thuc);
                fd.append('loai_khuyenmai', loai_khuyenmai);
                fd.append('giatri_khuyenmai', giatri_khuyenmai);
                fd.append('ngay_bat_dau', ngay_bat_dau);
                fd.append('ngay_ket_thuc', ngay_ket_thuc);
                fd.append('soluong_min', soluong_min);
                fd.append('soluong_max', soluong_max);
                fd.append('van_chuyen', van_chuyen);
                fd.append('phi_van_chuyen', phi_van_chuyen);

                fd.append('dvi_tien_xt', arr_dvtxt);
                fd.append('nhomphanloaisp_xt', arr_nhomplsp);
                fd.append('phanloaisp_xt', arr_plsp);
                fd.append('loaisp_xt', arr_lsp);
                fd.append('so_luong_kho', arr_slk);
                fd.append('giasp_xt', arr_gia);
                fd.append('donvi_gia_vc', donvi_gia_vc);
                fd.append('sl_kho_don', sl_kho_don);
                // -------------------------end da xac thuc thanh toan----------------------------------------------
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
    </script>

    <script>
        //Xem trước
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
                    nam_san_xuat: "required",
                    cu_moi: "required",
                    hop_so: "required",
                    nhien_lieu: "required",
                    td_gia_spham: "required",
                    chitiet_dm: "required",
                    km_di: "required",

                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                    so_luong_kho: "required",
                    soluong_min: "required",
                    soluong_max: "required",
                    loai_khuyenmai: "required",
                    giatri_khuyenmai: "required",
                    ngay_bat_dau: "required",
                    ngay_ket_thuc: "required",
                    phi_van_chuyen: "required",
                    van_chuyen: "required",
                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Tiêu đề ít nhất 40 ký tự",
                        maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    },
                    hang_xe: "Vui lòng chọn hãng xe",
                    dong_xe: "Vui lòng không để trống trường này",
                    nam_san_xuat: "Vui lòng chọn năm sản xuất",
                    cu_moi: "Vui lòng chọn tình trạng xe",
                    hop_so: "Vui lòng chọn hộp số xe",
                    nhien_lieu: "Vui lòng chọn nhiên liệu sử dụng",
                    td_gia_spham: "Vui lòng nhập giá sản phẩm",
                    chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                    km_di: "Vui lòng nhập số km đã đi",
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                    so_luong_kho: "Vui lòng nhập số lượng kho",
                    soluong_min: "Vui lòng nhập số lượng tối thiểu",
                    soluong_max: "Vui lòng nhập số lượng tối đa",
                    loai_khuyenmai: "Vui lòng chọn loại khuyến mại",
                    giatri_khuyenmai: "Vui lòng nhập giá trị khuyến mại",
                    ngay_bat_dau: "Vui lòng chọn ngày bắt đầu",
                    ngay_ket_thuc: "Vui lòng chọn ngày kết thúc",
                    phi_van_chuyen: "Vui lòng nhập phí vận chuyển",
                    van_chuyen: "Vui lòng chọn lọai phí vận chuyển",
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
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var hang_xe = $("select[name='hang_xe']").val();
                var dong_xe = $(".dong_may").val();
                var nam_san_xuat = $("select[name='nam_san_xuat']").val();
                var hop_so = $("input[name='hop_so']:checked").val();
                var nhien_lieu = $("input[name='nhien_lieu']:checked").val();
                var xuat_xu = $("select[name='xuat_xu']").val();
                var so_cho = $("select[name='so_cho']").val();
                var mau_sac = $("select[name='mau_sac']").val();
                var kieu_dang = $("select[name='kieu_dang']").val();
                var bao_hanh = $("select[name='bao_hanh']").val();
                var tinhtrang = $("input[name='cu_moi']:checked").val();
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
                var arr_diachi = [];
                $('.m_diachi_xc').each(function() {
                    var dia_chi = $(this).val();
                    arr_diachi.push(dia_chi);
                })
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
                fd.append('dia_chi', arr_diachi);
                fd.append('phan_biet', phan_biet);
                fd.append('donvi_ban', donvi_ban);
                fd.append('avt_anh', arr_src.concat(anh_dd));

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