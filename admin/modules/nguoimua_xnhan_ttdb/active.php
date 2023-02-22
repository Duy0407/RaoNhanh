<?php
include ("inc_security.php");

// check quyền them sua xoa
checkAddEdit("delete");

$field_id		= "adu_admin_id";

$record_id		= getValue("record_id");
$type    		= getValue("type", "str", "GET", "", 1);
$value   		= getValue("value");
$filed   		= getValue("field", "str", "GET", "", 1);
$ajax				= getValue("ajax");

$url 				= base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$fs_redirect	= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));

if($ajax==1){
	$db_select = new db_query("SELECT " . $filed . " FROM " . $fs_table . " WHERE dh_id= " . $record_id);
	if($row=mysql_fetch_assoc($db_select->result)){
		$value = abs($row[$filed]-1);
	}
}
// kiểm tra quyền sửa xóa của user xem có được quyền ko
// checkRowUser('admin_user_right',$field_id,$record_id,$fs_redirect);
$db_category	= new db_execute("UPDATE " . $fs_table . " SET " . $filed . " = " . $value . " WHERE dh_id = " . $record_id);
unset($db_category);

$list_nmb = new db_query("SELECT `id_nguoi_dh`, `id_nguoi_ban`, `id_spham` FROM " . $fs_table . " WHERE dh_id = ". $record_id);
$row_dh = mysql_fetch_assoc($list_nmb -> result);
$id_nguoi_dh = $row_dh['id_nguoi_dh'];
$id_nguoi_ban = $row_dh['id_nguoi_ban'];
$new_id = $row_dh['id_spham'];
$noi_dung = 'đặt hàng mua sản phẩm của bạn qua hình thức thanh toán đảm bảo.';
$tgian = time();
$inser_nof = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$id_nguoi_dh','$new_id','$id_nguoi_ban','4','$tgian','$noi_dung')");

redirect($url);
