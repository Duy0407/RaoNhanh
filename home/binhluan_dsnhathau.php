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

    <title>Danh sách nhà thầu</title>
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
        <div class="qlbl-1 bgf4">
            <p class="qlbl-1-tieude">Danh sách nhà thầu</p>
        </div>
        <div class="noidung-bl-tinmua">
            <div class="sapxep-bl-thau">
                <p>Sắp xếp: </p>
                <select class="sxbl" name="sapxep-bl">
                    <option value="1"><p class="sxbl-txt">Giá từ thấp đến cao</p></option>
                    <option value="2"><p class="sxbl-txt">Giá từ cao đến thấp</p></option>
                </select>
            </div>
            <div class="ds-binhluan">
                <?php for ($i = 0; $i < 3; $i++) : ?>
                    <div class="binhluan-item1 mt20" data-id="1">
                        <div class="binhluan-item1-top d_flex j_content-bw">
                            <div class="bl-item1-top-left d_flex al_items-c gap10">
                                <div class="avt-status d_in-block p_relative w100">
                                    <div>
                                        <img src="/images/binh-luan/ava3.svg" alt="">
                                    </div>
                                    <span class="thongbao-chamxanh"></span>
                                </div>
                                <p>Nguyễn Tuấn</p>
                                <span class="chamden"></span>
                                <div class="danhdau-daxem">
                                    <p class="color_blue">Đã xem</p>
                                </div>
                            </div>
                            <div class="bl-item1-top-right d_flex gap15 al_items-c">
                                <div class="call-svg">
                                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M2.67962 1.05722L3.02974 0.707107C3.42026 0.316583 4.05342 0.316582 4.44395 0.707106L6.81921 3.08237C7.20973 3.47289 7.20973 4.10606 6.81921 4.49658L5.15835 6.15744C4.8752 6.44059 4.805 6.87316 4.98408 7.23132C6.01933 9.30181 7.69819 10.9807 9.76867 12.0159C10.1268 12.195 10.5594 12.1248 10.8426 11.8416L12.5034 10.1808C12.8939 9.79027 13.5271 9.79027 13.9176 10.1808L16.2929 12.5561C16.6834 12.9466 16.6834 13.5797 16.2929 13.9703L15.9428 14.3204C13.8314 16.4317 10.4889 16.6693 8.10014 14.8777L7.31278 14.2872C5.56925 12.9796 4.02043 11.4307 2.71278 9.68722L2.12226 8.89986C0.330722 6.51114 0.568269 3.16857 2.67962 1.05722Z" fill="white" />
                                    </svg>
                                </div>
                                <!-- có bgxanh -> nền màu xanh, không có -> nền xám -->
                                <div class="chat-svg bgxanh">
                                    <svg width="18" height="17" viewBox="0 0 18 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M18 8C18 12.3492 13.9703 15.875 9 15.875C8.10861 15.8762 7.22091 15.7605 6.35962 15.5308C5.70262 15.8638 4.194 16.5028 1.656 16.919C1.431 16.955 1.26 16.721 1.34888 16.5117C1.74713 15.5712 2.10713 14.318 2.21513 13.175C0.837 11.7913 0 9.98 0 8C0 3.65075 4.02975 0.125 9 0.125C13.9703 0.125 18 3.65075 18 8ZM5.625 8C5.625 7.70163 5.50647 7.41548 5.2955 7.2045C5.08452 6.99353 4.79837 6.875 4.5 6.875C4.20163 6.875 3.91548 6.99353 3.7045 7.2045C3.49353 7.41548 3.375 7.70163 3.375 8C3.375 8.29837 3.49353 8.58452 3.7045 8.7955C3.91548 9.00647 4.20163 9.125 4.5 9.125C4.79837 9.125 5.08452 9.00647 5.2955 8.7955C5.50647 8.58452 5.625 8.29837 5.625 8ZM10.125 8C10.125 7.70163 10.0065 7.41548 9.7955 7.2045C9.58452 6.99353 9.29837 6.875 9 6.875C8.70163 6.875 8.41548 6.99353 8.2045 7.2045C7.99353 7.41548 7.875 7.70163 7.875 8C7.875 8.29837 7.99353 8.58452 8.2045 8.7955C8.41548 9.00647 8.70163 9.125 9 9.125C9.29837 9.125 9.58452 9.00647 9.7955 8.7955C10.0065 8.58452 10.125 8.29837 10.125 8ZM13.5 9.125C13.7984 9.125 14.0845 9.00647 14.2955 8.7955C14.5065 8.58452 14.625 8.29837 14.625 8C14.625 7.70163 14.5065 7.41548 14.2955 7.2045C14.0845 6.99353 13.7984 6.875 13.5 6.875C13.2016 6.875 12.9155 6.99353 12.7045 7.2045C12.4935 7.41548 12.375 7.70163 12.375 8C12.375 8.29837 12.4935 8.58452 12.7045 8.7955C12.9155 9.00647 13.2016 9.125 13.5 9.125Z" fill="white" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="nd-bl-txt mt10">IMAC M1 dùng có ngon không mn? Tôi dùng làm đồ họa</p>
                        <div class="danh-gia-bl d_flex al_items-c gap10 mt10">
                            <p class="chu-2 color_blue like" onclick="like(this)">Thích</p>
                            <p class="chu-2 color_blue dislike d_none" onclick="dislike(this)">Bỏ thích</p>
                            <span class="cham"></span>
                            <p class="chu-2 color_blue" onclick="rep_cmt(this)">Phản hồi</p>

                            <span class="cham"></span>
                            <div class="luot-thich d_none">
                                <div class="cam-xuc d_flex gap4 al_items-c">
                                    <img src="/images/binh-luan/ic-like.svg" alt="">
                                    <p class="chu-2 color_gray47">1</p>
                                    <span class="cham"></span>
                                </div>

                            </div>

                            <div class="thoi-gian-bl">
                                <p class="chu-2 color_99">2 ngày trước</p>
                            </div>
                        </div>
                        <div class="d_none cmt-1">
                            <div class="nbl-bot-2 d_flex gap8 al_items-c mt10">
                                <div class="nbl-bot-2-avt">
                                    <img src="/images/binh-luan/ava3.svg" alt="">
                                </div>
                                <div class="nbl-bot-2-input d_in-block p_relative w100">
                                    <div>
                                        <input class="nbl-txt p_relative w100 pl16" type="text" placeholder="Nhập bình luận">
                                    </div>
                                    <div class="nbl-input-ic p_absolute">
                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M9.74967 10.8333C10.9463 10.8333 11.9163 9.86328 11.9163 8.66667C11.9163 7.47005 10.9463 6.5 9.74967 6.5C8.55306 6.5 7.58301 7.47005 7.58301 8.66667C7.58301 9.86328 8.55306 10.8333 9.74967 10.8333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M14.0837 2.16602H9.75033C4.33366 2.16602 2.16699 4.33268 2.16699 9.74935V16.2493C2.16699 21.666 4.33366 23.8327 9.75033 23.8327H16.2503C21.667 23.8327 23.8337 21.666 23.8337 16.2493V10.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20.7348 2.80571L16.8023 6.73821C16.6506 6.88988 16.499 7.18238 16.4773 7.39905L16.2606 8.90488C16.1848 9.44655 16.564 9.82571 17.1056 9.74988L18.6115 9.53321C18.8173 9.50071 19.1206 9.35988 19.2723 9.20821L23.2048 5.27571C23.8873 4.59321 24.2015 3.81321 23.2048 2.81654C22.1973 1.79821 21.4173 2.12321 20.7348 2.80571Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M20.1719 3.36914C20.5077 4.56081 21.4394 5.49247 22.631 5.82831" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M2.89258 20.5299L8.23341 16.9441C9.08924 16.3699 10.3242 16.4349 11.0934 17.0958L11.4509 17.4099C12.2959 18.1358 13.6609 18.1358 14.5059 17.4099L19.0126 13.5424C19.8576 12.8166 21.2226 12.8166 22.0676 13.5424L23.8334 15.0591" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_817_58183)">
                                                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M9 10H9.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M15 10H15.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M9.5 15C9.82588 15.3326 10.2148 15.5968 10.6441 15.7772C11.0734 15.9576 11.5344 16.0505 12 16.0505C12.4656 16.0505 12.9266 15.9576 13.3559 15.7772C13.7852 15.5968 14.1741 15.3326 14.5 15" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_817_58183">
                                                    <rect width="24" height="24" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M6.76017 22H17.2402C20.0002 22 21.1002 20.31 21.2302 18.25L21.7502 9.99C21.8902 7.83 20.1702 6 18.0002 6C17.3902 6 16.8302 5.65 16.5502 5.11L15.8302 3.66C15.3702 2.75 14.1702 2 13.1502 2H10.8602C9.83017 2 8.63017 2.75 8.17017 3.66L7.45017 5.11C7.17017 5.65 6.61017 6 6.00017 6C3.83017 6 2.11017 7.83 2.25017 9.99L2.77017 18.25C2.89017 20.31 4.00017 22 6.76017 22Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M10.5 8H13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M12 18C13.79 18 15.25 16.54 15.25 14.75C15.25 12.96 13.79 11.5 12 11.5C10.21 11.5 8.75 12.96 8.75 14.75C8.75 16.54 10.21 18 12 18Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </svg>
                                    </div>
                                </div>
                                <a href="">
                                    <div class="nbl-bot-2-btn">
                                        <button type="button" class="btn-binhluan">Bình luận</button>
                                    </div>
                                </a>
                            </div>
                            <div class="phanhoi-1 mt20">
                                <div class="avt-name_user">
                                    <div class="avt-status d_in-block p_relative">
                                        <div class="avt-user-ph">
                                            <img src="/images/binh-luan/ava3.svg" alt="">
                                        </div>
                                        <span class="thongbao-chamxanh"></span>
                                    </div>
                                    <p class="ten-nguoi-bl color_gray47">Nguyễn Ngọc Tuyết</p>
                                </div>
                                <div class="bl-tuong-tac">
                                    <div class="noi-dung-bl">
                                        <label class="noi_dung" for="">
                                            <p class="noi_dung_c color_gray47">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus...</p>
                                        </label>
                                        <div class="d_none">
                                            <div class="nbl-bot-2 d_flex gap8 al_items-c">
                                                <div class="nbl-bot-2-avt">
                                                    <img src="/images/binh-luan/ava3.svg" alt="">
                                                </div>
                                                <div class="nbl-bot-2-input d_in-block p_relative w100">
                                                    <div>
                                                        <input class="nbl-txt p_relative w100 pl16" type="text" placeholder="Nhập bình luận">
                                                    </div>
                                                    <div class="nbl-input-ic p_absolute">
                                                        <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M9.74967 10.8333C10.9463 10.8333 11.9163 9.86328 11.9163 8.66667C11.9163 7.47005 10.9463 6.5 9.74967 6.5C8.55306 6.5 7.58301 7.47005 7.58301 8.66667C7.58301 9.86328 8.55306 10.8333 9.74967 10.8333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M14.0837 2.16602H9.75033C4.33366 2.16602 2.16699 4.33268 2.16699 9.74935V16.2493C2.16699 21.666 4.33366 23.8327 9.75033 23.8327H16.2503C21.667 23.8327 23.8337 21.666 23.8337 16.2493V10.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.7348 2.80571L16.8023 6.73821C16.6506 6.88988 16.499 7.18238 16.4773 7.39905L16.2606 8.90488C16.1848 9.44655 16.564 9.82571 17.1056 9.74988L18.6115 9.53321C18.8173 9.50071 19.1206 9.35988 19.2723 9.20821L23.2048 5.27571C23.8873 4.59321 24.2015 3.81321 23.2048 2.81654C22.1973 1.79821 21.4173 2.12321 20.7348 2.80571Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M20.1719 3.36914C20.5077 4.56081 21.4394 5.49247 22.631 5.82831" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M2.89258 20.5299L8.23341 16.9441C9.08924 16.3699 10.3242 16.4349 11.0934 17.0958L11.4509 17.4099C12.2959 18.1358 13.6609 18.1358 14.5059 17.4099L19.0126 13.5424C19.8576 12.8166 21.2226 12.8166 22.0676 13.5424L23.8334 15.0591" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g clip-path="url(#clip0_817_58183)">
                                                                <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M9 10H9.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M15 10H15.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M9.5 15C9.82588 15.3326 10.2148 15.5968 10.6441 15.7772C11.0734 15.9576 11.5344 16.0505 12 16.0505C12.4656 16.0505 12.9266 15.9576 13.3559 15.7772C13.7852 15.5968 14.1741 15.3326 14.5 15" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </g>
                                                            <defs>
                                                                <clipPath id="clip0_817_58183">
                                                                    <rect width="24" height="24" fill="white"></rect>
                                                                </clipPath>
                                                            </defs>
                                                        </svg>
                                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M6.76017 22H17.2402C20.0002 22 21.1002 20.31 21.2302 18.25L21.7502 9.99C21.8902 7.83 20.1702 6 18.0002 6C17.3902 6 16.8302 5.65 16.5502 5.11L15.8302 3.66C15.3702 2.75 14.1702 2 13.1502 2H10.8602C9.83017 2 8.63017 2.75 8.17017 3.66L7.45017 5.11C7.17017 5.65 6.61017 6 6.00017 6C3.83017 6 2.11017 7.83 2.25017 9.99L2.77017 18.25C2.89017 20.31 4.00017 22 6.76017 22Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M10.5 8H13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            <path d="M12 18C13.79 18 15.25 16.54 15.25 14.75C15.25 12.96 13.79 11.5 12 11.5C10.21 11.5 8.75 12.96 8.75 14.75C8.75 16.54 10.21 18 12 18Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </div>
                                                </div>
                                                <a href="">
                                                    <div class="nbl-bot-2-btn">
                                                        <button type="button" class="btn-binhluan">Bình luận</button>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="more" onclick="f_sua_xoa()">
                                            <img src="/images/binh-luan/more.svg" alt="">
                                        </div>
                                        <div class="them-cs-xoa d_none">
                                            <div class="cs-xoa-nd">
                                                <p class="chu-2 color_gray47">Chỉnh sửa</p>
                                                <p class="chu-2 color_gray47">Xóa</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="danh-gia-bl d_flex al_items-c gap10 mt10">
                                        <p class="chu-2 color_blue like" onclick="like(this)">Thích</p>
                                        <p class="chu-2 color_blue dislike d_none" onclick="dislike(this)">Bỏ thích</p>
                                        <span class="cham"></span>
                                        <p class="chu-2 color_blue" onclick="rep_cmt(this)">Phản hồi</p>

                                        <span class="cham"></span>
                                        <div class="luot-thich d_none">
                                            <div class="cam-xuc d_flex gap4 al_items-c">
                                                <img src="/images/binh-luan/ic-like.svg" alt="">
                                                <p class="chu-2 color_gray47">1</p>
                                                <span class="cham"></span>
                                            </div>

                                        </div>

                                        <div class="thoi-gian-bl">
                                            <p class="chu-2 color_99">2 ngày trước</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="rep-cmt-cmt">
                                <div class="phanhoi-1 mt20">
                                    <div class="avt-name_user">
                                        <div class="avt-status d_in-block p_relative">
                                            <div class="avt-user-ph">
                                                <img src="/images/binh-luan/ava3.svg" alt="">
                                            </div>
                                            <span class="thongbao-chamxanh"></span>
                                        </div>
                                        <p class="ten-nguoi-bl color_gray47">Nguyễn Ngọc Tuyết</p>
                                    </div>
                                    <div class="bl-tuong-tac">
                                        <div class="noi-dung-bl">
                                            <label class="noi_dung" for="">
                                                <p class="noi_dung_c color_gray47">Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus...</p>
                                            </label>
                                            <div class="d_none">
                                                <div class="nbl-bot-2 d_flex gap8 al_items-c">
                                                    <div class="nbl-bot-2-avt">
                                                        <img src="/images/binh-luan/ava3.svg" alt="">
                                                    </div>
                                                    <div class="nbl-bot-2-input d_in-block p_relative w100">
                                                        <div>
                                                            <input class="nbl-txt p_relative w100 pl16" type="text" placeholder="Nhập bình luận">
                                                        </div>
                                                        <div class="nbl-input-ic p_absolute">
                                                            <svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M9.74967 10.8333C10.9463 10.8333 11.9163 9.86328 11.9163 8.66667C11.9163 7.47005 10.9463 6.5 9.74967 6.5C8.55306 6.5 7.58301 7.47005 7.58301 8.66667C7.58301 9.86328 8.55306 10.8333 9.74967 10.8333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M14.0837 2.16602H9.75033C4.33366 2.16602 2.16699 4.33268 2.16699 9.74935V16.2493C2.16699 21.666 4.33366 23.8327 9.75033 23.8327H16.2503C21.667 23.8327 23.8337 21.666 23.8337 16.2493V10.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M20.7348 2.80571L16.8023 6.73821C16.6506 6.88988 16.499 7.18238 16.4773 7.39905L16.2606 8.90488C16.1848 9.44655 16.564 9.82571 17.1056 9.74988L18.6115 9.53321C18.8173 9.50071 19.1206 9.35988 19.2723 9.20821L23.2048 5.27571C23.8873 4.59321 24.2015 3.81321 23.2048 2.81654C22.1973 1.79821 21.4173 2.12321 20.7348 2.80571Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M20.1719 3.36914C20.5077 4.56081 21.4394 5.49247 22.631 5.82831" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M2.89258 20.5299L8.23341 16.9441C9.08924 16.3699 10.3242 16.4349 11.0934 17.0958L11.4509 17.4099C12.2959 18.1358 13.6609 18.1358 14.5059 17.4099L19.0126 13.5424C19.8576 12.8166 21.2226 12.8166 22.0676 13.5424L23.8334 15.0591" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <g clip-path="url(#clip0_817_58183)">
                                                                    <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M9 10H9.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M15 10H15.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                    <path d="M9.5 15C9.82588 15.3326 10.2148 15.5968 10.6441 15.7772C11.0734 15.9576 11.5344 16.0505 12 16.0505C12.4656 16.0505 12.9266 15.9576 13.3559 15.7772C13.7852 15.5968 14.1741 15.3326 14.5 15" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                </g>
                                                                <defs>
                                                                    <clipPath id="clip0_817_58183">
                                                                        <rect width="24" height="24" fill="white"></rect>
                                                                    </clipPath>
                                                                </defs>
                                                            </svg>
                                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M6.76017 22H17.2402C20.0002 22 21.1002 20.31 21.2302 18.25L21.7502 9.99C21.8902 7.83 20.1702 6 18.0002 6C17.3902 6 16.8302 5.65 16.5502 5.11L15.8302 3.66C15.3702 2.75 14.1702 2 13.1502 2H10.8602C9.83017 2 8.63017 2.75 8.17017 3.66L7.45017 5.11C7.17017 5.65 6.61017 6 6.00017 6C3.83017 6 2.11017 7.83 2.25017 9.99L2.77017 18.25C2.89017 20.31 4.00017 22 6.76017 22Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M10.5 8H13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M12 18C13.79 18 15.25 16.54 15.25 14.75C15.25 12.96 13.79 11.5 12 11.5C10.21 11.5 8.75 12.96 8.75 14.75C8.75 16.54 10.21 18 12 18Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                    <a href="">
                                                        <div class="nbl-bot-2-btn">
                                                            <button type="button" class="btn-binhluan">Bình luận</button>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="more" onclick="f_sua_xoa()">
                                                <img src="/images/binh-luan/more.svg" alt="">
                                            </div>
                                            <div class="them-cs-xoa d_none">
                                                <div class="cs-xoa-nd">
                                                    <p class="chu-2 color_gray47">Chỉnh sửa</p>
                                                    <p class="chu-2 color_gray47">Xóa</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="danh-gia-bl d_flex al_items-c gap10 mt10">
                                            <p class="chu-2 color_blue like" onclick="like(this)">Thích</p>
                                            <p class="chu-2 color_blue dislike d_none" onclick="dislike(this)">Bỏ thích</p>
                                            <span class="cham"></span>
                                            <p class="chu-2 color_blue" onclick="rep_cmt(this)">Phản hồi</p>

                                            <span class="cham"></span>
                                            <div class="luot-thich d_none">
                                                <div class="cam-xuc d_flex gap4 al_items-c">
                                                    <img src="/images/binh-luan/ic-like.svg" alt="">
                                                    <p class="chu-2 color_gray47">1</p>
                                                    <span class="cham"></span>
                                                </div>

                                            </div>

                                            <div class="thoi-gian-bl">
                                                <p class="chu-2 color_99">2 ngày trước</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                <?php endfor ?>
            </div>
        </div>


    </section>




    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    function share(el) {
        $(el).click(el);
        $('.popup-share').show();
        $('.close').click(function() {
            {
                $('.popup-share').hide();
            }
        })
    }

    function ds_nguoichiase(el) {
        $(el).click(el);
        $('.popup-luot-share').show();
        $('.close').click(function() {
            {
                $('.popup-luot-share').hide();
            }
        })
    }

    function ds_nguoilike(el) {
        $(el).click(el);
        $('.popup-luot-like').show();
        // $('.close').click(function(){
        //     {
        //     $('.popup-luot-like').hide();
        // }
        // }) 
    }

    function like(el) {
        $(el).click(el);
        $(el).hide();
        $('.dislike, .luot-thich').show();
    }

    function dislike(el) {
        $(el).click(el);
        $('.dislike, .luot-thich').hide();
        $('.like').show();
    }

    function rep_cmt(el) {
        $(el).click(el);
        // var x = $(el).data('id');
        $('.cmt-1').removeClass('d_none')
    }
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