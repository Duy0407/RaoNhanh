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
                                `new_description`,`loai_hinh_sp`,`loai_sanpham`,`hang`,`han_su_dung`,`canhan_moigioi`
                                ,`thoigian_kmbd`,`thoigian_kmkt`,`soluong_min`,`soluong_max`
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
        $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = 109 AND type_tags = '" . $item_td['can_ban_mua'] . "' ");
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
    <title>Chỉnh sửa Thực phẩm chức năng </title>
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
    <section id="m_dangtin_sk_thucphamcn" class="suckhoe" data="<?= date('Y-m-d', time()) ?>">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Chỉnh sửa</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_tpchucnang" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>" data3="<?= $xacthuc_lket ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục sản phẩm <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="109">
                                Sức Khỏe - Sắc đẹp<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> Thực phẩm chức năng
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
                <!-- loai thực phẩm chức năng -->
                <div class="b6_loaihinh d_flex fl_cl box_input_infor">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Loại thực phẩm chức năng <span class="cl_red">*</span>
                    </p>
                    <select id="loai_hinh" class="b6_lhinh_select slect-hang  hd_height36" name="loai_thucpham">
                        <option value="" disabled selected>Chọn loại thực phẩm chức năng</option>
                        <? foreach ($db_lchung as $rows) {
                            if ($rows['id_cha'] == 109) { ?>
                                <option value="<?= $rows['id'] ?>" <?= ($rows['id'] == $item_td['loai_sanpham']) ? "selected" : "" ?>><?= $rows['ten_loai'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <!-- Hạn sử dụng -->
                <div class="b6_hansudung d_flex fl_cl box_input_infor">
                    <p class="b6_hsd_txt p_400_s15_l18">
                        Hạn sử dụng <span class="cl_red">*</span>
                    </p>
                    <div class="b6_hsd_fr">
                        <input type="date" value="<?= date('Y-m-d', $item_td['han_su_dung']) ?>" name="hansudung" class="b6_hsd_input">
                        <!-- <img src="/images/m_raonhanh_imgnew/calendar.svg" class="b6_hsd_img"> -->
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
        $.validator.addMethod("dateRange",
            function() {
                var date1 = $("input[name='hansudung']").val();
                var date2 = $(".suckhoe").attr("data");
                return (date1 >= date2);
            });
        $(".b11_btn_chinhsua").click(function() {
            var form_tpchucnang = $("#form_tpchucnang");
            form_tpchucnang.validate({
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
                    loai_thucpham: "required",
                    hansudung: {
                        required: true,
                        dateRange: true,
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
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Nhập ít nhất 40 ký tự",
                        maxlength: "Nhập nhiều nhất 70 ký tự",
                    },
                    loai_thucpham: "Vui lòng chọn loại thực phẩm",
                    hansudung: {
                        required: "Vui lòng nhập hạn sử dụng",
                        dateRange: "Hạn sử dụng phải sau ngày hôm nay",
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
                    so_luong_kho: "Vui lòng nhập số lượng kho",
                    soluong_min: "Vui lòng nhập số lượng tối thiểu",
                    soluong_max: "Vui lòng nhập số lượng tối đa",
                    loai_khuyenmai: "Vui lòng chọn loại khuyến mại",
                    giatri_khuyenmai: "Vui lòng nhập giá trị khuyến mại",
                    ngay_bat_dau: "Vui lòng chọn ngày bắt đầu",
                    ngay_ket_thuc: "Vui lòng chọn ngày kết thúc",
                    phi_van_chuyen: "Vui lòng nhập phí vận chuyển",
                    van_chuyen: "Vui lòng chọn lọai phí vận chuyển",
                },
            });
            if (form_tpchucnang.valid() === false) {
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
            if (form_tpchucnang.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                var user_id = $("#form_tpchucnang").attr("data");
                var user_type = $("#form_tpchucnang").attr("data1");
                var id_nd = $("#form_tpchucnang").attr("data2");
                var tieu_de = $("input[name='tieu_de']").val();
                var loai_thucpham = $("select[name='loai_thucpham']").val();
                var hansudung = $("input[name='hansudung']").val();
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
                // -------------------------da xac thuc thanh toan----------------------------------------------
                var xac_thuc = $("#form_tpchucnang").attr("data3");
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
                fd.append('id_nd', id_nd);
                fd.append('tieu_de', tieu_de);
                fd.append('loai_thucpham', loai_thucpham);
                fd.append('hansudung', hansudung);
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
                    url: '/ajax_sksd/chinhsua_sksd_thucphamcn.php',
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
            var form_tpchucnang = $(".form-dtin-cont");
            form_tpchucnang.validate({
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
                    loai_thucpham: "required",
                    hansudung: {
                        required: true,
                        dateRange: true,
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
                        required: "Vui lòng nhập tiêu đề",
                        minlength: "Nhập ít nhất 40 ký tự",
                        maxlength: "Nhập nhiều nhất 70 ký tự",
                    },
                    loai_thucpham: "Vui lòng chọn loại thực phẩm",
                    hansudung: {
                        required: "Vui lòng nhập hạn sử dụng",
                        dateRange: "Hạn sử dụng phải sau ngày hôm nay",
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
                    so_luong_kho: "Vui lòng nhập số lượng kho",
                    soluong_min: "Vui lòng nhập số lượng tối thiểu",
                    soluong_max: "Vui lòng nhập số lượng tối đa",
                    loai_khuyenmai: "Vui lòng chọn loại khuyến mại",
                    giatri_khuyenmai: "Vui lòng nhập giá trị khuyến mại",
                    ngay_bat_dau: "Vui lòng chọn ngày bắt đầu",
                    ngay_ket_thuc: "Vui lòng chọn ngày kết thúc",
                    phi_van_chuyen: "Vui lòng nhập phí vận chuyển",
                    van_chuyen: "Vui lòng chọn lọai phí vận chuyển",
                },
            });
            if (form_tpchucnang.valid() === false) {
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
            if (form_tpchucnang.valid() === true) {
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var loai_thucpham = $("select[name='loai_thucpham']").val();
                var hansudung = $("input[name='hansudung']").val();
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
                fd.append('loai_sp', loai_thucpham);
                fd.append('loai_sp2', hansudung);
                fd.append('gia_spham', td_gia_spham);
                fd.append('mo_ta', mo_ta);
                fd.append('ctiet_dmuc', ctiet_dmuc);
                fd.append('tinh_thanh', tinh_thanh);
                fd.append('quan_huyen', quan_huyen);
                fd.append('phuong_xa', phuong_xa);
                fd.append('so_nha', so_nha);
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