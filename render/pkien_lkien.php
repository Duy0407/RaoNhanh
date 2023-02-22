<?
include("config.php");
$pk_lk = getValue('pkien_lkien', 'int', 'POST', '');
$id_dm = getValue('id_dm', 'int', 'POST', '');

if ($pk_lk != "" && $id_dm != "") {
    if ($pk_lk == 1) {
        $querypk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = $id_dm and `id_cha`= 0");
        $list_phukien = $querypk->result_array(); ?>
        <p class="font-dam hd_font15-17">Loại phụ kiện <span class="color_red">*</span></p>
        <select name="loai_pk" class="loai_chung slect-thietbi slect-thietbi-m-anh hd_height36" data="<?= $id_dm ?>" onchange="lpkien_doi(this)">
            <option value="">Loại phụ kiện</option>
            <? foreach ($list_phukien as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
            <? } ?>
        </select>
    <? } else if ($pk_lk == 2) {
        $querylk = new db_query("SELECT *  FROM `loai_chung` WHERE `id_danhmuc` = $id_dm and `id_cha`= 1");
        $list_linhkien = $querylk->result_array(); ?>
        <p class="font-dam hd_font15-17">Loại linh kiện <span class="color_red">*</span></p>
        <select name="loai_pk" class="loai_chung slect-thietbi slect-thietbi-m-anh hd_height36" data="<?= $id_dm ?>" onchange="lpkien_doi(this)">
            <option value="">Loại linh kiện</option>
            <? foreach ($list_linhkien as $key => $value) { ?>
                <option value="<?= $value['id'] ?>"><?= $value['ten_loai'] ?></option>
            <? } ?>
        </select>
<? } else {
        echo "";
    }
}


?>