<? if (isset($id_nd) && $id_nd != 0) { ?>
    <div class="ctn_ct_box9 d_flex fl_cl">
        <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">Về người bán</p>
        <div class="ctn_ct_b9_fr1 d_flex fl_cl">
            <p class="b9_fr1_title p_400_s15_l18"> Bạn là <span class="cl_red">*</span></p>
            <div class="b9_fr1_content d_flex fl_row">
                <label class="b9_fr1_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr1_ct_input b9_fr_ct_input" value="1" <?= ($item_td['canhan_moigioi'] == 1) ? 'checked' : '' ?>>
                    <p class="b9_fr1_content1 b9_fr1_ct_chung">Cá Nhân</p>
                </label>
                <label class="b9_fr2_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr2_ct_input b9_fr_ct_input" value="2" <?= ($item_td['canhan_moigioi'] == 2) ? 'checked' : '' ?>>
                    <p class="b9_fr1_content2 b9_fr1_ct_chung">Môi giới</p>
                </label>
            </div>
        </div>
        <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
            <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
            <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $item_td['new_phone'] ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
        </div>
        <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
            <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
            <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $item_td['new_email'] ?>" placeholder="Nhập email" autocomplete="off">
        </div>
        <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
            <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ</p>
            <input name="td_dia_chi" type="text" class="b9_fr4_input p_400_s14_l17" value="<?= $item_td['new_address'] ?>" placeholder="Nhập địa chỉ" autocomplete="off">
        </div>
    </div>
    <!-- ----------------------------------------------------------------------box10--------------------------------------------------------------------- -->
    <? if ($id_dm != 123) { ?>
        <div class="ctn_ct_box10 d_flex fl_cl">
            <p class="ctn_ct_b10_title p_600_s16_l19 cl_cam">
                Chi tiết danh mục <span class="cl_red">*</span>
            </p>
            <div class="ctn_ct_b10_fr box_input_infor">
                <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                    <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                    <? foreach ($result_ban as $rows) { ?>
                        <option value="<?= $rows['tags_id'] ?>" <?= ($rows['tags_id'] == $item_td['new_ctiet_dmuc']) ? 'selected' : '' ?>><?= $rows['ten_tags']; ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
    <? }
} else { ?>
    <div class="ctn_ct_box9 d_flex fl_cl">
        <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">Về người bán</p>
        <div class="ctn_ct_b9_fr1 d_flex fl_cl">
            <p class="b9_fr1_title p_400_s15_l18"> Bạn là <span class="cl_red">*</span></p>
            <div class="b9_fr1_content d_flex fl_row">
                <label class="b9_fr1_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr1_ct_input b9_fr_ct_input" value="1" checked>
                    <p class="b9_fr1_content1 b9_fr1_ct_chung">Cá Nhân</p>
                </label>
                <label class="b9_fr2_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr2_ct_input b9_fr_ct_input" value="2">
                    <p class="b9_fr1_content2 b9_fr1_ct_chung">Môi giới</p>
                </label>
            </div>
        </div>
        <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
            <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
            <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $usc_phone ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
        </div>
        <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
            <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
            <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $usc_email ?>" placeholder="Nhập email" autocomplete="off">
        </div>
        <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
            <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ</p>
            <input name="td_dia_chi" type="text" class="b9_fr4_input p_400_s14_l17" value="<?= $usc_address ?>" placeholder="Nhập địa chỉ" autocomplete="off">
        </div>
    </div>
    <!-- ----------------------------------------------------------------------box10--------------------------------------------------------------------- -->
    <? if ($id_dm != 123) { ?>
        <div class="ctn_ct_box10 d_flex fl_cl">
            <p class="ctn_ct_b10_title p_600_s16_l19 cl_cam">
                Chi tiết danh mục <span class="cl_red">*</span>
            </p>
            <div class="ctn_ct_b10_fr box_input_infor">
                <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                    <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                    <? foreach ($result_ban as $rows) { ?>
                        <option value="<?= $rows['tags_id'] ?>"><?= $rows['ten_tags']; ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
<? }
} ?>
<!-- ----------------------------------------------------------------------box11--------------------------------------------------------------------- -->
<div class="ctn_ct_box11">
    <div class="ctn_ct_b11_button d_flex fl_row al_ct jtf_ct">
        <p class="b11_btn_xemtruoc cursor_Pt rdu5 cl_cam bd_cam p_600_s15_l18 d_flex al_ct jtf_ct txt_al_ct" onclick="xem_trc_tin()">
            XEM TRƯỚC
        </p>
        <p class="b11_btn_dangtin cursor_Pt cl_fffff bg_cam rdu5 p_600_s15_l18  d_flex al_ct jtf_ct txt_al_ct" id="xoa_tddang_tin">
            ĐĂNG TIN
        </p>
    </div>
</div>