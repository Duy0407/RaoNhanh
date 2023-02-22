<?
include("../includes/inc_new/icon.php");
include("config.php");
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
    <!-- <meta name="robots" content="index, follow,noodp" /> -->
    <meta name="robots" content="noindex,nofollow">
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
    <link rel="stylesheet" type="text/css" href="/css/newCss/recharge_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />
</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="select_tong">
        <div class="div_bao_max_width div_bao_max_width_df">
            <?php include "../includes/person_sell/inc_sidebar_left.php" ?>

            <div class="box-right box-right_df_nap_tien">
                <div class="title">
                    <p class="chu-recharge">Nạp tiền vào tài khoản</p>
                </div>
                <div class="box_bank">
                    <div class="khung_bank">
                        <div class="div_bank_1 div_bank_1_order">
                            <div class="div_bank_1_sub">
                                <button class="div_bank_1_img" data="bidv" onclick="doi_taikhoan(this)">
                                    <img src="/images/anh_moi/bank1.svg">
                                </button>
                            </div>
                            <div class="div_bank_1_sub">
                                <button class="div_bank_1_img" data="vietcombank" onclick="doi_taikhoan(this)">
                                    <img src="/images/anh_moi/bank2.png">
                                </button>
                            </div>
                            <div class="div_bank_1_sub">
                                <button class="div_bank_1_img" data="mb" onclick="doi_taikhoan(this)">
                                    <img src="/images/anh_moi/bank3.svg">
                                </button>
                            </div>
                            <div class="div_bank_1_sub" data="acb" onclick="doi_taikhoan(this)">
                                <button class="div_bank_1_img">
                                    <img src="/images/anh_moi/bank4.svg">
                                </button>
                            </div>
                        </div>

                        <div class="div_bank_2 div_bank_2_order">
                            <div class="div_bank_2_tt">
                                <div class="div_bank_2_tt_hd">
                                    <div class="div_bank_2_tt_hd_tex">Thông tin tài khoản Techcombank</div>
                                    <div class="div_bank_2_tt_hd_img">
                                        <img src="/images/anh_moi//bank9.svg">
                                    </div>
                                </div>
                                <div class="div_bank_2_tt_tk">
                                    <div class="div_bank_2_tt_tk_sub">
                                        <div class="div_bank_2_tt_tk1">
                                            <span class="span_tk">Số tài khoản:</span><span class="color_tk">21610000462781</span>
                                        </div>
                                        <div class="div_bank_2_tt_tk1">
                                            <span class="span_tk">Chủ tài khoản:</span><span class="color_tk">DƯƠNG THỊ
                                                MINH TUYỂN</span>
                                        </div>
                                        <div class="div_bank_2_tt_tk1">
                                            <span class="span_tk">Chi nhánh:</span><span class="color_tk">Đống Đa, Hà
                                                Nội</span>
                                        </div>
                                        <div class="div_bank_2_tt_tk1">
                                            <span class="span_tk">Nội dung chuyển khoản:</span><span class="color_tk">[
                                                Tài khoản email ] Nap tien tai khoan </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="div_bank_2_tt_tk_sub2">
                                <!-- <div class="div_bank_1_sub fig_tren_1024 div_bank_1_img_moi">
                                    <button class="div_bank_1_img " data="sacombank" onclick="doi_taikhoan(this)">
                                        <img src="/images/anh_moi/bank10.svg">
                                    </button>
                                </div> -->
                                <div class="div_bank_1_sub fig_tren_1024">
                                    <button class="div_bank_1_img" data="vib" onclick="doi_taikhoan(this)">
                                        <img src="/images/anh_moi/bank11.svg">
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="div_bank_1 div_bank_3_order">
                            <div class="div_bank_1_sub">
                                <button class="div_bank_1_img" data="agribank" onclick="doi_taikhoan(this)">
                                    <img src="/images/anh_moi/bank5.svg">
                                </button>
                            </div>
                            <div class="div_bank_1_sub">
                                <button class="div_bank_1_img" data="msb" onclick="doi_taikhoan(this)">
                                    <img src="/images/anh_moi/bank6.svg">
                                </button>
                            </div>
                            <div class="div_bank_1_sub">
                                <button class="div_bank_1_img" data="techcombank" onclick="doi_taikhoan(this)">
                                    <img src="/images/anh_moi/bank7.svg">
                                </button>
                            </div>
                            <div class="div_bank_1_sub">
                                <button class="div_bank_1_img" data="vietinbank" onclick="doi_taikhoan(this)">
                                    <img src="/images/anh_moi/bank8.svg">
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="text_luuy">
                        <div class="text_luuy_1"><span>Lưu ý:</span> Khi chuyển khoản vui lòng ghi đúng nội dung</div>
                        <div class="text_luuy_2">SAU KHI CHUYỂN TIỀN THÀNH CÔNG QUÝ KHÁCH HÀNG VUI LÒNG GỬI THÔNG BÁO
                            CHUYỂN TIỀN CHO HỆ THỐNG THEO MỘT TRONG CÁC CÁCH SAU</div>
                    </div>

                    <div class="div_gui_tb">
                        <div class="div_gui_tb_sub">
                            <div class="div_gui_tb_sub_background">
                                <div class="div_gui_tb_img">
                                    <img src="/images/anh_moi/g_tb1.svg">
                                </div>
                                <a rel="nofollow" target="_blank" href="https://chat365.timviec365.vn/chat-NTYzODc=" class="div_gui_tb_text">Gửi thông báo qua Chat365</a>
                            </div>
                            <div class="div_gui_tb_sub_background">
                                <div class="div_gui_tb_img">
                                    <img src="/images/anh_moi/g_tb2.svg">
                                </div>
                                <a href="javascript:void(Tawk_API.toggle())" class="div_gui_tb_text">Thông báo trên Chatbox</a>
                            </div>
                            <div class="div_gui_tb_sub_background">
                                <div class="div_gui_tb_img">
                                    <img src="/images/anh_moi/g_tb3.svg">
                                </div>
                                <a rel="nofollow" href="skype:live:binhminhmta123?chat" class="div_gui_tb_text">Thông báo trên Skype</a>
                            </div>
                            <div class="div_gui_tb_sub_background">
                                <div class="div_gui_tb_img">
                                    <img src="/images/anh_moi/g_tb4.svg">
                                </div>
                                <a rel="nofollow" href="tel:1900633682" class="div_gui_tb_text">Thông báo qua Hotline</a>
                            </div>
                        </div>
                    </div>
                    <div class="text_divider">
                        <div class="text_divider_border"></div>
                        <div class="text_divider_text">
                            <div class="text_divider_textday">
                                hoặc
                            </div>
                        </div>
                    </div>

                    <div class="div_the_dien_thoai">
                        <div class="block_the">
                            <div class="div_the_dien_thoai_sub">
                                <div class="div_the_dien_thoai_1">
                                    <div class="div_the_dien_thoai_1_sub btn_the active" onclick="click_the(this)">
                                        <label class="d_bg_the" for="viettel">
                                            <div class="bg_the1">
                                                <img src="../images/anh_moi/the1.svg">
                                            </div>
                                            <input type="radio" name="bcv" id="viettel" class="nha_mang" value="1" checked>
                                        </label>
                                    </div>
                                    <div class="div_the_dien_thoai_1_sub btn_the" onclick="click_the(this)">
                                        <label class="d_bg_the" for="vinaphone">
                                            <div class="bg_the1">
                                                <img src="../images/anh_moi/the2.svg">
                                            </div>
                                            <input type="radio" name="bcv" id="vinaphone" class="nha_mang" value="3">
                                        </label>
                                    </div>
                                    <div class="div_the_dien_thoai_1_sub btn_the" onclick="click_the(this)">
                                        <label class="d_bg_the" for="mobile">
                                            <div class="bg_the1">
                                                <img src="../images/anh_moi/the3.svg">
                                            </div>
                                            <input type="radio" name="bcv" id="mobile" class="nha_mang" value="2">
                                        </label>
                                    </div>
                                    <div class="div_the_dien_thoai_1_sub btn_the" onclick="click_the(this)">
                                        <label class="d_bg_the" for="vietnamobi">
                                            <div class="bg_the1">
                                                <img src="../images/anh_moi/the4.svg">
                                            </div>
                                            <input type="radio" name="bcv" id="vietnamobi" class="nha_mang" value="6">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="block_input">
                            <form class="form-change">
                                <div class="form-control">
                                    <label class="label_form">Mã thẻ</label>
                                    <input placeholder="Nhập mã thẻ" maxlength="30" id="ma_the" name="ma_the" type="text" class="input_form">
                                    <div class='noti-error error_ma_the'></div>
                                </div>
                                <div class="form-control">
                                    <label class="label_form">Số serial</label>
                                    <input placeholder="Nhập số serial" maxlength="30" id="so_serial" name="so_serial" type="text" class="input_form">
                                    <div class='noti-error error_so_serial'></div>
                                </div>
                                <div class="form-control captcha">
                                    <label class="label_form">Mã xác nhận</label>
                                    <div class="control_captcha" style="position: relative;">
                                        <input type="text" placeholder="Mã xác nhận" class="input_form input_captcha" name="captcha">

                                        <div class="div_captcha div_captcha_napthe">
                                            <input type="text" class="ma_dcap_2 ma_dcap_2_df sh_clr_five sh_size_five b_radius_5 background-none" id="captcha"></input>
                                            <div class="img_df">
                                                <img src="../images/anh_moi/new_capcha.svg" class="xoay360 avt_icon_lh_cp">
                                            </div>
                                        </div>
                                    </div>
                                    <div class='noti-error error_captcha'></div>

                                </div>
                                <div class="form-control cusor_p">
                                    <input type="button" id="btn-nap" class="input_form-color" value="Nạp tiền">
                                </div>
                            </form>
                        </div>

                        <div class="div_baoloi">
                            <ul>
                                <li>
                                    <p>Nạp sai 5 lần liên tiếp, tài khoản của bạn không thể sử dụng hình thức nạp tiền
                                        này trong 24h</p>
                                </li>
                                <li>
                                    <p>Mua thẻ nạp online <a href="https://banthe24h.vn/" class="cusor_p">tại đây</a>
                                    </p>
                                </li>
                                <li>
                                    <p>Báo lỗi khi nạp thẻ <a href="/lien-he.html" class="cusor_p">tại đây</a></p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <div class="footer_boc">
        <? include("../includes/inc_new/inc_footer.php") ?>
    </div>
    <div id="load_tawk"></div>
    <script type="text/javascript" src="/js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
    <script type="text/javascript">
        jQuery(window).scroll(function() {
            if (jQuery(this).scrollTop() > 50) {
                if ($('#load_tawk').hasClass('tawk_add') == false) {
                    $('#load_tawk').append('<script type="text/javascript">var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();(function(){var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0]; s1.async=true; s1.src="https://embed.tawk.to/5978135a5dfc8255d623ef25/default"; s1.charset="UTF-8"; s1.setAttribute("crossorigin","*"); s0.parentNode.insertBefore(s1,s0);})();<\/script>');
                    $('#load_tawk').addClass('tawk_add');
                }
            }
        });

        function doi_taikhoan(id) {
            var id = $(id).attr("data");
            $.ajax({
                url: '/render/tatca_tk.php',
                type: 'POST',
                data: {
                    id: id,
                },
                success: function(data) {
                    $(".div_bank_2_tt").html(data);
                }
            })
        }

        function click_the(click_bg_the) {
            $('.btn_the').removeClass('active');
            $(click_bg_the).addClass('active')
        }

        $("#btn-nap").click(function() {
            var form_naptien = $(".form-change");
            form_naptien.validate({
                errorPlacement: function(error, element) {
                    error.appendTo(element.parents(".form-control"));
                    error.wrap("<span class='error'>");
                },
                rules: {
                    ma_the: "required",
                    so_serial: "required",
                    captcha: {
                        required: true,
                        equalTo: "#captcha",
                    },
                },
                messages: {
                    ma_the: "Vui lòng nhập mã thẻ",
                    so_serial: "Vui lòng số serial",
                    captcha: {
                        required: "Vui lòng nhập mã xác nhận",
                        equalTo: 'Mã xác nhận sai! Vui lòng nhập lại',
                    }
                },
            });
            if (form_naptien.valid() === true) {
                var nha_mang = $("input[name='bcv']:checked").val();
                var ma_the = $("input[name='ma_the']").val();
                var so_serial = $("input[name='so_serial']").val();
                if (nha_mang == "") {
                    alert("Bạn vui lòng chọn nhà mạng");
                } else if (nha_mang != "") {
                    $.ajax({
                        url: '/ajax/nap_tien.php',
                        type: 'POST',
                        data: {
                            nha_mang: nha_mang,
                            ma_the: ma_the,
                            so_seri: so_serial,
                        },
                        success: function(data) {
                            if (data != "") {
                                alert(data);
                                window.location.reload();
                            } else {
                                alert("Nạp tiền vào tài khoản thành công");
                                window.location.reload();
                            }
                        }
                    })
                }
            }
        })
    </script>
</body>

</html>