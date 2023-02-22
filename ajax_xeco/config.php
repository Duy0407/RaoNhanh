<?
require_once("../functions/functions.php");
date_default_timezone_set('Asia/Ho_Chi_Minh');
ob_start();
require_once("../functions/function_rewrite.php");
require_once("../classes/database.php");
$bo_dau = [',', ';', ' '];
if (isset($_COOKIE['UID'])) {
    $query_user = new db_query("SELECT `usc_id`, `usc_name`, `usc_phone`, `usc_email`, `usc_address`, `usc_type` FROM `user` WHERE usc_id = '" . $_COOKIE['UID'] . "' ");
    $tt_user = mysql_fetch_assoc($query_user->result);
    $user_name = $tt_user['usc_name'];
    $user_phone = $tt_user['usc_phone'];
    $user_email = $tt_user['usc_email'];
    $user_address = $tt_user['usc_address'];
}
