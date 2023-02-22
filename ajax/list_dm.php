<?
include("config.php");
// $list_dm = getValue('list_product', 'int', 'POST', "");
$list_dm = $_POST['list_product'];



$l_dm = new db_query("SELECT `cat_id`,`cat_parent_id`, `cat_name` FROM `category` WHERE `cat_parent_id` != 0");
$result = $l_dm->result_array();


?>
<option value=""></option>
<? foreach ($result as $val) {
    if (in_array($val['cat_parent_id'], $list_dm)) { ?>
        <option value="<?= $val['cat_id'] ?>"><?= $val['cat_name'] ?></option>
<? }
} ?>