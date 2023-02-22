<?
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

    <title>QUẢN LÝ BÌNH LUẬN</title>
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

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien3.css?v=<?= $version ?>">

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="quan-ly-binh-luan">
        <div class="qlbl-1">
            <p class="qlbl-1-tieude">Bình luận</p>
        </div>
        <div class="qlbl-2">
            <label class="switch">
                <input id="on" type="checkbox" onchange="on_off(this)">
                <span class="slider round"></span>
            </label>
            <p>Cho phép bình luận</p>
        </div>
        <div class="check">
            <div class="qlbl-3">
                <div class="qlbl-3-trai">
                    <select name="sel-hanhdong">
                        <option value="1">Hành động</option>
                    </select>
                    <button type="button" class="btn-apdung color_orange">Áp dụng</button>
                </div>
                <div class="qlbl-3-phai">
                    <select name="sel-sapxep">
                        <option value="1">Sắp xếp</option>
                    </select>
                    <button type="button" class="btn-apdung color_orange">Áp dụng</button>
                </div>
            </div>
            <div class="qlbl-4">
                <p class="qlbl-text-4 menu active" data-id="1">Tất cả (100)</p>
                <p class="bd_lr qlbl-text-4 menu" data-id="2">Phản hồi(30)</p>
                <p class="qlbl-text-4 menu" data-id="3">Đang chờ(20)</p>
                <p class="bd_lr qlbl-text-4 menu" data-id="4">Được phê duyệt(20)</p>
                <p class="qlbl-text-4 menu" data-id="5">Bỏ phê duyệt</p>
                <p class="bd_lr qlbl-text-4 menu" data-id="6">Spam(2)</p>
                <p class="qlbl-text-4 menu" data-id="7">Xóa(0)</p>
            </div>
            <div class="qlbl-5 dsbl" id="dsbinhluan-1">
                <div class="qlbl-5-nd">
                    <table class="qlbl-5-bl">
                        <thead>
                            <tr>
                                <th>
                                    <div class="qlbl-5-tren-a d_flex">
                                        <input id="ck1" type="checkbox">
                                        <p class="tb-text-name ml15">Tác giả</p>
                                    </div>
                                </th>
                                <th>
                                    <p class="tb-text-name">Bình luận</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Phản hồi</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Đã đăng vào</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="1">
                                <td>
                                    <div class="d_flex direc_row gap15">
                                        <input id="ck1" type="checkbox">
                                        <div class="thongtin-tacgia">
                                            <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                            <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="binhluan-1">
                                        <div class="nd-bl">
                                            <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                        </div>
                                        <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                            <p class="tb-text color_green" onclick="pheduyet(this)">Phê duyệt</p>
                                            <p class="bd_lr tb-text">Phản hồi</p>
                                            <p class="tb-text">Chỉnh sửa</p>
                                            <p class="bd_lr tb-text color_red" onclick="spambl(this)">Spam</p>
                                            <p class="tb-text color_red">Xóa</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d_flex direc_col">
                                        <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                        <div class="p_relative d_in-block mt13 w30px">
                                            <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                            <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                            <span class="thongbao-chamdo"> </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="tb-text">17h30, 23/12/2022</p>
                                </td>
                            </tr>
                            <tr id="2">
                                <td>
                                    <div class="d_flex direc_row gap15">
                                        <input type="checkbox">
                                        <div class="thongtin-tacgia">
                                            <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                            <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="binhluan-1">
                                        <div class="nd-bl">
                                            <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                        </div>
                                        <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                            <p class="tb-text color_green" onclick="pheduyet(this)">Phê duyệt</p>
                                            <p class="bd_lr tb-text">Phản hồi</p>
                                            <p class="tb-text">Chỉnh sửa</p>
                                            <p class="bd_lr tb-text color_red" onclick="spambl(this)">Spam</p>
                                            <p class="tb-text color_red">Xóa</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d_flex direc_col">
                                        <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                        <div class="p_relative d_in-block mt13 w30px">
                                            <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                            <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                            <span class="thongbao-chamdo"> </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="tb-text">17h30, 23/12/2022</p>
                                </td>
                            </tr>
                            <tr id="3">
                                <td>
                                    <div class="d_flex direc_row gap15">
                                        <input type="checkbox">
                                        <div class="thongtin-tacgia">
                                            <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                            <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="binhluan-1">
                                        <div class="nd-bl">
                                            <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                        </div>
                                        <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                            <p class="tb-text color_green" onclick="pheduyet(this)">Phê duyệt</p>
                                            <p class="bd_lr tb-text">Phản hồi</p>
                                            <p class="tb-text">Chỉnh sửa</p>
                                            <p class="bd_lr tb-text color_red" onclick="spambl(this)">Spam</p>
                                            <p class="tb-text color_red">Xóa</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="d_flex direc_col">
                                        <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                        <div class="p_relative d_in-block mt13 w30px">
                                            <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                            <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                            <span class="thongbao-chamdo"> </span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p class="tb-text">17h30, 23/12/2022</p>
                                </td>
                            </tr>
                            <?php for ($i = 0; $i < 9; $i++) : ?>
                                <tr id="4">
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_green" onclick="pheduyet(this)">Phê duyệt</p>
                                                <p class="bd_lr tb-text">Phản hồi</p>
                                                <p class="tb-text">Chỉnh sửa</p>
                                                <p class="bd_lr tb-text color_red" onclick="spambl(this)">Spam</p>
                                                <p class="tb-text color_red">Xóa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tr>
                            <th colspan="5">
                                <div class="btn-readmore d_flex color_orange gap15">
                                    <p>Xem thêm</p>
                                    <img src="images/binh-luan/xemthem.svg" alt="">
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="qlbl-5 dsbl d_none" id="dsbinhluan-2">
                <div class="qlbl-5-nd">
                    <table class="qlbl-5-bl">
                        <thead>
                            <tr>
                                <th>
                                    <div class="qlbl-5-tren-a d_flex">
                                        <input id="ck1" type="checkbox">
                                        <p class="tb-text-name ml15">Tác giả</p>
                                    </div>
                                </th>
                                <th>
                                    <p class="tb-text-name">Bình luận</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Phản hồi</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Đã đăng vào</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 9; $i++) : ?>
                                <tr>
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_orange" id="pheduyet-1">Bỏ phê duyệt</p>
                                                <p class="bd_lr tb-text">Phản hồi</p>
                                                <p class="tb-text">Chỉnh sửa</p>
                                                <p class="bd_lr tb-text color_red">Spam</p>
                                                <p class="tb-text color_red">Xóa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                                <span class="thongbao-chamdo"> </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tr>
                            <th colspan="5">
                                <div class="btn-readmore d_flex color_orange gap15">
                                    <p>Xem thêm</p>
                                    <img src="images/binh-luan/xemthem.svg" alt="">
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="qlbl-5 dsbl d_none" id="dsbinhluan-3">
                <div class="qlbl-5-nd">
                    <table class="qlbl-5-bl">
                        <thead>
                            <tr>
                                <th>
                                    <div class="qlbl-5-tren-a d_flex">
                                        <input id="ck1" type="checkbox">
                                        <p class="tb-text-name ml15">Tác giả</p>
                                    </div>
                                </th>
                                <th>
                                    <p class="tb-text-name">Bình luận</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Phản hồi</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Đã đăng vào</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 3; $i++) : ?>
                                <tr id="1">
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_green" id="pheduyet-1">Phê duyệt</p>
                                                <!-- <p class="tb-text color_green d_none">Bỏ phê duyệt(20)</p> -->
                                                <p class="bd_lr tb-text">Phản hồi</p>
                                                <p class="tb-text">Chỉnh sửa</p>
                                                <p class="bd_lr tb-text color_red">Spam</p>
                                                <p class="tb-text color_red">Xóa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                                <span class="thongbao-chamdo"> </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                                <tr id="2">
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_green">Phê duyệt</p>
                                                <p class="bd_lr tb-text">Phản hồi</p>
                                                <p class="tb-text">Chỉnh sửa</p>
                                                <p class="bd_lr tb-text color_red">Spam</p>
                                                <p class="tb-text color_red">Xóa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                                <span class="thongbao-chamdo"> </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                                <tr id="3">
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_green">Phê duyệt</p>
                                                <p class="bd_lr tb-text">Phản hồi</p>
                                                <p class="tb-text">Chỉnh sửa</p>
                                                <p class="bd_lr tb-text color_red">Spam</p>
                                                <p class="tb-text color_red">Xóa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                                <span class="thongbao-chamdo"> </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tr>
                            <th colspan="5">
                                <div class="btn-readmore d_flex color_orange gap15">
                                    <p>Xem thêm</p>
                                    <img src="images/binh-luan/xemthem.svg" alt="">
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="qlbl-5 dsbl d_none" id="dsbinhluan-4">
                <div class="qlbl-5-nd">
                    <table class="qlbl-5-bl">
                        <thead>
                            <tr>
                                <th>
                                    <div class="qlbl-5-tren-a d_flex">
                                        <input id="ck1" type="checkbox">
                                        <p class="tb-text-name ml15">Tác giả</p>
                                    </div>
                                </th>
                                <th>
                                    <p class="tb-text-name">Bình luận</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Phản hồi</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Đã đăng vào</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 9; $i++) : ?>
                                <tr>
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_orange" id="pheduyet-1">Bỏ phê duyệt</p>
                                                <p class="bd_lr tb-text">Phản hồi</p>
                                                <p class="tb-text">Chỉnh sửa</p>
                                                <p class="bd_lr tb-text color_red">Spam</p>
                                                <p class="tb-text color_red">Xóa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                                <span class="thongbao-chamdo"> </span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tr>
                            <th colspan="5">
                                <div class="btn-readmore d_flex color_orange gap15">
                                    <p>Xem thêm</p>
                                    <img src="images/binh-luan/xemthem.svg" alt="">
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="qlbl-5 dsbl d_none" id="dsbinhluan-5">
                <div class="qlbl-5-nd">
                    <table class="qlbl-5-bl">
                        <thead>
                            <tr>
                                <th>
                                    <div class="qlbl-5-tren-a d_flex">
                                        <input id="ck1" type="checkbox">
                                        <p class="tb-text-name ml15">Tác giả</p>
                                    </div>
                                </th>
                                <th>
                                    <p class="tb-text-name">Bình luận</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Phản hồi</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Đã đăng vào</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 9; $i++) : ?>
                                <tr>
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_green">Phê duyệt</p>
                                                <p class="bd_lr tb-text">Phản hồi</p>
                                                <p class="tb-text">Chỉnh sửa</p>
                                                <p class="bd_lr tb-text color_red">Spam</p>
                                                <p class="tb-text color_red">Xóa</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tr>
                            <th colspan="5">
                                <div class="btn-readmore d_flex color_orange gap15">
                                    <p>Xem thêm</p>
                                    <img src="images/binh-luan/xemthem.svg" alt="">
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="qlbl-5 dsbl d_none" id="dsbinhluan-6">
                <div class="qlbl-5-nd">
                    <table class="qlbl-5-bl">
                        <thead>
                            <tr>
                                <th>
                                    <div class="qlbl-5-tren-a d_flex">
                                        <input id="ck1" type="checkbox">
                                        <p class="tb-text-name ml15">Tác giả</p>
                                    </div>
                                </th>
                                <th>
                                    <p class="tb-text-name">Bình luận</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Phản hồi</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Đã đăng vào</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 9; $i++) : ?>
                                <tr>
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">

                                                <p class="tb-text color_blue">Bỏ spam</p>
                                                <p class="bd_lr tb-text color_red">Xóa</p>
                                                <p class="tb-text color_red">Xóa vĩnh viễn</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tr>
                            <th colspan="5">
                                <div class="btn-readmore d_flex color_orange gap15">
                                    <p>Xem thêm</p>
                                    <img src="images/binh-luan/xemthem.svg" alt="">
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="qlbl-5 dsbl d_none" id="dsbinhluan-7">
                <div class="qlbl-5-nd">
                    <table class="qlbl-5-bl">
                        <thead>
                            <tr>
                                <th>
                                    <div class="qlbl-5-tren-a d_flex">
                                        <input id="ck1" type="checkbox">
                                        <p class="tb-text-name ml15">Tác giả</p>
                                    </div>
                                </th>
                                <th>
                                    <p class="tb-text-name">Bình luận</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Phản hồi</p>
                                </th>
                                <th>
                                    <p class="tb-text-name">Đã đăng vào</p>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < 9; $i++) : ?>
                                <tr>
                                    <td>
                                        <div class="d_flex direc_row gap15">
                                            <input id="ck1" type="checkbox">
                                            <div class="thongtin-tacgia">
                                                <p class="tb-text-name color_47 font_w500">Nguyễn Tuấn</p>
                                                <p class="email color_blue mt10">tuan<span class="an">*****</span>@gmail.com</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="binhluan-1">
                                            <div class="nd-bl">
                                                <p class="tb-text">K30 pro giờ hiếm tìm máy mới khó lắm, bạn mua K40, K50 ấy</p>
                                            </div>
                                            <div class="hanhdong d_flex f_wrap direc_row gap10 mt10">
                                                <p class="tb-text color_blue">Khôi phục</p>
                                                <p class="bd_lr tb-text color_red xoavinhvien" onclick="xoavinhvien(this)">Xóa vĩnh viễn</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d_flex direc_col">
                                            <p class="tb-text">CAMERA YOOSEE XOAY 360° ĐÀM THOẠI 2 CHIỀU</p>
                                            <div class="p_relative d_in-block mt13 w30px">
                                                <img class="p_relative" src="../images/binh-luan/chat1.svg" alt="">
                                                <span class="p_absolute d_block inl_t-l color_white tb-text-2">3</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="tb-text">17h30, 23/12/2022</p>
                                    </td>
                                </tr>
                            <?php endfor ?>
                        </tbody>
                        <tr>
                            <th colspan="5">
                                <div class="btn-readmore d_flex color_orange gap15">
                                    <p>Xem thêm</p>
                                    <img src="images/binh-luan/xemthem.svg" alt="">
                                </div>
                            </th>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </section>

    <div id="modal_xacnhan" class="modal">
        <div class="md-body">
            <div class="md-body-header">
                <p class="color_white">Xác nhận</p>
                <span class="close color_white">&times;</span>
            </div>
            <div class="md-body-content">
                <p>Bạn có chắc chắn muốn xóa vĩnh viên bình luận này?</p>
            </div>
            <div class="md-body-footer">
                <button type="button" class="md-btn-huy"><span class="color_red">Hủy bỏ</span></button>
                <button type="button" class="md-btn-dongy"><span class="color_white">Đồng ý</span></button>
            </div>
        </div>
    </div>

    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    // $("#menu-2").click(function() {
    //     $("#tatcabinhluan").hide();
    // });
    $('.menu').click(function() {
        $('.menu').removeClass('active');
        $(this).addClass('active');
        var type = $(this).data('id');
        $('.dsbl').addClass('d_none')
        $('#dsbinhluan-' + type).removeClass('d_none')
    });

    function xoavinhvien(el) {
        var e = $(el);
        $(el).click(el);
        $("#modal_xacnhan").show();
        $("#huybo, .close").click(function() {
            $("#modal_xacnhan").hide();
        });

    }

    function pheduyet(el) {

        var x = $(el);
        var element = $(el);
        if ($(el).text() == "Phê duyệt") {
            $(el).text("Bỏ phê duyệt");
            element.removeClass("color_green");
            element.addClass("color_orange");
        } else {
            $(el).text("Phê duyệt");
            element.removeClass("color_orange");
            element.addClass("color_green");
        }
    }

    function spambl(el) {

        var x = $(el);
        var element = $(el);
        if ($(el).text() == "Spam") {
            $(el).text("Bỏ spam");
            element.removeClass("color_red");
            element.addClass("color_blue");
        } else {
            $(el).text("Spam");
            element.removeClass("color_blue");
            element.addClass("color_red");
        }
    }
</script>