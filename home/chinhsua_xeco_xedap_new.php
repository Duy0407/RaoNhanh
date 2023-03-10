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
                                `new_description`,`hang`,`loai_xe`,`xuat_xu`,`kich_co`,`mau_sac`,`chat_lieu_khung`,
                                `dong_xe`,`canhan_moigioi`,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`   
                            FROM `new`LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                            WHERE `new`.`new_id` = $id_nd AND `new_user_id` = $acc_id ");

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
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 8 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
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
    <title>Ch???nh s???a xe c??? xe ?????p</title>
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
    <section id="m_dangtin_xc_xedap" class="xeco">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Ch???nh s???a</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_xeco_circle" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>" data3="<?= $xacthuc_lket ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh m???c ch???nh s???a <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="8">
                                Xe c???<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" alt="" class="img_16">
                                </span> Xe ?????p
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
                    <p class="ctn_ct_b6_title p_600_s16_l19 cl_cam">
                        Chi ti???t s???n ph???m
                    </p>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">
                                H??ng xe <span class="cl_red">*</span>
                            </p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="hang_xe" onchange="m_hang_doi(this)" data="8">
                                <option value="" disabled selected>Ch???n</option>
                                <? foreach ($db_hang as $rows) {
                                    if ($rows['id_parent'] == 8) { ?>
                                        <option <?= ($rows['id'] == $item_td['hang']) ? "selected" : "" ?> value="<?= $rows['id'] ?>"><?= $rows['ten_hang'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor">
                            <p class="b6_fr2_title p_400_s15_l18">
                                Lo???i xe <span class="cl_red">*</span>
                            </p>
                            <select class="b6_hangxe_select slect-hang hd_height36" name="loai_xe">
                                <option selected value="" class="p_400_s14_l17 ">Ch???n</option>
                                <? foreach ($db_lchung as $lx) {
                                    if ($lx['id_danhmuc'] == 2 && $lx['id_cha'] == 8) {
                                ?>
                                        <option <?= ($lx['id'] == $item_td['loai_xe']) ? "selected" : "" ?> value="<?= $lx['id'] ?>"><?= $lx['ten_loai'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_ft d_flex fl_row fl_st">
                        <div class="b6_ft1 d_flex fl_cl box_input_infor">
                            <p class="b6_ft1_title p_400_s15_l18">
                                Xu???t x???
                            </p>
                            <select class="b6_xuatxu_select slect-hang hd_height36" name="xuat_xu">
                                <option selected disabled value="">Ch???n</option>
                                <? foreach ($db_xuatxu as $xx) {
                                    if ($xx['id_parents'] == 8) {
                                ?>
                                        <option <?= ($xx['id_xuatxu'] == $item_td['xuat_xu']) ? "selected" : "" ?> value="<?= $xx['id_xuatxu'] ?>"><?= $xx['noi_xuatxu'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_ft2 d_flex fl_cl box_input_infor">
                            <p class="b6_ft2_title p_400_s15_l18">
                                M??u s???c
                            </p>
                            <select class="b6_mausac_select slect-hang hd_height36" name="mau_sac">
                                <option selected value="" class="p_400_s14_l17 ">Ch???n</option>
                                <? foreach ($db_mausac as $ms) {
                                    if ($ms['id_parents'] == 8) {
                                ?>
                                        <option <?= ($ms['id_color'] == $item_td['mau_sac']) ? "selected" : "" ?> value="<?= $ms['id_color'] ?>"><?= $ms['mau_sac'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_ktk_cl d_flex fl_row fl_st">
                        <div class="b6_ktk_kt d_flex fl_cl ">
                            <p class="b6_ktk_kt_title mgbt_5">
                                K??ch th?????c khung
                            </p>
                            <select class="b6_ktk_kt_select slect-hang hd_height36" name="kich_thuoc_khung">
                                <option selected value="" class="p_400_s14_l17 ">Ch???n</option>
                                <? foreach ($db_manhinh as $ktk) {
                                    if ($ktk['id_danhmuc'] == 8 && $ktk['phan_loai'] == 3) {
                                ?>
                                        <option <?= ($ktk['id_manhinh'] == $item_td['kich_co']) ? "selected" : "" ?> value="<?= $ktk['id_manhinh'] ?>"><?= $ktk['ten_manhinh'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                        <div class="b6_ktk_cl d_flex fl_cl ">
                            <p class="b6_ktk_cl_title mgbt_5">
                                Ch???t li???u khung
                            </p>
                            <select class="b6_ktk_cl_select slect-hang hd_height36" name="chat_lieu_khung">
                                <option selected value="" class="p_400_s14_l17 ">Ch???n</option>
                                <? foreach ($db_sp_chatlieu as $clk) {
                                    if ($clk['id_danhmuc'] == 8) {
                                ?>
                                        <option <?= ($clk['id'] == $item_td['chat_lieu_khung']) ? "selected" : "" ?> value="<?= $clk['id'] ?>"><?= $clk['name'] ?></option>
                                <? }
                                } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_tinhtrang d_flex fl_cl">
                        <p class="b6_tinhtrang_title">T??nh tr???ng <span class="cl_red">*</span></p>
                        <div class="b6_tinhtrang_fr d_flex fl_row">
                            <div class="b6_tinhtrang_cu d_flex fl_row">
                                <input type="radio" name="cu_moi" value="2" class="img20 cursor_Pt b6_tinhtrang_cu_input b6_tinhtrang_chung" <?= ($item_td['new_tinhtrang'] == 2) ? "checked" : "" ?>>
                                <p class="b6_tinhtrang_cu_text pdl_10">C??</p>
                            </div>
                            <div class="b6_tinhtrang_moi d_flex fl_row">
                                <input type="radio" name="cu_moi" value="1" class="img20 cursor_Pt b6_tinhtrang_moi_input b6_tinhtrang_chung" <?= ($item_td['new_tinhtrang'] == 1) ? "checked" : "" ?>>
                                <p class="b6_tinhtrang_moi_text pdl_10">M???i</p>
                            </div>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_baohanh">
                        <div class="b6_baohanh d_flex fl_cl flex_start">
                            <p class="b6_baohanh_title mgbt_5">
                                B???o h??nh
                            </p>
                            <select class="b6_ft2_select slect-hang hd_height36" name="bao_hanh">
                                <option selected value="" class="p_400_s14_l17 ">Ch???n</option>
                                <? foreach ($db_baohanh as $bh) {
                                    if ($bh['id_parents'] == 8) {
                                ?>
                                        <option <?= ($bh['id_baohanh'] == $item_td['new_baohanh']) ? "selected" : "" ?> value="<?= $bh['id_baohanh'] ?>"><?= $bh['tgian_baohanh'] ?></option>
                                <? }
                                } ?>
                            </select>
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
            var form_xeco_circle = $("#form_xeco_circle");
            form_xeco_circle.validate({
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
                    loai_xe: "required",
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
                        required: "Vui l??ng nh???p ti??u ?????",
                        minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                        maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                    },
                    hang_xe: "Vui l??ng ch???n h??ng xe",
                    loai_xe: "Vui l??ng ch???n lo???i xe",
                    nam_san_xuat: "Vui l??ng ch???n n??m s???n xu???t",
                    cu_moi: "Vui l??ng ch???n t??nh tr???ng xe",
                    hop_so: "Vui l??ng ch???n h???p s??? xe",
                    nhien_lieu: "Vui l??ng ch???n nhi??n li???u s??? d???ng",
                    td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                    chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                    km_di: "Vui l??ng nh???p s??? km ???? ??i",
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
            if (form_xeco_circle.valid() === false) {
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
            if (form_xeco_circle.valid() === true) {
                var user_id = $("#form_xeco_circle").attr("data");
                var user_type = $("#form_xeco_circle").attr("data1");
                var id_nd = $("#form_xeco_circle").attr("data2");
                var tieu_de = $("input[name='tieu_de']").val();
                var hang_xe = $("select[name='hang_xe']").val();
                var xuat_xu = $("select[name='xuat_xu']").val();
                var mau_sac = $("select[name='mau_sac']").val();
                var bao_hanh = $("select[name='bao_hanh']").val();
                var tinhtrang = $("input[name='cu_moi']:checked").val();
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
                var loai_xe = $("select[name='loai_xe']").val();
                var kich_thuoc_khung = $("select[name='kich_thuoc_khung']").val();
                var chat_lieu_khung = $("select[name='chat_lieu_khung']").val();
                var td_lienhe_ngban = $("input[name='td_lienhe_ngban']:checked").val();
                // -------------------------da xac thuc thanh toan----------------------------------------------
                var xac_thuc = $("#form_xeco_circle").attr("data3");
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
                fd.append('id_nd', id_nd);
                fd.append('tieu_de', tieu_de);
                fd.append('hang_xe', hang_xe);
                fd.append('xuat_xu', xuat_xu);
                fd.append('mau_sac', mau_sac);
                fd.append('bao_hanh', bao_hanh);
                fd.append('tinhtrang', tinhtrang);
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
                fd.append('loai_xe', loai_xe);
                fd.append('kich_thuoc_khung', kich_thuoc_khung);
                fd.append('chat_lieu_khung', chat_lieu_khung);
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
                    url: '/ajax_xeco/edit_xeco_xedap.php',
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
        //Xem tr?????c
        function xem_trc_tin() {
            var form_xeco_circle = $(".form-dtin-cont");
            form_xeco_circle.validate({
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
                    loai_xe: "required",
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
                        required: "Vui l??ng nh???p ti??u ?????",
                        minlength: "Ti??u ????? ??t nh???t 40 k?? t???",
                        maxlength: "Ti??u ????? nhi???u nh???t 70 k?? t???",
                    },
                    hang_xe: "Vui l??ng ch???n h??ng xe",
                    loai_xe: "Vui l??ng ch???n lo???i xe",
                    nam_san_xuat: "Vui l??ng ch???n n??m s???n xu???t",
                    cu_moi: "Vui l??ng ch???n t??nh tr???ng xe",
                    hop_so: "Vui l??ng ch???n h???p s??? xe",
                    nhien_lieu: "Vui l??ng ch???n nhi??n li???u s??? d???ng",
                    td_gia_spham: "Vui l??ng nh???p gi?? s???n ph???m",
                    chitiet_dm: "Vui l??ng ch???n chi ti???t danh m???c",
                    km_di: "Vui l??ng nh???p s??? km ???? ??i",
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
            if (form_xeco_circle.valid() === false) {
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
            if (form_xeco_circle.valid() === true) {
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var hang_xe = $("select[name='hang_xe']").val();
                var loai_xe = $("select[name='loai_xe']").val();
                var dung_tich_xe = $("select[name='dung_tich_xe']").val();
                var xuat_xu = $("select[name='xuat_xu']").val();
                var mau_sac = $("select[name='mau_sac']").val();
                var bao_hanh = $("select[name='bao_hanh']").val();
                var tinhtrang = $("input[name='cu_moi']:checked").val();
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
                // 
                var kich_thuoc_khung = $("select[name='kich_thuoc_khung']").val();
                var chat_lieu_khung = $("select[name='chat_lieu_khung']").val();
                // 
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
                fd.append('loai_sp2', loai_xe);
                fd.append('loai_sp4', xuat_xu);
                fd.append('loai_sp5', kich_thuoc_khung);
                fd.append('loai_sp6', mau_sac);
                fd.append('loai_sp7', chat_lieu_khung);
                fd.append('loai_sp8', bao_hanh);
                fd.append('loai_sp9', tinhtrang);
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