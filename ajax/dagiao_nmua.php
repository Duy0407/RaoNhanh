<?
include("config.php");
$id = getValue('id', 'int', 'POST', 0);
$tthai = getValue('tthai', 'int', 'POST', 0);
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    $us_id = $_COOKIE['UID'];
    $us_type = $_COOKIE['UT'];
    if($id != 0 && $tthai == 3){
        $check_tt = new db_query("SELECT `dh_id`, `trang_thai` FROM `dat_hang` WHERE `trang_thai` = $tthai AND `id_nguoi_dh` = $us_id AND `dh_id` = $id ");
        if(mysql_num_rows($check_tt -> result) > 0){
            $upda_tt = new db_query("UPDATE `dat_hang` SET `xnhan_nmua` = 1 WHERE `id_nguoi_dh` = $us_id AND `trang_thai` = $tthai AND `dh_id` = $id ");

            $data = array(
                'result' => true,
                'msg' => null,
            );
        }else{
            $data = array(
                'result' => false,
                'msg' => 'Đơn hàng trạng thái không tồn tại',
            );
        }
    }else{
        $data = array(
            'result' => false,
            'msg' => 'Thông tin không chính xác',
        );
    }
}else{
    $data = array(
        'result' => false,
        'msg' => 'Đăng nhập tài khoản',
    );
}
echo json_encode($data, true);

?>