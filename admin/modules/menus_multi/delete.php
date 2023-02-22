<?
require_once("inc_security.php");	//check quyền them sua xoa
checkAddEdit("delete");

$fs_redirect=base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$record_id		= getValue("record_id","int","GET",0);

checkRowUser($fs_table,$field_id,$record_id,$fs_redirect);	//kiểm tra quyền sửa xóa của user xem có được quyền ko


//kiểm tra xóa hết cấp con chưa mới có thể xóa cấp cha
$db_select = new db_query("SELECT mnu_id FROM " . $fs_table . " WHERE mnu_parent_id = " . $record_id);
if($row=mysql_fetch_assoc($db_select->result)){
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
	echo '<script language="javascript">alert("Bạn phải xóa hết danh mục con của danh mục này! \\nBạn mới có thể xóa danh mục này!");</script>';
	redirect($fs_redirect);
	exit();
}

//Delete data with ID
$db_delete = new db_query("DELETE FROM " . $fs_table . " WHERE mnu_id = " . $record_id);
redirect($fs_redirect);
?>
