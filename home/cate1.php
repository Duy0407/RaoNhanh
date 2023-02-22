<? 
include("config.php");
$catid = getValue("catid","int","GET",0);
$catid = (int)$catid;
if($catid == 0)
{
    redirect("/");
} 
$db_qrcat = new db_query("SELECT * FROM category WHERE cat_id = ".$catid." LIMIT 1");
$rowcat = mysql_fetch_assoc($db_qrcat->result);
$urlcat = "http://raonhanh365.vn/mua-ban/".$rowcat['cat_id']."/".replaceTitle($rowcat['cat_name']).".html";
?>
<!DOCTYPE html>
<html>
<head>
   <title>Mua bán rao vặt <?= mb_strtolower($rowcat['cat_name'],'UTF-8') ?> giá rẻ</title>
   <meta name="keywords" content="Mua bán <?= mb_strtolower($rowcat['cat_name'],'UTF-8') ?> giá rẻ"/>
   <meta name="description" content="<?= $rowcat['cat_name'] ?> - Mua bán rao vặt <?= mb_strtolower($rowcat['cat_name'],'UTF-8') ?> giá rẻ, uy tín nhất tại raonhanh365.vn. Xung quanh tôi ai bán gì, ai muốn mua gì!"/>
   <meta property="og:title" content="Mua bán rao vặt <?= mb_strtolower($rowcat['cat_name'],'UTF-8') ?> giá rẻ"/>
   <meta property="og:description" content="<?= $rowcat['cat_name'] ?> - Mua bán rao vặt <?= mb_strtolower($rowcat['cat_name'],'UTF-8') ?> giá rẻ, uy tín nhất tại raonhanh365.vn. Xung quanh tôi ai bán gì, ai muốn mua gì!"/>
   <meta property="og:url" content="<?= $urlcat ?>"/>
   <meta name="language" content="vietnamese"/>
   <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
   <meta name="abstract" content="Mua bán rao vặt <?= mb_strtolower($rowcat['cat_name'],'UTF-8') ?> giá rẻ"/>
   <meta name="author" itemprop="author" content="raonhanh365.vn"/>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
   <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
   <meta name="robots" content="index, follow,noodp"/>
   <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
   <meta property="og:image:url" content="/"/>
   <meta property="og:image:width" content="476"/>
   <meta property="og:image:height" content="249"/>
   <meta property="og:type" content="website"/>
   <meta property="og:locale" content="vi_VN"/>
   <link href="//fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,500italic,700,700italic&amp;subset=latin,vietnamese" rel="stylesheet" type="text/css"/>
   <meta name="revisit-after" content="1 days"/>
   <meta name="page-topic" content="Mua bán rao vặt"/>
   <meta name="resource-type" content="Document"/>
   <meta name="distribution" content="Global"/>
   <link rel="canonical" href="<?= $urlcat ?>"/>
   <link rel="stylesheet" type="text/css" href="/css/style.css"/>
   <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
   <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="/js/jquery-ui.js"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
</head>
<body>
<? include("../includes/common/inc_header.php") ?>
<section>
<div class="breadcrumb">
   <div class="container">
      <ul>
         <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
         <li><a href="<?= rewrite_cate($catid,$rowcat['cat_name']) ?>" title="<?= $rowcat['cat_name'] ?>"><?= $rowcat['cat_name'] ?></a></li>
      </ul>
   </div>
</div>
<div class="main_cate">
   <div class="container">
      <div class="left_box">
         <div class="filter">
            <h2>LỌC SẢN PHẨM</h2>
            <div class="main_filter">
               <div class="box">
                  <div class="top_box">
                     <span class="lbox">Sắp xếp theo tỉnh thành</span>
                     <span class="rbox"></span>
                  </div>
                  <div class="bot_box slcity">
                     <select id="select_city">
                        <option>Tỉnh thành ...</option>
                     </select>
                  </div>
               </div>
               <div class="box">
                  <div class="top_box">
                     <span class="lbox">Sắp xếp theo giá</span>
                     <span class="rbox"></span>
                  </div>
                  <div class="bot_box slprice">
                     <select id="select_price">
                        <option>Từ thấp - cao</option>
                     </select>
                  </div>
               </div>
               <div class="box">
                  <div class="top_box">
                     <span class="lbox">Tin rao vặt</span>
                     <span class="rbox"></span>
                  </div>
                  <div class="bot_box check_cb">
                     <label><input type="checkbox" /><div class="control__indicator"></div>Cần bán</label>
                     <label><input type="checkbox" /><div class="control__indicator"></div>Cần mua</label>
                  </div>
               </div>
               <div class="box">
                  <div class="top_box">
                     <span class="lbox">Loại sản phẩm</span>
                     <span class="rbox"></span>
                  </div>
                  <div class="bot_box check_cb">
                     <label><input type="checkbox" /><div class="control__indicator"></div>SP mới</label>
                     <label><input type="checkbox" /><div class="control__indicator"></div>SP đã sử dụng</label>
                  </div>
               </div>
               <div class="box">
                  <div class="top_box">
                     <span class="lbox">Sắp xếp theo ngày đăng</span>
                     <span class="rbox"></span>
                  </div>
                  <div class="bot_box datepick">
                     <input type="text" placeholder="Từ ngày ..." />
                     <input type="text" placeholder="Đến ngày ..." />
                  </div>
               </div>
               <div class="box">
                  <div class="top_box">
                     <span class="lbox">Thiết lập khoảng cách</span>
                     <span class="rbox"></span>
                  </div>
                  <div class="bot_box">
                     <div id="slider"></div>
                     <p class="rule">
            				Khoảng cách: 02 km - 10 km
            			</p>
                  </div>
               </div>
               <div class="box">
                  <div class="top_box">
                     <span class="lbox">Sắp xếp theo top view</span>
                     <span class="rbox"></span>
                  </div>
                  <div class="bot_box slview">
                     <select id="select_view">
                        <option>Top view trong ngày</option>
                     </select>
                  </div>
               </div>
               <div class="cuoi_fil">
                  <span class="btn_button">ÁP DỤNG</span>
               </div>
            </div>
         </div>
         <div class="box_uutien">
            <h2>TIN ĐƯỢC ƯU TIÊN</h2>
            <div class="main_uutien">
               <div class="item_qt">
                  <div class="img_qt"><img src="/images/demo1.png" alt="#"/><span>Đã chứng thực</span></div>
                  <div class="cate_qt">
                     <a href="#" title="#">Bất động sản</a>
                     <span>1000 views</span>
                  </div>
                  <h3><a href="#" title="#">Sở hữu ngôi nhà đặc biệt với 
   vị trí view sông gần biển và 
   kiến trúc cổ.</a></h3>
                  <i class="time_qt">Đăng cách đây 10 phút</i>
                  <p class="price_qt">$ 9.400.000.000 đ</p>
                  <div class="lh_qt">
                     <a href="#" class="address_qt">ĐỊA CHỈ</a>
                     <a href="#" class="phone_qt">GỌI ĐIỆN</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="right_box">
         <div class="top_r">
            <h1><?= mb_strtoupper($rowcat['cat_name'],'UTF-8') ?></h1>
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
            if($rowcat['cat_parent_id'] == 0)
            {
              $cauqr = "cat_parent_id = ".$catid."";
            }
            else
            {
              $cauqr = "new_cate_id = ".$catid."";
            }
            $page  = getValue('page','int','GET',1,2);
            $page  = intval(@$page);
            $curentPage = 20;
            $pageab = abs($page - 1);
            $start = $pageab * $curentPage;
            $start = intval(@$start);
            $start = abs($start);
            if($page == 0)
            {
               $page = 1;
            }
            $db_qrcout = new db_query("SELECT new_id
                                FROM new
                                LEFT JOIN category ON new.new_cate_id = category.cat_id
                                WHERE ".$cauqr." AND new_active = 1");
            $count = mysql_num_rows($db_qrcout->result);
            $db_qra = new db_query("SELECT new_id,new_title,new_money,new_city,new_image,new_create_time
                                    FROM new
                                    LEFT JOIN category ON new.new_cate_id = category.cat_id
                                    WHERE ".$cauqr." AND new_active = 1 
                                    ORDER BY new_id DESC
                                    LIMIT ".$start.",".$curentPage);
            While($rowa = mysql_fetch_assoc($db_qra->result))
            {
            $image = explode(";",$rowa['new_image']);
            ?>
            <div class="item_r">
               <div class="left_r">
                  <a href="<?= rewrite_cate($rowa['cat_id'],$rowa['cat_name']) ?>" title="<?= $rowa['new_title'] ?>">
                     <img src="<?= $image[0] ?>" alt="<?= $rowa['new_title'] ?>" />
                     <span><?= $rowa['new_authen'] == 1?"Đã chứng thực":"" ?></span>
                     <p>Hiển thị <?= count($image) ?> ảnh</p>
                  </a>
               </div>
               <div class="right_r">
                  <div class="t_1"><a href="<?= rewrite_cate($rowa['cat_id'],$rowa['cat_name']) ?>" title="<?= $rowa['cat_name'] ?>"><?= $rowa['cat_name'] ?></a>
                  <?= $rowa['new_type'] > 1?"<span>Tin được ưu tiên</span>":"" ?>
                  </div>
                  <a href="<?= rewriteNews($rowa['new_id'],$rowa['new_title']) ?>" title="<?= $rowa['new_title'] ?>" class="tit_pro"><?= $rowa['new_title'] ?></a>
                  <div class="time_post"><i>Thời gian đăng: <?= date("h:i - d/m/Y",$rowa['new_update_time']) ?></i><span class="view_post"><?= $rowa['new_view_count'] ?> views</span></div>
                  <div class="price_post">Giá: <?= format_number($rowa['new_money']) ?> đ</div>
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
               echo generatePageBar2('',$page,$curentPage,$count,rewrite_cate($catid,$rowcat['cat_name']),'?','','jp-current','preview','‹','next','›','first','«','last','»');
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