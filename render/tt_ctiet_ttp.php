<?
include("config.php");
$tthanh = getValue('tinh_thanh', 'int', 'POST', 0);
$qhuyen = getValue('quan_huyen', 'int', 'POST', 0);
$pxa = getValue('phuong_xa', 'int', 'POST', 0);
$so_nha = getValue('so_nha', 'str', 'POST', '');

$ten_tp = mysql_fetch_assoc((new db_query("SELECT `cit_name`  FROM `city2` WHERE `cit_parent` = 0 AND `cit_id` = $tthanh "))->result)['cit_name'];
$ten_qhuyen = mysql_fetch_assoc((new db_query("SELECT `cit_name`  FROM `city2` WHERE `cit_parent` = $tthanh AND `cit_id` = $qhuyen "))->result)['cit_name'];
if ($pxa != 0) {
    $ten_pxa = mysql_fetch_assoc((new db_query("SELECT `name`, `prefix`  FROM `phuong_xa` WHERE `id` = $pxa "))->result);
    $ten_phuong = $ten_pxa['name'];
    $dv_phuong = $ten_pxa['prefix'];
    $phuongxa = $dv_phuong . ' ' . $ten_phuong . ', ';
} else {
    $phuongxa = '';
}


$so_nha = $so_nha != '' ? $so_nha . ', ' : '';


echo $so_nha . $phuongxa . $ten_qhuyen . ', ' . $ten_tp;
