<?
$module_id = 2;
//check security...
require_once("../../resource/security/security.php");
checkLogged();
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);
$fs_table		= "configuration";
?>