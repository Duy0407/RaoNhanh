<? include ("../includes/info/doi_mk.php");?>
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
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
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
      <div class="detail-main">
         <h1>ĐỔI MẬT KHẨU</h1>
         <div class="main_info">
            <div class="main_doimk">
               <?
               if(isset($_COOKIE['show'])) {
                ?>
                <div id="doimk_ok"><p style="text-align: center; padding-bottom: 15px;color: #19b60f;">Đổi mật khẩu thành công</p></div>
                <?
                   }
                ?>
               <form method="POST" action="/tai-khoan/doi-mat-khau" onsubmit="return false;">
                  <div class="form_control">
                     <div class="control1"><i class="sao">*</i>Mật khẩu cũ:</div>
                     <div class="control2"><input type="password" placeholder="**********" id="mkcu" name="mkcu"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1"><i class="sao">*</i>Mật khẩu mới:</div>
                     <div class="control2"><input type="password" placeholder="**********" id="mkmoi1" name="mkmoi1"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1"><i class="sao">*</i>Nhập lại mật khẩu mới:</div>
                     <div class="control2"><input type="password" placeholder="**********" id="mkmoi2" name="mkmoi2"/></div>
                  </div>
                  <div class="form_control">
                     <div class="control1"><i class="sao">*</i>Nhập mã xác nhận:</div>
                     <div class="control2" style="position: relative;">
                         <div id="checkcaptcha">
                            <input type="text" class="bnmxn" id="macaptcha" name="macaptcha"/>
                            <p class="captcha">
                               <img class="" src="../classes/securitycode.php"/>
                               <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                            </p>
                         </div>
                     </div>
                  </div>
                  <input type="submit" onclick="checkpass('<?= $row4['usc_account']?>');" name="postok" class="btn_dangky btn_update_left" value="Cập nhật"/>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script src="/js/doimk.js" type="text/javascript"></script>
<script>
   $(".tttk .dmk").addClass("open_menu");
   $(".tttk").addClass("selected");
   $(".tttk a:first").addClass("menu-a");
</script>