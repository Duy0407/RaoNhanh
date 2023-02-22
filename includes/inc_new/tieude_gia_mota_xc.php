<?
if (isset($id_nd) && $id_nd != 0) {
?>
    <div class="ctn_ct_box3">
        <p class="ctn_ct_b3_title p_600_s16_l19 cl_cam">
            Tiêu đề và mô tả
        </p>
        <div class="ctn_ct_b3_fr">
            <div class="ctn_ct_b3_fr1 box_input_infor">
                <p class="b3_fr1_title p_400_s15_l18">Tiêu đề <span class="cl_red">*</span></p>
                <input type="text" name="tieu_de" value="<?= $item_td['new_title'] ?>" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tiêu đề" autocomplete="off">
                <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">lớn hơn 40, nhỏ hơn 70 ký tự</p>
            </div>
            <? if ($xacthuc_lket != 1) { ?>
                <div class="ctn_ct_b3_fr2 d_flex fl_cl">
                    <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                        <div class="b3_fr2_gia box_input_infor">
                            <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                            <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                <input type="text" onkeyup="format_gtri(this)" value="<?= ($item_td['new_money'] > 0) ? number_format($item_td['new_money']) : "" ?>" <?= ($item_td['new_money'] > 0) ? '' : 'disabled' ?> id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                                <div class="donvitien p_400_s14_l17">
                                    <select class="dt-money-up donvi_ban" name="dvi_tien">
                                        <option value="1" <? if ($item_td['new_unit'] == 1) echo 'selected' ?>>VNĐ</option>
                                        <option value="2" <? if ($item_td['new_unit'] == 2) echo 'selected' ?>>USD</option>
                                        <option value="3" <? if ($item_td['new_unit'] == 3) echo 'selected' ?>>EURO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box_lhhg_ctmp <?= ($xacthuc_lket == 1) ? "pd_t_11" : "" ?>">
                        <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                            <input name="td_lienhe_ngban" type="checkbox" value="0" class="b3_fr2_lhhg_input b3_fr2_input m_lienhenguoiban_cb img24 cursor_Pt" <?= ($item_td['chotang_mphi'] == 0 && $item_td['new_money'] == 0) ? 'checked' : '' ?>>
                            <p class="b3_fr2_lhhg_text pdl_10">Liên hệ người bán để hỏi giá</p>
                        </div>
                        <div class="b3_fr2_chotangmienphi d_flex fl_row al_ct">
                            <input name="td_lienhe_ngban" type="checkbox" value="1" class="b3_fr2_ctmp_input b3_fr2_input m_chotangmienphi_cb img24 cursor_Pt" <?= ($item_td['chotang_mphi'] == 1) ? 'checked' : '' ?>>
                            <p class="b3_fr2_lhhg_text pdl_10">Cho tặng miễn phí</p>
                        </div>
                    </div>
                </div>
            <? } ?>
            <div class="ctn_ct_b3_fr3 box_input_infor">
                <p class="b3_fr3_title p_400_s15_l18">
                    Mô tả <span class="cl_red">*</span>
                </p>
                <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"><?= strip_tags(nl2br($item_td['new_description'])) ?></textarea>
                <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                    <input type="text" name="count" id="count" value="0"> / 10000 ký tự
                </div>
            </div>
        </div>
    </div>
<? } else { ?>
    <div class="ctn_ct_box3">
        <p class="ctn_ct_b3_title p_600_s16_l19 cl_cam">
            Tiêu đề và mô tả
        </p>
        <div class="ctn_ct_b3_fr">
            <div class="ctn_ct_b3_fr1 box_input_infor">
                <p class="b3_fr1_title p_400_s15_l18">Tiêu đề <span class="cl_red">*</span></p>
                <input type="text" name="tieu_de" class="b3_fr1_input p_400_s14_l17" placeholder="Nhập tiêu đề" autocomplete="off">
                <p class="b3_fr1_title_note p_400_s12_l14 cl_99999">lớn hơn 40, nhỏ hơn 70 ký tự</p>
            </div>
            <? if ($xacthuc_lket != 1) { ?>
                <div class="ctn_ct_b3_fr2 d_flex fl_cl">
                    <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                        <div class="b3_fr2_gia box_input_infor">
                            <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                            <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                                <input type="text" onkeyup="format_gtri(this)" id="gia-ban-sp" onkeyup="format_gtri(this)" autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                                <div class="donvitien p_400_s14_l17">
                                    <select class="dt-money-up donvi_ban" name="dvi_tien">
                                        <option value="1">VNĐ</option>
                                        <option value="2">USD</option>
                                        <option value="3">EURO</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="box_lhhg_ctmp <?= ($xacthuc_lket == 1) ? "pd_t_11" : "" ?>">
                        <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                            <input name="td_lienhe_ngban" type="checkbox" value="0" class="b3_fr2_lhhg_input m_lienhenguoiban_cb img24 cursor_Pt">
                            <p class="b3_fr2_lhhg_text pdl_10">Liên hệ người bán để hỏi giá</p>
                        </div>
                        <div class="b3_fr2_chotangmienphi d_flex fl_row al_ct">
                            <input name="td_lienhe_ngban" type="checkbox" value="1" class="b3_fr2_ctmp_input m_chotangmienphi_cb img24 cursor_Pt">
                            <p class="b3_fr2_lhhg_text pdl_10">Cho tặng miễn phí</p>
                        </div>
                    </div>
                </div>
            <? } ?>
            <div class="ctn_ct_b3_fr3 box_input_infor">
                <p class="b3_fr3_title p_400_s15_l18">
                    Mô tả <span class="cl_red">*</span>
                </p>
                <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"></textarea>
                <div class="b3_fr3_note p_400_s12_l14 cl_99999">
                    <input type="text" name="count" id="count" value="0"> / 10000 ký tự
                </div>
            </div>
        </div>
    </div>
<? } ?>