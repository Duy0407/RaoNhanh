<?
include("config.php");
session_start();
$show_popup_lienhe = 0;
$check = getValue("postok", "str", "POST", "");
if ($check != '') {
  $lienhe_name = getValue("lienhe_name", "str", "POST", "");
  $lienhe_name = trim($lienhe_name);
  $lienhe_name = replaceMQ($lienhe_name);

  $lienhe_diachi = getValue("lienhe_diachi", "str", "POST", "");
  $lienhe_diachi = trim($lienhe_diachi);
  $lienhe_diachi = replaceMQ($lienhe_diachi);

  $lienhe_phone = getValue("lienhe_phone", "str", "POST", 0);
  $lienhe_phone = trim($lienhe_phone);
  $lienhe_phone = replaceMQ($lienhe_phone);

  $lienhe_email = getValue("lienhe_email", "str", "POST", "");
  $lienhe_email = trim($lienhe_email);
  $lienhe_email = replaceMQ($lienhe_email);

  $lienhe_noidung = getValue("lienhe_noidung", "str", "POST", "");
  $lienhe_noidung = trim($lienhe_noidung);
  $lienhe_noidung = replaceMQ($lienhe_noidung);

  $token_lienhe = getValue("token_lienhe", "str", "POST", "");
  $token_lienhe = trim($token_lienhe);

  if ($lienhe_name != '' && $lienhe_diachi != '' && $lienhe_email != '' && $lienhe_phone != 0 && $lienhe_noidung != '' && $_SESSION['token_lienhe'] == $token_lienhe) {
    $query5 = new db_execute("INSERT INTO lienhe(lienhe_name,lienhe_diachi,lienhe_phone,lienhe_email,lienhe_noidung,lienhe_date,lienhe_type)
                 VALUES ('" . $lienhe_name . "','" . $lienhe_diachi . "','" . $lienhe_phone . "','" . $lienhe_email . "','" . $lienhe_noidung . "','" . time() . "',0)");
    $show_popup_lienhe = 1;
?>

    <div class="thongbao_thanhcong div_nangcap active">
      <div class="popup_thongbao">
        <span>GỬI THÔNG BÁO THÀNH CÔNG</span>
        <!--<i class="fa fa-times close_btn"></i>-->
        <div class="clear"></div>
        <div class="popup_dangtin_main popup_lienhe">
          <h3>Chúng tôi sẽ phải hồi lại với bạn trong thời gian sớm nhất.
          </h3>
        </div>
      </div>
    </div>
<?
  }
}
$token_lienhe = rand_string(20);
$_SESSION['token_lienhe'] = $token_lienhe;
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
?>
<!DOCTYPE html>
<html>

<head>
  <title>Liên hệ - raonhanh365</title>
  <meta name="keywords" content="Liên hệ, raonhanh365,rao vặt, rao vặt miễn phí" />
  <meta name="description" content="Liên hệ, đóng góp ý kiến cho chúng tôi qua: 1900633682. Raonhanh365.vn - trang rao vặt hiệu quả hàng đầu Việt Nam." />
  <meta property="og:title" content="Liên hệ - raonhanh365" />
  <meta property="og:description" content="Liên hệ, đóng góp ý kiến cho chúng tôi qua: 1900633682. Raonhanh365.vn - trang rao vặt hiệu quả hàng đầu Việt Nam." />
  <meta property="og:url" content="https://raonhanh365.vn/" />
  <meta name="language" content="vietnamese" />
  <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
  <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<" />
  <meta name="author" itemprop="author" content="raonhanh365.vn" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="content-language" itemprop="inLanguage" content="vi" />
  <meta name="robots" content="<?=$index?>" />
  <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
  <meta property="og:image:url" content="/" />
  <meta property="og:image:width" content="476" />
  <meta property="og:image:height" content="249" />
  <meta property="og:type" content="website" />
  <meta property="og:locale" content="vi_VN" />
  <meta name="revisit-after" content="1 days" />
  <meta name="page-topic" content="Mua bán rao vặt" />
  <meta name="resource-type" content="Document" />
  <meta name="distribution" content="Global" />
  <!--    -----tvt them  02/06--->
  <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" as="style" href="/css/jquery-ui.css" />
  <link rel="preload" href="/css/side_bar_nam.css" as="style">
  <link rel="preload" href="/css/import_product.css" as="style">
  <!--------------->
  <link rel="canonical" href="https://raonhanh365.vn" />
  <link rel="stylesheet" href="/fonts/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="/css/jquery-ui.css" />
  <link rel="stylesheet" href="/css/side_bar_nam.css">
  <link rel="stylesheet" href="/css/import_product.css">
  <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
  <!--<script type="text/javascript" src="/js/jquery-3.2.1.min.js"></script>-->
  <script type="text/javascript" src="/js/jquery-ui.js"></script>
  <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />
  <style>
    .popup_thongbao {
      height: 125px;
    }

    .popup_thongbao .popup_dangtin_main {
      text-align: center;
      /*border: 1px solid #cdcccc;*/
    }
  </style>
</head>

<body>
  <div class="header">
    <?
    $file = '../cache_file/sql_cache.json';
    $arraytong       = json_decode(file_get_contents($file), true);
    $arrcity         = $arraytong['db_city'];
    $db_cat          = $arraytong['db_cat'];

    include("../includes/common/inc_header.php"); ?>
    <div class="clear"></div>
  </div>
  <div class="breadcrumb">
    <div class="container">
      <ul>
        <li><a href="/">Trang chủ</a> &#155;</li>
        <li><a>Liên hệ</a></li>
      </ul>
    </div>
  </div>
  <div class="main_cate">
    <div class="container">
      <div class="side_bar col-3">
        <? include("../includes/cate/inc_left_cate.php") ?>
        <div id="filter-left-uutien" class="show_left_uutien">
          <?
          include('../includes/detail/tin_uu_tien.php');
          ?>
        </div>
      </div>
      <div class="content col-9">
        <div class="ct_title">
          <p id="abc">LIÊN HỆ VỚI CHÚNG TÔI</p>
        </div>
        <div class="main_lienhe">
          <div class="left_lh">
            <!--<img src="/images/map1.png" />-->

            <div class="map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3725.2050897002787!2d105.83110681476248!3d20.98441448602241!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ac5e3f87c6d7%3A0xe1640e64e47e222!2zMSBQLiBUcuG6p24gTmd1ecOqbiDEkMOhbiwgxJDhu4tuaCBDw7RuZywgSG_DoG5nIE1haSwgSMOgIE7hu5lpLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1648451222798!5m2!1sen!2s" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
              <div id="maps_maparea">
                <div id="maps_mapcanvas" style="margin-top:10px;" class="form-group" style="height:250px;"></div>
              </div>
            </div>
            <div class="update_add" style="display: none;">
              <input type="text" class="add_up" name="maps_address" id="maps_address" value="Số 245 Định Công - Hoàng Mai- Hà Nội" placeholder="Nhập tên địa chỉ" style="display: none;">
              <input type="text" class="form-control" name="maps[maps_mapcenterlat]" id="maps_mapcenterlat" value="20.982182500000008" style="display: none;" readonly="readonly">
              <input type="text" class="form-control" name="maps[maps_mapcenterlng]" id="maps_mapcenterlng" value="105.83290250000005" style="display: none;" readonly="readonly">
              <input type="text" class="form-control" name="maps[maps_maplat]" id="maps_maplat" value="20.9821825" style="display: none;" readonly="readonly">
              <input type="text" class="form-control" name="maps[maps_maplng]" id="maps_maplng" value="105.83290250000005" readonly="readonly" style="display: none;">
              <input type="text" class="form-control" name="maps[maps_mapzoom]" id="maps_mapzoom" style="display: none;" value="17" readonly="readonly">

            </div>

            <div class="col2">
              <p>Địa chỉ liên hệ</p>
              <div><span class="trang congty"><b>Công ty Cổ phần Thanh toán Hưng Hà</b></span></div>
              <div><span class="trang diachi"><b>Địa chỉ văn phòng:</b> Tầng 2, Số 1 đường Trần Nguyên Đán, Khu Đô Thị Định Công, Hoàng Mai, Hà Nội</span></div>
              <div><span class="trang emaillienhe"><b>Email:</b> Info@24hpay.vn</span></div>
              <div><span class="trang dienthoai"><b>Điện thoại:</b> 1900633682</span></div>
            </div>
          </div>
          <form method="POST" action="" onsubmit="return false;">
            <div class="right_lh">
              <div class="form-control">
                <div class="control1"><i class="sao">*</i>Họ tên:</div>
                <div class="control2"><input type="text" placeholder="Họ và tên" id="lienhe_name" name="lienhe_name" /></div>
              </div>
              <div class="form-control">
                <div class="control1"><i class="sao">*</i>Địa chỉ:</div>
                <div class="control2"><input type="text" placeholder="Địa chỉ liên hệ" name="lienhe_diachi" id="lienhe_diachi" /></div>
              </div>
              <div class="form-control">
                <div class="control1"><i class="sao">*</i>Điện thoại:</div>
                <div class="control2"><input type="text" class="numbersOnly2" placeholder="Điện thoại liên hệ" id="lienhe_phone" name="lienhe_phone" /></div>
              </div>
              <div class="form-control">
                <div class="control1"><i class="sao">*</i>Email:</div>
                <div class="control2"><input type="text" placeholder="Email liên hệ" id="lienhe_email" name="lienhe_email" /></div>
              </div>
              <div class="form-control">
                <div class="control1"><i class="sao">*</i>Nội dung:</div>
                <div class="control2"><textarea placeholder="Nội dung góp ý" id="lienhe_noidung" name="lienhe_noidung"></textarea></div>
              </div>
              <div class="form-control">
                <div class="control1">Mã xác nhận:</div>
                <div class="control2" style="position: relative;">
                  <div class="div_captcha">
                    <input type="text" class="bnmxn" id="lienhe_captcha" name="captcha" />
                    <p class="captcha">
                      <img class="" src="/classes/securitycode.php" />
                    <p href="javascript:;" onclick="reloadSecurityCode(this)" class="reset-icon reset-icon_2"></p>
                    </p>
                  </div>
                </div>
              </div>
              <input type="hidden" name="token_lienhe" value="<?= $token_lienhe ?>" />
              <input type="submit" id="btn_lienhe" onclick="checkpostdt_ih()" class="btn_dangky btn_update_left " value="Gửi phản hồi" name="postok" />
            </div>
          </form>
        </div>
      </div>
      <? include("../includes/home/inc_tag.php") ?>
    </div>
  </div>
  <script src="/js/lazysizes.min.js"></script>
  <!--<script src="/js/jquery-1.8.3.min.js"></script>-->
  <script defer src="/js/dangky.js?v=1"></script>
  <?php include("../includes/common/inc_footer.php") ?>
</body>

</html>
<script>
  function reload(id) {
    document.getElementById(id).src = document.getElementById(id).src;
  }

  function reloadSecurityCode(e) {
    $(e).parent().find("img").attr("src", "/classes/securitycode.php?t=" + Date.now());
  }

  //Kiểm tra số điện thoại
  jQuery(".numbersOnly").keyup(function() {
    this.value = this.value.replace(/[^0-9]/g, '');
    $('.numbersOnly').val($('.numbersOnly').val().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1."));
  });
  jQuery(".numbersOnly2").keyup(function() {
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

  function checkpostdt_ih() {
    var check = $(".main_lienhe form").attr("onsubmit");
    if (check == "return false;") {
      var captcha = $("#lienhe_captcha").val();
      $('.noti-error').remove();
      $("#lienhe_name").removeClass('error');
      $("#lienhe_phone").removeClass('error');
      $("#lienhe_email").removeClass('error');
      $("#lienhe_diachi").removeClass('error');
      $("#lienhe_noidung").removeClass('error');

      if ($("#lienhe_name").val() == '') {
        $("#lienhe_name").focus();
        $("#lienhe_name").addClass('error');
        $("#lienhe_name").after("<div class='noti-error'>Bạn chưa nhập họ tên</div>");;
      } else if ($("#lienhe_name").val().length < 7) {

        $("#lienhe_name").focus();
        $("#lienhe_name").addClass('error');
        $("#lienhe_name").after("<div class='noti-error'>Họ tên phải nhiều hơn 6 ký tự</div>");
      } else if ($("#lienhe_diachi").val() == '') {
        $("#lienhe_diachi").focus();
        $("#lienhe_diachi").addClass('error');
        $("#lienhe_diachi").after("<div class='noti-error'>Bạn chưa nhập địa chỉ</div>");;
      } else if ($("#lienhe_diachi").val().length < 10) {
        $("#lienhe_diachi").focus();
        $("#lienhe_diachi").addClass('error');
        $("#lienhe_diachi").after("<div class='noti-error'>Địa chỉ phải nhiều hơn 10 ký tự</div>");
      } else if ($("#lienhe_phone").val() == '') {
        $("#lienhe_phone").focus();
        $("#lienhe_phone").addClass('error');
        $("#lienhe_phone").after("<div class='noti-error'>Bạn chưa nhập số điện thoại</div>");
      } else if ($("#lienhe_phone").val().length < 10) {
        $("#lienhe_phone").focus();
        $("#lienhe_phone").addClass('error');
        $("#lienhe_phone").after("<div class='noti-error'>Số điện thoại không hợp lệ</div>");
      } else if ($("#lienhe_email").val() == '') {
        $("#lienhe_email").focus();
        $("#lienhe_email").addClass('error');
        $("#lienhe_email").after("<div class='noti-error'>Bạn chưa nhập email</div>");
      } else if (validateEmail($("#lienhe_email").val()) == false) {
        $("#lienhe_email").focus();
        $("#lienhe_email").addClass('error');
        $("#lienhe_email").after("<div class='noti-error'>Địa chỉ email không đúng định dạng</div>");
      } else if ($("#lienhe_noidung").val() == 0) {
        $("#lienhe_noidung").focus();
        $("#lienhe_noidung").addClass('error');
        $("#lienhe_noidung").after("<div class='noti-error'>Bạn chưa nhập nội dung</div>");
      } else if ($("#lienhe_noidung").val().length < 10) {
        $("#lienhe_noidung").focus();
        $("#lienhe_noidung").addClass('error');
        $("#lienhe_noidung").after("<div class='noti-error'>Nội dung phải nhiều hơn 10 ký tự</div>");
      } else if (captcha == "") {
        $("#lienhe_captcha").focus();
        $("#lienhe_captcha").addClass('error');
        $(".div_captcha").after("<div class='control2 noti-error'>Xin vui lòng nhập mã captcha!</div>");
      } else if (captcha.length < 5) {
        $("#lienhe_captcha").focus();
        $("#lienhe_captcha").addClass('error');
        $(".div_captcha").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
      } else if (captcha < 5) {
        $("#lienhe_captcha").focus();
        $("#lienhe_captcha").addClass('error');
        $(".div_captcha").after("<div class='control2 noti-error'>Mã captcha phải đủ 5 ký tự!</div>");
      } else {
        $.ajax({
          url: "../ajax/getcode.php",
          type: "POST",
          data: {
            'code': captcha
          },
          success: function(data) {
            if (data == 0) {
              if ($("#lienhe_captcha").hasClass("error") == false) {
                $("#lienhe_captcha").addClass('error');
                $(".reset-icon").click();
              }
              $("#lienhe_captcha").focus();
              $(".reset-icon_2").click();
              $(".div_captcha").after("<div class='noti-error'>Mã bảo mật bạn nhập không chính xác. Xin vui lòng nhập lại</div>");
            } else {
              $("#lienhe_captcha").removeClass('error');
              $(".noti-error").remove();
              $(".main_lienhe form").attr("onsubmit", "return true;");
              $("#btn_lienhe").click();

            }

          }
        });
      }
    }
  }
</script>
<!-- <script src="/js/map.js" type="text/javascript"></script> -->
<?
if ($show_popup_lienhe == 1) { ?>
  <script>
    setTimeout(function() {
      $(".thongbao_thanhcong").removeClass("active");
    }, 5000);
  </script>
<? } ?>