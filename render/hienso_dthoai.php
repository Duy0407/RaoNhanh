<?
include("config.php");
$us_id = getValue('us_id', 'int', 'POST', 0);
if($us_id != 0){
    $sdthoai = new db_query("SELECT `usc_phone` FROM `user` WHERE `usc_id` = '".$us_id."' ");
    $sdt = mysql_fetch_assoc($sdthoai -> result)['usc_phone'];
    echo $sdt;
}

?>