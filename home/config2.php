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

require_once("../cache_file/home-cache.php");

$version = 48;

// if ($_SERVER['SERVER_NAME'] == 'localhost') {
//     $domain = "http://" . $_SERVER['SERVER_NAME'] . ":" . $_SERVER['SERVER_PORT'];
// } else if ($_SERVER['SERVER_NAME'] == 'raonhanh365.vn') {
//     $domain = "http:/".$_SERVER['SERVER_NAME'];
//     $domain = "https://raonhanh365.vn/";
// } else {
//     $domain = "http:/" . $_SERVER['HTTP_HOST'];
// }

$mt_rand = mt_rand(100000, 999999);

$file = '../cache_file/sql_cache.json';
$arraytong = json_decode(file_get_contents($file), true);
$arrcity = $arraytong['db_city'];
$db_cat = $arraytong['db_cat'];
$db_cat1 = $arraytong['db_cat1'];

//----------------
$file_home = '../cache_file/cache_home.json';
$array_home       = json_decode(file_get_contents($file_home), true);
$sp_qtam          = $array_home['sp_qtam'];
$top_ghang        = $array_home['top_ghang'];
$danh_muc         = $array_home['danh_muc'];
$td_nbat          = $array_home['td_nbat'];
$td_hdan          = $array_home['td_hdan'];


$oninput = "this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');";
