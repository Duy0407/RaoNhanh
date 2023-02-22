<? 
include("config.php");
?>
<!DOCTYPE html>
<style>
    .noti-error{
      float: left; 
      color: red; 
    }
    .noti-error_map{
        color: red;
        left: 375px;
        width: 300px;
    }
    .noti-ok-map{
        color: #4cae4c;
        left: 375px;
        width: 300px;
        margin-top: 2px;
        float: left;
        margin-left: 117px;
    }
    .noti-ok{
        color: #4cae4c;
        float: left;
        padding-top: 10px;
        padding-left: 32px;
    }
    .error{
        border: 1px solid red!important;
    }
    #maps_mapcanvas{
        height: 237px!important;
    }
    .update_add{
        margin-top: 10px!important;
        margin-bottom: 40px!important;
    }
    
</style>
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
   <link rel="stylesheet" type="text/css" href="/css/detail-slider.css?v=1"/>
   <link href="/css/croppie.css?v=1" rel="stylesheet" type="text/css"/>
   <link href="/css/import_product.css?v=1" rel="stylesheet" type="text/css"/>
   <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
   <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
   <script src="/js/info.js" type="text/javascript"></script>
   <script src="/js/croppie.js" type="text/javascript"></script>
   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
<script>
     (adsbygoogle = window.adsbygoogle || []).push({
          google_ad_client: "ca-pub-4118232040315071",
          enable_page_level_ads: true
     });
</script>
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
      <?
        if(empty($row4)){
            redirect("/");
        }else if($row4['usc_type']==5){
             include("../includes/info/inc_left_info_doanhnghiep.php") ;    
        } else {
             include("../includes/info/inc_left_info.php") ;
        }
      ?>
        <!--popup cap nhap thanh cong-->
        <div class="thongbao_lammoi popup_dt_thanhcong hidden">
            <div class="popup_delete">
                <span>CẬP NHẬP THÀNH CÔNG</span>
                <div class="clear"></div>
                <div class="popup_dangtin_main"> 
                    <h3><span>Thông tin của bạn đã được thay đổi</span><br/>
                        <span>Cám ơn bạn đã sử dụng các chức năng của Raonhanh365</span>
                    </h3>
                    <div class="div_btn_thongbao">
<!--                        <div class="btn_lammoi"><a href="/">TRANG CHỦ</a></div>
                        <div class="btn_thoat"><a>THOÁT</a></div>-->
                    </div>
                </div>
            </div>
        </div>   
        <!--end popup-->
      <div class="detail-main">
         <h1>THAY ĐỔI THÔNG TIN</h1>
         <div class="main_info">
            <div class="left_info">
                <form id="uploadimage" action="" onsubmit="return false;" method="post" enctype="multipart/form-data">
                    <div class="top_pick">
                        <div id="upload-demo" class="hidden" style="width:130px"></div>
                        <img id="previewing" class="upload-demo" src="/images/icon_us.png" alt="#" />
                       <div class="right_pick">
                           <input type="file" name="file" id="file_upload" style="display:none;" value="" accept="image/x-png,image/gif,image/jpeg"/>
                           <div class="pickfile"><span></span><a id="name_img">Chọn ảnh đại diện</a>

                          </div>
                          <p>Thay đổi ảnh đại diện</p>
                          <div class="gh">Dung lượng tối đa <i>50kb</i> và có phần mở<br /> rộng là: <i>.gif, .jpg, .png</i></div>
                       </div>
                    </div>
                    <input type="submit" id="click_submit" class="btn_dangky upload-result" value="Cập nhập"/>
                </form>
               <div class="map">
                   <div id="maps_maparea">
                       <div id="maps_mapcanvas" style="margin-top:10px;" class="form-group" style="height:250px;"></div> 
                   </div>
               </div>
               <?
                    $map       = new db_query("SELECT * FROM map WHERE usc_id = '".$row4['usc_id']."'");
                    $map_cou = mysql_num_rows($map->result);
                    $map_data  = mysql_fetch_assoc($map->result);
               ?>
                <div class="update_add">
                  <span>Nhập địa chỉ mới:</span>
                  <input type="text" class="add_up" name="maps_address" id="maps_address" value="<?if($map_cou>0){echo $map_data['usc_address'];}else{echo '';}?>" placeholder="Nhập tên địa chỉ">
                  <input type="text" class="form-control" name="maps[maps_mapcenterlat]" id="maps_mapcenterlat" value="<?if($map_cou>0){echo $map_data['maps_mapcenterlat'];}else{echo '20.871571500000005';}?>" style="display:none;" readonly="readonly">
                  <input type="text" class="form-control" name="maps[maps_mapcenterlng]" id="maps_mapcenterlng" value="<?if($map_cou>0){echo $map_data['maps_mapcenterlng'];}else{echo '105.79547500000001';}?>" style="display:none;" readonly="readonly">
                  <input type="text" class="form-control" name="maps[maps_maplat]" id="maps_maplat" value="<?if($map_cou>0){echo $map_data['maps_maplat'];}else{echo '20.984826535048562';}?>" style="display:none;" readonly="readonly">
                  <input type="text" class="form-control" name="maps[maps_maplng]" id="maps_maplng" value="<?if($map_cou>0){echo $map_data['maps_maplng'];}else{echo '105.79892968521119';}?>" readonly="readonly" style="display:none;">
                  <input type="text" class="form-control" name="maps[maps_mapzoom]" id="maps_mapzoom" style="display:none;" value="<?if($map_cou>0){echo $map_data['maps_mapzoom'];}else{echo '14';}?>" readonly="readonly">
                 <? unset($map,$map_cou,$map_data)?> 
               </div>
                <button onclick="checkmap(<?= $row4['usc_id']?>)" class="btn_dangky btn_update_left">Cập nhật</button>
            </div>
            <div class="right_info">
               <div class="main_edit">
                   <form action="#" method="#" onsubmit="return false">
                     <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Họ và tên:</div>
                        <div class="control2"><input type="text" placeholder="Nguyễn Văn A" value="<?=$row4['usc_name']?>" id="Hoten_info" name="Hoten"/></div>
                     </div>
                     <div class="form_control">
                        <div class="control1">Giới tính:</div>
                        <div class="control2">
                            <select id="gender_info" name="gender">
                                <? $gender = $row4['usc_gender']?>
                                <option value="2" <?if($gender==2){echo "selected='selected'";}?> >Chọn giới tính</option>
                                <option value="0" <?if($gender==0){echo "selected='selected'";}?> >Nam</option>
                                <option value="1" <?if($gender==1){echo "selected='selected'";}?> >Nữ</option>
                            </select>
                        </div>
                     </div>
                     <div class="form_control">
                         <div class="control1">Ngày sinh:</div>
                        <div class="control2">
                            
                        <!--Hiện thị ngày sinh-->
                        <select id="slngay" class="slngay_info">
                              <? $birth = $row4['usc_birth_day'];  
                                echo "<option value='00'>Ngày</option>";
                                $i=1;
                                while ($i<=31){
                                    if($birth == 0){
                                            echo "<option value='".$i."'>".$i."</option>";
                                    }else
                                    {
                                        if( $i == date('d',$birth)){
                                         echo "<option value='".$i."'selected='selected'>".$i."</option>"; 
                                        }
                                        else{
                                         echo "<option value='".$i."'>".$i."</option>";  
                                        }
                                     } 
                                   $i++;
                                 }
                                 unset($i);
                              ?>
                           </select>
                        <!--End ngày sinh-->
                        <!--Hiện thị tháng sinh-->
                           <select id="slthang" class="slthang_info">
                                   <? $birth = $row4['usc_birth_day']; 
                                        echo "<option value='00'>Tháng</option>";
                                        $i=1;
                                        while ($i<=12){
                                            if($birth == 0){
                                                    echo "<option value='".$i."'>".$i."</option>";
                                            }else
                                            {
                                                if( $i == date('m',$birth)){
                                                 echo "<option value='".$i."'selected='selected'>".$i."</option>"; 
                                                }
                                                else{
                                                 echo "<option value='".$i."'>".$i."</option>";  
                                                }
                                             } 
                                           $i++;
                                         }
                                       unset($i);
                                    ?>  
                           </select>
                        <!--end tháng sinh-->
                        <!--Hiện thị năm sinh-->
                           <select id="slnam" class="slnam_info">
                               <? $birth = $row4['usc_birth_day'];  
                                    echo "<option value='00'>Năm</option>";
                                    $i = 2030;
                                    while ($i >=1912){
                                        if($birth == 0){
                                                echo "<option value='".$i."'>".$i."</option>";
                                        }else
                                        {
                                            if( $i == date('Y',$birth)){
                                             echo "<option value='".$i."'selected='selected'>".$i."</option>"; 
                                            }
                                            else{
                                             echo "<option value='".$i."'>".$i."</option>";  
                                            }
                                         } 
                                       $i --;
                                     }
                                   unset($i);     
                                ?> 
                           </select>
                        <!--end năm sinh-->
                        </div>
                     </div>
                     <!-- <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Email:</div>
                        <div class="control2"><input type="text" placeholder="mail" value="<?=$row4['usc_email']?>" id="Email_info" name="Email"></div>
                     </div> -->
                     <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                        <div class="control2"><input class="numbersOnly2" type="text" placeholder="phone" value="<?=$row4['usc_phone']?>" id="Phone_info" name="Phone"></div>
                     </div>
                     <div class="form_control">
                        <div class="control1">Thành phố:</div>
                        <div class="control2">
                            <select id="city_info"> 
                                <?
                                  echo "<option value=''>Thành phố</option>";
                                  foreach ($arrcity as $result) {
                                        if($result['cit_id']== $row4['usc_city']){
                                             echo "<option value='".$result['cit_id']."'selected='selected'>".$result['cit_name']."</option>"; 
                                        }
                                        else{
                                             echo "<option value='".$result['cit_id']."'>".$result['cit_name']."</option>";  
                                        }
                                   }unset($result);
                                ?> 
                            </select>
                        </div>
                     </div>
                     <div class="form_control">
                        <div class="control1">Nghề nghiệp:</div>
                        <div class="control2"><input type="text" id="Jop_info" placeholder="Doanh nghiệp tự do" value="<?=$row4['usc_job']?>"></div>
                     </div>
                     <div class="form_control">
                        <div class="control1">Lĩnh vực kinh doanh:</div>
                        <div class="control2">
                            <select id="category_info"> 
                                <?
                                  echo "<option value=''>Lĩnh vực kinh doanh</option>";
                                  foreach($db_cat as $result){
                                        if($result['cat_id']== $row4['usc_category']){
                                             echo "<option value='".$result['cat_id']."'selected='selected'>".$result['cat_name']."</option>"; 
                                        }
                                        else{
                                             echo "<option value='".$result['cat_id']."'>".$result['cat_name']."</option>";  
                                        }
                                   }
                                   unset($result);
                                ?> 
                            </select>
                        </div>
                     </div>
                     <div class="form_control">
                        <div class="control1">Website cá nhân:</div>
                        <div class="control2"><input id="web_info" type="text" value="<?=$row4['usc_website']?>"/></div>
                     </div>
                     <div class="form_control">
                        <div class="control1">Facebook cá nhân:</div>
                        <div class="control2"><input id="face_info" type="text" value="<?=$row4['usc_facename']?>"/></div>
                     </div>
                     <div class="form_control">
                        <div class="control1">Skype liên hệ:</div>
                        <div class="control2"><input id="sky_info" type="text" value="<?=$row4['usc_skype']?>"/></div>
                     </div>
                     <div class="form_control">
                        <div class="control1"></div>
                        <div class="control2">
                            <button onclick="checkpostdt(<?= $row4['usc_id']?>);" class="btn_dangky btn_update_left btn_update_2">Cập nhật</button>
                        </div>
                     </div>
                     <!--<input type="submit" onclick="checkpostdt();" class="btn_dangky btn_update_left btn_update_2" value="Cập nhật"/>-->
                     
                  </form>
               </div>   
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script src="/js/map.js" type="text/javascript"></script>
<script src="/js/info_update.js" type="text/javascript"></script>
<!--<script src="/js/script_img.js" type="text/javascript"></script>-->
<script>
   $("#tttk").addClass("open_menu");
   $(".tttk").addClass("selected");
   $(".tttk a:first").addClass("menu-a");
</script>

<script type="text/javascript">
$('.btn_thoat').click(function (){
   $('.popup_dt_thanhcong').addClass('hidden'); 
});
$uploadCrop = $('#upload-demo').croppie({
    enableExif: true,
    viewport: {
        width: 90,
        height: 90,
        type: 'square'
    },
    boundary: {
        width: 105,
        height: 105
    }
});
$('#file_upload').on('change', function () { 
    $('#upload-demo').removeClass('hidden');
    $('#previewing').addClass('hidden');
	var reader = new FileReader();
    reader.onload = function (e) {
    	$uploadCrop.croppie('bind', {
    		url: e.target.result
    	}).then(function(){
    		console.log('jQuery bind complete');
    	});
    }
    reader.readAsDataURL(this.files[0]);
});
$('.upload-result').on('click', function (ev) {
    var img = $('#file_upload').val();
    if(img == ''){
        alert('Bạn chưa chọn file');
    }else{
	$uploadCrop.croppie('result', {
		type: 'canvas',
		size: 'viewport'
	}).then(function (resp) {
		$.ajax({
			url: "/ajax/upload_avata.php",
			type: "POST",
			data: {"image":resp},
			success: function (data) {
                            if(data == 2){
                                alert('Cập nhập thất bại');
                            }else{
                            $('#upload-demo').addClass('hidden');
                            $('#previewing').removeClass('hidden');
                            $('#previewing').attr('src',resp);
                            $('.info-left-top-mail img').attr('src',resp);
                            $('.box_user img').attr('src',resp);
                            $(".nav_menu_btn_user img").attr('src',resp);
                            $('.popup_dt_thanhcong').removeClass('hidden');
                                setTimeout(function(){
                                    $('.popup_dt_thanhcong').addClass('hidden');
                                }, 4000);
                            }
//				html = '<img src="' + resp + '" />';
//
//				$("#upload-demo-i").html(html);
			}
		});
	});
    }
});
</script>