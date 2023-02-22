<? 
include("config.php"); 

$tg = getValue("tg","int","GET",4);
$tg = (int)$tg; 

$db_tg = new db_query("SELECT adm_name FROM admin_user WHERE adm_id = ".$tg." LIMIT 1");
if (mysql_num_rows($db_tg->result) == 0) {
     redirect('https://raonhanh365.vn');
}
$rowtg = mysql_fetch_assoc($db_tg->result);

$tg_name = $rowtg['adm_name'];

$urlcano = "https://raonhanh365.vn/tac-gia/".replaceTitle($rowtg['adm_name'])."-tg".$tg.'.html';

?>
<!DOCTYPE html>
<html>
<head>
   <title>Tác giả: <?=$tg_name ?> - Blogger Raonhanh365</title>
   <meta name="keywords" content="<?=$tg_name.', Tác giả '.$tg_name; ?>"/>
   <meta name="description" content="Tác giả: <?=$tg_name ?> - Blogger Raonhanh365"/>
   <meta property="og:title" content="Tác giả: <?=$tg_name ?> - Blogger Raonhanh365"/>
   <meta property="og:description" content="Tác giả: <?=$tg_name ?> - Blogger Raonhanh365"/>
   <meta property="og:url" content="<?=$urlcano; ?>"/>
   <meta name="language" content="vietnamese"/>
   <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
   <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<"/>
   <meta name="author" itemprop="author" content="raonhanh365.vn"/>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
   <meta name="robots" content="noindex, nofollow,noodp"/>
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
   <link rel="canonical" href="<?=$urlcano; ?>"/>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
<!--    <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
   <link rel="stylesheet" type="text/css" href="/css/jquery-date.css"/> -->
   <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
   <!-- <script type="text/javascript" src="/js/jquery-ui.js"></script> -->
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
            <h1>Bài viết của tác giả <?=$tg_name; ?></h1>
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
            $db_qrcate = new db_query("SELECT * FROM news WHERE admin_id = '".$tg."' ORDER BY new_id DESC LIMIT ".$start.",".$curentPage);
            

            $numrow = new db_query("SELECT count(1) FROM news WHERE admin_id = '".$tg."'"); 
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
                  <p><?= removeHTML($rownew['new_teaser']) ?></p>
               </div>
            </div>
            <?
            }
            ?>
            <div class="pagination_wrap clr">
               <div class="clr">
                <?= generatePageBar2('',$page,$curentPage,$count,$urlcano,'?','','jp-current','preview','<','next','>','first','Đầu','last','Cuối'); ?>
               </div>
            </div>
         </div>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
   </div>
</div>
</section>
<script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/js/lazysizes.min.js"></script>
<script src="/js/dangky.js?v=1"></script>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>