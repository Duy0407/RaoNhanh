<?
include 'config.php';
include('../includes/inc_new/icon.php');
$url = $_SERVER['REDIRECT_URL'];
isset($_GET['page']) ? $page = $_GET['page'] : $page = 1;
$current_page = 10;
$start = abs(($page - 1) * $current_page);
$limit = "LIMIT $start,$current_page";

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 5) {
        $ht_tt = new db_query("SELECT `usc_id`, `usc_name`, `usc_logo`, `usc_money`, `usc_type`, `usc_phone`, `usc_time`, `usc_email`, `usc_address`
                                FROM `user` WHERE `usc_type` = $usertype AND `usc_id` = $id_user");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_name = $kn_tt['usc_name'];
        $usc_time = $kn_tt['usc_time'];
        $usc_money = $kn_tt['usc_money'];
        $usc_logo = $kn_tt['usc_logo'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_email = $kn_tt['usc_email'];
        $usc_type = $kn_tt['usc_type'];
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $arr_type = array(1 => 'cá nhân', 5 => "doanh nghiệp");

        // QUẢN LÝ TIN ĐĂNG TK DOANH NGHIỆP
        // Tất cả tin đăng
        $tong_tin = new db_query("SELECT COUNT(`new_id`) as tong FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121");
        $result_tong = mysql_fetch_assoc($tong_tin->result);
        $tong = $result_tong['tong'];
        // tin đăng đăng
        $tong_tinghim = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 
        AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `da_ban` = 0 AND new_active !=0 AND tong_sluong !=0");
        $result_tinghim = mysql_num_rows($tong_tinghim->result);
        // tin đã bán
        $all_tindaban = new db_query("SELECT `new_id`, `new_title`, `link_title`, `new_cate_id`, `da_ban`,
        `sluong_daban`,`new_active` ,`new_money`, `new_unit`, `new_image`, `new_create_time`, `dia_chi`,
        `chotang_mphi`, `new_pin_cate`,`tgian_ban` ,`new_pin_home`, 
        `new_day_tin`,tong_sluong FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user 
        AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `da_ban` = 1 ORDER BY `new_id` DESC $limit");
        $tong_tinban = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `da_ban` = 1");
        $result_tongtinban = mysql_num_rows($tong_tinban->result);
        // tin đã hết hàng
        $tong_tinhethang = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND tong_sluong = 0");
        $result_tongtinhethang = mysql_num_rows($tong_tinhethang->result);
        // tin da an
        $tong_tindaan = new db_query("SELECT new_id FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_buy_sell` = 2 AND `new_cate_id` != 120 AND `new_cate_id` != 121 AND `new_active` = 0 ");
        $result_tongtindaan = mysql_num_rows($tong_tindaan->result);
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
    <title>Hồ sơ người bán cá nhân- quản lý tin</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/popup.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_raonhanhcssnew.css?v=<?= $version ?>" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/m_new_csstkdn.css?v=<?= $version ?>" />
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section class="gianhang_dnghiep" id="m_tct_gianhang_dn">
        <div class="gianhang_container gianhang_container_df_ql_tin">
            <div class="d_flex j_between hs_df_1">
                <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>

                <div class="khoiphai_quanly khoiphai_quanly_df">
                    <!-- <? if ($xacthuc_lket == 0) { ?>
                        <div class="benphai_tren">
                            <p class="tieude_lket">Để theo dõi tình trạng đơn hàng vui lòng xác thực tài khoản <a href="/xac-thuc-tai-khoan-ngan-hang.html" class="xact_lket cr_weight">Xác thực</a></p>
                        </div>
                    <? } else if ($xacthuc_lket == 2) { ?>
                        <div class="benphai_tren">
                            <p class="tieude_lket">Để theo dõi tình trạng đơn hàng vui lòng xác thực tài khoản <a class="xact_lket cr_weight">Đang xác thực</a></p>
                        </div>
                    <? } ?> -->
                    <div class="d_them_div_qltin">
                        <!-- CHECK TITLE QUAN LY TIN -->
                        <? include '../includes/inc_new/check_qltdoanhnghiep.php'; ?>
                        <!-- TIN ĐÃ BÁN -->
                        <div class="khoi_noidung_tin_daban khoi_noidungban_df_qlt">
                            <? while ($all_tin_daban = (mysql_fetch_assoc($all_tindaban->result))) {
                                $avatar_tindaban = $all_tin_daban['new_image'];
                                $avatar_tindaban = explode(';', $avatar_tindaban);
                                $id_tin = $all_tin_daban['new_id'];
                            ?>
                                <div class="khoicon_ndban d_flex fl_cl">
                                    <div class="d_them_div_flex d_flex fl_row al_ct">
                                        <div class="anh_daidientin">
                                            <a href="/<?= replaceTitle($all_tin_daban['new_title']) ?>-c<?= $all_tin_daban['new_id'] ?>.html" v class="img_tinban">
                                                <img src="<?= $avatar_tindaban[0] ?>" alt="" class="anh_avt_tin" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                                <p class="text-main-content">ĐÃ BÁN</p>
                                            </a>
                                        </div>
                                        <div class="khoi_text_ban khoi_text_ban_qltin">
                                            <div class="text-tilte d_flex fl_row al_ct jtf_spb">
                                                <a href="/<?= replaceTitle($all_tin_daban['link_title']) ?>-c<?= $all_tin_daban['new_id'] ?>.html" class="title_ban title_ban_df font-16 mb20 elipsis1"><?= $all_tin_daban['new_title'] ?></a>
                                            </div>
                                            <div class="time_ban_qltdn d_flex fl_row al_ct">
                                                <img src="/images/m_raonhanh_imgnew/timer.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                <p class="font-14 font-bold time_ban time_ban_df"><?= lay_tgian($all_tin_daban['new_create_time']) ?></p>
                                            </div>
                                            <div class="address_ban_qltdn d_flex fl_row al_ct">
                                                <img src="/images/m_raonhanh_imgnew/location.png" alt="Thời gian đăng" class="time_qlt_icon img_16">
                                                <p class="font-14 address_ban address_ban_qltl_df elipsis1"><?= $all_tin_daban['dia_chi'] ?></p>
                                            </div>
                                            <div class="m_tieuthu_qlt d_flex fl_row jtf_spb">
                                                <div class="m_money_qlt">
                                                    <? if ($all_tin_daban['chotang_mphi'] == 1) { ?>
                                                        <div class="money-qlt">Cho tặng miễn phí</div>
                                                    <? } else if ($all_tin_daban['new_money'] > 0) { ?>
                                                        <div class="money-qlt d_flex fl_row al_ct">
                                                            <div class="pdr_5">
                                                                <?= number_format($all_tin_daban['new_money']) ?> <?= $arr_dvtien[$all_tin_daban['new_unit']] ?>
                                                            </div>
                                                            <? if ($xacthuc_lket == 1) { ?>
                                                                <!-- <img src="/images/m_raonhanh_imgnew/edit-black.png" alt="" class="m_edit_money img_18 cursor_Pt "> -->
                                                            <? } ?>
                                                        </div>
                                                    <? } else if ($all_tin_daban['new_money'] == 0) { ?>
                                                        <div class="money-qlt">Liên hệ người bán để hỏi giá</div>
                                                    <? } ?>
                                                </div>
                                                <!-- xac thuc thanh toan dam bao -->
                                                <? if ($xacthuc_lket == 1) { ?>
                                                    <!-- <div class="m_amount_qlt d_flex fl_row al_ct">
                                                        <img src="/images/m_raonhanh_imgnew/Box.png" alt="" class="m_amount_qlt_icon img_18">
                                                        <p class="m_amount_qlt_text pdl_5 pdr_5 p_400_s14_l17">
                                                            Số lượng: <?= $all_tin_daban['tong_sluong'] ?>
                                                        </p>
                                                        <img src="/images/m_raonhanh_imgnew/edit-black.png" alt="" class="m_amount_qlt_edit img_18 cursor_Pt">
                                                    </div>
                                                    <div class="m_sold_qlt d_flex fl_row al_ct">
                                                        <img src="/images/m_raonhanh_imgnew/shopping-cart.png" alt="" class="m_sold_qlt_icon img_18 cursor_Pt">
                                                        <p class="m_sold_qlt_text pdl_5 p_400_s14_l17">
                                                            Đã bán: <?= $all_tin_daban['sluong_daban'] ?>
                                                        </p>
                                                    </div> -->
                                                <? } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- ĐĂNG BÁN LẠI -->
                                    <div class="div_3cham_bao_nut">
                                        <!-- <div class="img_3cham_baonut">
                                            <img src="../images/anh_moi/3cham_ban.svg" alt="">
                                        </div> -->
                                        <div class="m_dangbanlai">
                                            <div class="btn_dangbanlai cursor_Pt" data="<?= $id_tin ?>" data1="/<?= duong_dan($id_tin, $cat_id) ?>" data2="<?= $xacthuc_lket ?>" onclick="id_dangbanlai(this)">
                                                <img src="/images/m_raonhanh_imgnew/refresh.svg" alt="" class="btn_dangbanlai_icon img20">
                                                <p class="btn_dangbanlai_txt">Đăng bán lại</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <? } ?>
                        </div>
                        <!-- END TIN DA BÁN -->
                        <!-- phân trang -->
                        <div class="m_phantrang w100 d_flex al_ct jtf_ct">
                            <ul class="m_pt_ul d_flex fl_row al_ct">
                                <?= generatePageBar3('', $page, $current_page, $result_tongtinban, $url, '?', '', 'active', 'preview', '<', 'next', '>', '', '', '', ''); ?>
                            </ul>
                        </div>
                        <!--  -->
                    </div>
                </div>
            </div>
        </div>
        <!-- POPUP ĐÁNH DẤU ĐÃ BÁN -->
        <div class="hd_modal_rn hd_modal_tindang ppdang_damua">
            <div class="hd_content_tb hd_content_curspoint font-16 liheght-18">
                <div class="hd_modal_header hd-disflex hd-align-center">
                    <p class="modal_p_header font-16 liheght-18 hd-clor-white">Đánh dấu đã bán</p>
                    <div class="tat-dang-tin-md hd_cspointer">
                        <img src="../images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
                    </div>
                </div>
                <div class="tat-dang_tin-md_hd_cspointer">
                    <p class="noidung_tbban">Tin đăng sẽ bị ẩn khỏi trang chủ và tất cả các mục con của Raonhanh365.
                        Đồng thời các gói quảng cáo bạn đã mua cho tin đăng này sẽ không được bảo lưu trừ khi bạn dùng
                        chức năng “Đăng bán lại”. Bạn có muốn tiếp tục?</p>
                </div>
                <div class="d_flex j_eve">
                    <button class="btn_popup btn_huy">Hủy</button>
                    <button class="btn_popup btn_dongy btn_dongy_df btn_dongyha" data="">Đồng ý</button>
                </div>
            </div>
        </div>
        <!-- POPUP ĐỒNG Ý ĐÃ BÁN -->
        <div class="hd_modal_rn  modal_tbthanhcong">
            <div class="hd_content_tb hd_content_curspoint font-16 liheght-18">
                <div class="img_tick">
                    <img src="../images/anh_moi/icon_tbao_tc.png" alt="">
                </div>
                <div>
                    <p class="noidung_tbban">Đánh dấu đã bán thành công!
                        Tin của bạn sẽ được ẩn sau vài phút.
                        Vui lòng kiểm tra lại mục Tin đã bán.</p>
                </div>
                <div class="d_flex j_eve">
                    <button class="btn_dong_y">Đồng ý</button>
                </div>

            </div>
        </div>
        <!-- popup cap nhap -->
        <div id="m_capnhaptin" class="d_none">
            <div class=" w100 h100 d_flex fl_cl al_ct jtf_ct">
                <div class="container_capnhaptin">
                    <div class="capnhaptin_title d_flex fl_cl w100">
                        <p class="title_cntd p_600_s20_l30 w100">Cập nhập tin</p>
                    </div>
                    <div class="capnhaptin_content w100 d_flex fl_cl">
                        <p class="content_cntd p_400_s14_l21 w100">
                            Tin đăng của bạn sẽ được cập nhập lại thời gian.
                            bạn muốn tiếp tục?</p>
                    </div>
                    <div class="capnhaptin_footer w100 d_flex fl_row jtf_ct">
                        <div class=" footer_button_cnthuy">
                            <p class="d_flex al_ct jtf_ct cnt_ft_p_huy p_600_s14_l21 cl_cam boder_cam cursor_Pt bg_trang rdu10">
                                Hủy
                            </p>
                        </div>
                        <div class="footer_button_cntdongy">
                            <p class=" d_flex al_ct jtf_ct cnt_ft_p_dongy p_600_s14_l21 cl_fffff rdu10 bgr_cam cursor_Pt" data="" data1="" onclick="capnhaptin(this)">
                                Đồng ý
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end popup cap nhap -->
        <!-- popup xac nhan an tin dang -->
        <div id="m_xn_anhientd" class="d_none">
            <div class=" w100 h100 d_flex fl_cl al_ct jtf_ct">
                <div class="container_anhientd">
                    <div class="anhientd_title d_flex fl_cl w100">
                        <p class="title_antd p_600_s20_l30 w100">Ẩn tin đăng</p>
                    </div>
                    <div class="anhientd_content w100 d_flex fl_cl">
                        <p class="content_hientd p_400_s14_l21 w100">
                            Tin đăng của bạn sẽ hiện trên trang chủ,
                            mọi người sẽ tìm thấy tin đăng của bạn.
                            bạn muốn tiếp tục?</p>
                    </div>
                    <div class="anhientd_footer w100 d_flex fl_row">
                        <div class=" footer_button_huy">
                            <p class="d_flex al_ct jtf_ct aht_ft_huy_p p_600_s14_l21 cl_cam boder_cam cursor_Pt bg_trang rdu10">
                                Hủy
                            </p>
                        </div>
                        <div class="footer_button_an">
                            <p class=" d_flex al_ct jtf_ct aht_ft_p p_600_s14_l21 cl_fffff rdu10 bgr_cam cursor_Pt" data="" data1="" onclick="anhientin(this)">
                                Ẩn tin
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end popup xac nhan an tin dang -->
        <!-- -- đăng bán lại ---  -->
        <div id="popup_resell_over" class="popup_resell">
            <!-- Modal content -->
            <div class="box-check">
                <div class="modal-content">
                    <div class="title-modal">
                        <p class="text_title_modal">Đăng bán lại</p>
                        <span class="close dong_ddau"><img src="/images/newImages/close.png"></span>
                    </div>
                    <p class="text-check-mail">
                        Tin của bạn sẽ được đăng lại trên hệ thống Raonhanh365.
                        Bạn có muốn tiếp tục?
                    </p>
                    <div class="btn_modal">
                        <p class="btn-cancel input_form huy_ddau_ban">Huỷ bỏ</p>
                        <p class="btn-success input_form clickdangbanlai" data="">Đồng ý</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- -- end bán lại ---  -->
        <!-- POPUP ĐỒNG Ý ĐÃ BÁN -->
        <div class="hd_modal_rn  modal_tbthanhcong_df">
            <div class="hd_content_tb hd_content_curspoint font-16 liheght-18">
                <div class="img_tick">
                    <img src="../images/anh_moi/icon_tbao_tc.png" alt="">
                </div>
                <div>
                    <p class="noidung_tbban">Đánh dấu đã bán thành công!
                        Tin của bạn sẽ được ẩn sau vài phút.
                        Vui lòng kiểm tra lại mục Tin đã bán.</p>
                </div>
                <div class="d_flex j_eve">
                    <button class="btn_dong_y btn_dong_y_dbl" data="">Đồng ý</button>
                </div>

            </div>
        </div>
        <? include("../includes/common_new/popup.php"); ?>
    </section>
    <?
    include '../includes/inc_new/inc_footer.php';
    ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
    <script src="/js/m_raonhanh_new.js"></script>
</body>

</html>
<script>
    $(".btn_huy").click(function() {
        $(".ppdang_ban_lai").hide();
    });
    $('.click_show_ghimtin').click(function() {
        $('.dich_vu').show();
    });
    $('.img_close, .popup_bg').click(function() {
        $('.dich_vu').hide();
    });

    $(document).on('click', '.tindang_dang', function() {
        $(this).addClass('chu_dohong');
        $(this).removeClass('chu_thuong');
        $('.tatca_tindang').removeClass('chu_dohong');
        $('.tatca_tindang').addClass('chu_thuong');
        $('.tin_daban').removeClass('chu_dohong');
        $('.tin_daban').addClass('chu_thuong');

        $('.khoi_noidungban').hide();
        $('.khoi_noidung_tindangdang').show();
        $('.khoi_noidung_tin_daban').hide();
    });
    $(document).on('click', '.tin_daban', function() {
        $(this).addClass('chu_dohong');
        $(this).removeClass('chu_thuong');
        $('.tatca_tindang').removeClass('chu_dohong');
        $('.tindang_dang').removeClass('chu_dohong');
        $('.tatca_tindang').addClass('chu_thuong');
        $('.tindang_dang').addClass('chu_thuong');

        $('.khoi_noidungban').hide();
        $('.khoi_noidung_tindangdang').hide();
        $('.khoi_noidung_tin_daban').show();
    });
    $(document).on('click', '.tatca_tindang', function() {
        $(this).addClass('chu_dohong');
        $(this).removeClass('chu_thuong');
        $('.tin_daban').removeClass('chu_dohong');
        $('.tindang_dang').removeClass('chu_dohong');
        $('.tin_daban').addClass('chu_thuong');
        $('.tindang_dang').addClass('chu_thuong');

        $('.khoi_noidungban').show();
        $('.khoi_noidung_tindangdang').hide();
        $('.khoi_noidung_tin_daban').hide();

    });
    $(document).on('click', '.btn_green', function() {
        $('.ppdang_damua').fadeIn(500);
    });

    // ĐĂNG BÁN LẠI
    $('.clickdangbanlai').click(function() {
        var id_tindl = $('.clickdangbanlai').attr('data');

        $.ajax({
            type: 'POST',
            url: '/ajax/updata_tindaban.php',
            data: {
                id_tindl: id_tindl
            },
            success: function(d) {
                window.location.reload();
            }
        })
    })
    // ĐÃ BÁN
    $(document).on('click', '.df_btn_green', function() {
        var idngban = $(this).attr('data');
        $('.ppdang_damua .btn_dongyha').attr('data', idngban);
        $('.ppdang_damua').fadeIn(500);
    });
    $('.btn_dong_y').click(function() {
        var id_tin = $('.btn_dongyha').attr('data');
        $.ajax({
            type: 'POST',
            url: '/ajax/updata_tindaban.php',
            data: {
                id_tin: id_tin
            },
            success: function(d) {
                window.location.reload();
            }


        })
    })
    $(document).on('click', '.btn_huy', function() {
        $('.ppdang_damua').fadeOut(500);
    });
    $(document).on('click', '.btn_dongy_df', function() {
        $('.modal_tbthanhcong').fadeIn(500);
    });

    $(document).on('click', '.btn_dongy_dbl', function() {
        $('.modal_tbthanhcong_df').fadeIn(500);
    });
    // SHOW MENU
    $('.show_menu_768').click(function() {
        $(this).toggleClass('rotate_768');
        $('.hs_768_df3').toggleClass('box_sd_menu');
        $('.them_cl_new').toggle(500);
    })
    // CLICK SHO 3 BTN MUA
    $('.img_3cham_baonut').click(function() {
        $(this).parents('.khoicon_ndban').find('.box_3btn').toggleClass('hide_990px')
    });
</script>