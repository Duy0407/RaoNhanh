<?

include("config.php");

$id_dm = getValue('id_dm', 'int', 'GET', 0);
$id_cs = getValue('id_cs', 'int', 'GET', 0);

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT']) && $id_dm != 0 && $id_cs != 0) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];

    $list_tdang = new db_query("SELECT n.`new_title`, n.`new_money`, n.`gia_kt`, n.`new_cate_id`, n.`new_city`, n.`new_image`, n.`new_unit`, n.`new_address`,
                                n.`quan_huyen`, n.`phuong_xa`, n.`new_sonha`, n.`dia_chi`, n.`new_tinhtrang`, n.`new_name`, d.`new_description`, d.`com_city`,
                                d.`com_district`, d.`com_ward`, d.`com_address_num`, d.`han_bat_dau`, d.`han_su_dung`, d.`tgian_bd`, d.`tgian_kt`, d.`new_job_kind`,
                                d.`new_file_dthau`, d.`noidung_nhs`, d.`new_file_nophs`, d.`noidung_chidan`, d.`new_file_chidan`, d.`donvi_thau`, d.`phi_duthau`,
                                d.`file_mota`, d.`file_thutuc`, d.`file_hoso` FROM `new` AS n INNER JOIN `new_description` AS d ON n.`new_id` = d.`new_id`
                                WHERE n.`new_id` = '" . $id_cs . "' AND n.`new_type` = '" . $us_type . "' AND  n.`new_user_id` = '" . $us_id . "' AND
                                n.`new_buy_sell` = 1 AND n.`new_active` = 1 AND n.`da_ban` = 0 ");
    // if (mysql_num_rows($list_tdang->result) > 0) {
    $row_td = mysql_fetch_assoc($list_tdang->result);
    $avt_dangtin = $row_td['new_image'];
    $tinh_thanh = $row_td['new_city'];
    $quan_huyen = $row_td['quan_huyen'];
    $phuong_xa = $row_td['phuong_xa'];
    $new_sonha = $row_td['new_sonha'];

    $list_ten = new db_query("SELECT `cat_parent_id`, `cat_name`  FROM `category` WHERE `cat_id` = $id_dm ");
    $row_dmuc = mysql_fetch_assoc($list_ten->result);
    $cat_parent_id = $row_dmuc['cat_parent_id'];
    $cat_name = $row_dmuc['cat_name'];
    if ($cat_parent_id != 0) {
        $ten_dmcha = mysql_fetch_assoc((new db_query("SELECT `cat_name`  FROM `category` WHERE `cat_id` = $cat_parent_id "))->result)['cat_name'];
    } else {
        $ten_dmcha = '';
    };
    // } else {
    //     header('Location: /');
    // }
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

    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_dien2.css?v=<?= $version ?>">

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
                    <? include("../includes/inc_new/up-dang-tin-mua.php"); ?>
                </div>
                <form class="tindang-col-right dangtin_mua" data="<?= $us_type ?>" data1="<?= $id_cs ?>">
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin pad">Danh mục sản phẩm <span class="color_red">*</span></p>
                        <input class="input-1 dmuc_spham" type="text" data="<?= $id_dm ?>" value="<?= $ten_dmcha ?> <?= ($ten_dmcha != "") ? ">>" : "" ?> <?= $cat_name ?>" readonly>
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin">Tiêu đề sản phẩm cần mua <span class="color_red">*</span></p>
                        <input class="input-1" type="text" name="tieu_de" placeholder="Tên gói thầu" value="<?= $row_td['new_title'] ?>">
                    </div>
                    <div class="khoi-1">
                        <p class="mt20 tiude color_orange">Thông tin người cần mua</p>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin">Họ và tên <span class="color_red">*</span></p>
                            <input class="input-1" type="text" name="ho_ten" placeholder="Nhập họ và tên" value="<?= $row_td['new_name'] ?>">
                        </div>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin">Địa chỉ cần mua hàng <span class="color_red">*</span></p>
                            <input class="input-1 td_ttin_diachi" type="text" name="dia_chi" value="<?= $row_td['dia_chi'] ?>" data-tt="<?= $row_td['new_city'] ?>" data-qh="<?= $row_td['quan_huyen'] ?>" data-px="<?= $row_td['phuong_xa'] ?>" data-sn="<?= $row_td['new_sonha'] ?>" placeholder="Địa chỉ của bên mời thầu" readonly>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <p class="mt20 tiude color_orange">Thông tin đấu thầu</p>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin">Mô tả sản phẩm cần mua <span class="color_red">*</span></p>
                            <textarea name="mota" class="texa-mo-ta font-14-16 input_infor_tag" placeholder="Nhập mô tả"><?= nl2br($row_td['new_description']) ?></textarea>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div class="upfl_anh <?= ($row_td['new_file_dthau'] != "") ? "d_none" : "" ?>">
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
                        <div class="upload_img-wrap file_dthau" data="<?= $row_td['new_file_dthau'] ?>" data1="<?= $row_td['file_mota'] ?>">
                            <? if ($row_td['new_file_dthau'] != "") {
                                if ($row_td['file_mota'] == 1) { ?>
                                    <div class='anhchon_tep chontep'>
                                        <div class="avtanh_chon">
                                            <div class="anhtepchon">
                                                <img src="/pictures/<?= $row_td['new_file_dthau'] ?>" class="avt_anhtep">
                                                <span class="bo_anhchon" onclick="xoa_botep(this)"></span>
                                            </div>
                                            <p class="tenanh_chon"><?= str_replace('avt_tindangmua/', '', $row_td['new_file_dthau']) ?></p>
                                        </div>
                                        <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                    </div>
                                <? } else { ?>
                                    <div class="tepchon_tep chontep">
                                        <p class="ten_tepchon"><span class="xoa_botep" onclick="xoa_botep(this)"></span><?= str_replace('avt_tindangmua/', '', $row_td['new_file_dthau']) ?></p>
                                        <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                    </div>
                            <? }
                            } ?>
                        </div>
                    </div>
                    <? if (in_array($id_dm, $bo_dtinmua_ttrang) == false) { ?>
                        <div class="dang-tin-1 tbao_loivali">
                            <p class="thong-tin mb_5 ">Tình trạng <span class="color_red">*</span></p>
                            <select class="custom-select slect-hang" name="tinh_trang">
                                <option value="">Tình trạng</option>
                                <option value="1" <?= ($row_td['new_tinhtrang'] == 1) ? "selected" : "" ?>>Cũ</option>
                                <option value="2" <?= ($row_td['new_tinhtrang'] == 2) ? "selected" : "" ?>>Mới(chưa qua sử dụng)</option>
                            </select>
                        </div>
                    <? } ?>
                    <div class="dang-tin-1">
                        <p class="thong-tin">Thủ tục nộp hồ sơ mời thầu <span class="color_red">*</span></p>
                        <div class="nop-ho-so mt_5" id="gioi_tinh_1">
                            <div class="chon-on-off">
                                <label data-id="1" class="gt-2 status-1 <?= ($row_td['noidung_nhs'] != "") ? "active" : "" ?>">
                                    Online
                                    <input type="radio" name="offon_mth" class="offon_mth" value="1" <?= ($row_td['noidung_nhs'] != "") ? "checked" : "" ?>>
                                </label>
                                <label data-id="2" class="gt-2 status-1 <?= ($row_td['new_address'] != "") ? "active" : "" ?>">
                                    Offline
                                    <input type="radio" name="offon_mth" value="2" class="offon_mth" <?= ($row_td['new_address'] != "") ? "checked" : "" ?>>
                                </label>
                            </div>
                            <div class="nd_on-off">
                                <div class="on-off-1 tbao_loivali <?= ($row_td['noidung_nhs'] != "") ? "" : "d_none" ?>" id="show-1">
                                    <textarea class="texa-mo-ta font-14-16 input_infor_tag" type="text" name="noidung_thau" rows="5" placeholder="Nhập nội dung"><?= nl2br($row_td['noidung_nhs']) ?></textarea>
                                </div>
                                <div class="on-off-1 tbao_loivali <?= ($row_td['new_address'] != "") ? "" : "d_none" ?>" id="show-2">
                                    <input class="input-1 diadiem_lamviec" type="text" name="td_diachi_lamviec" value="<?= $row_td['new_address'] ?>" data-tt="<?= $row_td['com_city'] ?>" data-qh="<?= $row_td['com_district'] ?>" data-px="<?= $row_td['com_ward'] ?>" data-sn="<?= $row_td['com_address_num'] ?>" placeholder="Địa điểm nộp hồ sơ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div for="upload-2a" class="upfl_anh <?= ($row_td['new_file_nophs'] != "") ? "d_none" : "" ?>">
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
                        <div class="upload_img-wrap file_nophs" data="<?= $row_td['new_file_nophs'] ?>" data1="<?= $row_td['file_thutuc'] ?>">
                            <? if ($row_td['new_file_nophs'] != "") {
                                if ($row_td['file_thutuc'] == 1) { ?>
                                    <div class='anhchon_tep chontep'>
                                        <div class="avtanh_chon">
                                            <div class="anhtepchon">
                                                <img src="/pictures/<?= $row_td['new_file_nophs'] ?>" class="avt_anhtep">
                                                <span class="bo_anhchon" onclick="xoa_botep(this)"></span>
                                            </div>
                                            <p class="tenanh_chon"><?= str_replace('avt_tindangmua/', '', $row_td['new_file_nophs']) ?></p>
                                        </div>
                                        <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                    </div>
                                <? } else { ?>
                                    <div class="tepchon_tep chontep">
                                        <p class="ten_tepchon"><span class="xoa_botep" onclick="xoa_botep(this)"></span><?= str_replace('avt_tindangmua/', '', $row_td['new_file_nophs']) ?></p>
                                        <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                    </div>
                            <? }
                            } ?>
                        </div>
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin">Thời gian bắt đầu nhận hồ sơ mời thầu <span class="color_red">*</span></p>
                        <input class="input-1" type="date" name="tgian_bdau" value="<?= ($row_td['han_bat_dau'] != 0) ? date('Y-m-d', $row_td['han_bat_dau']) : "" ?>">
                    </div>
                    <div class="dang-tin-1 tbao_loivali">
                        <p class="thong-tin">Thời gian kết thúc nhận hồ sơ mời thầu <span class="color_red">*</span></p>
                        <input class="input-1" type="date" name="tgian_kthuc" value="<?= ($row_td['han_su_dung'] != 0) ? date('Y-m-d', $row_td['han_su_dung']) : "" ?>">
                    </div>
                    <div class="dang-tin-1">
                        <p class="thong-tin">Thời hạn thông báo kết quả trúng thầu <span class="color_red">*</span></p>
                        <div class="ma-xac-nhan">
                            <div class="tbao_loivali w_45">
                                <input class="ma-xn w_100 input-1" type="date" name="tgian_tbao_thau" value="<?= ($row_td['tgian_bd'] != 0) ? date('Y-m-d', $row_td['tgian_bd']) : "" ?>">
                            </div>
                            <p class="den">Đến</p>
                            <div class="tbao_loivali w_45">
                                <input class="ma-xn w_100 input-1" type="date" name="tgian_kttbao_thau" value="<?= ($row_td['tgian_kt']) ? date('Y-m-d', $row_td['tgian_kt']) : "" ?>">
                            </div>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div class="dang-tin-1">
                            <p class="thong-tin">Chỉ dẫn tìm hiểu hồ sơ mời thầu</p>
                            <textarea name="mota_thau" class="texa-mo-ta font-14-16 input_infor_tag error" placeholder="Nhập mô tả"><?= nl2br($row_td['noidung_chidan']) ?></textarea>
                        </div>
                    </div>
                    <div class="khoi-1">
                        <div for="upload-2a" class="upfl_anh <?= ($row_td['new_file_chidan'] != "") ? "d_none" : "" ?>">
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
                        <div class="upload_img-wrap file_chidan" data="<?= $row_td['new_file_chidan'] ?>" data1="<?= $row_td['file_hoso'] ?>">
                            <? if ($row_td['new_file_chidan'] != "") {
                                if ($row_td['file_hoso'] == 1) { ?>
                                    <div class='anhchon_tep chontep'>
                                        <div class="avtanh_chon">
                                            <div class="anhtepchon">
                                                <img src="/pictures/<?= $row_td['new_file_chidan'] ?>" class="avt_anhtep">
                                                <span class="bo_anhchon" onclick="xoa_botep(this)"></span>
                                            </div>
                                            <p class="tenanh_chon"><?= str_replace('avt_tindangmua/', '', $row_td['new_file_chidan']) ?></p>
                                        </div>
                                        <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                    </div>
                                <? } else { ?>
                                    <div class="tepchon_tep chontep">
                                        <p class="ten_tepchon"><span class="xoa_botep" onclick="xoa_botep(this)"></span><?= str_replace('avt_tindangmua/', '', $row_td['new_file_chidan']) ?></p>
                                        <span class='anh_loadnguoc'><img src="images/dang-tin-mua/upload-cloud-red.svg"></span>
                                    </div>
                            <? }
                            } ?>
                        </div>
                    </div>
                    <div class="dang-tin-1">
                        <p class="thong-tin">Giá sàn dự kiến <span class="color_red">*</span></p>
                        <div class="luong-mong-muon mt_5" id="lmm-1">
                            <div class="muc-luong">
                                <div data-id="1" class="luong-2 <?= ($row_td['new_money'] != 0 && $row_td['gia_kt'] == 0) ? "active" : "" ?>">Từ mức</div>
                                <div data-id="2" class="luong-2 <?= ($row_td['new_money'] == 0 && $row_td['gia_kt'] != 0) ? "active" : "" ?>">Đến mức</div>
                                <div data-id="3" class="luong-2 <?= ($row_td['new_money'] != 0 && $row_td['gia_kt'] != 0) ? "active" : "" ?>">Từ mức - đến mức</div>
                            </div>
                            <div class="khoi-muc-luong">
                                <div id="nhap-luong-1" class="nhap-luong-muon tbao_loivali <?= ($row_td['new_money'] != 0 && $row_td['gia_kt'] == 0) ? "" : "d_none" ?>">
                                    <div class="dis_flex">
                                        <div class="nhap-so">
                                            <input class="input-2" type="text" name="gia_bdau" value="<?= ($row_td['new_money'] != 0 && $row_td['gia_kt'] == 0) ? number_format($row_td['new_money']) : "" ?>" onkeyup="format_gtri(this)" placeholder="Nhập giá sàn dự kiến từ mức...">
                                        </div>
                                        <div class="don-vi-2">
                                            <select class="don-vi-tien-2" name="dvi_tien">
                                                <option value="1" <?= ($row_td['new_unit'] == 1) ? "selected" : "" ?>>VNĐ</option>
                                                <option value="2" <?= ($row_td['new_unit'] == 2) ? "selected" : "" ?>>USD</option>
                                                <option value="3" <?= ($row_td['new_unit'] == 3) ? "selected" : "" ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="nhap-luong-2" class="<?= ($row_td['new_money'] == 0 && $row_td['gia_kt'] != 0) ? "" : "d_none" ?> nhap-luong-muon tbao_loivali">
                                    <div class="dis_flex">
                                        <div class="nhap-so">
                                            <input class="input-2" type="text" name="gia_kthuc" value="<?= ($row_td['new_money'] == 0 && $row_td['gia_kt'] != 0) ? number_format($row_td['gia_kt']) : "" ?>" onkeyup="format_gtri(this)" placeholder="Nhập giá sàn dự kiến đến mức...">
                                        </div>
                                        <div class="don-vi-2">
                                            <select class="don-vi-tien-2" name="dvi_tien">
                                                <option value="1" <?= ($row_td['new_unit'] == 1) ? "selected" : "" ?>>VNĐ</option>
                                                <option value="2" <?= ($row_td['new_unit'] == 2) ? "selected" : "" ?>>USD</option>
                                                <option value="3" <?= ($row_td['new_unit'] == 3) ? "selected" : "" ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div id="nhap-luong-3" class="<?= ($row_td['new_money'] != 0 && $row_td['gia_kt'] != 0) ? "" : "d_none" ?> nhap-luong-muon">
                                    <div class="dis_flex">
                                        <div class="nhap-so tbao_loivali">
                                            <input class="input-2-b" type="text" name="gia_bdau_mua" onkeyup="format_gtri(this)" placeholder="Từ mức" value="<?= ($row_td['new_money'] != 0 && $row_td['gia_kt'] != 0) ? number_format($row_td['new_money']) : "" ?>">
                                        </div>
                                        <div class="nhap-so tbao_loivali">
                                            <input class="input-2-b" type="text" name="gia_kthuc_mua" onkeyup="format_gtri(this)" placeholder="Đến mức" value="<?= ($row_td['new_money'] != 0 && $row_td['gia_kt'] != 0) ? number_format($row_td['gia_kt']) : "" ?>">
                                        </div>
                                        <div class="don-vi-2">
                                            <select class="don-vi-tien-2" name="dvi_tien">
                                                <option value="1" <?= ($row_td['new_unit'] == 1) ? "selected" : "" ?>>VNĐ</option>
                                                <option value="2" <?= ($row_td['new_unit'] == 2) ? "selected" : "" ?>>USD</option>
                                                <option value="3" <?= ($row_td['new_unit'] == 3) ? "selected" : "" ?>>EURO</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="dang-tin-1">
                        <p class="thong-tin">Phí dự thầu</p>
                        <div class="dis_flex">
                            <div class="nhap-so">
                                <input class="input-1" type="text" name="phidu_thau" value="<?= ($row_td['phi_duthau'] != 0) ? number_format($row_td['phi_duthau']) : "" ?>" placeholder="Nhập phí dự thầu...">
                            </div>
                            <div class="don-vi-2">
                                <select class="don-vi-tien-2" name="dvi_tien_dt">
                                    <option value="1" <?= ($row_td['donvi_thau'] == 1) ? "selected" : "" ?>>VNĐ</option>
                                    <option value="2" <?= ($row_td['donvi_thau'] == 2) ? "selected" : "" ?>>USD</option>
                                    <option value="3" <?= ($row_td['donvi_thau'] == 3) ? "selected" : "" ?>>EURO</option>
                                </select>
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
        <? include '../modals/md_dia_chi.php' ?>
        <div class="modal share_modal tbao_tcong_d">
            <div class="modal-content">
                <div class="bgom_modal sh_bgr_one">
                    <div class="modal-body">
                        <div class="form_body tex_center">
                            <div class="avt_tbao_tc">
                                <img src="/images/anh_moi/icon_tbao_tc.png" />
                            </div>
                            <p class="sh_size_two sh_clr_two cau_tbao">Bạn đã chỉnh sửa thông tin thành công!</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <p class="luu_chung cr_weight sh_cursor sh_clr_one sh_size_three butt_ctn sh_bgr_two sh_border_rdu" data="<?= $_COOKIE['UT'] ?>" onclick="click_chuyenhref(this)">Đồng ý</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
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
                                            <p class="tenanh_chon">` + filename + `</p>
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

    function click_chuyenhref(id) {
        var ustype = $(id).attr("data");
        if (ustype == 1) {
            window.location.href = '/ho-so-nguoi-ban-ca-nhan/quan-ly-tin-mua.html';
        } else {
            window.location.href = '/ho-so-quan-ly-tin-mua.html';
        }
    }

    function xoa_botep(el) {
        $(el).parents(".khoi-1").find('.upload_inputfile').val('');
        $(el).parents(".khoi-1").find('.upfl_anh').show();
        $(el).parents(".khoi-1").find('.upload_img-wrap').attr("data", '');
        $(el).parents(".khoi-1").find('.upload_img-wrap').attr("data1", '');
        $(el).parents(".khoi-1").find('.upload_img-wrap').html('');
    }

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
                },
                tgian_kthuc: {
                    required: true,
                },
                tgian_tbao_thau: {
                    required: true,
                },
                tgian_kttbao_thau: {
                    required: true,
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
                }
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
                },
                tgian_kthuc: {
                    required: "Chọn thời gian kết thúc nhận thầu",
                },
                tgian_tbao_thau: {
                    required: 'Chọn thời hạn bắt đầu thông báo ',
                },
                tgian_kttbao_thau: {
                    required: 'Chọn thời hạn kết thúc thông báo',
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
                }
            }
        });
        if (form_mua.valid() === true) {
            var id_dm = $(".dmuc_spham").attr("data");
            var id_cs = $(".dangtin_mua").attr("data1");
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

            var anh_dd = [];
            $(".anh_dadang").each(function() {
                var anh_dang = $(this).children('img').attr("src");
                if (anh_dang != "") {
                    anh_dd.push(anh_dang);
                }
            });

            // file cũ
            var file_dthau = $(".file_dthau").attr("data");
            var dd_file_dthau = $(".file_dthau").attr("data1");
            var file_nophs = $(".file_nophs").attr("data");
            var dd_file_nophs = $(".file_nophs").attr("data1");
            var file_chidan = $(".file_chidan").attr("data");
            var dd_file_chidan = $(".file_chidan").attr("data1");

            var fd = new FormData();

            fd.append('id_dm', id_dm);
            fd.append('id_cs', id_cs);
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
            // lấy ảnh cũ
            fd.append('anh_dd', anh_dd);
            // end
            $('.avt_files').each(function() {
                fd.append('files[]', $(this).prop("files")[0]);
            });

            fd.append('file_mota', $(".avtfile_spham").prop('files')[0]);
            fd.append('file_thutuc', $(".avtfile_thutuc").prop('files')[0]);
            fd.append('file_hoso', $(".avtfile_hoso").prop('files')[0]);

            fd.append('file_dthau', file_dthau);
            fd.append('dd_file_dthau', dd_file_dthau);
            fd.append('file_nophs', file_nophs);
            fd.append('dd_file_nophs', dd_file_nophs);
            fd.append('file_chidan', file_chidan);
            fd.append('dd_file_chidan', dd_file_chidan);
            fd.append('sdt_lhe', $("input[name='sdt_lienhe']").val());
            fd.append('email_lhe', $("input[name='email_lienhe']").val());
            $.ajax({
                url: '/ajax/csua_dtin_mua.php',
                type: 'POST',
                data: fd,
                dataType: 'json',
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $(".dang-tin").prop('disabled', true);
                },
                success: function(data) {
                    if (data.result == false) {
                        alert(data.error);
                        $(".dang-tin").prop('disabled', false);
                        $(".v_container").addClass("d_none");
                        $(".tindang-container").removeClass("d_none");
                        $(".dangtin_muaspham").removeClass("edit_infor");
                        $(".v_container").html('');
                    } else {
                        $(".tbao_tcong_d .cau_tbao").text("Cập nhật tin mua thành công");
                        $(".tbao_tcong_d").show();
                    }
                }

            })

        }
    });

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
                },
                tgian_kthuc: {
                    required: true,
                },
                tgian_tbao_thau: {
                    required: true,
                },
                tgian_kttbao_thau: {
                    required: true,
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
                }
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
                },
                tgian_kthuc: {
                    required: "Chọn thời gian kết thúc nhận thầu",
                },
                tgian_tbao_thau: {
                    required: 'Chọn thời hạn bắt đầu thông báo ',
                },
                tgian_kttbao_thau: {
                    required: 'Chọn thời hạn kết thúc thông báo',
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
                }
            }
        });
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
            var avt_anh = [];

            $('.avt_files').each(function() {
                var imd = $(this).prop('files')[0];
                if (imd != "") {
                    var url_anh = URL.createObjectURL(imd);
                    avt_anh.push(url_anh);
                }
            });

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

            fd.append('avt_anh', avt_anh);

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