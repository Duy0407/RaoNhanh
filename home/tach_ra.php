<?
include("config.php");


// $list_vl = new db_query("SELECT `new_id`, `new_type`, `new_user_id`, `new_title`, `new_alias`, `new_city`, `new_district`, `new_ward`, `new_phone`,
//                         `new_address`, `new_job_type`, `new_job_kind`, `new_job_detail`, `new_end_date`, `new_money_min`, `new_money_max`, `new_money_unit`,
//                         `new_picture`, `new_desc`, `new_age`, `new_sex`, `new_exp`, `new_level`, `new_skill`, `new_pay_type`, `new_quantity`, `birthday`,
//                         `new_view_count`, `numrate`, `save_time_vl`, `new_company`, `com_city`, `com_district`, `com_ward`, `com_address`, `new_pay_by`,
//                         `com_logo`, `new_min_age`, `new_max_age`, `usc_type` FROM `vieclam`
//                         INNER JOIN `user` ON `vieclam`.`new_user_id` = `user`.`usc_id`  LIMIT 10 ");

// while ($row_vl = mysql_fetch_assoc($list_vl->result)) {
//     if ($row_vl['new_type'] == 1) {
//         $new_buy_sell = 2;
//         $new_cate_id = 121;
//     } else if ($row_vl['new_type'] == 2) {
//         $new_buy_sell = 1;
//         $new_cate_id = 120;
//     }
//     $new_title = $row_vl['new_title'];
//     if($row_vl['new_alias'] != ""){
//         $link_title = $row_vl['new_alias'];
//     }else{
//         $link_title = $row_vl['new_alias'];
//     }
//     $new_id = $row_vl['new_id'];
//     $dia_chi = $row_vl['new_address'];
//     $new_city = $row_vl['new_city'];
//     $quan_huyen = $row_vl['new_district'];
//     $new_money = $row_vl['new_ward'];
//     $new_unit = 1;
//     $new_phone = $row_vl['new_phone'];
//     $new_address = $row_vl['new_address'];
//     $new_active = 1;
//     $new_job_type = $row_vl['new_job_type'];
//     $new_job_kind = $row_vl['new_job_kind'];
//     $new_job_detail = $row_vl['new_job_detail'];
//     $new_end_date = $row_vl['new_end_date'];
//     $new_money_min = $row_vl['new_money_min'];
//     $new_money_max = $row_vl['new_money_max'];
//     $new_money_unit = 1;
//     $new_picture = $row_vl['new_picture'];
//     $new_desc = $row_vl['new_desc'];
//     $new_age = $row_vl['new_age'];
//     $new_sex = $row_vl['new_sex'];
//     $new_exp = $row_vl['new_exp'];
//     $new_skill = $row_vl['new_skill'];
//     $new_pay_type = $row_vl['new_pay_type'];
//     $new_quantity = $row_vl['new_quantity'];
//     $new_view_count = $row_vl['new_view_count'];
//     $numrate = $row_vl['numrate'];
//     $save_time_vl = $row_vl['save_time_vl'];
//     $new_company = $row_vl['new_company'];
//     $com_city = $row_vl['com_city'];
//     $com_district = $row_vl['com_district'];
//     $com_ward = $row_vl['com_ward'];
//     $com_address = $row_vl['com_address'];
//     $new_pay_by = $row_vl['new_pay_by'];
//     $com_logo = $row_vl['com_logo'];
//     $new_min_age = $row_vl['new_min_age'];
//     $new_max_age = $row_vl['new_max_age'];
//     $new_level = $row_vl['new_level'];
//     $usc_type = $row_vl['usc_type'];

//     // $inser_new = new db_query("INSERT INTO `new`(`new_id`, `new_title`, `link_title`, `new_cate_id`, `new_ctiet_dmuc`, `new_buy_sell`, `dia_chi`, `new_city`,
//     //                         `quan_huyen`, `new_money`, `gia_kt`, `new_unit`, `new_image`, `new_type`,  `new_phone`, `new_address`,
//     //                         `new_create_time`, `new_update_time`, `new_active`, `new_view_count`) VALUES ('', '$new_title', '$link_title','$new_cate_id',
//     //                         '$new_job_detail', '$new_buy_sell','$new_address','$new_city','$quan_huyen','$new_money_min','$new_money_max','$new_money_unit',
//     //                         '$new_picture','','$new_phone', '$new_address','$save_time_vl','$save_time_vl','$new_active','$new_view_count')");

//     $updat_new = new db_query("UPDATE `new` SET `new_title` = '$new_title', `link_title` = '$link_title', `new_cate_id` = '$new_cate_id',
//                             `new_ctiet_dmuc` = '$new_job_detail', `new_buy_sell`='$new_buy_sell', `dia_chi`='$new_address', `new_city`='$new_city',
//                             `quan_huyen`='$quan_huyen', `new_money`='$new_money_min', `gia_kt`='$new_money_max', `new_unit`='$new_money_unit',
//                             `new_image`='$new_picture', `new_type`='$usc_type', `new_phone`='$new_phone', `new_address`='$new_address',
//                             `new_create_time`='$save_time_vl', `new_update_time`='$save_time_vl', `new_active`='$new_active', `new_view_count`='$new_view_count'
//                             WHERE `new_id` = $new_id ");

//     $upda_des = new db_query("UPDATE `new_description` SET `new_description`='$new_desc', `do_tuoi`='$new_age', `gioi_tinh`='$new_sex', `new_job_type`='$new_job_type',
//                             `new_job_kind`='$new_job_kind', `new_min_age`='$new_min_age', `new_max_age`='$new_max_age', `new_exp`='$new_exp', `new_level`='$new_level',
//                             `new_skill`='$new_skill', `new_quantity`='$new_quantity', `com_city`='$com_city', `com_district`='$com_district', `com_ward`='$com_ward',
//                             `com_address_num`='$com_address', `new_pay_by`='$new_pay_by', `com_logo`='$com_logo'  WHERE `new_id` = $new_id ");

//     // $inser_des = new db_query("INSERT INTO `new_description`(`new_des_id`, `new_id`, `new_description`, `do_tuoi`, `gioi_tinh`, `new_job_type`, `new_job_kind`,
//     //                         `new_min_age`, `new_max_age`, `new_exp`, `new_level`, `new_skill`, `new_quantity`, `com_city`, `com_district`, `com_ward`,
//     //                         `com_address_num`, `new_pay_by`, `com_logo`) VALUES ('','$id','$new_desc','$new_age','$new_sex','$new_job_type','$new_job_kind',
//     //                         '$new_min_age','$new_max_age','$new_exp','$new_level','$new_skill','$new_quantity','$com_city','$com_district','$com_ward',
//     //                         '$com_address','$new_pay_by','$com_logo')");
// }

// $list_tin = new db_query("SELECT `new_id`, `new_title`, `link_title`  FROM `new` WHERE `new_cate_id` != 121 AND `new_cate_id` != 120  ");
// $arr_mang = ['...', "'", ',', ';', '-'];
// while ($row_tin = mysql_fetch_assoc($list_tin->result)) {
//     $ten_tin = str_replace($arr_mang, '', $row_tin['new_title']);
//     $ten_tin = replaceTitle($ten_tin);
//     $updat = new db_query("UPDATE `new` SET `link_title` = '$ten_tin' WHERE `new_cate_id` != 121 AND `new_cate_id` != 120 AND `new_id` = '".$row_tin['new_id']."' ");
// }

$list_tin = new db_query("SELECT `new_id`, `new_title`, `link_title` FROM `new` WHERE `new_create_time` >= 1667408400 ");

while ($row_tin = mysql_fetch_assoc($list_tin->result)) {
    $a = replaceTitle($row_tin['link_title']) . '-c' . $row_tin['new_id'] . '.html;';
    echo "<pre>";
    print_r($a);
    echo "</pre>";
}
