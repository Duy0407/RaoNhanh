<?
include("config.php");
include("version.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.googletagmanager.com">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="dns-prefetch" href="https://www.googletagmanager.com">

    <link rel="preload" href="/fonts/OpenSans-Bold.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    <link rel="preload" href="/fonts/OpenSans-Regular.ttf" as="font" crossorigin="anonymous">
    <link rel="preload" href="/fonts/OpenSans-Light.ttf" as="font" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng tin miễn phí</title>
    <meta name="robots" content="noindex,nofollow"/>

    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'">
    <!-- <link rel="preload" as="style" href="/css/vieclam/header2.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/header2.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> -->
</head>
<body>
    <div class="dangtinmienphi">
        <div class="row">
            <div class="dumb" style="width:auto">
                <a class="blog_undo" href="/viec-lam.html" rel="nofollow">
                    <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/quaylai.png" alt="quay lại">
                </a>
            </div>
            <div class="dtmp">
                <div class="left">
                    <div class="images">
                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/anh.png" alt="đăng tin">
                    </div>
                </div>
                <?
                if(isset($_COOKIE['UID']) && !empty($_COOKIE['UID']))
                {
                ?>
                <div class="right">
                    <h1 class="dangtin-mp">Đăng tin miễn phí</h1>
                    <div class="tintuyendung">
                        <a href="/dang-tin-tuyen-dung.html">
                            <p class="td">Đăng tin tuyển dụng</p>
                        </a>
                    </div>
                    <div class="tintimviec" >
                        <a href="/dang-tin-tim-viec.html">
                            <p class="tv1">Đăng tin tìm việc làm</p>
                        </a>
                    </div>
                </div>
                <?}
                else{
                ?>
                <div class="right">
                    <h1 class="dangtin-mp">Đăng tin miễn phí</h1>
                    <div class="tintuyendung">
                        <a href="javascript:void(0)" onclick="show_reg(this,'popup-login')">
                            <p class="td">Đăng tin tuyển dụng</p>
                        </a>
                    </div>
                    <div class="tintimviec">
                        <a href="javascript:void(0)" onclick="show_reg(this,'popup-login')">
                            <p class="tv1">Đăng tin tìm việc làm</p>
                        </a>
                    </div>
                </div>
                <?
                }
                ?>
                <!-- <div class="right">
                    <h1 class="dangtin-mp">Đăng tin miễn phí</h1>
                    <div class="tintuyendung">
                        <a href="/dang-tin-tuyen-dung.html">
                            <p class="td">Đăng tin tuyển dụng</p>
                        </a>
                    </div>
                    <div class="tintimviec">
                        <a href="/dang-tin-tim-viec.html">
                            <p class="tv">Đăng tin tìm việc làm</p>
                        </a>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="dangtin-mb">
        <div class="row">
            <div class="dtmp">
                <a class="blog_undo" href="/viec-lam.html" rel="nofollow"><img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/quaylai_mb.png" alt="quay lại"></a>
                <?
                if(isset($_COOKIE['UID']) && !empty($_COOKIE['UID']))
                {
                ?>
                <div class="right">
                    <h1 class="dangtin-mp">Đăng tin miễn phí</h1>
                    <div class="tintuyendung">
                        <a href="/dang-tin-tuyen-dung.html">
                            <p class="td">Đăng tin tuyển dụng</p>
                        </a>
                    </div>
                    <div class="tintimviec">
                        <a href="/dang-tin-tim-viec.html">
                            <p class="tv">Đăng tin tìm việc làm</p>
                        </a>
                    </div>
                </div>
                <?}
                else{
                ?>
                <div class="right">
                    <h1 class="dangtin-mp">Đăng tin miễn phí</h1>
                    <div class="tintuyendung">
                        <a href="javascript:void(0)" onclick="show_reg(this,'popup-login')">
                            <p class="td">Đăng tin tuyển dụng</p>
                        </a>
                    </div>
                    <div class="tintimviec">
                        <a href="javascript:void(0)" onclick="show_reg(this,'popup-login')">
                            <p class="tv">Đăng tin tìm việc làm</p>
                        </a>
                    </div>
                </div>
                <?
                }
                ?>
                <div class="left">
                    <div class="images">
                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/anh.png" alt="đăng tin">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <? include("../includes/vieclam/inc_footer.php"); ?>
    <div class="popup-login" id="popup-login">
        <div class="s-modal-content">
            <form id="loginForm_1" method="POST" action="/home/dangnhap.php" enctype="multipart/form-data" onsubmit="return checklogin();">
                <h5>ĐĂNG NHẬP TÀI KHOẢN</h5>
                <div class="main_login">
                        <div class="p_username">
                            <i><img src="/images/ic_us.png"></i>
                            <input type="text" class="input_acc" placeholder="Tên đăng nhập" id="user" name="user" value=""/>
                        </div>
                        <div class="clear"></div>
                        <div class="p_password">
                            <i><img src="/images/ic_pass.png"></i>
                            <input type="password" class="input_pass" placeholder="Mật khẩu" id="Password5" name="Password5" value=""/>
                        </div>
                    <div class="save_login check_cb">
                        <label class="btn_register_2"><a class="show_reg" href="javascript:void(0)" onclick="show_reg(this,'box_singup')">Đăng ký tài khoản</a></label>
                        <a href="/quen-mat-khau.html" title="Quên mật khẩu" rel="nofollow">Quên mật khẩu?</a>
                    </div>
                    <div class="btn_sub_login">
                        <input type="submit" id="signin_submit" value="Đăng nhập" tabindex="6"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end-popup-login -->
        <div class="box_singup popup-login" id="box_singup"  style="display: none;">
            <div class="popup_register">
                <span>ĐĂNG KÝ TÀI KHOẢN CÁ NHÂN</span>
                <a href="javascript:void(0)" class="close" onclick="hide_reg('box_singup')"><i class="close_btn"></i></a>
                <div class="main_register">
                    <form  method="POST" action="/home/dangky.php" onsubmit="return false;">
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Tên tài khoản:</div>
                        <div class="control2"><input type="text" placeholder="Nhập tên tài khoản"  id="usernamedk" name="usernamedk"/></div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Mật khẩu:</div>
                        <div class="control2"><input placeholder="**********" maxlength="16" id="password" name="password" type="password" /></div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Nhập lại mật khẩu:</div>
                        <div class="control2"><input placeholder="**********" maxlength="16"  id="repassword" name="repassword" type="password"/></div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Họ và tên:</div>
                        <div class="control2"><input type="text" placeholder="Nhập họ tên" maxlength="20"  id="Hoten" name="Hoten" value=""/></div>
                    </div>
                    <div class="form_control">
                        <div class="control1">Giới tính:</div>
                        <div class="control2">
                        <select id="gender" name="gender">
                            <option value="2">Giới tính</option>
                            <option value="0">Nam</option>
                            <option value="1">Nữ</option>
                        </select>
                        </div>
                    </div>
                    <div class="form_control">
                        <div class="control1">Ngày sinh:</div>
                        <div class="control2">
                            <select id="slngay" name="slngay">
                            <option value='00'>Ngày</option>
                            <? $i=1; while($i<=31){
                                echo "<option value='$i'>$i</option>";
                                $i++;}?>
                            </select>
                            <select id="slthang" name="slthang">
                            <option value='00'>Tháng</option>
                                <? $j=1; while($j<=12){
                                echo "<option value='$j'>$j</option>";
                                $j++;}?>
                            </select>
                            <select id="slnam" name="slnam">
                            <option value='0000'>Năm</option>
                                <? $h= date("Y"); while($h>=1912){
                                echo "<option value='$h'>$h</option>";
                                $h--;}?>
                            </select>
                        </div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Email:</div>
                        <div class="control2"><input type="text" placeholder="Nhập email"  id="Email" name="Email" value=""/></div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                        <div class="control2"><input class="numbersOnly2" type="text" placeholder="Nhập số điện thoại" id="Phone"name="Phone" value=""/></div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Khu vực:</div>
                            <div class="control2">
                            <select id="city" name="city">
                                <option value="0">Chọn thành phố</option>
                                <?
                                foreach ($arrcity as $key => $value_ci) {
                                        echo "<option value='".$value_ci['cit_id']."'>".$value_ci['cit_name']."</option>";
                                    }
                                ?>
                                </select>
                        </div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Địa chỉ liên hệ:</div>
                        <div class="control2"><input type="text" placeholder="Nhập địa chỉ" id="address" name="address" value=""/></div>
                    </div>
                    <div class="form_control">
                        <div class="control1"><i class="sao">*</i>Mã xác nhận:</div>
                        <div class="control2" style="position: relative;">
                            <div id="div_captcha">
                                <input type="text" class="bnmxn" id="captcha" name="captcha"/>
                                <p class="captcha">
                                    <img class="" src="/classes/securitycode.php"/>
                                    <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                                </p>
                            </div>
                        </div>
                    </div>
                    <input type="submit" onclick="checkpostdt();" class="btn_dangky" value="Đăng ký" name="postok"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(window).click(function(event){
        if($(event.target).hasClass('popup-login')){
            $(event.target).hide();
        }
    });

    </script>
</body>
</html>