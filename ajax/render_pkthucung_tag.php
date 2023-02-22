<?
include("config.php");
$id_sp = getValue('id_sp', 'int', 'POST', '');
$id_giong = getValue('giong', 'int', 'POST', '');

$sql = new db_query("SELECT `id_danhmuc` FROM `giong_thu_cung` WHERE id = $id_giong ");
$danhmuc = mysql_fetch_assoc($sql->result)['id_danhmuc'];

$query = new db_query("SELECT `tags_id`, `ten_tags`, `id_danhmuc`, `id_parent` FROM `key_tags` WHERE id_danhmuc = '$danhmuc' AND id_parent = '$id_sp'");
$result = $query->result_array();
?>
<option value="">Thêm chi tiết danh mục</option>
<? foreach ($result as $tr) : ?>
    <option value="<?= $tr['tags_id'] ?>"><?= $tr['ten_tags'] ?></option>
<? endforeach ?>