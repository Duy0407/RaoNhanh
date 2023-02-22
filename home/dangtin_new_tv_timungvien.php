<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
    $id = 120;

    $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");

    $hom_nay = date('Y-m-d', time());

    // $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id AND `id_parent` = 0 ");
    // $result_dm = $list_ktag->result_array();
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
    <title>Đăng tin tìm ứng viên</title>
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
            <p class="ctn_tt_p p_600_s24_l28">Đăng tin</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_dt_pc" data="<?= $us_id ?>" data1="<?= $us_type ?>" data2="<?= $hom_nay ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục đăng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="<?= $id ?>">
                                Việc làm<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> Tìm ứng viên
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ---------------------------------------box3 --------------------------------------------------------------------->
                <div class="ctn_ct_box3">
                    <p class="ctn_ct_b3_title p_600_s16_l19 cl_cam">
                        Thông tin nhà tuyển dụng
                    </p>
                    <div class="b9_fr1_content d_flex fl_row">
                        <label class="b9_fr1_ct_label po_ra">
                            <input type="radio" name="canhan_moigioi1" class="b9_fr1_ct_input b9_fr_ct_input po_ab" value="1" checked>
                            <p class="b9_fr1_content1 b9_fr1_ct_chung">Cá Nhân</p>
                        </label>
                        <label class="b9_fr2_ct_label po_ra">
                            <input type="radio" name="canhan_moigioi1" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="4">
                            <p class="b9_fr1_content2 b9_fr1_ct_chung">Công ty</p>
                        </label>
                    </div>
                    <div class="ctn_ct_b3_fr">
                        <div class="ctn_ct_b3_fr1 box_input_infor w_100">
                            <p class="b3_fr1_title p_400_s15_l18">Tên hộ kinh doanh</p>
                            <input type="text" name="ten_hokd" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tên hộ kinh doanh" autocomplete="off">
                        </div>
                        <div class="ctn_ct_b6_fr box_input_infor w_100">
                            <p class="b3_fr1_title p_400_s15_l18">Địa chỉ hộ kinh doanh <span class="cl_red">*</span></p>
                            <input type="text" name="diachi_kd" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập địa chỉ hộ kinh doanh" autocomplete="off">
                        </div>

                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box6--------------------------------------------------------------------- -->
                <div class="ctn_ct_box6 d_flex fl_cl">
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">
                        Thông tin đăng tuyển
                    </p>
                    <div class="ctn_ct_b6_fr box_input_infor w_100">
                        <p class="b3_fr1_title p_400_s15_l18">Vị trí đăng tuyển <span class="cl_red">*</span></p>
                        <input type="text" name="tieu_de" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập vị trí đăng tuyển" autocomplete="off">
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Ngành nghề <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="nganh_nghe">
                                <option disabled selected value="">Chọn</option>
                                <? while ($rowa = mysql_fetch_assoc($db_qra->result)) { ?>
                                    <option value="<?= $rowa['cat_id'] ?>"><?= $rowa['cat_name'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor dong_doi">
                            <p class="b6_fr1_title p_400_s15_l18">Chi tiết công việc <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36 chitiet_cv" name="chitiet_cv">
                                <option disabled selected value="">Chọn</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Hình thức làm việc <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="hinh_thuc">
                                <option selected disabled value="">Chọn</option>
                                <option value="1">Toàn thời gian</option>
                                <option value="2">Bán thời gian</option>
                                <option value="3">Giờ hành chính</option>
                                <option value="4">Ca sáng</option>
                                <option value="5">Ca chiều</option>
                                <option value="6">Ca đêm</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Địa điểm làm việc <span class="cl_red">*</span></p>
                            <input type="text" name="diachi_lv" class="td_ttin_diachi b3_fr1_input p_400_s14_l17" placeholder="Địa chỉ làm việc" readonly autocomplete="off">
                        </div>
                    </div>
                    <div class="ctn_ct_b9_fr1 d_flex fl_cl ctn_mucluong w_100">
                        <p class="b6_fr1_title p_400_s15_l18">Mức lương</p>
                        <div class="b9_fr1_content d_flex fl_row">
                            <label class="b9_fr1_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr1_ct_input b9_fr_ct_input po_ab" value="1" checked>
                                <p class="b9_fr1_content1 b9_fr1_ct_chung">Thỏa thuận</p>
                            </label>
                            <label class="b9_fr2_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="2">
                                <p class="b9_fr1_content2 b9_fr1_ct_chung">Từ mức</p>
                            </label>
                            <label class="b9_fr2_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="3">
                                <p class="b9_fr1_content2 b9_fr1_ct_chung">Đến mức</p>
                            </label>
                            <label class="b9_fr2_ct_label po_ra">
                                <input type="radio" name="muc_luong" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="4">
                                <p class="b9_fr1_content2 b9_fr1_ct_chung">Từ mức - Đến mức</p>
                            </label>
                        </div>
                        <div class="mluong_tuongung d_flex fl_cl w_100">
                            <div class="w_100 input_salary active" id="input_1">
                                <input type="text" name="giatri_luong" class="b3_fr1_input p_400_s14_l17" placeholder="Thỏa thuận" autocomplete="off" disabled>
                            </div>
                            <div class="w_100 input_salary box_input_infor" id="input_2">
                                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                    <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Nhập số tiền" autocomplete="off">
                                    <div class="donvitien p_400_s14_l17">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1">VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w_100 input_salary box_input_infor" id="input_3">
                                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                    <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham2" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Nhập số tiền" autocomplete="off">
                                    <div class="donvitien p_400_s14_l17">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1">VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="w_100 input_salary" id="input_4">
                                <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                    <div class="gia_tritien d_flex">
                                        <div class="box_input_infor">
                                            <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="salary_fr" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Từ mức" autocomplete="off">
                                        </div>
                                        <div class="box_input_infor">
                                            <input type="text" onkeyup="format_gtri(this)" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="salary_to" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Đến mức" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="donvitien p_400_s14_l17">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1">VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Hình thức trả lương <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="hinhthuc_trl">
                                <option disabled selected value="">Chọn</option>
                                <option value="1">Theo giờ</option>
                                <option value="2">Theo ngày</option>
                                <option value="3">Theo tuần</option>
                                <option value="4">Theo tháng</option>
                                <option value="5">Theo năm</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Số lượng cần tuyển <span class="cl_red">*</span></p>
                            <input type="text" name="so_luong" class="b3_fr1_input p_400_s14_l17" placeholder="Số lượng cần tuyển" autocomplete="off">
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr box_input_infor w_100">
                        <p class="b3_fr3_title p_400_s15_l18">Mô tả <span class="cl_red">*</span></p>
                        <textarea rows="6" placeholder="Tên công ty, tuyển dụng, loại hình công việc, địa chỉ, mặt hàng/sản phẩm kinh doanh, mô tả chi tiết công việc, yêu cầu chi tiết về kĩ năng, học vấn, phụ cấp, thời gian nộp hồ sơ, hình thức nộp hồ sơ, liên hệ của nhà tuyển dụng." class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"></textarea>
                        <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                            <input type="text" name="count" id="count" value="0"> / 10000 ký tự
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr box_input_infor w_100">
                        <p class="b3_fr3_title p_400_s15_l18">Yêu cầu kỹ năng</p>
                        <textarea rows="5" placeholder="Nhập yêu cầu kỹ năng" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="ky_nang"></textarea>
                    </div>
                    <div class="ctn_ct_b6_fr box_input_infor w_100">
                        <p class="b3_fr3_title p_400_s15_l18">Quyền lợi được hưởng</p>
                        <textarea rows="5" placeholder="Nhập quyền lợi được hưởng" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="quyen_loi"></textarea>
                    </div>
                    <div class="ctn_ct_b6_fr box_input_infor w_100">
                        <p class="b3_fr3_title p_400_s15_l18">Hạn nộp hồ sơ <span class="cl_red">*</span></p>
                        <input type="date" name="han_nop" class="b3_fr1_input p_400_s14_l17" autocomplete="off">
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
                <div class="ctn_ct_box6 d_flex fl_cl">
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">
                        Thông tin thêm
                    </p>
                    <div class="b9_fr1_content d_flex fl_row">
                        <div class="ctn_ct_b9_fr1 d_flex fl_cl">
                            <p class="b9_fr1_title p_400_s15_l18">Giới tính</p>
                            <div class="b9_fr1_content d_flex fl_row">
                                <label class="b9_fr1_ct_label po_ra">
                                    <input type="radio" name="gioi_tinh" class="b9_fr1_ct_input b9_fr_ct_input po_ab" value="0" checked>
                                    <p class="b9_fr1_content1 b9_fr1_ct_chung">Không yêu cầu</p>
                                </label>
                                <label class="b9_fr1_ct_label po_ra">
                                    <input type="radio" name="gioi_tinh" class="b9_fr1_ct_input b9_fr_ct_input po_ab" value="1">
                                    <p class="b9_fr1_content1 b9_fr1_ct_chung">Nam</p>
                                </label>
                                <label class="b9_fr2_ct_label po_ra">
                                    <input type="radio" name="gioi_tinh" class="b9_fr2_ct_input b9_fr_ct_input po_ab" value="2">
                                    <p class="b9_fr1_content2 b9_fr1_ct_chung">Nữ</p>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="b2_fr_picture_content ctn_ct_b9_fr2 d_flex fl_row fl_st">
                        <p class="b9_fr1_title p_400_s15_l18 w_100">Độ tuổi</p>
                        <div class="b9_fr1_content d_flex fl_row w_100">
                            <div class="b6_fr1 d_flex fl_cl box_input_infor">
                                <input type="text" name="dtuoi_toit" class="b3_fr1_input p_400_s14_l17" placeholder="Tối thiểu" autocomplete="off">
                            </div>
                            <div class="b6_fr2 d_flex fl_cl box_input_infor dong_doi">
                                <input type="text" name="dtuoi_toida" class="b3_fr1_input p_400_s14_l17" placeholder="Tối đa" autocomplete="off">
                            </div>
                        </div>
                        <span class="error_dotuoi"></span>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Yêu cầu bằng cấp <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="bang_cap">
                                <option selected disabled value="">Chọn</option>
                                <option value="1">Đại học</option>
                                <option value="2">Cao đẳng</option>
                                <option value="3">Lao động phổ thông</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Yêu cầu kinh nghiệm <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="kinh_nghiem">
                                <option disabled selected value="">Chọn</option>
                                <option value="1">Chưa có kinh nghiệm</option>
                                <option value="2">Kinh nghiệm từ 1-2 năm</option>
                                <option value="3">Kinh nghiệm trên 2 năm</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Chứng chỉ</p>
                            <input type="text" name="chung_chi" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập chứng chỉ" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="ctn_ct_box9 d_flex fl_cl">
                    <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">Thông tin liên hệ</p>
                    <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
                        <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
                        <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $usc_phone ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
                    </div>
                    <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
                        <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
                        <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $usc_email ?>" placeholder="Nhập email" autocomplete="off">
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
        $("input[name='muc_luong']").click(function() {
            var id_ml = $(this).val();
            $(".mluong_tuongung .input_salary").removeClass('active');
            $('#input_' + id_ml).addClass('active');
        });

        $(".tuoi_den").click(function() {
            $(".error_dotuoi").text('');
        });

        $.validator.addMethod("dateRange",
            function() {
                var date1 = $("input[name='han_nop']").val();
                var date2 = $(".form_bds_chung").attr("data2");
                return (date1 >= date2);
            });

        $.validator.addMethod("validSalary", function(value, element) {
            if ($("input[name='muc_luong']:checked").val() == 4) {
                var fr = Number($("input[name='salary_fr']").val().replace(/,/g, ""));
                var to = Number($("input[name='salary_to']").val().replace(/,/g, ""));
                return (fr < to);
            } else return true;
        }, "Số trước phải nhỏ hơn số sau");

        $("[name=nganh_nghe]").change(function() {
            var id_ct = $(this).val();
            $.ajax({
                url: '/ajax/getlist_tag.php',
                data: {
                    id_ct: id_ct,
                },
                success: function(t) {
                    $("[name=chitiet_cv]").html(t);
                }
            });
        });
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
                    diachi_kd: {
                        required: true,
                    },
                    tieu_de: {
                        required: true,
                        minlength: 40,
                        maxlength: 70,
                    },
                    nganh_nghe: {
                        required: true,
                    },
                    chitiet_cv: {
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
                    hinhthuc_trl: {
                        required: true,
                    },
                    so_luong: {
                        required: true,
                    },
                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    han_nop: {
                        required: true,
                        dateRange: true,
                    },
                    bang_cap: {
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
                    diachi_kd: {
                        required: "Vui lòng nhập địa chỉ kinh doanh",
                    },
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Tiêu đề ít nhất 40 ký tự",
                        maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    },
                    nganh_nghe: {
                        required: "Vui lòng chọn ngành nghề",
                    },
                    chitiet_cv: {
                        required: "Vui lòng chọn chi tiết công việc",
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
                    hinhthuc_trl: {
                        required: "Vui lòng chọn hình thức trả lương",
                    },
                    so_luong: {
                        required: "Vui lòng nhập số lượng cần tuyển",
                    },
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    han_nop: {
                        required: "Vui lòng chọn hạn nộp",
                        dateRange: "Hạn nộp phải sau ngày hôm nay",
                    },
                    bang_cap: {
                        required: "Vui lòng chọn bằng cấp",
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
                var tuoi_tu = $("input[name='dtuoi_toit']").val();
                var tuoi_den = $("input[name='dtuoi_toida']").val();
                if (tuoi_tu != "" && tuoi_den != "") {
                    if (tuoi_tu > tuoi_den) {
                        $(".error_dotuoi").text("Độ tuổi tối thiểu nhỏ hơn độ tuổi tối đa");
                        return false;
                    }
                }
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
                fd.append('canhan_moigioi1', $("input[name='canhan_moigioi1']:checked").val());
                fd.append('ten_cty', $("[name=ten_hokd]").val());
                fd.append('diachi_kd', $("input[name='diachi_kd']").val());
                fd.append('vitri_td', $("input[name='tieu_de']").val());
                fd.append('nganh_nghe', $("select[name='nganh_nghe']").val());
                fd.append('chitiet_cv', $("select[name='chitiet_cv']").val());
                fd.append('hinh_thuclv', $("select[name='hinh_thuc']").val());
                fd.append('diachi_lv', $("input[name='diachi_lv']").val());
                fd.append('tinh_thanh', tinh_thanh);
                fd.append('quan_huyen', quan_huyen);
                fd.append('phuong_xa', phuong_xa);
                fd.append('so_nha', so_nha);
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
                fd.append('hinhthuc_trl', $("select[name='hinhthuc_trl']").val());
                fd.append('so_luong', $("input[name='so_luong']").val());
                fd.append('mo_ta', $("textarea[name='mota']").val());
                fd.append('ky_nang', $("textarea[name='ky_nang']").val());
                fd.append('quyen_loi', $("textarea[name='quyen_loi']").val());
                fd.append('han_nop', $("input[name='han_nop']").val());
                fd.append('gioi_tinh', $("input[name='gioi_tinh']:checked").val());
                fd.append('minAge', $("input[name='dtuoi_toit']").val());
                fd.append('maxAge', $("input[name='dtuoi_toida']").val());
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
                    url: '/ajax/dangtin_tim_ungvien.php',
                    type: 'POST',
                    data: fd,
                    dataType: "json",
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data.result == true) {
                            // tbao_dtin_tcong();
                            alert(data.msg);
                            if (user_type == 5) {
                                window.location = "/ho-so-quan-ly-tin-tim-ung-vien.html";
                            } else {
                                window.location = "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-ung-vien.html";
                            }
                        } else if (data.result == false) {
                            alert(data.msg);
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