<?

include("config.php");

$id_dm = getValue('id_dm', 'int', 'GET', 0);

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_dm != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $list_ten = new db_query("SELECT `cat_parent_id`, `cat_name`  FROM `category` WHERE `cat_id` = $id_dm ");
    $row_dmuc = mysql_fetch_assoc($list_ten->result);
    $cat_parent_id = $row_dmuc['cat_parent_id'];
    $cat_name = $row_dmuc['cat_name'];
    if ($cat_parent_id != 0) {
        $ten_dmcha = mysql_fetch_assoc((new db_query("SELECT `cat_name`  FROM `category` WHERE `cat_id` = $cat_parent_id "))->result)['cat_name'];
    } else {
        $ten_dmcha = '';
    };

    $hom_nay = date('Y-m-d', time());
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

    <title>Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN</title>
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
    <link rel="stylesheet" href="/css/style_new/app.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien2.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien3.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="dangtin_muaspham tdangmua_spham">
        <div class="tindang-container">
            <div class="dang-tin-uv-title">
                <p class="dt-tieu-de class_gray47">Đăng tin</p>
            </div>
            <div class="tindang-content-cont hd-disflex">
                <div class="tindang-col-left">
                    <? include("../includes/inc_new/up-media-dang-tin.php"); ?>
                </div>
                <form class="tindang-col-right dangtin_mua" data="<?= $us_type ?>" data1="<?= $hom_nay ?>">
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin pad">Danh mục sản phẩm <span class="color_red">*</span></p>
                        <input class="input-1 dmuc-spham" type="text" data="<?= $id_dm ?>" value="<?= $ten_dmcha ?> <?= ($ten_dmcha != "") ? ">>" : "" ?> <?= $cat_name ?>" readonly>
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin mb_5">Tiêu đề sản phẩm cần mua <span class="color_red">*</span></p>
                        <input class="input-1" type="text" name="tieu_de" placeholder="Tên gói thầu">
                    </div>
                    <div class="khoi-1">
                        <p class="mt20 tiude color_orange">Thông tin người cần mua</p>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin mb_5">Họ và tên <span class="color_red">*</span></p>
                            <input class="input-1" type="text" name="ho_ten" placeholder="Nhập họ và tên">
                        </div>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin mb_5">Địa chỉ cần mua hàng <span class="color_red">*</span></p>
                            <input class="input-1 td_ttin_diachi" type="text" name="dia_chi" placeholder="Địa chỉ của bên mời thầu" readonly>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <p class="mt20 tiude color_orange">Thông tin đấu thầu</p>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin">Mô tả sản phẩm cần mua <span class="color_red">*</span></p>
                            <textarea name="mota" class="texa-mo-ta font-14-16 input_infor_tag" placeholder="Nhập mô tả"></textarea>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div class="upfl_anh">
                            <div class="upload_box mt5 tai-file sh_border sh_clr_five">
                                <label class="upload_btn">
                                    <p>Tải tệp lên</p>
                                    <input type="file" class="upload_inputfile avtfile_spham" onchange="ImgUpload(this)">
                                </label>
                                <div class="upload-cloud">
                                    <img src="../images/dang-tin-mua/upload-cloud.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="upload_img-wrap"></div>
                    </div>
                    <? if (in_array($id_dm, $bo_dtinmua_ttrang) == false) { ?>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin mb_5">Tình trạng <span class="color_red">*</span></p>
                            <select class="custom-select slect-hang" name="tinh_trang">
                                <option value="">Tình trạng</option>
                                <option value="1">Cũ</option>
                                <option value="2">Mới(chưa qua sử dụng)</option>
                            </select>
                        </div>
                    <? } ?>
                    <div class="dang-tin-1">
                        <p class="thong-tin mb_5">Thủ tục nộp hồ sơ mời thầu <span class="color_red">*</span></p>
                        <div class="nop-ho-so" id="gioi_tinh_1">
                            <div class="chon-on-off">
                                <label data-id="1" class="gt-2 status-1 active">
                                    Online
                                    <input type="radio" name="offon_mth" class="offon_mth" value="1" checked>
                                </label>
                                <label data-id="2" class="gt-2 status-1">
                                    Offline
                                    <input type="radio" name="offon_mth" value="2" class="offon_mth">
                                </label>
                            </div>
                            <div class="nd_on-off">
                                <div class="on-off-1 tbao_loivali" id="show-1">
                                    <textarea class="texa-mo-ta font-14-16 input_infor_tag" type="text" name="noidung_thau" rows="5" placeholder="Nhập nội dung"></textarea>
                                </div>
                                <div class="on-off-1 tbao_loivali d_none" id="show-2">
                                    <input class="input-1 diadiem_nhanhs" type="text" name="td_diachi_lamviec" placeholder="Địa điểm nộp hồ sơ" readonly autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div for="upload-2a" class="upfl_anh">
                            <div class="upload_box mt5 tai-file sh_border sh_clr_five">
                                <label class="upload_btn">
                                    <p>Tải tệp lên</p>
                                    <input type="file" class="upload_inputfile avtfile_thutuc" onchange="ImgUpload(this)">
                                </label>
                                <div class="upload-cloud">
                                    <img src="../images/dang-tin-mua/upload-cloud.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="upload_img-wrap"></div>
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin mb_5">Thời gian bắt đầu nhận hồ sơ mời thầu <span class="color_red">*</span></p>
                        <input class="input-1 tgianbdau" type="date" name="tgian_bdau" id="tgian_bdau">
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin mb_5">Thời gian kết thúc nhận hồ sơ mời thầu <span class="color_red">*</span></p>
                        <input class="input-1" type="date" name="tgian_kthuc" id="tgian_kthuc">
                    </div>
                    <div class="dang-tin-1">
                        <p class="thong-tin mb_5">Thời hạn thông báo kết quả trúng thầu <span class="color_red">*</span></p>
                        <div class="ma-xac-nhan">
                            <div class="tbao_loivali w_45">
                                <input class="ma-xn w_100 input-1 tgianbdau" type="date" name="tgian_tbao_thau" id="tgian_tbao_thau">
                            </div>
                            <p class="den">Đến</p>
                            <div class="tbao_loivali w_45">
                                <input class="ma-xn w_100 input-1" type="date" name="tgian_kttbao_thau" id="tgian_kttbao_thau">
                            </div>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div class="dang-tin-1">
                            <p class="thong-tin mb_5">Chỉ dẫn tìm hiểu hồ sơ mời thầu</p>
                            <textarea name="mota_thau" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nhập mô tả"></textarea>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div for="upload-2a" class="upfl_anh">
                            <div class="upload_box mt5 tai-file sh_border sh_clr_five">
                                <label class="upload_btn">
                                    <p>Tải tệp lên</p>
                                    <input type="file" class="upload_inputfile avtfile_hoso" onchange="ImgUpload(this)">
                                </label>
                                <div class="upload-cloud">
                                    <img src="../images/dang-tin-mua/upload-cloud.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="upload_img-wrap"></div>
                    </div>
                    <div class="dang-tin-1">
                        <p class="thong-tin mb_5">Giá sàn dự kiến <span class="color_red">*</span></p>
                        <div class="luong-mong-muon" id="lmm-1">
                            <div class="muc-luong">
                                <div data-id="1" class="luong-2 active">Từ mức</div>
                                <div data-id="2" class="luong-2">Đến mức</div>
                                <div data-id="3" class="luong-2">Từ mức - đến mức</div>
                            </div>
                            <div class="khoi-muc-luong">
                                <div id="nhap-luong-1" class="nhap-luong-muon tbao_loivali">
                                    <div class="dis_flex">
                                        <div class="nhap-so">
                                            <input class="input-2" type="text" onkeyup="format_gtri(this)" name="gia_bdau" placeholder="Nhập giá sàn dự kiến từ mức...">
                                        </div>
                                        <div class="don-vi-2">
                                            <select class="don-vi-tien-2" name="dvi_tien">
                                                <option value="1">VNĐ</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="nhap-luong-2" class="d_none nhap-luong-muon tbao_loivali">
                                    <div class="dis_flex">
                                        <div class="nhap-so">
                                            <input class="input-2" type="text" name="gia_kthuc" onkeyup="format_gtri(this)" placeholder="Nhập giá sàn dự kiến đến mức...">
                                        </div>
                                        <div class="don-vi-2">
                                            <select class="don-vi-tien-2" name="dvi_tien">
                                                <option value="1">VNĐ</option>
                                                <option value="2">USD</option>
                                                <option value="3">EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="nhap-luong-3" class="d_none nhap-luong-muon">
                                    <div class="dis_flex">
                                        <div class="nhap-so tbao_loivali">
                                            <input class="input-2-b" type="text" name="gia_bdau_mua" placeholder="Từ mức" onkeyup="format_gtri(this)">
                                        </div>
                                        <div class="nhap-so tbao_loivali">
                                            <input class="input-2-b" type="text" name="gia_kthuc_mua" placeholder="Đến mức" onkeyup="format_gtri(this)">
                                        </div>
                                        <div class="don-vi-2">
                                            <select class="don-vi-tien-2" name="dvi_tien">
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
                        <p class="thong-tin mb_5">Phí dự thầu</p>
                        <div class="dis_flex">
                            <div class="nhap-so">
                                <input class="input-1" type="text" name="phidu_thau" placeholder="Nhập phí dự thầu..." oninput="<?= $oninput ?>">
                            </div>
                            <div class="don-vi-2">
                                <select class="don-vi-tien-2" name="dvi_tien_dt">
                                    <option value="1">VNĐ</option>
                                    <option value="2">USD</option>
                                    <option value="3">EURO</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin mb_5">Số điện thoại liên hệ <span class="color_red">*</span></p>
                        <input class="input-1" type="text" name="sdt_lienhe" value="<?= $usc_phone ?>" placeholder="Nhập số điện thoại liên hệ" autocomplete="off">
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin mb_5">Email liên hệ <span class="color_red">*</span></p>
                        <input class="input-1" type="text" name="email_lienhe" value="<?= $usc_email ?>" placeholder="Nhập email liên hệ" autocomplete="off">
                    </div>
                    <div class="left-btn">
                        <button type="button" class="xem-truoc">Xem trước</button>
                        <button type="button" id="xoa_dangtin_mua" class="dang-tin">Đăng tin</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="v_container d_none"></div>
        <? include '../modals/md_dia_chi.php' ?>
        <? include '../modals/md_khu_vuc.php' ?>

        <div id="modal_xacnhan" class="modal">
            <div class="md-body">
                <div class="md-body-header">
                    <p class="color_white">Xác nhận</p>
                    <span class="close color_white">&times;</span>
                </div>
                <div class="md-body-content">
                    <p>Những tin đăng không có hình ảnh thường sẽ không được mọi người chú ý đến. Bạn vẫn muốn bỏ qua bước đăng ảnh này?</p>
                </div>
                <div class="md-body-footer">
                    <button type="button" class="md-btn-huy"><span class="color_red">Bỏ qua</span></button>
                    <button type="button" class="md-btn-dongy"><span class="color_white">Đăng ảnh</span></button>
                </div>
            </div>
        </div>

        <? include('../modals/md_tdang_mua.php') ?>
    </section>
    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    $(".diadiem_nhanhs").click(function() {
        $(".hd_modal_Khu_vuc").show();
    })

    $('.status-1').click(function() {
        $('.status-1').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('id');
        $('.on-off-1').addClass('d_none')
        $('#show-' + type).removeClass('d_none')
    });

    $('.luong-2').click(function() {
        $('.luong-2').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('id');
        $('.nhap-luong-muon').addClass('d_none')
        $('#nhap-luong-' + type).removeClass('d_none')
    });

    function slick_click() {
        $('.slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            Accessibility: true,
            adaptiveHeight: false,
            nextArrow: '<div class="slide_control next_slide"><i class="ic-next"></i></div>',
            prevArrow: '<div class="slide_control prev_slide"><i class="ic-prev"></i></div>'
        });
    }

    function chinhsua() {
        $(".v_container").addClass("d_none");
        $(".tindang-container").removeClass("d_none");
        $(".dangtin_muaspham").removeClass("edit_infor");
        $(".v_container").html('');
    };

    function tieptuc() {
        $(".dang-tin").click();
    }

    function ImgUpload(el) {
        var file_data = $(el).prop('files')[0];
        var rong = '';
        var file_type = file_data.type;
        var size = file_data.size;
        var filename = file_data.name;
        var file_size = (size / (1024 * 1024)).toFixed(2);
        var bo_ddang = ['image/gif', 'video/mp4'];
        var match = ['image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG', 'image/svg+xml'];
        if ($.inArray(file_type, bo_ddang) != -1) {
            alert("Vui lòng chọn file có định đạng khác: GIF, MP4");
            $(el).val(rong);
            $(el).parents(".khoi-1").find('.upfl_anh').show();
            $(el).parents(".khoi-1").find('.upload_img-wrap').html('');
            $(el).parents(".khoi-1").find('.upload_img-wrap').hide();
        } else {
            if (file_size <= 6) {
                if ($.inArray(file_type, match) != -1) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var srcData = e.target.result;
                        var html = `<div class='anhchon_tep chontep'>
                                        <div class="avtanh_chon">
                                            <div class="anhtepchon">
                                                <img src=` + srcData + ` class="avt_anhtep">
                                                <span class="bo_anhchon" onclick="xoa_botep(this)"></span>
                                            </div>
                                            <p class="tenanh_chon w_break">` + filename + `</p>
                                        </div>
                                        <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                    </div>`;
                        $(el).parents(".khoi-1").find('.upload_img-wrap').html(html);
                        $(el).parents(".khoi-1").find('.upload_img-wrap').show();
                        $(el).parents(".khoi-1").find('.upfl_anh').hide();
                    }
                    reader.readAsDataURL(file_data);
                } else {
                    var html = `<div class="tepchon_tep chontep">
                                    <p class="ten_tepchon"><span class="xoa_botep" onclick="xoa_botep(this)"></span>` + filename + `</p>
                                    <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                </div>`;
                    $(el).parents(".khoi-1").find('.upload_img-wrap').html(html);
                    $(el).parents(".khoi-1").find('.upload_img-wrap').show();
                    $(el).parents(".khoi-1").find('.upfl_anh').hide();
                }
            } else {
                alert("Dung lượng ảnh tối đa 6MB");
                $(el).val(rong);
                $(el).parents(".khoi-1").find('.upfl_anh').show();
                $(el).parents(".khoi-1").find('.upload_img-wrap').html('');
                $(el).parents(".khoi-1").find('.upload_img-wrap').hide();
            }
        }
    }

    function xoa_botep(el) {
        $(el).parents(".khoi-1").find('.upload_inputfile').val('');
        $(el).parents(".khoi-1").find('.upfl_anh').show();
        $(el).parents(".khoi-1").find('.upload_img-wrap').html('');
    }


    $.validator.addMethod("priceRange", function(value, element) {
        if ($('.luong-2.active').data('id') == 3) {
            var fr = Number($("input[name='gia_bdau_mua']").val().replace(/,/g, ""));
            var to = Number($("input[name='gia_kthuc_mua']").val().replace(/,/g, ""));
            return (fr < to);
        } else return true;
    }, "Số trước phải nhỏ hơn số sau");

    // so sanh voi ngay hom nay
    $.validator.addMethod("dateRange1",
        function() {
            var date1 = new Date($(".tgianbdau").val()).getTime();
            var date2 = new Date($(".dangtin_mua").attr("data1")).getTime();
            return (date1 >= date2);
        });

    $.validator.addMethod("dateRange2",
        function() {
            var date1 = new Date($("#tgian_bdau").val()).getTime();
            var date2 = new Date($("#tgian_kthuc").val()).getTime();
            return (date1 <= date2);
        });

    $.validator.addMethod("dateRange3",
        function() {
            var date1 = new Date($("#tgian_tbao_thau").val()).getTime();
            var date2 = new Date($("#tgian_kttbao_thau").val()).getTime();
            return (date1 <= date2);
        });

    $(".dang-tin").click(function() {
        var form_mua = $(".dangtin_mua");
        form_mua.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".tbao_loivali"));
                error.wrap("<span class='error'>");
            },
            rules: {
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                ho_ten: {
                    required: true,
                },
                dia_chi: {
                    required: true,
                },
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                tinh_trang: {
                    required: true,
                },
                noidung_thau: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                td_diachi_lamviec: {
                    required: true,
                },
                tgian_bdau: {
                    required: true,
                    dateRange1: '#tgian_bdau',
                },
                tgian_kthuc: {
                    required: true,
                    dateRange2: '#tgian_kthuc',
                },
                tgian_tbao_thau: {
                    required: true,
                    dateRange1: '#tgian_tbao_thau',
                },
                tgian_kttbao_thau: {
                    required: true,
                    dateRange3: '#tgian_kttbao_thau',
                },
                gia_bdau: {
                    required: true,
                },
                gia_kthuc: {
                    required: true,
                },
                gia_bdau_mua: {
                    required: true,
                },
                gia_kthuc_mua: {
                    required: true,
                    priceRange: true,
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
                    required: "Nhập tiêu đề",
                    minlength: "Nhập ít nhất 40 ký tự",
                    maxlength: "Nhập nhiều nhất 70 ký tự"
                },
                ho_ten: {
                    required: "Nhập họ và tên",
                },
                dia_chi: {
                    required: "Nhập địa chỉ",
                },
                mota: {
                    required: "Nhập mô tả sản phẩm",
                    minlength: "Nhập ít nhất 10 ký tự",
                    maxlength: "Nhập nhiều nhất 10000 ký tự"
                },
                tinh_trang: {
                    required: "Chọn tình trạng sản phẩm",
                },
                noidung_thau: {
                    required: "Nhập nội dung thủ tục nộp hồ sơ",
                    minlength: "Nhập ít nhất 10 ký tự",
                    maxlength: "Nhập nhiều nhất 10000 ký tự"
                },
                td_diachi_lamviec: {
                    required: "Nhập địa điểm nộp hồ sơ",
                },
                tgian_bdau: {
                    required: "Chọn thời gian bắt đầu nhận thầu",
                    dateRange1: "Thời gian phải sau hoặc bằng ngày hôm nay"
                },
                tgian_kthuc: {
                    required: "Chọn thời gian kết thúc nhận thầu",
                    dateRange2: 'Phải sau thời gian bắt đầu',
                },
                tgian_tbao_thau: {
                    required: 'Chọn thời hạn bắt đầu thông báo ',
                    dateRange1: "Thời gian phải sau hoặc bằng ngày hôm nay"
                },
                tgian_kttbao_thau: {
                    required: 'Chọn thời hạn kết thúc thông báo',
                    dateRange3: 'Phải sau thời gian bắt đầu',
                },
                gia_bdau: {
                    required: "Nhập giá dự kiến",
                },
                gia_kthuc: {
                    required: "Nhập giá dự kiến",
                },
                gia_bdau_mua: {
                    required: "Nhập giá dự kiến",
                },
                gia_kthuc_mua: {
                    required: "Nhập giá dự kiến",
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
            }
        });
        if (form_mua.valid() === false) {
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
        if (form_mua.valid() === true) {
            $("#xoa_dangtin_mua").removeClass("dang-tin");
            var id_dm = $(".dmuc-spham").attr("data");
            var usc_type = $(".dangtin_mua").attr("data");
            var tieu_de = $("input[name='tieu_de']").val();
            var hoten = $("input[name='ho_ten']").val();

            var mota = $("textarea[name='mota']").val();
            var tinh_trang = $("select[name='tinh_trang']").val();
            var hinhthuc_nop = $("input[name='offon_mth']:checked").val();
            if (hinhthuc_nop == 1) {
                var noidung_thau = $("textarea[name='noidung_thau']").val();
                var diadiem_nop = '';
                var tthanh_nop = '';
                var qhuyen_nop = '';
                var pxa_nop = '';
                var sonha_nop = '';
            } else if (hinhthuc_nop == 2) {
                var noidung_thau = '';
                var diadiem_nop = $("input[name='td_diachi_lamviec']").val();
                var tthanh_nop = $(".kv_thanhpho").val();
                var qhuyen_nop = $(".kv_quanhuyen").val();
                var pxa_nop = $(".kv_phuongxa").val();
                var sonha_nop = $(".kv_so_nha").val();
            };

            var tgian_bdau = $("input[name='tgian_bdau']").val();
            var tgian_kthuc = $("input[name='tgian_kthuc']").val();
            var tbao_bd_thau = $("input[name='tgian_tbao_thau']").val();
            var tbao_kt_thau = $("input[name='tgian_kttbao_thau']").val();
            var chidan_timhieu = $("textarea[name='mota_thau']").val();
            var phidu_thau = $("input[name='phidu_thau']").val();
            var dvi_thau = $("select[name='dvi_tien_dt']").val();
            // lấy ảnh cữ
            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });
            // end

            var fd = new FormData();

            fd.append('id_dm', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('ho_ten', hoten);
            // dia chi can mua hàng
            fd.append('dia_chi', $("[name=dia_chi]").val());
            fd.append('tinh_thanh', $("[name=dia_chi]").data('tt'));
            fd.append('quan_huyen', $("[name=dia_chi]").data('qh'));
            fd.append('phuong_xa', $("[name=dia_chi]").data('px'));
            fd.append('so_nha', $("[name=dia_chi]").data('sn'));
            // địa chi nop ho so
            fd.append('diadiem_nop', diadiem_nop);
            fd.append('tthanh_nop', tthanh_nop);
            fd.append('qhuyen_nop', qhuyen_nop);
            fd.append('pxa_nop', pxa_nop);
            fd.append('sonha_nop', sonha_nop);
            // lấy ảnh cũ
            fd.append('anh_dd', anh_dd);
            // end
            fd.append('mota', mota);
            // gia san du kien
            switch ($('.luong-2.active').data('id')) {
                case 1:
                    fd.append('salary_fr', $("#nhap-luong-1").find("[name=gia_bdau]").val().replace(/,/g, ""));
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', $("#nhap-luong-1").find("[name=dvi_tien]").val());
                    break;
                case 2:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', $("#nhap-luong-2").find("[name=gia_kthuc]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-2").find("[name=dvi_tien]").val());
                    break;
                case 3:
                    fd.append('salary_fr', $("[name=gia_bdau_mua]").val().replace(/,/g, ""));
                    fd.append('salary_to', $("[name=gia_kthuc_mua]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-3").find("[name=dvi_tien]").val());
                    break;
                default:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
            };
            fd.append('tinh_trang', tinh_trang);
            fd.append('hinhthuc_nop', hinhthuc_nop);
            fd.append('noidung_thau', noidung_thau);
            fd.append('tgian_bdau', tgian_bdau);
            fd.append('tgian_kthuc', tgian_kthuc);
            fd.append('tbao_bd_thau', tbao_bd_thau);
            fd.append('tbao_kt_thau', tbao_kt_thau);
            fd.append('chidan_timhieu', chidan_timhieu);
            fd.append('phidu_thau', phidu_thau);
            fd.append('dvi_thau', dvi_thau);

            for (var i = 0; i < arr_anh.length; i++) {
                if (arr_anh[i] != 'undefined') {
                    fd.append('files[]', arr_anh[i]);
                }
            }

            fd.append('file_mota', $(".avtfile_spham").prop('files')[0]);
            fd.append('file_thutuc', $(".avtfile_thutuc").prop('files')[0]);
            fd.append('file_hoso', $(".avtfile_hoso").prop('files')[0]);

            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            $.ajax({
                url: '/ajax/dangtin_mua.php',
                type: 'POST',
                data: fd,
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $('.dang-tin').prop('disabled', true);
                },
                success: function(data) {
                    if (data.result == false) {
                        alert(data.error);
                        $("#xoa_dangtin_mua").addClass("dang-tin");
                        $(".dang-tin").prop('disabled', false);
                        $(".v_container").addClass("d_none");
                        $(".tindang-container").removeClass("d_none");
                        $(".dangtin_muaspham").removeClass("edit_infor");
                        $(".v_container").html('');
                    } else {
                        if (usc_type == 1) {
                            window.location.href = '/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua.html';
                        } else {
                            window.location.href = '/ho-so-quan-ly-tin-mua.html';
                        }
                    }
                }
            })
        }
    });

    function tieptuc() {
        $(".dang-tin").click();
    };

    $(".xem-truoc").click(function() {
        var form_mua = $(".dangtin_mua");
        form_mua.validate({
            errorPlacement: function(error, element) {
                error.appendTo(element.parents(".tbao_loivali"));
                error.wrap("<span class='error'>");
            },
            rules: {
                tieu_de: {
                    required: true,
                    minlength: 40,
                    maxlength: 70,
                },
                ho_ten: {
                    required: true,
                },
                dia_chi: {
                    required: true,
                },
                mota: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                tinh_trang: {
                    required: true,
                },
                noidung_thau: {
                    required: true,
                    minlength: 10,
                    maxlength: 10000,
                },
                td_diachi_lamviec: {
                    required: true,
                },
                tgian_bdau: {
                    required: true,
                    dateRange1: '#tgian_bdau',
                },
                tgian_kthuc: {
                    required: true,
                    dateRange2: '#tgian_kthuc',
                },
                tgian_tbao_thau: {
                    required: true,
                    dateRange1: '#tgian_tbao_thau',
                },
                tgian_kttbao_thau: {
                    required: true,
                    dateRange3: '#tgian_kttbao_thau',
                },
                gia_bdau: {
                    required: true,
                },
                gia_kthuc: {
                    required: true,
                },
                gia_bdau_mua: {
                    required: true,
                },
                gia_kthuc_mua: {
                    required: true,
                    priceRange: true,
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
                    required: "Nhập tiêu đề",
                    minlength: "Nhập ít nhất 40 ký tự",
                    maxlength: "Nhập nhiều nhất 70 ký tự"
                },
                ho_ten: {
                    required: "Nhập họ và tên",
                },
                dia_chi: {
                    required: "Nhập địa chỉ",
                },
                mota: {
                    required: "Nhập mô tả sản phẩm",
                    minlength: "Nhập ít nhất 10 ký tự",
                    maxlength: "Nhập nhiều nhất 10000 ký tự"
                },
                tinh_trang: {
                    required: "Chọn tình trạng sản phẩm",
                },
                noidung_thau: {
                    required: "Nhập nội dung thủ tục nộp hồ sơ",
                    minlength: "Nhập ít nhất 10 ký tự",
                    maxlength: "Nhập nhiều nhất 10000 ký tự"
                },
                td_diachi_lamviec: {
                    required: "Nhập địa điểm nộp hồ sơ",
                },
                tgian_bdau: {
                    required: "Chọn thời gian bắt đầu nhận thầu",
                    dateRange1: "Thời gian phải sau hoặc bằng ngày hôm nay"
                },
                tgian_kthuc: {
                    required: "Chọn thời gian kết thúc nhận thầu",
                    dateRange2: 'Phải sau thời gian bắt đầu',
                },
                tgian_tbao_thau: {
                    required: 'Chọn thời hạn bắt đầu thông báo ',
                    dateRange1: "Thời gian phải sau hoặc bằng ngày hôm nay"
                },
                tgian_kttbao_thau: {
                    required: 'Chọn thời hạn kết thúc thông báo',
                    dateRange3: 'Phải sau thời gian bắt đầu',
                },
                gia_bdau: {
                    required: "Nhập giá dự kiến",
                },
                gia_kthuc: {
                    required: "Nhập giá dự kiến",
                },
                gia_bdau_mua: {
                    required: "Nhập giá dự kiến",
                },
                gia_kthuc_mua: {
                    required: "Nhập giá dự kiến",
                },
                sdt_lienhe: {
                    required: "Nhập số điện thoại liên hệ",
                },
                email_lienhe: {
                    required: "Nhập email liên hệ",
                },
            }
        });
        if (form_mua.valid() === false) {
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
        if (form_mua.valid() === true) {
            var id_dm = $(".dmuc-spham").attr("data");
            var usc_type = $(".dangtin_mua").attr("data");
            var tieu_de = $("input[name='tieu_de']").val();
            var hoten = $("input[name='ho_ten']").val();

            var mota = $("textarea[name='mota']").val();
            var tinh_trang = $("select[name='tinh_trang']").val();
            var hinhthuc_nop = $("input[name='offon_mth']:checked").val();
            if (hinhthuc_nop == 1) {
                var noidung_thau = $("textarea[name='noidung_thau']").val();
                var diadiem_nop = '';
                var tthanh_nop = '';
                var qhuyen_nop = '';
                var pxa_nop = '';
                var sonha_nop = '';
            } else if (hinhthuc_nop == 2) {
                var noidung_thau = '';
                var diadiem_nop = $("input[name='td_diachi_lamviec']").val();
                var tthanh_nop = $("[name=td_diachi_lamviec]").data('tt');
                var qhuyen_nop = $("[name=td_diachi_lamviec]").data('qh');
                var pxa_nop = $("[name=td_diachi_lamviec]").data('px');
                var sonha_nop = $("[name=td_diachi_lamviec]").data('sn');
            };

            var tgian_bdau = $("input[name='tgian_bdau']").val();
            var tgian_kthuc = $("input[name='tgian_kthuc']").val();
            var tbao_bd_thau = $("input[name='tgian_tbao_thau']").val();
            var tbao_kt_thau = $("input[name='tgian_kttbao_thau']").val();
            var chidan_timhieu = $("textarea[name='mota_thau']").val();
            var phidu_thau = $("input[name='phidu_thau']").val();
            var dvi_thau = $("select[name='dvi_tien_dt']").val();

            var fd = new FormData();

            fd.append('id_dm', id_dm);
            fd.append('tieu_de', tieu_de);
            fd.append('ho_ten', hoten);
            // dia chi can mua hàng
            fd.append('dia_chi', $("[name=dia_chi]").val());

            // địa chi nop ho so
            fd.append('diadiem_nop', diadiem_nop);

            fd.append('mota', mota);
            // gia san du kien
            switch ($('.luong-2.active').data('id')) {
                case 1:
                    fd.append('salary_fr', $("#nhap-luong-1").find("[name=gia_bdau]").val().replace(/,/g, ""));
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', $("#nhap-luong-1").find("[name=dvi_tien]").val());
                    break;
                case 2:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', $("#nhap-luong-2").find("[name=gia_kthuc]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-2").find("[name=dvi_tien]").val());
                    break;
                case 3:
                    fd.append('salary_fr', $("[name=gia_bdau_mua]").val().replace(/,/g, ""));
                    fd.append('salary_to', $("[name=gia_kthuc_mua]").val().replace(/,/g, ""));
                    fd.append('salary_unit', $("#nhap-luong-3").find("[name=dvi_tien]").val());
                    break;
                default:
                    fd.append('salary_fr', 0);
                    fd.append('salary_to', 0);
                    fd.append('salary_unit', 0);
                    break;
            };
            fd.append('tinh_trang', tinh_trang);
            fd.append('hinhthuc_nop', hinhthuc_nop);
            fd.append('noidung_thau', noidung_thau);
            fd.append('tgian_bdau', tgian_bdau);
            fd.append('tgian_kthuc', tgian_kthuc);
            fd.append('tbao_bd_thau', tbao_bd_thau);
            fd.append('tbao_kt_thau', tbao_kt_thau);
            fd.append('chidan_timhieu', chidan_timhieu);
            fd.append('phidu_thau', phidu_thau);
            fd.append('dvi_thau', dvi_thau);

            fd.append('avt_anh', arr_src);

            fd.append('file_mota', $(".avtfile_spham").prop('files')[0]);
            fd.append('file_thutuc', $(".avtfile_thutuc").prop('files')[0]);
            fd.append('file_hoso', $(".avtfile_hoso").prop('files')[0]);

            $.ajax({
                url: '/render/xemtruoc_tmua.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    $(".tindang-container").addClass("d_none");
                    $(".dangtin_muaspham").addClass("edit_infor");
                    $(".v_container").html(data);
                    $(".v_container").removeClass("d_none");
                    slick_click();
                }
            })

        }
    });
</script>