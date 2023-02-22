<? 
include("config.php");
$usc_canhan = getValue("canhan","int","GET",0);
$usc_canhan = (int)$usc_canhan;
if($usc_canhan != 0){
    $db_qrusc = new db_query("SELECT usc_name,usc_id FROM user WHERE usc_id = ".$usc_canhan." LIMIT 1");
    $rowusc = mysql_fetch_assoc($db_qrusc->result);
    $usc_name = $rowusc['usc_name'];
}else{
    $usc_name = '';
}
$urlcat = "https://raonhanh365.vn/ca-nhan/".$rowusc['usc_id']."/".replaceTitle($rowusc['usc_name']).".html";
$title = $rowusc['usc_name']." Shop: Rao vặt miễn phí Shop ".$rowusc['usc_name'];
$desc = "Rao vặt miễn phí cung Shop ".$rowusc['usc_name']." trên hệ thống mua bán của Raonhanh365, Cùng ".$rowusc['usc_name']." đăng tin rao vặt các mặt hàng của bạn mọi lúc mọi nơi và đặc biệt là miễn phí. ".$rowusc['usc_name']." Shop";
$key = "rao vặt ".$rowusc['usc_name'].", rao vặt, Shop ".$rowusc['usc_name'].", mua bán ".$rowusc['usc_name'].", mua ban";
$page  = getValue('page','int','GET',1,2);
$page  = intval(@$page);
if($page == 0)
{
   $page = 1;
}
$curentPage = 20;
$pageab = abs($page - 1);
$start = $pageab * $curentPage;
$start = intval(@$start);
$start = abs($start);
if($usc_canhan != 0){
   $db_qra = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_user_id=".$usc_canhan."  ORDER BY new_update_time DESC  LIMIT ".$start.",".$curentPage);
   $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_user_id=".$usc_canhan);
}
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
?>
<!DOCTYPE html>
<html>
<head>
   <title><?= $title ?></title>
   <meta name="keywords" content="<?= $key ?>"/>
   <meta name="description" content="<?= $desc ?>"/>
   <meta property="og:title" content="<?= $title ?>"/>
   <meta property="og:description" content="<?= $desc ?>"/>
   <meta property="og:url" content="<?= $urlcat ?>"/>
   <meta name="language" content="vietnamese"/>
   <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
   <meta name="abstract" content="<?= $title ?>"/>
   <meta name="author" itemprop="author" content="raonhanh365.vn"/>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
   <meta name="robots" content="<?=$index?>"/>
   <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
   <meta property="og:image:url" content="/"/>
   <meta property="og:image:width" content="476"/>
   <meta property="og:image:height" content="249"/>
   <meta property="og:type" content="website"/>
   <meta property="og:locale" content="vi_VN"/>
   <meta name="revisit-after" content="1 days"/>
   <meta name="page-topic" content="Mua bán rao vặt"/>
   <meta name="resource-type" content="Document"/>
   <meta name="distribution" content="Global"/>
   <link rel="canonical" href="<?= $urlcat ?>"/>
   <link rel="stylesheet" type="text/css" href="/css/jquery-date.css"/>
   <script src="/js/jquery-1.8.3.min.js"></script>
   <script src="/js/jquery-ui.min.js"></script>
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
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
$arraytong       = json_decode(file_get_contents($file),true); 
$arrcity         = $arraytong['db_city'];
$db_cat          = $arraytong['db_cat'];

include("../includes/common/inc_header.php"); ?>
<section>
<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
         <li><a>Rao vặt <?=$rowusc['usc_name']?></a></li>   
      </ul>
   </div>
</div>
<div class="main_cate">
   <div class="container">
      <div class="left_box">
         <? include("../includes/cate/inc_left_cate.php") ?>
        <div id="filter-left-uutien" class="show_left_uutien">
              <?
                include ('../includes/detail/tin_uu_tien.php');
              ?>
        </div>
      </div>
      <div class="right_box">
         <div class="top_r">
            <h1>Rao vặt của <?=$rowusc['usc_name']?></h1>
            <div class="loai_ht">
               <span>Hiển thị</span>
               <ul>
                  <li class="ht1"><img src="/images/ht1.png"/></li>
                  <li class="ht2"><img src="/images/ht2.png"/></li>
               </ul>
            </div>
         </div>
         <div class="main_r">
            <?
            $count = mysql_fetch_assoc($numrow->result);
            $count = $count['count(1)'];
            While($rowa = mysql_fetch_assoc($db_qra->result))
            {
            $image = explode(";",$rowa['new_image']);
            ?>
            <div class="item_r check_error_img_<?=$rowa['new_id']?>">
               <div class="left_r">
                  <a href="<?= rewriteNews($rowa['new_id'],$rowa['new_title']) ?>" title="<?= $rowa['new_title'] ?>">
                      <img src="<?= str_replace("detail","fullsize",$image[0]) ?>" alt="<?= $rowa['new_title'] ?>" class="back_out_img_<?=$rowa['new_id']?>" onerror="myFunction(<?=$rowa['new_id']?>)"/>
                     <?if($rowa['new_type'] > 1){?>
                     <span>Đã chứng thực</span>
                     <?}?>
                     <p>Hiển thị <?= count($image) ?> ảnh</p>
                  </a>
               </div>
               <div class="right_r">
                  <div class="t_1"><a <? if($rowa['cat_parent_id'] == 0){?>href="<?= rewrite_cate($rowa['cat_id'],$rowa['cat_name']) ?>"<?} ?> title="<?= $rowa['cat_name'] ?>"><?= $rowa['cat_name'] ?></a>
                  <?= $rowa['new_type'] > 1?"<span><p>Tin được ưu tiên</p></span>":"" ?>
                  </div>
                  <a href="<?= rewriteNews($rowa['new_id'],$rowa['new_title']) ?>" title="<?= $rowa['new_title'] ?>" class="tit_pro"><?= $rowa['new_title'] ?></a>
                  <div class="time_post"><i><i class="delete_text">Thời gian đăng: </i><?= date("h:i - d/m/Y",$rowa['new_update_time']) ?></i><span class="view_post"><?= $rowa['new_view_count'] ?> views</span></div>
                  <div class="price_post">Giá: <?=($rowa['new_money']== 0)?'Liên hệ': (format_number($rowa['new_money']).' đ') ?></div>
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
                  echo generatePageBar2('',$page,$curentPage,$count,rewrite_page_2($usc_canhan,$usc_name),'?','','jp-current','preview','‹','next','›','first','«','last','»');   
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
<script src="/js/lazysizes.min.js"></script>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/dangky.js?v=1"></script>
</body>
</html>
<script>
function myFunction(id) {
    $(".check_error_img_"+id).remove();
}
</script>