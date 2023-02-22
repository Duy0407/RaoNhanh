<?
require_once("../functions/functions.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
ob_start();
require_once("../functions/function_rewrite.php");
require_once("../classes/database.php");
$mt_rand = mt_rand(100000, 999999);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $userid   = $_COOKIE['UID'];
    $userpass = $_COOKIE['PHPSESPASS'];
    $usertype = $_COOKIE['UT'];
    $qr_info    = new db_query("SELECT * FROM user WHERE usc_id = " . $userid . " AND usc_pass  = '" . $userpass . "'");
    $row4 = mysql_fetch_assoc($qr_info->result);
    $user_money = $row4['usc_money'];
}

$bo_dau = [',', ';', ' '];
$file = '../cache_file/sql_cache.json';
$arraytong = json_decode(file_get_contents($file), true);
// tất cả tỉnh thành
$arrcity = $arraytong['db_city'];
// tất cả tình thành cùng quận huyện
$arrcity2 = $arraytong['db_city2'];
// tat ca phuong xa
$db_pxa = $arraytong['db_pxa'];

// tất cả danh mục sản phẩm
$db_cat = $arraytong['db_cat'];
$db_cattk = array_column($db_cat, 'cat_name', 'cat_id');

// danh mục sản phẩm cha
$db_cat1 = $arraytong['db_cat1'];

// tất cả tags
$tags_tk = $arraytong['tags_tk'];
$tags_tk1 = array_column($tags_tk, 'ten_tags', 'tags_id');

$list_tag_auto = array_column($tags_tk, 'ten_tags');
// danh muc viec lam
$db_catvl = $arraytong['db_catvl'];
$db_cat_vl = array_column($db_catvl, 'cat_name', 'cat_id');

// tags viec lam
$db_tagsvl = $arraytong['db_tagsvl'];
$db_tags_vl = array_column($db_tagsvl, 'key_name', 'key_id');

$dbtags_vl = array_column($db_tagsvl, 'key_name_vl', 'key_id');

$tags_vltk = array_column($db_tagsvl, 'key_name_vl');

// danh muc viec lam tim kiem
$db_tkcatvl = $arraytong['db_tkcatvl'];
$db_tkcatvl_col = array_column($db_tkcatvl, 'cat_name', 'cat_id');
$tkcatvl_col = array_column($db_tkcatvl, 'cat_name_vl1', 'cat_id');

$list_vl_auto = array_column($db_tkcatvl, 'cat_name_vl');

// tim kiem danh muc
$db_tkcat = $arraytong['db_tkcat'];
$db_tkcat_col = array_column($db_tkcat, 'cat_name', 'cat_id');


