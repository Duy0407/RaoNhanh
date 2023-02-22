<?php
include ("inc_security.php");
 
// check quyền them sua xoa
checkAddEdit("delete");

// $field_id		= "admin_id";

$record_id		= getValue("record_id");
$type    		= getValue("type", "str", "GET", "", 1);
$value   		= getValue("value");
$filed   		= getValue("field", "str", "GET", "", 1);
$ajax				= getValue("ajax");

$url 				= base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$fs_redirect	= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));

if($ajax==1){
	$db_select = new db_query("SELECT " . $filed . " FROM " . $fs_table . " WHERE ".$field_id."= " . $record_id);
	if($row=mysql_fetch_assoc($db_select->result)){	
		$value = abs($row[$filed]-1);
	}
}

// kiểm tra quyền sửa xóa của user xem có được quyền ko
checkRowUser($fs_table,$field_id,$record_id,$fs_redirect);
$db_category	= new db_execute("UPDATE " . $fs_table . " SET " . $filed . " = " . $value . " WHERE ".$field_id." = " . $record_id);
unset($db_category);

redirect($url);
?>