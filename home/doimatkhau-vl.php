<? 
include("config_vl.php");
require_once('../functions/send_mail_vl.php');
if(isset($_COOKIE['UID']))
{
  redirect('/viec-lam.html');
}
else
{
   $reset_token = getValue('reset_token','str','GET','');
   $reset_token = replaceMQ($reset_token);

   $id = getValue('id','int','GET',0);
   $id = replaceMQ($id);

   $sql_get = new db_query("SELECT usc_pass FROM user WHERE usc_id = ".$id);
   if(mysql_num_rows($sql_get->result) == 0)
   {
      echo "Không tồn tại ID";
      die;
   }
   else
   {
      $row = mysql_fetch_assoc($sql_get->result);
      $token = $row['usc_pass'];
      
      if($token != $reset_token)
      {
         echo "Password không trùng nhau !!!";
         die;
      }
   }
}
?>
<!DOCTYPE html>
<html>
<head><title>Đổi mật khẩu</title>
<meta name="robots" content="noindex,nofollow"/>
   <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
   <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css" />
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
   <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
   <script type="text/javascript" src="/js/jquery-ui.js"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
</head>
<body>
<section class="doimatkhau">
<div class="logo">
    <img src="/images/vieclam/logo_vl.png" alt="logo">
</div>
<div class="main_cate">
   <div class="container">
      <div class="right_box_quenmk">
         <div class="top_quenmk">
            <h1>Đổi mật khẩu</h1>
         </div>
         <form id="frm_doimk" action="" method="POST" onsubmit="return check_doiMk()">
           <table>
              <tr>
                 <td>
                    <input type="password" id="first_password" name="first_password" placeholder="Mật khẩu">
                    <div class="eye slash" onclick="togglePW(this)"></div>
                 </td>
              </tr>
              <tr>
                 <td>
                    <input type="password" id="second_password" name="second_password" placeholder="Mật khẩu">
                    <div class="eye slash" onclick="togglePW(this)"></div>
                 </td>
              </tr>
              <tr>
                 <td></td>
                 <td>
                    <p class="mktt">* Mật khẩu tối thiểu 6 ký tự</p>
                    <input type="submit" name="Submit" class="btn" value="Cập nhật">
                 </td>
              </tr>
           </table>
         </form>
      </div>
      
   </div>
</div>
</section>
<script>
   function check_doiMk()
   {
      var returnSubmit = false;
      var first_password = $('#first_password');
      var second_password = $('#second_password');

      if(first_password.val() == '')
      {
         if(first_password.hasClass('error') == false)
         {
            first_password.addClass('error');
            alert("Vui lòng nhập mật khẩu mới !!!");
         }
         first_password.focus;
         return false;
      }
      else
      {
         first_password.removeClass('error');
      }
      if(second_password.val() == '')
      {
         if(second_password.hasClass('error') == false)
         {
            second_password.addClass('error');
            alert("Vui lòng nhập xác nhận mật khẩu");
         }
         second_password.focus();
         return false;
      }
      else
      {
         second_password.removeClass('error');
      }
      if(first_password.val().length < 7)
      {
         if(first_password.hasClass('error') == false)
         {
            first_password.addClass('error');
            alert("Mật khẩu phải lớn hơn 7 kí tự");
         }
         first_password.focus();
         return false;
      }
      else
      {
         first_password.removeClass('error');
      }
      if(first_password.val() != second_password.val())
      {
         if(second_password.hasClass('error') == false)
         {
            second_password.addClass('error');
            alert("Mật khẩu xác nhận phải trùng khớp");
         }
         console.log(first_password.val());
         console.log(second_password.val());
         second_password.focus();
         return false;
      }
      else
      {
         $.ajax({
            type:"POST",
            url: "/ajax/doimk_complete.php",
            data:{
               id: <?= getValue("id","str","GET","") ?>,
               password: first_password.val()
            },
            success:function(data)
            {
               alert("Đổi mật khẩu thành công, vui lòng đăng nhập lại");
               window.location.href = '/viec-lam.html';
            },
            error:function(data)
            {
               console.log(data);
            }
         });
      }
      return returnSubmit;
   }
</script>
<script>
        function togglePW(t) {
            // document.querySelector('.eye').classList.toggle('slash');
            $(t).toggleClass("slash");
            var password = document.querySelector('[name=password]');
            if (password.getAttribute('type') === 'password') {
                password.setAttribute('type', 'text');
            } else {
                password.setAttribute('type', 'password');
            }
        }
        // $('.eye').click(function(){
        //     // $('.eye').removeClass("slash");
        //     $(this).toggleClass("slash");
        //     return false;
        // })
    </script>
</body>
</html>