<?
$my_id = intval(@$_COOKIE['id_chat365']);
if ($my_id > 0) {
    $qr_sc = new db_query("SELECT chat365_secret FROM user WHERE chat365_id = '$my_id'");
    $row_sc = mysql_fetch_assoc($qr_sc->result);
    $chat365_secret = $row_sc['chat365_secret'];
} else {
    $chat365_secret = '';
}
$link_chat = get_link_chat365($my_id, $user_ok['chat365_id'], $user_ok['usc_id'], $user_ok['usc_store_name'], $user_ok['usc_phone'], '', $chat365_secret);

?>
<div class="position_ral hs_df_5">
    <? if ($img_store != '') { ?>
        <img onerror="this.onerror=null; this.src='/images/anh_moi/banner.png';" src="/pictures/<?= $img_store ?>" alt="<?= $user_ok['usc_store_name'] ?>" class="cover_img cover_img_khach thay_anh">
    <? } else { ?>
        <img src="/images/anh_moi/banner.png" alt="<?= $user_ok['usc_store_name'] ?>" class="cover_img cover_img_khach thay_anh">
    <? } ?>

    <div class="avatar_img hs_df_2">
        <img onerror="this.onerror=null; this.src='/images/anh_moi/avatar.png';" src="<?= str_replace('../', '/', $logo_usc) ?>" alt="<?= $user_ok['usc_store_name'] ?>">
        <div class="tt_hoatdong hs_df_4"></div>
    </div>
    <h1 class="ten_cuahang hs_df_3 elipsis1"><?= $user_ok['usc_store_name'] ?></h1>
    <div class="chatngay_cnghang">
        <? if (isset($_COOKIE['id_chat365'])) { ?>
            <a class="chat_ngay" rel="nofollow" href="<?= $link_chat; ?>" target="_blank">
                <p class="cr_weight">Chat ngay</p>
            </a>
        <? } else { ?>
            <div class="chat_ngay item_chat op_ovl_dn" id-chat='<?= $user_ok['chat365_id'] ?>'>
                <p class="cr_weight">Chat ngay</p>
            </div>
        <? } ?>
    </div>
</div>

<div class=" khoi_internet <?= ($_SERVER['REQUEST_URI'] == $sv_url1) ? "hs_df_6" : "khoi_internet_khach_dg" ?>">
    <div class="<?= ($_SERVER['REQUEST_URI'] == $sv_url1) ? "position_ral position_ral_df_zindex" : "df_hs_khach_dg" ?>">
        <a href="/gian-hang/<?= $id ?>/<?= replaceTitle($user_ok['usc_store_name']) ?>.html" class="<?= ($_SERVER['REQUEST_URI'] == $sv_url1) ? "btn_trangchu hs_df_8" : "btn_trangchu_a" ?>">
            <p class="<?= ($_SERVER['REQUEST_URI'] == $sv_url1) ? "color_cam hs_df_7" : "color_text" ?>">Trang chủ</p>
        </a>
        <a href="/danh-gia-gian-hang/<?= $id ?>/<?= replaceTitle($user_ok['usc_store_name']) ?>.html" class="<?= ($_SERVER['REQUEST_URI'] == $sv_url2) ? "btn_danhgia_a" : "btn_danhgia hs_df_9" ?>" rel="nofollow">
            <p class="<?= ($_SERVER['REQUEST_URI'] == $sv_url2) ? "color_cam" : "color_text hs_df_7" ?>">Đánh giá</p>
        </a>
    </div>
    <div class="d_flex j_end hide_a_375 df_position_r">
        <div class="icon_link_375">
            <img src="/images/anh_moi/link_375.svg" alt="">
        </div>
        <div class="them_div_bao_ngoai1 hide_375">
            <? if ($user_ok['usc_facename'] != "") { ?>
                <a href="<?= $user_ok['usc_facename'] ?>" class="d_flex btn_facebook hs_df_10" target="_blank">
                    <div class="btn_facebook_img">
                        <img src="/images/anh_moi/fb_svg.svg" alt="Facebook">
                    </div>
                    <p>Facebook</p>
                </a>
            <? }
            if ($user_ok['usc_website'] != "") { ?>
                <a href="<?= $user_ok['usc_website'] ?>" class="d_flex btn_web hs_df_10" target="_blank">
                    <div class="btn_web_img">
                        <img src="/images/anh_moi/web_svg.svg" alt="Website">
                    </div>
                    <p>Website</p>
                </a>
            <? } ?>
        </div>
    </div>
</div>