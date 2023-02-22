<!------------------------MODAL Địa chỉ-------------------------------------->
<div class="hd_modal_rn hd_modal_tindang hd_modal_dia_chi">
    <div class="hd_content_rn font-16 liheght-18">
        <div class="hd_modal_header hd-disflex hd-align-center">
            <p class="modal_p_header font-16 liheght-18 hd-clor-white">Địa chỉ</p>
            <div class="tat-dang-tin-md hd_cspointer">
                <img src="/images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
            </div>
        </div>
        <form id="form_md_diachi">
            <div class="hd-padding30-50 ">
                <div class="hd-align-center md-dia-chi select-change box_input_infor">
                    <p class="font-dam hd_font15-17">Tỉnh/thành phố <span class="color_red">*</span></p>
                    <select name="thanhpho" class="md_tinh_tp hd_widh100" onchange="tinh_tp(this)">
                        <option value="">Tỉnh/thành phố</option>
                        <? foreach ($arrcity as $row_cty) { ?>
                            <option value="<?= $row_cty['cit_id'] ?>" <?= ($row_cty['cit_id'] == $tinh_thanh) ? "selected" : "" ?>><?= $row_cty['cit_name'] ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="hd-align-center md-dia-chi select-change box_input_infor">
                    <p class="font-dam hd_font15-17">Quận/huyện <span class="color_red">*</span></p>
                    <select name="quanhuyen" class="md_quan_huyen" data="<?= $quan_huyen ?>" onchange="quan_huyen(this)">
                        <option value="">Quận/huyện</option>
                        <? if (isset($tinh_thanh) && $tinh_thanh != "") {
                            $list_qhuyen = new db_query("SELECT `cit_id`, `cit_name` FROM `city2` WHERE `cit_parent` = $tinh_thanh ");
                            while ($row_huyen = mysql_fetch_assoc($list_qhuyen->result)) { ?>
                                <option value="<?= $row_huyen['cit_id'] ?>" <?= ($row_huyen['cit_id'] == $quan_huyen) ? "selected" : "" ?>><?= $row_huyen['cit_name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <div class="hd-align-center md-dia-chi select-change box_input_infor">
                    <p class="font-dam hd_font15-17">Phường/xã</p>
                    <select name="phuongxa" class="md_phuong_xa md_phuongxa">
                        <option value="">Phường/xã</option>
                        <? if (isset($tinh_thanh) && isset($quan_huyen)) {
                            // `province_id` = '$tinh_thanh' AND
                            $list_pxa = new db_query("SELECT `id`, `name`, `prefix` FROM `phuong_xa` WHERE `district_id` = $quan_huyen ");
                            while ($row_pxa = mysql_fetch_assoc($list_pxa->result)) { ?>
                                <option value="<?= $row_pxa['id'] ?>" <?= ($row_pxa['id'] == $phuong_xa) ? "selected" : "" ?>><?= $row_pxa['prefix'] ?> <?= $row_pxa['name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <div class="hd-align-center md-dia-chi select-change box_input_infor" style="margin-bottom: 28px;">
                    <p class="font-dam hd_font15-17">Số nhà, đường phố</p>
                    <input type="text" name="md_so_nha" class="td_snha_dpho cl-input-add input_infor_tag" placeholder="Số nhà, đường phố" value="<?= ($so_nha != "") ? $so_nha : "" ?>" autocomplete="off">
                </div>
                <div class="bnt-cont-dc-poup">
                    <button type="button" class="btn-xac-nhan xacnhan_dc hd_cspointer" onclick="md_dia_chi()" data="">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- thong bao dang tin thanh cong -->
<!-- <div class="modal share_modal tbao_tcong_d">
    <div class="modal-content">
        <div class="bgom_modal sh_bgr_one">
            <div class="modal-body">
                <div class="form_body tex_center">
                    <div class="avt_tbao_tc">
                        <img src="/images/anh_moi/icon_tbao_tc.png" />
                    </div>
                    <p class="sh_size_two sh_clr_two cau_tbao">Bạn đã chỉnh sửa thông tin thành công!</p>
                </div>
            </div>
            <div class="modal-footer">
                <p class="luu_chung cr_weight sh_cursor sh_clr_one sh_size_three butt_ctn sh_bgr_two sh_border_rdu">Đồng ý</p>
            </div>
        </div>
    </div>
</div> -->