<? include 'config.php'; ?>
<div class="modal share_modal khu_vuc khuvuc_hide">
    <div class="modal-content">
        <div class="bgom_modal sh_bgr_one">
            <div class="modal-header tex_center tbao_hd">
                <span class="close share_close sh_cursor sh_clr_one">&times;</span>
                <h2 class="sh_size_one sh_clr_one">Khu vực</h2>
            </div>
            <div class="modal-body">
                <? if ($kv == 1) { ?>
                    <div class="form_body tex_left">
                        <div class="form-group share_select w_100 mb_20 d_block">
                            <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Khu vực</label>
                            <select name="khu_vuc" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2 toanquoc">
                                <option value="" disabled selected>Chọn khu vực</option>
                                <option value="0">Toàn Quốc</option>
                                <? foreach ($arrcity as $row) { ?>
                                    <option value="<?= $row['cit_id'] ?>" <?= ($row['cit_id'] == $usc_city) ? "selected" : "" ?>><?= $row['cit_name'] ?></option>
                                <? } ?>
                            </select>
                        </div>
                        <div class="form-group share_select w_100 mb_20 d_block">
                            <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Quận/huyện</label>
                            <select name="quan_huyen" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2 cf_1268591 md_quan_huyen">
                                <option value="">Quận/huyện</option>
                            </select>
                        </div>
                        <div class="form-group share_select d_block">
                            <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Phường/xã</label>
                            <select name="phuong_xa" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2 cf_1268591 md_phuong_xa">
                                <option value="">Phường/xã</option>
                                <option value="1"></option>
                            </select>
                        </div>
                    </div>
                <? } else { ?>
                    <div class="form_body tex_left">
                        <div class="form-group share_select w_100 mb_20 d_block">
                            <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Khu vực</label>
                            <select name="khu_vuc" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2">
                                <option value="">Chọn khu vực</option>
                                <option value="0">Toàn Quốc</option>
                            </select>
                        </div>
                        <div class="form-group share_select w_100 mb_20 d_block">
                            <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Quận/huyện</label>
                            <select name="quan_huyen" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2">
                                <option value="">Quận/huyện</option>
                            </select>
                        </div>
                        <div class="form-group share_select d_block">
                            <label class="w_100 mb_5 d_block cr_weight sh_clr_two sh_size_three">Phường/xã</label>
                            <select name="phuong_xa" class="form-control select2 w_100 sh_border_rdu sh_border sh_clr_five sh_size_five share_select2">
                                <option value="">Phường/xã</option>
                                <option value="1"></option>
                            </select>
                        </div>
                    </div>
                <? } ?>
            </div>
            <div class="modal-footer">
                <div class="btt_footer">
                    <p class="dong_y cr_weight sh_cursor sh_clr_one sh_size_three butt_ctn sh_bgr_two sh_border_rdu click_xn_kv">Xác nhận</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?
