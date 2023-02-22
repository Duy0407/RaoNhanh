<?
include("config.php");
$user_id = $_COOKIE['UID'];
$user_type = $_COOKIE['UT'];
$check_ht = getValue('check_ht', 'int', 'POST', '');

if($user_id != '' && $user_type == 2){
    $chophep = new db_query("UPDATE `user` SET `hien_thi` = '$check_ht' WHERE `usc_id` = '$user_id' AND `usc_type` = '$user_type'");
}
?>