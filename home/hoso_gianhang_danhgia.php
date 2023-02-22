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
        $arr_type = array(1 => 'người bán', 5 => "doanh nghiệp");
        $usc_anhbia = $kn_tt['usc_anhbia'];
        $mas_thue = $kn_tt['usc_tax_code'];

        $list_bl = new db_query("SELECT `eva_id`, `user_id`, `eva_stars`, `eva_comment`, `eva_comment_time` FROM `evaluate`
                                WHERE `bl_user` = $id_user AND `eva_active` = 1 ");

        $dem_nguoibl = new db_query("SELECT COUNT(`eva_id`) AS tongnguoi FROM `evaluate` WHERE `bl_user` = $id_user ");
        $tong_nbl = mysql_fetch_assoc($dem_nguoibl->result)['tongnguoi'];

        $dem_sao = new db_query("SELECT SUM(`eva_stars`) AS tongsao FROM `evaluate` WHERE `bl_user` = $id_user ");
        $tong_sao = mysql_fetch_assoc($dem_sao->result)['tongsao'];
        if ($tong_sao == "") {
            $tong_sao = 0;
        }

        $trungbinh = round(($tong_sao / $tong_nbl), 1);
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
    <title>Hồ sơ gian hàng -đánh giá</title>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-500.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-regular.woff2" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="/fonts/roboto-v16-vietnamese_latin-ext-700.woff2" as="font" type="font/woff2" crossorigin>
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" type="text/css" href="/css/style_new/select2.min.css" />

    <link rel="stylesheet" type="text/css" href="/css/style_new/style.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/newCss/box-left_pers_seller_prof.css?v=<?= $version ?>">
    <link rel="stylesheet" type="text/css" href="/css/style_new/style_b.css?v=<?= $version ?>">
</head>

<body>
    <? include "../includes/common/inc_header.php"; ?>
    <section>
        <div class="gianhang_container">
            <div class="d_flex j_between hs_df_1">
                <!-- <div class="tongkhoitrai"> -->
                    <?php include "../includes/common/inc_container_box_left_dn_new.php" ?>
                <!-- </div> -->
                <div class="khoi_khong_face_a hs_768_df1">
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
                        <div class="position_ral position_ral_df_zindex df_hs_khach_dg">
                            <a href="/ho-so-gian-hang-cua-toi-trang-chu.html" class="btn_trangchu_a">
                                <p class="color_text hs_df_7">Trang chủ</p>
                            </a>
                            <a href="/ho-so-gian-hang-cua-toi-dang-gia.html" class="btn_danhgia_a">
                                <p class="color_cam hs_df_7">Đánh giá</p>
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
                    <div class="khoi_vietdanhgia">
                        <div class="khoicon_danhgia khoicon_danhgia_df_1">
                            <div class="d_flex hd-align-center">
                                <div class="bg_chung bg_chung_hs_df">
                                    <img src="../images/anh_moi/danhgia.svg" alt="">
                                </div>
                                <div class="color_vang gioithieu gioithieu_df_hs">Đánh giá tài khoản</div>
                            </div>
                            <!-- Chưa có đánh giá -->
                            <? if (mysql_num_rows($list_bl->result) > 0) { ?>
                                <div class="div_khoi_da_co_danh_gia">
                                    <div class="d_flex hd-jtify-center hd-align-center">
                                        <div class="so_sao"><?= $trungbinh ?></div>
                                        <div id="rating" class="khh_dgia">
                                            <div class="div5sao_df" style="width: <?= $trungbinh * 20 ?>%;">
                                                <img src="/images/anh_moi/5sao2.svg" class="da_danhgia">
                                            </div>
                                        </div>
                                    </div>
                                    <? while ($row_bl = mysql_fetch_assoc($list_bl->result)) {
                                        $id_bl = $row_bl['eva_id'];
                                        $bl_usc = $row_bl['user_id'];
                                        $nguoi_bl = new db_query("SELECT `usc_id`, `usc_name`, `usc_logo` FROM `user` WHERE `usc_id` = $bl_usc ");
                                        $row_nbl = mysql_fetch_assoc($nguoi_bl->result);
                                        $check_dcbl = new db_query("SELECT `eva_id`, `bl_user`, `eva_comment`, `eva_comment_time`, `da_csbl`, `usc_logo` FROM `evaluate`
                                                        INNER JOIN `user` ON `evaluate`.`user_id` = `user`.`usc_id`
                                                        WHERE `user_id` = $id_user AND `eva_active` = 1 AND `eva_parent_id` = $id_bl "); ?>

                                        <div class="khoilon_danhgia" data="<?= $_COOKIE['UID'] ?>">
                                            <div class="khoi_cmt_danhgia">
                                                <div class="them_div_khoi_cmt_danhgia">
                                                    <div class="them_div_anh_df">
                                                        <? if ($row_nbl['usc_logo']) { ?>
                                                            <img src="/images/anh_moi/avatar.png" alt="">
                                                        <? } else { ?>
                                                            <img src="<?= $row_nbl['usc_logo'] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                                        <? } ?>
                                                    </div>
                                                    <p class="name_rate color_text"><?= $row_nbl['usc_name'] ?>
                                                        <span class="time_rate"><?= lay_tgian($row_bl['eva_comment_time']) ?></span>
                                                    </p>
                                                </div>
                                                <div id="rating_1">
                                                    <?
                                                    for ($i = 0; $i < (5 - $row_bl['eva_stars']); $i++) { ?>
                                                        <img data-src="/images/newImages/sao-rong.png" src="/images/newImages/sao-rong.png" class="lazyload danh-gia-tk">
                                                    <? }
                                                    for ($i = 0; $i < $row_bl['eva_stars']; $i++) { ?>
                                                        <img data-src="/images/newImages/sao.png" src="/images/newImages/sao.png" class="lazyload danh-gia-tk">
                                                    <? } ?>
                                                </div>
                                            </div>
                                            <p class="color_text font-16 text_danhgia"><?= $row_bl['eva_comment'] ?></p>
                                            <div class="traloi_bl" data="<?= $id_bl ?>">
                                                <? if (mysql_num_rows($check_dcbl->result) == 0) { ?>
                                                    <div class="them_div_tra_loi_df">
                                                        <div class="them_div_tra_loi_df_img">
                                                            <img src="../images/anh_moi/tra_loi.svg" alt="">
                                                        </div>
                                                        <div class="cl_bluantrl">
                                                            <p class="them_div_tra_loi_df_text bam_traloi">Trả lời</p>
                                                        </div>
                                                    </div>
                                                    <div class="khoi_vietdanhgia d_none">
                                                        <form class="khoicon_danhgia khoicon_danhgia_df2">
                                                            <div class="d_flex hd-align-center mb20 traloi_danhgiagh">
                                                                <div class="bg_chung bg_chung_df_icon_viet">
                                                                    <img src="../images/anh_moi/vietdanhgia.svg" alt="">
                                                                </div>
                                                                <div class="color_vang gioithieu">Trả lời đánh giá</div>
                                                                <span class="dong_trlbl">&times;</span>
                                                            </div>
                                                            <div class="d_flex j_between df_680px">
                                                                <div class="w_100 khoitraidanhgia khoitraidanhgia_df_hs">
                                                                    <p class="font-dam hd_font15-17">Nội dung đánh giá <span class="color_red">*</span>
                                                                    </p>
                                                                    <textarea class="texa-mo-ta" placeholder="Nhập mô tả" name="mota"></textarea>
                                                                </div>
                                                            </div>
                                                            <div class="d_flex j_end">
                                                                <button class="btn_guidanhgia" name="guidgia" type="button" onclick="traloi_dgia(this)">Gửi đánh giá</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                <? } else {
                                                    $row_trl = mysql_fetch_assoc($check_dcbl->result); ?>
                                                    <div class="cmt_answer traloi_bluan">
                                                        <div class="title-dgtk d_flex tieude_trlbl">
                                                            <div class="avt_cmt">
                                                                <? if ($row_trl['usc_logo'] == "") { ?>
                                                                    <img src="/images/anh_moi/avatar.png" alt="">
                                                                <? } else { ?>
                                                                    <img src="<?= $row_trl['usc_logo'] ?>" alt="" onerror="this.src=`/images/anh_moi/dai_dien_avt.png`">
                                                                <? } ?>
                                                            </div>
                                                            <span class="text-title-dgtk color_text cr_weight"><?= $user_name ?></span>
                                                            <? if ($row_trl['da_csbl'] == 0) { ?>
                                                                <span class="csua_bltrl cr_weight" data="<?= $row_trl['eva_id'] ?>" data1="<?= $_COOKIE['UT'] ?>">Chỉnh sửa</span>
                                                            <? } ?>
                                                            <span class="time-title-dgtk color_text"><?= lay_tgian($row_trl['eva_comment_time']) ?></span>
                                                        </div>
                                                        <p class="cmt-dgtk"><?= $row_trl['eva_comment'] ?></p>
                                                    </div>
                                                <? } ?>
                                                <div class="bluan_csua_tk"></div>
                                            </div>
                                        </div>
                                    <? } ?>
                                </div>
                            <? } else { ?>
                                <div class="div_chua_co_danh_gia">
                                    <div class="div_chua_co_danh_gia_tex">Tài khoản này chưa có đánh giá nào</div>
                                </div>
                            <? } ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <? include '../includes/inc_new/inc_footer.php'; ?>
    <script type="text/javascript" src="../js/newJs/admin.main.js"></script>
    <script type="text/javascript" src="/js/personal_seller_profile.js"></script>
</body>

</html>
<script type="text/javascript">
    function calcRate(r) {
        const f = ~~r, //Tương tự Math.floor(r)
            id = 'star' + f + (r % f ? 'half' : '')
        id && (document.getElementById(id).checked = !0)
    }
    $(document).ready(function() {
        var do_xuay = 0;

        $(".xoay360").click(function() {
            do_xuay += 360;
            xoay($(this), do_xuay);
        })

        function xoay(img, deg) {
            $('.xoay360').css("transform", "rotate(" + deg + "deg)");
            $('.xoay360').css("transition", "0.2s");
        }

        function ramdumso(length) {
            var result = '';
            var characters = '0123456789';
            var charactersLength = characters.length;
            for (var i = 0; i < length; i++) {
                result += characters.charAt(Math.floor(Math.random() * charactersLength));
            }
            return result;
        }
        $(".show_macapcha").html(ramdumso(5));
        $(".xoay360").click(function() {
            $(".show_macapcha").html(ramdumso(5));
        })
        // SHOW MENU
        $('.show_menu_768').click(function() {
            $(this).toggleClass('rotate_768');
            $('.hs_768_df3').toggleClass('box_sd_menu');
            $('.them_cl_new').toggle(500);
        })

        // SHOW FACEBOOK, WEBSITE 375
        $('.icon_link_375').click(function() {
            $('.them_div_bao_ngoai1').toggleClass('hide_375');
        })

    });

    $(".bam_traloi").click(function() {
        $(this).parents(".traloi_bl").find(".khoi_vietdanhgia").removeClass("d_none");
    });

    $(".dong_trlbl").click(function() {
        $(this).parents(".traloi_bl").find(".khoi_vietdanhgia").addClass("d_none");
    });

    function traloi_dgia(id) {
        var binh_luan = $(id).parents(".traloi_bl").find(".texa-mo-ta").val();
        var nguoi_tloi = $(id).parents(".khoilon_danhgia").attr("data");
        var id_bl = $(id).parents(".traloi_bl").attr("data");
        if (binh_luan.trim() != "") {
            $.ajax({
                url: '/ajax/traloi_bluan.php',
                type: 'POST',
                data: {
                    binh_luan: binh_luan,
                    nguoi_tloi: nguoi_tloi,
                    id_bl: id_bl,
                },
                success: function(data) {
                    if (data == "") {
                        alert("Gửi đánh giá thành công");
                        window.location.reload();
                    } else {
                        alert(data);
                    }
                }
            })
        } else {
            alert("Nhập trả lời bình luận");
        }
    }

    $(".csua_bltrl").click(function() {
        var id_cs = $(this).attr("data");
        var type_cs = $(this).attr("data1");
        var _this = $(this);
        $.ajax({
            url: '/render/csua_bluan.php',
            type: 'POST',
            data: {
                bl_id: id_cs,
                type_cs: type_cs,
            },
            success: function(data) {
                _this.parents(".traloi_bl").find(".bluan_csua_tk").html(data);
            }
        });
    });
</script>