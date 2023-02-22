<? 
include("config.php");
?>
<!DOCTYPE html>
<html>
<head><title>Hướng dẫn sử dụng</title>
   <meta name="keywords" content="Hướng dẫn sử dụng trang Raonhanh365"/>
   <meta name="description" content="Hướng dẫn sử dụng"/>
   <meta property="og:title" content="Hướng dẫn sử dụng"/>
   <meta property="og:description" content="Hướng dẫn sử dụng"/>
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
    <!--    -----tvt them  02/06--->
    <link rel="preload" href="/css/style.min.css?v=<?=$version?>" as="style">
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="http://raonhanh365.vn"/>
    <!--------------->

   <link rel="canonical" href="http://raonhanh365.vn"/>
<!--   <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>-->
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
   <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
<!--   <script type="text/javascript" src="/js/jquery-ui.js"></script>-->
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
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
            <h1>HƯỚNG DẪN SỬ DỤNG</h1>
         </div>
         <?
            include ('../includes/coche/huongdan_sudung.php');
         ?>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
   </div>
</div>
</section>
<script src="/js/lazysizes.min.js"></script>
<!--<script src="/js/jquery-1.8.3.min.js"></script>-->
<script defer src="/js/dangky.js?v=1"></script>
<? include("../includes/common/inc_footer.php") ?>
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