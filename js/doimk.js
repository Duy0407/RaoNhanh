function checkpass(user){
   var captcha =$("#macaptcha").val();
   $("#mkcu").removeClass("error");
   $("#mkmoi1").removeClass("error");
   $("#mkmoi2").removeClass("error");
   $(".noti-error").remove();
   if($("#mkcu").val() == '')
   {
      $("#mkcu").addClass("error");
      $("#mkcu").after("<div class='noti-error'>Bạn chưa nhập mật khẩu cũ</div>");
   }
   else if($("#mkcu").val().length < 7)
   {
      $("#mkcu").addClass("error");
      $("#mkcu").after("<div class='noti-error'>Mật khẩu cũ phải nhiều hơn 6 ký tự</div>");
   }
   else if($("#mkmoi1").val()== '')
   {
      $("#mkmoi1").addClass("error");
      $("#mkmoi1").after("<div class='noti-error'>Bạn chưa nhập mật khẩu mới</div>");
   }
   else if($("#mkmoi1").val().length < 7)
   {
      $("#mkmoi1").addClass("error");
      $("#mkmoi1").after("<div class='noti-error'>Mật khẩu mới phải lớn hơn 6 ký tự</div>");
   }
       else if($("#mkmoi2").val() == '')
    {
        $("#mkmoi2").focus();
        $("#mkmoi2").addClass('error');
        $("#mkmoi2").after("<div class='noti-error'>Bạn chưa nhập lại mật khẩu</div>");
    }
    else if($("#mkmoi2").val().length < 7)
    {
        $("#mkmoi2").focus();
        $("#mkmoi2").addClass('error');
        $("#mkmoi2").after("<div class='noti-error'>Mật khẩu nhập lại phải nhiều hơn 6 ký tự</div>");
    }
    else if($("#mkmoi2").val() != $("#mkmoi1").val())
    {
        $("#mkmoi2").focus();
        $("#mkmoi2").addClass('error');
        $("#mkmoi2").after("<div class='noti-error'>Mật khẩu nhập lại không trùng nhau</div>");
    }
   else
   {    
      $.ajax({
         url: "../ajax/getcode.php",
         type: "POST",
         data: {
         'code': captcha
         },
         success: function(data){
            if(data == 0)
            {
                   if($("#macaptcha").hasClass("error") == false)
                   {
                      $("#macaptcha").addClass('error');
                      $(".reset-icon").click();
                   }
                   $("#macaptcha").focus();
                   $(".reset-icon").click();
                   $("#checkcaptcha").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>");
            }
            else{ 
               $("#macaptcha").removeClass('error');
               $(".noti-error").remove();
//               $(".main_doimk form").attr("onsubmit","return true;");
//               $(".btn_dangky").click();
               checkuserpass(user);
           }   
         }
      });
   } 
   return false;
}

function checkuserpass(user){
            $.ajax({
             type: "POST",
             url: '../ajax/doimk.php',
             data: {
                 user:user,
                 pass:$("#mkcu").val(),
                 passnew:$('#mkmoi1').val()
             },
             success: function(data) {
                if(data == 0)
                {
                   $("#mkcu").addClass('error');
                   $("#mkcu").after("<div class='noti-error'>Mật khẩu cũ không chính xác, bạn vui lòng thử lại.</div>");
                }
                else if(data == 1){ 
                    $(".main_doimk form").attr("onsubmit","return true;");
                    $(".btn_dangky").click();
                }else{
                    $("#mkcu").after("<div class='noti-error'>Mật khẩu cũ không chính xác, bạn vui lòng thử lại.</div>");
                }
             }
          });  
    return false;
}