<? include("config.php");

if(isset($_COOKIE["UID"]) && !empty($_COOKIE['UID']))
{
  //Cập nhật lại số lần làm mới sản phẩm
  $time_now = strtotime(date('H:i',time()));
  $sl = new db_query("SELECT max(new_update_time) FROM new WHERE new_user_id = ".$_COOKIE['UID']);
  $row_ud = mysql_fetch_assoc($sl->result);
  // $time_udpate = date('d',$row_ud['max(new_update_time)']);
  $time_back = strtotime("+4 hours",strtotime(date("H:i",$row_ud['max(new_update_time)'])));

  if(abs(date('d',time()) - date('d',$row_ud['max(new_update_time)'])) > 1)
  {
    $_SESSION['flag'] = 1;
    $update = new db_query("UPDATE new SET new_count_refresh = 0 WHERE new_user_id = ".$_COOKIE['UID']);
  }
  else if(abs(date('d',time()) - date('d',$row_ud['max(new_update_time)'])) > 0)
  {
    $_SESSION['flag'] = 1;
    $update = new db_query("UPDATE new SET new_count_refresh = 0 WHERE new_user_id = ".$_COOKIE['UID']);
  }
  if($time_now >= $time_back)
  {
    //Cập nhật
    $update = new db_query("UPDATE new SET new_count_refresh = 0 WHERE new_user_id = ".$_COOKIE['UID']);

    unset($update);
  }
  unset($time_now,$sl,$row_ud,$time_udpate);
}

$gia  = getValue('gia','int','GET','0');
$gia  = intval(@$gia);

$new  = getValue('new','int','GET','0');
$new  = intval(@$new);

$new_old = getValue('new_old','int','GET','0');
$new_old  = intval(@$new_old);

if($new_old > 0){
    $newold = "AND new_new_old = ".$new_old;
} else {
    $newold = ' ';
}

$new_view  = getValue('view','int','GET','0');
$new_view  = intval(@$new_view);

$danh_muc  = getValue('danh-muc','int','GET','0');
$danh_muc = intval(@$danh_muc);
if($danh_muc > 0){
    $danhmuc = "AND new_cate_id = ".$danh_muc;
}else{
    $danhmuc = ' ';
}

if($gia == 1){
    $search = "new_money ASC";
}else if($gia == 2){
    $search = "new_money DESC";
}else if($new == 1){
     $search = "new_id DESC";
}else if($new == 2){
     $search = "new_id ASC";
}else if($new_view == 1){
    $search = "new_view_count DESC";
}else if($new_view == 2){
    $search = "new_view_count ASC";
}

?>
<!DOCTYPE html>
<html>
<head><title>Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam</title>
   <meta name="keywords" content="rao vặt, rao vặt miễn phí, rao vat, rao vat mien phi"/>
   <meta name="description" content="Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn"/>
   <meta property="og:title" content="Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam"/>
   <meta property="og:description" content="Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn"/>
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

    <!--    -----tvt them  01/06--->
    <link rel="preload" href="/css/style.min.css?v=<?=$version?>" as="style">
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <!--------------->

   <link rel="canonical" href="http://raonhanh365.vn"/>
   <link rel="stylesheet" type="text/css" href="/css/detail-slider.css"/>
   <link href="/css/import_product.css" rel="stylesheet" type="text/css"/>
   <link rel="stylesheet" href="/fonts/font-awesome.min.css">
   <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<!--   <script src="../js/jquery-1.8.3.min.js" type="text/javascript"></script>-->
   <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
   <script src="/js/info.js" type="text/javascript"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
   <style>
       .open_delete{
            width: 100%!important;
            height: 100%!important;
            position: fixed!important;
            top: 0!important;
            left: 0!important;
            display: none!important;
            z-index: 1!important;
            background: rgba(1,1,1,0.2)!important;
       }
       .active{
           display: block!important;
       }
   </style>
</head>
<body>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01"/>
</div>
<? include("../includes/common/inc_header.php") ?>
<section>
<? include("../includes/info/inc_bread_crumb.php") ?>
<div class="main_cate">
    <div class="container">
      <? if($row4['usc_type'] == 5){
          include("../includes/info/inc_left_info_doanhnghiep.php");
      }else{
          include("../includes/info/inc_left_info.php");
      }
       if($login == 1)
      {
          $curentPage =10; 
          $page  = getValue('page','int','GET',1);
          $page  = intval(@$page);
          if($page == 0)
          {
            $page = 1;
          }
          $pageab = abs($page - 1);
     
            $start = $pageab * $curentPage;
            $start = intval(@$start);
            $start = abs($start); 

         if($gia >0 || $new > 0 || $new_view >0){
            $db_qrlist = new db_query("SELECT new_image,new_id,new_title,new_update_time,new_view_count,
            new_active,new_type,cat_name,new_money,new_count_refresh FROM new LEFT JOIN user ON new_user_id = user.usc_id 
                                    LEFT JOIN category ON new.new_cate_id = category.cat_id
                                    WHERE new_active = 1 AND new_user_id = ".$userid." " .$danhmuc." ".$newold." ORDER BY ".$search." LIMIT ".$start.",".$curentPage);
              $numrow = new db_query("SELECT count(1) FROM new LEFT JOIN user ON new_user_id = user.usc_id 
                                    LEFT JOIN category ON new.new_cate_id = category.cat_id
                                    WHERE new_active = 1 AND new_user_id = ".$userid." " .$danhmuc." ".$newold." ORDER BY ".$search);
              
         }else{
            $db_qrlist = new db_query("SELECT new_image,new_id,new_title,new_update_time,new_view_count,
            new_active,new_type,cat_name,new_money,new_count_refresh FROM new LEFT JOIN user ON new_user_id = user.usc_id 
                                    LEFT JOIN category ON new.new_cate_id = category.cat_id
                                    WHERE new_active = 1 AND new_user_id = ".$userid." " .$danhmuc." ".$newold." ORDER BY new_id DESC LIMIT ".$start.",".$curentPage);
              $numrow = new db_query ("SELECT count(1) FROM new LEFT JOIN user ON new_user_id = user.usc_id 
                                    LEFT JOIN category ON new.new_cate_id = category.cat_id
                                    WHERE new_active = 1 AND new_user_id = ".$userid." " .$danhmuc." ".$newold." ORDER BY new_id DESC");                     
         }
         $count = mysql_fetch_assoc($numrow->result);
         $count = $count['count(1)'];
      ?>
      <div class="detail-main">
         <h1>
             <?
                if($row4['usc_type']==5){
                    echo "QUẢN LÝ SẢN PHẨM";
               } else {
                   ECHO "QUẢN LÝ TIN RAO VẶT";
               }
             ?>
            
         </h1>
         <div class="top_rv check_cb">
            <span>SX theo giá</span>
            <div class="ic_dola">
                <select id="slmoney">
                    <option value="0">Không sắp xếp</option>
                    <option value="1" <?=($gia==1)?"selected=selected":'';?>>Từ thấp - cao</option>
                    <option value="2" <?=($gia==2)?"selected=selected":'';?>>Từ cao - thấp</option>
                </select>
            </div>
            <span>SX theo danh mục</span>
            <div class="ic_bds">
                <select class="category">
                    <option value="0">Chọn danh mục</option>
                        <?
                        $db_qr = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 ORDER BY cat_id ASC");
                        While($row = mysql_fetch_assoc($db_qr->result))
                        {
                        ?>
                        <option  value="<?= $row['cat_id'] ?>"<?if($row['cat_id'] == $danh_muc){echo "selected='selected'";}?> ><?= $row['cat_name'] ?></option>
                        <?
                        $db_qrs = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = ".$row['cat_id']." ORDER BY cat_id ASC");
                        While($rows = mysql_fetch_assoc($db_qrs->result))
                        {
                        ?>
                        <option value="<?= $rows['cat_id'] ?>" <?if($rows['cat_id'] == $danh_muc){echo "selected='selected'";}?>>--- <?= $rows['cat_name'] ?></option>
                        <?
                        }
                        unset($db_qrs,$rows);
                        }
                        unset($db_qr,$row);
                        ?>
                </select>
            </div>
            <span>SX thời gian đăng</span>
            <div id="gn">
                <select class="new_id_new">
                    <option value="0">Không sắp xếp</option>
                    <option value="1" <?=($new==1)?"selected=selected":'';?>>Gần nhất</option>
                    <option value="2" <?=($new==2)?"selected=selected":'';?>>Cũ nhất</option>
                </select></div>
            <div class="div_lsp">
                <span class="pd-l">Loại sản phẩm</span>
                <label>
                    <input type="checkbox" class="new_new" name="new_new_old" <?=($new_old==1)?"checked":""?> value="1"/><div class="control__indicator"></div>SP mới
                </label>
                <label>
                    <input type="checkbox" class="new_old" name="new_new_old" <?=($new_old==2)?"checked":""?> value="2"/><div class="control__indicator"></div>SP đã sử dụng
                </label>
            </div>
            <span>SX theo lượt view</span>
            <div class="ic_nn">
                <select class="new_view">
                    <option value="0">Không sắp xếp</option>
                    <option value="1" <?=($new_view==1)?"selected=selected":'';?>>Nhiều nhất</option>
                    <option value="2" <?=($new_view==2)?"selected=selected":'';?>>Ít nhất</option>
                </select>
            </div>
         </div>
         <div class="main_lich_su main_rv" style="margin-top: 0;">
            <div class="header_ls">
               <span class="td1"><input type="checkbox" id="checkbox_all"/></span>
               <span class="td2">Ảnh</span>
               <span class="td3">Nội dung tin rao vặt</span>
               <span class="td4">Danh mục</span>
               <span class="td5">Giá sản phẩm</span>
               <span class="td6">Thao tác</span>
            </div> 
            <div class="main_ls">
                <?
                   While($rowlist = mysql_fetch_assoc($db_qrlist->result))
                    {
                    $icon = explode(";",$rowlist["new_image"]);   
//                    $db_titke  = new db_query("SELECT cat_name FROM category WHERE cat_id = ".$rowlist['new_cate_id'] ); 
//                    $row_title = mysql_fetch_assoc($db_titke->result);
                 ?>
               <div class="iteam_ls">
                  <span class="td1"><input type="checkbox" name="check_delete[]" value="<?=$rowlist['new_id'] ?>" class="checkbox_all"/></span>
                  <span class="td2"><img class="lazyload" src="/images/loading.gif" onerror="this.onerror=null;this.src='/images/no_avatar.png';" data-src="<?= $icon[0] ?>" alt="<?= $rowlist['new_title'] ?>" /></span>
                  <span class="td3">
                     <a href="<?= rewriteNews($rowlist['new_id'],$rowlist['new_title']) ?>" title="<?= $rowlist['new_title'] ?>">
                         <?= $rowlist['new_title'] ?>
                     </a>
                     <i>Thời gian đăng: <?= date("H:i",$rowlist['new_update_time'])?> - <?=date('d/m/Y',$rowlist['new_update_time'])?></i><span class="views"><?=$rowlist['new_view_count']?> views</span>
                     <?if($rowlist['new_active'] == 1)
                         {
                            if($rowlist['new_type']==1){
                                echo "<p class='tin_mienphi'>Tin miễn phí</p>";
                            }else if($rowlist['new_type']==2){
                                echo "<p class='tin_vip1'>Tin vip 1</p>";
                            }else if($rowlist['new_type']==3){
                                echo "<p class='tin_vip2'>Tin vip 2</p>";
                            }else if($rowlist['new_type']==4){
                                echo "<p class='tin_vip3'>Tin vip 3</p>";
                            }
                         }else{
                             echo "<p class='tin_hethan'>Tin đã hết hạn</p>";
                             
                         }?>
                  </span>
                  <span class="td4">
                      <a href="#" title="<?= $rowlist['cat_name']?>">
                          <?echo $rowlist['cat_name'];
                                unset($db_titke,$row_title);
                           ?>  
                      </a>
                  </span>
                  <span class="td5"><?=($rowlist['new_money'] == 0)?'Liên hệ':(number_format($rowlist['new_money'],'0',',','.'). ' đ')?></span>
                  <span class="td6">
                      <!-- <div class="div_xoa_tin">
                          <span class="icon_xoa"></span>
                          <span class="xoa_tin" delete_id="<?=$rowlist['new_id']?>">Xóa</span>
                      </div> -->
                      <div class="div_sua_tin">
                          <span class="icon_sua"></span>
                          <span class="sua_tin" edit_id="<?=$rowlist['new_id']?>"><a href="/chinh-sua/<?=replaceTitle($rowlist['new_title'])?>-<?=($row4['usc_type']==5)?'g':'s';?><?=$rowlist['new_id']?>.html">Sửa</a></span>
                      </div>
                      <div class="div_nang_cap div_lam_moi">
                          <span class="icon_lammoi"></span>
                          <span class="t_lam_moi" new_type="<?=$rowlist['new_type']?>" new_id='<?=$rowlist['new_id']?>'>Đẩy Sp</span>
                      </div>
                      <?
                        if($rowlist['new_type'] !=2){
                      ?>
                      <div class="div_nang_cap">
                          <span class="icon_nangcap"></span>
                          <span class="nang_cap" new_type="<?=$rowlist['new_type']?>" new_id='<?=$rowlist['new_id']?>'>Nâng cấp tin</span>
                      </div>
                      <?
                        }
                      ?>
                  </span>  
               </div>
                
                <?
                }}
                ?>
            </div>
            <!-- <div class="open_delete div_nang_cap">
                <div class="popup_delete">
                    <span>BẠN CÓ ĐỒNG Ý XÓA</span>
                    <i class="fa fa-times close_btn"></i>
                    <div class="clear"></div>
                    <div class="popup_dangtin_main">
                        <div class="delete_ok" >CHẤP NHẬN</div>
                        <div class="btn_thoat">HỦY</div>  
                    </div>
                </div>         
            </div> -->
            <!--nang cap tu tin mien phi-->
            <? include ("../includes/info/nang_cap_tin.php");?> 
            <!--end-->
         </div>
         
            <div class="pagination_wrap clr lich_su_page">
               <div class="clr">
                      <?
                      $url_link = "?danh-muc=".$danh_muc."&new_old=".$new_old."&";
                      if($gia > 0){
                          $url_link = "?gia=".$gia."&danh-muc=".$danh_muc."&new_old=".$new_old."&";
                      }else if($new >0){
                          $url_link = "?new=".$new."&danh-muc=".$danh_muc."&new_old=".$new_old."&";
                      }else if($new_view >0){
                          $url_link = "?view=".$new_view."&danh-muc=".$danh_muc."&new_old=".$new_old."&";
                      }
                        echo generatePageBar('',$page,$curentPage,$count," ",$url_link,'','jp-current','preview','<','next','>','first','Đầu','last','Cuối');
                      ?>
               </div>
               
<!--               <div class="btn_xuat">
                  <span class="truyvan">Truy vấn</span>
                  <span class="xuatexcel">Xuất file Excel</span>
               </div>-->
            </div>
      </div>    
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script src="/js/lazysizes.min.js"></script>
<script type="text/javascript">
    $(document).ready(function (){
//        check all
        $('#checkbox_all').click(function(){
            if($(this).prop("checked") == true){
                $('.checkbox_all').prop('checked',true);
            }
            else if($(this).prop("checked") == false){
                $('.checkbox_all').prop('checked',false);
            }
        });
//        check all
        $('.new_new').click(function(){
            if($(this).prop("checked") == true){
                $('.new_old').prop('checked',false)
            }
        });
        $('.new_old').click(function(){
            if($(this).prop("checked") == true){
                $('.new_new').prop('checked',false);
            }
        });

    });
    
     $(".lammoi").click(function (){
         var newid = $(this).attr("data_id");

         // if($(this).hasClass('refresh') == false){
            $.ajax({
              type:'POST',
              url: '../ajax/check_refresh.php',
              data: {newid: newid},
              success:function(data){
                if(data == 0)
                {
                  $(".thongbao_lammoi").addClass("active");
                  $(".btn_lammoi").attr("data_id",newid);
                  $('.popup_dangtin_main h3 span').html('ĐẨY SẢN PHẨM (MIỄN PHÍ)');
                }
                else
                {
                  alert('Đã có sản phẩm được làm mới, lần làm mới tiếp theo của bạn vào lúc '+data+"'");
                }
              }
            }); 
         // }
         // else
         // {
         //  $.ajax({
         //    type:"POST",
         //    url: "../ajax/get_time_refresh.php",
         //    data: {newid: newid},
         //    success:function(data){
         //      alert(data);
         //    }
         //   });
         // }
     });
     
     $('.btn_lammoi').click(function (){
        var newid = $(this).attr("data_id");
        var letters = $('input[name="check_delete[]"]:checked').map(function(){
          return this.value;
        }).get();
        $(".thongbao_lammoi").removeClass("active");
        $.ajax({
            type:"POST",
            url:"../ajax/new_refresh.php",
            data:{
                'check_all': letters,
                'newid': newid
                },
            success:function(data){
                if(data ==1){
//                    $(".thongbao_thanhcong").addClass("active");
//                        $(".thongbao_thanhcong h3").html("<span>LÀM MỚI THÀNH CÔNG</span"); 
//                            setTimeout(function(){
//                                $(".thongbao_thanhcong").removeClass("active");
//                                location.reload();
//                            }, 2000);
                        location.reload();
                }else{
                    $(".thongbao_lammoi_thatbai").addClass("active");
                }
            }
        });
    });
    
    $('.xoa_tin').click(function (){
       var delete_id = $(this).attr("delete_id");
       $(".delete_ok").attr('delete_id',delete_id);
       $(".open_delete").addClass('active'); 
    });
    $(".close_btn").click(function (){
       $('.open_delete').removeClass("active");
       $(".div_nangcap").removeClass("active");
    });
    $(".btn_thoat").click(function (){
       $(".div_nangcap").removeClass("active");
       $(".open_delete").removeClass("active");
    });
    $(".delete_close").click(function (){
       $('.open_delete').removeClass("active");
    });
    $(".delete_ok").click(function (){
        $('.open_delete').removeClass("active");
        var newid = $(this).attr("delete_id");
        if(newid != '')
            {
               $.ajax({
                  url: "/ajax/new_delete.php",
                  type: "POST",
                  data: {
                  'newid': newid
                  },
                  success: function(data){
                    location.reload();
                  }
               });
            }
    });
    
    $(".sua_tin").click(function (){
        var edit_id = $(this).attr("edit_id");
        $(".new_edit").val(edit_id);
        $(".new_edit").click();
    });
   $(".nang_cap").click(function (){
       var new_id = $(this).attr("new_id");
       var new_type = $(this).attr("new_type");
       if(new_type == 1){
          $(".nangcap_mienphi").addClass("active");
          $(".div_nangcap").attr("new_id",new_id);
       }else if(new_type == 4){
          $(".nangcap_tinvip3").addClass("active");
          $(".div_nangcap").attr("new_id",new_id);
       }
       else if(new_type == 3){
          $(".nangcap_tinvip2").addClass("active"); 
          $(".div_nangcap").attr("new_id",new_id);
       } 
   });
   
    $(".pick_vip").click(function (){
        var a = $(this).attr("chon_vip");
        var new_id = $(".div_nangcap").attr("new_id");
        var c = $(this).attr("pri_price"); 
        var id = $(this).attr("usc_id");
        $.ajax({
              url: "../ajax/nang_cap_tin_ajax.php",
              type: "POST",
              data: {
              'price': c,
              'usc_id':id,
              'usc_type':a,
              'new_id':new_id
              },
              success: function(data){
                 if(data == 0){
                     $(".thongbao_thatbai").addClass("active");
                 }
                 else if(data > 0){
                    $(".thongbao_thanhcong").addClass("active");
                    $(".thongbao_thanhcong h3").html("<span>TÀI KHOẢN CỦA BẠN VỪA BỊ TRỪ: "+data+" Đ</span"); 
                        setTimeout(function(){
                            $(".thongbao_thanhcong").removeClass("active");
                            location.reload();
                        }, 2000);
                 }  

              }
           });

        $(".div_nangcap").removeClass("active");
     });
    
    
   $(".qltrv .dstdd").addClass("open_menu");
   $(".qltrv").addClass("selected");
   $(".qltrv a:first").addClass("menu-a");
   
//   select
   //        check  tìm kiếm mới hoặc cũ

//        check  tìm kiếm mới hoặc cũ
   var d = '';
   if($(".new_new").prop("checked") == true){
       d = $(".new_new").val();
   }else if($(".new_old").prop("checked") == true){
       d = $(".new_old").val();
   }
   var b = $(".category").val();
   $("#slmoney").change(function() { 
       var a = $(this).val();
        window.location.replace('?gia='+a+'&danh-muc='+b+'&new_old='+d);
    });
   $(".new_id_new").change(function() {
       var a = $(this).val();
        window.location.replace('?new='+a+'&danh-muc='+b+'&new_old='+d);
    });
   $(".new_view").change(function() {
       var a = $(this).val();
        window.location.replace('?view='+a+'&danh-muc='+b+'&new_old='+d);
    });
   $(".category").change(function() {
       var a = $(this).val();
        window.location.replace('?danh-muc='+a+'&new_old='+d);
    });
   $(".new_new").click(function (){
      var c = '';
      if($(".new_new").prop("checked") == true){
       c = $(this).val();
      }
      window.location.replace('?danh-muc='+b+"&new_old="+c);
   });
   $(".new_old").click(function (){
       var c = '';
     if($(".new_old").prop("checked") == true){
       c = $(this).val();
     }
      window.location.replace('?danh-muc='+b+"&new_old="+c);
   });
    // ---------------------------
    $('.t_lam_moi').click(function () {
        var new_id = $(this).attr("new_id");
        $('.lam_moi').addClass('active');
        $(".lam_moi").attr("new_id",new_id);
    });
    $(".activeRefresh").click(function (){
        let data = [];
        var checked = false;
        $('.checkboxRefresh').each(function () {
            if($(this).is(':checked')){
                checked = true;
            }
        });
        if(checked == false){
            alert('Bạn chưa đánh dấu vào lựa chọn cần làm mới');
            return false;
        }
        if(confirm('Bạn chắc chắn muốn kích hoạt lựa chọn này')){
            var refreshHome = 0;
            var refreshCate = 0;
            var refreshCity = 0;
            var refreshCateCity = 0;
            var refreshFree = 0;
            if($('.refreshHome').is(':checked')){
                refreshHome = $('.refreshHome').val();
            }
            if($('.refreshCate').is(':checked')){
                refreshCate = $('.refreshCate').val();
            }
            if($('.refreshCity').is(':checked')){
                refreshCity = $('.refreshCity').val();
            }
            if($('.refreshCateCity').is(':checked')){
                refreshCateCity = $('.refreshCateCity').val();
            }
            if($('.refreshFree').is(':checked')){
                refreshFree = $('.refreshFree').val();
            }
            var id = $(this).attr("usc_id");
            var new_id = $('.lam_moi').attr("new_id");
            console.log(refreshHome, refreshCate, refreshCity, refreshCateCity);
            $.ajax({
                url: "../ajax/ajaxRefreshNew.php",
                type: "POST",
                dataType: "json",
                async: false,
                data: {
                    id: id,
                    new_id: new_id,
                    refreshHome: refreshHome,
                    refreshCate:refreshCate,
                    refreshCity:refreshCity,
                    refreshCateCity:refreshCateCity,
                    refreshFree:refreshFree,
                },
                success: function(data){
                    console.log(data);
                    if(data.result == false){
                        if(data.type == 2){
                            $(".refreshFail").addClass("active");
                        }else if(data.type == 5){
                            alert(data.message);
                        }
                    }else if(data.result == true){
                        if(data.type == 4){
                            setTimeout(function(){
                                $(".refreshSuccess").removeClass("active");
                                location.reload();
                            }, 2000);
                        }else{
                            $(".refreshSuccess").addClass("active");
                            $(".refreshSuccess h3").html("<span>TÀI KHOẢN CỦA BẠN VỪA BỊ TRỪ: "+data.price+" Đ</span>");
                            setTimeout(function(){
                                $(".refreshSuccess").removeClass("active");
                                location.reload();
                            }, 2000);
                        }

                    }

                }
            });

            $(".lam_moi").removeClass("active");
        }
    });
    $('input.refreshFree').click(function () {
        if($(this).is(':checked')){
            console.log('ssss');
            $('.refreshHome,.refreshCate,.refreshCity,.refreshCateCity').attr('disabled','disabled');
        }else{

            console.log('aaaaa');
            $('.refreshHome,.refreshCate,.refreshCity,.refreshCateCity').removeAttr('disabled');
        }
    });
    // -----------------------------
    
</script>