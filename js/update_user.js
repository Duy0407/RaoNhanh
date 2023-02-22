function reload(id) {
	document.getElementById(id).src = document.getElementById(id).src;
}
function reloadSecurityCode(e)
{
   $(e).parent().find("img").attr("src","/classes/securitycode.php?t="+Date.now());
}


jQuery(".numbersOnly").keyup(function () {
  this.value = this.value.replace(/[^0-9]/g, '');
  $('.numbersOnly').val( $('.numbersOnly').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1.") );
});
jQuery(".numbersOnly2").keyup(function () {
  this.value = this.value.replace(/[^0-9]/g, '');
});
//Hàm check định dạng email
function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test($email);
}
function hasWhiteSpace(s) {
  return s.indexOf(' ') >= 0;
}
function checkpostdt(){
    $(".noti-error").remove();
    $("#nc_phone").removeClass('error');
    $("#nc_city").removeClass('error');
    $("#nc_diachi").removeClass('error');
    if($("#store_name").val() == '')
    {
        $('html, body').animate({
            scrollTop: $("#store_name").offset().top -150
        }, 500);
        $("#store_name").addClass('error');
        $("#store_name").after("<div class='noti-error'>Bạn chưa nhập tên cửa hàng</div>");;
    } 

    else if($("#nc_phone").val() == '')
    {
        $('html, body').animate({
            scrollTop: $("#nc_phone").offset().top -150
        }, 500);
        $("#nc_phone").addClass('error');
        $("#nc_phone").parent().after("<div class='noti-error' style='margin-left: 185px;'>Bạn chưa nhập số điện thoại</div>");
    }
    else if($("#nc_phone").val().length < 9 )
    {
        $('html, body').animate({
            scrollTop: $("#nc_phone").offset().top -150
        }, 500);
        $("#nc_phone").addClass('error');
        $("#nc_phone").parent().after("<div class='noti-error' style='margin-left: 185px;'>Số điện thoại không hợp lệ</div>");
    }
    else if($("#nc_city").val() == 0 )
    {
        $('html, body').animate({
            scrollTop: $("#nc_city").offset().top -150
        }, 500);
        $("#nc_city").addClass('error');
        $("#nc_city").parent().after("<div class='noti-error' style='margin-left: 185px;'>Bạn chưa chọn khu vực</div>");
    }
    else if($("#nc_diachi").val() == '')
    {
        $('html, body').animate({
            scrollTop: $("#nc_diachi").offset().top -150
        }, 500);
        $("#nc_diachi").addClass('error');
        $("#nc_diachi").parent().after("<div class='noti-error' style='margin-left: 185px;'>Bạn chưa nhập địa chỉ</div>");
    }
    else if($("#nc_diachi").val().length < 10 )
    {
        $("#nc_diachi").focus();
        $("#nc_diachi").addClass('error');
        $("#nc_diachi").parent().after("<div class='noti-error' style='margin-left: 185px;'>Địa chỉ phải nhiều hơn 10 ký tự</div>");
    }
    else if($("#captcha_nc").val().length < 5)
    {
        $("#captcha_nc").focus();
        $("#captcha_nc").addClass('error');
        $("#div_captcha_nc").after("<div class='noti-error'>Mã bảo mật phải đủ 5 ký tự</div>");
    }
    else
    {
      $.ajax({
         url: "../ajax/getcode.php",
         type: "POST",
         data: {
         'code': $("#captcha_nc").val()
         },
         success: function(data){
            if(data == 0)
            {
                   if($("#captcha_nc").hasClass("error") == false)
                   {
                      $("#captcha_nc").addClass('error');
                      $(".reset-icon").click();
                   }
                   $("#captcha_nc").focus();
                   $(".reset-icon").click();
                   $("#div_captcha_nc").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>");
            }
            else{
               if($(".store_name").hasClass("error") == false){
                   $(".box_nang_cap form").attr("onsubmit","return true;");
                   $("#btn_nangcap").click();
               }      
           }  
            
         }
      });
   }
}
$('.pickfile').click(function (){
    $("#file").click()
});

$(document).ready(function(){
    $("#Email").blur(function(){   
       $(".noti-error").remove();
       if($("#Email").val().length > 6)
       {
        $("#Email").removeClass('error');
        $(".noti-error").remove();
          $.ajax({
             type: "POST",
             url: '../ajax/checkmail.php',
             data: {email:$("#Email").val()},
             success: function(data) {
                if(data == 1)
                {
                   if($("#Email").hasClass("error") == false)
                   {
                      $("#Email").addClass('error');
                      $("#Email").after("<div class='noti-error'>Email này đã có người đăng ký</div>");
                   }
                   $("#Email").focus();
                }
                else{ 
                   $("#Email").removeClass('error');
                   $(".noti-error").remove();
                }
             }
          }); 
       }
       else{
        $("#Email").addClass('error');
        $("#Email").after("<div class='noti-error'>Email phải nhiều hơn 6 ký tự</div>");
       }

     });
//    check tên gian hàng
       $("#store_name").blur(function(){
       var store_name = $("#store_name");
       $(".noti-error").remove();
       if(store_name.val().length > 0)
       {
        $("#store_name").removeClass('error');
        $(".noti-error").remove();
          $.ajax({
             type: "POST",
             url: '/ajax/check_store_name.php',
             data: {store_name:$("#store_name").val()},
             success: function(data) {
                if(data == 1)
                {
                   if($("#store_name").hasClass("error") == false)
                   {
                      $("#store_name").addClass('error');
                      $("#store_name").after("<div class='noti-error'>Tên gian hàng đã có người đăng ký</div>");
                   }
                   $("#store_name").focus();
                }else if(data == 0){ 
                   $("#store_name").removeClass('error');
                   $(".noti-error").remove();
                }
             }
          }); 
       }
       else{
        $("#store_name").addClass('error');
        $("#store_name").after("<div class='noti-error'>Tên gian hàng không được để trống</div>");
       }

     });
//     check tên gian hàng
    
    $("#maps_address").blur(function(){   
       $(".noti-error_map").remove();
       if($("#maps_address").val().length > 6)
       {
        $("#maps_address").removeClass('error');
        $(".noti-error").remove();
       }
       else{
        $("#maps_address").addClass('error');
        $("#maps_address").after("<div class='noti-error_map'>Địa chỉ phải nhiều hơn 6 ký tự</div>");
       }

     });
      
 });