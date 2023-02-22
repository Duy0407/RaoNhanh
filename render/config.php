<?
error_reporting(0);
require_once("../functions/functions.php");
ob_start();
require_once("../functions/function_rewrite.php");
require_once("../classes/database.php");
require_once("../classes/config.php");
// require_once("../classes/user.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
require_once("../classes/resize-class.php");
// require_once("../cache_file/home-cache.php");
$version = 48;
$file = '../cache_file/sql_cache.json';
$arraytong = json_decode(file_get_contents($file), true);
$arrcity = $arraytong['db_city'];
$arrcity2 = $arraytong['db_city2'];

// danh mục sản phẩm cha
$db_cat1 = $arraytong['db_cat1'];

$db_catvl = $arraytong['db_catvl'];
$db_cat_vl = array_column($db_catvl, 'cat_name', 'cat_id');

$db_tagsvl = $arraytong['db_tagsvl'];
$db_tags_vl = array_column($db_tagsvl, 'key_name', 'key_id');

$arr_tinh = [];
for ($i = 0; $i < count($arrcity2); $i++) {
    $value = $arrcity2[$i];
    $arr_tinh[$value['cit_id']] = $value;
};

$arr_dvtien = array(
    1 => 'VNĐ',
    2 => 'USD',
    3 => 'EURO',
);
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $userid   = $_COOKIE['UID'];
    $userpass = $_COOKIE['PHPSESPASS'];
    $usertype = $_COOKIE['UT'];

    $qr_info    = new db_query("SELECT `usc_phone`, `usc_address`, `usc_id`, `usc_name`, `usc_logo`, `usc_money`, `usc_time`, `xacthuc_lket`, `usc_store_name`, usc_email
                                FROM user
                                WHERE usc_id = " . $userid . " AND usc_pass  = '" . $userpass . "'");
    $login = mysql_num_rows($qr_info->result);
    if ($login > 0) {
        $row4 = mysql_fetch_assoc($qr_info->result);
        $usc_phone = $row4['usc_phone'];
        $usc_address = $row4['usc_address'];
        $user_id = $row4['usc_id'];
        $user_name = $row4['usc_name'];
        $usc_email = $row4['usc_email'];

        $user_logo = $row4['usc_logo'];

        $user_money = $row4['usc_money'];
        $user_time = $row4['usc_time'];
        if ($user_time == 0) {
            $user_time = '';
        } else {
            $user_time = date('d-m-Y', $user_time);
        };
        $usc_store_name = $row4['usc_store_name'];

        $xacthuc_lket = $row4['xacthuc_lket'];
    }
}

?>