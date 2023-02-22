<?
$module_id 	= 8;

$fs_table			= "seolink";
$field_id			= "seo_id";
$field_name			= "seo_title";

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);					
?>