<?
session_start();
include("config.php");
$pack = getValue("pack","int","POST",0);
$pack = (int)$pack;
$newid = getValue("edit","int","GET",0);
$newid = (int)$newid;
if($newid != 0){
    $db_edit    = new db_query("SELECT * FROM new LEFT JOIN new_description ON new.new_id = new_description.new_id WHERE new.new_id = ".$newid);
    $row_edit = mysql_fetch_assoc($db_edit->result);
}

include("../classes/resize-class.php");
$check = getValue("postok","str","POST","");
if(isset($_COOKIE['UID']))
{
$idauthor = $_COOKIE['UID'];
}
else
{
    redirect("/");
}
$db_new    = new db_query("SELECT * FROM user WHERE usc_id = ".$idauthor);
$new_row = mysql_fetch_assoc($db_new->result);
if($check != '')
{
   $title = getValue("Title","str","POST","");
   $title = replaceMQ(trim($title));
   $price = getValue("Price","str","POST","0");
   if($price != '')
   {
      $price = str_replace(".","",$price);
   }
   $catid = getValue("cate_id","int","POST",0);
   $catid = (int)$catid;
 
   $city = getValue("new_city","int","POST",0);
   $city = (int)$city;
   
   $buy_sell = getValue("check_mua","int","POST",0);
   $buy_sell = (int)$buy_sell;

   $new_old = getValue("check_new","int","POST",0);
   $new_old = (int)$new_old;

   $unit = getValue("unit","str","POST","");
   $unit = replaceMQ(trim($unit));
   
   $delete_img = getValue("delete_img","str","POST","");
   $delete_img = replaceMQ(trim($delete_img));
   
   $fname = getValue("fname","str","POST","");
   $fname = replaceMQ(trim($fname));
   if($fname == ""){
     $fname = $new_row['usc_name'];
   }
   $emai = getValue("emai","str","POST","");
   $emai = replaceMQ(trim($emai));
   if($emai == ""){
     $emai = $new_row['usc_email'];
   }
   
   $add = getValue("add","str","POST","");
   $add = replaceMQ(trim($add));
   if($add == ""){
     $add = $new_row['usc_address'];
   }

   $phone = getValue("Phone","str","POST",0);
   $phone = (int)$phone;
   if($phone == 0){
      $phone =  $new_row['usc_phone'];
   }
   
   $desc = getValue("Description","str","POST","");
   $desc = trim($desc);
   $desc = removeLink($desc);
   $desc = replaceMQ($desc);
   
   $createtime = time();
   
   $img1 = explode(';',$row_edit['new_image']);
   if($delete_img != ""){
        $img2 = explode(';',$delete_img);
        foreach ($img2 as $key => $value) {
            $i = array_search($value, $img1);
            unlink("..".$value);
            unlink("..".str_replace("detail","fullsize",$value));
            unset($img1[$i],$i);
        }
    }
   $img = implode(";",$img1);
   if(isset($_SESSION['data_img']))
   {
      if($_SESSION['data_img'] != ""){
            if($img == ""){
                $img = $_SESSION['data_img'];
            }else{
                $img = $img.";".$_SESSION['data_img']; 
            }
      }
   }
   if($title != '' && $catid != 0 && $desc != '')
   { 
      $edit_new = new db_execute("UPDATE new SET new_title = '".$title."',new_money = '".$price."',new_image ='".$img."',new_cate_id= '".$catid."',new_city ='".$city."',new_user_id ='".$idauthor."',new_buy_sell = '".$buy_sell."',new_new_old = '".$new_old."',new_unit = '".$unit."',new_name ='".$fname."',new_email ='".$emai."',new_address = '".$add."',new_phone = '".$phone."' WHERE new_id = ".$newid."");

      $db_ex5 = new db_execute("UPDATE new_description SET new_description  = '".$desc."' WHERE new_id = ".$newid."");
       
      redirect('/home/info_lichsu_tinrao.php');  

   }
}
    if(isset($_SESSION['data_img'])){
        unset($_SESSION['data_img']);
    }
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
?>
<!DOCTYPE html>
<html>
<head><title>Rao v???t|Rao v???t mi???n ph??|M???ng x?? h???i rao v???t l???n nh???t Vi???t Nam</title>
  <meta name="keywords" content="rao v???t, rao v???t mi???n ph??, rao vat, rao vat mien phi"/>
  <meta name="description" content="M???ng x?? h???i rao v???t, rao v???t mi???n ph?? tr??n m???i l??nh v???c. C???p nh???t h??ng ng??n tin t???c rao v???t m???i ng??y t???i Raonhanh365.vn"/>
  <meta property="og:title" content="Rao v???t|Rao v???t mi???n ph??|M???ng x?? h???i rao v???t l???n nh???t Vi???t Nam"/>
  <meta property="og:description" content="M???ng x?? h???i rao v???t, rao v???t mi???n ph?? tr??n m???i l??nh v???c. C???p nh???t h??ng ng??n tin t???c rao v???t m???i ng??y t???i Raonhanh365.vn"/>
  <meta property="og:url" content="http://raonhanh365.vn/"/>
  <meta name="language" content="vietnamese"/>
  <meta name="copyright" content="Copyright ?? 2017 by raonhanh365.vn"/>
  <meta name="abstract" content="raonhanh365.vn M???ng x?? h???i mua b??n rao v???t l???n nh???t Vi???t Nam<"/>
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
  <meta name="page-topic" content="Mua b??n rao v???t"/>
  <meta name="resource-type" content="Document"/>
  <meta name="distribution" content="Global"/>
  <link rel="canonical" href="http://raonhanh365.vn"/>
  <link rel="stylesheet" href="/fonts/font-awesome.min.css?v=1">
  <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css?v=1"/>
   <link rel="stylesheet" href="../css/side_bar_nam.css?v=1">
   <link rel="stylesheet" href="/css/import_product.css?v=2">
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="/js/jquery-3.2.1.min.js">????NG TIN S???N PH???M</script>
  <script type="text/javascript" src="/js/jquery-ui.js"></script>
   <script src="/ckeditor/ckeditor.js"></script>
   <script src="/js/floatingcarousel.min.js" charset="utf-8"></script>
   <script src="/js/jqcloud.min.js"></script>
   <script src="/js/common.js"></script>
   <script src="/js/info.js"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
</head>
 <body>
   <div class="header">
       <?php include("../includes/common/inc_header.php");
            if(empty($row4['usc_id'])){
               redirect("/");
            }else{
                if(empty($newid)){
                   redirect("/"); 
                }
                if($row_edit['new_user_id'] != $row4['usc_id']){
                    redirect("/");
                }
            }
       ?>
       <div class="clear"></div>
   </div>
   <div class="short_url breadcrumb">
     <div class="container">
       <ul>
         <li><a href="/" title="Trang ch???">Trang ch???</a> &#155;</li>
         <li><a title="Ch???nh s???a tin ????ng">Ch???nh s???a tin ????ng</a></li>
       </ul>
     </div>
   </div>
   <div class="main_cate">
   <div class="container">
     <div class="side_bar col-3">
        <?php include("../includes/info/inc_left_info.php") ?>
        <div class="">
          <div class="box_uutien">
             <h2>TIN ???????C ??U TI??N</h2>
             <div class="main_uutien">
                <div class="item_qt">
                   <div class="img_qt"><img src="/images/demo1.png" alt="#"/><span>???? ch???ng th???c</span></div>
                   <div class="cate_qt">
                      <a href="#" title="#">B???t ?????ng s???n</a>
                      <span>1000 views</span>
                   </div>
                   <h3><a href="#" title="#">S??? h???u ng??i nh?? ?????c bi???t v???i
    v??? tr?? view s??ng g???n bi???n v??
    ki???n tr??c c???.</a></h3>
                   <i class="time_qt">????ng c??ch ????y 10 ph??t</i>
                   <p class="price_qt">$ 9.400.000.000 ??</p>
                   <div class="lh_qt">
                      <a href="#" class="address_qt">?????A CH???</a>
                      <a href="#" class="phone_qt">G???I ??I???N</a>
                   </div>
                </div>
             </div>
          </div>
        </div>
     </div>
     <div class="content col-9">
       <div class="ct_title">
         <p id="abc">CH???NH S???A TIN RAO V???T</p>
       </div>
       <div class="clear"></div>
       <form method="POST" id="upload_form">
            <input type="file" name="images[]" class="hidden" id="img_select" multiple accept="image/x-png,image/gif,image/jpeg">
       </form>
       <form method="POST" action="/home/dang_tin_rao_vat_edit.php?edit=<?=$newid?>" onsubmit="return checkpostdt();" enctype="multipart/form-data" class="div_dangtin">
         <div class="">
             <div class="box1">
               <div class="box1_1">
                   <div class="image_brow">
                       <p>Upload ???nh s???n ph???m</p>
                       <!-- <input type="button" name="product_img" value="UPLOAD ???NH" class="upload_btn"> -->
                       <a target="_blank" id="upload_btn"><span><img src="../images/upload.png" alt=""></span><pre>   </pre>UPLOAD ???NH</a>
                       <div class="file-chooser">
                           <input type="file" id="upload_image" name="listimg[]" value="" class="hidden fileupload file-chooser__input" accept = "image/gif,image/jpg,image/jpeg,image/jpe,image/png"  >
                       </div>
                       <div class="clear"></div>
                       <p>L??u ?? k??ch th?????c ???nh tr??n <span>300x300 px</span>,dung l?????ng t???i ??a <span>2MB</span> v?? ??u??i m??? r???ng l??:<span>gif,jpg,jpe,jpeg,png</span></p>

                   </div>
                   <input type="text" name="delete_img" class="hidden delete_img" value="">
                   <div class="image_list">
                       <li class="pickma">
<!--                        <div class="upload-item working-upload-item upload">    
                        </div>-->
                        <div class="file-uploader__message-area"> </div>
                        <div class="file-list"></div>
                       </li>
                       <?
                            $img = explode(';',$row_edit['new_image']);
                            $i=0;
                            foreach ($img as $key => $value) {?>
                           <div class="imgdiv">
                               <img src="<?=$value?>" alt=""> 
                               <span class="removal-button removal-button_2"></span>
                           </div> 
                        <? $i++;}
                            if($i < 6){
                            for($j =1;$j< 6-$i ; $j++){?>  
                               <img src="" alt="" class="product_img"> 
                            <? }}
                        ?>
                       <img src="" alt="" class="product_img" id="product_img6">
                   </div>
               </div>
               </div>
               <div class="box1_2">
                 <div class="category_select">
                     <div>
                         <input value="<?=$row_edit['new_cate_id']?>" name="cate_id" class="input_cate_id hidden">
                         <a target="_blank" id="menu_btn"><span><img src="../images/menu_icon.png" alt=""></span><div class="chon_danhmuc">CHON DANH M???C</div></a>
                     </div>
                     
                     <div class="popup_cate hidden">
                         <div class="popup_post_cate">
                             <h1>L???A CH???N DANH M???C</h1>
                             <i class="fa fa-times close_popup"></i>
                             <div style="width: 100%;background-color: #fff;float: left;">
                                 <div class="popup_left">
                                    <ul>
                                     <?
                                     $db_cate = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 ORDER BY cat_id ASC");
                                        While($row_cate = mysql_fetch_assoc($db_cate->result)){?>
                                        <li class="cate_bt" cat_id="<?=$row_cate['cat_id']?>" value="<?=$row_cate['cat_id']?>">
                                            <span class="icon_cate_<?=$row_cate['cat_id']?>"><?=$row_cate['cat_name']?></span>
                                            <i class="fa fa-chevron-right">
                                                
                                            </i>
                                        </li>
                                      <?
                                        }
                                        
                                      ?>
                                    </ul>
                                 </div>
                                 <div  class="popup_right">
                                     <div class="hidden" id="pick_cate"><span id="pick_cate_span"></span></div>
                                     <div class="load_cate"></div>
                                 </div>
                                 <?
                                 unset($db_cate,$row_cate);
                                 ?>
                             </div>
                         </div>
                     </div>
                     
                     <div class="tree_menu">
                        <ul id="sitemap" class="">
                            <li>
                                <img src="../images/collapsed.png" alt="" class="collapsed_menu" status = "hidden">
                                <?
                                   $db_cate2 = new db_query("SELECT cat_id,cat_name,cat_parent_id FROM category WHERE cat_id = ".$row_edit['new_cate_id']);
                                   $row_cate2 = mysql_fetch_assoc($db_cate2->result);
                                   if($row_cate2['cat_parent_id'] != 0){
                                      $db_cate3 = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_id = ".$row_cate2['cat_parent_id']);
                                      $row_cate3 = mysql_fetch_assoc($db_cate3->result); 
                                   }
                                ?>
                                <a class="show_test_cate_0"><?=($row_cate2['cat_parent_id']==0)?$row_cate2['cat_name']:$row_cate3['cat_name'];?></a>
                                <ul class="show_text_cate <?=($row_cate2['cat_parent_id'] == 0)?'hidden':''?>">
                                    <li><img src="../images/line1.png" alt="" class = "line_tree">
                                        <img src="../images/collapsed.png" alt=""  class="collapsed_menu" >
                                        <a class="collapsed_menu" id="" status = "hidden"><?=($row_cate2['cat_parent_id'] != 0)?$row_cate2['cat_name']:''?></a>
                                    </li>
                                </ul>
                            </li>
                   	</ul>
                     </div>
                 </div>
                 <div class="dif_info">
                     <table>
                       <tr>
                         <td><p>Khu v???c rao v???t:</p></td>
                         <td colspan="2">
                             <select class="address" id="new_city" name="new_city">
                                <option value="0">To??n qu???c</option>
                                  <?
                                  foreach($arrcity as $item=>$type)
                                  {
                                      if($type['cit_id'] == $row_edit['new_city']){ ?>
                                          <option value="<?= $type['cit_id'] ?>" selected="selected" ><?= $type['cit_name'] ?></option>        
                                  <?  }else{
                                  ?>
                                          <option value="<?= $type['cit_id'] ?>"><?= $type['cit_name'] ?></option>
                                  <?
                                  }}
                                  ?>
                             </select>
                         </td>

                       </tr>
                       <tr>
                         <td><p>H??nh th???c:</p></td>
                         <td>
                           <div class="bot_box check_cb">
                               <label><input type="radio" name="check_mua" value="1" <? if($row_edit['new_buy_sell'] == 1){echo 'checked';}?>/><div class="control__indicator"></div>C???n mua</label>
                           </div>
                         </td>
                         <td>
                           <div class="bot_box check_cb">
                               <label><input type="radio" name="check_mua" value="2" <? if($row_edit['new_buy_sell'] == 2){echo 'checked';}else{echo "checked";}?>/><div class="control__indicator"></div>C???n b??n</label>
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td><p>H??nh th???c:</p></td>
                         <td>
                           <div class="bot_box check_cb">
                               <label><input type="radio" name="check_new" value="1" <?if($row_edit['new_new_old'] == 1){echo 'checked';}?>/><div class="control__indicator"></div>S???n ph???m m???i</label>
                           </div>
                         </td>
                         <td>
                           <div class="bot_box check_cb">
                               <label><input type="radio" name="check_new" value="2" <? if($row_edit['new_new_old'] == 2){echo 'checked';}else{echo "checked";}?>/><div class="control__indicator"></div>S???n ph???m ???? s??? d???ng</label>
                           </div>
                         </td>
                       </tr>
                       <tr>
                         <td><p>H??nh th???c:</p></td>
                         <td>
                           <div class="bot_box check_cb">
                               <label><input type="radio" class="click_check_gia" name="check_gia" value="1" <?=($row_edit['new_money'] != 0)?'checked':''?>/><div class="control__indicator"></div>Nh???p gi?? s???n ph???m</label>
                           </div>
                         </td>
                         <td>
                           <div class="bot_box check_cb">
                               <label><input type="radio" class="click_check_gia" name="check_gia" value="2" <?=($row_edit['new_money'] == 0)?'checked':''?>/><div class="control__indicator"></div>Gi?? li??n h???</label>
                           </div>
                         </td>
                       </tr>
                       <tr id="tr_Price">
                         <td><p>Gi?? s???n ph???m:</p></td>
                         <td colspan="2">
                             <input type="text" name="Price" <?=($row_edit['new_money'] == 0)?'disabled':''?> value="<?=($row_edit['new_money'] == 0)?'Li??n h???':number_format($row_edit['new_money'],'0',',','.');?>" id="Price" onkeyup="keyprice(this)" class="numbersOnly check_gia_1">
                             <input type="text" name="Price" <?=($row_edit['new_money'] != 0)?'disabled':''?> value="0" onkeyup="keyprice(this)" class="numbersOnly check_gia_2 hidden">
                           <span class="dv">VND</span>
                           <span>/</span>
                           <input type="text" name="unit" value="<?= $row_edit['new_unit'];?>" placeholder="????n v???...">
                         </td>
                       </tr>

                     </table>
                     <div style="margin-top: 10px;width: 100%;text-align: center;height: 40px">
                         <div class="div_error"></div>   
                     </div>
                 </div>
               </div>
               <div class="clear">

               </div>
             </div>
             <div class="box2">
                 <div class="title_sell_box">
                   <table>
                     <tr>
                       <td><p>Ti??u ????? rao v???t:</p></td>
                       <td><input type="text"  class="title_sell" onkeydown="keytitle(this)" id="Title" maxlength="100" name="Title" type="text" value="<?=$row_edit['new_title'];?>"></td>
<!--                       <td><span class="chon_goi_vip">CH???N G??I ????NG TIN</span></td>-->
                     </tr>
                     <tr>
                       <td></td>
                       <td><p>Ti??u ????? rao v???t ph???i nhi???u h??n <span>10 k?? t???</span>,nhi???u nh???t<span>100 k?? t???</span>,kh??ng ch???a <span>t??n mi???n</span> v?? <span>s??? ??i???n tho???i</span></p></td>
                     </tr>
                   </table>
                 </div>
                 <div class="content_sell">
                   <p>N???i dung tin rao v???t:</p>
                   <textarea id="editor1" maxlength="2000" name="Description" rows="10" cols="80">
                        <?= $row_edit['new_description']?>
                   </textarea>
                 </div>
                 <div class="contact_detail">
                   <h4>Th??ng tin li??n h???:</h4>
                   <h5><input type="checkbox" class="check_box_user" value="1">S??? d???ng th??ng tin ????ng k?? t??i kho???n ????? ????ng tin:</h5>
                   <div class="contact_box">
                       <div class="contact_info" id="thongtin_moi">
                         <table >
                           <tr>
                             <td><p>T??n li??n h???:</p></td>
                             <td><input type="text" name="fname" class="new_thongtin" value="<?=$row_edit['new_name']?>"></td>
                           </tr>
                           <tr>
                             <td><p>Email li??n h???:</p></td>
                             <td><input type="text"  name="emai" class="new_thongtin" value="<?=$row_edit['new_email']?>"></td>
                           </tr>
                           <tr>
                             <td><p>S??? ??i???n tho???i:</p></td>
                             <td><input type="text"  name="Phone" class="new_thongtin" value="<?=$row_edit['new_phone']?>"></td>
                           </tr>
                           <tr>
                             <td><p>?????a ch???:</p></td>
                             <td><input type="text"  name="add" class="new_thongtin" value="<?=$row_edit['new_address']?>"></td>
                           </tr>
                         </table>
                       </div>
                       <div class="user_info active" id="tongtin_cu">
                         <table>
                           <tr>
                             <td><p>T??n li??n h???:</p></td>
                             <td><input type="text" name="fname" disabled="true" value="<?=$row4['usc_name']?>"></td>
                           </tr>
                           <tr>
                             <td><p>Email li??n h???:</p></td>
                             <td><input type="text" name="emai" disabled="true" value="<?=$row4['usc_email']?>"></td>
                           </tr>
                           <tr>
                             <td><p>S??? ??i???n tho???i:</p></td>
                             <td><input type="text" name="phone" disabled="true" value="<?=$row4['usc_phone']?>"></td>
                           </tr>
                           <tr>
                             <td><p>?????a ch???:</p></td>
                             <td><input type="text" name="add" disabled="true" value="<?=$row4['usc_address']?>"></td>
                           </tr>
                         </table>
                       </div>

                   </div>
                   <div class="Post_product">
                     
                    <div class="dangtin_submit">
                         <div style="float: left;width: 400px">
                            <div id='xacnhan'><p>M?? x??c nh???n:</p></div>
                            <div id="div_captcha" style="float: left;position: relative;" >
                                <input type="text" class="bnmxn" id="captcha_new" name="captcha" maxlength="5"/>
                               <p class="captcha" style="width: 94px;">
                                <img class="" src="../classes/securitycode.php"/>
                               <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon" style="right: -7px;top: 7px;"></p>
                              </p>
                            </div>
                             
                         </div>
                         <a target="_blank"  onclick="checkpostdt();" id="upload_product_btn"><span><img src="../images/up_icon.png" alt=""/></span>????NG TIN</a>
                         <input type="submit" value="????NG TIN" id="postok" name="postok" style="display: none;">
                     </div>


                   </div>
                 </div>

             </div>
                            
           </form>
       
         </div>
       <? include("../includes/home/inc_tag.php") ?>
     </div>
     </div>  
     <div class="">
        <?php include("../includes/common/inc_footer.php") ?>
     </div>

 </body>
</html>
<script>
   $(".qltrv .dtrv").addClass("open_menu");
   $(".qltrv").addClass("selected");
   $(".qltrv a:first").addClass("menu-a");
   
    $('.removal-button_2').on('click', function(e){
       e.preventDefault();

       //remove the corresponding hidden input
       $('.hidden-inputs input[data-uploadid="'+ $(this).data('uploadid') +'"]').remove(); 
       //remove the name from file-list that corresponds to the button clicked
       var scr = $(this).prev().attr("src");
       var img = $(".delete_img").val();
       if(img == ''){
           img = scr;
           $(".delete_img").val(img);
       }else{
           img = (img + ';' + scr);
           $(".delete_img").val(img);
       }
       
       $(this).parent().hide("puff").delay(10).queue(function(){
           $(this).remove();
           
       });

       //if the list is now empty, change the text back 
//       if($('.file-list div').length === 0) {
//         $('.file-uploader__message-area').text(options.MessageAreaText || settings.MessageAreaText);
//       }
    });

    
</script>
<script src="/js/sua_tin.js?v=2" type="text/javascript"></script>
<script src="/js/lazysizes.min.js"></script>
<!--<script src="/js/upload_img_new.js" type="text/javascript"></script>-->
<script src="/js/ajax_upload_anh_sp.js" type="text/javascript"></script>