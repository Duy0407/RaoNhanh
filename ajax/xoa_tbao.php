<?
include("config.php");
$id_nof = getValue('id_nof', 'int', 'POST', 0);
$nofi = getValue('nofi', 'int', 'POST', 0);
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    if ($id_nof != 0 && $nofi != 0) {
        if($nofi == 1){
            $check_tt = new db_query("SELECT `id` FROM `notify` WHERE `id` = $id_nof AND `notify_to` = '".$_COOKIE['UID']."' ");
            if (mysql_num_rows($check_tt->result) > 0) {
                $dele_nof = new db_query("DELETE FROM `notify` WHERE `id` = $id_nof AND `notify_to` = '" . $_COOKIE['UID'] . "' ");
                $data = array(
                    'result' => true,
                    'msg' => null,
                );
            } else {
                $data = array(
                    'result' => false,
                    'msg' => 'Thông báo không tồn tại',
                );
            }
        }else if($nofi == 2){
            $dele_nof = new db_query("DELETE FROM `notify` WHERE `notify_to` = '" . $_COOKIE['UID'] . "' ");
            $data = array(
                'result' => true,
                'msg' => null,
            );
        }
    }
}else{
    $data = array(
        'result' => false,
        'msg' => 'Bạn phải đăng nhập',
    );
}

echo json_encode($data, true);
