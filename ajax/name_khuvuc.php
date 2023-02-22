<?
include("config.php");

$id_kv = getValue('tinh_tp', 'int', 'POST', '');
$quan_huyen = getValue('quan_huyen', 'int', 'POST', '');
$xa_phuong = getValue('xa_phuong', 'int', 'POST', '');

if ($id_kv!=0) {
	$qr_kv = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = '$id_kv'");
	$qr_ok = mysql_fetch_assoc($qr_kv->result);

	$qr_qh = new db_query("SELECT `cit_name` FROM `city2` WHERE `cit_id` = '$quan_huyen'");
	$qr_ok_qh = mysql_fetch_assoc($qr_qh->result);

	$qr_kv = new db_query("SELECT `name` FROM `phuong_xa` WHERE `id` = '$xa_phuong'");
	$qr_ok_xp = mysql_fetch_assoc($qr_kv->result);

	$s=$qr_ok_xp['name'].','.$qr_ok_qh['cit_name'].','.$qr_ok['cit_name'];
	$s=trim($s,',');
	echo $s;
}
else echo 'Toàn Quốc';

?>