<?
include 'config.php';

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $id = getValue('id', 'int', 'GET', '');

    $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id ");

    $bivi_xuly = new db_query("SELECT `bovi_id`, `bovi_ten` FROM `bovi_xuly` WHERE `bovi_id_danhmuc` = $id ");

    $list_ram = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id AND `phan_loai` = 1 ");

    $list_ocung = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id AND `phan_loai` = 2 ");

    $card_mhinh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id AND `phan_loai` = 1 ");

    $kich_co = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id AND `phan_loai` = 2 ");

    $bao_hanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
} else {
    header('Location: /');
}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Đăng tin đồ tiện tử máy tính</title>
    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_t.css?v=<?= $version ?>">
</head>

<body>
    <? include("../includes/common/inc_header.php") ?>
    <section>
        <div class="tindang-container">
            <div class="tindang-header hd-disflex hd-align-center ">
                <p class="font-18-24 font-dam">Đăng tin</p>
                <div class="w-125">
                    <span>Cho tặng miễn phí</span>
                    <label class="switch-124" for="cho-tang-mphi">
                        <input type="checkbox" id="cho-tang-mphi">
                        <span class="slider1 round1"></span>
                    </label>
                </div>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include("../includes/inc_new/up-media-dang-tin.php"); ?>
                </div>
                <div class="tindang-col-right">
                    <form class="form-dtin-cont" id="form_dt_pc" data="<?= $us_id ?>" data1="<?= $us_type ?>">
                        <div class="row-tin-dang-dau">
                            <p class="font-dam hd_font15-17">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input type="text" class="dmuc-spham" readonly name="dmuc_spham_mtinh" data="<?= $id ?>" placeholder="Đồ điện tử >> Máy tính để bàn">
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input_infor_tag tieu-de-dang-tin error" type="text" name="tieude_pc" placeholder="Nhập tiêu đề" autocomplete="off">
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Bộ vi xử lý</p>
                            <select class="slect-hang  hd_height36" name="bovi_xuly">
                                <option value="">Bộ vi xử lý</option>
                                <? while ($row_bv = mysql_fetch_assoc($bivi_xuly->result)) { ?>
                                    <option value="<?= $row_bv['bovi_id'] ?>"><?= $row_bv['bovi_ten'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">RAM</p>
                            <select class="slect-hang  hd_height36" name="ram_pc">
                                <option value="">RAM</option>
                                <? while ($row_ram = mysql_fetch_assoc($list_ram->result)) { ?>
                                    <option value="<?= $row_ram['id_dl'] ?>"><?= $row_ram['ten_dl'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="tt-o-cung hd-disflex">
                            <div class="row-tin-dang row-o-cung">
                                <p class="font-dam hd_font15-17">Ổ cứng</p>
                                <select class="slect-hang  hd_height36" name="o_cung">
                                    <option value="">Ổ cứng</option>
                                    <? while ($row_oc = mysql_fetch_assoc($list_ocung->result)) { ?>
                                        <option value="<?= $row_oc['id_dl'] ?>"><?= $row_oc['ten_dl'] ?></option>
                                    <? } ?>
                                </select>
                            </div>
                            <div class="row-tin-dang row-loai-o-cung">
                                <p class="font-dam hd_font15-17">Loại ổ cứng</p>
                                <select class="slect-hang  hd_height36" name="loai_ocung">
                                    <option value="">Chọn loại ổ cứng</option>
                                    <option value="1">HDD</option>
                                    <option value="2">SSD</option>
                                </select>
                            </div>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Card màn hình</p>
                            <select class="slect-hang  hd_height36" name="card_mhinh">
                                <option value="">Chọn card màn hình</option>
                                <? while ($row_card = mysql_fetch_assoc($card_mhinh->result)) { ?>
                                    <option value="<?= $row_card['id_manhinh'] ?>"><?= $row_card['ten_manhinh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Kích cỡ màn hình</p>
                            <select class="slect-hang  hd_height36" name="kich_co">
                                <option value="">Chọn kích cỡ màn hình </option>
                                <? while ($row_kc = mysql_fetch_assoc($kich_co->result)) { ?>
                                    <option value="<?= $row_kc['id_manhinh'] ?>"><?= $row_kc['ten_manhinh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Bảo hành</p>
                            <select class="slect-hang  hd_height36" name="bao_hanh">
                                <option value="">Bảo hành</option>
                                <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                                    <option value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Tình trạng <span class="color_red">*</span></p>
                            <select name="tinhtrang_pc" class="slect-hang hd_height36">
                                <option disabled selected value="">Tình trạng</option>
                                <option value="1">Mới</option>
                                <option value="2">Đã sử dụng (chưa sửa chữa)</option>
                                <option value="3">Đã sử dụng (qua sửa chữa)</option>
                            </select>
                        </div>
                        <div class="row-tin-dang">
                            <p class="font-dam hd_font15-17">Giá <span class="color_red">*</span></p>
                            <div class="fig_gia_nguoiban">
                                <div class="input-gia-cont">
                                    <div class="box_input_infor">
                                        <input class="input_infor_tag error" type="text" name="td_gia_spham" id="gia-ban-sp" autocomplete="off" oninput="<?= $oninput ?>" onkeyup="format_gtri(this)">
                                    </div>
                                    <div class="money_div arrow_none">
                                        <select class="dt-money-up" name="donvi_ban">
                                            <option value="1" selected>VNĐ</option>
                                            <option value="2">USD</option>
                                            <option value="3">EURO</option>
                                        </select>
                                    </div>
                                </div>
                                <span class="sp-lienhe-nban fig_gia_nguoiban_lienhe">
                                    <input type="checkbox" name="td-lienhe_ngban" class="lien-he-ngban">
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Mô tả <span class="color_red">*</span></p>
                            <textarea name="mota" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nhập mô tả"></textarea>
                        </div>
                        <div class="box_input_infor">
                            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                            <select name="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width: 100%;">
                                <option value="">Chi tiết danh mục</option>
                                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                                    <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="row-tin-dang box_input_infor">
                            <p class="font-dam hd_font15-17">Địa chỉ <span class="color_red">*</span></p>
                            <input type="text" name="td_dia_chi" class="td_ttin_diachi input_infor_tag error" placeholder="Địa chỉ" readonly>
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
                            <p class="font-dam hd_font15-17">Mã xác nhận <span class="color_red">*</span></p>
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
                        <div class="row-tin-dang-btn cont-btn-sb hd-disflex">
                            <button type="button" class="btn-submit td-xem-truoc hd_cspointer background-none font-bold">XEM TRƯỚC</button>
                            <button type="button" id="xoa_tddang_tin" class="btn-submit td-dang-tin hd_cspointer font-bold">ĐĂNG TIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <? include('../modals/md_danh_muc_tin_dang.php') ?>
        <? include('../modals/md_dia_chi.php') ?>
        <? include '../modals/tbao_tcong.php' ?>
    </section>
    <? include('../includes/inc_new/inc_footer.php') ?>
</body>
<script src="/js/slickslider/slick.min.js"></script>
<script type="text/javascript" src="/js/newJs/admin.main.js"></script>
<script type="text/javascript">
    $(".td-dang-tin").click(function() {
        var form_pc = $("#form_dt_pc");
        form_pc.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieude_pc: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                tinhtrang_pc: "required",
                td_gia_spham: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                chitiet_dm: "required",
                td_dia_chi: "required",
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
                tieude_pc: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                tinhtrang_pc: "Vui lòng chọn tình trạng sản phẩm",
                td_gia_spham: "Vui lòng nhập giá sản phẩm",
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 10 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                td_dia_chi: "Vui lòng nhập địa chỉ",
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
            $("#xoa_tddang_tin").removeClass("td-dang-tin");
            var user_id = $(".form-dtin-cont").attr("data");
            var user_type = $(".form-dtin-cont").attr("data1");
            var id_dm = $(".dmuc-spham").attr("data");
            var tieu_de = $("input[name='tieude_pc']").val();
            var tinh_trang_ban = $("select[name='tinhtrang_pc']").val();
            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var td_gia_spham = '0';
            };
            var don_vi = $("select[name='donvi_ban']").val();
            var chitiet_dm = $("select[name='chitiet_dm']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
            var tinh_thanh = $("select[name='thanhpho']").val();
            var quan_huyen = $("select[name='quanhuyen']").val();
            var phuong_xa = $("select[name='phuongxa']").val();
            var so_nha = $("input[name='md_so_nha']").val();
            var mo_ta = $("textarea[name='mota']").val();
            var tang_mphi = 0;
            if ($("#cho-tang-mphi").is(":checked")) {
                tang_mphi = 1;
            }

            var bovi_xuly = $("select[name='bovi_xuly']").val();
            var ram_pc = $("select[name='ram_pc']").val();
            var o_cung = $("select[name='o_cung']").val();
            var card_mhinh = $("select[name='card_mhinh']").val();
            var loai_ocung = $("select[name='loai_ocung']").val();
            var kich_co = $("select[name='kich_co']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();
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
            fd.append('id_dm', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('tinh_trang_ban', tinh_trang_ban);
            fd.append('gia_tpham', td_gia_spham);
            fd.append('chitiet_dm', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('tinh_thanh', tinh_thanh);
            fd.append('quan_huyen', quan_huyen);
            fd.append('phuong_xa', phuong_xa);
            fd.append('so_nha', so_nha);
            fd.append('don_vi', don_vi);
            fd.append('mo_ta', mo_ta);
            fd.append('tang_mphi', tang_mphi);
            fd.append('bovi_xuly', bovi_xuly);
            fd.append('ram_pc', ram_pc);
            fd.append('o_cung', o_cung);
            fd.append('card_mhinh', card_mhinh);
            fd.append('loai_ocung', loai_ocung);
            fd.append('kich_co', kich_co);
            fd.append('bao_hanh', bao_hanh);
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
                type: 'POST',
                url: '/ajax_ddtu/dtin_maytinh_dban.php',
                data: fd,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.td-dang-tin').prop('disabled', true);
                },
                success: function(data) {
                    if (data == "") {
                        tbao_dtin_tcong();
                    } else {
                        alert(data);
                        $('#xoa_tddang_tin').addClass('td-dang-tin');
                        $('.td-dang-tin').prop('disabled', false);
                    }
                }
            })
        }
    });

    $(".td-xem-truoc").click(function() {
        var form_pc = $(".form-dtin-cont");
        form_pc.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".box_input_infor"));
                error.wrap("<span class='error'>");
                element.parents('.box_input_infor').addClass('validate_input');
            },
            rules: {
                tieude_pc: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                tinhtrang_pc: "required",
                td_gia_spham: "required",
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                chitiet_dm: "required",
                td_dia_chi: "required",
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
                tieude_pc: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 40 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                },
                tinhtrang_pc: "Vui lòng chọn tình trạng sản phẩm",
                td_gia_spham: "Vui lòng nhập giá sản phẩm",
                mota: {
                    required: "Vui lòng nhập mô tả",
                    minlength: "Mô tả ít nhất 10 ký tự",
                    maxlength: "Mô tả nhiều nhất 10000 ký tự",
                },
                chitiet_dm: "Vui lòng chọn chi tiết danh mục",
                td_dia_chi: "Vui lòng nhập địa chỉ",
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
            var id_dm = $(".dmuc-spham").attr("data");
            var tieu_de = $("input[name='tieude_pc']").val();
            var tinh_trang = $("select[name='tinhtrang_pc']").val();
            var td_gia_spham = $("input[name='td_gia_spham']").val();
            if ($(".lien-he-ngban").is(":checked")) {
                var td_gia_spham = '0';
            };
            var don_vi = $("select[name='donvi_ban']").val();
            var chitiet_dm = $("select[name='chitiet_dm']").val();
            var dia_chi = $("input[name='td_dia_chi']").val();
            var tinh_thanh = $("select[name='thanhpho']").val();
            var quan_huyen = $("select[name='quanhuyen']").val();
            var phuong_xa = $("select[name='phuongxa']").val();
            var so_nha = $("input[name='md_so_nha']").val();
            var mo_ta = $("textarea[name='mota']").val();
            var tang_mphi = 0;
            if ($("#cho-tang-mphi").is(":checked")) {
                tang_mphi = 1;
            }

            var bovi_xuly = $("select[name='bovi_xuly']").val();
            var ram_pc = $("select[name='ram_pc']").val();
            var o_cung = $("select[name='o_cung']").val();
            var card_mhinh = $("select[name='card_mhinh']").val();
            var loai_ocung = $("select[name='loai_ocung']").val();
            var kich_co = $("select[name='kich_co']").val();
            var bao_hanh = $("select[name='bao_hanh']").val();

            var phan_biet = 1;
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            var fd = new FormData();
            fd.append('id_dmuc', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('tinh_trang', tinh_trang);
            fd.append('gia_spham', td_gia_spham);
            fd.append('ctiet_dmuc', chitiet_dm);
            fd.append('dia_chi', dia_chi);
            fd.append('donvi_ban', don_vi);
            fd.append('mo_ta', mo_ta);
            fd.append('tang_mphi', tang_mphi);

            fd.append('loai_sp', bovi_xuly);
            fd.append('loai_sp2', ram_pc);
            fd.append('loai_sp3', o_cung);
            fd.append('loai_sp4', card_mhinh);
            fd.append('loai_sp5', loai_ocung);
            fd.append('loai_sp6', kich_co);
            fd.append('loai_sp7', bao_hanh);
            fd.append('avt_anh', arr_src.concat(anh_dd));
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
                    $(".tindang-container").addClass("d_none");
                }
            })
        }
    });
</script>

</html>