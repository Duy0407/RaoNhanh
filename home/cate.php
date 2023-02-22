<? 
include("config.php");
require_once("../classes/resize-class.php");
$catid = getValue("catid","int","GET",0);
$catid = (int)$catid;
$usc_canhan = getValue("canhan","int","GET",0);
$usc_canhan = (int)$usc_canhan;
$citid = getValue("city","int","GET",0);
$citid = (int)$citid;
$fill  = getValue("fill","int","GET",0);
$fill  = (int)$fill;
$price = getValue("price","int","GET",0);
$price = (int)$price;
$cb    = getValue("cb","int","GET",0);
$cb    = (int)$cb;
$spm   = getValue("spm","int","GET",0);
$spm   = (int)$spm;
$st1   = getValue("st1","str","GET","");
$st1   = trim($st1);
$st2   = getValue("st2","str","GET","");
$st2   = trim($st2);
$view  = getValue("view","int","GET",0);
$view  = (int)$view;
$new_tit   = getValue("sp","str","GET","");
$new_tit   = replaceMQ($new_tit);
$new_tit   = strip_tags($new_tit);
$s_tit     = $new_tit;
// echo $new_tit;
$new_tit   = str_replace("-"," ",$new_tit);
$new_tit = str_replace("     "," ",$new_tit);
$new_tit = str_replace("    "," ",$new_tit);
$new_tit = str_replace("   "," ",$new_tit);
$new_tit = str_replace("  "," ",$new_tit);
$new_tit = trim($new_tit);
$sql = '';
$ord = '';
if($catid == 0)
{
   $catname = "";
}
else
{
   $catname = $db_cat[$catid]['cat_name'];
}
if($citid == 0)
{
   $citname = "";
}
else
{
   $citname = $arrcity[$citid]['cit_name'];
}
if($price > 0 || $cb > 0 || $spm > 0 || $st1 != "" || $st2 != "" || $view > 0)
{
   $sq = "?fill=1";
}
else
{
   $sq = "";
}
if($price == 1)
{
   $ord .= ',new_money ASC';
}
if($price == 2)
{
   $ord .= ',new_money DESC';
}
if($cb == 1)
{
   $sql .= ' AND new_buy_sell = 1 ';
}
if($cb == 2)
{
   $sql .= ' AND new_buy_sell = 2 ';
}
if($spm == 1)
{
   $sql .= ' AND new_new_old = 1 ';
}
if($spm == 2)
{
   $sql .= ' AND new_new_old = 2 ';
}
if($new_tit !="")
{
   $sql .= " AND new_title LIKE '%".$new_tit."%' ";
}
if($st1 != "" && strtotime(str_replace("/","-",$st1)) != '' && $st2 == "")
{
   $sql .= ' AND new_create_time > '.strtotime(str_replace("/","-",$st1)).' ';
}
if($st1 == "" && $st2 != "" && strtotime(str_replace("/","-",$st2)) != '')
{
   $sql .= ' AND new_create_time < '.strtotime(str_replace("/","-",$st2)).' ';
}
if($st1 != "" && $st2 != "" && strtotime(str_replace("/","-",$st1)) != '' && strtotime(str_replace("/","-",$st2)) != '')
{
   $sql .= ' AND new_create_time < '.strtotime(str_replace("/","-",$st2)).' AND new_create_time > '.strtotime(str_replace("/","-",$st1)).' ';
}
if($view == 1)
{
   $ord .= ',new_view_count DESC';
}
if($view == 2)
{
   $ord .= ',new_view_count ASC';
} 
if($price > 0)
{
   $sq .= "&price=".$price;
}
if($cb > 0)
{
   $sq .= "&cb=".$cb;
}
if($spm > 0)
{
   $sq .= "&spm=".$spm;
}
if($st1 != "")
{
   $sq .= "&st1=".$st1;
}
if($st2 != "")
{
   $sq .= "&st2=".$st2;
}
if($view > 0)
{
   $sq .= "&view=".$view;
}
$db_qrcat = new db_query("SELECT cat_name,cat_parent_id FROM category WHERE cat_id = ".$catid." LIMIT 1");
$rowcat = mysql_fetch_assoc($db_qrcat->result);
if($usc_canhan != 0){
    $db_qrusc = new db_query("SELECT usc_name FROM user WHERE usc_id = ".$usc_canhan." LIMIT 1");
    $rowusc = mysql_fetch_assoc($db_qrusc->result);
    $usc_name = $rowusc['usc_name'];
}else{
    $usc_name = '';
}
if($sq == "")
{
   $canonical = "https://raonhanh365.vn".rewrite_page($catid,$catname,$citid,$citname,$usc_canhan,$usc_name,$s_tit);
}
else
{
    $canonical = "https://raonhanh365.vn".rewrite_page($catid,$catname,$citid,$citname,$usc_canhan,$usc_name,$s_tit).$sq;
}
$title = "";
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
$cauqr = '';
if($catid == 0 && $citid == 0)
{

   $title = "Danh sách tin rao vặt trên toàn quốc";
   $description = "Danh sách tin mua bán rao vặt trên toàn quốc tại Raonhanh365.vn";
   $keyword= "Mua bán, rao vặt";
}
else if($catid != 0 && $citid == 0)
{
   $title = "Rao vặt ".mb_strtolower($rowcat['cat_name'],'UTF-8')." giá rẻ cập nhật hàng giờ - raonhanh365";
   $description = "Rao vặt ".$rowcat['cat_name']." - kênh thông tin về ".mb_strtolower($rowcat['cat_name'],'UTF-8')." giá rẻ. Bạn có thể rao vặt ".$rowcat['cat_name']." nhanh chóng kể cả sản phẩm cũ và mới giúp tiếp cận khách hàng hiệu quả nhất, đồng thời raonhanh365 còn là nơi đáng tin cậy để bạn có thể mua hàng với những gian hàng quảng cáo ".$rowcat['cat_name']." đã được xác minh cập nhật 24/24.";
   $keyword= "Rao vặt ".mb_strtolower($rowcat['cat_name'],'UTF-8').",".mb_strtolower($rowcat['cat_name'],'UTF-8').", mua bán ".mb_strtolower($rowcat['cat_name'],'UTF-8')."";
   if($rowcat['cat_parent_id'] == 0)
   {
   $cauqr = " AND (new_cate_id = ".$catid." OR cat_parent_id = ".$catid.")";
   }
   else
   {
   $cauqr = " AND new_cate_id = ".$catid."";
   }

}
else if($catid == 0 && $citid != 0)
{
   $title = "Mạng xã hội mua bán rao vặt miễn phí tại ".$citname." | Raonhanh365.vn";
   $description = "Mạng xã hội Rao vặt miễn phí tại ".$citname." với hệ thống cập nhật liên tục hàng ngàn các tin mua bán mỗi ngày, rao vặt ".$citname." trên các gian hàng uy tín được xác thực tại website Raonhanh365.vn, ".$citname." rao vặt đồ cũ giá rẻ cần là có";
   $keyword=  "mua bán ".$citname.", rao vặt ".$citname.", rao vặt tại ".$citname.", quảng cáo tại ".$citname." , đăng tin mua bán ".$citname.", quảng cáo ".$citname;

}
else if($catid != 0 && $citid != 0)
{
   $title = "Mua bán rao vặt ".$catname." Tại ".$citname." hiệu quả, giá tốt";
   $description = "Mua bán ".$catname." tại ".$citname." - Raonhanh365.vn là mạng xã hội mua bán rao vặt miễn phí các tin ".$catname." tại ".$citname." mang lại sự tiện lợi cho người mua và người bán với môi trường kinh doanh cạnh tranh công bằng, rao vặt ".$catname." tại ".$citname." ở raonhanh365 bạn sẽ gia tăng doanh thu đáng kể và tìm được mặt hàng ưng ý.";
   $keyword= "rao vặt ".$catname." tại ".$citname.", ".$catname." tại ".$citname.", mua bán ".$catname." tại ".$citname.", rao vặt, mua bán ".$citname."";
   if($rowcat['cat_parent_id'] == 0)
   {
   $cauqr = " AND (new_cate_id = ".$catid." OR cat_parent_id = ".$catid.")";
   }
   else
   {
   $cauqr = " AND new_cate_id = ".$catid."";
   }
}
$sql_cit = '';
if($citid != 0){
    $sql_cit = " AND new_city = '$citid' ";
}
$db_qra = new db_query("SELECT new_image,new_create_time,new_id,new_title,new_authen,cat_parent_id,cat_id, cat_name,new_type,new_update_time,new_view_count,new_money,new_address,new_name FROM new JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 ".$sql.$sql_cit.$cauqr." ".$sql_cit." ORDER BY new_pin_cate DESC, FIELD(new_type,3,2,1,3,4,0)".$ord.",new_update_time DESC  LIMIT ".$start.",".$curentPage);
$numrow = new db_query("SELECT count(1) FROM new JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 ".$sql.$sql_cit." ".$cauqr.$sql_cit);
$css_new = true;
$link = 'cate';
//if($sq == ""){
//    $index = "index, follow,noodp";
// }else{
//    $index = "noindex, nofollow";
//}
$index = "noindex, nofollow";
$url_image = "/";
?>
<!DOCTYPE html>
<html>
<head>
    <!--link meta seo-->
    <?php include "../includes/common/inc_header_link.php"?>
    <link rel="preload" href="/css/sidebar_fillter.css" as="style">
    <link rel="stylesheet" href="/css/sidebar_fillter.css" type="text/css">
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
         <?
         if($new_tit != "" && $catid == 0 && $citid == 0)
         {
         ?>
         <li><a>Kết quả tìm kiếm <?=$new_tit?></a></li>   
         <?
         }
         else if($catid == 0 && $citid != 0 && $new_tit != "")
         {
         ?>
         <li><a><?=$new_tit?> tại <?= $arrcity[$citid]['cit_name']?></a></li>
         <?
         }
         else if($catid != 0 && $citid != 0 && $new_tit != "")
         {
         ?>
         <li><a><?=$new_tit?> thuộc <?= $rowcat['cat_name'] ?> tại <?= $arrcity[$citid]['cit_name']?></a></li>
         <?
         }
         else if($catid == 0 && $citid == 0 && $new_tit == "")
         {
         ?>
         <li><a>Rao vặt miễn phí</a></li>
         <?
         }
         else if($catid != 0 && $citid == 0)
         {
         ?>
         <li><a><?= $rowcat['cat_name'] ?></a></li>
         <?
         }
         else if($catid == 0 && $citid != 0)
         {
         ?>
         <li><a>Rao vặt <?= $arrcity[$citid]['cit_name'] ?></a></li>
         <?
         }
         else
         {
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
      <? include('../includes/banner/inc_banner_vn.php') ?>
      <div class="left_box">
         <? include("../includes/cate/inc_left_cate.php") ?>
        <div id="filter-left-uutien" class="show_left_uutien">
           <?
           include ('../includes/cate/inc_tin_uu_tien.php');
           ?>
        </div>
      </div>
      <div class="right_box">
         <div class="top_r">
         <h1><?
         if($catid == 0 && $citid == 0 && $new_tit != ""){
         ?>
            Kết quả tìm kiếm <?=$new_tit?>
         <?   
         }
         else if($catid == 0 && $citid != 0 && $new_tit != "")
         {
         ?>
            <?=$new_tit?> tại <?= $arrcity[$citid]['cit_name'] ?>
         <?
         }
         else if($catid != 0 && $citid != 0 && $new_tit != "")
         {
         ?>
            <?=$new_tit?> thuộc <?= $rowcat['cat_name'] ?> tại <?= $arrcity[$citid]['cit_name'] ?>
         <?
         }
         else if($catid == 0 && $citid == 0)
         {
         ?>
         Rao vặt miễn phí
         <?
         }
         else if($catid != 0 && $citid == 0)
         {
         ?>
         <?= $rowcat['cat_name'] ?>
         <?
         }
         else if($catid == 0 && $citid != 0)
         {
         ?>
         MXH mua bán rao vặt tại <?= $arrcity[$citid]['cit_name'] ?>
         <?
         }
         else
         {
         ?>
         <?= $rowcat['cat_name'] ?> tại <?= $arrcity[$citid]['cit_name'] ?>
         <? 
         }
         ?></h1>
            <div class="loai_ht">
               <span>Hiển thị</span>
               <ul>
                  <li class="ht1"><img class="lazyload" src="/images/loading.gif" data-src="/images/ht1.png"/></li>
                  <li class="ht2"><img class="lazyload" src="/images/loading.gif" data-src="/images/ht2.png"/></li>
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
            if(strpos($image[0], 'muabanhay.com') !== false) {
                $img5 = $image[0];
            }
            else
            {
               $img = str_replace("detail","fullsize",$image[0]);
               $nameimg = explode("/",$img);
               $nameimg = $nameimg[count($nameimg) - 1];
               $img5 = str_replace("..","",gethumbnail($img,$nameimg,$rowa['new_create_time'],180,180,85));
            }
            ?>
            <div class="item_r check_error_img_<?=$rowa['new_id']?>">
               <div class="left_r">
                  <a href="<?= rewriteNews($rowa['new_id'],$rowa['new_title']) ?>" title="<?= $rowa['new_title'] ?>">
                      <img class="lazyload" src="/images/loading.gif" data-src="<?= $img5  ?>" onerror='this.onerror=null;this.src="/images/noimage.webp";' data-img="<?= $image[0] ?>" alt="<?= $rowa['new_title'] ?>" class="back_out_img_<?=$rowa['new_id']?>"/>
                     <?if($rowa['new_authen'] == 1){?>
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
               if($sq == "")
               {
                  echo generatePageBar2('',$page,$curentPage,$count,rewrite_page($catid,$catname,$citid,$citname,$usc_canhan,$usc_name,$s_tit),'?','','jp-current','preview','‹','next','›','first','«','last','»');   
               }
               else
               {
                  echo generatePageBar2('',$page,$curentPage,$count,rewrite_page($catid,$catname,$citid,$citname,$usc_canhan,$usc_name,$s_tit).$sq,'&','','jp-current','preview','‹','next','›','first','«','last','»');
               }
               ?>
               </div>
            </div>
         </div>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
   </div>
</div>
</section>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
<script src="/js/dangky.js?v=1"></script>
<script src="/js/lazysizes.min.js"></script>
<script>
    $(document).ready(function(){
        $(".loc_sp").click(function(){
            $(".main_filter").toggle();
        });
    });
</script>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>