function validateEmail($email) {
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
  return emailReg.test($email);
}

function check_QuenMK(){
    var returnSubmit = false;
    var email = $("#email_qmk");

    if(email.val() == '')
    {
      if(email.hasClass('error') == false)
      {
        email.addClass('error');
        alert("Vui lòng nhập vào địa chỉ Email");
      }
      email.focus();
    }
    else
    {
      email.removeClass('error');
      if(validateEmail(email.val()) == false)
      {
        if(email.hasClass('error') == false)
        {
          email.addClass('error');
          alert("Định dạng Email không đúng !!");
        }
        email.focus();
      }
      else
      {
        email.removeClass('error');

        $.ajax({
          type:"POST",
          url: "/ajax/checkmail.php",
          data: {email: email.val()},
          success:function(data)
          {
            if(data==0)
            {
              alert("Tài khoản này không tồn tại, vui lòng kiểm tra lại");
              email.addClass('error');
              email.focus();
            }
            else
            {
              $.ajax({
                type: "POST",
                url: "/ajax/quenMK.php",
                data:{email:email.val()},
                success:function(data)
                {
                  if(data == 1)
                  {
                    $('#frm_quenmk').addClass('hidden');
                    $('.quenMK_click').removeClass('hidden');
                  }
                  else
                  {
                    alert('Có lỗi !!!');
                  }
                },
                error:function(data)
                {

                }
              });
            }
          },
          error:function(data)
          {
            console.log(data);
          }

        });
      }
    }



    return returnSubmit;
}