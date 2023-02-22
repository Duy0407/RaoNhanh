<?
include("config.php");
$tthanh = getValue('tinh_thanh1', 'int', 'POST', 0);
$qhuyen = getValue('quan_huyen1', 'int', 'POST', 0);
$pxa = getValue('phuong_xa1', 'int', 'POST', 0);
$so_nha = getValue('kv_so_nha', 'str', 'POST', '');
if ($tthanh != 0 && $qhuyen != 0 && $pxa != 0 && $so_nha != "") {
    $ten_tp = mysql_fetch_assoc((new db_query("SELECT `cit_name`  FROM `city2` WHERE `cit_parent` = 0 AND `cit_id` = $tthanh "))->result)['cit_name'];
    $ten_qhuyen = mysql_fetch_assoc((new db_query("SELECT `cit_name`  FROM `city2` WHERE `cit_parent` = $tthanh AND `cit_id` = $qhuyen "))->result)['cit_name'];
    $ten_pxa = mysql_fetch_assoc((new db_query("SELECT `name`, `prefix`  FROM `phuong_xa` WHERE `id` = $pxa "))->result);
    $ten_phuong = $ten_pxa['name'];
    $dv_phuong = $ten_pxa['prefix'];
    echo $so_nha . ', ' . $dv_phuong . ' ' . $ten_phuong . ', ' . $ten_qhuyen . ', ' . $ten_tp;
}
