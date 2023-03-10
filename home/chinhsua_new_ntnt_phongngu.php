<?
include("config.php");
$id_nd = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_nd != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $qr_listds = new db_query("SELECT `new`.`new_id`, `new_title`, `new_money`, `new_city`, `new_image`, `new_unit`, `new_phone`, `new_email`, `new_cate_id`,
                            `new_address`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`, `new_tinhtrang`, `new_description`,
                            `chotang_mphi`, `nhom_sanpham`, `loai_sanpham`, `chat_lieu`, `hinhdang`, `kich_co`, `canhan_moigioi`
                            ,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max` FROM `new`
                            LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                            WHERE `new`.`new_id` = $id_nd AND `new_user_id` = $us_id LIMIT 1 ");

    if (mysql_num_rows($qr_listds->result) > 0) {

        $item_td = mysql_fetch_assoc($qr_listds->result);
        $id_dm = $item_td['new_cate_id'];

        $avt_dangtin = $item_td['new_image'];
        $video_dangtin = $item_td['new_video'];
        $tinh_thanh = $item_td['new_city'];
        $quan_huyen = $item_td['quan_huyen'];
        $phuong_xa = $item_td['phuong_xa'];
        $so_nha = $item_td['new_sonha'];

        if ($item_td['nhom_sanpham'] != 11 || $item_td['nhom_sanpham'] != 14 || $item_td['nhom_sanpham'] != 16) {
            $list_ktag = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = '" . $item_td['new_cate_id'] . "'
                                    AND `id_parent`= '" . $item_td['nhom_sanpham'] . "' ");
            $result_ban = $list_ktag->result_array();
        };

        $qr_nhom = new db_query("SELECT `id`, `name`  FROM `nhom_sanpham` WHERE `id_danhmuc` = '" . $item_td['new_cate_id'] . "' ");

        if ($item_td['nhom_sanpham'] == 8 || $item_td['nhom_sanpham'] == 9 || $item_td['nhom_sanpham'] == 12 || $item_td['nhom_sanpham'] == 13 || $item_td['nhom_sanpham'] == 14 || $item_td['nhom_sanpham'] == 15) {
            $qr_lspham = new db_query("SELECT `id`, `ten_loai` FROM loai_chung WHERE id_cha = '" . $item_td['nhom_sanpham'] . "'
                                    AND id_danhmuc = '" . $item_td['new_cate_id'] . "' ");
        };

        if ($item_td['nhom_sanpham'] == 8 || $item_td['nhom_sanpham'] == 9 || $item_td['nhom_sanpham'] == 11 || $item_td['nhom_sanpham'] == 12 || $item_td['nhom_sanpham'] == 13) {
            $qr_clieu = new db_query("SELECT `id`, `name` FROM nhom_sanpham_chatlieu WHERE id_cha='" . $item_td['nhom_sanpham'] . "'
                                    AND id_danhmuc='" . $item_td['new_cate_id'] . "' ");
        };

        if ($item_td['nhom_sanpham'] == 14) {
            $qr_hdang = new db_query("SELECT `id`, `name` FROM nhom_sanpham_hinhdang WHERE id_cha = '" . $item_td['nhom_sanpham'] . "'
                                    AND id_danhmuc = '" . $item_td['new_cate_id'] . "' ");
        };

        if ($item_td['nhom_sanpham'] == 10) {
            $qr_kco = new db_query("SELECT `id`, `ten_loai` FROM loai_chung WHERE id_cha= '" . $item_td['nhom_sanpham'] . "'
                                    AND id_danhmuc= '" . $item_td['new_cate_id'] . "' ");
        }
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
    <title>Ch???nh s???a n???i th???t ph??ng ng???</title>
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
            <p class="ctn_tt_p p_600_s24_l28">????ng tin</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_dt_pc" data="<?= $us_id ?>" data1="<?= $us_type ?>" data3="<?= $xacthuc_lket ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh m???c ????ng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="<?= $id_dm ?>" data1="<?= $id_nd ?>">
                                N???i th???t - ngo???i th???t<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> N???i th???t ph??ng ng???
                            </p>
                        </div>
                    </div>
                </div>
                <!-- ------------------------------------------box2---------------------------------------------------------------- -->
                <? include("../includes/inc_new/up_video_image.php"); ?>
                <!-- ----------------------------------------------------------------------box6--------------------------------------------------------------------- -->
                <div class="ctn_ct_b3_fr">
                    <div class="ctn_ct_b3_fr1 box_input_infor">
                        <p class="b3_fr1_title p_400_s15_l18">Ti??u ????? <span class="cl_red">*</span></p>
                        <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nh???p ti??u ??????" autocomplete="off">
                        <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">l???n h??n 40, nh??? h??n 70 k?? t???</p>
                    </div>
                </div>
                <div class="b6_nl_title d_flex fl_cl">
                    <div class="d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Nh??m s???n ph???m <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36 nhom_spham" name="nhom_spham" data="<?= $id_dm ?>">
                                <option disabled selected value="">Ch???n</option>
                                <? while ($row_nhom = mysql_fetch_assoc($qr_nhom->result)) { ?>
                                    <option value="<?= $row_nhom['id'] ?>" <?= ($row_nhom['id'] == $item_td['nhom_sanpham']) ? 'selected' : '' ?>>
                                        <?= $row_nhom['name'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="w_100 phan_chia">
                        <? if ($item_td['nhom_sanpham'] == 8 || $item_td['nhom_sanpham'] == 9 || $item_td['nhom_sanpham'] == 12 || $item_td['nhom_sanpham'] == 13 || $item_td['nhom_sanpham'] == 14 || $item_td['nhom_sanpham'] == 15) { ?>
                            <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
                                <p class="b6_fr1_title p_400_s15_l18">Lo???i s???n ph???m <span class="cl_red">*</span></p>
                                <select class="b6_fr1_select slect-hang hd_height36 loai_sanpham" name="loai_sanpham">
                                    <option value="">Ch???n</option>
                                    <? while ($row_lsp = mysql_fetch_assoc($qr_lspham->result)) { ?>
                                        <option value="<?= $row_lsp['id'] ?>" <?= ($row_lsp['id'] == $item_td['loai_sanpham']) ? 'selected' : '' ?>>
                                            <?= $row_lsp['ten_loai'] ?>
                                        </option>
                                    <? } ?>
                                </select>
                            </div>
                        <? };
                        if ($item_td['nhom_sanpham'] == 8 || $item_td['nhom_sanpham'] == 9 || $item_td['nhom_sanpham'] == 11 || $item_td['nhom_sanpham'] == 12 || $item_td['nhom_sanpham'] == 13) { ?>
                            <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
                                <p class="b6_fr1_title p_400_s15_l18">Ch???t li???u <span class="cl_red">*</span></p>
                                <select class="b6_fr1_select slect-hang hd_height36 chat_lieu" name="chat_lieu">
                                    <option value="">Ch???n</option>
                                    <? while ($row_clieu = mysql_fetch_assoc($qr_clieu->result)) { ?>
                                        <option value="<?= $row_clieu['id'] ?>" <?= ($row_clieu['id'] == $item_td['chat_lieu']) ? 'selected' : '' ?>>
                                            <?= $row_clieu['name'] ?>
                                        </option>
                                    <? } ?>
                                </select>
                            </div>
                        <? };
                        if ($item_td['nhom_sanpham'] == 14) { ?>
                            <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
                                <p class="b6_fr1_title p_400_s15_l18">H??nh d??ng <span class="cl_red">*</span></p>
                                <select class="b6_fr1_select slect-hang hd_height36 hinh_dang" name="hinh_dang">
                                    <option value="">Ch???n</option>
                                    <? while ($row_hdang = mysql_fetch_assoc($qr_hdang->result)) { ?>
                                        <option value="<?= $row_hdang['id'] ?>" <?= ($row_hdang['id'] == $item_td['hinh_dang']) ? 'selected' : '' ?>>
                                            <?= $row_hdang['name'] ?>
                                        </option>
                                    <? } ?>
                                </select>
                            </div>
                        <? };
                        if ($item_td['nhom_sanpham'] == 10) { ?>
                            <div class="d_flex fl_cl box_input_infor w_100 b6_nl_title">
                                <p class="b6_fr1_title p_400_s15_l18">K??ch c???</p>
                                <select class="b6_fr1_select slect-hang hd_height36 kich_co" name="kich_co">
                                    <option value="">Ch???n</option>
                                    <? while ($row_kco = mysql_fetch_assoc($qr_kco->result)) { ?>
                                        <option value="<?= $row_kco['id'] ?>" <?= ($row_kco['id'] == $item_td['kich_co']) ? 'selected' : '' ?>>
                                            <?= $row_kco['ten_loai'] ?>
                                        </option>
                                    <? } ?>
                                </select>
                            </div>
                        <? } ?>
                    </div>
                    <div class="ctn_ct_b6_nl d_flex fl_cl box_input_infor">
                        <p class="b6_nl_title">T??nh tr???ng <span class="cl_red">*</span></p>
                        <div class="b6_nl_fr d_flex fl_row">
                            <div class="b6_nl_child b6_nl_xang d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="1" <?= ($item_td['new_tinhtrang'] == 1) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_xang_input b6_nl_input">
                                <p class="b6_nl_xang_text pdl_10">M???i</p>
                            </div>
                            <div class="b6_nl_child b6_nl_dau d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="2" <?= ($item_td['new_tinhtrang'] == 2) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_dau_input b6_nl_input">
                                <p class="b6_nl_dau_text pdl_10">???? s??? d???ng</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
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
    <script type="text/javascript" src="/js/m_raonhanh_new.js"></script>
    <script type="text/javascript">
        $(".nhom_spham").change(function() {
            var nhom = $(this).val();
            var id_dm = $(this).attr("data");

            $.ajax({
                url: "/render/dangtinphongngu.php",
                type: 'GET',
                data: {
                    nhom: nhom,
                    id_dm: id_dm
                },
                success: function(data) {
                    $('.phan_chia').html(data);
                    rf_select2();
                },
            });

            if (nhom != 11 || nhom != 14 || nhom != 16) {
                $(".ctn_ct_box10").show();
                $.ajax({
                    url: "/render/select_delivery.php",
                    method: 'POST',
                    data: {
                        id_lkp: nhom,
                        id_dm: id_dm
                    },
                    success: function(data) {
                        $('.ctn_ct_box10 .ctn_ct_b10_fr').html(data);
                        rf_select2();
                    }
                });
            } else {
                $(".ctn_ct_box10").hide();
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
                    nhom_spham: {
                        required: true,
                    },
                    loai_sanpham: {
                        required: true,
                    },
                    chat_lieu: {
                        required: true,
                    },
                    hinh_dang: {
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
                    td_gia_spham: {
                        required: "Vui l??ng nh???p gi?? s???n ph???m",
                    },
                    mota: {
                        required: "Vui l??ng nh???p m?? t???",
                        minlength: "M?? t??? ??t nh???t 10 k?? t???",
                        maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                    },
                    nhom_spham: {
                        required: "Vui l??ng ch???n nh??m s???n ph???m",
                    },
                    loai_sanpham: {
                        required: "Vui l??ng ch???n l???a s???n ph???m",
                    },
                    chat_lieu: {
                        required: "Vui l??ng ch???n ch???t li???u",
                    },
                    hinh_dang: {
                        required: "Vui l??ng ch???n h??nh d??ng",
                    },
                    tinh_trang: {
                        required: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
                    },
                    canhan_moigioi: {
                        required: "Ch???n ng?????i b??n",
                    },
                    sdt_lienhe: {
                        required: "Nh???p s??? ??i???n tho???i li??n h???",
                    },
                    chitiet_dm: {
                        required: "Vui l??ng ch???n chi ti???t danh m???c",
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
                var id_nd = $(".b1_fr2_title_p").attr("data1");
                var tieu_de = $("input[name='tieu_de']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                };
                var tang_mphi = $("input[name='td_lienhe_ngban']:checked").val();
                var don_vi = $("select[name='dvi_tien']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var nhom_spham = $("select[name='nhom_spham']").val();
                var loai_sanpham = $("select[name='loai_sanpham']").val();
                var chat_lieu = $(".chat_lieu").val();
                var hinh_dang = $(".hinh_dang").val();
                var tinh_trang = $("input[name='tinh_trang']:checked").val();
                var canhan_moigioi = $("input[name='canhan_moigioi']:checked").val();
                var chitiet_dm = $("select[name='chitiet_dm']").val();
                // -------------------------da xac thuc thanh toan----------------------------------------------
                var xac_thuc = $(".form-dtin-cont").attr("data3");
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
                var diachi_nban = [];
                $("input[name='td_dia_chi']").each(function() {
                    var td_diachi = $(this).val();
                    if (td_diachi != '') {
                        diachi_nban.push(td_diachi + ';');
                    };
                });
                // l???y ???nh c??
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
                fd.append('id_dm', id_dm);
                fd.append('id_nd', id_nd);
                fd.append('tieu_de', tieu_de);
                fd.append('gia_spham', td_gia_spham);
                fd.append('tang_mphi', tang_mphi);
                fd.append('don_vi', don_vi);
                fd.append('mo_ta', mo_ta);
                fd.append('nhom_spham', nhom_spham);
                if (nhom_spham == 8 || nhom_spham == 9 || nhom_spham == 12 || nhom_spham == 13 || nhom_spham == 14 || nhom_spham == 15) {
                    fd.append('loai_sanpham', $(".loai_sanpham").val());
                };

                if (nhom_spham == 8 || nhom_spham == 9 || nhom_spham == 11 || nhom_spham == 12 || nhom_spham == 13) {
                    fd.append('chat_lieu', $(".chat_lieu").val());
                };

                if (nhom_spham == 14) {
                    fd.append('hinh_dang', $(".hinh_dang").val());
                };

                if (nhom_spham == 10) {
                    fd.append('kich_co', $(".kich_co").val());
                };

                fd.append('tinh_trang', tinh_trang);
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
                fd.append('diachi_nban', diachi_nban);
                fd.append('chitiet_dm', chitiet_dm);
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
                // lay video cu
                var video_cu = $(".avt_xoavideo").attr("data");
                fd.append('video_cu', video_cu);

                $.ajax({
                    type: 'POST',
                    url: '/ajax_noithat_ngoaithat/csua_phongngu.php',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data == "") {
                            tbao_csdtin_tcong();
                        } else {
                            alert(data);
                            $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
                            $("#xoa_tddang_tin").addClass("b11_btn_chinhsua");
                        }
                    }
                })
            }
        });

        //Xem tr?????c
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
                    nhom_spham: {
                        required: true,
                    },
                    loai_sanpham: {
                        required: true,
                    },
                    chat_lieu: {
                        required: true,
                    },
                    hinh_dang: {
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
                    td_gia_spham: {
                        required: "Vui l??ng nh???p gi?? s???n ph???m",
                    },
                    mota: {
                        required: "Vui l??ng nh???p m?? t???",
                        minlength: "M?? t??? ??t nh???t 10 k?? t???",
                        maxlength: "M?? t??? nhi???u nh???t 10000 k?? t???",
                    },
                    nhom_spham: {
                        required: "Vui l??ng ch???n nh??m s???n ph???m",
                    },
                    loai_sanpham: {
                        required: "Vui l??ng ch???n l???a s???n ph???m",
                    },
                    chat_lieu: {
                        required: "Vui l??ng ch???n ch???t li???u",
                    },
                    hinh_dang: {
                        required: "Vui l??ng ch???n h??nh d??ng",
                    },
                    tinh_trang: {
                        required: "Vui l??ng ch???n t??nh tr???ng s???n ph???m",
                    },
                    canhan_moigioi: {
                        required: "Ch???n ng?????i b??n",
                    },
                    sdt_lienhe: {
                        required: "Nh???p s??? ??i???n tho???i li??n h???",
                    },
                    chitiet_dm: {
                        required: "Vui l??ng ch???n chi ti???t danh m???c",
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
                var nhom_spham = $("select[name='nhom_spham']").val();
                var loai_sanpham = $(".loai_sanpham").val();
                var chat_lieu = $(".chat_lieu").val();
                var hinh_dang = $(".hinh_dang").val();
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
                // l???y ???nh c??
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
                fd.append('tang_mphi', tang_mphi);
                fd.append('loai_sp', nhom_spham);
                fd.append('loai_sp2', loai_sanpham);
                fd.append('loai_sp3', chat_lieu);
                fd.append('loai_sp4', hinh_dang);
                fd.append('tinh_trang', tinh_trang);
                fd.append('ctiet_dmuc', chitiet_dm);
                fd.append('dia_chi', diachi_nban);
                fd.append('mo_ta', mo_ta);
                fd.append('gia_spham', td_gia_spham);
                fd.append('tang_mphi', tang_mphi);
                fd.append('donvi_ban', don_vi);
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