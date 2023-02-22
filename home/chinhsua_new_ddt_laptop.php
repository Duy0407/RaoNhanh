<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'GET', 0);
$id_nd = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_dm != 0 && $id_nd != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $qr_listds = new db_query("SELECT `new`.`new_id`, `new_title`, `new_money`, `new_city`, `new_image`, `new_unit`, `new_name`, `new_phone`, `new_email`,
                            `new_address`, `chotang_mphi`, `quan_huyen`, `phuong_xa`, `new_sonha`, `dia_chi`, `new_video`, `new_ctiet_dmuc`, `new_tinhtrang`,
                            `new_baohanh`, `new_description`, `bovi_xuly`, `ram`, `o_cung`,`loai_o_cung`, `man_hinh`, `kich_co`, `hang`, `dong_may`,
                            `canhan_moigioi`  FROM `new`
                            LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                            WHERE `new`.`new_id` = $id_nd AND `new_user_id` = $us_id LIMIT 1 ");

    if (mysql_num_rows($qr_listds->result) > 0) {

        $item_td = mysql_fetch_assoc($qr_listds->result);

        $avt_dangtin = $item_td['new_image'];
        $video_dangtin = $item_td['new_video'];
        $tinh_thanh = $item_td['new_city'];
        $quan_huyen = $item_td['quan_huyen'];
        $phuong_xa = $item_td['phuong_xa'];
        $so_nha = $item_td['new_sonha'];

        $list_ktag = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = $id_dm ");
        $result_ban = $list_ktag->result_array();

        $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_danhmuc` = $id_dm ");

        $bivi_xuly = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id_danhmuc` = $id_dm ");

        $list_ram = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 1 ");

        $list_ocung = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 2 ");

        $card_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 1 ");

        $kich_co = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `phan_loai` = 2 ");

        $bao_hanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");

        if ($item_td['hang'] != 1378) {
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = '" . $item_td['hang'] . "' AND `id_danhmuc` = $id_dm ");
        };
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
    <title>Chỉnh sửa tin đăng đồ tiện tử laptop</title>
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
            <p class="ctn_tt_p p_600_s24_l28">Chỉnh sửa tin đăng</p>
        </div>
        <form class="form-dtin-cont form_bds_chung" id="form_dt_pc" data="<?= $us_id ?>" data1="<?= $us_type ?>">
            <div class="container_content">
                <!-- ------------------------------------------box1------------------------------------------------------------------ -->
                <div class="ctn_ct_box1 d_flex fl_cl w100">
                    <div class="ctn_ct_b1_fr1 w100">
                        <p class="b1_fr1_title p_400_s15_l18">Danh mục đăng tin <span class="cl_red">*</span></p>
                    </div>
                    <div class="ctn_ct_b1_fr2 w100">
                        <div class="b1_fr2_title w100">
                            <p class="b1_fr2_title_p p_400_s16_l19 d_flex fl_row al_ct" data="<?= $id_dm ?>" data1="<?= $id_nd ?>">
                                Đồ điện tử<span class="d_flex fl_row al_ct pdl_5 pdr_5">
                                    <img src="/images/m_raonhanh_imgnew/double_angle.png" class="img_16">
                                </span> Laptop
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
                        Chi tiết sản phẩm
                    </p>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="hang_laptop" data="<?= $id_dm ?>" onchange="hang_doi(this)">
                                <option value="">Chọn</option>
                                <? while ($row_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                                    <option value="<?= $row_hang['id'] ?>" <?= ($row_hang['id'] == $item_td['hang']) ? 'selected' : '' ?>>
                                        <?= $row_hang['ten_hang'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor dong_doi">
                            <? if ($item_td['hang'] == 1378) { ?>
                                <p class="b9_fr2_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
                                <input type="text" name="dong_may" value="<?= $item_td['dong_may'] ?>" class="b3_fr1_input p_400_s14_l17 dong_may" placeholder="Nhập dòng máy" autocomplete="off">
                            <? } else { ?>
                                <p class="b6_fr1_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
                                <select class="b6_fr1_select slect-hang hd_height36 dong_may" name="dong_may">
                                    <option disabled value="">Chọn</option>
                                    <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                                        <option value="<?= $row_dong['id'] ?>" <?= ($row_dong['id'] == $item_td['dong_may']) ? 'selected' : '' ?>>
                                            <?= $row_dong['ten_loai'] ?>
                                        </option>
                                    <? } ?>
                                </select>
                            <? } ?>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Bộ vi xử lý</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="bovi_xuly">
                                <option value="">Chọn</option>
                                <? while ($row_bv = mysql_fetch_assoc($bivi_xuly->result)) { ?>
                                    <option value="<?= $row_bv['bovi_id'] ?>" <?= ($row_bv['bovi_id'] == $item_td['bovi_xuly']) ? 'selected' : '' ?>>
                                        <?= $row_bv['bovi_ten'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Ram</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="ram_lap">
                                <option value="">Chọn</option>
                                <? while ($row_ram = mysql_fetch_assoc($list_ram->result)) { ?>
                                    <option value="<?= $row_ram['id_dl'] ?>" <?= ($row_ram['id_dl'] == $item_td['ram']) ? 'selected' : '' ?>>
                                        <?= $row_ram['ten_dl'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Ổ cứng</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="o_cung">
                                <option value="">Chọn</option>
                                <? while ($row_oc = mysql_fetch_assoc($list_ocung->result)) { ?>
                                    <option value="<?= $row_oc['id_dl'] ?>" <?= ($row_oc['id_dl'] == $item_td['o_cung']) ? 'selected' : '' ?>><?= $row_oc['ten_dl'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Loại ổ cúng</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="loai_ocung">
                                <option value="">Chọn</option>
                                <option value="1" <?= ($item_td['loai_o_cung'] == 1) ? 'selected' : '' ?>>HDD</option>
                                <option value="2" <?= ($item_td['loai_o_cung'] == 2) ? 'selected' : '' ?>>SSD</option>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
                        <div class="b6_fr1 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Card màn hình</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="card_mhinh">
                                <option value="">Chọn</option>
                                <? while ($row_card = mysql_fetch_assoc($card_mhinh->result)) { ?>
                                    <option value="<?= $row_card['id_manhinh'] ?>" <?= ($row_card['id_manhinh'] == $item_td['man_hinh']) ? 'selected' : '' ?>>
                                        <?= $row_card['ten_manhinh'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="b6_fr2 d_flex fl_cl box_input_infor">
                            <p class="b6_fr1_title p_400_s15_l18">Kích cỡ màn hình</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="kich_co">
                                <option value="">Chọn</option>
                                <? while ($row_kc = mysql_fetch_assoc($kich_co->result)) { ?>
                                    <option value="<?= $row_kc['id_manhinh'] ?>" <?= ($row_kc['id_manhinh'] == $item_td['kich_co']) ? 'selected' : '' ?>>
                                        <?= $row_kc['ten_manhinh'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_fr d_flex fl_row fl_st w_100">
                        <div class="d_flex fl_cl box_input_infor w_100">
                            <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                            <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                                <option value="">Chọn</option>
                                <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                    <option value="<?= $row_bh['id_baohanh'] ?>" <?= ($row_bh['id_baohanh'] == $item_td['new_baohanh']) ? 'selected' : '' ?>>
                                        <?= $row_bh['tgian_baohanh'] ?>
                                    </option>
                                <? } ?>
                            </select>
                        </div>
                    </div>
                    <div class="ctn_ct_b6_nl d_flex fl_cl box_input_infor">
                        <p class="b6_nl_title">Tình trạng <span class="cl_red">*</span></p>
                        <div class="b6_nl_fr d_flex fl_row">
                            <div class="b6_nl_child b6_nl_xang d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="1" <?= ($item_td['new_tinhtrang'] == 1) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_xang_input b6_nl_input">
                                <p class="b6_nl_xang_text pdl_10">Mới</p>
                            </div>
                            <div class="b6_nl_child b6_nl_dau d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="2" <?= ($item_td['new_tinhtrang'] == 2) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_dau_input b6_nl_input">
                                <p class="b6_nl_dau_text pdl_10">Cũ (Đã sửa chữa)</p>
                            </div>
                            <div class="b6_nl_child b6_nl_hybrid d_flex fl_row al_ct ">
                                <input type="radio" name="tinh_trang" value="3" <?= ($item_td['new_tinhtrang'] == 3) ? 'checked' : '' ?> class="img20 cursor_Pt b6_nl_hybrid_input b6_nl_input">
                                <p class="b6_nl_hybrid_text pdl_10">Cũ (Chưa sửa chữa)</p>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script src="/js/m_raonhanh_new.js"></script>

    <script>
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
                    hang_laptop: {
                        required: true,
                    },
                    dong_may: {
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
                    hang_laptop: {
                        required: "Vui lòng chọn hãng",
                    },
                    dong_may: {
                        required: "Vui lòng chọn dòng máy",
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
                var id_cs = $(".b1_fr2_title_p").attr("data1");
                var tieu_de = $("input[name='tieu_de']").val();
                var td_gia_spham = $("input[name='td_gia_spham']").val();
                if ($("input[name='td_lienhe_ngban']").is(":checked")) {
                    var td_gia_spham = 0;
                };
                var tang_mphi = $("input[name='td_lienhe_ngban']:checked").val();
                var don_vi = $("select[name='dvi_tien']").val();
                var mo_ta = $("textarea[name='mota']").val();
                var hang_may = $("select[name='hang_laptop']").val();
                var dong_may = $(".dong_may").val();
                var bovi_xuly = $("select[name='bovi_xuly']").val();
                var ram_lap = $("select[name='ram_lap']").val();
                var o_cung = $("select[name='o_cung']").val();
                var card_mhinh = $("select[name='card_mhinh']").val();
                var loai_ocung = $("select[name='loai_ocung']").val();
                var kich_co = $("select[name='kich_co']").val();
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
                var fd = new FormData();
                fd.append('user_id', user_id);
                fd.append('user_type', user_type);
                fd.append('id_dm', id_dm);
                fd.append('id_cs', id_cs);
                fd.append('tieu_de', tieu_de);
                fd.append('gia_spham', td_gia_spham);
                fd.append('tang_mphi', tang_mphi);
                fd.append('don_vi', don_vi);
                fd.append('mo_ta', mo_ta);
                fd.append('hang_may', hang_may);
                fd.append('dong_may', dong_may);
                fd.append('bovi_xuly', bovi_xuly);
                fd.append('ram_lap', ram_lap);
                fd.append('o_cung', o_cung);
                fd.append('card_mhinh', card_mhinh);
                fd.append('loai_ocung', loai_ocung);
                fd.append('kich_co', kich_co);
                fd.append('bao_hanh', bao_hanh);
                fd.append('tinh_trang', tinh_trang);
                fd.append('canhan_moigioi', canhan_moigioi);
                fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
                fd.append('email_lhe', $("input[name='email_lienhe']").val());
                fd.append('diachi_nban', diachi_nban);
                fd.append('chitiet_dm', chitiet_dm);
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
                // lay video cu
                var video_cu = $(".avt_xoavideo").attr("data");
                fd.append('video_cu', video_cu);

                $.ajax({
                    type: 'POST',
                    url: '/ajax_ddtu/csua_laptop.php',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if (data == "") {
                            tbao_dtin_tcong();
                        } else {
                            alert(data);
                            $("#xoa_tddang_tin").removeClass("b11dc_btn_dangtin");
                            $("#xoa_tddang_tin").addClass("b11_btn_chinhsua");
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
                    hang_laptop: {
                        required: true,
                    },
                    dong_may: {
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
                    hang_laptop: {
                        required: "Vui lòng chọn hãng",
                    },
                    dong_may: {
                        required: "Vui lòng chọn dòng máy",
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
                var hang_may = $("select[name='hang_laptop']").val();
                var dong_may = $(".dong_may").val();
                var bovi_xuly = $("select[name='bovi_xuly']").val();
                var ram_lap = $("select[name='ram_lap']").val();
                var o_cung = $("select[name='o_cung']").val();
                var card_mhinh = $("select[name='card_mhinh']").val();
                var loai_ocung = $("select[name='loai_ocung']").val();
                var kich_co = $("select[name='kich_co']").val();
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
                fd.append('loai_sp3', bovi_xuly);
                fd.append('loai_sp4', ram_lap);
                fd.append('loai_sp5', o_cung);
                fd.append('loai_sp6', card_mhinh);
                fd.append('loai_sp7', loai_ocung);
                fd.append('loai_sp8', kich_co);
                fd.append('loai_sp9', bao_hanh);
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