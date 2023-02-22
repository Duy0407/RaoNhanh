<?
include("config.php");
$cate_con = getValue('cate_con', 'int', 'POST', '');

$sl_cate_con = new db_query("SELECT `cat_id`,`cat_name`,`cat_parent_id` FROM `category` WHERE `cat_parent_id` = ".$cate_con."");
$row=$sl_cate_con->result_array();
echo json_encode($row);
?>
