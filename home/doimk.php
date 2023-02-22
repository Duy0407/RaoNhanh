<? 
include("config.php");
require_once('../functions/send_mail.php');
if(isset($_COOKIE['UID']))
{
  redirect('/');
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
   <meta name="keywords" content="Hướng dẫn sử dụng trang Raonhanh365"/>
   <meta name="description" content="Hướng dẫn sử dụng"/>
   <meta property="og:title" content="Hướng dẫn sử dụng"/>
   <meta property="og:description" content="Hướng dẫn sử dụng"/>
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
   <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css"/>
   <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
   <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
   <script type="text/javascript" src="/js/jquery-ui.js"></script>
   <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
</head>
<body>
<? include("../includes/common/inc_header.php") ?>
<section>

<div class="main_cate">
   <div class="container">
      <div class="right_box_quenmk">
         <div class="top_quenmk">
            <h1>Đổi mật khẩu</h1>
         </div>
         <form id="frm_doimk" action="" method="POST" onsubmit="return check_doiMk()">
           <table>
              <tr>
                 <td>Mật khẩu mới: </td>
                 <td><input type="password" id="first_password" name="first_password"></td>
              </tr>
              <tr>
                 <td>Xác nhận mật khẩu: </td>
                 <td><input type="password" id="second_password" name="second_password"></td>
              </tr>
              <tr>
                 <td></td>
                 <td><input type="submit" name="Submit" value="Đổi mật khẩu"></td>
              </tr>
           </table>
         </form>
      </div>
      
   </div>
</div>
</section>
<? include("../includes/common/inc_footer.php") ?>
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
               window.location.href = '/';
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
</body>
</html>