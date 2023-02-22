<?
include("../includes/inc_new/icon.php");
include("config.php");

$kv = 1;
$catid = getValue("catid", "int", "GET", 0);
$catid = (int)$catid;

$citid = getValue("city", "int", "GET", 0);
$citid = (int)$citid;

$nn = getValue('nn', 'int', 'GET', 0);

$new_tit   = getValue("sp", "str", "GET", "");
$new_tit   = replaceMQ($new_tit);
$new_tit   = strip_tags($new_tit);
$s_tit     = $new_tit;
$new_tit   = str_replace("-", " ", $new_tit);
$new_tit = str_replace("     ", " ", $new_tit);
$new_tit = str_replace("    ", " ", $new_tit);
$new_tit = str_replace("   ", " ", $new_tit);
$new_tit = str_replace("  ", " ", $new_tit);
$new_tit = trim($new_tit);

$sql = '';
$ord = '';

$district = getValue("district", "int", "GET", 0);
$district = (int)$district;

$ward = getValue("ward", "int", "GET", 0);
$ward = (int)$ward;

$price = getValue("gia_bd", "int", "GET", "");
$price = (int)$price;
if ($price != '') {
    $sql .= " AND new_money >= '$price' ";
};

$price_den = getValue("gia_kt", "int", "GET", "");
$price_den = (int)$price_den;
if ($price_den != '') {
    $sql .= " AND gia_kt <= $price_den ";
};

$timkiem_mua = 1;

if ($catid == 0) {
    $catname = "";
} else {
    $catname = $db_cat[$catid]['cat_name'];
}

if ($citid == 0) {
    $citname = "";
} else {
    $citname = $arrcity[$citid]['cit_name'];
}

if ($nn == 0) {
    $tennganhnghe = "";
} else {
    $tennganhnghe = $db_cat_vl[$nn];
}

if ($district == 0) {
    $districtname = "";
} else {
    $districtname = $arrcity2[$district]['cit_name'];
    $sql .= " AND quan_huyen = '$district' ";
}

$db_qrr3 = new db_query("SELECT * FROM phuong_xa ");
$arrcity3 = $db_qrr3->result_array('id');
if ($ward == 0) {
    $wardname = "";
} else {
    $wardname = $arrcity3[$ward]['name'];
    $sql .= " AND phuong_xa = '$ward' ";
}


if ($new_tit != "") {
    $sql .= " AND new_title LIKE '%" . $new_tit . "%' ";
}

if ($nn != 0) {
    $sql .= " AND new_job_type = $nn ";
}

$db_qrcat = new db_query("SELECT cat_parent_id, cat_name, cat_id FROM category WHERE cat_id = " . $catid . " LIMIT 1");
$rowcat = mysql_fetch_assoc($db_qrcat->result);
$cat_parent_id = $rowcat['cat_parent_id'];

$urlcat = "https://raonhanh365.vn" . rewrite_page_tm1($catid, $catname, $citid, $citname, $s_tit, $nn, $tennganhnghe);


if ($s_tit != "" && $catid == 0 && $citid == 0 && $nn == 0) {
    $title = "Tin Cần Mua " . $new_tit . " Mới Nhất " . date('m', time()) . " / " . date('Y', time());
    $desc = "Danh sách tin mua " . $new_tit . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . " trên raonhanh365.vn. Cập nhật liên tục hàng giờ";
    $key =  "tin mua " . $new_tit;
} else if ($s_tit != "" && $catid != 0 && $citid == 0 && $nn == 0) {
    $title = "Tin cần mua " . $new_tit . " thuộc " . $catname . " mới nhất";
    $desc = "Danh sách tin mua " . $new_tit . " thuộc " . $catname . " mới nhất trên raonhanh365.vn. Cập nhật liên tục hàng giờ";
    $key =  "tin mua " . $new_tit . " thuộc " . $catname;
} else if ($s_tit != "" && $catid == 0 && $citid != 0 && $nn == 0) {
    $title = "Tin Cần Mua " . $new_tit . " tại " . $citname . " Mới Nhất " . date('m', time()) . " / " . date('Y', time());
    $desc = "Danh sách tin mua " . $new_tit . " tại " . $citname . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . " trên raonhanh365.vn. Cập nhật liên tục hàng giờ";
    $key =  "tin mua " . $new_tit . " tại " . $citname;
} else if ($s_tit != "" && $catid != 0 && $citid != 0 && $nn == 0) {
    $title = "Tin Cần Mua " . $new_tit . " thuộc " . $catname . " tại " . $citname . " mới nhất";
    $desc = "Danh sách tin mua " . $new_tit . " thuộc " . $catname . " tại " . $citname . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . " trên raonhanh365.vn. Cập nhật liên tục hàng giờ";
    $key =  "tin mua " . $new_tit . " thuộc " . $catname . " tại " . $citname;
} else if ($s_tit == "" && $catid != 0 && $citid == 0 && $nn == 0) {
    $title = "Tin Cần Mua " . $catname . " Mới Nhất " . date('m', time()) . " / " . date('Y', time());
    $desc = "Danh sách tin mua " . $catname . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . " trên raonhanh365.vn. Cập nhật liên tục hàng giờ";
    $key =  "tin mua " . $catname;
} else if ($s_tit == "" && $catid == 0 && $citid != 0 && $nn == 0) {
    $title = "Tin Cần Mua tại " . $citname . " Mới Nhất " . date('m', time()) . " / " . date('Y', time());
    $desc = "Danh sách tin mua tại " . $citname . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . " trên raonhanh365.vn. Cập nhật liên tục hàng giờ";
    $key =  "tin mua tại " . $citname;
} else if ($s_tit == "" && $catid != 0 && $citid != 0 && $nn == 0) {
    $title = "Tin Cần Mua " . $catname . " tại " . $citname . " mới nhất " . date('m', time()) . " / " . date('Y', time());
    $desc = "Danh sách tin mua " . $catname . " tại " . $citname . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . " trên raonhanh365.vn. Cập nhật liên tục hàng giờ";
    $key =  "tin mua " . $catname . " tại " . $citname;
} else if ($s_tit == "" && $catid == 0 && $citid == 0 && $nn != 0) {
    $title = "Tin Đăng Ứng viên tìm việc " . $tennganhnghe . " mới nhất " . date('m', time()) . " / " . date('Y', time());
    $desc = "Danh sách tin đăng ứng viên tìm việc " . $tennganhnghe . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . ". Tham khảo ngay danh sách tin đăng";
    $key =  "in đăng ứng viên tìm việc" . $tennganhnghe;
} else if ($s_tit == "" && $catid == 0 && $citid != 0 && $nn != 0) {
    $title = "Tin Đăng Ứng viên tìm việc " . $tennganhnghe . " tại " . $citname . " mới nhất " . date('m', time()) . " / " . date('Y', time());
    $desc = "Danh sách tin đăng ứng viên tìm việc " . $tennganhnghe . " tại " . $citname . " mới nhất " . date('m', time()) . " / " . date('Y', time()) . ". Tham khảo ngay danh sách tin đăng";
    $key =  "tin đăng ứng viên tìm việc" . $tennganhnghe . " tại " . $citname;
}


if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
}


if ($catid == 0 && $citid == 0) {
    $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 1 and new_active = 1 " . $sql . " ORDER BY new_pin_cate DESC, new_update_time DESC ");
} else if ($catid != 0 && $citid == 0) {
    if ($rowcat['cat_parent_id'] == 0) {
        $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
    } else {
        $cauqr = "new_cate_id = " . $catid . "";
    };
    $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 1 AND new_active = 1 " . $sql . "  AND " . $cauqr . " AND new_active = 1 " . $sql . "
                            ORDER BY new_pin_cate DESC, new_update_time DESC");
} else if ($catid == 0 && $citid != 0) {
    $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 1 AND new_active = 1 AND new_city = " . $citid . " " . $sql . " ORDER BY new_pin_cate DESC, new_update_time DESC");
} else if ($catid != 0 && $citid != 0) {
    if ($rowcat['cat_parent_id'] == 0) {
        $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
    } else {
        $cauqr = "new_cate_id = " . $catid . "";
    };
    $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                            LEFT JOIN new_description ON new.new_id = new_description.new_id
                            INNER JOIN `user` ON `new`.`new_user_id` = `user`.`usc_id`
                            WHERE new_buy_sell = 1 AND new_active = 1 " . $sql . " AND new_city = " . $citid . "  AND " . $cauqr . " ORDER BY new_update_time DESC");
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <title><?= $title ?></title>
    <meta name="keywords" content="<?= $key ?>" />
    <meta name="description" content="<?= $desc ?>" />
    <meta property="og:title" content="<?= $title ?>" />
    <meta property="og:description" content="<?= $desc ?>" />
    <meta property="og:url" content="<?= $urlcat ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="<?= $title ?>" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="/" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Tin mua rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <link rel="canonical" href="<?= $urlcat ?>" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/giai_dap.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <input type="hidden" class="cat_parent_id" value="<?= ($cat_parent_id != "") ? $cat_parent_id : '0' ?>">
    <input type="hidden" class="cat_child_id" value="<?= ($catid != "") ? $catid : '0' ?>">

    <? include("../includes/common/inc_header.php"); ?>
    <section>
        <div class="ctn_wapper w_100 tim_m_k">
            <div class="ctn_fl_chung">
                <div class="ctn_search ctn_search_df w_100">
                    <div class="tk_tren tk_tren-df w_100 d_flex mb_30">
                        <div class="timkiem_trai">

                            <div class="kqua_tk sh_bgr_one w_100 mb_30">
                                <h3 class="timkiem_ketq w_100 sh_clr_two cr_weight mb_30 text_upcase">
                                    <? if ($s_tit != "" && $catid == 0 && $citid == 0 && $nn == 0) { ?>
                                        Kết quả tìm kiếm <?= $new_tit ?>
                                    <? } else if ($s_tit != "" && $catid != 0 && $citid == 0 && $nn == 0) { ?>
                                        <?= $new_tit ?> thuộc <?= $catname ?>
                                    <? } else if ($s_tit != "" && $catid == 0 && $citid != 0 && $nn == 0) { ?>
                                        <?= $new_tit ?> tại <?= $citname ?>
                                    <? } else if ($s_tit != "" && $catid != 0 && $citid != 0 && $nn == 0) { ?>
                                        <?= $new_tit ?> thuộc <?= $catname ?> tại <?= $citname ?>
                                    <? } else if ($s_tit == "" && $catid != 0 && $citid == 0 && $nn == 0) { ?>
                                        <?= $catname ?>
                                    <? } else if ($s_tit == "" && $catid == 0 && $citid != 0 && $nn == 0) { ?>
                                        Tin mua tại <?= $citname ?>
                                    <? } else if ($s_tit == "" && $catid != 0 && $citid != 0 && $nn == 0) { ?>
                                        Tìm mua <?= $catname ?> tại <?= $citname ?>
                                    <? } else if ($s_tit == "" && $catid == 0 && $citid == 0 && $nn != 0) { ?>
                                        ứng viên <?= $tennganhnghe ?>
                                    <? } else if ($s_tit == "" && $catid == 0 && $citid != 0 && $nn != 0) { ?>
                                        ứng viên <?= $tennganhnghe ?> tại <?= $citname ?>
                                    <? } ?>
                                </h3>
                                <div class="m_more_search tatca_kq w_100 show_apend">
                                    <?
                                    $rowa = $db_qra->result_array();

                                    $loaitien = array(1 => 'VNĐ', 2 => 'USD', 3 => 'EURO');

                                    ?>
                                    <? foreach ($rowa as $key => $rowa) {
                                        $image = explode(';', $rowa['new_image']); ?>
                                        <div class="ttin_timkiem sh_bgr_one w_100 d_flex mb_20 show_tr" data-price='<? if ($rowa['new_money'] == "") echo '0';
                                                                                                                    else echo str_replace(',', '', $rowa['new_money']) ?>' data-newest='<?= $rowa['new_create_time'] ?>'>
                                            <div class="avt_spham_tk">
                                                <? if ($rowa['new_cate_id'] == 121) { ?>
                                                    <a href="/<?= replaceTitle($rowa['link_title']) ?>-c<?= $rowa['new_id'] ?>.html">
                                                        <img onerror='this.onerror=null;this.src="/images/anh_moi/avatar.png";' src="<?= str_replace('../', '/', $image[0])  ?>" class="avt_sanph sh_border_rdu_two" alt="ảnh sản phẩm" />
                                                    </a>
                                                <? } else { ?>
                                                    <a href="/<?= replaceTitle($rowa['link_title']) ?>-ct<?= $rowa['new_id'] ?>.html">
                                                        <? if ($rowa['new_image'] != "") { ?>
                                                            <img src="<?= $image[0] ?>" class="avt_sanph sh_border_rdu_two">
                                                        <? } else { ?>
                                                            <img src="/images/anh_moi/avatar.png" class="avt_sanph sh_border_rdu_two">
                                                        <? } ?>
                                                    </a>
                                                <? } ?>
                                                <?php if (count($image) > 1) : ?>
                                                    <span class="sl_anhdl sh_clr_one"><?= count($image) ?></span>
                                                <?php endif ?>
                                                <?php if (!isset($_COOKIE['UID'])) : ?>
                                                    <a class="timkiem_tinnkthich" href="/dang-nhap.html">
                                                        <img src="/images/anh_moi/yeuthich_moi.png" alt="" class="ko_yeuthich hd_cspointer">
                                                    </a>
                                                <?php endif ?>
                                                <?php if (isset($_COOKIE['UID'])) :
                                                    $id_tin = $rowa['new_id'];
                                                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$us_id' AND `usc_type` = '$us_type'");
                                                    $check_num = mysql_num_rows($check->result);
                                                ?>
                                                    <p class="timkiem_tinnkthich">
                                                        <? if ($check_num == 0) { ?>
                                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } else { ?>
                                                            <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } ?>
                                                    </p>
                                                <?php endif ?>
                                            </div>
                                            <div class="ttin_vt_spham">
                                                <h4 class="tde_spham w_100 elipsis1">
                                                    <? if ($rowa['new_cate_id'] == 121) { ?>
                                                        <a href="/<?= replaceTitle($rowa['link_title']) ?>-c<?= $rowa['new_id'] ?>.html" class="sh_clr_two">
                                                            <?= $rowa['new_title'] ?>
                                                        </a>
                                                    <? } else { ?>
                                                        <a href="/<?= replaceTitle($rowa['link_title']) ?>-ct<?= $rowa['new_id'] ?>.html" class="sh_clr_two">
                                                            <?= $rowa['new_title'] ?>
                                                        </a>
                                                    <? } ?>
                                                </h4>
                                                <p class="tgian_spham w_100 sh_size_five sh_clr_four mb_5">
                                                    <?= lay_tgian($rowa['new_create_time']); ?>
                                                </p>
                                                <p class="dchi_spham w_100 sh_size_five sh_clr_four mb_10 elipsis1"><?= $rowa['dia_chi'] ?></p>
                                                <div class="giath_spham w_100 d_flex">
                                                    <? if ($rowa['new_money'] != 0 && $rowa['gia_kt'] == 0) { ?>
                                                        <p class="gia_spham sh_size_four sh_clr_six cr_bold elipsis1">
                                                            Từ <?= number_format($rowa['new_money']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                        </p>
                                                    <? } else if ($rowa['new_money'] == 0 && $rowa['gia_kt'] != 0) { ?>
                                                        <p class="gia_spham sh_size_four sh_clr_six cr_bold elipsis1">
                                                            Đến <?= number_format($rowa['gia_kt']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                        </p>
                                                    <? } else if ($rowa['new_money'] != 0 && $rowa['gia_kt'] != 0) {  ?>
                                                        <p class="gia_spham sh_size_four sh_clr_six cr_bold elipsis1">
                                                            <?= number_format($rowa['new_money']) ?> - <?= number_format($rowa['gia_kt']) ?> <?= $arr_dvtien[$rowa['new_unit']] ?>
                                                        </p>
                                                    <? } else { ?>
                                                        <p class="gia_spham sh_size_four sh_clr_six cr_bold elipsis1">
                                                            Thỏa thuận
                                                        </p>
                                                    <? } ?>
                                                    <a class="img_like item_chat" target="_blank" id-chat="<?= $rowa['chat365_id'] ?>" rel="nofollow" href="/<?= replaceTitle($rowa['link_title']) ?>-ct<?= $rowa['new_id'] ?>.html">
                                                        <p class="chat_th">Chat</p>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php };
                                    unset($key, $rowa); ?>
                                </div>
                            </div>
                            <!-- <p class="xthem_tk sh_clr_six sh_size_one cr_weight sh_bgr_one sh_border_rdu_two sh_cursor">
                                Xem thêm</p> -->
                        </div>
                        <div class="timkiem_phai">
                            <div class="sxep_tk sh_bgr_one sh_br_rdu sh_bshow mb_30 w_100">
                                <div class="tca_thtinh_dm share_select">
                                    <div class="thuoc_tinh w_100 mb_20">
                                        <p class="w_100 sh_clr_two sh_size_three mb_5">Sắp xếp theo</p>
                                        <select name="ten_thuoc_tinh" class="luachon_diem form-control share_select2 w_100">
                                            <option value="">Sắp xếp theo</option>
                                            <option value="1">Tin mới trước</option>
                                            <option value="2">Giá thấp trước</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="ctiet_tk sh_bgr_one sh_br_rdu sh_bshow w_100">
                                <form action="/home/quicksearch_mua.php" method="POST">
                                    <div class="form-group mb_20 w_100">
                                        <p class="w_100 sh_clr_two sh_size_three mb_5 cr_weight">Khu vực</p>
                                        <input type="hidden" name="tukhoa_dacbiet" value="<?= $new_tit ?>" class="tukhoa_dacbiet tkiem_pbiet_mb">
                                        <p class="kq_chpup sh_border sh_border_rdu w_100 sh_size_five sh_clr_two click_showpopup_khuvuc sh_cursor show_name_khuvuc"><?= ($ward != 0) ? $wardname . ', ' : '' ?> <?= ($district != 0) ? $districtname . ', ' : '' ?> <?= ($citid != 0) ? $citname : 'Toàn Quốc' ?></p>
                                    </div>
                                    <? include("../modals/khu_vuc_manh.php") ?>
                                    <div class="form-group mb_20 w_100 cr_weight_df share_select">
                                        <p class="sh_clr_two sh_size_three mb_5 cr_weight cr_weight">Danh mục sản phẩm</p>
                                        <select name="name_cate" class="form-control share_select2 w_100">
                                            <option value="">Chọn danh mục sản phẩm</option>
                                            <? foreach ($db_cat as $item => $row_dm) {
                                                if (in_array($row_dm['cat_id'], $bodmuc_mua) == false) { ?>
                                                    <option value="<?= $row_dm['cat_id'] ?>" <?= ($catid != 0 && $row_dm['cat_id'] == $catid) ? "selected" : "" ?>><?= ($row_dm['cat_id'] != 121) ? $row_dm['cat_name'] : "Tìm ứng viên" ?></option>
                                            <? }
                                            };
                                            unset($item, $row_dm); ?>
                                        </select>
                                    </div>
                                    <div class="form-group mb_20 w_100">
                                        <p class="sh_clr_two sh_size_three mb_5 cr_weight">Giá</p>
                                        <div class="gia_timkiem w_100">
                                            <input value="<?= ($price != "") ? $price : '' ?>" name='price_m' type="text" placeholder="Từ" autocomplete="off" class="font-14-16 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                            <span>-</span>
                                            <input value="<?= ($price_den != "") ? $price_den : '' ?>" name='price_den' type="text" placeholder="Đến" autocomplete="off" class="font-14-16 gia-ban-sp_df" onkeydown="javascript: return ['Backspace','Delete','ArrowLeft','ArrowRight'].includes(event.code) ? true : !isNaN(Number(event.key)) && event.code!=='Space'">
                                        </div>
                                    </div>
                                    <div class="sub_timk d_flex">
                                        <p onclick="window.location.href='/tat-ca-tin-dang-mua.html'" class="bo_loc right-10 cr_weight sh_size_three sh_clr_three sh_border_rdu sh_cursor sh_bgr_one">
                                            Bỏ lọc</p>
                                        <button type="submit" class="ap_dung cr_weight sh_size_three sh_clr_one sh_border_rdu sh_cursor">Áp dụng</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="tu_phobien w_100 sh_br_rdu sh_bgr_one">
                        <h4 class="sh_clr_two cr_weight w_100 tuk_pbien mb_20">CÁC TỪ KHÓA PHỔ BIẾN</h4>
                        <div class="tu_phobien_ch_them">
                            <div class="tu_phobien_ch w_100 d_flex fl_wrap sh_cursor">
                                <?
                                $qr = new db_query("SELECT `search_key` FROM `search_popular` ORDER BY count_num desc , rand() limit 7");
                                $lis = $qr->result_array();
                                ?>
                                <?php foreach ($lis as $m => $value_lis) : ?>
                                    <p onclick="click_search2(this)" data-name="<?= str_replace('-', ' ', $value_lis['search_key'])  ?>" class=" cr_weight mb_10 sh_clr_two sh_size_five mr_20"><?= str_replace('-', ' ', $value_lis['search_key'])  ?></p>
                                <?php endforeach ?>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <? include('../modals/popup_page_timkiem.php') ?>
    <? include '../modals/md_tb_yeuthich.php'; ?>
    <? include("../includes/inc_new/inc_footer.php") ?>

</body>
<script type="text/javascript" src="/js/style_new/slick.min.js"></script>
<script type="text/javascript" src="/js/style_new/style.js"></script>
<script type="text/javascript">
    $("#keyword").keyup(function() {
        var tukhoa = $(this).val();
        $(".tukhoa_dacbiet").val(tukhoa);
    });

    function click_search2(th) {
        var name = $(th).attr('data-name');
        $('.nd_box_key').addClass('d_none');
        $('.key_search').val(name);
        $('#cate_search').val("0").trigger('change');
        $('.btn_timkiem').click();
    }
    $(".share_select2").select2({
        width: '100%',
    });

    // SHOW KHU VỰC
    $('.click_dm_show').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeIn(500);
    })
    $('.click_dong_dm').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeOut(500);
    })

    function tinh_tp(id) {
        var tinh_tp = $(id).val();
        $.ajax({
            url: '/render/ds_quan_huyen.php',
            type: 'POST',
            data: {
                tinh_tp: tinh_tp,
            },
            success: function(data) {
                $(".md_quan_huyen").html(data);
            }
        })
    }


    function rf_select2d() {
        $('.share_select2').select2();
    }


    $('.cate_con_back, .close_catecon').click(function() {
        $('.hd_modal_danhmuc_td_df').fadeIn(500);
        $('.hd_modal_do_dt_df').fadeOut(500);
    })
    // ------------------------------------
    $('.toanquoc').change(function() {
        var tinh_tp = $('.toanquoc').val();
        if (tinh_tp == 0) $('.cf_1268591').attr("disabled", true);
        else $('.cf_1268591').attr("disabled", false);
        $.ajax({
            url: '/render/ds_quan_huyen.php',
            type: 'POST',
            data: {
                tinh_tp: tinh_tp
            },
            success: function(data) {
                $(".md_quan_huyen").html(data);
                $(".md_phuong_xa").html('<option value="">Phường/xã</option>');
            }
        })

    })
    $('.md_quan_huyen').change(function() {
        var quan_huyen = $('.md_quan_huyen').val();
        $.ajax({
            url: '/render/ds_phuong_xa.php',
            type: 'POST',
            data: {
                quan_huyen: quan_huyen
            },
            success: function(data) {
                $(".md_phuong_xa").html(data);
            }
        })

    })
    $('.click_xn_kv').click(function() {
        $('.khuvuc_hide').hide();
    })

    $('.click_xn_kv').click(function() {

        var tinh_tp = $('.toanquoc').val();
        var quan_huyen = $('.md_quan_huyen').val();
        var xa_phuong = $('.md_phuong_xa').val();
        $.ajax({
            type: 'POST',
            url: "/ajax/name_khuvuc.php",
            data: {
                tinh_tp: tinh_tp,
                quan_huyen: quan_huyen,
                xa_phuong: xa_phuong
            },
            success: function(data) {
                $('.show_name_khuvuc').html(data);
            }

        })
    })

    // SHOW POPUP KHU VỰC
    $('.click_showpopup_khuvuc').click(function() {
        $('.khu_vuc').show();
    })
    $('.close').click(function() {
        $('.khu_vuc').hide();
    })


    // SHOW KHU VỰC BỘ LỌC
    $('.show_khu_vuc_boloc').click(function() {
        $('.khu_vuc').show();
        $('.popup_boloc_1024').addClass('hidden');
    })

    $('.luachon_diem').change(function() {
        var chon = $(this).val();
        if (chon == "") window.location.reload();
        if (chon == 2) {
            $(".show_tr").sort(sort_li).appendTo('.show_apend');

            function sort_li(a, b) {
                return ($(b).data('price')) < ($(a).data('price')) ? 1 : -1;
            }
        }
        if (chon == 1) {
            $(".show_tr").sort(sort_li).appendTo('.show_apend');

            function sort_li(a, b) {
                return ($(b).data('newest')) > ($(a).data('newest')) ? 1 : -1;
            }
        }
    })
</script>

</html>