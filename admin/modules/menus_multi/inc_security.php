<?
$module_id = 4;

$fs_table           = "menus_multi";
$field_id           = "mnu_id";
$field_name			= "mnu_name";
$field_upload		= "mnu_picture";

$fs_filepath		= "../../../pictures/menus/";
$extension_list 	= "jpg,gif,png,swf";
$limit_size			= 30000000;

$arrType = array(
				1 => "Slide trang chủ",
				2 => "Link dưới slide",
				3 => "logo top",
				4 => "logo bottom",
				5 => "Quảng cáo trái",
				6 => "Quảng cáo phải",
				7 => "Ảnh background",
				);

$arrTarget = array("_self" => "Hiện hành",
					"_blank" => "Trang mới"
					);

$arrTypePage = array(
		"lienhe"	=> "Trang liên hệ",
		"tintuc" 	=> "Trang tin tức",
		"gioithieu" => "Trang giới thiệu",
		"dichvu"	=> "Trang dịch vụ",
		"sanpham"	=> "Trang sản phẩm",
);

$array_config		= array("image"=>1,"upper"=>1,"order"=>1,"description"=>1);

//check security...
require_once("../../resource/security/security.php");
//Check user login...
checkLogged();
//Check access module...
if(checkAccessModule($module_id) != 1) redirect($fs_denypath);
?>