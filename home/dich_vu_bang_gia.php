<?
include("config.php");

$list_tgian = new db_query("SELECT `bg_id`, `bg_thoigian` FROM `bang_gia` WHERE `bg_type` = 2 ");
$row_tgian = $list_tgian->result_array();

$list_gia = new db_query("SELECT `id` FROM `dichvu_ghim` ");
$row_gia = $list_gia->result_array();
$arr = [];
for ($i = 0; $i < count($row_gia); $i++) {
    $value = $row_gia[$i];
    $arr[$value['id']] = $value;
}

?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Dịch vụ bảng giá</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link href="/css/style_new/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/css/style_new/footer.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/css/newCss/admin.style.css">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style.css">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style_duy.css">

</head>

<body>
    <div class="dvbg">
        <div class="dvbg_header">
            <?php include "../includes/common/inc_header.php"; ?>
        </div>
        <div class="dvbg_content">
            <div class="main_content_danhmuc">
                <a href="/">Trang chủ</a>
                <div class="arout_right">
                    <img src="../images/anh_moi/bg_mt_right.svg" alt="">
                </div>
                <a href="/bang-gia.html">Bảng báo giá</a>
            </div>

            <div class="dvbg_content_noidung">
                <div class="main_content_noidung_heading">BẢNG BÁO GIÁ DỊCH VỤ</div>

                <div class="dvbg_ghim">
                    <div class="dvbg_ghim_hd">Dịch vụ đẩy tin </div>
                    <div class="dvbg_ghim_main">
                        <div class="dvbg_ghim_main_sub">
                            <div class="dvbg_ghim_main_gio">
                                <div class="dvbg_ghim_main_gio-text">Giờ đẩy tin </div>
                                <div class="dvbg_ghim_main_gio-select">
                                    <select name="tin_noi_bat" class="slect-hang">
                                        <? foreach ($row_tgian as $row_tg) { ?>
                                            <option value="<?= $row_tg['bg_id'] ?>" <?= ($row_tg['bg_id'] == 21) ? "selected" : "" ?>><?= $row_tg['bg_thoigian'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main_ngay">
                                <div class="dvbg_ghim_main_ngay-text">Số ngày đẩy tin</div>
                                <div class="dvbg_ghim_main_ngay-click" data="<?= $arr[1]['id'] ?>">
                                    <div class="dvbg_ghim_main_ngay-tru">-</div>
                                    <div class="dvbg_ghim_main_ngay-so">
                                        <div class="dvbg_ghim_main_ngay-so-sub">
                                            <input type="text" value="1" name="ngay_ghim" class="ngay_ghim" onkeyup="ngay_dien(this)">
                                        </div>
                                    </div>
                                    <div class="dvbg_ghim_main_ngay-cong">+</div>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main-money">Giá gói : <span class="gia_tien cr_weight" id="giaday_1"><?= number_format(100000) ?></span> VNĐ</div>
                        </div>
                    </div>
                </div>

                <!-- <div class="dvbg_ghim">
                    <div class="dvbg_ghim_hd">Dịch vụ đẩy tin trang chủ ( Tin hấp dẫn ) </div>
                    <div class="dvbg_ghim_main">
                        <div class="dvbg_ghim_main_sub">
                            <div class="dvbg_ghim_main_gio">
                                <div class="dvbg_ghim_main_gio-text">Giờ đẩy tin </div>
                                <div class="dvbg_ghim_main_gio-select">
                                    <select name="tin_hapdan" class="slect-hang">
                                        <? foreach ($row_tgian as $row_tg) { ?>
                                            <option value="<?= $row_tg['bg_id'] ?>" <?= ($row_tg['bg_id'] == 21) ? "selected" : "" ?>><?= $row_tg['bg_thoigian'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main_ngay">
                                <div class="dvbg_ghim_main_ngay-text">Số ngày đẩy tin</div>
                                <div class="dvbg_ghim_main_ngay-click" data="<?= $arr[2]['id'] ?>">
                                    <div class="dvbg_ghim_main_ngay-tru">-</div>
                                    <div class="dvbg_ghim_main_ngay-so">
                                        <div class="dvbg_ghim_main_ngay-so-sub">
                                            <input type="text" value="1" name="ngay_ghim" class="ngay_ghim" onkeyup="ngay_dien(this)">
                                        </div>
                                    </div>
                                    <div class="dvbg_ghim_main_ngay-cong">+</div>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main-money">Giá gói : <span class="gia_tien cr_weight" id="giaday_2"><?= number_format($arr[2]['gia']) ?></span> VNĐ</div>
                        </div>
                    </div>
                </div>

                <div class="dvbg_ghim">
                    <div class="dvbg_ghim_hd">Dịch vụ đẩy tin trang tỉnh thành </div>
                    <div class="dvbg_ghim_main">
                        <div class="dvbg_ghim_main_sub">
                            <div class="dvbg_ghim_main_gio">
                                <div class="dvbg_ghim_main_gio-text">Giờ đẩy tin </div>
                                <div class="dvbg_ghim_main_gio-select">
                                    <select name="tin_tthanh" class="slect-hang">
                                        <? foreach ($row_tgian as $row_tg) { ?>
                                            <option value="<?= $row_tg['bg_id'] ?>" <?= ($row_tg['bg_id'] == 21) ? "selected" : "" ?>><?= $row_tg['bg_thoigian'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main_ngay">
                                <div class="dvbg_ghim_main_ngay-text">Số ngày đẩy tin</div>
                                <div class="dvbg_ghim_main_ngay-click" data="<?= $arr[4]['id'] ?>">
                                    <div class="dvbg_ghim_main_ngay-tru">-</div>
                                    <div class="dvbg_ghim_main_ngay-so">
                                        <div class="dvbg_ghim_main_ngay-so-sub">
                                            <input type="text" value="1" name="ngay_ghim" class="ngay_ghim" onkeyup="ngay_dien(this)">
                                        </div>
                                    </div>
                                    <div class="dvbg_ghim_main_ngay-cong">+</div>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main-money">Giá gói : <span class="gia_tien cr_weight" id="giaday_4"><?= number_format($arr[4]['gia']) ?></span> VNĐ</div>
                        </div>
                    </div>
                </div>

                <div class="dvbg_ghim">
                    <div class="dvbg_ghim_hd">Dịch vụ đẩy tin trang danh mục</div>
                    <div class="dvbg_ghim_main">
                        <div class="dvbg_ghim_main_sub">
                            <div class="dvbg_ghim_main_gio">
                                <div class="dvbg_ghim_main_gio-text">Giờ đẩy tin </div>
                                <div class="dvbg_ghim_main_gio-select">
                                    <select name="tin_danhmuc" class="slect-hang">
                                        <? foreach ($row_tgian as $row_tg) { ?>
                                            <option value="<?= $row_tg['bg_id'] ?>" <?= ($row_tg['bg_id'] == 21) ? "selected" : "" ?>><?= $row_tg['bg_thoigian'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main_ngay">
                                <div class="dvbg_ghim_main_ngay-text">Số ngày đẩy tin</div>
                                <div class="dvbg_ghim_main_ngay-click" data="<?= $arr[3]['id'] ?>">
                                    <div class="dvbg_ghim_main_ngay-tru">-</div>
                                    <div class="dvbg_ghim_main_ngay-so">
                                        <div class="dvbg_ghim_main_ngay-so-sub">
                                            <input type="text" value="1" name="ngay_ghim" class="ngay_ghim" onkeyup="ngay_dien(this)">
                                        </div>
                                    </div>
                                    <div class="dvbg_ghim_main_ngay-cong">+</div>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main-money">Giá gói : <span class="gia_tien cr_weight" id="giaday_3"><?= number_format($arr[3]['gia']) ?></span> VNĐ</div>
                        </div>
                    </div>
                </div>

                <div class="dvbg_ghim">
                    <div class="dvbg_ghim_hd">Dịch vụ đẩy tin trang danh mục tại tỉnh thành</div>
                    <div class="dvbg_ghim_main">
                        <div class="dvbg_ghim_main_sub">
                            <div class="dvbg_ghim_main_gio">
                                <div class="dvbg_ghim_main_gio-text">Giờ đẩy tin </div>
                                <div class="dvbg_ghim_main_gio-select">
                                    <select name="tin_dmtthanh" class="slect-hang">
                                        <? foreach ($row_tgian as $row_tg) { ?>
                                            <option value="<?= $row_tg['bg_id'] ?>" <?= ($row_tg['bg_id'] == 21) ? "selected" : "" ?>><?= $row_tg['bg_thoigian'] ?></option>
                                        <? } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main_ngay">
                                <div class="dvbg_ghim_main_ngay-text">Số ngày đẩy tin</div>
                                <div class="dvbg_ghim_main_ngay-click" data="<?= $arr[5]['id'] ?>">
                                    <div class="dvbg_ghim_main_ngay-tru">-</div>
                                    <div class="dvbg_ghim_main_ngay-so">
                                        <div class="dvbg_ghim_main_ngay-so-sub">
                                            <input type="text" value="1" name="ngay_ghim" class="ngay_ghim" onkeyup="ngay_dien(this)">
                                        </div>
                                    </div>
                                    <div class="dvbg_ghim_main_ngay-cong">+</div>
                                </div>
                            </div>
                            <div class="dvbg_ghim_main-money">Giá gói : <span class="gia_tien cr_weight" id="giaday_5"><?= number_format($arr[5]['gia']) ?></span> VNĐ</div>
                        </div>
                    </div>
                </div> -->
            </div>

            <div class="main_bggt_thanhtoan">
                <div class="main_content_noidung_heading">HÌNH THỨC THANH TOÁN</div>
                <div class="dvgt_themhinhthuc">
                    <div class="dvgt_themhinhthuc_1">
                        <div class="dvgt_themhinhthuc_text_to">1</div>
                        <div class="dvgt_themhinhthuc_text_con">Số dư tài khoản Raonhanh </div>
                    </div>
                    <div class="dvgt_themhinhthuc_hoac">hoặc</div>
                    <div class="dvgt_themhinhthuc_1">
                        <div class="dvgt_themhinhthuc_text_to">2</div>
                        <div class="dvgt_themhinhthuc_text_con">Chuyển tiền qua internet banking </div>
                    </div>
                </div>
                <? include("../includes/inc_new/hinh_thuc_tt.php"); ?>
            </div>
        </div>
        <div class="dvbg_footer">
            <?php include('../includes/inc_new/inc_footer.php'); ?>
        </div>
    </div>
</body>
<script type="text/javascript" src="/js/style_new/bang_gia.js"></script>

</html>