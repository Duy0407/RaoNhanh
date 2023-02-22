<?
include 'config.php';
include('../includes/inc_new/icon.php');
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 5) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_name`,`usc_logo`,`usc_money`,`usc_type`,`usc_time` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
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

        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'cá nhân', 5 => "doanh nghiệp");
        // lịch sử giao dịch
        $history = new db_query("SELECT `his_user_id`,`noi_dung`,`his_price`,`his_time` FROM `history` WHERE `his_user_id` = $id_user");
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
    <title>Hồ sơ người bán cá nhân - Lịch sử giao dịch</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="preload" href="/css/newCss/header.css?v=<?= $version ?>" as="style">
    <link rel="stylesheet" href="/css/newCss/header.css?v=<?= $version ?>" type="text/css" />

    <link rel="preload" href="/css/newCss/home_new.css" as="style">
    <link rel="stylesheet" href="/css/newCss/home_new.css" type="text/css">

    <link rel="stylesheet" href="/css/style_new/footer.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style_b_quang.css">
    <link rel="stylesheet" type="text/css" href="../css/style_new/style_quang.css">
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="../css/style_new/style.css">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section class="stall_history_transaction">
        <div class="gianhang_container">
            <div class="d_flex j_between">
                <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
                <div class="khoiphai_quanly">
                    <?if(mysql_num_rows($history->result)){?>
                        <div class="modal_dangtin d_flex">
                            <div class="lichsugiaodich pt10 ">Lịch sử giao dịch</div>
                        </div>
                        <div class="khoi_lichsu_giaodich">
                            <div class="khoi_lichsu_giaodich_375">
                                <div class="d_flex khoi_lsgd">
                                    <div class="header_trai_lsgd">
                                        <p class="color_A font-15-18 font-bold">Quảng cáo / Nạp tiền</p>
                                    </div>
                                    <div class="header_phai_lsgd1">
                                        <p class="color_A font-15-18 font-bold">Giá trị giao dịch</p>
                                    </div>
                                    <div class="header_phai_lsgd2">
                                        <p class="color_A font-15-18 font-bold">Phương thức thanh toán</p>
                                    </div>
                                    <div class="header_phai_lsgd3">
                                        <p class="color_A font-15-18 font-bold">Ngày giao dịch</p>
                                    </div>
                                </div>
                                <div class="khoi_lsgd_duoi_chung">
                                    <?while($history_ok = (mysql_fetch_assoc($history->result))){?>
                                        <div class="d_flex khoi_lsgd_duoi">
                                            <div class="d_flex header_trai_lsgd">
                                                <div class="avt_lsqc">
                                                    <img src="../images/anh_moi/anh029.png" alt="" class="">
                                                </div>
                                                <!-- <a href="#"> -->
                                                <?if($history_ok['noi_dung'] != ''){?>
                                                    <p class="font-16-19 color_text font-bold text_ghd"><?=$history_ok['noi_dung']?></p>
                                                <?}else{?>
                                                    <p class="font-16-19 color_text font-bold text_ghd">Nạp tài khoản</p>
                                                <?}?>
                                                <!-- </a> -->
                                            </div>
                                            <div class="header_phai_lsgd1">
                                                <p class="font-16-19 color_text"><?=number_format($history_ok['his_price'])?> VNĐ</p>
                                            </div>
                                            <div class="header_phai_lsgd2">
                                                <p class="font-16-19 color_text">Nạp Tiên Rao Nhanh</p>
                                            </div>
                                            <div class="header_phai_lsgd3">
                                                <p class="font-16-19 color_text"><?=date('d/m/Y', $history_ok['his_time'])?></p>
                                            </div>
                                        </div>
                                    <?}?>
                                </div>
                            </div>
                        </div>
                    <?}else{?>
                        <div class="not_favorite_news">
                            <div class="df_themclnew1">
                                <img src="../images/anh_moi/anh_dulieutrong.png" alt="" class="d_flex img_trong">
                                <h1 class="h1_text">Ôi không, chẳng có gì ở đây cả</h1>
                                <p class="text_rong">Bạn chưa thực hiện giao dịch nào trên Rao Nhanh <br>
                                    Nạp tiền để quảng cáo tin đăng hoặc gian hàng với ưu đãi
                                </p>
                                <a href="/bang-gia.html">
                                    <div class="text_center">
                                        <button type="button" class="color_cam vetrangchu">Xem bảng giá</button>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?}?>

                </div>
            </div>
        </div>

    </section>

    <?
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
    <script>
        $('#city_search ,#cate_search').select2();

        $('.arrow_show_768').click(function() {
            $(this).toggleClass('rotate');
            $('.menu_hoso_768').toggle(500);
        })
    </script>
</body>

</html>
<script>
    $('.vetrangchu').click(function() {
        window.location.href = 'ho-so-gian-hang-cua-toi-trang-chu.html';
    });
</script>