
<?php

error_reporting(0);
require_once("../functions/functions.php");

ob_start();
require_once("../functions/function_rewrite.php");
require_once '../functions/pagebreak.php';
require_once("../classes/database.php");
require_once("../classes/config.php");
// require_once("../classes/user.php");

require_once("../cache_file/top-cache.php");

date_default_timezone_set('Asia/Ho_Chi_Minh');

$file = "../cache_file/cache_home.json";
$refresh = getValue('refresh', 'int', 'POST', 0);
if ($refresh != 0) {
    $expire = 1;
} else {
    $expire = 3000; // 5 minutes
}
// Nếu có cache file và còn trong thời gian chưa hết $expire
if (file_exists($file) && filemtime($file) > (time() - $expire)) {
    // Uunserialize data từ cache file
    $arraytong       = json_decode(file_get_contents($file), true);
    // $sp_qtam       = $arraytong['sp_qtam'];
    $top_ghang        = $arraytong['top_ghang'];
    $danh_muc         = $arraytong['danh_muc'];
    $tin_tuc         = $arraytong['tin_tuc'];
    // $td_nbat          = $arraytong['td_nbat'];
    // $td_hdan            = $arraytong['td_hdan'];
} else // Cập nhật cache file
{
    // tin đăng hấp dẫn
    // $db_tin_dang_hd = new db_query("SELECT new_id,new_image,new_address,new_title,view_month,new_authen,
    //                                 new_cate_id,new_money,usc_store_phone,usc_phone,new_create_time,
    //                                 new_update_time,new_pin_home_attractive FROM new
    //                                 LEFT JOIN user ON new.new_user_id = user.usc_id
    //                                 LEFT JOIN map ON new.new_user_id = map.usc_id
    //                                 WHERE new_active = 1 AND new_type IN (1,2,3,4)
    //                                 ORDER BY new_pin_home_attractive DESC, view_month DESC LIMIT 24");
    // $hd = array();


    // if (mysql_num_rows($db_tin_dang_hd->result) > 0) {
    //     while ($row_tdhd = mysql_fetch_assoc($db_tin_dang_hd->result)) {
    //         $td_hd[] = [
    //             'new_id' => $row_tdhd['new_id'],
    //             'new_image' => $row_tdhd['new_image'],
    //             'new_title' => $row_tdhd['new_title'],
    //             'new_authen' => $row_tdhd['new_authen'],
    //             'new_cate_id' => $row_tdhd['new_cate_id'],
    //             'new_money' => $row_tdhd['new_money'],
    //             'usc_store_phone' => $row_tdhd['usc_store_phone'],
    //             'usc_phone' => $row_tdhd['usc_phone'],
    //             'new_create_time' => $row_tdhd['new_create_time'],
    //             'new_update_time' => $row_tdhd['new_update_time'],
    //             'new_address' => $row_tdhd['new_address'],
    //             'view_month' => $row_tdhd['view_month'],
    //             'new_pin_home_attractive' => $row_tdhd['new_pin_home_attractive']
    //         ];
    //         $hd[] = $row_tdhd['new_id'];
    //     }
    // }

    // tin đăng nổi bật
    // $db_tin_dang_nb = new db_query("
    // SELECT new_id,new_image,new_address,new_title,new_authen,new_cate_id,new_money,usc_store_phone,usc_phone,new_create_time,new_update_time,new_pin_home_prominent
    // FROM new LEFT JOIN user ON new.new_user_id = user.usc_id LEFT JOIN map ON new.new_user_id = map.usc_id WHERE new_active = 1 AND new_type IN (1,2,3,4) ORDER BY new_pin_home_prominent DESC, new_update_time DESC LIMIT 50");
    // $db_tin_dang_nb = new db_query("SELECT new_id,new_image,new_address,new_title,new_authen,new_cate_id,new_money,new_update_time,new_pin_home_prominent
    // FROM new  WHERE new_active = 1 AND new_type IN (1,2,3,4) ORDER BY new_pin_home_prominent DESC, new_update_time DESC LIMIT 24");
    // $nb = array();
    // if (mysql_num_rows($db_tin_dang_nb->result) > 0) {
    //     while ($row_tdnb = mysql_fetch_assoc($db_tin_dang_nb->result)) {
    //         $td_nb[] = [
    //             'new_id' => $row_tdnb['new_id'],
    //             'new_image' => $row_tdnb['new_image'],
    //             'new_title' => $row_tdnb['new_title'],
    //             'new_authen' => $row_tdnb['new_authen'],
    //             'new_cate_id' => $row_tdnb['new_cate_id'],
    //             'new_money' => $row_tdnb['new_money'],
    //             'usc_store_phone' => $row_tdnb['usc_store_phone'],
    //             'usc_phone' => $row_tdnb['usc_phone'],
    //             'new_create_time' => $row_tdnb['new_create_time'],
    //             'new_update_time' => $row_tdnb['new_update_time'],
    //             'new_address' => $row_tdnb['new_address'],
    //             'new_pin_home_prominent' => $row_tdhd['new_pin_home_prominent']
    //         ];
    //         $nb[] = $row_tdnb['new_id'];
    //     }
    // }

    // $db_sp_duoc_qt = new db_query("SELECT new_id,new_image,new_title,new_authen,new_cate_id,new_money,usc_store_phone,usc_phone,new_create_time,new_update_time
    //     FROM new LEFT JOIN user ON new.new_user_id = user.usc_id
    //     LEFT JOIN map ON new.new_user_id = map.usc_id WHERE new_active = 1
    //     AND new_type IN (1,2,3,4) ORDER BY new_pin_city DESC,refresh_new_home DESC, new_update_time DESC, new_type DESC LIMIT 4");
    // $sp = array();
    // if (mysql_num_rows($db_sp_duoc_qt->result) > 0) {
    //     while ($row_spqt = mysql_fetch_assoc($db_sp_duoc_qt->result)) {
    //         $sp_qt[] = [
    //             'new_id' => $row_spqt['new_id'],
    //             'new_image' => $row_spqt['new_image'],
    //             'new_title' => $row_spqt['new_title'],
    //             'new_authen' => $row_spqt['new_authen'],
    //             'new_cate_id' => $row_spqt['new_cate_id'],
    //             'new_money' => $row_spqt['new_money'],
    //             'usc_store_phone' => $row_spqt['usc_store_phone'],
    //             'usc_phone' => $row_spqt['usc_phone'],
    //             'new_create_time' => $row_spqt['new_create_time'],
    //             'new_update_time' => $row_spqt['new_update_time'],
    //         ];
    //         $sp[] = $row_spqt['new_id'];
    //     }
    // }

    $db_top_gian_hang = new db_query("SELECT usc_id,usc_time,usc_city,usc_store_name,usc_logo,COUNT(new.new_user_id) as dem FROM user JOIN new ON new.new_user_id = user.usc_id WHERE usc_type = 5 GROUP BY (user.usc_id) ORDER BY ghim_gian_hang DESC,time_update_ghim DESC,usc_id DESC LIMIT 50");
    // $db_top_gian_hang = new db_query("SELECT usc_id,usc_time,usc_city,usc_store_name,usc_logo, usc_money as dem FROM user  ORDER BY ghim_gian_hang DESC,time_update_ghim DESC,usc_id DESC limit 50");
    if (mysql_num_rows($db_top_gian_hang->result) > 0) {
        while ($row_gh = mysql_fetch_assoc($db_top_gian_hang->result)) {
            if ($row_gh['dem'] >= 3) {
                $top_gh[] = [
                    'usc_id' => $row_gh['usc_id'],
                    'usc_time' => $row_gh['usc_time'],
                    'usc_city' => $row_gh['usc_city'],
                    'usc_store_name' => $row_gh['usc_store_name'],
                    'usc_logo' => $row_gh['usc_logo'],
                ];
            }
        }
    }
    $sp = implode(',', $sp);
    if ($sp != "") {
        $db_category = new db_query("SELECT cat_id,cat_name,cat_img1 FROM category WHERE cat_parent_id = 0 AND cat_type <> '' AND cat_active = 1 ORDER BY cat_type ASC");
        if (mysql_num_rows($db_category->result) > 0) {
            while ($row_category = mysql_fetch_assoc($db_category->result)) {
                $cat_id = $row_category['cat_id'];
                $cat_name = $row_category['cat_name'];
                $cat_img = $row_category['cat_img3'];

                $db_new_cat = new db_query("SELECT new_id,new_title,new_image,new_create_time,new_address,
                                new_money FROM new LEFT JOIN category ON new.new_cate_id = category.cat_id
                                WHERE ( new_active = 1 AND new_cate_id = " . $row_category['cat_id'] . " AND new_type IN (1,2,3,4)) OR (new_active = 1 AND cat_parent_id = " . $row_category['cat_id'] . " AND new_type IN (1,2,3,4)) AND new_id NOT IN (" . $sp . ") ORDER BY new_update_time DESC LIMIT 3");

                if (mysql_num_rows($db_new_cat->result) > 0) {
                    while ($row_cat = mysql_fetch_assoc($db_new_cat->result)) {
                        $new_cat[] = [
                            'new_id' => $row_cat['new_id'],
                            'new_title' => $row_cat['new_title'],
                            'new_image' => $row_cat['new_image'],
                            'new_create_time' => $row_cat['new_create_time'],
                            'new_address' => $row_cat['new_address'],
                            'new_money' => $row_cat['new_money'],
                        ];
                    }
                }
                $db_dmc = new db_query("SELECT cat_id,cat_name FROM category WHERE cat_parent_id = '" . $row_category['cat_id'] . "'");
                if (mysql_num_rows($db_dmc->result) > 0) {
                    while ($row_dmc = mysql_fetch_assoc($db_dmc->result)) {
                        $dmc[] = [
                            'cat_id' => $row_dmc['cat_id'],
                            'cat_name' => $row_dmc['cat_name'],
                        ];
                    }
                }

                $arr_cat[] = [
                    'cat_id' => $cat_id,
                    'cat_name' => $cat_name,
                    'new_cat' => $new_cat,
                    'cat_img' => $cat_img,
                    'danh_muc_c' => $dmc,
                ];
                unset($cat_id, $cat_name, $new_cat, $dmc);
            }
        }
    }
    $qr_tin_tuc_sp = new db_query("SELECT new_id,new_date,new_title,new_teaser,new_picture FROM news ORDER BY new_id DESC LIMIT 4");
    if (mysql_num_rows($qr_tin_tuc_sp->result) > 0) {
        while ($row_tt_sp = mysql_fetch_assoc($qr_tin_tuc_sp->result)) {
            $arr_tt_sp[] = [
                'new_id' => $row_tt_sp['new_id'],
                'new_date' => $row_tt_sp['new_date'],
                'new_title' => $row_tt_sp['new_title'],
                'new_teaser' => $row_tt_sp['new_teaser'],
                'new_picture' => $row_tt_sp['new_picture'],
            ];
        }
    }
    $arr_tong = [
        'td_hdan' => $td_hd,
        'td_nbat' => $td_nb,
        'sp_qtam' => $sp_qt,
        'top_ghang' => $top_gh,
        'danh_muc' => $arr_cat,
        'tin_tuc' => $arr_tt_sp,
    ];
    $OUTPUT = json_encode($arr_tong);
    $fp = fopen($file, "w");
    fwrite($fp, $OUTPUT);
    fclose($fp);
}
