<?
include 'config.php';
include('../includes/inc_new/icon.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 5) {
        $new_buy_sell = getValue('type','int','GET',2);
        $ht_tt = new db_query("SELECT `usc_id`, `usc_name`, `usc_logo`, `usc_money`, `usc_type`, `usc_phone`, `usc_time`, `usc_email`, `usc_address` FROM `user`
                            WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_time = $kn_tt['usc_time'];
        $usc_money = $kn_tt['usc_money'];
        $usc_logo = $kn_tt['usc_logo'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $arr_type = array(1 => 'người Bán', 2 => 'người mua', 3 => "doanh nghiệp");

        $tin_yt = new db_query("SELECT `new_title`, `new_money`, `new_type`, `new_create_time`, `new_cate_id`, `gia_kt`, `chotang_mphi`, `dia_chi`, `new_image`, `new_buy_sell`,
                                `new_unit`, n.`new_id` FROM `tin_yeu_thich` AS t JOIN `new` AS n ON n.`new_id` = t.`new_id`
                                WHERE t.`user_id` = $id_user AND t.`usc_type` = $type_user AND n.`new_buy_sell` = $new_buy_sell ORDER BY t.`id` DESC ");
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Hồ sơ người bán cá nhân- quản lý tin</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section class="enterprise_favorite_news">
        <div class="gianhang_container">
            <div class="d_flex j_between hs_df_1">
                <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
                <div class="khoiphai_quanly">
                    <? if (mysql_num_rows($tin_yt->result) > 0) { ?>
                        <div class="khoiphai_quanly_df_dl">
                            <div class="modal_dangtin d_flex jus_content align_i_c">
                                <div class="hd_cspointer tindayeuthich pt10 ">Tin đã yêu thích</div>
                                <!-- <div class="nbanm_dhang mr_20">
                                    <a href="/quan-ly-don-hang-ca-nhan-ban.html">Quản lý đơn hàng</a>
                                </div> -->
                            </div>
                            <div class="khoi_noidungban">
                                <? while ($showtin_yt = (mysql_fetch_assoc($tin_yt->result))) {
                                    $avata_tinyt = $showtin_yt['new_image'];
                                    $avata_tinyt = explode(';', $avata_tinyt);

                                    $id_tin = $showtin_yt['new_id'];
                                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                                    $check_num = mysql_num_rows($check->result);
                                ?>
                                    <div class="khoicon_ndban d_flex mb20 df">
                                        <div class="img_tinban">
                                            <img src="<?= $avata_tinyt[0] ?>" alt="" class="anh_avt_tin">
                                        </div>
                                        <div class="khoi_text_ban">
                                            <div class="khoi_text_ban_fig_title">
                                                <a href="/<?= replaceTitle($showtin_yt['new_title']) ?>-<?=($showtin_yt['new_buy_sell']==1)?"ct":"c"?><?= $showtin_yt['new_id'] ?>.html" class="title_ban font-16 mb20"><?= $showtin_yt['new_title'] ?></a>
                                            </div>
                                            <p class="font-14 color_a font-bold time_ban">
                                                <?= lay_tgian($showtin_yt['new_create_time']) ?></p>
                                            <p class="font-14 color_a address_ban"><?= $showtin_yt['dia_chi'] ?></p>
                                            <div class="d_flex j_between hd-align-center">
                                                <? if ($showtin_yt['new_buy_sell'] == 2) {
                                                if ($showtin_yt['new_type'] == 1 || $showtin_yt['new_type'] == 3) {
                                                    if ($showtin_yt['chotang_mphi'] == 1) { ?>
                                                        <p class="color_cam tien_ban">Cho tặng miễn phí</p>
                                                        <? } else {
                                                        if ($showtin_yt['new_money'] == 0) { ?>
                                                            <p class="color_cam tien_ban">Liên hệ người bán</p>
                                                        <? } else if ($showtin_yt['new_money'] != 0 && $showtin_yt['new_money'] != '') { ?>
                                                            <p class="color_cam tien_ban"><?= number_format($showtin_yt['new_money']) ?> <?= $arr_dvtien[$showtin_yt['new_unit']] ?></p>
                                                    <? }
                                                    }
                                                } else if ($showtin_yt['new_type'] == 2) { ?>
                                                    <p class="color_cam tien_ban"><?= number_format($showtin_yt['new_money']) ?> <?= $arr_dvtien[$showtin_yt['new_unit']] ?> - <?= number_format($showtin_yt['gia_kt']) ?> <?= $arr_dvtien[$showtin_yt['new_unit']] ?></p>
                                                <? }
                                                }else{ ?>
                                                    <? if ($showtin_yt['new_money'] > 0 && $showtin_yt['gia_kt'] > 0) { ?>
                                                        <div class="color_cam tien_ban"><?=number_format($showtin_yt['new_money'])?> - <?=number_format($showtin_yt['gia_kt'])?> <?=$arr_dvtien[$showtin_yt['new_unit']]?></div>
                                                    <? } elseif ($showtin_yt['new_money'] > 0) { ?>
                                                        <div class="color_cam tien_ban">Từ <?=number_format($showtin_yt['new_money'])?> <?=$arr_dvtien[$showtin_yt['new_unit']]?></div>
                                                    <? }else{ ?>
                                                        <div class="color_cam tien_ban">Đến <?=number_format($showtin_yt['gia_kt'])?> <?=$arr_dvtien[$showtin_yt['new_unit']]?></div>
                                                    <? } ?>
                                                <? } ?>
                                            </div>
                                        </div>
                                        <div class="df_khoitim df1">
                                            <img src="../images/anh_moi/anh014.png" data="<?= $id_tin ?>" alt="anh014" class="yeuthich hd_cspointer" onclick="yeu_thich(this)">
                                        </div>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    <? } else { ?>
                        <div class="themdiv_noclass2">
                            <div class="themdiv_noclass2">
                                <img src="../images/anh_moi/anh_dulieutrong.png" alt="" class="d_flex img_trong">
                                <h1 class="h1_text">Ôi không, chẳng có gì ở đây cả</h1>
                                <p class="text_rong">Bạn chưa yêu thích tin nào <br>
                                    Hãy lướt tìm Raonhanh365 và kiếm cho mình những món hàng yêu thích nhé</p>
                                <div class="text_center">
                                    <button class="color_cam vetrangchu">Về trang chủ</button>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
    </section>
    <? include '../modals/md_tb_yeuthich.php' ?>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
</body>
<script type="text/javascript">
    $('.arrow_show_768').click(function() {
        $(this).toggleClass('rotate');
        $('.menu_hoso_768').toggle(500);
    })
</script>

</html>