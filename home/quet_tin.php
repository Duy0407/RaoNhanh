<?
include("config.php");
$ngay_htai = strtotime(date('Y-m-d', time()));
$tgian_htai = date('H', time());
$tgian_xet = $tgian_htai + 1;
$updat_cu = new db_query("UPDATE `new` SET `new_order` = '0' WHERE FIND_IN_SET($tgian_xet, `new_day_tin`) < 0 AND `ngay_bdghim` <= $ngay_htai ");
$updat_moi = new db_query("UPDATE `new` SET `new_order` = '1' WHERE FIND_IN_SET($tgian_xet, `new_day_tin`) > 0 AND `ngay_bdghim` <= $ngay_htai ");

?>