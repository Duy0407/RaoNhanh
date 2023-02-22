<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_hang = getValue('id_hang', 'int', 'POST', '');

$check_hdthoai = ['1621', '1622', '1629', '1630', '1631', '1632', '1633', '1636', '1639', '1641', '1642', '1650', '1652', '1661', '1662', '1680'];

if ($id_dm != "" && $id_hang != "") {
    if ($id_dm == 98) {
        if ($id_hang == 1378) { ?>
            <p class="b9_fr2_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
            <input type="text" name="dong_may" class="b3_fr1_input p_400_s14_l17 dong_may" placeholder="Nhập dòng máy" autocomplete="off">
        <? } else {
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
            <p class="b6_fr1_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
            <select class="b6_fr1_select slect-hang hd_height36 dong_may" name="dong_may">
                <option value="">Chọn</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
            </select>
        <? }
    } else if ($id_dm == 10) {
        if ($id_hang == 1363) { ?>
            <p class="font-dam hd_font15-17">Dòng xe <span class="color_red">*</span></p>
            <input type="text" name="dong_xe" class="dong_may input_infor_tag" autocomplete="off" placeholder="Nhập dòng xe">
        <? } else {
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang  "); ?>
            <p class="font-dam hd_font15-17">Dòng xe <span class="color_red">*</span></p>
            <select name="dong_xe" class="slect-hang hd_height36 dong_may">
                <option value="">Dòng xe</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
            </select>
        <? }
    } else if ($id_dm == 9) {
        if ($id_hang == 1286) { ?>
            <p class="font-dam hd_font15-17">Dòng xe <span class="color_red">*</span></p>
            <input type="text" name="dongmay" class="dong_may input_infor_tag" autocomplete="off" placeholder="Nhập dòng xe">
        <? } else {
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang "); ?>
            <p class="font-dam hd_font15-17">Dòng xe <span class="color_red">*</span></p>
            <select name="dongmay" class="slect-hang hd_height36 dong_may">
                <option value="">Dòng xe</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
            </select>
        <? }
    }
    // máy ảnh máy quay
    else if ($id_dm == 6) {
        if ($id_hang == 34) { ?>
            <p class="b9_fr2_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
            <input type="text" name="hang_camera" class="b3_fr1_input p_400_s14_l17 hang_mquayanh" placeholder="Nhập hãng" autocomplete="off">
        <? } else {
            $list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
            <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
            <select class="b6_fr1_select slect-hang hd_height36 hang_mquayanh" name="hang_camera">
                <option disabled selected value="">Chọn</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
                <? } ?>
            </select>
        <? }
    }
    // điện thoại di động
    else if ($id_dm == 7) {
        if ($id_hang == 1683) { ?>
            <p class="b9_fr2_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
            <input type="text" name="dong_may" class="b3_fr1_input p_400_s14_l17 dong_may" placeholder="Nhập dòng máy" autocomplete="off">
        <? } else if (in_array($id_hang, $check_hdthoai)) {
            echo "";
        } else {
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
            <p class="b6_fr1_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
            <select class="b6_fr1_select slect-hang hd_height36 dong_may" name="dong_may">
                <option value="">Chọn</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
            </select>
        <? }
    }
    // máy tính bảng
    else if ($id_dm == 35) {
        if ($id_hang == 1694) { ?>
            <p class="b9_fr2_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
            <input type="text" name="dong_may" class="b3_fr1_input p_400_s14_l17 dong_may" placeholder="Nhập dòng máy" autocomplete="off">
        <? } else {
            $list_dong = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
            <p class="b6_fr1_title p_400_s15_l18">Dòng máy <span class="cl_red">*</span></p>
            <select class="b6_fr1_select slect-hang hd_height36 dong_may" name="dong_may">
                <option value="">Chọn</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_loai'] ?></option>
                <? } ?>
            </select>
        <? }
    }
    // tivi, loa, amply
    else if ($id_dm == 36) {
        $list_dong = new db_query("SELECT `id`, `ten_hang` FROM `hang` WHERE `id_parent` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
        <p class="b6_fr1_title p_400_s15_l18">Hãng <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36" name="hang_sp">
            <option value="">Chọn</option>
            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_hang'] ?></option>
            <? } ?>
        </select>
    <? } else if ($id_dm == 104) {
        $list_dong = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_hang  "); ?>
        <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
        <select class="slect-chitiet_dm hd_height36 slect-hang" style="width:100%" name="chitiet_dm">
            <option value="">Thêm chi tiết danh mục</option>
            <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                <option value="<?= $row_dong['tags_id'] ?>"><?= $row_dong['ten_tags'] ?></option>
            <? } ?>
        </select>
        <? }
    // thiết bị thông minh
    else if ($id_dm == 99) {
        if ($id_hang == 1766 || $id_hang == 1774) { ?>
            <p class="b9_fr2_title p_400_s15_l18">Dòng <span class="cl_red">*</span></p>
            <input type="text" name="dong_may" class="b3_fr1_input p_400_s14_l17 dong_may" placeholder="Nhập dòng" autocomplete="off">
        <? } else {
            $list_dong = new db_query("SELECT `id`, `ten_dong` FROM `dong` WHERE `id_hang` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
            <p class="b6_fr1_title p_400_s15_l18">Dòng <span class="cl_red">*</span></p>
            <select class="b6_fr1_select slect-hang hd_height36 dong_may" name="dong_may">
                <option disabled selected value="">Chọn</option>
                <? while ($row_dong = mysql_fetch_assoc($list_dong->result)) { ?>
                    <option value="<?= $row_dong['id'] ?>"><?= $row_dong['ten_dong'] ?></option>
                <? } ?>
            </select>
        <? }
    }
    // linh kiện
    else if ($id_dm == 124) {
        $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
        <p class="b6_fr1_title p_400_s15_l18">Thiết bị <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36" name="thiet_bi">
            <option value="">Chọn</option>
            <? while ($item_tbi = mysql_fetch_assoc($list_tbi->result)) { ?>
                <option value="<?= $item_tbi['id'] ?>"><?= $item_tbi['name'] ?></option>
            <? } ?>
        </select>
    <? }
    // phụ kiện
    else if ($id_dm == 37) {
        $list_tbi = new db_query("SELECT `id`, `name` FROM `nhom_sanpham_chatlieu` WHERE `id_cha` = $id_hang AND `id_danhmuc` = $id_dm "); ?>
        <p class="b6_fr1_title p_400_s15_l18">Thiết bị <span class="cl_red">*</span></p>
        <select class="b6_fr1_select slect-hang hd_height36" name="thiet_bi">
            <option disabled selected value="">Chọn</option>
            <? while ($item_tbi = mysql_fetch_assoc($list_tbi->result)) { ?>
                <option value="<?= $item_tbi['id'] ?>"><?= $item_tbi['name'] ?></option>
            <? } ?>
        </select>
<? }
} ?>