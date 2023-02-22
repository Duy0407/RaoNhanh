<?
require_once("../functions/functions.php");
ob_start();
require_once("../functions/function_rewrite.php");
require_once("../classes/database.php");
require_once("../classes/config.php");
require_once("../classes/user.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once("../classes/resize-class.php");
require_once("../cache_file/home-cache.php");
?>
<!DOCTYPE html>
<html>
    <!--link meta seo-->
    <head>
        <?php include "../includes/common/inc_header_link.php"?>
        <link rel="dns-prefetch" href="https://www.google.com.vn">
        <link rel="dns-prefetch" href="https://www.google-analytics.com">
        <link rel="preconnect" href="https://www.google.com.vn">
        <link rel="preconnect" href="https://www.google-analytics.com">
        <link rel="stylesheet" type="text/css" href="/css/slick-theme.css" />
        <link rel="stylesheet" type="text/css" href="/css/slick.css" />
        <link rel="stylesheet" type="text/css" href="../css/select2.min.css">
        <link rel="stylesheet" type="text/css" href="../css/admin.style.css">
    </head>
    <body>
        <? include("../includes/common/inc_header.php"); ?>
        <section>
            <div class="tindang-container">
                <div class="tindang-header hd-disflex hd-align-center ">
                    <p class="font-18-24 font-dam">Đăng tin</p>
                    <div class="w-125">
                        <span>Cho tặng miễn phí</span>
                        <label class="switch-124" for="cho-tang-mphi">
                            <input type="checkbox" id="cho-tang-mphi">
                            <span class="slider1 round1"></span>
                        </label>
                    </div>
                </div>
                <div class="tindang-content-cont hd-disflex">
                    <div class="tindang-col-left">
                        <?  include("../includes/up-media-dang-tin.php"); ?>
                    </div>
                    <div class="tindang-col-right">
                        <form class="form-dtin-cont">
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Danh mục sản phẩm</p>
                                <input type="text" class="dmuc-spham" name="danhmucsanpham_dt" placeholder="Đồ điện tử >> Điện thoại di động">
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Tiêu đề <span style="color:#ff0000">*</span></p>
                                <input type="text" name="danhmucsanpham_dt" placeholder="Nhập tiêu đề">
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Hãng <span style="color:#ff0000">*</span></p>
                                <select class="slect-hang hd_widh100 hd_height36">
                                    <option value="">Hãng</option>
                                    <option value="">Apple</option>
                                    <option value="">Samsung</option>
                                    <option value="">Oppo</option>
                                    <option value="">Xiaomi</option>
                                </select>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Dòng máy <span style="color:#ff0000">*</span></p>
                                <select class="slect-hang hd_widh100 hd_height36">
                                    <option value="">Dòng máy</option>
                                    <option value="">Iphone</option>
                                    <option value="">Android</option>
                                    <option value="">Blackberry</option>
                                </select>
                            </div>
                             <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Màu sắc <span style="color:#ff0000">*</span></p>
                                <select class="slect-hang hd_widh100 hd_height36">
                                    <option value="">Màu sắc</option>
                                    <option value="">Đen</option>
                                    <option value="">Xanh</option>
                                    <option value="">Trắng</option>
                                </select>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Dung lượng</p>
                                <select class="slect-hang hd_widh100 hd_height36">
                                    <option value="">Dung lượng</option>
                                    <option value="">120 GB</option>
                                    <option value="">250 GB</option>
                                    <option value="">500 GB</option>
                                    <option value="">1 TB</option>
                                </select>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Bảo hành</p>
                                <select class="slect-hang hd_widh100 hd_height36">
                                    <option value="">Bảo hành</option>
                                    <option value="">Trọn đời</option>
                                    <option value="">6 tháng</option>
                                    <option value="">12 tháng</option>
                                    <option value="">18 tháng</option>
                                </select>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Tình trạng <span style="color:#ff0000">*</span></p>
                                <select class="slect-hang hd_widh100 hd_height36">
                                    <option value="">Tình trạng</option>
                                    <option value="">Mới 100%</option>
                                    <option value="">Như mới</option>
                                    <option value="">Đã qua sử dụng</option>
                                </select>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Giá <span style="color:#ff0000">*</span></p>
                                <div class="input-gia-cont">
                                    <input type="number" name="td-gia-spham" placeholder="" id="gia-ban-sp">
                                    <select class="dt-money-up">
                                        <option value="1">VND</option>
                                        <option value="2">USD</option>
                                        <option value="3">EURO</option>
                                    </select>
                                </div>
                                <span class="sp-lienhe-nban">
                                    <input type="checkbox" name="td-lienhe_ngban" placeholder="" class="lien-he-ngban">
                                    <label class="color-blk">Liên hệ người bán để hỏi giá</label>
                                </span>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Mô tả <span style="color:#ff0000">*</span></p>
                                <textarea class="texa-mo-ta"></textarea>
                            </div>
                            <div>
                                <p class="font-dam hd_font15-17">Chi tiết danh mục <span style="color:#ff0000">*</span></p>
                                <select class="slect-chitiet_dm hd_widh100 hd_height36">
                                    <option value="">Chi tiết danh mục</option>
                                    <option value="">Mới 100%</option>
                                </select>
                            </div>
                            <div class="row-tin-dang">
                                <p class="font-dam hd_font15-17">Địa chỉ <span style="color:#ff0000">*</span></p>
                                <input type="text" name="td-dia-chi" class="td-ttin-diachi" placeholder="Địa chỉ">
                            </div>
                            <div class="row-tin-dang div-ma-xac-nhan">
                                <p class="font-dam hd_font15-17">Mã xác nhận <span style="color:#ff0000">*</span></p>
                                <input type="text" name="td-ma-xn" placeholder="" class="ma-xac-nhan">
                                <div class="ma-captcha-cont">
                                    <input type="text" name="td-ma-captcha" placeholder="84469" class="ma-captcha">
                                    <span>
                                        <img src="../images/hd-refresh-captcha.svg" alt="tải lại mã captch" class="hd_cspointer">
                                    </span>
                                </div>
                            </div>
                            <div class="row-tin-dang cont-btn-sb hd-disflex hide-480-mobile">
                                <button class="btn-submit td-xem-truoc hd_cspointer">XEM TRƯỚC</button>
                                <button class="btn-submit td-dang-tin hd_cspointer">ĐĂNG TIN</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <? include('../modal/md_danh_muc_tin_dang.php')?>
            <? include('../modal/md_dia_chi.php')?>
            <? include('../modal/md_do_dien_tu.php')?>
        </section>
        <?
        include("../includes/common/inc_script_footer.php");
        include("../includes/common/inc_footer_new.php");
        ?>
        <script type="text/javascript" src="../js/admin.main.js"></script>
    </body>
</html>