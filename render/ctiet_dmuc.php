<?
include("config.php");
$id_dm = getValue('id_dm', 'int', 'POST', '');
$id_tt = getValue('id_tt', 'int', 'POST', '');
$id_nc = getValue('id_nc', 'int', 'POST', '');

if ($id_dm != "") {
    if ($id_tt != "" || $id_nc != "") {
        if ($id_dm == 75) {
            if ($id_tt == 1 || $id_tt == 6 || $id_tt == 8) {
                $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
                <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                <select class="slect-hang hd_height36" name="chitiet_dm">
                    <option value="">Thêm chi tiết danh mục</option>
                    <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                        <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                    <? } ?>
                </select>
            <? }
        } else if ($id_dm == 105) {
            if ($id_tt == 3 || $id_tt == 4 || $id_tt == 8 || $id_tt == 7) {
                $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
                <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                <select class="slect-hang hd_height36" name="chitiet_dm">
                    <option value="">Thêm chi tiết danh mục</option>
                    <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                        <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                    <? } ?>
                </select>
            <? }
        } else if ($id_dm == 94) {
            if ($id_tt != 56) {
                $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
                <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
                <select class="slect-hang hd_height36" name="chitiet_dm">
                    <option value="">Thêm chi tiết danh mục</option>
                    <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                        <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                    <? } ?>
                </select>
            <? }
        } else if ($id_dm == 95) {
            $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                    <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                <? } ?>
            </select>
        <? }else if ($id_dm == 104) {
            $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                    <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                <? } ?>
            </select>
        <? }else if ($id_dm == 100) {
            $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_nc "); ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                    <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                <? } ?>
            </select>
        <? }else if ($id_dm == 102) {
            $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                    <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                <? } ?>
            </select>
        <? }else if ($id_dm == 47) {
            $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                    <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                <? } ?>
            </select>
        <? }else if ($id_dm == 53) {
            $list_ktag = new db_query("SELECT `tags_id`, `ten_tags`  FROM `key_tags` WHERE `id_danhmuc` = $id_dm AND `id_parent` = $id_tt "); ?>
            <p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
            <select class="slect-hang hd_height36" name="chitiet_dm">
                <option value="">Thêm chi tiết danh mục</option>
                <? while ($row_tags = mysql_fetch_assoc($list_ktag->result)) { ?>
                    <option value="<?= $row_tags['tags_id'] ?>"><?= $row_tags['ten_tags'] ?></option>
                <? } ?>
            </select>
        <? }
        
    }
}


?>