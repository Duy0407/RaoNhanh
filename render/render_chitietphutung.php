<?
include("config.php");
$id = getValue('id_pt', 'int', 'POST', '');
$query_pt = new db_query("SELECT `tags_id`, `ten_tags` FROM `key_tags` WHERE id_parent = $id");
$result_pt = $query_pt->result_array();
?>
<?if($id != '' && $id != 1916){?>
<p class="font-dam hd_font15-17">Chi tiết danh mục <span class="color_red">*</span></p>
<select id="chitiet_dm" class="slect-chitiet_dm hd_height36" style="width:100%" name="chitiet_dm">
    <option disabled selected value="">Thêm chi tiết danh mục</option>
    <? foreach ($result_pt as $pt) : ?>
        <option value="<?= $pt['tags_id'] ?>"><?= $pt['ten_tags'] ?></option>
    <? endforeach ?>
</select>
<?}?>