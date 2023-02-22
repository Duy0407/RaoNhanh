
<!DOCTYPE html>
<? 
session_start();
include("config.php");
$pack = getValue("pack","int","POST",0);
$pack = (int)$pack;
if($pack == 1)
{
   $price2 = 0;
}else if($pack >1){
    if($pack == 2){
        $vip = 3;
    }else if($pack == 3){
        $vip = 2;
    }else if($pack == 4){
        $vip = 1;
    }
$db_price    = new db_query("SELECT pri_price FROM price WHERE pri_id = ".$vip);
$new_price = mysql_fetch_assoc($db_price->result);
    $price2 = $new_price["pri_price"];
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
$db_new    = new db_query("SELECT usc_store_name,usc_email,usc_address,usc_store_phone FROM user WHERE usc_id = ".$idauthor);
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
   
//   $dm_id = getValue("dm_id","int","POST",0);
//   $dm_id = (int)$dm_id;
   
   $city = getValue("new_city","int","POST",0);
   $city = (int)$city;
   
   $buy_sell = getValue("check_mua","int","POST",0);
   $buy_sell = (int)$buy_sell;

   $new_old = getValue("check_new","int","POST",0);
   $new_old = (int)$new_old;

   $unit = getValue("unit","str","POST","");
   $unit = replaceMQ(trim($unit));
   
   $hashtag = getValue("hashtag","str","POST","");
   $hashtag = replaceMQ(trim($hashtag));

   $inventory = getValue("count_product","int","POST",0);
   $inventory = (int)$inventory;
   
   $post_token = getValue("token","str","POST","");
   $post_token = replaceMQ(trim($post_token));
   
   $source_product = getValue("source_product","int","POST",0);
   $source_product = (int)$source_product;
   
   $fname = $new_row['usc_store_name'];

   $emai = $new_row['usc_email'];
   
   $add = $new_row['usc_address'];

   $phone_store= $new_row['usc_store_phone'];
   
   $desc = getValue("Description","str","POST","");
   $desc = trim($desc);
   $desc = removeLink($desc);
   $desc = replaceMQ($desc);

   $createtime = time();

   if($title != '' && $catid != 0 && $desc != '' && $post_token == $_SESSION['token'])
   {  
      $query = "INSERT INTO new(new_title,new_money,new_cate_id,new_city,new_user_id,new_image,new_create_time,new_update_time,new_type,new_active,new_buy_sell,new_new_old,new_unit,new_name,new_email,new_address,new_booth_personal,new_phone,new_inventory,new_source)
                VALUES ('".$title."','".$price."','".$catid."','".$city."','".$idauthor."','".$_SESSION['data_img']."','".$createtime."','".$createtime."',".$pack.",1,'".$buy_sell."','".$new_old."','".$unit."','".$fname."','".$emai."','".$add."',2,'".$phone_store."','".$inventory."','".$source_product."')";
      $db_ex = new db_execute_return();
      $last_id = $db_ex->db_execute($query);
      $db_ex5 = new db_execute("INSERT INTO new_description(new_id,new_description,new_hsashtag) VALUES ('".$last_id."','".$desc."','".$hashtag."')");
      $urldt = "/".replaceTitle($title)."-c".$last_id.".html";
      $db_ex10 = new db_execute("UPDATE user SET usc_money = usc_money - ".$price2." WHERE usc_id = ".$idauthor."");
      if($pack > 1){
          $db_ex12 = new db_execute("UPDATE new SET new_authen  = 1 WHERE new_id = ".$last_id."");
      }?>
      
        <div class="thongbao_lammoi popup_dt_thanhcong">
            <div class="popup_delete">
                <span>ĐĂNG TIN THÀNH CÔNG</span>
                <div class="clear"></div>
                <div class="popup_dangtin_main"> 
                    <h3><span>Bạn vui lòng chọn <a>ĐĂNG TIN</a> để tiếp tục đăng tin</span><br/>
                        <span>Hoặc chọn <a>THOÁT</a> để về trang danh sách tin đã đăng</span>
                    </h3>
                    <div class="div_btn_thongbao">
                        <div class="btn_lammoi"><a href="/doanh-nghiep/dang-san-pham">ĐĂNG TIN</a></div>
                        <div class="btn_thoat"><a href="/san-pham/lich-su-tin-rao">THOÁT</a></div>
                    </div>
                </div>
            </div>
        </div>
      
   <?}
}
    $token = rand_string(20);
    $_SESSION['token'] = $token;
    if(isset($_SESSION['data_img'])){
        unset($_SESSION['data_img']);
    }
?>
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
      <!--    -----tvt them  03/06--->
      <link rel="preload" href="/css/style.min.css?v=<?=$version?>" as="style">
      <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
      <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
      <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
      <link rel="preload" href="http://raonhanh365.vn"/>
      <link rel="preload" href="/fonts/font-awesome.min.css?v=1">
      <link rel="preload" type="text/css" href="/css/jquery-ui.css?v=1"/>
          <link rel="preload" href="/css/side_bar_nam.css?v=1">
<!--      <link rel="preload" href="/css/restyle.css" as="style">-->
<!--      <link rel="preload" href="/css/home/header.css" as="style">-->
<!--      <link rel="preload" href="/css/dang_sp.css" as="style">-->
<!--      <link rel="preload" href="/css/home/sidebar_user.css" as="style">-->
<!--      <link rel="stylesheet" href="/css/home/sidebar_user.css" as="style">-->
<!--      <link rel="stylesheet" href="/css/dang_sp.css" as="style">-->
<!--      <link rel="stylesheet" href="/css/restyle.css" as="style">-->
      <!--------------->

            <link rel="stylesheet" href="/css/side_bar_nam.css?v=1">
            <link rel="stylesheet" href="/css/import_product.css?v=2">
     <link rel="canonical" href="http://raonhanh365.vn"/>
     <link rel="stylesheet" href="/fonts/font-awesome.min.css?v=1">
     <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css?v=1"/>
      <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
      <script type="text/javascript" src="/js/jquery-3.2.1.min.js">ĐĂNG TIN SẢN PHẨM</script>
      <script type="text/javascript" src="/js/jquery-ui.js"></script>
      <script src="/ckeditor/ckeditor.js"></script>
      <script src="/js/floatingcarousel.min.js" charset="utf-8"></script>
      <script src="/js/info.js" type="text/javascript"></script>
      <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
      
  </head>
    <body>
      <div class="header">
          <?php include("../includes/common/inc_header.php") ?>
          <div class="clear"></div>
      </div>
      <div class="short_url breadcrumb">
        <div class="container">
          <ul id="detail-menu">
            <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
            <li><a title="Đăng tin miễn phí">Đăng tin miễn phí</a></li>
          </ul>
        </div>
      </div>
      <div class="main_cate">
      <div class="container">
        <div class="side_bar col-3">
           <?php include("../includes/info/inc_left_info_doanhnghiep.php") ?>

           <div class="">
             <div id="filter-left-uutien" class="show_left_uutien">
              <?
                include ('../includes/detail/tin_uu_tien.php');
              ?>
             </div>
           </div>
        </div>

        <div class="content col-9">
          <div class="ct_title">
            <p id="abc">ĐĂNG SẢN PHẨM</p>
          </div>
          <div class="clear"></div>
          <form method="POST" id="upload_form">
           <input type="file" name="images[]" class="hidden" id="img_select" multiple accept="image/x-png,image/gif,image/jpeg">
          </form>
          <form method="POST" action="/doanh-nghiep/dang-san-pham" onsubmit="return checkpostdt();" enctype="multipart/form-data" class="div_dangtin">
            <div class="">
                <div class="box1">
                  <div class="box1_1">
                      <div class="image_brow">
                          <p>Upload ảnh sản phẩm</p>
                          <!-- <input type="button" name="product_img" value="UPLOAD ẢNH" class="upload_btn"> -->
                          <a target="_blank" id="upload_btn"><span><img src="../images/upload.png" alt=""></span><pre>   </pre>UPLOAD ẢNH</a>
                          <div class="file-chooser">
                           <!--<input type="file" id="upload_image" name="listimg[]" value="" class="hidden fileupload file-chooser__input" accept = "image/gif,image/jpg,image/jpeg,image/jpe,image/png"  >-->
                          </div>  
                          <!--<input type="file" id="secleimg" multiple name="listimg[]" value="" class="hidden fileupload" accept = "image/gif,image/jpg,image/jpeg,image/jpe,image/png" onchange="preview_image(event, this);" >-->
                          <div class="clear"></div>
                          <p>Lưu ý kích thước ảnh trên <span>300x300 px</span>,dung lượng tối đa <span>2MB</span> và đuôi mở rộng là:<span>gif,jpg,jpe,jpeg,png</span></p>

                      </div>
                      <div class="image_list">
                       <li class="pickma">
<!--                        <div class="upload-item working-upload-item upload">    
                        </div>-->
                            <div class="file-uploader__message-area"> </div>
                            <div class="file-list"></div>
                       </li>
                       <img src="" alt="" class="product_img td1" >
                       <img src="" alt="" class="product_img td2" >
                       <img src="" alt="" class="product_img td3" >
                       <img src="" alt="" class="product_img td1" >
                       <img src="" alt="" class="product_img td2" >
                       <img src="" alt="" class="product_img td3" id="product_img6">
                   </div>
                  </div>
                  </div>
                  <div class="box1_2">
                    <div class="category_select">
                         <p>Lựa chọn danh mục</p>
                         <div>
                             <input value="" name="cate_id" class="input_cate_id hidden">
                             <a target="_blank" id="menu_btn"><span><img src="../images/menu_icon.png" alt="Chọn danh mục"/></span><div class="chon_danhmuc">CHỌN DANH MỤC</div></a>
                         </div>

                         <div class="popup_cate hidden">
                             <div class="popup_post_cate">
                                 <h1>LỰA CHỌN DANH MỤC</h1>
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

                         <div class="tree_menu hidden">
                            <ul id="sitemap" class="hidden">
                                <li>
                                    <img src="../images/collapsed.png" alt="" class="collapsed_menu" status = "hidden">
                                    <a class="show_test_cate_0">NỘI THẤT - NGOẠI THẤT</a>
                                    <ul class="show_text_cate hidden">
                                        <li><img src="../images/line1.png" alt="" class = "line_tree">
                                            <img src="../images/collapsed.png" alt=""  class="collapsed_menu" >
                                            <a class="collapsed_menu" id="" status = "hidden"></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                         </div>
                     </div>
                    <div class="dif_info">
                        <table>
                          <tr>
                            <td><p>Khu vực rao vặt:</p></td>
                            <td colspan="2">
                                <select class="address" id="new_city" name="new_city">
                                    <option value="0">Toàn quốc</option>
                                    <?
                                        foreach($arrcity as $item=>$type){?>
                                                <option value="<?= $type['cit_id'] ?>"><?= $type['cit_name'] ?></option>
                                        <?}
                                    ?>
                             </select>
                            </td>

                          </tr>
                          <tr>
                            <td><p>Hình thức:</p></td>
                            <td>
                              <div class="bot_box check_cb">
                                <label><input type="radio" name="check_mua" value="1" /><div class="control__indicator"></div>Cần mua</label>
                              </div>
                            </td>
                            <td>
                              <div class="bot_box check_cb">
                                 <label><input type="radio" name="check_mua" value="2" checked/><div class="control__indicator"></div>Cần bán</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><p>Hình thức:</p></td>
                            <td>
                              <div class="bot_box check_cb">
                                <label><input type="radio" name="check_new" value="1" /><div class="control__indicator"></div>Sản phẩm mới</label>
                              </div>
                            </td>
                            <td>
                              <div class="bot_box check_cb">
                                  <label><input type="radio" name="check_new" value="2" checked/><div class="control__indicator"></div>Sản phẩm đã sử dụng</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><p>Hình thức:</p></td>
                            <td>
                              <div class="bot_box check_cb">
                                  <label><input type="radio" class="click_check_gia" name="check_gia" value="1" checked/><div class="control__indicator"></div>Nhập giá sản phẩm</label>
                              </div>
                            </td>
                            <td>
                              <div class="bot_box check_cb">
                                  <label><input type="radio" class="click_check_gia" name="check_gia" value="2" /><div class="control__indicator"></div>Giá liên hệ</label>
                              </div>
                            </td>
                          </tr>
                          <tr>
                            <td><p>Giá sản phẩm:</p></td>
                            <td colspan="2">
                              <input type="text" name="Price" value="" id="Price" onkeyup="keyprice(this)" class="numbersOnly check_gia_1">
                              <input type="text" name="Price" value="0" disabled onkeyup="keyprice(this)" class="numbersOnly check_gia_2 hidden">
                              <span class="dv">VND</span>
                              <span>/</span>
                              <input type="text" name="unit" value="" placeholder="Đơn vị...">
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
                          <td><p>Tiêu đề rao vặt:</p></td>
                          <td><input type="text"  class="title_sell" onkeydown="keytitle(this)" id="Title" maxlength="100" name="Title" type="text" value=""></td>
                          <td><span class="chon_goi_vip">CHỌN GÓI ĐĂNG TIN</span></td>
                        </tr>
                        <tr>
                          <td></td>
                          <td><p>Tiêu đề rao vặt phải nhiều hơn <span>10 ký tự</span>,nhiều nhất<span>100 ký tự</span>,không chứa <span>tên miền</span> và <span>số điện thoại</span></p></td>
                        </tr>
                      </table>
                    </div>
                    <div class="content_sell">
                      <p>Nội dung tin rao vặt:</p>
                      <textarea name="Description" id="editor1" rows="10" cols="80">

                     </textarea>
                    </div>
                    <div class="hashTag_box">
                        <div class="hashTag">
                        <p>Hashtag sản phẩm:</p>
                        <textarea name="hashtag" rows="4" cols="80" placeholder="#Congnghe #dientu"></textarea>
                        </div>
                        <div class="count_product">
                          <div class="">
                             <span class="before_txt">Số lượng trong kho:</span>
                             <input type="text" name="count_product" value="10">
                             <span>Sản phẩm</span>
                          </div>
                          <div class="">
                              <span>Nguồn gốc sản phẩm:</span>

                              <select class="source_product" name="source_product">
                                  <option value="1">Chính hãng</option>
                                  <option value="2">Nhập khẩu</option>
                                  <option value="3">Nội địa</option>
                                  <option value="4">Chưa xác định</option>
                              </select>
                          </div>
                        </div>

                    </div>
                    <div class="contact_detail">
                      <div class="Post_product">
                            <div class="dangtin_submit">
                                <div style="float: left;width: 400px">
                                   <div id='xacnhan'><p>Mã xác nhận:</p></div>
                                   <div id="div_captcha" style="float: left;position: relative;" >
                                       <input type="text" class="bnmxn" id="captcha_new" name="captcha" maxlength="5"/>
                                      <p class="captcha" style="width: 94px;">
                                       <img class="" src="../classes/securitycode.php"/>
                                      <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon" style="right: -7px;top: 7px;"></p>
                                     </p>
                                   </div>

                                </div>
                                <a target="_blank"  onclick="checkpostdt();" id="upload_product_btn"><span><img src="../images/up_icon.png" alt=""/></span>ĐĂNG TIN</a>
                                <input type="hidden" name="token" value="<?=$token?>"/>  
                                <input type="submit" value="ĐĂNG TIN" id="postok" name="postok" style="display: none;">
                            </div>
                      </div>
                    </div>

                </div>
                        <!--chon goi vip-->
                        <?
                            include ('../includes/info/inc_popup_chonvip.php');
                        ?>
                            <!--end popup khong đủ tiền-->
              
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

</script>

<script src="/js/dangtin.js?v=1" type="text/javascript"></script>
<!--<script src="/js/upload_img_new.js" type="text/javascript"></script>-->
<script src="/js/ajax_upload_anh_sp.js" type="text/javascript"></script>
<script src="/js/lazysizes.min.js"></script>