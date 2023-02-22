<?

include("config.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    // TỔNG TIN
    $all_tin = new db_query("SELECT `new_id`,`new_title`,`new_cate_id`,`da_ban`,`new_money`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`
         FROM `new` WHERE `new_type` = $usertype
        AND `new_user_id` = $id_user ORDER BY `new_id` DESC");

    $tongtin = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user");
    $result_tongin = mysql_num_rows($tongtin->result);

    $donvitien = array(1 => 'VNĐ', 2 => 'USD', 3 => 'EURO');
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
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/news_management.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $css_vs ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien.css?v=<?= $version ?>">

</head>

<body>

    <? include("../includes/common/inc_header.php"); ?>
    <section class="edit_infor">
        <? if ($type_user == 1) { ?>
            <?php include "../includes/person_sell/inc_sidebar_left.php" ?>
        <? } else { ?>
            <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
        <? } ?>
        <div class="box-right edit_pers">
            <div class="box-right-title">
                <p>Theo quy định của pháp luật, bạn vui lòng thực hiện xác thực tài khoản bằng CMND đã dùng để liên kết với tài khoản ngân hàng </p>
            </div>
            <div class="box-right-rec"></div>
            <form class="box-right-main xac_thuc_lket_nhang">
                <div class="box-right-main1 ">
                    <p class="tieude_gcmt">1.Số CMND/CCCD</p>
                    <div class="form_cont ghi_cmnd">
                        <input class="input-note" type="text" name="so_cmnd" placeholder="Nhập số CMND/CCCD" oninput="<?= $oninput ?>">
                    </div>
                </div>
                <div class="box-right-main2">
                    <div class="main2-title">
                        <p>2.Ảnh chụp CMND/CCCD</p>
                    </div>
                    <div class="main2-content">
                        <div class="main2-content-item">
                            <label class="box-right-main1-item anhla">
                                <div class="main1-item-insert-img">
                                    <input type="file" id="upload_img_mtr" name="cmt_anhtrc" class="d_none anh_cmt" onchange="chon_anh(this)">
                                    <div class="upload-insert-img-title">
                                        <img src="/images/bo-sung-raonhanh/add-photo.svg" alt="">
                                        <p>Tải ảnh lên</p>
                                    </div>
                                </div>
                                <div class="anh_chon d_none">

                                </div>
                            </label>
                            <div class="main2-content-item-title">
                                <p>Mặt trước CMND/CCCD</p>
                            </div>
                        </div>
                        <div class="main2-content-item">
                            <label class="box-right-main1-item anhla">
                                <div class="main1-item-insert-img">
                                    <input type="file" id="upload_img_ms" name="cmt_anhs" class="d_none anh_cmt" onchange="chon_anh(this)">
                                    <div class="upload-insert-img-title">
                                        <img src="/images/bo-sung-raonhanh/add-photo.svg" alt="">
                                        <p>Tải ảnh lên</p>
                                    </div>
                                </div>
                                <div class="anh_chon d_none">

                                </div>
                            </label>
                            <div class="main2-content-item-title">
                                <p>Mặt sau CMND/CCCD</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-right-main3">
                    <div class="main3-title">
                        <p>3.Tài khoản ngân hàng</p>
                    </div>
                    <div class="main3-content">
                        <div class="main3-content-top">
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="BIDV">
                                    <img src="/images/bo-sung-raonhanh/BIDV.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="AGRIBANK">
                                    <img src="/images/bo-sung-raonhanh/agri.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="TPBANK">
                                    <img src="/images/bo-sung-raonhanh/tpbank.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="NCB">
                                    <img src="/images/bo-sung-raonhanh/ncb.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="VIETCOMBANK">
                                    <img src="/images/bo-sung-raonhanh/vcb.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="MSB">
                                    <img src="/images/bo-sung-raonhanh/msb.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="VPBANK">
                                    <img src="/images/bo-sung-raonhanh/vpbank.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="DONGA">
                                    <img src="/images/bo-sung-raonhanh/donga.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="MB">
                                    <img src="/images/bo-sung-raonhanh/MB.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="TECHCOMBANK">
                                    <img src="/images/bo-sung-raonhanh/tech.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="SHB">
                                    <img src="/images/bo-sung-raonhanh/shb.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="HDBANK">
                                    <img src="/images/bo-sung-raonhanh/hdbank.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="ACB">
                                    <img src="/images/bo-sung-raonhanh/acb.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="VIETINBANK">
                                    <img src="/images/bo-sung-raonhanh/vietin.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="EXIMBANK">
                                    <img src="/images/bo-sung-raonhanh/exim.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="CO-OPBANK">
                                    <img src="/images/bo-sung-raonhanh/coop.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="SACOMBANK">
                                    <img src="/images/bo-sung-raonhanh/sacom.svg" alt="">
                                </div>
                            </div>
                            <div class="box-right-main3-item">
                                <div class="main3-item-1" onclick="anh_nganhang(this)" data="VIB">
                                    <img src="/images/bo-sung-raonhanh/vib.svg" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="main3-content-bot">
                            <div class="content-bot-tk">
                                <div class="bot-tk-left">
                                    <div class="bot-stk form_cont">
                                        <label>Số tài khoản <span class="color_red">*</span></label>
                                        <input class="input-note" type="text" name="so_taikhoan" placeholder="Nhập số tài khoản" oninput="<?= $oninput ?>">
                                    </div>
                                    <div class="bot-stk form_cont">
                                        <label>Tên chủ tài khoản <span class="color_red">*</span></label>
                                        <input class="input-note" type="text" name="ten_chutk" placeholder="Nhập tên chủ tài khoản">
                                    </div>
                                </div>
                                <div class="bot-tk-right nganhang_tkhoan" data="BIDV">
                                    <img src="/images/bo-sung-raonhanh/BIDV.png" alt="">
                                </div>
                            </div>
                            <div class="content-bot-btn-xttk">
                                <button type="button" class="huydon-1">Hủy</button>
                                <button type="button" class="xacnhan-2" id="xac_thuc">Xác thực</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <div id="modal_dathang" class="modal popup_dathang" data="<?= $_COOKIE['UT'] ?>">
        <div class="modal-content">
            <div class="content-xacthuc-img">
                <img src="/images/bo-sung-raonhanh/xacthuc.svg" alt="">
            </div>
            <div class="content-xacthuc-title">
                <p>Xác thực tài khoản thành công !</p>
            </div>
            <div class="huydon-footer">
                <button type="button" class="modal-btn-dong" id="dong">Đóng</button>
            </div>

        </div>
    </div>
    <? include("../includes/inc_new/inc_footer.php"); ?>
</body>

</html>
<script type="text/javascript">
    function anh_nganhang(el) {
        var anh = $(el).find("img").attr("src");
        $(".nganhang_tkhoan").find("img").attr("src", anh);
        $(".nganhang_tkhoan").attr("data", $(el).attr("data"));
    };

    function chon_anh(el) {
        var file_data = $(el).prop('files')[0];
        var rong = '';
        if (file_data != undefined) {
            var file_type = file_data.type;
            var size = file_data.size;
            var file_size = (size / (1024 * 1024)).toFixed(2);
            var match = ['image/gif', 'image/png', 'image/jpg', 'image/jpeg', 'image/jfif', 'image/PNG'];
            if ($.inArray(file_type, match) == -1) {
                alert("Vui lòng chọn file định đạng : JPG, JPEG, PNG, GIF, JPE");
                $(el).val(rong);
                $(el).parents(".anhla").find('.main1-item-insert-img').show();
                $(el).parents(".anhla").find('.anh_chon').hide();
            } else {
                if (file_size <= 2) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        var srcData = e.target.result;
                        var newImage = document.createElement('img');
                        newImage.src = srcData;

                        $(el).parents(".anhla").find('.anh_chon').html(newImage.outerHTML);

                        $(el).parents(".anhla").find('.main1-item-insert-img').hide();
                        $(el).parents(".anhla").find('.anh_chon').show();
                    }
                    reader.readAsDataURL(file_data);

                } else {
                    alert("Dung lượng ảnh tối đa 2MB");
                    $(el).val(rong);
                    $(el).parents(".anhla").find('.main1-item-insert-img').show();
                    $(el).parents(".anhla").find('.anh_chon').hide();
                }
            }
        } else {
            $(el).val(rong);
            $(el).parents(".anhla").find('.main1-item-insert-img').show();
            $(el).parents(".anhla").find('.anh_chon').hide();
        }
    }


    $("#xac_thuc").click(function() {
        var form_xacthuc = $(".xac_thuc_lket_nhang");
        form_xacthuc.validate({
            rules: {
                so_cmnd: {
                    required: true,
                },
                so_taikhoan: {
                    required: true,
                },
                ten_chutk: {
                    required: true,
                },
            },
            messages: {
                so_cmnd: {
                    required: "Không được để trống",
                },
                so_taikhoan: {
                    required: "Không được để trống",
                },
                ten_chutk: {
                    required: "Không được để trống",
                },
            }
        });
        if (form_xacthuc.valid() === false) {
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
        if (form_xacthuc.valid() === true) {
            var so_cmnd = $("input[name='so_cmnd']").val();
            var so_taikhoan = $("input[name='so_taikhoan']").val();
            var chu_tk = $("input[name='ten_chutk']").val();
            console.log($("input[name='cmt_anhtrc']").prop("files")[0]);
            if ($("input[name='cmt_anhtrc']").prop("files")[0] == undefined) {
                alert("Chọn ảnh mặt trước CMND/CCCD");
                return true;
            }
            if ($("input[name='cmt_anhs']").prop("files")[0] == undefined) {
                alert("Chọn ảnh mặt sau CMND/CCCD");
                return true;
            }
            var fd = new FormData();
            var cmt_anhtrc = $("input[name='cmt_anhtrc']").prop("files")[0];
            var cmt_anhs = $("input[name='cmt_anhs']").prop("files")[0];
            var nh_tkhoan = $(".nganhang_tkhoan").attr("data");

            fd.append('cmt_anhtr', cmt_anhtrc);
            fd.append('cmt_anhs', cmt_anhs);
            fd.append('so_cmnd', so_cmnd);
            fd.append('so_taikhoan', so_taikhoan);
            fd.append('chu_tk', chu_tk);
            fd.append('nh_tkhoan', nh_tkhoan);
            $.ajax({
                url: '/ajax/xacthuc_lket.php',
                type: 'POST',
                contentType: false,
                processData: false,
                data: fd,
                success: function(data) {
                    if (data == "") {
                        $("#modal_dathang").show();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    })

    // $(".close, #dong").click(function() {
    //     $("#modal_dathang").hide();
    // });

    $(".close, #dong").click(function() {
        var type_us = $(this).parents("#modal_dathang").attr("data");
        $("#modal_dathang").hide();
        if (type_us == 1) {
            window.location.href = "/ho-so-nguoi-ban-ca-nhan/quan-ly-tin.html";
        } else if (type_us == 5) {
            window.location.href = "/ho-so-quan-ly-tin-ban.html";
        }

    });
</script>