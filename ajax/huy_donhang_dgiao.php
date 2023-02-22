<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $id_dh = getValue('id_dh', 'int', 'POST', 0);
    $huy_dh = getValue('huy_dh', 'str', 'POST', '');
    $huy_dh = sql_injection_rp($huy_dh);

    $tgian_huy = strtotime(date('Y-m-d H:i:s', time()));

    if ($id_dh != 0 && $huy_dh != "") {
        $donhang = new db_query("SELECT `dh_id`, `id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `trang_thai` FROM `dat_hang` WHERE `dh_id` = '" . $id_dh . "'
                                AND `trang_thai` != 5 ");
        if (mysql_num_rows($donhang->result) > 0) {
            $row_dh = mysql_fetch_assoc($donhang->result);
            $nguoi_gui = $row_dh['id_nguoi_dh'];
            $nguoi_nhan = $row_dh['id_nguoi_ban'];
            $new_id = $row_dh['id_spham'];
            // lấy thông tin gửi tin nhắn, làm thông báo
            $noi_dung = "thông báo hủy đơn hàng";

            $id_nggui = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '" . $nguoi_gui . "' ");
            $id_chat_ngui = mysql_fetch_assoc($id_nggui->result)['chat365_id'];

            $id_nnhan = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '" . $nguoi_nhan . "' ");
            $id_chat_nnhan = mysql_fetch_assoc($id_nnhan->result)['chat365_id'];

            $new_title = mysql_fetch_assoc((new db_query("SELECT `new_title` FROM `new` WHERE `new_id` = '" . $row_dh['id_spham'] . "' "))->result)['new_title'];

            $updat_dh = new db_query("UPDATE `dat_hang` SET `nguoimua_huydh` = '1', `ly_do_hdon` = '$huy_dh', `tgian_nmua_huy` = '$tgian_huy' WHERE `dh_id` = $id_dh ");

            $inser_nof = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$nguoi_gui','$new_id','$nguoi_nhan','10','$tgian_huy','$noi_dung')");
            // gửi tin nhắn qua chat365
            $curl = curl_init();
            $data = [
                'UserId' => $id_chat_nnhan,
                'SenderId' => $id_chat_ngui,
                'Message' => "Xác nhận hủy đơn hàng: " . $new_title,
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

        } else {
            echo "Sản phẩm đã được hủy hoặc đã được chuyển sang trạng thái khác";
        }
    } else {
        echo "Thông tin không đúng";
    }
} else {
    echo "Thông tin không chính xác";
}
