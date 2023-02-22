<?php
include('../includes/inc_new/icon.php');
include 'config.php';
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 2) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_logo`,`usc_name`,`usc_type`,`usc_time` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_logo = $kn_tt['usc_logo'];
        $usc_time = $kn_tt['usc_time'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'người bán', 2 => 'người mua', 3 => "doanh nghiệp");

        // TIN YÊU THÍCH
        $tinyt_ngmua = new db_query("SELECT `new_title`, `new_money`, `new_unit`, `new_type`, `new_create_time`, `new_cate_id`, `gia_kt`, `dia_chi`,
                                    `new_image`, `chotang_mphi`, n.`new_id` FROM `tin_yeu_thich` AS t JOIN `new` AS n ON n.`new_id` = t.`new_id`
                                    WHERE t.`user_id` = $id_user AND t.`usc_type` = $type_user ORDER BY t.`id` DESC ");
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
    <title>Tin đã yêu thích</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>


    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">

</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="chinhsua-container hd-disflex heart_loved">
            <div class="cs-col-left">
                <div class="cs-header-right hd-disflex">
                    <div class="img-left-tt">
                        <div class="avatar-img-left hd_cspointer df">
                            <? if ($usc_logo != '') { ?>
                                <img src="/pictures/avt_dangtin/<?= $usc_logo ?>" class="avatar-img-left-tt" alt="anh">
                            <? } else { ?>
                                <img src="/images/anh_moi/anh004.png" class="avatar-img-left-tt" alt="anh">
                            <? } ?>
                        </div>
                    </div>
                    <div class="name">
                        <div class="name_left_375">
                            <p class="font-16-1875 color-blk font-bold"><?= $usc_name; ?></p>
                            <div class="edit_detail_account">
                                <p class="font-13-1523 font-dam">Tài khoản <?= $arr_type[$usc_type]; ?></p>
                                <p class="font-13-1523 font-dam">Tham gia: <?= $usc_time; ?></p>
                            </div>
                        </div>
                        <div class="name_right_375 rotate_icon" onclick="edit_list(this)">
                            <img src="/images/icon/arrow-down.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="list_danhmuc list_danhmuc-hidden">
                    <? include('../includes/inc_new/sidebar_nguoimua.php') ?>
                </div>
            </div>
            <? $show_tinyt = mysql_num_rows($tinyt_ngmua->result); ?>
            <? if ($show_tinyt > 0) { ?>
                <div class="khung-tdyt-right">
                    <h3 class="tin_yt font-24-28 mr30">Tin đã yêu thích</h3>
                    <div class="full_tin_yt width100">
                        <? while ($show_tinyt = (mysql_fetch_assoc($tinyt_ngmua->result))) {
                            $img_tinyt = $show_tinyt['new_image'];
                            $img_tinyt = explode(',', $img_tinyt);

                            $id_tin = $show_tinyt['new_id'];

                        ?>
                            <div class="tt_tin_yt hd-disflex mb20">
                                <div class="avatar_tin_yt">
                                    <img src="/pictures/<?= $img_tinyt[0] ?>" class="a_tin_yt" alt="anh_tin_yt">
                                </div>
                                <div class="td_tin_yt">
                                    <a href="/<?= replaceTitle($show_tinyt['new_title']) ?>-c<?= $show_tinyt['new_id'] ?>.html">
                                        <p class="title_tin_yt font-16-19"><?= $show_tinyt['new_title'] ?></p>
                                    </a>
                                    <p class="date_tin_yt font-14-16"><?= lay_tgian($show_tinyt['new_create_time']) ?></p>
                                    <p class="dc_tin_yt font-14-16"><?= $show_tinyt['dia_chi'] ?></p>
                                    <div class="gia_tin_yt width100 hd-disflex">
                                        <? if ($show_tinyt['new_type'] == 1 || $show_tinyt['new_type'] == 3) {
                                            if ($show_tinyt['chotang_mphi'] == 1) { ?>
                                                <p class="gia_tinyt">Cho tặng miễn phí</p>
                                                <?
                                            } else {
                                                if ($show_tinyt['new_money'] == 0 || $show_tinyt['new_money'] == '') { ?>
                                                    <p class="gia_tinyt">Liên hệ người bán để hỏi giá</p>
                                                <? } else { ?>
                                                    <p class="gia_tinyt"><?= number_format($show_tinyt['new_money']) ?> <?= $arr_dvtien[$show_tinyt['new_unit']] ?></p>
                                            <? }
                                            }
                                        } else if ($show_tinyt['new_type'] == 2) {  ?>
                                            <p class="gia_tinyt"><?= number_format($show_tinyt['new_money']) ?> <?= $arr_dvtien[$show_tinyt['new_unit']] ?> - <?= number_format($show_tinyt['gia_kt']) ?> <?= $arr_dvtien[$show_tinyt['new_unit']] ?></p>
                                        <? } ?>
                                        <div class="anhchung">
                                            <img src="../images/anh_moi/anh014.png" alt="anh014" data="<?= $id_tin ?>" class="sh_cursor" onclick="yeu_thich(this)">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                </div>
            <? } else { ?>
                <div class="khong_tdyt">
                    <div class="khong_tdyt2">
                        <img src="../images/anh_moi/anh022.png" alt="anh022" class="anh_khong_tdyt">
                    </div>
                    <div class="title_khong_tdyt">Ôi không, chẳng có gì ở đây cả</div>
                    <div class="con_khong_tdyt">Bạn chưa có tin yêu thích nào cả<br>
                        Hãy lướt tìm Raonhanh365 và kiếm cho mình những món hàng yêu thích nhé</div>
                    <div class="btn_khong_tdyt">
                        <a href="/" class="btn-td-yt hd_cspointer font-bold">Về trang chủ</a>
                    </div>
                </div>
            <? } ?>
        </div>
    </section>
    <? include '../modals/md_tb_yeuthich.php' ?>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    $(document).ready(function() {
        $('.slect-loai-sp').select2();
    });

    function edit_list(a) {
        $('.list_danhmuc').toggleClass('list_danhmuc-hidden')
        $(a).toggleClass('rotate_icon')
    }
</script>