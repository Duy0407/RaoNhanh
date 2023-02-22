<!--<? include("config.php"); ?>-->
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
    <link rel="preload" href="http://raonhanh365.vn"/>
    <link rel="preload" type="text/css" href="/css/detail-slider.css"/>
    <!--------------->

   <link rel="canonical" href="http://raonhanh365.vn"/>
   <link rel="stylesheet" type="text/css" href="/css/detail-slider.css"/>
   <script src="/js/jquery-1.11.3.min.js" type="text/javascript"></script>
   <script src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
   <script defer src="/js/info.js" type="text/javascript"></script>
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
         <h1>NẠP TIỀN</h1>
         <div class="main_info">
            <div class="box_AddMoney">
               <form method="POST" action="/nap-tien" onsubmit="return checknapthe();" enctype="multipart/form-data" id="fnapthe">
                  <ul class="listOpt">
                     <li><a id="GTM_Naptien_Dangnhap_Card" class="active" ><i class="icon i_m_mb"></i><span>Thẻ điện thoại</span></a></li>
                     <!-- <li><a id="GTM_Naptien_Dangnhap_SMS" class=""><i class="icon i_m_sms"></i><span>Chuyển khoản</span></a></li> -->
                  </ul>
                  <div class="boxAddMoney_content active" id="mobile">
                     <label class="ftxt" onclick="selectOptionMobile(this)"><input type="radio" class="top_sal" name="ncc" value="1"/><div class="control__indicator"></div><img src="/images/nm1.png" /></label>
                     <label class="ftxt" onclick="selectOptionMobile(this)"><input type="radio" class="top_sal" name="ncc" value="2"/><div class="control__indicator"></div><img style="margin-top: 7px;" src="/images/nm3.png" /></label>
                     <label class="ftxt" onclick="selectOptionMobile(this)"><input type="radio" class="top_sal" name="ncc" value="6"/><div class="control__indicator"></div><img style="margin-top: 2px;" src="/images/nm4.png" /></label>
                     <label class="ftxt" onclick="selectOptionMobile(this)"><input type="radio" class="top_sal" name="ncc" value="3"/><div class="control__indicator"></div><img style="margin-top: -3px;"src="/images/nm2.png" /></label>
                     
                     <div class="box_napthe">
                        <div class="form_control2">
                           <div class="contr1">Mã thẻ</div>
                           <div class="contr2"><input name="code_popup" id="code_popup" type="text" /></div>
                        </div>
                        <div class="form_control2">
                           <div class="contr1">Số serial</div>
                           <div class="contr2"><input name="seri_popup" id="seri_popup" type="text" /></div>
                        </div>
                        <div class="form_control2">
                           <div class="contr1">Mã captcha</div>
                           <div class="contr2" style="position: relative;">
                               <div id="captcha_napthe">
                                    <input type="text" name="txt_security" id="captcha_popup_mc" maxlength="5"/>
                                    <p class="captcha">
                                        <img class="" src="/classes/securitycode.php" style="height: 25px;"/>
                                        <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                                    </p>
                               </div>
                           </div>
                        </div>
                        <div class="form_control2">
                           <div class="contr1"></div>
                           <div class="contr2">
                              <input type="submit" class="btn_dangky btn btn_submit" name="fnapthecao" value="Nạp tiền" />
                           </div>
                        </div>
                     </div>
                   
                     <div class="note">
                        <p>Nạp sai 5 lần liên tiếp, tài khoản của bạn không thể sử dụng hình thức nạp tiền này trong 24h</p>
                        <p>Mua thẻ nạp online <a href="https://banthe24h.vn/">tại đây</a></p>
                        <p>Báo lỗi khi nạp thẻ <a href="/lien-he">tại đây</a></p>
                     </div>   
                  </div> 
                  <!-- <iframe src="https://thecao24h.vn/doi-the-247?token=3ed29b0e-ae63-4b9b-95b4-d62a1bad8586" id="iframe_napthe"></iframe> -->
                  <div class="boxAddMoney_content" id="sms">
                     <div class="form_control3">
                           <div class="contr3">Chọn ngân hàng</div>
                           <div class="contr4">
                               <select class="id_nganhang">
                                   <option value="0">Chọn ngân hàng</option>
                                   <option value="1">Ngân hàng Vietcombank</option>
                                   <option value="2">Ngân hàng BIDV</option>
                                   <option value="3">Ngân hàng Techcombank</option>
                                   <option value="4">Ngân hàng Vietinbank</option>
                                   <option value="5">Ngân hàng Agribank</option>
                                   <option value="6">Ngân hàng MSB</option>
                                   <option value="7">Ngân hàng ACB</option>
                                   <option value="8">Ngân hàng TPbank</option>
                                   <option value="9">Ngân hàng MBbank</option>
                               </select>
                           </div>
                           <div class="contr5">
                               <div class="logo_nat"></div>
                               <div class="bg_nat">Lấy thông tin</div>
                           </div>
                             
                     </div>
                     <div class="show_nganhang">
                          
                     </div>
                     <div class="form_control3">
                         <span>Hướng dẫn lấy thông tin ngân hàng</span><br/>
                         <p>Click vào LẤY THÔNG TIN để tạo cú pháp nạp tiền vào tài khoản tại RaoNhanh365.</p>
                         <p>Sử dụng đoạn mã có được để thêm vào NỘI DUNG CHUYỂN KHOẢN khi chuyển tiền qua InternetBanking.</p>
                         <p>Liên hệ với BQT để xác nhận thông tin chuyển khoản.</p>
                         <p>Chọn ngân hàng bạn đang sử dụng.</p>
                         <p>Kiểm tra tài khoản trong trang cá nhân.</p>
                     </div> 
                  </div>
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
<script src="/js/lazysizes.min.js"></script>
<script>
    
function selectOptionMobile(e)
{
   var t=$(e).find("input[type=radio]").attr("checked","checked");
   $(e).parent().find("input[type=radio]").not(t).removeAttr("checked")
}
function checknapthe()
{
    var returndata = false;
    var e = $('input[name="ncc"]:checked'),t=$("#seri_popup").val();
    t=t.replace(/ /g,"");
    var u=$("#code_popup").val();
    u=u.replace(/ /g,"");
    var a=$("#captcha_popup_mc").val();
    if(e.length === 0)
    {
      returndata = false;
      alert("Xin vui lòng chọn nhà mạng!");
    }
    else if(u==="")
    {
      returndata = false;
      alert("Xin vui lòng nhập mã cào!");
    }
    else if(t=== "")
    {
      returndata = false;
      alert("Xin vui lòng nhập mã seri!");
    }
    else if(a ==="")
    {
      returndata = false;
      alert("Xin vui lòng nhập mã captcha!");
    }
    else if(a.length < 5)
    {
      returndata = false;
      alert("Mã captcha phải đủ 5 ký tự!");
    }
    else if(a < 4)
    {
      returndata = false;
      alert("Mã captcha phải đủ 5 ký tự!");
    }
    else
    {
      returndata = false;
      $(".btn_submit").after('<span class="loading_mn"></span>');
      $(".btn_submit").css("background-color","#00a888");
      $.ajax({
         url: "../ajax/getmathe.php",
         type: "POST",
         data: {
         'code': $("#captcha_popup_mc").val(),
         'TxtCard' :e.val(),
         'TxtMaThe' : u,
         'TxtSeri' : t,
         'user' : <?= $userid ?>
         },
         success: function(data){
            $(".loading_mn").remove();
            $(".btn_submit").removeAttr("style");
            if(data == 0)
            {
               
               alert("Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại!");
               $(".reset-icon").click();
               
            }
            else if(data == 2)
            {
               alert("Seri hoặc mã thẻ không được để trống");
               $(".reset-icon").click();
            }
            else if(data != '')
            {
               alert(data);
               $(".reset-icon").click();
               location.reload();
            }
         }
     });
    }
    return returndata;
}

$("#GTM_Naptien_Dangnhap_Card").click(function(){
   if($(this).hasClass("active") == false)
   {
      $("#GTM_Naptien_Dangnhap_SMS").removeClass("active");
      $("#sms").removeClass("active");
      $(this).addClass("active");
      $("#mobile").addClass("active");
   }
});
$("#GTM_Naptien_Dangnhap_SMS").click(function(){
   if($(this).hasClass("active") == false)
   {
      $("#GTM_Naptien_Dangnhap_Card").removeClass("active");
      $("#mobile").removeClass("active");
      $(this).addClass("active");
      $("#sms").addClass("active");
   }
});

   $(".ntvtk .nap__tien").addClass("open_menu");
   $(".ntvtk").addClass("selected");
   $(".ntvtk a:first").addClass("menu-a");
   
   $(".bg_nat").click(function (){
       var id = $(".id_nganhang").val();
       $.post('/ajax/show_nganhang.php',{id:id},function(data) {
           $('.show_nganhang').html(data);
        });
   });
</script>
