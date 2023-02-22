<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];

    // so phong ngu
    $sql_so_pn = new db_query("SELECT id,so_luong FROM tang_phong WHERE `type_zoom` = 2 ");
    $result_so_pn = ($sql_so_pn->result_array());
    // so phong ve sinh
    $sql_so_nvs = new db_query("SELECT id,so_luong FROM tang_phong WHERE `type_zoom` = 3 ");
    $result_so_nvs = ($sql_so_nvs->result_array());
    // so tang
    $sql_sotang = new db_query("SELECT id,so_luong FROM tang_phong WHERE `type_zoom` = 1");
    $result_sotang = ($sql_sotang->result_array());
    // tag danh muc
    $ban = new db_query("SELECT `tags_id`, `ten_tags` ,`type_tags` FROM `key_tags` WHERE `id_danhmuc` = 29 AND type_tags = 1");
    $result_ban = ($ban->result_array());
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
    <title>Đăng tin bất động sản nhà riêng</title>
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
            <p class="ctn_tt_p p_600_s24_l28">Đăng tin</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_bds_nhadat" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục đăng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="29">
                                Bất động sản <span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" alt="" class="img_16">
                                </span> Nhà riêng
                            </p>
                        </div>
                    </div>
                    <div class="ctn_ct_b1_fr3 d_flex fl_row al_ct">
                        <label class="b1_fr3_btn1" onclick="checked_input(this)">
                            <input name="ban_thue" type="radio" class="b1_fr3_ip1 fr3_ipmuaban_chothue check_mb_ct" value="1" checked>
                            <p class="b1_fr3_lb2 b1_fr3_lb p_400_s14_l17 active_mb_ct">Mua bán</p>
                        </label>
                        <label class="b1_fr3_btn2" onclick="checked_input(this)">
                            <input name="ban_thue" type="radio" class="b1_fr3_ip2 fr3_ipmuaban_chothue check_mb_ct" value="2">
                            <p class="b1_fr3_lb2 b1_fr3_lb p_400_s14_l17" data="2" id="">Cho thuê</p>
                        </label>
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
                            <input type="text" name="tieu_de" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tiêu đề" autocomplete="off">
                            <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">lớn hơn 40, nhỏ hơn 70 ký tự</p>
                        </div>
                        <div class="ctn_ct_b3_fr2 d_flex fl_cl">
                            <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                                <div class="b3_fr2_gia box_input_infor">
                                    <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                                        <div class="donvitien p_400_s14_l17">
                                            <select class="dt-money-up donvi_ban" name="dvi_tien">
                                                <option value="1">VNĐ</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="b3_fr2_datcoc box_input_infor">
                                    <p class="b3_fr2_datcoc_tt p_400_s15_l18">Đặt cọc <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_datcoc_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" name="td_gia_datcoc" class="b3_fr2_datcoc_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                                        <div class="donvitien p_400_s14_l17">
                                            <select class="dt-money-up donvi_ban" name="dc_new_unit">
                                                <option value="1">VNĐ</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                                <input name="td_lienhe_ngban" type="checkbox" class="b3_fr2_lhhg_input m_lienhenguoiban_cb img24 cursor_Pt">
                                <p class="b3_fr2_lhhg_text pdl_10">Liên hệ người bán để hỏi giá</p>
                            </div>
                        </div>
                        <div class="ctn_ct_b3_fr3 box_input_infor">
                            <p class="b3_fr3_title p_400_s15_l18">
                                Mô tả <span class="cl_red">*</span>
                            </p>
                            <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"></textarea>
                            <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                                <input type="text" name="count" id="count" value="0"> / 10000 ký tự
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box4--------------------------------------------------------------------- -->
                <div class="ctn_ct_box4 d_flex fl_cl">
                    <p class="ctn_ct_b4_title p_600_s16_l19 cl_cam">
                        Tên, địa chỉ bất động sản
                    </p>
                    <div class="ctn_ct_b4_fr d_flex fl_row al_ct">
                        <div class="ctn_ct_b4_fr1">
                            <p class="b4_fr1_title p_400_s15_l18">
                                Tên toà nhà/Khu dân cư
                            </p>
                            <input type="text" name="ten_toanha" class="b4_fr1_input p_400_s14_l17 " placeholder="Tên toà nhà/Khu dân cư" autocomplete="off">
                        </div>
                        <div class="ctn_ct_b4_fr2 box_input_infor">
                            <p class="b4_fr2_title p_400_s15_l18">
                                Địa chỉ nhà <span class="cl_red">*</span>
                            </p>
                            <input type="text" name="td_diachi_nha" class="td_ttin_diachi b4_fr2_input p_400_s14_l17 " placeholder="Địa chỉ nhà" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box5--------------------------------------------------------------------- -->
                <div class="ctn_ct_box5 d_flex fl_cl">
                    <p class="ctn_ct_b5_title p_600_s16_l19 cl_cam">
                        Vị trí bất động sản
                    </p>
                    <div class="ctn_ct_b5_fr d_flex fl_row al_ct">
                        <div class="b5_fr1">
                            <p class="b5_fr1_title p_400_s15_l18">
                                Mã căn
                            </p>
                            <input type="text" name="td_macan" class="b5_fr1_input p_400_s14_l17 " placeholder="Mã căn" autocomplete="off">
                        </div>
                        <div class="b5_fr2">
                            <p class="b5_fr2_title p_400_s15_l18">
                                Tên phân khu/lô
                            </p>
                            <input type="text" name="td_tenpk_lo" class="b5_fr2_input p_400_s14_l17 " placeholder="Tên phân khu/lô" autocomplete="off">
                        </div>
                    </div>
                    <div class="ctn_ct_b5_ft d_flex fl_row al_ct">
                        <input name="td_htmch_rt" value="1" type="checkbox" class="b5_ft_input img24 cursor_Pt" autocomplete="off">
                        <p class="b5_ft_title p_400_s14_l17 pdl_10">
                            Hiển thị mã căn hộ rao tin
                        </p>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box6--------------------------------------------------------------------- -->
                <div class="ctn_ct_box6 d_flex fl_cl">
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">
                        Chi tiết bất động sản
                    </p>
                    <div class="ctn_ct_b6_fr d_flex fl_row al_ct">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">
                                Số phòng ngủ <span class="cl_red">*</span>
                            </p>
                            <select class="b6_fr1_select slect-hang" name="so_phongngu">
                                <option value="" disabled selected>Chọn</option>
                                <? foreach ($result_so_pn as $so_pn) { ?>
                                    <option value="<?= $so_pn['id'] ?>"><?= $so_pn['so_luong']; ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl">
                            <p class="b6_fr2_title p_400_s15_l18">
                                Số nhà vệ sinh
                            </p>
                            <select class="b6_fr2_select slect-hang" name="so_nhavs">
                                <option value="" selected class="p_400_s14_l17">Chọn</option>
                                <? foreach ($result_so_nvs as $so_nvs) { ?>
                                    <option value="<?= $so_nvs['id'] ?>"><?= $so_nvs['so_luong']; ?></option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_ft d_flex fl_row al_ct">
                        <div class="b6_ft1 d_flex fl_cl">
                            <p class="b6_ft1_title p_400_s15_l18">
                                Tổng số tầng
                            </p>
                            <input type="text" name="so_tang" class="b5_fr1_input p_400_s14_l17" placeholder="Tổng số tầng" autocomplete="off" oninput="<?= $oninput ?>">
                        </div>
                        <div class="b6_ft2 d_flex fl_cl">
                            <p class="b6_ft2_title p_400_s15_l18">
                                Hướng của chính
                            </p>
                            <select class="b6_ft2_select slect-hang" name="huong_cua">
                                <option selected value="" class="p_400_s14_l17 ">Hướng cửa chính</option>
                                <option value="1" class="p_400_s14_l17">Đông</option>
                                <option value="2" class="p_400_s14_l17">Tây </option>
                                <option value="3" class="p_400_s14_l17">Nam </option>
                                <option value="4" class="p_400_s14_l17">Bắc </option>
                                <option value="5" class="p_400_s14_l17">Đông bắc </option>
                                <option value="6" class="p_400_s14_l17">Đông nam </option>
                                <option value="7" class="p_400_s14_l17">Tây bắc </option>
                                <option value="8" class="p_400_s14_l17">Tây nam </option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box7--------------------------------------------------------------------- -->
                <div class="ctn_ct_box7 d_flex fl_cl">
                    <p class="ctn_ct_b7_title p_600_s16_l19 cl_cam">
                        Khác
                    </p>
                    <div class="ctn_ct_b7_fr d_flex fl_row">
                        <div class="b7_fr1 d_flex fl_cl al_ct">
                            <p class="b7_fr1_title p_400_s15_l18">
                                Giấy tờ pháp lý
                            </p>
                            <select name="giayto" id="" class="b7_fr1_select slect-hang">
                                <option value="" selected>Chọn</option>
                                <option value="1">Đã có sổ</option>
                                <option value="2">Đang chờ sổ</option>
                                <option value="3">Giấy tờ khác</option>
                            </select>
                        </div>
                        <div class="b7_fr2 d_flex fl_cl al_ct">
                            <p class="b7_fr2_title p_400_s15_l18">
                                Tình trạng nội thất
                            </p>
                            <select name="tinhtrang_nt" id="" class="b7_fr2_select slect-hang">
                                <option value="" selected>Chọn</option>
                                <option value="1">Nội thất cao cấp</option>
                                <option value="2">Nội thất đầy đủ</option>
                                <option value="3">Hoàn thiện cơ bản</option>
                                <option value="4">Bàn giao thô</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b7_ft d_flex fl_cl">
                        <p class="b7_ft_title p_400_s15_l18">Đặc điểm nhà đất</p>
                        <div class="b7_ft d_flex fl_row">
                            <div class="b7_ft1 d_flex fl_row al_ct">
                                <input name="dacdiem" value="1" type="checkbox" class="b7_ft1_input img24 cursor_Pt checkbox_dacdiem">
                                <p class="b7_ft1_p p_400_s14_l17 pdl_10">Hẻm xe hơi</p>
                            </div>
                            <div class="b7_ft2 d_flex fl_row al_ct">
                                <input name="dacdiem" value="2" type="checkbox" class="b7_ft2_input img24 cursor_Pt checkbox_dacdiem">
                                <p class="b7_ft2_p p_400_s14_l17 pdl_10">Nở hậu</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box8--------------------------------------------------------------------- -->
                <div class="ctn_ct_box8 d_flex fl_cl">
                    <p class="ctn_ct_b8_title p_600_s16_l19 cl_cam">
                        Diện tích
                    </p>
                    <div class="ctn_ct_b8_fr d_flex fl_row">
                        <div class="b8_fr1 d_flex fl_cl box_input_infor">
                            <p class="b8_fr1_title p_400_s15_l18">
                                Diện tích đất <span class="cl_red">*</span>
                            </p>
                            <div class="b8_fr1_content d_flex fl_row jtf_spb">
                                <input name="dientich" type="text" class="b8_fr1_input p_400_s14_l17" autocomplete="off" placeholder="Diện tích đất" oninput="<?= $oninput ?>">
                                <p class="b8_fr1_donvido">m<sup>2</sup></p>
                            </div>
                        </div>
                        <div class="b8_fr2 d_flex fl_cl">
                            <p class="b8_fr2_title p_400_s15_l18">
                                Diện tích sử dụng
                            <div class="b8_fr2_content d_flex fl_row jtf_spb">
                                <input name="dientichsd" type="text" class="b8_fr2_input p_400_s14_l17" autocomplete="off" placeholder="Diện tích sử dụng" oninput="<?= $oninput ?>">
                                <p class="b8_fr2_donvido">m<sup>2</sup></p>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b8_ft d_flex fl_row">
                        <div class="b8_ft1 d_flex fl_cl">
                            <p class="b8_ft1_title p_400_s15_l18">
                                Chiều dài
                            <div class="b8_ft1_content d_flex fl_row jtf_spb">
                                <input name="chieudai" type="text" class="b8_ft1_input p_400_s14_l17" autocomplete="off" placeholder="Chiều dài" oninput="<?= $oninput ?>">
                                <p class="b8_ft1_donvido">m</p>
                            </div>
                        </div>
                        <div class="b8_ft2 d_flex fl_cl">
                            <p class="b8_ft2_title p_400_s15_l18">
                                Chiều ngang
                            <div class="b8_ft2_content d_flex fl_row jtf_spb">
                                <input name="chieungang" type="text" class="b8_ft2_input p_400_s14_l17" autocomplete="off" placeholder="Chiều ngang" oninput="<?= $oninput ?>">
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
            var form_bds_nhadat = $("#form_bds_nhadat");
            form_bds_nhadat.validate({
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
                    td_gia_datcoc: "Vui lòng nhập giá đặt cọc",
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
            if (form_bds_nhadat.valid() === false) {
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
            if (form_bds_nhadat.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                var user_id = $("#form_bds_nhadat").attr("data");
                var user_type = $("#form_bds_nhadat").attr("data1");
                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var ten_toanha = $("input[name='ten_toanha']").val();
                var tongso_tang = $("input[name='so_tang']").val();
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
                var dia_chi = $("input[name='td_dia_chi']").val();
                // trường mới
                var td_diachi_nha = $("input[name='td_diachi_nha']").val();
                var td_macan = $("input[name='td_macan']").val();
                var td_htmch_rt = $("input[name='td_htmch_rt']:checked").val();
                var td_tenpk_lo = $("input[name='td_tenpk_lo']").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var dc_new_unit = $("input[name='td_gia_datcoc']:checked").val();

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
                fd.append('dc_new_unit', dc_new_unit);
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
                    url: '/ajax_bds/dangtin_bdsnharieng.php',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        if (data == "") {
                            tbao_dtin_tcong();
                        } else {
                            alert(data);
                            $("#xoa_tddang_tin").addClass("b11_btn_dangtin");
                            $('.td-dang-tin').prop('disabled', false);
                        }
                    }
                })
            }
        });

        function xem_trc_tin() {
            var form_bds_nhadat = $(".form-dtin-cont");
            form_bds_nhadat.validate({
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
                    td_gia_datcoc: "Vui lòng nhập giá đặt cọc",
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
            if (form_bds_nhadat.valid() === false) {
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
            if (form_bds_nhadat.valid() === true) {

                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var ten_toanha = $("input[name='ten_toanha']").val();

                var tongso_tang = $("input[name='so_tang']").val();
                // alert(tongso_tang);
                // return;
                var huong_cua = $("select[name='huong_cua']").val();
                var so_phongngu = $("select[name='so_phongngu']").val();
                var so_phong_vs = $("select[name='so_nhavs']").val();
                var giayto = $("select[name='giayto']").val();
                var tinhtrangnt = $("select[name='tinhtrang_nt']").val();
                var dientich = $("input[name='dientich']").val();
                var chieudai = $("input[name='chieudai']").val();
                var chieungang = $("input[name='chieungang']").val();
                var td_gia_datcoc = $("input[name='td_gia_datcoc']").val();

                var arr_dacdiem = [];
                $('.checkbox_dacdiem').each(function() {
                    if ($(this).is(":checked")) {
                        var a = $(this).val();
                        arr_dacdiem.push(a);
                    }
                })
                // alert(arr_dacdiem);
                // return;
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
                var td_diachi_nha = $("input[name='td_diachi_nha']").val();
                // alert(user_id);
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
                fd.append('loai_sp14', arr_dacdiem);
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