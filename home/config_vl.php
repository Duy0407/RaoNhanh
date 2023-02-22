<?
error_reporting(0);
require_once("../functions/functions.php");
ob_start();
require_once("../functions/function_rewrite.php");
require_once("../functions/pagebreak.php");
require_once("../classes/database.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');

// $db_qrcat = new db_query("SELECT cat_id,cat_name FROm category_vl ");
// $arr_cate = array();
// $arr_ui = array();
// While($row_cate = mysql_fetch_assoc($db_qrcat->result))
// {
//     $arr_cate[$row_cate['cat_id']] = $row_cate['cat_name'];
//     //mảng $arr_cate có tên (cat_name) ứng với id (cat_id)
//     $arr_ui[] = $row_cate['cat_name'];
// }
// $arr_tag_ct= array();
// $db_tag = new db_query("SELECT DISTINCT (CAST(key_name AS CHAR CHARACTER SET utf8) COLLATE utf8_bin) AS key_name,key_id FROM `keyword`");
//     $arr_key = array();
//     While($row_tag = mysql_fetch_assoc($db_tag->result))
//     {
//         $arr_tag_ct[$row_tag['key_id']] = $row_tag['key_name'];
//         $arr_key[] = $row_tag['key_name'];
//     }
// $arr_tp= array();
// $db_cty = new db_query("SELECT cit_id,cit_name FROm city2");
//     $arr_tp_s = array();
//     While($row_cty = mysql_fetch_assoc($db_cty->result))
//     {
//         $arr_tp[$row_cty['cit_id']] = $row_cty['cit_name'];
//         $arr_tp_s[] = $row_cty['cit_name'];
//     }

// $arr_qh= array();
// $db_qh = new db_query("SELECT cit_id,cit_name FROm city2");
//     $arr_qh_s = array();
//     While($row_qh = mysql_fetch_assoc($db_qh->result))
//     {
//         $arr_qh[$row_qh['cit_id']] = $row_qh['cit_name'];
//         $arr_qh_s[] = $row_qh['cit_name'];
//     }

?>