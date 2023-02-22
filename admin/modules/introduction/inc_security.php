<?
$module_id 	= 17;

$fs_table			= "introduction";
$field_id			= "int_id";
$field_name			= "int_name";

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);			
$array_value =	array("1" => translate_text("Trang giới thiệu"),
                     "2" => translate_text("Chính sách"),
                     "3" => translate_text("Trợ giúp")
                  	);			
?>