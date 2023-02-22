<?
include 'config.php';

$id = getValue('id', 'int', 'GET', 0);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
}


if ($id != 0) {
    $user = new db_query("SELECT `usc_id`, `usc_store_name`,  `usc_logo`, `usc_anhbia`, `usc_phone`, `usc_time`, `usc_email`, `usc_address`, `usc_des`,
                    `usc_website`, `usc_facename`, `chat365_id`, `email_ht` FROM `user` WHERE `usc_id` = '$id' ");
    $user_ok = mysql_fetch_assoc($user->result);
    $name_store = $user_ok['usc_store_name'];
    $time_store = $user_ok['usc_time'];
    $email_store = $user_ok['usc_email'];
    $address_store = $user_ok['usc_address'];
    $des_store = $user_ok['usc_des'];
    $logo_usc = $user_ok['usc_logo'];
    $img_store = $user_ok['usc_anhbia'];


    // tin đã đăng
    $tin_dang = new db_query("SELECT COUNT(`new_id`) AS cou_td FROM `new` WHERE `new_user_id` = $id  AND `new_active` = 1 ");
    $cou_td = mysql_fetch_assoc($tin_dang->result)['cou_td'];

    // 30 ngay qua
    $ngay_qua = time() - (30 * 86400);

    $sotin = new db_query("SELECT COUNT(`new_id`) AS cou_tnq FROM `new` WHERE `new_user_id` = $id AND `new_update_time` > $ngay_qua AND `new_active` = 1  ");
    $cou_tnq = mysql_fetch_assoc($sotin->result)['cou_tnq'];

    $bluan_toi = new db_query("SELECT COUNT(`eva_id`) AS cou_eva, SUM(`eva_stars`) AS sum_eva FROM `evaluate`
                            INNER JOIN `user` ON `evaluate`.`user_id` = `user`.`usc_id` WHERE `bl_user` = $id
                            AND `new_id` = 0 AND `eva_active` = 1 AND (`usc_type` = 1 OR `usc_type` = 5) ");
    $row_bltoi = mysql_fetch_assoc($bluan_toi->result);
    // tin dang ban
    $tin = new db_query("SELECT `new_id`, `new_image`, `new_title`, `new_create_time`, `new_update_time`, `dia_chi`, `new_money`, `new_unit`, `da_ban`, `chotang_mphi`,
                    `link_title`, `new_cate_id` FROM `new` WHERE `new_user_id` = $id AND `new_buy_sell` = 2 ");
    // tin dang mua
    $tin_mua = new db_query("SELECT `new_id`, `new_image`, `new_title`, `new_create_time`, `new_update_time`, `dia_chi`, `new_money`, `da_ban`, `new_unit`, `new_cate_id`,
                    `link_title`, `new_cate_id` FROM `new` WHERE `new_user_id` = $id  AND `new_buy_sell` = 1 AND `new_active` = 1 ");

    $urlusc = "http://dev5.tinnhanh365.vn/gian-hang/" . $user_ok['usc_id'] . "/" . replaceTitle($user_ok['usc_store_name']) . ".html";

    $urluri = "http://dev5.tinnhanh365.vn" . $_SERVER['REQUEST_URI'];

    if ($urlusc != $urluri) {
        header("HTTP/1.1 301 Moved Permanently");
        header("Location: $urlusc");
        exit();
    }

    $sv_url1 = "/gian-hang/" . $user_ok['usc_id'] . "/" . replaceTitle($user_ok['usc_store_name']) . ".html";
} else {
    header('Location: /');
}


?>
<!DOCTYPE html>
<html lang="vi">
<!--link meta seo-->

<head>
    <title>Shop rao vặt <?= $user_ok['usc_store_name'] ?> - Gian hàng mua bán <?= $user_ok['usc_store_name'] ?></title>
    <meta name="keywords" content="rao vặt <?= $user_ok['usc_store_name'] ?>,mua bán, gian hàng <?= $user_ok['usc_store_name'] ?>, rao vặt miễn phí, mua bán <?= $user_ok['usc_store_name'] ?>, shop <?= $user_ok['usc_store_name'] ?>, raonhanh365" />
    <meta name="description" content="Shop Rao vặt <?= $user_ok['usc_store_name'] ?> là kênh mua bán của <?= $user_ok['usc_store_name'] ?> cũng là gian hàng uy tín chất lượng trên Raonhanh365. <?= $user_ok['usc_store_name'] ?> có tới hàng trăm sản phẩm rao vặt nổi bật trên thị trường Việt. Tham gia rao vặt miễn phí cùng mua bán với <?= $user_ok['usc_store_name'] ?> trên Raonhanh365.vn để thỏa mãn mọi nhu cầu mua sắm của mọi người." />
    <meta property="og:title" content="Shop rao vặt <?= $user_ok['usc_store_name'] ?> - Gian hàng mua bán <?= $user_ok['usc_store_name'] ?>" />
    <meta property="og:description" content="Shop Rao vặt <?= $user_ok['usc_store_name'] ?> là kênh mua bán của <?= $user_ok['usc_store_name'] ?> cũng là gian hàng uy tín chất lượng trên Raonhanh365. <?= $user_ok['usc_store_name'] ?> có tới hàng trăm sản phẩm rao vặt nổi bật trên thị trường Việt. Tham gia rao vặt miễn phí cùng mua bán với <?= $user_ok['usc_store_name'] ?> trên Raonhanh365.vn để thỏa mãn mọi nhu cầu mua sắm của mọi người." />
    <meta property="og:url" content="<?= $urlusc ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Shop rao vặt <?= $user_ok['usc_store_name'] ?> - Gian hàng mua bán <?= $user_ok['usc_store_name'] ?><" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <!-- <meta name="robots" content="index,follow" /> -->
    <meta name="robots" content="noindex, nofollow" />

    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="/" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <link rel="preload" href="<?= $urlusc ?>" />

    <link rel="canonical" href="<?= $urlusc ?>" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/select2.min.css?v='<?= $version ?>'" as="style">
    <link href="/css/select2.min.css?v='<?= $version ?>'" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="gianhang_container gian_hang_kh">
            <div class="khoi_khong_face">
                <? include('../includes/inc_new/inc_ghang_top.php'); ?>

                <div class="khoigioithieu khoigioithieu_khach hs_df_11">
                    <div class="d_flex j_between hs_df_12">
                        <div class="d_flex hd-align-center">
                            <div class="bg_chung hs_df_13">
                                <img src="/images/anh_moi/gioithieu.svg" alt="Giới thiệu">
                            </div>
                            <h2 class="color_text gioithieu">Giới thiệu</h2>
                        </div>
                    </div>
                    <div class="d_flex flex_w hs_df_14">
                        <p class="khoithongtin_ct">Loại tài khoản: <span>doanh nghiệp</span></p>
                        <p class="khoithongtin_ct">Ngày tham gia: <span><?= $time_store ?></span></p>
                        <p class="khoithongtin_ct <?= (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) ? "" : "sh_cursor op_ovl_dn" ?>">Số điện thoại: <span><?= (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) ? $user_ok['usc_phone'] : substr_replace($user_ok['usc_phone'], '*******', -7) ?></span></p>
                        <p class="khoithongtin_ct">Email:
                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                <? if ($user_ok['email_ht'] != "") { ?>
                                    <span><?= $user_ok['email_ht'] ?></span>
                                <? } else { ?>
                                    <span><?= $user_ok['usc_email'] ?></span>
                                <? } ?>
                            <? } ?>
                        </p>
                        <p class="khoithongtin_ct">Địa chỉ: <span><?= $address_store ?></span></p>
                    </div>
                    <div class="des_detail hs_df_15">
                        <p class="tt_des hd_cspointer">Mô tả chi tiết</p>
                        <p class="show_text_ct"><?= $des_store ?></p>
                    </div>
                </div>
                <div class="d_flex j_between hs_df_01">
                    <div class="khoitin_con">
                        <div class="d_flex hd-align-center hs_df_02">
                            <div class="bg_chung">
                                <img src="/images/anh_moi/tindadang.svg" alt="Tin đã đăng">
                            </div>
                            <div class="color_cam gioithieu">Tin đã đăng</div>
                        </div>
                        <p class="soluong_tt color_cam"><?= $cou_td ?></p>
                        <p class="tin30ngay">+ <?= $cou_tnq ?> tin mới trong 30 ngày qua</p>
                    </div>
                    <div class="khoitin_con">
                        <div class="d_flex hd-align-center hs_df_02">
                            <div class="bg_chung">
                                <img src="/images/anh_moi/danhgia.svg" alt="Đánh giá trung bình">
                            </div>
                            <div class="color_vang gioithieu">Đánh giá trung bình</div>
                        </div>
                        <p class="soluong_tt color_vang"><?= round(($row_bltoi['sum_eva'] / $row_bltoi['cou_eva']), 1) ?></p>
                        <p class="tin30ngay">Trên <?= $row_bltoi['cou_eva'] ?> lượt đánh giá</p>
                    </div>
                    <div class="khoitin_con">
                        <div class="d_flex hd-align-center hs_df_02">
                            <div class="bg_chung">
                                <img src="/images/anh_moi/phanhoichat.svg" alt="Tỉ lệ phản hồi chat">
                            </div>
                            <div class="color_tim gioithieu">Tỉ lệ phản hồi chat</div>
                        </div>
                        <p class="soluong_tt color_tim">0%</p>
                        <p class="tin30ngay">Thường trả lời trong vòng 2 giờ</p>
                    </div>
                </div>
                <div class="khoi_dangtinban">
                    <div class="d_flex hd-align-center tin_dangban hs_df_02 ">
                        <div class="bg_chung">
                            <img src="/images/anh_moi/tinmua.svg" alt="Tin đăng bán">
                        </div>
                        <h2 class="color_xanhla gioithieu">Tin đăng bán</h2>
                    </div>
                    <div class="d_flex flex_w overflow_scroll_ban">
                        <? if (mysql_num_rows($tin->result) > 0) {
                            while ($tin_ok = (mysql_fetch_assoc($tin->result))) {
                                $id_tin = $tin_ok['new_id'];
                                $img = $tin_ok['new_image'];
                                $img2 = explode(';', $img);
                                $dem_img = count($img2);
                        ?>
                                <div class="khoinho_dangtin">
                                    <div class="khoinho_dangtin_padding">
                                        <div class="khoi_anhdangtin">
                                            <div class="khoi_anhdangtin_img">
                                                <a href="/<?= replaceTitle($tin_ok['link_title']) ?>-c<?= $tin_ok['new_id'] ?>.html">
                                                    <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $img2[0]) ?>" alt="<?= $tin_ok['new_title'] ?>" class="img_dangtinto">
                                                    <? if ($tin_ok['da_ban'] == 1) { ?>
                                                        <? if ($tin_ok['new_cate_id'] != 120) { ?>
                                                            <span class="tbao_daban_tx po_ab">Đã bán</span>
                                                        <? } else { ?>
                                                            <span class="tbao_daban_tx tdc_uvien po_ab">Đã tìm được ứng viên</span>
                                                        <? } ?>
                                                    <? } ?>
                                                </a>
                                                <? if ($dem_img > 1) { ?>
                                                    <div class="khoi_sl_mayanh">
                                                        <img src="/images/anh_moi/may_anh.png" alt="ảnh sản phẩm">
                                                        <p class="font-12 soluong_anh"><?= $dem_img ?></p>
                                                    </div>
                                                <? } ?>
                                                <div class="yeuthich_tinl">
                                                    <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                                                        $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$us_id'
                                                                            AND `usc_type` = '$us_type'"); ?>
                                                        <? if (mysql_num_rows($check->result) > 0) { ?>
                                                            <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="yêu thích" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } else { ?>
                                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="yêu thích" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } ?>
                                                    <? } else { ?>
                                                        <a href="/dang-nhap.html">
                                                            <img src="/images/anh_moi/yeuthich_moi.png" alt="yêu thích" class="ko_yeuthich hd_cspointer">
                                                        </a>
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="khoi_text_ban">
                                            <a href="/<?= replaceTitle($tin_ok['link_title']) ?>-c<?= $tin_ok['new_id'] ?>.html" class="color-blk hs_df_16">
                                                <h3 class="title_ban font-16 elipsis2 ba_cham1"><?= $tin_ok['new_title'] ?></h3>
                                            </a>
                                            <p class="font-14 color_a font-bold time_ban hs_df_17"><?= lay_tgian($tin_ok['new_update_time']) ?></p>
                                            <p class="font-14 color_a address_ban elipsis1 hs_df_18"><?= ltrim($tin_ok['dia_chi'], ', ') ?></p>
                                            <div class="d_flex j_between hd-align-center khoi_tim khoi_tim_df">
                                                <? if ($tin_ok['new_cate_id'] != 120) { ?>
                                                    <? if ($tin_ok['chotang_mphi'] == 1) { ?>
                                                        <p class="color_cam tien_ban">Cho tặng miễn phí</p>
                                                    <? } else if ($tin_ok['new_money'] > 0) { ?>
                                                        <p class="color_cam tien_ban"><?= number_format($tin_ok['new_money']) ?> <?= $arr_dvtien[$tin_ok['new_unit']] ?></p>
                                                    <? } else if ($tin_ok['new_money'] == 0 || $tin_ok['new_money'] == '') { ?>
                                                        <p class="color_cam tien_ban">Liên hệ người bán </p>
                                                    <? } ?>
                                                <? } else { ?>
                                                    <? if ($tin_ok['new_money'] != 0 && $tin_ok['gia_kt'] != 0) { ?>
                                                        <?= number_format($tin_ok['new_money']) ?> - <?= number_format($tin_ok['gia_kt']) ?> <?= $arr_dvtien[$tin_ok['new_unit']] ?>
                                                    <? } else if ($tin_ok['new_money'] != 0 && $tin_ok['gia_kt'] == 0) { ?>
                                                        Từ <?= number_format($tin_ok['new_money']) ?> <?= $arr_dvtien[$tin_ok['new_unit']] ?>
                                                    <? } else if ($tin_ok['new_money'] == 0 && $tin_ok['gia_kt'] != 0) { ?>
                                                        Đến <?= number_format($tin_ok['gia_kt']) ?> <?= $arr_dvtien[$tin_ok['new_unit']] ?>
                                                    <? } else { ?>
                                                        Thỏa thuận
                                                    <? } ?>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? }
                        } else { ?>
                            <p class="chua_codgia">Tài khoản này chưa đăng tin nào</p>
                        <? } ?>
                    </div>
                </div>

                <div class="khoi_dangtinban khoi_dangtinmua">
                    <div class="d_flex hd-align-center tin_dangban hs_df_02 ">
                        <div class="bg_chung">
                            <img src="/images/anh_moi/tindangmua.svg" alt="Tin đăng mua">
                        </div>
                        <h2 class="sh_clr_six gioithieu">Tin đăng mua</h2>
                    </div>
                    <div class="d_flex flex_w overflow_scroll_ban">
                        <? if (mysql_num_rows($tin_mua->result) > 0) {
                            while ($row_mua = (mysql_fetch_assoc($tin_mua->result))) {
                                $id_tin = $row_mua['new_id'];
                                $img = $row_mua['new_image'];
                                $img2 = explode(';', $img);
                                $dem_img = count($img2);
                        ?>
                                <div class="khoinho_dangtin">
                                    <div class="khoinho_dangtin_padding">
                                        <div class="khoi_anhdangtin">
                                            <div class="khoi_anhdangtin_img">
                                                <a href="/<?= replaceTitle($row_mua['link_title']) ?>-<?= ($row_mua['new_cate_id'] == 121) ? "c" : "ct" ?><?= $row_mua['new_id'] ?>.html">
                                                    <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $img2[0]) ?>" alt="<?= $row_mua['new_title'] ?>" class="img_dangtinto">
                                                    <? if ($row_mua['da_ban'] == 1) { ?>
                                                        <? if ($row_mua['new_cate_id'] == 121) { ?>
                                                            <span class="tbao_daban_tx tdc_uvien po_ab">Đã tìm được việc làm</span>
                                                        <? } ?>
                                                    <? } ?>
                                                </a>
                                                <? if ($dem_img > 1) { ?>
                                                    <div class="khoi_sl_mayanh">
                                                        <img src="/images/anh_moi/may_anh.png" alt="ảnh sản phẩm">
                                                        <p class="font-12 soluong_anh"><?= $dem_img ?></p>
                                                    </div>
                                                <? } ?>
                                                <div class="yeuthich_tinl">
                                                    <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
                                                        $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$us_id'
                                                                            AND `usc_type` = '$us_type'"); ?>
                                                        <? if (mysql_num_rows($check->result) > 0) { ?>
                                                            <img src="/images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="yêu thích" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } else { ?>
                                                            <img src="/images/anh_moi/yeuthich_moi.png" data="<?= $id_tin ?>" alt="yêu thích" class="ko_yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                                        <? } ?>
                                                    <? } else { ?>
                                                        <a href="/dang-nhap.html">
                                                            <img src="/images/anh_moi/yeuthich_moi.png" alt="yêu thích" class="ko_yeuthich hd_cspointer">
                                                        </a>
                                                    <? } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="khoi_text_ban">
                                            <a href="/<?= replaceTitle($row_mua['link_title']) ?>-<?= ($row_mua['new_cate_id'] == 121) ? "c" : "ct" ?><?= $row_mua['new_id'] ?>.html" class="color-blk hs_df_16">
                                                <h3 class="title_ban font-16 elipsis2 ba_cham1"><?= $row_mua['new_title'] ?></h3>
                                            </a>
                                            <p class="font-14 color_a font-bold time_ban hs_df_17"><?= lay_tgian($row_mua['new_update_time']) ?></p>
                                            <p class="font-14 color_a address_ban elipsis1 hs_df_18"><?= ltrim($row_mua['dia_chi'], ', ') ?></p>
                                            <div class="d_flex j_between hd-align-center khoi_tim khoi_tim_df">
                                                <? if ($row_mua['new_money'] != 0 && $row_mua['gia_kt'] == 0) { ?>
                                                    <p class="color_cam tien_ban">Từ <?= number_format($row_mua['new_money']) ?> <?= $arr_dvtien[$row_mua['new_unit']] ?></p>
                                                <? } else if ($row_mua['new_money'] == 0 && $row_mua['gia_kt'] != 0) { ?>
                                                    <p class="color_cam tien_ban">Đến <?= number_format($row_mua['gia_kt']) ?> <?= $arr_dvtien[$row_mua['new_unit']] ?></p>
                                                <? } else if ($row_mua['new_money'] != 0 && $row_mua['gia_kt'] != 0) { ?>
                                                    <p class="color_cam tien_ban"><?= number_format($row_mua['new_money']) ?> - <?= number_format($row_mua['gia_kt']) ?> <?= $arr_dvtien[$row_mua['new_unit']] ?></p>
                                                <? } ?>
                                                <? if ($row_mua['new_cate_id'] == 121) { ?>
                                                    <? if ($row_mua['new_money'] == 0 && $row_mua['gia_kt'] == 0) { ?>
                                                        <p class="color_cam tien_ban">Thỏa thuận</p>
                                                    <? } ?>
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? }
                        } else { ?>
                            <p class="chua_codgia">Tài khoản này chưa đăng tin nào</p>
                        <? } ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?
    include '../modals/md_tb_yeuthich.php';
    include '../includes/inc_new/inc_footer.php';
    ?>
    <!-- <script type="text/javascript" src="/js/newJs/admin.main.js"></script> -->
</body>

</html>
<script type="text/javascript">
    $(document).on('click', '.tt_des', function() {
        // $(this).toggle();
        $('.show_text_ct').toggle(500);
    });
    $(document).on('click', '.no_ythich', function() {
        $(this).hide();
        $(this).parent('.khoi_tim').find('.yeu_thich').show();
        $('.khoi_thongbao').show(0).delay(5000).hide(0);
    });
    $(document).on('click', '.yeu_thich', function() {
        $(this).hide();
        $(this).parent('.khoi_tim').find('.no_ythich').show();
        $('.khoi_thongbao_no_ythich').show(0).delay(5000).hide(0);
    });


    $('.show_menu_768').click(function() {
        $(this).toggleClass('rotate_768');
        $('.hs_768_df3').toggleClass('box_sd_menu');
        $('.them_cl_new').toggle(500);
    })

    $('.icon_link_375').click(function() {
        $('.them_div_bao_ngoai1').toggleClass('hide_375');
    })


    function loadImage(input, output) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(output).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $('.chon_anh').click(function() {
        $('.duoc_chon').click();
    });
    $('.duoc_chon').change(function() {
        loadImage(this, ".thay_anh");
    })
</script>