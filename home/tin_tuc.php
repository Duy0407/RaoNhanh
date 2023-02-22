<?
include("../includes/icon.php");
include("config.php");

$ht_tint = new db_query("SELECT `new_id`, `new_title`, `new_teaser`, `new_date_last_edit` ,`new_picture` FROM `news` ORDER BY `new_id` DESC ");
?>
<!DOCTYPE html>
<html>

<head>
    <title>Tin tức, chia sẻ kinh nghiệm - raonhanh365</title>
    <meta name="keywords" content="Tin tức, kinh nghiệm, chia sẻ kinh nghiệm, rao vặt, đăng tin rao vặt,rao vặt miễn phí." />
    <meta name="description" content="Cập nhật mọi tin tức trên các lĩnh vực như: công nghệ, khuyến mãi,.... và kết hợp chia sẻ kinh nghiệm, thông tin về sản phẩm, tại trang rao vặt hiệu quả hàng đầu Việt Nam." />
    <meta property="og:title" content="Tin tức, chia sẻ kinh nghiệm - raonhanh365" />
    <meta property="og:description" content="Cập nhật mọi tin tức trên các lĩnh vực như: công nghệ, khuyến mãi,.... và kết hợp chia sẻ kinh nghiệm, thông tin về sản phẩm, tại trang rao vặt hiệu quả hàng đầu Việt Nam." />
    <meta property="og:url" content="http://dev5.tinnhanh365.vn/tin-tuc" />
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
    <meta property="og:image:url" content="/" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <link rel="canonical" href="http://dev5.tinnhanh365.vn/tin-tuc" />

    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" rel="stylesheet">
    <link type="text/css" href="/css/style_new/giai_dap.css?v=<?= $version ?>" rel="stylesheet">
    <title>Tin tức</title>

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>

    <section>
        <div class="ctn_wapper w_100  tin_tuc">
            <div class="ctn_banner w_100 ">
                <div class="ctn_noidung_bn ctn_noidung_bn_df tex_center w_100 ">
                    <h1 class="sh_clr_one cr_weight w_100  tieu_de tieu_de_df2">TIN TỨC</h1>
                </div>
            </div>
            <div class="ctn_content w_100 ">
                <div class="ctn_trogiup ctn_chung ctn_chung_df">
                    <div class="content_lienhe content_lienhe_tt w_100  ctn_ttuc">
                        <?php while ($value = mysql_fetch_assoc($ht_tint->result)) {
                            $avt_tintuc = $value['new_picture']; ?>
                            <div class="ctn_tintuc w_100 ">
                                <div class="avt_tintuc ">
                                    <img onerror="this.onerror=null;this.src='/images/anh_moi/avatar.png';" src=" /pictures/news/<?= $value['new_picture'] ?>" alt="<?= $value['new_title'] ?>">
                                </div>
                                <div class="inf_tintuc ">
                                    <h4 class="inf_tieude inf_tieude_df sh_clr_two cr_weight w_100 ">
                                        <a href="/tin-tuc/<?= replaceTitle($value['new_title']) ?>-p<?= $value['new_id'] ?>.html"> <?= $value['new_title']; ?> </a>
                                    </h4>
                                    <p class="inf_vtat inf_vtat_df sh_size_four sh_clr_four w_100 elipsis2"><?= $value['new_teaser']; ?></p>
                                    <p class="inf_thoig sh_size_four sh_clr_five w_100 "><?= lay_tgian($value['new_date_last_edit']) ?></p>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?
    // include("../includes/common/inc_script_footer.php");
    include("../includes/inc_new/inc_footer.php");

    ?>
    <script>
        $('#city_search ,#cate_search').select2();
    </script>
</body>

</html>