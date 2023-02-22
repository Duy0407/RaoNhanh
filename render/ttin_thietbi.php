<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_tbi = getValue('id_tbi', 'int', 'POST', '');

if ($id_dm != "" && $id_tbi != "") {
    $bao_hanh = new db_query("SELECT `id_baohanh`, `tgian_baohanh`  FROM `bao_hanh` WHERE `id_danhmuc` = 1 ");
    $list_hang = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_tbi AND `id_danhmuc` = $id_dm ");
    $list_xx = new db_query("SELECT `id_xuatxu`, `noi_xuatxu` FROM `xuat_xu` WHERE `id_danhmuc` = $id_dm ");
    if ($id_tbi == 52) {
        $list_mh = new db_query("SELECT `id_manhinh`, `ten_manhinh` FROM `man_hinh` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_tbi ");
        $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_tbi AND `id_danhmuc` = $id_dm ");
        $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_tbi ");  ?>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                    <option disabled selected value="">Chọn</option>
                    <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                        <option value="<?= $item_hang['id'] ?>"><?= $item_hang['ten_hang'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Kích thước</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="kich_thuoc">
                    <option value="">Chọn</option>
                    <? while ($row_mh = mysql_fetch_assoc($list_mh->result)) { ?>
                        <option value="<?= $row_mh['id_manhinh'] ?>"><?= $row_mh['ten_manhinh'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Kết nối internet</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="ketnoi_inter">
                    <option value="">Chọn</option>
                    <option value="1" selected>Có</option>
                    <option value="2">Không</option>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Loại tivi</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="loai_tv">
                    <option value="">Chọn</option>
                    <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                        <option value="<?= $row_loai['id'] ?>"><?= $row_loai['ten_loai'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Độ phân giải</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="do_phangiai">
                    <option value="">Chọn</option>
                    <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                        <option value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                    <option value="">Chọn</option>
                    <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                        <option value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
    <? } else if ($id_tbi == 53) {
        $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_tbi AND `id_danhmuc` = $id_dm ");
        $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_tbi "); ?>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                    <option disabled selected value="">Chọn</option>
                    <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                        <option value="<?= $item_hang['id'] ?>"><?= $item_hang['ten_hang'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Loại loa</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="loai_loa">
                    <option value="">Chọn</option>
                    <? while ($row_loai = mysql_fetch_assoc($list_loai->result)) { ?>
                        <option value="<?= $row_loai['id'] ?>"><?= $row_loai['ten_loai'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Công suất</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="cong_suat">
                    <option value="">Chọn</option>
                    <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                        <option value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                    <option value="">Chọn</option>
                    <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                        <option value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
    <? } else if ($id_tbi == 54 || $id_tbi == 57) {
        $list_dl = new db_query("SELECT `id_dl`, `ten_dl` FROM `dung_luong` WHERE `id_danhmuc` = $id_dm AND `id_cha` = $id_tbi "); ?>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                    <option disabled selected value="">Chọn</option>
                    <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                        <option value="<?= $item_hang['id'] ?>"><?= $item_hang['ten_hang'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Xuất xứ thương hiệu</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="xuat_xu">
                    <option value="">Chọn</option>
                    <? while ($item_xx = mysql_fetch_assoc($list_xx->result)) { ?>
                        <option value="<?= $item_xx['id_xuatxu'] ?>"><?= $item_xx['noi_xuatxu'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Công suất <?= ($id_tbi == 54) ? 'âm thanh' : '' ?></p>
                <select class="b6_fr1_select slect-hang hd_height36" name="am_thanh_cs">
                    <option value="">Chọn</option>
                    <? while ($row_dl = mysql_fetch_assoc($list_dl->result)) { ?>
                        <option value="<?= $row_dl['id_dl'] ?>"><?= $row_dl['ten_dl'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                    <option value="">Chọn</option>
                    <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                        <option value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
    <? } else if ($id_tbi == 55  || $id_tbi == 56 || $id_tbi == 61) { ?>
        <div class="ctn_ct_b6_fr d_flex fl_row fl_st">
            <div class="b6_fr1 d_flex fl_cl box_input_infor dong_doi">
                <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
                <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
                    <option disabled selected value="">Chọn</option>
                    <? while ($item_hang = mysql_fetch_assoc($list_hang->result)) { ?>
                        <option value="<?= $item_hang['id'] ?>"><?= $item_hang['ten_hang'] ?></option>
                    <? } ?>
                </select>
            </div>
            <div class="b6_fr2 d_flex fl_cl box_input_infor">
                <p class="b6_fr1_title p_400_s15_l18">Bảo hành</p>
                <select class="b6_fr1_select slect-hang hd_height36" name="bao_hanh">
                    <option value="">Chọn</option>
                    <? while ($row_bh = mysql_fetch_assoc($bao_hanh->result)) { ?>
                        <option value="<?= $row_bh['id_baohanh'] ?>"><?= $row_bh['tgian_baohanh'] ?></option>
                    <? } ?>
                </select>
            </div>
        </div>
<? }
} ?>