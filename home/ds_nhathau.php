<?
include('config.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 1 || $type_user == 5) {
        $time = time();
        // ds tin show
        $new_id = getValue('new_id','int','GET',0);
        $price_sort = getValue('price_sort','int','GET',0);

        $new_exists = new db_query("SELECT `new_id`,`new_title` FROM `new`
        WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 1 AND `new_id` = $new_id AND `new_cate_id` != 121 AND `new_cate_id` != 120");
        
        $new_count = mysql_num_rows($new_exists->result);
        if ($new_count > 0){
            $new_exists = mysql_fetch_assoc($new_exists->result);
            if ($price_sort == 1){
                $dsnt = new db_query("SELECT `id`,dau_thau.`new_id`,`status`,`price`,`price_unit`,`create_time`,dau_thau.`user_id`,`user_name`,`chat365_id`,`usc_type`,`usc_store_name`,`usc_name`,SUM(evaluate.eva_stars)/count(evaluate.eva_id) AS uy_tin,
                CASE 
                    WHEN price_unit = 2 THEN price*23725 
                    WHEN price_unit = 3 THEN price*22808 
                    ELSE price 
                END AS price_sort
                FROM `dau_thau` LEFT JOIN evaluate ON dau_thau.user_id=evaluate.bl_user LEFT JOIN user ON dau_thau.user_id=user.usc_id
                WHERE dau_thau.`new_id` = $new_id GROUP BY dau_thau.id ORDER BY price_sort DESC, create_time DESC");
            }else{
                $price_sort = 0;
                $dsnt = new db_query("SELECT `id`,dau_thau.`new_id`,`status`,`price`,`price_unit`,`create_time`,dau_thau.`user_id`,`user_name`,`chat365_id`,`usc_type`,`usc_store_name`,`usc_name`,SUM(evaluate.eva_stars)/count(evaluate.eva_id) AS uy_tin,
                CASE 
                    WHEN price_unit = 2 THEN price*23725 
                    WHEN price_unit = 3 THEN price*22808 
                    ELSE price 
                END AS price_sort
                FROM `dau_thau` LEFT JOIN evaluate ON dau_thau.user_id=evaluate.bl_user LEFT JOIN user ON dau_thau.user_id=user.usc_id
                WHERE dau_thau.`new_id` = $new_id GROUP BY dau_thau.id ORDER BY price_sort ASC, create_time DESC");
            }
        }else{
            header('Location: /');
        }

        $donvitien = array(1 => 'VN??', 2 => 'USD', 3 => 'EURO');
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

    <title><?=$new_exists['new_title']?> - Danh s??ch nh?? th???u | RAONHANH365.VN</title>
    <meta name="keywords" content="Raonhanh365, rao v???t mi???n ph??, trang rao v???t, k??nh mua b??n, qu???ng c??o, mua ban, quang cao, rao vat, ????ng tin mi???n ph??" />
    <meta name="description" content="M???ng x?? h???i Rao v???t mi???n ph?? Vi???t, K??nh mua b??n tr???c tuy???n rao v???t c??c lo???i ????? c??, ????? m???i, ????? Secondhand, rao v???t mi???n ph?? c??ng c??c d???ch v??? gi?? c???c r??? ??u ???? t???t. Qu???ng c??o gian h??ng c???a b???n m???t c??ch t???t nh???t uy t??n nh???t, gi??p s???n ph???m c???a b???n ti???p c???n nhi???u ng?????i h??n, l?? c???u n???i t???t nh???t gi???a ng?????i mua v?? ng?????i b??n." />
    <meta property="og:title" content="Rao v???t mi???n ph?? - Mua b??n t???c th?? | RAONHANH365.VN" />
    <meta property="og:description" content="M???ng x?? h???i Rao v???t mi???n ph?? Vi???t, K??nh mua b??n tr???c tuy???n rao v???t c??c lo???i ????? c??, ????? m???i, ????? Secondhand, rao v???t mi???n ph?? c??ng c??c d???ch v??? gi?? c???c r??? ??u ???? t???t. Qu???ng c??o gian h??ng c???a b???n m???t c??ch t???t nh???t uy t??n nh???t, gi??p s???n ph???m c???a b???n ti???p c???n nhi???u ng?????i h??n. Raonhanh365 '????ng tin mi???n ph?? - mua b??n t???c th??, n??i k???t n???i gi???a ng?????i mua k??? b??n.'" />
    <meta property="og:url" content="https://raonhanh365.vn/" />
    <meta name="copyright" content="Copyright ?? 2017 by raonhanh365.vn" />
    <meta name="abstract" content="Rao v???t mi???n ph?? - Mua b??n t???c th?? | RAONHANH365.VN<" />
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
    <meta name="page-topic" content="Mua b??n rao v???t" />
    <meta name="resource-type" content="Document" />
    <meta name="distribution" content="Global" />
    <link rel="canonical" href="https://raonhanh365.vn" />
    <meta name="google-site-verification" content="8HoYLGUD3DXbNpPr7JHZjAxMghKbHnuSClcHal7OnRA" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/news_management.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/modals-chitiet-dauthau.css?v=<?= $version ?>" />

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
                    <p class="dsnt_title">
                        Danh s??ch nh?? th???u - <?=$new_exists['new_title']?>
                    </p>
                    <form action="<?=$_SERVER[REQUEST_URI]?>" method="GET" class="d_flex dsnt_filter">
                        S???p x???p:
                        <select name="price_sort" id="price_sort">
                            <option value="0" <?=($price_sort==0?"selected":"")?>>Gi?? t??? th???p ?????n cao</option>
                            <option value="1" <?=($price_sort==1?"selected":"")?>>Gi?? t??? cao ?????n th???p</option>
                        </select>
                    </form>
                    <div class="dsnt_container" id="">
                        <div class="dsnt_container_left">
                            <div class="table_content">
                                <div class="grid-6 thead">
                                    <div></div>
                                    <div>T??n nh?? th???u</div>
                                    <div>Gi?? th???u</div>
                                    <div>Th???i gian d??? th???u</div>
                                    <div>????? uy t??n</div>
                                    <div>H??nh ?????ng</div>
                                </div>
                                <?php while ($bidder = (mysql_fetch_assoc($dsnt->result))) { ?>
                                <div class="grid-6-border">
                                    <input type="radio" name="selected_bid" value="<?=$bidder['id']?>" class="" id="checkbox_<?=$bidder['id']?>" hidden <?=($bidder['status']!=0)?"disabled":""?>>
                                    <div class="grid-6">
                                        <div>
                                            <label for="checkbox_<?=$bidder['id']?>" class="label">
                                                <div class="check_circle"></div>
                                            </label>
                                        </div>
                                        <div>
                                            <p class="name_bidder text_ellipsis"><?=$bidder['user_name']?></p>
                                            <?php if ($bidder['status'] == 1) { ?>
                                                <p class="bid_result bid_accept">Tr??ng th???u</p>
                                            <?php }elseif ($bidder['status'] == 2) { ?>
                                                <p class="bid_result bid_deny">Tr?????t th???u</p>
                                            <?php }else ?>
                                            <button class="detail_bid" data="<?=$bidder['id']?>" data-star="<?=$bidder['uy_tin']?>">(Xem chi ti???t d??? th???u)</button>
                                        </div>
                                        <div><?=number_format($bidder['price'])?> <?=$donvitien[$bidder['price_unit']]?></div>
                                        <div><?=date('d/m/Y',$bidder['create_time'])?></div>
                                        <div>
                                            <?php for ($j=0; $j < 5; $j++) { ?>
                                                <?php if (($j + 1) <= $bidder['uy_tin']){ ?>
                                                    <img src="/images/newImages/n_gold_star.svg" alt="">
                                                <?php }else{ ?>
                                                    <img src="/images/newImages/n_empty_star.svg" alt="">
                                                <?php } ?>
                                            <?php } ?>
                                        </div>
                                        <div>
                                        <?php if ($bidder['usc_type'] == 5) { ?>
                                            <a target="_blank" href="/gian-hang/<?=$bidder['user_id']?>/<?=replaceTitle($bidder['usc_store_name'])?>.html" class="chat_btn" id-chat="<?=$bidder['chat365_id']?>">
                                                <img src="/images/newImages/n_chat_dots.svg" alt="">
                                                Chat
                                            </a>
                                        <?php } else { ?>
                                            <a href="/ca-nhan/<?=$bidder['user_id']?>/<?=replaceTitle($bidder['usc_name'])?>.html" class="chat_btn" id-chat="<?=$bidder['chat365_id']?>">
                                                <img src="/images/newImages/n_chat_dots.svg" alt="">
                                                Chat
                                            </a>
                                        <?php } ?>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="dsnt_container_right">
                            <p class="dsnt_container_right_title">TH??NG B??O K???T QU???</p>
                            <ul>
                                <li class="dsnt_container_right_txt">C??c nh?? th???u tr??ng th???u v?? tr?????t th???u ?????u s??? ???????c h??? th???ng g???i th??ng b??o k???t qu??? v??? t??i kho???n.</li>
                                <li class="dsnt_container_right_txt">C?? th??? ch???n nhi???u nh?? th???u tr??ng th???u.</li>
                                <li class="dsnt_container_right_txt">C??c nh?? th???u tr??ng th???u s??? nh???n ???????c th??ng b??o tr??ng th???u v?? k?? h???p ?????ng.</li>
                            </ul>
                            <button class="dsnt_container_right_btn" disabled>
                                G???i k???t qu???
                                <img src="/images/newImages/n_send_kqdt.svg" alt="">
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="df_ko_dno duy">
                <div class="sub_d_none duy">
                    <img src="../images/anh_moi/anh_dulieutrong.png" alt="" class="d_flex img_trong">
                    <h1 class="h1_text">??i kh??ng, ch???ng c?? g?? ??? ????y c???</h1>
                    <p class="text_rong">B???n ch??a ????ng tin n??o c??? <br>
                        ????ng b??n nh???ng m??n ????? h???p d???n ngay th??i n??o</p>
                    <div class="text_centerdf_dl">
                        <a href="/dang-tin-san-pham.html" class="">????ng tin</a>
                    </div>
                </div>
            </div> -->
    </section>
    <!-- popup th??ng b??o k???t qu??? ?????u th???u -->
    <div id="thong_bao_ket_qua" class="modal">
        <div class="modal-content">
            <div class="bgom_modal sh_bgr_one">
                <div class="title_modal_dfpp">
                    <p class="text_title_modal">Th??ng b??o k???t qu??? ?????u th???u</p>
                    <span class="close_popup close sh_cursor" data-dimiss="modal">
                        <img src="/images/anh_moi/close_popup.png">
                    </span>
                </div>
                <div class="modal-body">
                    <form class="form_body">
                        <div class="bid_result_item">
                            <p class="bid_result_label">Tr???ng th??i <span class="color_red">*</span></p>
                            <div class="bid_content bid_result_content">
                                <input type="radio" hidden name="bid_result" id="dib_accept" value="1">
                                <label class="bid_result" for="dib_accept">Tr??ng th???u</label>
                                <input type="radio" hidden name="bid_result" id="dib_deny" value="2">
                                <label class="bid_result" for="dib_deny">Tr?????t th???u</label>
                            </div>
                        </div>
                        <div class="bid_result_item">
                            <p class="bid_result_label">T??n s???n ph???m <span class="color_red">*</span></p>
                            <div class="bid_content">
                                <input type="text" name="ten_san_pham" id="" class="bid_input" readonly>
                            </div>
                        </div>
                        <div class="bid_result_item">
                            <p class="bid_result_label">Danh m???c <span class="color_red">*</span></p>
                            <div class="bid_content bid_danhmuc">
                                <select name="danh_muc" id="" class="bid_select" readonly>
                                    <option value="0">Ch???n danh m???c</option>
                                    <? foreach ($db_cat as $item => $type) { ?>
                                        <option value="<?=$type['cat_id']?>"><?=$type['cat_name']?></option>
                                    <? } ?>
                                </select>
                            </div>
                        </div>
                        <div class="bid_result_item">
                            <p class="bid_result_label">Th???i gian tham gia d??? th???u <span class="color_red">*</span></p>
                            <div class="bid_content">
                                <input type="date" name="thoi_gian" id="" class="bid_input" readonly>
                            </div>
                        </div>
                        <div class="bid_result_item">
                            <p class="bid_result_label">?????a ch??? <span class="color_red">*</span></p>
                            <div class="bid_content">
                                <input type="text" name="dia_chi" id="" class="bid_input" readonly>
                            </div>
                        </div>
                        <div class="bid_result_item">
                            <p class="bid_result_label">Gi?? d??? th???u <span class="color_red">*</span></p>
                            <div class="bid_content bid_money">
                                <input type="text" name="price" id="" class="bid_input" readonly onkeyup="format_gtri(this)">
                                <select name="price_unit" id="" class="bid_select" readonly>
                                    <?php foreach ($donvitien as $key => $value) { ?>
                                        <option value="<?=$key?>"><?=$value?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="bid_result_item">
                            <p class="bid_result_label">Ph?? d??? th???u <span class="color_red">*</span></p>
                            <div class="bid_content bid_money">
                                <input type="text" name="fee" id="" class="bid_input" readonly onkeyup="format_gtri(this)">
                                <select name="" id="fee_unit" class="bid_select" readonly>
                                    <?php foreach ($donvitien as $key => $value) { ?>
                                        <option value="<?=$key?>"><?=$value?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="bid_result_item">
                            <p class="bid_result_label">C??c n???i dung c???n s???a ?????i v?? c??c n???i dung li??n quan</p>
                            <div class="bid_content">
                                <textarea name="content" id="" class="bid_txtarea" placeholder="Nh???p th??ng tin"></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn_xacnhan">X??c nh???n</button>
                </div>
            </div>
        </div>
    </div>

    <?
    include("../modals/tbao_tcong.php");
    include("../modals/popup_tt_nhathau.php");
    include("../includes/common_new/popup.php");
    include("../includes/inc_new/inc_footer.php");
    ?>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>

    <script type="text/javascript">
        
        $('.bid_select').select2();
        $('#price_sort').select2();
        $('#price_sort').change(function() {
            window.location = window.location.pathname + "?new_id=<?=$new_id?>&price_sort=" + $(this).val();
        });
        $(".dsnt_container_right_btn").click(function() {
            if ($("[name=selected_bid]:checked").length > 0){
                $("#thong_bao_ket_qua").show();
            }else{
                alert("Vui l??ng ch???n nh?? th???u");
            }
        });
        $("input[name=selected_bid]").change(function() {
            
            if ($("[name=selected_bid]:checked").length > 0){
                var selected_bid = $("[name=selected_bid]:checked").val();
                $(".dsnt_container_right_btn").prop("disabled",false);
                $.ajax({
                    type: 'POST',
                    url: '/ajax/detail_bidding.php',
                    data: {
                        bid_id: selected_bid,
                    },
                    dataType: 'json',
                    success: function(data) {
                        $("[name=ten_san_pham]").val(data.data.product_name);
                        $("[name=danh_muc]").val(data.data.new_cate_id).trigger('change');
                        var thoi_gian = new Date(data.data.create_time * 1000);
                        var year = thoi_gian.getFullYear();
                        var month = thoi_gian.getMonth() + 1;
                        if (month < 10) month = '0' + month;
                        var date = thoi_gian.getDate();
                        if (date < 10) date = '0' + date;
                        $("[name=thoi_gian]").val(year + "-" + month + "-" + date);
                        $("[name=dia_chi]").val(data.data.dia_chi);
                        $("[name=price]").val(data.data.price).trigger('keyup');
                        $("[name=price_unit]").val(data.data.price_unit).trigger('change');
                        $("[name=fee]").val(data.data.phi_duthau).trigger('keyup');
                        $("[name=fee_unit]").val(data.data.donvi_thau).trigger('change');
                        $(".btn_xacnhan").data('id',selected_bid);
                    }
                });                
            }else{
                $(".dsnt_container_right_btn").prop("disabled",true);
            }
        });
        $(".btn_xacnhan").click(function(){
            var selected_bid = $(".btn_xacnhan").data('id');
            var bid_result = $("[name=bid_result]:checked").val();
            if (bid_result != undefined){
                $.ajax({
                    type: 'POST',
                    url: '/ajax/update_bidding.php',
                    data: {
                        bid_id: selected_bid,
                        bid_result: bid_result,
                        bid_note: $("[name=content]").val(),
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $(".btn_xacnhan").prop("disabled",true);
                    },
                    success: function(data) {
                        alert(data.msg);
                        if (data.result == true){
                            window.location.reload();
                        }else{
                            $(".btn_xacnhan").prop("disabled",false);
                        }
                    }
                }); 
            }else{
                alert("Vui l??ng ch???n k???t qu??? ?????u th???u");
            }
        });
        var donvitien = [];
        donvitien[1] = 'VN??';
        donvitien[2] = 'USD';
        donvitien[3] = 'EURO';
        // chi ti????t d???? th????u
        $(".detail_bid").click(function() {
            var id = $(this).attr('data');
            var uy_tin = $(this).attr('data-star');
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
                        $("#detail_bidding .bidder_logo").attr('src', data.data.bidder_logo);
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
                            $("#detail_bidding .user_file").attr('href', data.data.user_file);
                            $("#detail_bidding .user_file_name").html(user_file_name);
                            $("#detail_bidding .user_file").show();
                        }else{
                            $("#detail_bidding .user_file").hide();
                        }
                        
                        $("#detail_bidding .user_profile").html(data.data.user_profile);
                        var user_profile_file_name = data.data.user_profile_file.split('/').pop();
                        if (user_file_name != ''){
                            $("#detail_bidding .user_profile_file").attr('href', data.data.user_profile_file);
                            $("#detail_bidding .user_profile_file_name").html(user_profile_file_name);
                            $("#detail_bidding .user_profile_file").show();
                        }else{
                            $("#detail_bidding .user_profile_file").hide();
                        }
                        
                        $("#detail_bidding .price").html(data.data.price + ' ' + donvitien[data.data.price_unit]);
                        $("#detail_bidding .promotion").html(data.data.promotion);
                        var promotion_file_name = data.data.promotion_file.split('/').pop();
                        if (user_file_name != ''){
                            $("#detail_bidding .promotion_file").attr('href', data.data.promotion_file);
                            $("#detail_bidding .promotion_file_name").html(promotion_file_name);
                            $("#detail_bidding .promotion_file").show();
                        }else{
                            $("#detail_bidding .promotion_file").hide();
                        }

                        var danh_gia = '';
                        for (j=0; j < 5; j++) {
                            if ((j + 1) <= uy_tin){
                                danh_gia += '<img src="/images/newImages/n_gold_star.svg" alt="">';
                            }else{
                                danh_gia += '<img src="/images/newImages/n_empty_star.svg" alt="">';
                            }
                        }
                        $("#detail_bidding .bidder_star").html(danh_gia);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });
        $(".bidder_phone_show").click(function() {
            $(".bidder_phone_show").hide();
            $(".bidder_phone").show();
        });
    </script>
</body>

</html>