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
                                `new_description`,`nhom_sanpham`, `giong_thu_cung`,`han_su_dung`,
                                `khoiluong`,`the_tich`,`canhan_moigioi`
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

        $id_thucung = $item_td['giong_thu_cung'];
        $query_dm_tc = new db_query("SELECT `id_danhmuc` FROM `giong_thu_cung` WHERE id = $id_thucung");
        $id_dm = mysql_fetch_assoc($query_dm_tc->result);
        $ban = new db_query("SELECT `tags_id`, `ten_tags`, `id_danhmuc`, `type_tags`, `id_parent` FROM `key_tags` WHERE id_danhmuc =" . $id_dm['id_danhmuc']);
        $result_ban = ($ban->result_array());

        $sql = new db_query("SELECT `id`, `giong_thucung` FROM `giong_thu_cung` WHERE id_cha = 0");
        $result = $sql->result_array();
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
    <title>Đăng tin Đồ ăn, Phụ kiện </title>
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
    <section id="m_dangtin_thucung" class="suckhoe thethao thucung" data="<?= date('Y-m-d') ?>">
        <div class="container_title">
            <p class="ctn_tt_p p_600_s24_l28">Đăng tin</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_doan_phukien" data="<?= $acc_id ?>" data1="<?= $acc_type ?>" data2="<?= $id_nd ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục sản phẩm <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="114">
                                Thú cưng <span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> Đồ ăn, Phụ kiện
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
                <!-- nhom sản phẩm-->
                <div class="b6_loaihinh loai_dungcu d_flex fl_cl box_input_infor">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Nhóm sản phẩm <span class="cl_red">*</span>
                    </p>
                    <select id="nhom_sp" class="slect-hang hd_height36 b6_lhinh_select nhomsanpham" name="nhomsanpham">
                        <option value="">Nhóm sản phẩm</option>
                        <? foreach ($db_nspham as $nsp) {
                            if ($nsp['id_danhmuc'] == 114) {
                        ?>
                                <option value="<?= $nsp['id'] ?>" <?= ($nsp['id'] == $item_td['nhom_sanpham']) ? "selected" : "" ?>><?= $nsp['name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <!-- giong thu cung-->
                <div class="b6_loaihinh loai_dungcu d_flex fl_cl box_input_infor">
                    <p class="b6_lhinh_txt p_400_s15_l18">
                        Thú cưng <span class="cl_red">*</span>
                    </p>
                    <select class="slect-hang hd_height36 b6_lhinh_select giong_thucung" name="giong_thucung">
                        <option value="">Giống thú cưng </option>
                        <? foreach ($result as $gtc_khac) : ?>
                            <option <?= ($gtc_khac['id'] == $item_td['giong_thu_cung']) ? "selected" : "" ?> value="<?= $gtc_khac['id'] ?>"><?= $gtc_khac['giong_thucung'] ?></option>
                        <? endforeach ?>
                    </select>
                </div>
                <div class="append_nhom">
                    <? if ($item_td['nhom_sanpham'] == 58) {
                    ?>
                        <? if ($acc_type == 1 || $acc_type == 3) { ?>
                            <div class="m_input_chung d_flex fl_cl box_input_infor">
                                <p class="font-dam hd_font15-17">Hạn sử dụng <span class="color_red">*</span></p>
                                <input type="date" value="<?= date('Y-m-d', $item_td['han_su_dung']) ?>" class="input_date input_infor_tag error" name="han_sd" id="date">
                            </div>
                        <? } ?>
                        <div class=" m_input_chung d_flex fl_cl box_input_infor">
                            <p class="font-dam hd_font15-17">Trọng lượng <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" value="<?= $item_td['khoiluong'] ?>" type="text" name="trong_luong" placeholder="Trọng lượng ">
                        </div>
                        <div class=" m_input_chung d_flex fl_cl box_input_infor">
                            <p class="font-dam hd_font15-17">Thể tích <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" value="<?= $item_td['the_tich'] ?>" type="text" name="thetich" placeholder="Thể tích ">
                        </div>
                    <? } ?>
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
        $(".nhomsanpham").change(function() {
            var nhom = $(this).val();
            var id_dm = $(".b1_fr2_title_p").attr("data");
            var id_type = $("#form_doan_phukien").attr("data1");
            if (nhom == 58) {
                $.ajax({
                    url: "../render/dangtinthucung.php",
                    type: 'POST',
                    data: {
                        nhom: nhom,
                        id_type: id_type,
                    },
                    success: function(data) {
                        $('.append_nhom').html(data);
                        $('.slect-hang').select2();
                    },
                    error: function(data) {}
                });
            } else {
                $('.append_nhom').html('');
            }
        });

        $('.nhomsanpham, .giong_thucung').change(function() {
            var id_sp = $(".nhomsanpham").val();
            var giong = $('.giong_thucung').val();

            var dem = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 12, 13, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89];
            if (id_sp == 60) {
                if ($.inArray(Number(giong), dem) != -1) {
                    $('.ctn_ct_box10').hide();
                } else {
                    $('.ctn_ct_box10').show();
                    $.ajax({
                        type: 'POST',
                        url: '/ajax/render_pkthucung_tag.php',
                        data: {
                            id_sp: id_sp,
                            giong: giong,
                        },
                        success: function(data) {
                            $("#chitiet_dm").html(data);
                        }
                    })
                }
            } else {
                $('.ctn_ct_box10').show();
                $.ajax({
                    type: 'POST',
                    url: '/ajax/render_pkthucung_tag.php',
                    data: {
                        id_sp: id_sp,
                        giong: giong,
                    },
                    success: function(data) {
                        $("#chitiet_dm").html(data);
                    }
                })
            }
        })
        $.validator.addMethod("dateRange",
            function() {
                var date1 = $("input[name='han_sd']").val();
                var date2 = $(".thucung").attr("data");
                return (date1 >= date2);
            });
        $(".b11_btn_chinhsua").click(function() {
            var form_doan_phukien = $("#form_doan_phukien");
            form_doan_phukien.validate({
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
                    nhomsanpham: "required",
                    han_sd: {
                        required: true,
                        dateRange: true,
                    },
                    trong_luong: "required",
                    thetich: "required",
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
                    nhomsanpham: "Vui lòng chọn nhóm sản phẩm",
                    han_sd: {
                        required: "Vui lòng nhập hạn sử dụng",
                        dateRange: "Hạn sử dụng phải sau ngày hôm nay",
                    },
                    trong_luong: "Vui lòng nhập trọng lượng",
                    thetich: "Vui lòng nhập thể tích",
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
            if (form_doan_phukien.valid() === false) {
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
            if (form_doan_phukien.valid() === true) {
                $("#xoa_tddang_tin").removeClass("b11_btn_dangtin");
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var user_id = $("#form_doan_phukien").attr("data");
                var user_type = $("#form_doan_phukien").attr("data1");
                var id_nd = $("#form_doan_phukien").attr("data2");
                var tieu_de = $("input[name='tieu_de']").val();
                var nhomsanpham = $("select[name='nhomsanpham']").val();
                var giong_thucung = $("select[name='giong_thucung']").val();
                var han_sd = $("input[name='han_sd']").val();
                var trong_luong = $("input[name='trong_luong']").val();
                var thetich = $("input[name='thetich']").val();
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
                fd.append('id_dm', id_dm);
                fd.append('id_nd', id_nd);
                fd.append('tieu_de', tieu_de);
                fd.append('nhomsanpham', nhomsanpham);
                fd.append('giong_thucung', giong_thucung);
                fd.append('han_sd', han_sd);
                fd.append('trong_luong', trong_luong);
                fd.append('thetich', thetich);
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
                    url: '/ajax_thucung/edit_thucanphukien.php',
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
            var form_doan_phukien = $(".form-dtin-cont");
            form_doan_phukien.validate({
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
                    nhomsanpham: "required",
                    han_sd: {
                        required: true,
                        dateRange: true,
                    },
                    trong_luong: "required",
                    thetich: "required",
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
                    nhomsanpham: "Vui lòng chọn nhóm sản phẩm",
                    han_sd: {
                        required: "Vui lòng nhập hạn sử dụng",
                        dateRange: "Hạn sử dụng phải sau ngày hôm nay",
                    },
                    trong_luong: "Vui lòng nhập trọng lượng",
                    thetich: "Vui lòng nhập thể tích",
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
            if (form_doan_phukien.valid() === false) {
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
            if (form_doan_phukien.valid() === true) {
                var tieu_de = $("input[name='tieu_de']").val();
                var id_dm = $(".b1_fr2_title_p").attr('data');
                var nhomsanpham = $("select[name='nhomsanpham']").val();
                var giong_thucung = $("select[name='giong_thucung']").val();
                var han_sd = $("input[name='han_sd']").val();
                var trong_luong = $("input[name='trong_luong']").val();
                var thetich = $("input[name='thetich']").val();
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
                var free_gift = 0;
                if ($(".m_chotangmienphi_cb").is(":checked")) {
                    var free_gift = 1;
                };
                var fd = new FormData();
                fd.append("id_dmuc", id_dm);
                fd.append('free_gift', free_gift);
                fd.append('tieu_de', tieu_de);
                fd.append('loai_sp', nhomsanpham);
                fd.append('loai_sp2', giong_thucung);
                fd.append('loai_sp3', han_sd);
                fd.append('loai_sp4', trong_luong);
                fd.append('loai_sp5', thetich);
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