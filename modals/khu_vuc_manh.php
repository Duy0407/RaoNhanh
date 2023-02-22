<div class="modal share_modal khu_vuc khuvuc_hide">
    <div class="modal-content">
        <div class="bgom_modal sh_bgr_one">
            <div class="modal-header tex_center tbao_hd">
                <span class="close share_close sh_cursor sh_clr_one">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Khu vực</h2>
            </div>
            <div class="modal-body">
                <div class="form_body tex_left">
                    <div class="form-group share_select w_100 mb_20 d_block">
                        <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Khu vực</label>
                        <select name="name_city" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2 toanquoc">
                            <option value="0">Toàn Quốc</option>
                            <? foreach ($arrcity as $row) { ?>
                                <option value="<?= $row['cit_id'] ?>" <?= ($citid == $row['cit_id']) ? "checked" : "" ?> <?= ($row['cit_id'] == $citid) ? "selected" : "" ?>><?= $row['cit_name'] ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="form-group share_select w_100 mb_20 d_block">
                        <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Quận/huyện</label>
                        <select name="quan_huyen" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2 cf_1268591 md_quan_huyen">
                            <option value="">Quận/huyện</option>
                            <? if (isset($citid) && $citid != 0) {
                                $list_qhuyen = new db_query("SELECT `cit_id`, `cit_name` FROM `city2` WHERE `cit_parent` = $citid ");
                                while ($row_huyen = mysql_fetch_assoc($list_qhuyen->result)) { ?>
                                    <option value="<?= $row_huyen['cit_id'] ?>" <?= ($row_huyen['cit_id'] == $disid) ? "checked" : "" ?> <?= ($row_huyen['cit_id'] == $disid) ? "selected" : "" ?>><?= $row_huyen['cit_name'] ?></option>
                            <? }
                            } ?>

                        </select>
                    </div>
                    <div class="form-group share_select d_block">
                        <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Phường/xã</label>
                        <select name="phuong_xa" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2 cf_1268591 md_phuong_xa">
                            <option value="">Phường/xã</option>
                            <? if (isset($citid) && isset($disid)) {
                                $list_pxa = new db_query("SELECT `id`, `name`, `prefix` FROM `phuong_xa` WHERE `district_id` = $disid ");
                                while ($row_pxa = mysql_fetch_assoc($list_pxa->result)) { ?>
                                    <option value="<?= $row_pxa['id'] ?>" <?= ($ward == $row_pxa['id']) ? "checked" : "" ?> <?= ($row_pxa['id'] == $ward) ? "selected" : "" ?>><?= $row_pxa['prefix'] ?> <?= $row_pxa['name'] ?></option>
                            <? }
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btt_footer">
                    <p class="dong_y cr_weight sh_cursor sh_clr_one sh_size_three butt_ctn sh_bgr_two sh_border_rdu click_xn_kv">Xác nhận</p>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal share_modal pop_gia khuvuc_hide">
    <div class="modal-content">
        <div class="bgom_modal sh_bgr_one">
            <div class="modal-header tex_center tbao_hd">
                <span class="close share_close sh_cursor sh_clr_one">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Giá</h2>
            </div>
            <div class="modal-body">
                <div class="form_body tex_left">
                    <div class="form-group share_select w_100 mb_20 d_block">
                        <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three nhap_chu">Từ</label>
                        <input type="text" name="" id="" class="gia_tu noi_nhap_chu" placeholder="" value="<?= $price ?>">
                    </div>
                    <div class="form-group share_select w_100 mb_20 d_block">
                        <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three nhap_chu">Đến</label>
                        <input type="text" name="" id="" class="gia_den noi_nhap_chu" placeholder="" value="<?= $price_den ?>">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btt_footer">
                    <p class="dong_y cr_weight sh_cursor sh_clr_one sh_size_three butt_ctn sh_bgr_two sh_border_rdu click_xn_kv">Xác nhận</p>
                </div>
            </div>
        </div>
    </div>
</div>