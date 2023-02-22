<?
include("config.php");
$id_pk = getValue('id_pk','int','POST', '');
// echo $id_pk;
$query = new db_query("SELECT `tags_id`, `ten_tags`,`id_parent` FROM `key_tags` WHERE id_parent = '$id_pk'");
$result = $query->result_array();
?>
<option disabled selected value="">Thêm chi tiết danh mục</option>
<?foreach($result as $pk):?>
    <option value="<?= $pk['tags_id']?>"><?= $pk['ten_tags']?></option>
    <?endforeach?>