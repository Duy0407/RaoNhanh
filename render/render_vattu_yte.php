<?
include("config.php");
$id = getvalue('id_vt', 'int', 'POST', '');
$query = new db_query("SELECT `tags_id`, `ten_tags`, `id_parent` FROM `key_tags` WHERE id_parent = '$id'");
$result = $query->result_array();
?>
<option disabled selected value="">Thêm chi tiết danh mục</option>
<?foreach($result as $vt){?>
    <option value="<?= $vt['tags_id']?>"><?= $vt['ten_tags']?></option>
    <?}?>