<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {

$id_user = $_COOKIE['UID'];
$type_user = $_COOKIE['UT'];

$new_usc_id = getValue('new_usc_id', 'int', 'POST', 0);
$id_tin = getValue('id_tin', 'int', 'POST', 0);
$vande = getValue('vande', 'int', 'POST', 0);
$mota_vd = getValue('mota_vande', 'str', 'POST', '');

$thoi_gian = strtotime(date('Y-m-d H:i:s', time()));

$baocao = new db_query("INSERT INTO `baocao_tin` (`user_baocao`, `new_baocao`, `new_user`, `tgian_baocao`, `van_de`, `mo_ta`)VALUE('$id_user','$id_tin','$new_usc_id','$thoi_gian','$vande','$mota_vd')");
}

?>