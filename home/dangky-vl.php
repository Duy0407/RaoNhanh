<?
include("config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <meta name="robots" content="noindex,nofollow"/>
    <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css" />
</head>

<body>
<? 
$file = '../cache_file/sql_cache.json';
$arraytong       = json_decode(file_get_contents($file),true); 
$arrcity         = $arraytong['db_city'];
$db_cat          = $arraytong['db_cat'];?>
    <div class="dangky-container">
        <div class="logo">
            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/logo_vl.png" alt="logo">
        </div>
        <div class="row">
            <div class="form-dk">
                <form  method="post" action="/home/dangky_xl.php" onsubmit="return checklogin();">
                    <div class="left-form">
                        <input type="text" name="username" id="username" placeholder="Nhập tên tài khoản của bạn">
                        <input type="text" name="name" id="name" placeholder="Họ và tên">
                        <select name="city" id="city">
                            <option value="0">Chọn tỉnh/ thành phố</option>
                            <?
                            foreach($arrcity as $item=>$type)
                            {
                            ?>
                            <option <?= isset($citid)?($citid == $type['cit_id']?"selected":""):"" ?> value="<?= $type['cit_id'] ?>"><?= $type['cit_name'] ?></option>
                            <?
                            }
                            unset($db_city,$rowcit);
                            ?>
                        </select>
                        <input type="text" name="address" id="address" placeholder="Nhập địa chỉ cụ thể">
                    </div>
                    <div class="right-form">
                        <input type="tel" name="phonenumber" id="phonenumber" placeholder="Nhập số điện thoại">
                        <input type="text" name="email" id="email" placeholder="Nhập địa chỉ Email">
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Mật khẩu">
                            <div class="eye" onclick="togglePW(this)"></div>
                        </div>
                        <div class="form-group">
                            <input type="password" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu">
                            <div class="eye" onclick="togglePW(this)"></div>
                        </div>
                    </div>
                    <input type="radio" name="quydinh" id="quydinh">
                    <span>Đăng kí tài khoản đồng nghĩa với việc bạn đã chấp thuận thỏa thuận sử dụng và Quy định bảo mật của Raonhanh365.vn</span>
                    <div class="btn"><button type="submit" class="btn_dangky" name="btn_submit" id="btn_submit">Đăng ký</button></div>
                    <!-- <input type="submit" name="btn_submit" id="btn_submit" value="Đăng ký"> -->
                </form>
                <p class="dn">Bạn đã có tài khoản?  <span><a href="/dangnhap-vl.html"> ĐĂNG NHẬP NGAY </a></span></p>
            </div>
        </div>
    </div>
</body>
<script src="/js/lazysizes.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function checklogin(){
            $("#username").removeClass("error");
            $("#password").removeClass("error");
            $("#name").removeClass("error");
            $("#email").removeClass("error");
            $("#repassword").removeClass("error");
            $("#city").removeClass("error");
            $("#address").removeClass("error");
            $("#phonenumber").removeClass("error");
            $(".noti-error").remove();
            if($("#username").val() == '')
            {
                $("#username").addClass("error");
                $("#username").before("<div class='noti-error'>Bạn chưa nhập username</div>");
            }
            if($("#password").val() == '')
            {
                $("#password").addClass("error");
                $("#password").before("<div class='noti-error'>Bạn chưa nhập pass</div>");
            }
            if($("#name").val() == '')
            {
                $("#name").addClass("error");
                $("#name").before("<div class='noti-error'>Bạn chưa nhập họ tên</div>");
            }
            if($("#email").val() == '')
            {
                $("#email").addClass("error");
                $("#email").before("<div class='noti-error'>Bạn chưa nhập email</div>");
            }
            if($("#repassword").val() == '')
            {
                $("#repassword").addClass("error");
                $("#repassword").before("<div class='noti-error'>Bạn chưa nhập lại mật khẩu</div>");
            }
            
            if($("#city").val() == '')
            {
                $("#city").addClass("error");
                $("#city").before("<div class='noti-error'>Bạn chưa chọn thành phố</div>");
            }
            if($("#address").val() == '')
            {
                $("#address").addClass("error");
                $("#address").before("<div class='noti-error'>Bạn chưa nhập địa chỉ</div>");
            }
            if($("#phonenumber").val() == '')
            {
                $("#phonenumber").addClass("error");
                $("#phonenumber").before("<div class='noti-error'>Bạn chưa nhập sđt</div>");
            }
            if ($("form").find('.error').length == 0) {
                $(this).submit();
            } else {
                return false;
            }
        }
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
</html>