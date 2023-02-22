<?
include("config.php");
$id = getValue('val_lx', 'int', 'POST', '');
$sql_dm = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE id_parent = $id");
$result_dm = $sql_dm->result_array();
?>
<option disabled selected value="">Thêm chi tiết danh mục</option>
<? foreach ($result_dm as $dm) : ?>
    <option value="<?= $dm['tags_id'] ?>"><?= $dm['ten_tags'] ?></option>
<? endforeach ?>