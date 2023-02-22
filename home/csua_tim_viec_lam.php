<?
include("config.php");
$id_vl = getValue('id_cs', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_vl != 0) {
    $user_id = $_COOKIE['UID'];
    $user_type = $_COOKIE['UT'];
    $check_tind = new db_query("SELECT * FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id WHERE new_user_id = $user_id AND new.new_id = $id_vl AND  new_cate_id = 121 ");
    if (mysql_num_rows($check_tind->result) > 0) {
        $row_tt = mysql_fetch_assoc($check_tind->result);
        $avt_dangtin = $row_tt['new_image'];
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
    <link rel="dns-prefetch" href="https://www.google.com.vn">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.google.com.vn">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

    <!--------------->

    <title>Chỉnh sửa tin đăng tìm việc làm</title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn, là cầu nối tốt nhất giữa người mua và người bán." />
    <meta property="og:title" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN" />
    <meta property="og:description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn. Raonhanh365 'đăng tin miễn phí - mua bán tức thì, nơi kết nối giữa người mua kẻ bán.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />

    <link rel="stylesheet" href="/css/slick.css">
    <link rel="stylesheet" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/edit_personal_prof_inf.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien2.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_h.css?v=<?= $version ?>">

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>

    <div class="bg-body">
        <section class="edit_infor">
            <div class="dang-tin-uv">
                <div class="dang-tin-uv-title">
                    <p class="dt-tieu-de class_gray47">Đăng tin</p>
                </div>
                <div class="dang-tin-uv-nd">
                    <div class="dang-tin-uv-trai">
                        <div class="dang-tin-uv-trai-upload<?= ($avt_dangtin != '') ? " d_none" : "" ?>">
                            <label class="drop_target">
                                <div class="image_preview">
                                    <img id="upload-bg" src="/images/dangtin-timviec/upload-img.svg" alt="">
                                </div>
                                <input id="upload_logo" type="file" />
                            </label>
                        </div>
                        <div class="after-upload-video<?= ($avt_dangtin != '') ? " d_block" : "" ?>">
                            <div class="dang-tin-video-after hd-textalign hd_cspointer hd-disflex">
                                <label class="hd_cspointer logo-upload-after position-relative hd-disflex hd-align-center hd-jtify-center">
                                    <div class="continue_upload_video">
                                        <img src="../images/hd_upload_photo_after.svg" alt="tiếp tục đăng ảnh cần bán">
                                    </div>
                                </label>
                                <div class="avt_xoavideo" data="<?= $avt_dangtin ?>">
                                    <img width="86px" height="86px" style="border-radius:5px" id="video_chon" controls class="continue_upload_video<?= ($avt_dangtin == '') ? " d_none" : "" ?>" src="<?= $avt_dangtin ?>">
                                    <span class="close_logo"><img src="../images/hd_delete_icon.svg" alt="close this image" /></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form class="dang-tin-uv-phai" id="form_tim_viec">
                        <div class="dang-tin-1">
                            <p class="thong-tin">Danh mục sản phẩm <span class="color_red">*</span></p>
                            <input class="input-1 dmuc-spham" data="121" type="text" name="" id="" placeholder="Việc làm >> Tìm việc làm" readonly>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Tiêu đề <span class="color_red">*</span></p>
                            <input class="input-1" type="text" name="title" id="" placeholder="VD: Tìm việc làm kế toán tổng hợp" value="<?= $row_tt['new_title'] ?>">
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Địa chỉ <span class="color_red">*</span></p>
                            <input readonly class="diadiem_lamviec input-1" type="text" name="td_diachi_lamviec" id="dia_chi" placeholder="Chọn địa chỉ" value="<?= $row_tt['dia_chi'] ?>" data-tt="<?= $row_tt['new_city'] ?>" data-qh="<?= $row_tt['quan_huyen'] ?>" data-px="<?= $row_tt['phuong_xa'] ?>" data-sn="<?= $row_tt['new_sonha'] ?>">
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Giới tính</p>
                            <div class="item_muc_luong d_flex">
                                <div data-id="1" class="gioi_tinh active">Nam</div>
                                <div data-id="2" class="gioi_tinh">Nữ</div>
                            </div>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Tuổi </p>
                            <input class="input-1" type="text" name="age" id="" placeholder="Nhập tuổi" value="<?= ($row_tt['new_min_age'] > 0) ? $row_tt['new_min_age'] : "" ?>">
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Chọn ngành nghề <span class="color_red">*</span></p>
                            <select class="slect-hang" name="nganhnghe">
                                <option disabled selected value="">Chọn ngành nghề</option>
                                <?
                                $db_qra = new db_query("SELECT cat_id, cat_name FROM category_vl ");
                                while ($rowa = mysql_fetch_assoc($db_qra->result)) { ?>
                                    <option <?= ($row_tt['new_job_type'] == $rowa['cat_id']) ? "selected" : "" ?> value="<? echo $rowa['cat_id'] ?>"><?= $rowa['cat_name'] ?></option>
                                <?
                                }
                                ?>
                            </select>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Hình thức<span class="color_red">*</span></p>
                            <select class="slect-hang" name="work_type">
                                <option disabled selected value="">Chọn hình thức làm việc</option>
                                <option value="1">Toàn thời gian</option>
                                <option value="2">Bán thời gian</option>
                                <option value="3">Giờ hành chính</option>
                                <option value="4">Ca sáng</option>
                                <option value="5">Ca chiều</option>
                                <option value="6">Ca đêm</option>
                            </select>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Mức lương mong muốn <span class="color_red">*</span></p>
                            <div class="luong-mong-muon" id="lmm-1">
                                <div class="muc-luong">
                                    <div data-id="1" class="luong-2 active">Thỏa thuận</div>
                                    <div data-id="2" class="luong-2">Từ mức</div>
                                    <div data-id="3" class="luong-2">Đến mức</div>
                                    <div data-id="4" class="luong-2">Từ mức - đến mức</div>
                                </div>
                                <div class="khoi-muc-luong">
                                    <div id="nhap-luong-1" class="nhap-luong-muon"><input disabled class="input-1" type="text" name="" id="" placeholder="Thỏa thuận"></div>
                                    <div id="nhap-luong-2" class="d_none nhap-luong-muon">
                                        <div class="nhap-so">
                                            <input class="input-1" type="text" name="td_gia_spham" id="" placeholder="Từ mức" onkeyup="format_gtri(this)">
                                        </div>
                                        <div class="money_div don-vi">
                                            <select class="don-vi-tien dt-money-up" name="dvi_tien">
                                                <option value="1">VNĐ</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="nhap-luong-3" class="d_none nhap-luong-muon ">
                                        <div class="nhap-so">
                                            <input class="input-1" type="text" name="td_gia_spham" id="" placeholder="Đến mức" onkeyup="format_gtri(this)">
                                        </div>
                                        <div class="money_div don-vi">
                                            <select class="don-vi-tien dt-money-up" name="dvi_tien">
                                                <option value="1">VNĐ</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="nhap-luong-4" class="d_none nhap-luong-muon ">
                                        <div class="dis_flex align-items-center">
                                            <div class="nhap-so">
                                                <input class="input-1" type="text" name="salary_fr" id="" placeholder="Từ mức" onkeyup="format_gtri(this)">
                                            </div>
                                            <div class="nhap-so">
                                                <input class="input-1" type="text" name="salary_to" id="" placeholder="Đến mức" onkeyup="format_gtri(this)">
                                            </div>
                                            <div class="money_div don-vi-2">
                                                <select class="don-vi-tien-2 dt-money-up" name="dvi_tien">
                                                    <option value="1">VNĐ</option>
                                                    <option value="2">USD</option>
                                                    <option value="3">EURO</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Hình thức trả lương <span class="color_red">*</span></p>
                            <select class="slect-hang" name="salary_type">
                                <option disabled selected value="">Chọn hình thức trả lương</option>
                                <option value="1">Theo giờ</option>
                                <option value="2">Theo ngày</option>
                                <option value="3">Theo tuần</option>
                                <option value="4">Theo tháng</option>
                                <option value="5">Theo năm</option>
                            </select>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Bằng cấp </p>
                            <select class="slect-hang" name="bangcap">
                                <option disabled selected value="">Chọn bằng cấp</option>
                                <option value="1">Đại học</option>
                                <option value="2">Cao đẳng</option>
                                <option value="3">Lao động phổ thông</option>
                            </select>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Kinh nghiệm </p>
                            <select class="slect-hang" name="kinhnghiem">
                                <option disabled selected value="">Chọn kinh nghiệm</option>
                                <option value="1">Chưa có kinh nghiệm</option>
                                <option value="2">Kinh nghiệm từ 1-2 năm</option>
                                <option value="3">Kinh nghiệm trên 2 năm</option>
                            </select>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Chứng chỉ </p>
                            <input class="input-1" type="text" name="chungchi" id="" placeholder="Nhập chứng chỉ" value="<?= $row_tt['new_skill'] ?>">
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Số điện thoại liên hệ <span class="color_red">*</span></p>
                            <input class="input-1" type="text" name="sdt_lienhe" value="<?= $row_tt['new_phone'] ?>" placeholder="Nhập số điện thoại liên hệ" autocomplete="off">
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Email liên hệ <span class="color_red">*</span></p>
                            <input class="input-1" type="text" name="email_lienhe" value="<?= $row_tt['new_email'] ?>" placeholder="Nhập email liên hệ" autocomplete="off">
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Giới thiệu chung <span class="color_red">*</span></p>
                            <textarea class="input-3" name="mota" id="" placeholder="Giới thiệu về bản thân ứng viên"><?= $row_tt['new_description'] ?></textarea>
                        </div>
                        <div class="dang-tin-1">
                            <p class="thong-tin">Mã xác nhận <span class="color_red">*</span></p>
                            <div class="ma-xac-nhan">
                                <div class="ma-xn">
                                    <input class="input-1" type="text" name="captcha_confirm" id="" placeholder="Mã xác nhận">
                                </div>
                                <div class="ma-xn2">
                                    <input readonly class="input-1 ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha" type="text" name="" placeholder="">
                                    <div class="img_df">
                                        <img src="../images/anh_moi/new_capcha.svg" class="xoay360">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="left-btn">
                            <button type="button" class="xem-truoc">Xem trước</button>
                            <button type="button" class="dang-tin">Đăng tin</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="v_container d_none"></div>
            <? include '../modals/md_danh_muc_tin_dang.php' ?>
            <? include '../modals/md_dia_chi.php' ?>
        </section>
    </div>
    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>

</body>
<?php
if ($row_tt['new_money'] != 0 && $row_tt['gia_kt'] != 0) {
    $new_money_type = 4;
} elseif ($row_tt['gia_kt'] != 0) {
    $new_money_type = 3;
} elseif ($row_tt['new_money'] != 0) {
    $new_money_type = 2;
} else {
    $new_money_type = 1;
}
?>

</html>
<script>
    var new_money_type = <?= $new_money_type ?>;
    var new_money_min = <?= $row_tt['new_money'] ?>;
    var new_money_max = <?= $row_tt['gia_kt'] ?>;
    var new_money_unit = <?= $row_tt['new_unit'] ?>;
    var gioi_tinh = <?= $row_tt['gioi_tinh'] ?>;
    var bangcap = <?= $row_tt['new_level'] ?>;
    var work_type = <?= $row_tt['new_job_kind'] ?>;
    var salary_type = <?= $row_tt['new_pay_by'] ?>;
    var kinhnghiem = <?= $row_tt['new_exp'] ?>;
    var user_type = <?= $user_type ?>;

    if (bangcap > 0) {
        $("[name=bangcap]").val(bangcap).trigger('change');
    }
    $("[name=work_type]").val(work_type).trigger('change');
    $("[name=salary_type]").val(salary_type).trigger('change');
    if (kinhnghiem > 0) {
        $("[name=kinhnghiem]").val(kinhnghiem).trigger('change');
    }

    $('.gioi_tinh').click(function() {
        $('.gioi_tinh').removeClass('active');
        $(this).addClass('active');
    });
    $('.gioi_tinh[data-id=' + gioi_tinh + ']').click();

    $('.luong-2').click(function() {
        $('.luong-2').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('id');
        $('.nhap-luong-muon').addClass('d_none')
        $('#nhap-luong-' + type).removeClass('d_none')
    });
    $('.luong-2[data-id=' + new_money_type + ']').click();
    switch (new_money_type) {
        case 2:
            $('#nhap-luong-' + new_money_type).find("[name=td_gia_spham]").val(new_money_min).trigger('keyup');
            $('#nhap-luong-' + new_money_type).find("[name=dvi_tien]").val(new_money_unit).trigger('change');
            break;
        case 3:
            $('#nhap-luong-' + new_money_type).find("[name=td_gia_spham]").val(new_money_max).trigger('keyup');
            $('#nhap-luong-' + new_money_type).find("[name=dvi_tien]").val(new_money_unit).trigger('change');
            break;
        case 4:
            $("[name=salary_fr]").val(new_money_min).trigger('keyup');
            $("[name=salary_to]").val(new_money_max).trigger('keyup');
            $('#nhap-luong-' + new_money_type).find("[name=dvi_tien]").val(new_money_unit).trigger('change');
            break;
        default:
            break;
    }

    $('#upload_logo').change(function() {
        var file = $(this).prop('files')[0];
        var size = file.size;
        var file_type = file.type;
        var filesize = (size / (1024 * 1024)).toFixed(2);
        var tmppath = URL.createObjectURL(file);
        var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
        if ($.inArray(file_type, match) == -1) {
            alert("Vui lòng chọn file định đạng : JPG, JPEG, PNG, GIF, JPE");
            $(this).val('');
        } else if (filesize < 2) {
            document.querySelector('#video_chon').classList.remove('d_none');
            document.querySelector('#video_chon').src = tmppath;
            $('.after-upload-video').show();
            $(".avt_xoavideo").attr("data", "");
            $(".avt_xoavideo").show();
            $('.dang-tin-uv-trai-upload').hide();
        } else {
            alert("Dung lượng ảnh tối đa 2MB");
            $(this).val('');
        }
    });
    $(".logo-upload-after").click(function() {
        $("#upload_logo").click();
        return false;
    });
    $(".close_logo").click(function() {
        $(this).parents(".avt_xoavideo").attr("data", "");
        $(this).parents(".avt_xoavideo").children(".up_logo_cty").attr("src", "");
        $(this).parents(".avt_xoavideo").hide();
        $("#upload_logo").val('');
    });
    $.validator.addMethod("requiredSalary", function(value, element) {
        switch ($('.luong-2.active').data('id')) {
            case 1:
                return true;
                break;
            case 2:
                return ($("#nhap-luong-2 input[name='td_gia_spham']").val() != '');
                break;
            case 3:
                return ($("#nhap-luong-3 input[name='td_gia_spham']").val() != '');
                break;
            case 4:
                return (($("input[name='salary_fr']").val() != '') && ($("input[name='salary_to']").val() != ''));
                break;
            default:
                return true;
                break;
        }
    }, "Vui lòng nhập lương");
    $.validator.addMethod("validSalary", function(value, element) {
        if ($('.luong-2.active').data('id') == 4) {
            var fr = Number($("input[name='salary_fr']").val().replace(/,/g, ""));
            var to = Number($("input[name='salary_to']").val().replace(/,/g, ""));
            return (fr < to);
        } else return true;
    }, "Số trước phải nhỏ hơn số sau");
    $.validator.addMethod("checkTitle", function(value, element) {
        var flag = false;
        $.ajax({
            url: '/ajax/compare_title.php',
            type: "POST",
            dataType: "json",
            async: false,
            data: {
                title: value,
                id_vl: <?= $row_tt['new_id'] ?>,
                id_dm: 121,
            },
            success: function(t) {
                flag = t.result;
            }
        });
        return flag;
    });

    $(".dang-tin").click(function() {
        var form_tim_viec = $("#form_tim_viec");
        form_tim_viec.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".dang-tin-1"));
                error.wrap("<span class='error'>");
                element.parents('.dang-tin-1').addClass('validate_input');
            },
            rules: {
                title: {
                    required: true,
                    minlength: 10,
                    maxlength: 70,
                    checkTitle: true,
                },
                td_diachi_lamviec: {
                    required: true,
                },
                age: {
                    number: true,
                    min: 1,
                },
                nganhnghe: {
                    required: true,
                },
                work_type: {
                    required: true,
                },
                td_gia_spham: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_fr: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_type: {
                    required: true,
                },
                mota: {
                    required: true,
                    minlength: 40,
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
                title: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 10 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    checkTitle: "Tiêu đề tuyển dụng đã tồn tại",
                },
                td_diachi_lamviec: {
                    required: "Vui lòng nhập địa chỉ làm việc",
                },
                age: {
                    number: "Vui lòng nhập vào 1 số",
                    min: "Tuổi phải lớn hơn 0",
                },
                nganhnghe: {
                    required: "Vui lòng chọn ngành nghề",
                },
                work_type: {
                    required: "Vui lòng chọn hình thức làm việc",
                },
                salary_type: {
                    required: "Vui lòng chọn hình thức trả lương",
                },
                mota: {
                    required: "Vui lòng nhập giới thiệu",
                    minlength: "Giới thiệu ít nhất 40 ký tự",
                    maxlength: "Giới thiệu nhiều nhất 10000 ký tự",
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
        if (form_tim_viec.valid() === true) {
            var fd = new FormData();
            fd.append('new_id', <?= $row_tt['new_id'] ?>);
            fd.append('title', $("[name=title]").val());
            // địa chỉ làm việc
            fd.append('td_diachi_lamviec', $("[name=td_diachi_lamviec]").val());
            fd.append('tinhthanh_lv', n_tt_lv);
            fd.append('quanhuyen_lv', n_qh_lv);
            fd.append('phuongxa_lv', n_px_lv);
            fd.append('sonha_lv', n_sn_lv);

            fd.append('gioitinh', $(".gioi_tinh.active").data("id"));
            fd.append('tuoi', $("[name=age]").val());
            fd.append('nganhnghe', $("[name=nganhnghe]").val());
            fd.append('work_type', $("[name=work_type]").val());
            // mức lương
            switch ($('.luong-2.active').data('id')) {
                case 1:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
                case 2:
                    fd.append('salary_fr', $("#nhap-luong-2").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', $("#nhap-luong-2").find("[name=dvi_tien]").val());
                    break;
                case 3:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', $("#nhap-luong-3").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-3").find("[name=dvi_tien]").val());
                    break;
                case 4:
                    fd.append('salary_fr', $("[name=salary_fr]").val().replace(/,/g, ""));
                    fd.append('salary_to', $("[name=salary_to]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-4").find("[name=dvi_tien]").val());
                    break;
                default:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
            }
            fd.append('salary_type', $("[name=salary_type]").val());

            fd.append('bangcap', $("[name=bangcap]").val());
            fd.append('kinhnghiem', $("[name=kinhnghiem]").val());
            fd.append('chungchi', $("[name=chungchi]").val());
            fd.append('mota', $("[name=mota]").val());
            // ảnh - ảnh cũ
            var logo_cu = $(".avt_xoavideo").attr("data");
            fd.append('logo_cu', logo_cu);
            // ảnh - ảnh mới
            var logo = $("#upload_logo")[0].files;
            fd.append('logo', logo[0]);
            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            $.ajax({
                url: '/ajax/dangtin_tim_vieclam.php',
                type: 'POST',
                data: fd,
                dataType: "json",
                contentType: false,
                processData: false,
                success: function(data) {
                    alert(data.msg);
                    if (data.result == true) {
                        if (user_type == 5) {
                            window.location = "/ho-so-quan-ly-tin-tim-viec-lam.html";
                        } else {
                            window.location = "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-tim-viec-lam.html";
                        }
                    }
                }
            });

        } else {

        }
    });

    $(".xem-truoc").click(function() {
        var form_tim_viec = $("#form_tim_viec");
        form_tim_viec.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".dang-tin-1"));
                error.wrap("<span class='error'>");
                element.parents('.dang-tin-1').addClass('validate_input');
            },
            rules: {
                title: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                    checkTitle: true,
                },
                td_diachi_lamviec: {
                    required: true,
                },
                age: {
                    number: true,
                    min: 1,
                },
                nganhnghe: {
                    required: true,
                },
                work_type: {
                    required: true,
                },
                td_gia_spham: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_fr: {
                    requiredSalary: true,
                    validSalary: true,
                },
                salary_type: {
                    required: true,
                },
                mota: {
                    required: true,
                    minlength: 40,
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
                title: {
                    required: "Vui lòng nhập tiêu đề",
                    minlength: "Tiêu đề ít nhất 10 ký tự",
                    maxlength: "Tiêu đề nhiều nhất 70 ký tự",
                    checkTitle: "Tiêu đề tuyển dụng đã tồn tại",
                },
                td_diachi_lamviec: {
                    required: "Vui lòng nhập địa chỉ làm việc",
                },
                age: {
                    number: "Vui lòng nhập vào 1 số",
                    min: "Tuổi phải lớn hơn 0",
                },
                nganhnghe: {
                    required: "Vui lòng chọn ngành nghề",
                },
                work_type: {
                    required: "Vui lòng chọn hình thức làm việc",
                },
                salary_type: {
                    required: "Vui lòng chọn hình thức trả lương",
                },
                mota: {
                    required: "Vui lòng nhập giới thiệu",
                    minlength: "Giới thiệu ít nhất 40 ký tự",
                    maxlength: "Giới thiệu nhiều nhất 10000 ký tự",
                },
                captcha_confirm: {
                    required: "Vui lòng nhập mã xác nhận",
                    equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
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
        });
        if (form_tim_viec.valid() === false) {
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
        if (form_tim_viec.valid() === true) {
            var fd = new FormData();
            fd.append('title', $("[name=title]").val());
            fd.append('id_dm', $(".dmuc-spham").attr("data"));
            // địa chỉ làm việc
            fd.append('td_diachi_lamviec', $("[name=td_diachi_lamviec]").val());

            fd.append('gioitinh', $(".gioi_tinh.active").data("id"));
            fd.append('tuoi', $("[name=age]").val());
            fd.append('nganhnghe', $("[name=nganhnghe]").val());
            fd.append('work_type', $("[name=work_type]").val());
            // mức lương
            switch ($('.luong-2.active').data('id')) {
                case 1:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
                case 2:
                    fd.append('salary_fr', $("#nhap-luong-2").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', $("#nhap-luong-2").find("[name=dvi_tien]").val());
                    break;
                case 3:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', $("#nhap-luong-3").find("[name=td_gia_spham]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-3").find("[name=dvi_tien]").val());
                    break;
                case 4:
                    fd.append('salary_fr', $("[name=salary_fr]").val().replace(/,/g, ""));
                    fd.append('salary_to', $("[name=salary_to]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-4").find("[name=dvi_tien]").val());
                    break;
                default:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
            }
            fd.append('salary_type', $("[name=salary_type]").val());

            fd.append('bangcap', $("[name=bangcap]").val());
            fd.append('kinhnghiem', $("[name=kinhnghiem]").val());
            fd.append('chungchi', $("[name=chungchi]").val());
            fd.append('mota', $("[name=mota]").val());
            // ảnh
            var logo_cu = $(".avt_xoavideo").attr("data");
            if (logo_cu != "") {
                fd.append('logo_cu', logo_cu);
            } else {
                var logo = $("#upload_logo")[0].files;
                if (logo.length != 0) {
                    fd.append('arr_src', URL.createObjectURL(logo[0]));
                }
            }
            // fd.append('arr_src', arr_src);

            $.ajax({
                url: '/render/xem_truoc_tdvl.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(".v_container").html(data);
                    $(".v_container").removeClass("d_none");
                    $(".dang-tin-uv").addClass("d_none");
                }
            });
        } else {

        }
    });

    $('.slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        Accessibility: true,
        adaptiveHeight: false,
        asNavFor: '.slider-nav',
        arrows: true,
        autoplay: true,
        respondTo: '.slider',
        nextArrow: '<div class="slide_control next_slide"><i class="ic-next"></i></div>',
        prevArrow: '<div class="slide_control prev_slide"><i class="ic-prev"></i></div>'
    });
    $('.slider-nav').slick({
        asNavFor: '.slider',
        slidesToShow: 3,
        slidesToScroll: 1,
        focusOnSelect: true,
        slide: '.anh_ben',
        vertical: true,
        verticalSwiping: true,
        centerMode: true,
    });
</script>