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

    <title>BÌNH LUẬN</title>
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
            <p class="qlbl-1-tieude">Bình luận</p>
        </div>
        <div class="noidung-bl-tinmua">
            <div class="nhap-binhluan">
                <div class="nbl-top d_flex j_content-bw p0-30 mb12">
                    <div class="nbl-trai d_flex" onclick="ds_nguoilike(this)">
                        <div class="nbl-trai-ic">
                            <img src="/images/binh-luan/ic-like.svg" alt="">
                            <img src="/images/binh-luan/ic-haha.svg" alt="">
                            <img src="/images/binh-luan/ic-tym.svg" alt="">
                        </div>
                        <p>15</p>
                    </div>
                    <div class="nbl-phai d_flex gap15">
                        <p>25 bình luận</p>
                        <p class="soluot-chiase" onclick="ds_nguoichiase(this)">10 lượt chia sẻ</p>
                    </div>
                </div>
                <div class="nbl-cen d_flex j_content-sp al_items-c">
                    <div class="bl-like d_flex gap10">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.7169 12.6294L22.7202 12.6101C22.7774 12.2421 22.7519 11.8664 22.6458 11.5093C22.5397 11.1523 22.3558 10.8234 22.108 10.5451C21.8603 10.2667 21.5546 10.0456 21.213 9.89577C20.8728 9.74661 20.5043 9.67148 20.1327 9.67496H17.922C17.784 9.67496 17.672 9.56303 17.672 9.42496V5.69998C17.672 4.77926 17.2975 3.89989 16.6366 3.25431C16.1924 2.82039 15.6435 2.51591 15.0504 2.36305C14.1469 2.13016 13.4418 2.77668 13.2166 3.42855L10.9181 10.0816C10.8833 10.1824 10.7884 10.25 10.6818 10.25H10C9.0335 10.25 8.25 11.0335 8.25 12V19.9999C8.25 20.9664 9.0335 21.7499 10 21.7499H18.8614C19.4801 21.7557 20.0827 21.5435 20.5584 21.1485C21.033 20.7545 21.3501 20.2039 21.4472 19.5955L22.7169 12.6294Z" stroke="#474747" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <rect x="2.25" y="10.25" width="5.5" height="11.5" rx="1.75" stroke="#474747" stroke-width="1.5" />
                        </svg>
                        <p>Thích</p>
                    </div>
                    <div class="bl-comment d_flex gap10">
                        <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0.5 9.33214C0.5 4.1332 4.99145 0 10.4314 0C15.8682 0 20.3627 4.13306 20.3627 9.33214C20.3627 14.5311 15.8713 18.6643 10.4314 18.6643C9.55178 18.6643 8.6952 18.5573 7.87958 18.3536L5.09363 19.8999C4.56865 20.1913 3.92375 19.8117 3.92375 19.2112V16.3821C1.83534 14.6788 0.5 12.1588 0.5 9.33214ZM10.4314 1.43206C5.6902 1.43206 1.93206 5.01322 1.93206 9.33214C1.93206 11.7956 3.1452 14.0062 5.07169 15.4631L5.35582 15.678V18.1165L7.69446 16.8185L7.97815 16.8983C8.75226 17.116 9.57712 17.2322 10.4314 17.2322C15.1725 17.2322 18.9307 13.6511 18.9307 9.33214C18.9307 5.01336 15.1698 1.43206 10.4314 1.43206Z" fill="#474747" />
                        </svg>
                        <p>Bình luận</p>
                    </div>
                    <div class="bl-share d_flex gap10" onclick="share(this)">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.9956 15.4057L21.392 10.0981L21.4604 10.0201C21.5617 9.88411 21.6105 9.71618 21.5979 9.54711C21.5854 9.37804 21.5123 9.21918 21.392 9.09967L15.9956 3.79447L15.9212 3.73087C15.4892 3.40687 14.8532 3.71887 14.8532 4.29367V6.84967L14.5832 6.86767C10.3076 7.20607 7.80321 9.91207 7.20561 14.8201C7.12881 15.4501 7.85121 15.8449 8.31921 15.4273C10.0364 13.8937 11.8112 12.9409 13.6532 12.5593C13.9484 12.4981 14.2448 12.4513 14.5436 12.4189L14.8532 12.3913V14.9065L14.8592 15.0049C14.9312 15.5485 15.59 15.8041 15.9956 15.4057ZM14.6708 8.06407L16.0532 7.97167V5.53207L20.1884 9.59767L16.0532 13.6657V11.0773L14.426 11.2237H14.4164C12.3728 11.4433 10.4444 12.2617 8.62401 13.6261C8.98161 12.0193 9.59241 10.8109 10.3952 9.94567C11.3912 8.87167 12.7832 8.21407 14.6708 8.06287V8.06407ZM6.59961 4.80007C5.80396 4.80007 5.0409 5.11615 4.47829 5.67875C3.91568 6.24136 3.59961 7.00443 3.59961 7.80007V17.4001C3.59961 18.1957 3.91568 18.9588 4.47829 19.5214C5.0409 20.084 5.80396 20.4001 6.59961 20.4001H16.1996C16.9953 20.4001 17.7583 20.084 18.3209 19.5214C18.8835 18.9588 19.1996 18.1957 19.1996 17.4001V16.2001C19.1996 16.0409 19.1364 15.8883 19.0239 15.7758C18.9114 15.6633 18.7587 15.6001 18.5996 15.6001C18.4405 15.6001 18.2879 15.6633 18.1753 15.7758C18.0628 15.8883 17.9996 16.0409 17.9996 16.2001V17.4001C17.9996 17.8775 17.81 18.3353 17.4724 18.6729C17.1348 19.0104 16.677 19.2001 16.1996 19.2001H6.59961C6.12222 19.2001 5.66438 19.0104 5.32682 18.6729C4.98925 18.3353 4.79961 17.8775 4.79961 17.4001V7.80007C4.79961 7.32268 4.98925 6.86485 5.32682 6.52728C5.66438 6.18972 6.12222 6.00007 6.59961 6.00007H10.1996C10.3587 6.00007 10.5114 5.93686 10.6239 5.82434C10.7364 5.71182 10.7996 5.5592 10.7996 5.40007C10.7996 5.24094 10.7364 5.08833 10.6239 4.97581C10.5114 4.86329 10.3587 4.80007 10.1996 4.80007H6.59961Z" fill="black" />
                        </svg>
                        <p>Chia sẻ</p>
                    </div>
                    <? include("../modals/popup_binhluan.php"); ?>
                </div>
                <div class="nbl-bot">
                    <div class="nbl-bot-1 d_flex j_content-bw p12-10">
                        <p style="text-decoration: underline;">Xem các bình luận trước</p>
                        <p>Mới nhất
                            <span>
                                <svg width="11" height="9" viewBox="0 0 11 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.79904 7.75C6.22169 8.75 4.77831 8.75 4.20096 7.75L1.16987 2.5C0.592523 1.5 1.31421 0.25 2.46891 0.25L8.53109 0.250001C9.68579 0.250001 10.4075 1.5 9.83013 2.5L6.79904 7.75Z" fill="#474747" />
                                </svg>
                            </span>
                        </p>
                    </div>
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
                                    <path d="M9.74967 10.8333C10.9463 10.8333 11.9163 9.86328 11.9163 8.66667C11.9163 7.47005 10.9463 6.5 9.74967 6.5C8.55306 6.5 7.58301 7.47005 7.58301 8.66667C7.58301 9.86328 8.55306 10.8333 9.74967 10.8333Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M14.0837 2.16602H9.75033C4.33366 2.16602 2.16699 4.33268 2.16699 9.74935V16.2493C2.16699 21.666 4.33366 23.8327 9.75033 23.8327H16.2503C21.667 23.8327 23.8337 21.666 23.8337 16.2493V10.8327" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M20.7348 2.80571L16.8023 6.73821C16.6506 6.88988 16.499 7.18238 16.4773 7.39905L16.2606 8.90488C16.1848 9.44655 16.564 9.82571 17.1056 9.74988L18.6115 9.53321C18.8173 9.50071 19.1206 9.35988 19.2723 9.20821L23.2048 5.27571C23.8873 4.59321 24.2015 3.81321 23.2048 2.81654C22.1973 1.79821 21.4173 2.12321 20.7348 2.80571Z" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M20.1719 3.36914C20.5077 4.56081 21.4394 5.49247 22.631 5.82831" stroke="white" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M2.89258 20.5299L8.23341 16.9441C9.08924 16.3699 10.3242 16.4349 11.0934 17.0958L11.4509 17.4099C12.2959 18.1358 13.6609 18.1358 14.5059 17.4099L19.0126 13.5424C19.8576 12.8166 21.2226 12.8166 22.0676 13.5424L23.8334 15.0591" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_817_58183)">
                                        <path d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9 10H9.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M15 10H15.01" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M9.5 15C9.82588 15.3326 10.2148 15.5968 10.6441 15.7772C11.0734 15.9576 11.5344 16.0505 12 16.0505C12.4656 16.0505 12.9266 15.9576 13.3559 15.7772C13.7852 15.5968 14.1741 15.3326 14.5 15" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_817_58183">
                                            <rect width="24" height="24" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M6.76017 22H17.2402C20.0002 22 21.1002 20.31 21.2302 18.25L21.7502 9.99C21.8902 7.83 20.1702 6 18.0002 6C17.3902 6 16.8302 5.65 16.5502 5.11L15.8302 3.66C15.3702 2.75 14.1702 2 13.1502 2H10.8602C9.83017 2 8.63017 2.75 8.17017 3.66L7.45017 5.11C7.17017 5.65 6.61017 6 6.00017 6C3.83017 6 2.11017 7.83 2.25017 9.99L2.77017 18.25C2.89017 20.31 4.00017 22 6.76017 22Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M10.5 8H13.5" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    <path d="M12 18C13.79 18 15.25 16.54 15.25 14.75C15.25 12.96 13.79 11.5 12 11.5C10.21 11.5 8.75 12.96 8.75 14.75C8.75 16.54 10.21 18 12 18Z" stroke="#999999" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
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
            </div>
            <div class="ds-binhluan">
                <?php for( $i=0; $i<3; $i++) : ?>
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