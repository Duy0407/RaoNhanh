<?
include("config.php");
include("version.php");
if (isset($_POST["btn_phanhoi"])) {
    $hoten = $_POST["hoten"];
    $diachi = $_POST["diachi"];
    $sdt = $_POST["sdt"];
    $Email = $_POST["lh_Email"];
    $noidung = $_POST["noidung"];
    if ($hoten == "" || $diachi == "" || $sdt == "" | $Email == "" | $noidung == "") {
        echo "bạn vui lòng nhập đầy đủ thông tin";
    }
    else{
        $insert = new db_query("INSERT INTO lienhe(
            lienhe_name,
            lienhe_diachi,
            lienhe_phone,
            lienhe_email,
            lienhe_noidung,
            lienhe_date,
            lienhe_type
            ) VALUES (
            '".$hoten."',
            '".$diachi."',
            '".$sdt."',
            '".$Email."',
            '".$noidung."',
            '".time()."',
            1
            )");
     }

}
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
    <title>Liên Hệ</title>
    <meta name="robots" content="noindex,nofollow"/>
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
    <link rel="preload" as="style" href="/css/vieclam/style.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/style.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> 
    <!-- <link rel="preload" as="style" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>">
    <link rel="stylesheet" type="text/css" href="/css/vieclam/vieclamraonhanh.css?v=<?=$version;?>" media="all" onload="if (media != 'all')media='all'"> -->
    <style>
        .menu-01 .images {
            position: relative;
        }
    </style>
</head>
<body>
    <? include("../includes/vieclam/header1.php"); ?>
    <div class="container-lienhe">
        <div class="row">
            <div class="dumb">
                <a href="/viec-lam.html">Trang chủ</a>
                <span class="line">/</span>
                <a href="#" class="name">Liên hệ</a>
            </div>
            <div class="lienhe-top">
                <div class="lienhe-right">
                    <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/lien-he.png" alt="Liên hệ">
                </div>
                <div class="lienhe-left">
                    <h1 class="tt-lienhe">Liên hệ với chúng tôi</h1>
                    <h2 class="cty">Công ty Cổ phần Thanh toán Hưng Hà</h2>
                    <p class="email"><img width="20" height="17" class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/maillh.png" alt="email liên hệ"> Email: Info@24hpay.vn</p>
                    <p class="sdt"><img width="20" height="20" class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/phonelh.png" alt="số điện thoại liên hệ"> Điện thoại: 1900633682</p>
                    <div class="diachi">
                        <img width="20" height="28" class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/maplh.png" alt="địa chỉ" style="float: left;margin-right: 8px;"> 
                        <p class="dia_chi_s">Địa chỉ văn phòng: Thôn Thanh Miếu - Xã Việt Hưng - Huyện Văn Lâm - Tỉnh Hưng Yên</p>
                    </div>
                    <div class="share"></div>
                </div>
            </div>
            <div class="lienhe-bottom">
                <div class="left-lh">
                    <!-- <picture>
                        <source media="(min-width: 1024px)" srcset="/images/vieclam/maplh-mb.jpg">
                        <img class="lazyload" src="/images/loading.gif" data-src="/images/vieclam/maplienhe.jpg" alt="Flowers" style="width:100%;">
                    </picture> -->
                    <div class="map">
                        <div id="maps_maparea">
                        <iframe class="lazyload gg_map" src="/images/loading.gif" data-src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d59607.67254986716!2d106.0904987!3d20.9734064!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135a1609eb96f5f%3A0x1bb6d1c5f17e2730!2zQ8O0bmcgdHkgY-G7lSBwaOG6p24gdGhhbmggdG_DoW4gaMawbmcgaMOg!5e0!3m2!1svi!2s!4v1621041870093!5m2!1svi!2s"  style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                        </div>
                    </div>
                    <p>Ghé thăm chúng tôi tại: Thôn Thanh Miếu - Xã Việt Hưng - Huyện Văn Lâm - Tỉnh Hưng Yên </p>
                </div>
                <div class="right-lh">
                    <form action="" method="post"  onsubmit="return false;">
                        <div class="form-lh">
                            <label for="">Họ và tên <span>*</span></label>
                            <input type="text" name="hoten" id="hoten" placeholder="Nhập họ và tên">
                        </div>
                        <div class="form-lh">
                            <label for="">Địa chỉ <span>*</span></label>
                            <input type="text" name="diachi" id="diachi" placeholder="Nhập địa chỉ">
                        </div>
                        <div class="form-lh">
                            <label for="">Số điện thoại <span>*</span></label>
                            <input type="tel" name="sdt" id="sdt" placeholder="Nhập số điện thoại">
                        </div>
                        <div class="form-lh">
                            <label for="">Email <span>*</span></label>
                            <input type="text" name="lh_Email" id="lh_Email" placeholder="Nhập Email">
                        </div>
                        <div class="form-lh">
                            <label for="">Nội dung <span>*</span></label>
                            <textarea name="noidung" id="noidung" cols="30" rows="10" placeholder="Nội dung góp ý"></textarea>
                        </div>
                        <div class="form-lh">
                            <label for="">Mã xác nhận<span>*</span></label>
                            <input type="text" name="maxacnhan" id="maxacnhan" placeholder="Nhập mã xác nhận">
                            <p class="captcha">
                                <img class="" src="/classes/securitycode.php" height="45px"/>
                                <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon reset-icon_2"></p>
                            </p>
                        </div>
                        <div class="form-lh">
                            <label for=""></label>
                            <input type="submit"  onclick="checkpostdt_ih()" name="btn_phanhoi" id="btn_phanhoi" class="phanhoi" value="Gửi phản hồi">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <? include("../includes/vieclam/inc_footer.php"); ?>  
    <script defer>
    function reload(id) {
	document.getElementById(id).src = document.getElementById(id).src;
    }
    function reloadSecurityCode(e)
    {
    $(e).parent().find("img").attr("src","/classes/securitycode.php?t="+Date.now());
    }

    function checkpostdt_ih(){
        var check = $(".right-lh form").attr("onsubmit");
        if(check == "return false;"){
            var captcha =$("#maxacnhan").val();
            $('.noti-error').remove();
            $("#hoten").removeClass('error');
            $("#diachi").removeClass('error');
            $("#sdt").removeClass('error');
            $("#lh_Email").removeClass('error');
            $("#noidung").removeClass('error');
            if($("#hoten").val() == '')
            {
                $("#hoten").focus();
                $("#hoten").addClass('error');
                $("#hoten").after("<div class='noti-error'>Bạn chưa nhập họ tên</div>");
            }
            else if($("#hoten").val().length < 7)
            {
                
                $("#hoten").focus();
                $("#hoten").addClass('error');
                $("#hoten").after("<div class='noti-error'>Họ tên phải nhiều hơn 6 ký tự</div>");
            }
            else if($("#diachi").val() == '')
            {
                $("#diachi").focus();
                $("#diachi").addClass('error');
                $("#diachi").after("<div class='noti-error'>Bạn chưa nhập địa chỉ</div>");;
            }
            else if($("#diachi").val().length < 5)
            {
                $("#diachi").focus();
                $("#diachi").addClass('error');
                $("#diachi").after("<div class='noti-error'>Địa chỉ phải nhiều hơn 5 ký tự</div>");
            }
            else if($("#sdt").val() == '')
            {
                $("#sdt").focus();
                $("#sdt").addClass('error');
                $("#sdt").after("<div class='noti-error'>Bạn chưa nhập số điện thoại</div>");
            }
            else if($("#sdt").val().length < 10)
            {
                $("#sdt").focus();
                $("#sdt").addClass('error');
                $("#sdt").after("<div class='noti-error'>Số điện thoại không hợp lệ</div>");
            }
            else if($("#lh_Email").val() == '')
            {
                $("#lh_Email").focus();
                $("#lh_Email").addClass('error');
                $("#lh_Email").after("<div class='noti-error'>Bạn chưa nhập email</div>");
            }

            else if($("#noidung").val() == 0)
            {
                $("#noidung").focus();
                $("#noidung").addClass('error');
                $("#noidung").after("<div class='noti-error'>Bạn chưa nhập nội dung</div>");
            }else if($("#noidung").val().length < 10)
            {
                $("#noidung").focus();
                $("#noidung").addClass('error');
                $("#noidung").after("<div class='noti-error'>Nội dung phải nhiều hơn 10 ký tự</div>");
            }
            else if(captcha == "")
            {
            $("#maxacnhan").focus();
            $("#maxacnhan").addClass('error');
            $(".form-lh").after("<div class='control2 noti-error'>Xin vui lòng nhập mã captcha!</div>");
            }
            else if(captcha.length < 5)
            {
            $("#maxacnhan").focus();
            $("#maxacnhan").addClass('error');
            $(".form-lh").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
            }
            else if(captcha < 5)
            {
            $("#maxacnhan").focus();
            $("#maxacnhan").addClass('error');
            $(".form-lh").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
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
                            if($("#maxacnhan").hasClass("error") == false)
                            {
                                $("#maxacnhan").addClass('error');
                                $(".reset-icon").click();
                            }
                            $("#maxacnhan").focus();
                            $(".reset-icon_2").click();
                            $(".form-lh").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>");
                        }
                        else{ 
                        $("#maxacnhan").removeClass('error');
                        $(".noti-error").remove();
                        $(".right-lh form").attr("onsubmit","return true;");
                        $("#btn_phanhoi").click();
                        alert('Gửi phản hồi thành công!!!');
                        
                    }  
                        
                    }
                });
            }
        }
    }
</script>
</body>
</html>