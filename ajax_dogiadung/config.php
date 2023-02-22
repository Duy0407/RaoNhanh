<?
require_once("../classes/database.php");
require_once("../functions/functions.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
ob_start();
require_once("../functions/function_rewrite.php");

$file = '../cache_file/sql_cache.json';
$arraytong = json_decode(file_get_contents($file), true);

// tất cả tình thành cùng quận huyện
$arrcity2 = $arraytong['db_city2'];
// tất cả danh mục sản phẩm
$db_cat = $arraytong['db_cat'];
$db_cattk = array_column($db_cat, 'cat_name', 'cat_id');
// danh mục sản phẩm cha
$db_cat1 = $arraytong['db_cat1'];
// tất cả tags
$tags_tk = $arraytong['tags_tk'];
$tags_tk1 = array_column($tags_tk, 'ten_tags', 'tags_id');
// danh muc viec lam
$db_catvl = $arraytong['db_catvl'];
$db_cat_vl = array_column($db_catvl, 'cat_name', 'cat_id');
// tags viec lam
$db_tagsvl = $arraytong['db_tagsvl'];
$db_tags_vl = array_column($db_tagsvl, 'key_name', 'key_id');
// từ khóa đặc biệt: mua bán, mua, cho thuê, thuê
$db_tkhoadb  = $arraytong['db_tkhoadb'];
$db_tkhoadb1 = array_column($db_tkhoadb, 'tags_id');
// từ khóa đặc biệt: bán
$qr_tkhoadb2  = $arraytong['db_tkhoadb2'];
$db_tkhoadb2 = array_column($qr_tkhoadb2, 'tags_id');

$db_tkhoadb3 = array_merge($db_tkhoadb1, $db_tkhoadb2);

$bo_dau = [',', ';', ' '];
if (isset($_COOKIE['UID'])) {
    $check_tkhoan = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_address`, chat365_id FROM `user`
                                WHERE `usc_id` = '" . $_COOKIE['UID'] . "' AND `usc_type` = '" . $_COOKIE['UT'] . "' ");
    $tkhoan       = mysql_fetch_assoc($check_tkhoan->result);
    $user_name    = $tkhoan['usc_name'];
    $user_phone   = $tkhoan['usc_phone'];
    $user_email   = $tkhoan['usc_email'];
    $user_address = $tkhoan['usc_address'];
    $chat365_id   = $tkhoan['chat365_id'];
}
