<?
$module_id = 3;
//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);

$fs_table 		= "admin_user";
$menu				= new menu();
$listAll 		= $menu->getAllChild("categories_multi","cat_id","cat_parent_id","0","lang_id = " . $lang_id,"cat_id,cat_name,cat_order,cat_type,cat_parent_id,cat_has_child","cat_order ASC, cat_name ASC","cat_has_child");
$user_id 		= getValue("user_id","int","SESSION");
?>