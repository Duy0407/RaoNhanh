<?
include("config_vl.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <meta name="robots" content="noindex,nofollow" />
    <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css" />
    <link rel="stylesheet" href="../css/style_new/style.css">
</head>

<body>
    <div class="dangnhap-container">
        <div class="logo">
            <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/logo_vl.png" alt="logo">
        </div>
        <div class="row">
            <div class="form-dn">
                <h1 class="tt-dangnhap">Đăng nhập tài khoản</h1>
                <form action="/home/dangnhap_xl.php" method="post" enctype="multipart/form-data" onsubmit="return checklogin();">
                    <input type="text" name="username" id="tendangnhap" placeholder="Email / Tên đăng nhập">
                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Mật khẩu">
                        <div class="eye slash" onclick="togglePW()"></div>
                    </div>
                    <button type="submit" name="btn_submit" class="btn_submit">Đăng nhập</button>
                    <input type="radio" name="luuMK" id="luuMK">
                    <span>Lưu mật khẩu</span>
                    <a href="/quen-mat-khau-vl.html" class="QMK">Quên mật khẩu ?</a>
                </form>
                <p>Bạn chưa có tài khoản? <span><a href="/dangky-vl.html">ĐĂNG KÝ NGAY</a> </span> </p>
            </div>
            <div class="images-dn">
                <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/bg_dn.png" alt="Đăng nhập">
            </div>
        </div>
    </div>
    <? include("../includes/vieclam/inc_footer.php"); ?>
    <script>
        function checklogin() {
            $("#tendangnhap").removeClass("error");
            $("#password").removeClass("error");
            $(".noti-error").remove();
            if ($("#tendangnhap").val() == '') {
                $("#tendangnhap").addClass("error");
                $("#tendangnhap").after("<div class='noti-error'>Bạn chưa nhập username</div>");
            }
            if ($("#password").val() == '') {
                $("#password").addClass("error");
                $("#password").after("<div class='noti-error'>Bạn chưa nhập pass</div>");
            }
            if ($("form").find('.error').length == 0) {
                $(this).submit();
            } else {
                return false;
            }
        }
        $("#tendangnhap,#password").keyup(function() {
            $(this).prev('div').text('');
            $(this).removeClass('error');
        })

        function togglePW() {
            document.querySelector('.eye').classList.toggle('slash');
            var password = document.querySelector('[name=password]');
            if (password.getAttribute('type') === 'password') {
                password.setAttribute('type', 'text');
            } else {
                password.setAttribute('type', 'password');
            }
        }
    </script>
</body>

</html>