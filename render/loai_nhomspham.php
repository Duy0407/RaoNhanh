<?
include('config.php');
$json = $_POST['json'];
$json = json_decode($json, true);

for ($i = 0; $i < count($json); $i++) {
    $item_ar = implode(',', $json[$i]);
    $a = ' <div class="footer_bangphanloai d_flex al_ct fl_row pd_t_20">
                <div class="footer_bpl_loai p_400_s16_l19">'.$item_ar.'</div>
                <div class="footer_bpl_soluongkho">
                <input type="text" name="so_luong_kho" value="" placeholder="Nhập" class="ft_bpl_slk  p_400_s14_l16 cl_99999">
                </div>
                <div class="footer_bpl_giaban">
                <div class="ft_bpl_gb d_flex fl_row al_ct p_400_s14_l16 cl_99999">
                    <input type="text" onkeyup="format_gtri(this)" name="gia_spham_xt" class="txt_gia_bpl b3_fr2_gia_input p_400_s14_l16" placeholder="Giá" autocomplete="off">
                    <div class="donvitien p_400_s14_l17">
                            <select class="dt-money-up donvi_ban donvitien_xt p_400_s14_l16" name="dvi_tien_xt">
                            <option value="1">VNĐ</option>
                            <option value="2">USD</option>
                            <option value="3">EURO</option>
                            </select>
                    </div>
                </div>
                </div>
                <div class="footer_bpl_xoa p_400_s16_l19">
                <img src="/images/m_raonhanh_imgnew/delete_red.png" class="icon_delete_loai img20 cursor_Pt" onclick="delete_bangplsp(this)">
                </div>
            </div>';
    echo $a;
}
