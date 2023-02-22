<?
include("../includes/inc_new/icon.php");
include("config.php");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow" />
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/select2.min.css?v='<?= $version ?>'" as="style">
    <link href="/css/select2.min.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="../css/style_new/style_duy.css">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css">
    <title>Bảng giá</title>

</head>

<body>
    <div class="main">
        <div class="main_header">
            <? include("../includes/common/inc_header.php"); ?>
        </div>
        <div class="main_content">
            <div class="main_content_padding">
                <div class="main_content_danhmuc">
                    <a href="/">Trang chủ</a>
                    <div class="arout_right">
                        <img src="../images/anh_moi/bg_mt_right.svg" alt="">
                    </div>
                    <a href="/bang-gia.html">Bảng báo giá</a>
                </div>

                <div class="main_content_noidung">
                    <div class="main_content_noidung_heading">BẢNG BÁO GIÁ DỊCH VỤ</div>
                    <div class="bg_dv_gimtin">
                        <div class="bg_dv_gimtin_dh">DỊCH VỤ GHIM GIAN HÀNG</div>
                        <div class="bg_dichvu_chung bg_dichvu_chung_div1">
                            <div class="bg_dichvu_chung_bg">
                                <div class="bg_dichvu_chung_bg_suv">
                                    <div class="bg_dichvu_chung_h1 color1">GHIM GIAN HÀNG</div>
                                    <div class="bg_dichvu_chung_p">
                                        <div class="bg_dichvu_chung_p_suv">
                                            <div class="bg_dichvu_chung_p_suv_img">
                                                <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv_tex">Ưu tiên hiển thị trang chủ</div>
                                        </div>
                                        <div class="bg_dichvu_chung_p_suv">
                                            <div class="bg_dichvu_chung_p_suv_img">
                                                <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv_tex">Gợi ý gian hàng</div>
                                        </div>
                                        <div class="bg_dichvu_chung_p_suv">
                                            <div class="bg_dichvu_chung_p_suv_img">
                                                <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv_tex">Bán hàng nhanh chóng</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="bg_dichvu_chung_img">
                                    <img src="../images/anh_moi/dichvu_1.svg" alt="">
                                    <div class="xemthem_dichvu">
                                        <a href="/bang-gia-ghim-gian-hang.html" class="xemthem_dichvu_sub">
                                            <div class="xemthem_dichvu_tex color1">Xem chi tiết</div>
                                            <div class="xemthem_dichvu_img">
                                                <?= $xemthem_dv1 ?>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg_dv_dangtin">
                        <div class="bg_dv_gimtin_dh">DỊCH VỤ GHIM TIN ĐĂNG</div>
                        <div class="bg_dv_dangtin_sub">
                            <!-- 1 -->
                            <div class="bg_dichvu_chung bg_dichvu_chung_div2">
                                <div class="bg_dichvu_chung_bg">
                                    <div class="bg_dv_dangtin_bg_suv">
                                        <div class="bg_dv_dangtin_bg_suv_tex">
                                            <div class="bg_dv_dangtin_h1 color2">GHIM TIN</div>
                                            <!-- <div class="bg_dv_dangtin_text_p">(Tin nổi bật)</div> -->
                                        </div>
                                        <div class="bg_dichvu_chung_p">
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Ưu tiên hiển thị trang chủ</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Tiếp cận nhiều người mua</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Bán hàng nhanh chóng</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg_dichvu_chung_img">
                                        <img src="../images/anh_moi/dichvu_2.svg" alt="">
                                        <div class="xemthem_dichvu">
                                            <a href="/bang-gia-ghim-tin.html" class="xemthem_dichvu_sub">
                                                <div class="xemthem_dichvu_tex color2">Xem chi tiết</div>
                                                <div class="xemthem_dichvu_img">
                                                    <?= $xemthem_dv2 ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 2 -->
                            <div class="bg_dichvu_chung bg_dichvu_chung_div2">
                                <div class="bg_dichvu_chung_bg">
                                    <div class="bg_dv_dangtin_bg_suv">
                                        <div class="bg_dv_dangtin_bg_suv_tex">
                                            <div class="bg_dv_dangtin_h1 color3">ĐẨY TIN</div>
                                            <!-- <div class="bg_dv_dangtin_text_p">(Tin hấp dẫn)</div> -->
                                        </div>
                                        <div class="bg_dichvu_chung_p">
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Ưu tiên hiển thị trang chủ</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Tiếp cận nhiều người mua</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Bán hàng nhanh chóng</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg_dichvu_chung_img">
                                        <img src="../images/anh_moi/dichvu_3.svg" alt="">
                                        <div class="xemthem_dichvu">
                                            <a href="/dich-vu-bang-gia.html" class="xemthem_dichvu_sub">
                                                <div class="xemthem_dichvu_tex color3">Xem chi tiết</div>
                                                <div class="xemthem_dichvu_img">
                                                    <?= $xemthem_dv3 ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- 3 -->
                            <!-- <div class="bg_dichvu_chung bg_dichvu_chung_div2">
                                <div class="bg_dichvu_chung_bg">
                                    <div class="bg_dichvu_chung_bg_suv">
                                        <div class="bg_dichvu_chung_h1 color4">GHIM TRANG TỈNH THÀNH</div>
                                        <div class="bg_dichvu_chung_p">
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Ưu tiên hiển thị trang chủ</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Tiếp cận nhiều người mua</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Bán hàng nhanh chóng</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg_dichvu_chung_img">
                                        <img src="../images/anh_moi/dichvu_4.svg" alt="">
                                        <div class="xemthem_dichvu">
                                            <a href="/dich-vu-bang-gia.html" class="xemthem_dichvu_sub">
                                                <div class="xemthem_dichvu_tex color4">Xem chi tiết</div>
                                                <div class="xemthem_dichvu_img">
                                                    <?= $xemthem_dv4 ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- 4 -->
                            <!-- <div class="bg_dichvu_chung bg_dichvu_chung_div2">
                                <div class="bg_dichvu_chung_bg">
                                    <div class="bg_dichvu_chung_bg_suv">
                                        <div class="bg_dichvu_chung_h1 color5">GHIM TRANG DANH MỤC</div>
                                        <div class="bg_dichvu_chung_p">
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Ưu tiên hiển thị trang chủ</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Tiếp cận nhiều người mua</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Bán hàng nhanh chóng</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg_dichvu_chung_img">
                                        <img src="../images/anh_moi/dichvu_5.svg" alt="">
                                        <div class="xemthem_dichvu">
                                            <a href="/dich-vu-bang-gia.html" class="xemthem_dichvu_sub">
                                                <div class="xemthem_dichvu_tex color5">Xem chi tiết</div>
                                                <div class="xemthem_dichvu_img">
                                                    <?= $xemthem_dv5 ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                            <!-- 5 -->
                            <!-- <div class="bg_dichvu_chung bg_dichvu_chung_div2">
                                <div class="bg_dichvu_chung_bg">
                                    <div class="bg_dichvu_chung_bg_suv_6">
                                        <div class="bg_dichvu_chung_h1 bg_dichvu_chung_h1_f_678_1 color6">GHIM TRANG DANH MỤC TẠI TỈNH THÀNH</div>
                                        <div class="bg_dichvu_chung_p">
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Ưu tiên hiển thị trang chủ</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Tiếp cận nhiều người mua</div>
                                            </div>
                                            <div class="bg_dichvu_chung_p_suv">
                                                <div class="bg_dichvu_chung_p_suv_img">
                                                    <img src="../images/anh_moi/bg_tich_xanh.svg" alt="">
                                                </div>
                                                <div class="bg_dichvu_chung_p_suv_tex">Bán hàng nhanh chóng</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="bg_dichvu_chung_img">
                                        <img src="../images/anh_moi/dichvu_6.svg" alt="">
                                        <div class="xemthem_dichvu">
                                            <a href="/dich-vu-bang-gia.html" class="xemthem_dichvu_sub">
                                                <div class="xemthem_dichvu_tex color6">Xem chi tiết</div>
                                                <div class="xemthem_dichvu_img">
                                                    <?= $xemthem_dv6 ?>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="main_footer">
            <? include("../includes/inc_new/inc_footer.php"); ?>
        </div>
    </div>

    <script type="text/javascript" src="/js/style_new/style.js"></script>
    <script type="text/javascript">
        $(".share_select2").select2({
            width: '100%',
        });
    </script>
</body>

</html>