<? 
include("config.php");
$uscid = getValue("uscid","int","GET",0);
$uscid = (int)$uscid;
if($uscid == 0)
{
    redirect("/");
} 
$db_qrusc = new db_query("SELECT usc_id,usc_store_name,usc_type,usc_logo,usc_time,usc_money,usc_count_comment,usc_store_phone,usc_anhbia FROM user WHERE usc_id = ".$uscid." LIMIT 1");
$rowusc = mysql_fetch_assoc($db_qrusc->result);
$urlusc = "https://raonhanh365.vn/gian-hang/".$rowusc['usc_id']."/".replaceTitle($rowusc['usc_store_name']).".html";
//ảnh gian hàng
if($rowusc['usc_anhbia'] != ''){
    $anhBia = $rowusc['usc_anhbia'];
}else{
    $qr_new = new db_query("SELECT new_image FROM new WHERE new_user_id = '$uscid' ORDER BY new_id LIMIT 1");
    if(mysql_num_rows($qr_new->result) > 0){
        $row_new = mysql_fetch_assoc($qr_new->result);
        if($row_new['new_image'] != ''){
            $arrImageNew =  explode(';',$row_new['new_image']);
            $anhBia = $arrImageNew[0];
        }else{
            $anhBia = '/images/banner_gh.webp';
        }

    }else{
        $anhBia = '/images/banner_gh.webp';
    }
}
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
$title = $rowusc['usc_store_name']." - Gian hàng mua bán ".$rowusc['usc_store_name'];
$keyword = "rao vặt ".$rowusc['usc_store_name'].",mua bán, gian hàng ".$rowusc['usc_store_name'].", rao vặt miễn phí, mua bán ".$rowusc['usc_store_name'].", shop ".$rowusc['usc_store_name'].", raonhanh365";
$description = "Shop Rao vặt ".$rowusc['usc_store_name']." là kênh mua bán của ".$rowusc['usc_store_name']." cũng là gian hàng uy tín chất lượng trên Raonhanh365. ".$rowusc['usc_store_name']." có tới hàng trăm sản phẩm rao vặt nổi bật trên thị trường Việt. Tham gia rao vặt miễn phí cùng mua bán với ".$rowusc['usc_store_name']." trên Raonhanh365.vn để thỏa mãn mọi nhu cầu mua sắm của mọi người.";
$canonical = $urlusc;
$url_image = "/";
?>
<!DOCTYPE html>
<html>
<head>
    <!--link meta seo-->
    <?php include "../includes/common/inc_header_link.php"?>
   <script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>
   <script async src="/js/upanh_bia.js" type="text/javascript"></script>
 <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
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
         <li><a>Gian hàng</a> &#155;</li>
         <li><a><?=$rowusc['usc_store_name']?></a></li>
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
                    <h4>TÀI KHOẢN DOANH NGHIỆP</h4>
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
       </div>
      </div>
      <div class="right_tt">
         <div class="banner_gh">
            <form id="frmIssue" method="post" action="" enctype="multipart/form-data">
                <img id="image-preview" class="lazyload" src = 'loading.gif' data-src="<?=$anhBia?>" alt="#"  height="330" width="866"/>
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
            <h2>CÁC SẢN PHẨM NỔI BẬT</h2>
            <div class="main_qt">
                <?
               $db_qritem = new db_query("SELECT new_image,new_id,new_title,cat_id,cat_name,new_view_count,new_create_time,new_money FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_authen = 1 AND new_user_id = '".$uscid."' ORDER BY new_view_count DESC LIMIT 4");
               While($item = mysql_fetch_assoc($db_qritem->result))
               {
               $image = explode(";",$item['new_image']);
               ?>
               <div class="item_qt">
                  <div class="item_qt_left">
                        <div class="img_qt">
                            <a href="<?= rewriteNews($item['new_id'],$item['new_title'])?>" title="<?= $item['new_title'] ?>"><img class="lazyload" src = 'loading.gif' data-src="<?= $image[0] ?>" alt="<?= $item['new_title'] ?>"><span>Đã chứng thực</span></a>
                        </div>
                        <div class="cate_qt">
                           <a href="<?= rewrite_cate($item['cat_id'],$item['cat_name']) ?>" title="<?= $item['cat_name'] ?>"><?= $item['cat_name'] ?></a>
                           <span><?= $item['new_view_count'] ?> views</span>
                        </div>
                  </div>
                  <div class="item_qt_right">
                        <h3><a href="<?= rewriteNews($item['new_id'],$item['new_title']) ?>" title="<?= $item['new_title'] ?>"><?= $item['new_title'] ?></a></h3>
                        <i class="time_qt">Đăng cách đây <?= time_elapsed_string($item['new_create_time']) ?></i>
                        <p class="price_qt">$ <?= format_number($item['new_money']) ?> đ</p>
                  </div>
               </div>
               <?
               unset($image);
               }
               ?>

            </div>
         </div>
        <?
        $db_qrc = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 ORDER BY cat_id ASC");
        While($rowc = mysql_fetch_assoc($db_qrc->result))
        {
            $db_qr5 = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id WHERE new_user_id='".$uscid."' AND new_cate_id = ".$rowc['cat_id']." AND new_active = 1 OR new_user_id='".$uscid."' AND cat_parent_id =".$rowc['cat_id']." AND new_active = 1 ORDER BY new_update_time DESC LIMIT 8");
            $db_count = mysql_num_rows($db_qr5->result);
            if($db_count >0){
        ?> 
         <div class="sp_cate">
            <h2><?=$rowc['cat_name']?><a href="/gian-hang/<?=replaceTitle($rowc['cat_name'])."-cua-".replaceTitle($rowusc['usc_store_name'])."-d".$rowusc['usc_id']."-n".$rowc['cat_id'].'.html'?>" title="<?=$rowc['cat_name']?>">Xem tất cả <i>&#155;&#155;</i></a></h2>
            <div class="main_qt brd">
                <?
                 While($row5 = mysql_fetch_assoc($db_qr5->result))        
                 {
                  $image = explode(";",$row5['new_image']);
                ?>
               <div class="item_qt">
                   <div class="item_qt_left">
                        <div class="img_qt">
                            <a href="<?= rewriteNews($row5['new_id'],$row5['new_title']) ?>" title="<?= $row5['new_title'] ?>"><img class="lazyload" src = 'loading.gif' data-src="<?= $image[0] ?>" alt="<?= $row5['new_title'] ?>"></a>
                        </div>
                        <div class="cate_qt">
                           <a href="#" title="<?=$rowc['cat_name']?>"><?=$rowc['cat_name']?></a>
                           <span><?= $row5['new_view_count'] ?> views</span>
                        </div>
                   </div>
                   <div class="item_qt_right">
                        <h3><a title="<?= $row5['new_title'] ?>" href="<?= rewriteNews($row5['new_id'],$row5['new_title']) ?>"><?=cut_string($row5['new_title'],40,'...')?></a>
                        </h3>
                        <i class="time_qt">Đăng cách đây <?= time_elapsed_string($row5['new_create_time']) ?></i>
                        <p class="price_qt">$ <?= format_number($row5['new_money']) ?> đ</p>
                   </div>
               </div>
               <?
                unset($image);  
                 }
                 unset($db_qr5,$row5);
               ?>

            </div>
         </div>
         <?
            }
            }
            unset($db_qrc,$rowc);
            
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
<!--<script async src="/js/jquery-1.8.3.min.js"></script>-->
<script defer src="/js/dangky.js?v=1"></script>
<script>
        // $("#gianhang-dt-sodt").click(function (){
        //     $(".dt-sodt_1").addClass("hidden");
        //     $("#gianhang-dt-sodt a").addClass("hidden");
        //     $(".dt-sodt_2").removeClass("hidden");
        // });
        
        $(".change_banner").click(function (){
            $(".media-upload #file").click();
        });
        // $("#gianhang-bd-1").click(function (){
        //     var id = $(this).attr("data_user_id");
        //     $(".thongbao_diachi").removeClass("hidden");
        //     $.post("/ajax/load_diachi.php",{usc_id:id},function(data) {
        //          $(".popup_diachi_main").html(data);
        //     });
        // });
        $(".close_btn").cpopup_diachilick(function() {
            $(".thongbao_diachi").addClass("hidden");
        });
        $(".").click(function (e){
            e.stopPropagation();
        });
        $(".thongbao_diachi").click(function(){
            $(".thongbao_diachi").addClass("hidden");
        });
</script>
<!--  <script defer src="/js/map.js" type="text/javascript"></script>-->