<? include("config.php");
$dk_ok_2 = 0;
if(isset($_COOKIE['dk_ok_2'])){
    $dk_ok_2    = $_COOKIE['dk_ok_2'];
}
if($dk_ok_2 ==1){?>
    <div class="thongbao_lammoi popup_dt_thanhcong dk_thanhcong">
        <div class="popup_delete">
            <span>ĐĂNG KÝ THÀNH CÔNG</span>
            <div class="clear"></div>
            <div class="popup_dangtin_main">
                <h3><span>Chào mừng bạn đã đến với Raonhanh365</span><br/>
                    <span>Nhấn <a>OK</a> đề vào trang quản lý tài khoản</span>
                </h3>
                <div class="div_btn_thongbao">
                    <div class="btn_lammoi" style="margin-left: 200px;"><a href="/doanh-nghiep/tong-quan-tai-khoai">OK</a></div>
                    <div class="btn_thoat"><a href="javascript:;">THOÁT</a></div>
                </div>
            </div>
        </div>
    </div>
<? }
setcookie('dk_ok_2', 1 ,time() - 3600,'/');
?>
<?php
//$index = "index, follow,noodp";
$index = "noindex, nofollow";
$title = "Rao vặt|Rao vặt miễn phí|Mạng xã hội rao vặt lớn nhất Việt Nam";
$keyword = "rao vặt, rao vặt miễn phí, rao vat, rao vat mien phi";
$description = "Mạng xã hội rao vặt, rao vặt miễn phí trên mọi lĩnh vực. Cập nhật hàng ngàn tin tức rao vặt mỗi ngày tại Raonhanh365.vn";
$canonical = "http://raonhanh365.vn/";
$url_image = "/";
?>
<!DOCTYPE html>
<html>
<head>
    <!--link meta seo-->
    <?php include "../includes/common/inc_header_link.php"?>
    <link rel="preload" as="image" href="/images/bg_bec.png">
    <link rel="preload" as="image" href="/images/reset-icon.webp">
    <link rel="preload" href="/css/style.min.css?v=37" as="style">
    <link rel="preload" href="/css/restyle.css" as="style">
    <link rel="preload" href="/css/home/header.css" as="style">
    <link rel="preload" href="/css/dk-tk-dn.css" as="style">
    <link rel="stylesheet" href="/css/dk-tk-dn.css" as="style">
    <link rel="stylesheet" href="/css/restyle.css" as="style">
    <script src="/js/jquery-1.8.3.min.js" type="text/javascript"></script>
    <script defer src="/js/jssor.slider-26.3.0.min.js" type="text/javascript"></script>
    <script defer src="/js/info.js" type="text/javascript"></script>
</head>
<style>
    .dangky_store{
        border: none;
        margin: 20px auto 50px;
        display: block;
        width: 117px;
        height: 27px;
        border-radius: 2px;
        background: #00a787 url(/images/bg_regis.png)no-repeat;
        position: relative;
        top: 15px;
        font-size: 12px;
        color: #ffffff;
        font-family: Roboto,sans-serif;
        padding-left: 45px;
        text-align: left;
        cursor: pointer;
    }
</style>
<body>
<!--<div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01"/>
</div>-->
<? include("../includes/common/inc_header.php") ?>
<section>
    <? include("../includes/info/inc_bread_crumb.php") ?>
    <div class="main_cate">
        <div class="container">
            <div class="box_nang_cap">
                <form  method="POST" action="/home/dangky_gianhang.php" onsubmit="return false;" enctype="multipart/form-data">
                    <h1>Đăng ký tài khoản doanh nghiệp</h1>
                    <div class="main_nangcap">
                        <div class="left_nangcap">
                            <div class="main_edit right_nangcap">
                                <h2>Thông tin chủ gian hàng</h2>

                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Logo:</div>
                                    <div class="control2"><input type="file" placeholder="Chọn logo" id="logo_gh" name="logo_gh" /></div>
                                </div>
                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Email:</div>
                                    <div class="control2"><input type="text" placeholder="Nhập email" id="email_gh" name="email_gh"/></div>
                                </div>
                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Mật khẩu:</div>
                                    <div class="control2"><input type="password" placeholder="**********" id="pass_gh1" name="pass_gh1" /></div>
                                </div>
                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Nhập lại mật khẩu:</div>
                                    <div class="control2"><input type="password" placeholder="**********" id="pass_gh2" name="pass_gh2"/></div>
                                </div>
                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Họ và tên:</div>
                                    <div class="control2"><input type="text" value="" placeholder="Nhập họ tên" id="name_chu_gh" name="name_chu_gh"/></div>
                                </div>
                                <div class="form_control">
                                    <div class="control1">Giới tính:</div>
                                    <div class="control2">
                                        <select name="gender">
                                            <option>Chọn giới tính</option>
                                            <option>Nam</option>
                                            <option>Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form_control">
                                    <div class="control1">Ngày sinh:</div>
                                    <div class="control2">
                                        <div class="div_date_user">
                                            <select id="slngay" name="slngay" class="slngay">
                                                <option value="00">Ngày</option>
                                                <? $i =1;
                                                while ($i<=31){
                                                    ?>

                                                    <option value="<?=$i?>"><?=$i?></option>

                                                    <?
                                                    $i++;
                                                }
                                                unset($i);
                                                ?>
                                            </select>
                                            <select id="slthang" name="slthang" class="slthang">
                                                <option value="00">Tháng</option>
                                                <?
                                                $i = 1;
                                                while ($i<=12){?>
                                                    <option value="<?=$i?>"><?=$i?></option>
                                                    <?
                                                    $i++;
                                                }
                                                unset($i);
                                                ?>
                                            </select>
                                            <select id="slnam" name="slnam" class="slnam">
                                                <option value="0000">Năm</option>
                                                <?
                                                $i = date("Y");
                                                while ($i >= 1920 ){?>
                                                    <option value="<?=$i?>"><?=$i?></option>
                                                    <?
                                                    $i--;
                                                }
                                                unset($i);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                                    <div class="control2"><input class="numbersOnly2" type="text" placeholder="Nhập số điện thoại" id="phone_user" name="phone_user"/></div>
                                </div>
                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Chứng minh thư:</div>
                                    <div class="control2"><input class="numbersOnly2" type="text" placeholder="Nhập CMND" id="cmt_gh" name="cmt_gh"/></div>
                                </div>
                                <div class="form_control">
                                    <div class="control1"><i class="sao">*</i>Ngày cấp:</div>
                                    <div class="control2">
                                        <div class="date_cmt">
                                            <select id="slngay" class="slngay_cmt slngay" name="slngay_cmt">
                                                <option value="00">Ngày</option>
                                                <? $i =1;
                                                while ($i<=31){
                                                    ?>

                                                    <option value="<?=$i?>"><?=$i?></option>

                                                    <?
                                                    $i++;
                                                }
                                                unset($i);
                                                ?>
                                            </select>
                                            <select id="slthang" class="slthang_cmt slthang" name="slthang_cmt">
                                                <option value="00">Tháng</option>
                                                <?
                                                $i = 1;
                                                while ($i<=12){?>
                                                    <option value="<?=$i?>"><?=$i?></option>
                                                    <?
                                                    $i++;
                                                }
                                                unset($i);
                                                ?>
                                            </select>
                                            <select id="slnam" class="slnam_cmt slnam" name="slnam_cmt">
                                                <option value="0000">Năm</option>
                                                <?
                                                $i = date("Y");
                                                while ($i >= 1920 ){?>
                                                    <option value="<?=$i?>"><?=$i?></option>
                                                    <?
                                                    $i--;
                                                }
                                                unset($i);
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="right_nangcap">
                            <h2>Thông tin gian hàng</h2>
                            <div class="form_control">
                                <div class="control1"><i class="sao">*</i>Tên gian hàng:</div>
                                <div class="control2"><input value="" placeholder="Nhập tên cửa hàng" type="text" id="name_store" name="name_store"/></div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Lĩnh vực kinh doanh:</div>
                                <div class="control2">
                                    <select name="category">
                                        <option value="00">Lĩnh vực kinh doanh</option>
                                        <?
                                        $data = new db_query("SELECT cat_id,cat_name FROM category");
                                        While($result = mysql_fetch_assoc($data->result))
                                        {
                                            echo "<option value='".$result['cat_id']."'>".$result['cat_name']."</option>";
                                        }
                                        unset($data,$result);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1"><i class="sao">*</i>Số điện thoại:</div>
                                <div class="control2 phone_restyle" style="width: 340px;">
                                    <div class="phone_store">
                                        <input type="text" class="w146 numbersOnly2" placeholder="Nhập số điện thoại" id="phone_store" name="phone_store"/>
                                        <label class="check_cb"><input type="checkbox" /><div class="control__indicator"></div>Sử dụng sđt cá nhân</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Website gian hàng:</div>
                                <div class="control2"><input value="" placeholder="Website" type="text" name="web"/></div>
                            </div>
                            <div class="form_control">
                                <div class="control1">Facebook gian hàng:</div>
                                <div class="control2"><input value="" placeholder="Nhập email" name="face" type="text"/></div>
                            </div>
                            <div class="form_control">
                                <div class="control1"><i class="sao">*</i>Khu vực:</div>
                                <div class="control2">
                                    <select name="city_gh" id="city_gh">
                                        <option value="0">Chọn tỉnh thành</option>
                                        <?
                                        $data = new db_query("SELECT cit_id,cit_name FROM city");
                                        while($city = mysql_fetch_assoc($data->result)){
                                            echo "<option value='".$city['cit_id']."'>".$city['cit_name']."</option>";
                                        }
                                        unset($data,$city);
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form_control">
                                <div class="control1"><i class="sao">*</i>Địa chỉ liên hệ:</div>
                                <div class="control2">
                                    <input type="text" placeholder="Nhập địa chỉ" name="diachi_gh" id="diachi_gh"/>
                                </div>
                            </div>

                            <div class="form_control">
                                <div class="control1"><i class="sao">*</i>Mã xác nhận:</div>
                                <div class="control2" style="position: relative;">
                                    <div id="div_captcha_gh">
                                        <input type="text" class="bnmxn" id="captcha_gh" name="captcha"/>
                                        <p class="captcha">
                                            <img class="" src="../classes/securitycode.php"/>
                                        </p>
                                        <p onclick="reloadSecurityCode(this)" class="reset-icon"></p>
                                    </div>
                                </div>
                            </div>
                            <input type="submit" onclick="checkpostdt();" class="dangky_store" value="Đăng ký" name="postok"/>
                        </div>
                    </div>
                </form>
            </div>
            <? include("../includes/home/inc_tag.php") ?>
        </div>
    </div>
    <style>
        .left_nangcap .form_control {
            margin-bottom: 10px;
        }
    </style>
</section>
<? include("../includes/common/inc_footer.php") ?>
</body>
</html>
<script src="/js/dangky_gh.js" type="text/javascript"></script>
<script src="/js/lazysizes.min.js"></script>