<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $acc_id = $_COOKIE['UID'];
    $acc_type = $_COOKIE['UT'];

    $query_lsp = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE id_danhmuc = 61");
    $result = $query_lsp->result_array();
    $hom_nay = date('Y-m-d', time());
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
    <title>Đăng tin sức khỏe sắc đẹp mỹ phẩm</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">

    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
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
                    <? include "../includes/inc_new/up-media-dang-tin.php"; ?>
                </div>
                <div class="tindang-col-right" data="<?= $hom_nay ?>">
                    <form class="form-dtin-cont" id="form_mypham" data="<?= $acc_id ?>" data1="<?= $acc_type ?>">
                        <div class="row-tin-dang danhmuc_tt">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" data="61" readonly name="san-pham-laptop" placeholder="Sức khỏe - Sắc đẹp >> Mỹ phẩm">
                        </div>

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag error" type="text" name="tieu_de" autocomplete="off" placeholder="Nhập tiêu đề">
                        </div>
                        <div class="d_flex j_between mb20">
                            <div class="row-tin-dang rowflex2 box_input_infor">
                                <p class="font-dam hd_font15-17">Loại hình <span class="color_red">*</span></p>
                                <select id="loai_hinh" class="slect-hang  hd_height36" name="loaihinh">
                                    <option disabled selected value="">Loại hình</option>
                                    <? foreach ($result as $rows) : ?>
                                        <option value="<?= $rows['id'] ?>"><?= $rows['ten_loai'] ?></option>
                                    <? endforeach ?>
                                </select>
                            </div>
                            <div class="row-tin-dang rowflex2 box_input_infor">
                                <p class="font-dam hd_font15-17">Loại mỹ phẩm <span class="color_red">*</span></p>
                                <select id="loai_mypham" class="slect-hang hd_height36" name="loai_mypham">
                                    <option value="">Loại mỹ phẩm</option>

                                </select>
                            </div>
                        </div>
                        <div class="d_flex j_between mb20">
                            <div class="row-tin-dang rowflex2 box_input_infor">
                                <p class="font-dam hd_font15-17">Hãng <span class="color_red">*</span></p>
                                <select id="hang_mypham" class="slect-hang  hd_height36" name="hang">
                                    <option value="">Hãng</option>

                                </select>
                            </div>
                            <div class="row-tin-dang rowflex2 box_input_infor">
                                <p class="font-dam hd_font15-17">Hạn sử dụng <span class="color_red">*</span></p>
                                <input class="input_infor_tag error" type="date" name="hansudung" placeholder="Nhập hạn sử dụng">
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Giá <span style="color:#ff0000">*</span></p>
                            <div class="input-gia-cont ">
                                <div class="box_input_infor">
                                    <input class="input_infor_tag error" type="text" onkeyup="format_gtri(this)" name="td_gia_spham" placeholder="" id="gia-ban-sp" autocomplete="off" oninput="<?php echo $oninput; ?>">
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

                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea class="texa-mo-ta input_infor_tag error" placeholder="Nhập mô tả" name="mota"></textarea>
                        </div>
                        <div class="row-tin-dang box_input_infor d_none">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select id="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
                                <option disabled selected value="">Thêm chi tiết danh mục</option>
                            </select>
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
                        <div class="row-tin-dang cont-btn-sb hd-disflex hide-480-mobile">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer font-bold" onclick="xem_trc_tin()">XEM TRƯỚC</button>
                            <button type="button" id="xoa_tddang_tin" class="btn-submit td-dang-tin mypham hd_cspointer font-bold">ĐĂNG TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <? include '../modals/md_danh_muc_tin_dang.php' ?>
        <? include '../modals/md_dia_chi.php' ?>
        <? include '../modals/tbao_tcong.php' ?>
    </section>
    <?
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script src="/js/slickslider/slick.min.js"></script>
</body>
<script>
    $('#loai_hinh').change(function() {
        var listPr = $(this).val()
        if (listPr != "") {
            $("#chitiet_dm").parents(".box_input_infor").removeClass("d_none");
        } else {
            $("#chitiet_dm").parents(".box_input_infor").addClass("d_none");
        }
        $.ajax({
            type: 'POST',
            url: '/ajax/loaimypham.php',
            data: {
                listPr: listPr
            },
            success: function(data) {
                var arr = JSON.parse(data);
                $('#loai_mypham').html(arr[0])
                $('#hang_mypham').html(arr[1])
                $('#chitiet_dm').html(arr[2])
            }
        })
    });

    $.validator.addMethod("dateRange",
        function() {
            var date1 = $("input[name='hansudung']").val();
            var date2 = $(".tindang-col-right").attr("data");
            return (date1 >= date2);
        });

    $(".td-dang-tin").click(function() {
        var form_mypham = $("#form_mypham");
        form_mypham.validate({
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
                loaihinh: "required",
                loai_mypham: "required",
                hang: "required",
                hansudung: {
                    required: true,
                    dateRange: true,
                },
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
                    minlength: "Nhập ít nhất 40 ký tự",
                    maxlength: "Nhập nhiều nhất 70 ký tự",
                },
                loaihinh: "Vui lòng chọn loại hình",
                loai_mypham: "Vui lòng chọn loại mỹ phẩm",
                hang: "Vui lòng chọn hãng sản phẩm",
                hansudung: {
                    required: "Vui lòng nhập hạn sử dụng",
                    dateRange: "Hạn sử dụng phải sau hoặc bằng ngày hôm nay",
                },
                tinhtrang: "Vui lòng chọn tình trạng",

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
        if (form_mypham.valid() === false) {
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
        if (form_mypham.valid() === true) {
            $("#xoa_tddang_tin").removeClass("td-dang-tin");
            var user_id = $("#form_mypham").attr("data");
            var user_type = $("#form_mypham").attr("data1");
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            } else {
                var free_gift = 0;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var loaihinh = $("select[name='loaihinh']").val();
            var loai_mypham = $("select[name='loai_mypham']").val();
            var hang = $("select[name='hang']").val();
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
            var dia_chi = $("input[name='td_dia_chi']").val();
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var fd = new FormData();
            fd.append('user_id', user_id);
            fd.append('user_type', user_type);
            fd.append('free_gift', free_gift);
            fd.append('tieu_de', tieu_de);
            fd.append('loaihinh', loaihinh);
            fd.append('loai_mypham', loai_mypham);
            fd.append('hang', hang);
            fd.append('hansudung', hansudung);
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
                url: '/ajax_sksd/dangtin_sksd_mypham.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.mypham').prop('disabled', true);
                },
                success: function(data) {
                    if (data == "") {
                        tbao_dtin_tcong();
                    } else {
                        alert(data);
                        $('#xoa_tddang_tin').addClass('td-dang-tin');
                        $('.mypham').prop('disabled', false);
                    }
                }
            })
        }
    })
    // xem trước
    function xem_trc_tin() {
        var form_mypham = $(".form-dtin-cont");
        form_mypham.validate({
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
                loaihinh: "required",
                loai_mypham: "required",
                hang: "required",
                hansudung: {
                    required: true,
                    dateRange: true,
                },
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
                    minlength: "Nhập ít nhất 40 ký tự",
                    maxlength: "Nhập nhiều nhất 70 ký tự",
                },
                loaihinh: "Vui lòng chọn loại hình",
                loai_mypham: "Vui lòng chọn loại mỹ phẩm",
                hang: "Vui lòng chọn hãng sản phẩm",
                hansudung: {
                    required: "Vui lòng nhập hạn sử dụng",
                    dateRange: "Hạn sử dụng phải sau hoặc bằng ngày hôm nay",
                },
                tinhtrang: "Vui lòng chọn tình trạng",

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
        if (form_mypham.valid() === false) {
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
        if (form_mypham.valid() === true) {
            var free_gift = 0;
            if ($("input[name='free_gift']").is(":checked")) {
                var free_gift = 1;
            };
            var tieu_de = $("input[name='tieu_de']").val();
            var id_dm = $(".dmuc-spham").attr('data');
            var loaihinh = $("select[name='loaihinh']").val();
            var loai_mypham = $("select[name='loai_mypham']").val();
            var hang = $("select[name='hang']").val();
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
            var dia_chi = $("input[name='td_dia_chi']").val();
            var phan_biet = 2;
            var donvi_ban = $(".donvi_ban").val();
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var fd = new FormData();
            fd.append("id_dmuc", id_dm);
            fd.append('tang_mphi', free_gift);
            fd.append('tieu_de', tieu_de);
            fd.append('loai_sp', loaihinh);
            fd.append('loai_sp2', loai_mypham);
            fd.append('loai_sp3', hang);
            fd.append('loai_sp4', hansudung);
            fd.append('gia_spham', td_gia_spham);
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