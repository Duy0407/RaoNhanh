<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'GET', 0);
$id_nd = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_nd != 0 && $id_dm != 0) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];

    $list_tin = new db_query("SELECT `new`.`new_id`, `new_title`,`link_title`,`new_money`, `new_cate_id`, 
                                `new_city`, `new_user_id`, `new_image`, `new_create_time`,
                                `new_type`,`new_active`,`new_unit`, `new_name`, `new_phone`, 
                                `new_email`, `new_address`, `da_ban`,`chotang_mphi`, `quan_huyen`, 
                                `phuong_xa`, `new_sonha`,`dia_chi`, `new_video`, `new_ctiet_dmuc`,
                                `new_tinhtrang`,`new_baohanh`,`new_buy_sell`,`new_update_time`,
                                `new_description`,`canhan_moigioi`,`loai_chung`,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`
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
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 47 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
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
    <title>Ch???nh s???a Gi??y, d??p </title>
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
    <section id="m_dangtin_thoitrang" class="suckhoe thoitrang">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Ch???nh s???a</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_thoitrang_giaydep" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>" data3="<?= $xacthuc_lket ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh m???c s???n ph???m <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="47">
                                Th???i trang <span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" alt="" class="img_16">
                                </span> Gi??y, d??p
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ---------------------------------------box3 --------------------------------------------------------------------->
                <div class="ctn_ct_b3_fr1 b3_tieude box_input_infor">
                    <p class="b3_fr1_title p_400_s15_l18">Ti??u ????? <span class="cl_red">*</span></p>
                    <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nh???p ti??u ??????" autocomplete="off">
                    <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">l???n h??n 40, nh??? h??n 70 k?? t???</p>
                </div>
                <!-- loai dung cu -->
                <div class="b6_loaihinh loai_dungcu d_flex fl_cl box_input_infor">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Lo???i s???n ph???m <span class="cl_red">*</span>
                    </p>
                    <select class="slect-hang hd_height36 b6_lhinh_select loai_san_pham" name="loai_san_pham">
                        <option value="">Lo???i s???n ph???m</option>
                        <? foreach ($db_lchung as $rows) {
                            if ($rows['id_danhmuc'] == 47) { ?>
                                <option value="<?= $rows['id'] ?>" <?= ($rows['id'] == $item_td['loai_chung']) ? "selected" : "" ?>><?= $rows['ten_loai'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <!-- tinh trang -->
                <div class="ctn_ct_b6_tinhtrang d_flex fl_cl box_input_infor">
                    <p class="b6_tinhtrang_title">T??nh tr???ng <span class="cl_red">*</span></p>
                    <div class="b6_tinhtrang_fr d_flex fl_row">
                        <div class="b6_tinhtrang_moi d_flex fl_row">
                            <input type="radio" name="cu_moi" value="1" class="img20 cursor_Pt b6_tinhtrang_moi_input b6_tinhtrang_chung" <?= ($item_td['new_tinhtrang'] == 1) ? "checked" : "" ?>>
                            <p class="b6_tinhtrang_moi_text pdl_10">M???i</p>
                        </div>
                        <div class="b6_tinhtrang_cu d_flex fl_row">
                            <input type="radio" name="cu_moi" value="2" class="img20 cursor_Pt b6_tinhtrang_cu_input b6_tinhtrang_chung" <?= ($item_td['new_tinhtrang'] == 2) ? "checked" : "" ?>>
                            <p class="b6_tinhtrang_cu_text pdl_10">???? s??? d???ng</p>
                        </div>
                    </div>
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
        // 
        // $('.loai_san_pham').change(function() {
        //     var id_tt = $("select[name='loai_san_pham']").val();
        //     var id_dm = $('.b1_fr2_title_p').attr("data");
        //     $.ajax({
        //         type: 'POST',
        //         url: '/render/ctiet_dmuc.php',
        //         data: {
        //             id_tt: id_tt,
        //             id_dm: id_dm,
        //         },
        //         success: function(data) {
        //             // alert(data);
        //             $("#chitiet_dm").html(data);

        //         }
        //     })
        // });
        $(".b11_btn_chinhsua").click(function() {
            var form_thoitrang_giaydep = $("#form_thoitrang_giaydep");
            form_thoitrang_giaydep.validate({
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
                    so_luong_kho: "required",
                    soluong_min: "required",
                    soluong_max: "required",
                    loai_khuyenmai: "required",
                    giatri_khuyenmai: "required",
                    ngay_bat_dau: "required",
                    ngay_ket_thuc: "required",
                    phi_van_chuyen: "required",
                    van_chuyen: "required",
                    canhan_moigioi: "required",

                },
                messages: {
                    tieu_de: {
                        required: "Vui l??ng nh???p ti??u ?????",
                        minlength: "Nh????p i??t nh????t 40 ky?? t????",
                        maxlength: "Nh????p nhi????u nh????t 70 ky?? t????",
                    },
                    td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                    chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                    mota: {
                        required: "Vui l??ng nh???p m?? t???",
                        minlength: "M?? t??? ??t nh???t 10 k?? t???",
                        maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                    },
                    sdt_lienhe: {
                        required: "Nh???p s??? ??i???n tho???i li??n h???",
                    },
                    so_luong_kho: "Vui l??ng nh???p s??? l?????ng kho",
                    soluong_min: "Vui l??ng nh???p s??? l?????ng t???i thi???u",
                    soluong_max: "Vui l??ng nh???p s??? l?????ng t???i ??a",
                    loai_khuyenmai: "Vui l??ng ch???n lo???i khuy???n m???i",
                    giatri_khuyenmai: "Vui l??ng nh???p gi?? tr??? khuy???n m???i",
                    ngay_bat_dau: "Vui l??ng ch???n ng??y b???t ?????u",
                    ngay_ket_thuc: "Vui l??ng ch???n ng??y k???t th??c",
                    phi_van_chuyen: "Vui l??ng nh???p ph?? v???n chuy???n",
                    van_chuyen: "Vui l??ng ch???n l???ai ph?? v???n chuy???n",
                    canhan_moigioi: "Vui l??ng ch???n ng?????i b??n",
                },
            });
            if (form_thoitrang_giaydep.valid() === false) {
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
            if (form_thoitrang_giaydep.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                var user_id = $("#form_thoitrang_giaydep").attr("data");
                var user_type = $("#form_thoitrang_giaydep").attr("data1");
                var id_nd = $("#form_thoitrang_giaydep").attr("data2");
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var tieu_de = $("input[name='tieu_de']").val();
                var tinh_trang = $("input[name='cu_moi']:checked").val();
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
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var td_lienhe_ngban = $("input[name='td_lienhe_ngban']:checked").val();
                var loai_san_pham = $("select[name='loai_san_pham']").val();
                // -------------------------da xac thuc thanh toan----------------------------------------------
                var xac_thuc = $("#form_thoitrang_giaydep").attr("data3");
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
                // l???y ???nh cu??
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
                fd.append('tinh_trang', tinh_trang);
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
                fd.append('loai_san_pham', loai_san_pham);
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
                $.ajax({
                    type: 'POST',
                    url: '/ajax_thoitrang/csua_giaydep.php',
                    data: fd,
                    processData: false,
                    contentType: false,
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
        //Xem tr?????c
        function xem_trc_tin() {
            var form_thoitrang_giaydep = $(".form-dtin-cont");
            form_thoitrang_giaydep.validate({
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
                        required: "Vui l??ng nh???p ti??u ?????",
                        minlength: "Nh????p i??t nh????t 40 ky?? t????",
                        maxlength: "Nh????p nhi????u nh????t 70 ky?? t????",
                    },
                    td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                    chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                    mota: {
                        required: "Vui l??ng nh???p m?? t???",
                        minlength: "M?? t??? ??t nh???t 10 k?? t???",
                        maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                    },
                    sdt_lienhe: {
                        required: "Nh???p s??? ??i???n tho???i li??n h???",
                    },
                    so_luong_kho: "Vui l??ng nh???p s??? l?????ng kho",
                    soluong_min: "Vui l??ng nh???p s??? l?????ng t???i thi???u",
                    soluong_max: "Vui l??ng nh???p s??? l?????ng t???i ??a",
                    loai_khuyenmai: "Vui l??ng ch???n lo???i khuy???n m???i",
                    giatri_khuyenmai: "Vui l??ng nh???p gi?? tr??? khuy???n m???i",
                    ngay_bat_dau: "Vui l??ng ch???n ng??y b???t ?????u",
                    ngay_ket_thuc: "Vui l??ng ch???n ng??y k???t th??c",
                    phi_van_chuyen: "Vui l??ng nh???p ph?? v???n chuy???n",
                    van_chuyen: "Vui l??ng ch???n l???ai ph?? v???n chuy???n",
                },
            });
            if (form_thoitrang_giaydep.valid() === false) {
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
            if (form_thoitrang_giaydep.valid() === true) {
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var tinh_trang = $("input[name='cu_moi']:checked").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                var loai_san_pham = $("select[name='loai_san_pham']").val();
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
                fd.append('id_dmuc', id_dm);
                fd.append('tieu_de', tieu_de);
                fd.append('tinh_trang', tinh_trang);
                fd.append('gia_spham', td_gia_spham);
                fd.append('loai_sp', loai_san_pham);
                fd.append('ctiet_dmuc', ctiet_dmuc);
                fd.append('dia_chi', arr_diachi);
                fd.append('donvi_ban', donvi_ban);
                fd.append('mo_ta', mo_ta);
                fd.append('avt_anh', arr_src.concat(anh_dd));
                fd.append('phan_biet', phan_biet);
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