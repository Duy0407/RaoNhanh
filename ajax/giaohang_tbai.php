<?
include("config.php");
if(isset($_COOKIE['UID']) && isset($_COOKIE['UT'])){
    $id_dh = getValue('id_dh', 'int', 'POST', 0);
    $lydo = getValue('lydo', 'str', 'POST', '');
    $lydo = trim($lydo);
    $lydo = sql_injection_rp($lydo);

    $tgian = strtotime(date('Y-m-d H:i:s', time()));

    if($id_dh != 0 && $lydo != ""){
        $check_tt = new db_query("SELECT `dh_id`, `id_nguoi_dh`, `id_nguoi_ban`, `id_spham` FROM `dat_hang` WHERE `dh_id` = '" . $id_dh . "' AND `trang_thai` = 2 ");
        if(mysql_num_rows($check_tt -> result) > 0){
            $row_dh = mysql_fetch_assoc($check_tt->result);
            $id_nguoi_dh = $row_dh['id_nguoi_dh'];
            $id_nguoi_ban = $row_dh['id_nguoi_ban'];
            $new_id = $row_dh['id_spham'];
            // lấy thông tin gửi tin nhắn, làm thông báo
            $id_nggui = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '" . $row_dh['id_nguoi_ban'] . "' ");
            $id_chat_ngui = mysql_fetch_assoc($id_nggui->result)['chat365_id'];

            $id_nnhan = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '" . $row_dh['id_nguoi_dh'] . "' ");
            $id_chat_nnhan = mysql_fetch_assoc($id_nnhan->result)['chat365_id'];

            $new_title = mysql_fetch_assoc((new db_query("SELECT `new_title` FROM `new` WHERE `new_id` = '" . $row_dh['id_spham'] . "' "))->result)['new_title'];

            $noi_dung = "thông báo giao hàng thất bại";
            // update giao hàng thất bại
            $inser_tbai = new db_query("UPDATE `dat_hang` SET `tgian_ghthatbai` = '$tgian',`lydo_ghtbai` = '$lydo' WHERE `dh_id` = $id_dh ");
            // thông báo giao hàng thất bại
            $inser_nof = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$id_nguoi_ban','$new_id','$id_nguoi_dh','7','$tgian','$noi_dung')");
            // gửi tin nhắn qua chat365
            $curl = curl_init();
            $data = [
                'UserId' => $id_chat_nnhan,
                'SenderId' => $id_chat_ngui,
                'Message' => "Giao hàng thất bại cho bạn: " . $new_title,
            ];
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_URL, 'http://43.239.223.142:3005/Notification/SendNewNotification');
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

            $response = curl_exec($curl);
            curl_close($curl);
        }else{
            echo "Sản phẩm đã được hủy hoặc đã được chuyển sang trạng thái khác";
        }
    }else{
        echo "Thông tin không đầy đủ";
    }
}else{

}

?>