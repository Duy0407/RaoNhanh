<?
include('config.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1 || $type_user == 5) {
        $time = time();
        // ds tin show
        $type_list = getValue('typelist','int','GET',0);
        switch ($type_list) {
            case 1: // tin còn hạn
                $all_tin = new db_query("SELECT `id`,new.`new_id`,`new_title`,`link_title`,`new_cate_id`,`da_ban`,`new_money`,`gia_kt`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`,`new_pin_cate`,`new_pin_home`,`new_active`,`han_su_dung`,`status`
                FROM `dau_thau` LEFT JOIN `new` ON `new`.`new_id`=`dau_thau`.`new_id` LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `user_id` = $id_user AND `new_buy_sell` = 1 AND `han_su_dung` > $time ORDER BY `new_id` DESC");
                break;
            case 2: // tin hết hạn
                $all_tin = new db_query("SELECT `id`,new.`new_id`,`new_title`,`link_title`,`new_cate_id`,`da_ban`,`new_money`,`gia_kt`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`,`new_pin_cate`,`new_pin_home`,`new_active`,`han_su_dung`,`status`
                FROM `dau_thau` LEFT JOIN `new` ON `new`.`new_id`=`dau_thau`.`new_id` LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `user_id` = $id_user AND `new_buy_sell` = 1 AND `han_su_dung` <= $time ORDER BY `new_id` DESC");
                break;
            default: // tất cả tin dự thầu
                $type_list = 0;
                $all_tin = new db_query("SELECT `id`,new.`new_id`,`new_title`,`link_title`,`new_cate_id`,`da_ban`,`new_money`,`gia_kt`,`new_unit`,`new_image`,`new_create_time`,`dia_chi`,`chotang_mphi`,`new_pin_cate`,`new_pin_home`,`new_active`,`han_su_dung`,`status`
                FROM `dau_thau` LEFT JOIN `new` ON `new`.`new_id`=`dau_thau`.`new_id` LEFT JOIN `new_description` ON `new`.`new_id` = `new_description`.`new_id`
                WHERE `user_id` = $id_user AND `new_buy_sell` = 1 ORDER BY `create_time` DESC");
                break;
        }
        // tất cả tin dự thầu
        $tongtin = new db_query("SELECT new.new_id FROM `dau_thau` LEFT JOIN `new` ON `new`.`new_id`=`dau_thau`.`new_id` WHERE `user_id` = $id_user AND `new_buy_sell` = 1 ");
        $tongtin = mysql_num_rows($tongtin->result);
        // tin còn hạn
        $tinconhan = new db_query("SELECT new.new_id FROM `dau_thau` LEFT JOIN `new` ON `new`.`new_id`=`dau_thau`.`new_id` LEFT JOIN `new_description` ON new.new_id=new_description.new_id WHERE `user_id` = $id_user AND `new_buy_sell` = 1 AND `han_su_dung` > $time");
        $tinconhan = mysql_num_rows($tinconhan->result);
        // tin hết hạn
        $tinhethan = new db_query("SELECT new.new_id FROM `dau_thau` LEFT JOIN `new` ON `new`.`new_id`=`dau_thau`.`new_id` LEFT JOIN `new_description` ON new.new_id=new_description.new_id WHERE `user_id` = $id_user AND `new_buy_sell` = 1 AND `han_su_dung` <= $time");
        $tinhethan = mysql_num_rows($tinhethan->result);

        $donvitien = array(1 => 'VNĐ', 2 => 'USD', 3 => 'EURO');
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}


?>
<!DOCTYPE html>
<html lang="vi">

<head>

    <link rel="dns-prefetch" href="https://www.google.com.vn">
    <link rel="dns-prefetch" href="https://www.google-analytics.com">
    <link rel="preconnect" href="https://www.google.com.vn">
    <link rel="preconnect" href="https://www.google-analytics.com">
    <!--    -----tvt them  27/05--->
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" as="image" href="/images/banner.webp">
    <link rel="preload" as="image" href="/images/cv_trangchu1.webp">

    <!--------------->

    <title>Quản lý tin đang dự thầu | RAONHANH365.VN</title>
    <meta name="keywords" content="Raonhanh365, rao vặt miễn phí, trang rao vặt, kênh mua bán, quảng cáo, mua ban, quang cao, rao vat, đăng tin miễn phí" />
    <meta name="description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn, là cầu nối tốt nhất giữa người mua và người bán." />
    <meta property="og:title" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN" />
    <meta property="og:description" content="Mạng xã hội Rao vặt miễn phí Việt, Kênh mua bán trực tuyến rao vặt các loại đồ cũ, đồ mới, đồ Secondhand, rao vặt miễn phí cùng các dịch vụ giá cực rẻ ưu đã tốt. Quảng cáo gian hàng của bạn một cách tốt nhất uy tín nhất, giúp sản phẩm của bạn tiếp cận nhiều người hơn. Raonhanh365 'đăng tin miễn phí - mua bán tức thì, nơi kết nối giữa người mua kẻ bán.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright © 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao vặt miễn phí - Mua bán tức thì | RAONHANH365.VN<" />
    <meta name="author" itemprop="author" content="raonhanh365.vn" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="robots" content="index, follow,noodp" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <meta property="og:image:url" content="https://raonhanh365.vn/images/banner_raonhanh365.jpg" />
    <meta property="og:image:width" content="476" />
    <meta property="og:image:height" content="249" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="vi_VN" />
    <meta name="revisit-after" content="1 days" />
    <meta name="page-topic" content="Mua bán rao vặt" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/news_management.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/modals-kq-thau.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/modals-chitiet-dauthau.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />

</head>

<body>
    <? include("../includes/common/inc_header.php"); ?>
    <section class="news_managenment_post d_flex tca_tdang_cnhan">
        <?php if ($type_user == 1){
            include "../includes/person_sell/inc_sidebar_left.php";
        }else{
            include "../includes/common/inc_container_box_left_dn_new.php";
        }
        ?>
            <div class="box-right">
                <div class="box_rightdf" data="<?= $id_user ?>" data2="<?= $type_user ?>">
                    <div class="scroll themvao">
                        <div class="title-qlt">
                            <span class="all-posts">
                                <a href="/ho-so-<?=($type_user==1)?"nguoi-ban-ca-nhan/":""?>quan-ly-tin-dang-du-thau.html" class="text-title-qlt <?=($type_list==0)?"active":""?>">Tất cả tin (<?= $tongtin; ?>)</a>
                            </span>
                            <span class="postting">
                                <a href="/ho-so-<?=($type_user==1)?"nguoi-ban-ca-nhan/":""?>quan-ly-tin-dang-du-thau.html?typelist=1" class="text-title-qlt <?=($type_list==1)?"active":""?>">Tin còn hạn (<?= $tinconhan ?>)</a>
                            </span>
                            <span class="news-sold">
                                <a href="/ho-so-<?=($type_user==1)?"nguoi-ban-ca-nhan/":""?>quan-ly-tin-dang-du-thau.html?typelist=2" class="text-title-qlt <?=($type_list==2)?"active":""?>">Tin hết hạn (<?= $tinhethan ?>)</a>
                            </span>
                        </div>
                    </div>
                    <ul class="content-qlt" id="all-posts">
                        <? while ($showtin_nguoiban = (mysql_fetch_assoc($all_tin->result))) {
                            $avatar_tinthuong = $showtin_nguoiban['new_image'];
                            $avatar_tinthuong = explode(';', $avatar_tinthuong);
                            $id_tin = $showtin_nguoiban['new_id'];
                            $cat_id = $showtin_nguoiban['new_cate_id'];
                            $daban = $showtin_nguoiban['da_ban'];
                        ?>
                            <li class="main-content main_contentdf">
                                <div class="bidding_new">
                                    <div class="anh anh_qltin_df">
                                        <? if ($showtin_nguoiban['han_su_dung'] <= $time) { ?>
                                            <p class="text-main-content n_hethan">HẾT HẠN</p>
                                        <? } else { ?>
                                            <p class="text-main-content n_conhan">CÒN HẠN</p>
                                        <? } ?>
                                        <a href="/<?= replaceTitle($showtin_nguoiban['link_title']) ?>-ct<?= $id_tin ?>.html">
                                            <img class="img-qlt lazyload" src="<?= $avatar_tinthuong[0] ?>" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                        </a>
                                    </div>
                                    <? if ($showtin_nguoiban['status'] == 1) { ?>
                                        <p class="bid_result bid_accept">Trúng thầu</p>
                                    <? }elseif ($showtin_nguoiban['status'] == 2){ ?>
                                        <p class="bid_result bid_deny">Trượt thầu</p>
                                    <? }else{ ?>
                                        <p class="bid_result">Đang mời thầu</p>
                                    <? } ?>
                                </div>
                                <div class="chu">
                                    <div class="text-tilte">
                                        <div class="menu_btn_df_dl cus_poi">
                                            <img src="/images/anh_moi/3cham_dl.svg" alt="">
                                        </div>
                                        <a href="/<?= replaceTitle($showtin_nguoiban['link_title']) ?>-ct<?= $id_tin ?>.html">
                                            <div class="text-title-qlt text_ellipsis bidding_new_title"><?= $showtin_nguoiban['new_title'] ?></div>
                                        </a>
                                    </div>
                                    <div class="text-btn">
                                        <div class="menu-bot">
                                            <div class="time-qlt">
                                                <?= lay_tgian($showtin_nguoiban['new_create_time']); ?>
                                            </div>
                                            <div class="address-qlt"><?= $showtin_nguoiban['dia_chi'] ?></div>

                                            <? if ($showtin_nguoiban['new_money'] > 0 && $showtin_nguoiban['gia_kt'] > 0) { ?>
                                                <div class="money-qlt"><?=number_format($showtin_nguoiban['new_money'])?> - <?=number_format($showtin_nguoiban['gia_kt'])?> <?=$donvitien[$showtin_nguoiban['new_unit']]?></div>
                                            <? } elseif ($showtin_nguoiban['new_money'] > 0) { ?>
                                                <div class="money-qlt">Từ <?=number_format($showtin_nguoiban['new_money'])?> <?=$donvitien[$showtin_nguoiban['new_unit']]?></div>
                                            <? }else{ ?>
                                                <div class="money-qlt">Đến <?=number_format($showtin_nguoiban['gia_kt'])?> <?=$donvitien[$showtin_nguoiban['new_unit']]?></div>
                                            <? } ?>
                                        </div>
                                    </div>

                                    <div class="btn_qlt_df btn_qlt_df_chung btn_qlt_df_3 hid_1200">
                                        <span class="border-st btn_qlt_df_3_d">
                                            <div class="btn-ctdt cus_poi" data="<?=$showtin_nguoiban['id']?>">
                                                <span class="text-qlt">Chi tiết dự thầu</span>
                                            </div>
                                        </span>
                                        <? if ($showtin_nguoiban['status'] == 1 || $showtin_nguoiban['status'] == 2) { ?>
                                            <span class="border-dbl btn_qlt_df_3_d">
                                                <div class="cus_poi btn-xkq" data="<?=$showtin_nguoiban['id']?>">
                                                    <span class="text-qlt">Xem kết quả</span>
                                                </div>
                                            </span>
                                        <? } ?>
                                    </div>
                                </div>
                            </li>
                        <? } ?>
                    </ul>
                </div>
            </div>
            <!-- <div class="df_ko_dno duy">
                <div class="sub_d_none duy">
                    <img src="../images/anh_moi/anh_dulieutrong.png" alt="" class="d_flex img_trong">
                    <h1 class="h1_text">Ôi không, chẳng có gì ở đây cả</h1>
                    <p class="text_rong">Bạn chưa đăng tin nào cả <br>
                        Đăng bán những món đồ hấp dẫn ngay thôi nào</p>
                    <div class="text_centerdf_dl">
                        <a href="/dang-tin-san-pham.html" class="">Đăng tin</a>
                    </div>
                </div>
            </div> -->
    </section>

    <!-- -- đánh dấu là đã bán ---  -->
    <div id="danhdaudaban" class="danhdaudaban d_noned">
        <div class="danhdaudaban_ovl sh_cursor" onclick="click_d()"></div>
        <div class="box-check">
            <div class="modal-content modal_content_df">
                <div class="title_modal_dfpp">
                    <p class="text_title_modal">Đánh dấu là đã bán</p>
                    <span class="close_popup close sh_cursor" onclick="click_d()"><img src="/images/anh_moi/close_popup.png"></span>
                </div>
                <p class="text-check-mail">Tin đăng sẽ bị ẩn khỏi trang chủ và tất cả các mục con của Raonhanh365. Đồng thời các gói quảng cáo bạn đã mua cho tin đăng này sẽ không được bảo lưu trừ khi bạn dùng chức năng “Đăng bán lại”. Bạn có muốn tiếp tục?</p>
                <div class="btn_modal">
                    <a href="" class="btn-cancel input_form">Huỷ bỏ</a>
                    <div class="btn-success input_form sh_cursor click_dongyban" data="" data1="">Đồng ý</div>

                </div>
            </div>
        </div>
    </div>

    <?
    include("../modals/tbao_tcong.php");
    include("../modals/ketqua_thau.php");
    include("../modals/popup_tt_nhathau.php");
    include("../includes/common_new/popup.php");
    include("../includes/inc_new/inc_footer.php");
    ?>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>

    <script type="text/javascript">
        var elem = $(".text-title-qlt.active").parents("span");
        $(elem).get(0).scrollIntoView({ behavior: 'smooth' });
        // $('.title-qlt').animate({ scrollLeft: elem.offset().left}, { duration: 'medium', easing: 'swing' });
        $(".luu_chung").click(function() {
            $(".dddban").hide();
            $(".popup_resell").hide();
            $(".tbao_tcong_d").hide();
            window.location.reload();
        });
        var donvitien = [];
        donvitien[1] = 'VNĐ';
        donvitien[2] = 'USD';
        donvitien[3] = 'EURO';
        // xem kết quả đấu thầu
        $('.btn-xkq').click(function() {
            var id = $(this).attr('data');
            $.ajax({
                type: 'POST',
                url: '/ajax/detail_bidding.php',
                data: {
                    bid_id: id
                },
                dataType:'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#kq-thau").show();
                        if (data.data.usc_type == 1){
                            $("#kq-thau .usc_name").html(data.data.usc_name);
                        }else{
                            $("#kq-thau .usc_name").html(data.data.usc_store_name);
                        }
                        $("#kq-thau .new_title").html(data.data.new_title);
                        var thoi_gian = new Date(data.data.create_time * 1000);
                        var year = thoi_gian.getFullYear();
                        var month = thoi_gian.getMonth() + 1;
                        if (month < 10) month = '0' + month;
                        var date = thoi_gian.getDate();
                        if (date < 10) date = '0' + date;
                        $("#kq-thau .create_time").html(date + "/" + month + "/" + year);
                        if (data.data.status == 1){
                            $("#kq-thau .status").html("trúng thầu");
                        }else if (data.data.status == 2){
                            $("#kq-thau .status").html("trượt thầu");
                        }else{
                            $("#kq-thau .status").html("chưa cập nhật");
                        }
                        $("#kq-thau .user_name").html(data.data.user_name);
                        $("#kq-thau .product_name").html(data.data.product_name);
                        $("#kq-thau .dia_chi").html(data.data.dia_chi);
                        $("#kq-thau .new_address").html(data.data.new_address);
                        $("#kq-thau .note").html(data.data.note);
                        $("#kq-thau .price").html(data.data.price + ' ' + donvitien[data.data.price_unit]);
                        $("#kq-thau .new_link").attr("href","/" + data.data.link_title + "-ct" + data.data.new_id + ".html");
                        if (data.data.phi_duthau != ''){
                            $("#kq-thau .fee").html(data.data.phi_duthau + ' ' + donvitien[data.data.donvi_thau]);
                        }else{
                            $("#kq-thau .fee").html("Không có");
                        }
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });
        // chi tiết dự thầu
        $('.btn-ctdt').click(function() {
            var id = $(this).attr('data');
            $.ajax({
                type: 'POST',
                url: '/ajax/detail_bidding.php',
                data: {
                    bid_id: id
                },
                dataType:'json',
                success: function(data) {
                    if (data.result == true) {
                        $("#detail_bidding").show();
                        $("#detail_bidding .bidder_logo").attr('src',"/pictures/" + data.data.bidder_logo);
                        if ($.inArray(data.data.bidder_chat, arr_online) >= 0){
                            $("#detail_bidding .chat_btn").addClass("bidder_online");
                        }else{
                            $("#detail_bidding .chat_btn").removeClass("bidder_online");
                        }
                        $("#detail_bidding .bidder_name").html(data.data.bidder_name);
                        $("#detail_bidding .bidder_phone").html(data.data.bidder_phone);
                        $("#detail_bidding .bidder_link").attr('href',data.data.bidder_link);

                        $("#detail_bidding .product_name").html(data.data.product_name);
                        $("#detail_bidding .product_desc").html(data.data.product_desc);
                        if (data.data.product_link != ''){
                            $("#detail_bidding .product_link").attr('href',data.data.product_link);
                            $("#detail_bidding .product_link").show();
                        }else{
                            $("#detail_bidding .product_link").hide();
                        }

                        $("#detail_bidding .user_name").html(data.data.user_name);
                        $("#detail_bidding .user_intro").html(data.data.user_intro);
                        var user_file_name = data.data.user_file.split('/').pop();
                        if (user_file_name != ''){
                            $("#detail_bidding .user_file").attr('href',"/pictures/" + data.data.user_file);
                            $("#detail_bidding .user_file_name").html(user_file_name);
                            $("#detail_bidding .user_file").show();
                        }else{
                            $("#detail_bidding .user_file").hide();
                        }

                        $("#detail_bidding .user_profile").html(data.data.user_profile);
                        var user_profile_file_name = data.data.user_profile_file.split('/').pop();
                        if (user_file_name != ''){
                            $("#detail_bidding .user_profile_file").attr('href',"/pictures/" + data.data.user_profile_file);
                            $("#detail_bidding .user_profile_file_name").html(user_profile_file_name);
                            $("#detail_bidding .user_profile_file").show();
                        }else{
                            $("#detail_bidding .user_profile_file").hide();
                        }

                        $("#detail_bidding .price").html(data.data.price + ' ' + donvitien[data.data.price_unit]);
                        $("#detail_bidding .promotion").html(data.data.promotion);
                        var promotion_file_name = data.data.promotion_file.split('/').pop();
                        if (user_file_name != ''){
                            $("#detail_bidding .promotion_file").attr('href',"/pictures/" + data.data.promotion_file);
                            $("#detail_bidding .promotion_file_name").html(promotion_file_name);
                            $("#detail_bidding .promotion_file").show();
                        }else{
                            $("#detail_bidding .promotion_file").hide();
                        }
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });

        $('.menu_btn_df_dl').click(function() {
            $(this).parents('.chu').find('.btn_qlt_df_chung').toggleClass('hid_1200');
        });
    </script>
</body>

</html>