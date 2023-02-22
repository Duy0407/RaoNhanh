<?
include("config.php");
$id_nd = getValue('id_cs', 'int', 'GET', 0);
$id_dm = getValue('id_dm', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_nd != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $qr_listds = new db_query("SELECT `new`.`new_id`, new_title, new_city, quan_huyen, dia_chi, new_money, gia_kt, new_image, phuong_xa, new_sonha, new_unit,
                            new_job_type, new_job_kind, new_level, new_exp, new_skill, new_description, gioi_tinh, new_pay_by, new_min_age FROM `new`
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

        $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
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
    <title>Chỉnh sửa tin đăng tìm việc làm</title>
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
                                Việc làm<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> Tìm việc làm
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <div class="d_flex fl_cl">
                    <div class="ctn_ct_b6_fr box_input_infor w_100">
                        <p class="b3_fr1_title p_400_s15_l18">Tiêu đề <span class="cl_red">*</span></p>
                        <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tiêu đề" autocomplete="off">
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Địa điểm <span class="cl_red">*</span></p>
                            <input type="text" name="diachi_lv" value="<?= $item_td['dia_chi'] ?>" class="td_ttin_diachi b3_fr1_input p_400_s14_l17" placeholder="Địa chỉ" readonly autocomplete="off">
                        </div>
                    </div>
                    <div class="b9_fr1_content d_flex fl_row">
                        <div class="ctn_ct_b9_fr1 d_flex fl_cl">
                            <p class="b9_fr1_title p_400_s15_l18">Giới tính</p>
                            <div class="b9_fr1_content d_flex fl_row">
                                <label class="b9_fr1_ct_label po_ra">
                                    <input type="radio" name="gioi_tinh" class="b9_fr1_ct_input b9_fr_ct_input po_ab" value="1" <?= ($item_td['gioi_tinh'] == 1) ? 'checked' : '' ?>>
                                    <p class="b9_fr1_content1 b9_fr1_ct_chung">Nam</p>
                                </label>
                                <label class="b9_fr2_ct_label po_ra">
                                    <input type="radio" name="gioi_tinh" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="2" <?= ($item_td['gioi_tinh'] == 2) ? 'checked' : '' ?>>
                                    <p class="b9_fr1_content2 b9_fr1_ct_chung">Nữ</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="b6_fr2 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Tuổi</p>
                            <input type="text" name="tuoi" class="b3_fr1_input p_400_s14_l17" value="<?= $item_td['new_min_age'] ?>" placeholder="Tuổi" autocomplete="off">
                        </div>
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Ngành nghề <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="nganh_nghe">
                                <option disabled value="">Chọn</option>
                                <? while ($rowa = mysql_fetch_assoc($db_qra->result)) { ?>
                                    <option value="<?= $rowa['cat_id'] ?>" <?= ($rowa['cat_id'] == $item_td['new_job_type']) ? 'selected' : '' ?>>
                                        <?= $rowa['cat_name'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Hình thức làm việc <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="hinh_thuc">
                                <option selected value="">Chọn</option>
                                <option value="1" <?= ($item_td['new_job_kind'] == 1) ? 'selected' : '' ?>>Toàn thời gian</option>
                                <option value="2" <?= ($item_td['new_job_kind'] == 2) ? 'selected' : '' ?>>Bán thời gian</option>
                                <option value="3" <?= ($item_td['new_job_kind'] == 3) ? 'selected' : '' ?>>Giờ hành chính</option>
                                <option value="4" <?= ($item_td['new_job_kind'] == 4) ? 'selected' : '' ?>>Ca sáng</option>
                                <option value="5" <?= ($item_td['new_job_kind'] == 5) ? 'selected' : '' ?>>Ca chiều</option>
                                <option value="6" <?= ($item_td['new_job_kind'] == 6) ? 'selected' : '' ?>>Ca đêm</option>
                            </select>
                        </div>
                    </div>

                    <div class="ctn_ct_b9_fr1 d_flex fl_cl ctn_mucluong w_100">
                        <p class="b6_fr1_title p_400_s15_l18">Mức lương mong muốn <span class="cl_red">*</span></p>
                        <div class="b9_fr1_content d_flex fl_row">
                            <label class="b9_fr1_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr1_ct_input b9_fr_ct_input po_ab" value="1" <?= ($item_td['new_money'] == 0 && $item_td['gia_kt'] == 0) ? 'checked' : '' ?>>
                                <p class="b9_fr1_content1 b9_fr1_ct_chung">Thỏa thuận</p>
                            </label>
                            <label class="b9_fr2_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="2" <?= ($item_td['new_money'] != 0 && $item_td['gia_kt'] == 0) ? 'checked' : '' ?>>
                                <p class="b9_fr1_content2 b9_fr1_ct_chung">Từ mức</p>
                            </label>
                            <label class="b9_fr2_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="3" <?= ($item_td['new_money'] == 0 && $item_td['gia_kt'] != 0) ? 'checked' : '' ?>>
                                <p class="b9_fr1_content2 b9_fr1_ct_chung">Đến mức</p>
                            </label>
                            <label class="b9_fr2_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="4" <?= ($item_td['new_money'] != 0 && $item_td['gia_kt'] != 0) ? 'checked' : '' ?>>
                                <p class="b9_fr1_content2 b9_fr1_ct_chung">Từ mức - Đến mức</p>
                            </label>
                        </div>
                        <div class="mluong_tuongung d_flex fl_cl w_100">
                            <div class="w_100 input_salary <?= ($item_td['new_money'] == 0 && $item_td['gia_kt'] == 0) ? 'active' : '' ?> " id="input_1">
                                <input type="text" name="giatri_luong" class="b3_fr1_input p_400_s14_l17" placeholder="Thỏa thuận" autocomplete="off" disabled>
                            </div>
                            <div class="w_100 input_salary box_input_infor <?= ($item_td['new_money'] != 0 && $item_td['gia_kt'] == 0) ? 'active' : '' ?> " id="input_2">
                                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                    <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" value="<?= number_format($item_td['new_money']) ?>" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Nhập số tiền" autocomplete="off">
                                    <div class="donvitien p_400_s14_l17">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1" <?= ($item_td['new_unit'] == 1) ? 'selected' : '' ?>>VNĐ</option>
                                            <option value="2" <?= ($item_td['new_unit'] == 2) ? 'selected' : '' ?>>USD</option>
                                            <option value="3" <?= ($item_td['new_unit'] == 3) ? 'selected' : '' ?>>EURO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w_100 input_salary box_input_infor <?= ($item_td['new_money'] == 0 && $item_td['gia_kt'] != 0) ? 'active' : '' ?> " id="input_3">
                                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                    <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" value="<?= number_format($item_td['gia_kt']) ?>" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham2" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Nhập số tiền" autocomplete="off">
                                    <div class="donvitien p_400_s14_l17">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1" <?= ($item_td['new_unit'] == 1) ? 'selected' : '' ?>>VNĐ</option>
                                            <option value="2" <?= ($item_td['new_unit'] == 2) ? 'selected' : '' ?>>USD</option>
                                            <option value="3" <?= ($item_td['new_unit'] == 3) ? 'selected' : '' ?>>EURO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w_100 input_salary <?= ($item_td['new_money'] != 0 && $item_td['gia_kt'] != 0) ? 'active' : '' ?> " id="input_4">
                                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                    <div class="gia_tritien d_flex">
                                        <div class="box_input_infor">
                                            <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" value="<?= number_format($item_td['new_money']) ?>" autocomplete="off" oninput="<? $oninput; ?>" name="salary_fr" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Từ mức" autocomplete="off">
                                        </div>
                                        <div class="box_input_infor">
                                            <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" value="<?= number_format($item_td['gia_kt']) ?>" autocomplete="off" oninput="<? $oninput; ?>" name="salary_to" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Đến mức" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="donvitien p_400_s14_l17">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1" <?= ($item_td['new_unit'] == 1) ? 'selected' : '' ?>>VNĐ</option>
                                            <option value="2" <?= ($item_td['new_unit'] == 2) ? 'selected' : '' ?>>USD</option>
                                            <option value="3" <?= ($item_td['new_unit'] == 3) ? 'selected' : '' ?>>EURO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Hình thức trả lương <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="hinhthuc_trl">
                                <option disabled value="">Chọn</option>
                                <option value="1" <?= ($item_td['new_pay_by'] == 1) ? 'selected' : '' ?>>Theo giờ</option>
                                <option value="2" <?= ($item_td['new_pay_by'] == 2) ? 'selected' : '' ?>>Theo ngày</option>
                                <option value="3" <?= ($item_td['new_pay_by'] == 3) ? 'selected' : '' ?>>Theo tuần</option>
                                <option value="4" <?= ($item_td['new_pay_by'] == 4) ? 'selected' : '' ?>>Theo tháng</option>
                                <option value="5" <?= ($item_td['new_pay_by'] == 5) ? 'selected' : '' ?>>Theo năm</option>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Bằng cấp</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="bang_cap">
                                <option disabled value="">Chọn</option>
                                <option value="1" <?= ($item_td['new_level'] == 1) ? 'selected' : '' ?>>Đại học</option>
                                <option value="2" <?= ($item_td['new_level'] == 2) ? 'selected' : '' ?>>Cao đẳng</option>
                                <option value="3" <?= ($item_td['new_level'] == 3) ? 'selected' : '' ?>>Lao động phổ thông</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Kinh nghiệm <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="kinh_nghiem">
                                <option disabled selected value="">Chọn</option>
                                <option value="1" <?= ($item_td['new_exp'] == 1) ? 'selected' : '' ?>>Chưa có kinh nghiệm</option>
                                <option value="2" <?= ($item_td['new_exp'] == 2) ? 'selected' : '' ?>>Kinh nghiệm từ 1-2 năm</option>
                                <option value="3" <?= ($item_td['new_exp'] == 3) ? 'selected' : '' ?>>Kinh nghiệm trên 2 năm</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Chứng chỉ</p>
                            <input type="text" name="chung_chi" value="<?= $item_td['new_skill'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Chứng chỉ" autocomplete="off">
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr box_input_infor w_100">
                        <p class="b3_fr3_title p_400_s15_l18">Kỹ năng</p>
                        <textarea rows="6" placeholder="Nhập kỹ năng" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="ky_nang"><?= $item_td['new_description'] ?></textarea>
                    </div>
                    <div class="ctn_ct_b6_fr sh_alg_cr d_flex box_input_infor">
                        <p class="b3_fr3_title p_400_s15_l18">Tải cv lên</p>
                        <div class="ctn_taicv">
                            <div class="upload_box mt5 tai-file sh_border sh_clr_five">
                                <label class="upload_btn">
                                    <p>Tải tệp</p>
                                    <input type="file" class="upload_inputfile avtfile_thutuc" onchange="ImgUpload(this)">
                                </label>
                                <div class="upload-cloud">
                                    <img src="../images/dang-tin-mua/upload-cloud.svg">
                                </div>
                            </div>
                            <div class="upload_img-wrap1"></div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
                <div class="ctn_ct_box9 d_flex fl_cl">
                    <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">Thông tin liên hệ</p>
                    <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
                        <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
                        <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $item_td['new_phone'] ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
                    </div>
                    <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
                        <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
                        <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $item_td['new_email'] ?>" placeholder="Nhập email" autocomplete="off">
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box11--------------------------------------------------------------------- -->
                <div class="ctn_ct_box11">
                    <div class="ctn_ct_b11_button d_flex fl_row al_ct jtf_ct">
                        <p class="b11_btn_xemtruoc cursor_Pt rdu5 cl_cam bd_cam p_600_s15_l18 d_flex al_ct jtf_ct txt_al_ct" onclick="xem_trc_tin()">
                            XEM TRƯỚC
                        </p>
                        <p class="b11_btn_dangtin dangtin_oto disable_chung cursor_Pt cl_fffff bg_cam rdu5 p_600_s15_l18  d_flex al_ct jtf_ct txt_al_ct" id="xoa_tddang_tin">
                            ĐĂNG TIN
                        </p>
                    </div>
                </div>
            </div>
        </form>
        <div class="v_container d_none"></div>
    </section>

    <? include '../modals/md_danh_muc_tin_dang.php' ?>
    <? include '../modals/md_dia_chi.php' ?>
    <? include '../modals/tbao_tcong.php' ?>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <!-- footer -->
    <script type="text/javascript" src="/js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/m_raonhanh_new.js"></script>
    <script type="text/javascript">
        function ImgUpload(el) {
            var file_data = $(el).prop('files')[0];
            var rong = '';
            var file_type = file_data.type;
            var size = file_data.size;
            var filename = file_data.name;
            var file_size = (size / (1024 * 1024)).toFixed(2);
            var match = ['image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG', 'image/svg+xml', 'image/gif', 'video/mp4'];
            if (file_size <= 6) {
                if ($.inArray(file_type, match) != -1) {
                    alert("Vui lòng chọn file có định đạng: PDF");
                    $(el).val(rong);
                    $(el).parents(".ctn_taicv").find('.upload_box').show();
                    $(el).parents(".ctn_taicv").find('.upload_img-wrap1').html('');
                    $(el).parents(".ctn_taicv").find('.upload_img-wrap1').hide();
                } else {
                    var html = `<div class="tepchon_tep chontep">
                                    <p class="ten_tepchon"><span class="xoa_botep" onclick="xoa_botep(this)"></span>` + filename + `</p>
                                </div>`;
                    $(el).parents(".ctn_taicv").find('.upload_img-wrap1').html(html);
                    $(el).parents(".ctn_taicv").find('.upload_img-wrap1').show();
                    $(el).parents(".ctn_taicv").find('.upload_box').hide();
                }
            } else {
                alert("Dung lượng ảnh tối đa 6MB");
                $(el).val(rong);
                $(el).parents(".ctn_taicv").find('.upload_box').show();
                $(el).parents(".ctn_taicv").find('.upload_img-wrap1').html('');
                $(el).parents(".ctn_taicv").find('.upload_img-wrap1').hide();
            }
        };

        function xoa_botep(el) {
            $(el).parents(".ctn_taicv").find('.upload_box').show();
            $(el).parents(".ctn_taicv").find('.upload_img-wrap1').html('');
            $(el).parents(".ctn_taicv").find('.upload_img-wrap1').hide();
        }

        $("input[name='muc_luong']").click(function() {
            var id_ml = $(this).val();
            $(".mluong_tuongung .input_salary").removeClass('active');
            $('#input_' + id_ml).addClass('active');
        });

        $.validator.addMethod("validSalary", function(value, element) {
            if ($("input[name='muc_luong']:checked").val() == 4) {
                var fr = Number($("input[name='salary_fr']").val().replace(/,/g, ""));
                var to = Number($("input[name='salary_to']").val().replace(/,/g, ""));
                return (fr < to);
            } else return true;
        }, "Số trước phải nhỏ hơn số sau");

        var user_type = '<?= $_COOKIE['UT'] ?>';
        $(".b11_btn_dangtin").click(function() {
            $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
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
                    nganh_nghe: {
                        required: true,
                    },
                    diachi_lv: {
                        required: true,
                    },
                    td_gia_spham: {
                        required: true,
                    },
                    td_gia_spham2: {
                        required: true,
                    },
                    salary_fr: {
                        required: true,
                    },
                    salary_to: {
                        required: true,
                        validSalary: true,
                    },
                    hinh_thuc: {
                        required: true,
                    },
                    hinhthuc_trl: {
                        required: true,
                    },
                    kinh_nghiem: {
                        required: true,
                    },
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Tiêu đề ít nhất 40 ký tự",
                        maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    },
                    nganh_nghe: {
                        required: "Vui lòng chọn ngành nghề",
                    },
                    diachi_lv: {
                        required: "Vui lòng chọn địa chỉ làm việc",
                    },
                    td_gia_spham: {
                        required: "Vui lòng nhập mức lương",
                    },
                    td_gia_spham2: {
                        required: "Vui lòng nhập mức lương",
                    },
                    salary_fr: {
                        required: "Vui lòng nhập mức lương",
                    },
                    salary_to: {
                        required: "Vui lòng nhập mức lương",
                    },
                    hinh_thuc: {
                        required: "Vui lòng chọn hình thức làm việc",
                    },
                    hinhthuc_trl: {
                        required: "Vui lòng chọn hình thức trả lương",
                    },
                    kinh_nghiem: {
                        required: "Vui lòng chọn kinh nghiệm",
                    },
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                },
            });
            if (form_pc.valid() === false) {
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
            }
            if (form_pc.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                $("#xoa_tddang_tin").addClass("b11dc_btn_dangtin");
                // lấy ảnh cũ
                var anh_dd = [];
                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
                    }
                });
                var tinh_thanh = $("select[name='thanhpho']").val();
                var quan_huyen = $("select[name='quanhuyen']").val();
                var phuong_xa = $("select[name='phuongxa']").val();
                var so_nha = $("input[name='md_so_nha']").val();
                var muc_luong = $("input[name='muc_luong']:checked").val();
                var fd = new FormData();
                fd.append('title', $("input[name='tieu_de']").val());
                fd.append('diachi_lv', $("input[name='diachi_lv']").val());
                fd.append('tinh_thanh', tinh_thanh);
                fd.append('quan_huyen', quan_huyen);
                fd.append('phuong_xa', phuong_xa);
                fd.append('so_nha', so_nha);
                fd.append('gioi_tinh', $("input[name='gioi_tinh']:checked").val());
                fd.append('tuoi', $("input[name='tuoi']").val());
                fd.append('nganh_nghe', $("select[name='nganh_nghe']").val());
                fd.append('hinh_thuclv', $("select[name='hinh_thuc']").val());
                if (muc_luong == 1) {
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                } else if (muc_luong == 2) {
                    fd.append('salary_fr', $("input[name='td_gia_spham']").val());
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', $("select[name='dvi_tien']").val());
                } else if (muc_luong == 3) {
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', $("input[name='td_gia_spham2']").val());
                    fd.append('salary_unit', $("select[name='dvi_tien']").val());
                } else {
                    fd.append('salary_fr', $("input[name='salary_fr']").val());
                    fd.append('salary_to', $("input[name='salary_to']").val());
                    fd.append('salary_unit', $("select[name='dvi_tien']").val());
                };
                fd.append('file_cv', $(".avtfile_thutuc").prop('files')[0]);
                fd.append('hinhthuc_trl', $("select[name='hinhthuc_trl']").val());
                fd.append('ky_nang', $("textarea[name='ky_nang']").val());
                fd.append('bang_cap', $("select[name='bang_cap']").val());
                fd.append('kinh_nghiem', $("select[name='kinh_nghiem']").val());
                fd.append('chung_chi', $("input[name='chung_chi']").val());
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
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
                    url: '/ajax/dangtin_tim_vieclam.php',
                    type: 'POST',
                    data: fd,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert(data.msg);
                        if (data.result == true) {
                            if (user_type == 5) {
                                window.location = "/ho-so-quan-ly-tin-tim-viec-lam.html";
                            } else {
                                window.location = "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-viec-lam.html";
                            }

                        }
                    }
                })
            }
        });

        //Xem trước
        function xem_trc_tin() {
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
                    hang_phone: {
                        required: true,
                    },
                    dong_may: {
                        required: true,
                    },
                    mau_sac: {
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
                    hang_phone: {
                        required: "Vùi lòng chọn hãng",
                    },
                    dong_may: {
                        required: "Vui lòng chọn dòng máy",
                    },
                    mau_sac: {
                        required: "Vui lòng chọn màu sắc",
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
                var tieu_de = $("input[name='tieu_de']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                };
                var tang_mphi = $("input[name='td_lienhe_ngban']:checked").val();
                var don_vi = $("select[name='dvi_tien']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var hang_may = $("select[name='hang_phone']").val();
                var dong_may = $(".dong_may").val();
                var phien_ban = $("input[name='phien_bien']:checked").val();
                var dung_luong = $("select[name='dung_luong']").val();
                var mau_sac = $("select[name='mau_sac']").val();
                var bao_hanh = $("select[name='bao_hanh']").val();
                var tinh_trang = $("input[name='tinh_trang']:checked").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var chitiet_dm = $("select[name='chitiet_dm']").val();
                var diachi_nban = [];
                $("input[name='td_dia_chi']").each(function() {
                    var td_diachi = $(this).val();
                    if (td_diachi != '') {
                        diachi_nban.push(td_diachi + ';');
                    };
                });
                // lấy ảnh cữ
                var anh_dd = [];
                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
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
                fd.append('loai_sp', hang_may);
                fd.append('loai_sp2', dong_may);
                fd.append('loai_sp3', mau_sac);
                fd.append('loai_sp4', dung_luong);
                fd.append('loai_sp5', bao_hanh);
                fd.append('tinh_trang', tinh_trang);
                fd.append('ctiet_dmuc', chitiet_dm);
                fd.append('dia_chi', diachi_nban);
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