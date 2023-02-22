<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $user_id = $_COOKIE['UID'];
    $user_type = $_COOKIE['UT'];

    $id_tin = getValue('new_id', 'int', 'POST', 0);
    $new_active = getValue('new_active', 'int', 'POST', 0);

    if ($id_tin != 0) {
        // check tin tồn tại
        $check_exists = new db_query("SELECT `new_id` FROM `new`
        WHERE `new_id` = $id_tin AND `new_user_id` = $user_id AND `new_type` = $user_type");
        if (mysql_num_rows($check_exists->result) > 0){
            // update new
            if ($new_active == 0){
                $new_active = 1;
            }else{
                $new_active = 0;
            }
            $update = new db_query("UPDATE `new` SET `new_active` = $new_active
            WHERE `new_id` = $id_tin AND `new_user_id` = $user_id AND `new_type` = $user_type");
            
            echo json_encode(['result'=>true,'msg'=>"Update thành công"]);
        }else{
            echo json_encode(['result'=>false,'msg'=>"Tin không tồn tại"]);
        }
    } else {
        echo json_encode(['result'=>false,'msg'=>"Thông tin không đầy đủ"]);
    }
}
