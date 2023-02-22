<?
include 'config.php';
include('../includes/inc_new/icon.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 5) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_name`,`usc_logo`,`usc_money`,`usc_type`,`usc_phone`,`usc_time`,`usc_email`,`usc_address`, `ghim_gian_hang`,
                            `tgian_bd`, `tgian_kt`, `time_update_ghim`, `han_ghim` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_logo = $kn_tt['usc_logo'];
        $usc_time = $kn_tt['usc_time'];
        $usc_money = $kn_tt['usc_money'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $ghim_gianhang = $kn_tt['ghim_gian_hang'];
        $arr_type = array(1 => 'người bán', 5 => "doanh nghiệp");
        $time_update_ghim = $kn_tt['time_update_ghim'];
        $han_ghim = $kn_tt['han_ghim'];

        if ($time_update_ghim != 0 && $han_ghim != 0) {
            $conlai = (($han_ghim - time()) / 86400) * 100;

            $so_ngay = date_diff(date_create(date('Y-m-d h:i A', time())), date_create((date('Y-m-d h:i A', $han_ghim))));
            $ngay = $so_ngay->format("%a");
            $gio = $so_ngay->format("%H");
            $phut = $so_ngay->format("%I");
        }


        // Dịch vụ quảng cáo

        $tin_qc = new db_query("SELECT  `new_id`,`new_title`,`new_money`,`new_unit`,`new_create_time`,`chotang_mphi`,`new_image`,`dia_chi`,
                                `new_pin_home`, `new_pin_cate`,`da_ban`, `new_day_tin`
                                FROM `new` WHERE `new_user_id` = $id_user AND `new_type` = $type_user AND(`new_pin_home` != 0
                                 OR `new_pin_cate` != 0 OR `new_day_tin` != '' ) AND `da_ban` = 0 ");

        $arr_dvuqc = new db_query("SELECT `usc_id`, `usc_name` FROM `user` WHERE `ghim_gian_hang` = 1");
        if (mysql_num_rows($arr_dvuqc->result) > 0) {
            $row_dvqc = $arr_dvuqc->result_array();
            $ab = '';
            for ($i = 0; $i < count($row_dvqc); $i++) {
                if ($row_dvqc[$i]['usc_id'] == $_COOKIE['UID']) {
                    $ab = $i + 1;
                }
            };
        }
    } else {
        header('Location: /');
    }
} else {
    header('Location: /');
}
?>
<!DOCTYPE html>
<html lang="vi">
<!--link meta seo-->

<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Hồ sơ người bán cá nhân - dịch vụ quảng cáo</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b_quang.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_quang.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section class="service_advertisement_enterprise hoso_quangcao">
        <div class="gianhang_container">
            <div class="d_flex j_between">
                <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
                <div class="khoiphai_quanly">
                    <? if (mysql_num_rows($tin_qc->result) > 0 || $ghim_gianhang == 1) { ?>
                        <div class="full_qc">
                            <? if ($ghim_gianhang == 1) { ?>
                                <div class="modal_dangtin d_flex">
                                    <div class="dichvuquangcaogianhang pt10 ">Dịch vụ quảng cáo gian hàng</div>
                                </div>
                                <div class="thongbao_dvquangcao_gh font-16-19 color_999 d_none">
                                    <p>Là dịch vụ hỗ trợ đẩy gian hàng lên vị trí nổi bật trên trang chủ nhằm tiếp cận khách hàng.<br>
                                        Để sử dụng dịch vụ, vui lòng tham khảo bảng giá và liên hệ để được các chuyên viên tư vấn hỗ trợ trực tiếp</p>
                                    <div class="d_flex khoi_4btn">
                                        <div class="d_flex btn_xem_bgia hd-align-center j_around hd_cspointer bg_6f">
                                            <p class="color_cam font-bold font-15-18">Xem bảng giá</p>
                                        </div>
                                        <div class="d_flex btn_lien_he hd-align-center j_around ml20 hd_cspointer">
                                            <p class="font-bold font-15-18 hd-clor-white">Liên hệ</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="khoi_ghim_gian_hang">
                                    <div style="width: <?= round($conlai, 1) ?>%;" class="pt_quangcao">
                                    </div>
                                    <div class="khung_text_quangcao" data="<?= date('Y-m-d H:i:s', $han_ghim) ?>">
                                        <p class="title_ghim font-32-38 hd-clor-white">Ghim gian hàng lên trang chủ</p>
                                        <p class="time_ghim hd-clor-white font-bold">Còn lại <span id="days"><?= $ngay ?></span> ngày <span id="hours"><?= $gio ?></span> giờ <span id="minutes"><?= $phut ?></span> phút</p>
                                        <p class="date_h_ghim hd-clor-white font-14-16">
                                            <?= date('H:i', $time_update_ghim) ?> <?= date('d/m/Y', $time_update_ghim) ?> - <?= date('H:i', $han_ghim) ?> <?= date('d/m/Y', $han_ghim) ?>
                                        </p>
                                        <span class="dauhoi hd_cspointer"></span>
                                        <div class="tb_dauhoi">
                                            <div class="ct_dauhoi">
                                                <p>Đăng tin mới hoặc ghim tin<br> để đẩy gian hàng lên đầu</p>
                                            </div>
                                        </div>
                                        <p class="vitri_ghim hd-clor-white font-14-16">Vị trí hiện tại: Đứng thứ <?= $ab ?> trên gian hàng nổi bật</p>
                                    </div>
                                </div>
                            <? } ?>
                            <? if (mysql_num_rows($tin_qc->result) > 0) { ?>
                                <div class="khoi_dichvu_qcdt">
                                    <p class="font-dam font-24-28 mb30">Dịch vụ quảng cáo tin đăng</p>
                                    <div class="khoi_dvqc_con_chung">
                                        <? while ($quangcao = (mysql_fetch_assoc($tin_qc->result))) {
                                            $img = $quangcao['new_image'];
                                            $img2 = explode(';', $img); ?>

                                            <div class="khoicon_ndban d_flex mb20">
                                                <div class="img_tinban">
                                                    <a href="/<?= replaceTitle($quangcao['new_title']) ?>-c<?= $quangcao['new_id'] ?>.html">
                                                        <img src="<?= $img2[0] ?>" alt="" class="anh_avt_tin" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                                    </a>
                                                    <!-- <img src="../images/anh_moi/dg_cheocam.png" alt="" class="icon_dgcheo"> -->
                                                    <div class="n_dang_ghim">Đang ghim</div>
                                                </div>
                                                <div class="khoi_text_ban">
                                                    <a href="/<?= replaceTitle($quangcao['new_title']) ?>-c<?= $quangcao['new_id'] ?>.html">
                                                        <h3 class="title_ban color-blk font-16 mb20"><?= $quangcao['new_title'] ?></h3>
                                                    </a>
                                                    <p class="font-14 color_a font-bold time_ban"><?= lay_tgian($quangcao['new_create_time']) ?></p>
                                                    <p class="font-14 color_a address_ban"><?= $quangcao['dia_chi'] ?></p>
                                                    <div class="d_flex j_between hd-align-center">
                                                        <? if ($quangcao['chotang_mphi'] == 1) { ?>
                                                            <p class="color_cam tien_ban">Cho tặng miễn phí</p>
                                                        <? } else if ($quangcao['new_money'] > 0) { ?>
                                                            <p class="color_cam tien_ban"><?= number_format($quangcao['new_money']) ?> <?= $donvitien[$quangcao['new_unit']] ?></p>
                                                        <? } else if ($quangcao['new_money'] == 0) { ?>
                                                            <p class="color_cam tien_ban">Liên hệ người bán để hỏi giá</p>
                                                        <? } ?>
                                                    </div>
                                                </div>
                                                <div class="d_flex khoi_3btn khoi_3btn_df">
                                                    <div class="d_flex btn_green hd-align-center j_around hd_cspointer ddau_daban" data="<?= $quangcao['new_id'] ?>">
                                                        <img src="../images/anh_moi/verify_tin.png" alt="">
                                                        <p class="color_green">Đã bán</p>
                                                    </div>
                                                    <div class="d_flex btn_cam_b hd-align-center j_around ml20 hd_cspointer ctiet_goighim" data="<?= $quangcao['new_id'] ?>">
                                                        <img src="../images/anh_moi/info-circle.png" alt="">
                                                        <p class="color_cam font-bold">Chi tiết gói ghim</p>
                                                    </div>

                                                </div>
                                                <div class="popup_three_dots">
                                                    <img src="../images/icon/3cham.svg" alt="">
                                                </div>
                                                <div class="popup_three_dots-click back_w">
                                                    <p class="ddau_daban">Đã bán</p>
                                                    <p>Chi tiết gói ghim</p>
                                                </div>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                    <? } else { ?>
                        <div class="no_goods_advertisement">
                            <div>
                                <img src="../images/anh_moi/anh_dulieutrong.png" alt="" class="d_flex img_trong">
                                <h1 class="h1_text">Ôi không, chẳng có gì ở đây cả</h1>
                                <p class="text_rong">Bạn chưa yêu thích tin nào <br>
                                    Hãy lướt tìm Raonhanh365 và kiếm cho mình những món hàng yêu thích nhé</p>
                                <div class="text_center">
                                    <button type="button" class="color_cam vetrangchu">Về trang chủ</button>
                                </div>
                            </div>
                        </div>
                    <? } ?>
                </div>
            </div>
        </div>
        <? include("../modals/tbao_tcong.php"); ?>
        <? include("../includes/common_new/popup.php"); ?>
    </section>

    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
    <script type="text/javascript">
        $('.popup_three_dots').click(function() {
            $(this).parent().find('.popup_three_dots-click').toggle(500);
        })

        $('.arrow_show_768').click(function() {
            $(this).toggleClass('rotate');
            $('.menu_hoso_768').toggle(500);
        });

        $(".dauhoi").click(function() {
            $(this).parent().find('.tb_dauhoi').toggleClass("active");
        });

        $(".ddau_daban").click(function() {
            var new_id = $(this).attr("data");
            $(".dban_lai .dongy_tindd").attr("data", new_id);
            $(".dban_lai").show();
        });

        $(".dongy_tindd").click(function() {
            var id_tin = $(this).attr('data');
            var fd = new FormData();
            fd.append('id_tin', id_tin);
            $.ajax({
                type: 'POST',
                url: '/ajax/updata_tindaban.php',
                data: fd,
                contentType: false,
                processData: false,
                success: function(data) {
                    if (data == "") {
                        var sp_xd = `<span style="width: 100%; float: left" >Đánh dấu đã bán thành công!</span>
                                    <span style="width: 100%; float: left" >Tin của bạn sẽ được ẩn sau vài phút.</span>
                                    <span style="width: 100%; float: left" >Vui lòng kiểm tra lại mục Tin đã bán.</span>`;
                        $(".tbao_tcong_d .cau_tbao").html(sp_xd);
                        $(".tbao_tcong_d .luu_chung").text("Đóng");
                        $(".tbao_tcong_d").show();
                    } else {
                        alert(data);
                    }
                }
            })
        });

        $(".huy_ddau_ban, .dong_ddau").click(function() {
            $(".dban_lai").hide();
            $(".chitiet_ghimtin").hide();
        });

        $(".luu_chung").click(function() {
            $(".dban_lai").hide();
            $(".tbao_tcong_d").hide();
            window.location.reload();
        });

        $(".ctiet_goighim").click(function() {
            var new_id = $(this).attr("data");
            $.ajax({
                url: '/render/ctiet_ghimtin.php',
                type: 'POST',
                data: {
                    new_id: new_id,
                },
                success: function(data) {
                    $(".chitiet_ghimtin .ghimtin_ctiet_ld").html(data);
                    $(".chitiet_ghimtin").show();
                }
            })
        });

        // đếm ngược giờ
        var countDownDate = new Date($(".khung_text_quangcao").attr("data")).getTime();
        // cập nhập thời gian sau mỗi 1 giây
        var x = setInterval(function() {
            // Lấy thời gian hiện tại
            var now = new Date().getTime();
            // Lấy số thời gian chênh lệch
            var distance = countDownDate - now;
            // Tính toán số ngày, giờ, phút, giây từ thời gian chênh lệch
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            // var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            // HIển thị chuỗi thời gian trong thẻ p
            $("#days").text(days);
            $("#hours").text(hours);
            $("#minutes").text(minutes);
            // $("#seconds").text(seconds);
            // Nếu thời gian kết thúc, hiển thị chuỗi thông báo
            if (distance < 0) {
                clearInterval(x);
                $("#days").text(0);
                $("#hours").text(0);
                $("#minutes").text(0);
                // $("#seconds").text(0);
            }
        }, 1000);
    </script>
</body>

</html>