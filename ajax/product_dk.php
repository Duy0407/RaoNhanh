<?
include("config.php");

$listPr = getValue('listPr', 'arr', 'POST', []);

$arr = [];
foreach ($listPr as $pr) {
    $query = new db_query("SELECT cat_id, admin_id, cat_name, cat_parent_id, cat_order, cat_type, cat_has_child, cat_picture, cat_active, cat_show, lang_id, cat_description, cat_img1, cat_img2, cat_md5 FROM category WHERE cat_parent_id = '$pr'");
    $result = $query->result_array();
    $arr[] = $result;
}
?>
<option disabled value="">Chọn loại sản phẩm</option>
<?

foreach ($arr as $val) {
  
    foreach ($val as $item) {
?>
        <option value="<?= $item['cat_id'] ?>"><?= $item['cat_name'] ?></option>
<?
    }
} ?>