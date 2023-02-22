//js google map



//end update map
//end js map

//code js check update

//        chek so dien thoai
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
function checkpostdt($id){
    $(".noti-error").remove();
    $(".noti-ok").remove()
    $(".noti-error_map").remove();
    $("#Hoten_info").removeClass('error');
    $("#Phone").removeClass('error');
    $("#Email").removeClass('error');
    if($("#Hoten_info").val() == '')
    {
        $("#Hoten_info").focus();
        $("#Hoten_info").addClass('error');
        $("#Hoten_info").after("<div class='noti-error'>Bạn chưa nhập họ tên</div>");;
    }
    else if($("#Hoten_info").val().length < 7)
    {
        $("#Hoten_info").focus();
        $("#Hoten_info").addClass('error');
        $("#Hoten_info").after("<div class='noti-error'>Họ tên phải nhiều hơn 6 ký tự</div>");
    }
    else if($("#Email_info").val() == '')
    {
        $("#Email_info").focus();
        $("#Email_info").addClass('error');
        $("#Email_info").after("<div class='noti-error'>Bạn chưa nhập email</div>");
    }
    else if(validateEmail($("#Email_info").val()) == false)
   {
        $("#Email_info").focus();
        $("#Email_info").addClass('error');
        $("#Email_info").after("<div class='noti-error'>Địa chỉ email không đúng định dạng</div>");
   }
    else if($("#Phone_info").val() == '')
    {
        $("#Phone_info").focus();
        $("#Phone_info").addClass('error');
        $("#Phone_info").after("<div class='noti-error'>Bạn chưa nhập số điện thoại</div>");
    }
    else if($("#city_info").val() == '0')
    {
        $('html, body').animate({
            scrollTop: $("#gender_info").offset().top
        }, 500);
        $("#city_info").addClass('error');
        $("#city_info").after("<div class='noti-error'>Bạn chưa chọn khu vực</div>");
    }
    else if($("#store_name").val() == '')
    {
        $('html, body').animate({
            scrollTop: $("#gender_info").offset().top
        }, 500);
        $("#store_name").addClass('error');
        $("#store_name").after("<div class='noti-error'>Bạn chưa nhập tên gian hàng</div>");
    }
    else
    {
      $.ajax({
         url: "/ajax/update_thongtin_tk_gianhang.php",
         type: "POST",
         data: {
         'user_id':     $id,
         'email':       $('#Email_info').val(),
         'name' :       $("#Hoten_info").val(),
         'gender':      $("#gender_info").val(),
         'ngay_sinh':   $(".slngay_info").val(),
         'thang':       $(".slthang_info").val(),
         'nam':         $(".slnam_info").val(),
         'phone':       $("#Phone_info").val(),
         'city_info':   $("#city_info").val(),
         'nghe':        $("#Jop_info").val(),
         'category':    $("#category_info").val(),
         'web':         $("#web_info").val(),
         'face':        $("#face_info").val(),
         'sky':         $("#sky_info").val(),
         'store_name':  $("#store_name").val()
         },
         success: function(data){
            if(data == 0)
            {
                   if($("#captcha").hasClass("error") == false)
                   {
                      $("#captcha").addClass('error');
                      $(".reset-icon").click();
                   }
                   $("#captcha").focus();
                   $(".reset-icon").click();
                   $("#div_captcha").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>");
            }
            else{
               $("input").removeClass("error");
               $("#captcha").removeClass('error');
               $(".noti-error").remove();
               $('.popup_dt_thanhcong').removeClass('hidden');
               setTimeout(function(){   
                    $('.popup_dt_thanhcong').addClass('hidden');
                }, 4000);
           }  
            
         }
      });
   }
}
$('.pickfile').click(function (){
    $("#file_upload").click()
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
             url: '/ajax/checkmail.php',
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
     
// update file img    

    

     
     
 });
//end code js check update