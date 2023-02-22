<?
include("config.php");
$id_nhucau = getValue('id_nhucau', 'int', 'POST', 0);
$id_dm = getValue('id_dm', 'int', 'POST', 0);
if ($id_nhucau != 0 && $id_dm != 0) {
    $ban = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE type_tags = $id_nhucau AND `id_danhmuc` = $id_dm ");
    $result_ban = $ban->result_array(); ?>

    <option disabled selected value="">Thêm chi tiết danh mục</option>
    <? foreach ($result_ban as $rows) { ?>
        <option value="<?= $rows['tags_id'] ?>"><?= $rows['ten_tags'] ?></option>
    <? } ?>
<? } ?>