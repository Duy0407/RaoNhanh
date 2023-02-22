<?
session_start();

//Kiem tra xem ip nay co duoc phep vao admin hay khong
$ip					= $_SERVER['REMOTE_ADDR'];
$check_ip_exists	= 0;
$check_ip 			= 0;
$mod_file			= 0;
if(file_exists("../../ipstore/" . ip2long($ip) . ".cfn")){
	$check_ip_exists	= 1;
}

$array_ip = array("58.","42.",
						"61.28.",
						"65.110.",
						"69.13.",
						"115.",
						"116.",
						"117.",
						"118.",
						"119.",
						"120.",
						"122.",
						"123.",
						"124.",
						"125.",
						"126.",
						"127.",
						"134.159.",
						"169.211.",
						"172.",
						"183.",
						"192.",
						"195.",
						"196.",
						"197.",
						"198.",
						"199.",
						"200.",
						"201.",
						"202.",
						"203.77.",
						"203.99.",
						"203.113.",
						"203.119.",
						"203.128.",
						"203.160.",
						"203.161.",
						"203.162.",
						"203.170.",
						"203.171.",
						"203.176.",
						"203.189.",
						"203.190.",
						"203.191.",
						"203.201.",
						"203.210.",
						"204.",
						"205.",
						"206.",
						"210.",
						"218.100.",
						"218.186.",
						"219.",
						"220.",
						"221.",
						"222.",
						"223.",
						"113.",
						"42.",
						);

//Kiểm tra xem IP có nằm trong khỏang kiểm sóat hay ko?
$check_ip = 0;
foreach ($array_ip as $m_key=>$m_value){
	//if (strpos($this->deny_ip,$m_value)!==false){
	if (strpos($ip,$m_value)===0){
		$check_ip = 1;
		break;
	}
}

# if($ip == '::1'){
	$check_ip_exists = 1;
	$check_ip = 1;
# }


if($check_ip_exists == 0){
	die("Ban chua co quyen vao day");
}

//error_reporting(0);
require_once("../../../classes/database.php");
require_once("../../../classes/form.php");
require_once("../../../functions/functions.php");
require_once("../../../functions/file_functions.php");
require_once("../../../functions/date_functions.php");
require_once("../../../functions/resize_image.php");
require_once("../../../functions/translate.php");
require_once("../../../functions/pagebreak.php");
require_once("../../../functions/template.php");
require_once("../../../functions/rewrite_functions.php");
require_once("../../../classes/generate_form.php");
require_once("../../../classes/form.php");
require_once("../../../classes/upload.php");
require_once("../../../classes/menu.php");

//2 cai nay dung giong nhu cho ckeditor
require_once("../../../classes/tinyMCE.php");
require_once("../../../classes/html_cleanup.php");
require_once("grid.php");
require_once("../../resource/wysiwyg_editor/fckeditor.php");
require_once("functions.php");
require_once("template.php");
$admin_id 				= getValue("user_id","int","SESSION");
$lang_id	 				= getValue("lang_id","int","SESSION");


//phan khai bao bien dung trong admin
$fs_stype_css			= "../css/css.css";
$fs_template_css		= "../css/template.css";
$fs_border 				= "#f9f9f9";
$fs_bgtitle 			= "#DBE3F8";
$fs_imagepath 			= "../../resource/images/";
$fs_scriptpath 		= "../../resource/js/";
$wys_path				= "../../resource/wysiwyg_editor/";
$fs_denypath			= "../../error.php";
$wys_cssadd				= array();
$wys_cssadd				= "/css/all.css";
$sqlcategory 			= "";
$fs_category			= checkAccessCategory();
$fs_is_in_adm			= 1;
$show_error          = 0;
//phan include file css

$load_header 			= '<link href="../../resource/css/css.css" rel="stylesheet" type="text/css">';
$load_header 			.= '<link href="../../resource/css/template.css" rel="stylesheet" type="text/css">';
$load_header 			.= '<link href="../../resource/css/grid.css" rel="stylesheet" type="text/css">';
$load_header 			.= '<link href="../../resource/css/thickbox.css" rel="stylesheet" type="text/css">';
$load_header 			.= '<link href="../../resource/css/calendar.css" rel="stylesheet" type="text/css">';
$load_header 			.= '<link href="../../resource/js/jwysiwyg/jquery.wysiwyg.css" rel="stylesheet" type="text/css">';

//phan include file script
$load_header 			.= '<script language="javascript" src="../../resource/js/jquery-1.3.2.min.js"></script>';
$load_header 			.= '<script language="javascript" src="../../resource/js/library.js"></script>';
$load_header 			.= '<script language="javascript" src="../../resource/js/thickbox.js"></script>';
$load_header 			.= '<script language="javascript" src="../../resource/js/calendar.js"></script>';
$load_header 			.= '<script language="javascript" src="../../resource/js/tooltip.jquery.js"></script>';
$load_header 			.= '<script language="javascript" src="../../resource/js/jquery.jeditable.mini.js"></script>';
$load_header 			.= '<script language="javascript" src="../../resource/js/swfObject.js"></script>';
$load_header 			.= '<script language="javascript" src="../../resource/js/jwysiwyg/jquery.wysiwyg.js"></script>';

$fs_change_bg			= 'onMouseOver="this.style.background=\'#DDF8CC\'" onMouseOut="this.style.background=\'#FEFEFE\'"';
//phan ngon ngu admin
$db_language			= new db_query("SELECT tra_text,tra_keyword FROM admin_translate");
$langAdmin 				= array();
while($row=mysql_fetch_assoc($db_language->result)){
	$langAdmin[$row["tra_keyword"]] = $row["tra_text"];
}

$db_con = new db_query("SELECT 	con_currency,con_exchange from configuration WHERE con_lang_id=" . $lang_id);
if ($row=mysql_fetch_array($db_con->result)){
	while (list($data_field, $data_value) = each($row)) {
		if (!is_int($data_field)){
			//tao ra cac bien config
			$$data_field = $data_value;
			//echo $data_field . "= $data_value <br>";
		}
	}
}
$db_con->close();
unset($db_con);
$array_value =	array(
                     "nguoimua"=>translate_text("Dành cho người mua")
                  	,"nguoiban"=>translate_text("Dành cho người bán")
                  	,"quydinh"=>translate_text("Quy định")	
                  	);
?>