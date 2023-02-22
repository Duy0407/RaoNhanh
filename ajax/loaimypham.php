<?
include("config.php");
$listPr = getValue('listPr', 'int', 'POST', '');
$query = new db_query("SELECT `id`, `ten_loai`, `id_cha`, `id_danhmuc` FROM `loai_chung` WHERE id_cha = '$listPr'");
$result = $query->result_array();
$query_hang = new db_query("SELECT `id`, `ten_hang`, `id_parent` FROM `hang` WHERE id_parent = '$listPr'");
$sql_hang = $query_hang->result_array();
$query_tag = new db_query("SELECT `tags_id`, `ten_tags`, `id_parent` FROM `key_tags` WHERE id_parent = '$listPr'");
$sql_tag = $query_tag->result_array();
$arr = [];
$item1 = '
<option disabled selected value="">Loại mỹ phẩm</option>
';
foreach ($result as $rows) {
    $item1 .= "<option value=" .$rows['id'] .">" . $rows['ten_loai'] ."</option>";
}
$item2 = '
<option disabled selected value="">Hãng</option>';
foreach ($sql_hang as $rows) {
    $item2 .= "<option value=" . $rows['id'] . ">" . $rows['ten_hang'] . "</option>";
}
$item3 ='
 <option disabled selected value="">Thêm chi tiết danh mục</option>';
 foreach($sql_tag as $rows){
    $item3 .= "<option value=" . $rows['tags_id'] . ">" . $rows['ten_tags'] . "</option>";
 }
$arr[] = $item1;
$arr[] = $item2;
$arr[] = $item3;
$arrjson = json_encode($arr, JSON_UNESCAPED_UNICODE);
echo $arrjson;
?>