<?
// Bất động sản Nhà đất
if ($rs_ctsp_new['new_cate_id'] == 11) { ?>
<? } 
// Bất động sản Văn phòng
else if ($rs_ctsp_new['new_cate_id'] == 34) { ?>
<? }
// Bất động sản Căn hộ chung cư
else if ($rs_ctsp_new['new_cate_id'] == 27) { ?>
<? }
// Bất động sản Đất
else if ($rs_ctsp_new['new_cate_id'] == 12) { ?>
<div class="d_flex mt_20 detail_info">
    <div class="d_flex f_column detail_info_1">
        <div class="d_flex">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/bag-2.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Cần bán/cho thuê</p>
                <p><?= $ban_mua[$rs_ctsp_new_des['can_ban_mua']] ?></p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/house.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Đặc điểm nhà đất</p>
                <p><?= $rs_ctsp_new_des['dac_diem'] ?></p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/Compass.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Hướng đất</p>
                <p><?= $huongchinh[$rs_ctsp_new_des['huong_chinh']] ?></p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/Document Add.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Giấy tờ pháp lý</p>
                <p><?= $giayto[$rs_ctsp_new_des['giay_to_phap_ly']] ?></p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/map.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Mã lô</p>
                <p><?= $rs_ctsp_new_des['ma_lo'] ?></p>
            </div>
        </div>
    </div>
    <div class="d_flex f_column detail_info_2">
        <div class="d_flex">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/format-square.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Diện tích</p>
                <p><?= $rs_ctsp_new_des['dien_tich'] ?> m²</p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img class="trans_90" src="../images/chi_tiet_tin_ban/arrow-square-width.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Chiều dài</p>
                <p><?= $rs_ctsp_new_des['chieu_dai'] ?> m</p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/arrow-square-width.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Chiều ngang</p>
                <p><?= $rs_ctsp_new_des['chieu_rong'] ?> m</p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/Point On Map Perspective.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Tên phân khu</p>
                <p><?= $rs_ctsp_new_des['ten_phan_khu'] ?></p>
            </div>
        </div>
        <div class="d_flex mt_20">
            <div class="mr_10">
                <img src="../images/chi_tiet_tin_ban/buildings.svg" alt="">
            </div>
            <div>
                <p class="color_grey">Loại hình đất</p>
                <p><?= $loaihinhdat[$rs_ctsp_new_des['loai_hinh_dat']] ?></p>
            </div>
        </div>
    </div>
</div>
<? }
// Bất động sản Nhà trong ngõ
else if ($rs_ctsp_new['new_cate_id'] == 26) { ?>
<? }
// Bất động sản Nhà mặt phố
else if ($rs_ctsp_new['new_cate_id'] == 28) { ?>
<? }
// Bất động sản Nhà riêng, nguyên căn
else if ($rs_ctsp_new['new_cate_id'] == 29) { ?>
<? }
// Bất động sản Cửa hàng
else if ($rs_ctsp_new['new_cate_id'] == 33) { ?>
<? } ?>