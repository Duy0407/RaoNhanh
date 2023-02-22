<? 
include("config.php");
$coche = getValue("coche",'int',"GET",0);
$coche = (int)$coche;
if($coche == 0){
    redirect("/");
}else if($coche == 1){
    $tit_le = "CƠ CHẾ HOẠT ĐỘNG";
}else if($coche == 2){
    $tit_le = "QUY ĐỊNH CHUNG";
}else if($coche == 3){
    $tit_le = "QUY TRÌNH THANH TOÁN";
}else if($coche == 4){
    $tit_le = "QUY TRÌNH GIAO DỊCH";
}else if($coche == 5){
    $tit_le = "CHÍNH SÁCH BẢO MẬT";
}else if($coche == 6){
    $tit_le = "GIẢI QUYẾT TRANH CHẤP";
}else{
    redirect("/");
}
?>
<!DOCTYPE html>
<html>
<head><title>Tin Tức</title>
   <meta name="keywords" content="Tin Tức"/>
   <meta name="description" content="Tin Tức"/>
   <meta property="og:title" content="Tin Tức"/>
   <meta property="og:description" content="Tin Tức"/>
   <meta property="og:url" content="http://raonhanh365.vn/"/>
   <meta name="language" content="vietnamese"/>
   <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
   <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<"/>
   <meta name="author" itemprop="author" content="raonhanh365.vn"/>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
   <meta name="robots" content="noindex,nofollow"/>
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
   <link rel="canonical" href="http://raonhanh365.vn"/>
   <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
   <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
   <script type="text/javascript" src="/js/jquery-ui.js"></script>
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
         <li><a>Tin tức</a></li>
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
            <h1><?=$tit_le?></h1>
         </div>
         <?
            if($coche == 1){
                include ("../includes/coche/inc_main_gioi_thieu.php");
            }else if($coche == 2){
                include ("../includes/coche/inc_main_quy_dinh.php");
            }else if($coche == 3){
                include ("../includes/coche/inc_main_co_che.php");
            }else if($coche == 4){
                include ("../includes/coche/inc_main_quy_trinh_giao_dich.php");
            }else if($coche == 5){
                include ("../includes/coche/inc_main_chinh_sach.php");
            }else if($coche == 6){
                include ("../includes/coche/inc_main_tranh_chap.php");
            }else{
                redirect("/");
            }
         ?>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/dangky.js?v=1"></script>
<script>
$("#slider").slider({
   range: true,
   values: [ 0, 24 ],
   min:0,
   max:24
});

</script>
<script src="/js/lazysizes.min.js"></script>
</body>
</html>