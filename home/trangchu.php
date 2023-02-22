<?

include("config.php");

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
}

$danhmuc = new db_query("SELECT `cat_id`,`cat_name`,`cat_picture` FROM `category` WHERE `cat_parent_id` = 0 ORDER BY `cat_id` ASC LIMIT 14");
//TIN ĐĂNG
$tindang = "SELECT `new_id`, `new_title`, `link_title`, `new_unit`, `chotang_mphi`, `new_update_time`, `dia_chi`, `new_money`,`gia_kt`,
            `new_image`, `new_pin_home`, `chat365_id`, `chat365_secret`, `usc_name`, `new_city`, `xacthuc_lket`, `usc_name`, `usc_phone`,
            `usc_email`, `usc_store_name`, `new_user_id`, `new_type` FROM `new`
            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id` WHERE `new_buy_sell` = 2
            AND `da_ban` != 1 ORDER BY `new_order` DESC, `new_pin_home` DESC, `new_id` DESC LIMIT 94";
$query_home = new db_query($tindang);
$qr_home = $query_home->result_array();

$tdang_tr = [];
$tdang_tr1 = [];
$tdang_tr2 = [];
foreach ($qr_home as $key => $row_td) {
    if ($key < 30) {
        $tdang_tr[] = $row_td;
    } else if ($key >= 30 && $key < 62) {
        $tdang_tr1[] = $row_td;
    } else if ($key >= 62) {
        $tdang_tr2[] = $row_td;
    }
};

$qr_chat = [];
$qr_chat2 = [];

foreach ($qr_home as $row_chat) {
    $qr_chat[] = (int)trim($row_chat['chat365_id']);
};

$qr_chat = array_unique($qr_chat);
foreach ($qr_chat as $row_chat2) {
    $qr_chat2[] = (int)$row_chat2;
}
$qr_chat2 = json_encode($qr_chat2);

$curl = curl_init();
$data = array(
    'arrayUser' => $qr_chat2,
);
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:9000/api/users/getstatus/arrayuser');
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
$response = curl_exec($curl);
curl_close($curl);
$data_list = json_decode($response, true);
$list_gtri = $data_list['data']['result'];
$qr_gtri = array_column($list_gtri, 'status', 'id');

$boqua = ['Đang ', 'Không hoạt động', 'Hoạt động', 'trước', 'Vừa truy cập', 'hoạt động'];




?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

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

    <link rel="stylesheet" type="text/css" href="/css/style_new/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/slick.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/trangchu.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/header.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/footer.css?v=<?= $version ?>">

    <style>

    </style>
</head>

<body>
    <? include('../includes/inc_new/header.php'); ?>
    <div class="search trang_chu">
        <div class="search_bg_1">
            <div class="search_bg_1_pb">
                <h1>Rao vặt miễn phí - Mua bán tức thì</h1>
                <form action="/home/quicksearch_2.php" method="POST" id="search-form" class="pt_30 enter_search">
                    <div class="tk_key">
                        <input value="<?= $tentim_kiem ?>" type="text" class="key_search" id="keyword" placeholder="Tìm kiếm trên Raonhanh365" name="new_name" autocomplete="off">
                    </div>
                    <div class="nd_box_key d_none">
                        <?php if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                            $us_id = $_COOKIE['UID']; ?>
                            <div class="kq_lq" id="key_lq">
                                <p class="text_def">Tìm kiếm gần đây</p>
                                <div id="fts_idautocomplete-list" class="autocomplete-items-tag">
                                    <?
                                    if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                        $qr_search = new db_query("SELECT `key_search`FROM `search` WHERE user_id = " . $us_id . " ORDER BY created_at desc limit 20");
                                        $lis_search = $qr_search->result_array();
                                        if (count($lis_search) > 0) {
                                            foreach ($lis_search as $item => $type) { ?>
                                                <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['key_search']) ?>"> <?= str_replace("-", " ", $type['key_search'])  ?></p>
                                            <?  }
                                            unset($item, $type);
                                        }
                                        if (count($lis_search) == 0) { ?>
                                            <p class="key_tag">Bạn chưa tìm kiếm</p>
                                    <? }
                                    } ?>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="kq_lq" id="key_lq">
                                <p class="text_def">Tìm kiếm gần đây</p>
                                <div id="fts_idautocomplete-list" class="autocomplete-items-tag">
                                </div>
                            </div>
                        <?php } ?>
                        <div class="kq_gy" id="list_cate">
                            <p class="text_def">Từ khóa phổ biến</p>
                            <div id="fts_idautocomplete-list" class="autocomplete-items">
                                <? foreach ($db_cat as $item => $type) {
                                    if (isset($timkiem_mua) && $timkiem_mua != "") {
                                        if (in_array($type['cat_id'], $bodmuc_mua) == false) { ?>
                                            <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?>"><?= ($type['cat_id'] != 121) ? $type['cat_name'] : 'Tìm ứng viên' ?></p>
                                        <? }
                                    } else if (!isset($timkiem_mua) && $timkiem_mua == "") {
                                        if (in_array($type['cat_id'], $bodmuc_ban) == false) { ?>
                                            <p class="key_tag" onclick="click_search(this)" data-name="<?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?>"><?= ($type['cat_id'] != 120) ? $type['cat_name'] : 'Tìm việc làm' ?></p>
                                <? }
                                    }
                                }
                                unset($item, $type);
                                ?>
                            </div>
                        </div>
                        <div class="icon_X">
                            <img src="/images/anh_moi/close.png">
                        </div>
                    </div>
                    <div class="tk_cit">
                        <div class="timk_tthanh_icon">
                            <div class="icon_timk">
                                <img src="/images/img_new/search.svg">
                            </div>
                            <select id="city_search" class="city_search" name="name_city">
                                <option value="">Chọn tỉnh/thành</option>
                                <? foreach ($arrcity as $item_cty) { ?>
                                    <option <?= isset($citid) ? ($citid == $item_cty['cit_id'] ? "selected" : "") : "" ?> value="<?= $item_cty['cit_id'] ?>"><?= $item_cty['cit_name'] ?></option>
                                <? }
                                unset($item_cty); ?>
                            </select>
                        </div>
                        <input type="hidden" name="phan_biet_mb" class="tkiem_pbiet_mb" value="<?= (isset($timkiem_mua) && $timkiem_mua != "") ? "1" : "2" ?>">
                        <button type="submit" class="btn_timkiem button sh_cursor">Tìm kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="search_bg_2"></div>
    </div>
    <div class="trang_chu">
        <div class="content">
            <div class="post">
                <div class="content_post">
                    <div class="header_post">
                        <h2 class="tde_tcmoi_tdang">Tin đăng nổi bật</h2>
                        <a href="/tat-ca-tin-dang-ban.html">Xem tất cả</a>
                    </div>
                    <div class="posted posted_1 info_purchase_content1">
                        <? foreach ($tdang_tr as $item_td) {
                            $link_tnb = ($item_td['link_title'] != "") ? replaceTitle($item_td['link_title'])  : replaceTitle($item_td['new_title']);
                            $img_tdnb = $item_td['new_image'];
                            $id_tin = $item_td['new_id'];
                            $img_tdnb1 = explode(';', $img_tdnb);
                            $img_tdnb2 = count($img_tdnb1); ?>
                            <div class="tdnb">
                                <div class="top_spham">
                                    <? if ($img_tdnb2 > 1) { ?>
                                        <div class="numimg">
                                            <img src="/images/img_new/image.svg" alt="ảnh sản phẩm">
                                            <span><?= $img_tdnb2 ?></span>
                                        </div>
                                    <? } ?>
                                    <? if (isset($_COOKIE['UID'])) { ?>
                                        <button class="ava_td_btn btn_save <?= (in_array($id_tin, $list_new_like)) ? "active" : "" ?>" onclick="yeu_thich(this)" data="<?= $item_td['new_id'] ?>"></button>
                                    <? } else { ?>
                                        <button class="ava_td_btn btn_save op_ovl_dn"></button>
                                    <? } ?>
                                    <div class="img_td">
                                        <a href="<?= '/' . $link_tnb . '-c' . $item_td['new_id'] . '.html'; ?>">
                                            <img class="lazyload" src="/images/loading.gif" data-src="<?= $img_tdnb1[0] ?>" onerror="this.onerror=null; this.src='/images/img_new/avt_daidien1.png';" alt="<?= $item_td['new_title'] ?>">
                                        </a>
                                    </div>
                                    <p class="hoatdong_chat item_chat <?= (isset($qr_gtri[$item_td['chat365_id']]) && str_replace($boqua, '', $qr_gtri[$item_td['chat365_id']]) != "") ? "co_ddong" : "" ?>" id-chat="<?= $item_td['chat365_id'] ?>">
                                        <?= (isset($qr_gtri[$item_td['chat365_id']])) ? str_replace($boqua, '', $qr_gtri[$item_td['chat365_id']]) : "" ?>
                                    </p>
                                    <? if ($item_td['xacthuc_lket'] == 1 && $item_td['new_money'] != 0 && $item_td['new_money'] != "" && $item_td['new_cate_id'] != 120) { ?>
                                        <div class="dambao">
                                            <img width="16px" height="16px" src="/images/img_new/shield.svg" alt="Thanh toán đảm bảo">
                                            <span>Thanh toán đảm bảo</span>
                                        </div>
                                    <? } ?>
                                </div>
                                <div class="but_spham">
                                    <h3>
                                        <a href="<?= '/' . $link_tnb . '-c' . $item_td['new_id'] . '.html'; ?>" class="title_td">
                                            <?= $item_td['new_title'] ?>
                                        </a>
                                    </h3>
                                    <div class="user">
                                        <img src="/images/img_new/frame.svg" alt="Người đăng">
                                        <p><?= $item_td['usc_name'] ?></p>
                                    </div>
                                    <div class="info_post">
                                        <div class="info_post_1">
                                            <img src="/images/img_new/location.svg" alt="Địa chỉ">
                                            <p><?= $arrcity[$item_td['new_city']]['cit_name'] ?></p>
                                        </div>
                                        <div class="info_post_2">
                                            <img src="/images/img_new/timer.svg" alt="Ngày đăng">
                                            <p><?= lay_tgian($item_td['new_update_time']) ?></p>
                                        </div>
                                        <div class="info_post_3">
                                            <? if ($item_td['new_cate_id'] != 120 && $item_td['new_cate_id'] != 121) {
                                                if ($item_td['chotang_mphi'] != 0) { ?>
                                                    <p>Tặng miễn phí</p>
                                                <? } else if ($item_td['chotang_mphi'] == 0 && ($item_td['new_money'] == "" || $item_td['new_money'] == 0)) { ?>
                                                    <p>Liên hệ để hỏi giá</p>
                                                <? } else { ?>
                                                    <p><?= number_format($item_td['new_money']); ?> <?= $arr_dvtien[$item_td['new_unit']] ?></p>
                                                <? }
                                            } else {
                                                if ($item_td['new_money'] != 0 && $item_td['gia_kt'] != 0) { ?>
                                                    <p><?= number_format($item_td['new_money']) . ' - ' . number_format($item_td['gia_kt']) . ' ' . $arr_dvtien[$item_td['new_unit']] ?></p>
                                                <? } else if ($item_td['new_money'] != 0 && $item_td['gia_kt'] == 0) { ?>
                                                    <p><?= 'Từ ' . number_format($item_td['new_money']) . ' ' . $arr_dvtien[$item_td['new_unit']] ?></p>
                                                <? } else if ($item_td['new_money'] == 0 && $item_td['gia_kt'] != 0) { ?>
                                                    <p><?= 'Đến ' . number_format($item_td['gia_kt']) . ' ' . $arr_dvtien[$item_td['new_unit']] ?></p>
                                                <? } else { ?>
                                                    <p>Thỏa thuận</p>
                                            <? }
                                            } ?>
                                        </div>
                                        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                            <div class="info_post_4 chatactive item_chat sh_cursor" id-chat="<?= $item_td['chat365_id'] ?>" rel="nofollow">
                                                <a class="chatngay_ctiet" href="<?= '/' . $link_tnb . '-c' . $item_td['new_id'] . '.html'; ?>" data="<?= $item_td['chat365_id'] ?>" data1="<?= $item_td['new_user_id'] ?>" data2="<?= ($item_td['usc_email'] != "") ? $item_td['usc_email'] : $item_td['usc_phone'] ?>" data3="<?= ($item_td['new_type'] == 1) ? $item_td['usc_name'] : $item_td['usc_store_name'] ?>" onclick="chat_taget(this)">Chat</a>
                                            </div>
                                        <? } else { ?>
                                            <div class="info_post_4 chatactive item_chat op_ovl_dn sh_cursor" id-chat="<?= $item_td['chat365_id'] ?>">
                                                <a class="chatngay_ctiet">Chat</a>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        <? unset($link_tnb);
                        } ?>
                    </div>
                </div>

                <div class="content_post mt_20">
                    <div class="header_post">
                        <h2 class="tde_tcmoi_tdang">Tin đăng hấp dẫn</h2>
                        <a>Xem tất cả</a>
                    </div>
                    <div class="posted posted_2 info_purchase_content2">
                        <? foreach ($tdang_tr1 as $item_td1) {
                            $link_tnb1 = ($item_td1['link_title'] != "") ? replaceTitle($item_td1['link_title'])  : replaceTitle($item_td1['new_title']);
                            $img_tdnb1 = $item_td1['new_image'];
                            $id_tin1 = $item_td1['new_id'];
                            $img_tdnb1 = explode(';', $img_tdnb1);
                            $img_tdnb2 = count($img_tdnb1); ?>
                            <div class="tdhd">
                                <div class="ava_td">
                                    <? if ($img_tdnb2 > 1) { ?>
                                        <div class="num_ava_td">
                                            <img src="/images/img_new/image.svg" alt="ảnh sản phẩm">
                                            <span><?= $img_tdnb2 ?></span>
                                        </div>
                                    <? } ?>
                                    <? if (isset($_COOKIE['UID'])) { ?>
                                        <button class="ava_td_btn btn_save <?= (in_array($id_tin1, $list_new_like)) ? "active" : "" ?>" onclick="yeu_thich(this)" data="<?= $item_td1['new_id'] ?>"></button>
                                    <? } else { ?>
                                        <button class="ava_td_btn btn_save op_ovl_dn"></button>
                                    <? } ?>
                                    <div class=" img_td_2">
                                        <a href="<?= '/' . $link_tnb1 . '-c' . $item_td1['new_id'] . '.html'; ?>">
                                            <img class="lazyload" src="/images/loading.gif" data-src="<?= $img_tdnb1[0] ?>" onerror="this.onerror=null; this.src='/images/img_new/avt_daidien.png';" alt="<?= $item_td1['new_title'] ?>">
                                        </a>
                                    </div>
                                    <p class="hoatdong_chat item_chat <?= (isset($qr_gtri[$item_td1['chat365_id']]) && str_replace($boqua, '', $qr_gtri[$item_td1['chat365_id']]) != "") ? "co_ddong" : "" ?>" id-chat="<?= $item_td1['chat365_id'] ?>">
                                        <?= (isset($qr_gtri[$item_td1['chat365_id']])) ? str_replace($boqua, '', $qr_gtri[$item_td1['chat365_id']]) : "" ?>
                                    </p>
                                    <? if ($item_td1['xacthuc_lket'] == 1 && $item_td1['new_money'] != 0 && $item_td1['new_money'] != "" && $item_td1['new_cate_id'] != 120) { ?>
                                        <div class="dambao">
                                            <img width="16px" height="16px" src="/images/img_new/shield.svg">
                                            <span>Thanh toán đảm bảo</span>
                                        </div>
                                    <? } ?>
                                </div>
                                <div class="info_td">
                                    <h3>
                                        <a href="<?= '/' . $link_tnb1 . '-c' . $item_td1['new_id'] . '.html'; ?>" class="tit_td">
                                            <?= $item_td1['new_title'] ?>
                                        </a>
                                    </h3>
                                    <div class="user">
                                        <img src="/images/img_new/frame.svg" alt="Người đăng">
                                        <p><?= $item_td1['usc_name'] ?></p>
                                    </div>
                                    <div class="info_post">
                                        <div class="info_post_1">
                                            <img src="/images/img_new/location.svg" alt="Địa chỉ">
                                            <p><?= $arrcity[$item_td1['new_city']]['cit_name'] ?></p>
                                        </div>
                                        <div class="info_post_2">
                                            <img src="/images/img_new/timer.svg" alt="Ngày đăng">
                                            <p><?= lay_tgian($item_td1['new_update_time']) ?></p>
                                        </div>
                                        <div class="info_post_3">
                                            <? if ($item_td1['new_cate_id'] != 120 && $item_td1['new_cate_id'] != 121) {
                                                if ($item_td1['chotang_mphi'] != 0) { ?>
                                                    <p>Tặng miễn phí</p>
                                                <? } else if ($item_td1['chotang_mphi'] == 0 && ($item_td1['new_money'] == "" || $item_td1['new_money'] == 0)) { ?>
                                                    <p>Liên hệ để hỏi giá</p>
                                                <? } else { ?>
                                                    <p><?= number_format($item_td1['new_money']); ?> <?= $arr_dvtien[$item_td1['new_unit']] ?></p>
                                                <? }
                                            } else {
                                                if ($item_td1['new_money'] != 0 && $item_td1['gia_kt'] != 0) { ?>
                                                    <p><?= number_format($item_td1['new_money']) . ' - ' . number_format($item_td1['gia_kt']) . ' ' . $arr_dvtien[$item_td1['new_unit']] ?></p>
                                                <? } else if ($item_td1['new_money'] != 0 && $item_td1['gia_kt'] == 0) { ?>
                                                    <p><?= 'Từ ' . number_format($item_td1['new_money']) . ' ' . $arr_dvtien[$item_td1['new_unit']] ?></p>
                                                <? } else if ($item_td1['new_money'] == 0 && $item_td1['gia_kt'] != 0) { ?>
                                                    <p><?= 'Đến ' . number_format($item_td1['gia_kt']) . ' ' . $arr_dvtien[$item_td1['new_unit']] ?></p>
                                                <? } else { ?>
                                                    <p>Thỏa thuận</p>
                                            <? }
                                            } ?>
                                        </div>
                                        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                            <div class="info_post_4 chatactive item_chat sh_cursor" id-chat="<?= $item_td1['chat365_id'] ?>" rel="nofollow">
                                                <a class="chatngay_ctiet" href="<?= '/' . $link_tnb1 . '-c' . $item_td1['new_id'] . '.html'; ?>">Chat</a>
                                            </div>
                                        <? } else { ?>
                                            <div class="info_post_4 chatactive item_chat op_ovl_dn sh_cursor" id-chat="<?= $item_td1['chat365_id'] ?>">
                                                <a class="chatngay_ctiet">Chat</a>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        <? unset($link_tnb1);
                        } ?>
                    </div>
                </div>

                <div class="content_post mt_20">
                    <div class="header_post">
                        <h2 class="tde_tcmoi_tdang">Tin đăng thương hiệu</h2>
                        <a>Xem tất cả</a>
                    </div>
                    <div class="posted posted_2 info_purchase_content2">
                        <? foreach ($tdang_tr2 as $item_td2) {
                            $link_tnb2 = ($item_td2['link_title'] != "") ? replaceTitle($item_td2['link_title'])  : replaceTitle($item_td2['new_title']);
                            $img_tdnb1 = $item_td2['new_image'];
                            $id_tin2 = $item_td2['new_id'];
                            $img_tdnb1 = explode(';', $img_tdnb1); ?>
                            <div class="tdth">
                                <div class="ava_td">
                                    <? if (count($img_tdnb1) > 1) { ?>
                                        <div class="num_ava_td">
                                            <img src="/images/img_new/image.svg" alt="">
                                            <span><?= count($img_tdnb1) ?></span>
                                        </div>
                                    <? } ?>
                                    <? if (isset($_COOKIE['UID'])) { ?>
                                        <button class="ava_td_btn btn_save <?= (in_array($id_tin2, $list_new_like)) ? "active" : "" ?>" onclick="yeu_thich(this)" data="<?= $item_td2['new_id'] ?>"></button>
                                    <? } else { ?>
                                        <button class="ava_td_btn btn_save op_ovl_dn"></button>
                                    <? } ?>
                                    <div class="img_td_2">
                                        <a href="<?= '/' . $link_tnb2 . '-c' . $id_tin2 . '.html'; ?>">
                                            <img class="lazyload" src="/images/loading.gif" data-src="<?= ($item_td2['new_image'] != "") ? $img_tdnb1[0] : '/images/img_new/avt_daidien.png' ?>" onerror="this.onerror=null; this.src='/images/img_new/avt_daidien.png';" alt="<?= $item_td2['new_title'] ?>">
                                        </a>
                                    </div>
                                    <p class="hoatdong_chat item_chat <?= (isset($qr_gtri[$item_td2['chat365_id']]) && str_replace($boqua, '', $qr_gtri[$item_td2['chat365_id']]) != "") ? "co_ddong" : "" ?>" id-chat="<?= $item_td2['chat365_id'] ?>">
                                        <?= (isset($qr_gtri[$item_td2['chat365_id']])) ? str_replace($boqua, '', $qr_gtri[$item_td2['chat365_id']]) : "" ?>
                                    </p>
                                    <? if ($item_td2['xacthuc_lket'] == 1 && $item_td2['new_money'] != 0 && $item_td2['new_money'] != "" && $item_td2['new_cate_id'] != 120) { ?>
                                        <div class="dambao">
                                            <img width="16px" height="16px" src="/images/img_new/shield.svg" alt="Thanh toán đảm bảo">
                                            <span>Thanh toán đảm bảo</span>
                                        </div>
                                    <? } ?>
                                </div>
                                <div class="info_td">
                                    <h3>
                                        <a href="<?= '/' . $link_tnb2 . '-c' . $id_tin2 . '.html'; ?>" class="tit_td">
                                            <?= $item_td2['new_title'] ?>
                                        </a>
                                    </h3>
                                    <div class="user">
                                        <img src="/images/img_new/frame.svg" alt="Người đăng">
                                        <p><?= $item_td2['usc_name'] ?></p>
                                    </div>
                                    <div class="info_post">
                                        <div class="info_post_1">
                                            <img src="/images/img_new/location.svg" alt="Địa chỉ">
                                            <p><?= $arrcity[$item_td2['new_city']]['cit_name'] ?></p>
                                        </div>
                                        <div class="info_post_2">
                                            <img src="/images/img_new/timer.svg" alt="Ngày đăng">
                                            <p><?= lay_tgian($item_td2['new_update_time']) ?></p>
                                        </div>
                                        <div class="info_post_3">
                                            <? if ($item_td2['new_cate_id'] != 120 && $item_td2['new_cate_id'] != 121) {
                                                if ($item_td2['chotang_mphi'] != 0) { ?>
                                                    <p>Tặng miễn phí</p>
                                                <? } else if ($item_td2['chotang_mphi'] == 0 && ($item_td2['new_money'] == "" || $item_td2['new_money'] == 0)) { ?>
                                                    <p>Liên hệ để hỏi giá</p>
                                                <? } else { ?>
                                                    <p><?= number_format($item_td2['new_money']); ?> <?= $arr_dvtien[$item_td2['new_unit']] ?></p>
                                                <? }
                                            } else {
                                                if ($item_td2['new_money'] != 0 && $item_td2['gia_kt'] != 0) { ?>
                                                    <p><?= number_format($item_td2['new_money']) . ' - ' . number_format($item_td2['gia_kt']) . ' ' . $arr_dvtien[$item_td2['new_unit']] ?></p>
                                                <? } else if ($item_td2['new_money'] != 0 && $item_td2['gia_kt'] == 0) { ?>
                                                    <p><?= 'Từ ' . number_format($item_td2['new_money']) . ' ' . $arr_dvtien[$item_td2['new_unit']] ?></p>
                                                <? } else if ($item_td2['new_money'] == 0 && $item_td2['gia_kt'] != 0) { ?>
                                                    <p><?= 'Đến ' . number_format($item_td2['gia_kt']) . ' ' . $arr_dvtien[$item_td2['new_unit']] ?></p>
                                                <? } else { ?>
                                                    <p>Thỏa thuận</p>
                                            <? }
                                            } ?>
                                        </div>
                                        <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                            <div class="info_post_4 chatactive item_chat sh_cursor" id-chat="<?= $item_td2['chat365_id'] ?>" rel="nofollow">
                                                <a class="chatngay_ctiet" href="<?= '/' . $link_tnb2 . '-c' . $id_tin2 . '.html'; ?>">Chat</a>
                                            </div>
                                        <? } else { ?>
                                            <div class="info_post_4 chatactive item_chat op_ovl_dn sh_cursor" id-chat="<?= $item_td2['chat365_id'] ?>">
                                                <a class="chatngay_ctiet">Chat</a>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            </div>
                        <?php unset($link_tnb2);
                        } ?>
                    </div>
                </div>

                <div class="content_post mt_20 is_pc">
                    <p class="hotline1">Hotline hỗ trợ</p>
                    <p class="hotline2">Hotline tư vấn</p>
                    <div class="list_phone">
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0981.208.813</span>
                            <li>Nhóm Thùy Linh</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0946.131.908</span>
                            <li>Nhóm Thanh Hoa</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0985.771.347</span>
                            <li>Nhóm Huyền Ly</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0971.207.216</span>
                            <li>Nhóm Ngọc Hà</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0904.646.975</span>
                            <li>Nhóm Mai Hương</li>
                        </div>
                    </div>
                    <p class="dv">CSKH & Khiếu nại dịch vụ</p>
                    <div class="lien_lac">
                        <a class="btn_call"><img width="20px" height="20px" src="/images/img_new/phone_blue.svg" alt="Hotline"> Hotline: <span>1900633682 - phím 1</span></a>
                        <a class="btn_chat">
                            <p><img src="/images/img_new/chat_blue.svg" class="icon_chat"><img src="/images/img_new/Chat 365.svg" class="text_chat"></p>
                        </a>
                        <a class="btn_live">
                            <p><img src="/images/img_new/Live Chat.svg" class="text_live"></p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="chat_online">
                <div class="chat_online_child1">
                    <div class="tit_chat">
                        <div class="tit_chat_left"></div>
                        <div class="tit_chat_mid">
                            <img width="30px" height="30px" src="/images/img_new/chaton.svg" style="margin: 5px;">
                            <p>KHÁCH HÀNG ONLINE</p>
                        </div>
                        <div class="tit_chat_right"></div>
                    </div>
                    <div class="more">
                        <a>Xem Thêm<img src="/images/img_new/arrow-right.svg"></a>
                    </div>
                    <div class="w_100 list_client" id="list_chat">
                    </div>
                </div>
                <div class="chat_online_child2 mt_20">
                    <div class="tit_chat">
                        <div class="tit_chat_left"></div>
                        <div class="tit_chat_mid">
                            <p>DANH MỤC</p>
                        </div>
                        <div class="tit_chat_right"></div>
                    </div>
                    <div class="w_100 list_cat_all">
                        <ul class="list_cat">
                            <? foreach ($db_cat1 as $item_dmuc) {
                                if ($item_dmuc['cat_id'] != 119) {
                                    $link_dm = '/mua-ban/' . $item_dmuc['cat_id'] . '/' . replaceTitle($item_dmuc['cat_name']) . '.html';
                                } else {
                                    $link_dm = '/viec-lam.html';
                                }; ?>
                                <li><a href="<?= $link_dm ?>"><img src="<?= $item_dmuc['cat_img4'] ?>"><?= $item_dmuc['cat_name'] ?></a></li>
                            <? } ?>
                            <!-- <li><a><img src="/images/img_new/batdongsan.svg">Bất động sản</a></li>
                            <li><a></a><img src="/images/img_new/xeco.svg">Xe cộ</a></li>
                            <li><a><img src="/images/img_new/dientu.svg">Đồ điện tử</a></li>
                            <li><a><img src="/images/img_new/vieclam.svg">Việc làm</a></li>
                            <li><a><img src="/images/img_new/thucung.svg">Thú cưng</a></li>
                            <li><a><img src="/images/img_new/thucpham.svg">Thực phẩm, đồ uống</a></li>
                            <li><a><img src="/images/img_new/tulanh.svg">Tủ lạnh, máy lạnh, máy giặt</a></li>
                            <li><a><img src="/images/img_new/giadung.svg">Đồ gia dụng, nội thất, cây cảnh</a></li>
                            <li><a><img src="/images/img_new/mevabe.svg">Mẹ và bé</a></li>
                            <li><a><img src="/images/img_new/thoitrang.svg">Thời trang, đồ dung cá nhân</a></li>
                            <li><a><img src="/images/img_new/giaitri.svg">Giải trí, thể thao, sở thích</a></li>
                            <li><a><img src="/images/img_new/dulich.svg">Du lịch, dịch vụ</a></li>
                            <li><a><img src="/images/img_new/congnghiep.svg">Đồ dùng văn phòng, công nông nghiệp</a></li> -->
                        </ul>
                    </div>
                </div>
                <div class="chat_online_child2 mt_20">
                    <div class="tit_chat">
                        <div class="tit_chat_left"></div>
                        <div class="tit_chat_mid">
                            <p>TỈNH THÀNH</p>
                        </div>
                        <div class="tit_chat_right"></div>
                    </div>
                    <div class="w_100 list_cit_all">
                        <ul class="list_cit">
                            <? foreach ($arrcity as $item_tt) { ?>
                                <li data="<?= $item_tt['cit_id'] ?>"><a href="<?= '/mua-ban/rao-vat/' . $item_tt['cit_id'] . '/' . replaceTitle($item_tt['cit_name']) . '.html' ?>"><?= $item_tt['cit_name'] ?></a></li>
                            <? } ?>
                        </ul>
                    </div>
                </div>

                <div class="content_post mt_20 is_tablet">
                    <p class="hotline1">Hotline hỗ trợ</p>
                    <p class="hotline2">Hotline tư vấn</p>
                    <div class="list_phone">
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0981.208.813</span>
                            <li>Nhóm Thùy Linh</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0946.131.908</span>
                            <li>Nhóm Thanh Hoa</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0985.771.347</span>
                            <li>Nhóm Huyền Ly</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0971.207.216</span>
                            <li>Nhóm Ngọc Hà</li>
                        </div>
                        <div class="phonenumber">
                            <img src="/images/img_new/vector_red.svg">
                            <span>0904.646.975</span>
                            <li>Nhóm Mai Hương</li>
                        </div>
                    </div>
                    <p class="dv">CSKH & Khiếu nại dịch vụ</p>
                    <div class="lien_lac">
                        <a class="btn_call"><img width="20px" height="20px" src="/images/img_new/phone_blue.svg" alt=""> Hotline: <span>1900633682 - phím 1</span></a>
                        <a class="btn_chat">
                            <p><img src="/images/img_new/chat_blue.svg" class="icon_chat"><img src="/images/img_new/Chat 365.svg" class="text_chat"></p>
                        </a>
                        <a class="btn_live">
                            <p><img src="/images/img_new/Live Chat.svg" class="text_live"></p>
                        </a>
                        <a class="btn_chat w715"><img width="20px" height="20px" src="/images/img_new/chat_blue.svg" alt="" class="icon_chat"><img src="/images/img_new/Chat 365.svg" class="text_chat"></span></a>
                        <a class="btn_live w715"><img src="/images/img_new/Live chat.svg" alt="Live chat"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include '../modals/md_tb_yeuthich.php' ?>
    <? include('../includes/inc_new/footer.php'); ?>
    <script>
        $(document).ready(function() {
            $('.info_purchase_content1').slick({
                infinite: true,
                rows: 5,
                slidesPerRow: 3,
                arrows: true,
                dots: true,

                responsive: [{
                    breakpoint: 769,
                    settings: {
                        slidesPerRow: 2,
                        arrows: true,
                        dots: true,
                    }
                }, {
                    breakpoint: 480,
                    settings: {
                        slidesPerRow: 1,
                        arrows: true,
                        dots: true,
                    }
                }, ]
            });
            $('.info_purchase_content2').slick({
                infinite: true,
                rows: 8,
                slidesPerRow: 2,
                arrows: true,
                dots: true,

                responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesPerRow: 1,
                        arrows: true,
                        dots: true,
                    }
                }, ]
            });

            $(".tdhd").parent().css("display", "flex");
            $(".tdhd").parent().css("justify-content", "space-around");
            $(".tdth").parent().css("display", "flex");
            $(".tdth").parent().css("justify-content", "space-around");
        });
        $(".nav-utiliti").click(function() {
            $(".sub_menu_ul").toggleClass("d_none");
            $(".nav-utiliti_text").toggleClass("cl_ti");
            $(".nav-utiliti_icon").toggleClass("d_rotate");
        })
        $(".drop_menu").click(function() {
            $(".nav-menu-tab").toggleClass("d_none");
        })
        // $(".user_manager").click(function() {
        //     $(".popup_user_sdn").toggle(500);
        // })
        $(".ava_td_btn").click(function() {
            $(this).toggleClass("active");
        })
        $(".tk_key").click(function() {
            $(".nd_box_key").removeClass("d_none");
        })
        $(".icon_X").click(function() {
            $(".nd_box_key").addClass("d_none");
        })

        $(".tienich").click(function() {
            $(this).parents('li').find(".tienich_con").toggle();
        });

        $(".nav-utiliti").click(function() {
            $(this).parents('li').find(".sub_menu_ul").toggle();
        })

        function chat_taget(id) {
            var id_chat = $(id).attr("data");
            var id_user = $(id).attr("data1");
            var tk_user = $(id).attr("data2");
            var name_user = $(id).attr("data3");
            $.ajax({
                url: '/render/chat_link.php',
                type: 'POST',
                data: {
                    id_chat: id_chat,
                    id_user: id_user,
                    tk_user: tk_user,
                    name_user: name_user,
                },
                success: function(data) {
                    console.log(data);
                    if (data != "") {
                        window.open(data, '_blank');
                    }
                }
            })
        }
    </script>
</body>

</html>