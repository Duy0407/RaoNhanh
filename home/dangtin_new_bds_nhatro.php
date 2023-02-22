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
    $ban = new db_query("SELECT `tags_id`, `ten_tags` ,`type_tags` FROM `key_tags` WHERE `id_danhmuc` = 123 AND type_tags = 1");
    $result_ban = ($ban->result_array());
} else {
    header("Location: / ");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng tin bất động sản nhà trọ</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
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
    <section id="m_dangtin_bds_nhatro">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Đăng tin</p>
        </div>

        <form class="form-dtin-cont form_bds_chung" id="form_bds_phongtro" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục đăng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="123">
                                Bất động sản <span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" alt="" class="img_16">
                                </span> Phòng trọ
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
                                    <p class="b3_fr2_datcoc_tt p_400_s15_l18">Số tiền cọc <span class="cl_red">*</span></p>
                                    <div class="b3_fr2_datcoc_container d_flex fl_row al_ct jtf_spb">
                                        <input type="text" onkeyup="format_gtri(this)" name="td_gia_datcoc" class="b3_fr2_datcoc_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
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
                            <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                                <input name="td-lienhe_ngban" type="checkbox" class="b3_fr2_lhhg_input m_lienhenguoiban_cb img24 cursor_Pt">
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
                        <div class="ctn_ct_b4_fr2 box_input_infor">
                            <p class="b4_fr2_title p_400_s15_l18">
                                Địa chỉ phòng trọ <span class="cl_red">*</span>
                            </p>
                            <input type="text" name="td_diachi_nha" class="td_ttin_diachi b4_fr2_input p_400_s14_l17 " placeholder="Địa chỉ phòng trọ" autocomplete="off">
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box7--------------------------------------------------------------------- -->
                <div class="ctn_ct_box7 d_flex fl_cl">
                    <p class="ctn_ct_b7_title p_600_s16_l19 cl_cam">
                        Khác
                    </p>
                    <div class="ctn_ct_b7_fr d_flex fl_row">
                        <div class="b7_fr2 d_flex fl_cl al_ct">
                            <p class="b7_fr2_title p_400_s15_l18">
                                Tình trạng nội thất
                            </p>
                            <select name="tinhtrangnt" id="" class="b7_fr2_select slect-hang">
                                <option value="" selected>Chọn</option>
                                <option value="1">Nội thất cao cấp</option>
                                <option value="2">Nội thất đầy đủ</option>
                                <option value="3">Hoàn thiện cơ bản</option>
                                <option value="4">Bàn giao thô</option>
                            </select>
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
                                Diện tích <span class="cl_red">*</span>
                            </p>
                            <div class="b8_fr1_content d_flex fl_row jtf_spb">
                                <input name="dientich" type="text" class="b8_fr1_input p_400_s14_l17" autocomplete="off" placeholder="Diện tích" oninput="<?= $oninput ?>">
                                <p class="b8_fr1_donvido">m<sup>2</sup></p>
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
                </div>
                <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
                <div class="ctn_ct_box9 d_flex fl_cl">
                    <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">
                        Về người bán
                    </p>
                    <div class="ctn_ct_b9_fr1 d_flex fl_cl">
                        <p class="b9_fr1_title p_400_s15_l18">
                            Bạn là <span class="cl_red">*</span>
                        </p>
                        <div class="b9_fr1_content d_flex fl_row">
                            <label class="b9_fr1_ct_label">
                                <input type="radio" name="canhan_moigioi" class="b9_fr1_ct_input b9_fr_ct_input" value="1" checked>
                                <p class="b9_fr1_content1 b9_fr1_ct_chung">Cá Nhân</p>
                            </label>
                            <label class="b9_fr2_ct_label">
                                <input type="radio" name="canhan_moigioi" class="b9_fr2_ct_input b9_fr_ct_input" value="2">
                                <p class="b9_fr1_content2 b9_fr1_ct_chung">Môi giới</p>
                            </label>
                        </div>
                    </div>

                    <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
                        <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
                        <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $usc_phone ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
                    </div>
                    <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
                        <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
                        <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $usc_email ?>" placeholder="Nhập email" autocomplete="off">
                    </div>
                    <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                        <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ</p>
                        <input name="td_dia_chi" type="text" class="b9_fr4_input p_400_s14_l17" value="<?= $usc_address ?>" placeholder="Nhập địa chỉ" autocomplete="off">
                    </div>
                </div>

                <!-- ----------------------------------------------------------------------box10--------------------------------------------------------------------- -->
                <!-- <div class="ctn_ct_box10 d_flex fl_cl">
                    <p class="ctn_ct_b10_title p_600_s16_l19 cl_cam">
                        Chi tiết danh mục <span class="cl_red">*</span>
                    </p>
                    <div class="ctn_ct_b10_fr box_input_infor">
                        <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                            <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                            <? foreach ($result_ban as $rows) { ?>
                                <option value="<?= $rows['tags_id'] ?>"><?= $rows['ten_tags']; ?></option>
                            <? } ?>
                        </select>
                    </div>
                </div> -->
                <!-- ----------------------------------------------------------------------box11--------------------------------------------------------------------- -->
                <div class="ctn_ct_box11">
                    <div class="ctn_ct_b11_button d_flex fl_row al_ct jtf_ct">
                        <p class="b11_btn_xemtruoc cursor_Pt rdu5 cl_cam bd_cam p_600_s15_l18 d_flex al_ct jtf_ct txt_al_ct" onclick="xem_trc_tin()">
                            XEM TRƯỚC
                        </p>
                        <p class="b11_btn_dangtin cursor_Pt cl_fffff bg_cam rdu5 p_600_s15_l18  d_flex al_ct jtf_ct txt_al_ct" id="xoa_tddang_tin">
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
            var form_bds_phongtro = $("#form_bds_phongtro");
            form_bds_phongtro.validate({
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
            if (form_bds_phongtro.valid() === false) {
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
            if (form_bds_phongtro.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                var user_id = $("#form_bds_phongtro").attr("data");
                var user_type = $("#form_bds_phongtro").attr("data1");
                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var ten_toanha = $("input[name='ten_toanha']").val();
                var tongso_tang = $("select[name='so_tang']").val();
                var huong_cua = $("select[name='huong_cua']").val();
                var so_phongngu = $("select[name='so_phongngu']").val();
                var so_phong_vs = $("select[name='so_nhavs']").val();
                var giayto = $("select[name='giayto']").val();
                var tinhtrangnt = $("select[name='tinhtrangnt']").val();
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
                var td_gia_datcoc = $("input[name='td_gia_datcoc']").val();
                var dvi_tien = $("select[name='dvi_tien']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var ctiet_dmuc = $("select[name='chitiet_dm']").val();
                var tinh_thanh = $("select[name='thanhpho']").val();
                var quan_huyen = $("select[name='quanhuyen']").val();
                var phuong_xa = $("select[name='phuongxa']").val();
                var so_nha = $("input[name='md_so_nha']").val();
                var huong_ban_cong = $("select[name='huong_ban_cong']").val();
                var dia_chi = $("input[name='td_diachi_nha']").val();
                // trường mới
                var td_diachi_nha = $("input[name='td_dia_chi']").val();
                var td_macan = $("input[name='td_macan']").val();
                var td_htmch_rt = $(".td_htmch_rt:checked").val();
                var td_tenpk_lo = $("input[name='td_tenpk_lo']").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var loai_hinh = $("select[name='loaihinh']").val();
                var tinh_trang = $("input[name='tinh_trang']:checked").val();
                var td_cangoc = $("input[name='td_cangoc']:checked").val();
                var td_block_thap = $("input[name='td_block_thap']").val();
                var tang_so = $("input[name='tangso']").val();
                var dc_new_unit = $("select[name='dc_new_unit']").val();
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
                fd.append('td_gia_datcoc', td_gia_datcoc);
                fd.append('dvi_tien', dvi_tien);
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
                fd.append('td_tenpk_lo', td_tenpk_lo);
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('loai_hinh', loai_hinh);
                fd.append('tinh_trang', tinh_trang);
                fd.append('td_cangoc', td_cangoc);
                fd.append('td_block_thap', td_block_thap);
                fd.append('tang_so', tang_so);
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
                    url: '/ajax_bds/dangtin_bdsnhatro.php',
                    type: 'POST',
                    data: fd,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('.td-dang-tin').prop('disabled', true);
                    },
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
        })
    </script>
    <script>
        function xem_trc_tin() {
            var form_bds_phongtro = $(".form-dtin-cont");
            form_bds_phongtro.validate({
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
            if (form_bds_phongtro.valid() === false) {
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
            if (form_bds_phongtro.valid() === true) {

                var ban_thue = $("input[name='ban_thue']:checked").val();
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var ten_toanha = $("input[name='ten_toanha']").val();
                var tongso_tang = $("select[name='so_tang']").val();
                var tang_so = $("input[name='tangso']").val();
                var loai_hinh = $("input[name='loaihinh']:checked").val();
                var huong_cua = $("select[name='huong_cua']").val();
                var so_phongngu = $("select[name='so_phongngu']").val();
                var so_phong_vs = $("select[name='so_nhavs']").val();
                var giayto = $("select[name='giayto']").val();
                var tinhtrangnt = $("select[name='tinhtrangnt']").val();
                var td_diachi_nha = $("input[name='td_diachi_nha']").val();
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
                fd.append('loai_sp9', giayto);
                fd.append('loai_sp10', tinhtrangnt);
                fd.append('loai_sp11', dientich);
                fd.append('loai_sp12', chieudai);
                fd.append('loai_sp13', chieungang);
                fd.append('gia_spham', td_gia_spham);
                fd.append('loai_sp16', td_gia_datcoc);
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
                fd.append('loaihinh_vp', loai_hinh);
                fd.append('td_diachi_nha', td_diachi_nha);


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