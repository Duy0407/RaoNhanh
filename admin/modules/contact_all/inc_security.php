<?
$module_id 	= 17;

$fs_table			= "contact_driver";
$field_id			= "cot_id";
$field_name			= "cod_fullname";

$fs_table_mess			= "contact_mess";
$field_id_mess			= "con_id";
$field_name_mess			= "con_fullname";

$fs_table_email			= "email_sub";
$field_id_email		    = "ema_id";
$field_name_email			= "ema_email";

$fs_table_car			= "price_car";
$field_id_car		    = "pri_id";
$field_name_car			= "pri_fullname";
//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);
$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);			

?>