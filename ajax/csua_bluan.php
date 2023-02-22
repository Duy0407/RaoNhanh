<?
include("config.php");
$bl_id = getValue('bl_id', 'int', 'POST', '');

$noi_dung = getValue('noi_dung', 'str', 'POST', '');
$noi_dung = trim($noi_dung);
$noi_dung = sql_injection_rp($noi_dung);
$noi_dung = removeEmoji($noi_dung);

$so_sao = getValue('so_sao', 'int', 'POST', '');

$tgian_sua = strtotime(date('Y-m-d H:i:s', time()));

if($bl_id != "" && $noi_dung != ""){
    $update_bl = new db_query("UPDATE `evaluate` SET `eva_stars` = '$so_sao', `eva_comment` = '$noi_dung', `da_csbl` = '1', `tgian_hetcs` = '0',
                                `eva_csua_bl` = '$tgian_sua' WHERE `eva_id` = $bl_id ");
}else{
    echo "Thông tin không đầy đủ";
}

?>