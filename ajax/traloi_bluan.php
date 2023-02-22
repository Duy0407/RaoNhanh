<?
include("config.php");
$nguoi_tloi = getValue('nguoi_tloi', 'int', 'POST', '');
$id_bl = getValue('id_bl', 'int', 'POST', '');
$binh_luan = getValue('binh_luan', 'str', 'POST', '');
$binh_luan = trim($binh_luan);
$tgian_bluan = strtotime(date('Y-m-d H:i:s', time()));
$tgian_ktcs = $tgian_bluan + (30 * 86400);

if ($binh_luan == "") {
    echo "Nhập trả lời bình luận";
} else {
    if ($nguoi_tloi != "" && $id_bl != "") {
        $bluan = new db_query("INSERT INTO `evaluate`(`eva_id`, `user_id`, `eva_parent_id`, `eva_comment`, `eva_comment_time`,
                        `eva_active`,`da_csbl`,`tgian_hetcs`) VALUES ('','$nguoi_tloi','$id_bl','$binh_luan','$tgian_bluan','1','0','$tgian_ktcs')");
    } else {
        echo "Thông tin không chính xác";
    }
}
