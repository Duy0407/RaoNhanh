<?
require_once("config_security.php");

//check quyền them sua xoa
checkAddEdit("delete");

$url=base64_decode(getValue("url","str","GET",base64_encode("listing.php")));
$record_id		= getValue("record_id","int","GET",0);

//kiểm tra quyền sửa xóa của user xem có được quyền ko
checkRowUser($fs_table,$field_id,$record_id,$url);

//Delete pictues with ID
//delete_file($fs_table,"ban_id",$record_id,"ban_picture",$fs_filepath);
//Update ban_picture field width NULL value
$db_delete = new db_execute("UPDATE " . $fs_table . " SET ban_picture = '' WHERE con_lang_id = " .$record_id);
unset($db_delete);
redirect($url);
?>