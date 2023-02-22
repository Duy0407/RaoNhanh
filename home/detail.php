<?
include("config.php");
$newid = getValue("newid", "int", "GET", 0);
$newid = (int)$newid;
$db_qr7 = new db_query("SELECT cat_id,cat_parent_id,cat_name,new.new_id,new_name,new_cate_id,new_booth_personal,new_authen,new_address,usc_phone,new_description,new_title,new_money,new_city,new_create_time,new_view_count,new_image,usc_id,usc_logo,usc_name,usc_fb_id,usc_fb_id_that,new_type,usc_type,usc_store_name,usc_time,usc_money,usc_store_phone,usc_phone
                       FROM new LEFT JOIN user ON new_user_id = user.usc_id 
                       LEFT JOIN category ON new.new_cate_id = category.cat_id
                       LEFT JOIN new_description ON new.new_id = new_description.new_id
                       WHERE new.new_id = " . $newid . " AND new_active = 1 LIMIT 1");
if (mysql_num_rows($db_qr7->result) == 0) {
    redirect("/");
}
$row9 = mysql_fetch_assoc($db_qr7->result);
$db_qrschme = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_id = " . $row9['cat_parent_id'] . " LIMIT 1");
$rowschme = mysql_fetch_assoc($db_qrschme->result);
if ($row9['new_city'] == 0) {
    $city_name = ' trên Toàn quốc';
} else {
    $city_name = " tại " . $arrcity[$row9['new_city']]['cit_name'];
}
$title = $row9['new_title'] . $city_name . " - " . $row9['new_id'];
$urldt = "https://raonhanh365.vn/" . replaceTitle($row9['new_title']) . "-c" . $row9['new_id'] . ".html";
$urluri = "https://raonhanh365.vn" . $_SERVER['REQUEST_URI'];
if ($urldt != $urluri) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $urldt");
    exit();
}
if ($newid == 499321) {
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: /");
    exit();
}
$image_2 = explode(";", $row9['new_image']);
$css_new = true;
$link = 'detail';
$image = explode(";", str_replace("detail", "fullsize", $row9['new_image']));
?>
<!DOCTYPE html>
<html>

<head>
    <title><?= removeHTML($title) ?></title>
    <meta name="keywords" content="<?= removeHTML($row9['new_title']) ?>, Rao vặt miễn phí, <?= removeHTML($row9['new_title']) . $city_name ?>, mua bán, <?= ($row9['new_city'] == 0) ? "Toàn quốc" : $arrcity[$row9['new_city']]['cit_name']; ?>, rao vat, rao vặt" />
    <meta name="description" content="<?= removeHTML($row9['new_title']) . $city_name ?> trên kênh rao vặt miễn phí Raonhanh365. <?= trim(removeHTML(cut_string($row9['new_description'], 200, ""))) ?>" />
    <meta property="og:title" content="<?= removeHTML($title) ?>" />
    <meta property="og:description" content="<?= removeHTML($row9['new_title']) . $city_name ?> trên kênh rao vặt miễn phí Raonhanh365. <?= trim(removeHTML(cut_string($row9['new_description'], 200, ""))) ?>" />
    <meta property="og:url" content="<?= $urldt ?>" />
    <meta name="language" content="vietnamese" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="<?= removeHTML($title) ?>" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
    <meta name="robots" content="index, follow,noodp" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="<?= $image_2[0] ?>" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />

    <!--    <link rel="preload" as="image" href="/images/cv_trangchu1.gif">-->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <!--    <link rel="preload" href="--><? //= $urldt
    ?>
    <!--"/>-->
    <link rel="preload" media="none" onload="if(media!='all')media='all'" href="/css/detail-slider.css" as="style" />

    <link rel="canonical" href="<?= $urldt ?>" />
    <link rel="stylesheet" media="none" onload="if(media!='all')media='all'" href="/css/detail-slider.css" />
    <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <!-- <script type="text/javascript" src="/js/jquery-ui.js"></script> -->
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />

    <style>
        .jssora093 img {
            background: none !important;
        }

        #zoon img {
            background: #f26322;
        }

        .div_shara_like div {
            float: left;
            margin-right: 5px;
        }

        .t_modal {
            z-index: 1001 !important;
            padding: 0;
            overflow: unset;
        }

        .only_img {
            height: 100%;
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .only_img img {
            object-fit: contain;
        }

        .slick-list {
            width: 800px;
            margin: auto;
            padding: 40px 0px !important;
            overflow: hidden;
        }

        .t_slick {
            display: flex;
            height: 100%;
        }

        .t_slick img {
            object-fit: cover;
            height: auto;
            max-height: 600px;
        }

        @media screen and (max-width:480px) {
            .t_slick {
                width: 100%;
                height: 100%;
            }

            .slick-list {
                width: 100%;
                margin: auto;
                padding: 50px 0px !important;
                text-align: center;
            }

            .t_slick img {
                width: 100%;
                max-height: 270px;
            }

            .close {
                top: 0;
                right: 10px;
            }

            .mobi_detail {
                top: 1000px !important;
            }
        }
    </style>
</head>

<body>
<?
ob_start();
if (is_numeric($newid))
    $cookieName = 'article_' . $newid;
if (!isset($_COOKIE["$cookieName"])) {
    setcookie("$cookieName", "1", time() + 3600, "/");
    $db_ex = new db_execute("UPDATE new SET new_view_count = new_view_count+1 WHERE new_id=" . $newid . "");
}
unset($cookieName, $db_ex);
ob_end_flush();
?>
<div id="myModal" class="modal t_modal">
    <span class="close">&times;</span>
    <?php
    if (count($image) == 1) { ?>
        <div class="only_img">
            <img data-u="image" width="900" height="500" data-e="thumb" class="lazyload" src="/images/loading.gif" data-src="<?= $image[0] ?>" />
        </div>
    <?php } else { ?>
        <div class="t_slick">
            <?php
            foreach ($image as $item => $type) {
                if (strpos($type, 'pictures/fullsize/') == true) {
                    ?>
                    <img data-u="image" id="thumb_img_<?= $item ?>" width="900" height="500" data-e="thumb" class="lazyload" src="/images/loading.gif" data-src="<?= $type ?>" />
                    <?
                }
            }
            ?>
        </div>
    <?php } ?>
</div>
<?
$file = '../cache_file/sql_cache.json';
$arraytong       = json_decode(file_get_contents($file), true);
$arrcity         = $arraytong['db_city'];
$db_cat          = $arraytong['db_cat'];

include("../includes/common/inc_header.php"); ?>
<section>
    <div class="breadcrumb">
        <div id="breadcrumb-banner"></div>
        <div class="container">
            <ul id="detail-menu">
                <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
                <li><a href="<?= rewrite_cate($row9['cat_id'], $row9['cat_name']) ?>" title="<?= $row9['cat_name'] ?>"><?= $row9['cat_name'] ?></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>

    <div class="main_cate">
        <div class="container">
            <? include('../includes/banner/inc_banner_vn.php') ?>
            <!-- <a target="_blank" href="https://timviec365.vn/cv-xin-viec"><img style="max-width:100%;margin-bottom:10px" src="/images/loading.gif" class="lazyload" data-src="/images/cv_trangchu1.gif" alt="Tạo Cv Online"></a> -->
            <!--      end ---detai---left-->

            <!--    detail---main-->
            <div class="detail-main">
                <div class="detai-main-top">
                    <ul id="detail-main-menu">
                        <?
                        if ($row9['cat_parent_id'] != 0) {
                            ?>
                            <li><a href="<?= rewrite_cate($rowschme['cat_id'], $rowschme['cat_name']) ?>" title="<?= $rowschme['cat_name'] ?>"><?= mb_strtoupper($rowschme['cat_name'], 'UTF-8') ?></a> &#155;</li>
                            <?
                        }
                        ?>
                        <li><a href="<?= rewrite_cate($row9['cat_id'], $row9['cat_name']) ?>" title="<?= $row9['cat_name'] ?>"><?= mb_strtoupper($row9['cat_name'], 'UTF-8') ?></a></li>
                    </ul>
                </div>
                <div class="clear"></div>
                <!--detai-main--title-->
                <div class="detai-main-title">
                    <div style="float: left;margin: 5px; color: #676767!important">
                        <h1><?= removeHTML(trim($row9['new_title'])) ?></h1>
                        <?
                        $diachi = "";
                        if ($row9['new_address'] != "") {
                            $diachi = $row9['new_address'];
                        } else {
                            if ($row9['new_city'] != 0) {
                                $diachi =  $arrcity[$row9['new_city']]['cit_name'];
                            }
                        }
                        if ($diachi != "") {
                            ?>
                            <p><span style="font-weight: 500;">Địa chỉ :</span> <?= $diachi ?></p>
                        <? } ?>
                        <div class="div_shara_like" id="face_detail">
                            <!--nut like face-->
                            <!--like facebook-->
                        </div>
                        <div id="fb-root"></div>
                    </div>
                    <div style="float: right;" class="detail_title_right">
                        <ul>
                            <?
                            if (isset($row4['usc_id'])) {
                                if ($row4['usc_id'] == $row9['usc_id']) { ?>
                                    <li><a href="/chinh-sua/<?= replaceTitle($row9['new_title']) ?>-<?= ($row4['usc_type'] == 5) ? 'g' : 's'; ?><?= $row9['new_id'] ?>.html"><i><img class="lazyload" src="/images/loading.gif" data-src="/images/icon_suatin_detail.png" id="logo-lammoi" /></i><span>Sửa tin</span></a></li>
                                <? }
                            } ?>
                            <?
                            if ($row9['new_type'] == 2 || $row9['new_type'] == 3 || $row9['new_type'] == 4) {
                                ?>
                                <li><a><i><img class="lazyload" src="/images/loading.gif" data-src="/images/detail-main-uutien.png" id="logo-uutien" /></i><span>Tin được ưu tiên</span></a></li>
                            <? } ?>
                        </ul>
                    </div>
                </div>
                <div class="clear"></div>
                <!--end--detail-mail--title-->
                <!--detai---slider----->
                <div class="detail-main-tt">
                    <div class="detai-main-slider">
                        <?php include("../includes/common/slider-detail.php") ?>
                    </div>

                    <div class="clear"></div>

                    <div class="detail-tt-sp">
                        <p class="ttsp">Thông tin sản phẩm</p>
                        <ul>
                            <li>
                                <span class="span1">Giá:</span><span class="span2"><?= $row9['new_money'] != 0 ? format_number($row9['new_money']) . " đ" : "Liên hệ" ?></span>
                            </li>
                            <li>
                                <span class="span1">Danh mục:</span><span class="span2"><?= $row9['cat_name'] ?></span>
                            </li>
                            <li>
                                <span class="span1">Ngày đăng:</span><span class="span2"><?= date("d/m/Y", $row9['new_create_time']) ?></span>
                            </li>
                            <li>
                                <span class="span1">Người đăng:</span><span class="span2"><?= $row9['new_name'] ?></span>
                            </li>
                            <li>
                                <span class="span1">Lượt xem:</span><span class="span2"><?= $row9['new_view_count'] ?></span>
                            </li>
                            <?
                            if ($row9['new_city'] != 0) {
                                ?>
                                <li>
                                    <span class="span1">Chợ mua bán:</span><a href="/mua-ban/rao-vat/<?= $row9['new_city'] ?>/<?= replaceTitle($arrcity[$row9['new_city']]['cit_name']) ?>.html" title="Rao vặt <?= $arrcity[$row9['new_city']]['cit_name'] ?>"><span class="span2">
                                                Rao vặt <?= $arrcity[$row9['new_city']]['cit_name'] ?></span></a>
                                </li>
                            <? }
                            unset($db_qrcity, $row_city);

                            if ($row9['new_address'] != "") {
                                ?>
                                <li>
                                    <span class="span1">Địa chỉ liên hệ:</span><span class="span2"><?= $row9['new_address'] ?></span>
                                </li>
                            <? } ?>
                        </ul>
                        <p class="ttsp">Thông tin thêm</p>
                        <div class="content_description t_desp">
                            <?
                            $ds = strip_tags($row9['new_description'], '<p><span><br><ul><li><ol>');


                            $db_qrtag = new db_query("SELECT tag_keyword,tag_link FROM tags");
                            while ($rowtag = mysql_fetch_assoc($db_qrtag->result)) {
                                $ds = preg_replace('/ ' . $rowtag['tag_keyword'] . ' /', "<a style='color: #3daae0;' href='" . $rowtag['tag_link'] . "'> " . $rowtag['tag_keyword'] . " </a>", $ds, 1);
                            }
                            ?>
                            <?= $ds ?>
                        </div>
                        <style type="text/css"></style>
                    </div>
                </div>
                <!--end--detail-slider----->
                <div class="detai-bl-dg">
                    <div class="bl-dg-title">
                        <?
                        $db_stars = new db_query("SELECT COUNT(eva_id),SUM(eva_stars) FROM evaluate WHERE eva_stars > 0 AND new_id=" . $newid);
                        $row_stars = mysql_fetch_assoc($db_stars->result);

                        $db_cm = new db_query("SELECT COUNT(eva_id) FROM evaluate WHERE new_id=" . $newid);
                        $row_cm = mysql_fetch_assoc($db_cm->result);
                        ?>
                        <ul>
                            <?
                            if ($row9['new_booth_personal'] == 2) {
                                ?>
                                <li style="border-right: 1px solid black;">
                                    BÌNH LUẬN (<?= (empty($row_cm['COUNT(eva_id)'])) ? '0' : $row_cm['COUNT(eva_id)']; ?>)
                                </li>
                                <li>
                                    <span>ĐÁNH GIÁ SẢN PHẨM </span>(<?= (empty($row_stars['COUNT(eva_id)'])) ? '0' : $row_stars['COUNT(eva_id)']; ?>)
                                </li>
                            <? } else { ?>
                                <li>
                                    BÌNH LUẬN
                                </li>
                            <? }
                            unset($db_cm, $row_cm, $row_stars, $db_stars); ?>
                        </ul>
                    </div>

                    <div class="clear"></div>
                    <!--Detail div dánh giá-->
                    <?
                    if ($row9['new_booth_personal'] == 2) {
                        ?>
                        <div class="bl-dg-dg">
                            <div class="bl-dg-dg-left">
                                <?
                                $db_stars = new db_query("SELECT COUNT(eva_id),SUM(eva_stars) FROM evaluate WHERE eva_stars > 0 AND new_id=" . $newid);
                                $row_stars = mysql_fetch_assoc($db_stars->result);
                                if ($row_stars['COUNT(eva_id)'] == 0) {
                                    $dat_sta = 1;
                                } else {
                                    $dat_sta = $row_stars['COUNT(eva_id)'];
                                }
                                ?>
                                <div>
                                    <div class="detail_danhgia_sta">
                                        <img class="img_detail_1 lazyload" src="/images/loading.gif" data-src="/images/Detail_SanPham2.png">
                                        <span><?= round($row_stars['SUM(eva_stars)'] / $dat_sta, 1) ?></span>
                                    </div>
                                    <p>(<?= $row_stars['COUNT(eva_id)'] ?> đánh giá)</p>
                                </div>
                                <? unset($row_stars, $db_stars, $dat_sta); ?>
                            </div>
                            <div class="bl-dg-dg-main">
                                <ul>

                                    <?
                                    $db_dg = new db_query("SELECT COUNT(eva_id) FROM evaluate WHERE eva_stars > 0 AND new_id = " . $newid);
                                    $row_dg = mysql_fetch_assoc($db_dg->result);
                                    if ($row_dg['COUNT(eva_id)'] == 0) {
                                        $dat_sta = 1;
                                    } else {
                                        $dat_sta = $row_dg['COUNT(eva_id)'];
                                    }
                                    for ($i = 5; $i >= 1; $i--) {
                                        $db_stars = new db_query("SELECT COUNT(eva_id) FROM evaluate WHERE eva_stars =" . $i . " AND new_id = " . $newid);
                                        $row_stars = mysql_fetch_assoc($db_stars->result);
                                        $sta_tl = $row_stars['COUNT(eva_id)'] / $dat_sta * 100;
                                        ?>
                                        <li>
                                            <div><?= $i ?> sao</div>
                                            <div class="bl-dg-dg-main-div">
                                                <div style="background-color: #f36e21;width: <?= $sta_tl ?>%;height: 100%"></div>
                                            </div>
                                            <div><?= round($sta_tl, 1) ?>%</div>
                                            <div class="clear"></div>
                                        </li>
                                        <?
                                    }
                                    unset($db_stars, $row_stars, $sta_tl, $row_dg, $db_dg, $dat_sta);
                                    ?>

                                </ul>
                            </div>
                            <div class="bl-dg-dg-right">
                                <? if (empty($row4['usc_id'])) { ?>
                                    <div class="bl-dg-dg-dangnhap btn-top-login">
                                        <a>
                                            <img class="lazyload" src="/images/loading.gif" data-src="../images/detail-bl-dg-logo-dangnhap.png" />
                                            <span>Đăng nhập</span>
                                        </a>
                                    </div>
                                    <div style="text-align: center;margin-top: 10px;">
                                        <p>Bạn phải đăng nhập để có thể sử dụng chức năng</p>
                                        <span>ĐÁNH GIÁ SẢN PHẨM</span>
                                    </div>
                                <? } ?>
                            </div>
                        </div>
                    <? } ?>
                    <!--end detail div đánh giá-->

                    <!--detail-div bình luận-->
                    <div class="bl-dg-bl">
                        <!--bình luận 1-->
                        <?
                        if ($row9['new_booth_personal'] == 2) {
                            ?>
                            <div class="bl-dg-bl-main commen_user">
                                <div class="bl-dg-bl-left">
                                    <?
                                    if (!empty($row4['usc_id'])) {
                                        ?>
                                        <span class="bl-dg-bl-name"><?= $row4['usc_name'] ?></span>
                                        <p><span class="bl-dg-bl-birthday"><?= date('d/m/Y', $row4['usc_time']) ?></span></p>
                                    <? } ?>
                                    <div class="avata_user_bl">
                                        <?
                                        if (empty($row4['usc_logo'])) { ?>
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/detai-avata.png" />
                                        <? } else { ?>
                                            <img class="lazyload" src="/images/loading.gif" data-src="<?= $row4['usc_logo'] ?>" width="56" height="56" />
                                        <? } ?>

                                    </div>
                                </div>
                                <div class="bl-dg-bl-right">
                                    <div class="votes_gray" style="width: 100px;">
                                        <div class="votes_buttons" val="0">
                                            <span href="" te_id='1' id="te_1"><img class="votes_button lazyload" src="/images/loading.gif" data-src="images/empty.gif" alt=""></span>
                                            <span href="" te_id='2' id="te_2"><img class="votes_button" src="images/empty.gif" alt=""></span>
                                            <span href="" te_id='3' id="te_3"><img class="votes_button lazyload" src="/images/loading.gif" data-src="images/empty.gif" alt=""></span>
                                            <span href="" te_id='4' id="te_4"><img class="votes_button lazyload" src="/images/loading.gif" data-src="images/empty.gif" alt=""></span>
                                            <span href="" te_id='5' id="te_5"><img class="votes_button lazyload" src="/images/loading.gif" data-src="images/empty.gif" alt=""></span>
                                        </div>
                                        <div class="votes_active"></div>
                                    </div>
                                    <div class="bl-dg-bl-right-bottom">
                                        <div class="bl-dg-bl-text">
                                                <textarea cols="72" rows="3" class="textarea_<?= $newid ?>" style="border-radius: 3px;border: 1px solid #cccccc" <? if (empty($row4['usc_id'])) {
                                                    echo "disabled";
                                                } ?>></textarea>
                                            <? if (empty($row4['usc_id'])) { ?>
                                                <p style="padding-top: 10px;">Bạn cần <span class="btn-top-login">ĐĂNG NHẬP</span> để gửi bình luận và nhận thông báo mới</p>
                                            <? } ?>
                                            <input type="submit" value="Đăng bình luận" onclick="comment_new(<?= $row4['usc_id'] . ',' . $newid ?>)" />
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <!--end bình luận 1-->
                            <!--bình luận 2-->
                            <?
                            $db_qritem = new db_query("SELECT eva_id,eva_comment_time,usc_name,usc_birth_day,usc_logo,eva_stars,eva_comment FROM evaluate LEFT JOIN user ON evaluate.user_id = user.usc_id WHERE eva_parent_id=0 AND new_id = " . $newid . " ORDER BY eva_id DESC");
                        while ($row_cm = mysql_fetch_assoc($db_qritem->result)) {
                            ?>
                            <div class="bl-dg-bl-main">
                                <div class="bl-dg-bl-left">
                                    <span class="bl-dg-bl-name"><?= $row_cm['usc_name'] ?></span>
                                    <p><span class="bl-dg-bl-birthday"><?= date('d/m/Y', $row_cm['usc_birth_day']) ?></span></p>
                                    <div class="avata_user_bl">
                                        <?
                                        if ($row_cm['usc_logo'] == "") { ?>
                                            <img class="lazyload" src="/images/loading.gif" data-src="/images/detai-avata.png" />
                                        <? } else { ?>
                                            <img class="lazyload" src="/images/loading.gif" data-src="<?= $row_cm['usc_logo'] ?>" width="56" height="56" />
                                        <? } ?>
                                    </div>
                                </div>
                                <div class="bl-dg-bl-right">
                                    <div class="votes_g" style="width: 100px;">
                                        <div class="votes_sta" val="3">
                                            <? for ($i = 1; $i <= $row_cm['eva_stars']; $i++) { ?>
                                                <span class="danh_gia_sta_2"><img class="votes_button lazyload" src="/images/loading.gif" data-src="images/empty.gif" alt=""></span>
                                            <? }
                                            unset($i);
                                            for ($k = 1; $k <= (5 - $row_cm['eva_stars']); $k++) { ?>
                                                <span><img class="votes_button lazyload" src="/images/loading.gif" data-src="images/empty.gif" alt=""></span>
                                            <? }
                                            unset($k); ?>
                                        </div>
                                        <div class="votes_active"></div>
                                    </div>
                                    <div class="bl-dg-bl-right-top">
                                        <p><?= $row_cm['eva_comment'] ?> <i class="cm_time"> - <?= time_elapsed_string($row_cm['eva_comment_time']) ?></i></p>
                                        <p>
                                            <i textarea_id='<?= $row_cm['eva_id'] ?>' class="click_i_eva">Trả lời</i>
                                        </p>
                                        <div class="com_reply_<?= $row_cm['eva_id'] ?>">
                                            <?
                                            $db_reply = new db_query("SELECT eva_id,eva_comment_time,usc_name,usc_birth_day,usc_logo,eva_stars,eva_comment FROM evaluate LEFT JOIN user ON evaluate.user_id = user.usc_id WHERE eva_parent_id=" . $row_cm['eva_id'] . " AND new_id = " . $newid);
                                            while ($row_reply = mysql_fetch_assoc($db_reply->result)) {
                                                ?>
                                                <div class="commen_reply">
                                                    <img width="35" height="35" class="lazyload" src="/images/loading.gif" data-src="<?= ($row_reply['usc_logo'] != "") ? $row_reply['usc_logo'] : '/images/detail-bl-dg-bl-avata.png' ?>" />
                                                    <span><?= $row_reply['eva_comment'] ?> <i class="cm_time">- <?= time_elapsed_string($row_reply['eva_comment_time']) ?></i></span>
                                                    <div class="clear"></div>
                                                </div>
                                            <? }
                                            unset($row_reply, $db_reply);
                                            ?>
                                        </div>
                                    </div>
                                    <div class="bl-dg-bl-right-bottom">
                                        <div class="bl-dg-bl-text">
                                            <div class="hidden div_comment" id="div_comment_<?= $row_cm['eva_id'] ?>">
                                                <div class="bl-dg-bl-right-avata">
                                                    <img class="lazyload" src="/images/loading.gif" data-src="/images/detail-bl-dg-bl-avata.png" />
                                                </div>
                                                <textarea class="textarea_commen" id="textarea_<?= $row_cm['eva_id'] ?>" cols="72" rows="3" text_cm_="<?= $row_cm['eva_id'] ?>" style="border-radius: 3px;border: 1px solid #cccccc" <? if (empty($row4['usc_id'])) {
                                                    echo "disabled";
                                                } ?>></textarea>
                                            </div>
                                            <div>
                                                <? if (empty($row4['usc_id'])) { ?>
                                                    <p style="padding: 10px 0;">Bạn cần <span class="btn-top-login">ĐĂNG NHẬP</span> để gửi bình luận và nhận thông báo mới</p>
                                                <? } ?>
                                                <input disabled type="submit" value="Đăng bình luận" class="input_hid hidden input_cm_<?= $row_cm['eva_id'] ?>" onclick="comment_rebly(<?= $row4['usc_id'] . ',' . $newid . ',' . $row_cm['eva_id'] ?>)" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                        <? }
                        unset($db_qritem, $row_cm);
                        } else { ?>
                            <div id="face_cm" style="width: 100%;"></div>
                            <script type="text/javascript">
                                jQuery(window).scroll(function() {
                                    if (jQuery(this).scrollTop() > 50 && $('#face_cm').hasClass('face_cm') == false) {
                                        $('#face_cm').append('<fb:comments data-width="100%" data-numposts="8"></fb:comments><div id="fb-root"></div><script>(function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0];if (d.getElementById(id)) return;js = d.createElement(s); js.id = id;js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.10&appId=240566299768574";fjs.parentNode.insertBefore(js, fjs);}(document, "script","facebook-jssdk"));<\/script>');
                                        $('#face_cm').addClass('face_cm');
                                    }
                                });
                            </script>

                        <? } ?>
                        <!--end binh luận 2-->
                    </div>
                    <!--end detail div bình luận-->

                </div>
                <!--end detail bình luận đánh giá-->

                <!--Div tin liên quan-->

                <div class="detai-main-tlq">
                    <div class="detai-main-tlq-top">
                        <h2>TIN LIÊN QUAN</h2>
                        <!--                    <ul>
                    <li><input id="back" class="back_tlq" type="submit" value=""></li>
                    <li><input id="next" class="next_tlq" type="submit" value=""></li>
                </ul>-->
                    </div>
                    <div class="clear"></div>
                    <div style="width: 100%;">
                        <div style="height:250px;" class="detail_slider_tlq">
                            <?
                            $db_qritem = new db_query("SELECT new_type,new_money,new_city,usc_name,new_id,new_title,new_image,new_authen,new_create_time,new_view_count FROM new LEFT JOIN user ON new.new_user_id = user.usc_id WHERE new_type > 0 AND new_cate_id = " . $row9['new_cate_id'] . " AND new_city = " . $row9['new_city'] . " ORDER BY new.new_id DESC LIMIT 20");
                            while ($item = mysql_fetch_assoc($db_qritem->result)) {
                                $image = explode(";", $item['new_image']);

                                ?>
                                <div class="detai-main-tlq-main mySlides show_tlq_<?= $item['new_id'] ?>">
                                    <div class="detail-tlq-img">
                                        <a href="<?= rewriteNews($item['new_id'], $item['new_title']) ?>" title="<?= $item['new_title'] ?>"><img class="backup_picture_<?= $item['new_id'] ?> lazyload" src="/images/loading.gif" data-src="<?= $image[0] ?>" alt="<?= $item['new_title'] ?>" onerror='this.onerror=null;this.src="/images/noimage.webp";'></a>
                                        <? if ($item['new_authen'] == 1) { ?>
                                            <span>Đã chứng thực</span>
                                        <? } ?>

                                    </div>
                                    <div class="detail_tlq_1">
                                        <div class="detail-tlq-cate">
                                            <a><?= $row9['cat_name'] ?></a>
                                            <? if ($item['new_type'] > 1) { ?>
                                                <span>
                                                        <p>Tin được ưu tiên
                                                        <p>
                                                    </span>
                                            <? } ?>
                                        </div>
                                        <div class="clear"></div>
                                        <h3 style="font-size: 18px;font-weight: bold; margin: 15px 0 10px 0px;color: #676767;">
                                            <a href="<?= rewriteNews($item['new_id'], $item['new_title']) ?>" title="<?= $item['new_title'] ?>"><?= $item['new_title'] ?></a>
                                        </h3>
                                        <div class="detail-tlq-view">
                                            <i>Thời gian đăng : <?= date("H:i", $item['new_create_time']) ?> - <?= date("d/m/Y", $item['new_create_time']) ?></i>
                                            <span><?= $item['new_view_count'] ?> Views</span>
                                        </div>
                                        <span style="color: #f26322; padding: 10px 0; font-weight: bold;">Giá <?= ($item['new_money'] == 0) ? 'Liên hệ' : (format_number($item['new_money']) . ' đ') ?></span>
                                        <div class="tlq-bottom">
                                            <ul>
                                                <li><span class="diachi">
                                                            <? if ($item['new_city'] == 0 | $item['new_city'] == "") {
                                                                echo 'Chưa cập nhập';
                                                            } else {
                                                                echo $arrcity[$item['new_city']]['cit_name'];
                                                            }
                                                            ?>
                                                        </span></li>
                                                <li><span class="logo-avata"></span></li>
                                                <li>Người đăng:<span class="nguoi_dang"><?= $item['usc_name'] ?></span></li>
                                                <li><span class="like"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            <?  }  ?>
                        </div>
                    </div>
                </div>
                <!--end div tin liên quan-->
                <?php include '../includes/common/inc_container_box_left.php'; ?>
            </div>
            <!--End---detail---main-->

            <? include('../includes/detail/inc_left_detail.php') ?>
            <!--div tu khoa tim kiem nhieu nhat-->
            <div class="detail-list_tag">
                <? include("../includes/home/inc_tag.php") ?>
            </div>
        </div>
    </div>
</section>
<!--<script src="/js/jquery-1.8.3.min.js"></script>-->
<script defer src="/js/dangky.js?v=1"></script>
<? include("../includes/common/inc_footer.php") ?>
</body>

</html>
<script src="/js/lazysizes.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        if ($(".btn-top-login").length > 0) {
            $(window).scroll(function() {
                var e = $(window).scrollTop();
                if (e > 300) {
                    $(".btn-top-login").show()
                } else {
                    $(".btn-top-login").hide()
                }
            });
            $(".btn-top-login").click(function() {
                $('body,html').animate({
                    scrollTop: 0
                })
            })
        }
    });

    function comment_new(userid, newid) {
        var commen = $(".textarea_" + newid).val();
        var sta = $(".votes_buttons").attr("val");
        $(".error").remove();
        if (sta == 0) {
            $(".votes_gray").after("<div class='error'>Bạn vui lòng đánh giá chất lượng bài viết</div>")
        } else {
            if (commen.length < 10) {
                $(".votes_gray").after("<div class='error'>Bình luận phải trên 10 ký tự</div>")
            } else {
                $.ajax({
                    url: "../ajax/check_comment.php",
                    type: "POST",
                    data: {
                        'commen': commen,
                        'usc_id': userid,
                        'new_id': newid,
                        'sta': sta
                    },
                    success: function(data) {
                        $(".bl-dg-bl-main:eq(0)").after(data);
                        $(".textarea_" + newid).val("");
                        $(".votes_buttons span").removeClass("danh_gia_sta");
                    }
                });
            }
        }
    }

    $(".votes_buttons span").click(function() {
        var sta = $(".votes_buttons").attr("val");
        if (sta > 0) {
            $(".error").remove();
        }
    });

    function comment_rebly(userid, newid, cm_id) {
        var commen = $("#textarea_" + cm_id).val();
        $.ajax({
            url: "../ajax/check_comment_reply.php",
            type: "POST",
            data: {
                'commen': commen,
                'usc_id': userid,
                'new_id': newid,
                'cm_id': cm_id
            },
            success: function(data) {
                $(".com_reply_" + cm_id).append(data);
                $("#div_comment_" + cm_id).addClass("hidden");
                $(".input_cm_" + cm_id).addClass("hidden");
                $("#textarea_" + cm_id).val("");
            }
        });
    }

    $(".bl-dg-bl-main textarea").keyup(function() {
        var cm_id = $(this).attr("text_cm_");
        if ($(this).val() == "") {
            $(".input_cm_" + cm_id).attr("disabled", true);
        } else {
            $(".input_cm_" + cm_id).removeAttr("disabled");
        }
    });

    $(".click_i_eva").click(function() {
        var id_ = $(this).attr("textarea_id");
        $(".div_comment").addClass("hidden");
        $("#div_comment_" + id_).removeClass("hidden");
        $(".input_hid").addClass("hidden");
        $(".input_cm_" + id_).removeClass("hidden");
    });
</script>
<script src="../js/detail_danhgia.js" type="text/javascript"></script>
<script>
    function myFunction(id) {
        $(".backup_picture_" + id).attr("src", "/images/df.png");
    }
</script>
<script src="/js/common.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        $('.t_slick').slick({
            centerMode: true,
            slidesToShow: 1,
            // autoplay: true,
            responsive: [{
                breakpoint: 768,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '40px',
                    slidesToShow: 1
                }
            },
                {
                    breakpoint: 480,
                    settings: {
                        // arrows: false,
                        centerMode: true,
                        centerPadding: '40px',
                        slidesToShow: 1,
                        // autoplay: true,
                    }
                }
            ]
        });
    });
</script>