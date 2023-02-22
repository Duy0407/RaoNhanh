<?

$tgian_htai = time();
$update_tghim = new db_query("UPDATE `new` SET `new_pin_home` = 0, `ngay_bdghim` = 0, `thoigian_bdghim` = 0, `ngay_ktghim` = 0, `so_ngay_ghim` = 0
                            WHERE `new_pin_home` != 0 AND `ngay_ktghim` < $tgian_htai AND `tgian_tghim` = 0 ");

$update_tghim = new db_query("UPDATE `new` SET `new_pin_cate` = 0, `ngay_bdghim` = 0, `thoigian_bdghim` = 0, `ngay_ktghim` = 0, `so_ngay_ghim` = 0
                            WHERE `new_pin_cate` != 0 AND `ngay_ktghim` < $tgian_htai AND `tgian_tghim` = 0 ");

$update_tghim = new db_query("UPDATE `new` SET `new_day_tin` = '', `ngay_bdghim` = 0, `thoigian_bdghim` = 0, `ngay_ktghim` = 0, `so_ngay_ghim` = 0
                            WHERE `new_day_tin` != '' AND `ngay_ktghim` < $tgian_htai AND `tgian_tghim` = 0 ");

$update_ghghim = new db_query("UPDATE `user` SET `time_update_ghim` = 0, `han_ghim` = 0, `ghim_gian_hang` = 0 WHERE `han_ghim` < $tgain_htai
                            AND `ghim_gian_hang` = 1 AND `usc_type` = 5 ");


?>