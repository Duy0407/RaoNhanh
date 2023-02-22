<?
$module_id	= 7;
$module_name= "Trang tĩnh";

//Declare prameter when insert data
$fs_table		= "statics_multi";
$field_id		= "sta_id";
$field_name		= "sta_title";
$break_page		= "{---break---}";

require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);
?>