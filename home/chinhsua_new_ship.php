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
                                `new_description`,`new_description`,`new_description`,`tgian_bd`,`tgian_kt`,
                                `ca_ngay`, `loai_xe`,`loai_hang_hoa`,`canhan_moigioi`
                                FROM `new`LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                                WHERE `new`.`new_id` = $id_nd AND `new_user_id` = $acc_id LIMIT 1");

    if (mysql_num_rows($list_tin->result) > 0) {
        $item_td = mysql_fetch_assoc($list_tin->result);
        $avt_dangtin = $item_td['new_image'];
        $video_dangtin = $item_td['new_video'];
        $tinh_thanh = $item_td['new_city'];
        $quan_huyen = $item_td['quan_huyen'];
        $phuong_xa = $item_td['phuong_xa'];
        $hom_nay = date('Y-m-d', time());
        // tag danh muc
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 19 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
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
    <title>Chỉnh sửa Ship </title>
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
    <section id="m_dangtin_ship" class="suckhoe ship">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Chỉnh sửa</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_ship" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục sản phẩm <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="19">
                                Ship
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ---------------------------------------box3 --------------------------------------------------------------------->
                <div class="ctn_ct_b3_fr1 b3_tieude box_input_infor">
                    <p class="b3_fr1_title p_400_s15_l18">Tiêu đề <span class="cl_red">*</span></p>
                    <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tiêu đề" autocomplete="off">
                    <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">lớn hơn 40, nhỏ hơn 70 ký tự</p>
                </div>
                <!-- ----------------------khu vuc nhan giao hang------------------------------ -->
                <div class="m_khuvuc_giaohang ">
                    <p class="kvgh_title p_400_s15_l18 mg_bt5">Khu vực nhận giao hàng <span class="cl_red">*</span></p>
                    <div class="box_khuvuc_giaohang d_flex fl_row gap20">
                        <div class="kvgh_tinhthanh box_input_infor">
                            <select class="kvgh_tinhthanh_select slect-hang  hd_height36" name="thanhpho" onchange="tinh_tp(this)">
                                <option disabled selected value="">Tỉnh/thành phố</option>
                                <? foreach ($arrcity as $row_cty) { ?>
                                    <option value="<?= $row_cty['cit_id'] ?>" <?= ($row_cty['cit_id'] == $item_td['new_city'] )?"selected":"" ?>><?= $row_cty['cit_name'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="kvgh_quanhuyen box_input_infor">
                            <select class="md_quan_huyen kvgh_quanhuyen_select slect-hang" name="quanhuyen">
                                <option value="">Quận/huyện</option>
                                <?
                                    $query = new db_query("SELECT * FROM `city2` WHERE cit_parent = '" . $item_td['new_city'] . "'");
                                    $list_distric = $query->result_array();
                                    foreach ($list_distric as $city) { ?>
                                        <option <?= ($city['cit_id'] == $item_td['quan_huyen']) ? "selected" : "" ?> value="<?= $city['cit_id'] ?>"><?= $city['cit_name'] ?></option>
                                    <? } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- ----------------------thoi gian lam viec----------------------------- -->
                <div class="m_thoiganlamviec">
                    <p class="thoiganlamviec_title p_400_s15_l18 mg_bt5">Thời gian làm việc <span class="cl_red">*</span></p>
                    <div class="box_thoiganlamviec d_flex fl_row gap20">
                        <div class="tglv_thoigian d_flex fl_row gap20 al_ct">
                            <div class="box_batdau_tglv box_input_infor">
                                <input type="time" value="<?= (($item_td['ca_ngay']) == 0) ? date('H:i',$item_td['tgian_bd']) :"" ?>" <?= (($item_td['ca_ngay']) == 1)?"disabled":"" ?> class="batdau_tglv input_infor_tag error time_work" name="time_lamviec">
                            </div>
                            <img src="/images/m_raonhanh_imgnew/Line 12.png" class="thanhngang_tglv">
                            <div class="box_batdau_tglv box_input_infor">
                                <input type="time" value="<?= (($item_td['ca_ngay'])== 0) ? date('H:i',$item_td['tgian_kt']) :"" ?>" <?= (($item_td['ca_ngay']) == 1)?"disabled":"" ?> class="ketthuc_tglv input_infor_tag error time_work" name="time_ketthuc">
                            </div>
                        </div>
                        <div class="tglv_cangay d_flex fl_row al_ct gap10">
                            <input type="checkbox" class="img20 tglv_cangay_input" name="checkbox_time" <?= (($item_td['ca_ngay']) == 1)?"checked":"" ?>>
                            <p class="tglv_cangay_text">Cả ngày</p>
                        </div>
                    </div>
                </div>
                <!-- ----------------------loại xe loai hang hoa----------------------------- -->
                <div class="m_Loaixe_hanghoa">
                    <div class="box_loaixe_hanghoa d_flex fl_row gap20">
                        <div class="box_loaixe">
                            <p class="loaixe_title p_400_s15_l18 mg_bt5">Loại xe</p>
                            <select class="box_loaixe_select slect-hang  hd_height36" name="loaixe">
                                <option disabled selected value="">Loại xe</option>
                                <? foreach ($db_lchung as $lx) {
                                    if ($lx['id_danhmuc'] == 52) {
                                ?>
                                        <option value="<?= $lx['id'] ?>" <?= ($lx['id'] == $item_td['loai_xe'] )?"selected":"" ?>><?= $lx['ten_loai'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="box_hanghoa">
                            <p class="hanghoa_title p_400_s15_l18 mg_bt5">Loại hàng hóa giao</p>
                            <select class="box_hanghoa_select slect-hang" name="loai_hanghoa">
                                <option value="">Loại hàng hóa giao</option>
                                <? foreach ($db_lchung as $lhh) {
                                    if ($lhh['id_danhmuc'] == 19 && $lhh['id_cha'] == 0) {
                                ?>
                                        <option value="<?= $lhh['id'] ?>" <?= ($lhh['id'] == $item_td['loai_hang_hoa'] )?"selected":"" ?>><?= $lhh['ten_loai'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="ctn_ct_b3_fr2 d_flex fl_cl">
                    <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                        <div class="b3_fr2_gia box_input_infor">
                            <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                            <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                <input type="text" onkeyup="format_gtri(this)" id="gia-ban-sp" value="<?= ($item_td['new_money'] > 0) ? number_format($item_td['new_money']) : "" ?>" <?= ($item_td['new_money'] != 0 && $item_td['chotang_mphi'] != 1) ? '' : 'disabled' ?> onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                                <div class="donvitien p_400_s14_l17">
                                    <select class="dt-money-up donvi_ban" name="dvi_tien">
                                        <option value="1" <?= ($item_td['new_unit'] == 1) ? 'selected' : "" ?>>VNĐ</option>
                                        <option value="2" <?= ($item_td['new_unit'] == 2) ? 'selected' : "" ?>>USD</option>
                                        <option value="3" <?= ($item_td['new_unit'] == 3) ? 'selected' : "" ?>>EURO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box_lhhg_ctmp">
                        <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                            <input name="td_lienhe_ngban" type="checkbox" value="0" class="b3_fr2_lhhg_input m_lienhenguoiban_cb img24 cursor_Pt" <?= ($item_td['chotang_mphi'] == 0 && $item_td['new_money'] == 0) ? "checked" : "" ?>>
                            <p class="b3_fr2_lhhg_text pdl_10">Liên hệ người bán để hỏi giá</p>
                        </div>
                    </div>
                </div>
                <div class="ctn_ct_b3_fr3 box_input_infor">
                    <p class="b3_fr3_title p_400_s15_l18">
                        Mô tả <span class="cl_red">*</span>
                    </p>
                    <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"><?= nl2br($item_td['new_description']) ?></textarea>
                    <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                        <input type="text" name="count" id="count" value="0"> / 10000 ký tự
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
                <div class="ctn_ct_box9 d_flex fl_cl">
                    <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">
                        Về người bán
                    </p>
                    <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
                        <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
                        <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $item_td['new_phone']; ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
                    </div>
                    <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
                        <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
                        <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $item_td['new_email']; ?>" placeholder="Nhập email" autocomplete="off">
                    </div>
                    <div class="xc_box_diachi">
                        <?
                        $dia_chi = $item_td['dia_chi'];
                        if ($dia_chi != '') {
                            $dia_chi = explode(";", $dia_chi);
                            $stt = 0;
                            foreach ($dia_chi as $dc) {
                                if ($dc != "") {
                                    $stt++;
                                    if ($stt <= 1) {
                                    ?>
                                        <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                                            <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ <?= ($stt == 1) ? '' : $stt ?></p>
                                            <input name="td_dia_chi" type="text" onkeyup="format_gtri_dc(this)" class=" b9_fr4_input m_diachi_xc p_400_s14_l17" value="<?= ltrim($dc, ',') ?>" placeholder="Nhập địa chỉ" autocomplete="off">
                                        </div>
                                    <? } else { ?>
                                        <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                                            <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ <span class="one_stt"><?= $stt ?></span></p>
                                            <input name="td_dia_chi" type="text" onkeyup="format_gtri_dc(this)" class=" b9_fr4_input m_diachi_xc p_400_s14_l17" value="<?= ltrim($dc, ',') ?>" placeholder="Nhập địa chỉ" autocomplete="off">
                                            <img src="/images/m_raonhanh_imgnew/delete_dc.svg" alt="" class="m_delete_dc cursor_Pt img26" onclick="xoa_diachi(this)">
                                        </div>
                                    <? }
                                }
                            }
                        } else { ?>
                            <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                                <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ</p>
                                <input name="td_dia_chi" type="text" onkeyup="format_gtri_dc(this)" class=" b9_fr4_input m_diachi_xc p_400_s14_l17" value="" placeholder="Nhập địa chỉ" autocomplete="off">
                            </div>
                        <? } ?>
                    </div>
                    <div class="xc_themdiachi cursor_Pt">
                        <div class="xc_themdiachi_fr al_ct d_flex fl_row">
                            <img src="/images/m_raonhanh_imgnew/fluent_add-circle-20-regular.svg" alt="" class="xc_themdiachi_img cursor_Pt img20">
                            <p class="xc_themdiachi_text pdl_5 cl_blue p_400_s15_l18">Thêm địa chỉ</p>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box10--------------------------------------------------------------------- -->
                <div class="ctn_ct_box10 d_flex fl_cl">
                    <p class="ctn_ct_b10_title p_600_s16_l19 cl_cam">
                        Chi tiết danh mục <span class="cl_red">*</span>
                    </p>
                    <div class="ctn_ct_b10_fr box_input_infor">
                        <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                            <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                            <? foreach ($result_ban as $rows) { ?>
                                <option value="<?= $rows['tags_id'] ?>" <?= ($rows['tags_id'] == $item_td['new_ctiet_dmuc']) ? 'selected' : '' ?>><?= $rows['ten_tags']; ?></option>
                            <? } ?>
                        </select>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box11--------------------------------------------------------------------- -->
                <div class="ctn_ct_box11">
                    <div class="ctn_ct_b11_button d_flex fl_row al_ct jtf_ct">
                        <p class="b11_btn_xemtruoc cursor_Pt rdu5 cl_cam bd_cam p_600_s15_l18 d_flex al_ct jtf_ct txt_al_ct" onclick="xem_trc_tin()">
                            XEM TRƯỚC
                        </p>
                        <p class="b11_btn_chinhsua chinhsua_oto cursor_Pt cl_fffff bg_cam rdu5 p_600_s15_l18  d_flex al_ct jtf_ct txt_al_ct">
                            CHỈNH SỬA
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
    <script src="/js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script src="/js/m_raonhanh_new.js"></script>
    <script>
        $('.tglv_cangay_input').click(function() {
            if ($('.tglv_cangay_input').prop('checked')) {
                var rong = '';
                $('.time_work').val(rong);
                $('.time_work').prop('disabled', true);
            } else {
                $('.time_work').prop('disabled', false);
            }
        });
        $('.ship .ctn_ct_box10').hide()
        $(".b11_btn_chinhsua").click(function() {
            var form_ship = $("#form_ship");
            form_ship.validate({
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
                    td_gia_spham: "required",
                    chitiet_dm: "required",
                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                    thanhpho: "required",
                    quanhuyen: "required",
                    time_lamviec: "required",
                    time_ketthuc: "required",

                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Nhập ít nhất 40 ký tự",
                        maxlength: "Nhập nhiều nhất 70 ký tự",
                    },
                    td_gia_spham: "Vui lòng nhập giá sản phẩm",
                    chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                    thanhpho: "Vui lòng chọn Thành Phố",
                    quanhuyen: "Vui lòng chọn Quận Huyện",
                    time_lamviec: "Vui lòng thời gian bắt đầu",
                    time_ketthuc: "Vui lòng thời gian kết thúc",
                },
            });
            if (form_ship.valid() === false) {
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
            if (form_ship.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                var user_id = $("#form_ship").attr("data");
                var user_type = $("#form_ship").attr("data1");
                var id_nd = $("#form_ship").attr("data2");
                var tieu_de = $("input[name='tieu_de']").val();
                var thanhpho = $("select[name='thanhpho']").val();
                var quanhuyen = $("select[name='quanhuyen']").val();
                if ($("input[name='checkbox_time']").is(":checked")) {
                    var ca_ngay = 1;
                    var time_lamviec = 0;
                    var time_ketthuc = 0;

                } else {
                    var ca_ngay = 0;
                    var time_lamviec = $("input[name='time_lamviec']").val();
                    var time_ketthuc = $("input[name='time_ketthuc']").val();
                };
                var loaixe = $("select[name='loaixe']").val();
                var loai_hanghoa = $("select[name='loai_hanghoa']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                } else {
                    var td_gia_spham = $("input[name='td_gia_spham']").val();
                };
                var dvi_tien = $("select[name='dvi_tien']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var ctiet_dmuc = $("select[name='chitiet_dm']").val();
                var arr_diachi = [];
                $('.m_diachi_xc').each(function() {
                    var dia_chi = $(this).val();
                    arr_diachi.push(dia_chi + ";");
                })
                // truong moi
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var td_lienhe_ngban = $("input[name='td_lienhe_ngban']:checked").val();
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
                fd.append('tieu_de', tieu_de);
                fd.append('id_nd', id_nd);
                fd.append('thanhpho', thanhpho);
                fd.append('quanhuyen', quanhuyen);
                fd.append('time_lamviec', time_lamviec);
                fd.append('time_ketthuc', time_ketthuc);
                fd.append('ca_ngay', ca_ngay);
                fd.append('loaixe', loaixe);
                fd.append('loai_hanghoa', loai_hanghoa);
                fd.append('td_gia_spham', td_gia_spham);
                fd.append('dvi_tien', dvi_tien);
                fd.append('mo_ta', mo_ta);
                fd.append('ctiet_dmuc', ctiet_dmuc);
                fd.append('dia_chi', arr_diachi);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
                // truong moi
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('td_lienhe_ngban', td_lienhe_ngban);
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
                url: '/ajax/chinhsua_shipp.php',
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
            var form_ship = $(".form-dtin-cont");
            form_ship.validate({
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
                    td_gia_spham: "required",
                    chitiet_dm: "required",
                    mota: {
                        required: true,
                        minlength: 10,
                        maxlength: 10000,
                    },
                    sdt_lienhe: {
                        required: true,
                        vali_phone: true,
                    },
                    thanhpho: "required",
                    quanhuyen: "required",
                    time_lamviec: "required",
                    time_ketthuc: "required",

                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Nhập ít nhất 40 ký tự",
                        maxlength: "Nhập nhiều nhất 70 ký tự",
                    },
                    td_gia_spham: "Vui lòng nhập giá sản phẩm",
                    chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                    mota: {
                        required: "Vui lòng nhập mô tả",
                        minlength: "Mô tả ít nhất 10 ký tự",
                        maxlength: "Mô tả nhiều nhất 10000 ký tự",
                    },
                    sdt_lienhe: {
                        required: "Nhập số điện thoại liên hệ",
                    },
                    thanhpho: "Vui lòng chọn Thành Phố",
                    quanhuyen: "Vui lòng chọn Quận Huyện",
                    time_lamviec: "Vui lòng thời gian bắt đầu",
                    time_ketthuc: "Vui lòng thời gian kết thúc",
                },
            });
            if (form_ship.valid() === false) {
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
            if (form_ship.valid() === true) {
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var thanhpho = $("select[name='thanhpho']").val();
                var quanhuyen = $("select[name='quanhuyen']").val();
                if ($("input[name='checkbox_time']").is(":checked")) {
                    var ca_ngay = 1;
                    var time_lamviec = 0;
                    var time_ketthuc = 0;

                } else {
                    var ca_ngay = 0;
                    var time_lamviec = $("input[name='time_lamviec']").val();
                    var time_ketthuc = $("input[name='time_ketthuc']").val();
                };
                var loaixe = $("select[name='loaixe']").val();
                var loai_hanghoa = $("select[name='loai_hanghoa']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                };
                var mo_ta = $("textarea[name='mota']").val();
                var ctiet_dmuc = $("select[name='chitiet_dm']").val();
                var arr_diachi = [];
                $('.m_diachi_xc').each(function() {
                    var dia_chi = $(this).val();
                    arr_diachi.push(dia_chi);
                })
                var phan_biet = 1;
                var donvi_ban = $(".donvi_ban").val();
                var donvi_mua = $(".donvi_mua").val();
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
                fd.append('loai_sp', thanhpho);
                fd.append('loai_sp2', quanhuyen);
                fd.append('loai_sp3', time_lamviec);
                fd.append('loai_sp4', time_ketthuc);
                fd.append('loai_sp5', ca_ngay);
                fd.append('loai_sp6', loaixe);
                fd.append('loai_sp7', loai_hanghoa);
                fd.append('gia_spham', td_gia_spham);
                fd.append('mo_ta', mo_ta);
                fd.append('ctiet_dmuc', ctiet_dmuc);
                fd.append('dia_chi', arr_diachi);
                fd.append('avt_anh', arr_src.concat(anh_dd));
                fd.append('phan_biet', phan_biet);
                fd.append('donvi_ban', donvi_ban);
                fd.append('donvi_mua', donvi_mua);

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