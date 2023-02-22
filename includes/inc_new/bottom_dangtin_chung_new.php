<? if (isset($id_nd) && $id_nd != 0) { ?>
    <? if ($xacthuc_lket != 1) { ?>
        <div class="ctn_ct_b3_fr2 d_flex fl_cl">
            <div class="b3_fr2_tien d_flex fl_row al_ct jtf_spb">
                <div class="b3_fr2_gia box_input_infor">
                    <p class="b3_fr2_gia_tt p_400_s15_l18">Giá <span class="cl_red">*</span></p>
                    <div class="b3_fr2_gia_container d_flex fl_row al_ct jtf_spb">
                        <input type="text" onkeyup="format_gtri(this)" id="gia-ban-sp" value="<?= ($item_td['new_money'] > 0) ? number_format($item_td['new_money']) : "" ?>" <?= ($item_td['new_money'] != 0 && $item_td['chotang_mphi'] != 1) ? '' : 'disabled' ?> autocomplete="off" oninput="<? $oninput; ?>" name="td_gia_spham" class="b3_fr2_gia_input p_400_s14_l17" placeholder="Giá" autocomplete="off">
                        <div class="donvitien p_400_s14_l17">
                            <select class="dt-money-up donvi_ban" name="dvi_tien">
                                <option value="1" <?= ($item_td['new_unit'] == 1) ? 'selected' : "" ?>>VNĐ</option>
                                <option value="2" <?= ($item_td['new_unit'] == 2) ? 'selected' : "" ?>>USD</option>
                                <option value="3" <?= ($item_td['new_unit'] == 3) ? 'selected' : "" ?>>EURO</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box_lhhg_ctmp">
                <div class="b3_fr2_lienhehoigia d_flex fl_row al_ct">
                    <input name="td_lienhe_ngban" type="checkbox" value="0" class="b3_fr2_lhhg_input m_lienhenguoiban_cb img24 cursor_Pt" <?= ($item_td['chotang_mphi'] == 0 && $item_td['new_money'] == 0) ? "checked" : "" ?>>
                    <p class="b3_fr2_lhhg_text pdl_10">Liên hệ người bán để hỏi giá</p>
                </div>
                <div class="b3_fr2_chotangmienphi d_flex fl_row al_ct">
                    <input name="td_lienhe_ngban" type="checkbox" value="1" <?= ($item_td['chotang_mphi'] == 1) ? "checked" : "" ?> class="b3_fr2_ctmp_input m_chotangmienphi_cb img24 cursor_Pt">
                    <p class="b3_fr2_lhhg_text pdl_10">Cho tặng miễn phí</p>
                </div>
            </div>
        </div>
    <? } ?>
    <div class="ctn_ct_b3_fr3 box_input_infor">
        <p class="b3_fr3_title p_400_s15_l18">
            Mô tả <span class="cl_red">*</span>
        </p>
        <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"><?= nl2br($item_td['new_description']) ?></textarea>
        <div class="b3_fr3_note p_400_s12_l14 cl_99999">
            <input type="text" name="count" id="count" value="0"> / 10000 ký tự
        </div>
    </div>
    <!-- ---------------------------------------------------------------------Thong tin ban hang------------------------------------------------------------------------- -->
    <? if ($xacthuc_lket == 1) { ?>
        <? include("../includes/inc_new/thongtinbanhang.php"); ?>
    <? } ?>
    <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
    <div class="ctn_ct_box9 d_flex fl_cl <?= ($xacthuc_lket == 1) ? "pdt_30px" : "" ?>">
        <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">
            Về người bán
        </p>
        <div class="ctn_ct_b9_fr1 d_flex fl_cl box_input_infor">
            <p class="b9_fr1_title p_400_s15_l18">
                Bạn là <span class="cl_red">*</span>
            </p>
            <div class="b9_fr1_content d_flex fl_row">
                <label class="b9_fr1_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr1_ct_input b9_fr_ct_input" value="1" <?= ($item_td['canhan_moigioi'] == 1) ? 'checked' : '' ?>>
                    <p class="b9_fr1_content1 b9_fr1_ct_chung">Cá Nhân</p>
                </label>
                <label class="b9_fr2_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr2_ct_input b9_fr_ct_input" value="3" <?= ($item_td['canhan_moigioi'] == 3) ? 'checked' : '' ?>>
                    <p class="b9_fr1_content2 b9_fr1_ct_chung">Bán Chuyên</p>
                </label>
            </div>
        </div>
        <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
            <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
            <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $item_td['new_phone']; ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
        </div>
        <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
            <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
            <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $item_td['new_email']; ?>" placeholder="Nhập email" autocomplete="off">
        </div>
        <div class="xc_box_diachi">
            <?
            $dia_chi = $item_td['dia_chi'];
            if ($dia_chi != '') {
                $dia_chi = explode(";", $dia_chi);
                $stt = 0;
                foreach ($dia_chi as $dc) {
                   if($dc !=""){
                    $stt++;
                    if ($stt <= 1) {
            ?>
                        <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                            <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ <?= ($stt == 1) ? '' : $stt ?></p>
                            <input name="td_dia_chi" type="text" onkeyup="format_gtri_dc(this)" class=" b9_fr4_input m_diachi_xc p_400_s14_l17" value="<?= ltrim($dc, ',') ?>" placeholder="Nhập địa chỉ" autocomplete="off">
                        </div>
                    <? } else { ?>
                        <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                            <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ <span class="one_stt"><?= $stt ?></span></p>
                            <input name="td_dia_chi" type="text" onkeyup="format_gtri_dc(this)" class=" b9_fr4_input m_diachi_xc p_400_s14_l17" value="<?= ltrim($dc, ',') ?>" placeholder="Nhập địa chỉ" autocomplete="off">
                            <img src="/images/m_raonhanh_imgnew/delete_dc.svg" alt="" class="m_delete_dc cursor_Pt img26" onclick="xoa_diachi(this)">
                        </div>
                <? }
                } }
            } else { ?>
                <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                    <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ</p>
                    <input name="td_dia_chi" type="text" onkeyup="format_gtri_dc(this)" class=" b9_fr4_input m_diachi_xc p_400_s14_l17" value="" placeholder="Nhập địa chỉ" autocomplete="off">
                </div>
            <? } ?>
        </div>
        <div class="xc_themdiachi cursor_Pt">
            <div class="xc_themdiachi_fr al_ct d_flex fl_row">
                <img src="/images/m_raonhanh_imgnew/fluent_add-circle-20-regular.svg" alt="" class="xc_themdiachi_img cursor_Pt img20">
                <p class="xc_themdiachi_text pdl_5 cl_blue p_400_s15_l18">Thêm địa chỉ</p>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------box10--------------------------------------------------------------------- -->
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
    <!-- ----------------------------------------------------------------------box11--------------------------------------------------------------------- -->
    <div class="ctn_ct_box11">
        <div class="ctn_ct_b11_button d_flex fl_row al_ct jtf_ct">
            <p class="b11_btn_xemtruoc cursor_Pt rdu5 cl_cam bd_cam p_600_s15_l18 d_flex al_ct jtf_ct txt_al_ct" onclick="xem_trc_tin()">
                XEM TRƯỚC
            </p>
            <p class="b11_btn_chinhsua chinhsua_oto cursor_Pt cl_fffff bg_cam rdu5 p_600_s15_l18  d_flex al_ct jtf_ct txt_al_ct">
                CHỈNH SỬA
            </p>
        </div>
    </div>
<? } else { ?>
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
            <div class="box_lhhg_ctmp">
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
        <textarea rows="6" placeholder="Nhập mô tả" class="b3_fr3_txt p_400_s14_l17" maxlength="10000" name="mota" onKeyUp="textCounter(this,'count')"></textarea>
        <div class="b3_fr3_note p_400_s12_l14 cl_99999">
            <input type="text" name="count" id="count" value="0"> / 10000 ký tự
        </div>
    </div>
    <!-- ---------------------------------------------------------------------Thong tin ban hang------------------------------------------------------------------------- -->
    <? if ($xacthuc_lket == 1) { ?>
        <? include("../includes/inc_new/thongtinbanhang.php"); ?>
    <? } ?>
    <!-- ----------------------------------------------------------------------box9--------------------------------------------------------------------- -->
    <div class="ctn_ct_box9 d_flex fl_cl <?= ($xacthuc_lket == 1) ? "pdt_30px" : "" ?>">
        <p class="ctn_ct_b9_title p_600_s16_l19 cl_cam w100">
            Về người bán
        </p>
        <div class="ctn_ct_b9_fr1 d_flex fl_cl box_input_infor">
            <p class="b9_fr1_title p_400_s15_l18">
                Bạn là <span class="cl_red">*</span>
            </p>
            <div class="b9_fr1_content d_flex fl_row">
                <label class="b9_fr1_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr1_ct_input b9_fr_ct_input" value="1" checked>
                    <p class="b9_fr1_content1 b9_fr1_ct_chung">Cá Nhân</p>
                </label>
                <label class="b9_fr2_ct_label">
                    <input type="radio" name="canhan_moigioi" class="b9_fr2_ct_input b9_fr_ct_input" value="3">
                    <p class="b9_fr1_content2 b9_fr1_ct_chung">Bán Chuyên</p>
                </label>
            </div>
        </div>
        <div class="ctn_ct_b9_fr2 d_flex fl_cl w100 box_input_infor">
            <p class="b9_fr2_title p_400_s15_l18 w100">Số điện thoại <span class="cl_red">*</span></p>
            <input name="sdt_lienhe" type="text" class="b9_fr2_input p_400_s14_l17" value="<?= $usc_phone = $row4['usc_phone']; ?>" placeholder="Nhập số điện thoại" autocomplete="off" oninput="<?= $oninput ?>">
        </div>
        <div class="ctn_ct_b9_fr3 d_flex fl_cl w100">
            <p class="b9_fr3_title p_400_s15_l18 w100">Email</p>
            <input name="email_lienhe" type="text" class="b9_fr3_input p_400_s14_l17" value="<?= $usc_email = $row4['usc_email']; ?>" placeholder="Nhập email" autocomplete="off">
        </div>
        <div class="xc_box_diachi">
            <div class="ctn_ct_b9_fr4 d_flex fl_cl w100">
                <p class="b9_fr4_title p_400_s15_l18 w100">Địa chỉ</p>
                <input name="td_dia_chi" onkeyup="format_gtri_dc(this)" type="text" class=" b9_fr4_input m_diachi_xc p_400_s14_l17" placeholder="Nhập địa chỉ" autocomplete="off">
            </div>
        </div>
        <div class="xc_themdiachi cursor_Pt">
            <div class="xc_themdiachi_fr al_ct d_flex fl_row">
                <img src="/images/m_raonhanh_imgnew/fluent_add-circle-20-regular.svg" alt="" class="xc_themdiachi_img cursor_Pt img20">
                <p class="xc_themdiachi_text pdl_5 cl_blue p_400_s15_l18">Thêm địa chỉ</p>
            </div>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------box10--------------------------------------------------------------------- -->
    <div class="ctn_ct_box10 d_flex fl_cl">
        <p class="ctn_ct_b10_title p_600_s16_l19 cl_cam">
            Chi tiết danh mục <span class="cl_red">*</span>
        </p>
        <div class="ctn_ct_b10_fr box_input_infor">
            <select name="chitiet_dm" id="chitiet_dm" class="ctn_ct_b10_select slect-hang">
                <option disabled selected value="" class="p_400_s14_l17">Thêm chi tiết danh mục</option>
                <? foreach ($result_dm as $rows) { ?>
                    <option value="<?= $rows['tags_id'] ?>"><?= $rows['ten_tags']; ?></option>
                <? } ?>
            </select>
        </div>
    </div>
    <!-- ----------------------------------------------------------------------box11--------------------------------------------------------------------- -->
    <div class="ctn_ct_box11">
        <div class="ctn_ct_b11_button d_flex fl_row al_ct jtf_ct">
            <p class="b11_btn_xemtruoc cursor_Pt rdu5 cl_cam bd_cam p_600_s15_l18 d_flex al_ct jtf_ct txt_al_ct" onclick="xem_trc_tin()">
                XEM TRƯỚC
            </p>
            <p class="b11_btn_dangtin dangtin_oto disable_chung cursor_Pt cl_fffff bg_cam rdu5 p_600_s15_l18  d_flex al_ct jtf_ct txt_al_ct" id="xoa_tddang_tin">
                ĐĂNG TIN
            </p>
        </div>
    </div>
<? } ?>