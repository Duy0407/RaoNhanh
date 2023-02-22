<?php
include('../includes/inc_new/icon.php');
include 'config.php';


if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 2) {
        $ht_tt = new db_query("SELECT `usc_id`,`usc_name`,`usc_logo`,`usc_type`,`usc_time` FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_logo = $kn_tt['usc_logo'];
        $usc_time = $kn_tt['usc_time'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_type = $kn_tt['usc_type'];
        $arr_type = array(1 => 'người bán', 2 => 'người mua', 3 => "doanh nghiệp");

        // TIN ĐĂNG NGƯỜI MUA
        // TẤT CẢ TIN
        $all_tin = new db_query("SELECT `new_id`, `dia_chi`, `new_title`, `new_cate_id`, `new_money`, `gia_kt`, `new_unit`, `da_ban`, `new_image`, `new_create_time`,
                                `new_address`, `chotang_mphi` FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user ORDER BY `new_id` DESC");
        $result_count = new db_query("SELECT COUNT(`new_id`) as tong FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user");
        $phpkk = mysql_fetch_assoc($result_count->result);
        $tong = $phpkk['tong'];


        // TIN ĐANG ĐĂNG
        $tindangdang = new db_query("SELECT `new_id`, `new_title`, `da_ban`, `new_cate_id`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `dia_chi`,
                                    `chotang_mphi`, `new_pin_city`, `new_pin_cate`, `new_pin_home_prominent`, `new_pin_home_attractive`, `new_pin_cate_city`
                                    FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 0");
        $tong_tindangdang = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 0");
        $result_tindangdang = mysql_num_rows($tong_tindangdang->result);

        // TIN ĐÃ BÁN
        $all_tindaban = new db_query("SELECT `new_id`, `new_title`, `da_ban`, `new_cate_id`, `new_money`, `new_unit`, `gia_kt`, `new_image`, `new_create_time`, `dia_chi`,
                                    `chotang_mphi` FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 1 ORDER BY `new_id` DESC");
        $tong_tinban = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 1");
        $result_tongtinban = mysql_num_rows($tong_tinban->result);
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
    <meta charset="UTF-8">
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, width=device-width, user-scalable=no, minimal-ui" />
    <title>Quản lý tin</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="preload" href="/css/newCss/header.css" as="style">
    <link rel="stylesheet" href="/css/newCss/header.css" type="text/css" />

    <link rel="preload" href="/css/newCss/home_new.css" as="style">
    <link rel="stylesheet" href="/css/newCss/home_new.css" type="text/css">

    <link rel="stylesheet" type="text/css" href="/css/style_new/style_d.css?$ver=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?$ver=<?= $version ?>">

</head>

<body>
    <?php include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="chinhsua-container hd-disflex news_management">
            <div class="cs-col-left">
                <div class="cs-header-right hd-disflex">
                    <div class="img-left-tt">
                        <div class="avatar-img-left hd_cspointer df">
                            <? if ($usc_logo != '') { ?>
                                <img src="/pictures/avt_dangtin/<?= $usc_logo ?>" class="avatar-img-left-tt" alt="anh">
                            <? } else { ?>
                                <img src="/images/anh_moi/anh004.png" class="avatar-img-left-tt" alt="anh">
                            <? } ?>
                        </div>
                    </div>
                    <div class="name">
                        <div class="name_left_375">
                            <p class="font-16-1875 color-blk font-bold"><?= $usc_name; ?></p>
                            <div class="edit_detail_account">
                                <p class="font-13-1523 font-dam">Tài khoản <?= $arr_type[$usc_type]; ?></p>
                                <p class="font-13-1523 font-dam">Tham gia: <?= $usc_time; ?></p>
                            </div>
                        </div>
                        <div class="name_right_375" onclick="edit_list(this)">
                            <img src="/images/icon/arrow-down.svg" alt="">
                        </div>
                    </div>
                </div>
                <div class="list_danhmuc list_danhmuc-hidden">
                    <? include('../includes/inc_new/sidebar_nguoimua.php') ?>
                </div>
            </div>
            <div class="khung-qltdd-right">
                <? $alltin = mysql_num_rows($all_tin->result); ?>
                <? if ($alltin > 0) { ?>
                    <div class="qly_tdd_header--375">
                        <div class="qly_tdd_header hd-disflex">
                            <div class="qly_tdd active" data-tab="qlchung_tdd_one">Tất cả tin
                                đăng<?= '(' . $phpkk['tong'] . ')' ?></div>
                            <div class="qly_tdd" data-tab="qlchung_tdd_two">Tin đang đăng (<?= $result_tindangdang ?>)</div>
                            <div class="qly_tdd" data-tab="qlchung_tdd_three">Tin đã mua (<?= $result_tongtinban ?>)</div>
                        </div>
                    </div>
                    <!-- Tất cả tin đăng -->
                    <div class="full_qly_tdd width100 active" id="qlchung_tdd_one">
                        <? while ($alltin = (mysql_fetch_assoc($all_tin->result))) {
                            $avt_img = $alltin['new_image'];
                            $avt_img = explode(',', $avt_img);
                            $id_tin = $alltin['new_id'];
                        ?>
                            <div class="tt_qly_tdd hd-disflex mb20">
                                <div class="avatar_qly_tdd">
                                    <img src="/pictures/<?= $avt_img[0] ?>" class="a_qly_tdd" alt="anh_qly_tdd">
                                    <? if ($alltin['da_ban'] == 1) { ?>
                                        <div class="them_chu">
                                            <p>Đã mua</p>
                                        </div>
                                    <? } ?>
                                </div>
                                <div class="td_qly_tdd">
                                    <a href="/<?= replaceTitle($alltin['new_title']) ?>-c<?= $alltin['new_id'] ?>.html">
                                        <p class="title_qly_tdd font-16-19 font-dam hd_cspointer"><?= $alltin['new_title'] ?></p>
                                    </a>
                                    <p class="date_qly_tdd font-14-16"><?= lay_tgian($alltin['new_create_time']) ?></p>
                                    <p class="dc_qly_tdd font-14-16"><?= $alltin['dia_chi'] ?></p>
                                    <div class="gia_qly_tdd width100 hd-disflex">
                                        <p class="gia_qlytdd color_cam">
                                            <?= number_format($alltin['new_money']) ?> <?= $arr_dvtien[$alltin['new_unit']] ?> - <?= number_format($alltin['gia_kt']) ?> <?= $arr_dvtien[$alltin['new_unit']] ?>
                                        </p>
                                        <? if ($alltin['da_ban'] != 1) { ?>
                                            <div class="btn-chung hd-disflex">
                                                <div class="damua_chung sh_cursor" data-shoping="1" data="<?= $id_tin ?>">
                                                    <img src="../images/anh_moi/anh016.png" alt="anh016" class="da_mua">
                                                    <button type="button" class="btn-da-mua hd_cspointer font-bold">Đã mua</button>
                                                </div>
                                                <a href="/<?= duong_dan($alltin['new_id'], $alltin['new_cate_id']) ?>" class="dasua_chung">
                                                    <img src="/images/icon/edit-2.svg" alt="">
                                                    <button type="button" class=" btn-sua-tin hd_cspointer font-bold">Sửa tin</button>
                                                </a>
                                            </div>
                                        <? } ?>
                                    </div>
                                </div>
                                <div class="tt_qly_tdd_3_cham">
                                    <img src="/images/icon//3cham.svg" alt="">
                                </div>
                                <div class="tt_qly_tdd_popup hidden ">
                                    <div class="tt_qly_tdd_popup_btn popup_btn_buying" data-shoping="1">
                                        <p class="color_gray font_w500 font_s15">Đã mua</p>
                                    </div>
                                    <div class="tt_qly_tdd_popup_btn">
                                        <a href="/<?= duong_dan($alltin['new_id'], $alltin['new_cate_id']) ?>" class="color_gray font_w500 font_s15">Sửa tin</a>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>

                    <!-- Tin đang đăng -->
                    <div class="full_qly_tdd width100" id="qlchung_tdd_two">
                        <? while ($alltindangdang = (mysql_fetch_assoc($tindangdang->result))) {
                            $avt_img2 = $alltindangdang['new_image'];
                            $avt_img2 = explode(',', $avt_img2);
                            $id_tin = $alltindangdang['new_id'];
                        ?>
                            <div class="tt_qly_tdd hd-disflex mb20">
                                <div class="avatar_qly_tdd">
                                    <img src="/pictures/<?= $avt_img2[0] ?>" class="a_qly_tdd" alt="anh_qly_tdd">
                                </div>
                                <div class="td_qly_tdd">
                                    <a href="/<?= replaceTitle($alltindangdang['new_title']) ?>-c<?= $alltindangdang['new_id'] ?>.html">
                                        <p class="title_qly_tdd font-16-19 font-dam hd_cspointer"><?= $alltindangdang['new_title'] ?></p>
                                    </a>
                                    <p class="date_qly_tdd font-14-16"><?= lay_tgian($alltindangdang['new_create_time']) ?></p>
                                    <p class="dc_qly_tdd font-14-16"><?= $alltindangdang['dia_chi'] ?></p>
                                    <div class="gia_qly_tdd width100 hd-disflex">
                                        <p class="gia_qlytdd color_cam"><?= number_format($alltindangdang['new_money']) ?> <?= $arr_dvtien[$alltindangdang['new_unit']] ?> - <?= number_format($alltindangdang['gia_kt']) ?> <?= $arr_dvtien[$alltindangdang['new_unit']] ?></p>
                                        <div class="btn-chung hd-disflex">
                                            <div class="damua_chung sh_cursor" data-shoping="5" data="<?= $id_tin ?>">
                                                <img src="../images/anh_moi/anh016.png" alt="anh016" class="da_mua">
                                                <button type="button" class="btn-da-mua hd_cspointer font-bold">Đã mua</button>
                                            </div>
                                            <a href="/<?= duong_dan($alltindangdang['new_id'], $alltindangdang['new_cate_id']) ?>" class="dasua_chung ">
                                                <img src="/images/icon/edit-2.svg" alt="">
                                                <button type="button" class=" btn-sua-tin hd_cspointer font-bold">Sửa tin</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="tt_qly_tdd_3_cham">
                                    <img src="/images/icon//3cham.svg" alt="">
                                </div>
                                <div class="tt_qly_tdd_popup hidden ">
                                    <div class="tt_qly_tdd_popup_btn popup_btn_buying" data-shoping="5">
                                        <p class="color_gray font_w500 font_s15">Đã mua</p>
                                    </div>
                                    <div class="tt_qly_tdd_popup_btn">
                                        <a href="/<?= duong_dan($alltindangdang['new_id'], $alltindangdang['new_cate_id']) ?>" class="color_gray font_w500 font_s15">Sửa tin</a>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>

                    <!-- Tin đã mua -->
                    <div class="full_qly_tdd width100" id="qlchung_tdd_three">
                        <? while ($alltindaban = (mysql_fetch_assoc($all_tindaban->result))) {
                            $avt_img3 = $alltindaban['new_image'];
                            $avt_img3 = explode(',', $avt_img3);
                        ?>
                            <div class="tt_qly_tdd hd-disflex mb20">
                                <div class="avatar_qly_tdd">
                                    <img src="/pictures/<?= $avt_img3[0] ?>" class="a_qly_tdd" alt="anh_qly_tdd">
                                    <div class="div_danh_dau sh_cursor">
                                        <img src="../images/anh_moi/anh019.png" alt="anh019" class="dau_dd_damua">
                                        <div class="them_chu">
                                            <p>Đã mua</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="td_qly_tdd">
                                    <a href="/<?= replaceTitle($alltindaban['new_title']) ?>-c<?= $alltindaban['new_id'] ?>.html">
                                        <p class="title_qly_tdd font-16-19 font-dam hd_cspointer"><?= $alltindaban['new_title'] ?></p>
                                    </a>
                                    <p class="date_qly_tdd font-14-16"><?= lay_tgian($alltindaban['new_create_time']) ?></p>
                                    <p class="dc_qly_tdd font-14-16"><?= $alltindaban['dia_chi'] ?></p>
                                    <div class="gia_qly_tdd width100 hd-disflex">
                                        <p class="gia_qlytdd color_cam"><?= number_format($alltindaban['new_money']) ?> <?= $arr_dvtien[$alltindaban['new_unit']] ?> - <?= number_format($alltindaban['gia_kt']) ?> <?= $arr_dvtien[$alltindaban['new_unit']] ?></p>
                                    </div>
                                </div>
                            </div>
                        <? } ?>
                    </div>
                <? } else { ?>
                    <!-- KHÔNG CÓ TIN -->
                    <div class="khong_qlt">
                        <div><img src="../images/anh_moi/anh022.png" alt="anh022" class="anh_khong_qlt"></div>
                        <div class="title_khong_qlt">Ôi không, chẳng có gì ở đây cả</div>
                        <div class="con_khong_qlt">Bạn chưa đăng tin nào cả<br>
                            Đăng tìm những món đồ hấp dẫn ngay thôi nào</div>
                        <a href="/dang-tin-san-pham.html">
                            <div class="btn_khong_qlt">
                                <button type="button" class="btn-ql-dtin hd_cspointer font-bold">Đăng tin</button>
                            </div>
                        </a>
                    </div>
                <? } ?>
            </div>
        </div>
        <!-- popup thông báo -->
        <div class="khoi_thongbao khoi_thongbao_damua">
            <div class="khoi_tb_con">
                <div class="khoi_tb_title font-16-19 hd-disflex">
                    <h3>Đánh dấu đã mua</h3>
                    <div class="khoi_tb_cancel hd_cspointer">
                        <img src="../images/anh_moi/anh020.png" alt="anh020" class="khoi_tb_anh">
                    </div>
                </div>
                <div class="khoi_tb_content">
                    <p>Tin đăng sẽ bị ẩn khỏi trang chủ và tất cả các mục con của Raonhanh365. Bạn có muốn tiếp
                        tục?</p>
                </div>
                <div class="khoi_tb_btn">
                    <button type="button" class="btn-huy-bo hd_cspointer font-bold">Hủy bỏ</button>
                    <button type="button" class="btn-dong-y btn_dong_y hd_cspointer font-bold" data="">Đồng ý</button>
                </div>
            </div>
        </div>
    </section>
    <? include("../modals/tbao_tcong.php"); ?>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
</body>

</html>
<script type="text/javascript">
    $('.tt_qly_tdd_3_cham').click(function() {
        $(this).parent('.tt_qly_tdd').find('.tt_qly_tdd_popup').toggleClass('hidden');
    })

    $(document).on('click', '.damua_chung', function() {
        $(this).parents(".btn-chung").find('.damua_chung1').addClass('d_flex');
    });
    $('.popup_btn_buying').click(function() {
        $('.khoi_thongbao').show();
    })
    $('.popup_btn_buying').each((i, elemt) => {
        $(elemt).click(function(e) {
            $('.khoi_thongbao').fadeIn(500);
            $('.khoi_thongbao').attr('data-shoping', $(elemt).attr('data-shoping'))
        })
    })

    function edit_list(a) {
        $('.list_danhmuc').toggleClass('list_danhmuc-hidden')
        $(a).toggleClass('rotate_icon')
    };

    $(".tbao_tcong_d .luu_chung").click(function() {
        $(".tbao_tcong_d").hide();
        $(".khoi_thongbao").hide();
        window.location.reload();
    });

    $('.damua_chung').each((i, elem) => {
        $(elem).click(function(e) {
            var idtin = $(this).attr('data');
            $('.khoi_thongbao_damua .btn_dong_y').attr('data', idtin);
            $('.khoi_thongbao').fadeIn(500);
            $('.khoi_thongbao').attr('data-shoping', $(elem).attr('data-shoping'))
        })
    })
    $('.btn_dong_y').click(function() {
        var id_tin = $(this).attr('data');
        $.ajax({
            type: 'POST',
            url: '/ajax/updata_tindaban.php',
            data: {
                id_tin: id_tin
            },
            success: function(data) {
                if (data == "") {
                    $(".tbao_tcong_d .cau_tbao").text("Đánh dấu đã  mua thành công");
                    $(".tbao_tcong_d .luu_chung").text("Đóng");
                    $(".tbao_tcong_d").show();
                } else {
                    alert(data);
                }
            }
        })
    })

    $(".qly_tdd").click(function() {
        var id = $(this).attr("data-tab");
        $(".qly_tdd").removeClass("active");
        $(".full_qly_tdd").removeClass("active");
        $(this).addClass("active");
        $('#' + id).addClass("active");
    });

    $(".damua_chung1").click(function() {

        $('.khoi_thongbao').fadeIn(500);
    });
    $(window).click(function(e) {
        if ($(e.target).is('.khoi_thongbao')) {
            $('.khoi_thongbao').fadeOut(500);
        }
    });

    $(".btn-huy-bo").click(function() {
        $(".damua_chung").show();
        $(".dasua_chung").show();
        $(".khoi_thongbao").fadeOut(500);
    });

    $(".khoi_tb_cancel").click(function() {
        $(".khoi_thongbao").fadeOut(500);
        $(".damua_chung").show();
        $(".dasua_chung").show();
    });
</script>