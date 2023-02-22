<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];

    $query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = 8 ");
    $sql_hang = $query_hang->result_array();

    $query_lx = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = 8 AND id_danhmuc = 2");
    $sql_lx = $query_lx->result_array();

    $query_dx = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = 210 AND id_danhmuc = 8 ");
    $sql_dx = $query_dx->result_array();

    $cl_khung = new db_query("SELECT `id`,`name` FROM `nhom_sanpham_chatlieu` WHERE `id_danhmuc` = 8");
    $show_clk = $cl_khung->result_array();
    $query_mx = new db_query("SELECT `id_color`, `mau_sac`, `id_parents`, `id_dm` FROM `mau_sac` WHERE id_parents = 8");
    $sql_mx = $query_mx->result_array();
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">
<!--link meta seo-->

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Đăng tin xe đạp</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">

    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_chien.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">

</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Đăng tin</p>
                <div class="w-125">
                    <span>Cho tặng miễn phí</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi" name="free_gift">
                        <span class="slider1 round1"></span>
                    </label>
                </div>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <?php include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont" id="form_xeco_circle" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" data="8" readonly name="san-pham-laptop" placeholder="Xe cộ  >>  Xe đạp">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" autocomplete="off" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Hãng xe <span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="hang_xe">
                                <option disabled selected value="">Hãng xe</option>
                                <? foreach ($sql_hang as $rows) : ?>
                                    <option value="<?= $rows['id'] ?>"><?= $rows['ten_hang'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Loại xe đạp <span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="loai_xe_dap" id="loai_xe">
                                <option disabled selected value="">Loại xe đạp</option>
                                <? foreach ($sql_lx as $tr) : ?>
                                    <option value="<?= $tr['id'] ?>"><?= $tr['ten_loai'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <!--render  -->
                        <div class="xethethao_show box_input_infor " hidden>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Dòng xe đạp thể thao <span class="color_red">*</span></p>
                                <select name="dong_xe" class="slect-hang  hd_height36">
                                    <option disabled selected value="">Chọn dòng xe đạp thể thao</option>
                                    <? foreach ($sql_dx as $dx) : ?>
                                        <option value="<?= $dx['id'] ?>"><?= $dx['ten_loai'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang box_input_infor d_none">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select id="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
                                <option disabled selected value="">Thêm chi tiết danh mục</option>
                            </select>
                        </div>
                        <div class="nhomtin_xedap_nban row-tin-dang">
                            <div class="nhom-tin-dang">
                                <div class="row-tin-dang">
                                    <p class="font-dam hd_font15-17">Xuất xứ</p>
                                    <select class="slect-hang  hd_height36" name="xuat_xu">
                                        <option disabled selected value="">Xuất xứ</option>
                                        <?
                                        $query_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu`, `id_parents`, `id_danhmuc` FROM `xuat_xu` WHERE id_parents = 8");
                                        $sql_xx = $query_xx->result_array();
                                        ?>
                                        <? foreach ($sql_xx as $xx) : ?>
                                            <option value="<?= $xx['id_xuatxu'] ?>"><?= $xx['noi_xuatxu'] ?></option>
                                        <? endforeach ?>
                                    </select>
                                </div>
                                <div class="row-tin-dang">
                                    <p class="font-dam hd_font15-17">Kích thước khung</p>
                                    <select class="slect-hang  hd_height36" name="kich_thuoc_khung">
                                        <option disabled selected value="">Kích thước khung</option>
                                        <?
                                        $query_ktk = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE id_danhmuc = 8 AND phan_loai = 3");
                                        $result_ktk = $query_ktk->result_array();
                                        ?>
                                        <? foreach ($result_ktk as $ktk) { ?>
                                            <option value="<?= $ktk['id_manhinh'] ?>"><?= $ktk['ten_manhinh'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                                <div class="row-tin-dang">
                                    <p class="font-dam hd_font15-17">Màu sắc</p>
                                    <select class="slect-hang  hd_height36" name="mau_sac">
                                        <option disabled selected value="">Màu sắc</option>
                                        <? foreach ($sql_mx as $mx) : ?>
                                            <option value="<?= $mx['id_color'] ?>"><?= $mx['mau_sac'] ?></option>
                                        <? endforeach ?>
                                    </select>
                                </div>
                                <div class="row-tin-dang">
                                    <p class="font-dam hd_font15-17">Chất liệu khung</p>
                                    <select class="slect-hang  hd_height36" name="chat_lieu_khung">
                                        <option disabled selected value="">Chất liệu khung</option>
                                        <? foreach ($show_clk as $clk) { ?>
                                            <option value="<?= $clk['id'] ?>"><?= $clk['name'] ?></option>
                                        <? } ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Bảo hành</p>
                            <select class="slect-hang  hd_height36" name="bao_hanh">
                                <option disabled selected value="">Bảo hành</option>
                                <?
                                $query_bh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`, `id_parents`, `id_danhmuc` FROM `bao_hanh` WHERE id_parents = 8");
                                $sql_bh = $query_bh->result_array();
                                ?>
                                <? foreach ($sql_bh as $bh) : ?>
                                    <option value="<?= $bh['id_baohanh'] ?>"><?= $bh['tgian_baohanh'] ?></option>
                                <? endforeach ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tình trạng <span class="color_red">*</span></p>
                            <select class="slect-hang  hd_height36" name="tinhtrang">
                                <option disabled selected value="">Tình trạng</option>
                                <option value="1">Mới</option>
                                <option value="2">Đã sử dụng</option>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Giá <span class="color_red">*</span></p>
                            <div class="fig_gia_nguoiban">
                                <div class="input-gia-cont">
                                    <div class="box_input_infor">
                                        <input class="input_infor_tag error" onkeyup="format_gtri(this)" type="text" name="td_gia_spham" placeholder="" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
                                    </div>
                                    <div class="money_div arrow_none">
                                        <select class="dt-money-up donvi_ban" name="dvi_tien">
                                            <option value="1">VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban">
                                    <input type="checkbox" name="td_lienhe_ngban" placeholder="" class="lien-he-ngban">
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"></textarea>
                        </div>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input readonly type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" autocomplete="off" placeholder="Địa chỉ">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Số điện thoại liên hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="sdt_lienhe" value="<?= $usc_phone ?>" placeholder="Nhập số điện thoại liên hệ" autocomplete="off">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Email liện hệ <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="email_lienhe" value="<?= $usc_email ?>" placeholder="Nhập email liên hệ" autocomplete="off">
                        </div>
                        <div class="row-tin-dang div-ma-xac-nhan box_input_infor">
                            <p class="font-dam hd_font15-17">Mã xác nhận <span style="color:#ff0000">*</span></p>
                            <div class="khung_input_capcha">
                                <div class="div_bao_ma_xacnhan">
                                    <input id="captcha_input" type="text" name="captcha_confirm" class="input_infor_tag error" placeholder="Mã xác nhận" autocomplete="off" oninput="<?= $oninput ?>" class="ma_capcha">
                                </div>
                                <div class="bao_p_capcha">
                                    <input readonly type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                                    <div class="img_df">
                                        <img src="../images/anh_moi/new_capcha.svg" class="xoay360">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row-tin-dang cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold" onclick="xem_trc_tin()">XEM TRƯỚC</button>
                            <button type="button" id="xoa_tddang_tin" class="btn-submit td-dang-tin bike hd_cspointer font-bold">ĐĂNG TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <?php include '../modals/md_danh_muc_tin_dang.php' ?>
        <?php include '../modals/md_dia_chi.php' ?>
        <? include '../modals/tbao_tcong.php' ?>
    </section>
    <?php
    include('../includes/inc_new/inc_footer.php');
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script src="/js/slickslider/slick.min.js"></script>
</body>
<script type="text/javascript">
    $('#loai_xe').on('change', function() {
        var val_lx = $("select[name='loai_xe_dap']").val();
        if (val_lx == 210) {
            $('.xethethao_show').show();
        } else {
            $('.xethethao_show').hide();
        };

        if (val_lx != "") {
            $("#chitiet_dm").parents(".box_input_infor").removeClass("d_none");
        };

        $.ajax({
            type: 'POST',
            url: '/render/render_ctdm.php',
            data: {
                val_lx: val_lx,
            },
            success: function(data) {
                $("#chitiet_dm").html(data);
                // rf_select2();
            }
        })
    });

    $(".td-dang-tin").click(function() {
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
                loai_xe_dap: "required",
                dong_xe: "required",
                tinhtrang: "required",
                td_gia_spham: "required",
                chitiet_dm: "required",
                td_dia_chi: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                captcha_confirm: {
                    required: true,
                    equalTo: "#captcha",
                },
                sdt_lienhe: {
                    required: true,
                    vali_phone: true,
                },
                email_lienhe: {
                    required: true,
                    vali_email: true,
                },
            },
            messages: {
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                hang_xe: "Vui lòng chọn hãng xe",
                loai_xe_dap: "Vui lòng chọn loại xe",
                dong_xe: "Vui lòng chọn dòng xe",
                tinhtrang: "Vui lòng chọn tình trạng xe",
                td_gia_spham: "Vui lòng nhập giá sản phẩm",
                chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                td_dia_chi: "Vui lòng nhập địa chỉ",
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 10 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
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
            $("#xoa_tddang_tin").removeClass("td-dang-tin");
            var user_id = $("#form_xeco_circle").attr("data");
            var user_type = $("#form_xeco_circle").attr("data1");
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            } else {
                var free_gift = 0;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var hang_xe = $("select[name='hang_xe']").val();
            var loai_xe_dap = $("select[name='loai_xe_dap']").val();
            var xuat_xu = $("select[name='xuat_xu']").val();
            var kich_thuoc_khung = $("select[name='kich_thuoc_khung']").val();
            var mau_sac = $("select[name='mau_sac']").val();
            var chat_lieu_khung = $("select[name='chat_lieu_khung']").val();
            var dong_xe = $("select[name='dong_xe']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();
            var tinhtrang = $("select[name='tinhtrang']").val();
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
            var dia_chi = $("input[name='td_dia_chi']").val();

            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            // alert(user_id);
            var fd = new FormData();
            fd.append('user_id', user_id);
            fd.append('user_type', user_type);
            fd.append('free_gift', free_gift);
            fd.append('tieu_de', tieu_de);
            fd.append('hang_xe', hang_xe);
            fd.append('loai_xe_dap', loai_xe_dap);
            fd.append('xuat_xu', xuat_xu);
            fd.append('kich_thuoc_khung', kich_thuoc_khung);
            fd.append('mau_sac', mau_sac);
            fd.append('chat_lieu_khung', chat_lieu_khung);
            fd.append('dong_xe', dong_xe);
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
            fd.append('dia_chi', dia_chi);
            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            // lấy ảnh cũ
            fd.append('anh_dd', anh_dd);
            // end
            for (var i = 0; i < arr_anh.length; i++) {
                if (arr_anh[i] != 'undefined') {
                    fd.append('files[]', arr_anh[i]);
                }
            }
            var video = $("#cl-upload-video-file")[0].files;
            fd.append('file', video[0]);
            $.ajax({
                url: '/ajax_xeco/dangtin_xeco_xedap.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.bike').prop('disabled', true);
                },
                success: function(data) {
                    if (data == "") {
                        tbao_dtin_tcong();
                    } else {
                        alert(data);
                        $('#xoa_tddang_tin').addClass('td-dang-tin');
                        $('.bike').prop('disabled', false);
                    }
                }
            })
        }
    })


    //Xem trước
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
                loai_xe_dap: "required",
                dong_xe: "required",
                tinhtrang: "required",
                td_gia_spham: "required",
                chitiet_dm: "required",
                td_dia_chi: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                captcha_confirm: {
                    required: true,
                    equalTo: "#captcha",
                },
                sdt_lienhe: {
                    required: true,
                    vali_phone: true,
                },
                email_lienhe: {
                    required: true,
                    vali_email: true,
                },
            },
            messages: {
                tieu_de: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                hang_xe: "Vui lòng chọn hãng xe",
                loai_xe_dap: "Vui lòng chọn loại xe",
                dong_xe: "Vui lòng chọn dòng xe",
                tinhtrang: "Vui lòng chọn tình trạng xe",
                td_gia_spham: "Vui lòng nhập giá sản phẩm",
                chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                td_dia_chi: "Vui lòng nhập địa chỉ",
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 10 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
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
            var free_gift = 0;
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var id_dm = $(".dmuc-spham").attr('data');
            var hang_xe = $("select[name='hang_xe']").val();
            var loai_xe_dap = $("select[name='loai_xe_dap']").val();
            var xuat_xu = $("select[name='xuat_xu']").val();
            var kich_thuoc_khung = $("select[name='kich_thuoc_khung']").val();
            var mau_sac = $("select[name='mau_sac']").val();
            var chat_lieu_khung = $("select[name='chat_lieu_khung']").val();
            var dong_xe = $("select[name='dong_xe']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();
            var tinhtrang = $("select[name='tinhtrang']").val();
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

            var fd = new FormData();
            fd.append("id_dmuc", id_dm);
            fd.append('free_gift', free_gift);
            fd.append('tieu_de', tieu_de);
            fd.append('loai_sp', hang_xe);
            fd.append('loai_sp2', loai_xe_dap);
            fd.append('loai_sp3', dong_xe);
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
            fd.append('dia_chi', dia_chi);
            fd.append('avt_anh', arr_src);
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
                    $(".tindang-container").addClass("d_none");
                }
            })
        }
    }
</script>

</html>