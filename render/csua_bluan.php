<?
include("config.php");
$bl_id = getValue('bl_id', 'int', 'POST', 0);
$type_cs = getValue('type_cs', 'int', 'POST', 0);

if ($bl_id != 0) {
    $list_bl = new db_query("SELECT `eva_id`, `eva_comment` FROM `evaluate`
                            WHERE `eva_id` = $bl_id AND `eva_active` = 1 ");
    if (mysql_num_rows($list_bl->result) > 0) {
        $row_bl = mysql_fetch_assoc($list_bl->result);
        if ($type_cs == 2) {
?>
            <div class="hd_cspointer d_flex hd-align-center binhluan_motlan">
                <div class="danhgia_hscn2">
                    <div class="d_flex hd-align-center phanhoikh">
                        <div class="bg_vang k_anh_chung">
                            <img src="../images/anh_moi/edit_rate.png" alt="">
                        </div>
                        <div class="color_vang ghichu">Chỉnh sửa phản hồi với khách hàng</div>
                        <div class="nut_cancel hd_cspointer">
                            <span class="close_csbluan" onclick="close_csb(this)">&times;</span>
                        </div>
                    </div>
                    <div class="o-phanhoikh">
                        <p class="font-dam hd_font15-17">Nội dung phản hồi<span class="color_red p5">*</span></p>
                        <textarea class="text-phan-hoi form-control" placeholder="Nhập nội dung" name="noidung_phanhoi"><?= $row_bl['eva_comment'] ?></textarea>
                    </div>
                    <div class="btn-phan-hoi-kh d_flex">
                        <button type="button" class="btn-gui-ph hd_cspointer" data="<?= $row_bl['eva_id'] ?>" onclick="cs_trloibl(this)">Gửi </button>
                    </div>
                </div>
            </div>
        <? } else if ($type_cs == 5) { ?>
            <div class="khoi_vietdanhgia1">
                <form class="khoicon_danhgia khoicon_danhgia_df2 binhluan_motlan">
                    <div class="d_flex hd-align-center mb20 traloi_danhgiagh">
                        <div class="bg_chung bg_chung_df_icon_viet">
                            <img src="../images/anh_moi/vietdanhgia.svg" alt="">
                        </div>
                        <div class="color_vang gioithieu">Chỉnh sửa đánh giá</div>
                        <span class="dong_trlbl" onclick="close_csb(this)">&times;</span>
                    </div>
                    <div class="d_flex j_between df_680px">
                        <div class="row-tin-dang khoitraidanhgia khoitraidanhgia_df_hs">
                            <p class="font-dam hd_font15-17">Nội dung đánh giá <span class="color_red">*</span>
                            </p>
                            <textarea class="texa-mo-ta text-phan-hoi" placeholder="Nhập mô tả" name="mota"><?= $row_bl['eva_comment'] ?></textarea>
                        </div>
                    </div>
                    <div class="d_flex j_end">
                        <button class="btn_guidanhgia" type="button" data="<?= $row_bl['eva_id'] ?>" onclick="cs_trloibl(this)">Gửi đánh giá</button>
                    </div>
                </form>
            </div>
<? }
    }
} ?>