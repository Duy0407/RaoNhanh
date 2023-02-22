<? 
include("config.php");
$uscid = getValue("uscid","int","GET",0);
$uscid = (int)$uscid;

$catid = getValue("catid","int","GET",0);
$catid = (int)$catid;

if($uscid == 0)
{
    redirect("/");
} 
$db_qrusc = new db_query("SELECT * FROM user WHERE usc_id = ".$uscid." LIMIT 1");
$rowusc = mysql_fetch_assoc($db_qrusc->result);
$db_qrcate1 = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_id = ".$catid);
$row_cate1 = mysql_fetch_assoc($db_qrcate1->result);
$urlusc = "https://raonhanh365.vn/gian-hang/".replaceTitle($row_cate1['cat_name'])."-cua-".replaceTitle($rowusc['usc_store_name'])."-d".$rowusc['usc_id']."-n".$row_cate1['cat_id'].".html";
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
?>
<!DOCTYPE html>
<html>
<head>
   <title>Shop <?= $rowusc['usc_name'] ?> rao vặt <?= $row_cate1['cat_name'] ?></title>
   <meta name="keywords" content="gian hàng <?= $rowusc['usc_name'] ?>, Shop <?= $rowusc['usc_name'] ?>, rao vặt <?= $row_cate1['cat_name'] ?>, mua bán <?= $row_cate1['cat_name'] ?>"/>
   <meta name="description" content="Rao vặt <?= $row_cate1['cat_name'] ?> là danh mục trên kênh mua bán của <?= $rowusc['usc_name'] ?> với nhiều sản phẩm uy tín chất lượng. Hãy cùng <?= $rowusc['usc_name'] ?> đăng ký tham gia rao vặt miễn phí của Raonhanh365.vn , Cùng <?= $rowusc['usc_name'] ?> khám phá rao vặt <?= $row_cate1['cat_name'] ?> chắc chắn sẽ có nhiều điều thú vị làm bạn hài lòng"/>
   <meta property="og:title" content="Shop <?= $rowusc['usc_name'] ?> rao vặt <?= $row_cate1['cat_name'] ?>"/>
   <meta property="og:description" content="Rao vặt <?= $row_cate1['cat_name'] ?> là danh mục trên kênh mua bán của <?= $rowusc['usc_name'] ?> với nhiều sản phẩm uy tín chất lượng. Hãy cùng <?= $rowusc['usc_name'] ?> đăng ký tham gia rao vặt miễn phí của Raonhanh365.vn , Cùng <?= $rowusc['usc_name'] ?> khám phá rao vặt <?= $row_cate1['cat_name'] ?> chắc chắn sẽ có nhiều điều thú vị làm bạn hài lòng"/>
   <meta property="og:url" content="<?= $urlusc ?>"/>
   <meta name="language" content="vietnamese"/>
   <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
   <meta name="abstract" content="Shop <?= $rowusc['usc_name'] ?> rao vặt <?= $row_cate1['cat_name'] ?><"/>
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
   <link rel="canonical" href="<?= $urlusc ?>"/>
   <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<!--   <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
   <script type="text/javascript" src="/js/jquery-ui.js"></script>
   <script src="/js/upanh_bia.js" type="text/javascript"></script>
 <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
 <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-4118232040315071",
          enable_page_level_ads: true
     });
</script>
   <style>
       .hidden{
           display: none;
       }
       .btn-default{
           color: #f26222;
           border: 1px solid #f26222!important;
           border-radius: 3px;
           background-color: #fff;
           font-size: 15px;
           line-height: 34px;
           padding: 0 10px;
           cursor: pointer;
           position: absolute;
           top: 13px;
           right: 180px;
           font-family: Roboto,sans-serif;
       }
       .btn-default:hover{
           color: #fff;
           background-color: #f26222;
       }
   </style>
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
         <li><a href="#" title="#">Gian hàng</a> &#155;</li>
         <li><a href="#" title="#"><?=$rowusc['usc_store_name']?></a></li>
      </ul>
   </div>
</div>
<div class="main_cate">
   <div class="container">
      <div class="left_tt">
         <div class="filter-left-main">
            <div id="filter-left-main-gianhang" class="<?=($rowusc['usc_type']==5)?"tk_doanhnghiep":"tk_canhan"?>"  style="margin-top: 0;">
            <div id="gianhang-top">
                <?if($rowusc['usc_type']==5){?>
                    <a href="<?= rewrite_home_dn($rowusc['usc_id'],$rowusc['usc_store_name']) ?> " title="Gian hang <?= $rowusc['usc_store_name'] ?>"><h4>TÀI KHOẢN DOANH NGHIỆP</h4></a>
                <?}?>
<!--                <img src="/images/detail-left-main-logo-toquoc.png" id="to-quoc"/>
                <h3>GIAN HÀNG ĐẢM BẢO</h3>-->
            </div>
            <div id="gianhang-main">
                <div id="gianhang-tk">
                    <img src="<?=($rowusc['usc_logo']!= "")?str_replace('../pictures', '/pictures', $rowusc['usc_logo']):"/images/detai-avata.png"?>" id="avata"/>
                    <div id="gianhang-tk-1">
                      <span><?=$rowusc['usc_store_name']?></span>
                      <i>Ngày tham gia:<?=date('d/m/Y',$rowusc['usc_time']);?></i>
                        <?
                        if(!empty($row4['usc_id'])){
                            if($row4['usc_id'] == $uscid){?>
                                <p>Tài khoản:<a href=""> <?= format_number($rowusc['usc_money'])?> tcoin</a></p>     
                            <?
                            }
                        }
                        ?>
                      
                    </div>
                </div>
                <div class="box_like_gh">
                    <?
                      $db_view = new db_query("SELECT SUM(new_like) FROM new WHERE new_user_id = ".$uscid);
                      $row_view = mysql_fetch_assoc($db_view->result);
                      
                      $db_stars = new db_query("SELECT COUNT(eva_id),SUM(eva_stars) FROM new LEFT JOIN evaluate ON new.new_id = evaluate.new_id WHERE eva_stars <> '' AND new_user_id = ".$uscid);
                      $row_stars = mysql_fetch_assoc($db_stars->result);
                      if($row_stars['COUNT(eva_id)']==0){
                                    $dat_sta =1;
                                }else{
                                    $dat_sta = $row_stars['COUNT(eva_id)'];
                        }
                    ?>
                  <span class="sp1"><img src="/images/gh1.png" /></span>
                  <span class="sp2"><b>Số lượt like:</b><i><?=$row_view['SUM(new_like)'];unset($db_view,$row_view);?></i></span>
                  <span class="sp1"><img src="/images/gh2.png" /></span>
                  <span class="sp2"><b>Số lượt bình luận:</b><i><?=$rowusc['usc_count_comment'];?></i></span>
                  <span class="sp1"><img src="/images/gh3.png" /></span>
                  <span class="sp2"><b>Đánh giá:</b><i><?=round(($row_stars['SUM(eva_stars)']/$dat_sta),1)?>/5(<?=$row_stars['COUNT(eva_id)'];unset($db_stars,$row_stars);?> Đánh giá)</i></span>
                </div>
                <div class="button_chitiet">
                <?
                if(!empty($row4['usc_id']) && $row4['usc_id'] == $uscid){}else{
                   
                   ?>
                <div id="gianhang-dt">
                    <div id="gianhang-logo-dt">
                        <img src="/images/detai-left-dt.png"/>
                    </div>
                    <div id="gianhang-dt-sodt">
                      <h2 class="dt-sodt_1">094444xxxx</h2>
                      <a class=""><span><i>Click để hiện thị số điện thoại</i></span></a>
                      <h2 class="dt-sodt_2 hidden" style="line-height: 43px;"><?=$rowusc['usc_store_phone']?></h2>
                    </div>
                </div>
<!--                <div id="gianhang-chat">
                    <div id="gianhang-logo-chat">
                        <img src="/images/detail-logo-chat.png"/>
                    </div>
                    <div id="gianhang-chat-1">
                        <a href="#"><h2>Chát với người bán</h2></a>
                    </div>
                </div>-->
                <div id="gianhang-bd">
                    <div id="gianhang-logo-bd">
                        <img src="/images/detai-logo-bd.png"/>
                    </div>
                    
                </div>
                <div id="gianhang-bd-1" data_user_id="<?=$rowusc['usc_id']?>">
                        <a><h2>XEM BẢN ĐỒ</h2></a>
                </div>
                <div class="thongbao_diachi hidden">
                    <div class="popup_diachi">
                        <span>ĐỊA CHỈ</span>
                        <i class="fa fa-times close_btn"></i>
                        <div class="clear"></div>
                        <div class="popup_diachi_main"> 
                            
                        </div>
                    </div>  
                 </div>
                <?  } unset($db_map,$row_map) ?>
                </div>
                
               </div>
           </div>
           
             
           <div class="cate_gh">
               <h3>Danh mục sản phẩm</h3>
               <div class="main_cate_gh">
                  <div class="box_cate">
                     <?
                        $db_dm_dn = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 ORDER BY cat_id ASC");
                        While($row_dm_dn = mysql_fetch_assoc($db_dm_dn->result))
                        {
                     ?>
                        <h4><a href="/gian-hang/<?=replaceTitle($row_dm_dn['cat_name'])."-cua-".replaceTitle($rowusc['usc_store_name'])."-d".$rowusc['usc_id']."-n".$row_dm_dn['cat_id'].'.html'?>" title="<?=$row_dm_dn['cat_name']?>"><?=$row_dm_dn['cat_name']?></a></h4>
                     <?
                        }
                        unset($db_dm_dn,$row_dm_dn);
                     ?>
                  </div>
               </div>
           </div>
           <? include("../includes/detail/inc_qc.php") ?>
       </div>
      </div>
      <div class="right_tt">
         <div class="banner_gh">
            <form id="frmIssue" method="post" action="" enctype="multipart/form-data">
                <img id="image-preview" src="<?=($rowusc['usc_anhbia']!= '')?$rowusc['usc_anhbia']:"/images/banner_gh.png"?>" alt="#"  height="330" width="866"/>
            <?
                if(!empty($row4['usc_id'])){
                   if($row4['usc_id'] == $uscid){ ?>
            <span class="change_banner">Thay đổi ảnh bìa<img src="/images/ic_camera.png" alt="#" /></span>
            
            <?  } } ?>
                <div class="media-upload">
                    <div class="form-group">
                         <input class="form-control hidden" type="file" name="file" id="file"  accept="image/*"/>
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="action" value="upload" />
                        <input class="btn btn-default hidden" type="submit" id="submit" value="Lưu thay đổi" />
                    </div>
                </div>
            </form>
         </div>
         <div>
         <div class="sp_cate">
             <div class="top_r">
                 <h1><?=$row_cate1['cat_name']?></h1>
             </div>
            <?
            $page  = getValue('page','int','GET',1,2);
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
            
            $db_qr5 = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_user_id='".$uscid."' AND new_cate_id = ".$catid." OR new_active = 1 AND new_user_id='".$uscid."' AND cat_parent_id =".$catid." ORDER BY new_update_time DESC LIMIT ".$start.",".$curentPage);
            $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_active = 1 AND new_user_id='".$uscid."' AND new_cate_id = ".$catid." OR new_active = 1 AND new_user_id='".$uscid."' AND cat_parent_id =".$catid);
            $count = mysql_fetch_assoc($numrow->result);
            $count = $count['count(1)'];
             While($rowa = mysql_fetch_assoc($db_qr5->result))        
             {
              $image = explode(";",$rowa['new_image']);
            ?>
            <div class="item_r">
               <div class="left_r">
                  <a href="<?= rewriteNews($rowa['new_id'],$rowa['new_title']) ?>" title="<?= $rowa['new_title'] ?>">
                      <img src="<?=$image[0] ?>" alt="<?= $rowa['new_title'] ?>" class="back_out_img_<?=$rowa['new_id']?>" onerror="myFunction(<?=$rowa['new_id']?>)"/>
                     <?if($rowa['new_authen'] == 1){?>
                     <span>Đã chứng thực</span>
                     <?}?>
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
                  <div class="add_post"><?=($rowa['new_address'] != "")?($rowa['new_address'] != ""):"Chưa cập nhập" ?></div>
                  <div class="name_post">Người đăng: <i><?= $rowa['new_name'] ?></i><span class="tim_do"></span></div>
               </div>
            </div>
            <?
            unset($image);
            }
            ?>
         </div>
             <div class="pagination_wrap">
               <div class="clr">
                   <?= generatePageBar2('',$page,$curentPage,$count,"",'?','','jp-current','preview','‹','next','›','first','«','last','»'); ?>
               </div>
            </div>
         
         <?
          
          
            
        if(!empty($row4['usc_id'])){
           if($row4['usc_id'] == $uscid){ ?>  
<!--         <div class="btn_edhome">
             <a href="#" class="edit_config">
                 <img src="/images/ic_edit.png" alt="#" />Chỉnh sửa hiển thị trang chủ
             </a>
         </div>-->
        <?  } } ?>
        </div>
      </div>
      
      <? include("../includes/home/inc_tag.php") ?>
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script src="/js/lazysizes.min.js"></script>
<script src="/js/jquery-1.8.3.min.js"></script>
<script src="/js/dangky.js?v=1"></script>
<script>
        $("#gianhang-dt-sodt").click(function (){
            $(".dt-sodt_1").addClass("hidden");
            $("#gianhang-dt-sodt a").addClass("hidden");
            $(".dt-sodt_2").removeClass("hidden");
        });
        
        $(".change_banner").click(function (){
            $(".media-upload #file").click();
        });
        $("#gianhang-bd-1").click(function (){
            var id = $(this).attr("data_user_id");
            $(".thongbao_diachi").removeClass("hidden");
            $.post("/ajax/load_diachi.php",{usc_id:id},function(data) {
                 $(".popup_diachi_main").html(data);
            });
        });
        $(".close_btn").click(function() {
            $(".thongbao_diachi").addClass("hidden");
        });
        $(".popup_diachi").click(function (e){
            e.stopPropagation();
        });
        $(".thongbao_diachi").click(function(){
            $(".thongbao_diachi").addClass("hidden");
        });
</script>
  <!--<script src="/js/map.js" type="text/javascript"></script>-->