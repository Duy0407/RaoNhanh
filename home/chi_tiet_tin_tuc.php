<?
include("config.php");


$id = getValue('id', 'int', 'GET', 0);
if ($id != 0) {
    $ct_tin = new db_query("SELECT `new_url`, `new_title`, `new_id`, `new_keyword`, `new_teaser`, `new_picture`, `new_date`, `new_sapo`, `new_description`,
                        `adm_name`, `adm_id`, `title_relate`, `content_relate` FROM `news` JOIN `admin_user` ON `news`.`admin_id` = `admin_user`.`adm_id`
                        WHERE `new_id` = " . $id . " LIMIT 1 ");
    $cttt = mysql_fetch_assoc($ct_tin->result);

    $new_title = $cttt['new_title'];
    $new_date_last_edit = $cttt['new_date_last_edit'];
    $new_description = $cttt['new_description'];



} else {
    header('Location: /');
}



?>



<!DOCTYPE html>
<html lang="vi">

<head>

    <title><?= removeHTML($cttt['new_title']) . " - " . $cttt['new_id'] ?></title>
    <meta name="keywords" content="<?= removeHTML($cttt['new_keyword']) ?>" />
    <meta name="description" content="<?= removeHTML($cttt['new_teaser']) ?>" />
    <meta property="og:title" content="<?= removeHTML($cttt['new_title']) . " - " . $cttt['new_id'] ?>" />
    <meta property="og:description" content="<?= removeHTML($cttt['new_teaser']) ?>" />
    <?php if ($cttt['new_url'] != '') : ?>
        <meta property="og:url" content="http://dev5.tinnhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($cttt['new_url'])) . "-p" . $cttt['new_id'] . ".html" ?>" />
    <?php else : ?>
        <meta property="og:url" content="http://dev5.tinnhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($cttt['new_title'])) . "-p" . $cttt['new_id'] . ".html" ?>" />
    <?php endif; ?>
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <!-- <meta name="robots" content="index, follow,noodp" /> -->
    <meta name="robots" content="noindex, nofollow" />

    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="http://dev5.tinnhanh365.vn/pictures/news/<?= $cttt['new_picture'] ?>" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <?php if ($row['new_url'] != '') : ?>
        <link rel="canonical" href="http://dev5.tinnhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($cttt['new_url'])) . "-p" . $cttt['new_id'] . ".html" ?>" />
        <!-- <link rel="amphtml" href="http://dev5.tinnhanh365.vn/amp-tin-tuc/<?= replaceTitle(removeHTML($cttt['new_url'])) . "-p" . $cttt['new_id'] . ".html" ?>" /> -->
    <?php else : ?>
        <link rel="canonical" href="http://dev5.tinnhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($cttt['new_title'])) . "-p" . $cttt['new_id'] . ".html" ?>" />
        <!-- <link rel="amphtml" href="https://raonhanh365.vn/amp-tin-tuc/<?= replaceTitle(removeHTML($cttt['new_title'])) . "-p" . $cttt['new_id'] . ".html" ?>" /> -->
    <?php endif; ?>

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link type="text/css" href="../css/style_new/giai_dap.css" rel="stylesheet">
    <link type="text/css" href="../css/style_new/style.css" rel="stylesheet">
    <!-- <title>Chi tiết tin tức</title> -->

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>

    <section>
        <div class="ctn_wapper w_100  tin_tuc">
            <div class="ctn_banner w_100 ">
                <div class="ctn_noidung_bn ctn_noidung_bn_df tex_center w_100 ">
                    <h1 class="sh_clr_one cr_weight w_100  tieu_de tieu_de_df2">CHI TIẾT TIN TỨC</h1>
                </div>
            </div>
            <div class="ctn_content w_100 ">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe content_lienhe_tt w_100  ctn_ttuc content_lienhe_df_cttt">
                        <div class="noidung_ct_tt">
                            <div class="noidung_ct_tt_hd"><?= $new_title ?></div>
                            <div class="noidung_ct_tt_last_time"><?= date('H', $new_date_last_edit) ?> giờ trước</div>
                            <? if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) { ?>
                                <!-- <div class="noidung_ct_tt_tim_share">
                                    <div class="noidung_ct_tt_tim">
                                        <div class="noidung_ct_tt_tim_img">
                                            <img src="../images/anh_moi/tim_cttt.svg" alt="">
                                        </div>
                                        <div class="noidung_ct_tt_tim_text">Yêu thích</div>
                                        <div class="noidung_ct_tt_tim_num">0</div>
                                    </div>
                                    <div class="noidung_ct_tt_share">
                                        <div class="noidung_ct_tt_tim_img">
                                            <img src="../images/anh_moi/chiase_tt.svg" alt="">
                                        </div>
                                        <div class="noidung_ct_tt_share_text">Chia sẻ</div>
                                    </div>
                                </div> -->
                            <? } ?>

                            <div class="chitiet_tintuc_chinh">
                                <div class="chitiet_tintuc_chinh_text">
                                    <?= $new_description ?>
                                </div>


                                <!-- <div class="chitiet_tintuc_chinh_img">
                                    <img src="../images/anh_moi/img_cttt.svg" alt="">
                                </div>

                                <div class="div_tieude_cttt">
                                    <div class="tieude_cttt">1. Giá hoa tươi tăng mạnh vào dịp lễ 8/3</div>
                                    <p class="tieude_cttt_text">Như tiêu đề thì đây là một đoạn tóm tắt bài báo bên trên nhưng thiết kế đang cố viết dài để demo nó sẽ trông như thế nào khi lên giao diện thật</p>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <? include("../includes/inc_new/inc_footer.php"); ?>
    <script>
        $('#city_search ,#cate_search').select2();
    </script>
</body>

</html>