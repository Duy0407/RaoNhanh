<?
include 'config.php';
include('../includes/inc_new/icon.php');

if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_user = $_COOKIE['UID'];
    $type_user = $_COOKIE['UT'];
    if ($type_user == 5) {
        $ht_tt = new db_query("SELECT `usc_anhbia`, `usc_logo`, `usc_store_name`, `usc_money`, `usc_phone`, `usc_time`,
                            `usc_email`, `usc_address`, `usc_website`, `usc_facename`, `usc_des`, `usc_tax_code` FROM `user`
                            WHERE `usc_type` = $usertype AND `usc_id` = $id_user ");
        $kn_tt = mysql_fetch_assoc($ht_tt->result);
        $usc_time = $kn_tt['usc_time'];
        $usc_money = $kn_tt['usc_money'];
        $usc_store_name = $kn_tt['usc_store_name'];
        $usc_logo = $kn_tt['usc_logo'];
        if ($usc_time == 0) {
            $usc_time = '';
        } else {
            $usc_time = date('d-m-Y', $usc_time);
        }
        $usc_facename = $kn_tt['usc_facename'];
        $usc_website = $kn_tt['usc_website'];
        $usc_email = $kn_tt['usc_email'];
        $arr_type = array(1 => 'người bán', 5 => "doanh nghiệp");
        $usc_phone = $kn_tt['usc_phone'];
        $usc_address = $kn_tt['usc_address'];
        $usc_anhbia = $kn_tt['usc_anhbia'];
        $mas_thue = $kn_tt['usc_tax_code'];

        // TIN ĐANG BÁN
        $tindangdang = new db_query("SELECT `new_id`, `new_title`, `da_ban`, `new_money`,`new_unit`, `new_image`, `new_create_time`, `dia_chi`, `chotang_mphi`,
                                    `new_update_time`, `gia_kt` FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 0
                                    AND `new_buy_sell` = 2 ORDER BY `new_id` DESC ");
        // TỔNG TIN
        $alltin = new db_query("SELECT `new_id` FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user  ORDER BY `new_id` DESC ");
        $alltin_result = mysql_num_rows($alltin->result);
        // TIN ĐÃ BÁN
        $allban = new db_query("SELECT `new_id`, `da_ban` FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `da_ban` = 1  ORDER BY `new_id`  DESC ");
        $allban_result = mysql_num_rows($allban->result);

        // TIN YÊU THÍCH
        $tin_yt = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `user_id` = $id_user AND `usc_type` = $type_user");
        $result_tin_yt = mysql_num_rows($tin_yt->result);

        // 30 ngay qua
        $ngay_qua = time() - (30 * 86400);

        $sotin = new db_query("SELECT COUNT(`new_id`) AS cou_tnq FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `new_update_time` > $ngay_qua ");
        $cou_tnq = mysql_fetch_assoc($sotin->result)['cou_tnq'];

        $sotin_dban = new db_query("SELECT COUNT(`new_id`) AS cou_tdb FROM `new` WHERE `new_type` = $usertype AND `new_user_id` = $id_user AND `tgian_ban` > $ngay_qua
                            AND `da_ban` = 1 ");
        $cou_tdb = mysql_fetch_assoc($sotin_dban->result)['cou_tdb'];

        $sotin_yc = new db_query("SELECT COUNT(`id`) AS cou_tyt FROM `tin_yeu_thich` WHERE `usc_type` = $usertype AND `user_id` = $id_user AND `tgian_thich` > $ngay_qua ");
        $cou_tyt = mysql_fetch_assoc($sotin_yc->result)['cou_tyt'];

        $ntien_tk = new db_query("SELECT SUM(`his_price`) AS sun_ntien FROM `history` WHERE `his_seri` != '' AND `his_user_id` = $id_user AND `his_time` > $ngay_qua  ");
        $sun_ntien = mysql_fetch_assoc($ntien_tk->result)['sun_ntien'];

        $bluan_toi = new db_query("SELECT COUNT(`eva_id`) AS cou_eva, SUM(`eva_stars`) AS sum_eva FROM `evaluate` WHERE `bl_user` = $id_user AND `new_id` = 0
                                AND `eva_active` = 1 ");
        $row_bltoi = mysql_fetch_assoc($bluan_toi->result);
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
    <title>Hồ sơ người bán cá nhân- gian hàng của tôi</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>

    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="gianhang_container">
            <div class="d_flex j_between hs_df_1">
                <!-- <div class="tongkhoitrai"> -->
                <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
                <!-- </div> -->

                <div class="khoiphai_gh hs_768_df1">
                    <div class="position_ral hs_df_5">
                        <? if ($usc_anhbia == '') { ?>
                            <img src="/images/anh_moi/banner.png" alt="" class="cover_img thay_anh">
                        <? } else { ?>
                            <img src="<?= $usc_anhbia ?>" alt="" class="cover_img thay_anh" onerror="this.src=`/images/anh_moi/banner.png`">
                        <? } ?>
                        <div class="avatar_img hs_df_2">
                            <? if ($usc_logo != '') { ?>
                                <img src="<?= $user_logo ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                            <? } else { ?>
                                <img src="/images/anh_moi/anh_nen.jpg" alt="">
                            <? } ?>
                            <div class="tt_hoatdong hs_df_4"></div>
                        </div>
                        <div class="ten_cuahang hs_df_3 elipsis1"><?= $usc_store_name ?></div>
                    </div>
                    <div class="khoi_internet hs_df_6">
                        <div class="position_ral position_ral_df_zindex">
                            <a href="/ho-so-gian-hang-cua-toi-trang-chu.html" class="btn_trangchu hs_df_8">
                                <p class="color_cam hs_df_7">Trang chủ</p>
                            </a>
                            <a href="/ho-so-gian-hang-cua-toi-dang-gia.html" class="btn_danhgia hs_df_9">
                                <p class="color_text hs_df_7">Đánh giá</p>
                            </a>
                        </div>
                        <div class="d_flex j_end hide_a_375 df_position_r">
                            <div class="icon_link_375">
                                <img src="/images/anh_moi/link_375.svg" alt="">
                            </div>
                            <div class="them_div_bao_ngoai1 hide_375">
                                <? if ($usc_facename != "" && $usc_facename != 0) { ?>
                                    <a href="<?= $usc_facename ?>" target="_blank" class="d_flex btn_facebook hs_df_10">
                                        <div class="btn_facebook_img">
                                            <img src="/images/anh_moi/fb_svg.svg" alt="">
                                        </div>
                                        <p>Facebook</p>
                                    </a>
                                <? }
                                if ($usc_website != "" && $usc_website != 0) { ?>
                                    <a href="<?= $usc_website ?>" target="_blank" class="d_flex btn_web hs_df_10">
                                        <div class="btn_web_img">
                                            <img src="/images/anh_moi/web_svg.svg" alt="">
                                        </div>
                                        <p>Website</p>
                                    </a>
                                <? } ?>
                            </div>
                        </div>
                    </div>
                    <div class="khoigioithieu hs_df_11">
                        <div class="d_flex j_between hs_df_12">
                            <div class="d_flex hd-align-center">
                                <div class="bg_chung hs_df_13">
                                    <img src="/images/anh_moi/gioithieu.svg" alt="">
                                </div>
                                <div class="color_text gioithieu">Giới thiệu</div>
                            </div>
                            <a href="/ho-so-gian-hang-chinh-sua-thong-tin.html">
                                <div class="them_div_sua_tt_df">
                                    <div class="chinhsua_thongtin_gt">
                                        <div class="div_sua_tt">
                                            <img src="/images/anh_moi/chinhsuatt.svg" alt="">
                                        </div>
                                        <p>Chỉnh sửa thông tin</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="d_flex flex_w hs_df_14">
                            <p class="khoithongtin_ct">Loại tài khoản: <span><?= $arr_type[$type_user]; ?></span></p>
                            <p class="khoithongtin_ct">Ngày tham gia: <span><?= $usc_time; ?></span></p>
                            <!-- <p class="khoithongtin_ct">Hoạt động trung bình: <span>1h30m/ngày </span></p> -->
                            <p class="khoithongtin_ct">Số điện thoại: <span><?= $usc_phone; ?></span></p>
                            <p class="khoithongtin_ct">Email: <span><?= $usc_email; ?></span></p>
                            <p class="khoithongtin_ct">Địa chỉ: <span><?= $usc_address; ?></span></p>
                            <p class="khoithongtin_ct">Mã số thuế: <span><?= ($mas_thue != 0) ? $mas_thue : "" ?></span></p>
                        </div>
                        <div class="des_detail hs_df_15">
                            <p class="tt_des hd_cspointer">Mô tả chi tiết</p>
                            <p class="show_text_ct"><?= $kn_tt['usc_des'] ?></p>
                        </div>
                    </div>

                    <div class="dthemclchuaco">
                        <div class="d_flex j_between hs_df_01">
                            <div class="khoitin_con">
                                <div class="d_flex hd-align-center hs_df_02">
                                    <div class="bg_chung">
                                        <img src="../images/anh_moi/tindadang.svg" alt="">
                                    </div>
                                    <div class="color_cam gioithieu">Tin đã đăng</div>
                                </div>
                                <p class="soluong_tt color_cam"><?= $alltin_result ?></p>
                                <p class="tin30ngay">+ <?= $cou_tnq ?> tin mới trong 30 ngày qua</p>
                            </div>
                            <div class="khoitin_con">
                                <div class="d_flex hd-align-center hs_df_02">
                                    <div class="bg_chung">
                                        <img src="../images/anh_moi/tindaban.svg" alt="">
                                    </div>
                                    <div class="color_xanhla gioithieu">Tin đã bán</div>
                                </div>
                                <p class="soluong_tt color_xanhla"><?= $allban_result ?></p>
                                <p class="tin30ngay">+ <?= $cou_tdb ?> đã bán trong 30 ngày qua</p>
                            </div>
                            <div class="khoitin_con">
                                <div class="d_flex hd-align-center hs_df_02">
                                    <div class="bg_chung">
                                        <img src="../images/anh_moi/luotthichtim.svg" alt="">
                                    </div>
                                    <div class="color_do gioithieu">Lượt thích tin</div>
                                </div>
                                <p class="soluong_tt color_do"><?= $result_tin_yt ?></p>
                                <p class="tin30ngay">+ <?= $cou_tyt ?> lượt thích trong 30 ngày qua</p>
                            </div>
                            <div class="khoitin_con">
                                <div class="d_flex hd-align-center hs_df_02">
                                    <div class="bg_chung">
                                        <img src="../images/anh_moi/sodu.svg" alt="">
                                    </div>
                                    <div class="color_xanhduong gioithieu">Số dư (VNĐ)</div>
                                </div>
                                <p class="soluong_tt color_xanhduong"><?= number_format($usc_money) ?></p>
                                <p class="tin30ngay">+ <?= number_format($sun_ntien) ?> VNĐ trong 30 ngày qua</p>
                            </div>
                            <div class="khoitin_con">
                                <div class="d_flex hd-align-center hs_df_02">
                                    <div class="bg_chung">
                                        <img src="../images/anh_moi/danhgia.svg" alt="">
                                    </div>
                                    <div class="color_vang gioithieu">Đánh giá trung bình</div>
                                </div>
                                <p class="soluong_tt color_vang"><?= round(($row_bltoi['sum_eva'] / $row_bltoi['cou_eva']), 1) ?></p>
                                <p class="tin30ngay">Trên <?= $row_bltoi['cou_eva'] ?> lượt đánh giá</p>
                            </div>
                            <div class="khoitin_con">
                                <div class="d_flex hd-align-center hs_df_02">
                                    <div class="bg_chung">
                                        <img src="../images/anh_moi/phanhoichat.svg" alt="">
                                    </div>
                                    <div class="color_tim gioithieu">Tỉ lệ phản hồi chat</div>
                                </div>
                                <p class="soluong_tt color_tim">0%</p>
                                <p class="tin30ngay">Thường trả lời trong vòng 2 giờ</p>
                            </div>
                        </div>
                    </div>

                    <div class="khoi_dangtinban">
                        <div class="d_flex hd-align-center tin_dangban hs_df_02 ">
                            <div class="bg_chung">
                                <img src="../images/anh_moi/tinmua.svg" alt="">
                            </div>
                            <div class="color_xanhla gioithieu">Tin đăng bán</div>
                        </div>
                        <div class="d_flex flex_w overflow_scroll_ban">
                            <? if (mysql_num_rows($tindangdang->result) > 0) {
                                while ($alltindangdang = (mysql_fetch_assoc($tindangdang->result))) {
                                    $avatar = $alltindangdang['new_image'];
                                    $avatar = explode(';', $avatar);
                                    $demimg = count($avatar);

                                    $id_tin = $alltindangdang['new_id'];
                                    $check = new db_query("SELECT `id` FROM `tin_yeu_thich` WHERE `new_id` = '$id_tin' AND `user_id` = '$id_user' AND `usc_type` = '$type_user'");
                                    $check_num = mysql_num_rows($check->result);
                            ?>
                                    <div class="khoinho_dangtin">
                                        <div class="khoinho_dangtin_padding">
                                            <div class="khoi_anhdangtin">
                                                <div class="khoi_anhdangtin_img">
                                                    <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= $avatar[0] ?>" class="img_dangtinto">
                                                    <div class="khoi_sl_mayanh">
                                                        <? if ($demimg > 1) { ?>
                                                            <img src="../images/anh_moi/may_anh.png">
                                                            <p class="font-12 soluong_anh"><?= $demimg ?></p>
                                                        <? } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="khoi_text_ban">
                                                <a href="<?= replaceTitle($alltindangdang['new_title']) ?>-c<?= $alltindangdang['new_id'] ?>.html" class="color-blk hs_df_16">

                                                    <h3 class="title_ban font-16 elipsis2 ba_cham1"><?= $alltindangdang['new_title']; ?><?= $alltindangdang['tim']; ?></h3>
                                                </a>
                                                <p class="font-14 color_a font-bold time_ban hs_df_17"><?= lay_tgian($alltindangdang['new_update_time']) ?></p>
                                                <p class="font-14 color_a address_ban elipsis1 hs_df_18"><?= $alltindangdang['dia_chi'] ?></p>
                                                <div class="d_flex j_between hd-align-center khoi_tim khoi_tim_df">
                                                    <!-- <p class="color_cam tien_ban">

                                                    </p> -->
                                                    <? if ($alltindangdang['new_cate_id'] != 121) { ?>
                                                        <? if ($alltindangdang['chotang_mphi'] == 1) { ?>
                                                            <p class="color_cam tien_ban">Cho tặng miễn phí</p>
                                                        <? } else if ($alltindangdang['new_money'] > 0) { ?>
                                                            <p class="color_cam tien_ban"><?= number_format($alltindangdang['new_money']) ?> <?= $arr_dvtien[$alltindangdang['new_unit']] ?></p>
                                                        <? } else if ($alltindangdang['new_money'] == 0 || $alltindangdang['new_money'] == '') { ?>
                                                            <p class="color_cam tien_ban">Liên hệ người bán</p>
                                                        <? } ?>
                                                    <? } else { ?>
                                                        <? if ($alltindangdang['new_money'] != 0 && $alltindangdang['gia_kt'] != 0) { ?>
                                                        <? } else if ($alltindangdang['new_money'] != 0 && $alltindangdang['gia_kt'] != 0) { ?>
                                                        <? } else if ($alltindangdang['new_money'] != 0 && $alltindangdang['gia_kt'] != 0) { ?>
                                                        <? } else { ?>
                                                        <? } ?>
                                                    <? } ?>

                                                    <? if ($check_num == 0) { ?>
                                                        <img src="../images/anh_moi/no_ythich.png" data="<?= $id_tin ?>" alt="" class="hd_cspointer chungchung no_ythich" onclick="yeu_thich(this)">
                                                    <? } else { ?>
                                                        <img src="../images/anh_moi/yeu_thich.png" alt="" data="<?= $id_tin ?>" class="hd_cspointer chungchung yeu_thich" onclick="yeu_thich(this)">
                                                    <? } ?>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <? }
                            } else { ?>
                                <p class="chua_codgia">Tài khoản chưa đăng tin nào</p>
                            <? } ?>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
    <? include '../modals/md_tb_yeuthich.php'; ?>
    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
</body>

</html>

<script type="text/javascript">
    $(document).on('click', '.tt_des', function() {
        $('.show_text_ct').toggle(500);
    });

    function loadImage(input, output) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $(output).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    };

    $('.chon_anh').click(function() {
        $('.duoc_chon').click();
    });

    $('.duoc_chon').change(function() {
        loadImage(this, ".thay_anh");
    });
    // ---------------------------------
    // SHOW MENU
    $('.show_menu_768').click(function() {
        $(this).toggleClass('rotate_768');
        $('.hs_768_df3').toggleClass('box_sd_menu');
        $('.them_cl_new').toggle(500);
    });

    // SHOW FACEBOOK, WEBSITE 375
    $('.icon_link_375').click(function() {
        $('.them_div_bao_ngoai1').toggleClass('hide_375');
    });
</script>