<?
$module_id 	= 17;

$fs_table			= "contact_driver";
$field_id			= "cot_id";
$field_name			= "cod_fullname";

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);
$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);

?>