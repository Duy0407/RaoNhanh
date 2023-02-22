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
                                `new_description`,`giong_thu_cung`,`do_tuoi`,`kich_co`,`gioi_tinh`,`canhan_moigioi`
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
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 111 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
        $result_ban = ($ban->result_array());

        $sql_cho = new db_query("SELECT `id`, `giong_thucung` FROM `giong_thu_cung` WHERE id_danhmuc = 111");
        $result_cho = $sql_cho->result_array();
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
    <title>Chỉnh sửa Thú cưng Chó </title>
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
    <section id="m_dangtin_thucung" class="suckhoe thucung">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Chỉnh sửa</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_tc_cho" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục sản phẩm <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="111">
                                Thú cưng<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" alt="" class="img_16">
                                </span> Chó
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
                <!-- giong thu cung -->
                <div class="b6_loaihinh giongthucung loai_dungcu d_flex fl_cl box_input_infor">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Giống thú cưng <span class="cl_red">*</span>
                    </p>
                    <select class="slect-hang hd_height36 b6_lhinh_select giong_thucung" name="giong_thucung">
                        <option value="">Giống thú cưng </option>
                        <? foreach ($result_cho as $cho) : ?>
                            <option <?= ($cho['id'] == $item_td['giong_thu_cung']) ? "selected" : "" ?> value="<?= $cho['id'] ?>"><?= $cho['giong_thucung'] ?></option>
                        <? endforeach ?>
                    </select>

                </div>
                <!-- do tuoi -->
                <div class="b6_loaihinh dotuoi_thucung d_flex fl_cl box_input_infor pd_t_20">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Độ tuổi <span class="cl_red">*</span>
                    </p>
                    <select class="slect-hang hd_height36 b6_lhinh_select do_tuoi" name="do_tuoi">
                        <option value="">Độ tuổi</option>
                        <? foreach ($db_ttthucung as $dt) {
                            if ($dt['id_danhmuc'] == 111 && $dt['type'] == 1) { ?>
                                <option value="<?= $dt['id'] ?>" <?= ($dt['id'] == $item_td['do_tuoi']) ? "selected" : "" ?>><?= $dt['contents_name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <!-- do tuoi -->
                <div class="b6_loaihinh kichco_thucung d_flex fl_cl box_input_infor pd_t_20">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Kích cỡ thú cưng <span class="cl_red">*</span>
                    </p>
                    <select class="slect-hang hd_height36 b6_lhinh_select kichco" name="kichco">
                        <option value="">Kích cỡ thú cưng</option>
                        <? foreach ($db_ttthucung as $kc) {
                            if ($kc['id_danhmuc'] == 111 && $kc['type'] == 2) { ?>
                                <option value="<?= $kc['id'] ?>" <?= ($kc['id'] == $item_td['kich_co']) ? "selected" : "" ?>><?= $kc['contents_name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <!-- do tuoi -->
                <div class="b6_loaihinh gioitinh_thucung d_flex fl_cl box_input_infor pd_t_20">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Giới tính
                    </p>
                    <select class="slect-hang hd_height36 b6_lhinh_select gioitinh" name="gioitinh">
                        <option value="">Giới tính</option>
                        <? foreach ($db_ttthucung as $gt) {
                            if ($gt['id_danhmuc'] == 111 && $gt['type'] == 3) { ?>
                                <option value="<?= $gt['id'] ?>" <?= ($gt['id'] == $item_td['gioi_tinh']) ? "selected" : "" ?>><?= $gt['contents_name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <? include("../includes/inc_new/bottom_dangtin_chung_new.php"); ?>
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
        $(".b11_btn_chinhsua").click(function() {
            var form_tc_cho = $("#form_tc_cho");
            form_tc_cho.validate({
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
                    giong_thucung: "required",
                    do_tuoi: "required",
                    kichco: "required",
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
                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "tiêu đề ít nhất 40 ký tự",
                        maxlength: "tiêu đề nhiều nhất 70 ký tự",
                    },
                    giong_thucung: "Vui lòng chọn giống thú cưng",
                    do_tuoi: "Vui lòng chọn độ tuổi",
                    kichco: "Vui lòng chọn kích cỡ thú cưng",
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
                },
            });
            if (form_tc_cho.valid() === false) {
                $("#xoa_tddang_tin").addClass("b11_btn_dangtin");
                event.preventDefault();
                event.stopPropachotion();
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
            if (form_tc_cho.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                var user_id = $("#form_tc_cho").attr("data");
                var user_type = $("#form_tc_cho").attr("data1");
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var id_nd = $("#form_tc_cho").attr("data2");
                var tieu_de = $("input[name='tieu_de']").val();
                var giong_thucung = $("select[name='giong_thucung']").val();
                var do_tuoi = $("select[name='do_tuoi']").val();
                var kichco = $("select[name='kichco']").val();
                var gioitinh = $("select[name='gioitinh']").val();
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
                if (($("input[name='td_dia_chi']").val()) == "") {
                    $('.m_diachi_xc').each(function() {
                        var dia_chi = $(this).val();
                        arr_diachi.push(dia_chi);
                    })
                } else {
                    $('.m_diachi_xc').each(function() {
                        var dia_chi = $(this).val();
                        arr_diachi.push(dia_chi + ";");
                    })
                }
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
                fd.append('id_dm', id_dm);
                fd.append('id_nd', id_nd);
                fd.append('giong_thucung', giong_thucung);
                fd.append('do_tuoi', do_tuoi);
                fd.append('kichco', kichco);
                fd.append('gioitinh', gioitinh);
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
                url: '/ajax_thucung/edit_thucung_cho.php',
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
                    // console.log(data);
                }
            })
            }
        })
    </script>
    <script>
        //Xem trước
        function xem_trc_tin() {
            var form_tc_cho = $(".form-dtin-cont");
            form_tc_cho.validate({
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
                    giong_thucung: "required",
                    do_tuoi: "required",
                    kichco: "required",
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
                },
                messages: {
                    tieu_de: {
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "tiêu đề ít nhất 40 ký tự",
                        maxlength: "tiêu đề nhiều nhất 70 ký tự",
                    },
                    giong_thucung: "Vui lòng chọn giống thú cưng",
                    do_tuoi: "Vui lòng chọn độ tuổi",
                    kichco: "Vui lòng chọn kích cỡ thú cưng",
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
                },
            });
            if (form_tc_cho.valid() === false) {
                event.preventDefault();
                event.stopPropachotion();
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
            if (form_tc_cho.valid() === true) {
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var giong_thucung = $("select[name='giong_thucung']").val();
                var do_tuoi = $("select[name='do_tuoi']").val();
                var kichco = $("select[name='kichco']").val();
                var gioitinh = $("select[name='gioitinh']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                } else {
                    var td_gia_spham = $("input[name='td_gia_spham']").val();
                };
                var mo_ta = $("textarea[name='mota']").val();
                var ctiet_dmuc = $("select[name='chitiet_dm']").val();
                var tinh_thanh = $("select[name='thanhpho']").val();
                var quan_huyen = $("select[name='quanhuyen']").val();
                var phuong_xa = $("select[name='phuongxa']").val();
                var so_nha = $("input[name='md_so_nha']").val();
                var arr_diachi = [];
                if (($("input[name='td_dia_chi']").val()) == "") {
                    $('.m_diachi_xc').each(function() {
                        var dia_chi = $(this).val();
                        arr_diachi.push(dia_chi);
                    })
                } else {
                    $('.m_diachi_xc').each(function() {
                        var dia_chi = $(this).val();
                        arr_diachi.push(dia_chi + ";");
                    })
                }
                var phan_biet = 2;
                var donvi_mua = $(".donvi_mua").val();
                var donvi_ban = $(".donvi_ban").val();
                var anh_dd = [];
                $(".m_anh_dangtin").each(function() {
                    var anh_dang = $(this).attr("src");
                    if (anh_dang != "") {
                        anh_dd.push(anh_dang);
                    }
                });
                var free_gift = 0;
                if ($(".m_chotangmienphi_cb").is(":checked")) {
                    var free_gift = 1;
                };
                var fd = new FormData();
                fd.append("id_dmuc", id_dm);
                fd.append('free_gift', free_gift);
                fd.append('tieu_de', tieu_de);
                fd.append('loai_sp', giong_thucung);
                fd.append('loai_sp2', do_tuoi);
                fd.append('loai_sp3', kichco);
                fd.append('loai_sp4', gioitinh);
                fd.append('gia_spham', td_gia_spham);
                fd.append('mo_ta', mo_ta);
                fd.append('ctiet_dmuc', ctiet_dmuc);
                fd.append('dia_chi', arr_diachi);
                fd.append('avt_anh', arr_src.concat(anh_dd));
                fd.append('phan_biet', phan_biet);
                fd.append('donvi_ban', donvi_ban);

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