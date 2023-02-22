<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'GET', 0);
$id_nd = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_dm != 0 && $id_nd != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $qr_listds = new db_query("SELECT `new`.`new_id`, `new_title`, `new_money`, `new_city`, `new_image`, `new_unit`, `new_name`, `new_phone`, `new_email`,
                            `new_address`, `chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`, `new_tinhtrang`,
                            `new_baohanh`, `new_description`, `hang`, `thiet_bi`, `knoi_internet`, `do_phan_giai`, `cong_suat`, `loai_chung`, `man_hinh`,
                            `canhan_moigioi`, `xuat_xu` FROM `new`
                            LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                            WHERE `new`.`new_id` = $id_nd AND `new_user_id` = $us_id LIMIT 1 ");

    if (mysql_num_rows($qr_listds->result) > 0) {

        $item_td = mysql_fetch_assoc($qr_listds->result);

        $avt_dangtin = $item_td['new_image'];
        $video_dangtin = $item_td['new_video'];
        $tinh_thanh = $item_td['new_city'];
        $quan_huyen = $item_td['quan_huyen'];
        $phuong_xa = $item_td['phuong_xa'];
        $so_nha = $item_td['new_sonha'];

        $list_ktag = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent`= '" . $item_td['thiet_bi'] . "' ");
        $result_ban = $list_ktag->result_array();

        $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham` WHERE `id_danhmuc` = $id_dm ");

        $bao_hanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");

        $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = '" . $item_td['thiet_bi'] . "' AND `id_danhmuc` = $id_dm ");

        $list_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE `id_danhmuc` = $id_dm ");

        if ($item_td['thiet_bi'] == 52) {
            $list_mh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `id_cha` = '" . $item_td['thiet_bi'] . "' ");
        };

        if ($item_td['thiet_bi'] == 52 || $item_td['thiet_bi'] == 53) {
            $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = '" . $item_td['thiet_bi'] . "' AND `id_danhmuc` = $id_dm ");
        };

        if ($item_td['thiet_bi'] == 52 || $item_td['thiet_bi'] == 53 || $item_td['thiet_bi'] == 54 || $item_td['thiet_bi'] == 57) {
            $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = '" . $item_td['thiet_bi'] . "' ");
        };
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Chỉnh sửa tin đăng đồ tiện tử tivi, âm thanh</title>
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
    <section id="m_dangtin_xc_oto" class="xeco">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Chỉnh sửa tin đăng</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_dt_pc" data="<?= $us_id ?>" data1="<?= $us_type ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục đăng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="<?= $id_dm ?>" data1="<?= $id_nd ?>">
                                Đồ điện tử<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> Tivi, âm thanh
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ---------------------------------------box3 --------------------------------------------------------------------->
                <? include("../includes/inc_new/tieude_gia_mota_xc.php"); ?>
                <!-- ----------------------------------------------------------------------box6--------------------------------------------------------------------- -->
                <div class="ctn_ct_box6 d_flex fl_cl">
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">Chi tiết sản phẩm</p>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Thiết bị <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36 thietbi_doi" name="thiet_bi" data="<?= $id_dm ?>">
                                <option disabled selected value="">Chọn</option>
                                <? while ($row_tbi = mysql_fetch_assoc($list_tbi->result)) { ?>
                                    <option value="<?= $row_tbi['id'] ?>" <?= ($row_tbi['id'] == $item_td['thiet_bi']) ? 'selected' : '' ?>>
                                        <?= $row_tbi['name'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="w_100 phan_chia">
                        <? if ($item_td['thiet_bi'] == 52) { ?>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                                        <option disabled value="">Chọn</option>
                                        <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                                            <option value="<?= $item_hang['id'] ?>" <?= ($item_hang['id'] == $item_td['hang']) ? 'selected' : '' ?>>
                                                <?= $item_hang['ten_hang'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Kích thước</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="kich_thuoc">
                                        <option value="">Chọn</option>
                                        <? while ($row_mh = mysql_fetch_assoc($list_mh->result)) { ?>
                                            <option value="<?= $row_mh['id_manhinh'] ?>" <?= ($row_mh['id_manhinh'] == $item_td['man_hinh']) ? 'selected' : '' ?>>
                                                <?= $row_mh['ten_manhinh'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Kết nối internet</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="ketnoi_inter">
                                        <option value="">Chọn</option>
                                        <option value="1" <?= ($item_td['knoi_internet'] == 1) ? 'selected' : '' ?>>Có</option>
                                        <option value="2" <?= ($item_td['knoi_internet'] == 2) ? 'selected' : '' ?>>Không</option>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Loại tivi</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="loai_tv">
                                        <option value="">Chọn</option>
                                        <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                                            <option value="<?= $row_loai['id'] ?>" <?= ($row_loai['id'] == $item_td['loai_chung']) ? 'selected' : '' ?>>
                                                <?= $row_loai['ten_loai'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Độ phân giải</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="do_phangiai">
                                        <option value="">Chọn</option>
                                        <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                                            <option value="<?= $row_dl['id_dl'] ?>" <?= ($row_dl['id_dl'] == $item_td['do_phan_giai']) ? 'selected' : '' ?>>
                                                <?= $row_dl['ten_dl'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                                        <option value="">Chọn</option>
                                        <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                            <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $item_td['new_baohanh']) ? 'selected' : '' ?>>
                                                <?= $row_bh['tgian_baohanh'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                        <? } else if ($item_td['thiet_bi'] == 53) { ?>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                                        <option disabled value="">Chọn</option>
                                        <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                                            <option value="<?= $item_hang['id'] ?>" <?= ($item_hang['id'] == $item_td['hang']) ? 'selected' : '' ?>>
                                                <?= $item_hang['ten_hang'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Loại loa</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="loai_loa">
                                        <option value="">Chọn</option>
                                        <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                                            <option value="<?= $row_loai['id'] ?>" <?= ($row_loai['id'] == $item_td['loai_chung']) ? 'selected' : '' ?>>
                                                <?= $row_loai['ten_loai'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Công suất</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="cong_suat">
                                        <option value="">Chọn</option>
                                        <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                                            <option value="<?= $row_dl['id_dl'] ?>" <?= ($row_dl['id_dl'] == $item_td['cong_suat']) ? 'selected' : '' ?>>
                                                <?= $row_dl['ten_dl'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                                        <option value="">Chọn</option>
                                        <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                            <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $item_td['new_baohanh']) ? 'selected' : '' ?>>
                                                <?= $row_bh['tgian_baohanh'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                        <? } else if ($item_td['thiet_bi'] == 54 || $item_td['thiet_bi'] == 57) { ?>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                                        <option disabled value="">Chọn</option>
                                        <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                                            <option value="<?= $item_hang['id'] ?>" <?= ($item_hang['id'] == $item_td['hang']) ? 'selected' : '' ?>>
                                                <?= $item_hang['ten_hang'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Xuất xứ thương hiệu</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="xuat_xu">
                                        <option value="">Chọn</option>
                                        <? while ($item_xx = mysql_fetch_assoc($list_xx->result)) { ?>
                                            <option value="<?= $item_xx['id_xuatxu'] ?>" <?= ($item_xx['id_xuatxu'] == $item_td['xuat_xu']) ? 'selected' : '' ?>>
                                                <?= $item_xx['noi_xuatxu'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Công suất <?= ($id_tbi == 54) ? 'âm thanh' : '' ?></p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="am_thanh_cs">
                                        <option value="">Chọn</option>
                                        <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                                            <option value="<?= $row_dl['id_dl'] ?>" <?= ($row_dl['id_dl'] == $item_td['cong_suat']) ? 'selected' : '' ?>>
                                                <?= $row_dl['ten_dl'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                                        <option value="">Chọn</option>
                                        <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                            <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $item_td['new_baohanh']) ? 'selected' : '' ?>>
                                                <?= $row_bh['tgian_baohanh'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                        <? } else { ?>
                            <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                                <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                                    <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                                        <option disabled value="">Chọn</option>
                                        <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                                            <option value="<?= $item_hang['id'] ?>" <?= ($item_hang['id'] == $item_td['hang']) ? 'selected' : '' ?>>
                                                <?= $item_hang['ten_hang'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="b6_fr2 d_flex fl_cl box_input_infor">
                                    <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                                    <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                                        <option value="">Chọn</option>
                                        <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                            <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $item_td['new_baohanh']) ? 'selected' : '' ?>>
                                                <?= $row_bh['tgian_baohanh'] ?>
                                            </option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                    <div class="ctn_ct_b6_nl d_flex fl_cl box_input_infor">
                        <p class="b6_nl_title">Tình trạng <span class="cl_red">*</span></p>
                        <div class="b6_nl_fr d_flex fl_row">
                            <div class="b6_nl_child b6_nl_xang d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="1" <?= ($item_td['new_tinhtrang'] == 1) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_xang_input b6_nl_input">
                                <p class="b6_nl_xang_text pdl_10">Mới</p>
                            </div>
                            <div class="b6_nl_child b6_nl_dau d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="2" <?= ($item_td['new_tinhtrang'] == 2) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_dau_input b6_nl_input">
                                <p class="b6_nl_dau_text pdl_10">Cũ (Đã sửa chữa)</p>
                            </div>
                            <div class="b6_nl_child b6_nl_hybrid d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="3" <?= ($item_td['new_tinhtrang'] == 3) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_hybrid_input b6_nl_input">
                                <p class="b6_nl_hybrid_text pdl_10">Cũ (Chưa sửa chữa)</p>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/m_raonhanh_new.js"></script>
    <script type="text/javascript">
        var id_tb = $(".thietbi_doi").val();
        if (id_tb == 61) {
            $(".ctn_ct_box10").hide();
        };

        $(".thietbi_doi").change(function() {
            var id_dm = $(this).attr("data");
            var id_tbi = $(this).val();
            $.ajax({
                url: '/render/ttin_thietbi.php',
                type: 'POST',
                data: {
                    id_dm: id_dm,
                    id_tbi: id_tbi,
                },
                success: function(data) {
                    $(".phan_chia").html(data);
                    rf_select2();
                }
            });

            if (id_tbi == 61) {
                $(".ctn_ct_box10").hide();
            } else {
                $(".ctn_ct_box10").show();
                $.ajax({
                    url: '/render/select_delivery.php',
                    type: 'POST',
                    data: {
                        id_dm: id_dm,
                        id_lkp: id_tbi,
                    },
                    success: function(data) {
                        $(".ctn_ct_box10 .ctn_ct_b10_fr").html(data);
                        rf_select2();
                    }
                })
            }
        });

        $(".b11_btn_chinhsua").click(function() {
            $("#xoa_tddang_tin").removeClass("b11_btn_chinhsua");
            $("#xoa_tddang_tin").addClass("b11dc_btn_dangtin");
            var form_pc = $("#form_dt_pc");
            form_pc.validate({
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
                    td_gia_spham: {
                        required: true,
                    },
                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    thiet_bi: {
                        required: true,
                    },
                    hang_sp: {
                        required: true,
                    },
                    tinh_trang: {
                        required: true,
                    },
                    canhan_moigioi: {
                        required: true,
                    },
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                    chitiet_dm: {
                        required: true,
                    },
                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Tiêu đề ít nhất 40 ký tự",
                        maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    },
                    td_gia_spham: {
                        required: "Vui lòng nhập giá sản phẩm",
                    },
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    thiet_bi: {
                        required: "Vui lòng chọn thiết bị",
                    },
                    hang_sp: {
                        required: "Vui lòng chọn hãng",
                    },
                    tinh_trang: {
                        required: "Vui lòng chọn tình trạng sản phẩm",
                    },
                    canhan_moigioi: {
                        required: "Chọn người bán",
                    },
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                    chitiet_dm: {
                        required: "Vui lòng chọn chi tiết danh mục",
                    },
                },
            });
            if (form_pc.valid() === false) {
                $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
                $("#xoa_tddang_tin").addClass("b11_btn_chinhsua");
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
                $("#xoa_tddang_tin").removeClass("b11_btn_chinhsua");
                $("#xoa_tddang_tin").addClass("b11dc_btn_dangtin");
                var user_id = $(".form-dtin-cont").attr("data");
                var user_type = $(".form-dtin-cont").attr("data1");
                var id_dm = $(".b1_fr2_title_p").attr("data");
                var id_cs = $(".b1_fr2_title_p").attr("data1");
                var tieu_de = $("input[name='tieu_de']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                };
                var tang_mphi = $("input[name='td_lienhe_ngban']:checked").val();
                var don_vi = $("select[name='dvi_tien']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var thiet_bi = $("select[name='thiet_bi']").val();
                var hang = $("select[name='hang_sp']").val();
                var bao_hanh = $("select[name='bao_hanh']").val();
                var tinh_trang = $("input[name='tinh_trang']:checked").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var chitiet_dm = $("select[name='chitiet_dm']").val();
                var diachi_nban = [];
                $("input[name='td_dia_chi']").each(function() {
                    var td_diachi = $(this).val();
                    if (td_diachi != '') {
                        diachi_nban.push(td_diachi);
                    };
                });
                // lấy ảnh cũ
                var anh_dd = [];
                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang + ';');
                    }
                });
                var fd = new FormData();
                fd.append('user_id', user_id);
                fd.append('user_type', user_type);
                fd.append('id_dm', id_dm);
                fd.append('id_cs', id_cs);
                fd.append('tieu_de', tieu_de);
                fd.append('gia_spham', td_gia_spham);
                fd.append('tang_mphi', tang_mphi);
                fd.append('don_vi', don_vi);
                fd.append('mo_ta', mo_ta);
                fd.append('thiet_bi', thiet_bi);
                fd.append('hang', hang);
                if (thiet_bi == 52) {
                    fd.append('kich_thuoc', $("select[name='kich_thuoc']").val());
                    fd.append('ketnoi_inter', $("select[name='ketnoi_inter']").val());
                    fd.append('loai', $("select[name='loai_tv']").val());
                    fd.append('do_phangiai', $("select[name='do_phangiai']").val());
                } else if (thiet_bi == 53) {
                    fd.append('loai', $("select[name='loai_loa']").val());
                    fd.append('cong_suat', $("select[name='cong_suat']").val());
                } else if (thiet_bi == 54 || thiet_bi == 57) {
                    fd.append('xuat_xu', $("select[name='xuat_xu']").val());
                    fd.append('cong_suat', $("select[name='am_thanh_cs']").val());
                }
                fd.append('bao_hanh', bao_hanh);
                fd.append('tinh_trang', tinh_trang);
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
                fd.append('diachi_nban', diachi_nban);
                fd.append('chitiet_dm', chitiet_dm);
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

                $.ajax({
                    type: 'POST',
                    url: '/ajax_ddtu/csua_amly.php',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data == "") {
                            tbao_dtin_tcong();
                        } else {
                            alert(data);
                            $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
                            $("#xoa_tddang_tin").addClass("b11_btn_chinhsua");
                        }
                    }
                })
            }
        });

        //Xem trước
        function xem_trc_tin() {
            var form_pc = $(".form-dtin-cont");
            form_pc.validate({
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
                    td_gia_spham: {
                        required: true,
                    },
                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    thiet_bi: {
                        required: true,
                    },
                    hang_sp: {
                        required: true,
                    },
                    tinh_trang: {
                        required: true,
                    },
                    canhan_moigioi: {
                        required: true,
                    },
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                    chitiet_dm: {
                        required: true,
                    },
                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Tiêu đề ít nhất 40 ký tự",
                        maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    },
                    td_gia_spham: {
                        required: "Vui lòng nhập giá sản phẩm",
                    },
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    thiet_bi: {
                        required: "Vui lòng chọn thiết bị",
                    },
                    hang_sp: {
                        required: "Vui lòng chọn hãng",
                    },
                    tinh_trang: {
                        required: "Vui lòng chọn tình trạng sản phẩm",
                    },
                    canhan_moigioi: {
                        required: "Chọn người bán",
                    },
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                    chitiet_dm: {
                        required: "Vui lòng chọn chi tiết danh mục",
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
                var id_dm = $(".b1_fr2_title_p").attr("data");
                var id_cs = $(".b1_fr2_title_p").attr("data1");
                var tieu_de = $("input[name='tieu_de']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                };
                var tang_mphi = $("input[name='td_lienhe_ngban']:checked").val();
                var don_vi = $("select[name='dvi_tien']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var thiet_bi = $("select[name='thiet_bi']").val();
                var hang = $("select[name='hang_sp']").val();
                var bao_hanh = $("select[name='bao_hanh']").val();
                var tinh_trang = $("input[name='tinh_trang']:checked").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var chitiet_dm = $("select[name='chitiet_dm']").val();
                var diachi_nban = [];
                $("input[name='td_dia_chi']").each(function() {
                    var td_diachi = $(this).val();
                    if (td_diachi != '') {
                        diachi_nban.push(td_diachi);
                    };
                });
                // lấy ảnh cũ
                var anh_dd = [];
                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang + ';');
                    }
                });
                var phan_biet = 1;
                var fd = new FormData();
                fd.append('id_dmuc', id_dm);
                fd.append('tieu_de', tieu_de);
                fd.append('gia_spham', td_gia_spham);
                fd.append('tang_mphi', tang_mphi);
                fd.append('donvi_ban', don_vi);
                fd.append('mo_ta', mo_ta);
                fd.append('loai_sp', thiet_bi);
                fd.append('loai_sp2', hang);
                if (thiet_bi == 52) {
                    fd.append('loai_sp6', $("select[name='kich_thuoc']").val());
                    fd.append('loai_sp7', $("select[name='ketnoi_inter']").val());
                    fd.append('loai_sp3', $("select[name='loai_tv']").val());
                    fd.append('loai_sp8', $("select[name='do_phangiai']").val());
                } else if (thiet_bi == 53) {
                    fd.append('loai_sp3', $("select[name='loai_loa']").val());
                    fd.append('loai_sp4', $("select[name='cong_suat']").val());
                } else if (thiet_bi == 54 || thiet_bi == 57) {
                    fd.append('loai_sp9', $("select[name='xuat_xu']").val());
                    fd.append('loai_sp4', $("select[name='am_thanh_cs']").val());
                };
                fd.append('loai_sp5', bao_hanh);
                fd.append('tinh_trang', tinh_trang);
                fd.append('dia_chi', diachi_nban);
                fd.append('ctiet_dmuc', chitiet_dm);
                fd.append('avt_anh', m_arr_src.concat(anh_dd));
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
                        $(".form_bds_chung").addClass("d_none");
                    }
                })
            }
        };
    </script>
</body>

</html>