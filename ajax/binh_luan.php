<?
include("config.php");
$us_bl = getValue('us_bl', 'int', 'POST', '');
$us_nbl = getValue('us_nbl', 'int', 'POST', '');
$so_sao = getValue('so_sao', 'int', 'POST', '');

$noi_dung_dgia = getValue('noi_dung_dgia', 'str', 'POST', '');
$noi_dung_dgia = trim($noi_dung_dgia);
$noi_dung_dgia = sql_injection_rp($noi_dung_dgia);
$noi_dung_dgia = removeEmoji($noi_dung_dgia);

$tgian_bluan = strtotime(date('Y-m-d H:i:s', time()));
$tgian_ktcs = $tgian_bluan + (30 * 86400);

if($noi_dung_dgia != ""){
    if ($us_bl != "" && $us_nbl != "") {
        $bluan = new db_query("INSERT INTO `evaluate`(`eva_id`, `user_id`, `bl_user`, `eva_stars`, `eva_comment`, `eva_comment_time`, `eva_active`, `da_csbl`, `tgian_hetcs`)
                                VALUES ('','$us_nbl','$us_bl','$so_sao','$noi_dung_dgia','$tgian_bluan','1','0','$tgian_ktcs')");
    } else {
        echo "Thông tin không chính xác";
    }
}else{
    echo "Nhập trả lời bình luận";
}



?>