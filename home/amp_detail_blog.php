<?
include("config.php"); 
$newid = getValue("newid",'int',"GET",0);
$newid = (int)$newid;
if($newid == 0)
{
//    redirect("/");
}
$db_qr = new db_query("SELECT * FROM news JOIN admin_user ON news.admin_id = admin_user.adm_id WHERE new_id = ".$newid." LIMIT 1");
$row = mysql_fetch_assoc($db_qr->result);
function insertImage($content){
   if($content != ''){
      require_once '../functions/simple_html_dom.php';
      $html = str_get_html($content);
      $h2 = $html->find("h2")[1];
      $h2->outertext = '<a href="https://timviec365.vn/"><amp-img width=900 height=350 layout="intrinsic" src="/images/banner_back_home.gif" alt="Tìm việc làm"></amp-img></a>'.$h2->outertext;
      $html = $html->save();
      echo $html;
   }
}
?>
<!DOCTYPE html>
<html amp lang="vi">
<head>
    <meta charset="UTF-8">
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
    <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    <script async custom-element="amp-carousel" src="https://cdn.ampproject.org/v0/amp-carousel-0.1.js"></script>
    <script async custom-element="amp-form" src="https://cdn.ampproject.org/v0/amp-form-0.1.js"></script>
    <script async custom-element="amp-bind" src="https://cdn.ampproject.org/v0/amp-bind-0.1.js"></script>
    <title><?= removeHTML($row['new_title'])." - ".$row['new_id'] ?></title>
    <meta name="keywords" content="<?= removeHTML($row['new_keyword']) ?>"/>
    <meta name="description" content="<?= removeHTML($row['new_teaser']) ?>"/>
    <meta property="og:title" content="<?= removeHTML($row['new_title'])." - ".$row['new_id'] ?>"/>
    <meta property="og:description" content="<?= removeHTML($row['new_teaser']) ?>"/>
    <meta property="og:url" content="https://raonhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($row['new_title']))."-p".$row['new_id'].".html" ?>"/>
    <meta name="language" content="vietnamese"/>
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn"/>
    <meta name="abstract" content="raonhanh365.vn Mạng xã hội mua bán rao vặt lớn nhất Việt Nam<"/>
    <meta name="author" itemprop="author" content="raonhanh365.vn"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-language" itemprop="inLanguage" content="vi"/>
    <meta name="robots" content="index, follow,noodp"/>
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui"/>
    <meta property="og:image:url" content="https://raonhanh365.vn/pictures/news/<?=$row['new_picture']?>"/>
    <meta property="og:image:width" content="476"/>
    <meta property="og:image:height" content="249"/>
    <meta property="og:type" content="website"/>
    <meta property="og:locale" content="vi_VN"/>
    <meta name="page-topic" content="Mua bán rao vặt"/>
    <meta name="resource-type" content="Document"/>
    <meta name="distribution" content="Global"/>
    <link rel="canonical" href="https://raonhanh365.vn/tin-tuc/<?= replaceTitle(removeHTML($row['new_title']))."-p".$row['new_id'].".html" ?>"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    <style amp-custom>
        *{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;font-family:Roboto,sans-serif}@font-face{font-family:Roboto,sans-serif;src:url(roboto/Roboto-Regular.ttf);font-display:swap}@font-face{font-family:Roboto-Medium,sans-serif;src:url(roboto/Roboto-Medium.ttf);font-display:swap}@font-face{font-family:Roboto-Bold,sans-serif;src:url(roboto/Roboto-Bold.ttf);font-display:swap}.thong-bao{padding:0}.box_thong_bao>span{width:100%;height:40px;font-size:15px;color:#f26222;line-height:40px}.box_thong_bao ul{background-color:#fff;float:left;width:100%}.tb{width:100%;background:#f3f3f3}.thongbao{width:97%;height:35px;background:url(/images/ic_notifice.png) no-repeat right}.dk{float:left;width:100%;padding-top:10px}.dk a{font-size:12px;font-weight:500;color:#666766;background:url(/images/ic_gh.png) no-repeat;padding-left:22px;height:35px;display:inline-block;float:left;text-decoration:none}header .container{float:left;width:100%;padding-bottom:15px}.logo-h{display:flex;width:100%}.menu{padding:10px 0 0 10px;height:auto}#showMenu{border:none;background:#fff}.logo{width:78%;text-align:center}.menu ul{list-style:none;padding-left:20px}.menu ul li{float:left;width:100%;position:relative}.menu ul li .link{float:left;width:90%;text-transform:uppercase;color:#000;text-decoration:none;font-size:13px;line-height:26px}.menu ul li a{text-transform:uppercase;color:#000;text-decoration:none;font-size:13px;line-height:26px}.menu ul li amp-img{margin-right:13px}.s12,.s13{display:none}.box_search{margin:auto;width:96%}.box_search form{display:flex;width:100%}.s1 input[type=text]{border-radius:0;border:1px solid #f26222;padding-left:36px;font-size:12px;color:#333;font-weight:500;font-family:Roboto,sans-serif;padding-top:1px;float:left;height:42px;width:70%}.s11{background:url(/images/s1.png) 13px 13px no-repeat}.btn_timkiem{text-align:center;height:42px;border:none;background:#f26222;display:block;font-size:13px;color:#f4f4f4;font-weight:500;font-family:Roboto,sans-serif;width:30%}.breadcrumb{float:left;width:100%;background:url(/images/bg_bec.png) top no-repeat #f3f3f3;background-size:100% 24px;height:45px;background-color:#f3f3f3}.breadcrumb ul{display:flex;list-style-type:none;padding-left:15px}.breadcrumb ul li a{text-decoration:none;font-size:13px;color:#666766;padding-left:10px;padding-right:8px;font-weight:500}.main_cate{float:left;width:100%}.main_cate .container{margin:auto;width:98%}.main_filter{display:none}#banner_left{text-align:center}.right_box{margin-top:20px;padding-left:5px;padding-right:5px}.dtblog{padding-top:29px;border-top:1px solid #e1e2e1;margin-top:0}.item_r,.main_r{width:100%;float:left}.dtblog h1{float:left;width:100%;font-size:24px;color:#f26222;margin-bottom:-5px;margin-top:-5px}.box_cate h4,.cate_gh h3,.dtblog h1,.sp2 b,.sp_cate h2{font-weight:500}.time_news{background:url(/images/icon_time.png) 0 3px no-repeat;color:#999;padding-left:17px;margin-top:15px;font-size:13px;float:left;width:100%}.left_box .filter,.side_bar .filter{width:70%;margin:0 auto auto;float:none}.box,.filter h2,.top_box{float:left;width:100%}.filter h2{height:42px;background:#f26222;font-size:15px;color:#fff;font-weight:400;line-height:43px;text-align:center;margin-bottom:40px}.sapo{float:left;margin-top:20px;font-style:italic;font-weight:700}.dtblog .sapo p{text-indent:20px;margin-bottom:0;text-align:justify;padding-bottom:20px}.main_dt_blog{color:#666766;float:left;width:100%}.main_dt_blog p a{float:none;color:#333}.main_dt_blog a{float:left;padding-bottom:25px}.main_dt_blog h2{margin-top:0}.main_dt_blog p span span{text-indent:20px;float:left;font-size:15px;line-height:1.38;text-align:justify}p{float:left;margin:0 0 10px;width:100%}.dtblog h2{width:100%;border-top:1px solid #e1e2e1;padding-top:20px;font-size:18px;text-indent:20px;float:left;margin-top:0;margin-bottom:0;line-height:1.38;text-align:justify}.dtblog h3{font-size:16px;text-indent:20px;margin-top:0;margin-bottom:0;line-height:1.38;text-align:justify;float:left;width:100%}.main_dt_blog p amp-img{margin:5px 0}.dtblog .author{text-indent:20px;line-height:1.2}.author{float:left;width:100%;text-align:right;padding-right:30px;margin:10px 0}.author a{color:#00a787;font-style:italic;font-weight:700;text-decoration:none}.list_new,.list_tag ul li img,.list_tag ul li span,.main_list_new{float:left;width:100%}.list_new h3,.list_tag h3{line-height:18px;font-size:16px;padding-left:12px;font-weight:500;width:100%;color:#444545;border-left:3px solid #f36e21;margin-bottom:13px;height:15px;text-transform:uppercase;margin-top:0}.list_tag ul,.main_list_new{border-top:1px solid #f26222;padding-top:20px}.cate_new{font-size:12px;color:#0076aa;margin-top:12px;padding-bottom:5px;border-bottom:1px solid #e9e8e7;margin-bottom:10px;text-decoration:none}.cate_new,.img_new img,.item_new h4,.item_new h4 a,.item_new p,.menu_footer,footer{width:100%;float:left}.bot_h a,.cate_new,.item_new h4{font-weight:500}.item_new h4{font-size:17px;margin:0}.item_new h4 a{color:#444545;text-decoration:none}.item_new p{color:#929292;font-size:13px;line-height:18px;margin:5px 0}.bl-dg-dg-right,.item_new,.item_news,.item_r{border-bottom:1px solid #e1e2e1;float:left;width:100%;padding-top:10px}.list_tag{float:left;width:100%;margin-top:30px}.list_tag ul{list-style-type:none;padding-left:0}.list_tag ul li{width:102px}.list_tag ul li a span{height:25px;font-size:13px;color:#fff;bottom:0;left:0;background:rgba(0,0,0,.62);line-height:25px;text-transform:uppercase;text-align:center}footer{margin-top:53px;background:#f7f8f8;border-bottom:5px solid #f36e21}.menu_footer{background:#f36e21;height:5px}.menu_footer ul li a{color:#f6f6f6}.menu_footer ul{list-style:none}.menu_footer ul li{float:left;line-height:47px;font-size:13px;margin-left:48px}.top_footer{float:left;width:100%;padding-top:20px}.item_mn{float:left;width:175px}.item_mn span{color:#444545;font-size:16px;background:url(/images/li.png) 0 7px no-repeat;padding-left:20px;margin-bottom:10px;white-space:nowrap;font-weight:600}.item_mn span,.main_mn,.main_mn a{width:100%;float:left}.main_mn{border-left:1px solid #797979}.item_mn span,.main_mn,.main_mn a{width:100%;float:left}.main_mn a{font-size:13px;color:#444545;padding-left:18px;line-height:20px;font-weight:500;text-decoration:none}.col1{width:95%;margin:auto}.col1 span,.col2 p{font-size:17px;color:#444545;background:url(/images/li.png) 0 9px no-repeat;padding-left:20px;margin-bottom:5px;font-weight:600}.col1 p,.col1 span,.col2 p,.logo_ft{width:100%;float:left}.bot_footer{float:left;width:100%}.col1 p{font-size:13px;color:#444545;padding-top:5px;font-weight:500}.col1 p amp-img{margin-right:7px}.col1 span,.col2 p{font-size:17px;color:#444545;background:url(/images/li.png) 0 9px no-repeat;padding-left:20px;font-weight:600}.col2 div{float:left;width:94%;margin-top:7px;padding:0 10px}.col2 div span{float:left;font-size:13px;padding-left:25px;line-height:16px}.box_tag a,.col2 div span,.col3 p{color:#444545;font-weight:500}.col2 div .trang.congty{background:url(/images/ft1.png) 0 1px no-repeat;background-size:14px 11px}.col2 div .trang.diachi{background:url(/images/ft2.png) 3px 9px no-repeat;background-size:8px 11px}.col2 div .trang.emaillienhe{background:url(/images/ft3.png) 2px 3px no-repeat;background-size:13px 10px}.col2 div .trang.dienthoai{background:url(/images/ft4.png) 3px 3px no-repeat;background-size:10px 10px}.col2 div .trang.giayphep{background:url(/images/ft5.png) 3px 2px no-repeat;background-size:11px 11px}.col2 div .trang{background:none}.input_email{border-radius:0;display:flex;width:100%;padding-bottom:10px}.sub_email{float:left;width:100%}.sub_email input[type=text]{border-radius:0;float:left;height:43px;border:1px solid #929292;line-height:43px;border-top-left-radius:3px;border-bottom-left-radius:3px;border-right:0;font-family:Roboto,sans-serif;font-size:14px;font-weight:500;color:#929292;background:url(/images/ic_submail.png) 16px 12px no-repeat #fff;width:100%;background-position:10px 12px;padding-left:40px}.btn-bb{height:43px;border-radius:0;border:none;background:url(/images/btn_but.png) 3px 16px no-repeat #f36e21;font-size:14px;color:#f4f4f4;font-family:Roboto,sans-serif;font-weight:500;border-top-right-radius:3px;border-bottom-right-radius:3px;padding-left:17px;float:left;width:70%}.sub_email p{margin:auto;width:100%;text-align:center;margin:20px 0}
    </style>
</head>
<body>
    <header>
        <div class="dk">
            <a href="/doanh-nghiep/dang-ky-tai-khoan-doanh-nghiep" class="reg_gianhang">
                Đăng ký mở gian hàng tại Raonhanh365
            </a>
        </div>
        <div class="container">
            <div class="logo-h">
                <div class="menu">
                    <button id="showMenu" on="tap:menuBar.open">
                        <amp-img width=31 height=24 src="/images/Home_icon_menut.png"></amp-img>
                    </button>
                    <amp-sidebar style="width: 300px" id="menuBar" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar.close">X</button>
                        <nav>
                            <ul>
                                <li><a class="link" href="/mua-ban/1/do-dien-tu.html"><amp-img width=17 height=13 src="/images/mn2.png"></amp-img>Đồ điện tử<a on="tap:menuBar2.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/2/xe-co.html"><amp-img width=17 height=13 src="/images/mn3.png"></amp-img>Xe cộ<a  on="tap:menuBar3.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/3/bat-dong-san.html"><amp-img width=17 height=16 src="/images/mn1.png"></amp-img>Bất động sản<a on="tap:menuBar4.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/19/ship.html"><amp-img width=17 height=12 src="/images/mn5.png"></amp-img>Ship<a on="tap:menuBar5.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/13/dich-vu-giai-tri.html"><amp-img width=17 height=11 src="/images/mn9.png"></amp-img>Dịch vụ - Giải trí<a on="tap:menuBar6.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/18/thoi-trang.html"><amp-img width=17 height=17 src="/images/mn4.png"></amp-img>Thời trang<a on="tap:menuBar7.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/20/me-va-be.html"><amp-img width=17 height=22 src="/images/mn6.png"></amp-img> Mẹ và Bé<a on="tap:menuBar8.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/21/do-gia-dung.html"><amp-img width=16 height=21 src="/images/mn7.png"></amp-img>Đồ gia dụng<a on="tap:menuBar9.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/22/suc-khoe-sac-dep.html"><amp-img width=17 height=15 src="/images/mn8.png"></amp-img>Sức khỏe - Sắc đẹp<a on="tap:menuBar10.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/23/noi-that-ngoai-that.html"><amp-img width=17 height=23 src="/images/mn10.png"></amp-img>Nội thất - Ngoại thất<a on="tap:menuBar11.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/24/khuyen-mai-giam-gia.html"><amp-img width=17 height=18 src="/images/mn11.png"></amp-img>Khuyến mại - Giảm giá<a on="tap:menuBar2.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/25/thu-cong-my-nghe-qua-tang.html"><amp-img width=17 height=17 src="/images/mn12.png"></amp-img>Thủ công - Mỹ nghệ<a on="tap:menuBar12.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                                <li><a class="link" href="/mua-ban/93/am-thuc.html"><amp-img width=17 height=17 src="/images/mn14.png"></amp-img>Ẩm thực<a on="tap:menuBar13.open"><amp-img width=7 height=9 src="/images/icon_next.png"></amp-img></a></a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar2" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar2.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/5/may-tinh-laptop.html">Máy tính, laptop</a></li>
                                <li><a href="/mua-ban/6/may-anh-may-quay.html">Máy ảnh máy quay</a></li>
                                <li><a href="/mua-ban/7/dien-thoai-di-dong.html">Điện thoại di động</a></li>
                                <li><a href="/mua-ban/35/may-tinh-bang.html">Máy tính bảng</a></li>
                                <li><a href="/mua-ban/36/tivi-loa-amply-may-nghe-nhac.html">Tivi, Loa, Amply, Máy nghe nhạc</a></li>
                                <li><a href="/mua-ban/37/phu-kien-linh-kien.html">Phụ kiện, Linh kiện</a></li>
                                <li><a href="/mua-ban/96/do-dien-tu-khac.html">Đồ điện tử khác</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar3" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar3.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/8/xe-dap.html">Xe đạp</a></li>
                                <li><a href="/mua-ban/9/xe-may.html">Xe máy</a></li>
                                <li><a href="/mua-ban/10/o-to.html">Ô tô</a></li>
                                <li><a href="/mua-ban/38/xe-tai-xe-khac.html">Xe tải, xe khác</a></li>
                                <li><a href="/mua-ban/39/phu-tung-xe.html">Phụ tùng xe</a></li>
                                <li><a href="/mua-ban/40/xe-dap-dien.html">Xe đạp điện</a></li>
                                <li><a href="/mua-ban/41/xe-may-dien.html">Xe máy điện</a></li>
                                <li><a href="/mua-ban/42/noi-that-o-to.html">Nội thất ô tô</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar4" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar4.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/11/mua-ban-nha-dat.html">Mua bán nhà đất</a></li>
                                <li><a href="/mua-ban/12/cho-thue-nha-van-phong.html">Cho thuê nhà - văn phòng</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar5" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar5.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/51/nguoi-tim-ship.html">Người tìm ship</a></li>
                                <li><a href="/mua-ban/52/ship-tim-nguoi.html">Ship tìm người</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar6" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar6.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/74/the-thao.html">Thể thao</a></li>
                                <li><a href="/mua-ban/65/dich-vu.html">Dịch vụ</a></li>
                                <li><a href="/mua-ban/70/dich-vu-khac.html">Dịch vụ khác</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar7" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar7.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/43/thoi-trang-nam.html">Thời trang nam</a></li>
                                <li><a href="/mua-ban/44/thoi-trang-nu.html">Thời trang nữ</a></li>
                                <li><a href="/mua-ban/45/do-doi-dong-phuc.html">Đồ đôi, đồng phục</a></li>
                                <li><a href="/mua-ban/46/thoi-trang-be.html">Thời trang bé</a></li>
                                <li><a href="/mua-ban/47/giay-dep.html">Giày dép</a></li>
                                <li><a href="/mua-ban/48/phu-kien.html">Phụ kiện</a></li>
                                <li><a href="/mua-ban/49/tui-xach.html">Túi xách</a></li>
                                <li><a href="/mua-ban/50/dong-ho.html">Đồng hồ</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar8" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar8.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/53/do-cho-me.html">Đồ cho mẹ</a></li>
                                <li><a href="/mua-ban/54/do-cho-be.html">Đồ cho bé</a></li>
                                <li><a href="/mua-ban/55/sua-thuc-pham-vitamin.html">Sữa - Thực phẩm - Vitamin</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar9" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar9.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/56/thiet-bi-dien-lanh.html">Thiết bị điện lạnh</a></li>
                                <li><a href="/mua-ban/57/thiet-bi-nha-bep.html">Thiết bị nhà bếp</a></li>
                                <li><a href="/mua-ban/58/thiet-bi-theo-mua.html">Thiết bị theo mùa</a></li>
                                <li><a href="/mua-ban/59/thiet-bi-suc-khoe.html">Thiết bị sức khỏe</a></li>
                                <li><a href="/mua-ban/60/do-gia-dung-khac.html">Đồ gia dụng khác</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar10" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar10.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/61/my-pham.html">Mỹ phẩm</a></li>
                                <li><a href="/mua-ban/62/spa.html">Spa</a></li>
                                <li><a href="/mua-ban/63/y-te-suc-khoe.html">Y tế - Sức khỏe</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar11" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar11.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/78/noi-that-phong-khach.html">Nội thất phòng khách</a></li>
                                <li><a href="/mua-ban/79/noi-that-phong-ngu.html">Nội thất phòng ngủ</a></li>
                                <li><a href="/mua-ban/80/noi-that-phong-bep.html">Nội thất phòng bếp</a></li>
                                <li><a href="/mua-ban/81/noi-that-phong-tam.html">Nội thất phòng tắm</a></li>
                                <li><a href="/mua-ban/82/noi-that-van-phong.html">Nội thất văn phòng</a></li>
                                <li><a href="/mua-ban/83/vuon.html">Vườn</a></li>
                                <li><a href="/mua-ban/84/thiet-ke-phong-thuy.html">Thiết kế, phong thủy</a></li>
                                <li><a href="/mua-ban/85/noi-that-khac.html">Nội thất khác</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar12" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar12.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/86/thiet-bi-giao-duc.html">Thiết bị giáo dục</a></li>
                                <li><a href="/mua-ban/87/hoa-qua-tang-handmade.html">Hoa, quà tặng, handmade</a></li>
                                <li><a href="/mua-ban/88/nghe-thuat-thu-cong.html">Nghệ thuật, thủ công</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                    <amp-sidebar style="width: 300px" id="menuBar13" class="sample-sidebar" layout="nodisplay" side="left">
                        <button class="menu-nav" on="tap:menuBar13.close">X</button>
                        <nav >
                            <ul>
                                <li><a href="/mua-ban/94/do-an.html">Đồ ăn</a></li>
                                <li><a href="/mua-ban/87/hoa-qua-tang-handmade.html">Hoa, quà tặng, handmade</a></li>
                                <li><a href="/mua-ban/95/hoa-qua.html">Hoa quả</a></li>
                            </ul>
                        </nav>
                    </amp-sidebar>
                </div>
                <div class="logo">
                    <a href="/" title="Chợ mua bán, quảng cáo, rao vặt miễn phí">
                        <amp-img width=169 height=50 src="/images/logo.png" alt="Chợ mua bán, quảng cáo, rao vặt miễn phí">
                    </a>
                </div>
            </div>
            <div class="box_search">
               <div class="s1">
                  <form action="/ajax/search_amp_blog.php" method="GET" target="_top">
                  <?
                    $tit_sp  = getValue("sp","str","GET","");
                    $tit_sp   = replaceMQ($tit_sp);
                    $tit_sp   = strip_tags($tit_sp);
                    $tit_sp   = str_replace("-"," ",$tit_sp);
                    $tit_sp = trim($tit_sp);
                  ?>
                  <input type="text" class="s11" value="<?=$tit_sp?>" placeholder="Tìm kiếm sản phẩm ..." name="new_name"/>
                  
                  <button type="submit" class="btn_timkiem" value="TÌM KIẾM" />Tìm kiếm</button>
                  </form>
               </div>
            </div>
        </div>
    </header>
    <div class="container-detail">
        <div class="row">
            <div class="breadcrumb">
                <div class="container">
                    <ul>
                        <li><a href="/" title="Trang chủ">Trang chủ</a> &#155;</li>
                        <li><a href="/tin-tuc" title="Tin tức">Tin tức</a> &#155;</li>
                        <li><a title="<?= $row['new_title'] ?>"><?= cut_string($row['new_title'],20,'...') ?></a></li>
                    </ul>
                </div>
                </div>
                <div class="main_cate">
                <div class="container">
                    <div class="left_box">
                        <div class="filter">
                            <h2 class="loc_sp">LỌC SẢN PHẨM</h2>
                        </div>
                        <div id="banner_left">
                        <a href="https://timviec365.vn/cv-xin-viec">
                            <amp-img width=240 height=288 layout="intrinsic" src="/images/banner_tao_cv.gif" alt="Tạo CV online">
                        </a>
                        </div>
                    </div>
                    <div class="right_box">
                        <div class="main_r dtblog">
                            <h1><?= $row['new_title'] ?></h1>
                            <span class="time_news"><?= date("h:i d/m/Y",$row['new_date']) ?></span>
                                    <div class="div_shara_like" id="div_shara_like">
                                        <!--nut like face-->
                                        <!--like facebook-->
                                    </div>
                                    
                            <div class="sapo"><?= amp_content($row['new_sapo']) ?></div>
                            <div class="main_dt_blog">
                            <?
                            $new_description = amp_content($row['new_description']);
                            insertImage($new_description); 
                            ?>
                            </div>

                            <p class="author">Tác giả: <a rel="nofollow" href="/tac-gia/<?=replaceTitle($row['adm_name']).'-tg'.$row['adm_id'].'.html' ?>"><?=$row['adm_name'] ?></a></p>

                        </div>
                        <div class="list_new main_new_dt">
                            <h3>Tin tức liên quan</h3>
                            <div class="main_list_new">
                            <?
                            $db_qrlq = new db_query("SELECT * FROM news WHERE new_id <> $newid ORDER BY new_id DESC LIMIT 4");
                            While($rowlq = mysql_fetch_assoc($db_qrlq->result))
                            {
                            ?>
                            <div class="item_new">
                                <a href="/tin-tuc/<?= replaceTitle($rowlq['new_title']) ?>-p<?= $rowlq['new_id'] ?>.html" title="<?= $rowlq['new_title'] ?>" class="img_new"><amp-img width=900 height=500 layout="intrinsic" src="<?= $rowlq['new_picture'] == ''?"/images/df.png":"/pictures/news/".$rowlq['new_picture'] ?>" alt="<?= $rowlq['new_title'] ?>"/></a>
                                <a href="/tin-tuc" title="Tin tức" class="cate_new">Tin tức</a>
                                <h4><a href="/tin-tuc/<?= replaceTitle($rowlq['new_title']) ?>-p<?= $rowlq['new_id'] ?>.html" title="<?= $rowlq['new_title'] ?>"><?= $rowlq['new_title'] ?></a></h4>
                                <p><?= cut_string(removeHTML($rowlq['new_teaser']),170,'...') ?></p>
                            </div>
                            <?
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="list_tag">
                        <h3>Từ khóa được tìm kiếm nhiều nhất</h3>
                            <ul>
                                <amp-carousel height="135" id="carousel-preview-sl" layout="fixed-height" type="carousel" role="region" aria-label="Basic usage carousel">
                                    <li><a href="/s/túi-xách.html" title="túi xách"><amp-img width=102 height=102 src="/images/tag1.png" alt="túi xách" /></amp-img><span>túi xách</span></a></li>
                                    <li><a href="/s/quần-jogger.html" title="quần jogger"><amp-img width=102 height=102 src="/images/tag2.png" alt="quần jogger" /></amp-img><span>quần jogger</span></a></li>
                                    <li><a href="/s/đồng-hồ.html" title="đồng hồ"><amp-img width=102 height=102 src="/images/tag3.png" alt="đồng hồ" /></amp-img><span>đồng hồ</span></a></li>
                                    <li><a href="/s/ví-da-nam.html" title="ví da nam"><amp-img width=102 height=102 src="/images/tag4.png" alt="ví da nam" /></amp-img><span>ví da nam</span></a></li>
                                    <li><a href="/s/iphone-6.html" title="iphone 6"><amp-img width=102 height=102 src="/images/tag5.png" alt="iphone 6" /></amp-img><span>iphone 6</span></a></li>
                                    <li><a href="/s/laptop-dell.html" title="laptop dell"><amp-img width=102 height=102 src="/images/tag6.png" alt="laptop dell" /></amp-img><span>laptop dell</span></a></li>
                                    <li><a href="/s/samsung-s8.html" title="samsung s8"><amp-img width=102 height=102 src="/images/tag7.png" alt="samsung s8" /></amp-img><span>samsung s8</span></a></li>
                                    <li><a href="/s/madza-3.html" title="madza 3"><amp-img width=102 height=102 src="/images/tag8.png" alt="madza 3" /></amp-img><span>madza 3</span></a></li>
                                    <li><a href="/s/asus-b9440.html" title="asus b9440"><amp-img width=102 height=102 src="/images/tag9.png" alt="asus b9440" /></amp-img><span>asus b9440</span></a></li>
                                    <li><a href="/s/asus-card.html" title="asus card"><amp-img width=102 height=102 src="/images/tag10.png" alt="asus card" /></amp-img><span>asus card</span></a></li>
                                </amp-carousel>
                            </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="menu_footer">
            <div class="container">
                <ul>
                    <li><a rel="nofollow" href="/co-che-hoat-dong-e1.html" title="Cơ chế hoạt động">CƠ CHẾ HOẠT ĐỘNG</a></li>
                    <li><a rel="nofollow" href="/quy-dinh-chung-e2.html" title="Quy định chung">QUY ĐỊNH CHUNG</a></li>
                    <li><a rel="nofollow" href="/quy-trinh-thanh-toan-e3.html" title="Quy trình thanh toán">QUY TRÌNH THANH TOÁN</a></li>
                    <li><a rel="nofollow" href="/quy-trinh-giao-dich-e4.html" title="Quy trình giao dịch">QUY TRÌNH GIAO DỊCH</a></li>
                    <li><a rel="nofollow" href="/chinh-sach-bao-mat-e5.html" title="Chính sách bảo mật">CHÍNH SÁCH BẢO MẬT</a></li>
                    <li><a rel="nofollow" href="/giai-quyet-tranh-chap-e6.html" title="Giải quyết tranh chấp">GIẢI QUYẾT TRANH CHẤP</a></li>
                </ul>
            </div>
        </div>   
        <div class="b_footer">
            <div class="container">
                <div class="top_footer">
                    <?
                    $db_qrc = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = 0 AND cat_type <> '' ORDER BY cat_type ASC LIMIT 5");
                    While($rowc = mysql_fetch_assoc($db_qrc->result))
                    {
                    ?>
                    <div class="item_mn">
                    <a href="<?= rewrite_cate($rowc['cat_id'],$rowc['cat_name']) ?>" title="<?= $rowc['cat_name'] ?>"><span><?= mb_strtoupper($rowc['cat_name'],'UTF-8')?></span></a>
                    <div class="main_mn">
                        <?
                        $db_catcon = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = ".$rowc['cat_id']." LIMIT 3");
                        While($rowcon = mysql_fetch_assoc($db_catcon->result))
                        {
                        ?>
                        <a href="<?= rewrite_cate($rowcon['cat_id'],$rowcon['cat_name']) ?>" title="<?= $rowcon['cat_name'] ?>"><?= $rowcon['cat_name'] ?></a>
                        <?
                        }
                        unset($db_catcon,$rowcon);
                        ?>
                    </div>
                    </div>
                    <? 
                    // }
                    // $i++;
                    }
                    unset($db_qrc,$rowc);
                    ?>
                    <div class="item_mn">
                    <a><span>Thông tin việc làm</span></a>
                    <div class="main_mn">
                        <a href="https://vnx.com.vn/" title="">Vnx.com.vn</a>
                    </div>
                    </div>
                </div>
                <span class="arr_footer"></span>
                <div class="bot_footer">
                    <div class="col1">
                        <span>LIÊN HỆ QUẢNG CÁO</span>
                        <p><amp-img width=13 height=10 src="/images/ic_mail_ft.png"/></amp-img><b>Email:</b> ads@tinnhanh365.vn</p>
                        <p><amp-img width=13 height=10 src="/images/ic_phone_ft.png"/></amp-img><b>Hotline:</b> 1900633682</p>
                        <div class="col2">
                        <p>ĐƠN VỊ QUẢN LÝ NỘI DUNG</p>
                        <div><span class="trang congty"><b>Công ty Cổ phần Thanh toán Hưng Hà</b></span></div>
                        <div><span class="trang diachi"><b>Địa chỉ văn phòng:</b>Thôn Thanh Miếu - Xã Việt Hưng - Huyện Văn Lâm - Tỉnh Hưng Yên </span></div>
                        <div><span class="trang emaillienhe"><b>Email:</b> Info@24hpay.vn</span></div>
                        <div><span class="trang dienthoai"><b>Hotline:</b> 1900633682</span></div>                            
                        <div><span class="trang giayphep"><b>Giấy phép số:</b> 4150/GP-TTĐT</span></div>
                        <div><span class="trang"><b>Ngày cấp:</b> 24/08/2016</span></div>
                        </div>
                        <div class="col3">
                            <div class="box_sub">
                                <div class="sub_email">
                                    <div class="input_email">
                                        <input type="text" placeholder="Nhập địa chỉ email của bạn ..." />
                                        <button type="submit" class="btn-bb" value="ĐĂNG KÝ NGAY" />ĐĂNG KÝ NGAY</button>
                                    </div>  
                                    <div>
                                    <p>Copyright © 2017 <b>Công ty Cổ phần Thanh toán Hưng Hà</b></p> 
                                    </div>  
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </footer>
</body>
<amp-analytics type="googleanalytics">
    <script type="application/json">
    {
    "vars": {
        "account": "UA-131126445-1"
    },
    "triggers": {
        "trackPageview": {
        "on": "visible",
        "request": "pageview"
        }
    }
    }
    </script>
</amp-analytics>
</html>