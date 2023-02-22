<?
include("config.php");

$bl_id = getValue('bl_id', 'int', 'POST', 0);
$type = getValue('type', 'int', 'POST', '');
if ($type != "") {
    if ($bl_id != 0 && $bl_id != "") {
        $list_bl = new db_query("SELECT `eva_id`, `eva_stars`, `eva_comment`, `eva_comment_time`, `eva_active`, `da_csbl`, `tgian_hetcs` FROM `evaluate`
                            WHERE `eva_id` = $bl_id AND `eva_active` = 1 ");
        if (mysql_num_rows($list_bl->result) > 0) {
            $row_bl = mysql_fetch_assoc($list_bl->result);
            if ($type == 5) { ?>
                <div class="khoicon_danhgia khoicon_danhgia_df2">
                    <div class="d_flex hd-align-center mb20">
                        <div class="bg_chung bg_chung_df_icon_viet">
                            <img src="/images/anh_moi/vietdanhgia.svg" alt="">
                        </div>
                        <div class="color_vang gioithieu">Chỉnh sửa đánh giá</div>
                        <span class="dong_csbluan" onclick="dong_csbluan(this)">&times;</span>
                    </div>
                    <form class="danh_gia_dn1" data="<?= $us_id ?>" data1="<?= $id ?>">
                        <div class="d_flex j_between df_680px ">
                            <div class="row-tin-dang khoitraidanhgia khoitraidanhgia_df_hs form_gr">
                                <p class="font-dam hd_font15-17">Nội dung đánh giá <span class="color_red">*</span></p>
                                <textarea class="texa-mo-ta" placeholder="Nhập mô tả" name="mota1"><?= $row_bl['eva_comment'] ?></textarea>
                            </div>
                            <div class="khoiphai_danhgiasao khoiphai_danhgiasao_df">
                                <div id="rating_2">
                                    <input type="radio" id="star<?= $bl_id + 5 ?>" name="rating1" value="5" <?= ($row_bl['eva_stars'] == 5) ? "checked" : "" ?> />
                                    <label class="full" for="star<?= $bl_id + 5 ?>" title="Awesome - 1 stars"></label>

                                    <input type="radio" id="star<?= $bl_id + 4 ?>" name="rating1" value="4" <?= ($row_bl['eva_stars'] == 4) ? "checked" : "" ?> />
                                    <label class="full" for="star<?= $bl_id + 4 ?>" title="Pretty good - 2 stars"></label>

                                    <input type="radio" id="star<?= $bl_id + 3 ?>" name="rating1" value="3" <?= ($row_bl['eva_stars'] == 3) ? "checked" : "" ?> />
                                    <label class="full" for="star<?= $bl_id + 3 ?>" title="Meh - 3 stars"></label>

                                    <input type="radio" id="star<?= $bl_id + 2 ?>" name="rating1" value="2" <?= ($row_bl['eva_stars'] == 2) ? "checked" : "" ?> />
                                    <label class="full" for="star<?= $bl_id + 2 ?>" title="Kinda bad - 4 stars"></label>

                                    <input type="radio" id="star<?= $bl_id + 1 ?>" name="rating1" value="1" <?= ($row_bl['eva_stars'] == 1) ? "checked" : "" ?> />
                                    <label class="full" for="star<?= $bl_id + 1 ?>" title="Sucks big time - 5 star"></label>
                                </div>
                                <div class="item_end khoitong_nhapma">
                                    <p class="font-dam hd_font15-17">Mã xác nhận <span class="color_red">*</span></p>
                                    <div class="khoinhapma ">
                                        <div class="khoinhapma_input form_gr">
                                            <input type="text" name="ma_xacnhan1" placeholder="Mã xác nhận" class="ma_xac_nhan" onclick="an_err(this)">
                                            <span class="error_cap color_red"></span>
                                        </div>
                                        <div class="khoicapcha d_flex hd-align-center">
                                            <p class="b_radius_5 background-none show_macapcha">113452</p>
                                            <input type="hidden" class="macapch" value="113452">
                                            <div style="transform: rotate(7560deg); transition: all 0.3s ease 0s;">
                                                <img src="/images/hd-refresh-captcha.svg" alt="tải lại mã captch" class="hd_cspointer xoay360 xoay361" onclick="xoay_cp(this)">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d_flex j_end">
                            <button class="btn_guidanhgia" type="button" data="<?= $bl_id ?>" onclick="csua_bluan_dn(this)">Gửi đánh giá</button>
                        </div>
                    </form>
                </div>
            <? } else if ($type == 1) { ?>
                <div class="csua_bluan_nban sh_bgr">
                    <div class="d_flex hd-align-center danhgia_kh po_ra">
                        <div class="k_anh_chung">
                            <img src="/images/anh_moi/vietdanhgia.svg" alt="">
                        </div>
                        <div class="color_vang ghichu">Chỉnh sửa đánh giá</div>
                        <span class="dong_csbluan" onclick="dong_csbluan(this)">&times;</span>
                    </div>
                    <form class="o-danhgia_kh">
                        <p class="font-dam hd_font15-17">Nội dung đánh giá<span class="color_red p5">*</span></p>
                        <div class="div-text-danh-gia-kx d_flex">
                            <div class="form_gr danh_gia_tex">
                                <textarea class="text-danh-gia-kx form-control" placeholder="Nhập nội dung đánh giá" name="noidung_danhgia"><?= $row_bl['eva_comment'] ?></textarea>
                            </div>
                            <div class="row-hskx div-ma-xac-nhan">
                                <div class="stars">
                                    <input class="star star-5" id="star-5" type="radio" name="star_nb" value="5" <?= ($row_bl['eva_stars'] == 5) ? "checked" : "" ?> />
                                    <label class="star star-5" for="star-5"></label>

                                    <input class="star star-4" id="star-4" type="radio" name="star_nb" value="4" <?= ($row_bl['eva_stars'] == 4) ? "checked" : "" ?> />
                                    <label class="star star-4" for="star-4"></label>

                                    <input class="star star-3" id="star-3" type="radio" name="star_nb" value="3" <?= ($row_bl['eva_stars'] == 3) ? "checked" : "" ?> />
                                    <label class="star star-3" for="star-3"></label>

                                    <input class="star star-2" id="star-2" type="radio" name="star_nb" value="2" <?= ($row_bl['eva_stars'] == 2) ? "checked" : "" ?> />
                                    <label class="star star-2" for="star-2"></label>

                                    <input class="star star-1" id="star-1" type="radio" name="star_nb" value="1" <?= ($row_bl['eva_stars'] == 1) ? "checked" : "" ?> />
                                    <label class="star star-1" for="star-1"></label>
                                </div>
                                <p class="title_row_rtbm font-dam hd_font15-17">Mã xác nhận <span class="color_red">*</span></p>
                                <div class="d_flex gap_20 ">
                                    <div class="form_gr">
                                        <input type="text" name="td_ma_xn" class="ma-xac-nhan form-control" onclick="an_err(this)">
                                        <span class="error_cap color_red"></span>
                                    </div>
                                    <div class="ma-captcha-cont">
                                        <span class="avt_icon_lh_cp thaydoi_capc" onclick="xoay_cp(this)">
                                            <img src="/images/hd-refresh-captcha.svg" alt="tải lại mã captch" class="hd_cspointer xoay360" style="transform: rotate(2880deg); transition: all 0.2s ease 0s;">
                                        </span>
                                        <p class="ma_dcap ma_dcap_2 sh_clr_five sh_size_five b_radius_5 background-none">442645</p>
                                        <input type="hidden" value="442645" class="ma_cpch">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-danh-gia-kx d_flex">
                            <button type="button" class="btn-gui-dg hd_cspointer" onclick="csua_bluan(this)" data="<?= $bl_id ?>">Gửi đánh giá</button>
                        </div>
                    </form>
                </div>
            <? } ?>
        <? } ?>
    <? } ?>
<? } ?>