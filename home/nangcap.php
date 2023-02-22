<? include("config.php");?>
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
   <link rel="canonical" href="http://raonhanh365.vn"/>
   <link rel="stylesheet" type="text/css" href="/css/detail-slider.css"/>
   <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
   <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
   <script src="/js/info.js" type="text/javascript"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
</head>
<body>
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01"/>
</div>
<? include("../includes/common/inc_header.php");
    if(empty($row4)){
    redirect("/");
    }else if($row4['usc_type']==5){
    redirect("/");    
    }else if($row4['usc_type'] == 1){
        $db_new =  new db_query("SELECT COUNT(new_id) FROM new WHERE new_user_id = ".$row4['usc_id']);
        $row_new   = mysql_fetch_assoc($db_new->result);
        if($row_new['COUNT(new_id)'] < 3){
            redirect("/"); 
        }
        unset($db_new,$row_new);
    }
    $check = getValue("post_nc","str","POST","");
    if($check != '')
    { 
        $store_name = getValue("store_name","str","POST","");
        $store_name = trim($store_name);
        $store_name = replaceMQ($store_name);
        
        $nc_category = getValue("nc_category","str","POST",0);
        $nc_category = trim($nc_category);
        
        $nc_phone = getValue("nc_phone","str","POST",0);
        $nc_phone = trim($nc_phone);
        
        if($nc_phone == 0){
            $nc_phone = $row4['usc_phone'];
        }
        
        $nc_web = getValue("nc_web","str","POST","");
        $nc_web = trim($nc_web);
        $nc_web = replaceMQ($nc_web);
        if($nc_web == ""){
            $nc_web = $row4['usc_website'];
        }
        
        $nc_face = getValue("nc_face","str","POST","");
        $nc_face = trim($nc_face);
        $nc_face = replaceMQ($nc_face);
        if($nc_face == ""){
            $nc_face = $row4['usc_facename'];
        }
        
        $nc_city = getValue("nc_city","str","POST",0);
        $nc_city = trim($nc_city);
        if($nc_city == 0){
            $nc_city = $row4['usc_city'];
        }
        
        $nc_diachi = getValue("nc_diachi","str","POST","");
        $nc_diachi = trim($nc_diachi);
        $nc_diachi = replaceMQ($nc_diachi);
        if($nc_city == ""){
            $nc_city = $row4['usc_address'];
        }
        
        if($store_name !='' && $nc_phone !=''){
            $data_nc = new db_execute("UPDATE user SET usc_store_name='".$store_name."',usc_store_phone='".$nc_phone."',usc_city='".$nc_city."',usc_category='".$nc_category."',usc_website='".$nc_web."',usc_facename='".$nc_face."',usc_address='".$nc_diachi."' ,usc_type= '5' WHERE usc_id ='".$row4['usc_id']."'" );
        
            if($data_nc){
               redirect("/doanh-nghiep/tong-quan-tai-khoai"); 
            }
        }
    }

    $db_cate    = new db_query("SELECT cat_id,cat_name FROM category");
    $db_city    = new db_query("SELECT cit_id,cit_name FROM city");  
?>
<section>
<? include("../includes/info/inc_bread_crumb.php") ?>
<div class="main_cate">
    <div class="container">
      <div class="box_nang_cap">
        <form  method="POST" action="/ca-nhan/nang-cap" onsubmit="return false;">
         <h1>Nâng cấp tài khoản</h1>
         <div class="main_nangcap">
            <div class="left_nangcap">
               <div class="main_edit">
                  <div class="form_control">
                     <div class="control1"></div>
                     <div class="control2 div_contro12">
                        <div class="info_nc">
                           <img src="<?=($row4['usc_logo']!= '')?$row4['usc_logo']:'/images/detai-avata.png';?>" />
                           <div class="right_info_nc">
                              <div class="from_control">
                                 <div class="control3">Tên đại diện:</div>
                                 <div class="control4"><?=$row4['usc_name']?></div>
                              </div>
                              <div class="from_control">
                                 <div class="control3">Loại tài khoản:</div>
                                 <div class="control4">Tài khoản cá nhân</div>
                              </div>
                              <div class="from_control">
                                 <div class="control3">Ngày đăng ký:</div>
                                 <div class="control4"><?= date('d/m/Y',$row4['usc_time'])?></div>
                              </div>
                              <div class="from_control">
                                 <div class="control3">Số dư tài khoản:</div>
                                 <div class="control4"><?=$row4['usc_money']?> tcoin</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Họ và tên:</div>
                     <div class="control2"><input type="text" disabled="true" value="<?=$row4['usc_name']?>"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Giới tính:</div>
                     <div class="control2"><input type="text" disabled="true" value="<?=($row4['usc_gender']==0)?"Nam":"Nữ";?>"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Ngày sinh:</div>
                     <div class="control2"><input type="text" disabled="true" value="<?= date('d/m/Y',$row4['usc_birth_day'])?>"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Email:</div>
                     <div class="control2"><input type="text" disabled="true" value="<?=$row4['usc_email']?>"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Số điện thoại:</div>
                     <div class="control2">
                         <input class="numbersOnly2" id="nc_phone_usc" type="text" disabled="true" value="<?=$row4['usc_phone']?>"/>
                     </div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Nghề nghiệp:</div>
                     <div class="control2"><input type="text" value="<?=$row4['usc_job']?>" disabled="true"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Địa chỉ cá nhân:</div>
                     <div class="control2"><input type="text" id="diachi_usc" value="<?=$row4['usc_address']?>" disabled="true"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Website cá nhân:</div>
                     <div class="control2"><input type="text" id="web_usc" disabled="true" value="<?=$row4['usc_website']?>"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1">Facebook cá nhân:</div>
                     <div class="control2"><input disabled="true" id="face_usc" value="<?=$row4['usc_facename']?>" type="text"/></div>
                  </div>
               </div>
            </div>
            <div class="right_nangcap">
               <h2>Thông tin đăng ký gian hàng</h2>
               <div class="form_control">
                  <div class="control1"><i class="sao">*</i>Tên cửa hàng:</div>
                  <div class="control2"><input value="" id="store_name" name="store_name" placeholder="Nhập tên gian hàng" type="text"/></div>
               </div>
               <div class="form_control">
                  <div class="control1">Lĩnh vực kinh doanh:</div>
                  <div class="control2">
                      <select name="nc_category">
                          <option value="0">Lĩnh vực kinh doanh</option>
                          <?
                            foreach($db_cat as $item=>$type){
                          ?>
                          <option value="<?=$type['cat_id']?>"><?=$type['cat_name']?></option>
                          
                          <?}unset($type,$item)?>
                      </select>
                  </div>
               </div>
               <div class="form_control">
                  <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                  <div class="control2" style="width: 340px;">
                      <input type="text" class="w146 numbersOnly2" placeholder="Nhập số điện thoại" name="nc_phone" id="nc_phone"/>
                      <label class="check_cb">
                          <input type="checkbox" id="nc_chekphone"/>
                          <div class="control__indicator"></div>Sử dụng sđt cá nhân
                      </label>
                      <div class="div_phone"></div>
                  </div>
               </div>
               <div class="form_control">
                  <div class="control1">Website cửa hàng:</div>
                  <div class="control2" style="width: 340px;"><input type="text" id="nc_web" name="nc_web" class="w146" placeholder="Website" /><label class="check_cb"><input id="nc_check_web"type="checkbox" /><div class="control__indicator"></div>Sử dụng website cá nhân</label></div>
               </div>
               <div class="form_control">
                  <div class="control1">Facebook cửa hàng:</div>
                  <div class="control2" style="width: 340px;"><input type="text" id="nc_face" name="nc_face" class="w146" placeholder="facebook" /><label class="check_cb"><input type="checkbox" id="nc_check_face"/><div class="control__indicator"></div>Sử dụng Facebook cá nhân</label></div>
               </div>
               <div class="form_control">
                  <div class="control1"><h3>Địa chỉ doanh nghiệp:</h3></div>
                  <div class="control2"><label class="check_cb"><input type="checkbox" id="nc_check_dc"/><div class="control__indicator"></div>Sử dụng địa chỉ cá nhân</label></div>
                  <input type="text" id="city_usc" value="<?=$row4['usc_city']?>" style="display: none;">
               </div>
               <div class="form_control">
                  <div class="control1"><i class="sao">*</i>Khu vực:</div>
                  <div class="control2">
                      <select name="nc_city" id="nc_city">
                          <option value="0">Khu vực</option>
                          <?
                            foreach ($arrcity as $result){
                          ?>
                          <option value="<?=$result['cit_id']?>" id="city_<?=$result['cit_id']?>"><?=$result['cit_name']?></option>
                          <?}unset($result)?>
                      </select>
                  </div>
               </div>
               <div class="form_control">
                  <div class="control1"><i class="sao">*</i>Địa chỉ liên hệ:</div>
                  <div class="control2"><input type="text" id="nc_diachi" name="nc_diachi" placeholder="Nhập địa chỉ" /></div>
               </div>
               <div class="form_control">
                  <div class="control1">Mật khẩu:</div>
                  <div class="control2"><input type="text" disabled="true" value="Mật khẩu không thay đổi" /></div>
               </div>
               <div class="form_control">
                  <div class="control1"><i class="sao">*</i>Mã xác nhận:</div>
                  <div class="control2" style="position: relative;">
                     <div id="div_captcha_nc">
                          <input type="text" class="bnmxn" id="captcha_nc" name="captcha"/>
                          <p class="captcha">
                            <img class="" src="../classes/securitycode.php"/>
                          </p>
                          <p onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                     </div>
                  </div>
               </div>
               <input type="submit" onclick="checkpostdt();" class="btn_dangky" id="btn_nangcap" value="Nâng cấp" name="post_nc">
            </div>
         </div>
        </form>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
    
</body>
</html>
<script src="../js/lazysizes.min.js"></script>
<script>
//    lấy số điện thoại user
    $('#nc_chekphone').click(function(){
        if($(this).prop("checked") == true){
            $("#nc_phone").val($("#nc_phone_usc").val());
            $("#nc_phone").attr("disabled","true");
        }
    });
    $('#nc_chekphone').click(function(){
        if($(this).prop("checked") == false){
            $("#nc_phone").val("");
            $("#nc_phone").removeAttr("disabled");
        }
    });
//    laays wweb user
    $('#nc_check_web').click(function(){
        if($(this).prop("checked") == true){
            $("#nc_web").val($("#web_usc").val());
            $("#nc_web").attr("disabled","true");
        }
    });
    $('#nc_check_web').click(function(){
        if($(this).prop("checked") == false){
            $("#nc_web").val("");
            $("#nc_web").removeAttr("disabled");
        }
    });
//    lấy face user
    $('#nc_check_face').click(function(){
        if($(this).prop("checked") == true){
            $("#nc_face").val($("#face_usc").val());
            $("#nc_face").attr("disabled","true");
        }
    });
    $('#nc_check_face').click(function(){
        if($(this).prop("checked") == false){
            $("#nc_face").val("");
            $("#nc_face").removeAttr("disabled");
        }
    });
//    lấy địa chỉ usce
    $('#nc_check_dc').click(function(){
        if($(this).prop("checked") == true){
            $("#nc_diachi").val($("#diachi_usc").val());
            $("#nc_diachi").attr("disabled","true");
            var a = $("#city_usc").val();
            $("#city_"+a).attr("selected","selected");
            $("#nc_city").attr("disabled","true");
        }
    });
    $('#nc_check_dc').click(function(){
        if($(this).prop("checked") == false){
//            $("#nc_diachi").val("");
            $("#nc_diachi").removeAttr("disabled");
            var a = $("#city_usc").val();
            $("#city_"+a).removeAttr("selected");
            $("#nc_city").removeAttr("disabled");
        }
    });
</script>
<script src="/js/update_user.js" type="text/javascript"></script>