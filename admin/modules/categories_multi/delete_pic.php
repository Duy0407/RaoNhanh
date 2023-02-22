<?
require_once("inc_security.php");
//check quyền them sua xoa
checkAddEdit("delete");
$fs_redirect	= base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$record_id		= getValue("record_id","int","GET");
$field_id		= "cat_id";
//kiểm tra quyền sửa xóa của user xem có được quyền ko
checkRowUser($fs_table,$field_id,$record_id,$fs_redirect);
//Delete data with ID
delete_file($fs_table,$field_id,$record_id,"cat_picture",$fs_filepath);
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
echo '<script language="javascript">alert("' . translate_text("You have successfully deleted") . '!");</script>';

redirect($fs_redirect);

?>