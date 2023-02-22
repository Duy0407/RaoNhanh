<div class="hd_modal_rn hd_modal_tindang hd_modal_Khu_vuc modal_sel">
    <div class="hd_content_rn font-16 liheght-18">
        <div class="hd_modal_header hd-disflex hd-align-center">
            <p class="modal_p_header font-16 liheght-18 hd-clor-white">Địa chỉ nhận hồ sơ</p>
            <div class="tat-dang-tin-md hd_cspointer">
                <img src="../images/hd-x-icon.svg" alt="tắt đang tin danh mục" />
            </div>
        </div>
        <form id="form_md_khu_vuc">
            <div class="hd-padding30-50 ">
                <div class="hd-align-center md-dia-chi select-change box_input_infor">
                    <p class="font-dam hd_font15-17">Tỉnh/thành phố <span class="color_red">*</span></p>
                    <select name="kv_thanhpho" class="kv_thanhpho slect-hang" onchange="tinh_tp_a(this)">
                        <option value="">Tỉnh/thành phố</option>
                        <? foreach ($arrcity as $row_cty) { ?>
                            <option value="<?= $row_cty['cit_id'] ?>" <?= ($row_cty['cit_id'] == $kv_tthanh) ? "selected" : "" ?>><?= $row_cty['cit_name'] ?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="hd-align-center md-dia-chi select-change box_input_infor">
                    <p class="font-dam hd_font15-17">Quận/huyện <span class="color_red">*</span></p>
                    <select name="kv_quanhuyen" class="kv_quanhuyen slect-hang" data="<?= $kv_qhuyen ?>" onchange="quan_huyen_a(this)">
                        <option value="">Quận/huyện</option>
                        <? if (isset($kv_tthanh) && $kv_tthanh != "") {
                            $list_qhuyen = new db_query("SELECT `cit_id`, `cit_name` FROM `city2` WHERE `cit_parent` = $tinh_thanh ");
                            while ($row_huyen = mysql_fetch_assoc($list_qhuyen->result)) { ?>
                                <option value="<?= $row_huyen['cit_id'] ?>" <?= ($row_huyen['cit_id'] == $kv_qhuyen) ? "selected" : "" ?>><?= $row_huyen['cit_name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <div class="hd-align-center md-dia-chi select-change box_input_infor">
                    <p class="font-dam hd_font15-17">Phường/xã <span class="color_red">*</span></p>
                    <select name="kv_phuongxa" class="kv_phuongxa slect-hang">
                        <option value="">Phường/xã</option>
                        <? if (isset($kv_tthanh) && isset($kv_qhuyen)) {
                            // `province_id` = '$tinh_thanh' AND
                            $list_pxa = new db_query("SELECT `id`, `name`, `prefix` FROM `phuong_xa` WHERE `district_id` = $kv_qhuyen ");
                            while ($row_pxa = mysql_fetch_assoc($list_pxa->result)) { ?>
                                <option value="<?= $row_pxa['id'] ?>" <?= ($row_pxa['id'] == $kv_pxa) ? "selected" : "" ?>><?= $row_pxa['prefix'] ?> <?= $row_pxa['name'] ?></option>
                        <? }
                        } ?>
                    </select>
                </div>
                <div class="hd-align-center md-dia-chi select-change box_input_infor" style="margin-bottom: 28px;">
                    <p class="font-dam hd_font15-17">Số nhà, đường phố <span class="color_red">*</span></p>
                    <input type="text" name="kv_so_nha" class="td_snha_dpho kv_so_nha cl-input-add input_infor_tag" placeholder="Số nhà, đường phố" value="<?= ($kv_snha != "") ? $kv_snha : "" ?>" autocomplete="off">
                </div>
                <div class="bnt-cont-dc-poup">
                    <button type="button" class="btn-xac-nhan xacnhan_dc hd_cspointer" onclick="md_khu_vuc()" data="">Xác nhận</button>
                </div>
            </div>
        </form>
    </div>
</div>