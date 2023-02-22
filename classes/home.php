<? include("config.php"); ?>
<!DOCTYPE html>
<html lang="vi">
<head><title>Chợ Mua bán, quảng cáo, rao vặt miễn phí toàn quốc 365</title>
   <meta name="keywords" content="Mua bán, rao vặt, quảng cáo, miễn phí, 24h, rao nhanh 365, mua hàng trực tuyến, raonhanh365.vn, mua ban, quang cao, rao vat, mien phi, uy tín"/>
   <meta name="description" content="Chợ mua bán đồ cũ giá cực rẻ với các gian hàng quảng cáo cùng hàng ngàn các tin rao vặt miễn phí được cập nhật liên tục 24h tại rao nhanh 365"/>
   <meta property="og:title" content="Chợ Mua bán, quảng cáo, rao vặt miễn phí toàn quốc 365"/>
   <meta property="og:description" content="Chợ mua bán đồ cũ giá cực rẻ với các gian hàng quảng cáo cùng hàng ngàn các tin rao vặt miễn phí được cập nhật liên tục 24h tại rao nhanh 365"/>
   <meta property="og:url" content="https://raonhanh365.vn/"/>
   <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
   <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<"/>
   <meta name="author" itemprop="author" content="raonhanh365.vn"/>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
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
   <link rel="canonical" href="https://raonhanh365.vn"/>
   <link rel="stylesheet" type="text/css" href="/css/style.css"/>
   <script src="/js/jquery-1.8.3.min.js"></script>
</head>
<body>
<? include("../includes/common/inc_header.php") ?>
<section>
   <div class="banner">
      <h1>Chợ mua bán rao vặt lớn nhất Việt Nam</h1>
      <h2>Hệ thống mua bán tìm kiếm dựa trên 1.540.788 bản tin rao vặt đã được xác minh</h2>
   </div>
   <div class="menu_qt">
      <h3>DANH MỤC SẢN PHẨM ĐANG ĐƯỢC QUAN TÂM</h3>
      <ul>
         <?
         $db_qrc = new db_query("SELECT * FROM category WHERE cat_parent_id = 0 AND cat_img2 <> '' LIMIT 7");
         While($rowc = mysql_fetch_assoc($db_qrc->result))
         {
         ?>
         <li>
            <a href="<?= rewrite_cate($rowc['cat_id'],$rowc['cat_name']) ?>" title="<?= $rowc['cat_name'] ?>">
              <img src="<?= $rowc['cat_img2'] ?>"/>
              <span><?= $rowc['cat_name'] ?></span>
            </a>
        </li>
         <?  
         }
         unset($db_qrc,$rowc);
         ?>
      </ul>
      <i class="bg_menu"></i>
   </div>
   <div class="pro_qt">
      <div class="container">
         <div class="box_left">
            <h3>SẢN PHẨM ĐANG ĐƯỢC QUAN TÂM</h3>
            <div class="main_qt">
               <?
               $db_qritem = new db_query("SELECT * FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id LEFT JOIN user ON new.new_user_id = user.usc_id LEFT JOIN map ON new.new_user_id = map.usc_id WHERE new_authen = 1 AND new_type IN (2,3,4) ORDER BY new_type ASC,new_update_time DESC LIMIT 4");
               While($item = mysql_fetch_assoc($db_qritem->result))
               {
               $image = explode(";",$item['new_image']);
               ?>
               <div class="item_qt">
                  <div class="img_qt">
                     <a href="<?= rewriteNews($item['new_id'],$item['new_title']) ?>" title="<?= $item['new_title'] ?>">
                        <img src="<?= $image[0] ?>" alt="<?= $item['new_title'] ?>" /><span>Đã chứng thực</span>
                     </a>
                  </div>
                  <div class="cate_qt">
                     <a href="<?= rewrite_cate($item['cat_id'],$item['cat_name']) ?>" title="<?= $item['cat_name'] ?>"><?= $item['cat_name'] ?></a>
                     <span><?= $item['new_view_count'] ?> views</span>
                  </div>
                  <h4><a href="<?= rewriteNews($item['new_id'],$item['new_title']) ?>" title="<?= $item['new_title'] ?>"><?= $item['new_title'] ?></a></h4>
                  <i class="time_qt">Đăng cách đây <?= time_elapsed_string($item['new_create_time']) ?></i>
                  <p class="price_qt">$ <?= format_number($item['new_money']) ?> đ</p>
                  <div class="lh_qt">
                     <a class="address_qt" data_id_user="<?=$item['new_id']?>">ĐỊA CHỈ</a>
                     <a class="phone_qt" phon_qt='<?=$item['new_id']?>'>GỌI ĐIỆN</a>
                     <div class="div_show_phone hidden div_phone_<?=$item['new_id']?>">
                         <p>SỐ ĐIỆN THOẠI GIAN HÀNG</p>
                         <span>
                             <?
                                if($item['usc_store_phone'] != 0){
                                    echo (substr($item['usc_store_phone'],0,1)!= 0)?"0".$item['usc_store_phone']:$item['usc_store_phone'];
                                }else{
                                    echo (substr($item['usc_phone'],0,1)!= 0)?"0".$item['usc_phone']:$item['usc_phone'];
                                }
                             ?>
                         </span>
                     </div>
                  </div>
               </div>
               <?
               unset($image);
               }
               ?>
            </div>
         </div>
         <div class="thongbao_diachi hidden diachi_<?=$item['new_id']?>">
            <div class="popup_diachi">
                <span>ĐỊA CHỈ GIAN HÀNG</span>
                <i class="fa fa-times close_btn"></i>
                <div class="clear"></div>
                <div class="popup_diachi_main"> 
                      
                </div>
            </div>  
         </div>
         <div class="box_right">
            <h3>TOP CÁC GIAN HÀNG UY TÍN</h3>
            <div class="main_gh">
               <?
               $db_qrc = new db_query("SELECT * FROM user LEFT JOIN city ON user.usc_city = city.cit_id WHERE usc_type = 5 ORDER BY usc_count_comment DESC LIMIT 15");
               While($rowc = mysql_fetch_assoc($db_qrc->result))
               {
               ?>
               <div class="item_gh">
                  <a href="<?= rewrite_home_dn($rowc['usc_id'],$rowc['usc_store_name']) ?>" title="<?= $rowc['usc_store_name'] ?>" class="img_gh"><img src="<?= $rowc['usc_logo']!=''?$rowc['usc_logo']:"/images/detai-avata.png" ?>" alt="<?= $rowc['usc_store_name'] ?>" /></a>
                  <div class="right_gh">
                     <h4><a href="<?= rewrite_home_dn($rowc['usc_id'],$rowc['usc_store_name']) ?>" title="<?= $rowc['usc_store_name'] ?>"><?= $rowc['usc_store_name'] ?></a></h4>
                     <span class="location"><?= $rowc['cit_name']!=''?$rowc['cit_name']:"Chưa cập nhật" ?></span>
                     <p><?= $rowc['usc_count_comment'] ?> lượt bình chọn</p>
                  </div>
               </div>
               <?
               }
               unset($db_qrc,$rowc);
               ?>
            </div>
         </div>
      </div>
   </div>
   <div class="cate_home">
      <div class="container">
         <?
         $db_qrc = new db_query("SELECT * FROM category WHERE cat_parent_id = 0 AND cat_type <> '' ORDER BY cat_type ASC");
         While($rowc = mysql_fetch_assoc($db_qrc->result))
         {
         ?>
         <div class="item_home">
         <?
         $db_qr5 = new db_query("SELECT * FROM new WHERE new_cate_id = ".$rowc['cat_id']." AND new_type = 2 ORDER BY new_update_time DESC LIMIT 3");
         $i = 0;
         While($row5 = mysql_fetch_assoc($db_qr5->result))
         {
         $image = explode(";",$row5['new_image']);
         $i++;
         if($i == 1)
         {
         ?>
         <div class="left_h">
            <div class="img_top">
               <img src="<?= $image[0] ?>" alt="<?= $row5['new_title'] ?>" />
               <span class="cate_name"><?= $rowc['cat_name'] ?></span>
               <a href="<?= rewriteNews($row5['new_id'],$row5['new_title']) ?>" class="view_more" title="Xem chi tiết">Xem chi tiết <b>&#155;&#155;</b></a>
            </div>
            <div class="item_bot">
               <h3><a href="<?= rewriteNews($row5['new_id'],$row5['new_title']) ?>" title="<?= $row5['new_title'] ?>"><?= cut_string($row5['new_title'],50,'...') ?></a></h3>
               <span class="location_item"><?= $row5['new_address']!=''?$row5['new_address']:"Chưa cập nhật" ?></span>
               <div class="price_item"><span>$ <?= format_number($row5['new_money']) ?> đ</span><i class="tim"></i><i class="count_img"><?= count($image) ?></i></div>
            </div>
         </div>

         <div class="mid_h mid_h_mb_l">
         <?
         }
         else if($i > 1)
         {
         ?>
         <div class="tem_h">
            <a href="<?= rewriteNews($row5['new_id'],$row5['new_title']) ?>" title="<?= $row5['new_title'] ?>"><img src="<?= $image[0] ?>" alt="<?= $row5['new_title'] ?>"/></a>
            <div class="right_h2">
               <span class="loca2"><?= $row5['new_address']!=''?$row5['new_address']:"Chưa cập nhật" ?></span>
               <span class="price_2">$ <?= format_number($row5['new_money']) ?> đ</span>
               <a href="<?= rewriteNews($row5['new_id'],$row5['new_title']) ?>" title="Xem chi tiết">Xem chi tiết <b>&#155;&#155;</b></a>
               <i class="count_img2"><?= count($image) ?></i><i class="tim2"></i>
            </div>
            <h3><a title="<?= $row5['new_title'] ?>" href="<?= rewriteNews($row5['new_id'],$row5['new_title']) ?>"><?= cut_string($row5['new_title'],58,'...') ?></a></h3>
         </div>
         <?
         }
         unset($image);
         }
         unset($db_qr5,$row5,$i);
         ?>
         </div>
         <div class="bot_h">
            <?
            $db_qr6 = new db_query("SELECT * FROM category WHERE cat_parent_id = ".$rowc['cat_id']."");
            While($row6 = mysql_fetch_assoc($db_qr6->result))
            {
            ?>
            <a href="<?= rewrite_cate($row6['cat_id'],$row6['cat_name']) ?>" title="<?= $row6['cat_name'] ?>"><?= $row6['cat_name'] ?></a>
            <?
            }
            unset($db_qr6,$row6);
            ?>
         </div>
         </div>
         <?
         }
         ?>
      </div>
   </div>
   <div class="container">
      <div class="qc">
         <a><img src="/images/qc1.jpg" alt="Đăng tin mua bán rao vặt miễn phí"/></a>
         <a><img src="/images/qc2.jpg" alt="Mua bán rao vặt miễn phí toàn quốc"/></a>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
      <div class="list_new">
         <h3>Tin tức sản phẩm</h3>
         <div class="main_list_new">
            <?
            $db_qrc = new db_query("SELECT * FROM news ORDER BY new_id DESC LIMIT 4");
            While($rowc = mysql_fetch_assoc($db_qrc->result))
            {
            ?>
            <div class="item_new">
               <a href="/tin-tuc/<?= replaceTitle($rowc['new_title']) ?>-p<?= $rowc['new_id'] ?>.html" title="<?= $rowc['new_title'] ?>" class="img_new"><img src="<?= $rowc['new_picture'] == ''?"/images/df.png":"/pictures/news/".$rowc['new_picture'] ?>" alt="<?= $rowc['new_title'] ?>"/></a>
               <a href="/tin-tuc" title="Tin tức" class="cate_new">Tin tức</a>
               <h4><a href="/tin-tuc/<?= replaceTitle($rowc['new_title']) ?>-p<?= $rowc['new_id'] ?>.html" title="<?= $rowc['new_title'] ?>"><?= $rowc['new_title'] ?></a></h4>
               <p><?= cut_string(removeHTML($rowc['new_teaser']),190,'...') ?></p>
            </div>
            <?
            }
            ?>
         </div>
      </div>
   </div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script>
$(".address_qt").click(function (){
    var id = $(this).attr("data_id_user");
    $(".thongbao_diachi").removeClass("hidden");
    $.post("/ajax/load_diachi.php",{id:id},function(data) {
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
<script src="/js/map.js" type="text/javascript"></script>
<script>
    
    function slick_slider(){
//        $('.list_tag ul').reset();
        if($(window).width()  < 767){
            
           $('.list_tag ul').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll:1,
            variableWidth: true,
            autoplay:true,
            responsive: [
                {
                  breakpoint: 768,
                  settings: {
                    arrows: false,
                    slidesToShow: 9,
                    slidesToScroll:1,
                    variableWidth: true
                  }
                },
                {
                  breakpoint: 480,
                  settings: {
                    arrows: false,
                    slidesToShow: 9,
                     slidesToScroll:1
                  }
                }
              ]
          }); 
          
          
          $('.main_list_new').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll:1,
            variableWidth: true,
            autoplay:true
           
          });
          
          $('.mid_h').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll:1,
            variableWidth: true,
            autoplay:true
           
          });
          
          $('.main_qt').slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll:1,
            variableWidth: true,
            autoplay:true
           
          });
          $('.menu_qt ul').slick({
            infinite: true,
            speed: 300,
            slidesToShow: 3,
            slidesToScroll:1,
            variableWidth: true
//            autoplay:true
           
          });
        }else{
            $(".item_qt").removeClass("slick-slide");
            $(".item_qt").removeClass("slick-cloned");
            $(".item_qt").removeClass("slick-active");
            $(".item_qt").removeAttr("data-slick-index");
            $(".slick-track").removeAttr("style");
        }
    }
    
    $(document).ready(function (){
            slick_slider();
    });
    $(function(){
        $(window).resize(function() {
            slick_slider();
            

        });
    });
    
</script>