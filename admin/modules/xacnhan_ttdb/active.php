<?php
// include("inc_security.php");
require_once("../../../classes/database.php");
require_once("../../../functions/functions.php");
$xn = getValue('xn', 'int', 'POST', '');
$us_id = getValue('us_id', 'int', 'POST', 0);
// echo $xn; die;
if ($xn != "" && $us_id != 0) {
	$upda_ttdb = new db_query("UPDATE `user` SET `xacthuc_lket` = '$xn' WHERE `usc_id` = $us_id ");

	$data = array(
		'result' => true,
		'msg' => 'http://dev5.tinnhanh365.vn/admin/index.php';
	)
}
echo json_encode($data, true);
// check quyền them sua xoa
// checkAddEdit("delete");

// $field_id		= "admin_id";

// $record_id		= getValue("record_id");
// $type    		= getValue("type", "str", "GET", "", 1);
// $value   		= getValue("value");
// $filed   		= getValue("field", "str", "GET", "", 1);
// $ajax				= getValue("ajax");

// $url 				= base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
// $fs_redirect	= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));

// if($ajax==1){
// 	$db_select = new db_query("SELECT " . $filed . " FROM " . $fs_table . " WHERE usc_id= " . $record_id);
// 	if($row=mysql_fetch_assoc($db_select->result)){
// 		$value = abs($row[$filed]-1);
// 	}
// }

// // kiểm tra quyền sửa xóa của user xem có được quyền ko
// checkRowUser($fs_table,$field_id,$record_id,$fs_redirect);
// $db_category	= new db_execute("UPDATE " . $fs_table . " SET " . $filed . " = " . $value . " WHERE usc_id = " . $record_id);
// unset($db_category);


// redirect($url);
