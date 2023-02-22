<?
$module_id 	= 1;

$fs_table			= "category";
$field_id			= "cat_id";
$field_name			= "cat_name";

$fs_filepath		= "../../../pictures/category/";
$extension_list 	= "jpg,gif,png,swf";
$limit_size			= 300000;
#+
$small_width		= 	125;
$small_heght		=	97;
$small_quantity		=	100;
#+
$medium_width		= 	250;
$medium_heght		=	100;
$medium_quantity	=	90;


//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);


$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);	
	
$array_value =	array("static" => translate_text("Sản phẩm"),
                  	);			
?>