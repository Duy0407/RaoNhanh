<?
include("config.php");
$id_tt = getValue('id_tt', 'int', 'POST', '');
$id_dm = getValue('id_dm', 'int', 'POST', '');
$type = getValue('type', 'int', 'POST', '');
if ($id_dm != "") {
    if ($id_dm == 75) {
        if ($id_tt != "") {
            if ($id_tt != 8) {
                $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_tt AND `id_danhmuc` = $id_dm "); ?>

                <p class="font-dam hd_font15-17">Loại dụng cụ <span class="color_red">*</span></p>
                <? if ($type != "" && ($type == 1 || $type == 3)) { ?>
                    <select class="slect-hang hd_height36 loai_dungcu_ban" name="loai_dungcu_ban">
                        <option value="">Loại dụng cụ</option>
                        <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                            <option value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                        <? } ?>
                    </select>
                <? } else if ($type != "" && $type == 2) { ?>
                    <select class="slect-hang  hd_height36 loai_dungcu_mua" name="loai_dungcu_mua">
                        <option value="">Loại dụng cụ</option>
                        <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                            <option value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                        <? } ?>
                    </select>
                <? }
            } else {
                if ($type != "" && ($type == 1 || $type == 3)) { ?>
                    <p class="font-dam hd_font15-17">Loại dụng cụ <span class="color_red">*</span></p>
                    <input type="text" class="hd_height36 loai_dungcu_ban" name="loai_dungcu_ban" value="">
                <? } else if ($type != "" && $type == 2) { ?>
                    <p class="font-dam hd_font15-17">Loại dụng cụ <span class="color_red">*</span></p>
                    <input type="text" class="hd_height36 loai_dungcu_mua" name="loai_dungcu_mua" value="">
                <? }
            }
        }
    } else if ($id_dm == 105) {
        if ($id_tt != "") {
            if ($id_tt != 8) {
                $list_loai = new db_query("SELECT `id`, `ten_loai` FROM `loai_chung` WHERE `id_cha` = $id_tt AND `id_danhmuc` = $id_dm "); ?>
                <p class="font-dam hd_font15-17">Loại phụ kiện <span class="color_red">*</span></p>
                <? if ($type != "" && ($type == 1 || $type == 3)) { ?>
                    <select class="slect-hang hd_height36 loai_phukien_ban" name="loai_phukien_ban">
                        <option value="">Loại phụ kiện</option>
                        <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                            <option value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                        <? } ?>
                    </select>
                <? } else if ($type != "" && $type == 2) { ?>
                    <select class="slect-hang  hd_height36 loai_phukien_mua" name="loai_phukien_mua">
                        <option value="">Loại phụ kiện</option>
                        <? while ($row_dc = mysql_fetch_assoc($list_loai->result)) { ?>
                            <option value="<?= $row_dc['id'] ?>"><?= $row_dc['ten_loai'] ?></option>
                        <? } ?>
                    </select>
                <? }
            } else {
                if ($type != "" && ($type == 1 || $type == 3)) { ?>
                    <p class="font-dam hd_font15-17">Loại phụ kiện <span class="color_red">*</span></p>
                    <input type="text" class="hd_height36 loai_phukien_ban" name="loai_phukien_ban" value="">
                <? } else if ($type != "" && $type == 2) { ?>
                    <p class="font-dam hd_font15-17">Loại phụ kiện <span class="color_red">*</span></p>
                    <input type="text" class="hd_height36 loai_phukien_mua" name="loai_phukien_mua" value="">
<? }
            }
        }
    }
} ?>