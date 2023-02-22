<?
include("config.php");
if (isset($_COOKIE['UID']) && isset($_COOKIE['UT'])) {
    $us_id = $_COOKIE['UID'];
    $id_dh = getValue('id_dh', 'int', 'POST', 0);
    $tthai = getValue('tthai', 'int', 'POST', 0);
    $tgian_giao = strtotime(date('Y-m-d H:i:s', time()));
    if ($id_dh != 0) {
        $donhang = new db_query("SELECT `dh_id`, `id_nguoi_dh`, `id_nguoi_ban`, `id_spham`, `trang_thai` FROM `dat_hang` WHERE `dh_id` = '".$id_dh."' ");
        $row_dh = mysql_fetch_assoc($donhang -> result);
        $id_nguoi_dh = $row_dh['id_nguoi_dh'];
        $id_nguoi_ban = $row_dh['id_nguoi_ban'];
        $new_id = $row_dh['id_spham'];
        // lấy thông tin gửi tin nhắn, làm thông báo
        $id_nggui = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '" . $row_dh['id_nguoi_ban'] . "' ");
        $id_chat_ngui = mysql_fetch_assoc($id_nggui->result)['chat365_id'];

        $id_nnhan = new db_query("SELECT `usc_id`, `chat365_id`, `chat365_secret` FROM `user` WHERE `usc_id` = '" . $row_dh['id_nguoi_dh'] . "' ");
        $id_chat_nnhan = mysql_fetch_assoc($id_nnhan->result)['chat365_id'];

        $new_title = mysql_fetch_assoc((new db_query("SELECT `new_title` FROM `new` WHERE `new_id` = '".$row_dh['id_spham']."' "))->result)['new_title'];

        if ($tthai == 1) {
            $check_tt = new db_query("SELECT `dh_id` FROM `dat_hang` WHERE `dh_id` = '" . $id_dh . "' AND `trang_thai` = 0 ");
            if(mysql_num_rows($check_tt -> result) > 0){
                $noi_dung = "thông báo xác nhận sản phẩm mua và đang xử lý";
                $updat_dh = new db_query("UPDATE `dat_hang` SET `trang_thai` = '$tthai', `tgian_xnbh` = '$tgian_giao' WHERE `dh_id` = $id_dh AND `id_nguoi_ban` = $us_id ");

                $inser_nof = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$id_nguoi_ban','$new_id','$id_nguoi_dh','5','$tgian_giao','$noi_dung')");
                // gửi tin nhắn qua chat365
                $curl = curl_init();
                $data = [
                    'UserId' => $id_chat_nnhan,
                    'SenderId' => $id_chat_ngui,
                    'Message' => "Xác nhận sản phẩm bạn mua và đang xử lý: " . $new_title,
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
        } else if ($tthai == 2) {
            $check_tt = new db_query("SELECT `dh_id` FROM `dat_hang` WHERE `dh_id` = '" . $id_dh . "' AND `trang_thai` = 1 ");
            if (mysql_num_rows($check_tt->result) > 0) {
                $noi_dung = "thông báo bắt đầu giao hàng";

                $updat_dh = new db_query("UPDATE `dat_hang` SET `trang_thai` = '$tthai', `tgian_giaohang` = '$tgian_giao' WHERE `dh_id` = $id_dh AND `id_nguoi_ban` = $us_id ");

                $inser_nof = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$id_nguoi_ban','$new_id','$id_nguoi_dh','6','$tgian_giao','$noi_dung')");
                // gửi tin nhắn qua chat365
                $curl = curl_init();
                $data = [
                    'UserId' => $id_chat_nnhan,
                    'SenderId' => $id_chat_ngui,
                    'Message' => "Bắt đầu giao hàng cho bạn: " . $new_title,
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
        } else if ($tthai == 3) {
            $check_tt = new db_query("SELECT `dh_id` FROM `dat_hang` WHERE `dh_id` = '" . $id_dh . "' AND `trang_thai` = 2 ");
            if (mysql_num_rows($check_tt->result) > 0) {
                $noi_dung = "thông báo giao hàng thành công";

                $updat_dh = new db_query("UPDATE `dat_hang` SET `trang_thai` = '$tthai', `tgian_dagiao` = '$tgian_giao' WHERE `dh_id` = $id_dh AND `id_nguoi_ban` = $us_id ");

                $inser_nof = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$id_nguoi_ban','$new_id','$id_nguoi_dh','8','$tgian_giao','$noi_dung')");
                // gửi tin nhắn qua chat365
                $curl = curl_init();
                $data = [
                    'UserId' => $id_chat_nnhan,
                    'SenderId' => $id_chat_ngui,
                    'Message' => "Giao hàng thành công cho bạn: " . $new_title,
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
        } else if ($tthai == 4) {
            $check_tt = new db_query("SELECT `dh_id` FROM `dat_hang` WHERE `dh_id` = '" . $id_dh . "' AND `trang_thai` = 3 ");
            if (mysql_num_rows($check_tt->result) > 0) {
                $noi_dung = "thông báo hoàn tất đơn hàng";

                $updat_dh = new db_query("UPDATE `dat_hang` SET `trang_thai` = '$tthai', `tgian_htat` = '$tgian_giao' WHERE `dh_id` = $id_dh AND `id_nguoi_ban` = $us_id ");

                $inser_nof = new db_query("INSERT INTO `notify`(`id`, `notify_from`, `new_id`, `notify_to`, `type`, `create_time`, `notify_content`)
                                VALUES ('','$id_nguoi_ban','$new_id','$id_nguoi_dh','9','$tgian_giao','$noi_dung')");
                // gửi tin nhắn qua chat365
                $curl = curl_init();
                $data = [
                    'UserId' => $id_chat_nnhan,
                    'SenderId' => $id_chat_ngui,
                    'Message' => "Hoàn tất đơn hàng cho bạn: " . $new_title,
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
        }
    } else {
        echo "Thông tin không đúng";
    }
} else {
    echo "Thông tin không chính xác";
}
