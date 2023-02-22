<?
require_once("inc_security.php");
//check quy?n them sua xoa
checkAddEdit("delete");
$fs_redirect	= base64_decode(getValue("returnurl","str","GET",base64_encode("listing.php")));
$record_id		= getValue("record_id","int","GET");
$field_id		= "done_user_id";
$fs_filepath   = '';

//Delete data with ID
$db_del = new db_execute("DELETE FROM ". $fs_table ." WHERE sev_id =" . $record_id);
unset($db_del);

redirect($fs_redirect);

?>
?>