<?
include("config.php");
$catid = getValue("catid", "int", "GET", 0);
$catid = (int)$catid;

$citid = getValue("city", "int", "GET", 0);
$citid = (int)$citid;

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

if ($new_tit != "") {
   $sql .= " AND new_title LIKE '%" . $new_tit . "%' ";
}

$db_qrcat = new db_query("SELECT cat_parent_id,cat_name,cat_id FROM category WHERE cat_id = " . $catid . " LIMIT 1");
$rowcat = mysql_fetch_assoc($db_qrcat->result);


$urlcat = "https://raonhanh365.vn" . rewrite_page_1($catid, $catname, $citid, $citname, $s_tit);


$title = "";
$page  = getValue('page', 'int', 'GET', 1, 2);
$page  = intval(@$page);
if ($page == 0) {
   $page = 1;
}
$curentPage = 20;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);

if ($catid == 0 && $citid == 0) {
   $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . " ORDER BY new_type DESC" . $ord . ",new_update_time DESC  LIMIT " . $start . "," . $curentPage);
   $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . "");
   $title = "Danh sách tin rao vặt trên toàn quốc";
   $desc = "Danh sách tin mua bán rao vặt trên toàn quốc tại Raonhanh365.vn";
   $key = "Mua bán, rao vặt";
} else if ($catid != 0 && $citid == 0) {
   $title = "Mua bán rao vặt " . mb_strtolower($rowcat['cat_name'], 'UTF-8') . " giá rẻ";
   $desc = $rowcat['cat_name'] . " - Mua bán rao vặt " . mb_strtolower($rowcat['cat_name'], 'UTF-8') . " giá rẻ, uy tín nhất tại raonhanh365.vn. Xung quanh tôi ai bán gì, ai muốn mua gì!";
   $key = "Mua bán " . mb_strtolower($rowcat['cat_name'], 'UTF-8') . " giá rẻ";
   if ($rowcat['cat_parent_id'] == 0) {
      $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
   } else {
      $cauqr = "new_cate_id = " . $catid . "";
   }
   $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . "  AND " . $cauqr . " AND new_active = 1 " . $sql . "  ORDER BY new_type DESC " . $ord . ",new_update_time DESC  LIMIT " . $start . "," . $curentPage);
   $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . " AND " . $cauqr . " AND new_active = 1 " . $sql . "");
} else if ($catid == 0 && $citid != 0) {
   $title = "Rao vặt " . $citname . " : Mạng xã hội Rao vặt miễn phí tại " . $citname;
   $desc = "Mạng xã hội Rao vặt miễn phí tại " . $citname . " với hệ thống cập nhật liên tục hàng ngàn các tin mua bán mỗi ngày, rao vặt " . $citname . " trên các gian hàng uy tín được xác thực tại website Raonhanh365.vn, " . $citname . " rao vặt đồ cũ giá rẻ cần là có";
   $key =  "mua bán " . $citname . ", rao vặt " . $citname . ", rao vặt tại " . $citname . ", quảng cáo tại " . $citname . " , đăng tin mua bán " . $citname . ", quảng cáo " . $citname;
   $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_city = " . $citid . " " . $sql . " ORDER BY new_type DESC" . $ord . ",new_update_time DESC  LIMIT " . $start . "," . $curentPage);
   $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_city = " . $citid . " " . $sql . "");
} else if ($catid != 0 && $citid != 0) {
   $title = "Mua bán rao vặt " . $catname . " tại " . $citname;
   $desc = "Mua bán rao vặt " . $catname . " tại " . $citname . ". Raonhanh365.vn là mạng xã hội mua bán tổng hợp tất cả các tin mua bán trên facebook mang lại sự tiện lợi cho người mua.";
   $key = "Mua bán rao vặt " . $catname . " tại " . $citname;
   if ($rowcat['cat_parent_id'] == 0) {
      $cauqr = "(new_cate_id = " . $catid . " OR cat_parent_id = " . $catid . ")";
   } else {
      $cauqr = "new_cate_id = " . $catid . "";
   }
   $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . " AND new_city = " . $citid . "  AND " . $cauqr . " AND new_active = 1 " . $sql . " AND new_city = " . $citid . " ORDER BY new_type DESC" . $ord . ",new_update_time DESC  LIMIT " . $start . "," . $curentPage);
   $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 " . $sql . " AND new_city = " . $citid . "  AND " . $cauqr . " AND new_active = 1 " . $sql . " AND new_city = " . $citid . " ");
   //   echo "SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 ".$sql." AND new_city = ".$citid." AND new_type IN (1,3) AND ".$cauqr." ORDER BY new_type DESC".$ord.",new_update_time DESC  LIMIT ".$start.",".$curentPage;
}
?>
<!DOCTYPE html>
<html>

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
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
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
   <!--    -----tvt them  02/06--->
   <link rel="preload" href="/css/style.min.css?v=<?=$version?>" as="style">
   <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
   <link rel="preload" as="image" href="/images/cv_trangchu1.gif">
   <link rel="preload" href="<?= $urlcat ?>" />
   <link rel="preload" type="text/css" href="/css/jquery-date.css" />
   <!--------------->

   <link rel="canonical" href="<?= $urlcat ?>" />
   <link rel="stylesheet" type="text/css" href="/css/jquery-date.css" />
   <link rel="stylesheet" href="/css/style.min.css?v=<?=$version?>">

   <script src="/js/jquery-1.8.3.min.js"></script>
   <!--   <script src="/js/jquery-ui.min.js"></script>-->
   <!--   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>-->
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
   <script>
      (adsbygoogle = window.adsbygoogle || []).push({
         google_ad_client: "ca-pub-4118232040315071",
         enable_page_level_ads: true
      });
   </script>
</head>

<body>
   <?
   $file = '../cache_file/sql_cache.json';
   $arraytong       = json_decode(file_get_contents($file), true);
   $arrcity         = $arraytong['db_city'];
   $db_cat          = $arraytong['db_cat'];

   include("../includes/common/inc_header.php"); ?>
   <section>
      <div class="breadcrumb">
         <div class="container">
            <ul>
               <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
               <?
               if ($new_tit != "" && $catid == 0 && $citid == 0) {
               ?>
                  <li><a>Kết quả tìm kiếm <?= $new_tit ?></a></li>
               <?
               } else if ($catid == 0 && $citid != 0 && $new_tit != "") {
               ?>
                  <li><a><?= $new_tit ?> tại <?= $arrcity[$citid]['cit_name'] ?></a></li>
               <?
               } else if ($catid != 0 && $citid != 0 && $new_tit != "") {
               ?>
                  <li><a><?= $new_tit ?> thuộc <?= $rowcat['cat_name'] ?> tại <?= $arrcity[$citid]['cit_name'] ?></a></li>
               <?
               } else if ($catid == 0 && $citid == 0 && $new_tit == "") {
               ?>
                  <li><a>Rao vặt miễn phí</a></li>
               <?
               } else if ($catid != 0 && $citid == 0) {
               ?>
                  <li><a><?= $rowcat['cat_name'] ?></a></li>
               <?
               } else if ($catid == 0 && $citid != 0) {
               ?>
                  <li><a>Rao vặt <?= $arrcity[$citid]['cit_name'] ?></a></li>
               <?
               } else {
               ?>
                  <li><a><?= $rowcat['cat_name'] ?> tại <?= $arrcity[$citid]['cit_name'] ?></a></li>
               <?
               }
               ?>
            </ul>
         </div>
      </div>
      <div class="main_cate">
         <div class="container">
            <a style="margin-bottom:10px;display:inline-block" target="_blank" href="https://timviec365.vn/cv-xin-viec"><img style="max-width:100%;" src="/images/loading.gif" class="lazyload" data-src="/images/cv_trangchu1.gif" alt="Tạo Cv Online"></a>
            <div class="left_box">
               <? include("../includes/cate/inc_left_cate.php") ?>
               <div id="filter-left-uutien" class="show_left_uutien">
                  <?
                  include('../includes/detail/tin_uu_tien.php');
                  ?>
               </div>
            </div>
            <div class="right_box">
               <div class="top_r">
                  <h1><?
                        if ($catid == 0 && $citid == 0 && $new_tit != "") {
                        ?>
                        Kết quả tìm kiếm <?= $new_tit ?>
                     <?
                        } else if ($catid == 0 && $citid != 0 && $new_tit != "") {
                     ?>
                        <?= $new_tit ?> tại <?= $arrcity[$citid]['cit_name'] ?>
                     <?
                        } else if ($catid != 0 && $citid != 0 && $new_tit != "") {
                     ?>
                        <?= $new_tit ?> thuộc <?= $rowcat['cat_name'] ?> tại <?= $arrcity[$citid]['cit_name'] ?>
                     <?
                        } else if ($catid == 0 && $citid == 0) {
                     ?>
                        Rao vặt miễn phí
                     <?
                        } else if ($catid != 0 && $citid == 0) {
                     ?>
                        <?= $rowcat['cat_name'] ?>
                     <?
                        } else if ($catid == 0 && $citid != 0) {
                     ?>
                        Chợ mua bán rao vặt tại <?= $arrcity[$citid]['cit_name'] ?>
                     <?
                        } else {
                     ?>
                        <?= $rowcat['cat_name'] ?> tại <?= $arrcity[$citid]['cit_name'] ?>
                     <?
                        }
                     ?></h1>
                  <div class="loai_ht">
                     <span>Hiển thị</span>
                     <ul>
                        <li class="ht1"><img src="/images/ht1.png" /></li>
                        <li class="ht2"><img src="/images/ht2.png" /></li>
                     </ul>
                  </div>
               </div>
               <div class="main_r">
                  <?
                  $count = mysql_fetch_assoc($numrow->result);
                  $count = $count['count(1)'];
                  while ($rowa = mysql_fetch_assoc($db_qra->result)) {
                     $image = explode(";", $rowa['new_image']);
                  ?>
                     <div class="item_r check_error_img_<?= $rowa['new_id'] ?>">
                        <div class="left_r">
                           <a href="<?= rewriteNews($rowa['new_id'], $rowa['new_title']) ?>" title="<?= $rowa['new_title'] ?>">
                              <img src='/images/loading.gif' data-src="<?= str_replace("detail", "fullsize", $image[0]) ?>" alt="<?= $rowa['new_title'] ?>" class="back_out_img_<?= $rowa['new_id'] ?> lazyload" onerror='this.onerror=null;this.src="/images/noimage.webp";'/>
                              <? if ($rowa['new_type'] > 1) { ?>
                                 <span>Đã chứng thực</span>
                              <? } ?>
                              <p>Hiển thị <?= count($image) ?> ảnh</p>
                           </a>
                        </div>
                        <div class="right_r">
                           <div class="t_1"><a <? if ($rowa['cat_parent_id'] == 0) { ?>href="<?= rewrite_cate($rowa['cat_id'], $rowa['cat_name']) ?>" <? } ?> title="<?= $rowa['cat_name'] ?>"><?= $rowa['cat_name'] ?></a>
                              <?= $rowa['new_type'] > 1 ? "<span><p>Tin được ưu tiên</p></span>" : "" ?>
                           </div>
                           <a href="<?= rewriteNews($rowa['new_id'], $rowa['new_title']) ?>" title="<?= $rowa['new_title'] ?>" class="tit_pro"><?= $rowa['new_title'] ?></a>
                           <div class="time_post"><i><i class="delete_text">Thời gian đăng: </i><?= date("h:i - d/m/Y", $rowa['new_update_time']) ?></i><span class="view_post"><?= $rowa['new_view_count'] ?> views</span></div>
                           <div class="price_post">Giá: <?= ($rowa['new_money'] == 0) ? 'Liên hệ' : (format_number($rowa['new_money']) . ' đ') ?> </div>
                           <div class="add_post"><?= $rowa['new_address'] ?></div>
                           <div class="name_post">Người đăng: <i><?= $rowa['new_name'] ?></i><span class="tim_do"></span></div>
                        </div>
                     </div>
                  <?
                     unset($image);
                  }
                  ?>
                  <div class="pagination_wrap">
                     <div class="clr">
                        <?
                        echo generatePageBar2('', $page, $curentPage, $count, rewrite_page_1($catid, $catname, $citid, $citname, $s_tit), '?', '', 'jp-current', 'preview', '‹', 'next', '›', 'first', '«', 'last', '»');
                        ?>
                     </div>
                  </div>
               </div>
            </div>
            <? include("../includes/home/inc_tag.php") ?>
         </div>
      </div>
   </section>
   <? include("../includes/common/inc_footer.php") ?>
</body>

</html>
<!--<script src="/js/jquery-1.8.3.min.js"></script>-->
<script defer src="/js/dangky.js?v=1"></script>
<script src="/js/lazysizes.min.js"></script>
<script>
   function myFunction(id) {
      $(".check_error_img_" + id).remove();
   }
</script>