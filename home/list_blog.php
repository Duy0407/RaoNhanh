<?
include("config.php");
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
$title = "Tin tức, chia sẻ kinh nghiệm - raonhanh365";
$keyword = "Tin tức, kinh nghiệm, chia sẻ kinh nghiệm, rao vặt, đăng tin rao vặt,rao vặt miễn phí.";
$description = "Cập nhật mọi tin tức trên các lĩnh vực như: công nghệ, khuyến mãi,.... và kết hợp chia sẻ kinh nghiệm, thông tin về sản phẩm, tại trang rao vặt hiệu quả hàng đầu Việt Nam.";
$canonical = "https://raonhanh365.vn/tin-tuc";
$url_image = "/";
?>
<!DOCTYPE html>
<html>
<head>
    <!--link meta seo-->
    <?php include "../includes/common/inc_header_link.php"?>
    <link rel="preload" as="style" href="/css/jquery-ui.css"/>
    <link rel="preload" as="style" href="/css/jquery-date.css"/>
    <link rel="preload" as="image" href="/images/cv_trangchu1.gif">
    <link rel="amphtml" href="https://raonhanh365.vn/amp-tin-tuc" />
    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
    <link rel="stylesheet" type="text/css" href="/css/jquery-date.css"/>
    <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
    <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script defer type="text/javascript" src="/js/jquery-ui.js"></script>
</head>
<body>
<?
$file = '../cache_file/sql_cache.json';
$arraytong       = json_decode(file_get_contents($file),true);
$arrcity         = $arraytong['db_city'];
$db_cat          = $arraytong['db_cat'];

include("../includes/common/inc_header.php"); ?>
<section>
<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
         <li><a>Tin tức</a></li>
      </ul>
   </div>
</div>
<div class="main_cate">
   <div class="container">
   <? include('../includes/banner/inc_banner_vn.php') ?>
      <div class="left_box">
            <?
            include ('../includes/cate/inc_left_cate.php');
            ?>
         <div id="filter-left-uutien" class="show_left_uutien">
              <?
                include ('../includes/detail/tin_uu_tien.php');
              ?>
        </div>
      </div>
      <div class="right_box">
         <div class="top_r">
            <h1>TIN TỨC</h1>
         </div>
         <div class="main_r">
            <?
            $page  = getValue('page','int','GET',1);
            $page  = intval(@$page);
            if($page == 0)
            {
               $page = 1;
            }
            $curentPage = 10;
            $pageab = abs($page - 1);
            $start = $pageab * $curentPage;
            $start = intval(@$start);
            $start = abs($start);
            $db_qrcate = new db_query("SELECT new_title,new_id,new_picture,new_date,new_teaser FROM news ORDER BY new_id DESC LIMIT ".$start.",".$curentPage);
            $numrow = new db_query("SELECT count(1) FROM news");
            $count = mysql_fetch_assoc($numrow->result);
            $count = $count['count(1)'];
            While($rownew = mysql_fetch_assoc($db_qrcate->result))
            {
            ?>
            <div class="item_news">
               <a href="/tin-tuc/<?= replaceTitle($rownew['new_title']) ?>-p<?= $rownew['new_id'] ?>.html" title="<?= $rownew['new_title'] ?>" class="img_news">
                  <img class="lazyload" src="/images/loading.gif" data-src="<?= $rownew['new_picture'] == ''?"/images/df.png":"/pictures/news/".$rownew['new_picture'] ?>" alt="<?= $rownew['new_title'] ?>" />
               </a>
               <div class="right_new">
                  <h3><a href="/tin-tuc/<?= replaceTitle($rownew['new_title']) ?>-p<?= $rownew['new_id'] ?>.html" title="<?= $rownew['new_title'] ?>"><?= $rownew['new_title'] ?></a></h3>
                  <span class="time_news"><?= date("h:i d/m/Y",$rownew['new_date']) ?></span>
                  <p><?=$rownew['new_teaser']; ?></p>
               </div>
            </div>
            <?
            }
            ?>
            <div class="pagination_wrap clr">
               <div class="clr">
                <?= generatePageBar2('',$page,$curentPage,$count,'/tin-tuc','?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối'); ?>
               </div>
            </div>
         </div>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
   </div>
</div>
</section>
<? include("../includes/common/inc_script_footer.php") ?>
<? include("../includes/common/inc_footer.php") ?>
<script src="/js/lazysizes.min.js"></script>
<script defer src="/js/dangky.js?v=1"></script>
<script>
$("#slider").slider({
   range: true,
   values: [ 0, 24 ],
   min:0,
   max:24
});

</script>
</body>
</html>