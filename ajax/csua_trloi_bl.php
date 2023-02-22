<?
include("config.php");
$bl_id = getValue('bl_id', 'int', 'POST', '');

$noi_dung = getValue('noi_dung', 'str', 'POST', '');
$noi_dung = sql_injection_rp($noi_dung);
$noi_dung = removeEmoji($noi_dung);


if ($bl_id != "" && $noi_dung != "") {
    $update_bl = new db_query("UPDATE `evaluate` SET `eva_comment` = '$noi_dung', `da_csbl` = '1', `tgian_hetcs` = '0'
                                WHERE `eva_id` = $bl_id ");
} else {
    echo "Thông tin không đầy đủ";
}

?>