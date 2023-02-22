<?
include("config.php");
$list_gia = new db_query("SELECT `bg_id`, `bg_thoigian`, `bg_dongia`, `bg_chietkhau`, `bg_thanhtien`, `bg_ttien_vat` FROM `bang_gia` WHERE `bg_type` = 3 ");
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Bảng giá ghim tin</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/css/style_new/select2.min.css" as="style">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_duy.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">

</head>

<body>
    <div class="main_bggt">
        <div class="main_header">
            <?php include("../includes/common/inc_header.php"); ?>
        </div>
        <div class="main_bggt_content">
            <div class="main_content_danhmuc">
                <a href="/">Trang chủ</a>
                <div class="arout_right">
                    <img src="../images/anh_moi/bg_mt_right.svg" alt="">
                </div>
                <a href="/bang-gia.html">Bảng báo giá</a>
            </div>

            <div class="main_bggt_content_noidung">
                <div class="main_content_noidung_heading">BẢNG BÁO GIÁ DỊCH VỤ</div>
                <div class="main_bggt_content_noidung_sub">
                    <div class="main_bggt_noidung_hd">Gói dịch vụ ghim tin trên Raonhanh được báo giá như sau : </div>
                    <div class="main_bggt_content_noidung_table">
                        <div class="main_bggt_content_noidung_table_sub">
                            <table>
                                <tr class="noidung_table_tr ">
                                    <th class="bggt_th1">
                                        <div class="bggt1_th_img">
                                            <img src="../images/anh_moi/bg_ghim.svg" alt="">
                                        </div>
                                    </th>
                                    <th class="bggt_th">
                                        <div class="bggt_text">
                                            <div class="bggt_text1">Thời gian</div>
                                            <p>(Tuần)</p>
                                        </div>
                                    </th>
                                    <th class="bggt_th">
                                        <div class="bggt_text">
                                            <div class="bggt_text1">Đơn giá</div>
                                            <p>(VNĐ)</p>
                                        </div>
                                    </th>
                                    <th class="bggt_th">
                                        <div class="bggt_text">
                                            <div class="bggt_text1">Chiết khấu</div>
                                            <p>(%)</p>
                                        </div>
                                    </th>
                                    <th class="bggt_th">
                                        <div class="bggt_text">
                                            <div class="bggt_text1">Thành tiền</div>
                                            <p>(VNĐ)</p>
                                        </div>
                                    </th>
                                    <th class="bggt_th">
                                        <div class="bggt_text">
                                            <div class="bggt_text1">Thành tiền VAT</div>
                                            <p>(VNĐ)</p>
                                        </div>
                                    </th>
                                </tr>
                                <? while ($row_bg = mysql_fetch_assoc($list_gia->result)) { ?>
                                    <tr class="noidung_table_tr_pd <?= ($row_bg['bg_id'] == 12) ? "active" : "" ?>">
                                        <td class="bggt_td">
                                            <label class="bggt_td_cb">
                                                <input type="radio" name="redio1" class="demo" <?= ($row_bg['bg_id'] == 12) ? "checked" : "" ?>>
                                                <span class="checkmark"></span>
                                            </label>
                                        </td>
                                        <td class="bggt_td">
                                            <div class="bggt_td_tex">
                                                <p class="cr_weight"><?= $row_bg['bg_thoigian'] ?></p>
                                            </div>
                                        </td>
                                        <td class="bggt_td">
                                            <div class="bggt_td_tex">
                                                <p class="cr_weight"><?= number_format($row_bg['bg_dongia']) ?></p>
                                            </div>
                                        </td>
                                        <td class="bggt_td">
                                            <div class="bggt_td_tex">
                                                <p class="cr_weight"><?= $row_bg['bg_chietkhau'] ?>%</p>
                                            </div>
                                        </td>
                                        <td class="bggt_td">
                                            <div class="bggt_td_tex">
                                                <p class="cr_weight"><?= number_format($row_bg['bg_thanhtien']) ?></p>
                                            </div>
                                        </td>
                                        <td class="bggt_td">
                                            <div class="bggt_td_tex">
                                                <p class="cr_weight"><?= number_format($row_bg['bg_ttien_vat']) ?></p>
                                            </div>
                                        </td>
                                    </tr>
                                <? } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            <div class="main_bggt_thanhtoan">
                <div class="main_content_noidung_heading">HÌNH THỨC THANH TOÁN</div>
                <? include("../includes/inc_new/hinh_thuc_tt.php"); ?>
            </div>
        </div>

        <div class="footer dangtin_nguoi_mua">
            <?php include("../includes/inc_new/inc_footer.php") ?>
        </div>
    </div>

</body>
<script type="text/javascript" src="/js/style_new/bang_gia.js"></script>

</html>