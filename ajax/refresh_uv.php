<?
	include('../home/config_vl.php');

	$id = $_COOKIE['UID'];

	$db_qr = new db_query("UPDATE user SET use_update_time = '".time()."' WHERE use_id = ".$id);
	echo 'Làm mới thành công';
?>